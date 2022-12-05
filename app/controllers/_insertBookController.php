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
        $query = "INSERT INTO books VALUES(NULL, '$title', '$description', '$year', '$path', 0, 0)";
        $statement = $PDO->PDO->prepare($query);
        $statement->execute();

        $book_id++;
        
        $query = "INSERT INTO books_genres VALUES(NULL, '$book_id', '$genre_id')";
        $statement = $PDO->PDO->prepare($query);
        $statement->execute();

        $query = "INSERT INTO books_authors VALUES(NULL, '$book_id', '$author_id')";
        $statement = $PDO->PDO->prepare($query);
        $statement->execute();
        header('Location: /app/views/adminbook.php');   
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    };
}
