<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

//use PHPMailer\PHPMailer\PHPMailer;

include 'db.php';

$demo1 = $_POST['demo1'];
$time = $_POST['time'];



$sql = "UPDATE `vacancy` SET `publish`='Publish' ,`time`='$time' WHERE id='$demo1'";
mysqli_query( $conn, $sql );


// $sql1 = "SELECT * FROM `vacancy` WHERE id='$demo1";
// $result = mysqli_query( $conn, $sql1 );
// $data = $result->fetch_assoc() ;
// $num = mysqli_num_rows( $result );
// if ( $num == 1 ) {

//     $email = $data[ 'email' ] ;
//     $name = $data[ 'Company_Name' ];
//     echo$email;
    

//     require 'PHPMailer-master/src/Exception.php';
//     require 'PHPMailer-master/src/PHPMailer.php';
//     require 'PHPMailer-master/src/SMTP.php';

//     $mail = new PHPMailer( true );
//     $mail->isSMTP();
//     $mail->Host = 'smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'jobgroomingplacementwebsite@gmail.com';
//     $mail->Password = 'qmhsietzklxztoeq';
//     $mail->SMTPSecure = 'ssl';
//     $mail->Port = 465;
//     $mail->setFrom( 'jobgroomingplacementwebsite@gmail.com', 'Job Grooming Placement Website' );
//     $mail->addAddress( $email, $name );
//     $mail->Subject = 'Congregation  '.$name;
//     $mail->Body = 'You post is Accepted Now You can see the post in our newsfeed';
//     $mail->send();

// }

?>