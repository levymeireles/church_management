<?php
$query = "SELECT * FROM MENUS ORDER BY POSITION ASC";
$res = mysqli_query($con, $query);

$queryUser = "SELECT * FROM USERS WHERE ID = $_SESSION[ID]";
$resUser = mysqli_query($con, $queryUser);
$user = mysqli_fetch_assoc($resUser);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Menu de Navegação</title>
    <link rel="stylesheet" type="text/css" href="../../components/nav-menu/nav.styles.css">
</head>

<body>
    <nav>
        <div class="menu-toggle">&#9776;</div>
        <div class="div-menu">
            <ul class="menu">
                <?php
                while ($menu = mysqli_fetch_assoc($res)) {
                    echo "<li><a href='../" . $menu['PATH'] . "'>" . $menu['NAME'] . "</a></li>";
                }
                ?>
            </ul>
            <div class="div-profile">
                <?php
                echo "<img class='img-profile' src='../../" . $user['IMAGE'] . "'/>"
                ?>
                <a class='btn btn-danger' href="../../services/logout.php">Sair</a> <br><br>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.menu-toggle').click(function() {
                $('.menu').toggleClass('active');
            });
        });
    </script>
</body>

</html>