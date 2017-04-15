<div class="row">
  <div class="col-xs-3">
    <h2 class="page-header">Add Location</h2>
    <?php if( isset($errors)):?>
      <?php foreach($errors as $error):?>
        <div class="alert alert-danger"><?php echo $error ?></div>
      <?php endforeach;?>
    <?php endif; ?>
  </div>
</div>
<form method="post" action="<?php echo site_url() ?>admin/do_add_location" enctype="multipart/form-data">
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <label>Location Name</label>
        <input type="text" class="form-control" name="locationName" placeholder="Name" required>
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
        <label>Location Type</label>
        <select class="form-control" name="type" placeholder="Select a type" required>
          <?php foreach($types as $id => $type): ?>
            <option value="<?php echo $id ?>"> <?php echo $type ?> </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6">
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" placeholder="Descibe the location" required></textarea>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <label>Describe average cost for a visit</label>
        <input type="text" class="form-control" name="cost" required></input>
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" name="image" required></input>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
