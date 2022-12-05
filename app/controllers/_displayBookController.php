<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();

$id = $_POST['id'];

try {
    // Запросом выдергиваем данные о книгах
    $sql = "SELECT * FROM books WHERE id='$id'";
    $statement = $PDO->PDO->prepare($sql);
    // Раскодируем все данные на ассоциативный массив
    $statement->execute();
    $item_array = $statement->fetchAll();
    $_SESSION['item'] = $item_array;
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
};
header('Location: /app/views/book_card.php');