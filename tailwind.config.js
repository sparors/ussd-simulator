module.exports = {
  purge: [],
  theme: {
    extend: {
      fontFamily: {
        'muli': ['Muli', 'sans-serif'],
        'ubuntu': ['Ubuntu', 'sans-serif']
      },
      height: {
        'screen-80': '80vh',
      },
      borderRadius: {
        'xl': '1rem',
        '2xl': '2rem',
      }
    },
  },
  variants: {},
  plugins: [
    require('@tailwindcss/custom-forms'),
  ],
}
