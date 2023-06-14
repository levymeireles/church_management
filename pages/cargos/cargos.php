<?php
include '../../services/connect.php';

$query = "SELECT * FROM FUNCTIONS";

$res = mysqli_query($con, $query);
$functions = array();
while ($row = mysqli_fetch_array($res)) {
    $functions[] = $row;
}

if (isset($_POST['new_cargo'])) {
    header('location: ./new.cargo.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Church Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./cargos.styles.css" type="text/css">
</head>

<body>

    <?php include '../../components/nav-menu/nav.component.php'; ?>
    <h1>Cargos</h1>

    <form method="post">
        <div class="btn-new-cargo">
            <button type="submit" name="new_cargo" class="btn btn-success btn-block">Criar cargo</button>
        </div>
    </form>

    <div class="container-table">
        <form method="post">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($functions as $function) {
                        echo "
                    <tr>
                        <td>" . $function['ID'] . "</td>
                        <td>" . $function['NAME'] . "</td>
                        <td>" . $function['DESCRIPTION'] . "</td>
                        <td>
                            <a href='./edit.cargo.php?id=" . $function['ID'] . "' type='submit' class='btn btn-primary btn-sm' name='btn-edit'>Editar</a>

                            <a href='./delete.cargo.php?id=" . $function['ID'] . "' type='submit' class='btn btn-danger btn-sm' name='btn-delete'>Deletar</a>
                        </td>
                    </tr>
                    ";
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>