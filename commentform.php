<?php

require 'db_conn.php';
$dbob = dbconn();
if(isset($_GET['submitcomment'])) {
  if(isset($_GET['inläggid'])) {
    kommentarTillInlägg($dbob);
  } else if(isset($_GET['kommentarid'])) {
    kommentarTillKommentar($dbob);
  }
  header('Location: index.php');
}

function kommentarTillInlägg($dbob) {
  $inlaggid = $_GET['inläggid'];
  $text = filter_input(INPUT_GET, 'text', FILTER_SANITIZE_SPECIAL_CHARS);
  $stmt = $dbob->prepare('
      INSERT INTO kommentarer(inlagg_fk, kommentar_fk, text) VALUES (?, ?, ?)
  ');
  $stmt -> bindParam(1, $inlaggid);
  $stmt -> bindValue(2, NULL);
  $stmt -> bindParam(3, $text);
  $stmt -> execute();
}

function kommentarTillKommentar($dbob) {
  $kommentarid = $_GET['kommentarid'];
  $text = filter_input(INPUT_GET, 'text', FILTER_SANITIZE_SPECIAL_CHARS);
  $stmt = $dbob->prepare('
      INSERT INTO kommentarer(inlagg_fk, kommentar_fk, text) VALUES (?, ?, ?)
  ');
  $stmt -> bindValue(1, NULL);
  $stmt -> bindParam(2, $kommentarid);
  $stmt -> bindParam(3, $text);
  $stmt -> execute();
}


?>
