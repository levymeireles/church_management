<?php
include '../../services/connect.php';

$res = mysqli_query($con, "SELECT * FROM MEMBERS");
$members = array();
$id = 0;

while ($row = mysqli_fetch_array($res)) {
    $members[] = $row;
}

if (isset($_POST['new_evento'])) {
    header('location: new.evento.php');
}

if (isset($_POST['submit_button'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $local = $_POST['local'];
    $description = $_POST['description'];
    $member_id = $_POST['member_id'];

    $res_id_membro = mysqli_query($con, "SELECT ID FROM ROLE WHERE NAME = 'membro'");
    while ($id_res = mysqli_fetch_assoc($res_id_membro)) {
        $id = $id_res;
    }
    $role_id = $id['ID'];

    $query_insert = "INSERT INTO EVENTS (NAME, DATE, LOCAL, DESCRIPTION, MEMBER_ID)
                    VALUES('$name', '$date', '$local', '$description', '$member_id');";
    echo $query_insert;
    mysqli_query($con, $query_insert);
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
    <h1>Novo evento</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <div id="loginForm" class="login-form">
                    <form method="post" enctype="multipart/form-data">
                        <div id='input_name' class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nome do evento" required>
                        </div>
                        <div id='input_date' class="form-group">
                            <label for="date">Data do evento</label>
                            <input type="date" name="date" class="form-control" id="date" placeholder="Data do evento" required>
                        </div>
                        <div id='input_local' class="form-group">
                            <label for="local">Local</label>
                            <input type="text" name="local" class="form-control" id="local" placeholder="Insira o local" required>
                        </div>
                        <div id='input_description' class="form-group">
                            <label for="description">Descrição</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Insira a descrição" required>
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
                            <button type="submit" name="submit_button" class="btn btn-primary btn-block">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>