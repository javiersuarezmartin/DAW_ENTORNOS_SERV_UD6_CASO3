<?php
    include('./color.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color HEX > RGB</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
</head>
<body>
    <div class="container">    
        <?php        
            // Comprobamos que se han enviado los datos del formulario.
            if(!empty($_POST)) {
                
                // Comprobamos que todos los campos contienen algun valor.
                if (isset($_POST["color"])) {

                    // Almacenamos los datos recibidos en una variable para que sea mas sencillo manejarlo.
                    $color_hex = strtoupper(trim($_POST["color"])); // Eliminamos espacios en blanco y convertimos en mayúsculas.
                    $color_rgb =  new Color();

                    // Realizamos comprobaciones de formato y convertimos a RGB.
                    
                    if($color_rgb->hexToRgb($color_hex) != "ERROR") {
                       
                       // Escribimos los datos
                        echo ("<p> El color en formato RGB es:</p>");
                        echo ("<p>rgb(");
                        foreach($color_rgb->getColor() as $clave => $valor) {
                            if ($clave == "r" || $clave =="g") {
                                echo($valor);
                                echo(", ");
                            } else {
                                echo($valor);
                                echo(")</p>");
                            };                            
                        };              
                        
                    } else {
                        echo ("<p> El color seleccionado no tiene el formato correcto (#RRGGBB)<p>");                       
                    };

                    echo ("<p><a href='../html/index.html'>Volver</a></p>");
                };
            };
        ?>
    </div>
</body>
</html>

