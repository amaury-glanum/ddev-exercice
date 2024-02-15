import { putScrollbarSizeInCSSVariables } from './common/functions'
import { menuBurger } from './components/menuBurger'

window.addEventListener('DOMContentLoaded', (event) => {
  /*
   * Feature code example
   * */
  putScrollbarSizeInCSSVariables()
  menuBurger()
})
