<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'Inf_Controller.php';

class Login extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function logout() {
        $user_type = $this->session->userdata['logged_in']['user_type'];
        $admin_user_name = $this->LOG_USER_NAME;
        $admin_user_id = $this->LOG_USER_ID;
        if($admin_user_id)
        {
            $this->login_model->insertActivityHistory($admin_user_id,"logout");
        }
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('usr_name');
        session_destroy();
        $path = "../login";
        if ($admin_user_name)
            $path = "../login/index/admin/$admin_user_name";
        if($user_type=='employee')
            $path = "../login/login_employee";
        $this->redirect("Successfully Logged Out...", $path, true);
    }

    function index() {
        header("Location:https://infinitemlmsoftware.com/soft/binary/login");
    }

}

?>