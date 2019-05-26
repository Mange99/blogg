<?php
//inlagg och djup
function showInlagg($inlagg, $djup) {
echo "<div class='divgrid'>";
$db = dbconn();
//för varje rad i databasen får hätar den kommentarenra som hör till de inlägget fk = pk
foreach($inlagg as $row) {
  $id = $row['inlagg_pk'];
  $sql = "SELECT * FROM kommentarer WHERE inlagg_fk = $id";
  $kommentarer =  $db->query($sql);
//skriver ut rubrik och text för varje inlägg
  ?>
  <div class="inlagg">
    <h2><?php echo htmlspecialchars($row['Rubrik'])?></h2>
    <h4><?php echo htmlspecialchars($row['Text'])?></h4>
    <button id="<?php echo $row['inlagg_pk'] ?>" type="button">Kommentera</button>
    <p>kommentarer: </p>
    <?php
    //skriver ut kommentarnena
    showKommentarer($row['inlagg_pk'], $djup, $kommentarer, $db);?>
  </div>
<?php
  }
}
function showKommentarer($parent, $djup, $kommentarer, $db) {
//rekrusiv funktion för att kommentera 
  foreach($kommentarer as $kommentar) {
?>
    <div class="kommentarer" style="margin-left: <?php echo $djup . '%'; ?>">
      <hr>
      <p><?php echo htmlspecialchars($kommentar['text']) ?></p>
      <button id="<?php echo $kommentar['kommentar_fk'] ?>" type="button" class="kommentarknapp">Kommentera</button>
    </div>
<?php
//kommentaren blir nya parenten
  $parent = $kommentar['kommentar_pk'];
  $sql = "SELECT * FROM kommentarer WHERE kommentar_fk=$parent";
  $kommentarer =  $db->query($sql);
  //kör den igen med nya kommentaren som parent
  showKommentarer($parent, $djup + 5, $kommentarer, $db);
  }
}
echo '</div>';
?>
