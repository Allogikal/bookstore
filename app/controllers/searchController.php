<?
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/_functions.php';
$_SESSION['message'] = '';
error_reporting(E_ERROR | E_PARSE);

if (!empty($_POST['search'])) {
    $search = $_POST['search'];
    $search = mb_eregi_replace("[^a-zа-яё0-9 ]", '', $search);
    $search = trim($search);
    $sql = "SELECT
    books.*,
    GROUP_CONCAT(authors.name SEPARATOR ', ') AS 'authors',
    GROUP_CONCAT(genres.name SEPARATOR ', ') AS 'genres'
    FROM books_authors
    LEFT JOIN books ON books.id = books_authors.book_id
    LEFT JOIN authors ON authors.id = books_authors.author_id
    LEFT JOIN books_genres ON books_genres.book_id = books.id
    LEFT JOIN genres ON genres.id = books_genres.genre_id
    WHERE books.title LIKE '{$search}%' OR authors.name LIKE '{$search}%'
    GROUP BY books.id";
    $statement = $PDO->PDO->prepare($sql);
    $statement->execute();
    $books_array = $statement->fetchAll();
    if ($books_array) {
    ?>
        <div class="search_result">
            <table>
                <?php
                foreach ($books_array as $book) : 
                    echo '
                <div class="container__info">
                <div class="cover">
                    <img class="cover__img" src="../../' . $book['image'] . '" alt="картинку съел таракан">
                </div>
                <div class="infblock">
                    <h1 class="book_title">' . $book['title'] . '</h1>
                    <h2 class="book_author">Автор: '.$book['authors'].'</h2>
                    <span class="genre">Жанр: '.$book['genres'].'</span>
                    <div class="year__block">
                        <p>Год издания:</p>
                        <p class="year">' . $book['year'] . '</p>
                    </div>
                </div>
            </div>
                ';
                endforeach;
                ?>
            </table>
        </div>
<?php
    }
}