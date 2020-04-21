<?php

class Shop extends CI_Controller
{

  public function __construct()
  {
      // code...
      parent::__construct();
      $this->load->model('read_model');
      $this->load->model('create_model');
        $this->load->model('update_model');
      $this->load->model('delete_model');
  }
   public function isOnline(){
   if(empty($_SESSION['role'])){
     redirect('login/index');
   }
 }
 
  public function index()
	{
  		# code...
      $data['products']=$this->read_model->display();
      $data['cats']=$this->read_model->catsInProduct();
  		$this->load->view('resources/header');
  		$this->load->view('resources/navbar');
  		$this->load->view('shop/products2', $data);
  		$this->load->view('resources/footer');
	}
  public function details($id)
	{
		# code...
        $data['products']=$this->read_model->productDetails($id);
        $data['images']=$this->read_model->productPics($id);
        // $imgs= array();
        // foreach ($data['products'] as $k) {
        //   // code...
        //   array_push($imgs, $data['products'][0]['id']);
        // }
    		$this->load->view('resources/header');
    		$this->load->view('resources/navbar');
    		$this->load->view('shop/details',$data);
    		$this->load->view('resources/footer');
	}

  public function cart()
  {
    # code...
    $this->isOnline();
    $data['mycart'] = $this->read_model->clientcart();
    $this->load->view('resources/header');
    $this->load->view('resources/navbar');
    $this->load->view('shop/cart',$data);
    $this->load->view('resources/footer');
  }
  public function view()
  {
    # code...
    $data['orders'] = $this->read_model->allcart();
    $this->load->view('resources/header');
    $this->load->view('resources/navbar');
    $this->load->view('admin/cart/view',$data);
    $this->load->view('resources/footer');
  }

  public function addcart(){
      if(empty($_SESSION['id'])){
         $_SESSION['redirect']= 'shop/details/'.$this->input->post('product_id');
          redirect('login/index');
      }

      $this->form_validation->set_rules('quantity','Quantity','trim|required');
      $this->form_validation->set_rules('product_id','Product','trim|required');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger px-2">', '</div>');
          if ($this->form_validation->run() == FALSE)
           {
             $this->load->view('resources/header');
             $this->load->view('resources/navbar');
             $this->load->view('shop/cart');
             $this->load->view('resources/footer');
           }else{
               $id=$this->input->post('product_id');
               $qty= $this->input->post('quantity');
               $mycart=$this->read_model->specific($id, 'cart');
               $data=$this->read_model->specific($id, 'products');

            //   if($id === $mycart[0]['product'] && $mycart[0]['status'] !== 0 && $mycart[0]['user'] === $_SESSION['id']){
            //      //redirect('shop/cart'); //alternatively, send feedback,item already in the cart
            //      if($qty != $mycart[0]['quantity']){

            //      }
            //      redirect('shop/cart');
            //   }
               $amount=$qty * $data[0]['price'];
               $this->create_model->cart($id,$qty,$amount);
              redirect('shop/cart');
           }
  }//end of addcart

  public function delete($id){
     $this->delete_model->cart($id);
     if(isset($_SESSION['role']) && $_SESSION['role']=='Client'){ 
         redirect('shop/cart');}
     redirect('shop/view');
  }

  public function checkout(){
    $this->form_validation->set_rules('mpesa','M-PESA CODE','trim|required|min_length[3]|max_length[20]');
    $this->form_validation->set_error_delimiters('<span class="form-label text-danger px-5">', '</span>');
        if ($this->form_validation->run() == FALSE)
         {
           $this->load->view('resources/header');
           $this->load->view('resources/navbar');
           $this->load->view('shop/checkout');
           $this->load->view('resources/footer');
         }else{
           //check mpesa
           $this->session->set_flashdata('feedback', 'This functionality is not yet active.Try Later!');
           redirect('shop/checkout');
         }

  }
  
  public function update($id){
        $this->form_validation->set_rules('quantity','Quantity','trim|required');
      $this->form_validation->set_rules('product_id','Product','trim|required');
      $this->form_validation->set_rules('user','Product','trim|required');
      $this->form_validation->set_error_delimiters('<span class="alert alert-danger px-2">', '</span>');
          if ($this->form_validation->run() == FALSE)
           {
             $data['edit']= $this->read_model->specific($this->uri->segment(3), 'cart');
             //should create a new function to pick only the id and fullname  from client table && product name and price from products table instead fetching all the columns from each table
              $data['clients']=$this->read_model->client();
              $data['products']=$this->read_model->product();
             
             $this->load->view('resources/header');
             $this->load->view('resources/navbar');
             $this->load->view('admin/cart/update',$data);
             $this->load->view('resources/footer');
           }else{
               $pid=$this->input->post('product_id');
               $qty= $this->input->post('quantity');
               //$mycart=$this->read_model->specific($id, 'cart');
               $data=$this->read_model->specific($pid, 'products');

            //   if($id === $mycart[0]['product'] && $mycart[0]['status'] !== 0 && $mycart[0]['user'] === $_SESSION['id']){
            //      //redirect('shop/cart'); //alternatively, send feedback,item already in the cart
            //      if($qty != $mycart[0]['quantity']){

            //      }
            //      redirect('shop/cart');
            //   }
               $amount=$qty * $data[0]['price'];
               $this->update_model->order($id,$qty,$amount,$this->input->post('user'),$this->input->post('product_id'));
              redirect('shop/view');
           }
  }//end of update

}//end of controller
