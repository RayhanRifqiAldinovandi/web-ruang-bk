/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        customFont: ['Poppins'], // Adding Roboto to the sans family
      },
    },
  },
  plugins: [
    require('daisyui')
  ],
}

