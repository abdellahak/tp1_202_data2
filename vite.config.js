import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import postcss from "./postcss.config.cjs";

export default defineConfig({
    mode: "jit",
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    build: {
        sourcemap: false,
    },
});
