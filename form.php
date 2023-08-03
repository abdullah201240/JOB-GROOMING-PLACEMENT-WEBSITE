<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$email=$_SESSION['user_email'];
include 'db.php';
  $sql="SELECT * FROM `users` WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
	$data = $result->fetch_assoc() ;
	$num = mysqli_num_rows($result);
	if ($num == 1){
    $name=$data['name'];

$img=$data['image'];
   

  }


?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $company= $_POST['company'];
  $vacancy=$_POST['vacancy'];
  $jobtype=$_POST['jobtype'];
  $location=$_POST['location'];
  $working_day=$_POST['working_day'];
  $working_hour=$_POST['working_hour'];
  $holiday=$_POST['holiday'];
  $salary=$_POST['salary'];
  $Details=$_POST['Details'];


  $img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
  $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

      if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database

				
        $sql1="INSERT INTO `vacancy`(`Company_Name`, `Vacancy`, `Job_Type`, `Location`, `Working_day`, `Working_hour`, `Holiday`, `Salary`,email,Details,image) VALUES ('$company','$vacancy','$jobtype','$location','$working_day','$working_hour','$holiday','$salary','$email','$Details','$img_upload_path')";
        

        if (mysqli_query($conn, $sql1)) {
          header("location: vacancy.php");
        } else {
          
        }
     
      
      
				
				
			
			}else {
				$em = "You can't upload files of this type";
		        header("Location: teacherprofile.php?error=$em");
			}














}

?>









<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Job Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@300;500&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyA_1WnWHIkFTsO2Idzkc48hSgYqNK246vo"></script>


  </head>
  <body>

    <!-- Navigation Bar -->
    <div class="topnav">
      <a href="home.php" class="active">
        <img src="images/logo.png" alt="logo" class="logo-image">
      </a>
      <a href="home.php"><i class="fa fa-home"></i> Home</a>
      <a href="form.php"><i class="far fa-clipboard"></i> Job Vacancy</a>
      <a href="vacancy.php"><i class="fa fa-list-alt"></i> Vacancy List</a>
      <a href="apply.php"><i class="fas fa-clipboard-list"></i> Apply List</a>


      <div class="popup-card">
        <button class="topavatar-button" onclick="showPopup()">
          <img src="<?php echo$img ?>" class="topavatar avatar-overlay" alt="Overlay Avatar">
        </button>
        <div class="popup-content" id="popupContent">
          <a href="profile.php"><i class="fa fa-user"></i> See Profile</a>
          <hr>
          <a href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>

      </div>

    </div>

<div class="float-container">
    <div id="survey-container">

      <form id="survey-form" action="" method="post" enctype="multipart/form-data">

        <label class="row-label" for="name">Company Name :</label>
        <input class="row-input" type="text" placeholder="Company Name" name="company" required>

        <label class="row-label" for="Vacancy">Vacancy :</label>
        <input class="row-input" type="text" placeholder="Vacancy" name="vacancy" required>

        <label class="row-label" for="Job type">Job type :</label>
        <input class="row-input" type="text" placeholder="Job type" name="jobtype" required>

        <label class="row-label" for="Location">Location :</label>
        <input class="row-input" type="text" placeholder="Location" id="to"  name="location" required>
        <label class="row-label" for="Location">Image :</label>
      
        <input class="row-input" type="file"  name="my_image"   required>

     



    </div>
    <div id="survey-container_2">

     

        <label class="row-label" for="Working Day">Working Days :</label>
        <input  class="row-input" type="text" placeholder="Working Day" name="working_day"required>


        <label class="row-label" for="Working hour">Working hours :</label>
        <input class="row-input" type="text" placeholder="Working hour" name="working_hour" required>

        <label class="row-label" for="Holiday">Holiday :</label>
        <input class="row-input" type="text" placeholder="Holiday" name="holiday" required>


        <label class="row-label" for="Salary">Salary :</label>
        <input class="row-input" type="text" placeholder="Salary" name="salary" required>
        <label class="row-label" for="Location">Details :</label>
        <textarea name="Details" id="Details" cols="30" rows="3">data</textarea>

       
      </div>
      
     

    </div>
    
   
    <br>

  
     <center> <button id="submit" type="submit"  align="center" >Submit</button> </center>  

        </form>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
  <footer>
    <p class="p-3 bg-gray text-center">2023 All Rights Reserved. Design by Team ECHO</p>
  </footer>
</div>

<script>
  function showPopup() {
    var popupContent = document.getElementById("popupContent");
    popupContent.classList.toggle("show");
  }

  // Close the popup when clicking outside of it
  window.addEventListener('click', function(event) {
    var popupContent = document.getElementById("popupContent");
    if (!event.target.matches('.popup-card') && !event.target.matches('.topavatar') && !event.target.matches('.avatar-overlay')) {
      if (popupContent.classList.contains('show')) {
        popupContent.classList.remove('show');
      }
    }
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
     
      var autocomplete_to, autocomplete_from;
      var to = 'to', from = 'from';

     //start for to google autocomplete with lat and long
      autocomplete_to = new google.maps.places.Autocomplete((document.getElementById(to)),{
          types:['geocode'],
      })
      google.maps.event.addListener(autocomplete_to,'place_changed',function(){

         var place = autocomplete_to.getPlace();
         jQuery("#lat_to").val(place.geometry.location.lat());
         jQuery("#long_to").val(place.geometry.location.lng());

      })

     
  });
</script>

<style>

body {
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
  background: #f0f3fa;
}

.topnav {
  position: relative;
  align-items: center;
  box-sizing: border-box;
  height: 60px;
  background: #D9D9D9;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
  display: flex;
}


.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 10px 14px;
  text-decoration: none;
  font-size: 17px;
  border-radius: 20px;
  background-color: #333;
  transition: background-color 0.3s ease;
  margin: 0 5px;
}

.topnav a:hover {
  background-color: #555;
}


.topnav a.active {
  background-color: #D9D9D9;
  color: white;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .logo-image {
  width: 50px;
  height: 32px;
  border-radius: 2px;
  display: flex;
}

  .topavatar {
    position: relative;
    width: 50px;
    height: 50px;
    margin-right: 10px;
    border-radius: 50%;
    border: 2px solid #ccc;
  }

  .popup-card {
    position: relative;
    display: inline-block;
    z-index: 1;
    margin-left: auto;
  }

  .popup-content {
    position: absolute;
    background-color: black;
    min-width: 120px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    padding: 10px;
    z-index: 3;
    right: 0;
    display: none;
    flex-direction: column;
    white-space: nowrap;
    overflow: hidden;
    max-width: 150px;
  }

  .popup-content a {
    padding: inherit;
    text-decoration: none;
    color: white;
    background: none;
  }

  .popup-content a:hover {
    background-color: #555;
    border-radius: 0%;
  }

  .popup-content.show {
    display: block;
    border-radius: 0%;
  }

  .topavatar-button {
    background: none;
    border: none;
    padding: 0;
    cursor: pointer;
  }

  footer {
    background-color: #D9D9D9;
    color: black;
    text-align: center;
    bottom: 0;
    width: 100%;
    padding: 10px;
    height: 40px;
    position: fixed;
  }

  #submit {
    cursor: pointer;
    margin: 0 auto;
    background-color: #4CAF50;
    color: black;
    font-weight: bold;
    height: 50px;
    width: 150px;
    border: 2px solid #ccc;
    border-radius: 20px;
    box-shadow: 0 8px 16px rgba(10, 10, 100, 0.5);
    

    left: 50%;
    transform: translateX(-50%);
  }

  #submit:hover {
    background: grey;
  }

  .float-container {
    text-align: center;
    justify-content: center;
  }

  #survey-container {
    display: inline-block;
    padding: 30px 20px;
    width: 60%;
    max-width: 600px;
    border-radius: calc(3 * var(--border-radius));
  }

  #survey-container_2 {
    display: inline-block;
    padding: 30px 20px;
    width: 60%;
    max-width: 600px;
    border-radius: calc(3 * var(--border-radius));
  }


  #survey-form {
    padding: 30px;
    padding-top: 20px;
    background: var(--color-1);
    opacity: 98%;
    border: none;
    border-radius: calc(2 * var(--border-radius));
  }

  #survey-form * {
    font-size: var(--font-size);
  }

  :root {
    --box-height: 40px;
    --border-radius: 5px;
    --space-between: 20px;
    --font-size: 16px;

    --color-0: #ffffff;
    --color-1: #dcdcdd;
    --color-2: #c5c3c6;
    --color-3: #212529;
    --color-4: #659b5e;
    --color-5: #ce4257;
  }

  .row-label,
  .row-input {
    padding: 5px 10px;
    margin: 0;
    height: var(--box-height);
    width: 100%;
    display: block;
    text-align: left;
  }

  .row-label {
    color: var(--color-3);
    font-weight: 600;
  }

  .row-label:not(:first-child) {
    margin-top: var(--space-between);
  }

  .row-input:not(.small) {
    background: white;
    border: none;
    border-radius: var(--border-radius);
  }

  .inline-label {
    margin-left: 10px;
    font-size: 14px;
    color: var(--color-3);
  }

  .small {
    height: calc(var(--box-height) * 0.75);
  }

</style>

  </body>
</html>
