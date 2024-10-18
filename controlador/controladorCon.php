<?php
function conexio() {
    try {
        $conexio = new PDO('mysql:host=localhost;dbname=Pt02_david_vaquera', 'root', '');   // Establece la conexión a la base de datos
        // echo "Connexio correcta!!" . "<br />"; 
    } catch (PDOException $e) {
        // Mostramos los errores si ocurren
        echo "Error: " . $e->getMessage();
        die();
    }
    return $conexio;                                                                        // Devuelve la conexión establecida
}
?>