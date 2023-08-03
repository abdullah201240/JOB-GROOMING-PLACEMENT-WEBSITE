<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@300;500&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <style>

    body {
      margin: 0;
      padding: 0;
      font-family: 'Roboto', sans-serif;
      background: #555;
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
      margin-right: auto;
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

    .navbar input[type=text] {
      padding: 6px;
      margin-top: 8px;
      font-size: 17px;
      border: none;
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

      #home{
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

      #home:hover{
        background-color: grey;
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

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: auto;
      height: 100vh;
    }

    .card {
      width: 100%;
      height: 40%;
      max-width: 600px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.9);
      border-radius: 6px;
      padding: 20px;
      background: #f0f3fa;
      margin-bottom: 100px;
    }

    @media (min-width: 768px) {
      .card {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        gap: 20px;
      }

      .card .col-md-3 {
        flex: 0 0 auto;
        width: 30%;
        max-width: 30%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-top: 8%;
        margin-left: 5%;
      }

      .card .col-md-9 {
        flex: 0 0 auto;
        width: 70%;
        max-width: 70%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-top: 8%;
        margin-left: 5%;
      }

    }
    .avatar {
      width: 200px;
      height: 160px;
      border-radius: 10%;
      object-fit: cover;
    }

  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-logo">
      <img src="images/logo.png" alt="logo">
      <a href="admin.php" id="home"><i class="fa fa-home"></i> Home</a>
    </div>

    <div class="popup-card">
      <button class="topavatar-button" onclick="showPopup()">
        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="topavatar avatar-overlay" alt="Overlay Avatar">
      </button>
      <div class="popup-content" id="popupContent">
        <a href="profile.php"><i class="fa fa-user"></i>&nbspSee Profile</a><hr>
        <a href="index.php"><i class="fas fa-sign-out-alt"></i>&nbspLogout</a>
      </div>
    </div>

  </div>


  <div class="container">
    <div class="card">
      <div class="col-md-3">
          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
      </div>
      <div class="col-md-9">
        <h2 style="background-color: #0e0c3d; color: white; padding: 10px; display: inline-block; width: fit-content;">John Doe</h2>
        <h4><strong>Email:</strong> example@example.com</h4>
        <h4><strong>Phone:</strong> 1234567890</h4>
      </div>
    </div>
  </div>


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

</body>
</html>
