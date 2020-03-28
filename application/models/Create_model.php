<?php

class Create_model extends CI_Model
{

  function __construct()
  {
    // code...
    $this->load->database();
  }

  public function client(){
        $data = array(
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phonenumber'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'hashcode' => password_hash($this->input->post('email'), PASSWORD_DEFAULT)

        );
        return $this->db->insert('client', $data);
  }

    public function user(){
        $data = array(
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'hash' => password_hash($this->input->post('email'), PASSWORD_DEFAULT)
        );
        return $this->db->insert('user', $data);
  }
  public function cart($product,$quantity,$amount){
        $data = array(
            'user' => $_SESSION['id'],
            'product' => $product,
            'quantity' => $quantity,
            'amount' => $amount
        );
        return $this->db->insert('cart', $data);
  }
  public function category(){
        $data = array(
            'title' => $this->input->post('name')
            );
        return $this->db->insert('category', $data);
  }
  public function product(){
        $data = array(
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'quantity' => $this->input->post('quantity'),
            'description' => $this->input->post('description'),
            'category' => $this->input->post('category')
        );
        $this->db->insert('products', $data);

        return $this->db->insert_id();
  }

  public function productImages($product_id, $pic_name){
    $data = array('product' => $product_id,'image_name' => $pic_name);
    return $this->db->insert('product_images', $data);
  }
}
