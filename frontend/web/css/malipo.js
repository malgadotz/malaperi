var payment = document.getElementById("addpay");
var jela = document.getElementById("jela");
var addb = document.getElementById("add");
var addme = document.getElementById("btn");
var closeB = document.getElementById("closeD");
var home = document.getElementById("Home");
var results = document.getElementById("results");
var dialgpay = document.getElementById("myModal");
var leftn = document.getElementById("leftn");
var paytab = document.getElementById("paytab");
var loantab = document.getElementById("loantab");
window.onload = function()
{
    dialgpay.style.display="none";
    paytab.style.color="green";
    loantab.style.color="gray";
    
}
loantab.onclick=function()
{loantab.style.color="gray";}
// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("btn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() {
  dialgpay.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
closeB.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
