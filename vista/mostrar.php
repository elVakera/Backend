<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/estils.css">                                         <!--link de referencia para los estilos -->
    <title>Mostrar</title>
</head>
<body>
    <?php
        include_once __DIR__ . '/../model/model.php';

        // Inicializar variables
        $paginaActual = 1;                                                                                                  // Página actual
        $articlesMostrats = 1;                                                                                              // Número de artículos por página

        // Obtener el título y la página actual del formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titol = $_POST["titol"] ?? '';
            $paginaActual = $_POST["paginaActual"] ?? 1;                                                                    // Captura la página actual

            
            $connexio = conexio();
            $articles = mostrarTot($connexio);                                                             // Obtiene todos los artículos relacionados
            $totalArticles = count($articles);                                                                          // Total de artículos encontrados
            $pagines = ceil($totalArticles / $articlesMostrats);                                                        // Calcula el total de páginas, ceil es para redondear floats

            if ($totalArticles > 0) {
                // Determinar el índice del artículo a mostrar
                $inici = ($paginaActual - 1) * $articlesMostrats;
                $articleMostrat = array_slice($articles, $inici, $articlesMostrats);

                echo '<h2>Resultats de la cerca:</h2><ul>';
                foreach ($articleMostrat as $article) {
                    echo '<li><h3><strong>' . htmlspecialchars($article['titol']) . '</strong>: </h3><p>' . htmlspecialchars($article['cos']) . '</p></li>';
                }
                echo '</ul>';                                                                                           

                // Botones de paginación
                echo '<div class="pagination">';
                
                // boton inicio
                if ($paginaActual > 1) {
                    echo '<form method="post" style="display:inline;">
                            <input type="hidden" name="titol" value="' . htmlspecialchars($titol) . '"/>
                            <input type="hidden" name="paginaActual" value="1"/>
                            <input type="submit" value="<<"/>
                        </form>';
                }

                // boton anterior
                if ($paginaActual > 1) {
                    echo '<form method="post" style="display:inline;">
                            <input type="hidden" name="titol" value="' . htmlspecialchars($titol) . '"/>
                            <input type="hidden" name="paginaActual" value="' . ($paginaActual - 1) . '"/>
                            <input type="submit" value="<"/>
                        </form>';
                }

                // botone numericos con limite a 4 visibles
                $maxbotons = 4;
                $primerBoto = max(1, $paginaActual - floor($maxbotons / 2));
                $ultimBoto = min($pagines, $primerBoto + $maxbotons - 1);

                // Ajustar el inicio si se pasa del límite
                if ($ultimBoto - $primerBoto + 1 < $maxbotons) {
                    $primerBoto = max(1, $ultimBoto - $maxbotons + 1);
                }

                for ($page = $primerBoto; $page <= $ultimBoto; $page++) {
                    echo '<form method="post" style="display:inline;">
                            <input type="hidden" name="titol" value="' . htmlspecialchars($titol) . '"/>
                            <input type="hidden" name="paginaActual" value="' . $page . '"/>
                            <input type="submit" value="' . $page . '"/>
                        </form>';
                }

                // boton siguiente
                if ($paginaActual < $pagines) {
                    echo '<form method="post" style="display:inline;">
                            <input type="hidden" name="titol" value="' . htmlspecialchars($titol) . '"/>
                            <input type="hidden" name="paginaActual" value="' . ($paginaActual + 1) . '"/>
                            <input type="submit" value=">"/>
                        </form>';
                }

                // boton ultima
                if ($paginaActual < $pagines) {
                    echo '<form method="post" style="display:inline;">
                            <input type="hidden" name="titol" value="' . htmlspecialchars($titol) . '"/>
                            <input type="hidden" name="paginaActual" value="' . $pagines . '"/>
                            <input type="submit" value=">>"/>
                        </form>';
                }
                
                echo '</div>';
            } else {
                echo "No se encontraron resultados.";
            }
        }
    ?>  
    <form action = <?php echo htmlspecialchars("../index.php") ?> method="post">                                        <!-- boto enrera -->
        <input id = "submit" type="submit" value="Enrera"/>		    

    </form>
</body>
</html>