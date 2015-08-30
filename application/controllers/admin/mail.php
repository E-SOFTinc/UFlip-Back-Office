<?php

require_once 'Inf_Controller.php';

class Mail extends Inf_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('validation');
        $this->val = new Validation();
    }

    function compose_mail() {

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[3]["name"] = "ajax.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->setScripts();

        $user_type = $this->LOG_USER_TYPE;
        $this->set('user_type', $user_type);
        $sender_id = $this->LOG_USER_ID;
        $date = date('Y-m-d H:i:s');
        $tab1 = " active";
        $tab2 = "";
        if ($this->input->post('adminsend')) {
            $tab1 = "";
            $tab2 = " active";
            $this->session->set_userdata("mail_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2));

            $mail_status = $this->input->post('mail_status');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message1');
            if ($mail_status == 'multiple') {
                $user_name_arr = $this->input->post('user_id');
                $user = $this->val->userNameToID($user_name_arr);
                $user_name_exp = explode(",", $user_name_arr);

                $msg = "";
                for ($i = 0; $i < count($user_name_exp); $i++) {
                    $user_name = $user_name_exp[$i];
                    $user_id = $this->mail_model->userNameToId($user_name);

                    if ($user_id == 0) {
                        $msg = $this->lang->line('invalid_user_name');
                        $this->redirect($msg, "mail/mail_management", FALSE);
                    } else {
                        $admin_username = $this->mail_model->getAdminUsername();
                        if ($user_name == $admin_username)
                            $res = $this->mail_model->sendMesageToAdmin($user_id, $message, $subject, $date);
                        else
                            $res = $this->mail_model->sendMessageToUser($user_id, $subject, $message, $date, $sender_id);
                    }
                }
            }
            else if ($mail_status == 'all') {
                $user_name_exp = $this->mail_model->getUsers();

                for ($i = 0; $i < count($user_name_exp); $i++) {
                    $user_id = $user_name_exp[$i];
                    $res = $this->mail_model->sendMessageToUser($user_id, $subject, $message, $date, $sender_id);
                }
            }
            $this->set("tab1", $this->session->userdata("mail_tab1"));
            $this->set("tab2", $this->session->userdata("mail_tab2"));
            //echo $this->session->userdata("mail_tab2");die();
            if ($res) {
                $login_id = $this->LOG_USER_ID;
                if ($mail_status == 'all')
                    $this->val->insertUserActivity('All', 'message send', $login_id);
                if ($mail_status != 'all')
                    $this->val->insertUserActivity($user, 'message send', $login_id);
                $msg = $this->lang->line('message_send_successfully');
                $this->redirect($msg, "mail/mail_management", TRUE);
            } else {
                $msg = $this->lang->line('error_on_message_sending');
                $this->redirect($msg, "mail/mail_management", FALSE);
            }
        }


        $this->setView();
    }

    function inbox() {


        $this->setView();
        //////////////////////////for pagination///////////////
    }

    function reply_mail($reply_user = "", $reply_msg = "") {

        $title = $this->lang->line('reply_mail');
        $this->set("title", $this->COMPANY_NAME . " | $title");
       
        
        $this->ARR_SCRIPT[0]["name"] = "validate_mail_management.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";


        $this->setScripts();
        $this->set('user_name', $this->session->userdata('user_name'));
        $this->set('subject', $this->session->userdata('subject'));
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_reply_mail", $this->lang->line('reply_mail'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_subject", $this->lang->line('subject'));
        $this->set("tran_message_to_send", $this->lang->line('message_to_send'));
        $this->set("tran_send_message", $this->lang->line('send_message'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_you_must_enter_subject_here", $this->lang->line('you_must_enter_subject_here'));
        $this->set("tran_you_must_enter_message_here", $this->lang->line('you_must_enter_message_here'));
        $this->set("tran_you_must_select_user", $this->lang->line('you_must_select_user'));
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */

        $this->set("page_top_header", $this->lang->line('mail_management'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('reply_mail'));
        $this->set("page_small_header", "");
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $user_type = $this->LOG_USER_TYPE;
        $this->set("user_type", $user_type);
        $this->set("reply_user", $reply_user);
        $help_link = "mail-management";
        $this->set("help_link", $help_link);

        if (preg_match("/([\w\-]+\:[\w\-]+)/", $reply_msg)) {
            $string = explode(":", $reply_msg);
            $reply_msg = $string[1];
        }
        $reply_msg = str_replace('%20', " ", $reply_msg);
        $reply_msg = trim($reply_msg);
        $this->set("reply_msg", $reply_msg);
        if ($this->input->post('send')) {
            $user_name = $this->input->post('user_id1');

            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            $user_id = $this->mail_model->userNameToId($user_name);
            $date = date('Y-m-d H:i:s');
            $admin_username = $this->mail_model->getAdminUsername();
            if ($user_name == $admin_username) {
                $user_id = $this->LOG_USER_ID;
                $res = $this->mail_model->sendMesageToAdmin($user_id, $message, $subject, $date);
            }
            else
                $res = $this->mail_model->sendMessageToUser($user_id, $subject, $message, $date);
            $msg = "";
            if ($res) {
                $msg = $this->lang->line('message_send_successfully');
                $this->redirect($msg, "mail/mail_management", TRUE);
            } else {
                $msg = $this->lang->line('error_on_message_sending');
                $this->redirect($msg, "mail/reply_mail", FALSE);
            }
        }
        $this->setView();
    }

    function getMessage($msg_id, $user_id, $user_type) {

        $this->mail_model->updateAdminOneMessage($msg_id);
        echo "OK";
        exit();
    }

    function deleteMessage($msg_id = "", $msg_type = "") {
        $this->AJAX_STATUS = true;
        if ($msg_type == 'admin') {
            $res = $this->mail_model->updateAdminMessage($msg_id);
        }
        $msg = "";
        if ($res) {
            $msg = $this->lang->line('message_deleted_successfully');
            $this->redirect($msg, "mail/mail_management", TRUE);
        } else {
            $msg = $this->lang->line('message_deletion_failed');
            $this->redirect($msg, "mail/mail_management", FALSE);
        }
    }

    /////////////////////// changes status of read message
    function readMessage() {
        $msg_id = $this->input->post('id');
        $msg_type = $this->input->post('type');
        if ($msg_type == 'admin') {
            $res = $this->mail_model->updateMsgStatus($msg_id);
        }
        $msg = "";
        if ($res) {
            echo $res;
        }
    }

    function reply_mail_name($user = '') {
        echo $user;
    }

    //////////////////////

    function mail_management($tab = '') {
        $title = $this->lang->line('mail_management');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->ARR_SCRIPT[0]["name"] = "validate_mail.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "ajax.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "MailBox.js";
        $this->ARR_SCRIPT[4]["type"] = "js";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "custom.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "style-popup.css";
        $this->ARR_SCRIPT[6]["type"] = "css";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "validate_mail_management.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->setScripts();


        $tab1 = " active";
        $tab2 = "";
        if ($tab == 'tab2') {
            $tab1 = "";
            $tab2 = " active";
        }

        $user_type = $this->LOG_USER_TYPE;
        $this->set('user_type', $user_type);
        $sender_id = $this->LOG_USER_ID;
        $this->set('user_id', $sender_id);

        if ($this->input->post('adminsend')) {
            $mail_status = $this->input->post('mail_status');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            if ($mail_status == 'multiple') {
                $user_name_arr = $this->input->post('user_id');
                $user_name_exp = explode(",", $user_name_arr);

                $msg = "";
                for ($i = 0; $i < count($user_name_exp); $i++) {
                    $user_name = $user_name_exp[$i];
                    $user_id = $this->mail_model->userNameToId($user_name);
                    if ($user_id == 0) {
                        $msg = $this->lang->line('invalid_user_name');
                        $this->redirect($msg, "mail/compose_mail", FALSE);
                    } else {
                        $dt = date('Y-m-d H:i:s');
                        if ($user_name == 'admin') {
                            $res = $this->mail_model->sendMesageToAdmin($user_id, $message, $subject, $dt);
                        } else {
                            $res = $this->mail_model->sendMessageToUser($user_id, $subject, $message, $dt, $sender_id);
                        }
                    }
                }
            } else if ($mail_status == 'all') {
                $user_name_exp = $this->mail_model->getUsers();
                $dt = date('Y-m-d H:i:s');
                for ($i = 0; $i < count($user_name_exp); $i++) {
                    $user_id = $user_name_exp[$i];
                    $res = $this->mail_model->sendMessageToUser($user_id, $subject, $message, $dt, $sender_id);
                }
            }

            if ($res) {
                $msg = $this->lang->line('message_send_successfully');
                $this->redirect($msg, "mail/compose_mail", TRUE);
            } else {
                $msg = $this->lang->line('error_on_message_sending');
                $this->redirect($msg, "mail/compose_mail", FALSE);
            }
        }


        $this->set("tran_subject", $this->lang->line('subject'));
        $this->set("tran_messagetoadmin", $this->lang->line('Message_to_Admin'));
        $this->set("tran_sendmessage", $this->lang->line('send_message'));
        $this->set("tran_compose_mail", $this->lang->line('compose_mail'));
        $this->set("tran_compose_mail_user", $this->lang->line('compose_mail_user'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_user_message", $this->lang->line('user_message'));
        $this->set("tran_Send_Mail_To", $this->lang->line('Send_Mail_To'));
        $this->set("tran_All_Users", $this->lang->line('All_Users'));
        $this->set("tran_Single_User", $this->lang->line('Single_User'));
        $this->set("tran_mail_management", $this->lang->line('mail_management'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("reply", $this->lang->line('reply'));
        $this->set("close", $this->lang->line('close'));
        $this->set("page_top_header", $this->lang->line('mail_management'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('mail_management'));
        $this->set("page_small_header", "");
        $this->set("tran_you_must_select_user", $this->lang->line('you_must_select_user'));
        $this->set("tran_you_must_enter_subject_here", $this->lang->line('you_must_enter_subject_here'));
        $this->set("tran_you_must_enter_message_here", $this->lang->line('you_must_enter_message_here'));
        /*         * *********************************Inbox start ****************************** */
        $help_link = "mail-management";
        $this->set("help_link", $help_link);

        $this->set("tran_inbox", $this->lang->line('inbox'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_from", $this->lang->line('from'));
        $this->set("tran_subject", $this->lang->line('subject'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_admin", $this->lang->line('admin'));
        $this->set("tran_mail_details", $this->lang->line('mail_details'));
        $this->set("tran_Sure_you_want_to_Delete_There_is_NO_undo", $this->lang->line('Sure_you_want_to_Delete_There_is_NO_undo'));
        $this->set("tran_You_have_no_mails_in_inbox", $this->lang->line('You_have_no_mails_in_inbox'));
        $admin_id = $this->mail_model->getAdminId();
        $this->set('admin_id', $admin_id);

        if ($user_type == "admin") {


            ///////////////////////////////////// pagination //////////////////////////////////////
            $base_url = base_url() . "admin/mail/mail_management";
            $config['base_url'] = $base_url;

            $config['per_page'] = 200;
            $config["uri_segment"] = 4;
            $config['num_links']=5;
            if ($this->uri->segment(4) != "")
                $page = $this->uri->segment(4);
            else
                $page = 0;
            $this->set("page", $page);
            $adminmsgs = $this->mail_model->getAdminMessages($page, $config['per_page']);
            $cnt_adminmsgs = count($adminmsgs);
            $this->set('cnt_adminmsgs',$cnt_adminmsgs);

            $numrows = $this->mail_model->getCountAdminMessages();
            $config['total_rows'] = $numrows;
            $this->pagination->initialize($config);

            $result_per_page = $this->pagination->create_links();
            $this->set("result_per_page", $result_per_page);
            /////////////////////////////////////////////////////////////

            $c = 0;
            $user_name_arr = "";
            $count = count($adminmsgs);
            while ($c < $count) {
                $user_name_arr[$c]['user_name'] = $this->mail_model->idToUserName($adminmsgs[$c]['mailaduser']);
                $c++;
            }
            $this->set("adminmsgs", $adminmsgs);
            $this->set("user_name_arr", $user_name_arr);
            $this->set("num_rows", $numrows);
        }
        /*         * **************************************Inbox End************************ */
        if ($this->session->userdata("mail_tab_active_arr")) {
            $tab1 = $this->session->userdata['mail_tab_active_arr']['tab1'];
            $tab2 = $this->session->userdata['mail_tab_active_arr']['tab2'];
            $this->session->unset_userdata("mail_tab_active_arr");
        }
        $this->set("tab1", $tab1);
        $this->set("tab2", $tab2);
        $this->setView();
    }
     function ticket_system() {
       $table_prefix = $_SESSION['table_prefix'];
       header("Location: ../../../ticket_system/admin/index.php?a=ad_min&b=$table_prefix");
   }

}

?>