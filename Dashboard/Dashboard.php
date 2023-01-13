<?php
    session_start();
?>
<html>
<!--HEAD-->
<head>
  <title> Dashboard </title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="dashboard.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
    <a href="../Dashboard/dashboard.php" class='active-page'>
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

<!--MAIN DASHBOARD-->
<section class="dashboard">
    <div class="banner">
        <div class="box">
            <div class="image">
              <img id="dog-image" src="../Pictures/business-3d-white-dog-standing.png" alt="dog-image">
            </div>
            <div class="text">
              <div class="welcome-text">
                <span class="text">Hi, Admin!</span>
              </div>
              <div class="date-text">
                  <span id="date"></span>
              </div>
            </div>
        </div>
    </div>
    <!--TABLE OF APPOINTMENTS-->
    <div class="appointments">
      <div class="table">
        <div class="todaytitle">
          <span class="text">Today's Appointments</span>
        </div>
        <table class="tg">
        <?php include ('dashboarddata.php'); ?>
       <tr>
          <th>Owner</th>
          <th>Pet</th>
          <th>Contact</th>
          <th style = "text-align: center">Service</th>
          <th style = "text-align:center; width: 50px; white-space: nowrap; padding-left: 20px; padding-right: 40px;">Add-ons</th>
          <th>Time</th>
        </tr>
        
            <?php 
        
            while($row = $result->fetch_assoc()) { 
              ?>
            <tbody>
              <tr>

              <?php
              $date = new DateTime($row['App_Date']);
              $time = $date->format('H:i A');
              ?>

                <td class="tg-text1"><?php echo $row['Owners_Name']; ?></td>
                <td class="tg-text2"><?php echo $row['Pets_Name']; ?></td>
                <td class="tg-text3"><?php echo $row['Contact_Number']; ?></td>
                <td class="tg-text4"><?php echo $row['Bath_Type']; ?></td>
                <td class="tg-text5"><?php echo $row['Add-on_Services']; ?></td>
                <td class="tg-text6"><?php echo $time; ?></td>

              </tr>
            </tbody>
            <?php }?>
        </table>
      </div> 
    </div>   
    <?php include ('hoteldata.php');
    $colsum = $colres->fetch_assoc();
    $rownum = $rowres->fetch_assoc();
    $dycrsum = $dycr->fetch_assoc();
    $total = $colsum['total'] + $rownum['total1'];
    $dycr1 = $dycrsum['dycr_count'];


?>
        <!--BANNER FOR NUM OF PETS IN HOTEL-->
        <div class="banner1">
        <div class="box1">
            <div class="pets-htl">
                <div class="number"><?php echo $total; ?></div>
                <div class="box-text">pets in hotel</div>
            </div>
            <div class="image1">
              <img id="cat-image" src="../Pictures/3d-casual-life-cat-lies-on-open-books.png" alt="cat-image">
            </div>
            <div class="pets-dycr">
                <div class="number"><?php echo $dycr1; ?></div>
                <div class="box-text">pets in daycare</div>
            </div>

        </div>
    </div>

</section>
<script>
$(document).ready(function(){
  $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
});
});     

var dt = new Date();
document.getElementById("date").innerHTML= dt.toDateString();

</script>

</script>
</body>
</html>
<?php
    unset($_SESSION["error"]);
  ?>