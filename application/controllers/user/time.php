<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'Inf_Controller.php';

class Time extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        echo "Welcome";
    }

    function get_session_time() {
        if ($this->session->userdata("user_page_load_time")) {
            $current_time = time();
            $page_load_time = $this->session->userdata("user_page_load_time");
            echo "$current_time===$page_load_time";
            exit();
        } else {
            //session out. must reload the page
            $current_time = time();
            $page_load_time = strtotime("1990-01-01 00:00:00");
            echo "$current_time===$page_load_time";
            exit();
        }
    }

}

?>
