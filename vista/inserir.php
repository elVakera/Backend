<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/estils.css">                                                                 <!--link de refernencia para los estilos -->
    <title>VistaInserir_DVG</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">                                 <!-- finestra per inserir -->
        <label for="titol">Introdueix titol de l'article:</label>                                                       <!-- titol -->
        <input type="text" id="titol" name="titol" placeholder="Escriu el titol" required />                    
        
        <label>Escriu el contingut de l'article:</label>                                                                <!-- cos de l'article -->
        <textarea name="article" id="article" rows="5" cols="105" placeholder="Escriu l'article" required></textarea>		                                    
        
        <input name="action" id="ins" type="submit" value="Inserir"/>
    </form>
    <form action = <?php echo htmlspecialchars("../index.php") ?> method="post">                                        <!-- boto enrera -->
        <input id = "submit" type="submit" value="Enrera"/>		    

    </form>  
    <?php require_once __DIR__ . '/../controlador/controlador.php';?>                                                  <!-- link de requeriment del controlador -->
</body>
</html>