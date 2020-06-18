<?php





class Api_model extends CI_Model
{
  public function get_users(){
  ///  $users = $this->$_SESSION->all_userdata();
  $query=$this->db->query("select username from users");
	return $query->result();
  //  return $users;
  }
}

?>
