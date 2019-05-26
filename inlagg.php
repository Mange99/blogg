<?php

//hämtar inläggen och kör visa inlägg metoden
function inlagg() {
  require 'getAllInlagg.php';
  require 'showInlagg.php';
  $results = getAllInlagg();
  showInlagg($results, 0);
}
?>
