function extraguests (a,b) {
    var check = document.getElementById(a);
    var text = document.getElementById(b);
    if (check.checked==true) {
      text.disabled = false;
      text.style.opacity = 1;
      text.required = true;
    }
    else {
      text.disabled = true;
      text.style.opacity = 0.5;
    }
  }
  function setAttr (a,b) {
    var text = document.getElementById(a);
    var val = document.getElementById(b).value;
    text.setAttribute('value', val);
  }

  function selectmanual () {
    var radio = document.getElementById("manual");
    var text = document.getElementById("manualinput");
    if (radio.checked==true) {
      text.disabled = false;
      text.style.opacity = 1;
      text.required = true;
    }
    else {
      text.disabled = true;
      text.style.opacity = 0.5;
    }
  }
  function opencontainer() {
    var open = document.getElementById("salescontainer");
    if (window.getComputedStyle(open).display === "none") {
        open.style.display = "block";
    }
    else {
        open.style.display = "none";
    }
  }

  function setdaycarestyle() {
    var daycare = document.getElementById("fordaycare");
    var label = document.getElementById("label2")

    daycare.disabled = true;
    daycare.style.opacity = 0.2;
    label.style.opacity = 0.4;
  }

  
  function sethotelstyle() {
    var hotel = document.getElementById("forroom");
    var hotel2 = document.getElementById("guests");
    var label2 = document.getElementById("label1")

      label2.style.opacity = 0.4;
      hotel.disabled = true;
      hotel.style.opacity = 0.2;
      hotel2.disabled = true;
      hotel2.style.opacity = 0.2;
  }

$(document).ready(function(){
    $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
});
});
