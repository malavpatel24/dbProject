<?php //This table can be copied over into the final html ?>

<div class="row">
  <div class="col-xs-6">
    <table class="table">
      <thead>
        <tr>
          <th>Location</th>
          <th>Description</th>
          <th>Type</th>
          <th>Cost</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($locations as $location): ?>
          <tr>
            <td><?php echo $location->name ?></td>
            <td><?php echo $location->description ?></td>
            <td><?php echo $location->type_id //This should be replaced by type name later ?></td>
            <td><?php echo $location->cost ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
