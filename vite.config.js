import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'Modules/Dashboard/resources/assets/js/create-betting-pool-modal.js'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            '~modules': '/Modules',
        }
    },
    server: {
        host: '0.0.0.0',
        port: 5173
    }
});
