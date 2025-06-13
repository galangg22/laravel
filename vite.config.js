import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.jsx'
            ],
            refresh: true,
        }),
        react({
            // Konfigurasi untuk React JSX Transform
            jsxRuntime: 'automatic',
            jsxImportSource: 'react',
            babel: {
                plugins: []
            }
        })
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
        },
        extensions: ['.js', '.jsx', '.ts', '.tsx']
    },
    esbuild: {
        jsx: 'automatic',
        jsxImportSource: 'react'
    },
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});