import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    }
  },
  server: {
    port: 3000,
    proxy: {
      '/api': {
        target: 'http://localhost/api',
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, '')
      },
      '/sanctum/csrf-cookie': {
        target: 'http://localhost/sanctum/csrf-cookie',
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/sanctum\/csrf-cookie/, '')
      }
    }
  }
})
