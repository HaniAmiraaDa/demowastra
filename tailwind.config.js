/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
      },
      // Definisi keyframes untuk animasi 'slideRight'
      keyframes: {
        slideRight: {
          '0%': { transform: 'translateX(100%)' }, // Mulai dari luar layar sebelah kanan
          '100%': { transform: 'translateX(-100%)' }, // Bergeser ke luar layar sebelah kiri
        },
      },
      // Menghubungkan keyframes ke properti 'animation'
      animation: {
        slideRight: 'slideRight 15s linear infinite', // Nama animasi, durasi, timing function, pengulangan
      },
    },
  },
  plugins: [],
};