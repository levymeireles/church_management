<?php
include '../../services/connect.php';

if (isset($_GET)) {
    $id_delete = $_GET['id'];
    mysqli_query($con, "DELETE FROM MINISTRYS WHERE ID = ". $id_delete);
    header('location: ./ministerios.php');
}
