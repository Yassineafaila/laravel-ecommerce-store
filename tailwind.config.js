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
                body: "#333",
                headers: "#2B2D42",
                primary: "#D10024",
                dark: "#15161D",
                grey: {
                    light: "#E4E7ED",
                    DEFAULT: "#FBFBFC",
                    dark: "#8D99AE",
                    darker: "#B9BABC",
                },
            },
        },
    },
    plugins: [],
};
