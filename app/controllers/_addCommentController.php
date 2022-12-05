<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();

$book_id = $_SESSION['item'][0]['id'];
$text = $_POST["text"];
$user_comment = $_SESSION["user"]['login'];
$description = $_POST["text"];
$date = date(DATE_RFC822);
try {
    $query = "INSERT INTO comments VALUES(NULL, '$user_comment', '$date', '$book_id', 0, '$text')";
    $statement = $PDO->PDO->prepare($query);
    $statement->execute();
    header('Location: /app/views/book_card.php');
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
};