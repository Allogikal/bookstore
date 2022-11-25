<?
include './app/controllers/UsersController.php';
?>

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
</head>

<body>
    <header>
        <nav>
            <div class="nav">
                <li><img class="logotip" src="./assets/img/wepik-hand-drawn-monocolor-publisher-logo-20221023-95419.png" alt="картинку съел таракан"></li>
                <li><a class="catalog" href="./app/views/catalog.php">Каталог</a></li>
                <li>
                    <div class="logo">
                        <p class="biblio">БИБЛИО</p>
                        <p class="fil">ФИЛ</p>
                    </div>
                </li>
                <li><img class="ava" src="./assets/img/man.png" alt="картинку съел таракан"> </li>
                <li> <a class="user" href="#">user</a></li>
                <li><a class="exit" href="#">Выйти</a></li>
            </div>

        </nav>

    </header>
    <div class="container">
        <div class="container__info">
            <div class="cover">
                <div class="solid"></div>
                <div class="solid__fill"></div>
                <img class="cover__img" src="./assets/img/image 1.png" alt="картинку съел таракан">
                <div class="container_rating">
                    <form method="post" action="#">
                        <div class="rating">
                            <label>Рейтинг</label>
                            <p>4.3</p>
                        </div>
                        <div class="rating-area">
                            <input type="radio" id="star-5" name="rating" value="5">
                            <label for="star-1" title="Оценка «5»"></label>
                            <input type="radio" id="star-4" name="rating" value="4">
                            <label for="star-2" title="Оценка «4»"></label>
                            <input type="radio" id="star-3" name="rating" value="3">
                            <label for="star-3" title="Оценка «3»"></label>
                            <input type="radio" id="star-2" name="rating" value="2">
                            <label for="star-4" title="Оценка «2»"></label>
                            <input type="radio" id="star-1" name="rating" value="1">
                            <label for="star-5" title="Оценка «1»"></label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="infblock">
                <h1>Лолита</h1>
                <h2>Владимир Набоков</h2>
                <span class="genre">Драма</span>
                <div class="year__block">
                    <p>Год издания:</p>
                    <p class="year">1955</p>
                </div>
                <div class="container__annotation">
                    <label>О книге</label>
                    <p>Владимир Набоков - автор многих известных произведений. Но роман «Лолита» принес Набокову не
                        только огромные гонорары, но и скандальную мировую известность.
                        Отклик на роман, который появился в английской прессе после выхода романа в 1955 году во Франции
                        и покатился по всему литературному миру, был неоднозначным. Поведение двух главных героев романа
                        у одних вызывало ярость и гнев, у других - сочувствие и сопереживание. Но для большинства
                        читателей Гумберт Гумберт так и остался сомни-тельным героем, а юная Лолита - прелестной
                        нимфеткой, перешедшей границы своего взросления вызывающе быстро и провокационно.
                        Читательский интерес к роману «Лолита» не утихает уже более полувека, как не утихает и полемика
                        по поводу жертвенности или извращенности главных героев романа.</p>
                </div>
            </div>
        </div>

        <div class="comments">
            <label class="comm">Комментарии</label>
            <div class="card">
                <div class="user__comm">
                    <img class="ava__comm" src="./assets/img/man.png" alt="картинку съел таракан">
                    <label class="nick__comm">Коромысло</label>
                </div>

                <p class="comm_text">Книга огонь, чуть не умер пока дочитал</p>
            </div>
            <div class="mycomment">
                <label class="comm">Оставьте комментарий</label>
                <textarea class="mycomm_text" name="text"></textarea>
                <button class="buttonfill__comm" type="submit">Отправить</button>
            </div>
        </div>
    </div>
    <footer>
        <img src="./assets/img/Rectangle 23.png" alt="картинку съел таракан">
        <img src="./assets/img/Rectangle 3.png" alt="картинку съел таракан">
    </footer>
</body>

</html>