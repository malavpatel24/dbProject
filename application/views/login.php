<div class="row">
  <div class="col-xs-3">
    <h2 class="page-header">Account Login</h2>
    <?php if( isset($errors)):?>
      <?php foreach($errors as $error):?>
        <div class="alert alert-danger"><?php echo $error ?></div>
      <?php endforeach;?>
    <?php endif; ?>
  </div>
</div>
<form method="post" action="<?php echo site_url() ?>users/login">
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="username" placeholder="Email">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </div>
</form>
