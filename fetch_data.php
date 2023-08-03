<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';
$parameter1 = $_GET['param1'];

$sql = "SELECT * FROM `question` WHERE `jobid`='$parameter1'";
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
    $rows .= "<td><button  onclick='checkCookies(this,$id)' >Delete</button></td>";
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


