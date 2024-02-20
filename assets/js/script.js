import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
gsap.registerPlugin(ScrollTrigger)
import { putScrollbarSizeInCSSVariables } from './common/functions'
import { menuBurger } from './components/menuBurger'
import { scrollToAnchor } from './components/scrollToAnchor'
import { gsapHeaderLinksOnScroll, gsapTitleAnim } from './components/gsapAnimScroll'

window.addEventListener('DOMContentLoaded', (event) => {
  
  var swiper = new Swiper(".swiper", {
    effect: "coverflow",
    grabCursor: true,
    spaceBetween: 30,
    centeredSlides: false,
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 0,
      modifier: 1,
      slideShadows: false
    },
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    keyboard: {
      enabled: true
    },
    mousewheel: {
      thresholdDelta: 70
    },
    breakpoints: {
      460: {
        slidesPerView: 3
      },
      768: {
        slidesPerView: 3
      },
      1024: {
        slidesPerView: 3
      },
      1600: {
        slidesPerView: 3.6
      }
    }
  });
  
  scrollToAnchor()
  gsapHeaderLinksOnScroll()
  putScrollbarSizeInCSSVariables()
  menuBurger()
})
