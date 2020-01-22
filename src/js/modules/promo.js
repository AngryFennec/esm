'use strict';

$('.promo__video-categories').on('click', function (evt) {
    
  evt.preventDefault();
  var target = $(evt.target);
  if (target[0].tagName === 'A') {
    $('.promo__video-category').removeClass('promo__video-category--active');
    target.parent().addClass('promo__video-category--active');
    $('.promo__video-skin').fadeOut(0).attr('src', target.parent().attr('data-img')).fadeIn(400);
    $('.promo__play-block a').attr('href', target.parent().attr('data-link'));

  }
});
