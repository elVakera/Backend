<?php
include_once __DIR__ . '/../controlador/controlador.php';

// Función para encontrar artículos según el texto
function cercar($connexio, $titol) {
    $trobat = false;
    $resultat = null;                                                                                       // Variable para almacenar el resultado

    try {
        // Prepara la sentencia para ejecutarla como prepared_statement
        $cerca = $connexio->prepare('SELECT titol FROM articles WHERE titol LIKE :titol');
        $cerca->bindParam(':titol', $titol, PDO::PARAM_STR);                                                // Asigna el valor de la variable a la de la SELECT
        $cerca->execute();                                                                                  // Ejecuta la sentencia

        // Verificamos si se encontró algún resultado
        if ($cerca->rowCount() > 0) {
            $resultat = $cerca->fetch(PDO::FETCH_ASSOC);                                                    // Obtener el resultado
            $trobat = true;                                                                                 // Se encontró el título
            $feedback = "Cerca correcta!!" . " ";
        } else {
            $feedback = "No se encontraron resultados." . " ";                                              // Mensaje si no se encontraron resultados
        }
    } catch (PDOException $e) {
        // Mostramos los errores
        $feedback = "Error: " . $e->getMessage();
        $trobat = false;                                                                                    // No se encontró el título
    }

    echo $feedback;                                                                                         // Muestra el feedback al usuario
    return $trobat;                                                                                         // Devolver true si se encontró el título
}

// Función para insertar un artículo y un título a la BD
function inserir($connexio, $titol, $cos) {
    try {
        if (cercar($connexio, $titol)) {                                                                    // Verifica si el artículo ya existe
            $feedback = 'El título o contenido ya existe en la base de datos';
        } else {
            $inserir = $connexio->prepare('INSERT INTO articles (titol, cos) VALUES (:titol, :cos)');       // Prepara la sentencia para insertar
            $inserir->bindParam(':titol', $titol, PDO::PARAM_STR);
            $inserir->bindParam(':cos', $cos, PDO::PARAM_STR);

            $inserir->execute();                                                                            // Ejecuta la inserción
            $feedback = 'Artículo introducido con éxito';
        }
        echo $feedback;                                                                                     // Muestra el feedback

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();                                                                  // Muestra errores si ocurren
    }
}

// Función para modificar un artículo existente de la BD
function modificar($connexio, $titol, $cos) {
    try {
        if (cercar($connexio, $titol)) {                                                                    // Verifica si el artículo existe
            // Agregar WHERE para evitar modificar todas las filas
            $modificar = $connexio->prepare('UPDATE articles SET cos = :cos WHERE titol = :titol');         // Prepara la sentencia de actualización
            $modificar->bindParam(':titol', $titol, PDO::PARAM_STR);
            $modificar->bindParam(':cos', $cos, PDO::PARAM_STR);

            $modificar->execute();                                                                          // Ejecuta la modificación
            $feedback = 'Article modificat amb exit';
            
        } else {
            $feedback = "no s'ha trobat l'article";                                                         // Mensaje si no se encontró el artículo
        }
        echo $feedback;                                                                                     // Muestra el feedback

    } catch (PDOException $e) {                                                                             // Captura excepciones
        echo "Error: " . $e->getMessage();                                                                  // Muestra errores si ocurren
    }
}

// Función para eliminar de la BD un artículo existente en ella
function eliminar($connexio, $titol) {
    try {
        if (cercar($connexio, $titol)) {                                                                    // Verifica si el artículo existe
            // Eliminar basado solo en el título
            $eliminar = $connexio->prepare('DELETE FROM articles WHERE titol = :titol');                    // Prepara la sentencia de eliminación
            $eliminar->bindParam(':titol', $titol, PDO::PARAM_STR);

            $eliminar->execute();                                                                           // Ejecuta la eliminación
            $feedback = 'Article eliminat amb exit';

        } else {
            $feedback = "<br>no s'ha trobat l'article</br>";                                                // Mensaje si no se encontró el artículo
        }
        echo $feedback;                                                                                     // Muestra el feedback

    } catch (PDOException $e) {                                                                             // Captura excepciones
        echo "Error: " . $e->getMessage();                                                                  // Muestra errores si ocurren
    }
}

// Función para mostrar los artículos
function mostrarArticles($connexio, $titol) {
    $resultats = [];                                                                                        // Cambia a un array para almacenar múltiples resultados

    try {
        $titolParam = '%' . $titol . '%';                                                                   // Agrega los comodines para la búsqueda
        $cerca = $connexio->prepare('SELECT titol, cos FROM articles WHERE titol LIKE :titol');             // Selecciona el contenido (cos)
        $cerca->bindParam(':titol', $titolParam, PDO::PARAM_STR);
        $cerca->execute();

        // Obtener todos los resultados
        if ($cerca->rowCount() > 0) {
            $resultats = $cerca->fetchAll(PDO::FETCH_ASSOC);                                                // Cambiar a fetchAll para obtener múltiples resultados
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();                                                                  // Muestra errores si ocurren
    }
    return $resultats;                                                                                      // Devolver todos los artículos encontrados
}
?>