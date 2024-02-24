export const getSwiperJs = () => {
    
    var swiper = new Swiper(".swiper", {
        effect: "coverflow",
        grabCursor: true,
        spaceBetween: 20,
        centeredSlides: false,
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 0,
          modifier: 1,
          slideShadows: false
        },
        loop: true,
        // navigation: {
        //   nextEl: '.swiper-button-next',
        //   prevEl: '.swiper-button-prev',
        // },
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
          576: {
            slidesPerView: 1
          },
          768: {
            slidesPerView: 1
          },
          992: {
            slidesPerView: 2
          },
          1200: {
            slidesPerView: 2
          },
          1440 : {
            slidesPerView: 3
          },
          1700: {
            slidesPerView: 3
          }
        }
      });
}