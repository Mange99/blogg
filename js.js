var button = document.getElementById("loginbutton");
var popup = document.getElementById("popupwindow");
var close = document.getElementById("closewindow");
var signoutbutton = document.getElementById("signoutbutton");
var blurdarken = document.getElementById("blurdarken");
var nyttinlagg = document.getElementById("nyttinlagg");
var kommentarKnapp = document.getElementsByClassName("kommentarknapp");

close.onclick = function() {
  /*popup.style.opacity = 0;
  popup.style.visibility = "hidden";*/

};
function showPopup() {
  popup.style.visibility = "visible";
}
button.onclick = function(){
  showPopup();
}
for(var i=0;i<kommentarKnapp.length;i++) {
  kommentarKnapp[i].onclick = function() {
    kommentarFunktion(this);
  }
}
function kommentarFunktion(inlägg) {
  alert(inlägg.id);
}
signoutbutton.style.visibility = "hidden";
/*window.onclick = function(event) {
  if (event.target == popup) {
    popup.style.opacity = 0;
    popup.style.visibility = "hidden";

  }
}*/
$("#submitbutton").click(function(){
  console.log("asdas" + $("#usr").val() + " " + $("#pass").val());
  $.getJSON('login.php',{username: $("#usr").val(), password: $("#pass").val()}, function(data){
    console.log(data.login);
    console.log("inne");
    if(data.login == true){
      button.style.display = "none";
      signoutbutton.style.display = "block";
      nyttinlagg.style.display = "block";
      popup.style.visibility = "hidden";
      signoutbutton.style.visibility = "visible";
    }
  });
  });
