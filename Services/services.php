<html>
<html lang="en">
<head>
  <title>Services</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="../Sidebar Nav/sidebar_style.css">
  <link rel="stylesheet" href="services.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../common design.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    <a href="../History_Page/history.php">
      <i class="fa-solid fa-folder-open"></i>
      <span class="links_name">History</span>
      <div class="active-bar"></div>
    </a>
  </li>
  <li>
    <a href="../Services/services.php" class='active-page'>
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

  <button class = "basketcontainer" onclick = "opencontainer()">
      <div class = "basketimagecontainer">
      <i class="fa fa-shopping-basket" aria-hidden="true"></i>
    </div>
  </button>
  <div id = "salescontainer">
    <div id = "inputsalescontainer">
        <p id = "nameline"></p>
        <p id = "petnameline"></p>
        <p id = "cnumberline"></p>
        <p id = "bookdateline"></p>
        <p id = "appdateline"></p>
    </div>
    <p id = "currenttotal">Total: </p>
  </div>
  <form action = "add_services.php" method = "POST">
<div class = "container">
    <p id = "title">Services</p>
    <div class = "customerdetailscontainer">
        <p id = "label">Customer Details</p>
        <p id = "customercontent"> 
            <table id = "forcustomer">
                <tr>
                    <td style = "width: 20%;"> Owner's Name </td>
                    <td id = "inp"> <input type = "text" id = "oname" class = "inputcustomer" name = "ownername" required oninput="myFunction();putData()"> </td>
                    <td style = "width: 25%;"> &emsp;&emsp;&emsp;Appointment Date </td>
                    <td id = "inp"> <input type = "datetime-local" id = "appdate" class = "inputcustomer2" name = "appdate" required oninput="myFunction3()"> </td>
                </tr>
                <tr>
                    <td> Pet's Name </td>
                    <td id = "inp"> <input type = "text" id = "petn" class = "inputcustomer" name = "petname" required oninput="myFunction1()"> </td>
                </tr>
                <tr>
                    <td> Contact Number</td>
                    <td id = "inp"> <input type = "tel" pattern="[0-9]{11}" placeholder="09123456789" id = "cnumber" class = "inputcustomer" name = "cnumber" required oninput="myFunction2()" data-value = "10"> </td>
                </tr> 
            </table> 
             
        </p>
    </div>
    <div class = "spaservicecontainer">
        <div class = "spadetails">
        <p id = "label">Spa Services</p>
            <table id = "forspa">
                <tr>
                  <?php include ('services_retrieve.php'); ?>
                    <td style = "width: 30%;"><h5>Select Groomer</h5> </td>
                    <td><select class = "custom-select" name = "select_groomer" id = "select_groomer">
                        <option value = "Null" selected></option>
                        <?php  while($row = $result->fetch_assoc()) { ?>
                        <option value = <?php echo $row['Groomer_name'] ?>><?php echo $row['Groomer_name'] ?></option>
                        <?php }?>
                    </select></td>
                </tr>
                <tr>
                    <td> <h5>Bath Type</h5></td>
                    <td>
                        <input type = "radio" id = "bath" name = "bath" value = "Basic Bath"> Basic Bath&emsp; &emsp;
                        <input type = "radio" id = "bath" name = "bath" value = "Deluxe Bath"> Deluxe Bath
                    </td>
                </tr>
                <tr>
                    <td> <h5>Pet Size</h5> </td>
                    <td>
                        <input type = "radio" id = "size" name = "size" value = "S"> S &emsp; &emsp;
                        <input type = "radio" id = "size" name = "size" value = "M"> M &emsp; &emsp;
                        <input type = "radio" id = "size" name = "size" value = "L"> L &emsp; &emsp;
                        <input type = "radio" id = "size" name = "size" value = "XL"> XL &emsp; &emsp;
                        <input type = "radio" id = "size" name = "size" value = "XXL"> XXL
                    </td>
                </tr>
                <tr>
                    <td> <h5>Discount</h5></td>
                    <td>
                        <input type = "radio" id = "ten" name = "disc" value = "10"> 10% &emsp; &emsp;
                        <input type = "radio" id = "fifty" name = "disc" value = "50"> 50% &emsp; &emsp;
                        <input type = "radio" id = "manual" name = "disc" onclick = "selectmanual()"> Manual &emsp;
                        <input type = "number" class = "select1" min="1" id = "manualinput" name = "disc" style = "opacity: 0.5;" disabled>
                    </td>
                </tr>
            </table> <br>
            <p id = "label">Add-on Services</p>
            <div id = "addonscheckbox">
            <table id = "forAddonServices">
              <tr>
                <td><input type = "checkbox" id = "op" name = "op1" value = "Professional Styling" price = "200"> &ensp;Professional Styling </td>
                <td><input type = "checkbox" id = "op" name = "op5" value = "Detangling (Regular)" price = "300"> &ensp;Detangling (Regular)</td>
              </tr>
              <tr>
                  <td><input type = "checkbox" id = "op" name = "op2" value = "Teeth Cleaning" price = "100"> &ensp;Teeth Cleaning</td>
                  <td><input type = "checkbox" id = "op" name = "op6" value = "Detangling (Severe)" price = "500"> &ensp;Detangling (Severe)</td>
              </tr>
              <tr>
                <td><input type = "checkbox" id = "op" name = "op3" value = "Anal Sac Expression" price = "100"> &ensp;Anal Sac Expression </td>
                <td><input type = "checkbox" id = "op" name = "op7" value = "Deshedding" price = "500"> &ensp;Deshedding</td>
              </tr>
              <tr>
                <td><input type = "checkbox" id = "op" name = "op4" value = "Tick & Flea Meditation" price = "180"> &ensp;Tick & Flea Meditation </td>
                <td><input type = "checkbox" id = "op" name = "op8" value = "Lux Whitening Shampoo" price = "150"> &ensp;Lux Whitening Shampoo</td></td>
              </tr>                                                     
            </table></div>
            <button type = "button" id = "submit-btn" onclick = "addToCart()"> Submit </button>
      </div>
        <div class = "spapic">
            <img id = "pic" src = "../Pictures/woman_with_dog.png">
        </div>
    </div>
    <div class = "hotelcontainer">
        <p id = "label1">Hotel</p>
        <div class="hotelbox">
          <div class="roombox" id="rooms">
            <table id = "forroom">
              <tr>
                <td style = "width: 45%">  <h5> Room Type</h5> </td>
              <td>  
                <input type = "radio" id = "deluxe" name = "type" value = "Deluxe" price = "500"  onclick="setdaycarestyle()"> &ensp;Deluxe <br>
                <input type = "radio" id = "catroom" name = "type" value = "Cat Room" price = "500"  onclick="setdaycarestyle()"> &ensp;Cat Room <br>
                <input type = "radio" id = "suite" name = "type" value = "Suite" price = "750" onclick="setdaycarestyle()"> &ensp;Suite <br>
              </td>
              </tr>
              <tr>
                <td> <h5>No. of night/s  </h5> </td>
              <td>
                <input type = "number" placeholder="1" class = "select1" min="1" name = "nightsnum" id = "nightsnum" onclick="setdaycarestyle()">
              </td>
              </tr>
            </table>
          </div>
          <div class="guestbox" id = "guests">
            <table id = "forroom">
              <tr>
                <td style = "width: 45%"> <h5>Additional Guests </h5></td>
              <td>
                <td><input type = "checkbox" id = "ag1" min = "1" name = "ag1" onclick = "extraguests('ag1','nightsnum1');setdaycarestyle()" details = "s-m"> &ensp;Extra Guests (S-M)<br>
                  &ensp; &emsp;<input type = "number"  min = "1" class = "select2" name = "ag1" id = "nightsnum1" disabled style = "opacity: 0.5;" oninput = "setAttr('ag1','nightsnum1')"> <br>
                    <input type = "checkbox" id = "ag2" min = "1"  name = "ag2" style = "margin-top: 10px;" onclick="extraguests('ag2','nightsnum2');setdaycarestyle()" details = "l-xxl"x> &ensp;Extra Guests (L-XXL) <br>
                  &ensp; &emsp;<input type = "number" min = "1" class = "select2" name = "ag2" id = "nightsnum2" disabled style = "opacity: 0.5;" oninput = "setAttr('ag2','nightsnum2')">
              </td></td>
              </tr>
            </table>
          </div>
        </div> <br>
        <p id = "label2">Daycare Services</p>
        <table id = "fordaycare">
          <tr>
            <td style = "width: 45%">  <h5> Pet Size</h5> </td>
          <td>
            <input type = "radio" name = "daycaretype" value = "S-M Dog/Cat" price = "250" onclick="sethotelstyle()"> &ensp;S-M Dog/Cat<br>
            <input type = "radio" name = "daycaretype" value = "X-XXL Dog" price = "350" onclick="sethotelstyle()"> &ensp;X-XXL Dog
          </td>
          </tr>
        </table>
        <button type = "button" id = "submit-btn" onclick = "addToCart2()"> Submit </button>
    </div>
    <input type="hidden" id = "totalspacontainer">
    <input type="hidden" id = "totalspadiscountedcontainer" name = "totalspa">
    <input type="hidden" id = "totalhotelcontainer" name = "totalhotel">
    <input type="hidden" id = "totalcontainer" name = "total">
    <div class = "buttons">
        <input type = "submit" value = "Add Booking" >
        <input id = "proceed" type = "button" class="btn-btn-open" value = "Proceed with Payment">
</div>
</form>
<section class="modal hidden">
  <div class="flex">
  </div>
    <!-- <button class="btn-close">⨉</button>
  </div>
    <div class="modal">
   Modal content 
    <div class="modal-content">-->
      <div class="content">
        <h2 class="title">Check out</h2>
        <span class="btn-close">&times;</span>
      <div class="modal-body">
      <div class="form-group">
        <label> Customer Name </label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" readonly placeholder = "">
        </div>
    
    <div class="after-serv">
    
        <div class="form-group">
            <label> Total Amount</label>
            <input type="text" name="total_amount" id="total_amount" class="form-control" readonly>
        </div>
    
        <div class="form-group"> 
            <label> Payment Method </label>
            <form class="radio">
            <input type="radio" name="payment-method" id="cash" class="form-control-radio" value = "Cash">
            <label for="gcash" >Cash</label><br>
            <input type="radio" name="payment-method" id="gcash" class="form-control-radio" value = "GCash">
            <label for="gcash" >GCash</label><br>
            <input type="radio" name="payment-method" id="paymaya" class="form-control-radio" value = "Paymaya">
            <label for="paymaya">PayMaya</label><br>
            <input type="radio" name="payment-method" id="banktransfer" class="form-control-radio" value = "Bank Transfer">
            <label for="banktransfer" >Bank Transfer</label><br>
        </form>
      </div>
    
    
        <div class="form-group" id="refnum">
            <label class="lbl-ref"> Reference Number </label>
            <input type="text"  name="ref-num" id="refnum" class="form-control-ref">
        </div>
        
             <input type="submit" name="print-receipt" class="btn-btn-primary" value="Print Receipt"></input>
            </div>
      </div>
    </div>
</section>

<div class="overlay hidden"></div>
<!--<button class="btn btn-open">Open Modal</button>-->
    <script src="services.js"></script>
    <script src="sales.js"></script>
    <script type="text/javascript">
        var today = new Date().toISOString().slice(0, 16);
        document.getElementsByName("appdate")[0].min = today;
    </script>
    <script src="addtocart.js"></script>
</body>
</html>