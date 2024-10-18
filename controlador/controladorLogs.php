<?php
require_once __DIR__ . '/../controlador/controladorCon.php';
require_once __DIR__ . '/../model/modelLogs.php';                                               // Incluye el archivo del modelo

login();
function login(){
    $connexio = conexio();
    $button = $_POST["action"] ?? null;                                                     // Captura la acción del formulario
    $log = "login";
    $feedback = "";
    $enviat = false;
    $user = $_POST["userId"] ?? null;
    $pass = $_POST["pass"] ?? null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {                                             // Verifica si el método de la solicitud es POST
        switch($button){
            case $log:
                if(!empty($user)){
                    if(!empty($pass)){
                        if(verificarLogin($connexio,$user,$pass)){
                            //uuario autentificado abrir sesion
                            $enviat = true;
                            header(header:"Location: ./vista/menuBotons.php");
                        }
                    }
                }
                break;
            default:
                $feedback = "<br>Cal registrarse per poder logejarse</br>";
                break;
        }
    }
    if (!empty($feedback) && $enviat) {                                                     // Si hay feedback y se envió un formulario
        echo $feedback;                                                                     // Muestra el mensaje de retroalimentación
    }
}
function encriptar($pass){
    $encriptPass = password_hash($pass, PASSWORD_DEFAULT);
    return $encriptPass;
}
function ObtenirPassPerId($password, $passwordHash){
    return password_verify($password, $passwordHash);
}
?>