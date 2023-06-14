<?php
include '../../services/connect.php';

$resMinistrys = mysqli_query($con, "SELECT * FROM MINISTRYS");
$resFunctions = mysqli_query($con, "SELECT * FROM FUNCTIONS");
$ministrys = array();
$functions = array();
$id = 0;

while ($row = mysqli_fetch_array($resMinistrys)) {
    $ministrys[] = $row;
}

while ($row = mysqli_fetch_array($resFunctions)) {
    $functions[] = $row;
}

if (isset($_POST['new_member'])) {
    header('location: new.member.php');
}

if (isset($_POST['submit_button'])) {
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $ministry_id = $_POST['ministry'];
    $function_id = $_POST['function'];

    $haveEmail = mysqli_query($con, "SELECT * FROM MEMBERS WHERE EMAIL = '$email'");
    
    $res_id_membro = mysqli_query($con, "SELECT ID FROM ROLE WHERE NAME = 'membro'");
    while ($id_res = mysqli_fetch_assoc($res_id_membro)) {
        $id = $id_res;
    }
    $role_id = $id['ID'];

    $errorMsg = "";
    if (mysqli_num_rows($haveEmail) > 0) {

        $errorMsg = "$errorMsg Email já existente";
    }

    if (strlen($errorMsg) > 0) {
        echo "<script>alert('$errorMsg');</script>";
    }

    if (strlen($errorMsg) == 0) {
        $query_insert = "INSERT INTO MEMBERS (NAME, BIRTH_DATE, ADDRESS, EMAIL, PHONE, MINISTRY_ID, ROLE_ID, FUNCTION_ID)
                            VALUES('$name', '$birthdate', '$address', '$email', '$phone', $ministry_id, $role_id, $function_id);";
        echo $query_insert;
        mysqli_query($con, $query_insert);
        header('location:./membros.php');
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Church Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./new.member.styles.css" type="text/css">
</head>

<body>

    <?php include '../../components/nav-menu/nav.component.php'; ?>
    <h1>Novo membro</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <div id="loginForm" class="login-form">
                    <form method="post" enctype="multipart/form-data">
                        <div id='input_name' class="form-group">
                            <label for="name">Nome completo</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nome completo" required>
                        </div>
                        <div id='input_birthdate' class="form-group">
                            <label for="birthdate">Data de nascimento</label>
                            <input type="date" name="birthdate" class="form-control" id="birthdate" placeholder="Data de nascimento" required>
                        </div>
                        <div id='input_addres' class="form-group">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" class="form-control" id="addres" placeholder="Insira o endereço" required>
                        </div>
                        <div id='input_email' class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Insira o email" required>
                        </div>
                        <div id='input_phone' class="form-group">
                            <label for="phone">Contato</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Insira o contato" required>
                        </div>
                        <div id='input_ministry' class="form-group">
                            <label for="ministry">Selecione o ministério</label>
                            <select name="ministry" class="form-control" id="ministry" required>
                                <?php
                                foreach ($ministrys as $ministry) {
                                    echo "<option value='" . $ministry['ID'] . "'> " . $ministry['NAME'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div id='input_function' class="form-group">
                            <label for="function">Selecione o cargo</label>
                            <select name="function" class="form-control" id="function" required>
                                <?php
                                foreach ($functions as $function) {
                                    echo "<option value='" . $function['ID'] . "'> " . $function['NAME'] . "</option>";
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