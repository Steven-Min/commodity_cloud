import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import Commonjs from "vite-plugin-commonjs";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel(["resources/scss/app.scss", "resources/js/app.ts"]),
        Commonjs(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
