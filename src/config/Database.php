<?php
class Database{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'project_blog';

    protected $connection;

    function connect(){
        try{
            $this->connection = new PDO(
                "mysql:host=$this->host;dbname=$this->database",
                $this->username,
                $this->password
            );
        } catch (PDOEXCEPTION $e){
            echo 'scriptConnection error' . $e->getMessage();
        }
        return $this->connection;
    }
}
?>