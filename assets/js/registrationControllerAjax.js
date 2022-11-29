$('.reg').click(function (e) {
    e.preventDefault();
    
    let login = $('input[name="login"]').val(),
    password = $('input[name="password"]').val(),
    user_image = $('input[name="user_image"]').val(),
    password_confirm = $('input[name="password"]').val();

    $.ajax({
        url: '/app/controllers/registrationController.php',
        type: 'POST',
        dataType: 'text',
        data: {
            login: login,
            user_image: user_image,
            password: password,
            password_confirm: password_confirm
        },
        success (data) {
            console.log(data);
        }
    })
});