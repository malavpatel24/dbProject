<?php
class User extends CI_Model {

  public $id;
  public $name;
  public $email;
  private $password;
  public $birthday;

  public function get_last_ten_entries()
  {
          $query = $this->db->get('entries', 10);
          return $query->result();
  }
}
?>
