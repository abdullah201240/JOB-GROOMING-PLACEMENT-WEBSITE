<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];

$answer = $_POST['answer'];
$demo = $_POST['demo'];
$question = $_POST['question'];


$sql = "INSERT INTO `question`( `jobid`, `question`, `option1`, `option2`, `option3`, `option4`,answer) VALUES ('$demo','$question','$option1','$option2','$option3','$option4','$answer')";

  mysqli_query($conn, $sql);


  $sql = "SELECT * FROM `question` WHERE `jobid`='$demo'";
  $result = $conn->query($sql);
  
  // Generate HTML for table rows
  $rows = '';
  $i=1;
  if ($result->num_rows > 0) {
  
    while ($row = $result->fetch_assoc()) {
      $id=$row['id'];
      $jobid=$row['jobid'];
      $rows .= '<tr>';
      $rows .= '<td>' . $i . '</td>';
      $rows .= '<td>' . $row['question'] . '</td>';
      $rows .= '<td>' . $row['option1'] . '</td>';
      $rows .= '<td>' . $row['option2'] . '</td>';
      $rows .= '<td>' . $row['option3'] . '</td>';
      $rows .= '<td>' . $row['option4'] . '</td>';
      $rows .= '<td>' . $row['answer'] . '</td>';
      $rows .= "<td><button class='delete-btn' onclick='checkCookies($id)' >Delete</button></td>";
      $rows .= '</tr>';
      $i=$i+1;
    }
  } else {
    $rows = '<tr><td colspan="2">No data available</td></tr>';
  }
  
  // Close the database connection
  $conn->close();
  
  // Output the HTML for table rows
  echo $rows;











?>