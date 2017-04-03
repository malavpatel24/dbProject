<?php
class User extends CI_Model {

  public $id;
  public $name;
  public $email;
  private $password;
  public $birthday;

  //Returns a list of all users
  public function get_users()
  {

  }

  //Returns a user specified by id
  public function get_user($id)
  {

  }

  //Returns the locations that the user with $id wants to visit
  public function get_user_locations($id)
  {

  }

  //How do we want to implement this?
  public function search_users()
  {

  }

  //Returns true if the user/password are correct
  public function login($email, $password)
  {

  }

  //Inserts a user into the database
  public function create_user($userObject)
  {

  }
}
?>
