<?php

class Delete_model extends CI_Model
{

  function __construct()
  {
    // code...
       $this->load->database();
  }
  public function client($id){
    $this->db->delete('client', array('id' => $id));
  }
  public function user($id){
    $this->db->delete('user', array('id' => $id));
  }
  public function product($id){
    $this->db->delete('products', array('id' => $id));
  }
  public function cart($id){
    $this->db->delete('cart', array('id' => $id));
  }
  public function category($id){
    $this->db->delete('category', array('id' => $id));
  }
}
