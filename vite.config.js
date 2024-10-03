import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/app.css',
            ],
            refresh: true,
        }),
         vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        proxy: {
          '/api': {
            target: 'http://127.0.0.1:8000/api/asdfasdfasdfa',
            changeOrigin: true,
            rewrite: (path) => path.replace(/^\/api/, '/api')
          }
        }
      }
    // resolve: {
    //     alias: {
    //         vue: 'vue/dist/vue.esm-bundler.js',
    //     },
    // },
});
