<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();

$id = $_POST['id'];

try {
    $sql = "SELECT
    books.*,
    GROUP_CONCAT(DISTINCT authors.name SEPARATOR ', ') AS 'authors',
    GROUP_CONCAT(DISTINCT genres.name SEPARATOR ', ') AS 'genres'
    FROM books_authors
    LEFT JOIN books ON books.id = books_authors.book_id
    LEFT JOIN authors ON authors.id = books_authors.author_id
    LEFT JOIN books_genres ON books_genres.book_id = books.id
    LEFT JOIN genres ON genres.id = books_genres.genre_id
    WHERE books.id = '{$id}'
    GROUP BY books.id";
    $statement = $PDO->PDO->prepare($sql);
    $statement->execute();
    $books_array = $statement->fetchAll();
    $_SESSION['item'] = $books_array;
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
};
header('Location: /app/views/book_card.php');