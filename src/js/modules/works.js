'use strict';

var worksSlider;
var worksSelector = Array.from(document.querySelectorAll('.works__swiper'));
if (worksSelector.length > 0) {
  function initWorksSwiper() {
      if(document.body.clientWidth <= 1250) {

           worksSlider = new Swiper('.works__swiper', {
              slidesPerView: 'auto',
              speed: 2000,
              spaceBetween: 20,
              loop:true,
              autoplay: {
                delay: 3000,
              },
            });

          return worksSlider;
      } else {
          if (worksSlider) {
           worksSlider.destroy();
          }
       worksSlider = undefined;
          return worksSlider;
      }
  }

  initWorksSwiper();

  $(window).on('resize', function() {
      setTimeout(initWorksSwiper, 500)
      console.log('12312')
  })
}

$(function() {
  $("[data-fancybox]").fancybox();
  });
