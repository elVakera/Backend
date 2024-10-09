<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/estils.css">                                         <!--link de referencia para los estilos -->
    <title>Recuperar contrasenya</title>
</head>
<body>
<form action = <?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> method="post">                                        <!-- boto enrera -->
    <label>Escriu el correu de recuperacio</label>
    <input type="text" name="recu" id="recu" placeholder="exemple@gmail.com"/>    
    <input id = "submit" type="submit" value="Recuperar"/>		    

    </form>  
<form action = <?php echo htmlspecialchars("menuBotons.php") ?> method="post">                                        <!-- boto enrera -->
        <input id = "submit" type="submit" value="Enrera"/>		    

    </form>  
</body>
</html>