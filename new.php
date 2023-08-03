<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

$demo1=$_GET['a'];
use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$sql1 = "SELECT * FROM `vacancy` WHERE id='$demo1'";
$result = mysqli_query( $conn, $sql1);
$data = $result->fetch_assoc() ;
$num = mysqli_num_rows( $result );
if ( $num == 1 ) {

    $email = $data[ 'email' ] ;
    $name = $data[ 'Company_Name' ];
    echo$email;
    

   

    $mail = new PHPMailer( true );
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jobgroomingplacementwebsite@gmail.com';
    $mail->Password = 'qmhsietzklxztoeq';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom( 'jobgroomingplacementwebsite@gmail.com', 'Job Grooming Placement Website' );
    $mail->addAddress( $email, $name );
    $mail->Subject = 'Congregation  '.$name;
    $mail->Body = 'You post is Accepted Now You can see the post in our newsfeed';
    $mail->send();
    header("location: admin.php");

}


?>