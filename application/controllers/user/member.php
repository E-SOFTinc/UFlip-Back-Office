<?php

require_once 'Inf_Controller.php';

class member extends Inf_Controller {

    function search_member($action = "", $id = "") {

        /////////////////////  CODE ADDED BY JIJI  //////////////////////////

        $this->ARR_SCRIPT[0]["name"] = "validate_member.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[1]["name"] = "misc.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->setScripts();
        $title = $this->lang->line('member_management');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        if ($action == "block") {

            $result = $this->member_model->blockMember($id, 'no');
            if ($result) {
                $msg = $this->lang->line('User_blocked_Successfully');
                $this->redirect($msg, "member/search_member", TRUE);
            } else {
                $msg = $this->lang->line('Error_on_blocking_User');
                $this->redirect($msg, "member/search_member", FALSE);
            }
        }
        if ($action == "activate") {
            $result = $this->member_model->blockMember($id, 'yes');
            if ($result) {
                $msg = $this->lang->line('User_Activated_Successfully');
                $this->redirect($msg, "member/search_member", TRUE);
            } else {
                $msg = $this->lang->line('Error_on_Activating_User');
                $this->redirect($msg, "member/search_member", FALSE);
            }
        }

        if ($this->uri->segment(3) != "")
            $page = $this->uri->segment(3);
        else
            $page = 0;

        if ($this->input->post('search_member') || $this->uri->segment(3) != "") {

            $this->set("search_member", $this->input->post('search_member'));
            // $_SESSION['search_member']=$_POST['search_member'];

            if ($this->input->post('keyword') != "") {
                $keyword = $this->input->post('keyword');
                $this->session->set_userdata('ser_keyword', $keyword);
            }

            ///////////////////////////////////// pagination //////////////////////////////////////

            $base_url = base_url() . "member/search_member";
            $config['base_url'] = $base_url;

            $config['per_page'] = 25;

            $mem_arr = $this->member_model->searchMembers($this->session->userdata('ser_keyword'), $page, $config['per_page']);
            $this->set("mem_arr", $mem_arr);

            //print_r($mem_arr);
            $numrows = $this->member_model->getCountMembers($this->session->userdata('ser_keyword'));
            $config['total_rows'] = $numrows;
            $this->pagination->initialize($config);

            $this->set("mem_arr", $mem_arr);
            $result_per_page = $this->pagination->create_links();
            $this->set("result_per_page", $result_per_page);
        }

        ////////////////////////// code for language translation  ///////////////////////////////
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_Username_Name_Nominee_Address_MobileNo_City", $this->lang->line('Username_Name_Nominee_Address_MobileNo_City'));
        $this->set("tran_keyword", $this->lang->line('keyword'));
        $this->set("tran_search_member", $this->lang->line('search_member'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_sponser_name", $this->lang->line('sponser_name'));
        $this->set("tran_nominee", $this->lang->line('nominee'));
        $this->set("tran_mobile_no", $this->lang->line('mobile_no'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_town", $this->lang->line('town'));
        $this->set("tran_country", $this->lang->line('country'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_view_profile", $this->lang->line('view_profile'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_active", $this->lang->line('active'));
        $this->set("tran_blocked", $this->lang->line('blocked'));
        $this->set("tran_You_must_enter_keyword_to_search", $this->lang->line('You_must_enter_keyword_to_search'));
        ////////////////////////////////////////////////////////////////////////////////////
        $this->set("action_page", $this->CURRENT_URL);

        $this->setView();
    }

}

?>
