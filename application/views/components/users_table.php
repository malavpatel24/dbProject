<?php //This table can be copied over into the final html ?>

<div class="row">
  <div class="col-xs-6">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Birthday</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $user): ?>
          <tr>
            <td><?php echo $user->name ?></td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->birthday ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
