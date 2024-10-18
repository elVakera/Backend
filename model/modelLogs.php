<?php
include_once __DIR__ . '/../controlador/controladorLogs.php';
function cercarUser($connexio, $alias, $correu) {
    $trobat = false;
    $resultat = null;                                                                                       // Variable para almacenar el resultado

    try {
        // Prepara la sentencia para ejecutarla como prepared_statement
        $cerca = $connexio->prepare('SELECT correu, alias FROM usuaris WHERE correu = :correu OR alias = :alias');
        $cerca->bindParam(':alias', $alias, PDO::PARAM_STR);  
        $cerca->bindParam(':correu', $correu, PDO::PARAM_STR);                                                // Asigna el valor de la variable a la de la SELECT
        $cerca->execute();                                                                                  // Ejecuta la sentencia

        // Verificamos si se encontró algún resultado
        if ($cerca->rowCount() > 0) {
            $resultat = $cerca->fetch(PDO::FETCH_ASSOC);                                                    // Obtener el resultado
            $trobat = true;                                                                                 // Se encontró el título
            $feedback = "Usuari trobat!!" . " ";
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
function verificarLogin($connexio, $identificador, $password){
    $trobat = false;
    $resultat = null;
    $verificar = $connexio->prepare('SELECT correu, alias, password FROM usuaris WHERE correu = :identificador OR alias = :identificador');
    $verificar->bindParam(':identificador', $identificador, PDO::PARAM_STR);
    $verificar->bindParam(':password', $password, PDO::PARAM_STR);
    $verificar->execute();

     // Verificamos si se encontró algún resultado
     if ($verificar->rowCount() > 0) {
        $resultat = $verificar->fetch(PDO::FETCH_ASSOC);                                                    // Obtener el resultado
        
        var_dump($resultat['password']);
        echo "<br></br>";
        var_dump($password);

        if(ObtenirPassPerId($password, $resultat['password'])){
            $trobat = true;
            $feedback = "Usuari verificat!!" . " ";
        }else{
            $feedback = "El usuario no coincide con la contraseña." . " ";
            $trobat = false;
        }

        /*if($resultat['password'] === $password){
            $trobat = true;                                                                                 // Se encontró el título
        $feedback = "Usuari verificat!!" . " ";
        }else{
            $feedback = "El usuario no coincide con la contraseña." . " ";                                  // Mensaje si no se coinciden resultados
        }*/

    } else {
        $feedback = "No se encontró usuario." . " ";                                                  // Mensaje si no se encontraron resultados
    }
    echo $feedback;
    return $trobat;
}

function canviarPass($connexio, $correu, $alias, $password){
    try{
        if(!cercarUser($connexio, $alias, $correu)){
            $feedback = 'El usuario o correo no existe en la base de datos';
        }else{
            $modificar = $connexio->prepare('UPDATE usuaris SET password = :password WHERE correu = :correu');
            $modificar->bindParam(':correu', $correu, PDO::PARAM_STR);
            $modificar->bindParam(':alias', $alias, PDO::PARAM_STR);
            $modificar->bindParam(':password', $password, PDO::PARAM_STR);

            $modificar->execute();
            $feedback = 'Contrasenya actualizada con exito';
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();                                                                  // Muestra errores si ocurren
    }
}
?>