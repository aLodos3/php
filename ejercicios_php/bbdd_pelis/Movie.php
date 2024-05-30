<?php

require 'Database.php';

class Movie {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getMovieById($id) {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM pelicula WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchMoviesByTitle($title) {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM pelicula WHERE LOWER(titulo) LIKE LOWER(:title)";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%" . $title . "%";
        $stmt->bindParam(':title', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __destruct() {
        $this->db->disconnect();
    }
}