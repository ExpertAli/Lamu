<?php

class Stock extends CI_Controller
{

    public function __construct()
    {
      // code...
      parent::__construct();
      $this->load->model('mpesa_model');
      //$this->isOnline();
    }
    
    public function validation(){
        header("Content-Type:application/json"); 
        if (!isset($_GET["token"]))
        {
        echo "Technical error";
        exit();
        }
        if ($_GET["token"]!='12345')
        {
        echo "Invalid authorization";
        exit();
        }
         //echo $this->input->get('token',TRUE);
                 
         if (!$request=file_get_contents('php://input'))
        {
        echo "Invalid input";
        exit();
        }

        //Put the json string that we received from Safaricom to an array
        $array = json_decode($request, true);
     
        if($array['FirstName'] === 'JOHN'){
            /* 
        Accept an Mpesa transaction 
        by replying with the below code 
        */ 
        echo '{"ResultCode":0, "ResultDesc":"Success", "ThirdPartyTransID": 0}';
        }else{
                 /* 
            Reject an Mpesa transaction 
            by replying with the below code 
            */ 
             echo '{"ResultCode":1, "ResultDesc":"Failed", "ThirdPartyTransID": 0}'; 
        }
    }
    
    public function confirmation(){
         header("Content-Type:application/json"); 
        if (!isset($_GET["token"]))
        {
        echo "Technical error";
        exit();
        }
        if ($_GET["token"]!='12345')
        {
        echo "Invalid authorization";
        exit();
        }
        if (!$request=file_get_contents('php://input'))
        {
        echo "Invalid input";
        exit();
        }

        //Put the json string that we received from Safaricom to an array
        $array = json_decode($request, true);
        $this->mpesa_model->insert($array);
        print_r($array);
    }
     public function registration(){
        
        header("Content-Type:application/json");
        $shortcode='601356';
        $consumerkey    ="BGVnUmfS7Vx6IGsuTUw8uQdJm4pHD23J";
        $consumersecret ="nYUJDF3lY9vvj0Gs";
        $validationurl="https://mexicoquality.co.ke/stock/validation?token=12345";
        $confirmationurl="https://mexicoquality.co.ke/stock/confirmation?token=12345";
        /* testing environment, comment the below two lines if on production */
        $authenticationurl='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $registerurl = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
        /* production un-comment the below two lines if you are in production */
        //$authenticationurl='https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        //$registerurl = 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
        $credentials= base64_encode($consumerkey.':'.$consumersecret);
        $username=$consumerkey ;
        $password=$consumersecret;
          // Request headers
          $headers = array(  
            'Content-Type: application/json; charset=utf-8'
          );
          // Request
          $ch = curl_init($authenticationurl);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
          //curl_setopt($ch, CURLOPT_HEADER, TRUE); // Includes the header in the output
          curl_setopt($ch, CURLOPT_HEADER, FALSE); // excludes the header in the output
          curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password); // HTTP Basic Authentication
          $result = curl_exec($ch);  
          $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
        $result = json_decode($result);
        $access_token=$result->access_token;
        curl_close($ch);
        //Register urls
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $registerurl);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); 
        $curl_post_data = array(
          //Fill in the request parameters with valid values
          'ShortCode' => $shortcode,
          'ResponseType' => 'Cancelled',
          'ConfirmationURL' => $confirmationurl,
          'ValidationURL' => $validationurl
        );
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        echo $curl_response;

    }
    public function view(){
        $data['records'] = $this->mpesa_model->view();
      $this->load->view('resources/header');
      $this->load->view('resources/navbar');
      $this->load->view('admin/mpesa',$data);
      $this->load->view('resources/footer');
    }
}