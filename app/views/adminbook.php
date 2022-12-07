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
        <div class="post">
            <h2>Посты</h2>
            <?php
            $books_array = getBooks($PDO);
            $books_authors = getBooksAuthors($PDO);
            $books_genres = getBooksGenres($PDO);
            $count=0;
            foreach ($books_array as $book) {
                echo '
                <div class="container__info">
                <div class="cover">
                    <img class="cover__img" src="../../' . $book['image'] . '" alt="картинку съел таракан">
                    <div class="container_rating">
                        <form method="post" action="">
                            <div class="rating">
                                <label>Рейтинг</label>
                                <p>' . $book['rate'] . '</p>
                            </div>
                        </form>
                    </div>
                    <form action="../controllers/_deleteBookController.php" method="post">
                    <input style="display: none;" type="text" value="' . $book['id'] . '" name="id">
                    <button type="submit">Удалить</button>
                    </form>
                    <button class="redact" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalEdit">Редактировать</button>
                </div>
                <div class="infblock">
                    <h1 class="book_title">' . $book['title'] . '</h1>
                    <h2 class="book_author">Автор: '.$books_authors[$count]['author_name'].'</h2>
                    <span class="genre">Жанр: '.$books_genres[$count]['genre_name'].'</span>
                    <div class="year__block">
                        <p>Год издания:</p>
                        <p class="year">' . $book['year'] . '</p>
                    </div>
                    <div class="container__annotation">
                        <label>О книге</label>
                        <p>' . $book['description'] . '</p>
                    </div>
                </div>
            </div>
                ';
                $count++;
            }
            ?>
        </div>
    </section>
    <!-- Modal ADD -->
    <div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Создать пост</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="modal"></div>

                    <form action="../controllers/_insertBookController.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="title" placeholder="введите название">
                        <?php 
                        $books_array = getBooks($PDO);
                        foreach ($books_array as $book) {
                            echo '
                        <input style="display:none;" name="id" type="text" value="'.$book['id'].'">                        
                        ';
                        }
                        ?>
                        <p>Выберите авторов</p>
                        <select name="author">
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
                        <input type="text" name="year" placeholder="введите год">
                        <p>Выберите жанры</p>
                        <select name="genre">
                        <?php
                        $genres_array = getGenres($PDO);
                        foreach ($genres_array as $genre) {
                            echo '
                                    <option value="'.$genre['id'].'">'.$genre['name'].'</option>
                                    ';
                        }
                        ?>
                        </select>
                        <textarea class="description" name="description" placeholder="введите описание"></textarea>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn__modal">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal EDIT -->
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить пост</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="modal"></div>

                    <form action="../controllers/_updateBookController.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="title" placeholder="введите название">
                        <?php 
                        $books_array = getBooks($PDO);
                        foreach ($books_array as $book) {
                            echo '
                        <input style="display:none;" name="id" type="text" value="'.$book['id'].'">                        
                        ';
                        }
                        ?>
                        <p>Выберите авторов</p>
                        <select name="author">
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
                        <input type="text" name="year" placeholder="введите год">
                        <p>Выберите жанры</p>
                        <select name="genre">
                        <?php
                        $genres_array = getGenres($PDO);
                        foreach ($genres_array as $genre) {
                            echo '
                                    <option value="'.$genre['id'].'">'.$genre['name'].'</option>
                                    ';
                        }
                        ?>
                        </select>
                        <textarea class="description" name="description" placeholder="введите описание"></textarea>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn__modal">Изменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>