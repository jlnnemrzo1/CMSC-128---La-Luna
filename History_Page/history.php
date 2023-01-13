<?php
    session_start();
?>
<html lang="en">
<head>
  <title>History</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="../Sidebar Nav/sidebar_style.css">
  <link rel="stylesheet" href="history.css">
  <link rel="stylesheet" href="../common design.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style = "height: 100%; width: 100%;">
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
    <a href="../History_Page/history.php" class='active-page'>
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
<div class = "container">
    <p id = "title">History</h1>
    <div class = "filter">
            <p style = "font-weight: bold;"> Data from
            <input type = "date" id = "fromydate" name = "fromdate" oninput ="rangedate()"> to 
            <input type = "date" id = "todate" name = "todate"> </p>
            <p style = "font-weight: bold; display: inline-block; line-height: 20%;"> Filters &emsp;
                <div class = "filter1">
                    <input type = "radio" id = "groomer" name = "filtertype" value = "groomer" onclick="showlist()"> Groomer &emsp; &emsp;
                    <input type = "radio" id = "service" name = "filtertype" value = "service" onclick="hidelist()"> Service
                </div> <br>
                <div id="groomer-id">
                <?php include ('history_retrieve.php'); ?>
                    <select class = "custom-select" id = "select_groomer">
                    <option value = "Null" selected></option>
                    <?php  while($row = $result->fetch_assoc()) { ?>
                        <option value = <?php echo $row['Groomer_name'] ?>><?php echo $row['Groomer_name'] ?></option>
                        <?php }?>
                      </select>
                </div>
                <br>
            <input type="button" id="btn-ld" value="Load" onclick="load()">
    </div>
    <?php include ('data_connect.php'); ?>
    <div class = "filterresults">
      <div class = "res">
        <div class = "Noresults">
            <img id = "noresults" src = "../Pictures/no_data.png">
        </div>
      </div>
      
    </div>
</div>
<script>
$(document).ready(function(){
  $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
});
});
</script>
<script src = "history.js"></script>
<script type="text/javascript">
  function rangedate() {
    var from = document.getElementById("fromydate").value;
    document.getElementsByName("todate")[0].min = from;
  }
    
</script>
</body>
</html>
<?php
    unset($_SESSION["error"]);
?>