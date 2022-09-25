const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    safelist: [
        { pattern: /bg-(.*)/ },
        { pattern: /text-(.*)/ },
        { pattern: /col-(.*)/ },
        { pattern: /row-(.*)/ },
        { pattern: /grid-cols-(.*)/ },
        { pattern: /grid-rows-(.*)/ },
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Cairo', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('daisyui'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
