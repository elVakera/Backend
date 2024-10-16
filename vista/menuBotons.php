<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/estils.css">                                      <!--link de referencia para los estilos -->
    <title>VistaMenu_DVG</title>
</head>
<body>
    <h1>Quina operacio vols realitzar?</h1>                                                 <!-- text informativo -->

    <form action="<?php echo htmlspecialchars("inserir.php"); ?>" method="post">            <!-- botón insertar -->
        <input name="action" id="ins" type="submit" value="Inserir"/>
        <span class="description">Añadir un nuevo artículo.</span>
    </form>

    <form action="<?php echo htmlspecialchars("modificar.php"); ?>" method="post">          <!-- botón modificar -->
        <input name="action" id="mod" type="submit" value="Modificar"/>
        <span class="description">Modificar un artículo existente.</span>
    </form>

    <form action="<?php echo htmlspecialchars("eliminar.php"); ?>" method="post">           <!-- botón eliminar -->
        <input name="action" id="del" type="submit" value="Eliminar"/>
        <span class="description">Eliminar un artículo por su título.</span>
    </form>

    <form action="<?php echo htmlspecialchars("cercar.php"); ?>" method="post">             <!-- botón buscar -->
        <input name="action" id="ser" type="submit" value="Cercar"/>
        <span class="description">Buscar un artículo por su título.</span>
    </form>

    <form action="<?php echo htmlspecialchars("../index.php"); ?>" method="post">           <!-- botón buscar -->
        <input name="action" id="ser" type="submit" value="Sortir"/>
        <span class="description">Tanca sessio i surt a l'inici</span>
    </form> 
    <?php include_once __DIR__ . '/../controlador/controlador.php'; ?>                      <!-- link incluitiu del controlador -->
</body>
</html>
