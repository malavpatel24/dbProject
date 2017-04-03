<h2 class="page-header">Register</h2>
<?php if(isset($errors)):?>
      <?php foreach($errors as $error):?>
        <div class="alert alert-danger"><?php echo $error ?></div>
      <?php endforeach;?>
<?php endif; ?>
<form method="post" action="<?php echo base_url(); ?>index.php/users/do-register">
   <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Name" name="name" required>
  </div>
   <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Email" name="email" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password" required>
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password2" required>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<?php echo $kevin ?>
