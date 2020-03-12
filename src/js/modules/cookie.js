$('.cookie__button').on('click', function(){
    document.cookie = "cookie=true; path=/"
    $('.cookie').fadeOut(400);
})