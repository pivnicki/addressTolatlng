<?php
class Connection {
    private $pdo;
 
    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=bem";
        $user = "root";
        $password = "";
        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo->query("SET NAMES 'utf8'");
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            exit();
        }
    }
    public function getDb() {
        if ($this->pdo instanceof PDO) {
            return $this->pdo;
        }
    }
}