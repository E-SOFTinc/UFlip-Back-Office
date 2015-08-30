<?php

require_once 'Inf_Controller.php';

class Report extends Inf_Controller {

    function profile_report_view() {


        $title = $this->lang->line('select_user');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->ARR_SCRIPT[0]["name"] = "validate_profile.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->setScripts();
        $date = date("Y-m-d");
        $this->set("date", $date);

        ///////////////////////// code added by ameen ////////////////////////////////////
        ////////////////////////////////for language traslation///////////////////////////
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_sponser_name", $this->lang->line('sponser_name'));
        $this->set("tran_sponser_id", $this->lang->line('sponser_id'));
        $this->set("tran_resident", $this->lang->line('resident'));
        $this->set("tran_post_office", $this->lang->line('post_office'));
        $this->set("tran_pincode", $this->lang->line('pincode'));
        $this->set("tran_town", $this->lang->line('town'));
        $this->set("tran_district", $this->lang->line('district'));
        $this->set("tran_state", $this->lang->line('state'));
        $this->set("tran_mobile_no", $this->lang->line('mobile_no'));
        $this->set("tran_land_line_no", $this->lang->line('land_line_no'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_date_of_birth", $this->lang->line('date_of_birth'));
        $this->set("tran_blood_group", $this->lang->line('blood_group'));
        $this->set("tran_marital_status", $this->lang->line('marital_status'));
        $this->set("tran_occupation", $this->lang->line('occupation'));
        $this->set("tran_gender", $this->lang->line('gender'));
        $this->set("tran_nominee", $this->lang->line('nominee'));
        $this->set("tran_relationship", $this->lang->line('relationship'));
        $this->set("tran_male", $this->lang->line('male'));
        $this->set("tran_female", $this->lang->line('female'));
        $this->set("tran_profile_report", $this->lang->line('profile_report'));

        //////////////////////////language ends/////////////////////////////////////
        //for report header

        $this->report_header();

        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);
        if ($this->input->post('profile_update')) {

            $user_name = $this->input->post('user_name');
            $user_id = $this->report_model->userNameToID($user_name);
            if ($user_id) {
                $profile_arr = $this->report_model->includereport($user_name);
                $this->set("details", $profile_arr['details']);
                $this->set("sponser", $profile_arr['sponser']);
                $this->set("user_id", $user_id);
                $this->set("u_name", $user_name);
            } else {
                $msg = $this->lang->line('Invalid_Username');
                $this->redirect($msg, "select_report/admin_profile_report", false);
            }
        } else {
            //User
            $user_name = $this->input->post('user_name');
            $user_id = $this->report_model->userNameToID($user_name);
            if ($user_id) {
                $profile_arr = $this->report_model->includereport($user_name);

                $this->set("details", $profile_arr['details']);
                $this->set("sponser", $profile_arr['sponser']);
                $this->set("user_id", $profile_arr['user_id']);
                $this->set("u_name", $user_name);
            } else {
                $msg = $this->lang->line('Invalid_Username');
                $this->redirect($msg, "home", false);
            }
        }

        $this->setView();
    }

    public function profile_report() {
        $this->ARR_SCRIPT[0]["name"] = "validate_profile.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->setScripts();
        $date = date("Y-m-d");
        $this->set("date", $date);
        ////////////////////////////////for language traslation///////////////////////////
        $this->set("tran_create_excel", $this->lang->line('create_excel'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_bank", $this->lang->line('bank'));
        $this->set("tran_branch", $this->lang->line('branch'));
        $this->set("tran_acc_no", $this->lang->line('acc_no'));
        $this->set("tran_pan_no", $this->lang->line('pan_no'));
        $this->set("tran_ifsc", $this->lang->line('ifsc'));
        $this->set("tran_date_of_joining", $this->lang->line('date_of_joining'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_sponser_name", $this->lang->line('sponser_name'));
        $this->set("tran_sponser_id", $this->lang->line('sponser_id'));
        $this->set("tran_resident", $this->lang->line('resident'));
        $this->set("tran_mobile_no", $this->lang->line('mobile_no'));
        $this->set("tran_land_line_no", $this->lang->line('land_line_no'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_nominee", $this->lang->line('nominee'));
        $this->set("tran_relationship", $this->lang->line('relationship'));
        $this->set("tran_pincode", $this->lang->line('pincode'));
        $this->set("tran_profile_report", $this->lang->line('profile_report'));
        $this->set("tran_click_here_print", $this->lang->line('click_here_print'));
        //for report header
        $this->report_header();


        ///////////////////////
        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        if ($this->input->post('profile')) {
            $count = $this->input->post('count');
            if ($count > 0) {
                $this->session->set_userdata('profile_count', $count);
                $this->session->set_userdata("profile_type", "one_count");
                $profile_arr = $this->report_model->profileReport($count);
                $this->set("profile_arr", $profile_arr);
                $count = count($profile_arr);
                $this->set("count", $count);
            } else {
                $msg = $this->lang->line("invalid_entry");
                $this->redirect($msg, "select_report/admin_profile_report", FALSE);
            }
        }

        if ($this->input->post('profile_from')) {

            $count_from = $this->input->post('count_from');
            $count_to = $this->input->post('count_to');
            if ($count_from > 0 && $count_to > 0) {
                $this->session->set_userdata("profile_type", "two_count");
                $this->session->set_userdata('count_from', $count_from);
                $this->session->set_userdata('count_to', $count_to);
                $profile_arr = $this->report_model->profileReportFromTo($count_to, $count_from);
                $this->set("profile_arr", $profile_arr);

                $count = count($profile_arr);
                $this->set("count", $count);
            } else {
                $msg = $this->lang->line("invalid_entry");
                $this->redirect($msg, "select_report/admin_profile_report", FALSE);
            }
        }
        $this->setView();
    }

    function total_joining_daily() {

        $date = date("Y-m-d");
        $this->set("date", $date);
        ////////////////////////////////for language traslation///////////////////////////
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_sponser_name", $this->lang->line('sponser_name'));
        $this->set("tran_date_of_joining", $this->lang->line('date_of_joining'));

        $this->set("tran_user_joining_report", $this->lang->line('user_joining_report'));
        $this->set("tran_date", $this->lang->line('date'));
        ///////////////////////////////////////////////////////////////////////////////////
        //for report header
        $this->report_header();

        ///////////////////////
        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        $today = $this->input->post('date');
        $todays_join = $this->report_model->getTodaysJoining($today);
        $count = count($todays_join);
        $this->set("count", $count);
        $this->set("todays_join", $todays_join);
        $this->setView();
    }

    function total_joining_weekly() {
        ////////////////////////////////for language traslation///////////////////////////
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_sponser_name", $this->lang->line('sponser_name'));
        $this->set("tran_date_of_joining", $this->lang->line('date_of_joining'));

        $this->set("tran_user_joining_report", $this->lang->line('user_joining_report'));
        $this->set("tran_from", $this->lang->line('from'));
        $this->set("tran_to", $this->lang->line('to'));
        ///////////////////////////////////////////////////////////////////////////////////
        //for report header
        $this->report_header();

        ///////////////////////
        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        $date = date("Y-m-d");
        $this->set("date", $date);
        $from = $this->input->post('week_date1') . " 00:00:00";
        $to = $this->input->post('week_date2') . " 23:59:59";
        $week_join = $this->report_model->getWeeklyJoining($from, $to);
        $count = count($week_join);
        $this->set("count", $count);
        $this->set("week_join", $week_join);
        /////////
        $from_date = $this->input->post('week_date1');
        $to_date = $this->input->post('week_date2');
        $this->set("from_date", $from_date);
        $this->set("to_date", $to_date);
        $this->setView();
    }

    //****************************************************code by albert************************************//

    function bank_statement() {
        $count = "";
        $user_type = $this->LOG_USER_TYPE;
        if ($user_type == "admin") {
            if ($this->input->post('bank_stmnt') || $user_type == 'employee') {
                $user_mob_name = $this->input->post('user_name');
                $user_id = $this->report_model->userNameToID($user_mob_name);
                if (!$user_id) {
                    $msg = $this->lang->line('invalid_user_name');
                    $this->redirect($msg, "select_report/bank_statement_report", FALSE);
                } else {
                    $userid = $user_id;
                }
                $bank_stmt_arr = $this->report_model->getBankStatement($user_mob_name);
            } else {
                $uname = $this->LOG_USER_NAME;
                $bank_stmt_arr = $this->report_model->getBankStatement($uname);
            }
        }
        $date = date("Y-m-d");
        $count = count($bank_stmt_arr['member_payout']);
        $this->set("count", $count);
        $this->set("date", $date);
        $this->set("details", $bank_stmt_arr['details']);
        $this->set("member_payout", $bank_stmt_arr['member_payout']);
        $report_name = $this->lang->line('Covering_Letter');
        $this->set('report_name', "$report_name");
        $this->set('username', "User Name");
        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[3]["name"] = "validate_profile.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->setScripts();

        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_dear", $this->lang->line('dear'));
        $this->set("tran_first", $this->lang->line('first'));
        $this->set("tran_second", $this->lang->line('second'));
        $this->set("tran_click_here_to_print", $this->lang->line('click_here_to_print'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_click_here_to_print", $this->lang->line('click_here_to_print'));
        $this->set("tran_bank_details", $this->lang->line('bank_details'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_account_no", $this->lang->line('account_no'));
        $this->set("tran_bank", $this->lang->line('bank'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_service_charge", $this->lang->line('service_charge'));
        $this->set("tran_cross_amount", $this->lang->line('cross_amount'));

        //for report header
        $this->report_header();

        ///////////////////////
        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        $this->setView();
    }

    //**********************************************code by albert*********************************************// 
    /*     * ********************************************code added by ameen STARTS********************************* */
    function payout_released_report_binary() {
        $title = $this->lang->line('payout_release_report');
        $this->set("title", $title);
        $this->ARR_SCRIPT[0]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[0]["type"] = "css";
        $this->setScripts();
        $date = date("Y-m-d");
        $this->set("date", $date);

        ////////////////////////////////for language traslation///////////////////////////
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_tds", $this->lang->line('tds'));
        $this->set("tran_service_charge", $this->lang->line('service_charge'));
        $this->set("tran_amount_payable", $this->lang->line('amount_payable'));
        $this->set("tran_payout_release_report", $this->lang->line('payout_release_report'));

        //for report header
        $this->report_header();

        ///////////////////////
        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        if ($this->input->post('payout_released')) {
            $payout = $this->report_model->getPayoutType();
            $payout_type = $this->input->post('payout_type');
            $amount_type_arr[] = "leg";
            $amount_type_arr[] = "referral";
            if ($payout == "daily") {

                if ($payout_type == 'pending') {
                    $date = $this->input->post("week_date2");
                    $cm = $this->report_model->getDailyPaidoutPendingDetails($date, $amount_type_arr);
                } else {

                    $date = $this->input->post("week_date1");
                    $cm = $this->report_model->getDailyPaidoutDetails($date, $amount_type_arr);
                }
            } else {


                $released_date1 = $this->input->post('released_date1');
                $released_date2 = $this->input->post('released_date2');
                if ($payout_type == 'pending') {

                    $payout_status = "no";
                    $cm = $this->report_model->getReleasedPayoutDetails($released_date2, $payout_status, $amount_type_arr);
                    $before_payout_date = $this->report_model->getBeforePayoutDateBinary($released_date2);
                    $previous_pyout_date = $before_payout_date . " 59:59:59";
                } else {

                    $payout_status = "yes";
                    $cm = $this->report_model->getReleasedPayoutDetails($released_date1, $payout_status, $amount_type_arr);
                    $before_payout_date = $this->report_model->getBeforePayoutDateBinary($released_date1);
                    //print_r($cm);
                    $previous_pyout_date = $before_payout_date . " 59:59:59";
                }
            }
            $count = count($cm);
            $this->set("binary_details", $cm);
            $this->set("count", $count);
        }

        $this->setview();
    }

    function total_payout_report_view() {
        ////////////////////////////////for language traslation///////////////////////////
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_full_name", $this->lang->line('full_name'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_tds", $this->lang->line('tds'));
        $this->set("tran_service_charge", $this->lang->line('service_charge'));
        $this->set("tran_amount_payable", $this->lang->line('amount_payable'));
        $this->set("tran_user_payout_report", $this->lang->line('user_payout_report'));
        $this->set("tran_account_no", $this->lang->line('account_no'));
        $this->set("tran_bank", $this->lang->line('bank'));
        $this->set("tran_pan_no", $this->lang->line('pan_no'));
        $this->set("tran_address", $this->lang->line('address'));
        /////////////////////////////////////////////////////////////////////////////////////
        //for report header
        $this->report_header();

        ///////////////////////
        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        $date = date("Y-m-d");
        $this->set("date", $date);
        $total_payout = $this->report_model->getTotalPayout();
        $count = count($total_payout);
        $this->set("count", $count);
        $this->set("total_payout", $total_payout);
        $this->setview();
    }

    function member_payout_report() {
        ////////////////////////////////for language traslation///////////////////////////
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_full_name", $this->lang->line('full_name'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_tds", $this->lang->line('tds'));
        $this->set("tran_service_charge", $this->lang->line('service_charge'));
        $this->set("tran_amount_payable", $this->lang->line('amount_payable'));
        $this->set("tran_member_wise_payout_report", $this->lang->line('member_wise_payout_report'));

        $this->set("tran_account_no", $this->lang->line('account_no'));
        $this->set("tran_bank", $this->lang->line('bank'));
        $this->set("tran_pan_no", $this->lang->line('pan_no'));
        $this->set("tran_address", $this->lang->line('address'));
        /////////////////////////////////////////////////////////////////////////////////////
        //for report header
        $this->report_header();

        ///////////////////////
        $date = date("Y-m-d");
        $this->set("date", $date);
        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);
        if ($this->input->post('user_submit')) {

            $user_mob_name = $this->input->post('user_name');
            $member_payout = $this->report_model->getMemberPayout($user_mob_name);
            $count = count($member_payout);
            $this->set("count", $count);
            $this->set("member_payout", $member_payout);
        }
        $this->setView();
    }

    function weekly_payout_report() {
        ////////////////////////////////for language traslation///////////////////////////
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_full_name", $this->lang->line('full_name'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_tds", $this->lang->line('tds'));
        $this->set("tran_service_charge", $this->lang->line('service_charge'));
        $this->set("tran_amount_payable", $this->lang->line('amount_payable'));
        $this->set("tran_user_payout_report", $this->lang->line('user_payout_report'));
        $this->set("tran_account_no", $this->lang->line('account_no'));
        $this->set("tran_bank", $this->lang->line('bank'));
        $this->set("tran_pan_no", $this->lang->line('pan_no'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_from", $this->lang->line('from'));
        $this->set("tran_to", $this->lang->line('to'));
        /////////////////////////////////////////////////////////////////////////////////////	
        //for report header
        $this->report_header();

        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        ///////////////////////
        $date = date("Y-m-d");
        $this->set("date", $date);
        $from_date = $this->input->post('week_date1') . " 00:00:00";
        $to_date = $this->input->post('week_date2') . " 23:59:59";
        $weekly_payout = $this->report_model->getTotalPayout($from_date, $to_date);
        $count = count($weekly_payout);
        $this->set("count", $count);
        $this->set("weekly_payout", $weekly_payout);
        /////////////////////
        $from = $this->input->post('week_date1');
        $to = $this->input->post('week_date2');
        $this->set("from", $from);
        $this->set("to", $to);
        $this->setView();
    }

    public function payout_release_ewallet_request() {

        $title = $this->lang->line('payout_release_report');
        $this->set("title", $title);
        $this->ARR_SCRIPT[0]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[0]["type"] = "css";
        $this->setScripts();
        $date = date("Y-m-d");
        $this->set("date", $date);

        ////////////////////////////////for language traslation///////////////////////////
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_tds", $this->lang->line('tds'));
        $this->set("tran_service_charge", $this->lang->line('service_charge'));
        $this->set("tran_amount_payable", $this->lang->line('amount_payable'));
        $this->set("tran_payout_release_report", $this->lang->line('payout_release_report'));

        //for report header
        $this->report_header();

        ///////////////////////
        $this->set("tran_date", $this->lang->line('date'));
        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);
        if ($this->input->post('payout_released')) {
            $from_date = $this->input->post('week_date1') . " 00:00:00";
            $to_date = $this->input->post('week_date2') . " 23:59:59";

            $amount_type_arr[] = "leg";
            $amount_type_arr[] = "referral";
            $payout_status = "yes";


            $cm = $this->report_model->getReleasedPayoutDetailsEwalletRequest($from_date, $to_date, $payout_status, $amount_type_arr);


            $count = count($cm);
            $this->set("binary_details", $cm);
            $this->set("count", $count);
        }

        $this->setview();
    }

    public function payout_request_pending() {
        $title = $this->lang->line('payout_release_report');
        $this->set("title", $title);
        $this->ARR_SCRIPT[0]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[0]["type"] = "css";

        $date = date("Y-m-d");
        $this->set("date", $date);

        ////////////////////////////////for language traslation///////////////////////////
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_tds", $this->lang->line('tds'));
        $this->set("tran_service_charge", $this->lang->line('service_charge'));
        $this->set("tran_amount_payable", $this->lang->line('amount_payable'));
        $this->set("tran_payout_release_report", $this->lang->line('payout_release_report'));

        $this->set("tran_date", $this->lang->line('date'));
        //for report header
        $this->report_header();

        ///////////////////////
        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);
        if ($this->input->post('payout_released')) {
            $from_date = $this->input->post('week_date3') . " 00:00:00";
            $to_date = $this->input->post('week_date4') . " 23:59:59";

            $amount_type_arr[] = "leg";
            $amount_type_arr[] = "referral";
            $payout_status = "yes";
            $cm = $this->report_model->getPayoutRequestEwalletRequest($from_date, $to_date, $payout_status, $amount_type_arr);
            $count = count($cm);
            $this->set("binary_details", $cm);
            $this->set("count", $count);
        }
        $this->setScripts();
        $this->setview();
    }

    //===========================================edited by amrutha
    function fund_transfer_report_view() {

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[3]["name"] = "validate_profile.js";
        $this->ARR_SCRIPT[3]["type"] = "js";

        $this->setScripts();

        $this->set("tran_fund_transfer_report", $this->lang->line('fund_transfer_report'));


        $date = date("Y-m-d");
        $this->set("date", $date);
        if ($this->input->post('weekdate')) {
            $post_array = $this->input->post();
            $week = $post_array['week'];
            $year = $post_array['year'];
            $fund_transfer_rprt = $this->report_model->getFundTransferDeductReport($week, $year, "transfer");
            $this->set('fund_transfer_rprt', $fund_transfer_rprt);
            $this->set('cnt', count($fund_transfer_rprt));
        }

        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);
        $date = date("Y-m-d");

        $this->set("count", $header_count);
        $this->set("date", $date);


        $report_name = "Covering Letter";
        $this->set('report_name', "$report_name");
        $this->set('username', "User Name");

        $this->set("tran_bank_statement_report", $this->lang->line('bank_statement_report'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_dear", $this->lang->line('dear'));
        $this->set("tran_first", $this->lang->line('first'));
        $this->set("tran_second", $this->lang->line('second'));
        $this->set("tran_click_here_to_print", $this->lang->line('click_here_to_print'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_click_here_to_print", $this->lang->line('click_here_to_print'));
        $this->set("tran_bank_details", $this->lang->line('bank_details'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_account_no", $this->lang->line('account_no'));
        $this->set("tran_bank", $this->lang->line('bank'));
        $this->set("tran_tds", $this->lang->line('tds'));
        $this->set("tran_ifsc", $this->lang->line('ifsc'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_service_charge", $this->lang->line('service_charge'));
        $this->set("tran_cross_amount", $this->lang->line('cross_amount'));

        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_phone", $this->lang->line('phone'));


        //for report header
        $this->report_header();

        $this->setView();
    }

    function fund_deduct_report_view() {

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->setScripts();
        $this->set("tran_fund_deduct_report", $this->lang->line('fund_deduct_report'));

        $date = date("Y-m-d");
        $this->set("date", $date);
        if ($this->input->post('weekdate')) {
            $post_array = $this->input->post();
            $week = $post_array['week'];
            $year = $post_array['year'];
            $fund_deduct_rprt = $this->report_model->getFundTransferDeductReport($week, $year, "deduct");
            $this->set('fund_deduct_rprt', $fund_deduct_rprt);
            $this->set('cnt', count($fund_deduct_rprt));
        }

        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        $date = date("Y-m-d");

        $this->set("count", $header_count);
        $this->set("date", $date);


        $report_name = "Covering Letter";
        $this->set('report_name', "$report_name");
        $this->set('username', "User Name");

        $this->set("tran_bank_statement_report", $this->lang->line('bank_statement_report'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_dear", $this->lang->line('dear'));
        $this->set("tran_first", $this->lang->line('first'));
        $this->set("tran_second", $this->lang->line('second'));
        $this->set("tran_click_here_to_print", $this->lang->line('click_here_to_print'));
        $this->set("tran_user_name", $this->lang->line('user_name'));

        $this->set("tran_bank_details", $this->lang->line('bank_details'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_account_no", $this->lang->line('account_no'));
        $this->set("tran_bank", $this->lang->line('bank'));
        $this->set("tran_tds", $this->lang->line('tds'));
        $this->set("tran_ifsc", $this->lang->line('ifsc'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_service_charge", $this->lang->line('service_charge'));
        $this->set("tran_cross_amount", $this->lang->line('cross_amount'));

        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_phone", $this->lang->line('phone'));


        //for report header
        $this->report_header();

        $this->setView();
    }

    //===========================================

    function sales_report_view() {
        $this->set("tran_sales_report", $this->lang->line('sales_report'));
        //for report header
        $this->report_header();

        ///////////////////////
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_username", $this->lang->line('User_Name'));
        $this->set("tran_invoice_no", $this->lang->line('invoice_no'));
        $this->set("tran_prod_name", $this->lang->line('prod_name'));
        $this->set("tran_user_id", $this->lang->line('user_id'));
        $this->set("tran_amount", $this->lang->line('Amount'));
        ;
        $this->set("date_submission", $this->lang->line('date_submission'));
        $this->set("payment_method", $this->lang->line('Payment_method'));
        $this->set('tran_no_data', $this->lang->line('no_data'));
        $report_name = $this->lang->line('sales_report');
        $this->set('report_name', "$report_name");
        $this->set('tran_slno', $this->lang->line('slno'));

        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        $date = date("Y-m-d");
        $this->set("date", $date);

        $from_date = $this->input->post('week_date1');
        $to_date = $this->input->post('week_date2');
        $report_arr = $this->report_model->salesReport($from_date, $to_date);
        //print_r($report_arr);
        $count = count($report_arr);
        $this->set('report_arr', $report_arr);
        $this->set('count', $count);
        $this->setView();
    }

    function product_sales_report() {

        $this->set("tran_sales_report", $this->lang->line('sales_report'));
        //for report header
        $this->report_header();

        ///////////////////////
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_username", $this->lang->line('user_name'));
        $this->set("tran_invoice_no", $this->lang->line('invoice_no'));
        $this->set("tran_prod_name", $this->lang->line('prod_name'));
        $this->set("tran_user_id", $this->lang->line('user_id'));
        $this->set("tran_amount", $this->lang->line('amount'));

        $this->set("date_submission", $this->lang->line('date_submission'));
        $this->set("payment_method", $this->lang->line('Payment_method'));
        $this->set('tran_no_data', $this->lang->line('no_data'));
        $report_name = $this->lang->line('sales_report');
        $this->set('report_name', "$report_name");
        $this->set('tran_slno', $this->lang->line('slno'));

        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        $date = date("Y-m-d");
        $this->set("date", $date);

        $prod_id = $this->input->post('prodcut_id');
        $sales_report_arr = $this->report_model->productSalesReport($prod_id);
        //print_r($sales_report_arr);
        $count = count($sales_report_arr);
        $this->set('sales_report_arr', $sales_report_arr);
        $this->set('count', $count);
        $this->setView();
    }

    public function report_header() {
        //for report header

        $this->set("tran_Welcome_to", $this->lang->line('Welcome_to'));
        $this->set("tran_O", $this->lang->line('O'));
        $this->set("tran_I", $this->lang->line('I'));
        $this->set("tran_Floor", $this->lang->line('Floor'));
        $this->set("tran_em", $this->lang->line('em'));
        $this->set("tran_addr", $this->lang->line('addr'));
        $this->set("tran_comp", $this->lang->line('comp'));
        $this->set("tran_ph", $this->lang->line('ph'));
        $this->set("tran_nfinite", $this->lang->line('nfinite'));
        $this->set("tran_pen", $this->lang->line('pen'));
        $this->set("tran_ource", $this->lang->line('ource'));
        $this->set("tran_olutions", $this->lang->line('olutions'));
        $this->set("tran_S", $this->lang->line('S'));
        $this->set("tran_Date", $this->lang->line('Date'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_phone", $this->lang->line('phone'));
        $this->set("tran_click_here_print", $this->lang->line('click_here_print'));
    }

    public function rank_achievers_report_view() {

        $this->set("tran_rank_achieve_report", $this->lang->line('rank_achieve_report'));
        //for report header
        $this->report_header();

        ///////////////////////

        $this->set('tran_no_data', $this->lang->line('no_data'));
        $report_name = $this->lang->line('rank_achieve_report');
        $this->set('report_name', "$report_name");
        $this->set('tran_slno', $this->lang->line('slno'));
        $this->set('tran_new_rank', $this->lang->line('new_rank'));
        $this->set('tran_rank_achieved_date', $this->lang->line('rank_achieved_date'));
        $this->set('tran_user_full_name', $this->lang->line('user_full_name'));


        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        $date = date("Y-m-d");
        $this->set("date", $date);
        $rank = array();
        if ($this->input->post('ranks')) {
            $ranks = $this->input->post('ranks');
        } else {
            $msg = $this->lang->line('please_select_rank');
            $this->redirect($msg, "select_report/rank_achievers_report", false);
        }
        $i = 0;

        $report_arr = array();
        $from_date = $this->input->post('week_date1');
        $to_date = $this->input->post('week_date2');
        $report_arr = $this->report_model->rankedUsers($ranks, $from_date, $to_date);
        $count = count($report_arr);
        $this->set('report_arr', $report_arr);
        $this->set('count', $count);
        $this->setView();
    }

    function commission_report_view() {

        $type = "";
        $date = date("Y-m-d");
        $this->set("date", $date);
        $date1 = date('Y-m-d:H:i:s');
        if ($this->input->post('commision')) {

            $type = $this->input->post("amount_type");

            $from_date = $this->input->post("from_date");
            $to_date = $this->input->post("to_date");

            if ($from_date == '') {
                $msg = $this->lang->line('enter_from_date');
                $this->redirect($msg, 'select_report/commission_report', false);
            } else if ($to_date == '') {
                $msg = $this->lang->line('enter_to_date');
                $this->redirect($msg, 'select_report/commission_report', false);
            } else if (strtotime($from_date) > strtotime($to_date)) {
                $msg = $this->lang->line('from_date_must_be_less_than_to_date');
                $this->redirect($msg, 'select_report/commission_report', false);
            } else if ($type == '') {
                $msg = $this->lang->line('enter_amount_type');
                $this->redirect($msg, 'select_report/commission_report', false);
            } else {

                $details = $this->report_model->getCommisionDetails($type, $from_date, $to_date);
                $count = count($details);
            }
        }

        $this->report_header();

        ///////////////////////////////////////////////////////////////////////////////////
        $report_header = $this->report_model->getReportdetails();

        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);
        $this->set('details', $details);
        $this->set('count', $count);
        $this->set('date1', $date1);
        $this->set('type', $type);
        $this->set("tran_commission_report", $this->lang->line('commission_report'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_full_name", $this->lang->line('full_name'));
        $this->set("tran_amount_type", $this->lang->line('amount_type'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_total_amount", $this->lang->line('total_amounts'));
        $this->set("tran_total_amount_payable", $this->lang->line('total_amount_payable'));
        $this->set("tran_click_here_print", $this->lang->line('click_here_print'));
        $this->set("tran_no_data", $this->lang->line('no_data'));
        $this->set("tran_from", $this->lang->line('from'));
        $this->set("tran_to", $this->lang->line('to'));

        $this->set("from", $from_date);
        $this->set("to", $to_date);

        $this->setView();
    }

    function epin_report_view() {
        ////////////////////////////////for language traslation///////////////////////////
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_epin_amount", $this->lang->line('epin_amount'));
        $this->set("tran_pin_balance_amount", $this->lang->line('pin_balance_amount'));
        $this->set("tran_pin_uploaded_date", $this->lang->line('pin_uploaded_date'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_used_user", $this->lang->line('used_user'));
        $this->set("tran_epin_report", $this->lang->line('epin_report'));

        /////////////////////////////////////////////////////////////////////////////////////
        //for report header
        $this->report_header();

        ///////////////////////
        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        $date = date("Y-m-d");
        $this->set("date", $date);
        $pin_details = $this->report_model->getUsedPin();
        $count = count($pin_details);
        $this->set("count", $count);
        $this->set("pin_details", $pin_details);
        $this->setview();
    }

    //************* code added by AFFAR **************//
    function payout_released_report() {
        ////////////////////////////////for language traslation///////////////////////////
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_full_name", $this->lang->line('full_name'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_payout_released_report", $this->lang->line('payout_released_report'));
        $this->set("tran_account_no", $this->lang->line('account_no'));
        $this->set("tran_bank", $this->lang->line('bank'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_from", $this->lang->line('from'));
        $this->set("tran_to", $this->lang->line('to'));
        /////////////////////////////////////////////////////////////////////////////////////	
        //for report header
        $this->report_header();

        $report_header = $this->report_model->getReportdetails();
        $this->set("report_header", $report_header);

        $header_count = count($report_header);
        $this->set("header_count", $header_count);

        ///////////////////////
        $date = date("Y-m-d");
        $this->set("date", $date);
        $from_date = $this->input->post('week_date3') . " 00:00:00";
        $to_date = $this->input->post('week_date4') . " 23:59:59";
        $payout_release = $this->report_model->getAmountPaid($from_date, $to_date);
        $this->set("payout_release", $payout_release);
        
        $from = $this->input->post('week_date3');
        $to = $this->input->post('week_date4');
        $this->set("from",$from);
        $this->set("to",$to);
        $this->setView();
    }

}
