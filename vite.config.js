import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/home.css',
                'resources/css/profile.css',
                'resources/js/home.js',
                'resources/js/profile.js',
            ],
            refresh: true,
        }),
    ],
});
