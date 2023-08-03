<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script>@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Apply Process</title>
    <style>

    body {
      margin: 0;
      padding: 0;
      font-family: 'Roboto', sans-serif;
    }

    .container {
      text-align: center;
      margin-top: 0;
    }

    #parent {
      display: grid;
      justify-content: center;
      align-items: center;
      grid-template-columns: repeat(3, auto);
      grid-gap: 80px;
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
        opacity: 0.8;
    }

    .child .icon {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      font-size: 18px;
      text-align: center;
      width: 100%;
      background-color: transparent;
      font-weight: bold;
      color: #0e0c3d;
    }

    </style>
  </head>
  <body>
    <div class="container">
    <h1 style="color:#black; font-size: xxx-large; text-align: center;">How it Works</h1>
    <br>
    <div id="parent">
      <div class="child">
        <a href="#">
        <div class="icon"><i class="fas fa-search" style="font-size: 4rem;"></i><h2>1. Search a job</h2>
          <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate.</p>
        </div></a>
      </div>
      <div class="child">
        <a href="#">
          <a href="#">
          <div class="icon"><i class="fas fa-mail-bulk" style="font-size: 4rem;"></i><h2>2. Apply for job</h2>
            <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate.</p>
          </div></a>
      </div>
      <div class="child">
        <a href="#">
          <a href="#">
          <div class="icon"><i class="fa fa-check-square-o" style="font-size: 4rem;"></i><h2>3. Get your job</h2>
            <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate.</p>
          </div></a>
      </div>

  </div>

    </div>
  </body>
</html>
