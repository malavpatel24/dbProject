<?php
class Location extends CI_Model {

  public $id;
  public $name;
  public $coordinates;
  public $description;
  public $type_id;
  public $cost;

  //Returns a list of all locations
  public function get_locations()
  {
     $q_string = "SELECT * FROM locations l ORDER BY l.name;";
     $query = $this->db->query($q_string);
     $rows = $query->result('Location');

     return $rows;
  }

  //Returns a location specified by id
  public function edit_location($location)
  {
     $q_string = "UPDATE `locBucket`.`locations` SET `name` = ?, `description` = ?, `type_id` = ?, `cost` = ? WHERE `id` = ?;";
     $query = $this->db->query($q_string, array($location->name, $location->description, $location->type_id, $location->cost, $location->id));

     return True;
  }

  //Returns a location specified by id
  public function get_location($id)
  {
     $q_string = "SELECT * FROM locations WHERE id = ?;";
     $query = $this->db->query($q_string,array($id));
     $rows = $query->result('Location');

     return $rows;
  }

  //Returns a location ranking specified by id
  public function get_location_ranking($id)
  {
      $q_string = "CALL Location_Rating(?)"; //Change this to get all but password
      $query = $this->db->query($q_string, array($id));
      $rows = $query->result(); //Returns results as array of user objects
      $query->next_result();

      if(isset($rows[0]->rating))
        return $rows[0]->rating;
      else
        return 0;
  }

  //Returns a location ranking specified by id
  public function swap_locations_order($user_id, $above_id, $below_id)
  {
      $q_string = "CALL Swap_Locations_Order(?, ?, ?)"; //Change this to get all but password
      $query = $this->db->query($q_string, array($user_id, $above_id, $below_id));
      die("success");
  }

  //Returns the images for the location specified
  public function get_location_images($id) {
     $q_string = "SELECT l.name, l.description, p.pictures FROM locations l, pictures p
     WHERE id = ? AND p.location_id =?;";
     $query = $this->db->query($q_string,array($id));
     $rows = $query->result('Location');

     return $rows;
  }

  public function search_locations($name, $type) {
     if($type == NULL){
        return $this->search_by_name($name);
     }else if($name == NULL){
        return $this->search_by_type($type);
     }else{
        $name = "%". $name . "%";
        $q_string = "SELECT * FROM locations l
        WHERE name LIKE ? AND type_id = ?";
        $query = $this->db->query($q_string,array($name, $type));
        $rows = $query->result('Location');
        return $rows;
     }
  }

  public function search_by_name($name) {
    $name = "%" . $name . "%";
     $q_string = "SELECT * FROM locations l
     WHERE name LIKE ?";
     $query = $this->db->query($q_string,array($name));
     $rows = $query->result('Location');
     return $rows;
  }

  public function search_by_type($type) {
     $q_string = "SELECT * FROM locations l
     WHERE type_id = ?";
     $query = $this->db->query($q_string,array($type));
     $rows = $query->result('Location');
     return $rows;
  }

  public function search_by_cost($cost) {
     $q_string = "SELECT * FROM locations l
     WHERE cost <= ?";
     $query = $this->db->query($q_string,array($cost));
     $rows = $query->result('Location');
     return $rows;
  }

  //Adds or updates a user ranking
  public function add_user_ranking($user_id, $location_id, $rank)
  {
    $q_string = "INSERT INTO rankings
        (user_id, location_id, ranking)
      VALUES (?, ?, ?)
      ON DUPLICATE KEY UPDATE
        ranking = VALUES(ranking);";
    $query = $this->db->query($q_string, array($user_id, $location_id, $rank));
  }

  //Adds a visited date for a user location
  public function add_visited_date($user_id, $location_id, $date)
  {
    $q_string = "UPDATE user_locations SET date_visited=? WHERE user_id=? and location_id=?;";
    $query = $this->db->query($q_string, array($date, $user_id, $location_id));
  }

  //Adds a visited date for a user location
  public function remove_visited_date($user_id, $location_id)
  {
    $q_string = "UPDATE user_locations SET date_visited=NULL WHERE user_id=? and location_id=?;";
    $query = $this->db->query($q_string, array($user_id, $location_id));
  }

  //Removes a user location
  public function remove_user_location($user_id, $location_id)
  {
    $q_string = "DELETE FROM user_locations WHERE user_id=? and location_id=?;";
    $query = $this->db->query($q_string, array($user_id, $location_id));
  }

  //Inserts a location into the database
  public function create_location($location) {
     $q_string = "INSERT INTO `locBucket`.`locations` (`name`, `description`, `cost`,`type_id`)
      VALUES (?, ?, ?, ?);";
      $values = [$location->name, $location->description, $location->cost, $location->type_id];
      $query = $this->db->query($q_string, $values);

      $location->id = $this->db->insert_id(); //Get the auto-incremented id so a picture can be added after this

     return true;
  }
}
?>
