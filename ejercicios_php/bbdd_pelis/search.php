<?php
require 'dbconfig.php';
require 'Database.php';

if (isset($_GET['title'])) {
    $title = $_GET['title'];
    $db = new Database();
    $result = $db->searchMovies($title);

    if (count($result) > 0) {
        echo "<h2>Resultados de la búsqueda:</h2>";
        echo "<ul>";
        foreach ($result as $row) {
            echo "<li>" . htmlspecialchars($row["titulo"]) . " - " . htmlspecialchars($row["director"]) . " (" . htmlspecialchars($row["año"]) . ")</li>";
        }
        echo "</ul>";
    } else {
        echo "No se encontraron resultados.";
    }
} else {
    echo "No se proporcionó un título para buscar.";
}