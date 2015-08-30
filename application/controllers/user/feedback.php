<?php

require_once 'Inf_Controller.php';

class feedback extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function feedback_view($action = '', $delete_id = '') {

        $user_name = $this->LOG_USER_NAME;
        $user_id = $this->LOG_USER_ID;
        $this->set("user_name", $user_name);
        $help_link = "feedback";
        $this->set('help_link',$help_link);
        $msg = "";
        if ($action == "delete") {

            $result = $this->feedback_model->deleteFeedback($delete_id);
            if ($result) {
                $msg = $this->lang->line('feedback_deleted_successfully');
                $this->redirect($msg, "feedback/feedback_view", TRUE);
            } else {
                $msg = $this->lang->line('error_on_deleting_feedback');
                $this->redirect($msg, "feedback/feedback_view", FALSE);
            }
        }

        if ($this->input->post('feedback_submit')) {
//            $feedback_user=$this->input->post('feedback_user');
//            $feed_name = $this->input->post('visitors_name');
            $feed_company = $this->input->post('company');
            $feed_phone = $this->input->post('phone_no');
            $feed_time = $this->input->post('time_to_call');
            $feed_email = $this->input->post('email');
           
            $feed_comment = $this->input->post('comments');

            $res = $this->feedback_model->addFeedback($user_id, $feed_company, $feed_phone, $feed_time, $feed_email, $feed_comment);
            if ($res) {
                $msg = $this->lang->line('feed_back_added_successfully');
                $this->redirect($msg, "feedback/feedback_view", TRUE);
            } else {
                $msg = $this->lang->line('feed_back_failed');
                $this->redirect($msg, "feedback/feedback_view", FALSE);
            }
        }

        $this->ARR_SCRIPT[0]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "validate_feed.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "validate_feedback.js";
        $this->ARR_SCRIPT[2]["type"] = "js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

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

        $this->ARR_SCRIPT[11]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[11]["type"] = "plugins/css";
        $this->ARR_SCRIPT[11]["loc"] = "header";

        $this->ARR_SCRIPT[12]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[12]["type"] = "plugins/css";
        $this->ARR_SCRIPT[12]["loc"] = "header";

        $this->ARR_SCRIPT[13]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[13]["type"] = "plugins/js";
        $this->ARR_SCRIPT[13]["loc"] = "footer";

        $this->ARR_SCRIPT[14]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[14]["type"] = "plugins/js";
        $this->ARR_SCRIPT[14]["loc"] = "footer";

        
        $this->setScripts();

        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_feedback_from_visitors", $this->lang->line('feedback_from_visitors'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_feedback_view", $this->lang->line('feedback_view'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_visitors_name", $this->lang->line('visitors_name'));
        $this->set("tran_company", $this->lang->line('company'));
        $this->set("tran_phone_no", $this->lang->line('phone_no'));
        $this->set("tran_time_to_call", $this->lang->line('time_to_call'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_comments", $this->lang->line('comments'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_no_feedback_found", $this->lang->line('no_feedback_found'));
        $this->set("tran_delete", $this->lang->line('delete'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_sure_you_want_to_delete_this_feedback_there_is_no_undo", $this->lang->line('sure_you_want_to_delete_this_feedback_there_is_no_undo'));
        $this->set("tran_please_entr_your_name", $this->lang->line('please_entr_your_name'));
        $this->set("tran_you_must_enter_the_user_name", $this->lang->line('you_must_enter_the_user_name'));
        $this->set("tran_please_enter_your_company_name", $this->lang->line('please_enter_your_company_name'));
        $this->set("tran_please_type_your_phone_no", $this->lang->line('please_type_your_phone_no'));
        $this->set("tran_please_type_your_time_to_call", $this->lang->line('please_type_your_time_to_call'));
        $this->set("tran_you_have_entered_invalid_time", $this->lang->line('you_have_entered_invalid_time'));
        $this->set("tran_please_type_your_e_mail_id", $this->lang->line('please_type_your_e_mail_id'));
        $this->set("tran_you_have_entered_an_invalid_email_id", $this->lang->line('you_have_entered_an_invalid_email_id'));
        $this->set("tran_please_type_your_comments", $this->lang->line('please_type_your_comments'));
        $this->set("tran_feedback_details", $this->lang->line('feedback_details'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('feedback_view'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('feedback_view'));
        $this->set("page_small_header", "");
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $feedback = $this->feedback_model->getAllUserfeedback($user_id);
        
        $this->set("feedback", $feedback);
        $title = $this->lang->line('feedbacks');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->setView();
    }

}

?>