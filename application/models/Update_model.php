<?php

class Update_model extends CI_Model
{

  function __construct()
  {
    // code...
      $this->load->database();
  }
  public function client($id){
        $data = array(
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phonenumber'),
        );
        $this->db->where('id', $id);
      return  $this->db->update('client', $data);
  }
  public function user($id){
        $data = array(
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            //'updated' =>
        );
        $this->db->where('id', $id);
      return  $this->db->update('user', $data);
  }
   public function category($id){
        $data = array(
            'title' => $this->input->post('title')
        );
        $this->db->where('id', $id);
      return  $this->db->update('category', $data);
  }
   public function password($table){
    $data = array(
        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
      );
    $this->db->where('id', $_SESSION['id']);
    return  $this->db->update($table, $data);
  }
  public function products($id){
    $data = array(
        'name' => $this->input->post('name'),
        'price' => $this->input->post('price'),
        'quantity' => $this->input->post('quantity'),
        'description' => $this->input->post('description'),
        'category' => $this->input->post('category')
      );
    $this->db->where('id', $id);
    return  $this->db->update('products', $data);
  }
  public function order($id,$qty,$amount,$user,$product){
        $data = array(
            'user' => $user,
            'product' => $product,
            'quantity' => $qty,
            'amount' => $amount
          );
        $this->db->where('id', $id);
        $this->db->update('cart', $data);
      }
}
