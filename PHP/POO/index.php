<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica de variables reservadas</title>
</head>
<body>
    <h2>Práctica de variables reservadas</h2>

    <!--El action permite ejecutar una accion, en este caso su acción será ejecutar este archivo cuando se le presione el submit-->
    <form action="procesamientoDatos.php" method="POST">
        <label>Nombre: </label>
        <input type="text" name="nombre" required>

        <label>Edad: </label>
        <input type="number" name="edad" required>

        <label>Email: </label>
        <input type="email" name="email" required>



        <button type="submit">Enviar</button>
    </form>
</body>
</html>