<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'Inf_Controller.php';

class Login extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function logout() {
        $admin_user_name = $this->LOG_USER_NAME;
        $user_id = $this->LOG_USER_ID;
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('usr_name');
        session_destroy();
        $path = "../login";
        if ($admin_user_name) {
            $this->login_model->insertActivityHistory($user_id,"logout");
            $encrypt1=  $this->encrypt->encode($admin_user_name);
            $encrypt2=  str_replace("/", "_", $encrypt1);
            $encrypt3=  urlencode($encrypt2);
            $path = "../login/index/$encrypt3";
        }
        $this->redirect("Successfully Logged Out...", $path, true);
    }

    function index() {
        header("Location:https://infinitemlmsoftware.com/soft/binary/login");
    }

}

?>