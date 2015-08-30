<?php

require_once 'Inf_Controller.php';

class Sms extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    public function send_sms() {

        $this->ARR_SCRIPT[0]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.css";
        $this->ARR_SCRIPT[0]["type"] = "plugins/css";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "bootstrap-social-buttons/social-buttons-3.css";
        $this->ARR_SCRIPT[1]["type"] = "plugins/css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.js";
        $this->ARR_SCRIPT[2]["type"] = "plugins/js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "jquery.pulsate/jquery.pulsate.min.js";
        $this->ARR_SCRIPT[3]["type"] = "plugins/js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[4]["type"] = "css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "validate_sms.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "send_sms.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "jquery.wordcount.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";
        $this->setScripts();

        $select = $this->sms_model->echoAllUserSms('Select', 'Select User');
        $first_id = $this->sms_model->echoAllUserSms('Selectfirstid', 'First id');
        $last_id = $this->sms_model->echoAllUserSms('Selectlastid', 'Last id');
        $title = $this->lang->line('send_sms');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->set("select", $select);
        $this->set("first_id", $first_id);
        $this->set("last_id", $last_id);
        if ($this->input->post('upload'))
            $this->set("upload", '1');
        else
            $this->set("upload", '0');

        $this->set("tran_upload_excel_files", $this->lang->line('upload_excel_files'));
        $this->set("tran_upload", $this->lang->line('upload'));

        $this->set("tran_you_must_select_file", $this->lang->line('you_must_select_file'));
        $this->set("tran_select_excel_file", $this->lang->line('select_excel_file'));
        $this->set("tran_sender_id", $this->lang->line('sender_id'));
        $this->set("tran_distributor", $this->lang->line('distributor'));
        $this->set("tran_new_no", $this->lang->line('new_no'));
        $this->set("tran_select_one", $this->lang->line('select_one'));
        $this->set("tran_select_by_ids", $this->lang->line('select_by_ids'));
        $this->set("tran_select_all", $this->lang->line('select_all'));
        $this->set("tran_from_file", $this->lang->line('from_file'));
        $this->set("tran_number", $this->lang->line('number'));
        $this->set("tran_message", $this->lang->line('message'));
        $this->set("tran_160_characters_consumes_one_unit_of_message", $this->lang->line('160_characters_consumes_one_unit_of_message'));
        $this->set("tran_total_characters", $this->lang->line('total_characters'));
        $this->set("tran_total_sms_count", $this->lang->line('total_sms_count'));
        $this->set("tran_send_sms", $this->lang->line('send_sms'));
        $this->set("tran_you_must_enter_number", $this->lang->line('you_must_enter_number'));
        $this->set("tran_you_must_select_distributors", $this->lang->line('you_must_select_distributors'));
        $this->set("tran_you_must_select_one_distributor", $this->lang->line('you_must_select_one_distributor'));
        $this->set("tran_you_must_select_starting_distributor_id", $this->lang->line('you_must_select_starting_distributor_id'));
        $this->set("tran_you_must_select_ending_distributor_id", $this->lang->line('you_must_select_ending_distributor_id'));
        $this->set("tran_you_must_enter_mobile_no", $this->lang->line('you_must_enter_mobile_no'));
        $this->set("tran_you_must_enter_message", $this->lang->line('you_must_enter_message'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_you_please_type_your_message", $this->lang->line('please_type_your_message'));
        $this->set("tran_please_enter_phone_number", $this->lang->line('please_enter_phone_number'));
        $this->set("tran_select_user", $this->lang->line('select_user'));
        $this->set("page_top_header", $this->lang->line('upload_excel_files'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('upload_excel_files'));
        $this->set("page_small_header", "");
        
        $help_link="send-sms";
        $this->set("help_link",$help_link);

        $this->setView();
    }

    function find_number() {

        $id = $this->input->post('id');
        if ($id == "Select")
            echo "Select a user...";
        else
            echo $this->sms_model->echoSingleNumber($id);
    }

    function find_numbers() {

        $from = $this->input->post('from');
        $to = $this->input->post('to');
        if ($to == "Selectlastid" or $from == "Selectfirstid")
            echo "Select first and last ids...";
        else {
            if ($to < $from) {
                $tmp = $from;
                $from = $to;
                $to = $tmp;
            }
            echo $this->sms_model->echoAllNumber($from, $to);
        }
    }

    function ajax_sms() {

        if ($this->sms_model->checkSMSStatus()) {
            if ($this->input->post('numbers') != "All Numbers")
                $numbers = mysql_real_escape_string($this->input->post('numbers'));
            else {
                $no = $this->sms_model->getAllNumbers();
                $numbers = substr($no, 0, (strlen($no) - 1));
            }
            $message = $this->input->post('word_count');
            $sms_count = mysql_real_escape_string($this->input->post('sms_count'));
            $sms = "404";
            $this->sms_model->phone_no_arr = $numbers;
            $this->sms_model->sms_msg = $message;
            $this->sms_model->setSMSAPI();
            $sms = $this->sms_model->sendSMS(); //$sms="";
            $res = $this->sms_model->insertsmsDeatails($numbers, $this->sms_model->sms_msg, $sms_count, $sms);
            echo $sms;
        }
    }

    function sms_balance() {
        $balance = "";
        $title = $this->lang->line('sms_balance');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->ARR_SCRIPT[0]["name"] = "validate_sms.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";
        $this->setScripts();
        //$this->sms_model->setSMSAPI();
        //$balance = $this->sms_model->getBalance();
        $this->set("balance", $balance);

        $this->set("tran_sms_balance_details", $this->lang->line('sms_balance_details'));
        $this->set("tran_sms_balance", $this->lang->line('sms_balance'));
        $this->set("tran_sms_package_current_balance_is", $this->lang->line('sms_package_current_balance_is'));
        $this->set("tran_thanks_for_using_infinte_sms_service", $this->lang->line('thanks_for_using_infinte_sms_service'));
        $this->set("tran_regards", $this->lang->line('regards'));

        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('sms_balance_details'));

        $this->set("page_top_small_header", "");
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("page_header", $this->lang->line('sms_balance_details'));
        $this->set("page_small_header", "");
        
        $help_link="sms-details";
        $this->set("help_link",$help_link);

        $this->setView();
    }

}

?>