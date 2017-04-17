<script>var BASE_URL = "<?php echo site_url('dashboard')?>"</script>
<script src="<?php echo base_url('js/user_dashboard.js'); ?>"></script>
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
    <h1>Dashboard</h1>
    <p>Welcome to your user dashboard! Here you can see all of the locations in your bucket list.</p>
    <a href="<?php echo site_url('dashboard/locations') ?>">Click here to find some new locations to add to your bucket list!</a>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <table class="table">
      <thead>
        <tr>
          <th>Order</th>
          <th>Location</th>
          <th>Type</th>
          <th>Rate</th>
          <th>Date Visited</th>
          <th>Change Order</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($locations as $location): ?>
          <tr data-id="<?php echo $location->id; ?>">
            <td class="order"><?php echo $location->order ?></td>
            <td><a href="<?php echo site_url("dashboard/location?id=" . $location->id) ?>"><?php echo $location->name ?></a></td>
            <td><?php echo $types[$location->type_id] ?></td>
            <td>
              <span data-id="<?php echo $location->id; ?>" class="ranking" data-calc="<?php if(in_array($location->id, $ranks_up)){echo "1";} else if(in_array($location->id, $ranks_down)){echo "-1";}else{echo "0";} ?>"><?php echo $location->ranking;?> </span>
              <span style="margin-left:10px; <?php if(in_array($location->id, $ranks_up)){echo "color:green;";} ?>" data-id="<?php echo $location->id; ?>" class="glyphicon glyphicon-plus plus"></span>
              <span style="margin-left:10px; <?php if(in_array($location->id, $ranks_down)){echo "color:red;";} ?>" data-id="<?php echo $location->id; ?>" class="glyphicon glyphicon-minus minus"></span>
            </td>
            <td>
              <input type="date" class="date" data-id="<?php echo $location->id; ?>" value="<?php echo $location->date_visited ?>"></input>
              <span class="visited <?php if($location->date_visited != '') echo "glyphicon glyphicon-ok" ?>" style="color:green;"></span>
            </td>
            <td><span data-id="<?php echo $location->id; ?>" class="glyphicon glyphicon-arrow-up up"></span><span data-id="<?php echo $location->id; ?>" class="glyphicon glyphicon-arrow-down down" style="margin-left:10px;"></span></td>
            <td><span data-id="<?php echo $location->id; ?>" class="glyphicon glyphicon-remove-circle delete"></span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
