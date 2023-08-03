<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   require 'PHPMailer-master/src/Exception.php';
   require 'PHPMailer-master/src/PHPMailer.php';
   require 'PHPMailer-master/src/SMTP.php';

include 'db.php';
$id=$_GET['id'];
$aid=$_GET['aid'];
$email=$_GET['email'];
$name=$_GET['name'];

if($aid==1){
   
    $sql=" UPDATE `vacancy` SET `status`='Accept' WHERE id='$id'";
    mysqli_query($conn, $sql);

  
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='jobgroomingplacement@gmail.com';
    $mail->Password='thbeszaqangetgml';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('jobgroomingplacement@gmail.com', 'Job Grooming Placement');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Congregation  '.$name;
    $mail->Body = 'You post is Accepted wait 48 hours. Our teams is making qustion for your job post';
    $mail->send();
  
    header("location: admin.php");
}
if($aid==2){
    $sql=" UPDATE `vacancy` SET `status`='Reject' WHERE id='$id'";
    mysqli_query($conn, $sql);

    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='jobgroomingplacement@gmail.com';
    $mail->Password='thbeszaqangetgml';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('jobgroomingplacement@gmail.com', 'Job Grooming Placement');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Sorry  '.$name;
    $mail->Body = 'You post is Rejected . Please Solve the problem';
    $mail->send();
  







    header("location: admin.php");
}



?>