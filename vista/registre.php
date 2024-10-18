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

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <label for="nick">Nick name:</label>
        <span class="description">Nom identificatiu d'usuari.</span>
        <p></p>
        <input type="text" id="nick" name="nick" placeholder="usuariExemple" required /> 
       
        <label for="correu">Correu electronic:</label>
        <span class="description">Correu electronic propi.</span>
        <p></p>
        <input type="text" id="correu" name="correu" placeholder="usuari@exemple.com" required /> 
        
        <label for="pass1">Password:</label> 
        <input type="password" id="pass1" name="pass1" placeholder="P@ssw0rd" required />
        <p></p>
        <span class="description">La contrsenya ha de tenir minim 8 caracters amb minuscula, mayuscula, numero y caracter especial.</span>
        
        <label for="pass2">Repetir password:</label>
        <input type="password" id="pass2" name="pass2" placeholder="P@ssw0rd" required /> 
        <p></p>
        <span class="description">La contrasenya ha de coincidir amb la anterior.</span>

        <p></p>
        <input id="reg" type="submit" value="Registrar"/>
    </form>
    <form action="<?php echo htmlspecialchars("../index.php"); ?>" method="post">
        <input id="enrere" type="submit" value="Enrera"/>
    </form> 
    <?php require_once __DIR__ . '/../controlador/controladorRegs.php'; ?>                          <!-- link incluitiu del controlador -->
</body>
</html>
