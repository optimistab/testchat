<?php

class Auth extends CI_Controller{
  public function login()
  {
    $this->form_validation->set_rules('username','Username','Required');
    $this->form_validation->set_rules('password','Password','Required|min_length[5]');

    if($this->form_validation->run() == TRUE){

      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where(array('username' =>$username,'password' =>$password));
      $query = $this->db->get();

      $user = $query->row();

      if($user->email){
    //    $this->load->library('session');
       //$this->session->set_flashdata("success","you are logged in");


        $_SESSION['user_logged']= TRUE;
        $_SESSION['username']= $user->username;

        redirect("user/home","refresh");


      }else{
        $this->session->set_flashdata("error","NO such account exist in database");
        redirect("auth/login","refresh");
      }
    }

    $this->load->view('login');
  }
  public function register()
  {
    if($this->input->post('register') !== false){
      $this->form_validation->set_rules('username','Username','Required');
      $this->form_validation->set_rules('email','Email','Required');
      $this->form_validation->set_rules('password','Password','Required|min_length[5]');
      $this->form_validation->set_rules('password','Confirm Password','Required|min_length[5]|matches[password]');
      $this->form_validation->set_rules('phone','Phone','Required|min_length[5]');
      $this->form_validation->set_rules('email','Email','Required');

      if($this->form_validation->run() == TRUE){
        echo "form validated";

        $data = array(
          'username'=>$_POST['username'],
          'email'=>$_POST['email'],
          'password'=>md5($_POST['password']),
          'gender'=>$_POST['gender'],
          'created_date'=>date('Y-n-d'),
          'phone'=>$_POST['phone'],
        );

        $this->db->insert('users',$data);

        $this->session->set_flashdata("success","Your account has been registered.You can login now.");
        redirect("auth/register","refresh");

      }
    }
    $this->load->view('register');
  }
}
