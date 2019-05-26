<?php
session_start();
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
require 'top.php';
require 'menu.php';
require 'nyttinlagg.php';
require 'bottom.php';
require 'inlagg.php';
require 'db_conn.php';
require 'popup.php';
// require 'login.php';

popup();
if(isset($_GET['page']) && $_GET['page']=="nyttinlagg" && isset($_SESSION['username'])){
  top();
  menu();
  nyttinlagg();
  bottom();
}
else if(!isset($_GET['page']) && isset($_SESSION['username'])){
  top();
  menu();
  inlagg();
  bottom();
}
else{
  top();
  menu2();
  inlagg();
  bottom();
}

?>
