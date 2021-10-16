module.exports = {
  purge: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        backgroundImage: {
            'real-estate': "url('/img/real-estate.jpg')",
            'do-for-you': "url('/img/do-for-you.jpg')",
            'mobile': "url('/img/mobile.png')"
        },
        colors: {
            'black-light': '#3E3E3D',
            'brand-main': '#0FCCD8'
        },
        fontFamily: {
            'main': ['Poppins', 'Helvetica', 'sans-serif']
        },
        zIndex: {
            '1': 1,
            '2': 2,
            '3': 3
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
