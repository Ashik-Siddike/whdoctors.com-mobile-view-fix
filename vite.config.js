import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/admin/assets/scss/style.scss',
                'resources/css/admin/assets/scss/table.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
