<?
class PDOConnect
{
    // Конфиг для бд
    private const HOST = 'localhost';
    private const DB = 'bookstore';
    private const USER = 'root';
    private const PASS = '';
    // Поля которые трогать не нужно
    protected $DSN;
    protected $OPD;
    public $PDO;
    // ТО ЧТО СОЗДАСТ ЭКЗЕМПЛЯР КЛАССА
    function __construct()
    {

        $this->DSN = "mysql:host=" . self::HOST . ";dbname=" . self::DB . ";";

        $this->OPD = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        );

        $this->PDO = new PDO($this->DSN, self::USER, self::PASS, $this->OPD);
    }
}
