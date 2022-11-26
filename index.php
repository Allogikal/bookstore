<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
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
                <li><img class="logotip" src="/assets/img/wepik-hand-drawn-monocolor-publisher-logo-20221023-95419.png"
                        alt="картинку съел таракан"></li>
                <li><a class="catalog" href="/index.php">Каталог</a></li>
                <li>
                    <div class="logo">
                        <p class="biblio">БИБЛИО</p>
                        <p class="fil">ФИЛ</p>
                    </div>
                </li>
                <!-- <li><img class="ava" src="/assets/img/man.png" alt="картинку съел таракан"> </li>
                <li> <a class="user" href="#">user</a></li> -->
                <li><a class="exit" href="/app/views/autoriz.php">Войти</a></li>
            </div>

        </nav>

    </header>
    <div class="container">
        <div class="searchdiv">
            <div class="genre__link">
                <select id="genre__select">
                    <option value="">Жанры</option>
                    <option value="adventures">Приключения</option>
                    <option value="fantasy">Фентези</option>
                    <option value="child">Детская литература</option>
                    <option value="melodrama">Драма</option>
                    <option value="comedy">Комедия</option>
                </select>
            </div>
            <div class="search">
                <form>
                    <input type="text" placeholder="Искать здесь..." type="search">
                    <button type="submit"><img src="/assets/img/search-svgrepo-com.svg" alt=""></button>
                </form>
            </div>
        </div>

        <!--Карты товаров -->

        <div class="grid">

            <div class="first">
                <div class="cover__catalog">
                    <div class="solid__catalog NoFillColor1"></div>
                    <div class="solid__fill__catalog FillColor1"></div>
                    <img class="cover__img__catalog" src="/assets/img/image 1.png" alt="артинку съел таракан">
                </div>
                <div class="namebook">
                    <h4>Лолита</h4>
                    <h4>Владимир Набоков</h4>
                </div>
                <div class="raitbut">
                    <img src="/assets/img/star-svgrepo-com.svg" alt="картинку съел таракан">
                    <p>4.3</p>
                    <a class="buttonfill FillColor1" href="/app/views/book_card.php">Подробнее</a>
                </div>
            </div>

            <div class="first">
                <div class="cover__catalog">
                    <div class="solid__catalog NoFillColor2"></div>
                    <div class="solid__fill__catalog FillColor2"></div>
                    <img class="cover__img__catalog" src="/assets/img/image 1.png" alt="артинку съел таракан">
                </div>
                <div class="namebook">
                    <h4>Лолита</h4>
                    <h4>Владимир Набоков</h4>
                </div>
                <div class="raitbut">
                    <img src="/assets/img/star-svgrepo-com.svg" alt="картинку съел таракан">
                    <p>4.3</p>
                    <a class="buttonfill FillColor2" href="/app/views/book_card.php">Подробнее</a>
                </div>
            </div>

            <div class="first">
                <div class="cover__catalog">
                    <div class="solid__catalog NoFillColor3"></div>
                    <div class="solid__fill__catalog FillColor3"></div>
                    <img class="cover__img__catalog" src="/assets/img/image 1.png" alt="артинку съел таракан">
                </div>
                <div class="namebook">
                    <h4>Лолита</h4>
                    <h4>Владимир Набоков</h4>
                </div>
                <div class="raitbut">
                    <img src="/assets/img/star-svgrepo-com.svg" alt="картинку съел таракан">
                    <p>4.3</p>
                    <a class="buttonfill FillColor3" href="/app/views/book_card.php">Подробнее</a>
                </div>
            </div>
            
            <div class="first">
                <div class="cover__catalog">
                    <div class="solid__catalog NoFillColor4"></div>
                    <div class="solid__fill__catalog FillColor4"></div>
                    <img class="cover__img__catalog" src="/assets/img/image 1.png" alt="артинку съел таракан">
                </div>
                <div class="namebook">
                    <h4>Лолита</h4>
                    <h4>Владимир Набоков</h4>
                </div>
                <div class="raitbut">
                    <img src="/assets/img/star-svgrepo-com.svg" alt="картинку съел таракан">
                    <p>4.3</p>
                    <a class="buttonfill FillColor4" href="/app/views/book_card.php">Подробнее</a>
                </div>
            </div>

        </div>

    </div>
    </div>
    <footer>
        <img src="/assets/img/Rectangle 23.png" alt="картинку съел таракан">
        <img src="/assets/img/Rectangle 3.png" alt="картинку съел таракан">
    </footer>
    <!-- <script src="/assets/js/script.js"></script> -->
</body>

</html>