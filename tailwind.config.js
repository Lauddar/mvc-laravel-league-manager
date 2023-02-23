const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                'neon-lime': '#B6eB7a',
                'teal': '#17706e',
                'neon-orange': '#fb7813',
                'dark-orange': '#d96c18',
                'light-orange' : '#fc8d38',
                'creme': '#F7F7EE',
                'light-teal': '#1b8582',
            },
            fontFamily: {
                rubik: ['Rubik', ...defaultTheme.fontFamily.sans],
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                pacifico: ['Pacifico'],
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
