<h2 class="page-header">Add Location</h2>
<?php if( isset($errors)):?>
      <?php foreach($errors as $error):?>
        <div class="alert alert-danger"><?php echo $error ?></div>
      <?php endforeach;?>
<?php endif; ?>
<form method="post" action="<?php echo base_url() ?>index.php/admin/d0_add_location">
  <div class="form-group">
    <label>Location Name</label>
    <input type="text" class="form-control" name="locationName" placeholder="Name" required>
  </div>
  <div class="form-group">
    <label>Location Type</label>
    <select class="form-control" name="type" placeholder="Select a type" required>
      <option value="ECHO ID HERE"> ECHO TYPES HERE </option>
    </select>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="description" placeholder="Descibe the location" required></textarea>
  </div>
  <div class="form-group">
    <label>Describe average cost for a visit</label>
    <input type="text" class="form-control" name="cost" required></input>
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" class="form-control" name="image" required></input>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
