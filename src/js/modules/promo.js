'use strict';

$('.promo__video-categories').on('click', function (evt) {
    
  evt.preventDefault();
  var target = $(evt.target);
  if (target[0].tagName === 'A') {
    $('.promo__video-category').removeClass('promo__video-category--active');
    target.parent().addClass('promo__video-category--active');
    $('.promo__play-block a').attr('href', target.parent().attr('data-link'));
    $('.promo__video-skin').hide(0);
    $('.promo__video-skin').attr('src', target.parent().attr('data-img'));
    setTimeout(function () {
      $('.promo__video-skin').fadeIn(400);
        }, 150);


  }
});

new WOW().init();
