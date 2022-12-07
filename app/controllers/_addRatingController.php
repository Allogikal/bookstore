<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();

$book_id = $_POST['id'];
$rate_count = $_POST['rate_count'];
$rate_count++;
$rating = $_POST['rating'];
$query = "SELECT `sum_rate` FROM books WHERE books.id = '$book_id'";
$statement = $PDO->PDO->prepare($query);
$statement->execute();
$sum_rate = $statement->fetchAll();
$sum_rate = $sum_rate[0]['sum_rate'];
$_SESSION['item'][0]['rate_count'] = $rate_count;
$rate = ($rating + $sum_rate)/$rate_count;
$rate = round($rate, 1);
$sum_rate += $rating;
try {
    $query = "UPDATE books SET `rate` = '$rate', `rate_count` = '$rate_count', `sum_rate` = '$sum_rate' WHERE `id` = '$book_id'";
    $statement = $PDO->PDO->prepare($query);
    $statement->execute();
    header('Location: /app/views/book_card.php');
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
};