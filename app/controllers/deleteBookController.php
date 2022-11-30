<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();
$_SESSION['message'] = '';

$title = $_POST["title"];
$author = $_POST["author"];
$year = $_POST["year"];
$genre = $_POST["genre"];
$description = $_POST["description"];
$path = 'assets/uploads/' . time() . $_FILES['image_book']['name'];

if (!move_uploaded_file($_FILES['image_book']['tmp_name'], '../../' . $path)) {
    $_SESSION['message'] = 'Ошибка загрузки изображения!';
} else {
    $query = "INSERT INTO books VALUES(NULL, '$title', '$description', '$year', '$path', '', 0, '$genre', '$author')";
    $statement = $PDO->PDO->prepare($query);
    $statement->execute();
    header('Location: /index.php');
}