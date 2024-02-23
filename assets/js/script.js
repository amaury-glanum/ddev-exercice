import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
gsap.registerPlugin(ScrollTrigger)
import { getSwiperJs } from './components/swiper'
import { modalToggle } from './components/modal'
import { putScrollbarSizeInCSSVariables } from './common/functions'
import { menuBurger } from './components/menuBurger'
// import { scrollToAnchor } from './components/scrollToAnchor'
import { scrollToId } from './components/scroll'
import { gsapHeaderLinksOnScroll, gsapTitleAnim } from './components/gsapAnimScroll'

window.addEventListener('DOMContentLoaded', (event) => {
  
  getSwiperJs()
  modalToggle()
  scrollToId()
  gsapHeaderLinksOnScroll()
  putScrollbarSizeInCSSVariables()
  menuBurger()
})
