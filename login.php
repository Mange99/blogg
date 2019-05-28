<?php
session_start();
require 'db_conn.php';
function userlogin() {
  $username_clean = filter_input(INPUT_GET,'username',FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

  $check = dbconn();
  $login = $check->query("SELECT password, username FROM users");

  $result = $login->fetchAll();

  foreach ($result as $user) {
    $username_test = $user['username'];
    $password_test = $user['password'];

    if ($username_clean == $username_test && $password == $password_test) {
      $login = true;
      break;
    } else {
      $login = false;
    }
  }
  if ($login) {
    session_regenerate_id(true);
    $_SESSION['username'] = $username_clean;
    $info_array = array('login' => true, 'name' => $username_clean);
    echo json_encode($info_array);
  } else {
    $info_array = array('login' => false);
    echo json_encode($info_array);
  }
}
userlogin();
?>
