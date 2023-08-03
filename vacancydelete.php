<?php
include 'db.php';
$id=$_GET['id'];
$sql="DELETE FROM `vacancy` WHERE id='$id'";
mysqli_query($conn, $sql);
header("location: vacancy.php");

?>