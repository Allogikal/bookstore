<?
// Подключается внешний файл и создается соединение с БД!
include './app/database/db_connect.php';
$PDO = new PDOConnect();

$sql = "SELECT * FROM Users";
$result = $PDO->query($sql);
$users_array = $result->fetch();

class User {

    public const id = null;
    public const name = null;
    public const user_image = null;
    public const login = null;
    public const password = null;
    public const role_id = null;

    function __construct() {
        
    }
}