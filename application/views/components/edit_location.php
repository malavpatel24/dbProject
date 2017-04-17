<div class="row">
  <div class="col-xs-3">
    <h2 class="page-header">Edit Location</h2>
    <?php if( isset($errors)):?>
      <?php foreach($errors as $error):?>
        <div class="alert alert-danger"><?php echo $error ?></div>
      <?php endforeach;?>
    <?php endif; ?>
  </div>
</div>
<form method="post" action="<?php echo site_url() ?>admin/do_edit_location" enctype="multipart/form-data">
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <label>Location Name</label>
        <input type="text" class="form-control" name="locationName" value="<?php echo $location->name; ?>" required>
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
        <label>Location Type</label>
        <select class="form-control" name="type" placeholder="<?php echo $location->type_id; ?>" required>
          <option value="ECHO ID HERE"> ECHO TYPES HERE </option>
          <option value="1"> City </option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6">
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" required><?php echo $location->description; ?></textarea>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <label>Describe average cost for a visit</label>
        <input type="text" class="form-control" name = "cost" value="<?php echo $location->cost; ?>" required></input>
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" name="image" ></input>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
