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
function login(){
    $button = $_POST["action"] ?? null;                                                     // Captura la acción del formulario
    $log = "login";
    $reg = "Registrar-se";
    $feedback = "";
    $enviat = false;
    $user = $_POST["userId"] ?? null;
    $pass = $_POST["pass"] ?? null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {                                             // Verifica si el método de la solicitud es POST
        switch($button){
            case $log:
                if(empty($user)){
                    if(empty($pass)){
                        $enviat = true;
                    }
                }
                break;
            case $reg:
                    registrar();
                break;
            default:
                $feedback = "<br>Cal intoduir titol per cercar, modificar o eliminar i un article per modificar o introduir</br>";
                break;
        }
    }
    if (!empty($feedback) && $enviat) {                                                     // Si hay feedback y se envió un formulario
        echo $feedback;                                                                     // Muestra el mensaje de retroalimentación
    }
}
function registrar(){
    $button = $_POST["action"] ?? null;                                                     // Captura la acción del formulario
    $reg = "Registrar-se";
    $enviat = false;
    $user = $_POST["nick"] ?? null;
    $mail = $_POST["email"] ?? null;
    $pass = $_POST["pass1"] ?? null;
    $pass2 = $_POST["pass2"] ?? null;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        switch($button){
            case $reg:
                if(empty($user)){
                    if(empty($mail)){
                        if(empty($pass)){
                            if(empty($pass2) || $pass2 != $pass){
                                
                            }
                        }
                    }
                }
                break;
        }
    }
    if (!empty($feedback) && $enviat) {                                                     // Si hay feedback y se envió un formulario
        echo $feedback;                                                                     // Muestra el mensaje de retroalimentación
    }
}
?>