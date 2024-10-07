<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/estils.css">                                                                 <!--link de refernencia para los estilos -->
    <title>VistaModificar_DVG</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">                                 <!-- finestra modificar -->
        <label for="titol">Modifica el titol:</label>                                                                   <!-- titol -->
        <input type="text" id="titol" name="titol" placeholder="Escriu el titol" required />                    
        
        <label>Modifica el contingut de l'article:</label>                                                              <!-- cos de l'article -->
        <textarea name="article" id="article" rows="5" cols="105" placeholder="Escriu l'article" required></textarea>		                                    
        
        <input name="action" id="ins" type="submit" value="Modificar"/>
    </form>
    <form action = <?php echo htmlspecialchars("menuBotons.php") ?> method="post">                                        <!-- boto enrera -->
        <input id = "submit" type="submit" value="Enrera"/>		    

    </form>  
    <?php require_once __DIR__ . '/../controlador/controlador.php';?>                                                  <!-- link de requeriment del controlador -->
</body>
</html>