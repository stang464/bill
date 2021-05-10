<?php
    class Db{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "billdb";

    protected $pdo;
        
        function __construct(){
            $this->pdo = $this->connect();
        }

        protected function connect(){
            $dsn = "mysql:host={$this->servername};dbname={$this->database}";
            $pdo = new PDO($dsn,$this->username,$this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }       
    }

?>