<?php

class User extends CI_Controller
{

    public function __construct()
    {
      // code...
      parent::__construct();
      $this->load->model('read_model');
      $this->load->model('create_model');
       $this->load->model('search_model');
      $this->load->model('update_model');
      $this->load->model('delete_model');
      $this->isOnline();
    }
    public function isOnline(){
       if(empty($_SESSION['role']) && $_SESSION['role']=='Admin'){
         redirect('login/index');
       }
     }
    public function view(){
      $data['records'] = $this->read_model->user();
      $this->load->view('resources/header');
      $this->load->view('resources/navbar');
      $this->load->view('admin/user/view',$data);
      $this->load->view('resources/footer');

    }
    public function search(){
     $this->form_validation->set_rules('Field','Field','trim|required');
     $this->form_validation->set_rules('Search','Search','trim|required');
     $data['records']="";
         if ($this->form_validation->run() == FALSE)
         {
              $data['records'] = $this->read_model->user();  
         }
         else
         {
              $data['records']=$this->search_model->user();
         }
          $this->load->view('resources/header');
          $this->load->view('resources/navbar');
          $this->load->view('admin/user/view',$data);
          $this->load->view('resources/footer');

    }
    public function create(){
        $this->form_validation->set_rules('fullname','Fullname','trim|required|min_length[3]|max_length[100]',
          array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]',
            array('is_unique' => 'The email already exists'));
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('password-repeat','Password Confirmation','trim|required|matches[password]',
          array('matches' => 'The password you entered does not match'));
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger font-weight-bold">', '</div>');
      if ($this->form_validation->run() == FALSE)
         {
             $this->load->view('resources/header');
             $this->load->view('resources/navbar');
             $this->load->view('admin/user/create');
             $this->load->view('resources/footer');
         }
         else
         {
            $this->create_model->user();
            $this->session->set_flashdata('feedback', 'Your account has been created');
            redirect(base_url().'user/create');
         }

    }

    public function update($id){
      $this->form_validation->set_rules('id','id','trim|required');
      $this->form_validation->set_rules('fullname','Fullname','trim|required|min_length[3]|max_length[100]',
            array('required' => 'You must provide a %s.'));
      $this->form_validation->set_rules('email','Email','trim|required|valid_email',
            array('is_unique' => 'The email already exists'));
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger font-weight-bold">', '</div>');
        if ($this->form_validation->run() == FALSE)
           {
             $data['edit'] = $this->read_model->specific($this->uri->segment(3), 'user');
               $this->load->view('resources/header');
               $this->load->view('resources/navbar');
               $this->load->view('admin/user/update',$data);
               $this->load->view('resources/footer');
           }
           else
           {
              $this->update_model->user($id);
              $this->session->set_flashdata('feedback', 'Update Successfull');
              redirect(base_url().'user/update/'.$id);
           }

    }

    public function delete($id){
        $this->delete_model->user($id);
        redirect('user/view');
    }
}
