import defaultTheme from 'tailwindcss/defaultTheme';
import colors from "tailwindcss/colors.js";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                'black': '#090909',
                'primary-green': '#1db41d',
                'light-green': '#25FD25',
                'dark-green' : '#008000',
                'white': '#fff',
                'secondary': '#687279',
                ...colors,
            },
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
                skill: ['Silkscreen', ...defaultTheme.fontFamily.sans],
                dashboard: ['Roboto', 'Arial', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                '2xs': '10px',
            },
            keyframes: {
                "typing-loop": {
                    "0%": { width: "0%", borderColor: "primary-green" },
                    "95%": { width: "100%", borderColor: "primary-green" },
                    "100%": { width: "100%", borderColor: "transparent" },
                },
                blink: {
                    "0%, 100%": { borderColor: "transparent" },
                    "50%": { borderColor: "primary-green" },
                },
            },
            animation: {
                "typing-loop": "typing-loop 4s steps(35) forwards",
                blink: "blink 0.7s step-end infinite",
            },

        },
    },
    plugins: [],
};
