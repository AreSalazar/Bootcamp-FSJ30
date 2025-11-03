<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php include './views/layouts/navbar.php' ?>
    <main class="container mt-2">
        <h2 class="text-center">Agregar nuevo estudiante</h2>
        <section class="d-flex justify-content-center">
            <article class="card col-8">
                <form class="form-control" action="./index.php?action=create" method="POST">
                    <label class="form-label" for="">Nombre</label>
                    <input class='form-control' type="text" name="nombre">
                    <label class="form-label" for="">Edad</label>
                    <input class='form-control' type="number" name="edad">
                    <label class="form-label" for="">Promedio</label>
                    <input class='form-control' type="text" name="promedio">
                    <label class="form-label" for="">Curso</label>
                    <select class="form-control" name="curso">
                        <?php foreach ($cursos as $curso) { ?>
                            <option value="<?php echo $curso['id_curso']; ?>"
                                <?php 
                                //if ($curso['id_curso'] === $estudiante['id_curso']) echo 'selected'; 
                                if(isset($estudiante) && $curso['id_curso'] == $estudiante['id_curso']) echo 'selected';
                                ?>>
                                <?php echo $curso['nombre_curso']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <button class="btn btn-success mt-2" type="submit">Agregar</button>
                </form>
            </article>
        </section>
    </main>


</body>

</html>