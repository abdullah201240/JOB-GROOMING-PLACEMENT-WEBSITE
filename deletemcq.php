<?php
include 'db.php';






$id = $_GET['id'];

// Prepare and execute the SQL query to delete the data
$sql = "DELETE FROM question WHERE id = '$id'";
mysqli_query($conn, $sql);


$sql = "SELECT * FROM `question` WHERE `jobid`='2'";
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