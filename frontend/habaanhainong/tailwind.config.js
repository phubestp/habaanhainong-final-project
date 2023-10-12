/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/main/resources/templates/**/*.html",
    "./src/main/resources/templates/fragments/**/*.html"
  ],
  theme: {
    colors: {
      'primary': '#004225',
      'secondary': '#FFB000',
      'background': '#FAF8F1',
      'white': '#FFFFFF'
    },
    fontFamily : {
      sans: ['Mitr', 'sans-serif']
    },
    extend: {},
  },
  plugins: [],
}