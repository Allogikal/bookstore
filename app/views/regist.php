<?
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Registration</title>
  <link rel="shortcut icon" href="/assets/img/wepik-hand-drawn-monocolor-publisher-logo-20221023-95419.svg" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/styleaut.css">
  <link rel="stylesheet" href="/assets/reset.css">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>

  <form class="registration_form" action="/app/controllers/registrationController.php" method="post" enctype="multipart/form-data">
    <h2>Добро пожаловать!</h2>
    <input type="text" name="login" placeholder="введите логин">
    <label class="input-file">
      <input type="file" name="user_image">
      <span>выберите файл</span>
    </label>
    <input type="password" name="password" placeholder="введите пароль">
    <input type="password" name="password_confirm" placeholder="подтвердите пароль">
    <button class="reg" type="submit">Зарегистрироваться</button>
    <p>Уже есть аккаунт? - <a href="/app/views/autoriz.php">Авторизируйтесь</a></p>

    <?
    if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
    }
    unset($_SESSION['message']);
    ?>
  </form>

  <img src="/assets/img/Book lover-bro.svg" alt="qwerty">

  <!-- Регистрация на Ajax -->
  <script src="/assets/js/registrationControllerAjax.js"></script>

</body>

</html>