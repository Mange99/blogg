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
    <form id="commentform" action="commentform.php" method="get">
      <input type="hidden" name="inläggid" value="<?php echo $row['inlagg_pk'] ?>">
      <input type="text" name="text" placeholder="Comment">
      <button type="submit" name="submitcomment">Post</button>
    </form>
    <?php
    //skriver ut kommentarnena
    showKommentarer($row['inlagg_pk'], $djup, $kommentarer, $db);?>
  </div>
<?php
  }
}
function showKommentarer($parent, $djup, $kommentarer, $db) {
//rekrusiv funktion för att kommentera
//if(djup = 0 svar till inlägg_pk) else svar till kommentar_pk
  foreach($kommentarer as $kommentar) {
?>
    <div class="kommentarer" style="margin-left: <?php echo $djup . '%'; ?>">
      <hr>
      <p><?php echo htmlspecialchars($kommentar['text']) ?></p>
<!-- Formen  den kör comment.php när man trcker på knappen, kommentarern får   -->
      <form id="commentform" action="commentform.php" method="get">
        <input type="hidden" name="kommentarid" value="<?php echo $kommentar['kommentar_pk'] ?>">
        <input type="text" name="text" placeholder="Comment">
        <button type="submit" name="submitcomment">Kommentera</button>
      </form>
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
