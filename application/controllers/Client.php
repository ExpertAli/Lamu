<?php

class Client extends CI_Controller
{

    public function __construct()
    {
      // code...
      parent::__construct();
      $this->load->model('read_model');
      $this->load->model('search_model');
       $this->load->model('delete_model');
       $this->load->model('update_model');
       $this->isOnline();
    }
 public function isOnline(){
   if(empty($_SESSION['role'])&& $_SESSION['role']=='Admin'){
     redirect('login/index');
   }
 }
    public function view(){
      $data['records'] = $this->read_model->client();

      // if(!$data['records']){
      //     $data['records'] = 'Empty database records';
      // }
      $this->load->view('resources/header');
      $this->load->view('resources/navbar');
      $this->load->view('admin/client/view',$data);
      $this->load->view('resources/footer');

    }
     public function search(){
         $this->form_validation->set_rules('Field','Field','trim|required');
         $this->form_validation->set_rules('Search','Search','trim|required');
         $data['records']="";
         if ($this->form_validation->run() == FALSE)
             {
                  $data['records'] = $this->read_model->client();
             }
             else
             {
                  $data['records']=$this->search_model->client();
             }
            $this->load->view('resources/header');
          $this->load->view('resources/navbar');
          $this->load->view('admin/client/view',$data);
          $this->load->view('resources/footer');
    }
    
    public function delete($id){
        $this->delete_model->client($id);
     redirect('client/view');
    }
    
    // public function update($id){
    //     $this->update_model->client($id);
    //  redirect('client/view');
    // }
    
    public function update($id){
        $this->form_validation->set_rules('fullname','Fullname','trim|required|min_length[3]|max_length[100]',
          array('required' => 'You must provide a %s.'));
      $this->form_validation->set_rules('email','Email','trim|required|valid_email',
          array('is_unique' => 'The email you entered already exists'));
      $this->form_validation->set_rules('phonenumber','Phone Number','trim|required');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger font-weight-bold">', '</div>');
        if ($this->form_validation->run() == FALSE)
           {
             $data['edit'] = $this->read_model->specific($id, 'client');
               $this->load->view('resources/header');
               $this->load->view('resources/navbar');
               $this->load->view('admin/client/update',$data);
               $this->load->view('resources/footer');
           }
           else
           {
                $this->update_model->client($id);
                $this->session->set_flashdata('feedback', 'Update Successfull');
                redirect('client/update/'.$id);
           }

    }
}
