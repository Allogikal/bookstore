<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();

$id = $_POST['id'];
print_r($_POST);

try {
    $query = "DELETE FROM books_genres WHERE book_id = $id";
    $statement = $PDO->PDO->prepare($query);
    $statement->execute();

    $query = "DELETE FROM books_authors WHERE book_id = $id";
    $statement = $PDO->PDO->prepare($query);
    $statement->execute();

    $query = "DELETE FROM books WHERE id = $id";
    $statement = $PDO->PDO->prepare($query);
    $statement->execute();
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
};
header('Location: /app/views/adminbook.php');
