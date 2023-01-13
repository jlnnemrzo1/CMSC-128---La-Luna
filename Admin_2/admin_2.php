<html>
<head>
	<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
	<title>Admin Controls</title>
	<link rel='stylesheet' href='admin_2.css?v=<?php echo time(); ?>"'>
</head>
<body>

<div class='title'>
    Admin Controls
</div>

<div class='navi'>
    <button class = 'navi_btn active'>Groomer</button>
    <button class = 'navi_btn'>Admin Details</button>
</div>
<div class="sidebar">
    <div class="logo-details">
    <img src="sidebar_logo_1.png" class="logopic1"></img>
    <img src="sidebar_logo_2.png" class="logopic2"></img>
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
    <a href="../Admin_2/admin_2.php" class='active-page'>
      <i class="fa-solid fa-sliders"></i>
      <span class="links_name">Admin Controls</span>
      <div class="active-bar"></div>
    </a>
  </li>
  <li>
    <a href="../La Luna Calendar/calendar.php">
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
  <script>
  $(document).ready(function(){
    $('ul li a').click(function(){
      $('li a').removeClass("active");
      $(this).addClass("active");
  });
  });
  </script>

<form action="logindetails_edit.php" method="POST">
  <div class='wrapper'>
      <div class='form'>
          <div class='inputfield'>
            <label id = "text1">Groomer</label>
            <input type='text' class='input' name = 'groomer'>
          </div>  
      <div class='inputfield'>
        <label>Commission</label>
        <input type='text' class='input' name = 'commission'>
      </div>
      <div class='inputfield'>
        <input type='submit' name = 'updatedatagroomer' value='Save' class='btn'>
      </div>
      </form> 
      </div>
</div>

<div class = 'wrapper' id = "groomerdetails">
<?php include ('groomerdetails.php'); ?>
       <table class="tg">
       <tr>
          <th>Groomer</th>
          <th>Commission</th>
          <th>Action</th>
        </tr>
        
          <?php 
        $result = $connect->query("SELECT * FROM `groomer_details`") 
        or die($connect->error);
        
            while($row = $result->fetch_assoc()) { 
              ?>
            <tbody>
            <tr> 
                <td class="tg-text1"><?php echo $row['Groomer_name']; ?></td>
                <td class="tg-text2"><?php echo $row['Commission']; ?></td>
                <td class="buttons"><a href = "groomer_del.php?deleteid=<?php echo $row['Groomer_ID']; ?>"><button id = "icon" type="submit"><i class="fa-solid fa-trash"></i></button></a>        
                </td>
              </tr>
            </tbody>
            <?php
          }?>
</div>
<script src = 'admin_2.js'></script>
	
</body>