<?php
/********************************************
 *                                          *
 *   THIS PROGRAM WILL IGNITED BY ANDROID   * 
 *                                          *
 ********************************************/
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author ioss
 */
require_once 'Inf_Controller.php';

class login extends Inf_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    public function ValidateLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $admin_name = $this->input->post('adminName');
        $this->load->model('login_model');
        $result = $this->login_model->login($admin_name, $username, $password, 'user');
        $array =array();
        
        if($result)
        {
            $array["flag"] = "yes";
            $array["details"] = $result;
        }
        
        else
        {
            $array["flag"] ='no';
            
        }
        
        echo json_encode($array);
        //echo "Entered in validateLogin= $username";
        
    }//FUNCTION ENDS [ public function ValidateLogin() ]
    //put your code here
}
