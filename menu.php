<?php
function menu(){
  ?>
  <ul id="nav-ul">
    <li><a href="index.php">Inlägg</a></li>
    <li><a href="index.php?page=nyttinlagg">Ny Inlägg</a></li>
    <a href="logout.php" id="signoutbutton">Sign out</a>
  </ul>

<?php
} function menu2() {
  ?>
  <ul id="nav-ul">
    <li><a href="index.php">Inlägg</a></li>
    <li><a href="index.php?page=nyttinlagg" id="nyttinlagg">Nytt inlägg</a></li>
    <a href="logout.php" id="signoutbutton">Sign out</a>
    <button type="button" id="loginbutton">Login</button>
  </ul>
  <?php
}
 ?>
