<?php

class Product extends CI_Controller
{

  public function __construct()
  {
    // code...
     parent::__construct();
    $this->load->model('create_model');
    $this->load->model('read_model');
    $this->load->model('search_model');
    $this->load->model('update_model');
    $this->load->model('delete_model');
    $this->isOnline();
  }
   public function isOnline(){
   if(empty($_SESSION['role'])){
     redirect('login/index');
   }
 }
//     public function view(){
//     $data['records'] = $this->read_model->productDetails();

//     // if(!$data['records']){
//     //     $data['records'] = 'Empty database records';
//     // }
//     $this->load->view('resources/header');
//     $this->load->view('resources/navbar');
//     $this->load->view('admin/products/view',$data);
//     $this->load->view('resources/footer');

//   }
  public function add(){
    $this->form_validation->set_rules('name','Product Name','trim|required|min_length[3]|max_length[100]');
    $this->form_validation->set_rules('price','Product Price','trim|required');
    $this->form_validation->set_rules('quantity','ProductQuantity','trim|required');
    $this->form_validation->set_rules('description','Product Description','trim|required');
      $this->form_validation->set_rules('category','Product Category','trim|required');

    $this->form_validation->set_error_delimiters('<span class="alert alert-danger mx-2 py-1">', '</span>');
      if ($this->form_validation->run() == FALSE)
         {
           $this->load->view('resources/header');
           $this->load->view('resources/navbar');
           $this->load->view('admin/products/add');
           $this->load->view('resources/footer');
         }
         else
         {
           // $this->session->set_flashdata('feedback', 'el');
           // redirect(base_url().'login/forgot');
              $data = "";
               $config['upload_path']          = './uploads/';
               $config['allowed_types']        = 'gif|jpg|jpeg|png|webp';
              // $config['max_size']             = 1000;
               // $config['max_width']            = 1024;
               // $config['max_height']           = 768;

               $this->load->library('upload', $config);



               if ( ! $this->upload->do_upload('pics'))
               {
                       $data = array('error' => $this->upload->display_errors());
                       //$this->session->set_flashdata('upload_error', $this->upload->display_errors());
                      //  $this->session->set_flashdata($data);
                      // redirect('product/add');
               }
               else
               {
                        $data = array('upload_data' => $this->upload->data());
                      // $this->session->set_flashdata('upload_data', $this->upload->data());
                      // $this->session->set_flashdata($data);
                      //  redirect('product/add');
               } //end of file upload
               $this->load->view('resources/header');
               $this->load->view('resources/navbar');
               $this->load->view('admin/products/add',$data);
               $this->load->view('resources/footer');

         }

  }

  //multiple ADD pictures
 public function addmultiple(){
    $this->form_validation->set_rules('name','Product Name','trim|required|min_length[3]|max_length[100]');
    $this->form_validation->set_rules('price','Product Price','trim|required');
    $this->form_validation->set_rules('quantity','ProductQuantity','trim|required');
    $this->form_validation->set_rules('description','Product Description','trim|required');
    $this->form_validation->set_rules('category','Product Category','trim|required');
    $this->form_validation->set_error_delimiters('<span class="alert alert-danger mx-2 py-1">', '</span>');
      if ($this->form_validation->run() == FALSE)
         {
           $this->load->view('resources/header');
           $this->load->view('resources/navbar');
           $this->load->view('admin/products/add');
           $this->load->view('resources/footer');
         }
         else
         {
           // $this->session->set_flashdata('feedback', 'el');
           // redirect(base_url().'login/forgot');
               $data = "";
               $picsNames = array();
               $myfiles = $_FILES;
               $cnt= count($_FILES['pics']['name']);
               for($i=0; $i<$cnt; $i++){
                    $_FILES['pics']['name']= $myfiles['pics']['name'][$i];
                    $_FILES['pics']['type']= $myfiles['pics']['type'][$i];
                    $_FILES['pics']['tmp_name']= $myfiles['pics']['tmp_name'][$i];
                    $_FILES['pics']['error']= $myfiles['pics']['error'][$i];
                    $_FILES['pics']['size']= $myfiles['pics']['size'][$i];

                     $config['upload_path']          = './uploads/';
                     $config['allowed_types']        = 'gif|jpg|jpeg|png|webp';
                    // $config['max_size']             = 1000;
                     // $config['max_width']            = 1024;
                     // $config['max_height']           = 768;

                     $this->load->library('upload', $config);


                         if ( ! $this->upload->do_upload('pics'))
                         {
                                 $data = array('error' => $this->upload->display_errors());
                                 //$this->session->set_flashdata('upload_error', $this->upload->display_errors());
                                //  $this->session->set_flashdata($data);
                                // redirect('product/add');
                         }
                         else
                         {
                                  $data = array('upload_data' => $this->upload->data(),
                                  'feedback' => 'Successfully inserted');
                                  array_push($picsNames, $myfiles['pics']['name'][$i]);
                                  //RESIZES THE IMAGES
                                  $this->thumbnail($myfiles['pics']['name'][$i]);
                                // $this->session->set_flashdata('upload_data', $this->upload->data());
                                // $this->session->set_flashdata($data);
                                //  redirect('product/add');
                         } //end of file upload
               }
               //insert to database
               if(!empty($picsNames)){
                  $insert_id = $this->create_model->product();
                  foreach ($picsNames as $x) {
                    // code...
                    $this->create_model->productImages($insert_id, $x);
                  }
               }
               $this->load->view('resources/header');
               $this->load->view('resources/navbar');
               $this->load->view('admin/products/add',$data);
               $this->load->view('resources/footer');

         }
    }
 private function thumbnail($pic){
        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/'.$pic;
       //$config['new_image'] = './uploads/rsz_'.$pic;
        //$config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = FALSE;
        $config['quality']         = 70;
        $config['width']         = 200;
        $config['height']       = 200;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    public function delete($id){
       $this->delete_model->product($id);
      if($_SESSION['role']=='Client'){ redirect('shop/index');}
      redirect('product/view');
    }

    public function view(){
        $data['records'] = $this->read_model->product();
        $this->load->view('resources/header');
      $this->load->view('resources/navbar');
      $this->load->view('admin/products/view',$data);
      $this->load->view('resources/footer');
    }
     public function search(){
         $this->form_validation->set_rules('Field','Field','trim|required');
         $this->form_validation->set_rules('Search','Search','trim|required');
         $data['records']="";
         if ($this->form_validation->run() == FALSE)
             {
                  $data['records'] = $this->read_model->product();
             }
             else
             {
                  $data['records']=$this->search_model->product();
             }
          $this->load->view('resources/header');
      $this->load->view('resources/navbar');
      $this->load->view('admin/products/view',$data);
      $this->load->view('resources/footer');
    }

    public function update($id){
      $this->form_validation->set_rules('name','Product Name','trim|required|min_length[3]|max_length[100]');
      $this->form_validation->set_rules('price','Product Price','trim|required');
      $this->form_validation->set_rules('quantity','ProductQuantity','trim|required');
      $this->form_validation->set_rules('description','Product Description','trim|required');
     $this->form_validation->set_rules('category','Product Category','trim|required');

      $this->form_validation->set_error_delimiters('<div class="alert alert-danger font-weight-bold">', '</div>');
        if ($this->form_validation->run() == FALSE)
           {
            $data['edit'] = $this->read_model->specific($id, 'products');
             $this->load->view('resources/header');
             $this->load->view('resources/navbar');
             $this->load->view('admin/products/update',$data);
             $this->load->view('resources/footer');
           }
           else
           {
             $this->update_model->products($id);
             $this->session->set_flashdata('feedback', 'Update Successfull');
             redirect('product/view');

           }
       }
}
