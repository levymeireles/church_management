<?php
include '../../services/connect.php';

if (isset($_GET)) {
    $id_delete = $_GET['id'];
    mysqli_query($con, "DELETE FROM FUNCTIONS WHERE ID = ". $id_delete);
    header('location: ./cargos.php');
}
