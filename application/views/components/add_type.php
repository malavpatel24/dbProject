<?php if( isset($errors)):?>
  <div class="row">
    <div class="col-xs-6">
      <?php foreach($errors as $error):?>
        <div class="alert alert-danger"><?php echo $error ?></div>
      <?php endforeach;?>
    </div>
  </div>
<?php endif; ?>
<div class="row">
  <div class="col-xs-6">
    <h2 class="page-header">Add Type</h2>
  </div>
</div>
<form method="post" action="<?php echo base_url() ?>index.php/admin/add_location">
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <label>Type Name</label>
        <input type="text" class="form-control" name="typeName" placeholder="Name">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
