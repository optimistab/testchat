<?php





class Api_model extends CI_Model
{
  public function get_users(){
    $users = $this->$_SESSION->all_userdata();

    return $users->username;
  }
}

?>
