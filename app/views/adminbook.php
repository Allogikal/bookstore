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
    <link rel="shortcut icon" href="/assets/img/wepik-hand-drawn-monocolor-publisher-logo-20221023-95419.svg"
        type="image/x-icon">
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
        <!-- Основное меню -->
        <ul class="menu__list list">
            <!-- Элемент меню -->

            <li class="menu__item item">
                <a href="./admin.html" class="menu__link link">
                    <span>Пользователи</span>
                </a>
            </li>
            <li class="menu__item item">
                <a href="./adminbook.html" class="menu__link link">
                    <span>Посты</span>
                </a>
            </li>

        </ul>
    </section>
    <section class="content">
        <div class="post">
            <h2>Посты</h2>
            <div class="container__info">
                <div class="cover">
                    <img class="cover__img" src="/assets/img/image 1.png" alt="картинку съел таракан">
                    <div class="container_rating">
                        <form method="post" action="">
                            <div class="rating">
                                <label>Рейтинг</label>
                                <p>4.3</p>
                            </div>
                        </form>
                    </div>

                    <button>Удалить</button>
                    <button class="redact" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Редактировать</button>
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
                            Отклик на роман, который появился в английской прессе после выхода романа в 1955 году во
                            Франции
                            и покатился по всему литературному миру, был неоднозначным. Поведение двух главных героев
                            романа
                            у одних вызывало ярость и гнев, у других - сочувствие и сопереживание. Но для большинства
                            читателей Гумберт Гумберт так и остался сомни-тельным героем, а юная Лолита - прелестной
                            нимфеткой, перешедшей границы своего взросления вызывающе быстро и провокационно.
                            Читательский интерес к роману «Лолита» не утихает уже более полувека, как не утихает и
                            полемика
                            по поводу жертвенности или извращенности главных героев романа.</p>
                    </div>
                </div>
            </div>
        </div>
        <button class="create" type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal">Создать</button>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Создать пост</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <body>
                        <div class="modal"></div>

                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="text" name="title" placeholder="введите название">
                            <input type="text" name="author" placeholder="введите автора">
                            <label class="input-file">
                                <input type="file" name="file">
                                <span>выберите обложку</span>
                            </label>
                            <input type="text" name="year" placeholder="введите год">
                            <input type="text" name="genre" placeholder="введите жанры">
                            <textarea name="annotation" placeholder="введите аннотацию"></textarea>

                        </form>
                </div>
                <div class="modal-footer">
                    <button class="btn__modal" type="button" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>