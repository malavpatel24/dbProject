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

  }

  //Returns a location specified by id
  public function get_location($id)
  {

  }

  //Returns a location ranking specified by id
  public function get_location_ranking($id)
  {

  }

  //Returns the images for the location specified
  public function get_location_images($id)
  {

  }

  //How do we want to implement this?
  public function search_locations()
  {

  }

  //Inserts a location into the database
  public function create_location()
  {

  }
}
?>
