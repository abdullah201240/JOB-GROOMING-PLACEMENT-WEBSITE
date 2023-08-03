<!DOCTYPE html>
<html>
<head>
  <title>Index</title>

</head>
<body>

  <!-- Navigation Bar -->
  <div class="topnav">
    <a href="index.php" class="active">
      <img src="images/logo.png" alt="logo" class="logo-image">
    </a>
    <a href="index.php"><i class="fa fa-home"></i> Home</a>

    <div style="padding-left: 12px;">
      <input style="box-shadow: 0px 1px 3px 3px #0e0c3d; width: 300px;" class="form-control font-bold" id="myInput" type="text" placeholder="Search...">
    </div>

    <div class="topnav-right">
      <a style="background-color: #0e0c3d;" href="login.php" onmouseover="this.style.backgroundColor='#555';" onmouseout="this.style.backgroundColor='#0e0c3d';">
        <i class="fas fa-user-plus"></i> Register
      </a>
      <a style="background-color: #0e0c3d;" href="login.php" onmouseover="this.style.backgroundColor='#555';" onmouseout="this.style.backgroundColor='#0e0c3d';">
        <i class="fas fa-user"></i> Login
      </a>
    </div>
  </div>

  <div class="section sec1 section-content">
    <!-- Container -->
      <div class="box">
        <h1>Find the</h1>
        <h1>most exciting</h1>
        <h1>startup jobs</h1>
      </div>
      <div class="btnbox">
        <input type="text" placeholder="Job Title or keyword">
        <select class="selectpicker" data-live-search="true">
          <option data-tokens="BD">Location BD</option>
          <option data-tokens="PK">Location PK</option>
          <option data-tokens="US">Location US</option>
          <option data-tokens="UK">Location UK</option>
        </select>
        <form action="#">
          <button class="sbtn" type="submit"><i class="fa fa-search"></i> Find Job</button>
        </form>
      </div>
    </div>

  <div class="section sec2">
    <h2 class="section-title">Category</h2>
    <br>
    <div id="categoryContent" class="searchable">
      <?php include 'category.php'; ?>
   </div>
  </div>

  <div class="section sec3">
    <h2 class="section-title">Apply Process</h2>
    <div id="processContent" class="searchable">
        <?php include 'process.php'; ?>
    </div>
  </div>

  <footer>
    <p class="p-3 bg-gray text-center">2023 All Rights Reserved. Design by Team ECHO</p>
  </footer>

  <script>
  window.onload = function() {
    // Get the input field and search for matching elements
    var input = document.getElementById('myInput');
    input.addEventListener('input', function() {
      var filter = input.value.toLowerCase();
      var elements = document.getElementsByClassName('searchable');

      // Loop through all the elements and show/hide based on the search query
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        var text = element.innerText.toLowerCase();

        if (text.includes(filter)) {
          element.style.display = 'block';
        } else {
          element.style.display = 'none';
        }
      }
    });
  };
</script>
  <style>

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url('images/bg.jpg');
      background-size: contain;
    }

    .profile-image-overlay {
      position: absolute;
      bottom: -5px;
      left: 25%;
      transform: translateX(-50%);
      background-color: white;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      z-index: 1;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .profile-image img.avatar-overlay {
      position: absolute;
      bottom: -5px;
      left: 25%;
      transform: translateX(-50%);
      width: 60px;
      height: 60px;
      border-radius: 50%;
      z-index: 2;
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
      padding: 14px 16px;
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

    .topnav .logo-image {
      width: 50px;
      height: 32px;
      border-radius: 2px;
      display: flex;
    }

    .topavatar-button {
      background: none;
      border: none;
      padding: 0;
      cursor: pointer;
    }

    .topnav-right {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      margin-left: auto;
      margin-right: 16px;
    }

    .topnav-right a {
      margin-left: 10px;
    }

    /* Section Styles */
    .section {
      background-color: #f2f2f2;
    }

    .sec1{
      margin-bottom: 32%;
    }

    .sec2{
      margin-bottom: 4%;
      padding: 10px;
    }
    .sec3{
      margin-bottom: 4%;
      padding: 10px;
    }

    .section-title {
      font-size: 30px;
      font-weight:800;
      margin-bottom: 4px;
      text-align: center;
      text-decoration:underline;
    }

    .box {
      position: absolute;
      width: 660px;
      height: 352px;
      left: 12%;
      font-family: 'Inter';
      font-style: normal;
      font-weight: 800;
      font-size: 40px;
      line-height: 50px;
      color: #000000;
    }

    .btnbox {
      box-shadow: 0 8px 16px 0 rgba(88, 88, 138, 0.5);
      position: absolute;
      width: auto;
      height: 55px;
      background-color: inherit;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 0px;
      left: 14%;
      bottom: 32%;
    }

    .sbtn {
      height: 55px;
      width: 169.6px;
      background-color: #0e0c3d;
      color: white;
    }

    .sbtn:hover {
      background-color: #555;
    }

    footer {
      background-color: #D9D9D9;
      color: black;
      text-align: center;
      bottom: 0;
      width: 100%;
      padding: 2px;
      height: 40px;
    }

    .topnav input[type=text] {
      padding: 6px;
      margin-top: 5px;
      font-size: 17px;
      border: none;
    }

  </style>
</body>
</html>
