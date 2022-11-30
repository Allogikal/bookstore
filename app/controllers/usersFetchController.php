<?
// Подключается внешний файл и создается соединение с БД!
require_once '../database/db_connect.php';
$PDO = new PDOConnect();
// Запросом выдергиваем данные о пользователях
$sql = "SELECT * FROM users";
$statement = $PDO->PDO->prepare($sql);
// Раскодируем все данные на ассоциативный массив
$statement->execute();
$users_array = $statement->fetchAll();