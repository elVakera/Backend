<?php
include_once __DIR__ . '/../controlador/controladorLogs.php';
include_once __DIR__ . '/../model/modelRegs.php';

registrar();
function registrar(){
    $connexio = conexio();
    $feedback = "";
    $enviat = false;
    $user = $_POST["nick"] ?? null;
    $mail = $_POST["correu"] ?? null;
    $pass = $_POST["pass1"] ?? null;
    $pass2 = $_POST["pass2"] ?? null;
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(!empty($user) && !comprovarNick($user)){
                if(!empty($mail) && !comprovarEmail($mail) && comprovarFormatEmail($mail)){
                    if(!empty($pass) && comprovarFormatPass($pass)){
                        if($pass2 === $pass){
                            $pass = encriptar($pass);      
                            registrarse($connexio, $user, $pass, $mail); 
                            $feedback = '<br>Regitrado</br>';
                            $enviat = true;
                        }else{
                            $feedback = '<br>la contra no coincide</br>';
                        }
                    }else{
                        $feedback = "<br>la contra no es valida</br>";
                    }
                }else{
                    $feedback = '<br>email no valido</br>';
                }
            }else{
                $feedback = '<br>usuario existente</br>';
            }
        }
    if (!empty($feedback) && !$enviat) {                                                     // Si hay feedback y se envió un formulario
        echo $feedback;                                                                     // Muestra el mensaje de retroalimentación
    }
}
function comprovarNick($user){
    $userFound = false;

    if(cercarAlias(conexio(),$user)){
        $userFound = true;
    }
    return $userFound;
}
function comprovarEmail($email){
    $userFound = false;

    if(cercarCorreu(conexio(),$email)){
        $userFound = true;
    }
    return $userFound;
}
function comprovarFormatEmail($email){
    $emailOk = false;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailOk = true;
    }
    return $emailOk;
}
function comprovarFormatPass($password){
    return preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password);
}
?>