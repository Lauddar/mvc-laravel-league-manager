/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        'neon-lime': '#B6eB7a',
        'teal': '#17706e',
        'neon-orange': '#FB7813',
        'dark-orange': '#d96c18',
        'creme': '#F7F7EE',
        'light-teal': '#1b8582',
      },
      fontFamily: {
        rubik: ['Rubik']
      }
    },
  },
  plugins: [],
}
