<?php  ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Generar PDF con PHP</title>
        <style type="text/css">
            h1{
                color: red;
            }
        </style>
    </head>
    <body>
        <?php if (isset($_POST['nombre'])): ?>
            <h1>Hola <?=$_POST['nombre']?></h1>
        <?php endif; ?>
        <h2>¿qué tal?</h2>
    </body>
</html>
