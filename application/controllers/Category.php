<?php

class Category extends CI_Controller
{

    public function __construct()
    {
      // code...
      parent::__construct();
      $this->load->model('create_model');
      $this->load->model('search_model');
      $this->load->model('read_model');
       $this->load->model('delete_model');
       $this->load->model('update_model');
       $this->isOnline();
    }
 public function isOnline(){
   if(empty($_SESSION['role']) && $_SESSION['role']=='Admin'){
     redirect('login/index');
   }
 }
    public function add(){
        $this->form_validation->set_rules('name','Category','trim|required|min_length[1]|max_length[100]',
          array('required' => 'The system cannot add an EMPTY %s.'));
          
          if ($this->form_validation->run() == FALSE)
         {
            $this->load->view('resources/header');
        	 $this->load->view('resources/navbar');
        	 $this->load->view('admin/category/add');
        	 $this->load->view('resources/footer');
         }
         else
         {
              $this->create_model->category();
              $this->session->set_flashdata('feedback', 'Successfully added category:<span class="px-2 text-monospace">'.$this->input->post('name').'</span>');
            redirect(base_url().'category/add');
         }
        
    }
    public function view(){
        $data['records'] = $this->read_model->category();
        $this->load->view('resources/header');
    	 $this->load->view('resources/navbar');
    	 $this->load->view('admin/category/view',$data);
    	 $this->load->view('resources/footer');
    }
    public function delete($id){
       $this->delete_model->category($id);
       
       redirect(base_url().'category/view');
    }
    public function update($id){
      $this->form_validation->set_rules('title','Category Name','trim|required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger font-weight-bold">', '</div>');
        if ($this->form_validation->run() == FALSE)
           {
              $data['edit'] = $this->read_model->specific($id, 'category');
               $this->load->view('resources/header');
               $this->load->view('resources/navbar');
               $this->load->view('admin/category/edit',$data);
               $this->load->view('resources/footer');
           }
           else
           {

                $this->update_model->category($id);
                $this->session->set_flashdata('feedback', 'Update Successfull');
                redirect(base_url().'category/update/'.$id);
           }

    }
    public function search(){
     $this->form_validation->set_rules('Search','Search','trim|required');
     $data['records']="";
     if ($this->form_validation->run() == FALSE)
         {
              $data['records'] = $this->read_model->category();
              
         }
         else
         {
           $data['records']=$this->search_model->category();
         }
         $this->load->view('resources/header');
          $this->load->view('resources/navbar');
          $this->load->view('admin/category/view',$data);
          $this->load->view('resources/footer');

    }
    
}
