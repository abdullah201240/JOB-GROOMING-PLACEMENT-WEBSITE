<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';
$parameter1 = $_GET['param1'];

$sql = "SELECT * FROM `apply` WHERE `jobid`='$parameter1'";
$result = $conn->query($sql);

// Generate HTML for table rows
$rows = '';
$i=1;
if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {
    $cv=$row['cv'];
    $id=$row['id'];
    $jobid=$row['jobid'];
    $rows .= '<tr>';
    $rows .= '<td>' . $i . '</td>';
    $rows .= '<td>' . $row['name'] . '</td>';
    $rows .= '<td>' . $row['address'] . '</td>';
    $rows .= '<td>' . $row['email'] . '</td>';
    $rows .= "<td> <a href='$cv'> CV </td>";
   
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
