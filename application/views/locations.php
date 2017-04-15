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
    <p>
      Below are all of the locations currently available to be added to your
      bucket list. We are constantly adding fun new locations, and our photographers
      keep our images up to date, so check in often for all the latest locations!
    </p>
    <p>
      Know a great location we missed? Want to put your photography skills to the test?
      Contact us to let us know! Admin emails can be found on the Contact page.
    </p>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <table class="table">
      <thead>
        <tr>
          <th>Location</th>
          <th>Type</th>
          <th>Rate</th>
          <th>Add this Location!</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($locations as $location): ?>
          <tr data-id="<?php echo $location->id; ?>">
            <td><a href="<?php echo site_url("dashboard/location?id=" . $location->id) ?>"><?php echo $location->name ?></a></td>
            <td><?php echo $types[$location->type_id] ?></td>
            <td>
              <span data-id="<?php echo $location->id; ?>" class="ranking" data-calc="<?php if(in_array($location->id, $ranks_up)){echo "1";} else if(in_array($location->id, $ranks_down)){echo "-1";}else{echo "0";} ?>"><?php echo $location->ranking;?> </span>
              <span style="margin-left:10px; <?php if(in_array($location->id, $ranks_up)){echo "color:green;";} ?>" data-id="<?php echo $location->id; ?>" class="glyphicon glyphicon-plus plus"></span>
              <span style="margin-left:10px; <?php if(in_array($location->id, $ranks_down)){echo "color:red;";} ?>" data-id="<?php echo $location->id; ?>" class="glyphicon glyphicon-minus minus"></span>
            </td>
            <td>
              <span style="margin-left:10px;color:green;" data-id="<?php echo $location->id; ?>" class="glyphicon glyphicon-plus add"></span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
