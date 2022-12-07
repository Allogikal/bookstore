<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();

$id = $_POST['id'];
$author_name = $_POST['author_name'];

try {
    $sql = "SELECT * FROM books, authors WHERE authors.name='$author_name' AND books.id = '$id'";
    $statement = $PDO->PDO->prepare($sql);
    $statement->execute();
    $item_array = $statement->fetchAll();
    array_push($item_array, $author_name);
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
};
header('Location: /app/views/book_card.php');