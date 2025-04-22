import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.jsx"],
            refresh: true,
        }),
        react(),
    ],
    server: {
        host: "0.0.0.0", // <-- importante para aceitar conexões externas (como do Laravel)
        port: 5173,
        strictPort: true,
        watch: {
            usePolling: true,
        },
        cors: true, // <-- habilita CORS
        origin: process.env.VITE_DEV_SERVER || "http://localhost:5173", // <-- avisa qual é a origem
        hmr: {
            host: "localhost", // <-- isso aqui ajuda o Hot Module Reload funcionar bem
        },
    },
});
