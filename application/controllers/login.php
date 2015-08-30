<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'admin/Inf_Controller.php';

class Login extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function index($url_user_name_encrypt = "") {
        $this->load->model('login_model', '', TRUE);
        $this->load->model('validation', '', TRUE);
        $this->load->helper('cookie');
        $is_logged_in = $this->checkSession();
        if ($is_logged_in) {
            $this->redirect("", 'home', true);
        }

        $url_user_name = '';
        if ($url_user_name_encrypt != "") {
            $decrypt1 = urldecode($url_user_name_encrypt);
            $decrypt2 = str_replace("_", "/", $decrypt1);
            $decrypt3 = $this->encrypt->decode($decrypt2);
            if ($this->validation->userNameToID($decrypt3)) {
                $url_user_name = $decrypt3;
            }
        }

        $this->set('url_user_name', $url_user_name);

        $title = $this->lang->line('login');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "tabs.css";
        $this->ARR_SCRIPT[0]["type"] = "css";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "validate_register.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "cookie-based-jquery-tabs.js";
        $this->ARR_SCRIPT[2]["type"] = "js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "jquery.cookie.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "register_link.js";
        $this->ARR_SCRIPT[4]["type"] = "js";
        $this->ARR_SCRIPT[4]["loc"] = "header";
        $this->setScripts();

        $current_language = $this->session->userdata('tran_language');
        $this->set('current_language', $current_language);
        $lang_arr = $this->login_model->getAllLanguages();
        $this->set('lang_arr', $lang_arr);
        $this->session->set_userdata("lang_arr", $lang_arr);
        for ($i = 0; $i < count($lang_arr); $i++) {
            if ($current_language == $lang_arr[$i]['lang_name_in_english']) {
                $this->LANG_ID = $lang_arr[$i]['lang_id'];
            }
        }

        $this->set("CURRENT_URL", $this->CURRENT_URL);
        $this->set("LANG_ID", $this->LANG_ID);

        ///////////////////////////language translation//////////////////
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_forgot_password", $this->lang->line('forgot_password'));
        $this->set("tran_send_request", $this->lang->line('send_request'));
        $this->set("tran_reset_password", $this->lang->line('reset_password'));
        $this->set("tran_new_password", $this->lang->line('new_password'));
        $this->set("tran_login", $this->lang->line('login'));
        $this->set("tran_send_request", $this->lang->line('send_request'));
        $this->set("tran_password", $this->lang->line('password'));
        $this->set("tran_admin_user_name", $this->lang->line('admin_user_name'));
        $this->set("tran_admin_login", $this->lang->line('admin_login'));
        $this->set("tran_form", $this->lang->line('Form'));
        $this->set("tran_keep_signed_in", $this->lang->line('keep_signed_in'));
        $this->set("tran_user_login", $this->lang->line('user_login'));
        $this->set("tran_back_to_web_site", $this->lang->line('back_to_web_site'));
        $this->set("tran_help", $this->lang->line('help'));
        $this->set("tran_dont_have_an_account", $this->lang->line('dont_have_an_account'));
        $this->set("tran_sign_up_now", $this->lang->line('sign_up_now'));
        $this->set("tran_login_form", $this->lang->line('login_form'));
        $this->set("tran_Keep_me_signed_in", $this->lang->line('Keep_me_signed_in'));
        $this->set("tran_I_forgot_my_password", $this->lang->line('I_forgot_my_password'));
        $this->set("tran_Dont_have_an_account_yet", $this->lang->line('Dont_have_an_account_yet'));
        $this->set("tran_Create_an_account", $this->lang->line('Create_an_account'));
        $this->set("tran_Login", $this->lang->line('Login'));
        $this->set("tran_not_readable", $this->lang->line('not_readable'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->setView();
    }

//mine
    function getRand($length) {
        $charset = "0123456789";
        for ($i = 0; $i < $length; $i++) {
            if ($i == 0) {
                $key = $charset[(mt_rand(0, (strlen($charset) - 1)))];
            } else {
                $key .= $charset[(mt_rand(0, (strlen($charset) - 1)))];
            }
        }
        $randum_id = $key;
        return $randum_id;
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        $this->redirect("Successfully Logged Out...", '../login', true);
    }

    function verifylogin() {
        $this->load->model('login_model', '', TRUE);
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_name', 'Username', 'trim|required|xss_clean|min_length[3]|max_length[30]|htmlentities');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[3]|max_length[30]|callback_check_database');


        $captcha_status = $this->MODULE_STATUS['captcha_status'];
        if ($captcha_status == "yes") {
            $captcha = $this->session->userdata('captcha');
            if ((empty($captcha) || trim(strtolower($_REQUEST['captcha'])) != $captcha)) {
                $captcha_message = "Invalid captcha";
                $this->redirect("$captcha_message", "../login/index", false);
            }
        }

        $login_res = $this->form_validation->run();
        if ($login_res) {
            $mlm_plan = $this->session->userdata('mlm_plan');
            if ($mlm_plan == 'Binary' || $mlm_plan == 'Board') {
                $this->redirect("", "home", true);
            } else {
                //$this->redirect("", "../../matrix/admin/home", true);
                $admin_name = mysql_real_escape_string($this->input->post('admin_user_name'));
                $path = "../login";
                $msg = $this->lang->line('invalid_user_name_or_password');
                $this->redirect("$msg", "$path", false);
            }
        } else {
            $admin_name = mysql_real_escape_string($this->input->post('admin_user_name'));
            $path = "../login";
            $msg = $this->lang->line('invalid_user_name_or_password');
            $this->redirect("$msg", "$path", false);
        }
    }

    function verifylogin_user() {

        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('admin_username', 'Admin Username', 'trim|required|xss_clean|min_length[3]|max_length[30]|htmlentities');
        $this->form_validation->set_rules('user_username', 'Username', 'trim|required|xss_clean|min_length[3]|max_length[30]|htmlentities');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[30]|callback_check_database');

        $login_res = $this->form_validation->run();

        if ($login_res) {
            $mlm_plan = $this->session->userdata('mlm_plan');
            if ($mlm_plan == 'Binary' || $mlm_plan == 'Board') {
                $this->redirect("", "home", true);
            } else {
                $this->redirect("", "../../matrix/user/home", true);
            }
        } else {
            $admin_name = mysql_real_escape_string($this->input->post('admin_username'));
            $u_user_name = mysql_real_escape_string($this->input->post('user_username'));
            $path = "../login/index/user/$admin_name/$u_user_name";

            $this->redirect("Invalid Username or Password", "$path", false);
        }
    }

    function check_database($password) {
        //print_r($this->input->post());
        $flag = false;
        //Field validation succeeded.  Validate against database
        $post = $this->input->post();
        $username = mysql_real_escape_string($this->input->post('user_name'));
        $password = mysql_real_escape_string($this->input->post('password'));
        $remember_me = $this->input->post('remember');



        $this->load->model('login_model', '', TRUE);
        //query the database
        $result = $this->login_model->login($username, $password);

        if ($result) {
            if ($remember_me == "yes") {
                $ip = $_SERVER['SERVER_ADDR'];
                $user_agent = $_SERVER['HTTP_USER_AGENT'];
                $salt = $this->getRand(4);
                $cookie_val = md5($salt + $username + $ip);
                setcookie("mlm_user_name:" . md5($username), $cookie_val, time() + (60 * 60 * 24 * 10));
                $this->login_model->upadetUserCookie($salt, $username, $cookie_val, $ip, $user_agent);
            }
            $this->login_model->setUserSessionDatas($result);
            $flag = true;
        } else {
            $flag = false;
        }
        return $flag;
    }

    function forgot_password() {
        $this->set("title", $this->COMPANY_NAME . " | Forgot Password");
        $this->ARR_SCRIPT[0]["name"] = "validate_forgot_reset.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";
        $this->setScripts();
        //echo $this->table_prefix;
        ////////////////////////// for language translation  ///////////////////////////////
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_forgot_password", $this->lang->line('forgot_password'));
        $this->set("tran_send_request", $this->lang->line('send_request'));
        $this->set("tran_invalid_user", $this->lang->line('Invalid_Username'));
        $this->set("tran_invalid_email", $this->lang->line('Invalid_email'));
        $this->set("tran_not_readable", $this->lang->line('not_readable'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_back", $this->lang->line('back'));

        //////////////////////////////////////////////////////////////////////////////////////////////
        $this->load->model('login_model', '', TRUE);
        if ($this->input->post("forgot_password_submit")) {
            $user_name = mysql_real_escape_string($this->input->post("user_name"));
            $user_id = $this->login_model->userNameToIdFromOut($user_name);
            $e_mail = mysql_real_escape_string($this->input->post("e_mail"));
            // echo $user_id;
            $check_result = $this->login_model->checkEmail($user_id, $e_mail);
            //echo $check_result;die();
            if ($check_result) {
                $key = $this->login_model->sendEmail($user_id, $e_mail);
                if ($key > 0) {
                    $this->redirect("Your request has been accepted we will send you confirmation mail please follow that instruction ", "../login", TRUE);
                } else {
                    $this->redirect('Email Failed.....', "../login", FALSE);
                }
            } else {
                $this->redirect('Invalid User Name or E-mail.....', "../login", FALSE);
            }
        }
        $this->setView();
    }

    function reset_password($resetkey = "") {
        $this->set("title", $this->COMPANY_NAME . " | Reset Password");
        //-------------------------for test
        /* $table_prefix = "26_";
          $this->db->set_dbprefix($table_prefix);
          $this->db->dbprefix($table_prefix);
          $this->table_prefix = $table_prefix; */
        //--------------------------
        $this->load->model('login_model', '', TRUE);
        $this->ARR_SCRIPT[0]["name"] = "validate_reset_pass.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->setScripts();
        ////////////////////////// for language translation  ///////////////////////////////
        $this->set("tran_reset_password", $this->lang->line('reset_password'));
        $this->set("tran_new_password", $this->lang->line('new_password'));
        $this->set("tran_confirm_password", $this->lang->line('confirm_password'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_you_must_enter_password", $this->lang->line('you_must_enter_password'));
        $this->set("tran_minimum_six_characters_required", $this->lang->line('minimum_six_characters_required'));
        $this->set("tran_you_must_enter_your_password_again", $this->lang->line('you_must_enter_your_password_again'));
        $this->set("tran_password_miss_match", $this->lang->line('password_miss_match'));
        $this->set("tran_not_readable", $this->lang->line('not_readable'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_back", $this->lang->line('back'));
        //////////////////////////////////////////////////////////////////////////////////////////////

        if ($this->input->post("reset_password_submit")) {
            $user_name = mysql_real_escape_string($this->input->post("user_name"));
            // echo $user_name;
            $user_id = $this->login_model->userNameToIdFromOut($user_name);

            $pass_word = mysql_real_escape_string($this->input->post("pass"));
            $confirm_pass = mysql_real_escape_string($this->input->post("confirm_pass"));
            $key = mysql_real_escape_string($this->input->post("key"));

            if ($pass_word == $confirm_pass) {
                $res = $this->login_model->updatePasswordOut($user_id, $pass_word, $key);
                if ($res) {
                    $this->redirect('Password Updated Successfully', "../login", true);
                } else
                    $this->redirect('Error On Reset Password...', "../login", true);
            }
        }
        else {
            $user_name = NULL;
            $id = NULL;
            if ($resetkey != "") {
                $user_arr = $this->login_model->getUserDetailFromKey($resetkey);
                $id = $user_arr[0];
                if ($id == "") {
                    $this->redirect('Invalid URL !!!!!', "../login", FALSE);
                }
                $user_name = $user_arr[1];
            } else {
                $this->redirect('Invalid URL!!!!!!', "../login", FALSE);
            }
        }
        $this->set("user_id", $id);
        $this->set("key", $resetkey);
        $this->set("user_name", $user_name);
        $this->setView();
    }

    /* function login_employee() {

      /////////////////////  CODE EDITED BY JIJI  //////////////////////////

      $title = $this->lang->line('login');
      $this->set("title", $this->COMPANY_NAME . " | $title");
      $this->ARR_SCRIPT[0]["name"] = "validate_register.js";
      $this->ARR_SCRIPT[0]["type"] = "js";
      $this->ARR_SCRIPT[0]["loc"] = "header";


      $this->setScripts();
      $this->setView();
      } */

    function login_employee() {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $title = $this->lang->line('login');
        $this->set("tran_back", $this->lang->line('back'));
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $is_logged_in = $this->checkSession();
        if ($is_logged_in) {
            $this->redirect("", 'home', true);
        }

        $this->ARR_SCRIPT[0]["name"] = "validate_register.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "login_employee.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";


        $this->setScripts();

        $this->setView();
    }

    /* function verify_employee_login() {

      /////////////////////  CODE EDITED BY JIJI  //////////////////////////

      $this->load->library('form_validation');

      $this->form_validation->set_rules('user_name', 'Username', 'trim|required|xss_clean|min_length[3]|max_length[30]|htmlentities');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[30]|callback_check_database_employee');

      $login_res = $this->form_validation->run();
      if ($login_res) {
      $mlm_plan = $this->session->userdata('mlm_plan');
      if ($mlm_plan == 'Binary' || $mlm_plan == 'Board')
      $this->redirect("", "home", true); //Field validation failed.  User redirected to login page
      else
      $this->redirect("", "../../matrix/user/home", true);
      } else {
      $this->redirect("Invalid Username or Password", "../login/login_employee", false);
      }
      }
     */

    function verify_employee_login() {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_name', 'Username', 'trim|required|xss_clean|min_length[3]|max_length[30]|htmlentities');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[30]|callback_check_database_employee');

        $login_res = $this->form_validation->run();
        if ($login_res) {
            $mlm_plan = $this->session->userdata('mlm_plan');
            if ($mlm_plan == 'Binary')
                $this->redirect("", "home", true);
            else
                $this->redirect("", "../../matrix/user/home", true);
        } else {
            $this->redirect("Invalid Username or Password", "login/login_employee", false);
        }
    }

    /* function check_database_employee($password) {

      /////////////////////  CODE EDITED BY JIJI  //////////////////////////
      $flag = false;
      //Field validation succeeded.  Validate against database
      $username = $this->input->post('user_name');
      $password = $this->input->post('password');

      $this->load->model('login_model', '', TRUE);
      //query the database
      $result = $this->login_model->login_employee($username, $password);
      if ($result) {
      $this->login_model->setUserSessionDatasEmployee($result);
      $flag = true;
      } else {
      $flag = false;
      }
      return $flag;
      }
     */

    function check_database_employee($password) {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        $flag = false;
        //Field validation succeeded.  Validate against database
        $username = mysql_real_escape_string($this->input->post('user_name'));
        $password = mysql_real_escape_string($this->input->post('password'));

        $this->load->model('login_model', '', TRUE);
        //query the database
        $result = $this->login_model->login_employee($username, $password);
        if ($result) {
            $this->login_model->setUserSessionDatasEmployee($result);
            $flag = true;
        } else {
            $flag = false;
        }
        return $flag;
    }

    function validate_login() {

        $this->load->model('validation', '', TRUE);
        $this->load->model('login_model', '', TRUE);
        $post_arr = $this->input->post();


        $user_name = mysql_real_escape_string($post_arr['user_name']);
        $pass = mysql_real_escape_string($post_arr['password']);

        $result = $this->login_model->isEmployeeLoginValid($user_name, $pass);
        echo $result;
        exit();
    }

    function captcha($type = "admin") {
        $this->login_model->CreateImage($type);
    }

    function load_pass() {
        $input_username = $this->input->post('username');
        $cookie_name = 'mlm_user_name:' . md5($input_username);
        if (isset($_COOKIE[$cookie_name])) {
            $ip = $_SERVER['SERVER_ADDR'];
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            $user_cookie_available = $this->login_model->getCookieDetails($_COOKIE[$cookie_name], $input_username, $ip, $user_agent);
            if ($user_cookie_available) {
                $result = $this->login_model->login($input_username, '', 'yes');
                if ($result) {
                    $salt = $this->getRand(4);
                    $cookie_val = md5($salt + $input_username + $ip);
                    setcookie($cookie_name, $cookie_val, time() + (60 * 60 * 24 * 10));
                    $this->login_model->upadetUserCookie($salt, $input_username, $cookie_val, $ip, $user_agent);
                    $this->login_model->setUserSessionDatas($result);
                }
                echo "yes";
            } else {
                echo "no";
            }
        } else {
            echo "cookie not set";
        }
    }

}

?>
