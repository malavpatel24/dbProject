<?php
class User extends CI_Model {

  public $id;
  public $name;
  public $email;
  public $password;
  public $birthday;

  //Returns a list of all users
  public function get_users()
  {
    $q_string = "SELECT * FROM users;"; //Change this to get all but password
    $query = $this->db->query($q_string);
    $rows = $query->result('User'); //Returns results as array of user objects

    return $rows;
  }

  //Returns a user specified by id
  public function get_user($id)
  {
    $q_string = "SELECT * FROM users WHERE id=?;"; //Change this to get all but password
    $query = $this->db->query($q_string, array($id));
    $rows = $query->result('User'); //Returns results as array of user objects

    return $rows;
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
    $q_string = "SELECT * FROM users WHERE email=? LIMIT 1;";
    $query = $this->db->query($q_string, array($email));

    $rows = $query->result('User'); //Returns results as array of user objects

    return $rows;
  }

  //Inserts a user into the database
  public function create_user($userObject)
  {
    $q_string = "INSERT INTO `locBucket`.`users` (`name`, `email`, `password`) VALUES (?, ?, ?);";
    $values = [$userObject->name, $userObject->email, password_hash($userObject->password, PASSWORD_DEFAULT)];
    $query = $this->db->query($q_string, $values); //Insert user
  }
}
?>
