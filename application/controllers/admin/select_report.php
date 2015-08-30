<?php

require_once 'Inf_Controller.php';

class Select_report extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function admin_profile_report() {

        $title = $this->lang->line('select_user');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "validate_admin_profile.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";
        $this->setScripts();

        /////////////////////////////////coded added by ameen////////////////////////////////////
        ////////////////////////////////for language traslation/////////////////////////////////
        ////////////////////FOR PRODUCT_TAB
        $this->set("tran_profile_report", $this->lang->line('profile_report'));
        $this->set("tran_joining_report", $this->lang->line('joining_report'));
        $this->set("tran_total_payout_report", $this->lang->line('total_payout_report'));
        $this->set("tran_bank_statement", $this->lang->line('bank_statement'));
        $this->set("tran_payout_release_report", $this->lang->line('payout_release_report'));
        ////////////////////////////////////////////////////////////////////////////////////////
        $this->set("tran_profile_report", $this->lang->line('profile_report'));
        $this->set("tran_select_user_name", $this->lang->line('select_user_name'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_enter_count", $this->lang->line('enter_count'));
        $this->set("tran_enter_count_start_from", $this->lang->line('enter_count_start_from'));
        $this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_you_must_enter_count", $this->lang->line('you_must_enter_count'));
        $this->set("tran_you_must_enter_count_from", $this->lang->line('you_must_enter_count_from'));
        $this->set("tran_you_must_enter_a_valid_user_name", $this->lang->line('you_must_enter_a_valid_user_name'));
        $this->set("tran_digits_only", $this->lang->line('digits_only'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('profile_report'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('profile_report'));
        $this->set("page_small_header", "");

        $help_link = "member-profile-report";
        $this->set("help_link", $help_link);
        ///////////////////////////////////////////////////////////////////////////////////////

        $this->setView();
    }

    function total_joining_report() {

        $title = $this->lang->line('joining_report');

        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_joining.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[1]["type"] = "plugins/css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[2]["type"] = "plugins/css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[3]["type"] = "plugins/js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[4]["type"] = "plugins/js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";



        $this->setScripts();
        $date_diff = date('Y-m-d', strtotime('today - 30 days'));
        $this->set('date_diff', $date_diff);
        $cur_date = date('Y-m-d');
        $this->set('cur_date', $cur_date);

        /////////////////////////////////coded added by ameen////////////////////////////////////
        ////////////////////////////////for language traslation/////////////////////////////////
        ////////////////////FOR PRODUCT_TAB
        $this->set("tran_profile_report", $this->lang->line('profile_report'));
        $this->set("tran_joining_report", $this->lang->line('joining_report'));
        $this->set("tran_total_payout_report", $this->lang->line('total_payout_report'));
        $this->set("tran_bank_statement", $this->lang->line('bank_statement'));
        $this->set("tran_payout_release_report", $this->lang->line('payout_release_report'));
        /////////////////////////////////////////////////////////////////////////////////////////
        $this->set("tran_daily_joining", $this->lang->line('daily_joining'));
        $this->set("tran_select_date", $this->lang->line('select_date'));
        $this->set("tran_weekly_joining", $this->lang->line('weekly_joining'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_from_date", $this->lang->line('from_date'));
        $this->set("tran_to_date", $this->lang->line('to_date'));
        $this->set("tran_You_must_select_a_date", $this->lang->line('You_must_select_a_date'));
        $this->set("tran_You_must_select_from_date", $this->lang->line('You_must_select_from_date'));
        $this->set("tran_You_must_select_a_Todate_greaterThan_Fromdate", $this->lang->line('You_must_select_a_Todate_greaterThan_Fromdate'));
        $this->set("tran_You_must_select_to_date", $this->lang->line('You_must_select_to_date'));
        $this->set("tran_You_must_Select_From_To_Date_Correctly", $this->lang->line('You_must_Select_From_To_Date_Correctly'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('joining_report'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('joining_report'));
        $this->set("page_small_header", "");

        $help_link = "joining-report";
        $this->set("help_link", $help_link);
        $this->set("tran_select_amount_type", $this->lang->line('select_amount_type'));
        /////////////////////////////////////////////////////////////////////////////////////////
        $this->setView();
    }

    function total_payout_report() {

        $title = $this->lang->line('total_payout_report');
        $this->set("title", $this->COMPANY_NAME . " | $title ");
        ////////////////////////////////for language traslation/////////////////////////////////
        ////////////////////FOR PRODUCT_TAB
        $this->set("tran_profile_report", $this->lang->line('profile_report'));
        $this->set("tran_joining_report", $this->lang->line('joining_report'));
        $this->set("tran_total_payout_report", $this->lang->line('total_payout_report'));
        $this->set("tran_bank_statement", $this->lang->line('bank_statement'));
        $this->set("tran_payout_release_report", $this->lang->line('payout_release_report'));
        /////////////////////////////////////////////////////////////////////////////////////////
        $this->set("tran_total_payout_report", $this->lang->line('total_payout_report'));
        $this->set("tran_user_payout_report", $this->lang->line('user_payout_report'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_weekly_payout", $this->lang->line('weekly_payout'));
        $this->set("tran_from_date", $this->lang->line('from_date'));
        $this->set("tran_to_date", $this->lang->line('to_date'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_member_wise_payout_report", $this->lang->line('member_wise_payout_report'));
        $this->set("tran_You_must_select_from_date", $this->lang->line('You_must_select_from_date'));
        $this->set("tran_You_must_select_to_date", $this->lang->line('You_must_select_to_date'));
        $this->set("tran_You_must_Select_From_To_Date_Correctly", $this->lang->line('You_must_Select_From_To_Date_Correctly'));
        $this->set("tran_You_must_select_a_Todate_greaterThan_Fromdate", $this->lang->line('You_must_select_a_Todate_greaterThan_Fromdate'));
        $this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('payout_release_report'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('payout_release_report'));
        $this->set("page_small_header", "");
        $help_link = "payout-report";
        $this->set("help_link", $help_link);

        $this->set("tran_select_user", $this->lang->line('select_user'));

        //for Payout Release Amount

        $this->set("tran_payout_released_report", $this->lang->line('payout_released_report'));
        $date_diff = date('Y-m-d', strtotime('today - 30 days'));
        $this->set('date_diff', $date_diff);
        $cur_date = date('Y-m-d');
        $this->set('cur_date', $cur_date);

        //////////////////////////////////////////////////////////////////////////////////////////////////
        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[3]["type"] = "plugins/css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[4]["type"] = "plugins/css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[5]["type"] = "plugins/js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[6]["type"] = "plugins/js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "validate_payoutt.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->setScripts();
        $this->setView();
    }

    function payout_release_report() {

        $obj_pay = new select_report_model();
        $payout_release_status = $this->select_report_model->getPayoutReleaseStatus();
        $payout_type = $this->select_report_model->getPayoutType();
        $this->set("payout_type", $payout_type);
        $this->set("payout_release_status", $payout_release_status);
        ////////////////////////////////for language traslation/////////////////////////////////
        ////////////////////FOR PRODUCT_TAB
        $this->set("tran_profile_report", $this->lang->line('profile_report'));
        $this->set("tran_joining_report", $this->lang->line('joining_report'));
        $this->set("tran_total_payout_report", $this->lang->line('total_payout_report'));
        $this->set("tran_bank_statement", $this->lang->line('bank_statement'));
        $this->set("tran_payout_release_report", $this->lang->line('payout_release_report'));
        ///////////////////////////////////////////////////////////////////////////////////////////////
        $this->set("tran_payout_release_reports", $this->lang->line('payout_release_reports'));
        $this->set("tran_payout_release_report", $this->lang->line('payout_release_report'));
        $this->set("tran_select_payout_released_date", $this->lang->line('select_payout_released_date'));
        $this->set("tran_select_date", $this->lang->line('select_date'));
        $this->set("tran_payout_pending_report", $this->lang->line('payout_pending_report'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_You_must_select_a_date", $this->lang->line('You_must_select_a_date'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_You_must_Select_From_To_Date_Correctly", $this->lang->line('You_must_Select_From_To_Date_Correctly'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('payout_release_report'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('payout_release_report'));
        $this->set("page_small_header", "");
        $help_link = "payout-release-report";
        $this->set("help_link", $help_link);

        ////////////////////////////////////////////////////////////////////////////////////////////
        if ($payout_type != "daily") {
            $arr_dates = $obj_pay->getAllBinaryPayoutDates("DESC");
            $arr_len = count($arr_dates);
            $this->set('arr_dates', $arr_dates);
            $this->set('arr_len', $arr_len);
        }
        $this->set('week_date1', $this->input->post("week_date1"));
        $this->set('week_date2', $this->input->post("week_date2"));
        $this->set('week_date3', $this->input->post("week_date3"));
        $this->set('week_date4', $this->input->post("week_date4"));

        $title = $this->lang->line('payout_release_report');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[3]["type"] = "plugins/css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[4]["type"] = "plugins/css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[5]["type"] = "plugins/js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[6]["type"] = "plugins/js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "validate_payout.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";
        $this->setScripts();
        $this->setView();
    }

    public function ajax_users_auto($user_name = "") {
        $letters = preg_replace("/[^a-z0-9 ]/si", "", $user_name);
        $str = $this->select_report_model->selectUser($letters);
        echo $str;
    }

    public function ajax_epin_auto($user_name = "") {
        $letters = preg_replace("/[^a-z0-9 ]/si", "", $user_name);
        $str = $this->select_report_model->selectEpin($letters);
        echo $str;
    }

    /*     * ****************************code by albert************************** */

    function bank_statement_report() {
        $user_type = $this->LOG_USER_TYPE;
        $this->set('user_type', "$user_type");
        $this->set('username', "User Name");

        $title = $this->lang->line('bank_statement_report');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        ////////////////////////////////for language traslation/////////////////////////////////
        ////////////////////FOR PRODUCT_TAB
        $this->set("tran_profile_report", $this->lang->line('profile_report'));
        $this->set("tran_joining_report", $this->lang->line('joining_report'));
        $this->set("tran_total_payout_report", $this->lang->line('total_payout_report'));
        $this->set("tran_bank_statement", $this->lang->line('bank_statement'));
        $this->set("tran_payout_release_report", $this->lang->line('payout_release_report'));
        ///////////////////////////////////////////////////////////////////////////////////////////////
        $this->set("tran_you_must_enter_user_name", $this->lang->line('you_must_enter_user_name'));
        $this->set("tran_bank_statement", $this->lang->line('bank_statement'));
        $this->set("tran_select_user_name", $this->lang->line('select_user_name'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_bank_statement", $this->lang->line('bank_statement'));
        $this->set("tran_view_bank_statement_report", $this->lang->line('view_bank_statement_report'));
        $this->set("tran_select_user_name", $this->lang->line('select_user_name'));
        $this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("page_top_header", $this->lang->line('bank_statement'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('bank_statement'));
        $this->set("page_small_header", "");
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $help_link = "bank-statement-report";
        $this->set("help_link", $help_link);

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "validate_bankstatement.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->setScripts();
        $this->setView();
    }

    //----------------------------------------------code edited by amrutha
    function fund_transfer_report() {
        $user_type = $this->LOG_USER_TYPE;

        $this->set('user_type', "$user_type");
        $this->set('username', "User Name");

        $title = $this->lang->line('fund_transfer_report');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->set("tran_search", $this->lang->line('search'));

        $this->set("tran_fund_transfer", $this->lang->line('fund_transfer'));
        $this->set("tran_week_wise", $this->lang->line('week_wise'));
        $this->set("page_top_header", $this->lang->line('fund_transfer'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('fund_transfer'));
        $this->set("page_small_header", "");
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->setScripts();
        $this->setView();
    }

    function fund_deduct_report() {
        $user_type = $this->LOG_USER_TYPE;

        $this->set('user_type', "$user_type");
        $this->set('username', "User Name");

        $title = $this->lang->line('fund_deduct_report');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->set("tran_search", $this->lang->line('search'));

        $this->set("tran_fund_deduct", $this->lang->line('fund_deduct'));
        $this->set("tran_week_wise", $this->lang->line('week_wise'));
        $this->set("page_top_header", $this->lang->line('fund_deduct'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('fund_deduct'));
        $this->set("page_small_header", "");
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->setScripts();
        $this->setView();
    }

    function sales_report() {
        $title = $this->lang->line('sales_report');
        $this->set("title", $this->COMPANY_NAME . " | $title ");
        ////////////////////////////////for language traslation/////////////////////////////////
        ////////////////////FOR PRODUCT_TAB

        $this->set("tran_sales_report", $this->lang->line('sales_report'));
        $this->set("tran_view", $this->lang->line('view'));

        $this->set("tran_from_date", $this->lang->line('from_date'));
        $this->set("tran_to_date", $this->lang->line('to_date'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_select_product", $this->lang->line('select_product'));

        $this->set("tran_product_wise_sales_report", $this->lang->line('tran_product_wise_sales_report'));
        $this->set("tran_You_must_select_from_date", $this->lang->line('You_must_select_from_date'));
        $this->set("tran_You_must_select_to_date", $this->lang->line('You_must_select_to_date'));
        $this->set("tran_You_must_Select_From_To_Date_Correctly", $this->lang->line('You_must_Select_From_To_Date_Correctly'));
        $this->set("tran_You_must_select_a_Todate_greaterThan_Fromdate", $this->lang->line('You_must_select_a_Todate_greaterThan_Fromdate'));
        $this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_you_must_select_product", $this->lang->line('you_must_select_product'));

        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('sales_report'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('sales_report'));
        $this->set("page_small_header", "");
        $help_link = "sales-report";
        $this->set("help_link", $help_link);

        $this->set("tran_select_user", $this->lang->line('sales_report'));

        //////////////////////////////////////////////////////////////////////////////////////////////////
        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[3]["type"] = "plugins/css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[4]["type"] = "plugins/css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[5]["type"] = "plugins/js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[6]["type"] = "plugins/js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "validate_sales.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->setScripts();
        $this->load->model('register_model');
        $products = $this->register_model->viewProducts();
        $this->set("products", $products);
        $this->setView();
    }

    function rank_achievers_report() {

        $title = $this->lang->line('rank_achieve_report');
        $this->set("title", $this->COMPANY_NAME . " | $title ");
        ////////////////////////////////for language traslation/////////////////////////////////
        ////////////////////FOR PRODUCT_TAB

        $this->set("tran_achieve_report", $this->lang->line('rank_achieve_report'));
        $this->set("tran_view", $this->lang->line('view'));

        $this->set("tran_from_date", $this->lang->line('from_date'));
        $this->set("tran_to_date", $this->lang->line('to_date'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_You_must_select_from_date", $this->lang->line('You_must_select_from_date'));
        $this->set("tran_You_must_select_to_date", $this->lang->line('You_must_select_to_date'));
        $this->set("tran_You_must_select_a_Todate_greaterThan_Fromdate", $this->lang->line('You_must_select_a_Todate_greaterThan_Fromdate'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('rank_achieve_report'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('rank_achieve_report'));
        $this->set("page_small_header", "");
        $help_link = "rank-achievers-report";
        $this->set("help_link", $help_link);

        $this->set("tran_select_rank", $this->lang->line('select_rank'));
        $this->set("tran_select_user", $this->lang->line('rank_achieve_report'));
        $rank_arr = array();
        $rank_arr = $this->select_report_model->getAllRank();
        $this->set("rank_arr", $rank_arr);

        //////////////////////////////////////////////////////////////////////////////////////////////////
        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[3]["type"] = "plugins/css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[4]["type"] = "plugins/css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[5]["type"] = "plugins/js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[6]["type"] = "plugins/js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "validate_sales.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";
        $this->setScripts();
        $this->setView();
    }

    /////////////////////////////////---Code adde by Dijil Palakkal////////////////
    function commission_report() {

        $title = $this->lang->line('commission_report');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "misc.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[1]["type"] = "plugins/css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[2]["type"] = "plugins/css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[3]["type"] = "plugins/js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[4]["type"] = "plugins/js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "validate_joining.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->setScripts();

        $commission_types = $this->select_report_model->getCommissinTypes();
        $count_commission = count($commission_types);
        $this->set("tran_enter_amount_type", $this->lang->line('enter_amount_type'));
        $this->set("tran_You_must_select_from_date", $this->lang->line('You_must_select_from_date'));
        $this->set("tran_You_must_select_to_date", $this->lang->line('You_must_select_to_date'));
        $this->set("tran_You_must_Select_From_To_Date_Correctly", $this->lang->line('You_must_Select_From_To_Date_Correctly'));
        $this->set("tran_you_must_select_product", $this->lang->line('you_must_select_product'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_select_amount_type", $this->lang->line('select_amount_type'));
        $this->set("tran_amount_type", $this->lang->line('Amount_Type'));
        $this->set("tran_to_date", $this->lang->line('to_date'));
        $this->set("tran_from_date", $this->lang->line('from_date'));
        $this->set("tran_You_must_select_a_Todate_greaterThan_Fromdate", $this->lang->line('You_must_select_a_Todate_greaterThan_Fromdate'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_commission_report", $this->lang->line('commission_report'));
        $this->set("page_top_header", $this->lang->line('commission_report'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('commission_report'));
        $this->set("page_small_header", "");
        $help_link = "commission-report";
        $this->set("help_link", $help_link);
        $this->set("commission_types", $commission_types);
        $this->set("count_commission", $count_commission);
        $date_diff = date('Y-m-d', strtotime('today - 30 days'));
        $this->set('date_diff', $date_diff);
        $cur_date = date('Y-m-d');
        $this->set('cur_date', $cur_date);

        $this->setView();
    }

//////------------------end Code ----------------------Dijil ---------

    function epin_report() {

        $title = $this->lang->line('epin_report');
        $this->set("title", $this->COMPANY_NAME . " | $title ");
        ////////////////////////////////for language traslation/////////////////////////////////

        $this->set("tran_full_epin_report", $this->lang->line('full_epin_report'));
        $this->set("tran_user_payout_report", $this->lang->line('user_payout_report'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('epin_report'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('epin_report'));
        $this->set("page_small_header", "");
        $help_link = "payout-report";
        $this->set("help_link", $help_link);

        $this->set("tran_select_user", $this->lang->line('select_user'));

        //////////////////////////////////////////////////////////////////////////////////////////////////

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->setScripts();
        $this->setView();
    }

}

?>