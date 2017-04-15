<style>
  .up:hover{
    color:green;
  }
  .down:hover{
    color:red;
  }
  td .glyphicon{
    font-size: 25px;
  }
</style>
<div class="row">
  <div class="col-xs-12">
    <p>Welcome to the admin dashboard! Click on a location to edit it or upload a new image.</p>
    <a href="<?php echo site_url("admin/add-location") ?>">Click here to add a new location</a>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <table class="table">
      <thead>
        <tr>
          <th>Location</th>
          <th>Type</th>
          <th>Rating</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($locations as $location): ?>
          <tr data-id="<?php echo $location->id; ?>">
            <td><a href="<?php echo site_url("admin/edit-location?id=" . $location->id) ?>"><?php echo $location->name ?></a></td>
            <td><?php echo $types[$location->type_id] ?></td>
            <td>
              <span data-id="<?php echo $location->id; ?>" class="ranking"><?php echo $location->ranking;?> </span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
