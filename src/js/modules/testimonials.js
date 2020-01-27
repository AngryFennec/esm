'use strict';

(function() {
  var testimonialsSlider;
  var pricesSelector = Array.from(document.querySelectorAll('.testimonials__swiper'));
  if (pricesSelector.length > 0) {
  function initTestimonialsSwiper() {
    pricesSelector.foreach
      if(document.body.clientWidth <= 1250) {

           testimonialsSlider = new Swiper('.testimonials__swiper', {
              slidesPerView: 'auto',
              speed: 2000,
              spaceBetween: 20,
              loop:true,
              autoplay: {
                delay: 3000,
              },
            });

          return testimonialsSlider;
      } else {
          if (testimonialsSlider) {
           testimonialsSlider.destroy();
          }
       testimonialsSlider = undefined;
          return testimonialsSlider;
      }
  }

  initTestimonialsSwiper();

  $(window).on('resize', function() {
      setTimeout(initTestimonialsSwiper, 500)
  })
}

    var testiSelector = document.querySelector('.testimonials__swiper-main');
    if (testiSelector) {
      var swiper = new Swiper(testiSelector,  {
        slidesPerView: 'auto',
          spaceBetween: 30,
           pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
      },
          navigation: {
            nextEl: '.testimonials__btn--next',
            prevEl: '.testimonials__btn--prev',
          },
        });
  }
})();
