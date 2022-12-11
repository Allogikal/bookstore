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
                <button class="create" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">Создать</button>
            </li>
            <li class="menu__item item">
                <a href="./admincomments.php" class="menu__link link">
                    <span>Комментарии</span>
                </a>
            </li>

        </ul>
    </section>
    <section class="content">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить пост</h1>
                </div>
                <div class="modal-body">
                    <form style="display: flex; flex-direction: column;" action="../controllers/_updateBookController.php" method="post" enctype="multipart/form-data">
                        <?php 
                        echo '
                        <input type="text" name="title" value="'.$_POST['title'].'" placeholder="Введите название">
                        ';
                            echo '
                        <input style="display:none;" name="id" type="text" value="'.$_POST['id'].'">                        
                        ';
                        ?>
                        <p>Выберите авторов</p>
                        <select multiple name="author[]">
                        <?php
                        $authors_array = getAuthors($PDO);
                        foreach ($authors_array as $author) {
                            echo '
                                    <option value="'.$author['id'].'">'.$author['name'].'</option>
                                    ';
                        }
                        ?>
                        </select>
                        <label class="input-file">
                            <input type="file" name="image_book">
                            <span>выберите обложку</span>
                        </label>
                        <?php 
                        echo '
                        <input type="text" name="year" value="'.$_POST['year'].'" placeholder="введите год">
                        ';
                        ?>
                        <p>Выберите жанры</p>
                        <select multiple name="genre[]">
                        <?php
                        $genres_array = getGenres($PDO);
                        foreach ($genres_array as $genre) {
                            echo '
                                    <option value="'.$genre['id'].'">'.$genre['name'].'</option>
                                    ';
                        }
                        ?>
                        </select>
                        <?
                        echo '
                        <textarea class="description" name="description" placeholder="введите описание">'.$_POST['description'].'</textarea>
                        ';
                        ?>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn__modal">Изменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>