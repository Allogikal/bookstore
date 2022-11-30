<?
// Подключается внешний файл и создается соединение с БД!
require_once '../database/db_connect.php';
$PDO = new PDOConnect();
// Запросом выдергиваем данные о Жанрах
$sql = "SELECT * FROM genres";
$statement = $PDO->PDO->prepare($sql);
// раскодируем все данные на ассоциативный массив
$statement->execute();
$genres_array = $statement->fetchAll();