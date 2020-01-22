'use strict';

(function() {
    var testiSelector = document.querySelector('.testimonials__swiper-main');
    if (testiSelector) {
      var swiper = new Swiper(testiSelector,  {
        slidesPerView: 'auto',
          spaceBetween: 30,
          navigation: {
            nextEl: '.testimonials__btn--next',
            prevEl: '.testimonials__btn--prev',
          },
        });
  }
})();
