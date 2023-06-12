<?php
include '../../services/connect.php';

$query = "DELETE FROM USERS WHERE ID = '$_SESSION[ID]'";
mysqli_query($con, $query);

header('location:../../services/logout.php');
?>