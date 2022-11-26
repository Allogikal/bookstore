$('.login').click(function (e) {
    e.preventDefault();
    
    let login = $('input[name="login"]').val(),
    password = $('input[name="password"]').val();

    $.ajax({
        url: '/app/controllers/LoginController.php',
        type: 'POST',
        dataType: 'text',
        data: {
            login: login,
            password: password
        },
        success (data) {
            console.log(data);
        }
    })
});