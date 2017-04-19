<div class="row">
  <div class="col-xs-3">
    <h2 class="page-header">Register</h2>
    <?php if( isset($errors)):?>
      <?php foreach($errors as $error):?>
        <div class="alert alert-danger"><?php echo $error ?></div>
      <?php endforeach;?>
    <?php endif; ?>
  </div>
</div>
<form method="post" action="<?php echo site_url(); ?>users/do-register">
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" value="<?php if(isset($user->name)) echo $user->name; ?>" maxlength="100" required>
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
       <label>Email</label>
        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php if(isset($user->email)) echo $user->email; ?>" maxlength="50" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" maxlength="100" required>
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password2" maxlength="100" required>
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
