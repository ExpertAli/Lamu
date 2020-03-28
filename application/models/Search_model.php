<?php

class Search_model extends CI_Model{

  public function __construct(){
         $this->load->database();
  }
  public function checkEmail($table){
    // $array = array('email' => $this->input->post('email'), 'password'=> $this->input->post('password') );
    $this->db->where('email',$this->input->post('email'));
    $qry= $this->db->get($table);
    return $qry->row();
  }
  public function user(){
      
       $this->db->like($this->input->post('Field'), $this->input->post('Search'));
       $query=$this->db->get('user');
       return $query->result_array();
  }
   public function client(){
      
       $this->db->like($this->input->post('Field'), $this->input->post('Search'));
       $query=$this->db->get('client');
       return $query->result_array();
  }
   public function product(){
      if($this->input->post('Field')==='category'){
           $result=$this->category();
        //   $query= $this->db->select()->from('products')->like('category',$result[0]['id'])->join('category','products.category=category.id','left');
        //   $this->db->like('category',$result[0]['id']);
        //   $this->db->join('category','products.category=category.id','left');
        //   $query=$this->db->get('products');
        $query=$this->db->query('SELECT products.id,products.name,products.price,products.description,products.category,products.quantity,category.title FROM products LEFT JOIN category ON products.category=category.id WHERE products.id='.$result[0]['id'].'');
           return $query->result_array();
      }
      
       $this->db->like($this->input->post('Field'), $this->input->post('Search'));
       $query=$this->db->get('products');
       return $query->result_array();
  }
  public function category(){
      
       $this->db->like('title', $this->input->post('Search'));
       $query=$this->db->get('category');
       return $query->result_array();
  }
   public function cart(){
      
       $this->db->like($this->input->post('Field'), $this->input->post('Search'));
       $query=$this->db->get('cart');
       return $query->result_array();
  }
}
