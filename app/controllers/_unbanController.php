<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();
$id = $_POST['id'];
try {
    $query = "UPDATE `users` SET `ban_status` = '0' WHERE `users`.`id` = '$id'; ";
    $statement = $PDO->PDO->prepare($query);
    $statement->execute();
    http_response_code(200);
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
};
header('Location: /app/views/admin.php');