<?php
include '../../services/connect.php';

if (isset($_POST['submit_button'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query_insert = "INSERT INTO MINISTRYS (NAME, DESCRIPTION)
                    VALUES('$name', '$description');";

    echo $query_insert;
    mysqli_query($con, $query_insert);
    header('location:./ministerios.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Church Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./new.ministerio.styles.css" type="text/css">
</head>

<body>

    <?php include '../../components/nav-menu/nav.component.php'; ?>
    <h1>Novo ministério</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <div id="loginForm" class="login-form">
                    <form method="post" enctype="multipart/form-data">
                        <div id='input_name' class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nome do minstério" required>
                        </div>
                        <div id='input_description' class="form-group">
                            <label for="description">Descrição</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Insira a descrição" required>
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