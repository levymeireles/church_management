<?php
header('Content-Type: text/html; charset=utf-8');
include '../../services/connect.php';

if (isset($_POST['submit_button'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($_FILES['file']['name']) {
        move_uploaded_file($_FILES['file']['tmp_name'], "../../images/" . $_FILES['file']['name']);
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
        $query_insert = "INSERT INTO USERS (NAME, USERNAME, EMAIL, PASSWORD, IMAGE ) VALUES('$name', '$username', '$email', '$password', '$image')";
        mysqli_query($con, $query_insert);
    }
    else{
        header('location:../home/home.php');

    }
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset=”UTF-8”>
    <title></title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td>
                    Username
                    <input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>
                    Email
                    <input type="text" name="email">
                </td>
            </tr>
            <tr>
                <td>
                    password
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td>
                    Image
                    <input type="file" name="file">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Cadastrar" name="submit_button">
                </td>
                <td>
                    <a href="login.php"> Login</a>
                </td>
            </tr>
        </table>
</body>

</html>