/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./node_modules/preline/dist/*.js",
    ],
    darkMode: 'class',
    theme: {
        fontFamily: {
            montserrat: ["Montserrat", "sans-serif"],
            nunito: ["Nunito", "sans-serif"],
            poppins: ["Poppins", "sans-serif"],
            dmsans: ["DM Sans", "sans-serif"],
            inter: ["Inter", "sans-serif"],
        },
        extend: {
            colors: {
                antiflash: "#f1f7f6",
                caribbean: "#00df81",
                mountain: "#2cc295",
                bangladesh: "#03624c",
                dgreen: "#032221",
                mint: "#2fa98c",
                frog: "#17876d",
                forest: "#095544",
                basil: "#0b453a",
                pine: "#06302b",
                pistachio: "#aacbc4",
                stone: "#7d7d7d",
                rblack: "#021A1A",
                danger: "#d42a34",
                warning: "#ffd827",
                // primary: "#0677ba",

                primary: "#0d9488",
                secondary: "#ffc700",
                primaryhover: "#0f766e",
                secondaryhover: "#E7A02B",

                card1: "#0c8b80",
                card2: "#0d9488",
                card3: "#0e9d90",
                card4: "#0fa697",

                cardhover1: "#0a756c",
                cardhover2: "#0b7c71",
                cardhover3: "#0c877b",
                cardhover4: "#0d8f82",
            },
        },
    },
    plugins: [require("flowbite/plugin"), require("preline/plugin")],
};
