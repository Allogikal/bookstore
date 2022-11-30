<?
// Подключается внешний файл и создается соединение с БД!
require './app/database/db_connect.php';
$PDO = new PDOConnect();
include './app/views/catalog.php';
?>