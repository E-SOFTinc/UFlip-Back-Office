<?php

require_once 'Inf_Controller.php';

class Password extends Inf_Controller {

    function __construct() {
        parent::__construct();  
        $this->load->model('validation');
        $this->val = new Validation();
        
    }

    function change_password() {
        $title = $this->lang->line('change_password');
        $this->set("title", $this->COMPANY_NAME . " | $title");


        $this->ARR_SCRIPT[0]["name"] = "validate_change_password.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->setScripts();
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_current_password", $this->lang->line('current_password'));
        $this->set("tran_new_password", $this->lang->line('new_password'));
        $this->set("tran_confirm_password", $this->lang->line('confirm_password'));
        $this->set("tran_change_password", $this->lang->line('change_password'));
        $this->set("tran_you_must_enter_new_password", $this->lang->line('you_must_enter_new_password'));
        $this->set("tran_the_password_length_should_be_greater_than_6", $this->lang->line('the_password_length_should_be_greater_than_6'));
        $this->set("tran_you_must_enter_your_current_password", $this->lang->line('you_must_enter_your_current_password'));
        $this->set("tran_special_chars_not_allowed", $this->lang->line('special_chars_not_allowed'));
        $this->set("tran_you_must_enter_your_new_password_again", $this->lang->line('you_must_enter_your_new_password_again'));
        $this->set("tran_password_mismatch", $this->lang->line('password_mismatch'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('change_password'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('change_password'));
        $this->set("page_small_header", "");
        
        $help_link="change-password";
        $this->set("help_link",$help_link);
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */


        //Function start for change password
        $user_type = $this->LOG_USER_TYPE;
        $user_id = $this->LOG_USER_ID;

        $this->set("user_type", $user_type);
        $user_name = $this->LOG_USER_NAME;

        if ($this->input->post('change_pass_button_admin')) {

            $post_arr = $this->validation->stripTagsPostArray($this->input->post());
            // print_r($post_arr['current_pwd_admin']."aaa");

            $id = mysql_real_escape_string($user_id);
            $current_pwd = mysql_real_escape_string(md5($post_arr['current_pwd_admin']));
            $val = $this->validate_pswd($post_arr['new_pwd_admin']);
            if ($val) {
                $new_pwd = mysql_real_escape_string(md5($post_arr['new_pwd_admin']));
                //now validating the username and password
                $pass_arr = $this->password_model->selectPassword($id, $user_type);
                $dbpassword = $pass_arr['dbpassword'];
                $cnt = $pass_arr['cnt'];
                //if username not exists
                if ($cnt == 0)
                    echo "<script>alert('Incorrect login.');</script>";
                else {
                    //compare the password
                    if (strcmp($dbpassword, $current_pwd) == 0 && strlen($post_arr['new_pwd_admin']) >= 6) {
                        $update = $this->password_model->updatePassword($new_pwd, $id, "", $user_type);
                        if ($update) {
                            //=========================
                            $password = $this->password_model->getPassword($id);
                            if ($password != '') {
                                $res = $this->password_model->sentPassword($id, $password, $user_name);
                            }
                            /* if($res)
                              {
                              echo "<script>alert('Incorrect login.');</script>";
                              } */

                            //=========================
                             $this->val->insertUserActivity($user_id,'change password',$user_id);
                            $msg = $this->lang->line('password_updated_successfully');
                            $this->redirect($msg, "password/change_password", TRUE);
                        } else {
                            $msg = $this->lang->line('error_on_password_updation');
                            $this->redirect($msg, "password/change_password", FALSE);
                        }
                    } else {
                        $msg = $this->lang->line('your_current_password_is_incorrect_or_new_password_is_too_short');
                        $this->redirect($msg, "password/change_password", FALSE);
                    }
                }
            } else {
                $msg = $this->lang->line('special_chars_not_allowed');
                $this->redirect($msg, "password/change_password", FALSE);
            }
        }
        $this->setView();
    }

    function ajax_users_auto() {
        $this->AJAX_STATUS = true;
        $letters = $this->URL['letters'];
        $letters = preg_replace("/[^a-z0-9 ]/si", "", $letters);
        $str = $this->password_model->selectUser($letters);
        echo $str;
    }

    function forgot_password() {
        $this->ARR_SCRIPT[0]["name"] = "validate_forgot_reset.js";
        $this->ARR_SCRIPT[0]["type"] = "js";

        $this->setScripts();

        if (isset($_POST["forgot_password_submit"])) {
            $user_name = $_POST["user_name"];
            $user_id = $this->password_model->userNameToIdFromOut($user_name);
            $e_mail = $_POST["e_mail"];
            $check_result = $this->password_model->checkEmail($user_id, $e_mail);
            if ($check_result) {
                $key = $this->password_model->sendEmail($user_id, $e_mail);
                if ($key > 0) {
                    //$this->redirect("Your request has been accepted we will send you confirmation mail please follow that instruction ", "password/forgot_password",TRUE);
                    echo"<script>alert('Your request has been accepted we will send you confirmation mail please follow that instruction');</script>";
                    echo"<script>document.localtion.href='" . PATH_ROOT . "password/forgot_password';</script>";
                }
            }//IF ENDS [ if($check_result) ]
            else {
                //$this->redirect("INVALID USER NAME OR E-MAIL!!!!", "password/forgot_password",FALSE);
                echo"<script>alert('INVALID USER NAME OR E-MAIL!!!!');</script>";
                echo"<script>document.localtion.href='" . PATH_ROOT . "password/forgot_password';</script>";
            }//ELSE ENDS [ if($check_result) ]
        }//IF ENDS [  if(isset ($_POST["forgot_password_submit"])) ]        
    }

    function reset_password() {
        if (isset($_POST["reset_password_submit"])) {
            $user_name = $_POST["user_name"];
            $user_id = $this->password_model->userNameToIdFromOut($user_name);
            $pass_word = $_POST["pass"];
            $confirm_pass = $_POST["confirm_pass"];
            $key = $_POST["key"];

            if ($pass_word == $confirm_pass) {
                $res = $this->password_model->updatePasswordOut($user_id, $pass_word, $key);
                if ($res) {
                    // $this->redirect("PASSWORD UPDATED SUCCESSFULLY!!!", "",TRUE);
                    echo"<script>alert('PASSWORD UPDATED SUCCESSFULLY!!!');</script>";
                    echo"<script>document.localtion.href='" . PATH_ROOT . "';</script>";
                }//IF ENDS [ if($res) ]
            }//IF ENDS [ if($pass_word == $confirm_pass) ]
        }//IF ENDS [ if(isset($_POST["reset_password_submit"])) ]

        if ($this->URL["resetkey"] != "") {
            $resetkey = $this->URL["resetkey"];
            $user_arr = $this->password_model->getUserDetailFromKey($resetkey);
            $id = $user_arr[0];
            if ($id == "") {
                //$this->redirect("INVALID URL !!!!", "",TRUE);
                echo"<script>alert('INVALID URL!!!!');</script>";
                echo"<script>document.localtion.href='" . PATH_ROOT . "';</script>";
            }//IF ENDS [ if($id != "") ]
            $user_name = $user_arr[1];
            $this->set("user_name", $user_name);
            $this->set("user_id", $id);
            $this->set("key", $resetkey);

            $this->ARR_SCRIPT[0]["name"] = "validate_forgot_reset.js";
            $this->ARR_SCRIPT[0]["type"] = "js";

            $this->setScripts();
        }//IF ENDS [ if($this->URL["resetkey"] !="" ) ]
        else {
            //$this->redirect("INVALID URL !!!!",   "",TRUE);
            echo"<script>alert('INVALID URL!!!!');</script>";
            echo"<script>document.localtion.href='" . PATH_ROOT . "';</script>";
        }//ELSE ENDS [ if($this->URL["resetkey"] !="" ) ]
    }

    function validate_pswd($password) {
        if (!preg_match('/^[a-z0-9A-Z _~\-!@#\$%\^&\*\(\)?,.:<>|\\+\/\[\]{}\'";`~=]*$/', $password)) {

            return false;
        }
        else
            return true;
    }

}

?>
