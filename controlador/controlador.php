<?php
include_once __DIR__ . '/../model/model.php';                                               // Incluye el archivo del modelo
inici();                                                                                    // Llama a la función inici

function conexio() {
    try {
        $conexio = new PDO('mysql:host=localhost;dbname=Pt02_david_vaquera', 'root', '');   // Establece la conexión a la base de datos
        // echo "Connexio correcta!!" . "<br />"; 
    } catch (PDOException $e) {
        // Mostramos los errores si ocurren
        echo "Error: " . $e->getMessage();
    }
    return $conexio;                                                                        // Devuelve la conexión establecida
}

function inici() {
    $button = $_POST["action"] ?? null;                                                     // Captura la acción del formulario
    $enviat = false;                                                                        // Inicializa la variable para saber si se envió un formulario
    $feedback = "";                                                                         // Mensaje de retroalimentación
    $ins = "Inserir";                                                                       // Acción de insertar
    $del = "Eliminar";                                                                      // Acción de eliminar
    $mod = "Modificar";                                                                     // Acción de modificar
    $ser = "Cercar";                                                                        // Acción de buscar
    $connexio = conexio();                                                                  // Establece la conexión a la base de datos

    $titol = $_POST["titol"] ?? null;                                                       // Captura el título del formulario
    $article = $_POST["article"] ?? null;                                                   // Captura el artículo del formulario

    if ($_SERVER["REQUEST_METHOD"] == "POST") {                                             // Verifica si el método de la solicitud es POST

        switch ($button) {
            case $ins:                                                                      // Si la acción es insertar
                if (!empty($titol)) {                                                       // Verifica que el título no esté vacío
                    if (!empty($article)) {                                                 // Verifica que el artículo no esté vacío
                        inserir($connexio, $titol, $article);                               // Llama a la función de inserción
                        $enviat = true;                                                     // Marca que se envió un formulario
                    } else {
                        $feedback = "<br>No hi ha article</br>";                            // Mensaje si no hay artículo
                    }
                } else {
                    $feedback = "<br>No hi ha titol</br>";                                  // Mensaje si no hay título
                }
                break;

            case $del:                                                                      // Si la acción es eliminar
                if (!empty($titol)) {                                                       // Verifica que el título no esté vacío
                    eliminar($connexio, $titol);                                            // Llama a la función de eliminación
                    $enviat = true;                                                         // Marca que se envió un formulario
                } else {
                    $feedback = "<br>No hi ha titol</br>";                                  // Mensaje si no hay título
                }
                break;

            case $mod:                                                                      // Si la acción es modificar
                if (!empty($titol)) {                                                       // Verifica que el título no esté vacío
                    if (!empty($article)) {                                                 // Verifica que el artículo no esté vacío
                        modificar($connexio, $titol, $article);                             // Llama a la función de modificación
                        $enviat = true;                                                     // Marca que se envió un formulario
                    } else {
                        $feedback = "<br>No hi ha article</br>";                            // Mensaje si no hay artículo
                    }
                } else {
                    $feedback = "<br>No hi ha titol</br>";                                  // Mensaje si no hay título
                }
                break;

            case $ser:                                                                      // Si la acción es buscar
                if (!empty($titol)) {                                                       // Verifica que el título no esté vacío
                    mostrarArticles($connexio, $titol);                                     // Llama a la función de mostrar artículos
                } else {
                    $feedback = "<br>Cal intoduir titol per cercar</br>";                   // Mensaje si no se introduce título
                }
                break;

            default:                                                                        // Si no se encuentra ninguna acción válida
                $feedback = "<br>Cal intoduir titol per cercar, modificar o eliminar i un article per modificar o introduir</br>"; // Mensaje general
        }
    }
    if (!empty($feedback) && $enviat) {                                                     // Si hay feedback y se envió un formulario
        echo $feedback;                                                                     // Muestra el mensaje de retroalimentación
    }
}
?>
