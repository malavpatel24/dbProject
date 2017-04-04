<h2 class="page-header">Account Login</h2>
<?php if( isset($errors)):?>
      <?php foreach($errors as $error):?>
        <div class="alert alert-danger"><?php echo $error ?></div>
      <?php endforeach;?>
<?php endif; ?>
<form method="post" action="<?php echo base_url() ?>index.php/users/login">
  <div class="form-group">
    <label>Username: Put yo usaname heare</label>
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
