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
     $q_string = "SELECT * FROM Locations l;";
     $query = $this->db->query($q_string);
     $rows = $query->result('Location');

     return $rows;
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
     $q_string = "SELECT l.name, l.description FROM locations l, ranking r
      WHERE id = ? AND r.location_id =?;";
     $query = $this->db->query($q_string,array($id));
     $rows = $query->result('Location');

     return $rows;

  }

  //Returns the images for the location specified
  public function get_location_images($id) {
     $q_string = "SELECT l.name, l.description, p.pictures FROM locations l, pictures p
     WHERE id = ? AND p.location_id =?;";
     $query = $this->db->query($q_string,array($id));
     $rows = $query->result('Location');

     return $rows;
  }

  public function search_locations($name,$cost) {
     if(cost == NULL){
        search_by_name(name);
     }else if( name == NULL){
        search_by_cost(cost);
     }else{
        $q_string = "SELECT l.name,l.description,l.cost FROM locations l
        WHERE name = ? AND cost <= ?";
        $query = $this->db->query($q_string,array($name,$cost));
        $rows - $query->result('Location');
        return $rows;
     }
  }

  public function search_by_name($name) {
     $q_string = "SELECT l.name,l.description,l.cost FROM locations l
     WHERE name = ?";
     $query = $this->db->query($q_string,array($name));
     $rows - $query->result('Location');
     return $rows;
  }
  public function search_by_cost($cost) {
     $q_string = "SELECT l.name,l.description,l.cost FROM locations l
     WHERE cost <= ?";
     $query = $this->db->query($q_string,array($cost));
     $rows - $query->result('Location');
     return $rows;
  }

  //Inserts a location into the database
  public function create_location() {

  }
}
?>
