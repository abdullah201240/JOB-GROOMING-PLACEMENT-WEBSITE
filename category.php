<!DOCTYPE html>
<html>
<head>
  <title>Job Post</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700;800&family=Roboto&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <style>
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-top: 2%;
    }

    #parent {
      display: grid;
      justify-content: center;
      align-items: center;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 40px;
    }

    .child {
      height: 260px;
      width: 300px;
      border: 2px solid  #0e0c3d;
      border-radius: 15px;
      background-color: #D9D9D9;
      box-shadow: 0 8px 16px 0 rgba(80, 80, 138, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
      overflow: hidden;
      position: relative;
    }

    .child:hover {
        opacity: 0.5;
      }


      .child img {
        height: 260px;
        width: 300px;
        justify-content: center;
        display: flex;
      }

      .child .text {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        font-size: 18px;
        color: #0e0c3d;
        text-align: center;
        width: 100%;
        padding: 10px 0;
        background-color: rgba(255, 255, 255, 0.7);
        font-weight: bold;
      }

  </style>
</head>
<body>


<div class="container">

  <div id="parent">
    <div class="child">
      <a href="#">  <img src="images/img2.png">
      <div class="text">(050)</div></a>
    </div>
    <div class="child">
      <a href="#">  <img src="images/img1.jpg">
      <div class="text">(060)</div></a>
    </div>
    <div class="child">
      <a href="#">  <img src="images/img3.jpg">
      <div class="text">(120)</div></a>
    </div>
    <div class="child">
      <a href="#">  <img src="images/img4.jpg">
      <div class="text">(050)</div></a>
    </div>
    <div class="child">
      <a href="#">  <img src="images/img5.jpg">
      <div class="text">(070)</div></a>
    </div>
    <div class="child">
      <a href="#">  <img src="images/img6.jfif">
      <div class="text">(150)</div></a>
    </div>
</div>

</div>

</body>
</html>
