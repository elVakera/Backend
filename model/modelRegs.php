<?php
include_once __DIR__ . '/../controlador/controladorRegs.php';
function cercarAlias($connexio, $alias) {
    $trobat = false;
    $resultat = null;                                                                                       // Variable para almacenar el resultado
    $feedback = "";
    try {
        // Prepara la sentencia para ejecutarla como prepared_statement
        $cerca = $connexio->prepare('SELECT alias FROM usuaris WHERE alias = :alias');
        $cerca->bindParam(':alias', $alias, PDO::PARAM_STR);                                                 // Asigna el valor de la variable a la de la SELECT
        $cerca->execute();                                                                                  // Ejecuta la sentencia

        // Verificamos si se encontró algún resultado
        if ($cerca->rowCount() > 0) {
            $resultat = $cerca->fetch(PDO::FETCH_ASSOC);                                                    // Obtener el resultado
            $trobat = true;                                                                                 // Se encontró el título
            $feedback = "Nick trobat!!" . " ";
        } else {
           // $feedback = "No se encontraron resultados." . " ";                                              // Mensaje si no se encontraron resultados
        }
    } catch (PDOException $e) {
        // Mostramos los errores
        $feedback = "Error: " . $e->getMessage();
        $trobat = false;                                                                                    // No se encontró el título
    }

    echo $feedback;                                                                                         // Muestra el feedback al usuario
    return $trobat;                                                                                         // Devolver true si se encontró el título
}
function cercarCorreu($connexio, $correu) {
    $trobat = false;
    $resultat = null;                                                                                       // Variable para almacenar el resultado
    $feedback = "";

    try {
        // Prepara la sentencia para ejecutarla como prepared_statement
        $cerca = $connexio->prepare('SELECT correu FROM usuaris WHERE correu = :correu');
        $cerca->bindParam(':correu', $correu, PDO::PARAM_STR);                                                 // Asigna el valor de la variable a la de la SELECT
        $cerca->execute();                                                                                  // Ejecuta la sentencia

        // Verificamos si se encontró algún resultado
        if ($cerca->rowCount() > 0) {
            $resultat = $cerca->fetch(PDO::FETCH_ASSOC);                                                    // Obtener el resultado
            $trobat = true;                                                                                 // Se encontró el título
            $feedback = "Correu trobat!!" . " ";
        } else {
            //$feedback = "No se encontraron resultados." . " ";                                              // Mensaje si no se encontraron resultados
        }
    } catch (PDOException $e) {
        // Mostramos los errores
        $feedback = "Error: " . $e->getMessage();
        $trobat = false;                                                                                    // No se encontró el título
    }

    echo $feedback;                                                                                         // Muestra el feedback al usuario
    return $trobat;                                                                                         // Devolver true si se encontró el título
}

// Función para registrar un usuario a la BD
function registrarse($connexio, $alias, $password, $correu) {
    try {
        if (cercarUser($connexio, $alias, $correu)) {                                                                    // Verifica si el artículo ya existe
            $feedback = 'El usuario o correo ya existe en la base de datos';
        } else {
            $inserir = $connexio->prepare('INSERT INTO usuaris (correu, alias, password) VALUES (:correu, :alias, :password)');       // Prepara la sentencia para insertar
            $inserir->bindParam(':correu', $correu, PDO::PARAM_STR);
            $inserir->bindParam(':alias', $alias, PDO::PARAM_STR);
            $inserir->bindParam(':password', $password, PDO::PARAM_STR);

            $inserir->execute();                                                                            // Ejecuta la inserción
            $feedback = 'Usuario registrado con éxito';
        }
        echo $feedback;                                                                                     // Muestra el feedback

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();                                                                  // Muestra errores si ocurren
    }
}
?>