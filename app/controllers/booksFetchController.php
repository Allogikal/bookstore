<?
// Подключается внешний файл и создается соединение с БД!
require_once '../database/db_connect.php';
$PDO = new PDOConnect();
// Запросом выдергиваем данные о книгах
$sql = "SELECT * FROM books";
$statement = $PDO->PDO->prepare($sql);
// Раскодируем все данные на ассоциативный массив
$statement->execute();
$books_array = $statement->fetchAll();