<?php
include 'db.php';
error_reporting(E_ERROR | E_PARSE);
$id=$_GET['id'];


$sql="DELETE FROM `apply` WHERE id='$id'";
mysqli_query($conn, $sql);
header("location: apply.php");


?>