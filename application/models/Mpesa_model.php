<?php

class Mpesa_model extends CI_Model
{

  function __construct()
  {
    // code...
       $this->load->database();
  }
  public function view(){
    $qry = $this->db->get('mpesa');
    return $qry->result_array();
  }
  public function insert($array){
    $data = array(
            'tx_type' => $array['TransactionType'],
            'tx_id' => $array['TransID'],
            'tx_time' => $array['TransTime'],
            'tx_amount' => $array['TransAmount'],
            'shortcode' => $array['BusinessShortCode'],
            'billrefno' => $array['BillRefNumber'],
            'invoice' => $array['InvoiceNumber'],
            'thirdparty' => $array['ThirdPartyTransID'],
            'msisdn' => $array['MSISDN'],
            'fullname' => $array['FirstName']." ".$array['MiddleName']." ".$array['LastName'],
            'account' => $array['OrgAccountBalance'],
        );
        return $this->db->insert('mpesa', $data);
    }
  public function delete($id){
    $this->db->delete('mpesa', array('id' => $id));
  }
 
}