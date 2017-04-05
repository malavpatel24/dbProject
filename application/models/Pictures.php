<?php
class Pictures extends CI_Model {
   public $id;
   public $loc_id;
   public $pic_location;



//functions

// insert Picture
// get picture
public function insert_picture($picture){
   $q_string = "INSERT INTO `locBucket`.`pictures` (`loc_id`, `pic_location`)
    VALUES (?, ?);";
   $values = [$picture->loc_id, $picture->pic_location];
   $query = $this->db->query($q_string, $values);

   return true;
}

public function get_picture($loc_id){
   $q_string = "SELECT p.pic_location FROM pictures p
   WHERE loc_id = ?";
   $query = $this->db->query($q_string,array($loc_id));
   $rows = $query->result('Location');
   return $rows;

}

public function get_all_pictures(){
   $q_string = " SELECT p.pic_location FROM pictures p;";
   $query = $this->db->query($q_string);
   $rows = $query->result('location');
   return rows;
}
}
?>
