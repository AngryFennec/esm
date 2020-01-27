var contactsSlider;
var pricesSelector = Array.from(document.querySelectorAll('.contacts__swiper'));
if (pricesSelector.length > 0) {
function initContactsSwiper() {
  pricesSelector.foreach
    if(document.body.clientWidth <= 1250) {

         contactsSlider = new Swiper('.contacts__swiper', {
            slidesPerView: 'auto',
            speed: 2000,
            spaceBetween: 20,
            loop:true,
            autoplay: {
              delay: 3000,
            },
          });

        return contactsSlider;
    } else {
        if (contactsSlider) {
         contactsSlider.destroy();
        }
     contactsSlider = undefined;
        return contactsSlider;
    }
}

initContactsSwiper();

$(window).on('resize', function() {
    setTimeout(initContactsSwiper, 500)
})
}