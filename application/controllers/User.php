
<?php


class User extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    if(!isset($_SESSION['user_logged'])){
      $this->session->set_flashdata("error","Please login first to view this page");
      redirect("auth/login");
    }
  }
  public function home()
  {

      if(isset($_POST["messages"])){
        redirect("Api/messages","refresh");
      }
      $this->load->view('home');
  }

}
