"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.refreshPaths = void 0;
const fs_1 = __importDefault(require("fs"));
const os_1 = __importDefault(require("os"));
const path_1 = __importDefault(require("path"));
const picocolors_1 = __importDefault(require("picocolors"));
const vite_1 = require("vite");
const vite_plugin_full_reload_1 = __importDefault(require("vite-plugin-full-reload"));
let exitHandlersBound = false;
exports.refreshPaths = [
    'app/View/Components/**',
    'resources/views/**',
    'resources/lang/**',
    'lang/**',
    'routes/**',
];
/**
 * Laravel plugin for Vite.
 *
 * @param config - A config object or relative path(s) of the scripts to be compiled.
 */
function laravel(config) {
    const pluginConfig = resolvePluginConfig(config);
    return [
        resolveLaravelPlugin(pluginConfig),
        ...resolveFullReloadConfig(pluginConfig),
    ];
}
exports.default = laravel;
/**
 * Resolve the Laravel Plugin configuration.
 */
function resolveLaravelPlugin(pluginConfig) {
    let viteDevServerUrl;
    let resolvedConfig;
    const defaultAliases = {
        '@': '/resources/js',
    };
    return {
        name: 'laravel',
        enforce: 'post',
        config: (userConfig, { command, mode }) => {
            var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k, _l, _m, _o, _p, _q, _r, _s, _t, _u, _v, _w, _x, _y, _z, _0, _1, _2, _3, _4, _5, _6, _7, _8, _9;
            const ssr = !!((_a = userConfig.build) === null || _a === void 0 ? void 0 : _a.ssr);
            const env = (0, vite_1.loadEnv)(mode, userConfig.envDir || process.cwd(), '');
            const assetUrl = (_b = env.ASSET_URL) !== null && _b !== void 0 ? _b : '';
            const serverConfig = command === 'serve'
                ? ((_c = resolveValetServerConfig(pluginConfig.valetTls)) !== null && _c !== void 0 ? _c : resolveEnvironmentServerConfig(env))
                : undefined;
            ensureCommandShouldRunInEnvironment(command, env);
            return {
                base: (_d = userConfig.base) !== null && _d !== void 0 ? _d : (command === 'build' ? resolveBase(pluginConfig, assetUrl) : ''),
                publicDir: (_e = userConfig.publicDir) !== null && _e !== void 0 ? _e : false,
                build: {
                    manifest: (_g = (_f = userConfig.build) === null || _f === void 0 ? void 0 : _f.manifest) !== null && _g !== void 0 ? _g : !ssr,
                    outDir: (_j = (_h = userConfig.build) === null || _h === void 0 ? void 0 : _h.outDir) !== null && _j !== void 0 ? _j : resolveOutDir(pluginConfig, ssr),
                    rollupOptions: {
                        input: (_m = (_l = (_k = userConfig.build) === null || _k === void 0 ? void 0 : _k.rollupOptions) === null || _l === void 0 ? void 0 : _l.input) !== null && _m !== void 0 ? _m : resolveInput(pluginConfig, ssr)
                    },
                    assetsInlineLimit: (_p = (_o = userConfig.build) === null || _o === void 0 ? void 0 : _o.assetsInlineLimit) !== null && _p !== void 0 ? _p : 0,
                },
                server: {
                    origin: (_r = (_q = userConfig.server) === null || _q === void 0 ? void 0 : _q.origin) !== null && _r !== void 0 ? _r : '__laravel_vite_placeholder__',
                    ...(process.env.LARAVEL_SAIL ? {
                        host: (_t = (_s = userConfig.server) === null || _s === void 0 ? void 0 : _s.host) !== null && _t !== void 0 ? _t : '0.0.0.0',
                        port: (_v = (_u = userConfig.server) === null || _u === void 0 ? void 0 : _u.port) !== null && _v !== void 0 ? _v : (env.VITE_PORT ? parseInt(env.VITE_PORT) : 5173),
                        strictPort: (_x = (_w = userConfig.server) === null || _w === void 0 ? void 0 : _w.strictPort) !== null && _x !== void 0 ? _x : true,
                    } : undefined),
                    ...(serverConfig ? {
                        host: (_z = (_y = userConfig.server) === null || _y === void 0 ? void 0 : _y.host) !== null && _z !== void 0 ? _z : serverConfig.host,
                        hmr: ((_0 = userConfig.server) === null || _0 === void 0 ? void 0 : _0.hmr) === false ? false : {
                            ...serverConfig.hmr,
                            ...(((_1 = userConfig.server) === null || _1 === void 0 ? void 0 : _1.hmr) === true ? {} : (_2 = userConfig.server) === null || _2 === void 0 ? void 0 : _2.hmr),
                        },
                        https: ((_3 = userConfig.server) === null || _3 === void 0 ? void 0 : _3.https) === false ? false : {
                            ...serverConfig.https,
                            ...(((_4 = userConfig.server) === null || _4 === void 0 ? void 0 : _4.https) === true ? {} : (_5 = userConfig.server) === null || _5 === void 0 ? void 0 : _5.https),
                        },
                    } : undefined),
                },
                resolve: {
                    alias: Array.isArray((_6 = userConfig.resolve) === null || _6 === void 0 ? void 0 : _6.alias)
                        ? [
                            ...(_8 = (_7 = userConfig.resolve) === null || _7 === void 0 ? void 0 : _7.alias) !== null && _8 !== void 0 ? _8 : [],
                            ...Object.keys(defaultAliases).map(alias => ({
                                find: alias,
                                replacement: defaultAliases[alias]
                            }))
                        ]
                        : {
                            ...defaultAliases,
                            ...(_9 = userConfig.resolve) === null || _9 === void 0 ? void 0 : _9.alias,
                        }
                },
                ssr: {
                    noExternal: noExternalInertiaHelpers(userConfig),
                },
            };
        },
        configResolved(config) {
            resolvedConfig = config;
        },
        transform(code) {
            if (resolvedConfig.command === 'serve') {
                code = code.replace(/__laravel_vite_placeholder__/g, viteDevServerUrl);
                return pluginConfig.transformOnServe(code, viteDevServerUrl);
            }
        },
        configureServer(server) {
            var _a, _b;
            const envDir = resolvedConfig.envDir || process.cwd();
            const appUrl = (_a = (0, vite_1.loadEnv)(resolvedConfig.mode, envDir, 'APP_URL').APP_URL) !== null && _a !== void 0 ? _a : 'undefined';
            (_b = server.httpServer) === null || _b === void 0 ? void 0 : _b.once('listening', () => {
                var _a;
                const address = (_a = server.httpServer) === null || _a === void 0 ? void 0 : _a.address();
                const isAddressInfo = (x) => typeof x === 'object';
                if (isAddressInfo(address)) {
                    viteDevServerUrl = resolveDevServerUrl(address, server.config);
                    fs_1.default.writeFileSync(pluginConfig.hotFile, viteDevServerUrl);
                    setTimeout(() => {
                        server.config.logger.info(`\n  ${picocolors_1.default.red(`${picocolors_1.default.bold('LARAVEL')} ${laravelVersion()}`)}  ${picocolors_1.default.dim('plugin')} ${picocolors_1.default.bold(`v${pluginVersion()}`)}`);
                        server.config.logger.info('');
                        server.config.logger.info(`  ${picocolors_1.default.green('➜')}  ${picocolors_1.default.bold('APP_URL')}: ${picocolors_1.default.cyan(appUrl.replace(/:(\d+)/, (_, port) => `:${picocolors_1.default.bold(port)}`))}`);
                    }, 100);
                }
            });
            if (!exitHandlersBound) {
                const clean = () => {
                    if (fs_1.default.existsSync(pluginConfig.hotFile)) {
                        fs_1.default.rmSync(pluginConfig.hotFile);
                    }
                };
                process.on('exit', clean);
                process.on('SIGINT', process.exit);
                process.on('SIGTERM', process.exit);
                process.on('SIGHUP', process.exit);
                exitHandlersBound = true;
            }
            return () => server.middlewares.use((req, res, next) => {
                if (req.url === '/index.html') {
                    res.statusCode = 404;
                    res.end(fs_1.default.readFileSync(path_1.default.join(__dirname, 'dev-server-index.html')).toString().replace(/{{ APP_URL }}/g, appUrl));
                }
                next();
            });
        }
    };
}
/**
 * Validate the command can run in the given environment.
 */
function ensureCommandShouldRunInEnvironment(command, env) {
    if (command === 'build' || env.LARAVEL_BYPASS_ENV_CHECK === '1') {
        return;
    }
    if (typeof env.LARAVEL_VAPOR !== 'undefined') {
        throw Error('You should not run the Vite HMR server on Vapor. You should build your assets for production instead. To disable this ENV check you may set LARAVEL_BYPASS_ENV_CHECK=1');
    }
    if (typeof env.LARAVEL_FORGE !== 'undefined') {
        throw Error('You should not run the Vite HMR server in your Forge deployment script. You should build your assets for production instead. To disable this ENV check you may set LARAVEL_BYPASS_ENV_CHECK=1');
    }
    if (typeof env.LARAVEL_ENVOYER !== 'undefined') {
        throw Error('You should not run the Vite HMR server in your Envoyer hook. You should build your assets for production instead. To disable this ENV check you may set LARAVEL_BYPASS_ENV_CHECK=1');
    }
    if (typeof env.CI !== 'undefined') {
        throw Error('You should not run the Vite HMR server in CI environments. You should build your assets for production instead. To disable this ENV check you may set LARAVEL_BYPASS_ENV_CHECK=1');
    }
}
/**
 * The version of Laravel being run.
 */
function laravelVersion() {
    var _a, _b, _c;
    try {
        const composer = JSON.parse(fs_1.default.readFileSync('composer.lock').toString());
        return (_c = (_b = (_a = composer.packages) === null || _a === void 0 ? void 0 : _a.find((composerPackage) => composerPackage.name === 'laravel/framework')) === null || _b === void 0 ? void 0 : _b.version) !== null && _c !== void 0 ? _c : '';
    }
    catch {
        return '';
    }
}
/**
 * The version of the Laravel Vite plugin being run.
 */
function pluginVersion() {
    var _a;
    try {
        return (_a = JSON.parse(fs_1.default.readFileSync(path_1.default.join(__dirname, '../package.json')).toString())) === null || _a === void 0 ? void 0 : _a.version;
    }
    catch {
        return '';
    }
}
/**
 * Convert the users configuration into a standard structure with defaults.
 */
function resolvePluginConfig(config) {
    var _a, _b, _c, _d, _e, _f, _g, _h, _j;
    if (typeof config === 'undefined') {
        throw new Error('laravel-vite-plugin: missing configuration.');
    }
    if (typeof config === 'string' || Array.isArray(config)) {
        config = { input: config, ssr: config };
    }
    if (typeof config.input === 'undefined') {
        throw new Error('laravel-vite-plugin: missing configuration for "input".');
    }
    if (typeof config.publicDirectory === 'string') {
        config.publicDirectory = config.publicDirectory.trim().replace(/^\/+/, '');
        if (config.publicDirectory === '') {
            throw new Error('laravel-vite-plugin: publicDirectory must be a subdirectory. E.g. \'public\'.');
        }
    }
    if (typeof config.buildDirectory === 'string') {
        config.buildDirectory = config.buildDirectory.trim().replace(/^\/+/, '').replace(/\/+$/, '');
        if (config.buildDirectory === '') {
            throw new Error('laravel-vite-plugin: buildDirectory must be a subdirectory. E.g. \'build\'.');
        }
    }
    if (typeof config.ssrOutputDirectory === 'string') {
        config.ssrOutputDirectory = config.ssrOutputDirectory.trim().replace(/^\/+/, '').replace(/\/+$/, '');
    }
    if (config.refresh === true) {
        config.refresh = [{ paths: exports.refreshPaths }];
    }
    return {
        input: config.input,
        publicDirectory: (_a = config.publicDirectory) !== null && _a !== void 0 ? _a : 'public',
        buildDirectory: (_b = config.buildDirectory) !== null && _b !== void 0 ? _b : 'build',
        ssr: (_c = config.ssr) !== null && _c !== void 0 ? _c : config.input,
        ssrOutputDirectory: (_d = config.ssrOutputDirectory) !== null && _d !== void 0 ? _d : 'bootstrap/ssr',
        refresh: (_e = config.refresh) !== null && _e !== void 0 ? _e : false,
        hotFile: (_f = config.hotFile) !== null && _f !== void 0 ? _f : path_1.default.join(((_g = config.publicDirectory) !== null && _g !== void 0 ? _g : 'public'), 'hot'),
        valetTls: (_h = config.valetTls) !== null && _h !== void 0 ? _h : false,
        transformOnServe: (_j = config.transformOnServe) !== null && _j !== void 0 ? _j : ((code) => code),
    };
}
/**
 * Resolve the Vite base option from the configuration.
 */
function resolveBase(config, assetUrl) {
    return assetUrl + (!assetUrl.endsWith('/') ? '/' : '') + config.buildDirectory + '/';
}
/**
 * Resolve the Vite input path from the configuration.
 */
function resolveInput(config, ssr) {
    if (ssr) {
        return config.ssr;
    }
    return config.input;
}
/**
 * Resolve the Vite outDir path from the configuration.
 */
function resolveOutDir(config, ssr) {
    if (ssr) {
        return config.ssrOutputDirectory;
    }
    return path_1.default.join(config.publicDirectory, config.buildDirectory);
}
function resolveFullReloadConfig({ refresh: config }) {
    if (typeof config === 'boolean') {
        return [];
    }
    if (typeof config === 'string') {
        config = [{ paths: [config] }];
    }
    if (!Array.isArray(config)) {
        config = [config];
    }
    if (config.some(c => typeof c === 'string')) {
        config = [{ paths: config }];
    }
    return config.flatMap(c => {
        const plugin = (0, vite_plugin_full_reload_1.default)(c.paths, c.config);
        /* eslint-disable-next-line @typescript-eslint/ban-ts-comment */
        /** @ts-ignore */
        plugin.__laravel_plugin_config = c;
        return plugin;
    });
}
/**
 * Resolve the dev server URL from the server address and configuration.
 */
function resolveDevServerUrl(address, config) {
    var _a;
    const configHmrProtocol = typeof config.server.hmr === 'object' ? config.server.hmr.protocol : null;
    const clientProtocol = configHmrProtocol ? (configHmrProtocol === 'wss' ? 'https' : 'http') : null;
    const serverProtocol = config.server.https ? 'https' : 'http';
    const protocol = clientProtocol !== null && clientProtocol !== void 0 ? clientProtocol : serverProtocol;
    const configHmrHost = typeof config.server.hmr === 'object' ? config.server.hmr.host : null;
    const configHost = typeof config.server.host === 'string' ? config.server.host : null;
    const serverAddress = isIpv6(address) ? `[${address.address}]` : address.address;
    const host = (_a = configHmrHost !== null && configHmrHost !== void 0 ? configHmrHost : configHost) !== null && _a !== void 0 ? _a : serverAddress;
    const configHmrClientPort = typeof config.server.hmr === 'object' ? config.server.hmr.clientPort : null;
    const port = configHmrClientPort !== null && configHmrClientPort !== void 0 ? configHmrClientPort : address.port;
    return `${protocol}://${host}:${port}`;
}
function isIpv6(address) {
    return address.family === 'IPv6'
        // In node >=18.0 <18.4 this was an integer value. This was changed in a minor version.
        // See: https://github.com/laravel/vite-plugin/issues/103
        // eslint-disable-next-line @typescript-eslint/ban-ts-comment
        // @ts-ignore-next-line
        || address.family === 6;
}
/**
 * Add the Inertia helpers to the list of SSR dependencies that aren't externalized.
 *
 * @see https://vitejs.dev/guide/ssr.html#ssr-externals
 */
function noExternalInertiaHelpers(config) {
    var _a;
    /* eslint-disable-next-line @typescript-eslint/ban-ts-comment */
    /* @ts-ignore */
    const userNoExternal = (_a = config.ssr) === null || _a === void 0 ? void 0 : _a.noExternal;
    const pluginNoExternal = ['laravel-vite-plugin'];
    if (userNoExternal === true) {
        return true;
    }
    if (typeof userNoExternal === 'undefined') {
        return pluginNoExternal;
    }
    return [
        ...(Array.isArray(userNoExternal) ? userNoExternal : [userNoExternal]),
        ...pluginNoExternal,
    ];
}
/**
 * Resolve the server config from the environment.
 */
function resolveEnvironmentServerConfig(env) {
    if (!env.VITE_DEV_SERVER_KEY && !env.VITE_DEV_SERVER_CERT) {
        return;
    }
    if (!fs_1.default.existsSync(env.VITE_DEV_SERVER_KEY) || !fs_1.default.existsSync(env.VITE_DEV_SERVER_CERT)) {
        throw Error(`Unable to find the certificate files specified in your environment. Ensure you have correctly configured VITE_DEV_SERVER_KEY: [${env.VITE_DEV_SERVER_KEY}] and VITE_DEV_SERVER_CERT: [${env.VITE_DEV_SERVER_CERT}].`);
    }
    const host = resolveHostFromEnv(env);
    if (!host) {
        throw Error(`Unable to determine the host from the environment's APP_URL: [${env.APP_URL}].`);
    }
    return {
        hmr: { host },
        host,
        https: {
            key: fs_1.default.readFileSync(env.VITE_DEV_SERVER_KEY),
            cert: fs_1.default.readFileSync(env.VITE_DEV_SERVER_CERT),
        },
    };
}
/**
 * Resolve the host name from the environment.
 */
function resolveHostFromEnv(env) {
    try {
        return new URL(env.APP_URL).host;
    }
    catch {
        return;
    }
}
/**
 * Resolve the valet server config for the given host.
 */
function resolveValetServerConfig(host) {
    if (host === false) {
        return;
    }
    host = host === true ? resolveValetHost() : host;
    const keyPath = path_1.default.resolve(os_1.default.homedir(), `.config/valet/Certificates/${host}.key`);
    const certPath = path_1.default.resolve(os_1.default.homedir(), `.config/valet/Certificates/${host}.crt`);
    if (!fs_1.default.existsSync(keyPath) || !fs_1.default.existsSync(certPath)) {
        throw Error(`Unable to find Valet certificate files for your host [${host}]. Ensure you have run "valet secure".`);
    }
    return {
        hmr: { host },
        host,
        https: {
            key: fs_1.default.readFileSync(keyPath),
            cert: fs_1.default.readFileSync(certPath),
        },
    };
}
/**
 * Resolve the valet valet host for the current directory.
 */
function resolveValetHost() {
    const configPath = os_1.default.homedir() + `/.config/valet/config.json`;
    if (!fs_1.default.existsSync(configPath)) {
        throw Error('Unable to find the Valet configuration file. You will need to manually specify the host in the `valetTls` configuration option.');
    }
    const config = JSON.parse(fs_1.default.readFileSync(configPath, 'utf-8'));
    return path_1.default.basename(process.cwd()) + '.' + config.tld;
}
