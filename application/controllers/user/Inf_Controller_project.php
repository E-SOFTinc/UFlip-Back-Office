<?php

/*
 * You can modify this class
 */
/**
 * Description of Settings Class
 * THIS CLASS IS THE ROOT OF ALL CONTROLLER 
 * THIS CLASS CREATED BY EXTENDING CODIGNATOR CI_Contoller CLASS 
 * HERE WE INITIALISE ALL THE COMMON VARIABLES USED IN THE SOFTWARE 
 * LIKE MENU, TABLE PREFIX, Validation Class etc
 *
 * @author Abdul Majeed.P - 9946605558
  CSA Of IOSS
  www.ioss.in
 */
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

    //********* This fuction is used set to check the user login status- looged or not *********/
    /* @access	public
     * @param	No Parameter
     * @return	Ture/False
     */

    public function checkUserLoged() {

        if (!$this->checkSession()) {
            $base_url = base_url();
            $login_link = $base_url . "login";
            echo "You don't have permission to access this page. <a href=' $login_link'>Login</a>";
            die();
        } else {
            $user_type = $this->session->userdata['logged_in']['user_type']; 
            if ($user_type != "distributor") {
                $this->redirect("", "../admin/home");
            }
        }
        return true;
    }

//-----------------------------------------End checkuserLoged---------------------------------------//

    public function checkLoged() {
        $base_url = base_url();
        $login_link = $base_url . "login";

        if (!$this->checkSession()) {
            echo "You don't have permission to access this page. <a href='$login_link'>Login</a>";
            die();
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

//-----------------------------------------End checkSession---------------------------------------//


}

?>
