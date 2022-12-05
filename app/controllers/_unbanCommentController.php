<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();
$id = $_POST['id'];
try {
    $query = "UPDATE `comments` SET `ban_status` = '0' WHERE `comments`.`id` = '$id'; ";
    $statement = $PDO->PDO->prepare($query);
    $statement->execute();
    http_response_code(200);
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
};
header('Location: /app/views/admincomments.php');
