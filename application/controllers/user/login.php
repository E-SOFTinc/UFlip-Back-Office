<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'Inf_Controller.php';

class Login extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function logout() {
       
        $user_user_name = $this->LOG_USER_NAME;
        $user_user_id = $this->LOG_USER_ID;
        $admin_user_name = $this->LOG_USER_NAME; 
        if($user_user_id)
        {
            $this->login_model->insertActivityHistory($user_user_id,"logout");
        }        
        $this->session->unset_userdata('logged_in');
        
        session_destroy();

        $path = "../login";
        if ($user_user_name)
            $path = "../login/index/user/$admin_user_name/$user_user_name";
        $this->redirect("Successfully Logged Out...", "$path", true);
 
    }

}

?>
