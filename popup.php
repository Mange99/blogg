<?php
function popup(){
  ?>
    <div id="popupwindow">
      <div id="popupcontainer" class="minzoom">
        <a href="#" id="closewindow"></a>
        <form class="minform" method="get">
          <input type="text" name="username" placeholder="Username" id="usr">
          <!-- <input type="email" name="email" placeholder="email@example.com" id="mail"> -->
          <input type="password" name="password" placeholder="Password" id="pass">
          <!-- <input type="button" name="submitbutton" value="SIGN IN" id="submitbutton"> -->
          <button type="button" name="button" id="submitbutton">SIGN IN</button>
            <!-- <button type="submit" name="submitbutton" value="SIGN IN" id="submitbutton">SIGN IN</button> -->
        </form>
      </div>
    </div>
<?php
}
?>
