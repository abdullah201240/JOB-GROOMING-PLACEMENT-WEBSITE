<?php

include("db.php");
session_start();
error_reporting(E_ERROR | E_PARSE);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s = 1;
  $k = 0;
    $id=$_POST['jobid'];
    

    $sql = "SELECT * FROM `question` WHERE `jobid`='$id'";
    $result = mysqli_query($conn, $sql);
  
    while ($row = mysqli_fetch_array($result)) {
      $q1 = $_POST["$s"];
      $ns = $row['answer'];
      
      
      if ($row['answer'] == $q1) {
  
        $k = $k + 1;
      } else {
      }
      $s = $s + 1;
    }
   

    if($k>7){
        include("result.php");
    }
    else{
        include("result2.php");
    }
  }
  
  




?>