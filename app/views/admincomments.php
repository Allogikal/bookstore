<?
require $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/_functions.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>
    <section class="menu">
        <!-- Логотип -->
        <p class="menu__logo logo">Админ</p>
        <!-- Основное меню -->
        <ul class="menu__list list">
            <!-- Элемент меню -->

            <li class="menu__item item">
                <a class="menu__link link" href="../controllers/logoutController.php">
                    <span><b>Выйти</b></span>
                </a>
            </li>
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
            <li class="menu__item item">
                <a href="./admincomments.php" class="menu__link link">
                    <span>Комментарии</span>
                </a>
            </li>

        </ul>
    </section>
    <section class="content">
        <div class="post">
            <h2>Комментарии</h2>
            <?php
            $comments_array = getComments($PDO);
            foreach ($comments_array as $comment) {
                if ($comment['ban_status'] == 0) {
                    echo '
                    <form method="post" action="../controllers/_banCommentController.php">
                <div class="grid__user">
                <div style="display: flex; flex-direction: column;" class="user__comm">
                  <label class="nick__comm">' . $comment['user_comment'] . '</label>
                  <label class="nick__comm">' . $comment['date_comment'] . '</label>
                  <label class="nick__comm">' . $comment['text'] . '</label>
                </div>
                <input name="id" style="display: none;" value="'.$comment['id'].'">
                <button type="submit">Бан</button>
              </div>
              </form>
                ';
                  }
                  else {
                      echo '
                      <form method="post" action="../controllers/_unbanCommentController.php">
                <div class="grid__user">
                <div style="display: flex; flex-direction: column;" class="user__comm">
                  <label style="color: red;" class="nick__comm">' . $comment['user_comment'] . '</label>
                  <label style="color: red;" class="nick__comm">' . $comment['date_comment'] . '</label>
                  <label style="color: red;" class="nick__comm">' . $comment['text'] . '</label>
                </div>
                <input name="id" style="display: none;" value="'.$comment['id'].'">
                <button type="submit">Разбанить</button>
              </div>
              </form>
                ';
                  }
            }
            ?>
        </div>
    </section>

</body>

</html>