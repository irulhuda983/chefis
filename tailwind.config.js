/** @type {import('tailwindcss').Config} */
const colors = require("tailwindcss/colors")

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    "./node_modules/vue-tailwind-datepicker/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        "vtd-primary": colors.sky,
        "vtd-secondary": colors.gray,
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

