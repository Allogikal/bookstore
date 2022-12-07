<?
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/app/database/db_connect.php';
$PDO = new PDOConnect();

function getBooksAuthors($PDO)
{
    $sql = "SELECT books_authors.*, authors.`name` as `author_name` FROM authors INNER JOIN books_authors ON (books_authors.`author_id`=authors.`id`)";
    $statement = $PDO->PDO->prepare($sql);
    $statement->execute();
    $books_authors_array = $statement->fetchAll();
    return $books_authors_array;
}

function getBooksGenres($PDO)
{
    $sql = "SELECT books_genres.*, genres.`name` as `genre_name` FROM genres INNER JOIN books_genres ON (books_genres.`genre_id`=genres.`id`)";
    $statement = $PDO->PDO->prepare($sql);
    $statement->execute();
    $books_genres_array = $statement->fetchAll();
    return $books_genres_array;
}

function getBooks($PDO)
{
    $sql = "SELECT * FROM books";
    $statement = $PDO->PDO->prepare($sql);
    $statement->execute();
    $books_array = $statement->fetchAll();
    return $books_array;
}

function getComments($PDO)
{
    $sql = "SELECT * FROM comments";
    $statement = $PDO->PDO->prepare($sql);
    $statement->execute();
    $comments_array = $statement->fetchAll();
    return $comments_array;
}

function getAuthors($PDO)
{
    $sql = "SELECT * FROM authors";
    $statement = $PDO->PDO->prepare($sql);
    $statement->execute();
    $authors_array = $statement->fetchAll();
    return $authors_array;
}

function getGenres($PDO)
{
    $sql = "SELECT * FROM genres";
    $statement = $PDO->PDO->prepare($sql);
    $statement->execute();
    $genres_array = $statement->fetchAll();
    return $genres_array;
}

function getUsers($PDO)
{
    $sql = "SELECT * FROM users";
    $statement = $PDO->PDO->prepare($sql);
    $statement->execute();
    $users_array = $statement->fetchAll();
    return $users_array;
}