<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();

$book_id = $_POST['id'];
$title = $_POST["title"];
$year = $_POST["year"];
$description = $_POST["description"];
$author_id = $_POST["author"];
$genre_id = $_POST["genre"];
$path = 'assets/uploads/' . time() . $_FILES['image_book']['name'];

if (!move_uploaded_file($_FILES['image_book']['tmp_name'], '../../' . $path)) {
    $_SESSION['message'] = 'Ошибка загрузки изображения!';
} else {
    try {
        $query = "UPDATE `books` SET `title` = '$title', `description` = '$description', `year` = '$year', `image` = '$path' WHERE `id` = '$book_id'";
    $statement = $PDO->PDO->prepare($query);
    $statement->execute();

    $book_id--;

    $query = "UPDATE books_genres SET `genre_id` = '$genre_id' WHERE `book_id` = '$book_id'";
    $statement = $PDO->PDO->prepare($query);
    $statement->execute();

    $query = "UPDATE books_authors SET `author_id` = '$author_id' WHERE `book_id` = '$book_id'";
    $statement = $PDO->PDO->prepare($query);
    $statement->execute();
    header('Location: /app/views/adminbook.php');
    }
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    };

}