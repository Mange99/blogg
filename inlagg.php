<?php

//hämtar inläggen och kör visa inlägg metoden
function inlagg() {
  require 'getAllInlagg.php';
  require 'showInlagg.php';
  //kör showInlagg skickar med resultat dvs inläggen och djup 0
  $results = getAllInlagg();
  showInlagg($results, 0);
}
?>
