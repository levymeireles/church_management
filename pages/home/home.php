<?php
include '../../services/connect.php';
include '../../services/checkLogin.php';

$query = "SELECT * FROM USERS WHERE ID = $_SESSION[ID]";

$members = mysqli_query($con, "SELECT * FROM MEMBERS");
$events = mysqli_query($con, "SELECT * FROM EVENTS");
$ministrys = mysqli_query($con, "SELECT * FROM MINISTRYS");

$res = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($res);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Church Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./home.styles.css" type="text/css">

</head>

<body>
    <?php include '../../components/nav-menu/nav.component.php'; ?>

    <?php echo "<h1>Olá, " . $user['USERNAME'] . "</h1>" ?>
    <a href="./export.php?alias=membersXevents" class="btn-space btn btn-success btn-sm" type="submit">Exportar Membros X Eventos</a>

    <a href="./export.php?alias=ministrysXmembers" class="btn-space btn btn-success btn-sm" type="submit">Exportar Quantidade de membros por ministérios</a>

    <a href="./export.php?alias=membersUp18" class="btn-space btn btn-success btn-sm" type="submit">Exportar Membros maiores de 18 anos</a>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body ">
                        <h5 class="card-title">Total de membros <i class="bi bi-people-fill"></i></h5>
                        <p class="card-text"><?php echo mysqli_num_rows($members) ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total de eventos</h5>
                        <p class="card-text"><?php echo mysqli_num_rows($events) ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total de mininstérios</h5>
                        <p class="card-text"><?php echo mysqli_num_rows($ministrys) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>