<?php
header('Content-Type: text/html; charset=utf-8');
include '../../../services/connect.php';


$res = mysqli_query($con, "SELECT * FROM ROLE");

if (isset($_POST['submit_button'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    if ($_FILES['file']['name']) {
        move_uploaded_file($_FILES['file']['tmp_name'], "../../../images/" . $_FILES['file']['name']);
        $image = "images/" . $_FILES['file']['name'];
    }

    $haveUsername = mysqli_query($con, "SELECT * FROM USERS WHERE username  = '$username'");
    $haveEmail = mysqli_query($con, "SELECT * FROM USERS WHERE email = '$email'");
    $errorMsg = "";

    if (mysqli_num_rows($haveUsername) > 0) {
        $errorMsg = "Usuário já existente";
    }
    if (mysqli_num_rows($haveUsername) > 0) {

        $errorMsg = "$errorMsg Email já existente";
    }

    if (strlen($errorMsg) > 0) {
        echo "<script>alert('$errorMsg');</script>";
    }

    if (strlen($errorMsg) == 0) {
        $query_insert = "INSERT INTO USERS (NAME, USERNAME, EMAIL, PASSWORD, ROLE_ID, IMAGE )
                            VALUES('$name', '$username', '$email', '$password', $role, '$image');";
        echo $query_insert;
        mysqli_query($con, $query_insert);
        header('location:../../home/home.php');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Aplicação Pessoal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="new.user.style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <div id="loginForm" class="login-form">
                    <h2 class="text-center">Cadastro</h2>
                    <form method="post" enctype="multipart/form-data">
                        <div id='input_username' class="form-group">
                            <label for="username">Nome de usuário</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Insira seu nome de usuário" required>
                        </div>
                        <div id='input_password' class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Insira sua senha" required>
                        </div>
                        <div id='input_name' class="form-group">
                            <label for="name">Nome completo</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Insira seu nome completo" required>
                        </div>
                        <div id='input_email' class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Insira seu email" required>
                        </div>
                        <div id='input_role' class="form-group">
                            <label for="role">Selecione a role do usuário</label>
                            <select name="role" class="form-control" id="role" required>
                                <?php
                                while ($option = mysqli_fetch_assoc($res)) {
                                    echo "<option value='" . $option['ID'] . "'> " . $option['NAME'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div id='input_image' class="form-group">
                            <label for="file">Escolha uma imagem</label>
                            <input type="file" name="file">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit_button" class="btn btn-primary btn-block">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id='btnContrast' class="theme-toggle">
        <input type="checkbox" id="themeToggle">
        <label for="themeToggle" id="themeLabel">Modo Claro</label>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="new.user.script.js"></script>
</body>

</html>