<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/estils.css">                                         <!--link de referencia para los estilos -->
    <title>VistaMenu_DVG</title>
</head>
<body>
    <h1>Registre d'usuaris</h1>                                                                 <!-- text informativo -->

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <label for="nick">Nick name:</label>
        <span class="description">Nom identificatiu d'usuari.</span>
        <label></label>
        <input type="text" id="nick" name="nick" placeholder="usuariExemple" required /> 
       
        <label for="correu">Correu electronic:</label>
        <span class="description">Correu electronic propi.</span>
        <label></label>
        <input type="text" id="email" name="email" placeholder="usuari@exemple.com" required /> 
        
        <label for="con">Password:</label> 
        <input type="password" id="pass1" name="pass1" placeholder="P@ssw0rd" required />
        <label></label>
        <span class="description">La contrsenya ha de tenir minim 8 caracters amb minuscula, mayuscula, numero y caracter especial.</span>
        
        <label for="conC">Repetir password:</label>
        <input type="password" id="pass2" name="pass2" placeholder="P@ssw0rd" required /> 
        <label></label>
        <span class="description">La contrasenya ha de coincidir amb la anterior.</span>
        
        <label></label>
        <input id="submit" type="submit" value="Registrar-se"/>
    </form>
    <form action="<?php echo htmlspecialchars("../index.php"); ?>" method="post">
        <input id="submit" type="submit" value="Enrera"/>
    </form> 
    <?php include_once __DIR__ . '/../controlador/controlador.php'; ?>                          <!-- link incluitiu del controlador -->
</body>
</html>
