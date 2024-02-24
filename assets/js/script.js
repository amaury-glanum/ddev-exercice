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

  var swiperSlides = document.querySelectorAll('.swiper-slide');
  
  swiperSlides.forEach(function(slide) {
    console.log('slide', slide)
    var imageId = slide.getAttribute('data-imageid');
    slide.style.background = "linear-gradient(to bottom, #2c536400, #203a4303, #0f2027cc), url('" + imageId + "') no-repeat 50% 50% / cover";
  });
  
  getSwiperJs()
  modalToggle()
  scrollToId()
  gsapHeaderLinksOnScroll()
  putScrollbarSizeInCSSVariables()
  menuBurger()
})
