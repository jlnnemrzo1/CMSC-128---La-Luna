<?php
    session_start();
?>
<html lang="en">

<!--HEAD-->
<head>
  <title> Appointments </title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../Sidebar Nav/sidebar_style.css">
  <link rel="stylesheet" href="calendarstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>

<!--BODY-->
<body style = "height: 100%; width: 100%;">

<!--SIDEBAR-->
<div class="sidebar">
  <div class="logo-details">
  <img src="../Sidebar Nav/sidebar_logo_1.png" class="logopic1"></img>
  <img src="../Sidebar Nav/sidebar_logo_2.png" class="logopic2"></img>
</div>
<ul class="nav-list">
  <li>
    <a href="../Dashboard/dashboard.php">
      <i class="fa-solid fa-clipboard-check"></i>
      <span class="links_name">Dashboard</span>
      <div class="active-bar"></div>
    </a>
  </li>
  <li>
    <a href="../Admin_2/admin_2.php">
      <i class="fa-solid fa-sliders"></i>
      <span class="links_name">Admin Controls</span>
      <div class="active-bar"></div>
    </a>
  </li>
  <li>
    <a href="../La Luna Calendar/calendar.php" class='active-page'>
      <i class="fa-solid fa-calendar-days"></i>
      <span class="links_name">Appointments</span>
      <div class="active-bar"></div>
    </a>
  </li>
  <li>
    <a href="../Hotel/hotel.php">
      <i class="fa-solid fa-building"></i>
      <span class="links_name">Hotel</span>
      <div class="active-bar"></div>
    </a>
  </li>
  <li>
    <a href="../History_Page/history.php">
      <i class="fa-solid fa-folder-open"></i>
      <span class="links_name">History</span>
      <div class="active-bar"></div>
    </a>
  </li>
  <li>
    <a href="../Services/services.php">
      <i class="fa-solid fa-scissors"></i>
      <span class="links_name">Services</span>
      <div class="active-bar"></div>
    </a>
  </li>  
  <li>
    <a href="../Login/login.php">
      <i class="fa-solid fa-right-from-bracket"></i>
      <span class="links_name">Log Out</span>
      <div class="active-bar"></div>
    </a>
  </li> 
</ul>
</div>

<!--MAIN DASHBOARD-->
<section class="dashboard">
    <!--HEADER-->
    <div class="header">
        <div class="header-text">
            <span class="text">Appointments</span>
        </div>
        <div class="header-button">
            <button type="button" id="add-button" onclick="window.location.href='../Services/services.php';">Add booking</button>
        </div>
    </div>
    <!--CALENDAR-->
    <div class="appointments">
        <div class="container"> 
            <div class="calendar">
                <div class="month">
                    <i class="fas fa-angle-left 
                    prev"></i>
                    <div class="date">
                        <h1></h1>
                        <p></p>
                    </div>
                    <i class="fas fa-angle-right 
                    next"></i>
                </div>

                <div class="weekdays">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <button class="days"></button>
            </div>
        </div>
    </div>

    <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<center>
    <div class="appointments">
      <div class="table">
        <div class="todaytitle">
          <span id="date"></span>
        </div>
        <?php include ('calendardata.php'); ?>
        <div class="contents" id = "con">
        </div>
      </div>
     
    </div>
	</center>
 	</div>
	</div>
<script src = "calendarscript.js"></script>


</body>
</html>
<?php
    unset($_SESSION["error"]);
?>