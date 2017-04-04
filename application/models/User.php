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

  //Add a location to a user's list
  public function add_user_location($user_id, $location_id, $order)
  {
    $q_string = "INSERT INTO `locBucket`.`user_locations` (`user_id`, `location_id`, `order`) VALUES (?, ?, ?);"; //Change this to get all but password
    $query = $this->db->query($q_string, array($user_id, $location_id, $order));
  }

  //Returns true if the user/password are correct
  public function login($email, $password)
  {
    $q_string = "SELECT * FROM users WHERE email=? LIMIT 1;";
    $query = $this->db->query($q_string, array($email));

    $rows = $query->result('User'); //Returns results as array of user objects

    if(isset($rows[0]))
      $user = $rows[0]; //User exists

    if(isset($user) && password_verify($password, $user->password))
    {
      //Successful login, setup session and redirect to dashboard
      $array = ['USER_ID' => $user->id, 'USER_NAME' => $user->name,
                'USER_EMAIL' => $user->email, 'USER_BIRTHDAY' => $user->birthday,
                'USER_ROLE' => $user->role_id];
      $this->session->set_userdata($array);
      return true;
    }

    return false;
  }

  //Inserts a user into the database
  public function create_user($userObject)
  {
    //Ensure email isn't taken yet
    $q_string = "SELECT * FROM users WHERE email=? LIMIT 1;";
    $query = $this->db->query($q_string, array($userObject->email));

    $rows = $query->result('User'); //Returns results as array of user objects

    if(isset($rows[0]))
      return false; //Email exists in database

    $q_string = "INSERT INTO `locBucket`.`users` (`name`, `email`, `password`) VALUES (?, ?, ?);";
    $values = [$userObject->name, $userObject->email, password_hash($userObject->password, PASSWORD_DEFAULT)];
    $query = $this->db->query($q_string, $values); //Insert

    return true;
  }
}
?>
