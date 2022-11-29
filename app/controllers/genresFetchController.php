<?
$PDO = new PDOConnect();
// Запросом выдергиваем данные о Жанрах
$sql = "SELECT * FROM genres";
$statement = $PDO->PDO->prepare($sql);
// раскодируем все данные на ассоциативный массив
$statement->execute();
$genres_array = $statement->fetch();