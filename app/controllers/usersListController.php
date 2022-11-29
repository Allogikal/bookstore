<?
// Подключается внешний файл и создается соединение с БД!
require_once './app/database/db_connect.php';
$PDO = new PDOConnect();
// Запросом выдергиваем данные о пользователяъ
$sql = "SELECT * FROM users";
$result = $PDO->PDO->query($sql);
// Сначала раскодируем все данные на ассоциативный массив, а потом закодируем в json-формат
$users_array = $result->fetch();
$users_array = json_encode($users_array);