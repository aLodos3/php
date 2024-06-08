<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre del archivo y el contenido del formulario
    $filename = trim($_POST['filename']);
    $content = $_POST['content'];

    // Asegurarse de que el nombre del archivo no esté vacío
    if (empty($filename)) {
        die("El nombre del archivo no puede estar vacío.");
    }

    // Añadir la extensión .txt al nombre del archivo
    $filename .= ".txt";

    // Definir el directorio donde se guardarán los archivos
    $directory = "files";

    // Crear el directorio si no existe
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }

    // Ruta completa del archivo
    $filepath = $directory . DIRECTORY_SEPARATOR . $filename;

    // Crear y escribir en el archivo
    if (file_put_contents($filepath, $content) !== false) {
        echo "El archivo $filename ha sido creado exitosamente en el directorio $directory.";
    } else {
        echo "Hubo un error al crear el archivo.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
