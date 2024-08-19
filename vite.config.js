import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'
import inject from '@rollup/plugin-inject';

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
        
        inject({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
          }),
    ],
    server: {
        host: true,
        hmr: {
            // host: '192.168.0.12'
            host: 'localhost'
        }
      },
      resolve: {
          alias: {
              '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
          }
      },
});
