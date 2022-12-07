<?
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/_functions.php';
$_SESSION['message'] = '';
error_reporting(E_ERROR | E_PARSE);

if (!empty($_POST['search'])) {
    $search = $_POST['search'];
    $search = mb_eregi_replace("[^a-zа-яё0-9 ]", '', $search);
    $search = trim($search);
    $sql = "SELECT * FROM books, genres AS genre_name, authors RIGHT JOIN books_authors ON books_authors.author_id = authors.id WHERE books.title LIKE '{$search}%' OR authors.name LIKE '{$search}%' ORDER BY title";
    $statement = $PDO->PDO->prepare($sql);
    $statement->execute();
    $books_array = $statement->fetchAll();
    $result = array_unique($books_array);
    if ($result) {
    ?>
        <div class="search_result">
            <table>
                <?php
                $books_authors = getBooksAuthors($PDO);
                $books_genres = getBooksGenres($PDO);
                $count = 0;
                foreach ($result as $book) : 
                    echo '
                <div class="container__info">
                <div class="cover">
                    <img class="cover__img" src="../../' . $book['image'] . '" alt="картинку съел таракан">
                </div>
                <div class="infblock">
                    <h1 class="book_title">' . $book['title'] . '</h1>
                    <h2 class="book_author">Автор: '.$books_authors[$count]['author_name'].'</h2>
                    <span class="genre">Жанр: '.$books_genres[$count]['genre_name'].'</span>
                    <div class="year__block">
                        <p>Год издания:</p>
                        <p class="year">' . $book['year'] . '</p>
                    </div>
                </div>
            </div>
                ';
                $count++;
                endforeach;
                ?>
            </table>
        </div>
<?php
    }
}