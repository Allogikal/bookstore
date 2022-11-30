<?
session_start();
// Запросом выдергиваем данные об авторах
$sql = "SELECT * FROM authors";
$statement = $PDO->PDO->prepare($sql);
// раскодируем все данные на ассоциативный массив
$statement->execute();
$authors_array = $statement->fetchAll();