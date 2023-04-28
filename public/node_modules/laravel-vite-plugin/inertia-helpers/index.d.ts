export declare function resolvePageComponent<T>(path: string, pages: Record<string, Promise<T> | (() => Promise<T>)>): Promise<T>;
