<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();

$book_id = $_SESSION['item'][0]['id'];
$rating = $_POST['rating'];
$rate_count = $_POST['rate_count'] + 1;
$_SESSION['item'][0]['rate_count'] = $rate_count;
$rate = $rating/$rate_count;
try {
    $query = "UPDATE books SET `rate` = '$rate', `rate_count` = '$rate_count' WHERE `id` = '$book_id'";
    $statement = $PDO->PDO->prepare($query);
    $statement->execute();
    header('Location: /app/views/book_card.php');
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
};