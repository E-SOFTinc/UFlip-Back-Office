<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inf_Controller extends CI_Controller {
    /*
     * 
     * 
     *  PLEASE ADD BELOW 3 LINE BEFORE CHECKING SESSION AND REPLACE THE BELOW FUNCTIONS
     * 
     *  $this->load->model('menu', '', TRUE);   //LOAD Menu MODEL CLASS
     *  $this->setModuleStatus();
     *  $this->setLoggedUserData();          // Set Logged user data 
     * 
     * 
     */

    public function checkAdminLoged() {
        if ($this->checkSession()) {
            $user_type = $this->session->userdata['logged_in']['user_type']; 

            if ($user_type != "admin" && $user_type != "employee")
                $this->redirect("", "../user/home");
        } else {
            $base_url = base_url();
            $login_link = $base_url . "login";
            echo "You don't have permission to access this page. <a href='$login_link'>Login</a>";
            die();
        }
        return true;
    }

    public function checkLoged() {
        $base_url = base_url();
        $login_link = $base_url . "login";

        if (!$this->checkSession()) {
            echo "You don't have permission to access this page. <a href='$login_link'>Login</a>";
            die();
        } else {
            $this->redirect("", "../admin/home");
        }
        return true;
    }

    public function checkSession() {
        $flag = false;
        $is_logged_in = $this->session->userdata('logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            $flag = false;
        } else {
            $flag = true;
        }
        return $flag;
    }

}

?>
