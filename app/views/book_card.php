<?
require $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/_functions.php';
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/reset.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Bibliophil</title>
    <link rel="shortcut icon" href="/assets/img/wepik-hand-drawn-monocolor-publisher-logo-20221023-95419.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <nav>
            <div class="nav">
                <li><img class="logotip" src="/assets/img/wepik-hand-drawn-monocolor-publisher-logo-20221023-95419.png" alt="картинку съел таракан"></li>
                <li><a class="catalog" href="/index.php">Каталог</a></li>
                <li>
                    <div class="logo">
                        <p class="biblio">БИБЛИО</p>
                        <p class="fil">ФИЛ</p>
                    </div>
                </li>
                <li>
                    <?
                    if (isset($_SESSION['user']['login'])) {
                        echo '<img alt="profile" class="ava" src="../../' . $_SESSION['user']['user_image'] . '">' .
                            '<li><a class="user" href="#!">' . $_SESSION['user']['login'] . '</a></li>' .
                            '<li><a class="exit" href="../controllers/logoutController.php">Выйти</a></li>';
                    } else {
                        echo '<li><a class="exit" href="/app/views/autoriz.php">Войти</a></li>';
                    }
                    ?>
                </li>
            </div>

        </nav>

    </header>
    <div class="container">
        <?
        $books_authors = getBooksAuthors($PDO);
        $books_genres = getBooksGenres($PDO);
        $count=0;
        foreach ($_SESSION['item'] as $item) {
            echo '
            <div class="container__info">
            <div class="cover">
                <div class="solid"></div>
                <div class="solid__fill"></div>
                <img class="cover__img" src="../../' . $item['image'] . '" alt="картинку съел таракан">
                <div class="container_rating">
                    <form method="post" action="../controllers/_addRatingController.php">
                        <div class="rating">
                            <label>Рейтинг</label>
                            <p>' . $item['rate'] . '</p>
                            <input style="display:none;" name="rate_count" type="submit" value="'.$item['rate_count'].'">
                        </div>
                        ';
                        if ($_SESSION['user']) {
                            echo '
                            <div class="rating-area">
                            <input type="submit" id="star-1" name="rating" value="5">
                            <label for="star-1" title="Оценка «1»"></label>
                            <input type="submit" id="star-2" name="rating" value="4">
                            <label for="star-2" title="Оценка «2»"></label>
                            <input type="submit" id="star-3" name="rating" value="3">
                            <label for="star-3" title="Оценка «3»"></label>
                            <input type="submit" id="star-4" name="rating" value="2">
                            <label for="star-4" title="Оценка «4»"></label>
                            <input type="submit" id="star-5" name="rating" value="1">
                            <label for="star-5" title="Оценка «5»"></label>
                            </div>
                            ';
                        }
                        echo '
                    </form>
                </div>
            </div>
            <div class="infblock">
                <h1>' . $item['title'] . '</h1>
                <h2>'.$books_authors[$count]['author_name'].'</h2>
                <span class="genre">'.$books_genres[$count]['genre_name'].'</span>
                <div class="year__block">
                    <p>Год издания:</p>
                    <p class="year">' . $item['year'] . '</p>
                </div>
                <div class="container__annotation">
                    <label>О книге</label>
                    <p>' . $item['description'] . '</p>
                </div>
            </div>
        </div>
            ';
            $count++;
        }
        ?>

        <div class="comments">
            <label class="comm">Комментарии</label>
            <?php
            $comments_array = getComments($PDO);
            foreach ($comments_array as $comment) {
                if ($comment['ban_status'] === 0) {
                    if ($comment['book_id'] == $_SESSION['item'][0]['id']) {
                        echo '
                <div class="card">
                <div class="user__comm">
                    <img class="ava__comm" src="/assets/img/man.png" alt="картинку съел таракан">
                    <label class="nick__comm">' . $comment['user_comment'] . '</label>
                    <label style="margin-left: 50px;" class="nick__comm">' . $comment['date_comment'] . '</label>
                </div>

                <p class="comm_text">' . $comment['text'] . '</p>
            </div>
                ';
                    }
                }
            }
            ?>
            <?
            if ($_SESSION['user']) {
                echo '
            <form method="post" action="../controllers/_addCommentController.php" style="margin-top: 20px;" class="mycomment">
            <label class="comm">Оставьте комментарий</label>
            <textarea class="mycomm_text" name="text"></textarea>
            <button class="buttonfill__comm" type="submit">Отправить</button>
        </form>
            ';
            }
            ?>
        </div>
    </div>
    <footer>
        <img src="/assets/img/Rectangle 23.png" alt="картинку съел таракан">
        <img src="/assets/img/Rectangle 3.png" alt="картинку съел таракан">
    </footer>

    <script src="/assets/js/addRateControllerAjax.js"></script>
</body>

</html>