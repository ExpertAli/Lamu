<?php

class Read_model extends CI_Model
{

  function __construct()
  {
    // code...
      $this->load->database();
  }
  public function countCart(){
    $this->db->from('cart');
    $this->db->where('user',$_SESSION['id']);
    return $this->db->count_all_results();
  }
  public function sumCart(){
    $this->db->select_sum('amount');
    $query = $this->db->get('cart',array('user'=>$_SESSION['id']));
    $sum = $query->row();
    return $sum->amount;
  }

  public function client(){
    $qry = $this->db->get('client');
    return $qry->result_array();
  }
   public function category(){
    $qry = $this->db->get('category');
    return $qry->result_array();
  }

  public function cart($id=null){
      if($id){
        $qry = $this->db->get('cart', array('id' => $id));
        return $qry->result_array();
      }
      $qry = $this->db->get('cart');
      return $qry->result_array();
  }
  public function clientcart(){
    $this->db->select('cart.id,cart.quantity,cart.amount,cart.posted,cart.product,products.price,products.name')
              ->from('cart')
              ->where('cart.user', $_SESSION['id'])
              ->join('client', 'client.id = cart.user')
              ->join('products', 'products.id = cart.product');
    $qry = $this->db->get();
    return $qry->result_array();
  }
 public function allcart(){
    $qry=$this->db->query('SELECT cart.id,cart.quantity,cart.amount,client.fullname,cart.posted,cart.product,products.price,products.name FROM cart LEFT JOIN client ON cart.user=client.id LEFT JOIN products ON cart.product=products.id');
    return $qry->result_array();
  }
  public function product($id=null){
      if($id){
        $qry = $this->db->get('products', array('id' => $id));
        return $qry->result_array();
      }
      //$qry = $this->db->get('products');
      $qry=$this->db->query('SELECT products.id,products.name,products.price,products.description,products.category,products.quantity,category.title FROM products LEFT JOIN category ON products.category=category.id');
      return $qry->result_array();
  }


  public function productPics($id=null){
    // $this->db->distinct();
    if($id){
      $this->db->where('product', $id);
      $qry = $this->db->get('product_images');
      return $qry->result_array();
    }
    
    $qry = $this->db->get('product_images');
    return $qry->result_array();
  }
  
  public function display(){
      //add category.title and products.category
      $qry = $this->db->query('SELECT DISTINCT(products.id),products.name,products.category,category.title,products.price,products.description,products.quantity,products.posted,product_images.image_name FROM products LEFT JOIN product_images ON products.id=product_images.product LEFT JOIN category ON products.category=category.id GROUP BY products.id ORDER BY products.category DESC ');
      return $qry->result_array();
  }

  public function productDetails($id=null){
       $qry = $this->db->query('SELECT DISTINCT(products.id),products.name,products.price,products.description,products.quantity,products.posted,product_images.image_name FROM products LEFT JOIN product_images ON products.id=product_images.product WHERE products.id='.$id.'');
      return $qry->result_array();
  }
 
  public function user(){
    $qry = $this->db->get('user');
    return $qry->result_array();
  }
  public function forgot(){
    $qry = $this->db->get('client',array('email' =>$this->input->post('email') ));
    return $qry->row();
  }
  
  public function specific($id, $table){
   
    $qry=$this->db->query('SELECT * FROM '.$table.' WHERE id='.$id.'');
      return $qry->result_array();
  }
  public function catsInProduct(){
      $res=$this->db->query('SELECT DISTINCT(products.category),category.title FROM `products` LEFT JOIN category ON products.category=category.id ORDER BY category DESC ');
 return $res->result_array();
  }
}
