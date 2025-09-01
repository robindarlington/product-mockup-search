import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./app/Livewire/**/*.php",
    ],

    theme: {
        extend: {
            colors: {
                violet: "#1f0933",

                lavande_dark: "#5d5c8a",
                lavande: "#cac7e5",
                lavande_1: "#d9d8ee",
                lavande_2: "#e9e8f5",

                anis: "#c5d16f",
                anis_dark: "#97a634",
                anis_1: "#dce282",
                anis_2: "#eef0bc",

                kraft: "#eaddcc",
                kraft_dark: "#d5c4ae",

                coton: "#fbfaf6",
                coton_dark: "#eadeca",

                orange: "#ffb100",
                orange_dark: "#f49b00",
                orange_1: "#fed150",
                orange_2: "#ffe36e",

                jaune: "#ffe744",
                jaune_1: "#fff593",
                jaune_dark: "#f2d700",
                jaune_dark_1: "#dcc000",

                peche: "#f8bd92",
                peche_1: "#fcd7b0",
                peche_2: "#fff2db",

                rose: "#f6c0c5",
                rose_1: "#fbe2e3",
                rose_dark: "#f2a2ae",
            },
            fontFamily: {
                alegreya: ["Alegreya Sans", "sans-serif"],
                albert: ["Albert Sans", "sans-serif"],
                caveat: ["Caveat", "cursive"],
            },
        },
    },

    plugins: [forms],
};
