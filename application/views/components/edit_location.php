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
<form method="post" action="<?php echo site_url() ?>admin/do_edit_location?id=<?php echo $location->id;?>" enctype="multipart/form-data">
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <label>Location Name</label>
        <input type="text" class="form-control" name="locationName" value="<?php echo $location->name; ?>" maxlength="45" required <?php if($disabled) echo "disabled" ?>>
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
        <label>Location Type</label>
        <select class="form-control" name="type" placeholder="Select a type" required <?php if($disabled) echo "disabled" ?>>
          <?php foreach($types as $id => $type): ?>
            <option value="<?php echo $id ?>" <?php if($location->type_id == $id) echo "selected" ?>> <?php echo $type ?> </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6">
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" required <?php if($disabled) echo "disabled" ?>><?php echo $location->description; ?></textarea>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <label>Describe average cost for a visit</label>
        <input type="text" class="form-control" name = "cost" value="<?php echo $location->cost; ?>" maxlength="45" required <?php if($disabled) echo "disabled" ?>></input>
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
