<?php
require_once 'vendor/autoload.php';

// init configuration
$clientID = '549644313500-deobaf7q3spkc7rvkr8uj2297g0utaqe.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/web/vlogin.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);

$client->addScope("email");
$client->addScope("profile");



?>


<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["singup"]))
  {
    $name = $_POST["name"];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $pass=md5($_POST['pass']);

    $sql="INSERT INTO `users`( `name`, `email`, `token`, `image`, `password`, `phone`) VALUES ('$name','$email','$pass','','$pass','$phone')";
    mysqli_query($conn, $sql);
    echo"<div class='alert alert-success'>
    <strong>Success!</strong> 
    Account created successfully
  </div>";
    

  }
  if(isset($_POST["login"]))
  {
    $email=$_POST['email'];
    $pass=md5($_POST['pass']);
    $sql="SELECT * FROM `users` WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn, $sql);
	$data = $result->fetch_assoc() ;
	$num = mysqli_num_rows($result);
	if ($num == 1){
    session_start();
    $_SESSION['user_email'] = $email ;
    header("location: home.php");

  }
  else{
    echo"<div class='alert alert-danger'>
    <strong>Not Login!</strong> User id or password wrong 
  </div>";
  }

  }
}

?>



<!DOCTYPE html>
<html>
<head>
  <title>Signup/Login Page</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <!-- <h1 style="background: linear-gradient(to right, #0e0c3d, #0D0C31); text-align: center; color: white;">
    <img src="https://images.pexels.com/photos/356043/pexels-photo-356043.jpeg" alt="logo" style="width: 40px;">
    <u>JOB GROOMING & PLACEMENT WEBSITE</u>
  </h1> -->

  <br></br>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form action="" method="post">
        <h1>Create Account</h1>
        <input type="text" placeholder="Name" name='name' />
        <input type="email" placeholder="Email" name='email' />
        <input type="phone" placeholder="Phone" name='phone' />
        <input type="password" placeholder="Password" name='pass' />
        <button style="margin-top:8px" type='submit' name="singup">Sign Up</button>
        <h1>OR</h1>
       
       <?php
       echo "<a href='".$client->createAuthUrl()."'><i class='fa fa-google-plus'style='font-size:48px;color:red'></i></a>"
       ?>
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form action="" method='post'>
        <h1>Sign In</h1>
         <label style="text-align: center">Enter your account</label>
        <input type="email" placeholder="Email" name='email'/>
        <input type="password" placeholder="Password"name='pass' />
        <button style="margin-top:8px" type="submit" name="login">Sign In</button>
        <h1>OR</h1>
       
        <?php
        echo "<a href='".$client->createAuthUrl()."'><i class='fa fa-google-plus'style='font-size:48px;color:red'></i></a>"
        ?>
        <a href="#">Forgotten password?</a>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>To keep connected with us please sign in the user panel</p>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Users!</h1>
          <p>To keep connected with us please sign in the user panel</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
      container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
      container.classList.remove("right-panel-active");
    });
  </script>
    <style>
    * {
      box-sizing: border-box;
    }

    body {
      background: grey;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-family: 'Montserrat', sans-serif;
      height: 100vh;
      margin: -20px 0 50px;
    }

    label {
    display: block;
    margin-bottom: 5px;
    margin-top: 8px;
    }

    h1 {
      font-weight: bold;
      margin: 0;
    }

    h2 {
      text-align: center;
    }

    p {
      font-size: 14px;
      font-weight: 100;
      line-height: 20px;
      letter-spacing: 0.5px;
      margin: 20px 0 30px;
    }

    span {
      font-size: 12px;
    }

    a {
      color: #333;
      font-size: 14px;
      text-decoration: none;
      margin: 15px 0;
    }

    button {
      border-radius: 20px;
      border: 1px solid #0D0C31;
      background-color: #0D0C31;
      color: #FFFFFF;
      font-size: 12px;
      font-weight: bold;
      padding: 12px 45px;
      letter-spacing: 1px;
      text-transform: uppercase;
      transition: transform 80ms ease-in;
    }

    button:active {
      transform: scale(0.95);
    }

    button:focus {
      outline: none;
    }

    button.ghost {
      background-color: transparent;
      border-color: #FFFFFF;
    }

    form {
      background-color: #FFFFFF;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 50px;
      height: 100%;
      text-align: center;
    }

    input {
      background-color: #eee;
      border: none;
      padding: 12px 15px;
      margin: 8px 0;
      width: 100%;
    }

    .container {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
      position: relative;
      overflow: hidden;
      width: 768px;
      max-width: 100%;
      min-height: 480px;
    }

    .form-container {
      position: absolute;
      top: 0;
      height: 100%;
      transition: all 0.6s ease-in-out;
    }

    .sign-in-container {
      left: 0;
      width: 50%;
      z-index: 2;
    }

    .container.right-panel-active .sign-in-container {
      transform: translateX(100%);
    }

    .sign-up-container {
      left: 0;
      width: 50%;
      opacity: 0;
      z-index: 1;
    }

    .container.right-panel-active .sign-up-container {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: show 0.6s;
    }

    @keyframes show {
      0%, 49.99% {
        opacity: 0;
        z-index: 1;
      }

      50%, 100% {
        opacity: 1;
        z-index: 5;
      }
    }

    .overlay-container {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: transform 0.6s ease-in-out;
      z-index: 100;
    }

    .container.right-panel-active .overlay-container {
      transform: translateX(-100%);
    }

    .overlay {
      background: #FF416C;
      background: -webkit-linear-gradient(to right, #0e0c3d, #0D0C31);
      background: linear-gradient(to right, #0e0c3d, #0D0C31);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: 0 0;
      color: #FFFFFF;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .container.right-panel-active .overlay {
      transform: translateX(50%);
    }

    .overlay-panel {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 40px;
      text-align: center;
      top: 0;
      height: 100%;
      width: 50%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
      transform: translateX(-20%);
    }

    .container.right-panel-active .overlay-left {
      transform: translateX(0);
    }

    .overlay-right {
      right: 0;
      transform: translateX(0);
    }

    .container.right-panel-active .overlay-right {
      transform: translateX(20%);
    }

    .social-container {
      margin: 20px 0;
    }

    .social-container a {
      border: 1px solid #DDDDDD;
      border-radius: 50%;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 0 5px;
      height: 40px;
      width: 40px;
    }

    footer {
      background-color: #222;
      color: #fff;
      font-size: 14px;
      bottom: 0;
      position: fixed;
      left: 0;
      right: 0;
      text-align: center;
      z-index: 999;
    }

    footer p {
      margin: 10px 0;
    }

    footer i {
      color: red;
    }

    footer a {
      color: #3c97bf;
      text-decoration: none;
    }
  </style>
</body>
</html>
