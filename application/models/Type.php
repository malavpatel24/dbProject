<?php
class Type extends CI_Model {

   public $id;
   public $name;

   //write functions here
   // get type

   //Returns the locations that the user has ranked up
   public function get_types_by_id()
   {
     $q_string = "SELECT * FROM types;"; //Change this to get all but password
     $query = $this->db->query($q_string);
     $rows = $query->result(); //Returns results as array of user objects

     //We want to return with id leading to name
     $values = [];
     foreach($rows as $row)
     {
       $values[$row->id] = $row->name;
     }

     return $values;
   }
}
?>
