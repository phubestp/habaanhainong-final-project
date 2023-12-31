/** @type {import('tailwindcss').Config} */

module.exports = {
  content: [
    "./src/main/resources/templates/**/*.{html,js}",
    "./src/main/resources/templates/fragments/**/*.{html,js}"
  ],
  theme: {
    colors: {
      'primary': '#004225',
      'secondary': '#FFB000',
      'background': '#FAF8F1',
      'white': '#FFFFFF',
      'red' : '#F32013',
      'yellow' : '#FFB000'
    },
    fontFamily : {
      sans: ['Mitr', 'sans-serif']
    },
    extend: {},
  },
  plugins: [
  ],
}