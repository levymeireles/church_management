<?php
include '../../services/connect.php';

$query = "SELECT E.ID, E.NAME, E.DATE , E.LOCAL, E.DESCRIPTION, M.NAME AS MEMBER FROM EVENTS E
INNER JOIN MEMBERS M ON M.ID = E.MEMBER_ID;";

$res = mysqli_query($con, $query);
$events = array();
while ($row = mysqli_fetch_array($res)) {
    $events[] = $row;
}

if (isset($_POST['new_event'])) {
    header('location: ./new.evento.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Church Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./eventos.styles.css" type="text/css">
</head>

<body>

    <?php include '../../components/nav-menu/nav.component.php'; ?>
    <h1>Eventos</h1>

    <form method="post">
        <div class="btn-new-event">
            <button type="submit" name="new_event" class="btn btn-success btn-block">Criar evento</button>
        </div>
    </form>

    <div class="container-table">
        <form method="post">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Local</th>
                        <th>Descrição</th>
                        <th>Responsável</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($events as $event) {
                        echo "
                    <tr>
                        <td>" . $event['ID'] . "</td>
                        <td>" . $event['NAME'] . "</td>
                        <td>" . substr($event['DATE'],0,10) . "</td>
                        <td>" . $event['LOCAL'] . "</td>
                        <td>" . $event['DESCRIPTION'] . "</td>
                        <td>" . $event['MEMBER'] . "</td>
                        <td>
                            <a href='./edit.evento.php?id=" . $event['ID'] . "' type='submit' class='btn btn-primary btn-sm' name='btn-edit'>Editar</a>

                            <a href='./delete.evento.php?id=" . $event['ID'] . "' type='submit' class='btn btn-danger btn-sm' name='btn-delete'>Deletar</a>
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