<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getBonus
 *
 * @author ioss
 */
require_once 'Inf_Controller.php';
class bonus extends Inf_Controller{
    
    public function __construct() {
        parent::__construct();
    }
 
    public function Getewallet()
    {
        //echo "dddd";
        $this->load->model('login_model');
        $this->load->model('ewallet_model');
       //$username = $this->input->post('adminname');
       $admin_username = $this->input->post('adminname');
       $admin_username ="admin";
       
       $user_id = $this->input->post('userid');
       $user_id = 12346;
       //echo "admin username = $admin_username ";
       //echo "<br>user details $user_id :: $admin_username";
        $details = $this->login_model->loginPrimaryUser($admin_username);
       $balance_amount= $this->ewallet_model->getBalanceAmountforMobile($user_id,$details["id"]);
       echo $balance_amount;
    }
    public function getEwalletTransactions()
    {
    
         $this->load->model('login_model');
         $this->load->model('ewallet_model');
         //$username = $this->input->post('adminname');
         $admin_username = $this->input->post('adminname');
         //$admin_username ="admin";
       
        $user_id = $this->input->post('userid');
       //$user_id = 12346;
        $details = $this->login_model->loginPrimaryUser($admin_username);
        //print_r($details);
        $from_date = Date("Y-m-d", strtotime($this->ewallet_model->getJoiningDate($user_id,$details["id"]."_")));
        $to_date = Date("Y-m-d");
        $product_status = "yes "; 
        
        //TODO: get the product status as post parameter.
        
        $details_array = $this->ewallet_model->getCommissionDetailsForMobile($user_id, $details["id"], $from_date, $to_date, $product_status);
        
        echo json_encode($details_array);
        
    }//FUNCTION ENDS [ public function getTransactions() ]
    public function getTotalTodaysJoining()
    {
        $this->load->model('home_model');
        $this->load->model('login_model');
        
        $admin_username = $this->input->post('adminname');
        //$admin_username ="admin";
        $user_id = $this->input->post('userid');
        //$user_id=12346;
         $details = $this->login_model->loginPrimaryUser($admin_username);
        $total_joining = $this->home_model->totalJoiningpage($user_id,$details["id"]."_");
        $todays_joining = $this->home_model->todaysJoiningCount($user_id,$details["id"]."_");
      $array["today"] = $todays_joining;
      $array["total"] = $total_joining;
      echo json_encode($array);
        
        
    }//FUNCTION ENDS [ public function getTotalTodaysJoining() ]
    
    public function getRefferalDetails()
    {
        $this->load->model('login_model');
        $this->load->model('configuration_model');
        $admin_username = $this->input->post('adminname');
        //$admin_username ="admin";
        $user_id = $this->input->post('userid');
         //$user_id=12346;
        $details = $this->login_model->loginPrimaryUser($admin_username);
        
         $res = $this->configuration_model->getReferalDetails($user_id,$details["id"]."_");
//         echo "dddexs";
//         print_r($res);
         echo json_encode($res);
        
        //echo "222ss";
        
    }//FUNCTION ENDS [ public function getRefferalDetails() ]
    
    public function getCommtionDetails()
    {
        //echo "first<br>";
        
        $this->load->model('login_model');
        $this->load->model('leg_count_model');
        //echo "second<br>";
        
        $admin_username = $this->input->post('adminname');
        //$admin_username ="admin";
        $user_id = $this->input->post('userid');
         //$user_id=12346;
        $details = $this->login_model->loginPrimaryUser($admin_username);
         $this->leg_count_model->initialize("yes");
        //echo "third<br>";
        $user_type = $this->leg_count_model->getUserTypeFromUserID($user_id,$details["id"]."_");
        //echo "fourth<br>"; 
        $user_leg_detail = $this->leg_count_model->getUserLegDetails($user_id, 0, 25, $user_type,$details["id"]."_");
       // echo "fifth<br>";
        echo json_encode($user_leg_detail);
        
         
        
    }// FUNCTION ENDS [ public function getCommtionDetails() ]
     
}
