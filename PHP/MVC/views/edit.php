<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php include './views/layouts/navbar.php'?>
    <main class="container mt-2"> 
            <h2 class="text-center">Editar alumno</h2>
        <section class="d-flex justify-content-center">
            <article class="card col-8" >
            <form class="form-control" action="./index.php?action=update" method="POST">
                <input type="hidden" name="id" value="<?php echo $estudiante['id']; ?>">
                <label class="form-label" for="">Nombre</label>
                <input class='form-control' type="text" name="nombre" value="<?php echo $estudiante['nombre']; ?>">
                <label class="form-label" for="">Edad</label>
                <input class='form-control' type="number" name="edad" value="<?php echo $estudiante['edad']; ?>">
                <label class="form-label" for="">Promedio</label>
                <input class='form-control' type="text" name="promedio" value="<?php echo $estudiante['promedio']; ?>">
                <label class="form-label" for="">Curso</label>
                <select class="form-control" name="curso">
                    <?php foreach($cursos as $curso) { ?>
                        <option value="<?php echo $curso['id_curso']; ?>" <?php if($curso['id_curso'] === $estudiante['id_curso']) echo 'selected'; ?>>
                            <?php echo $curso['nombre_curso']; ?>
                        </option>
                    <?php } ?>
                </select>
                <button class="btn btn-success mt-2" type="submit">Editar</button>
            </form>
            </article>
        </section>
    </main>


</body>
</html>