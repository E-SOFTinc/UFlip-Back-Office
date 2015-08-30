<?php

require_once 'Inf_Controller.php';

class Joining extends Inf_Controller {

    function joining_status() {

        /////////////////////  CODE ADDED BY JIJI  //////////////////////////

        $this->set("action_page", $this->CURRENT_URL);
        $title=$this->lang->line('joining_status');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        

        $this->ARR_SCRIPT[0]["name"] = "calendar-win2k-cold-1.css";
        $this->ARR_SCRIPT[0]["type"] = "css";

        $this->ARR_SCRIPT[1]["name"] = "jscalendar/calendar.js";
        $this->ARR_SCRIPT[1]["type"] = "js";

        $this->ARR_SCRIPT[2]["name"] = "jscalendar/calendar-setup.js";
        $this->ARR_SCRIPT[2]["type"] = "js";

        $this->ARR_SCRIPT[3]["name"] = "jscalendar/lang/calendar-en.js";
        $this->ARR_SCRIPT[3]["type"] = "js";

        $this->ARR_SCRIPT[4]["name"] = "validate_joining.js";
        $this->ARR_SCRIPT[4]["type"] = "js";

        $this->setScripts();

        $total_count = $this->joining_model->totalJoiningpage();
        $this->set("total_count", $total_count);

        if ($this->input->post('dailydate')) {
            if (!$this->input->post("date")) {
                $date1 = $this->session->userdata('date1');
            } else {
                $date1 = $this->input->post("date");
                $this->session->set_userdata('date1', $date1);
                $this->session->unset_userdata('date2');
            }
        }
        if ($this->input->post('weekdate')) {
            if (!$this->input->post('week_date1') && !$this->input->post('week_date2') && !$this->input->post('plan2')) {
                $from = $this->session->userdata('date1') . " 00:00:00";
                $to = $this->session->userdata('date2') . " 23:59:59";
            } else {
                $from = $this->input->post("week_date1");
                $to = $this->input->post("week_date2");
                $this->session->set_userdata('date1', $from . " 00:00:00");
                $this->session->set_userdata('date2', $to . " 23:59:59");
            }
        }

  ////////////////////////// code for language translation  ///////////////////////////////
        $this->set("tran_total_joining_count", $this->lang->line('total_joining_count'));
        $this->set("tran_daily_joining", $this->lang->line('daily_joining'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_search", $this->lang->line('search'));
        $this->set("tran_weekly_joining", $this->lang->line('weekly_joining'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_active", $this->lang->line('active'));
        $this->set("tran_blocked", $this->lang->line('blocked'));
        $this->set("tran_sponser_name", $this->lang->line('sponser_name'));
        $this->set("tran_date_of_joining", $this->lang->line('date_of_joining'));
        $this->set("tran_first_pair", $this->lang->line('first_pair'));
        
        $this->set("tran_You_must_select_a_date", $this->lang->line('You_must_select_a_date'));
        $this->set("tran_You_must_select_from_date", $this->lang->line('You_must_select_from_date'));
        $this->set("tran_You_must_select_to_date", $this->lang->line('You_must_select_to_date'));
        $this->set("tran_You_must_Select_From_To_Date_Correctly", $this->lang->line('You_must_Select_From_To_Date_Correctly'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line(''));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line(''));
        $this->set("page_small_header", "");
        /////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////// pagination //////////////////////////////////////

        $date1 = $this->session->userdata('date1');
        $date2 = $this->session->userdata('date2');
        $this->set("date1", $date1);
        $this->set("date2", $date2);

        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;
        $limit = 25;

        if ($date1 != "" && $date2 == "") {
            
            $daily_joinings = $this->joining_model->todaysJoining($this->session->userdata('date1'), $page, $limit);
            $this->set("daily_joinings", $daily_joinings);
            $daily_joinings_count = $this->joining_model->todaysJoiningCount($this->session->userdata('date1'));

            $config['total_rows'] = $daily_joinings_count;
            $base_url = base_url() . "joining/joining_status";
            $config['base_url'] = $base_url;
            $config['per_page'] = $limit;
            $this->pagination->initialize($config);
            $result_per_page = $this->pagination->create_links();

            $this->set("result_per_page", $result_per_page);
        }
        if ($date1 != "" && $date2 != "") {

            $weekly_joinings = $this->joining_model->weeklyJoining($date1, $date2, $page, $limit);
            $this->set("weekly_joinings", $weekly_joinings);

            $weekly_joinings_count = $this->joining_model->allJoiningpage($date1, $date2);
            $config['total_rows'] = $weekly_joinings_count;
            $base_url = base_url() . "joining/joining_status";
            $config['base_url'] = $base_url;
            $config['per_page'] = $limit;
            $this->pagination->initialize($config);
            $result_per_page = $this->pagination->create_links();

            $this->set("result_per_page", $result_per_page);
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////

        $this->setView();
    }

}

?>
