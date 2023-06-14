<?php
include '../../services/connect.php';

$resMembers = mysqli_query($con, "SELECT * FROM MEMBERS");
$members = array();

while ($row = mysqli_fetch_array($resMembers)) {
    $members[] = $row;
}

$id_edit = $_GET['id'];

$resEvent = mysqli_query($con, "SELECT * FROM EVENTS WHERE ID = " . $id_edit);
$event = mysqli_fetch_assoc($resEvent);

$date = substr($event['DATE'], 0, 10);

if (isset($_POST['edit_event'])) {
    header('location:./eventos.php');
}

if (isset($_POST['edit_button'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $local = $_POST['local'];
    $description = $_POST['description'];
    $member_id = $_POST['member_id'];


    if ($date == null) {
        $date = $event['DATE'];
    }

    $query_edit = "UPDATE EVENTS SET
    NAME = '$name',
    DATE = '$date' ,
    LOCAL = '$local',
    DESCRIPTION = '$description',
    MEMBER_ID = $member_id
    WHERE ID = $id_edit";
    echo $query_edit;
    mysqli_query($con, $query_edit);
    header('location:./eventos.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Church Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./new.evento.styles.css" type="text/css">
</head>

<body>

    <?php include '../../components/nav-menu/nav.component.php'; ?>
    <h1>Editar evento</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <div id="loginForm" class="login-form">
                    <form method="post" enctype="multipart/form-data">
                        <div id='input_name' class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nome do evento" required value="<?php echo $event['NAME'] ?>">
                        </div>
                        <div id='input_date' class="form-group">
                            <label for="date">Data do evento</label>
                            <input type="date" name="date" class="form-control" id="date" placeholder="Data do evento" required value="<?php echo $date ?>">
                        </div>
                        <div id='input_local' class="form-group">
                            <label for="local">Local</label>
                            <input type="text" name="local" class="form-control" id="local" placeholder="Insira o local" required value="<?php echo $event['LOCAL'] ?>">
                        </div>
                        <div id='input_description' class="form-group">
                            <label for="description">Descrição</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Insira a descrição" required value="<?php echo $event['DESCRIPTION'] ?>">
                        </div>
                        <div id='input_member' class="form-group">
                            <label for="member">Selecione o respnsável</label>
                            <select name="member_id" class="form-control" id="member_id" required>
                                <?php
                                foreach ($members as $member) {
                                    echo "<option value='" . $member['ID'] . "'> " . $member['NAME'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="edit_button" class="btn btn-primary btn-block">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>