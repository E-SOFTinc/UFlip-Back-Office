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

        $this->ARR_SCRIPT[0]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "validate_change_password.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "ajax.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        
        $this->setScripts();
        // $this->session->unset_userdata("pass_tab1");
        //$this->session->unset_userdata("pass_tab2");
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_change_password", $this->lang->line('change_password'));
        $this->set("tran_change_admin_password", $this->lang->line('change_admin_password'));
        $this->set("tran_current_password", $this->lang->line('current_password'));
        $this->set("tran_new_password", $this->lang->line('new_password'));
        $this->set("tran_confirm_password", $this->lang->line('confirm_password'));
        $this->set("tran_change_user_password", $this->lang->line('change_user_password'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_you_must_enter_new_password", $this->lang->line('you_must_enter_new_password'));
        $this->set("tran_the_password_length_should_be_greater_than_6", $this->lang->line('the_password_length_should_be_greater_than_6'));
        $this->set("tran_you_must_enter_your_current_password", $this->lang->line('you_must_enter_your_current_password'));
        $this->set("tran_you_must_enter_your_new_password_again", $this->lang->line('you_must_enter_your_new_password_again'));
        $this->set("tran_password_mismatch", $this->lang->line('password_mismatch'));
        $this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_you_must_enter_your_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_you_must_enter_your_new_password", $this->lang->line('you_must_enter_your_new_password'));
        $this->set("tran_you_must_enter_your_confirm_password", $this->lang->line('you_must_enter_your_confirm_password'));
        $this->set("tran_special_chars_not_allowed", $this->lang->line('special_chars_not_allowed'));
        $this->set("page_top_header", $this->lang->line('change_password'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('change_password'));
        $this->set("page_small_header", "");
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */

        //Set the supported script for generate epin
        //Function start for change password

        $help_link="change-password";
        $this->set("help_link",$help_link);
        
        $user_type = $this->LOG_USER_TYPE;
        $user_id = $this->LOG_USER_ID;
        $this->load->model('validation');
        if($user_type=='employee'){ 
                $user_id=$this->validation->getAdminId();
                //$u_name=$this->validation->getAdminUsername();
                }
        $table_prefix = $this->password_model->table_prefix;
        $user_ref_id = str_replace("_", "", $table_prefix);
        $this->set("user_type", $user_type);
        $msg = "";
        if($user_type=='employee'){
            $tab2 = " active";
            $tab1 = "";
        }
        else{
        $tab1 = " active";
        $tab2 = "";
        }
        ///admin password......
        if ($this->input->post('change_pass_button_admin')) {
            $tab1 = " active";
            $tab2 = "";
            $this->session->set_userdata("pass_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2));
            $id = mysql_real_escape_string($user_id);
            if ($this->input->post('current_pwd_admin')) {
                $current_pwd = mysql_real_escape_string(md5($this->input->post('current_pwd_admin')));
                if ($this->input->post('new_pwd_admin')) {
                    $val = $this->validate_pswd($this->input->post('new_pwd_admin'));
                    if ($val) {
                        $new_pwd = mysql_real_escape_string(md5($this->input->post('new_pwd_admin')));
                        $cf_pwd = mysql_real_escape_string(md5($this->input->post('confirm_pwd_admin')));
                    } else {
                        $msg = $this->lang->line('special_chars_not_allowed');
                        $this->redirect($msg, "password/change_password", FALSE);
                    }
                } else {
                    $msg = $this->lang->line('you_must_enter_new_password');
                    $this->redirect($msg, "password/change_password", FALSE);
                }
            } else {
                $msg = $this->lang->line('you_must_enter_your_current_password');
                $this->redirect($msg, "password/change_password", FALSE);
            }

            //now validating the username and password
            $pass_arr = $this->password_model->selectPassword($id, $user_type);
            $dbpassword = $pass_arr['dbpassword'];
            $cnt = $pass_arr['cnt'];
            //if username not exists
            if ($cnt == 0)
                echo "<script>alert('Incorrect login.');</script>";
            else {
                //compare the password
                if (strcmp($dbpassword, $current_pwd) == 0 && strlen($this->input->post('new_pwd_admin')) >= 6) {
                    if (strcmp($new_pwd, $cf_pwd) == 0) {
                        $update = $this->password_model->updatePassword($new_pwd, $id, "", $user_type, $user_ref_id);
                        if ($update) {
                           
                            $this->val->insertUserActivity($user_id,'password change',$user_id);
                            $msg = $this->lang->line('password_updated_successfully');
                            $this->redirect($msg, "password/change_password", TRUE);
                        } else {
                            $msg = $this->lang->line('error_on_password_updation');
                            $this->redirect($msg, "password/change_password", FALSE);
                        }
                    } else {
                        $msg = $this->lang->line('password_mismatch');
                        $this->redirect($msg, "password/change_password", FALSE);
                    }
                } else {
                    $msg = $this->lang->line('your_current_password_is_incorrect_or_new_password_is_too_short');
                    $this->redirect($msg, "password/change_password", FALSE);
                }
            }
        }
        //admin passwod ends
        //user password in admin end
        if ($this->input->post('change_pass_button_common')) {
            $tab1 = "";
            $tab2 = " active";
            $this->session->set_userdata("pass_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2));
            if ($this->input->post('user_name_common') != "") {
                $id_user = mysql_real_escape_string($this->input->post('user_name_common'));
                
                $user=$this->val->userNameToID($id_user);
                if ($this->input->post('new_pwd_common') && $this->input->post('confirm_pwd_common')) {
                    $val = $this->validate_pswd($this->input->post('new_pwd_common'));
                    if ($val) {
                        $new_pwd_user = mysql_real_escape_string(md5($this->input->post('new_pwd_common')));
                        $cf_pwd_user = mysql_real_escape_string(md5($this->input->post('confirm_pwd_common')));
                    } else {
                        $msg = $this->lang->line('special_chars_not_allowed');
                        $this->redirect($msg, "password/change_password", FALSE);
                    }
                    $id = "";
                    if (strlen($this->input->post('new_pwd_common')) >= 6 && $this->password_model->isUserNameAvailable($id_user)) {
                        if (strcmp($new_pwd_user, $cf_pwd_user) == 0) {
                            $actual_pwd = mysql_real_escape_string($this->input->post('new_pwd_common'));
                            $admin_id = $this->password_model->OBJ_VAL->getAdminId();
                            $sub_user_id = $this->password_model->OBJ_VAL->userNameToID($id_user);
                            if ($admin_id != $sub_user_id) {
                                $update = $this->password_model->updatePassword($new_pwd_user, $id, $id_user);
                                if ($update) {
                                    //=========================
                                    //$password = $this->password_model->getPassword($sub_user_id);
                                    if ($actual_pwd) {
                                        
                                      //  $res = $this->val->sentPassword($sub_user_id, $password, $id_user);
                                      $res = $this->password_model->sentPassword($sub_user_id, $actual_pwd, $id_user);
                                    }

                                    //=========================
                                    $login_id = $this->LOG_USER_ID;
                                    $this->val->insertUserActivity($user,'password change',$login_id);
                                    $msg = $this->lang->line('password_updated_successfully');
                                    $this->redirect($msg, "password/change_password", TRUE);
                                } else {
                                    $msg = $this->lang->line('error_on_password_updation');
                                    $this->redirect($msg, "password/change_password", FALSE);
                                }
                            } else {
                                $msg = $this->lang->line("You_cant_change_admin_password");
                                $this->redirect($msg, "password/change_password", FALSE);
                            }
                        } else {
                            $msg = $this->lang->line('password_mismatch');
                            $this->redirect($msg, "password/change_password", FALSE);
                        }
                    } else {
                        $msg = $this->lang->line("Invalid_UserName_or_new_password_is_too_short");
                        $this->redirect($msg, "password/change_password", FALSE);
                    }
                } else {
                    $msg = $this->lang->line('you_must_enter_new_password');
                    $this->redirect($msg, "password/change_password", FALSE);
                }
            } else {
                $msg = $this->lang->line('You_must_enter_user_name');
                $this->redirect($msg, "password/change_password", FALSE);
            }
        }
        //=============for tab setting

        if ($this->session->userdata("pass_tab_active_arr")) {
            $tab1 = $this->session->userdata['pass_tab_active_arr']['tab1'];
            $tab2 = $this->session->userdata['pass_tab_active_arr']['tab2'];
            $this->session->unset_userdata("pass_tab_active_arr");
        }
        $this->set("tab1", $tab1);
        $this->set("tab2", $tab2);
        $this->setView();
    }

    function ajax_users_auto() {
        $this->AJAX_STATUS = true;
        $letters = $this->URL['letters'];
        $letters = preg_replace("/[^a-z0-9 ]/si", "", $letters);
        $str = $this->password_model->selectUser($letters);
        echo $str;
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