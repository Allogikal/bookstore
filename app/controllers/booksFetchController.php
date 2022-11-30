<?
session_start();
// Запросом выдергиваем данные о книгах
$sql = "SELECT * FROM books";
$statement = $PDO->PDO->prepare($sql);
// Раскодируем все данные на ассоциативный массив
$statement->execute();
$books_array = $statement->fetchAll();