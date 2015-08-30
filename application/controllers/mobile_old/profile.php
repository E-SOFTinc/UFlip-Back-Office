<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profile
 *
 * @author ioss
 */
require_once 'Inf_Controller.php';
class Profile  extends Inf_Controller{
    public function __construct() {
        parent::__construct();
    }//FUNCTION ENDS [ public function __construct() ]
    
    public function getProfileDetails()
    {
        $this->load->model('profile_model');
        $this->load->model('login_model');
        $admin_username = $this->input->post('adminname');
        //$admin_username ="admin";
        $user_id = $this->input->post('userid');
         //$user_id=12346;
        $user_name = $this->input->post('username');
       // $user_name='INFINITE680437';
        $details = $this->login_model->loginPrimaryUser($admin_username);
        $product_status = "yes";
        
        $profile_arr = $this->profile_model->getProfileDetails($user_id, $user_name, $product_status,"",$details["id"]."_");
        echo json_encode($profile_arr);
    }
    
    
    public function changePassword()
    {
        
         $this->load->model('login_model');
        $admin_username = $this->input->post('adminname');
        //$admin_username ="admin";
        $user_id = $this->input->post('userid');
         //$user_id=12346;
        $user_name = $this->input->post('username');
       // $user_name='INFINITE680437';
         $details = $this->login_model->loginPrimaryUser($admin_username);
        pdatePassword($new_pwd, $user_id , $user_name ,  "", "",$details["id"]."_");
    }
}
