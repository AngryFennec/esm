$('.contacts__form form').on('submit', function (evt) {
    evt.preventDefault();
    $.ajax({
        url: '/wp-content/themes/twentyseventeen/assets/send.php',
        processData: false,
        contentType: false,
        data: JSON.stringify({
            'name': $('input[name="name"]').val(),
            'phone': $('input[name="phone"]').val(),
            'message': $('input[name="message"]').val()
        }),
        type: 'POST',
        success: function (answer) {
            console.log(answer);
        },
        error: function (answer) {
            console.log('error');
        }
    });
});