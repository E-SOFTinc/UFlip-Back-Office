<?php

require_once 'Inf_Controller.php';

class Payout extends Inf_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('validation');
        $this->val = new Validation();

        $this->load->model('profile_model');
    }

    function weekly_payout($page = '', $limit = '') {

        $this->ARR_SCRIPT[0]["name"] = "validate_news.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "misc.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[2]["type"] = "plugins/css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[3]["type"] = "plugins/css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[4]["type"] = "plugins/js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[5]["type"] = "plugins/js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "ckeditor/contents.css";
        $this->ARR_SCRIPT[7]["type"] = "plugins/css";
        $this->ARR_SCRIPT[7]["loc"] = "header";

        $this->ARR_SCRIPT[8]["name"] = "jquery-validation/dist/jquery.validate.min.js";
        $this->ARR_SCRIPT[8]["type"] = "plugins/js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "jQuery-Smart-Wizard/js/jquery.smartWizard.js";
        $this->ARR_SCRIPT[9]["type"] = "plugins/js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        $this->ARR_SCRIPT[10]["name"] = "ckeditor/ckeditor.js";
        $this->ARR_SCRIPT[10]["type"] = "plugins/js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->ARR_SCRIPT[11]["name"] = "ckeditor/adapters/jquery.js";
        $this->ARR_SCRIPT[11]["type"] = "plugins/js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

        $this->ARR_SCRIPT[12]["name"] = "ckeditor/contents.css";
        $this->ARR_SCRIPT[12]["type"] = "plugins/css";
        $this->ARR_SCRIPT[12]["loc"] = "header";

        $this->ARR_SCRIPT[13]["name"] = "validate_news_system.js";
        $this->ARR_SCRIPT[13]["type"] = "js";
        $this->ARR_SCRIPT[13]["loc"] = "footer";


        $this->ARR_SCRIPT[14]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[14]["type"] = "plugins/css";
        $this->ARR_SCRIPT[14]["loc"] = "header";

        $this->ARR_SCRIPT[15]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[15]["type"] = "plugins/css";
        $this->ARR_SCRIPT[15]["loc"] = "header";

        $this->ARR_SCRIPT[16]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[16]["type"] = "plugins/js";
        $this->ARR_SCRIPT[16]["loc"] = "footer";

        $this->ARR_SCRIPT[17]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[17]["type"] = "plugins/js";
        $this->ARR_SCRIPT[17]["loc"] = "footer";

        $this->ARR_SCRIPT[18]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[18]["type"] = "plugins/js";
        $this->ARR_SCRIPT[18]["loc"] = "footer";

        $this->ARR_SCRIPT[19]["name"] = "table-data.js";
        $this->ARR_SCRIPT[19]["type"] = "js";
        $this->ARR_SCRIPT[19]["loc"] = "footer";

        $this->ARR_SCRIPT[19]["name"] = "validate_payout_weeklypayout.js";
        $this->ARR_SCRIPT[19]["type"] = "js";
        $this->ARR_SCRIPT[19]["loc"] = "footer";

        $this->setScripts();

        $title = $this->lang->line('weekly_payout');
        $this->set("title", $this->COMPANY_NAME . " |  $title");

        $weekdate = $this->session->userdata('weekdate');
        $this->set('weekdate', $weekdate);

        $from1 = $this->session->userdata('from1');
        $this->set('from1', $from1);
        $to1 = $this->session->userdata('to1');
        $this->set('to1', $to1);

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

            if ($this->session->userdata('weekdate')) {
                $session = TRUE;
                $from = $this->session->userdata('from');
                $to = $this->session->userdata('to');
                $weekly_payout = $this->payout_model->payoutWeeklyTotal($limit, $page, $from, $to);
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
        //for language translation///
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
        $this->set("tran_full_name", $this->lang->line('full_name'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_You_must_select_a_date", $this->lang->line('You_must_select_a_date'));
        $this->set("tran_You_must_select_from_date", $this->lang->line('You_must_select_from_date'));
        $this->set("tran_You_must_select_to_date", $this->lang->line('You_must_select_to_date'));
        $this->set("tran_You_must_Select_From_To_Date_Correctly", $this->lang->line('You_must_Select_From_To_Date_Correctly'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('weekly_payout'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('weekly_payout'));
        $this->set("page_small_header", "");
        /////////////////////////////////////////////////////////////////////////////////////////

        $this->setView();
    }

    function payout_release($action = "", $del_id = "") {

        if ($action == "delete") {
            $res = $this->payout_model->deletePayoutRequest($del_id);
            if ($res) {
                $msg = $this->lang->line('Payout_Request_Deleted_Successfully');
                $this->redirect($msg, "payout/payout_release", TRUE);
            } else {
                $msg = $this->lang->line('Error_on_deleting_Payout_Request');
                $this->redirect($msg, "payout/payout_release", FALSE);
            }
        }

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////                

        $this->ARR_SCRIPT[0]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[0]["type"] = "plugins/css";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[1]["type"] = "plugins/css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[2]["type"] = "plugins/js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[3]["type"] = "plugins/js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[4]["type"] = "plugins/js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "table-data.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[6]["type"] = "plugins/css";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[7]["type"] = "plugins/css";
        $this->ARR_SCRIPT[7]["loc"] = "header";

        $this->ARR_SCRIPT[8]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[8]["type"] = "plugins/js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[9]["type"] = "plugins/js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";


        $this->ARR_SCRIPT[10]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[10]["type"] = "js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->ARR_SCRIPT[11]["name"] = "validate_payout_release.js";
        $this->ARR_SCRIPT[11]["type"] = "js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

        $this->ARR_SCRIPT[12]["name"] = "MailBox.js";
        $this->ARR_SCRIPT[12]["type"] = "js";
        $this->ARR_SCRIPT[12]["loc"] = "footer";


        $this->setScripts();

        ////////////////////////// code for language translation  ///////////////////////////////

        $this->set("tran_close", $this->lang->line('close'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_payout_release", $this->lang->line('payout_release'));
        $this->set("tran_payout_release_date", $this->lang->line('payout_release_date'));
        $this->set("tran_release", $this->lang->line('release'));
        $this->set("tran_user_id", $this->lang->line('user_id'));
        $this->set("tran_full_name", $this->lang->line('full_name'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_amount_payable", $this->lang->line('amount_payable'));
        $this->set("tran_user_details", $this->lang->line('user_details'));
        $this->set("tran_paid", $this->lang->line('paid'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_bank", $this->lang->line('bank'));
        $this->set("tran_branch", $this->lang->line('branch'));
        $this->set("tran_mobile", $this->lang->line('mobile'));
        $this->set("tran_acc_no", $this->lang->line('acc_no'));
        $this->set("tran_ifsc", $this->lang->line('ifsc'));
        $this->set("tran_user_full_name", $this->lang->line('user_full_name'));
        $this->set("tran_total", $this->lang->line('total'));
        $this->set("tran_view_user_data", $this->lang->line('view_user_data'));
        $this->set("tran_no_payout_found", $this->lang->line('no_payout_found'));
        $this->set("tran_binary_payout_release", $this->lang->line('binary_payout_release'));
        $this->set("tran_unblock_after_completing_the_payout_release", $this->lang->line('unblock_after_completing_the_payout_release'));
        $this->set("tran_select_one", $this->lang->line('select_one'));
        $this->set("tran_generate_excel", $this->lang->line('generate_excel'));
        $this->set("tran_Please_select_payout_date", $this->lang->line('Please_select_payout_date'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("tran_please_select_at_least_one_checkbox", $this->lang->line('please_select_at_least_one_checkbox'));

        $this->set("tran_slno", $this->lang->line('slno'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_balance_amount", $this->lang->line('balance_amount'));
        $this->set("tran_Payout_Amount", $this->lang->line('Payout_Amount'));
        $this->set("tran_check", $this->lang->line('check'));
        $this->set("tran_delete", $this->lang->line('delete'));
        $this->set("page_top_header", $this->lang->line('payout_release'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('payout_release'));
        $this->set("page_small_header", "");

        $help_link = "release_payout";
        $this->set("help_link", $help_link);

        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_nofond", $this->lang->line('nofond'));
        $this->set("tran_showing", $this->lang->line('showing'));
        $this->set("tran_to", $this->lang->line('to'));
        $this->set("tran_of", $this->lang->line('of'));
        $this->set("tran_entries", $this->lang->line('entries'));
        $this->set("tran_notavailable", $this->lang->line('notavailable'));
        ////////////////////////////////////////////////////////////////////////////////////
        //$this->MODULE_STATUS['payout_release_status'] = "ewallet_request";
        $payout_release_type = $this->MODULE_STATUS['payout_release_status'];
        $this->set("payout_release_type", $payout_release_type);

        $payout_type = $this->payout_model->getPayoutType();
        $this->set("payout_type", $payout_type);

        $payout_date_arr = array();
        $date_sub = "";
        $previous_pyout_date = "";
        $post_submit = false;
        $post_details = false;
        $post_view_users = false;
        $payout_amount = 0;

        if ($payout_type != "daily") {
            $payout_date_arr = $this->payout_model->getAllBinaryPayoutDates("DESC");
            $arr_len = count($payout_date_arr);
        }

        if ($this->input->post('update')) {

            $POST = $this->input->post();
            if ($payout_type == "daily") {
                $res = $this->payout_model->payDailyAmount($POST);
            } else {
                $res = $this->payout_model->updatePaidStatus($POST);
            }

            if ($res) {
                $msg = $this->lang->line("Payout_Released_Successfully");
                $this->redirect($msg, "payout/payout_release", TRUE);
            } else {
                $msg = $this->lang->line("Payout_Release_Failed");
                $this->redirect($msg, "payout/payout_release", FALSE);
            }
        }

        if ($this->input->post('submit')) {
            $post_submit = true;
            if ($payout_type == "daily") {
                $date_sub = $this->input->post('week_date2');
                if ($date_sub == "") {
                    $msg = $this->lang->line("you_must_select_date");
                    $this->redirect($msg, "payout/payout_release", FALSE);
                }
                $this->session->set_userdata('payout_date', $date_sub);
                $this->session->set_userdata('prev_date', $date_sub);
                $weekly_payout = $this->payout_model->getUnPaidAmount($date_sub);
                $this->set("weekly_payout", $weekly_payout);
            } else {
                $date_sub = $this->input->post('week_date2');
                if ($date_sub == "") {
                    $msg = $this->lang->line("you_must_select_date");
                    $this->redirect($msg, "payout/payout_release", FALSE);
                }
                $previous_pyout_date = $this->payout_model->getBeforePayoutDateBinary($date_sub);
                $this->session->set_userdata('payout_date', $date_sub);
                $this->session->set_userdata('prev_date', $previous_pyout_date);

                $weekly_payout = $this->payout_model->getNonPaidAmounts($previous_pyout_date, $date_sub);
                $this->set("weekly_payout", $weekly_payout);
            }
        }

        if ($this->input->post('details')) {
            $post_details = true;

            $date_sub = $this->session->userdata('payout_date');
            $prev_date = $this->session->userdata('prev_date');

            $details = $this->payout_model->getPayoutUserDetails($prev_date, $date_sub);
            $this->set("details", $details);
        }

        if ($payout_release_type != "normal") {
            $details = $this->payout_model->getPayoutDetails($payout_release_type);
            $count_details = count($details);
            for ($i = 0; $i < $count_details; $i++) {
                $details["user$i"]["balance_amount"] = round($details["user$i"]["balance_amount"], 2);
            }
            $this->set("details", $details);
        }

        if ($this->input->post('release_payout')) {
            $post_arr = $this->input->post();
            $count = $this->input->post("table_rows");
            $res = "";
            for ($i = 0; $i < $count; $i++) {
                if (array_key_exists("release$i", $post_arr)) {
                    $user_id = $this->input->post("user_id$i");
                    $balance_amount = $this->input->post("balance_amount$i");
                    $payout_release_amount = $this->input->post("payout$i");
                    $requested_date = $this->input->post("requested_date$i");
                    $res = $this->payout_model->updateUserBalanceAmount($user_id, $payout_release_amount, $payout_release_type, $requested_date);
                }
            }
            if ($res) {
                $login_id = $this->LOG_USER_ID;
                $login_id = $this->validation->getAdminId();
                $this->val->insertUserActivity($user_id, 'release payout', $login_id);
                $msg = $this->lang->line("Payout_Released_Successfully");
                $this->redirect($msg, "payout/payout_release", TRUE);
            } else {
                $msg = $this->lang->line("Payout_Release_Failed");
                $this->redirect($msg, "payout/payout_release", FALSE);
            }
        }
        $this->set("payout_amount", $payout_amount);
        $this->set("post_submit", $post_submit);
        $this->set("post_details", $post_details);
        $this->set("post_view_users", $post_view_users);
        $this->set("date_sub", $date_sub);
        $this->set("previous_pyout_date", $previous_pyout_date);
        $pay_relese_st = "";
        $this->set("payout_date_arr", $payout_date_arr);
        $this->set("pay_relese_st", $pay_relese_st);
        $this->set("action_page", $this->CURRENT_URL);
        $title = $this->lang->line('payout_release');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->setView();
    }

    function my_income() {

        ///////////////////////// CODE EDITED BY JIJI \\\\\\\\\\\\\\\\\\\\\\\\\
        $title = $this->lang->line('incentive');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[1]["type"] = "css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

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
        $this->setScripts();

        $week_date = FALSE;
        $binary = array();
        $mlm_plan = $this->session->userdata['mlm_plan'];
        $this->set('mlm_plan', $mlm_plan);

        if ($this->input->post('user_name')) {
            if (!$this->input->post('user_name')) {
                $msg = $this->lang->line('you_must_select_a_username');
                $this->redirect($msg, "payout/my_income", false);
            }
            $week_date = TRUE;
            $user_name = $this->input->post('user_name');
            $this->set('user_name', $user_name);
            $is_valid_username = $this->payout_model->obj_reg->isUserAvailable($user_name);
            $this->set('is_valid_username', $is_valid_username);
            if ($is_valid_username) {
//                $binary = $this->payout_model->getIncome($user_name);
                
                $binary = $this->payout_model->getIncomeStatement($user_name);
                
                $this->get_user_summary($user_name);
            } else {
                $msg = $this->lang->line('Username_not_Exists');
                $this->redirect($msg, "profile/user_account", false);
            }
        }else  if ($this->input->get('user_name')) {
            if (!$this->input->get('user_name')) {
                $msg = $this->lang->line('you_must_select_a_username');
                $this->redirect($msg, "payout/my_income", false);
            }
            $week_date = TRUE;
            $user_name = $this->input->get('user_name');
            $this->set('user_name', $user_name);
            $is_valid_username = $this->payout_model->obj_reg->isUserAvailable($user_name);
            $this->set('is_valid_username', $is_valid_username);
            if ($is_valid_username) {
//                $binary = $this->payout_model->getIncome($user_name);
                
                $binary = $this->payout_model->getIncomeStatement($user_name);
                
                $this->get_user_summary($user_name);
            } else {
                $msg = $this->lang->line('Username_not_Exists');
                $this->redirect($msg, "profile/user_account", false);
            }
        } else {
            $msg = $this->lang->line('you_must_select_a_username');
            $this->redirect($msg, "profile/user_account", false);
        }

        $this->set('binary', $binary);
        $this->set('week_date', $week_date);
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE EDITED BY JIJI    *********** *            */
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_income", $this->lang->line('income'));
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
        $this->set("tran_you_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_Username_not_Exists", $this->lang->line('Username_not_Exists'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
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

        $this->set("tran_Send_Request", $this->lang->line('send_request'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('Request_Payout_Release'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('Request_Payout_Release'));
        $this->set("page_small_header", "");

        $minimum_payout_amount = $this->payout_model->getMinimumPayoutAmount();
        $this->set('minimum_payout_amount', $minimum_payout_amount);
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
            if ($tot_req_amt <= $balance_amount) {
                if ($balance_amount >= $payout_amount && $payout_amount >= $minimum_payout_amount) {
                    $res = $this->payout_model->insertPayoutReleaseRequest($user_id, $payout_amount, $request_date, "pending");
                    if ($res) {
                        $msg = $this->lang->line("Payout_Request_Sent_Successfully");
                        $this->redirect($msg, "payout/payout_release_request", TRUE);
                    } else {
                        $msg = $this->lang->line("Payout_Request_Sending_Failed");
                        $this->redirect($msg, "payout/payout_release_request", FALSE);
                    }
                } else {
                    $msg = $this->lang->line("You_cant_request_this_amount");
                    $this->redirect($msg, "payout/payout_release_request", FALSE);
                }
            } else {
                $msg = $this->lang->line("You_cant_request_this_amount");
                $this->redirect($msg, "payout/payout_release_request", FALSE);
            }
        }

        $help_link = "Payout_release_request";
        $this->set("help_link", $help_link);
        $this->setView();
    }

    function monthly_income() {


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

        $this->ARR_SCRIPT[6]["name"] = "ckeditor/contents.css";
        $this->ARR_SCRIPT[6]["type"] = "plugins/css";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "jquery-validation/dist/jquery.validate.min.js";
        $this->ARR_SCRIPT[7]["type"] = "plugins/js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "jQuery-Smart-Wizard/js/jquery.smartWizard.js";
        $this->ARR_SCRIPT[8]["type"] = "plugins/js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "ckeditor/ckeditor.js";
        $this->ARR_SCRIPT[9]["type"] = "plugins/js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        $this->ARR_SCRIPT[10]["name"] = "ckeditor/adapters/jquery.js";
        $this->ARR_SCRIPT[10]["type"] = "plugins/js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->ARR_SCRIPT[11]["name"] = "ckeditor/contents.css";
        $this->ARR_SCRIPT[11]["type"] = "plugins/css";
        $this->ARR_SCRIPT[11]["loc"] = "header";

        $this->ARR_SCRIPT[12]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[12]["type"] = "plugins/css";
        $this->ARR_SCRIPT[12]["loc"] = "header";

        $this->ARR_SCRIPT[13]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[13]["type"] = "plugins/css";
        $this->ARR_SCRIPT[13]["loc"] = "header";

        $this->ARR_SCRIPT[14]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[14]["type"] = "plugins/js";
        $this->ARR_SCRIPT[14]["loc"] = "footer";

        $this->ARR_SCRIPT[17]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[17]["type"] = "plugins/js";
        $this->ARR_SCRIPT[17]["loc"] = "footer";

        $this->ARR_SCRIPT[15]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[15]["type"] = "plugins/js";
        $this->ARR_SCRIPT[15]["loc"] = "footer";

        $this->ARR_SCRIPT[16]["name"] = "table-data.js";
        $this->ARR_SCRIPT[16]["type"] = "js";
        $this->ARR_SCRIPT[16]["loc"] = "footer";

        $this->ARR_SCRIPT[17]["name"] = "validate_monthly_revenue_details.js";
        $this->ARR_SCRIPT[17]["type"] = "js";
        $this->ARR_SCRIPT[17]["loc"] = "footer";
        $this->setScripts();

        $title = 'Monthly revenue details';
        $this->set("title", $this->COMPANY_NAME . " |  $title");
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_select_date", $this->lang->line('select_date'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_Total_income", $this->lang->line('Total_income'));
        $this->set("tran_Amount_Type", $this->lang->line('Amount_Type'));
        $this->set("tran_perc", $this->lang->line('perc'));
        $this->set("tran_Amount", $this->lang->line('Amount'));
        $this->set("tran_Total_Commsion_details", $this->lang->line('Total_Commsion_details'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("page_header", $this->lang->line('monthly_revenue_details'));
        $this->set("tran_you_must_select_date", $this->lang->line('you_must_select_date'));
        $this->set("page_top_header", 'Revenue details');
        $this->set("page_top_small_header", "");
        $this->set("page_header", 'Monthly revenue details');
        $this->set("page_small_header", "");
        $this->set('status', 0);
        if ($this->input->post('submit')) {
            $date = $this->input->post('date');
            $monthly_income_details = $this->payout_model->getMonthlyDetails($date);
            $monthly_commission_details = $this->payout_model->getMonthlyCommisionDetails($date);
            $percentage = round($monthly_income_details / $monthly_commission_details['total'], 2) * 100;

            $this->set('status', 1);
            $this->set('monthly_income_details', $monthly_income_details);
            $this->set('monthly_commission_details', $monthly_commission_details);
            $this->set('percentage', $percentage);
            $this->set('date', date("F Y", strtotime($date)));
        }
        $this->setView();
    }

    public function user_details($user_id = '') {

        $user_details = $this->payout_model->getUserDetails($user_id);

        $user_name = $this->lang->line('User_Name');
        $fullname = $this->lang->line('full_name');
        $email = $this->lang->line('email');
        $mobile_no = $this->lang->line('mobile_no');
        $address = $this->lang->line('address');
        $country = $this->lang->line('country');
        $pan_no = $this->lang->line('pan_no');
        $d_o_b = $this->lang->line('date_of_birth');
        $gender = $this->lang->line('gender');
        $pincode = $this->lang->line('pincode');
        $bank_account_number = $this->lang->line('bank_account_number');
        $bank_name = $this->lang->line('bank_name');
        $branch_name = $this->lang->line('branch_name');
        $user_detail = $this->lang->line('user_details');



        echo '<div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title">' . $user_detail . '</h4>
                                </div><table cellpadding="0" cellspacing="0" align="center">
                                        <tr>
                                            <td>
                                                <b>' . $user_name . ' :</b> ' . $user_details[0]['user_name'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>' . $fullname . ' :</b> ' . $user_details[0]['name'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>' . $d_o_b . ' :</b> ' . $user_details[0]['dob'] . '
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                                <b>' . $gender . ' :</b> ' . $user_details[0]['gender'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>' . $address . ' :</b> ' . $user_details[0]['address'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>' . $pincode . ' :</b> ' . $user_details[0]['pin'] . '
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                                <b>' . $email . ' :</b> ' . $user_details[0]['email'] . '
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                                <b>' . $mobile_no . ' :</b> ' . $user_details[0]['mobile'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>' . $country . ' :</b> ' . $user_details[0]['country'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>' . $pan_no . ' :</b> ' . $user_details[0]['pan'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>' . $bank_account_number . ' :</b> ' . $user_details[0]['acc'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>' . $bank_name . ' :</b> ' . $user_details[0]['bank'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>' . $branch_name . ' :</b> ' . $user_details[0]['branch'] . '
                                            </td>
                                        </tr>
                                    </table>';
    }

    function get_user_summary($username) {
        $user_id = $this->val->userNameToID($username);
        $product_status = $this->MODULE_STATUS['product_status'];
        $lang_id = $this->LANG_ID;
        $profile_arr = $this->profile_model->getProfileDetails($user_id, '', $product_status, $lang_id);

        $details = $profile_arr['details'];
        $file_name = $this->profile_model->getUserPhoto($user_id);
        if ($file_name == "")
            $file_name = "nophoto.jpg";

        $pin_status = $this->MODULE_STATUS['pin_status'];
        $ewallet_status = $this->MODULE_STATUS['ewallet_status'];
        $referal_status = $this->MODULE_STATUS['referal_status'];

        $this->set("pin_status", $pin_status);
        $this->set("ewallet_status", $ewallet_status);
        $this->set("referal_status", $referal_status);

        $this->set("file_name", $file_name);
        $this->set("user_name", $username);
        $this->set("user_id", $user_id);
        $this->set("details", $details);

        $this->set("tran_User_Name", $this->lang->line('User_Name'));
        $this->set("tran_full_name", $this->lang->line('full_name'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_mobile_no", $this->lang->line('mobile_no'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_country", $this->lang->line('country'));
        $this->set("tran_view_profile", $this->lang->line('view_profile'));
        $this->set("tran_view_commission_details", $this->lang->line('view_commission_details'));
        $this->set("tran_view_income_details", $this->lang->line('view_income_details'));
        $this->set("tran_view_refferal_details", $this->lang->line('view_refferal_details'));
        $this->set("tran_view_income_statement", $this->lang->line('view_income_statement'));
        $this->set("tran_user_account", $this->lang->line('user_account'));
        $this->set("tran_view_ewallet_details", $this->lang->line('view_ewallet_details'));
        $this->set("tran_view_user_epin", $this->lang->line('view_user_epin'));
    }

}

?>
