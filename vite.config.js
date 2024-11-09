import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            reload: [
                'resources/views/**',
            ],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: '0.0.0.0' /* HERE */
        }
    }
});
