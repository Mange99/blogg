<?php
  require 'db_conn.php';
  $dbob = dbconn();
//den cleanar inputen från formen i nyttinlagg
  $celan_Rubrik = filter_input(INPUT_GET, 'Rubrik', FILTER_SANITIZE_SPECIAL_CHARS);
  $celan_Text = filter_input(INPUT_GET, 'Text', FILTER_SANITIZE_SPECIAL_CHARS);
  //insert into inlagg, rubriken och text.
  $stmt = $dbob->prepare('
      INSERT INTO inlagg(Rubrik, Text) VALUES (?, ?)
  ');
  $stmt -> bindParam(1, $celan_Rubrik);
  $stmt -> bindParam(2, $celan_Text);
  $stmt -> execute();
 ?>
