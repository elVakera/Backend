<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/estils.css"> 
    <title>Document</title>
</head>
<body>
    <h1>Login users</h1>
    <form action="<?php echo htmlspecialchars("vista/menuBotons.php"); ?>" method="post">                               <!-- finestra per inserir -->
        <label for="userId">Introdueix el nom d'usuari o el correu:</label>                                             <!-- userId/correu -->
        <input type="text" id="userId" name="userId" placeholder="usuariExemple / usuari@exemple.com" required />                    
        
        <label>Password:</label>                                                                                        <!-- password -->
        <input type="password" name="pass" id="pass" placeholder="Escriu la teva contrasenya" required></input>		                                    
        <label></label>
        <input name="action" id="log" type="submit" value="login"/>                                                     <!-- boto login -->
        <label></label>
        <p>Has oblidat la teva contrasenya?</p>
        <a href="vista/olvido.php">Recuperar</a>                                                                        <!-- link a recuperar -->
    </form>
    <form action = <?php echo htmlspecialchars("vista/registre.php") ?> method="post">                                  <!-- boto registrarse -->
        <input id = "submit" type="submit" value="Registrar-se"/>	
        	    

    </form> 
    <form action= <?php echo htmlspecialchars("vista/mostrar.php") ?> method="post">                                    <!-- entrar com convidat -->
        <input name="action" id="gess" type="submit" value="Convidat"/>
    </form>
    <?php require_once __DIR__ . '/./controlador/controlador.php';?>                                                    <!-- link de requeriment del controlador -->
</body>
</html>