<?php
require 'Movie.php';

function testGetMovieById() {
    $movie = new Movie();

    // Prueba 1: ID existente
    $result = $movie->getMovieById(1);
    if ($result) {
        echo "Prueba 1 (ID existente) pasó: " . $result['titulo'] . "\n";
    } else {
        echo "Prueba 1 (ID existente) falló.\n";
    }

    // Prueba 2: ID inexistente
    $result = $movie->getMovieById(999);
    if (!$result) {
        echo "Prueba 2 (ID inexistente) pasó.\n";
    } else {
        echo "Prueba 2 (ID inexistente) falló.\n";
    }
}

function testSearchMoviesByTitle() {
    $movie = new Movie();

    // Prueba 1: Título parcial existente
    $results = $movie->searchMoviesByTitle('titan');
    if (count($results) > 0) {
        echo "Prueba 1 (Título parcial existente) pasó: " . count($results) . " resultados encontrados.\n";
    } else {
        echo "Prueba 1 (Título parcial existente) falló.\n";
    }

    // Prueba 2: Título parcial inexistente
    $results = $movie->searchMoviesByTitle('abcdefg');
    if (count($results) == 0) {
        echo "Prueba 2 (Título parcial inexistente) pasó.\n";
    } else {
        echo "Prueba 2 (Título parcial inexistente) falló.\n";
    }
}

// Ejecutar pruebas
testGetMovieById();
testSearchMoviesByTitle();