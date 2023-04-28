export async function resolvePageComponent(path, pages) {
    const page = pages[path];
    if (typeof page === 'undefined') {
        throw new Error(`Page not found: ${path}`);
    }
    return typeof page === 'function' ? page() : page;
}
