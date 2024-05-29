<?php
$host = "localhost";
$user = "aLodos3";
$password = "XHL4FYTnn";
$database = "peliculas";

try {
    // Crear conexión usando PDO
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
    // Configurar el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['title'])) {
        $title = $_GET['title'];
        $sql = "SELECT * FROM pelicula WHERE titulo LIKE :title";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%" . $title . "%";
        $stmt->bindParam(':title', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>