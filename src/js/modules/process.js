var processSlider;
var processSelector = Array.from(document.querySelectorAll('.process__swiper'));
if (processSelector.length > 0) {
  function initProcessSwiper() {
      if(document.body.clientWidth <= 1250) {

           processSlider = new Swiper('.process__swiper', {
              slidesPerView: 'auto',
              speed: 2000,
              spaceBetween: 20,
              loop:true,
              autoplay: {
                delay: 3000,
              },
            });

          return processSlider;
      } else {
          if (processSlider) {
           processSlider.destroy();
          }
       processSlider = undefined;
          return processSlider;
      }
  }

  initProcessSwiper();

  $(window).on('resize', function() {
      setTimeout(initProcessSwiper, 500)
      console.log('12312')
  })
}
