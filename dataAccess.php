<?php
class DataAccess
{
    private static $INSTANCE;
    private $pdo;
    private function __construct()
    {
        $db_name = "email-list";
        $db_user = "root";
        $db_password = "";
        $this->pdo = new 
            PDO("mysql:host=localhost;dbname=$db_name",$db_user,$db_password, [PDO::ATTR_ERRMODE=> PDO:: ERRMODE_EXCEPTION]);
    }
    public static function getInstance()
    {
        if(!isset(static::$INSTANCE))
        {
            static::$INSTANCE = new static();
        }
        return static::$INSTANCE;
    }
    function getAllEmailList()
    {
        $statement = $this->pdo->prepare("SELECT * FROM email-list");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS, "EmailList");
        return $result;
    }
    function addToEmailList($newEmail) //emailList object
    {
        $sql ="INSERT INTO email-list (id, name, email, wantUpdate, happy) VALUES (null, ?, ?, ?, ?);";
        $statement = $this->pdo->prepare($sql);
        $email= $newEmail->email;
        $name =$newEmail->name;
        $wantUpdate= $newEmail->wantUpdate;
        $happy=$newEmail->happy;
        $statement->execute([ $name, $email, $wantUpdate, $happy]);
    }
}
?>