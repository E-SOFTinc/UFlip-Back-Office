<?php

require_once 'Inf_Controller.php';

class tran_pass extends Inf_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('validation');
        $this->val = new Validation();
    }

    function send_transaction_passcode() {

        $title = $this->lang->line('send_transaction_password');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "validate_reset_pass.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->setScripts();

        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_send_transaction_password", $this->lang->line('send_transaction_password'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_you_must_select_user_name", $this->lang->line('you_must_select_user'));
        $this->set("tran_send_password", $this->lang->line('send_password'));
        $this->set("tran_type_members_name", $this->lang->line('type_members_name'));
        $this->set("tran_transaction_password", $this->lang->line('transaction_password'));
        $this->set("tran_select_user_name", $this->lang->line('select_user_name'));
        $this->set("tran_Transaction_Password", $this->lang->line('Transaction_Password'));
        $this->set("tran_Your_current_transaction_password", $this->lang->line('Your_current_transaction_password'));
        $this->set("tran_Thanking_you", $this->lang->line('Thanking_you'));
        $this->set("tran_dear", $this->lang->line('dear'));
        $this->set("page_top_header", $this->lang->line('send_transaction_password'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('send_transaction_password'));
        $this->set("page_small_header", "");
        $help_link = "send-transaction-password";
        $this->set("help_link", $help_link);
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */

        $msg = "";
        if ($this->input->post('sent_passcode')) {
            $user_name = mysql_real_escape_string($this->input->post('user_name'));
            $user_id = $this->val->userNameToID($user_name);
            if (!$user_id) {
                $msg = $this->lang->line('invalid_user_name');
                $this->redirect($msg, "tran_pass/send_transaction_passcode", false);
            }

            
            $passcode = $this->tran_pass_model->getUserPasscode($user_id);
            if ($passcode != '') {               
              
              $res = $this->tran_pass_model->sentTransactionPasscode($user_id, $passcode, $user_name);
            } else {
                $msg = $this->lang->line('you_dont_have_transaction_password');
                $this->redirect($msg, "tran_pass/send_transaction_passcode", false);
            }
            if ($res) {
                $this->val->insertUserActivity($user_id, 'send transaction password', $user_id);
                $msg = $this->lang->line('transaction_password_send_successfully');
                $this->redirect($msg, "tran_pass/send_transaction_passcode", true);
            } else {
                $msg = $this->lang->line('error_on_sending_transaction_password');
                $this->redirect($msg, "tran_pass/send_transaction_passcode", false);
            }
        }

        $this->setView();
    }

    function change_passcode() {
        $title = $this->lang->line('change_transaction_password');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "ajax.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "validate_change_passcode.js";
        $this->ARR_SCRIPT[4]["type"] = "js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";


        $this->setScripts();
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_change_transaction_password", $this->lang->line('change_transaction_password'));
        $this->set("tran_current_transaction_password", $this->lang->line('current_transaction_password'));
        $this->set("tran_new_transaction_password", $this->lang->line('new_transaction_password'));
        $this->set("tran_reenter_new_transaction_password", $this->lang->line('reenter_new_transaction_password'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_change_user_transaction_password", $this->lang->line('change_user_transaction_password'));
        $this->set("tran_select_user_name", $this->lang->line('select_user_name'));
        $this->set("tran_new_password", $this->lang->line('new_password'));
        $this->set("tran_reenter_new_password", $this->lang->line('reenter_new_password'));
        $this->set("tran_you_must_enter_current_transaction_password", $this->lang->line('you_must_enter_current_transaction_password'));
        $this->set("tran_you_must_enter_new_transaction_password", $this->lang->line('you_must_enter_new_transaction_password'));
        $this->set("tran_transaction_password_length_should_be_more_than_8", $this->lang->line('transaction_password_length_should_be_more_than_8'));
        $this->set("tran_new_transaction_password_mismatch", $this->lang->line('new_transaction_password_mismatch'));
        $this->set("tran_you_must_select_a_username", $this->lang->line('you_must_select_a_username'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('change_transaction_password'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('change_transaction_password'));
        $this->set("page_small_header", "");
        $help_link = "change-transaction-password";
        $this->set("help_link", $help_link);
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */

        $user_id = $this->LOG_USER_ID;
        $user_type = $this->LOG_USER_TYPE;
        $this->set("user_type", $user_type);
        $user_name = $this->LOG_USER_NAME;
        $msg = "";
        if($user_type=='employee'){
            $tab2 = " active";
            $tab1="";
        }
        else{
        $tab1 = " active";
        $tab2 = "";
        }
        if ($this->input->post('change_tran')) {
            $tab1 = " active";
            $tab2 = "";
            $this->session->set_userdata("tranpass_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2));
            $old_passcode = mysql_real_escape_string($this->input->post('old_passcode'));
            $new_passcode = mysql_real_escape_string($this->input->post('new_passcode'));
            $re_new = mysql_real_escape_string($this->input->post('re_new_passcode'));
            $passcode = $this->tran_pass_model->getUserPasscode($user_id);


            if (!$old_passcode) {
                $msg = $this->lang->line('you_must_enter_current_transaction_password');
                $this->redirect($msg, "tran_pass/change_passcode", FALSE);
            }    
            else if ($old_passcode != $passcode) {
                $msg = $this->lang->line('your_current_transaction_password_is_incorrect');
                $this->redirect($msg, "tran_pass/change_passcode", FALSE);
            }      
            else if (!$new_passcode) {
                $msg = $this->lang->line('you_must_enter_new_transaction_password');
                $this->redirect($msg, "tran_pass/change_passcode", FALSE);
            }                    
            else if (strlen($new_passcode) < 8) {
                $msg = $this->lang->line('transaction_password_shouldnt_be_less_than_8_characters');
                $this->redirect($msg, "tran_pass/change_passcode", FALSE);
            }                        
            else if (!$re_new) {
                $msg = $this->lang->line('reenter_new_transaction_password');
                $this->redirect($msg, "tran_pass/change_passcode", FALSE);
            }
            else if ($new_passcode != $re_new) {
                $msg = $this->lang->line('new_transaction_password_mismatch_try_again');
                $this->redirect($msg, "tran_pass/change_passcode", FALSE);
            }
            else
            {
                $res = $this->tran_pass_model->updatePasscode($user_id, $new_passcode, $passcode);
                if ($res) {
                    $result = $this->tran_pass_model->sentTransactionPasscode($user_id, $new_passcode, $user_name);
                    $this->val->insertUserActivity($user_id, 'change transaction password', $user_id,$user_type);
                    $msg = $this->lang->line('transaction_password_updated_successfully');
                    $this->redirect($msg, "tran_pass/change_passcode", TRUE);
                } else {
                    $msg = $this->lang->line('sorry_failed_to_update_try_again');
                    $this->redirect($msg, "tran_pass/change_passcode", FALSE);
                }
            }                        
        }
        if ($this->input->post('change_user')) {
            $tab1 = "";
            $tab2 = " active";
            $this->session->set_userdata("tranpass_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2));
            $u_name = mysql_real_escape_string($this->input->post('user_name'));
            $u_id = $this->val->userNameToID($u_name);
            if($u_id)
            {
               $usr_type = $this->val->getUserType($u_id);
            }
            $admin_id = $this->tran_pass_model->obj_vali->getAdminId();
            $new_passcode_user = mysql_real_escape_string($this->input->post('new_passcode_user'));
            $re_new_passcode_user = mysql_real_escape_string($this->input->post('re_new_passcode_user'));

            if (!$u_id) {
                $msg = $this->lang->line('invalid_user_name');
                $this->redirect($msg, "tran_pass/change_passcode", FALSE);
            }
            else if (!$new_passcode_user) {
                $msg = $this->lang->line('you_must_enter_new_transaction_password');
                $this->redirect($msg, "tran_pass/change_passcode", FALSE);
            }
            else if (!$re_new_passcode_user) {
                $msg = $this->lang->line('reenter_new_transaction_password');
                $this->redirect($msg, "tran_pass/change_passcode", FALSE);
            }
            else if (strlen($new_passcode_user) < 8) {
                $msg = $this->lang->line('transaction_password_shouldnt_be_less_than_8_characters');
                $this->redirect($msg, "tran_pass/change_passcode", FALSE);
            }
            else if ($usr_type=="admin") {
                $msg = $this->lang->line("You_cant_change_admin_transaction_password");
                $this->redirect($msg, "tran_pass/change_passcode", FALSE);
            }
            else if ($re_new_passcode_user != $new_passcode_user) {
                $msg = $this->lang->line('new_transaction_password_mismatch_try_again');
                $this->redirect($msg, "tran_pass/change_passcode", FALSE);
            }
            else
            {
                $res = $this->tran_pass_model->updatePasscode($u_id, $new_passcode_user);
                if ($res) {
                    $result = $this->tran_pass_model->sentTransactionPasscode($u_id, $new_passcode_user, $u_name);
                    $this->val->insertUserActivity($u_id, 'change transaction password', $user_id,$user_type);
                    $msg = $this->lang->line('transaction_password_send_successfully');
                    $this->redirect($msg, "tran_pass/change_passcode", true);

                } else {
                    $msg = $this->lang->line('sorry_failed_to_update_try_again');
                    $this->redirect($msg, "tran_pass/change_passcode", FALSE);
                }
            } 
        }
        if ($this->session->userdata("tranpass_tab_active_arr")) {
            $tab1 = $this->session->userdata['tranpass_tab_active_arr']['tab1'];
            $tab2 = $this->session->userdata['tranpass_tab_active_arr']['tab2'];
            $this->session->unset_userdata("tranpass_tab_active_arr");
        }
        $this->set("tab1", $tab1);
        $this->set("tab2", $tab2);
        $this->setView();
    }
}