<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="/assets/img/wepik-hand-drawn-monocolor-publisher-logo-20221023-95419.svg" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;800&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <title>Authorization</title>
  <link rel="stylesheet" href="/assets/css/styleaut.css">
  <link rel="stylesheet" href="/assets/reset.css">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>
  <form action="/app/controllers/LoginController.php" method="post">
    <h2>Войдите в личный кабинет</h2>
    <input type="text" name="login" placeholder="введите свой логин">
    <input type="password" name="password" placeholder="введите пароль">
    <button class="login" type="submit">Войти</button>
    <p>У вас нет аккаунта? - <a href="/app/views/regist.php">Зарегистрируйтесь</a></p>
  </form>
  <img src="/assets/img/Bookshop-bro.svg" alt="">

  <!-- Авторизация на ajax -->
  <script src="/assets/js/moduleSignIn.js"></script>
</body>

</html>