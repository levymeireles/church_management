<?php

include '../../services/connect.php';

if (isset($_POST['submit_button'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM Users WHERE USERNAME = '$username' and PASSWORD = '$password'";

    $res = mysqli_query($con, $query);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['ID'] = $row['ID'];
        echo  $_SESSION['ID'];
        header('location:../home/home.php');
    } else {
        echo "<script>alert('Username or Password does not exist');</script>";
    }
}

if (isset($_POST['register_button'])) {
    header('location:../user/new_user/new.user.page.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Aplicação Pessoal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <div id="loginForm" class="login-form">
                    <h2 class="text-center">Login</h2>
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Nome de usuário</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Insira seu nome de usuário">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Insira sua senha">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit_button" class="btn btn-primary btn-block">Entrar</button>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="register_button" class="btn btn-secondary btn-block">Cadastrar</button>
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
    <script src="login.script.js"></script>
</body>

</html>