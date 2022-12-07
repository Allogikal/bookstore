<?php
require $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/_functions.php';
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/search.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Bibliophil</title>
    <link rel="shortcut icon" href="./assets/img/wepik-hand-drawn-monocolor-publisher-logo-20221023-95419.svg" type="image/x-icon">
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
                        echo '<img alt="profile" class="ava" src="' . $_SESSION['user']['user_image'] . '">' .
                            '<li><a class="user" href="#!">' . $_SESSION['user']['login'] . '</a></li>' .
                            '<li><a class="exit" href="./app/controllers/logoutController.php">Выйти</a></li>';
                    } else {
                        echo '<li><a class="exit" href="/app/views/autoriz.php">Войти</a></li>';
                    }
                    ?>
                </li>
            </div>

        </nav>

    </header>
    <div class="container">
        <div class="searchdiv">
            <div class="genre__link">
                <form action="" method="post">
                    <p>Жанры</p>
                    <?php
                    $genres_array = getGenres($PDO);
                    foreach ($genres_array as $genre) {
                        echo '
                        <div class="genre__search">
                       <input id="genre" class="genre__submit" name="genre" type="submit" value="' . $genre['id'] . '">
                        <label  for="genre">'.$genre['name'].'</label> </div>
                        ';
                       
                    }
                    ?>
                     
                </form>
            </div>
            <div class="search_box">
                <form action="">
                    <input type="text" autocomplete="off" id="search" name="search" placeholder="Искать здесь...">
                    <input disabled type="submit">
                </form>
                <div id="search_box-result"></div>
            </div>

        </div>

        <!--Карты товаров -->

        <div class="grid">
            <?
            $books_array = getBooks($PDO);
            if ($_POST['genre']) {
                try {
                    $genre_id = $_POST['genre'];
                    $query = "SELECT * FROM books JOIN `books_genres` ON `books`.id = `books_genres`.book_id WHERE `books_genres`.genre_id='$genre_id'";
                $statement = $PDO->PDO->prepare($query);
                $statement->execute();
                $books_array = $statement->fetchAll();
                }
                catch (PDOException $e) {
                    echo "Database error: " . $e->getMessage();
                };
            }
            $i=0;
            foreach ($books_array as $book):
                if ($i === 4) {
                    $i=0;
                }
                echo '
                <form action="/app/controllers/_displayBookController.php" method="POST">
                <div class="first">
                <div class="cover__catalog">
                    <div class="solid__catalog NoFillColor'.$i.'"></div>
                    <div class="solid__fill__catalog FillColor'.$i.'"></div>
                    <img class="cover__img__catalog" src="../../' . $book['image'] . '" alt="артинку съел таракан">
                </div>
                <div class="namebook">
                    <h4>' . $book['title'] . '</h4>
                    <input name="id" style="display:none;" type="text" value="'.$book['id']. '">
                    <h4>'.$book['authors'].'</h4>
                </div>
                <div class="raitbut">
                    <img src="/assets/img/star-svgrepo-com.svg" alt="картинку съел таракан">
                    <p>' . $book['rate'] . '</p>
                    <button class="buttonfill FillColor'.$i.'" type="submit">Подробнее</button>
                </div>
            </div></form>
                ';
                $i++;
            endforeach;
            ?>

        </div>

    </div>
    </div>
    <footer>
        <img src="/assets/img/Rectangle 23.png" alt="картинку съел таракан">
        <img src="/assets/img/Rectangle 3.png" alt="картинку съел таракан">
    </footer>

    <script src="../../assets/js/searchControllerAjax.js"></script>
</body>

</html>