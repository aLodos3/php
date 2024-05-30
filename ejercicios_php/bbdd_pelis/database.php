<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $dbname = DB_NAME;
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    public function searchMovies($title) {
        $sql = "SELECT * FROM pelicula WHERE titulo LIKE :title";
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%" . $title . "%";
        $stmt->bindParam(':title', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}