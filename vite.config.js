import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/css/user.scss',
                'resources/css/admin.scss',
                'resources/js/app.js',
                'resources/js/user.js',
                'resources/js/admin.js'
                ],
            refresh: true,
        }),
    ],
});
