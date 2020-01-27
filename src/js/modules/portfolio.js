var portfolioSlider;
var pricesSelector = Array.from(document.querySelectorAll('.portfolio__swiper'));
if (pricesSelector.length > 0) {
  function initPortfolioSwiper() {
    pricesSelector.foreach
      if(document.body.clientWidth <= 1250) {

           portfolioSlider = new Swiper('.portfolio__swiper', {
              slidesPerView: 'auto',
              speed: 2000,
              spaceBetween: 20,
              loop:true,
              autoplay: {
                delay: 3000,
              },
            });

          return portfolioSlider;
      } else {
          if (portfolioSlider) {
           portfolioSlider.destroy();
          }
       portfolioSlider = undefined;
          return portfolioSlider;
      }
  }

  initPortfolioSwiper();

  $(window).on('resize', function() {
      setTimeout(initPortfolioSwiper, 500)
  })
}
