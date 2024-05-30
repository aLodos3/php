Database.php

Clase Database: Maneja la conexión y desconexión de la base de datos.
Métodos:
__construct(): Establece la conexión a la base de datos.
getConnection(): Devuelve la conexión.
disconnect(): Desconecta la base de datos.



Movie.php

Clase Movie: Contiene métodos para buscar películas por ID y título.
Métodos:
__construct(): Crea una instancia de Database.
getMovieById($id): Busca una película por ID.
searchMoviesByTitle($title): Busca películas por título, sin distinguir mayúsculas y minúsculas.
__destruct(): Desconecta la base de datos.



search.php

Inclusion de Archivos: Incluye Movie.php.
Manejo de Parámetros: Verifica si se ha enviado el parámetro title, crea una instancia de Movie y llama al método searchMoviesByTitle.



test.php

Pruebas Unitarias:
testGetMovieById(): Prueba el método getMovieById con un ID existente e inexistente.
testSearchMoviesByTitle(): Prueba el método searchMoviesByTitle con un título parcial existente e inexistente.