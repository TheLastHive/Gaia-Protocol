import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss', //Bootstrap
                'resources/css/custom.scss',
                'resources/css/custom.css', // Debe estar vacio para que lo compile SASS
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
