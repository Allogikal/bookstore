<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();

$book_id = $_POST['id'];
$title = $_POST["title"];
$year = $_POST["year"];
$description = $_POST["description"];
$authors_id = $_POST["author"];
$genres_id = $_POST["genre"];
$path = 'assets/uploads/' . time() . $_FILES['image_book']['name'];

if (!move_uploaded_file($_FILES['image_book']['tmp_name'], '../../' . $path)) {
    $_SESSION['message'] = 'Ошибка загрузки изображения!';
} else {
    try {

        $query = "UPDATE `books` SET `title` = '$title', `description` = '$description', `year` = '$year', `image` = '$path' WHERE `id` = '$book_id'";
        $statement = $PDO->PDO->prepare($query);
        $statement->execute();

        $query = "DELETE FROM books_genres WHERE book_id = $book_id";
        $statement = $PDO->PDO->prepare($query);
        $statement->execute();

        $query = "DELETE FROM books_authors WHERE book_id = $book_id";
        $statement = $PDO->PDO->prepare($query);
        $statement->execute();

        foreach ($genres_id as $genre) {
            $query = "INSERT INTO books_genres VALUES(NULL, '$book_id', '$genre')";
        $statement = $PDO->PDO->prepare($query);
        $statement->execute();
        }

        foreach ($authors_id as $author) {
            $query = "INSERT INTO books_authors VALUES(NULL, '$book_id', '$author')";
        $statement = $PDO->PDO->prepare($query);
        $statement->execute();
        }

        header('Location: /app/views/adminbook.php');
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    };
}
