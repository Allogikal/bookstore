<?
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/reset.css">
  <link rel="stylesheet" href="/assets/css/styleadmin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <title>Admin</title>
  <link rel="shortcut icon" href="/assets/img/wepik-hand-drawn-monocolor-publisher-logo-20221023-95419.svg" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;800&display=swap" rel="stylesheet">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>
  <section class="menu">
    <!-- Логотип -->
    <p class="menu__logo logo">Админ</p>
    <a class="exit text-center text-decoration-none text-black" href="../controllers/logoutController.php">Выйти</a>
    <!-- Основное меню -->
    <ul class="menu__list list">
      <!-- Элемент меню -->

      <li class="menu__item item">
        <a href="./admin.php" class="menu__link link">
          <span>Пользователи</span>
        </a>
      </li>
      <li class="menu__item item">
        <a href="./adminbook.php" class="menu__link link">
          <span>Посты</span>
        </a>
      </li>

    </ul>
  </section>
  <section class="content">
    <h2>Пользователи</h2>
    <div class="grid">
        <div class="grid__user">
        <div class="user__comm">
          <img class="ava__comm" src="/assets/img/man.png" alt="картинку съел таракан">
          <label class="nick__comm">User</label>
        </div>
        <button type="submit">Бан</button>
      </div>

    </div>

  </section>
</body>

</html>