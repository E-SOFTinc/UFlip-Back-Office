<?php

require_once 'Inf_Controller.php';

class Mail extends Inf_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('validation');
        $this->val = new Validation();
    }

    function compose_mail() {

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
        if (preg_match("/([\w\-]+\:[\w\-]+)/", $reply_msg)) {

            $string = explode(":", $reply_msg);
            $reply_msg = $string[1];
        }
        $reply_msg = str_replace('%20', " ", $reply_msg);
        $reply_msg = trim($reply_msg);
        $this->set("reply_user", $reply_user);
        $this->set("reply_msg", $reply_msg);
        $this->set('user_name', $this->session->userdata('user_name'));
        $this->set('subject', $this->session->userdata('subject'));
////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_reply_mail", $this->lang->line('reply_mail'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_subject", $this->lang->line('subject'));
        $this->set("tran_message_to_send", $this->lang->line('message_to_send'));
        $this->set("tran_send_message", $this->lang->line('send_message'));

        $help_link = "reply_mail";
        $this->set("help_link", $help_link);

        $this->set("page_top_header", $this->lang->line('mail_management'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('mail_management'));
        $this->set("page_small_header", "");
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_you_must_select_user", $this->lang->line('you_must_select_user'));

        $this->set("tran_you_must_enter_subject_here", $this->lang->line('you_must_enter_subject_here'));
        $this->set("tran_you_must_enter_message_here", $this->lang->line('you_must_enter_message_here'));
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */ $user_type = $this->session->userdata['logged_in']['user_type'];
        $this->set("user_type", $user_type);

        if ($this->input->post('send')) {
            $post_array = $this->validation->stripTagsPostArray($this->input->post());
            $user_name = $post_array['user_id'];

            $subject = $post_array['subject'];
            $message = $post_array['message'];
            $user_id = $this->mail_model->userNameToId($user_name);
            $admin_username = $this->mail_model->getAdminUsername();
            $dt = date('Y-m-d H:i:s');
            if ($user_name == $admin_username) {
                $user_id = $this->session->userdata ['logged_in']['user_id'];
                $res = $this->mail_model->sendMesageToAdmin($user_id, $message, $subject, $dt);
            } else {
                $res = $this->mail_model->sendMessageToUser($user_id, $subject, $message, $dt);
            }
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

        $this->mail_model->updateUserOneMessage($msg_id);
        echo "OK";
        exit();
    }

    function deleteMessage($msg_id = "", $msg_type = "") {
        $this->AJAX_STATUS = true;
        $res = $this->mail_model->updateUserMessage($msg_id);
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
    function readMessage($msg_id = "", $msg_type = "") {
        $msg_id = $this->input->post('id');
        $msg_type = $this->input->post('type');

        $res = $this->mail_model->updateMsgStatus($msg_id);

        if ($res) {
            echo $res;
        }
    }

    //////////////////////

    function mail_management($tab = '') {
        $title = $this->lang->line('mail_management');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_mail_management.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "ajax.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "MailBox.js";
        $this->ARR_SCRIPT[2]["type"] = "js";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "custom.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "style-popup.css";
        $this->ARR_SCRIPT[4]["type"] = "css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->setScripts();

        $tab1 = " active";
        $tab2 = "";
        if ($tab == 'tab2') {
            $tab1 = "";
            $tab2 = " active";
        }

        $user_type = $this->LOG_USER_TYPE; //session->userdata['logged_in']['user_type'];
        $this->set('user_type', $user_type);
        $date = date('Y-m-d H:i:s');

        if ($this->input->post('usersend')) {
            $tab1 = "";
            $tab2 = " active";
            $this->session->set_userdata("mail_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2));
            $user_name = $this->LOG_USER_ID; //session->userdata['logged_in']['user_id'];
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

            $res = $this->mail_model->sendMesageToAdmin($user_name, $message, $subject, $date);
            $msg = "";
            if ($res) {
                $login_id = $this->session->userdata['logged_in']['user_id'];
                $this->val->insertUserActivity('12345', 'send mail', $login_id);
                $msg = $this->lang->line('message_send_successfully');
                $this->redirect($msg, "mail/mail_management", TRUE);
            } else {
                $msg = $this->lang->line('error_on_message_sending');
                $this->redirect($msg, "mail/mail_management", FALSE);
            }
        } $this->set("tran_subject", $this->lang->line('subject'));
        $this->set("tran_messagetoadmin", $this->lang->line('Message_to_Admin'));
        $this->set("tran_sendmessage", $this->lang->line('send_message'));
        $this->set("tran_compose_mail", $this->lang->line('compose_mail'));
        $this->set("tran_compose_mail_user", $this->lang->line('compose_mail_user'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_user_message", $this->lang->line('user_message'));
        $this->set("reply", $this->lang->line('reply'));
        $this->set("close", $this->lang->line('close'));
        $this->set("tran_All_Users", $this->lang->line('All_Users'));
        $this->set("tran_mail_management", $this->lang->line('mail_management'));
        $this->set("tran_you_must_select_user", $this->lang->line('you_must_select_user'));
        $this->set("tran_you_must_enter_subject_here", $this->lang->line('you_must_enter_subject_here'));
        $this->set("tran_you_must_enter_message_here", $this->lang->line('you_must_enter_message_here'));
        $this->set("tran_You_have_no_mails_in_inbox", $this->lang->line('You_have_no_mails_in_inbox'));

        /*         * *********************************Inbox start ****************************** */
        $this->set("tran_inbox", $this->lang->line('inbox'));
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $user_type = $this->session->userdata ['logged_in']['user_type'];
        $admin_id = $this->mail_model->getAdminId();
        $admin_username = $this->mail_model->getAdminUsername();
        $this->set('user_id', $user_id);
        $this->set('user_type', $user_type);
        $this->set('admin_id', $admin_id);

////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */ $this->set("tran_inbox", $this->lang->line('inbox'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_from", $this->lang->line('from'));
        $this->set("tran_subject", $this->lang->line('subject'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_action", $this->lang->line('action'));

        $this->set("tran_admin", $admin_username);
        $this->set("tran_mail_details", $this->lang->line('mail_details'));
        $this->set("tran_Sure_you_want_to_Delete_There_is_NO_undo", $this->lang->line('Sure_you_want_to_Delete_There_is_NO_undo'));
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */ $this->set("page_top_header", $this->lang->line('mail_management'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('mail_management'));
        $this->set("page_small_header", "");
        $help_link = "mail-management";
        $this->set("help_link", $help_link);
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $base_url = base_url() . "user/mail/mail_management";
        $config[
                'base_url'] = $base_url;

        $config['per_page'] = 200;
        $config['uri_segment'] = 4;
        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;
        $this->set("page", $page);
        $res = $this->mail_model->getUserMessages($user_id, $page, $config['per_page']);
        $row = $res->result_array();

        $numrows = $this->mail_model->getCountUserMessages($user_id);
        $config['total_rows'] = $numrows;
        $this->pagination->initialize($config);
        $result_per_page = $this->pagination->create_links();
        $this->set("result_per_page", $result_per_page);

        $i = 0;
        $c = 0;
        $user_name_arr = array();
        while ($i < count($row)) {
            $user_name_arr[$c] = $row[$i];
            $user_name_arr[$c]['user_name'] = $this->mail_model->idToUserName($row[$i]['mailtoususer']);
            $i++;
            $c++;
        }

        $this->set("row", $row);
        $cnt_row = count($row);
        $this->set("cnt_row", $cnt_row);
        $this->set("user_name_arr", $user_name_arr);
        $this->set("num_rows", $c);
        /*         * **************************************Inbox End************************ */
        if ($this->session->userdata("mail_tab_active_arr")) {
            $tab1 = $this->session->userdata['mail_tab_active_arr']['tab1'];
            $tab2 = $this->session->userdata['mail_tab_active_arr']['tab2'];
            //$this->session->unset_userdata("mail_tab_active_arr");
        }
        $this->set("tab1", $tab1);
        $this->set("tab2", $tab2);
        $this->setView();
    }
    function ticket_system($tab = '') {

        $title = 'Ticket Management';
        $this->set("title", $this->COMPANY_NAME . " | $title");


        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";


        $this->ARR_SCRIPT[1]["name"] = "misc.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";


        $this->ARR_SCRIPT[2]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[2]["type"] = "plugins/css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[3]["type"] = "plugins/css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[4]["type"] = "plugins/js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[5]["type"] = "plugins/js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[6]["type"] = "plugins/js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "table-data.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "MailBox.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "MailBox.js";
        $this->ARR_SCRIPT[9]["type"] = "js";
        $this->ARR_SCRIPT[9]["loc"] = "header";

        $this->ARR_SCRIPT[10]["name"] = "custom.js";
        $this->ARR_SCRIPT[10]["type"] = "js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->ARR_SCRIPT[11]["name"] = "style-popup.css";
        $this->ARR_SCRIPT[11]["type"] = "css";
        $this->ARR_SCRIPT[11]["loc"] = "header";

        $this->ARR_SCRIPT[12]["name"] = "jquery.tinyscrollbar.min.js";
        $this->ARR_SCRIPT[12]["type"] = "js";
        $this->ARR_SCRIPT[12]["loc"] = "footer";

        $this->ARR_SCRIPT[13]["name"] = "validate_mail_management.js";
        $this->ARR_SCRIPT[13]["type"] = "js";
        $this->ARR_SCRIPT[13]["loc"] = "footer";

        $this->setScripts();

        $tab1 = " active";
        $tab2 = "";
        $tab3 = "";

        if ($tab == 'tab2') {
            $tab1 = "";
            $tab2 = " active";
            $tab3 = "";
        }if ($tab == 'tab3') {
            $tab1 = "";
            $tab2 = "";
            $tab3 = " active";
        }

        $user_type = $this->LOG_USER_TYPE;
        $this->set('user_type', $user_type);
        $admin_username = $this->mail_model->getAdminUsername();
        $this->load->model('ticket_model');
        if ($this->input->post('usersend')) {

            $ticket['trackid'] = $this->ticket_model->createTicketId();

            $tab1 = "";
            $tab2 = " active";
            $tab3 = "";
            $tab4 = "";
            $this->session->set_userdata("mail_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2, "tab3" => $tab3, "tab4" => $tab4));

            $user_name = $this->LOG_USER_ID;
            $post_arr = $this->validation->stripTagsPostArray($this->input->post());
            $subject = $post_arr['subject'];
            $message = $post_arr['message'];
            $ticket['subject'] = $post_arr['subject'];
            $ticket['user_id'] = $this->LOG_USER_ID;
            $ticket['message'] = $post_arr['message'];
            $ticket['category'] = $post_arr['category'];
            $ticket['priority'] = $post_arr['priority'];
            $doc_file_name = "";
            if ($subject == "" || $message == "") {
                $msg = $this->lang->line('enter_mandatory_fields');
                $this->redirect($msg, "mail/ticket_system", FALSE);
            } else {
                $file_details['saved_name'] = "";

                $document1 = $_FILES['upload_doc']['name'];
                if ($document1) {
                    $upload_doc = 'upload_doc';
                    $config['upload_path'] = 'public_html/images';
                    $config['allowed_types'] = 'jpg|png|jpeg|JPG|gif';
                    $config['max_size'] = '2000000';
                    $this->load->library('upload', $config);
                    $msg = '';

                    if ($this->upload->do_upload($upload_doc)) {
                        $file_arr = $this->upload->data();
                        $file_details['original_name'] = $file_arr['orig_name'];
                        $file_details['saved_name'] = $file_arr['file_name'];
                        $file_details['file_size'] = $file_arr['file_size'];

                        $data = array('upload_data' => $this->upload->data());
                        $config1['upload_path'] = '../ticket_system/attachments';

                        $config1['allowed_types'] = 'jpg|png|jpeg|JPG|gif';
                        $config1['max_size'] = '2000000';
                        $this->load->library('upload', $config1);
                        $this->upload->initialize($config1);
                        if ($this->upload->do_upload($upload_doc)) {
                            $data = array('upload_data' => $this->upload->data());
                            $doc_file_name = $data['upload_data']['file_name'];
                            $msg = "Uploaded and ";
                        } else {
                            $msg = $this->upload->display_errors();
                            $this->redirect($msg, "mail/view_ticket_details/$ticket_id", FALSE);
                        }
                    } else {
                        $msg = $this->upload->display_errors();
                        $this->redirect($msg, "mail/view_ticket_details/$ticket_id", FALSE);
                    }
                }
            }

            $ticket['file_name'] = $doc_file_name;
            $this->ticket_model->createNewTicket($ticket);
            $details = $this->ticket_model->getTicketData($ticket['trackid'], $this->LOG_USER_ID);
            $dt = date('Y-m-d H:i:s');
            $msg = "";




            if ($document1)
                $res1 = $this->ticket_model->insertIntoAttachment($ticket['trackid'], $file_details, $doc_file_name);
            if ($document1) {
                if ($res1)
                    $doc_file_name = $res1 . "#" . $doc_file_name;
            }
            $res = $this->ticket_model->replyTicket($details, $ticket['message'], $ticket['user_id'], $doc_file_name);
            if ($res) {
                $login_id = $this->session->userdata['logged_in']['user_id'];
                $this->val->insertUserActivity('12345', 'send mail', $login_id);
                $msg = "Ticket Created Successfully Your Ticket ID: " . $ticket['trackid'];
                $this->redirect($msg, "mail/ticket_system", TRUE);
            } else {
                $msg = $this->lang->line('error_on_message_sending');
                $this->redirect($msg, "mail/ticket-system", FALSE);
            }
        }

        $this->set("ticket_count", 0);
        $ticket_arr = array();

        if ($this->input->post('view')) {
            $login_id = $this->session->userdata['logged_in']['user_id'];
            $tab1 = "";
            $tab2 = "";
            $tab3 = " active";
            $tab4 = "";
            $ticket_id = $this->input->post('ticket');
            if (!$ticket_id) {
                $msg = "Please enter Ticket ID";
                $this->redirect($msg, "mail/ticket_system", FALSE);
            }

            $ticket_arr = $this->ticket_model->getTicketData($ticket_id, $login_id);
            if (!$ticket_arr) {
                $msg = "Invalid Ticket ID";
                $this->redirect($msg, "mail/view_ticket_details", FALSE);
            }
            $this->set("ticket_arr", $ticket_arr);
            $this->set("ticket_count", count($ticket_arr));
            $msg = "";
            $this->redirect($msg, "mail/view_ticket_details/$ticket_id", FALSE);
        }

        $this->set("tran_subject", $this->lang->line('subject'));
        $this->set("tran_messagetoadmin", $this->lang->line('Message_to_Admin'));
        $this->set("tran_sendmessage", $this->lang->line('send_message'));
        $this->set("tran_compose_mail", $this->lang->line('compose_mail'));
        $this->set("tran_compose_mail_user", $this->lang->line('compose_mail_user'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_user_message", $this->lang->line('user_message'));
        $this->set("tran_All_Users", $this->lang->line('All_Users'));
        $this->set("tran_mail_management", 'Ticket Management');
        $this->set("tran_you_must_select_user", $this->lang->line('you_must_select_user'));
        $this->set("tran_you_must_enter_subject_here", $this->lang->line('you_must_enter_subject_here'));
        $this->set("tran_you_must_enter_message_here", $this->lang->line('you_must_enter_message_here'));
        $this->set("tran_inbox", $this->lang->line('inbox'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_from", $this->lang->line('from'));
        $this->set("tran_subject", $this->lang->line('subject'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_admin", $this->lang->line('admin'));
        $this->set("tran_mail_details", $this->lang->line('mail_details'));
        $this->set("close", $this->lang->line('close'));
        $this->set("reply", $this->lang->line('reply'));
        $this->set("tran_Sure_you_want_to_Delete_There_is_NO_undo", $this->lang->line('Sure_you_want_to_Delete_There_is_NO_undo'));
        $user_id = $this->LOG_USER_ID;
        $user_type = $this->LOG_USER_TYPE;
        $admin_id = $this->mail_model->getAdminId();
        $this->set('user_id', $user_id);
        $this->set('user_type', $user_type);
        $this->set('admin_id', $admin_id);
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", 'Ticket Management');
        $this->set("page_top_small_header", "");
        $this->set("page_header", 'Ticket Management');
        $this->set("page_small_header", "");

        $help_link = "mail-management";
        $this->set("help_link", $help_link);
        $this->set("tran_inbox", $this->lang->line('inbox'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_from", $this->lang->line('from'));
        $this->set("tran_subject", $this->lang->line('subject'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_admin", $admin_username);
        $this->set("tran_You_have_no_mails_in_inbox", $this->lang->line('You_have_no_mails_in_inbox'));
        $this->set("tran_mail_details", $this->lang->line('mail_details'));
        $this->set("tran_Select_A_file", $this->lang->line('Select_A_file'));
        $this->set("tran_Change", $this->lang->line('Change'));
        $this->set("tran_kb", $this->lang->line('kb'));
        $this->set("tran_Allowed_types_are_gif_jpg_png_jpeg_JPG", "Allowed type jpeg|png|gif");
        $this->set("tran_Sure_you_want_to_Delete_There_is_NO_undo", $this->lang->line('Sure_you_want_to_Delete_There_is_NO_undo'));

        $base_url = base_url() . "user/mail/mail_management";
        $config['base_url'] = $base_url;
        $config['per_page'] = 200;
        $config["uri_segment"] = 4;
        $config['num_links'] = 5;

        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;
        $this->set("page", $page);
        $res = $this->mail_model->getUserMessages($user_id, $page, $config['per_page']);
        $this->load->model('ticket_model');
        $row = $this->ticket_model->getTicketData('', $this->session->userdata['logged_in']['user_id']);
        $numrows = $this->mail_model->getCountUserMessages($user_id);
        $config['total_rows'] = $numrows;
        $this->pagination->initialize($config);
        $result_per_page = $this->pagination->create_links();
        $this->set("result_per_page", $result_per_page);

        $i = 0;
        $c = 0;
        $user_name_arr = array();
        $category_arr = $this->mail_model->getTicketsCategories();
        $this->set("category_arr", $category_arr);
        $this->set("row", $row);
        $cnt_row = count($row);
        $this->set("cnt_row", $cnt_row);
        $this->set("user_name_arr", $user_name_arr);
        $this->set("num_rows", $c);
        if ($this->session->userdata("mail_tab_active_arr")) {
            $tab1 = $this->session->userdata['mail_tab_active_arr']['tab1'];
            $tab2 = $this->session->userdata['mail_tab_active_arr']['tab2'];
            $tab3 = $this->session->userdata['mail_tab_active_arr']['tab3'];
            $this->session->unset_userdata("mail_tab_active_arr");
        }
        $this->set("tab1", $tab1);
        $this->set("tab2", $tab2);
        $this->set("tab3", $tab3);
        $this->setView();
    }
    
    function view_ticket_details($ticket_id = '') {

        $title = $this->lang->line('support_center');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "messages.css";
        $this->ARR_SCRIPT[1]["type"] = "css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "ajax.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "header";


        $this->ARR_SCRIPT[4]["name"] = "misc.js";
        $this->ARR_SCRIPT[4]["type"] = "js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";


        $this->ARR_SCRIPT[5]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[5]["type"] = "plugins/css";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[6]["type"] = "plugins/css";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[7]["type"] = "plugins/js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[8]["type"] = "plugins/js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[9]["type"] = "plugins/js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        $this->ARR_SCRIPT[10]["name"] = "table-data.js";
        $this->ARR_SCRIPT[10]["type"] = "js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->ARR_SCRIPT[11]["name"] = "MailBox.js";
        $this->ARR_SCRIPT[11]["type"] = "js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";
        $this->ARR_SCRIPT[12]["name"] = "MailBox.js";
        $this->ARR_SCRIPT[12]["type"] = "js";
        $this->ARR_SCRIPT[12]["loc"] = "header";

        $this->ARR_SCRIPT[13]["name"] = "custom.js";
        $this->ARR_SCRIPT[13]["type"] = "js";
        $this->ARR_SCRIPT[13]["loc"] = "footer";

        $this->ARR_SCRIPT[14]["name"] = "style-popup.css";
        $this->ARR_SCRIPT[14]["type"] = "css";
        $this->ARR_SCRIPT[14]["loc"] = "header";

        $this->ARR_SCRIPT[15]["name"] = "website.css";
        $this->ARR_SCRIPT[15]["type"] = "css";
        $this->ARR_SCRIPT[15]["loc"] = "header";

        $this->ARR_SCRIPT[16]["name"] = "jquery.tinyscrollbar.min.js";
        $this->ARR_SCRIPT[16]["type"] = "js";
        $this->ARR_SCRIPT[16]["loc"] = "footer";

        $this->ARR_SCRIPT[17]["name"] = "validate_mail_management.js";
        $this->ARR_SCRIPT[17]["type"] = "js";
        $this->ARR_SCRIPT[17]["loc"] = "footer";

        $this->ARR_SCRIPT[18]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.css";
        $this->ARR_SCRIPT[18]["type"] = "plugins/css";
        $this->ARR_SCRIPT[18]["loc"] = "header";

        $this->ARR_SCRIPT[19]["name"] = "bootstrap-social-buttons/social-buttons-3.css";
        $this->ARR_SCRIPT[19]["type"] = "plugins/css";
        $this->ARR_SCRIPT[19]["loc"] = "header";

        $this->ARR_SCRIPT[19]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.js";
        $this->ARR_SCRIPT[19]["type"] = "plugins/js";
        $this->ARR_SCRIPT[19]["loc"] = "footer";
        $this->setScripts();



        $user_type = $this->LOG_USER_TYPE;
        $this->set('user_type', $user_type);
        $admin_username = $this->mail_model->getAdminUsername();

        $subjects = $this->mail_model->getSubjects();
        $this->set('subjects', $subjects);
        $cat_arr = $this->mail_model->getCategory();
        $this->set("cat_arr", $cat_arr);
        $this->load->model('ticket_model');

        $this->set("ticket_count", 0);
        $ticket_arr = array();

        $tab1 = "";
        $tab2 = "";
        $tab4 = "";
        $tab3 = "active";
        if (!$ticket_id) {
            $msg = "Please enter Ticket ID";
            $this->redirect($msg, "mail/ticket_system", FALSE);
        }

        $ticket_arr = $this->ticket_model->getTicketData($ticket_id, $this->session->userdata['logged_in']['user_id']);
        $ticket_reply = $this->ticket_model->getAllReply($ticket_arr['details0']['id']);
        $this->ticket_model->readTicket($ticket_arr['details0']['id']);
        $tick_count = count($ticket_reply);
        $admin_name = $this->mail_model->obj_val->getAdminUsername();
        for ($i = 0; $i < $tick_count; $i++) {
            $file = $ticket_reply["$i"]['file'];
            $file = $this->getBetween($file, '#', ',');
            $ticket_reply["$i"]['file'] = $file;
        }
        $this->set("ticket_reply", $ticket_reply);
        $this->set("cnt_row", count($ticket_reply));
        if (!$ticket_arr) {
            $msg = "Invalid Ticket ID";
            $this->redirect($msg, "mail/support_center", FALSE);
        }
        $this->set("ticket_arr", $ticket_arr);
        $this->set("ticket_count", count($ticket_arr));


        if ($this->input->post('reply')) {
            $category = $this->input->post('category');
            $ticket_id = $this->input->post('ticket_id');
            $message = $this->input->post('message');
            if (!$message) {
                $msg = "Please enter a message";
                $this->redirect($msg, "mail/view_ticket_details/" . $ticket_id, FALSE);
            }
            $msg = '';
            $document1 = $_FILES['upload_doc']['name'];
            $doc_file_name = '';
            $file_details = array();
            if ($document1) {
                $upload_doc = 'upload_doc';
                $config['upload_path'] = 'public_html/images';
                $config['allowed_types'] = 'jpg|png|jpeg|JPG|gif';
                $config['max_size'] = '2000000';
                $this->load->library('upload', $config);



                if ($this->upload->do_upload($upload_doc)) {
                    $file_arr = $this->upload->data();
                    $file_details['original_name'] = $file_arr['orig_name'];
                    $file_details['saved_name'] = $file_arr['file_name'];
                    $file_details['file_size'] = $file_arr['file_size'];

                    $data = array('upload_data' => $this->upload->data());
                    $config1['upload_path'] = '../ticket_system/attachments';

                    $config1['allowed_types'] = 'jpg|png|jpeg|JPG|gif';
                    $config1['max_size'] = '2000000';
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if ($this->upload->do_upload($upload_doc)) {
                        $data = array('upload_data' => $this->upload->data());
                        $doc_file_name = $data['upload_data']['file_name'];
                        $msg = "Uploaded and ";
                    } else {
                        $msg = $this->upload->display_errors();
                        $this->redirect($msg, "mail/view_ticket_details/$ticket_id", FALSE);
                    }
                } else {
                    $msg = $this->upload->display_errors();
                    
                    $this->redirect($msg, "mail/view_ticket_details/$ticket_id", FALSE);
                }
            }
            $user_id = $this->session->userdata['logged_in']['user_id'];
            $ticket_arr = $this->ticket_model->getTicketData($ticket_id, $user_id);
            if ($document1)
                $res1 = $this->ticket_model->insertIntoAttachment($ticket_id, $file_details, $doc_file_name);
            if ($document1) {
                if ($res1)
                    $doc_file_name = $res1 . "#" . $doc_file_name;
            }
            $res = $this->ticket_model->replyTicket($ticket_arr, $message, $user_id, $doc_file_name);



            if ($res) {
                $msg = $msg . "Reply Sent";
                $this->redirect($msg, "mail/view_ticket_details/$ticket_id", TRUE);
            }
        }
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_category", $this->lang->line('category'));
        $this->set("tran_priority", 'Priority');
        $this->set("tran_subject", $this->lang->line('subject'));
        $this->set("tran_submit_ticket", "Submit Ticket");
        $this->set("tran_message", $this->lang->line('message'));
        $this->set("tran_attachment", $this->lang->line('attachment'));
        $this->set("tran_messagetoadmin", $this->lang->line('Message_to_Admin'));
        $this->set("tran_sendmessage", $this->lang->line('send_message'));
        $this->set("tran_compose_message", $this->lang->line('compose_message'));
        $this->set("tran_compose_mail_user", $this->lang->line('compose_mail_user'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_kb", $this->lang->line('kb'));
        $this->set("tran_sent_messages", $this->lang->line('sent_messages'));
        $this->set("tran_Allowed_types_are_gif_jpg_png_jpeg_JPG", $this->lang->line('Allowed_types_are_gif_jpg_png_jpeg_JPG'));
        $this->set("tran_user_message", $this->lang->line('user_message'));
        $this->set("tran_All_Users", $this->lang->line('All_Users'));
        $this->set("tran_select_type", $this->lang->line('select_type'));
        $this->set("tran_support_center", $this->lang->line('support_center'));
        $this->set("tran_you_must_select_user", $this->lang->line('you_must_select_user'));
        $this->set("tran_you_must_enter_subject_here", $this->lang->line('you_must_enter_subject_here'));
        $this->set("tran_you_must_enter_message_here", $this->lang->line('you_must_enter_message_here'));
        $this->set("tran_You_have_no_messages", $this->lang->line('You_have_no_messages'));
        $this->set("tran_inbox", $this->lang->line('inbox'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_from", $this->lang->line('from'));
        $this->set("tran_to", $this->lang->line('to'));
        $this->set("tran_subject", $this->lang->line('subject'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_admin", $this->lang->line('admin'));
        $this->set("tran_message_details", $this->lang->line('message_details'));
        $this->set("close", $this->lang->line('close'));
        $this->set("reply", $this->lang->line('reply'));
        $this->set("tran_Sure_you_want_to_Delete_There_is_NO_undo", $this->lang->line('Sure_you_want_to_Delete_There_is_NO_undo'));
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $user_type = $this->session->userdata['logged_in']['user_type'];
        $admin_id = $this->mail_model->getAdminId();
        $this->set('user_id', $user_id);
        $this->set('user_type', $user_type);
        $this->set('admin_id', $admin_id);
        $this->set("tran_attachment", $this->lang->line('attachment'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('support_center'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('support_center'));
        $this->set("page_small_header", "");

        $help_link = "mail-management";
        $this->set("help_link", $help_link);
        $this->set("tran_inbox", $this->lang->line('inbox'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_from", $this->lang->line('from'));
        $this->set("tran_subject", $this->lang->line('subject'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_admin", $admin_username);
        $this->set("tran_You_have_no_mails_in_inbox", $this->lang->line('You_have_no_mails_in_inbox'));
        $this->set("tran_mail_details", $this->lang->line('mail_details'));
        $this->set("tran_Sure_you_want_to_Delete_There_is_NO_undo", $this->lang->line('Sure_you_want_to_Delete_There_is_NO_undo'));

        $base_url = base_url() . "user/mail/support_center";
        $config['base_url'] = $base_url;
        $config['per_page'] = 200;
        $config["uri_segment"] = 4;
        $config['num_links'] = 5;

        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;
        $this->set("page", $page);
        $this->setView();
    }

    public function getBetween($content, $start, $end) {
        $r = explode($start, $content);
        if (isset($r[1])) {
            $r = explode($end, $r[1]);
            return $r[0];
        }
        return '';
    }
    public function markResolved($ticket_id){
    $this->load->model('ticket_model');
    $res=$this->ticket_model->markedAsResolved($ticket_id);
    if($res){
        $msg = "Resolved";
        $this->redirect($msg, "mail/ticket_system", TRUE);
    }
    
    }

}

?>