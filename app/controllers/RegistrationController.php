<?
session_start();

require_once '../database/db_Connect.php';
$PDO = new PDOConnect();

$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === $password_confirm) {
    $path = 'assets/uploads/' . time() . $_FILES['user_image']['name'];
    if (!move_uploaded_file($_FILES['user_image']['tmp_name'], '/' . $path)) {
        $_SESSION['message'] = 'Ошибка - Загрузка сообщения!';
        header('Location: /app/views/regist.php');
    }
    else {
        $sql = "INSERT INTO users (user_image, login, password, role_id) VALUES ($path, $login, $password, '2')";
        $statement = $PDO->PDO->prepare($sql);
        $statement->execute();
    }

} else {
    $_SESSION['message'] = 'Пароли не совпадают!';
    header('Location: /app/views/regist.php');
}