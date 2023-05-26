<?php
$query = "SELECT * FROM MENUS ORDER BY POSITION ASC";
$res = mysqli_query($con, $query);

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
        <ul class="menu">
            <?php
            // $menus = array("Home", "Sobre", "Serviços", "Portfólio", "Contato");
            while ($menu = mysqli_fetch_assoc($res)) {
                echo "<li><a href='../" . $menu['PATH'] . "'>" . $menu['NAME'] . "</a></li>";
            }
            ?>
        </ul>
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