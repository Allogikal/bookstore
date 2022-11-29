<?
session_start();
require_once '../database/db_connect.php';
$PDO = new PDOConnect();
$_SESSION['message'] = '';

$login = $_POST["login"];
$password = $_POST["password"];
$password_confirm = $_POST["password_confirm"];

$hash_password = md5($password);

if (md5($password) === md5($password_confirm)) {
    $path = 'assets/uploads/' . time() . $_FILES['user_image']['name'];
    if (!move_uploaded_file($_FILES['user_image']['tmp_name'], '../../' . $path)) {
        $_SESSION['message'] = 'Ошибка загрузки изображения!';
    } else {
        $query = "INSERT INTO users VALUES(NULL, '$path', '$login', '$hash_password', '1')";
        $statement = $PDO->PDO->prepare($query);
        $statement->execute();
        $_SESSION['user'] = [
            'login' => $login,
            'password' => $hash_password,
            'user_image' => $path,
        ];
        header('Location: /index.php');
    }
} else {
    $_SESSION['message'] = 'Пароли не совпадают!';
    header('Location: /app/views/regist.php');
}
