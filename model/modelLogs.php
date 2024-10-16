<?php
function cercar($connexio, $user, $pass) {
    $trobat = false;
    $resultat = null;                                                                                       // Variable para almacenar el resultado

    try {
        // Prepara la sentencia para ejecutarla como prepared_statement
        $cerca = $connexio->prepare('SELECT user FROM articles WHERE user LIKE :user');
        $cerca->bindParam(':user', $user, PDO::PARAM_STR);                                                  // Asigna el valor de la variable a la de la SELECT
        $cerca->execute();                                                                                  // Ejecuta la sentencia

        // Verificamos si se encontró algún resultado
        if ($cerca->rowCount() > 0) {
            $resultat = $cerca->fetch(PDO::FETCH_ASSOC);                                                    // Obtener el resultado
            $trobat = true;                                                                                 // Se encontró el título
            $feedback = "Usuari trobat!!" . " ";
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
?>