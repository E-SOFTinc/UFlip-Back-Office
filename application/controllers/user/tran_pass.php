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
        $help_link="send-transaction-password";
        $this->set("help_link",$help_link);

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

       
        $this->setScripts();

        ////////////////////////// code for language translation  //////////////////////////
        $this->set("tran_you_must_select_user_name", $this->lang->line('you_must_select_user'));
        $this->set("tran_send_transaction_password", $this->lang->line('send_transaction_password'));               
        $this->set("tran_send_password", $this->lang->line('send_password'));
        $this->set("tran_type_members_name", $this->lang->line('type_members_name'));
        $this->set("tran_transaction_password", $this->lang->line('transaction_password'));
        $this->set("tran_select_user_name", $this->lang->line('select_user_name'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_Transaction_Password", $this->lang->line('Transaction_Password'));
        $this->set("tran_Your_current_transaction_password", $this->lang->line('Your_current_transaction_password'));
        $this->set("tran_Thanking_you", $this->lang->line('Thanking_you'));
        $this->set("tran_dear", $this->lang->line('dear'));
        $this->set("page_top_header", $this->lang->line('send_transaction_password'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('send_transaction_password'));
        $this->set("page_small_header", "");
        
          ////////////////////////// code for language translation  //////////////////////////
       
        $msg = "";
        if ($this->input->post('sent_passcode')) {
            
            $user_id = $this->LOG_USER_ID;
            $user_name = $this->LOG_USER_NAME;
            $user_type = $this->LOG_USER_TYPE;
            

            $passcode = $this->tran_pass_model->getUserPasscode($user_id);
            if ($passcode != '') {
                $res = $this->tran_pass_model->sentTransactionPasscode($user_id, $passcode, $user_name);
            } else {
                $msg = $this->lang->line('you_dont_have_transaction_password');
                $this->redirect($msg, "tran_pass/send_transaction_passcode", false);
            }
            if ($res) {
                 $this->val->insertUserActivity($user_id,'send transaction password',$user_id,$user_type);
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
        $help_link="change-transaction-password";
        $this->set("help_link",$help_link);

        $this->ARR_SCRIPT[0]["name"] = "validate_change_passcode.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "ajax.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        

        $this->setScripts();
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_change_transaction_password", $this->lang->line('change_transaction_password'));
        $this->set("tran_current_transaction_password", $this->lang->line('current_transaction_password'));
        $this->set("tran_new_transaction_password", $this->lang->line('new_transaction_password'));
        $this->set("tran_reenter_new_transaction_password", $this->lang->line('reenter_new_transaction_password'));
        $this->set("tran_update", $this->lang->line('update'));

        $this->set("tran_you_must_enter_current_transaction_password", $this->lang->line('you_must_enter_current_transaction_password'));
        $this->set("tran_you_must_enter_new_transaction_password", $this->lang->line('you_must_enter_new_transaction_password'));
        $this->set("tran_transaction_password_length_should_be_more_than_8", $this->lang->line('transaction_password_length_should_be_more_than_8'));
        $this->set("tran_new_transaction_password_mismatch", $this->lang->line('new_transaction_password_mismatch'));
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("page_top_header", $this->lang->line('change_transaction_password'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('change_transaction_password'));
        $this->set("page_small_header", "");
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $user_id = $this->LOG_USER_ID;
        $user_name = $this->LOG_USER_NAME;
        $user_type = $this->LOG_USER_TYPE;
        $msg = "";
        if ($this->input->post('change')) {
           
            $post_arr = $this->validation->stripTagsPostArray($this->input->post());
            
            $new_passcode = $post_arr['new_passcode'];
            $re_passcode = $post_arr['re_new_passcode'];
            $old_passcode = $post_arr['old_passcode'];
            $passcode = $this->tran_pass_model->getUserPasscode($user_id);
            if (strlen($new_passcode) < 8) {
                $msg = $this->lang->line('transaction_password_shouldnt_be_less_than_8_characters');
                $this->redirect($msg, "tran_pass/change_passcode", false);
            }
            else if ($new_passcode != $re_passcode) {
                $msg = $this->lang->line('new_transaction_password_mismatch_try_again');
                $this->redirect($msg, "tran_pass/change_passcode", false);
            }
            else if ($old_passcode != $passcode) {
                $msg = $this->lang->line('your_current_transaction_password_is_incorrect');
                $this->redirect($msg, "tran_pass/change_passcode", false);
            }
            else
            {
                $res = $this->tran_pass_model->updatePasscode($user_id, $new_passcode, $passcode);
                if ($res) {
                    $result = $this->tran_pass_model->sentTransactionPasscode($user_id, $new_passcode, $user_name);
                    $this->val->insertUserActivity($user_id,'change transaction password',$user_id,$user_type);
                   
                    $msg = $this->lang->line('transaction_password_send_successfully');
                    $this->redirect($msg, "tran_pass/send_transaction_passcode", true);

                } else {
                    $msg = $this->lang->line('sorry_failed_to_update_try_again');
                    $this->redirect($msg, "tran_pass/change_passcode", false);
                }
            }
        }
        $this->setView();
    }
}