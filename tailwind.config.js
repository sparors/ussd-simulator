module.exports = {
  purge: [
    './resources/views/**/*.blade.php'
  ],
  theme: {
    extend: {
      fontFamily: {
        'muli': ['Muli', 'sans-serif'],
        'ubuntu': ['Ubuntu', 'sans-serif']
      },
      spacing: {
        '72': '18rem',
        '135': '33.75rem'
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
