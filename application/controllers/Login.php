<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

			public function __construct()
         {
                 parent::__construct();
                 $this->load->model('create_model');
				 $this->load->model('search_model');
				 $this->load->model('read_model');
				  $this->load->model('update_model');

         }
         
         public function isOnline(){
   if(empty($_SESSION['role'])){
     redirect('login/index');
   }
 }

	public function index()
	{
		# code...
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|htmlspecialchars');
		$this->form_validation->set_rules('password','Password','trim|required|htmlspecialchars');
		$this->form_validation->set_error_delimiters('<span class="alert alert-danger px-2">', '</span>');
		  	if ($this->form_validation->run() == FALSE)
				 {
					 $this->load->view('resources/header');
					 $this->load->view('resources/navbar');
					 $this->load->view('authenticate/login');
					 $this->load->view('resources/footer');

				 }else{
					 //login authentication
					 $result = $this->search_model->checkEmail('client');
					 if($result){
								 if(password_verify($this->input->post('password'), $result->password)){
												 $userdata = array(
															 'id' => $result->id,
															 'fullname' => $result->fullname,
															 'status' => $result->status,
															 'role' => 'Client'
														 );
										 $this->session->set_userdata($userdata);
										 //insert login values to db
									 // $this->login_model->logging();
										 if(isset($_SESSION['redirect'])){

											 redirect(base_url().$_SESSION['redirect']);
										 }
										 redirect('shop/cart');
								 }else{
									 $this->session->set_flashdata('feedback', 'Pleace check your Password!');
									 redirect(base_url().'login/index');
								 }

					 }else{

							$this->session->set_flashdata('feedback', 'Wrong Email and Password!');
							redirect(base_url().'login/index');
					 }
				 }


	}
	public function logout(){
    //$this->login_model->loggout($_SESSION['id']);
     $this->session->sess_destroy();
     redirect('shop/index');
  }
  	

	public function signup()
	{
		# code...
				$this->form_validation->set_rules('fullname','Fullname','trim|required|min_length[3]|max_length[100]',
					array('required' => 'You must provide a %s.'));
			$this->form_validation->set_rules('email','Email','trim|required|valid_email|htmlspecialchars');
			$this->form_validation->set_rules('phonenumber','Phone Number','trim|required');
			$this->form_validation->set_rules('password','Password','trim|required');
			$this->form_validation->set_rules('password-repeat','Password Confirmation','trim|required|matches[password]',
					array('matches' => 'The entered password does not match'));
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
				if ($this->form_validation->run() == FALSE)
					 {
							 $this->load->view('resources/header');
							 $this->load->view('resources/navbar');
							 $this->load->view('authenticate/signup');
							 $this->load->view('resources/footer');
					 }
					 else
					 {
						 // $this->session->set_flashdata('feedback', 'Your account has been created');
						 // redirect(base_url().'login/signup');
                $this->create_model->client();
					 }

	}
	public function forgot()
	{
		# code...
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			if ($this->form_validation->run() == FALSE)
				 {
					  $this->load->view('resources/header');
				 		$this->load->view('resources/navbar');
				 		$this->load->view('authenticate/forgot');
				 		$this->load->view('resources/footer');
				 }
				 else
				 {
					 $client_data = $this->read_model->forgot();
					 if(isset($client_data)){
							 $this->load->library('email');

							$this->email->from('no-reply@mexicoquality.com', 'Mexico Quality');
							$this->email->to($client_data->email);
							// $this->email->cc('another@another-example.com');
							// $this->email->bcc('them@their-example.com');

							$this->email->subject('Password Reset');
							$this->email->message('Testing the email class.');

							$this->email->send();
							$this->session->set_flashdata('feedback', 'Check your email');
	 					 redirect(base_url().'login/forgot');
					 }
				 }
	}
	
	public function resetpassword(){
        $this->isOnline();
    
    		$this->form_validation->set_rules('password','New Password','trim|required|min_length[8]|max_length[30]');
    		$this->form_validation->set_rules('confirm','Re-type','trim|required|min_length[8]|max_length[30]|matches[password]');
    		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    			if ($this->form_validation->run() == FALSE)
    				 {
    					 $this->load->view('resources/header');
    					 $this->load->view('resources/navbar');
    					 $this->load->view('authenticate/changepassword');
    					 $this->load->view('resources/footer');
    				 }
    				 else
    				 {
    					 if($_SESSION['role'] == 'Admin'){
    					     $this->update_model->password('user');
    					 }else{
    					     $this->update_model->password('client');
    					 }
    					 $this->session->set_flashdata('feedback', 'You have successfully changed your password');
    					 redirect(base_url().'login/resetpassword');
    				 }
  }
  
	public function contact()
	{
		# code...
		$this->form_validation->set_rules('fullname','Fullname','trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('message','Message','trim|required|');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			if ($this->form_validation->run() == FALSE)
				 {
					 $this->load->view('resources/header');
					 $this->load->view('resources/navbar');
					 $this->load->view('authenticate/contact');
					 $this->load->view('resources/footer');
				 }
				 else
				 {
				     $email = \Config\Services::email();
                    
                    $email->setFrom('no-reply@mexicoquality.co.ke', 'Mexico Quality Website');
                    $email->setTo($this->input->post('email'));
                    // $email->setCC('another@another-example.com');
                    // $email->setBCC('them@their-example.com');
                    
                    $email->setSubject('Email Test');
                    $email->setMessage('Testing the email class.');
                    
                    $email->send();

					 $this->session->set_flashdata('feedback', 'We have received your email and we will get back to you. <br>Thank you for visiting our website');
					 redirect(base_url().'login/contact');
				 }
	}
	public function about()
	{
		# code...
		$this->load->view('resources/header');
		$this->load->view('resources/navbar');
		$this->load->view('authenticate/about');
		$this->load->view('resources/footer');
	}
	public function admin()
	{
		# code...
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|htmlspecialchars');
		$this->form_validation->set_rules('password','Password','trim|required|htmlspecialchars');
		$this->form_validation->set_error_delimiters('<span class="alert alert-danger px-2">', '</span>');
		  	if ($this->form_validation->run() == FALSE)
				 {
					 $this->load->view('resources/header');
					 $this->load->view('resources/navbar');
					 $this->load->view('admin/login');
					 $this->load->view('resources/footer');

				 }else{
					 //login authentication
					 $result = $this->search_model->checkEmail('user');
					 if($result){
								 if(password_verify($this->input->post('password'), $result->password)){
												 $userdata = array(
															 'id' => $result->id,
															 'fullname' => $result->fullname,
															
															 'role' => 'Admin'
														 );
										 $this->session->set_userdata($userdata);
										 //insert login values to db
									 // $this->login_model->logging();
										 if(isset($_SESSION['redirect'])){

											 redirect(base_url().$_SESSION['redirect']);
										 }
										 redirect('admin/index');
								 }else{
									 $this->session->set_flashdata('feedback', 'Pleace check your Password!');
									 redirect(base_url().'login/admin');
								 }

					 }else{

							$this->session->set_flashdata('feedback', 'Wrong Email and Password!');
							redirect(base_url().'login/admin');
					 }
				 }


	}

}
