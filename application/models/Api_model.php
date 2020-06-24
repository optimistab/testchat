<?php





class Api_model extends CI_Model
{
  public function get_users(){
  ///  $users = $this->$_SESSION->all_userdata();
//  $this->db->where('username',$username);
  $query=$this->db->query("select * from users");
  //$query=$this->db->where
//  SELECT * FROM users WHERE username != '$username_from_session';
	return $query->result();
  //  return $users;
  }
}

?>
