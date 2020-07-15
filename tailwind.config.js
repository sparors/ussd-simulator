module.exports = {
  purge: [
    './resources/views/**/*.blade.php'
  ],
  theme: {
    extend: {
      colors: {
        'blue': {
          'default': '#05668D',
          'light': '#197295',
          '800': '#2C5282'
        },
        'yellow': '#FFC45B',
        'off-white': '#FFFFFFB0',
        'ash': {
          'default': '#DDE6E9',
          'light': '#E5EFF3',
          'dark': '#B1CFDC',
          'darker': '#4C545B',
          'darkest': '#1D3F4D',
        }
      },
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
