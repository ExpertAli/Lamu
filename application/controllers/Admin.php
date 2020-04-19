<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
      // code...
      parent::__construct();
      $this->load->model('read_model');
       $this->load->model('delete_model');
       $this->load->model('update_model');
       $this->isOnline();
    }
   public function isOnline(){
     if(empty($_SESSION['role']) && $_SESSION['role']=='Admin'){
       redirect('login/admin');
     }
   }
    public function index(){
        $this->load->view('resources/header');
    	 $this->load->view('resources/navbar');
    	 $this->load->view('admin/index');
    	 $this->load->view('resources/footer');
    }
    
}
