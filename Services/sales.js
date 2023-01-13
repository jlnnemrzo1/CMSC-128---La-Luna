const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const openModalBtn = document.querySelector(".btn-btn-open");
const closeModalBtn = document.querySelector(".btn-close");
var cash = document.querySelector("#cash");
var gcash = document.querySelector("#gcash");
var paymaya = document.querySelector("#paymaya");
var bank = document.querySelector("#banktransfer");
const refNum = document.querySelector("#refnum");
const body = document.querySelector("body");

refNum.style.display = 'none';
body.style.overflow = "auto";
// close modal function
const closeModal = function () {
  modal.classList.add("hidden");
  overlay.classList.add("hidden");
  body.style.overflow = "auto";
};

// close the modal when the close button and overlay is clicked
closeModalBtn.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);


// close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden")) {
    closeModal();
  }
});

// open modal function
const openModal = function () {
  modal.classList.remove("hidden");
  overlay.classList.remove("hidden");
  body.style.overflow = "hidden";
};
// open modal event
openModalBtn.addEventListener("click", openModal);

function showRefNum(){
    refNum.style.display = 'block';
  }
  
  function hideRefNum(){
      refNum.style.display = 'none';
    }

gcash.addEventListener("click", showRefNum);
paymaya.addEventListener("click", showRefNum);
bank.addEventListener("click", showRefNum);
cash.addEventListener("click", hideRefNum);    

function putData () {
  var oname = document.getElementById("oname").value;
  document.getElementById("customer_name").placeholder = oname;
}

function putData2(total) {
  document.getElementById("total_amount").placeholder = " ";
  document.getElementById("total_amount").placeholder = total;
}