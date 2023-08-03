<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//   $question = $_POST['question'];
//   $option1 = $_POST['option1'];
//   $option2 = $_POST['option2'];
//   $option3 = $_POST['option3'];
//   $option4 = $_POST['option4'];
//   $answer = $_POST['answer'];
//   $jobid = $_POST['jobid'];
//   $sql = "INSERT INTO `question`( `jobid`, `question`, `option1`, `option2`, `option3`, `option4`) VALUES ('$jobid','$question','$option1','$option2','$option3','$option4')";

//   mysqli_query($conn, $sql);
//   echo '<script>';
//   echo 'showQuestionList(' . $id . ' )';
//   echo '</script>';

// }






?>



<!DOCTYPE html>
<html>

<head>
  <title>Admin</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@300;500&family=Roboto&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


</head>

<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-logo">
      <button class="openbtn" onclick="toggleSidebar()">☰</button>
      <img src="images/logo.png" alt="logo">
      <a href="admin.php" id="home"><i class="fa fa-home"></i> Home</a>
    </div>

    <div class="popup-card">
      <button class="topavatar-button" onclick="showPopup()">
        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="topavatar avatar-overlay"
          alt="Overlay Avatar">
      </button>
      <div class="popup-content" id="popupContent">
        <a href="profile.php"><i class="fa fa-user"></i>&nbspSee Profile</a>
        <hr>
        <a href="admin.php"><i class="fas fa-sign-out-alt"></i>&nbspLogout</a>
      </div>
    </div>

  </div>

  <!-- Sidebar -->
  <div class="sidebar" id="mySidebar">
    <a href="#" class="closebtn" onclick="toggleSidebar()">×</a><br><br><br>
    <a href="#" onclick="showContent('dashboard')">Dashboard</a>
    <a href="#" onclick="showContent('applicant')">Applicant List</a>
    <a href="#" onclick="showContent('questions')">Question Panel</a>
  </div>

  <!-- Content Sections -->
  <div id="dashboard" class="content active">

    <div class="row">
      <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading">TOTAL USERS</div>
          <div class="panel-body" style="background-color: #dceefa">
            <h5 class="text-center"><b>
                100
              </b></h5>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-danger">
          <div class="panel-heading">TOTAL JOBS</div>

          <div class="panel-body" style="background-color: #ffedeb">
            <h5 class="text-center"><b>
                50
              </b></h5>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-success">
          <div class="panel-heading">TOTAL APPLICANTS</div>
          <div class="panel-body" style="background-color: #f4fce6">
            <h5 class="text-center"><b>
                180
              </b></h5>

          </div>
        </div>
      </div>
    </div>
    <hr>
    <div style="display: flex; align-items: center;">
      <h4 style="font-weight: bold; margin-right: 10px;">Search <i class="fa fa-search"></i> :</h4>
      <input style="box-shadow: 0px 3px 3px 3px #3480eb; width: 400px;" class="form-control font-bold" id="myInput"
        type="text" placeholder="Search...">
    </div>

    <h1
      style="background: linear-gradient(90deg, rgba(20,26,82,1) 0%, rgba(0,120,208,0.9473039215686274) 35%, rgba(222,220,47,1) 100%); text-align:center; font-weight:bolder;">
      Vacancy</h1>
    <table class="table table-bordered text-center">
      <tr style="background-color: #172e7a; color: white;">

        <td>Company</td>
        <td>Vacancy</td>
        <td>Job Type</td>
        <td>Location</td>
        <td>Working Day</td>
        <td>Working Hour</td>
        <td>Holiday</td>
        <td>Salary</td>
        <td>Details</td>
        <td>Image</td>
        <td>Status</td>

        <td> Accept </td>
        <td> Reject </td>
      </tr>
      <tr>

        <?php
        $sql = "SELECT * FROM vacancy";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
          $id = $row["id"];
          $email = $row['email'];
          $name = $row['Company_Name'];
          ?>
          <tbody style="background-color: #c5d2fa" id="myTable">

            <td>
              <?php echo $row['Company_Name'] ?>
            </td>
            <td>
              <?php echo $row['Vacancy'] ?>
            </td>
            <td>
              <?php echo $row['Job_Type'] ?>
            </td>
            <td>
              <?php echo $row['Location'] ?>
            </td>
            <td>
              <?php echo $row['Working_day'] ?>
            </td>
            <td>
              <?php echo $row['Working_hour'] ?>
            </td>
            <td>
              <?php echo $row['Holiday'] ?>
            </td>
            <td>
              <?php echo $row['Salary'] ?>
            </td>
            <td>
              <?php echo $row['Details'] ?>
            </td>
            <td> <a href="<?php echo $row['image'] ?>"><img src="<?php echo $row['image'] ?>" alt="image" height="100px"
                  weight="100px"></a></td>
            <td>
              <?php echo $row['status'] ?>
            </td>


            <td>
              <?php echo "<a href='asprejvacancy.php?id=$id&&email=$email&&name=$name&&aid=1'> <button class='btn btn-success' ><i class='fas fa-check'></i></button></a>" ?>
            </td>
            <td>
              <?php echo "<a href='asprejvacancy.php?id=$id&&email=$email&&name=$name&&aid=2'> <button class='btn btn-danger' ><i class='fas fa-times'></i></button></a>" ?>
            </td>
          <?php } ?>
      </tr>


      </tbody>
    </table>

    <footer>
      <p class="p-3 bg-gray text-center">2023 All Rights Reserved. Design by Team ECHO</p>
    </footer>

  </div>

  <div id="applicant" class="content" style="margin-top: 60px;">

    <div id="jobList">

      <div style="display: flex; align-items: center;">
        <h4 style="font-weight: bold; margin-right: 10px;">Search <i class="fa fa-search"></i> :</h4>
        <input style="box-shadow: 0px 3px 3px 3px #3480eb; width: 400px;" class="form-control font-bold"
          id="myInputJobList" type="text" placeholder="Search...">
      </div>

      <h1
        style="background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(104,45,253,0.8772759103641457) 100%); text-align:center; font-weight:bolder;">
        Job List</h1>
      <table class="table table-bordered text-center">
        <tr style="background-color: #172e7a; color: white;">
          
          <td>Company</td>
          <td>Vacancy</td>
          <td>Job Type</td>
          <td>Location</td>
          <td>Working Day</td>
          <td>Working Hour</td>
          <td>Salary</td>
          <td>Applicant</td>
        </tr>
        <tr>
          <tbody style="background-color: #dcd2fc;" id="jobTable">
          <?php
          $sql = "SELECT * FROM `vacancy` WHERE `status`='Accept'";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_array($result)) {
            $id = $row["id"];
            $email = $row['email'];
            $name = $row['Company_Name'];
            ?>
            <tbody style="background-color: #dcd2fc;" id="jobTableq">

              <td>
                <?php echo $row['Company_Name'] ?>
              </td>
              <td>
                <?php echo $row['Vacancy'] ?>
              </td>
              <td>
                <?php echo $row['Job_Type'] ?>
              </td>
              <td>
                <?php echo $row['Location'] ?>
              </td>
              <td>
                <?php echo $row['Working_day'] ?>
              </td>
              <td>
                <?php echo $row['Working_hour'] ?>
              </td>

              <td>
                <?php echo $row['Salary'] ?>
              </td>
              <td>
                <button class="btn btn-warning" onclick="showApplicantList(<?php echo $id ?>)">
                View
                
               
              </button>
              </td>
            </tbody>
          <?php } ?>
            
          </tbody>
        </tr>
      </table>
    </div>

    <div id="applicantList" style="display: none;">
      <button id="back" onclick="goBack()">Job List</button>
      <hr>
      <div style="display: flex; align-items: center;">
        <h4 style="font-weight: bold; margin-right: 10px;">Search <i class="fa fa-search"></i> :</h4>
        <input style="box-shadow: 0px 3px 3px 3px #3480eb; width: 400px;" class="form-control font-bold"
          id="myInputApplicantList" type="text" placeholder="Search...">
      </div>
      <br>
      <div style="display: flex; align-items: center; justify-content: center;">
        <h1
          style="background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(104,45,253,0.8772759103641457) 100%); text-align:center; font-weight:bolder; display: inline-block;">
          &nbspApplicant List&nbsp</h1>
      </div>
      <table class="table table-bordered text-center" id="myTable">
        <thead>
        <tr style="background-color: #172e7a; color: white;">
          <td>User ID</td>
          <td>Name</td>
          <td>Address</td>
          <td>Email</td>
          
          <td>CV</td>
          
        </tr>
        </thead>
        <tr>
          <tbody style="background-color: #dcd2fc;" >
           
          </tbody>
        </tr>
      </table>

    </div>


    <script>
      function showApplicantList(id) {
        var jobList = document.getElementById("jobList");
        var applicantList = document.getElementById("applicantList");

        jobList.style.display = "none";
        applicantList.style.display = "block";
        $(document).ready(function () {
        // Function to fetch and populate table data
        function fetchTableData() {
          var parameter1 = id;
          $.ajax({
            url: 'showdata.php?param1=' + parameter1,
            type: 'GET',
            success: function (response) {
              // Update the table with the received data
              $('#myTable tbody').html(response);
            }
          });
        }



        // Initial load of the table data
        fetchTableData();




      });

      }

      function goBack() {
        var jobList = document.getElementById("jobList");
        var applicantList = document.getElementById("applicantList");

        jobList.style.display = "block";
        applicantList.style.display = "none";
      }

      $(document).ready(function () {
        $("#myInputJobList").on("keyup", function () {
          var value = $(this).val().toLowerCase();
          $("#jobTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
          });
        });

        $("#myInputApplicantList").on("keyup", function () {
          var value = $(this).val().toLowerCase();
          $("#applicantTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
          });
        });
      });

    </script>

    <footer>
      <p class="p-3 bg-gray text-center">2023 All Rights Reserved. Design by Team ECHO</p>
    </footer>
  </div>

  <div id="questions" class="content" style="margin-top: 60px;">

    <div id="jobListq">

      <div style="display: flex; align-items: center;">
        <h4 style="font-weight: bold; margin-right: 10px;">Search <i class="fa fa-search"></i> :</h4>
        <input style="box-shadow: 0px 3px 3px 3px #3480eb; width: 400px;" class="form-control font-bold"
          id="myInputJobListq" type="text" placeholder="Search...">
      </div>

      <h1
        style="background: linear-gradient(90deg, rgba(0,88,208,0.9024859943977591) 0%, rgba(133,69,252,0.9136904761904762) 50%, rgba(222,199,47,0.7792366946778712) 100%); text-align:center; font-weight:bolder;">
        Job List</h1>
      <table class="table table-bordered text-center">
        <tr style="background-color: #6a5396; color: white;">

          <td>Company</td>
          <td>Vacancy</td>
          <td>Job Type</td>
          <td>Location</td>
          <td>Working Day</td>
          <td>Working Hour</td>
          <td>Salary</td>
          <td>Questions</td>
        </tr>
        <tr>
          <?php
          $sql = "SELECT * FROM `vacancy` WHERE `status`='Accept'";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_array($result)) {
            $id = $row["id"];
            $email = $row['email'];
            $name = $row['Company_Name'];
            ?>
            <tbody style="background-color: #dcd2fc;" id="jobTableq">

              <td>
                <?php echo $row['Company_Name'] ?>
              </td>
              <td>
                <?php echo $row['Vacancy'] ?>
              </td>
              <td>
                <?php echo $row['Job_Type'] ?>
              </td>
              <td>
                <?php echo $row['Location'] ?>
              </td>
              <td>
                <?php echo $row['Working_day'] ?>
              </td>
              <td>
                <?php echo $row['Working_hour'] ?>
              </td>

              <td>
                <?php echo $row['Salary'] ?>
              </td>
              <td>
                <button class="btn btn-warning" onclick="showQuestionList(<?php echo $id ?>)">
                <?php echo $row['publish'];
                 ?>
               
              </button>
              </td>
            </tbody>
          <?php } ?>
        </tr>
      </table>
    </div>

    <div id="questionList" style="display: none;">
      <button id="back" onclick="goBackq()">Job List</button>
      <hr>

      <div class="container text-center" style="box-shadow: 10px 10px 5px lightblue;">
        <h2
          style="background: linear-gradient(90deg, rgba(0,88,208,0.9024859943977591) 0%, rgba(133,69,252,0.9136904761904762) 50%, rgba(222,199,47,0.7792366946778712) 100%); display: inline-block; font-weight:bolder;">
          <u>Add New Question-</u>
        </h2>
        <div class="d-flex justify-content-center">
          <form id="myForm">


            <input type="text" name="jobid" id="demo" hidden>
            <div class="form-group">
              <label for="question" style="font-weight: bold;">Question:
                <input type="text" name="question" id="question" class="form-control" style="width: 700px;" required>
              </label>
            </div>

            <div>
              <div class="custom-column">
                <div class="form-group">
                  <label for="option1">Option 1:
                    <input type="text" name="option1" id="option1" class="form-control form-control-sm input" required>
                  </label>
                </div>

                <div class="form-group">
                  <label for="option2">Option 2:
                    <input type="text" name="option2" id="option2" class="form-control form-control-sm input" required>
                  </label>
                </div>
              </div>

              <div class="custom-column">
                <div class="form-group">
                  <label for="option3">Option 3:
                    <input type="text" name="option3" id="option3" class="form-control form-control-sm input" required>
                  </label>
                </div>

                <div class="form-group">
                  <label for="option4">Option 4:
                    <input type="text" name="option4" id="option4" class="form-control form-control-sm input" required>
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="answer" style="font-weight: bold;">Answer:
                <input type="text" name="answer" id="answer" class="form-control form-control-sm input" required>
              </label>
            </div>

            <div class="row">
              <div class="col">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary" style="width: 100px;">
              </div>
            </div>
          </form>
          <br>
        </div>
      </div>
      <hr>
      <div style="display: flex; align-items: center;">
        <h4 style="font-weight: bold; margin-right: 10px;">Search <i class="fa fa-search"></i> :</h4>
        <input style="box-shadow: 0px 3px 3px 3px #3480eb; width: 400px;" class="form-control font-bold"
          id="myInputQuestion" type="text" placeholder="Search...">
      </div>
      <h1
        style="background: linear-gradient(90deg, rgba(0,88,208,0.9024859943977591) 0%, rgba(133,69,252,0.9136904761904762) 50%, rgba(222,199,47,0.7792366946778712) 100%); text-align:center; font-weight:bolder;">
        MCQ Questions</h1>




      </table>


      <form method="post" action="">
        <table class="table table-bordered text-center" id="myTable">
          <thead>
            <tr style="background-color: #6a5396; color: white;">
              <td> Question No. </td>
              <td> Question </td>
              <td> Option 1 </td>
              <td> Option 2 </td>
              <td> Option 3 </td>
              <td> Option 4 </td>
              <td> Answer </td>

              <td> Delete </td>
            </tr>
          </thead>
          <tbody style="background-color: #e2d4fa;">

            <td><button onclick='checkCookies(11)'> btn</button></td>

          </tbody>

          <!-- <tr>
            <tbody style="background-color: #e2d4fa;" id="questionTable">
              <td>1</td>
              <td>question?</td>
              <td>option1</td>
              <td>option2</td>
              <td>option3</td>
              <td>option4</td>
              <td>answer</td>
              <td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal"><i
                    class="fas fa-edit"></i> Edit </button>
              </td>
              <td>
                <button class="btn btn-danger" onclick="reject()"><i class="fas fa-times"></i></button>
              </td>
          </tr> -->
          </tbody>
        </table>
        <div class="text-center">
          <form id="done">
          <input type="text" name="jobid1" id="demo1"  hidden>
          <label for="">Set time in Minute</label>
          <input type="text" id="time">
          <br>
          <br>
          
          <button type="submit"  value="submit"  name="submit" onclick="okaydone()" class="btn btn-success" style="width: 100px;">Publish</button>
          </form>
        
        </div>
      </form>
      <!-- Modal popup code -->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Question</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="d-flex justify-content-center">
                <form name="" method="post" action="" class="text-center">
                  <div class="form-group">
                    <label for="question" style="font-weight: bold;">Question:</label>
                    <input type="text" name="question" class="form-control" style="width: 500px; margin: 0 auto;"
                      required>
                  </div>

                  <div class="row justify-content-center">
                    <div class="col-5">
                      <div class="form-group">
                        <label for="option1">Option 1:</label>
                        <input type="text" name="option1" class="form-control input"
                          style="width: 300px; margin: 0 auto;" required>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group">
                        <label for="option2">Option 2:</label>
                        <input type="text" name="option2" class="form-control input"
                          style="width: 300px; margin: 0 auto;" required>
                      </div>
                    </div>
                  </div>

                  <div class="row justify-content-center">
                    <div class="col-5">
                      <div class="form-group">
                        <label for="option3">Option 3:</label>
                        <input type="text" name="option3" class="form-control input"
                          style="width: 300px; margin: 0 auto;" required>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group">
                        <label for="option4">Option 4:</label>
                        <input type="text" name="option4" class="form-control input"
                          style="width: 300px; margin: 0 auto;" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="answer" style="font-weight: bold;">Answer:</label>
                    <input type="text" name="answer" class="form-control input" style="width: 300px; margin: 0 auto;"
                      required>
                  </div>

                  <div class="row justify-content-center">
                    <div class="col-12">
                      <input type="submit" name="submit" value="Add" class="btn btn-primary" style="width: 100px;">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <footer>
      <p class="p-3 bg-gray text-center">2023 All Rights Reserved. Design by Team ECHO</p>
    </footer>
  </div>
<script>
  function okaydone(){
    //alert("Question   successfully ");
    
  
    
    var demo1 = $('#demo1').val();
    var time = $('#time').val();


    // Send data using AJAX
    $.ajax({
      url: 'questionpublish.php',
      type: 'POST',
      data: {demo1: demo1 ,time:time},
      success: function (response) {
        // Handle the response from the server
        
        alert("Question Publish  successfully ");
        window.location.href = 'new.php'+'?a='+demo1;
        
        
        


      }
    });




  }
</script>


  <script>


$(document).ready(function () {
  $('#done').submit(function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Collect form data
    
    var demo1 = $('#demo1').val();


    // Send data using AJAX
    $.ajax({
      url: 'questionpublish.php',
      type: 'POST',
      data: {demo1: demo1, },
      success: function (response) {
        // Handle the response from the server
        alert("Question Publish  successfully ");
        var form = document.getElementById("done");
        form.reset();


      }
    });
  });


});

</script>






  <script>


    $(document).ready(function () {
      $('#myForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Collect form data
        var option1 = $('#option1').val();
        var option2 = $('#option2').val();
        var option3 = $('#option3').val();
        var option4 = $('#option4').val();
        var question = $('#question').val();
        var answer = $('#answer').val();
        var demo = $('#demo').val();


        // Send data using AJAX
        $.ajax({
          url: 'insert.php',
          type: 'POST',
          data: { option1: option1, option2: option2, option3: option3, option4: option4, question: question, answer: answer, demo: demo, },
          success: function (response) {
            // Handle the response from the server
            alert("Data Insert successfully ");
            var form = document.getElementById("myForm");
            form.reset();


          }
        });
      });


    });

  </script>



  <script>
    function checkCookies(button,id) {
      


      if (confirm("Are you sure you want to delete this record?")) {
        var row = button.parentNode.parentNode;
  row.parentNode.removeChild(row);
        var req = new XMLHttpRequest();
        req.open("GET", "deletemcq.php?id=" + id, true);

        req.send();
        req.onreadystatechange = function () {
          if (req.readyState == 4 && req.status == 200) {
            // Handle the response from the server
            console.log(response);

            // Remove the deleted row from the table
            row.remove();

          }
        }

      }

      // $.ajax({
      //         url: 'deletemcq?id=' + id,
      //         type: 'GET',
      //         success: function (response) {
      //           // Update the table with the received data
      //           console.log(response);
      //           fetchTableData();
      //         }
      //       });
    }
  </script>






  <script>
    function showQuestionList(id) {



      var inputField = document.getElementById("demo");
      // document.getElementById("demo").innerHTML = id;
      inputField.value = id;

      var inputField1 = document.getElementById("demo1");
      
      inputField1.value = id;
      var jobListq = document.getElementById("jobListq");
      var questionList = document.getElementById("questionList");

      jobListq.style.display = "none";
      questionList.style.display = "block";



      $(document).ready(function () {
        // Function to fetch and populate table data
        function fetchTableData() {
          var parameter1 = id;
          $.ajax({
            url: 'fetch_data.php?param1=' + parameter1,
            type: 'GET',
            success: function (response) {
              // Update the table with the received data
              $('#myTable tbody').html(response);
            }
          });
        }



        // Initial load of the table data
        fetchTableData();

        // Set an interval to refresh the table data periodically (optional)
        //setInterval(fetchTableData, 5000); // Refresh every 5 seconds

        setInterval(fetchTableData, 5000);


      });









    }

    function goBackq() {
      var jobListq = document.getElementById("jobListq");
      var questionList = document.getElementById("questionList");

      jobListq.style.display = "block";
      questionList.style.display = "none";
    }

    $(document).ready(function () {
      $("#myInputJobListq").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#jobTableq tr").filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
      });

      $("#myInputQuestion").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
      });
    });

  </script>


  <script>
    function toggleSidebar() {
      var sidebar = document.getElementById("mySidebar");
      var content = document.getElementsByClassName("content");

      if (sidebar.classList.contains("active")) {
        sidebar.classList.remove("active");
        for (var i = 0; i < content.length; i++) {
          content[i].style.marginLeft = "120px";
        }
      } else {
        sidebar.classList.add("active");
        for (var i = 0; i < content.length; i++) {
          content[i].style.marginLeft = "250px";
        }
      }
    }

    function showContent(sectionId) {
      // Hide all content sections
      var contentSections = document.getElementsByClassName("content");
      for (var i = 0; i < contentSections.length; i++) {
        contentSections[i].classList.remove("active");
        contentSections[i].style.marginLeft = "0";
      }

      // Show the selected content section
      var selectedSection = document.getElementById(sectionId);
      selectedSection.classList.add("active");
      selectedSection.style.marginLeft = "250px";

      // Remove "active" class from all sidebar links
      var sidebarLinks = document.querySelectorAll('.sidebar a');
      for (var i = 0; i < sidebarLinks.length; i++) {
        sidebarLinks[i].classList.remove("active");
      }

      // Add "active" class to the clicked sidebar link
      var clickedLink = document.querySelector('.sidebar a[href="#' + sectionId + '"]');
      clickedLink.classList.add("active");
    }

    // Show the dashboard content by default
    document.addEventListener("DOMContentLoaded", function () {
      showContent("dashboard");
      var sidebar = document.getElementById("mySidebar");
      sidebar.classList.add("active");
      var content = document.getElementsByClassName("content");
      for (var i = 0; i < content.length; i++) {
        content[i].style.marginLeft = "250px";
      }
    });

    // Open the sidebar by default
    window.onload = function () {
      toggleSidebar();
    };
  </script>



  <script>
    function showPopup() {
      var popupContent = document.getElementById("popupContent");
      popupContent.classList.toggle("show");
    }

    // Close the popup when clicking outside of it
    window.addEventListener('click', function (event) {
      var popupContent = document.getElementById("popupContent");
      if (!event.target.matches('.popup-card') && !event.target.matches('.topavatar') && !event.target.matches('.avatar-overlay')) {
        if (popupContent.classList.contains('show')) {
          popupContent.classList.remove('show');
        }
      }
    });

    $(document).ready(function () {
      $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    $(document).ready(function () {
      $("#myInputQuestion").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#myTabletr").filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

  </script>

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Roboto', sans-serif;
      background: #f0f3fa;
    }

    .navbar {
      height: 60px;
      background-color: #0D0C31;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
      display: flex;
      align-items: center;
      padding: 0 8px;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 2;
      transition: margin-left 0.5s;
    }

    .navbar-logo {
      display: flex;
      align-items: center;
      color: white;
    }

    .navbar-logo img {
      width: 50px;
      height: 40px;
      margin-right: 10px;
    }

    .navbar-menu {
      display: flex;
      align-items: center;
    }

    .navbar-link {
      color: white;
      text-decoration: none;
      font-size: 16px;
      margin-right: 20px;
      transition: color 0.3s ease;
    }

    .navbar-link:hover {
      color: grey;
    }

    .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: -250px;
      background-color: #0D0C31;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidebar a {
      padding: 10px;
      margin-bottom: 22px;
      text-decoration: none;
      font-size: 18px;
      color: white;
      display: block;
      transition: 0.3s;
    }

    .sidebar a:hover {
      color: grey;
    }

    .content {
      margin-left: 0;
      transition: margin-left 0.5s;
      padding: 20px;
      margin-top: 60px;
      width: calc(100% - 250px);
      display: none;
      margin-bottom: 60px;
    }

    .sidebar.active {
      left: 0;
    }

    .content.active {
      margin-left: 250px;
      display: block;
    }

    .openbtn {
      background-color: #0D0C31;
      border: none;
      color: white;
      padding: 10px 15px;
      border-radius: 3px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .openbtn:hover {
      background-color: grey;
    }

    .navbar .search-container {
      margin-left: auto;
      margin-right: 16px;
    }

    .navbar input[type=text] {
      padding: 6px;
      margin-top: 8px;
      font-size: 17px;
      border: none;
    }

    .search-container button {
      float: right;
      padding: 6px 10px;
      margin-top: 8px;
      margin-right: 16px;
      background: grey;
      font-size: 17px;
      border: none;
      cursor: pointer;
    }

    .search-container button:hover {
      background: #ccc;
    }

    .navbar.logo-image {
      width: 60px;
      height: 40px;
      border-radius: 2px;
    }

    .topavatar {
      position: relative;
      width: 50px;
      height: 50px;
      margin-right: 10px;
      border-radius: 50%;
      border: 2px solid #ccc;
    }

    .topavatar-button {
      background: none;
      border: none;
      padding: 0;
      cursor: pointer;
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
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      padding: 10px;
      z-index: 3;
      right: 0;
      display: none;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 150px;
      max-width: 150px;
    }

    .popup-content a {
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-decoration: none;
      margin-bottom: 12px;
      padding-bottom: 6px;
    }

    .popup-content a:hover {
      background-color: #555;
      border-radius: 0%;
    }

    .popup-content.show {
      display: block;
      border-radius: 0%;
    }

    .closebtn {
      position: absolute;
      right: 0;
      margin-right: 15px;
      margin-top: 5px;
      font-size: 20px;
      color: white;
      text-decoration: none;
      z-index: 2;
    }

    #home {
      float: left;
      display: block;
      color: black;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
      border-radius: 20px;
      background-color: #ccc;
      transition: background-color 0.3s ease;
      margin: 0 5px;
    }

    #home:hover {
      background-color: grey;
    }

    #parent {
      display: grid;
      justify-content: center;
      align-items: center;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 5px;
    }

    .child {
      height: 200px;
      width: 250px;
      border: 2px solid #0e0c3d;
      border-radius: 15px;
      background-color: #D9D9D9;
      box-shadow: 0 8px 16px 0 rgba(80, 80, 138, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
      overflow: hidden;
    }

    .child:hover {
      opacity: 0.5;
    }

    td,
    tr,
    th {
      text-align: center;
      padding: 8px;
      border: 1px solid #848191 !important;
    }

    #job,
    #questions,
    #applicant {
      margin-top: 2%;
    }

    .panel {
      box-shadow: 0 8px 16px 0 rgba(80, 80, 138, 0.8);
    }

    .input {
      width: 300px;
    }

    .custom-column {
      display: inline-block;
      vertical-align: top;
      margin-right: 20px;
    }

    footer {
      position: fixed;
      bottom: 0;
      left: 0;
      background-color: #D9D9D9;
      color: black;
      text-align: center;
      width: 100%;
      height: 40px;
      padding: 10px;
    }

    #back {
      background-color: #0D0C31;
      border-radius: 20px;
      font-size: 17px;
      color: white;
      width: 100px;
      height: 50px;
      border: 3px solid lightblue;
      text-decoration: underline;
    }

    #back:hover {
      background-color: grey;
    }
  </style>
</body>

</html>