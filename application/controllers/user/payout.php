<?php

require_once 'Inf_Controller.php';

class Payout extends Inf_Controller {

    function __construct() {
        parent::__construct();

        
    }

    function weekly_payout($page = '', $limit = '') {

        $title = $this->lang->line('weekly_payout');
        $this->set("title", $this->COMPANY_NAME . " |  $title");

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

        $this->ARR_SCRIPT[15]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[15]["type"] = "js";
        $this->ARR_SCRIPT[15]["loc"] = "footer";

        $this->ARR_SCRIPT[16]["name"] = "validate_payout_weeklypayout.js";
        $this->ARR_SCRIPT[16]["type"] = "js";
        $this->ARR_SCRIPT[16]["loc"] = "footer";

        $user_id = $this->LOG_USER_ID;
        $user_name = $this->payout_model->IdToUserName($user_id);

        $this->set('user_name', $user_name);
        $weekdate = $this->session->userdata('weekdate');
        $this->set('weekdate', $weekdate);

        $from1 = $this->session->userdata('from1');
        $this->set('from1', $from1);
        $to1 = $this->session->userdata('to1');
        $this->set('to1', $to1);

        $length = "";
        $weekly_payout = array();
        $form_submit = FALSE;
        $session = FALSE;

        if ($this->session->userdata('weekdate')) {
            $session = TRUE;
        }
        if ($this->input->post('weekdate')) {

            $form_submit = TRUE;
            $this->session->set_userdata('weekdate', $this->input->post('weekdate'));
            $from_date = $this->input->post('week_date1') . " 00:00:00";
            $to_date = $this->input->post('week_date2') . " 23:59:59";
            $this->session->set_userdata('from', $from_date);
            $this->session->set_userdata('to', $to_date);
            $this->session->set_userdata('from1', $this->input->post('week_date1'));
            $this->session->set_userdata('to1', $this->input->post('week_date2'));

            /// Pagination BEGINS

            if (!($limit)) {
                $limit = 25;
            } // Default results per-page.
            if (!($page)) {
                $page = 0;
            }
            $user_id = $this->LOG_USER_ID;
            if ($this->session->userdata('weekdate')) {
                $session = TRUE;
                $from = $this->session->userdata('from');
                $to = $this->session->userdata('to');
                $weekly_payout = $this->payout_model->payoutWeeklyTotal($limit, $page, $from, $to, $user_id);
            }
        }
        $this->set("weekly_payout", $weekly_payout);
        $length = count($weekly_payout);
        $this->set('length', $length);
        $this->set('total_leg_tot', '0');
        $this->set('total_amount_tot', '0');
        $this->set('tds_tot', '0');
        $this->set('service_charge_tot', '0');
        $this->set('amount_payable_tot', '0');
        $this->set('leg_amount_carry_tot', '0');
        $this->set("form_submit", $form_submit);
        $this->set("session", $session);

        ////////////////////////// code for language translation  ///////////////////////////////

        $this->set("tran_weekly_payout", $this->lang->line('weekly_payout'));
        $this->set("tran_no_leg_count_found", $this->lang->line('no_leg_count_found'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_total_pair", $this->lang->line('total_pair'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_amount_payable", $this->lang->line('amount_payable'));
        $this->set("tran_service_charge", $this->lang->line('service_charge'));
        $this->set("tran_tds", $this->lang->line('tds'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_You_must_select_a_date", $this->lang->line('You_must_select_a_date'));
        $this->set("tran_You_must_select_from_date", $this->lang->line('You_must_select_from_date'));
        $this->set("tran_You_must_select_to_date", $this->lang->line('You_must_select_to_date'));
        $this->set("tran_You_must_Select_From_To_Date_Correctly", $this->lang->line('You_must_Select_From_To_Date_Correctly'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('weekly_payout'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('weekly_payout'));
        $this->set("page_small_header", "");
        ////////////////////////////////////////////////////////////////////////////////////
        $this->setScripts();
        $this->setView();
    }

    function my_income() {

        ///////////////////////// CODE ADDED BY JIJI \\\\\\\\\\\\\\\\\\\\\\\\\

        $title = $this->lang->line('incentive');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[1]["type"] = "plugins/css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[2]["type"] = "plugins/css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[3]["type"] = "plugins/js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[4]["type"] = "plugins/js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[5]["type"] = "plugins/js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "table-data.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->setScripts();

        $user_name = $this->LOG_USER_NAME;
        $this->set('user_name', $user_name);
        $binary = $this->payout_model->getIncomeStatement($user_name);
        $this->set('binary', $binary);

        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY JIJI    *********** *            */

        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_income", $this->lang->line('income'));
        $this->set("tran_income_statement", $this->lang->line('income_statement'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_select_user_id", $this->lang->line('select_user_id'));
        $this->set("tran_weekwise_income", $this->lang->line('weekwise_income'));
        $this->set("tran_week_no", $this->lang->line('week_no'));
        $this->set("tran_closing_date", $this->lang->line('closing_date'));
        $this->set("tran_released_income", $this->lang->line('released_income'));
        $this->set("tran_service_charge", $this->lang->line('service_charge'));
        $this->set("tran_tds", $this->lang->line('tds'));
        $this->set("tran_net_amount", $this->lang->line('net_amount'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_released", $this->lang->line('released'));
        $this->set("tran_pending", $this->lang->line('pending'));
        $this->set("tran_no_income_found", $this->lang->line('no_income_found'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));

        $this->set("page_top_header", $this->lang->line('income'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('income'));
        $this->set("page_small_header", "");

        $help_link = "income_statement";
        $this->set("help_link", $help_link);
        ////////////////////////////////////////////////////////////////////////////////////

        $this->setView();
    }

    function payout_release_request() {
        ///////////////////////// CODE EDITED BY JIJI \\\\\\\\\\\\\\\\\\\\\\\\\
        $title = "Request Payout Release";
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_payout_release.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->setScripts();

        $minimum_payout_amount = $this->payout_model->getMinimumPayoutAmount();
        $this->set('minimum_payout_amount', $minimum_payout_amount);
        $this->set('minimum_payout_amount', $minimum_payout_amount);

        $this->set("tran_Send_Request", $this->lang->line('send_request'));
        $this->set("tran_Request_Payout_Release", $this->lang->line('Request_Payout_Release'));
        $this->set("tran_Minimum_Payout_Amount", $this->lang->line('Minimum_Payout_Amount'));
        $this->set("tran_Payout_Request_Amount", $this->lang->line('Payout_Request_Amount'));

        $user_id = $this->LOG_USER_ID;
        $balance_amount = $this->payout_model->getUserBalanceAmount($user_id);
        $this->set('balance_amount', $balance_amount);

        if ($this->input->post('payout_request_submit')) {
            $payout_amount = $this->input->post("payout_amount");
            $request_date = date("Y-m-d H:i:s");
            $req_pend_amt = $this->payout_model->getRequestPendingAmount($user_id);
            $tot_req_amt = $req_pend_amt + $payout_amount;
            if ($req_pend_amt == 0) {
                if ($tot_req_amt <= $balance_amount) {
                    if ($balance_amount >= $payout_amount && $payout_amount >= $minimum_payout_amount) {
                        $res = $this->payout_model->insertPayoutReleaseRequest($user_id, $payout_amount, $request_date, "pending");
                        if ($res) {
                            $msg = $this->lang->line("You_cant_request_this_amount");
                            $this->redirect('Payout Request Sent Successfully.', "payout/payout_release_request", TRUE);
                        } else {
                            $this->redirect('Payout Request Sending Failed.', "payout/payout_release_request", FALSE);
                        }
                    } else {
                        $msg = $this->lang->line("You_cant_request_this_amount");
                        $this->redirect($msg, "payout/payout_release_request", FALSE);
                    }
                } else {
                    $msg = $this->lang->line("You_cant_request_this_amount");
                    $this->redirect($msg, "payout/payout_release_request", FALSE);
                }
            } else {
                $msg = $this->lang->line("you_have_requests_pending_for_approval");
                $this->redirect($msg, "payout/payout_release_request", FALSE);
            }
        }

        $this->set("tran_Request_Payout_Release", $this->lang->line('Payout_Request_Amount'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('Payout_Request_Amount'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('Payout_Request_Amount'));
        $this->set("page_small_header", "");
        $help_link = "request-payout";
        $this->set("help_link", $help_link);
        $this->setView();
    }

}

?>
