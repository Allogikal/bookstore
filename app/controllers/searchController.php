<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();
$_SESSION['message'] = '';

if (!empty($_POST['search'])) {
    $search = $_POST['search'];
    $search = mb_eregi_replace("[^a-zа-яё0-9 ]", '', $search);
    $search = trim($search);
    $sql = "SELECT * FROM `books` WHERE `title` LIKE '{$search}%' ORDER BY `title`";
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
                    <h2 class="book_author">Автор:</h2>
                    <span class="genre">Жанр:</span>
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
                endforeach;
                ?>
            </table>
        </div>
<?php
    }
}