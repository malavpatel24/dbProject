<h2 class="page-header">Add Type</h2>
<?php if( isset($errors)):?>
      <?php foreach($errors as $error):?>
        <div class="alert alert-danger"><?php echo $error ?></div>
      <?php endforeach;?>
<?php endif; ?>
<form method="post" action="<?php echo base_url() ?>index.php/admin/add_location">
  <div class="form-group">
    <label>Type Name</label>
    <input type="text" class="form-control" name="typeName" placeholder="Name">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
