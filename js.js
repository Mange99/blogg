var button = document.getElementById("loginbutton");
var popup = document.getElementById("popupwindow");
var close = document.getElementById("closewindow");
var signoutbutton = document.getElementById("signoutbutton");
var blurdarken = document.getElementById("blurdarken");
var nyttinlagg = document.getElementById("nyttinlagg");
var kommentarKnapp = document.getElementsByClassName("kommentarknapp");
var commentInlagg = document.getElementById("")

/*button.onclick = function() {
  popup.style.visibility = "visible";
  popup.style.opacity = 1;
};*/

close.onclick = function() {
  popup.style.opacity = 0;
  popup.style.visibility = "hidden";

};

for(var i=0;i<kommentarKnapp.length;i++) {
  kommentarKnapp[i].onclick = function() {
    kommentarFunktion(this);
  }
}

function kommentarFunktion(inlägg) {
  alert(inlägg.id);

  /*
  document createlement input
  ge inputen samma id eller name som
  kommentaren/inlägget som den verkar på
  och antingen skicka den med ajax eller med php form
  appenda inputen till den div som knappen är i och gör en submitknapp
  */

}

window.onclick = function(event) {
  if (event.target == popup) {
    popup.style.opacity = 0;
    popup.style.visibility = "hidden";

  }
}
$("#submitbutton").click(function(){
  console.log("asdas");
  $.getJSON('login.php',{username: $("#usr").val(), password: $("#pass").val()}, function(data){
    console.log(data.login);
    console.log("inne");
    if(data.login == true){
      popup.style.opacity = 0;
      popup.style.visibility = "hidden";
      button.style.display = "none";
      signoutbutton.style.display = "block";
      nyttinlagg.style.display = "block";
    }
  });
  });
