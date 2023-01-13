function myFunction() {
    var oname = document.getElementById("oname").value;
    document.getElementById("nameline").innerHTML = "Name: " + oname;
  }

function myFunction1() {
    var pname = document.getElementById("petn").value;
    document.getElementById("petnameline").innerHTML = "Pet Name: " + pname;
  }

function myFunction2() {
    var cnumber = document.getElementById("cnumber").value;
    document.getElementById("cnumberline").innerHTML = "Contact Number: " + cnumber;
  }

function myFunction3() {
    var bookdate = new Date().toLocaleString();
    document.getElementById("bookdateline").innerHTML = "Date Booked: " + bookdate;
    const appdate = document.getElementById("appdate").value;
    const d = new Date(appdate);
    let text = d.toLocaleString();
    document.getElementById("appdateline").innerHTML = "Appointment Date: " + text;
    
  }

function printTotal() {
  if (document.body.contains(document.getElementById("results"))) {
    document.getElementById("results").remove();
  }
  const con = document.getElementById("currenttotal");
  var res = document.createElement("span");
  res.setAttribute("id","results");
  var a = document.getElementById("totalspacontainer").getAttribute('value');
  if (a == null) a = 0;
  var b = document.getElementById("totalhotelcontainer").getAttribute('value');
  if (b == null) b = 0;
  var total = parseInt(a) + parseInt(b);
  res.append(total);
  con.appendChild(res);
  var disc = 0;
  if (a != 0) {
    disc = document.querySelector('input[name="disc"]:checked').value;
  }
  const con1 = document.getElementById("totalcontainer");
  var adiscounted = a  - (a/100)*disc;
  var totalwithdiscount = parseInt(adiscounted) + parseInt(b);
  con1.setAttribute('value', totalwithdiscount)

  if (a!=0) {
    var c = document.getElementById("totalspadiscountedcontainer");
    c.setAttribute ('value', adiscounted);
  }
  putData2(totalwithdiscount);
}
function addToCart() {
    const tcontainer =  document.getElementById("totalspacontainer");
    if (document.body.contains(document.getElementById("hotelresult"))) {
    }
    if (document.body.contains(document.getElementById("sparesult"))) {
      document.getElementById("sparesult").remove();
      tcontainer.setAttribute('value','0');
    }
    const size1_price = [300,400,500,600,700];
    const size2_price = [400,500,700,800,900];
    const bath_types = ["Basic Bath", "Deluxe Bath"];
    const size_types = ["S","M","L","XL","XXL"];
    var currenttotal = document.getElementById("totalhotelcontainer").getAttribute('value');
    if (currenttotal == null) currenttotal = 0;
    var add_ons = [];
    var add_ons_price = [];
    var checkboxes = document.querySelectorAll("#addonscheckbox input[type=checkbox]:checked");

    for (var i = 0; i < checkboxes.length; i++) {
      add_ons.push(checkboxes[i].value)
      add_ons_price.push(checkboxes[i].getAttribute('price'))
    }
    var groomer = document.getElementById("select_groomer").value;
    var bath = document.querySelector('input[name="bath"]:checked').value;
    var size = document.querySelector('input[name="size"]:checked').value;
    var bathprice;
    
    if (bath_types[0] == bath) {
      for (let i = 0; i < size_types.length; i++) {
        if (size_types[i] == size) {
          bathprice = size1_price [i];
        }
      }
    }
    if (bath_types[1] == bath) {
      for (let i = 0; i < size_types.length; i++) {
        if (size_types[i] == size) {
          bathprice = size2_price [i];
        }
      }
    }
    
    const result = document.createElement("div");
    result.setAttribute("id", "sparesult");

    const label = document.createElement("p");
    const label2 = document.createTextNode("Spa Service Summary");
    label.append(label2);

    const groomer_p = document.createElement("p");
    const groomer_label = document.createTextNode("Groomer: ");
    groomer_p.append(groomer_label);
    groomer_p.append(groomer);

    const summary = document.createElement("p");
    summary.append(bath);
    summary.append(" (");
    summary.append(size);
    summary.append(") --- ");
    summary.append(bathprice);

    result.append(label);
    result.append(groomer_p);
    result.append(summary);

    var totaladdons = 0;
    if (add_ons.length > 0) {
      result.append("Add-ons: ");
      for (i = 0; i < add_ons.length; i++) {
        totaladdons += parseInt(add_ons_price[i]);
        const checkboxresult = document.createElement("p");
        checkboxresult.append(add_ons[i]);
        checkboxresult.append(" --- ");
        checkboxresult.append(add_ons_price[i]);
        result.append(checkboxresult);
      }
    }
    var temptotal = parseInt(bathprice) + parseInt(totaladdons);
    const element = document.getElementById("inputsalescontainer");
    element.appendChild(result);

    tcontainer.setAttribute('value', temptotal);
    printTotal();
  }

function addToCart2() {
  var extraguests = [];
  var extraguests_label = [];
  var eg1price = 250;
  var eg2price = 350;
  const tcontainer =  document.getElementById("totalhotelcontainer");
  var currenttotal = document.getElementById("totalspacontainer").getAttribute('value');
  if (currenttotal == null) currenttotal = 0;
 
  if (document.body.contains(document.getElementById("hotelresult"))) {
    document.getElementById("hotelresult").remove();
    tcontainer.setAttribute('value','0');
  }
  if (document.body.contains(document.getElementById("sparesult"))) {
  }

  const result = document.createElement("div");
  result.setAttribute("id", "hotelresult");
  var roomtype = document.querySelector('input[name="type"]:checked');
  var temptotal = 0;
  if (roomtype != null) {
    roomtype = roomtype.value;
    var roomtype_price = document.querySelector('input[name="type"]:checked').getAttribute('price');
    var checkbox1 = document.querySelectorAll('#guests input[type=checkbox]:checked');
    for (var i = 0; i < checkbox1.length; i++) {
      extraguests.push(checkbox1[i].value)
      extraguests_label.push(checkbox1[i].getAttribute('details'));
    }
    var no_of_nights = document.getElementById("nightsnum").value;
  
    const label = document.createElement("p");
    const label2 = document.createTextNode("Hotel Service Summary");
    label.append(label2);
    result.append(label);
  
    const room = document.createElement("p");
    room.append(roomtype)
    room.append(" --- ");
    room.append(roomtype_price);
    result.append(room);
    
    var egtotal = 0;
    var eg1total = 0;
    var eg2total = 0;
    for (i = 0; i < extraguests.length; i++) {
      const checkboxresult = document.createElement("p");
      if (extraguests_label[i] == "s-m"){
        checkboxresult.append("Extra Guests (S-M) [");
        checkboxresult.append(extraguests[i]);
        checkboxresult.append("] --- ");
        eg1total = parseInt(eg1price) * parseInt(extraguests[i]);
        checkboxresult.append(eg1total);
      }
      if (extraguests_label[i] == "l-xxl"){
        checkboxresult.append("Extra Guests (L-XXL) [");
        checkboxresult.append(extraguests[i]);
        checkboxresult.append("] --- ");
        eg2total = parseInt(eg2price) * parseInt(extraguests[i]);
        checkboxresult.append(eg2total);
      }
      result.append(checkboxresult);
    }
    egtotal = eg1total + eg2total;
    const nights = document.createElement("p");
    nights.append("No. of nights --- ");
    nights.append(no_of_nights)
    result.append(nights);

    temptotal = (parseInt(roomtype_price) + egtotal) * no_of_nights;
  }
  
  
  var daycareservices = document.querySelector('input[name="daycaretype"]:checked');
  if (daycareservices!= null) {
    var daycareservices_price = document.querySelector('input[name="daycaretype"]:checked').getAttribute("price");
    const label3 = document.createElement("p");
    const label4 = document.createTextNode("Daycare Service Summary");
    label3.append(label4);
    result.append(label3);
    daycareservices = daycareservices.value;
    const petlabel = document.createElement("p");
    petlabel.append (daycareservices);
    petlabel.append (" --- ")
    petlabel.append (daycareservices_price);
    result.append(petlabel);
    temptotal += parseInt(daycareservices_price);
  }
  const element = document.getElementById("inputsalescontainer");
  element.appendChild(result);

  tcontainer.setAttribute('value', temptotal);
  printTotal();
}


