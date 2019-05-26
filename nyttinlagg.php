<?php
function nyttinlagg(){
  ?>
  <main>
    <h1>Skriv inlägg</h1>
    <form action="sparainlagg.php" method="get">
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Rubrik</label>
        <div class="col-6">
          <input class="form-control" type="text" name="Rubrik">
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Text</label>
        <div class="col-6">
          <input class="form-control" type="text" name="Text">
        </div>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </main>
  <?php
}
?>
