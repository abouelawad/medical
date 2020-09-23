<?php require_once "app.php" ;?>

<div class="form-group">
  <label for="city" class="text-white">Your City</label>
  
  <?php $rows = getAll('cities'); ?>
  <select name="city_id" class="form-control" id="city">
    <?php foreach ($rows as $row) : ?>
      <option> <?= $row['city_name']; ?> </option>

      <?php endforeach; ?>
    </select>
</div>