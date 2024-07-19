import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        display: ['Proxima Nova', ...defaultTheme.fontFamily.sans],
      },
    },
  },

  // daisyUI config (optional - here are the default values)
  daisyui: {
    themes: [
      {
        demo: {
          // your theme name
          primary: '#32657c', // primary color
          'primary-focus': '#be551d', // primary color (darker version)
          'primary-content': '#ffffff', // text color for primary color
          secondary: '#c49ad2', // secondary color
          'secondary-focus': '#0b3b73', // secondary color (darker version)
          'secondary-content': '#1f2937', // text color for secondary color
          accent: '#739176', // accent color
          'accent-focus': '#1a202c', // accent color (darker version)
          'accent-content': '#ffffff', // text color for accent color
          neutral: '#1f2937', // neutral color
          'neutral-focus': '#161e2e', // neutral color (darker version)
          'neutral-content': '#ffffff', // text color for neutral color
          'base-100': '#ffffff', // base color of page, used for blank backgrounds
          'base-200': '#f9fafb', // base color, a little darker
          'base-300': '#d1d5db', // base color, even more darker
          'base-content': '#1f2937', // text color for base color
          info: '#2094f3', // info color
          'info-focus': '#147dcb', // info color (darker version)
          'info-content': '#ffffff', // text color for info color
          success: '#009485', // success color
          'success-focus': '#007a6c', // success color (darker version)
          'success-content': '#ffffff', // text color for success color
          warning: '#ff9900', // warning color
          'warning-focus': '#d67c03', // warning color (darker version)
          'warning-content': '#ffffff', // text color for warning color
          error: '#ff5724', // error color
          'error-focus': '#f63000', // error color (darker version)
          'error-content': '#ffffff', // text color for error color
        },
      },
    ], // false: only light + dark | true: all themes | array: specific themes like this ["light", "dark", "cupcake"]
    darkTheme: 'dark', // name of one of the included themes for dark mode
    base: true, // applies background color and foreground color for root element by default
    styled: true, // include daisyUI colors and design decisions for all components
    utils: true, // adds responsive and modifier utility classes
    prefix: '', // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
    logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
    themeRoot: ':root', // The element that receives theme color CSS variables
  },
  plugins: [typography, forms, require('tailwindcss-animate'), require('daisyui')],
}
