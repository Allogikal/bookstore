<?
session_start();
require '../database/db_connect.php';
$PDO = new PDOConnect();
$login = $_POST["login"];
$password = md5($_POST["password"]);

$query = "SELECT * FROM users WHERE `password` = '$password' AND `login` = '$login'";
$check_user = $PDO->PDO->prepare($query);
$check_user->execute();

if (($check_user->rowCount()) > 0) {
    $user = $check_user->fetch();
    if ($user['ban_status'] === 0) {
        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "password" => $user['password'],
            "user_image" => $user['user_image'],
        ];
        if ($user['role_id'] == 2) {
            header("Location: /app/views/admin.php");
        } else {
            header('Location: /index.php');
        }
    }
    else {
        $_SESSION['message'] = 'Ваш аккаунт заблокирован! Обратитесь к СА!';
        header('Location: /app/views/autoriz.php');
    }
} else {
    $_SESSION['message'] = 'Неверный логин или пароль!';
    header('Location: /app/views/autoriz.php');
}