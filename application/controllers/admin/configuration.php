<?php

require_once 'Inf_Controller.php';

class Configuration extends Inf_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('validation');
        $this->val = new Validation();

        $this->load->model('profile_model');
        $this->load->model('configuration_model');
    }

    function configuration_view($arg = '') {

        $title = $this->lang->line('settings');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "validate_payout_release.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->setScripts();

        $product_status = $this->MODULE_STATUS['product_status'];
        $referal_status = $this->MODULE_STATUS['referal_status'];
        $payout_release_status = $this->MODULE_STATUS['payout_release_status'];
        $obj_arr = $this->configuration_model->getSettings();
        $arr_comm = $this->configuration_model->getLevelSettings();

        $mlm_plan = $this->MODULE_STATUS['mlm_plan'];
        $module_status = array();
        $module_status = $this->configuration_model->getModuleStatus();

        $this->set("obj_arr", $obj_arr);
        $this->set("arr_comm", $arr_comm);
        $this->set("payout_release_status", $payout_release_status);
        $this->set("referal_status", $referal_status);
        $this->set("product_status", $product_status);
        $this->set("mlm_plan", $mlm_plan);
        $this->set("module_status", $module_status);

        if ($arg == 'level') {
            $tab6 = " active";
            $tab2 = $tab3 = $tab1 = $tab4 = $tab5 = $tab7 = "";
        } else if ($this->MODULE_STATUS ['referal_status'] == 'yes') {
            $tab1 = " active";
            $tab2 = $tab3 = $tab4 = $tab5 = $tab6 = $tab7 = "";
        } else {
            $tab1 = " active";
            $tab2 = $tab3 = $tab4 = $tab5 = $tab6 = $tab7 = "";
        }
        if ($this->input->post('setting')) {

            $width_ceiling = $this->input->post('width_cieling');
            $depth_ceiling = $this->input->post('depth_cieling');
            $lev = $this->input->post('levels');

            for ($j = 1; $j <= $lev; $j++) {
                $k_arr[$j] = $this->input->post('level_per' . $j);
            }

            $tds = $this->input->post('tds');
            $pair = $this->input->post('pair');
            $ceiling = $this->input->post('ceiling');
            $service = $this->input->post('service');
            $percentorflat = $this->input->post('val');
            $percentorflatlvlcomsn = $this->input->post('vals');
            $pair_value = $this->input->post('pair_value');
            $product_point_value = $this->input->post('product_point_value');
            if ($this->input->post('product_point_values') != null) {
                $product_point_value = $this->input->post('product_point_values');
                $pair = $this->input->post('pair_values');
            }
            if ($this->input->post('product_point_valuess') != null) {
                $product_point_value = $this->input->post('product_point_valuess');
            }
            if ($pair <= 0)
                $pair = 1;
            if ($product_point_value <= 0)
                $product_point_value = 1;
            $referal_amount = $this->input->post('referal_amount');
            $board_commission = $this->input->post('board_commission');
            $reg_amount = $this->input->post('reg_amount');
            $participation_bonus = $this->input->post('participation_bonus');
            $week_limit = $this->input->post('week_limit');

            //=================for tab redirection
            $active_tab = $this->input->post('active_tab');
            if ($active_tab == 'tab1') {
                $tab2 = " active";
                $tab1 = $tab3 = $tab4 = $tab5 = $tab6 = $tab7 = "";
            } else if ($active_tab == 'tab2') {
                $tab1 = " active";
                $tab2 = $tab3 = $tab4 = $tab5 = $tab6 = $tab7 = "";
            } else if ($active_tab == 'tab3') {
                $tab3 = " active";
                $tab2 = $tab1 = $tab4 = $tab5 = $tab6 = $tab7 = "";
            } else if ($active_tab == 'tab4') {
                $tab4 = " active";
                $tab2 = $tab3 = $tab1 = $tab5 = $tab6 = $tab7 = "";
            } else if ($active_tab == 'tab5') {
                $tab5 = " active";
                $tab2 = $tab3 = $tab1 = $tab4 = $tab6 = $tab7 = "";
            } else if ($active_tab == 'tab6') {
                $tab6 = " active";
                $tab2 = $tab3 = $tab1 = $tab4 = $tab5 = $tab7 = "";
            } else if ($active_tab == 'tab7') {
                $tab7 = " active";
                $tab1 = $tab2 = $tab3 = $tab4 = $tab5 = $tab6 = "";
            } else {
                $tab1 = " active";
                $tab2 = $tab3 = $tab4 = $tab5 = $tab6 = $tab7 = "";
            }
            $this->session->set_userdata("config_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2, "tab3" => $tab3, "tab4" => $tab4, "tab5" => $tab5, "tab6" => $tab6, "tab7" => $tab7));
            //=================
            if ($mlm_plan == "Board") {
                $res = $this->configuration_model->updatSettings($tds, $pair, $ceiling, $service, $pair_value, $product_point_value, $referal_amount, $percentorflat, $reg_amount, $board_commission);
            } else {

                $res = $this->configuration_model->updatSettings($tds, $pair, $ceiling, $service, $pair_value, $product_point_value, $referal_amount, $percentorflat, $reg_amount, '', $percentorflatlvlcomsn, $participation_bonus, $week_limit);
            }
            if ($lev)
                $rec = $this->configuration_model->updatLevelSettings($k_arr);
            if ($res) {


                $login_id = $this->LOG_USER_ID;
                $this->val->insertUserActivity($login_id, 'configuration change', $login_id);

                $msg = $this->lang->line('configuration_updated_successfully');
                $this->redirect($msg, "configuration/configuration_view", true);
            } else {
                $msg = $this->lang->line('error_on_configuration_updation');
                $this->redirect($msg, "configuration/configuration_view", FALSE);
            }
        }


        //for language translation///
        $this->set("tran_referal_amount", $this->lang->line('referal_amount'));
        $this->set("tran_tax_setting", $this->lang->line('tax_setting'));
        $this->set("tran_registration_amount", $this->lang->line('registration_amount'));
        $this->set("tran_commission_setting", $this->lang->line('commission_setting'));
        $this->set("tran_pair_setting", $this->lang->line('pair_setting'));
        $this->set("tran_payout", $this->lang->line('payout'));
        $this->set("tran_payment_setting", $this->lang->line('payment_setting'));
        $this->set("tran_configuration", $this->lang->line('settings'));
        $this->set("tran_pair_price", $this->lang->line('pair_price'));
        $this->set("tran_pair_ceiling", $this->lang->line('pair_ceiling'));
        $this->set("tran_service_charge", $this->lang->line('service_charge'));
        $this->set("tran_product_point_value", $this->lang->line('product_point_value'));
        $this->set("tran_Board_Commission", $this->lang->line('Board_Commission'));
        $this->set("tran_tds", $this->lang->line('tds'));
        $this->set("tran_Minimum_Payout_Amount", $this->lang->line('Minimum_Payout_Amount'));
        $this->set("tran_registration_amount", $this->lang->line('registration_amount'));
        $this->set("tran_Payout_Amount", $this->lang->line('Payout_Amount'));
        $this->set("tran_level_commission", $this->lang->line('level_commission'));
        $this->set("tran_level", $this->lang->line('level'));
        $this->set("tran_commission", $this->lang->line('commission'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_pair_price", $this->lang->line('pair_price'));
        $this->set("tran_pair_percentage_value", $this->lang->line('pair_percentage_value'));
        $this->set("tran_pair_percentage", $this->lang->line('pair_percentage'));
        $this->set("tran_participation_bonus", $this->lang->line('participation_bonus'));
        $this->set("tran_week_limit", $this->lang->line('week_limit'));
        $this->set("tran_this_is_the_amount_of_one_pair", $this->lang->line('this_is_the_amount_of_one_pair'));
        $this->set("tran_the_maximum_pair_ceiling_limit", $this->lang->line('the_maximum_pair_ceiling_limit'));
        $this->set("tran_the_service_charge_percentage", $this->lang->line('the_service_charge_percentage'));
        $this->set("tran_the_tds_percentage", $this->lang->line('the_tds_percentage'));
        $this->set("tran_the_product_point_value1", $this->lang->line('the_product_point_value1'));
        $this->set("tran_the_amount_you_get_when_you_reffer_a_person", $this->lang->line('the_amount_you_get_when_you_reffer_a_person'));
        $this->set("tran_you_must_enter_pay_out_pair_price", $this->lang->line('you_must_enter_pay_out_pair_price'));
        $this->set("tran_you_must_enter_a_valid_pay_out_price", $this->lang->line('you_must_enter_a_valid_pay_out_price'));
        $this->set("tran_you_must_enter_celing_amount", $this->lang->line('you_must_enter_celing_amount'));
        $this->set("tran_you_must_enter_service_charge", $this->lang->line('you_must_enter_service_charge'));
        $this->set("tran_you_must_enter_tds_value", $this->lang->line('you_must_enter_tds_value'));
        $this->set("tran_you_must_enter_product_point_value", $this->lang->line('you_must_enter_product_point_value'));
        $this->set("tran_you_must_enter_referal_amount", $this->lang->line('you_must_enter_referal_amount'));
        $this->set("tran_Minimum_Amount_for_Payout_Release", $this->lang->line('Minimum_Amount_for_Payout_Release'));
        $this->set("tran_minimum_payout_amount", $this->lang->line('minimum_payout_amount'));

        $this->set("tran_payout_method", $this->lang->line('payout_method'));
        $this->set("tran_payout_setting", $this->lang->line('payout_setting'));
        $this->set("tran_daily", $this->lang->line('daily'));
        $this->set("tran_from_e_wallet", $this->lang->line('from_e_wallet'));
        $this->set("tran_from_e_wallet_request", $this->lang->line('from_e_wallet_request'));
        $this->set("tran_e_wallet_request", $this->lang->line('e_wallet_request'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_percentage", $this->lang->line('percentage'));
        $this->set("tran_flat", $this->lang->line('flat'));
        $this->set("tran_type_of_commission", $this->lang->line('type_of_commission'));
        $this->set("tran_width_ceiling", $this->lang->line('width_ceiling'));
        $this->set("tran_depth_ceiling", $this->lang->line('depth_ceiling'));
        $this->set("page_top_header", $this->lang->line('settings'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('settings'));
        $this->set("page_small_header", "");

        $help_link = "commission-settings";
        $this->set("help_link", $help_link);


        if ($this->session->userdata("config_tab_active_arr")) {
            $tab1 = $this->session->userdata['config_tab_active_arr']['tab1'];
            $tab2 = $this->session->userdata['config_tab_active_arr']['tab2'];
            $tab3 = $this->session->userdata['config_tab_active_arr']['tab3'];
            $tab4 = $this->session->userdata['config_tab_active_arr']['tab4'];
            $tab5 = $this->session->userdata['config_tab_active_arr']['tab5'];
            $tab6 = $this->session->userdata['config_tab_active_arr']['tab6'];
            $tab7 = $this->session->userdata['config_tab_active_arr']['tab7'];
            $this->session->unset_userdata("config_tab_active_arr");
        }
        $this->set("tab1", $tab1);
        $this->set("tab2", $tab2);
        $this->set("tab3", $tab3);
        $this->set("tab4", $tab4);
        $this->set("tab5", $tab5);
        $this->set("tab6", $tab6);
        $this->set("tab7", $tab7);

        $this->setView();
    }

    function payout_setting() {

        $title = $this->lang->line('payout_setting');
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


        $payout_release_status = $this->MODULE_STATUS['payout_release_status'];
        $this->set("payout_release_status", $payout_release_status);
        $this->set("tran_payout_setting", $this->lang->line('payout_setting'));

        $obj_arr = $this->configuration_model->getSettings();

        $this->set("obj_arr", $obj_arr);


        if ($this->input->post('setting')) {
            $payout_status = $this->input->post('payout_status');
            $min_payout = $this->input->post('min_payout');
            $payout_validity = $this->input->post('payout_validity');
            if ($payout_validity == 0)
                $payout_validity = 25;

            $res = $this->configuration_model->updateConfiguration($min_payout, $payout_validity, $payout_status);
            if ($res) {


                $login_id = $this->LOG_USER_ID;
                $this->val->insertUserActivity($login_id, 'configuration change', $login_id);


                $module_name = 'payout_release_status';
                $new_status = $payout_status;

                $this->configuration_model->setModuleStatus($module_name, $new_status);


                $msg = $this->lang->line('configuration_updated_successfully');
                $this->redirect($msg, "configuration/payout_setting", true);
            } else {
                $msg = $this->lang->line('error_on_configuration_updation');
                $this->redirect($msg, "configuration/payout_setting", FALSE);
            }
        }


        $this->set("tran_update", $this->lang->line('update'));

        $this->set("tran_Minimum_Payout_Amount", $this->lang->line('Minimum_Payout_Amount'));
        $this->set("tran_payout_method", $this->lang->line('payout_method'));
        $this->set("tran_Minimum_Amount_for_Payout_Release", $this->lang->line('Minimum_Amount_for_Payout_Release'));
        $this->set("tran_minimum_payout_amount", $this->lang->line('minimum_payout_amount'));
        //$this->set("tran_payout_setting", $this->lang->line('payout_setting'));
        $this->set("tran_payout_setting", $this->lang->line('payout_setting'));
        $this->set("tran_daily", $this->lang->line('daily'));
        $this->set("tran_from_e_wallet", $this->lang->line('from_e_wallet'));
        $this->set("tran_from_e_wallet_request", $this->lang->line('from_e_wallet_request'));
        $this->set("tran_e_wallet_request", $this->lang->line('e_wallet_request'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line("payout_settings"));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line("payout_setting"));
        $this->set("tran_Payout_Request_Validity_days", $this->lang->line('Payout_Request_Validity_days'));
        $this->set("tran_Payout_Request_Validity", $this->lang->line('Payout_Request_Validity'));
        $this->set("page_small_header", "");

        $help_link = "network-configuration";
        $this->set("help_link", $help_link);

        $this->setScripts();
        $this->setView();
    }

    function my_referal() {


        $this->ARR_SCRIPT[0]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[0]["type"] = "css";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
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

        $this->ARR_SCRIPT[8]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "header";

        $this->setScripts();
        $title = $this->lang->line('view_my_refferals');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $res = array();
        /*         * *pagination**** */
        $basurl = base_url() . "admin/configuration/my_referal";
        $config['base_url'] = $basurl;
        $config['per_page'] = 100;
        $config['num_links'] = 5;
        $config['uri_segment'] = 4;
        $this->set("view", 'no');
        $mlm_plan = $this->session->userdata['mlm_plan'];
        $this->set('mlm_plan', $mlm_plan);
        //$user_id = $this->session->userdata('user_id');
        $user_type = $this->session->userdata['logged_in']['user_type'];
        $this->set("view", 'yes');
        if ($this->input->post('user_name')) {
            $this->set("view", 'no');
            $user_name = $this->input->post('user_name');
            $this->set("user_name", $user_name);
            if ($this->val->isUserNameAvailable($user_name)) {
                $this->get_user_summary($user_name);
                $user_id = $this->configuration_model->getUserId($user_name);
                $this->session->set_userdata('user_id', $user_id);
            } else {
                $msg = $this->lang->line('invalid_user_name');
                $this->redirect($msg, "profile/user_account", false);
            }
        } else if ($this->input->get('user_name')) {
            $this->set("view", 'no');
            $user_name = $this->input->get('user_name');
            $this->set("user_name", $user_name);
            if ($this->val->isUserNameAvailable($user_name)) {
                $this->get_user_summary($user_name);
                $user_id = $this->configuration_model->getUserId($user_name);
                $this->session->set_userdata('user_id', $user_id);
            } else {
                $msg = $this->lang->line('invalid_user_name');
                $this->redirect($msg, "profile/user_account", false);
            }
        } else {
            $msg = $this->lang->line('invalid_user_name');
            $this->redirect($msg, "profile/user_account", false);
        }
        $user_id = $this->session->userdata('user_id');
        $total_rows = $this->configuration_model->getReferalDetailscount($user_id);
        //echo $total_rows;
        $config['total_rows'] = $total_rows;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $res = $this->configuration_model->getReferalDetails($user_id, $config['per_page'], $page);
        $this->set("arr", $res);
        $count = count($res);
        $this->set("count", $count);
        $result_per_page = $this->pagination->create_links();
        $this->set("result_per_page", $result_per_page);
        //for language translation///
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_users_referal_details", $this->lang->line('users_referal_details'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_referal_details", $this->lang->line('referal_details'));
        $this->set("tran_sl_no", $this->lang->line('sl_no'));

        $this->set("tran_full_name", $this->lang->line('full_name'));
        $this->set("tran_joinig_date", $this->lang->line('joinig_date'));
        $this->set("trans_email", $this->lang->line('email'));
        $this->set("trans_country", $this->lang->line('country'));

        $this->set("tran_no_referels", $this->lang->line('no_referels'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_view_refferal_details", $this->lang->line('view_refferal_details'));
        $this->set("tran_you_must_enter_user_name", $this->lang->line('you_must_enter_user_name'));
        $this->set("tran_no_referels", $this->lang->line('no_referels'));
        $this->set("tran_registration_fee", $this->lang->line('registration_fee'));
        $this->set("page_top_header", $this->lang->line('users_referal_details'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('users_referal_details'));
        $this->set("page_small_header", "");
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_nofond", $this->lang->line('nofond'));
        $this->set("tran_showing", $this->lang->line('showing'));
        $this->set("tran_to", $this->lang->line('to'));
        $this->set("tran_of", $this->lang->line('of'));
        $this->set("tran_entries", $this->lang->line('entries'));
        $this->set("tran_notavailable", $this->lang->line('notavailable'));

        $help_link = "view-my-referrals";
        $this->set("help_link", $help_link);

        $this->setView();
    }

    function set_referal_status() {

        $this->ARR_SCRIPT[0]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";


        $referal_status = $this->MODULE_STATUS['referal_status'];
        $this->set("referal_status", $referal_status);
        $title = $this->lang->line('referal_income_status');
        $this->set("title", "$this->COMPANY_NAME | $title");
        //$this->configuration_model->initialize();
        if ($this->input->post('set_referal_status')) {
            $ref_status = $this->input->post('referal_status');

            $res = $this->configuration_model->setReferalStatus($ref_status);
            if ($res) {
                $msg = $this->lang->line('Referral_status_Updated_Successfully');
                $this->redirect($msg, "configuration/set_referal_status", true);
            } else {
                $msg = $this->lang->line('Error_on_updating_referral_status_please_try_again');
                $this->redirect($msg, "configuration/set_referal_status", false);
            }
        }

        $this->set("tran_referral_status", $this->lang->line('referal_income_status'));
        $this->set("tran_yes", $this->lang->line('yes'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_set_referral_status", $this->lang->line('set_referral_status'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('referral_status'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('referral_status'));
        $this->set("page_small_header", "");

        $help_link = "set_referal_status";
        $this->set("help_link", $help_link);

        $this->setScripts();
        $this->setView();
    }

    function set_module_status() {

        $title = $this->lang->line('Set_Module_Status');
        $this->set("title", "$this->COMPANY_NAME | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        //$sponsor_tree_status = $this->menu->getSubMenuStatus(58);
        $referal_status = $this->MODULE_STATUS['referal_status'];
        $ewallet_status = $this->MODULE_STATUS['ewallet_status'];
        $employee_status = $this->MODULE_STATUS['employee_status'];
        $sms_status = $this->MODULE_STATUS['sms_status'];
        $payout_release_status = $this->MODULE_STATUS['payout_release_status'];
        $upload_status = $this->MODULE_STATUS['upload_status'];
        $lang_status = $this->MODULE_STATUS['lang_status'];
        $help_status = $this->MODULE_STATUS['help_status'];
        $statcounter_status = $this->MODULE_STATUS['statcounter_status'];
        $footer_demo_status = $this->MODULE_STATUS['footer_demo_status'];

        $pin_status = $this->MODULE_STATUS['pin_status'];
        $product_status = $this->MODULE_STATUS['product_status'];
        $sponsor_tree_status = $this->MODULE_STATUS['sponsor_tree_status'];
        $payout_release = $this->configuration_model->getPayOutTypes();
        $rank_status = $this->MODULE_STATUS['rank_status'];
        $eng_status = $this->MODULE_STATUS['lang_status'];
        $captcha_status = $this->MODULE_STATUS['captcha_status'];
        $sponsor_commission_status = $this->MODULE_STATUS['sponsor_commission_status'];
        //$this->LANG["lang"]=$lang_status;
        $this->set('lang_status', $lang_status);
        $this->set('help_status', $help_status);
        //$this->set('ewallet_status', $ewallet_status);
        ///////language translation/////////
        $this->set("tran_referral_status", $this->lang->line('referral_status'));
        $this->set("tran_binary_payout_release", $this->lang->line('binary_payout_release'));
        $this->set("tran_upload_document", $this->lang->line('upload_document'));
        $this->set("tran_sms", $this->lang->line('sms'));
        $this->set("tran_employee", $this->lang->line('employee'));
        $this->set("tran_referal_income", $this->lang->line('referal_income'));
        $this->set("tran_set_module_status", $this->lang->line('set_module_status'));
        $this->set("tran_ewallet", $this->lang->line('ewallet'));
        $this->set("tran_from_e_wallet_request", $this->lang->line('from_e_wallet_request'));
        $this->set("tran_from_e_wallet", $this->lang->line('from_e_wallet'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_daily", $this->lang->line('daily'));
        $this->set("tran_level_commission", $this->lang->line('level_commission'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_sponsor_tree", $this->lang->line('sponsor_tree'));
        $this->set("tran_product_status", $this->lang->line('product'));
        $this->set("tran_payment_option", $this->lang->line('payment_option'));
        $this->set("tran_using_ewallet", $this->lang->line('using_ewallet'));
        $this->set("tran_using_ePin", $this->lang->line('using_ePin'));
        $this->set("tran_using_credit_card", $this->lang->line('using_credit_card'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_referal_status", $this->lang->line('referal_status'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_free_joining", $this->lang->line('free_joining'));
        $this->set("tran_credit_card", $this->lang->line('credit_card'));
        $this->set("tran_rank", $this->lang->line('rank'));
        $this->set("tran_help", $this->lang->line('help'));
        $this->set("tran_language_settings", $this->lang->line('language_settings'));
        $this->set("tran_footer_demo_status", $this->lang->line('footer_demo_status'));
        $this->set("tran_multi_language", $this->lang->line('multi_language'));
        $this->set("tran_referal_income_status", $this->lang->line('referal_income_status'));
        $this->set("tran_e_wallet", $this->lang->line('e_wallet'));
        $this->set("tran_epin_management", $this->lang->line('epin_management'));


        $this->set("sponsor_tree_status", $sponsor_tree_status);
        $this->set("referal_status", $referal_status);
        $this->set("ewallet_status", $ewallet_status);
        $this->set("employee_status", $employee_status);
        $this->set("sms_status", $sms_status);
        $this->set("payout_release_status", $payout_release_status);
        $this->set("upload_status", $upload_status);
        $this->set("payout_release", $payout_release);
        $this->set("pin_status", $pin_status);
        $this->set("rank_status", $rank_status);
        $this->set("product_status", $product_status);
        $this->set("lang_status", $lang_status);
        $this->set("help_status", $help_status);
        $this->set("statcounter_status", $statcounter_status);
        $this->set("footer_demo_status", $footer_demo_status);
        $this->set("captcha_status", $captcha_status);
        $this->set("sponsor_commission_status", $sponsor_commission_status);

        $this->set("tran_others", $this->lang->line('others'));
        $this->set("tran_payout_settings", $this->lang->line('payout_settings'));
        $this->set("tran_change_depth_ceiling", $this->lang->line('change_depth_ceiling'));
        $this->set("tran_depth_ceiling_settings", $this->lang->line('depth_ceiling_settings'));
        $this->set("tran_change_payout_settings", $this->lang->line('change_payout_settings'));
        $this->set("tran_add_new_epin_amount", $this->lang->line('add_new_epin_amount'));

        $this->set("tran_Ewallet", $this->lang->line('ewallet'));
        $this->set("tran_payout_release", $this->lang->line('payout_release'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_enable", $this->lang->line('enable'));
        $this->set("tran_disable", $this->lang->line('disable'));
        $this->set("page_top_header", $this->lang->line('set_module_status'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('set_module_status'));
        $this->set("page_small_header", "");

        $help_link = "module-status";
        $this->set("help_link", $help_link);

        $module_status = array();

        $module_status = $this->configuration_model->getLanguageStatus();
        $this->set("module_status", $module_status);
        //$this->LANG_STATUS=$module_status['lang_status'];
        //$this->set("LANG_STATUS",$this->LANG_STATUS);


        if ($this->input->post('set_module_status')) {


            $module_name = $this->input->post('module_name');
            $new_status = $this->input->post('module_status');

            $res = $this->configuration_model->setModuleStatus($module_name, $new_status);

            if ($res) {

                $login_id = $this->LOG_USER_ID;
                $this->val->insertUserActivity($login_id, 'module status change', $login_id);
                $msg = $this->lang->line('Module_Status_Updated_Successfully');
                $this->redirect($msg, "configuration/set_module_status", true);
            } else {
                $msg = $this->lang->line('Error_on_updating_Module_status_please_try_again');
                $this->redirect($msg, "configuration/set_module_status", false);
            }
        }



        $this->set("tran_yes", $this->lang->line('yes'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->setScripts();
        $this->setView();
    }

    function letter_config($lang_id = '') {


        $title = $this->lang->line('letter_configuration');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";


        $this->ARR_SCRIPT[1]["name"] = "tooltip/standalone.css";
        $this->ARR_SCRIPT[1]["type"] = "css";
        $this->ARR_SCRIPT[1]["loc"] = "header";


        $this->ARR_SCRIPT[2]["name"] = "tooltip/tooltip-generic.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "tooltip/change.css";
        $this->ARR_SCRIPT[3]["type"] = "css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "jseditor/jHtmlArea-0.7.0.min.js";
        $this->ARR_SCRIPT[4]["type"] = "js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "jseditor/getfilename.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "jseditor/editor.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "editor/text_area_toolbar.css";
        $this->ARR_SCRIPT[7]["type"] = "css";
        $this->ARR_SCRIPT[7]["loc"] = "header";

        $this->ARR_SCRIPT[8]["name"] = "editor/jHtmlArea.css";
        $this->ARR_SCRIPT[8]["type"] = "css";
        $this->ARR_SCRIPT[8]["loc"] = "header";

        $this->ARR_SCRIPT[9]["name"] = "jseditor/HtmlArea-0.7.0.js";
        $this->ARR_SCRIPT[9]["type"] = "js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        $this->ARR_SCRIPT[10]["name"] = "configuration.js";
        $this->ARR_SCRIPT[10]["type"] = "js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->setScripts();


        $product_status = $this->MODULE_STATUS['product_status'];
        $this->set("product_status", $product_status);

        //for language translation///
        $this->set("tran_letter_configuration", $this->lang->line('letter_configuration'));
        $this->set("tran_company_name", $this->lang->line('company_name'));
        $this->set("tran_company_address", $this->lang->line('company_address'));
        $this->set("tran_main_matter", $this->lang->line('main_matter'));
        $this->set("tran_logo", $this->lang->line('logo'));
        $this->set("tran_matter_for_product_release", $this->lang->line('matter_for_product_release'));
        $this->set("tran_place", $this->lang->line('place'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_you_must_enter_company_name", $this->lang->line('you_must_enter_company_name'));
        $this->set("tran_you_must_company_address", $this->lang->line('you_must_company_address'));
        $this->set("tran_you_must_enter_main_matter", $this->lang->line('you_must_enter_main_matter'));
        $this->set("tran_you_must_enter_product_matter", $this->lang->line('you_must_enter_product_matter'));
        $this->set("tran_you_must_enter_place", $this->lang->line('you_must_enter_place'));
        $this->set("tran_from_address", $this->lang->line('from_address'));
        $this->set("tran_main_matter", $this->lang->line('main_matter'));
        $this->set("tran_replay_message_for_welcome_letter", $this->lang->line('replay_message_for_welcome_letter'));
        $this->set("tran_update_configuration", $this->lang->line('update_configuration'));
        $this->set("tran_Select_a_Language", $this->lang->line('Select_a_Language'));
        $this->set("tran_terms_and_conditions", $this->lang->line('terms_and_conditions'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line(''));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line(''));
        $this->set("page_small_header", "");
        if ($lang_id == '')
            $lang_id = $this->LANG_ID;
        $this->set("lang_id", $lang_id);

        $letter_arr = $this->configuration_model->getLetterSetting($lang_id);
        $this->set("letter_arr", $letter_arr);
        //echo $post['company_add'];
        if ($this->input->post('setting')) {

            $post = $this->input->post();
            //print_r($this->input->post());
            if ($_FILES['userfile']['error'] != 4) {

                //print_r($_FILES['userfile']);

                $config['upload_path'] = './public_html/images/logos/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()) {

                    $error = array('error' => $this->upload->display_errors());
                    $msg = $this->lang->line('image_not_selectedvvv');
                    $this->redirect($msg, "configuration/letter_config", FALSE);
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $post['logo_name'] = $data['upload_data']['file_name'];
                }
            }
            $lang_id = $post['lang_id'];
            $res = $this->configuration_model->updateLetterSetting($post);
            if ($res) {
                $msg = $this->lang->line('configuration_updated_successfully_preview');
                $this->redirect($msg, "configuration/preview/$lang_id", TRUE);
            } else {
                $msg = $this->lang->line('error_on_configuration_updation');
                $this->redirect($msg, "configuration/letter_config/$lang_id", FALSE);
            }
        }


        $this->setView();
    }

    function preview($lang_id = '') {

        $title = $this->lang->line('letter_preview');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->ARR_SCRIPT[0]["name"] = "jseditor/jHtmlArea-0.7.0.min.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        if ($lang_id == '') {
            $lang_id = $this->LANG_ID;
        }
        $this->set("lang_id", $lang_id);
        $letter_arr = $this->configuration_model->getLetterSetting($lang_id);
        $this->set("letter_arr", $letter_arr);
        $product_status = $this->MODULE_STATUS['product_status'];
        $referal_status = $this->MODULE_STATUS['referal_status'];
        $this->set("product_status", $product_status);
        $this->set("referal_status", $referal_status);
        $date = date("Y-m-d");
        $this->set("Date", $date);


        //for language translation///
        $this->set("tran_distributers_name", $this->lang->line('distributers_name'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_date_of_joining", $this->lang->line('date_of_joining'));
        $this->set("tran_phone_number", $this->lang->line('phone_number'));
        $this->set("tran_nominee", $this->lang->line('nominee'));
        $this->set("tran_pan_number", $this->lang->line('pan_number'));
        $this->set("tran_sponsor", $this->lang->line('sponsor'));
        $this->set("tran_package", $this->lang->line('package'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_winning_regards", $this->lang->line('winning_regards'));
        $this->set("tran_admin", $this->lang->line('admin'));
        $this->set("tran_place", $this->lang->line('place'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_Placment_ID", $this->lang->line('Placment_ID'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line(''));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line(''));
        $this->set("page_small_header", "");

        $help_link = "Preview";
        $this->set("help_link", $help_link);
        $this->setScripts();
        $this->setView();
    }

    function termsconditions_config($lang_id = '') {

        $title = $this->lang->line('terms_and_conditions');

        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "jseditor/jHtmlArea-0.7.0.min.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "jseditor/getfilename.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "jseditor/editor.js";
        $this->ARR_SCRIPT[2]["type"] = "js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "editor/text_area_toolbar.css";
        $this->ARR_SCRIPT[3]["type"] = "css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "editor/jHtmlArea.css";
        $this->ARR_SCRIPT[4]["type"] = "css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "jseditor/jHtmlArea.ColorPickerMenu-0.7.0.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "editor/jHtmlArea.ColorPickerMenu.css";
        $this->ARR_SCRIPT[6]["type"] = "css";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "jseditor/HtmlArea-0.7.0.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "configuration.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->setScripts();

        if ($lang_id == '')
            $lang_id = $this->LANG_ID;

        $this->set("lang_id", $lang_id);
        $terms = $this->configuration_model->getTermsConditionsSettings($lang_id);
        $this->set("terms", $terms);

        if ($this->input->post('settings')) {
            $post = $this->input->post();
            $lang_id = $post['lang_id'];
            $resu = $this->configuration_model->updateTermsConditionsSettings($post);
            if ($resu) {
                $msg = $this->lang->line('terms_and_conditions_successfull');
                $this->redirect($msg, "configuration/termsconditions_config/$lang_id", TRUE);
            } else {
                $msg = $this->lang->line('error_on_terms_and_conditions_updation');
                $this->redirect($msg, "configuration/termsconditions_config/$lang_id", FALSE);
            }
        }
        //for language translation///
        $this->set("tran_terms_and_condition_configuration", $this->lang->line('terms_and_condition_configuration'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_Select_a_Language", $this->lang->line('Select_a_Language'));
        $this->set("tran_terms_and_conditions", $this->lang->line('terms_and_conditions'));

        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line(''));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line(''));
        $this->set("page_small_header", "");
        $this->setView();
    }

    function site_information() {

        $title = $this->lang->line('site_information');
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

        $this->ARR_SCRIPT[5]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.css";
        $this->ARR_SCRIPT[5]["type"] = "plugins/css";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "bootstrap-social-buttons/social-buttons-3.css";
        $this->ARR_SCRIPT[6]["type"] = "plugins/css";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.js";
        $this->ARR_SCRIPT[7]["type"] = "plugins/js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "jquery.pulsate/jquery.pulsate.min.js";
        $this->ARR_SCRIPT[8]["type"] = "plugins/js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[9]["type"] = "css";
        $this->ARR_SCRIPT[9]["loc"] = "header";

        $this->ARR_SCRIPT[10]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[10]["type"] = "js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->ARR_SCRIPT[11]["name"] = "validate_configurate.js";
        $this->ARR_SCRIPT[11]["type"] = "js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

        $this->setScripts();

        $lang = $this->configuration_model->getLanguages();
        $this->set('lang', $lang);
        $def_lang = $this->configuration_model->getDefaultLang();
        $this->set('default_lang', $def_lang);
        $site_info_arr = $this->configuration_model->getSiteConfiguration();
        $this->set("site_info_arr", $site_info_arr);
        $thumbnaill = $site_info_arr["logo"];
        $thumbnail = $site_info_arr["favicon"];

        if (($this->input->post('site'))) {
            $nam = $this->input->post('co_name');
            $address = $this->input->post('company_address');
            $def_lang = $this->input->post('def_lang');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');

            $config['upload_path'] = './public_html/images/logos/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size'] = '2000000';
            $config['remove_spaces'] = true;
            $config['overwrite'] = false;

            $this->load->library('upload', $config);
            $msg = "";

            if (!$this->upload->do_upload('img_logo')) {
                $msg = $this->lang->line('image_not_selected');
                $error = array('error' => $this->upload->display_errors());
                //$this->redirect($msg, "configuration/site_information", FALSE);
            } else {
                $image_arr = array('upload_data' => $this->upload->data());
                $new_file_name = $image_arr['upload_data']['file_name'];
                $image = $image_arr['upload_data'];
                if ($image['file_name']) {
                    $data['photo'] = "public_html/images/logos/" . $image['file_name'];
                    $data['raw'] = $image['raw_name'];
                    $data['ext'] = $image['file_ext'];
                }

                //thumbnail creation start
                $config1['image_library'] = 'gd2';
                $config1['source_image'] = $image['full_path'];
                $config1['create_thumb'] = TRUE;
                $config1['maintain_ratio'] = FALSE;
                $config1['width'] = 20;
                $config1['height'] = 20;

                $this->load->library('image_lib', $config1);
                $this->image_lib->initialize($config1);
                if (!$this->image_lib->resize()) {

                    $msg = $this->lang->line('image_cannot_be_uploaded');
                    $this->redirect($msg, "configuration/site_information", FALSE);
                } else {
                    // get file THUMBNAIL image name //
                    $thumbnail = $image_arr['upload_data']['raw_name'] . '_thumb' . $image_arr['upload_data']['file_ext'];
                }
                //THUMBNAIL ENDS
            }


            if (!$this->upload->do_upload('favicon')) {
                $msg = $this->lang->line('image_not_selected');
                $error = array('error' => $this->upload->display_errors());
                //$this->redirect($msg, "configuration/site_information", FALSE);
            } else {
                $image_arr = array('upload_data' => $this->upload->data());
                $new_file_name = $image_arr['upload_data']['file_name'];
                $image = $image_arr['upload_data'];

                if ($image['file_name']) {
                    $data['photo'] = "public_html/images/logos/" . $image['file_name'];
                    $data['raw'] = $image['raw_name'];
                    $data['ext'] = $image['file_ext'];
                }

                //thumbnail creation start
                $config1['image_library'] = 'gd2';
                $config1['source_image'] = $image['full_path'];
                $config1['create_thumb'] = TRUE;
                $config1['maintain_ratio'] = FALSE;
                $config1['width'] = 90;
                $config1['height'] = 26;

                $this->load->library('image_lib', $config1);
                $this->image_lib->initialize($config1);
                if (!$this->image_lib->resize()) {
                    $msg = $this->lang->line('image_cannot_be_uploaded');
                    $this->redirect($msg, "configuration/site_information", FALSE);
                } else {
                    // get file THUMBNAIL image name //
                    $thumbnaill = $image_arr['upload_data']['raw_name'] . '_thumb' . $image_arr['upload_data']['file_ext'];
                    // $res = $this->configuration_model->siteConfiguration($nam,$email,$phone,  $thumbnaill);
                }
                //THUMBNAIL ENDS
            }

            $res = $this->configuration_model->siteConfiguration($nam, $address, $def_lang, $email, $phone, $thumbnaill, $thumbnail);
            if ($res) {
                $msg = $this->lang->line('site_configuration_completed');
                $this->redirect($msg, "configuration/site_information", TRUE);
            } else {
                $msg = $this->lang->line('error_on_site_configuration');
                $this->redirect($msg, "configuration/site_information", FALSE);
            }
        }

        //for language translation///
        $this->set("tran_select_image", $this->lang->line('select_image'));
        $this->set("tran_site_information", $this->lang->line('site_information'));
        $this->set("tran_company_name", $this->lang->line('company_name'));
        $this->set("tran_company_address", $this->lang->line('company_address'));
        $this->set("tran_default_language", $this->lang->line('tran_default_language'));
        $this->set("tran_icon", $this->lang->line('icon'));
        $this->set("tran_logo", $this->lang->line('logo'));
        $this->set("tran_phone", $this->lang->line('phone'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_you_must_enter_company_name", $this->lang->line('you_must_enter_company_name'));
        $this->set("tran_you_must_enter_the_company_address", $this->lang->line('you_must_enter_the_company_address'));
        $this->set("tran_non_valid_file", $this->lang->line('non_valid_file'));
        $this->set("tran_only_png_jpg", $this->lang->line('only_png_jpg'));
        $this->set("tran_you_must_enter_email", $this->lang->line('you_must_enter_email'));
        $this->set("tran_you_must_enter_valid_email", $this->lang->line('you_must_enter_valid_email'));
        $this->set("tran_you_must_enter_phone", $this->lang->line('you_must_enter_phone'));
        $this->set("tran_you_must_enter_valid_phone", $this->lang->line('you_must_enter_valid_phone'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('site_information'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('site_information'));
        $this->set("page_small_header", "");

        $help_link = "site-information";
        $this->set("help_link", $help_link);

        $this->setView();
    }

    function pin_config() {

        $title = $this->lang->line('epin_settings');
        $this->set("title", $this->COMPANY_NAME . " | $title ");
        $this->set("current_url", $this->CURRENT_URL);


        $this->ARR_SCRIPT[0]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        //for language translation///
        $this->set("tran_e_pin_configuration", $this->lang->line('epin_settings'));
        $this->set("tran_value_of_e_pin", $this->lang->line('value_of_e_pin'));
        $this->set("tran_e_pin_length", $this->lang->line('e_pin_length'));
        $this->set("tran_maximun_active_e_pin", $this->lang->line('maximun_active_e_pin'));
        $this->set("tran_e_pin_character_set", $this->lang->line('e_pin_character_set'));
        $this->set("tran_alphabets", $this->lang->line('alphabets'));
        $this->set("tran_numerals", $this->lang->line('numerals'));
        $this->set("tran_alphanumerals", $this->lang->line('alphanumerals'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_the_no_of_characters_in_e_pin", $this->lang->line('the_no_of_characters_in_e_pin'));
        $this->set("tran_the_maximum_no_of_active_e_pin_at_a_time", $this->lang->line('the_maximum_no_of_active_e_pin_at_a_time'));
        $this->set("tran_you_must_enter_e_pin_length", $this->lang->line('you_must_enter_e_pin_length'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('epin_settings'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('epin_settings'));
        $this->set("page_small_header", "");

        $help_link = "e-pin-settings";
        $this->set("help_link", $help_link);

        $this->setScripts();

        $pin_status = $this->MODULE_STATUS['pin_status'];
        $prod_status = $this->MODULE_STATUS['product_status'];
        $this->set('prod_status', $prod_status);
        if ($pin_status == "yes") {
            $pin_config = $this->configuration_model->getPinConfig();
            $this->set("pin_config", $pin_config);
            //print_r($pin_config);
            if ($this->input->post('update')) {
                $pin_value = $this->input->post('pin_value');
                //$pin_length = $this->input->post('pin_length');
                $pin_character_set = $this->input->post('pin_character');
                $pin_maxcount = $this->input->post('pin_maxcount');
                $pin_length = 10;
                if (is_numeric($pin_maxcount)) {
                    $res = $this->configuration_model->setPinConfig($pin_value, $pin_length, $pin_maxcount, $pin_character_set);
                }
                if ($res) {
                    $msg = $this->lang->line('pin_configuration_updated_sucessfully');
                    $this->redirect($msg, "configuration/pin_config", true);
                } else {
                    $msg = $this->lang->line('error_on_updating_configuration_please_try_again');
                    $this->redirect($msg, "configuration/pin_config", false);
                }
            }
        }

        $this->setView();
    }

    function username_config() {


        $title = $this->lang->line('username_setting');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->set("current_url", $this->CURRENT_URL);

        $this->ARR_SCRIPT[0]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $username_config = $this->configuration_model->getUsernameConfig();
        $this->set("username_config", $username_config);
        $this->setScripts();

        if ($this->input->post('update')) {
            $type = $this->input->post('user_name_type');
            if ($this->input->post('user_name_type') == 'static') {
                $res = $this->configuration_model->setUsernametype($type);
            } else {
                $length = $this->input->post('length');
                $prefix_status = $this->input->post('prefix_status');
                if ($prefix_status == "yes") {
                    $prefix = $this->input->post('prefix');
                    // echo $prefix;die();
                } else {
                    $prefix = "";
                }
                if ($length != "" && is_numeric($length) && $length >= 6 && $length <= 10) {
                    if ($prefix_status == "yes") {
                        if (strlen($prefix) >= 3 && strlen($prefix) <= 15) {
                            $res = $this->configuration_model->setUsernameConfig($length, $prefix_status, $prefix, $type);
                        } else {
                            $msg = $this->lang->line('Error_on_updating_Username_configuration_please_try_again');
                            $this->redirect($msg, "configuration/username_config", false);
                        }
                    } else {
                        $res = $this->configuration_model->setUsernameConfig($length, $prefix_status, $prefix, $type);
                    }
                }
            }
            if ($res) {

                $msg = $this->lang->line('user_name_configuration_updated_succesfully');
                $this->redirect($msg, "configuration/username_config", true);
            } else {
                $msg = $this->lang->line('error_on_updating_user_name_configuration_please_try_again');
                $this->redirect($msg, "configuration/username_config", false);
            }
        }
        //for language translation///
        $this->set("tran_site_information", $this->lang->line('site_information'));
        $this->set("tran_user_name_configuration", $this->lang->line('username_setting'));
        $this->set("tran_user_name_length", $this->lang->line('user_name_length'));
        $this->set("tran_do_you_want_user_name_prefix", $this->lang->line('do_you_want_user_name_prefix'));
        $this->set("tran_user_length_title", $this->lang->line('user_length_title'));
        $this->set("tran_You_can_set_the_username_prefix", $this->lang->line('You_can_set_the_username_prefix'));
        $this->set("tran_The_username_do_not_have_a_character_prefix", $this->lang->line('The_username_do_not_have_a_character_prefix'));
        $this->set("tran_Static", $this->lang->line('Static'));
        $this->set("tran_Dynamic", $this->lang->line('Dynamic'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_you_must_enter_user_name_length", $this->lang->line('you_must_enter_user_name_length'));
        $this->set("tran_user_name_length_should_be", $this->lang->line('user_name_length_should_be'));
        $this->set("tran_you_must_enter_user_name_prefix", $this->lang->line('you_must_enter_user_name_prefix'));
        $this->set("tran_invalid_user_name_prefix", $this->lang->line('invalid_user_name_prefix'));
        $this->set("tran_yes", $this->lang->line('yes'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_select_a_user_name_type", $this->lang->line('select_a_user_name_type'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('username_setting'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('username_setting'));
        $this->set("page_small_header", "");

        $help_link = "username-settings";
        $this->set("help_link", $help_link);

        $this->setView();
    }

    function getUsernamePrefix() {

        $prefix = $this->configuration_model->getUsernamePrefix();
        if ($prefix != "") {
            echo $prefix;
        }
        exit();
    }

    function content_management($lang_id = '') {

        $title = $this->lang->line('terms_and_conditions');

        $this->set("title", $this->COMPANY_NAME . " | $title");

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

        $this->ARR_SCRIPT[4]["name"] = "jQuery-Smart-Wizard/js/jquery.smartWizard.js";
        $this->ARR_SCRIPT[4]["type"] = "plugins/js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "ckeditor/ckeditor.js";
        $this->ARR_SCRIPT[5]["type"] = "plugins/js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "ckeditor/adapters/jquery.js";
        $this->ARR_SCRIPT[6]["type"] = "plugins/js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "ckeditor/contents.css";
        $this->ARR_SCRIPT[7]["type"] = "plugins/css";
        $this->ARR_SCRIPT[7]["loc"] = "header";

        $this->ARR_SCRIPT[8]["name"] = "configuration.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[9]["type"] = "js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";


        $this->setScripts();

        if ($lang_id == '')
            $lang_id = $this->LANG_ID;

        $this->set("lang_id", $lang_id);
        $terms = $this->configuration_model->getTermsConditionsSettings($lang_id);
        $this->set("terms", $terms);
        $tab1 = " active";
        $tab2 = "";

        if ($this->input->post('settings')) {
            $tab1 = "";
            $tab2 = " active";
            $this->session->set_userdata("content_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2));
            $post = $this->input->post();
            $lang_id = $post['lang_id'];
            $resu = $this->configuration_model->updateTermsConditionsSettings($post);
            if ($resu) {
                $msg = $this->lang->line('terms_and_conditions_successfull');
                $this->redirect($msg, "configuration/content_management/$lang_id", TRUE);
            } else {
                $msg = $this->lang->line('error_on_terms_and_conditions_updation');
                $this->redirect($msg, "configuration/content_management/$lang_id", FALSE);
            }
        }
        //for language translation///
        $this->set("tran_terms_and_condition_configuration", $this->lang->line('terms_and_condition_configuration'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_Select_a_Language", $this->lang->line('Select_a_Language'));
        $this->set("tran_terms_and_conditions", $this->lang->line('terms_and_conditions'));

        $title = $this->lang->line('letter_configuration');
        $this->set("title", $this->COMPANY_NAME . " | $title");


        $product_status = $this->MODULE_STATUS['product_status'];
        $this->set("product_status", $product_status);

        //for language translation///
        $this->set("tran_terms", $this->lang->line('terms_&_conditions'));
        $this->set("tran_select_image", $this->lang->line('select_image'));
        $this->set("tran_welcome_letter", $this->lang->line('welcome_letter'));
        $this->set("tran_letter_configuration", $this->lang->line('letter_configuration'));
        $this->set("tran_company_name", $this->lang->line('company_name'));
        $this->set("tran_company_address", $this->lang->line('company_address'));
        $this->set("tran_main_matter", $this->lang->line('main_matter'));
        $this->set("tran_logo", $this->lang->line('logo'));
        $this->set("tran_matter_for_product_release", $this->lang->line('matter_for_product_release'));
        $this->set("tran_place", $this->lang->line('place'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_you_must_enter_company_name", $this->lang->line('you_must_enter_company_name'));
        $this->set("tran_you_must_company_address", $this->lang->line('you_must_company_address'));
        $this->set("tran_you_must_enter_main_matter", $this->lang->line('you_must_enter_main_matter'));
        $this->set("tran_you_must_enter_product_matter", $this->lang->line('you_must_enter_product_matter'));
        $this->set("tran_you_must_enter_place", $this->lang->line('you_must_enter_place'));
        $this->set("tran_from_address", $this->lang->line('from_address'));
        $this->set("tran_main_matter", $this->lang->line('main_matter'));
        $this->set("tran_replay_message_for_welcome_letter", $this->lang->line('replay_message_for_welcome_letter'));
        $this->set("tran_update_configuration", $this->lang->line('update_configuration'));
        $this->set("tran_Select_a_Language", $this->lang->line('Select_a_Language'));
        $this->set("tran_terms_and_conditions", $this->lang->line('terms_and_conditions'));
        $this->set("tran_content_management", $this->lang->line('content_management'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_you_must_select_a_logo", $this->lang->line('you_must_select_a_logo'));

        $this->set("page_top_header", $this->lang->line('content_management'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('content_management'));
        $this->set("page_small_header", "");



        $help_link = "content-management";
        $this->set("help_link", $help_link);

        if ($lang_id == '')
            $lang_id = $this->LANG_ID;
        $this->set("lang_id", $lang_id);

        $letter_arr = $this->configuration_model->getLetterSetting($lang_id);
        $this->set("letter_arr", $letter_arr);

        if ($this->input->post('setting')) {
            // print_r($_FILES);die();
            $post = $this->input->post();

            if ($_FILES['userfile']['error'] != 4) {
                $config['upload_path'] = './public_html/images/logos/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()) {

                    $error = array('error' => $this->upload->display_errors());
                    $msg = $this->lang->line('image_not_selected');
                    $this->redirect($msg, "configuration/content_management", FALSE);
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $post['logo_name'] = $data['upload_data']['file_name'];
                }
            }
            $lang_id = $post['lang_id'];
            $res = $this->configuration_model->updateLetterSetting($post);
            if ($res) {
                $msg = $this->lang->line('configuration_updated_successfully_preview');
                $this->redirect($msg, "configuration/preview/$lang_id", TRUE);
            } else {
                $msg = $this->lang->line('error_on_configuration_updation');
                $this->redirect($msg, "configuration/content_management/$lang_id", FALSE);
            }
        }
        if ($this->session->userdata("content_tab_active_arr")) {

            $tab1 = $this->session->userdata['content_tab_active_arr']['tab1'];
            $tab2 = $this->session->userdata['content_tab_active_arr']['tab2'];
            $this->session->unset_userdata("content_tab_active_arr");
        }
        $this->set("tab1", $tab1);
        $this->set("tab2", $tab2);
        $this->setView();
    }

    function set_payout_release_date() {

        $title = $this->lang->line('Set_Module_Status');
        $this->set("title", "$this->COMPANY_NAME | $title");
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


        $this->ARR_SCRIPT[6]["name"] = "validate_Date.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";




        $referal_status = $this->MODULE_STATUS['referal_status'];
        $ewallet_status = $this->MODULE_STATUS['ewallet_status'];
        $employee_status = $this->MODULE_STATUS['employee_status'];
        $sms_status = $this->MODULE_STATUS['sms_status'];
        $upload_status = $this->MODULE_STATUS['upload_status'];
        $payout_release_status = $this->MODULE_STATUS['payout_release_status'];
        $pin_status = $this->MODULE_STATUS['pin_status'];
        $product_status = $this->MODULE_STATUS['product_status'];
        $lang_status = $this->MODULE_STATUS['lang_status'];
        $payout_release = $this->configuration_model->getPayOutTypes();
//echo $payout_release;die();
        $this->set("referal_status", $referal_status);
        $this->set("ewallet_status", $ewallet_status);
        $this->set("employee_status", $employee_status);
        $this->set("sms_status", $sms_status);
        $this->set("payout_release", $payout_release);
        $this->set("payout_release_status", $payout_release_status);
        $this->set("upload_status_now", $upload_status);

        $this->set("product_status", $product_status);
        $this->set("pin_status", $pin_status);
        $this->set("tran_set_payout_release_date", $this->lang->line('set_payout_release_date'));
        $this->set("page_top_header", $this->lang->line('set_payout_release_date'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('set_payout_release_date'));
        $this->set("page_small_header", "");
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_payout_release_date_set_successfully", $this->lang->line('payout_release_date_set_successfully'));



        if ($this->input->post('payoutdate')) {

            $payout_release = $this->configuration_model->getPayOutTypes();
            $mdate1 = $this->input->post('mdate1');
            $mdate2 = $this->input->post('mdate2');
            $date1 = $this->input->post('date1');
            $date2 = $this->input->post('date2');
            if ($payout_release == "monthly") {
                $mntharr = $this->configuration_model->getmonth($mdate1, $mdate2);
                $res = $this->configuration_model->insertmonth($mntharr);
            }

            if ($payout_release == "week") {
                $weekdayNumber = 0;


                $s = $this->configuration_model->getDateForSpecificDayBetweenDates($date1, $date2, $weekdayNumber);
                //print_r($s);die();
                $res = $this->configuration_model->insertdate($s);
            }

            if ($res) {
                $msg = 'Payout release set successfully';
                $this->redirect($msg, "configuration/set_payout_release_date", true);
            } else {
                $msg = "Failed to set payout release date";
                $this->redirect($msg, "configuration/set_payout_release_date", false);
            }
        }


        $this->set("tran_Daily", $this->lang->line('Daily'));


        $this->set("tran_set_module_status", $this->lang->line('set_module_status'));
        $this->set("tran_referal_income_status", $this->lang->line('referal_income_status'));
        $this->set("tran_Ewallet", $this->lang->line('ewallet'));
        $this->set("tran_employee", $this->lang->line('employee'));
        $this->set("tran_sms", $this->lang->line('sms'));
        $this->set("tran_submit", $this->lang->line('submit'));

        $this->set("tran_upload_downloadable_document", $this->lang->line('upload_downloadable_document'));
        $this->set("tran_payout_type", $this->lang->line('payout_type'));
        $this->set("tran_start_date", $this->lang->line('start_date'));
        $this->set("tran_end_date", $this->lang->line('end_date'));

        $this->set("tran_payout_release", $this->lang->line('payout_release'));
        $this->set("tran_from_e_wallet", $this->lang->line('from_e_wallet'));
        $this->set("tran_from_e_wallet_request", $this->lang->line('from_e_wallet_request'));
        $this->set("tran_yes", $this->lang->line('yes'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->setScripts();

        $this->setView();
    }

    function report_configuration() {


        $title = $this->lang->line('report_configuration');
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


        $this->ARR_SCRIPT[5]["name"] = "validate_configuration_report.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

//           
//        $this->ARR_SCRIPT[6]["name"] = "validate_configurate.js";
//        $this->ARR_SCRIPT[6]["type"] = "js";
//        $this->ARR_SCRIPT[6]["loc"] = "header";


        $this->setScripts();
        $address = "";
        $email = "";
        $phone = "";
        $setresult = $this->configuration_model->setreportconfig();
        if (count($setresult) > 0) {
            $this->set("setresult", $setresult);
        } else {
            $this->set("setresult", 0);
        }
        if (($this->input->post('report'))) {

            $address = $this->input->post('addr');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            // echo "...".$address."....".$email."...".$phone;die();
            $res = $this->configuration_model->updatereportconfig($address, $email, $phone);

            if ($res) {
                // $msg = $this->lang->line('site_configuration_completed');
                $msg = "Configured..";

                $this->redirect($msg, "configuration/report_configuration", TRUE);
            } else {
                $msg = $this->lang->line('error_on_site_configuration');
                $this->redirect($msg, "configuration/report_configuration", FALSE);
            }
        }


        //for language translation///
        $this->set("tran_report_configuration", $this->lang->line('report_configuration'));
        $this->set("tran_company_name", $this->lang->line('company_name'));
        $this->set("tran_company_address", $this->lang->line('company_address'));

        $this->set("tran_icon", $this->lang->line('icon'));
        $this->set("tran_logo", $this->lang->line('logo'));
        $this->set("tran_phone", $this->lang->line('phone'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_you_must_enter_company_name", $this->lang->line('you_must_enter_company_name'));
        $this->set("tran_you_must_company_address", $this->lang->line('you_must_company_address'));
        $this->set("tran_non_valid_file", $this->lang->line('non_valid_file'));
        $this->set("tran_only_png_jpg", $this->lang->line('only_png_jpg'));
        $this->set("tran_you_must_enter_email", $this->lang->line('you_must_enter_email'));
        $this->set("tran_you_must_enter_valid_email", $this->lang->line('you_must_enter_valid_email'));
        $this->set("tran_you_must_enter_phone", $this->lang->line('you_must_enter_phone'));
        $this->set("tran_you_must_enter_valid_phone", $this->lang->line('you_must_enter_valid_phone'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('report_configuration'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('report_configuration'));
        $this->set("page_small_header", "");

        $this->setView();
    }

    //-----------------------------
    function site_status() {
        $title = $this->lang->line('site_status');
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




        $this->ARR_SCRIPT[5]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.css";
        $this->ARR_SCRIPT[5]["type"] = "plugins/css";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "bootstrap-social-buttons/social-buttons-3.css";
        $this->ARR_SCRIPT[6]["type"] = "plugins/css";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.js";
        $this->ARR_SCRIPT[7]["type"] = "plugins/js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "jquery.pulsate/jquery.pulsate.min.js";
        $this->ARR_SCRIPT[8]["type"] = "plugins/js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";


        $this->ARR_SCRIPT[9]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[9]["type"] = "css";
        $this->ARR_SCRIPT[9]["loc"] = "header";

        $this->ARR_SCRIPT[10]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[10]["type"] = "js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";



        $this->ARR_SCRIPT[11]["name"] = "validate_configurate.js";
        $this->ARR_SCRIPT[11]["type"] = "js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

        $this->set("page_small_header", "");
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('site_status'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('site_status'));
        $this->set("page_small_header", "");
        $this->set("trans_site_status", $this->lang->line('site_status'));
        $this->set("trans_site_status_update", $this->lang->line('Site_Status_Updated_Successfully'));

        $this->setScripts();

        if ($this->input->post('setting')) {
            $status = $this->input->post('site_status');
            $content = $this->input->post('content');

            $res = $this->configuration_model->updateSiteStatus($status, $content);
            if ($res) {
                $msg = $this->lang->line('Site_Status_Updated_Successfully');
                $this->redirect($msg, "configuration/site_status", true);
            } else {
                $msg = $this->lang->line('Error_on_site_status_updation');
                $this->redirect($msg, "configuration/site_status", false);
            }
        }


        $this->setView();
    }

    function mail_settings() {
        $title = $this->lang->line('mail_settings');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_mail_settings.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "jseditor/getfilename.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "jseditor/editor.js";
        $this->ARR_SCRIPT[2]["type"] = "js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "editor/text_area_toolbar.css";
        $this->ARR_SCRIPT[3]["type"] = "css";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "editor/jHtmlArea.css";
        $this->ARR_SCRIPT[4]["type"] = "css";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "jseditor/jHtmlArea.ColorPickerMenu-0.7.0.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "editor/jHtmlArea.ColorPickerMenu.css";
        $this->ARR_SCRIPT[6]["type"] = "css";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "jseditor/HtmlArea-0.7.0.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "jseditor/jHtmlArea-0.7.0.min.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
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

        $help_link = "mail-configuration";
        $this->set("help_link", $help_link);

        $this->set("page_small_header", "");
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('mail_settings'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('mail_settings'));
        $this->set("page_small_header", "");
        $this->set("tran_you_must_enter_from_name", $this->lang->line('you_must_enter_from_name'));
        $this->set("tran_you_must_enter_from_email", $this->lang->line('you_must_enter_from_email'));
        $this->set("tran_you_must_enter_smtp_host", $this->lang->line('you_must_enter_smtp_host'));
        $this->set("tran_you_must_enter_smtp_username", $this->lang->line('you_must_enter_smtp_username'));
        $this->set("tran_you_must_enter_smtp_password", $this->lang->line('you_must_enter_smtp_password'));
        $this->set("tran_you_must_enter_smtp_port", $this->lang->line('you_must_enter_smtp_port'));
        $this->set("tran_you_must_enter_smtp_timeout", $this->lang->line('you_must_enter_smtp_timeout'));
        $this->set("tran_select_mail_status", $this->lang->line('select_mail_status'));
        $this->set("tran_from_name", $this->lang->line('from_name'));
        $this->set("tran_from_email", $this->lang->line('from_email'));
        $this->set("tran_smtp_host", $this->lang->line('smtp_host'));
        $this->set("tran_smtp_username", $this->lang->line('smtp_username'));
        $this->set("tran_smtp_password", $this->lang->line('smtp_password'));
        $this->set("tran_smtp_port", $this->lang->line('smtp_port'));
        $this->set("tran_smtp_timeout", $this->lang->line('smtp_timeout'));
        $this->set("tran_reg_mail_status", $this->lang->line('reg_mail_status'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_mail_settings", $this->lang->line('mail_settings'));
        $this->set("tran_yes", $this->lang->line('yes'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_mail_settings_updated_successfully", $this->lang->line('mail_settings_updated_successfully'));
        $this->set("tran_Error_on_mail_settings_updation", $this->lang->line('Error_on_mail_settings_updation'));
        $this->setScripts();
        $mail_details = $this->configuration_model->getMailDetails();
        $this->set('mail_details', $mail_details);
        if ($this->input->post('update')) {
            $mail_setting['from_name'] = $this->input->post('from_name');
            $mail_setting['from_email'] = $this->input->post('from_email');
            /* $mail_setting['smtp_host'] = $this->input->post('smtp_host');
              $mail_setting['smtp_username'] = $this->input->post('smtp_username');
              $mail_setting['smtp_password'] = $this->input->post('smtp_password');
              $mail_setting['smtp_port'] = $this->input->post('smtp_port');
              $mail_setting['smtp_timeout'] = $this->input->post('smtp_timeout'); */
            $mail_setting['reg_mail_status'] = $this->input->post('reg_mail_status');
            $mail_setting['reg_mail_content'] = $this->input->post('reg_mail_content');

            $res = $this->configuration_model->updateMailSettings($mail_setting);
            if ($res) {
                $msg = $this->lang->line('mail_settings_updated_successfully');
                $this->redirect($msg, "configuration/mail_settings", true);
            } else {
                $msg = $this->lang->line('Error_on_mail_settings_updation');
                $this->redirect($msg, "configuration/mail_settings", false);
            }
        }
        $this->setView();
    }

    function general_mail($id = '') {
        $title = $this->lang->line('mail_settings');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_mail_settings.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "jseditor/jHtmlArea-0.7.0.min.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "jseditor/getfilename.js";
        $this->ARR_SCRIPT[2]["type"] = "js";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "jseditor/editor.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "editor/text_area_toolbar.css";
        $this->ARR_SCRIPT[4]["type"] = "css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "editor/jHtmlArea.css";
        $this->ARR_SCRIPT[5]["type"] = "css";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "jseditor/HtmlArea-0.7.0.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.css";
        $this->ARR_SCRIPT[7]["type"] = "plugins/css";
        $this->ARR_SCRIPT[7]["loc"] = "header";

        $this->ARR_SCRIPT[8]["name"] = "bootstrap-social-buttons/social-buttons-3.css";
        $this->ARR_SCRIPT[8]["type"] = "plugins/css";
        $this->ARR_SCRIPT[8]["loc"] = "header";

        $this->ARR_SCRIPT[9]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.js";
        $this->ARR_SCRIPT[9]["type"] = "plugins/js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        $this->set("page_top_header", $this->lang->line('mail_settings'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('mail_settings'));
        $this->set("page_small_header", "");
        $this->set("tran_You_must_enter_your_email", $this->lang->line('You_must_enter_your_email'));
        $this->set("tran_You_have_entered_an_invalid_email", $this->lang->line('You_have_entered_an_invalid_email'));
        $letter_arr = array();
        $letter_arr = $this->configuration_model->getMailHistory();
        $this->set("letter_arr", $letter_arr);

        if ($this->input->post('send')) {
            $post = $this->input->post();
            for ($i = 0; $i < 3; $i++) {
                if ($_FILES['userfile' . $i]['error'] != 4) {
                    $config['upload_path'] = './public_html/images/general_mail/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|txt';
                    $config['max_size'] = '2000000000';
                    $config['max_width'] = '1024000';
                    $config['max_height'] = '768000';
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('userfile' . $i)) {

                        $error = array('error' => $this->upload->display_errors());
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $post['userfile' . $i] = $data['upload_data']['file_name'];
                    }
                }
            }
            if ($post['send'] == 'send') {
                $res = $this->configuration_model->insertGeneralMail($post);
                $this->configuration_model->sendMail($post);
            }

            if ($res) {
                $msg = $this->lang->line('General mail Successfully send');
                $this->redirect('General mail Successfully send', "configuration/general_mail", TRUE);
            } else {
                $msg = $this->lang->line('error_on_configuration_updation');
                $this->redirect($msg . '3', "configuration/general_mail", FALSE);
            }
        }
        $this->setScripts();
        $this->setView();
    }

    function delete_message($redirect, $id) {

        $res = $this->configuration_model->deleteMessage($id);
        if ($res) {
            $msg = 'Message deleted Successfully';
            $this->redirect($msg, "configuration/$redirect", TRUE);
        } else {
            $msg = 'ERROR ON Deletion';
            $this->redirect($msg, "configuration/$redirect", TRUE);
        }
    }

    function rank_configuration($action = "", $edit_id = "") {
        $title = $this->lang->line('rank_settings');
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

        $this->ARR_SCRIPT[11]["name"] = "validate_rank_configuration.js";
        $this->ARR_SCRIPT[11]["type"] = "js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";



        $this->set("edit_id", null);
        $this->set("rank_id", null);
        $this->set("rank_name", null);
        $this->set("referal_count", null);
        $this->set("rank_bonus", null);

        if ($action == "edit") {
            $row = $this->configuration_model->editRank($edit_id);
            $this->set("edit_id", $edit_id);
            $this->set("rank_id", $row['rank_id']);
            $this->set("rank_name", $row['rank_name']);
            $this->set("referal_count", $row['referal_count']);
            $this->set("rank_bonus", $row['rank_bonus']);
        }

        if ($this->input->post('rank_update')) {
            $rank_id1 = $this->input->post('rank_id');
            $rank_name1 = $this->input->post('rank_name');
            $referal_count1 = $this->input->post('ref_count');
            $rank_bonus1 = $this->input->post('rank_achievers_bonus');

            $res = $this->configuration_model->updateRank($rank_id1, $rank_name1, $referal_count1, $rank_bonus1);
            if ($res) {
                $msg = "Rank Updated Successfully";
                $this->redirect($msg, "configuration/rank_configuration", TRUE);
            } else {
                $msg = "Error On Updating Rank";
                $this->redirect($msg, "configuration/rank_configuration", FALSE);
            }
        }

        $rank_name = $this->input->post('rank_name');
        $ref_count = $this->input->post('ref_count');
        $rank_bonus = $this->input->post('rank_achievers_bonus');
        if ($this->input->post('rank_submit')) {
            if ($rank_name == "" || $ref_count == "") {
                $this->redirect("Enter All Details", "configuration/rank_configuration", false);
            } else {

                $res = $this->configuration_model->insertRankDetails($rank_name, $ref_count, $rank_bonus);
                if ($res) {
                    $msg = "Rank Details Inserted Successfully..";
                    $this->redirect($msg, "configuration/rank_configuration", true);
                } else {
                    $msg = "Error On Adding Rank Deatils";
                    $this->redirect($msg, "configuration/rank_configuration", false);
                }
            }
        }


        $rank_details = $this->configuration_model->getAllRankDetails();
        $this->set("rank_details", $rank_details);

        $this->set("tran_you_must_enter_rank_name", $this->lang->line('you_must_enter_rank_name'));
        $this->set("tran_you_must_enter_referal_count", $this->lang->line('you_must_enter_referal_count'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_referal_count", $this->lang->line('referal_count'));
        $this->set("tran_rank_name", $this->lang->line('rank_name'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_sure_you_want_to_edit_this_news_there_is_no_undo", $this->lang->line('sure_you_want_to_edit_this_news_there_is_no_undo'));
        $this->set('tran_rank_details', $this->lang->line('rank_details'));
        $this->set('tran_rank_setting', $this->lang->line('rank_settings'));
        $this->set('tran_rank_achieved_bonus', $this->lang->line('rank_achieved_bonus'));
        $this->set("page_top_header", $this->lang->line("rank_settings"));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line("rank_settings"));
        $this->set("page_small_header", "");

        $help_link = "rank-settings";
        $this->set("help_link", $help_link);

        $this->setScripts();
        $this->setView();
    }

    function paypal_config() {

        $title = $this->lang->line('paypal_configuration');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "validate_payout_release.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->setScripts();


        ////////////////////////// code for language translation  //////////////////////////

        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_payment", $this->lang->line('payment'));
        $this->set("tran_paypal_configuration", $this->lang->line('paypal_configuration'));
        $this->set("tran_enable", $this->lang->line('enable'));
        $this->set("tran_disable", $this->lang->line('disable'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_payment_method", $this->lang->line('payment_method'));
        $this->set("tran_paypal", $this->lang->line('paypal'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_api_username", $this->lang->line('api_username'));
        $this->set("tran_api_password", $this->lang->line('api_password'));
        $this->set("tran_api_signature", $this->lang->line('api_signature'));
        $this->set("tran_mode", $this->lang->line('mode'));
        $this->set("tran_currency", $this->lang->line('currency'));
        $this->set("tran_return_url", $this->lang->line('return_url'));
        $this->set("tran_cancel_url", $this->lang->line('cancel_url'));
        $this->set("page_top_header", $this->lang->line('paypal_configuration'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('paypal_configuration'));
        $this->set("page_small_header", "");

        $help_link = "paypal-config";
        $this->set("help_link", $help_link);

        ////////////////////////////////////////////////////////////////////////////////////
        $paypal_details = array();
        $paypal_details = $this->configuration_model->getPaypalConfigDetails();
        $this->set("paypal_details", $paypal_details);

        if ($this->input->post('update_paypal')) {
            $api_username = $this->input->post('api_username');
            $api_password = $this->input->post('api_password');
            $api_signature = $this->input->post('api_signature');
            $mode = $this->input->post('mode');
            $currency = $this->input->post('currency');
            $return_url = $this->input->post('return_url');
            $cancel_url = $this->input->post('cancel_url');

            $res = $this->configuration_model->updatePaypalConfig($api_username, $api_password, $api_signature, $mode, $currency, $return_url, $cancel_url);

            if ($res) {
                $msg = $this->lang->line('paypal_configuration_updated_successfully');
                $this->redirect($msg, "configuration/paypal_config", true);
            } else {
                $msg = $this->lang->line('Error_on_updating_paypal_status_please_try_again');
                $this->redirect($msg, "configuration/paypal_config", false);
            }
        }

        $this->setView();
    }

    function payment_gateway_configuration() {

        $title = $this->lang->line('payment_gateway_configuration');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "validate_payout_release.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->setScripts();


        ////////////////////////// code for language translation  //////////////////////////
        $this->set("tran_authorize_configuration", $this->lang->line('authorize_configuration'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_payment", $this->lang->line('payment'));
        $this->set("tran_credit_cards_configuration", $this->lang->line('credit_cards_configuration'));
        $this->set("tran_enable", $this->lang->line('enable'));
        $this->set("tran_disable", $this->lang->line('disable'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_payment_method", $this->lang->line('payment_method'));
        $this->set("tran_payment_gateway_name", $this->lang->line('payment_gateway_name'));
        $this->set("tran_paypal", $this->lang->line('paypal'));
        $this->set("tran_payment_gateway_configuration", $this->lang->line('payment_gateway_configuration'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("page_top_header", $this->lang->line('payment_gateway_configuration'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('payment_gateway_configuration'));
        $this->set("page_small_header", "");

        $help_link = "payment-gateway-configuration";
        $this->set("help_link", $help_link);

        ////////////////////////////////////////////////////////////////////////////////////
        $card_status = array();
        $card_status = $this->configuration_model->getCreditCardStatus();
        $this->set("card_status", $card_status);

        $this->setView();
    }

    public function change_credit_card_status() {

        $id = $this->input->post('id');
        $new_status = $this->input->post('module_status');

        if ($new_status == 'no') {
            $payment_active_count = $this->configuration_model->checkAtleastOneCreditCardActive($id);
            if (!$payment_active_count) {
                $this->redirect('Atleast one payment method should be active. Please select one option', "configuration/payment_view", false);
            }
        }

        $res = $this->configuration_model->setCreditCardStatus($id, $new_status);
    }

    public function change_payment_status() {

        $id = $this->input->post('id');
        $new_status = $this->input->post('module_status');

        if ($new_status == 'no') {
            $payment_active_count = $this->configuration_model->checkAtleastOnePaymentActive($id);
            if (!$payment_active_count) {
                $this->redirect('Atleast one payment method should be active. Please select one option', "configuration/payment_view", false);
            }
        }

        $res = $this->configuration_model->setPaymentStatus($id, $new_status);
    }

    //========================edited by Deepthy ====================//
    function payment_view() {

        $title = $this->lang->line('payment_view');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "validate_payout_release.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->setScripts();

        $ewallet_status = $this->MODULE_STATUS['ewallet_status'];
        $pin_status = $this->MODULE_STATUS['pin_status'];
        $credit_card = $this->MODULE_STATUS['credit_card'];
        $free_joining_status = $this->MODULE_STATUS['free_joining_status'];


        $payment_methods = $this->configuration_model->getPaymentMethods();
        //print_r($payment_methods);die();
        $this->set("payment_methods", $payment_methods);
        ////////////////////////// code for language translation  //////////////////////////

        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_payment", $this->lang->line('payment'));
        $this->set("tran_payment_setting", $this->lang->line('payment_setting'));
        $this->set("tran_enable", $this->lang->line('enable'));
        $this->set("tran_disable", $this->lang->line('disable'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_payment_method", $this->lang->line('payment_method'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_payment_gateway_configuration", $this->lang->line('payment_gateway_configuration'));
        $this->set("tran_Payment_Status_Updated_Successfully", $this->lang->line('Payment_Status_Updated_Successfully'));
        $this->set("tran_Error_on_updating_payment_status_please_try_again", $this->lang->line('Error_on_updating_payment_status_please_try_again'));
        $this->set("page_top_header", $this->lang->line('payment_setting'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('payment_setting'));
        $this->set("page_small_header", "");

        $help_link = "payment-settings";
        $this->set("help_link", $help_link);

        $this->set("ewallet_status", $ewallet_status);
        $this->set("pin_status", $pin_status);
        $this->set("credit_card", $credit_card);
        $this->set("free_joining_status", $free_joining_status);
        ////////////////////////////////////////////////////////////////////////////////////
        $module_status = array();
        $module_status = $this->configuration_model->getModuleStatus();
        $this->set("module_status", $module_status);

        $this->setView();
    }

    public function change_module_status() {

        $module_name = $this->input->post('module_name');
        $new_status = $this->input->post('module_status');

        if ($new_status == 'no') {
            $payment_active_count = 1;
            if ($module_name == 'ewallet_status') {
                $payment_active_count = $this->configuration_model->checkAtleastOnePaymentActive(3);
                if ($payment_active_count) {
                    $this->configuration_model->setPaymentStatus(3, $new_status);
                }
            }
            if ($module_name == 'pin_status') {
                $payment_active_count = $this->configuration_model->checkAtleastOnePaymentActive(2);
                if ($payment_active_count) {
                    $this->configuration_model->setPaymentStatus(2, $new_status); //unset pin status from payment method if new status is no
                }
            }
            if (!$payment_active_count) {
                $this->redirect('Atleast one payment method should be active. Please select one option', "configuration/payment_view", false);
            }
        }
        if (($module_name == "eng_status") || ($module_name == "span_status") || ($module_name == "chin_status") || ($module_name == "ger_status") || ($module_name == "por_status")) {
            $lng_status = $this->configuration_model->setLanguageStatus($module_name, $new_status);
            if ($lng_status) {
                $msg = "Succesfully Updated";
                $this->redirect($msg, "configuration/set_module_status", true);
            } else {
                $msg = "Error on updations";
                $this->redirect($msg, "configuration/set_module_status", true);
            }
        } else {
            $res = $this->configuration_model->setModuleStatus($module_name, $new_status);

            if ($res) {
                $msg = $this->lang->line('Module_Status_Updated_Successfully');

                $this->redirect($msg, "configuration/set_module_status", true);
            } else {
                $msg = "Error on updation";
                $this->redirect($msg, "configuration/set_module_status", true);
            }
        }
    }

    //=======================code ends Deepthy==================//

    public function sms_settings() {

        $title = $this->lang->line('sms_setting');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "validate_mail_settings.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->setScripts();

        /* $sms_arr['sender_id'] = 'NA';
          $sms_arr['user_name'] = 'NA';
          $sms_arr['password'] = 'NA'; */
        $result = $this->configuration_model->getSmsConfigDetails();

        if ($this->input->post('sms_config')) {
            //print_r($this->input->post());
            $details['sender_id'] = $this->input->post('sender_id');
            $details['user_name'] = $this->input->post('user_name');
            $details['password'] = $this->input->post('password');

            $rec = $this->configuration_model->setSmsConfig($details);


            if ($rec) {

                $msg = "Successfuly inserted";
                $this->redirect($msg, "configuration/sms_settings", true);
            } else {

                $msg = "Insertion Failed";
                $this->redirect($msg, "configuration/sms_settings", false);
            }
        }


        //$this->set("sms_arr", $sms_arr);
        $this->set("tran_sms_settings", $this->lang->line('sms_setting'));
        $this->set("tran_sender_id", $this->lang->line('sender_id'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_password", $this->lang->line('password'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_you_must_enter_sender_id", $this->lang->line('you_must_enter_sender_id'));
        $this->set("tran_you_must_enter_user_name", $this->lang->line('you_must_enter_user_name'));
        $this->set("tran_you_must_enter_password", $this->lang->line('you_must_enter_password'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('settings'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('sms_setting'));
        $this->set("page_small_header", "");

        $help_link = "sms-settings";
        $this->set("help_link", $help_link);
        $this->setView();
    }

    public function language_settings() {
        $title = $this->lang->line('set_language_status');
        $this->set("title", "$this->COMPANY_NAME | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        //$sponsor_tree_status = $this->menu->getSubMenuStatus(58);
        $referal_status = $this->MODULE_STATUS['referal_status'];
        $ewallet_status = $this->MODULE_STATUS['ewallet_status'];
        $employee_status = $this->MODULE_STATUS['employee_status'];
        $sms_status = $this->MODULE_STATUS['sms_status'];
        $payout_release_status = $this->MODULE_STATUS['payout_release_status'];
        $upload_status = $this->MODULE_STATUS['upload_status'];
        $lang_status = $this->MODULE_STATUS['lang_status'];
        $help_status = $this->MODULE_STATUS['help_status'];
        $statcounter_status = $this->MODULE_STATUS['statcounter_status'];

        $pin_status = $this->MODULE_STATUS['pin_status'];
        $product_status = $this->MODULE_STATUS['product_status'];
        $sponsor_tree_status = $this->MODULE_STATUS['sponsor_tree_status'];
        $payout_release = $this->configuration_model->getPayOutTypes();
        $rank_status = $this->MODULE_STATUS['rank_status'];
        $eng_status = $this->MODULE_STATUS['lang_status'];
        //$span_status=$this->MODULE_STATUS['lang_status'];
        //echo $rank_status;
        //$this->LANG["lang"]=$lang_status;
        $this->set('lang_status', $lang_status);
        $this->set('help_status', $help_status);
        //$this->set('ewallet_status', $ewallet_status);
        ///////language translation/////////
        $this->set("tran_referral_status", $this->lang->line('referral_status'));
        $this->set("tran_binary_payout_release", $this->lang->line('binary_payout_release'));
        $this->set("tran_upload_document", $this->lang->line('upload_document'));
        $this->set("tran_sms", $this->lang->line('sms'));
        $this->set("tran_employee", $this->lang->line('employee'));
        $this->set("tran_referal_income", $this->lang->line('referal_income'));
        $this->set("tran_set_language_status", $this->lang->line('set_language_status'));
        $this->set("tran_ewallet", $this->lang->line('ewallet'));
        $this->set("tran_from_e_wallet_request", $this->lang->line('from_e_wallet_request'));
        $this->set("tran_from_e_wallet", $this->lang->line('from_e_wallet'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_daily", $this->lang->line('daily'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_sponsor_tree", $this->lang->line('sponsor_tree'));
        $this->set("tran_product_status", $this->lang->line('product'));
        $this->set("tran_payment_option", $this->lang->line('payment_option'));
        $this->set("tran_using_ewallet", $this->lang->line('using_ewallet'));
        $this->set("tran_using_ePin", $this->lang->line('using_ePin'));
        $this->set("tran_using_credit_card", $this->lang->line('using_credit_card'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_referal_status", $this->lang->line('referal_status'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_free_joining", $this->lang->line('free_joining'));
        $this->set("tran_credit_card", $this->lang->line('credit_card'));
        $this->set("tran_language", $this->lang->line('language'));
        $this->set("tran_referal_income_status", $this->lang->line('referal_income_status'));


        $this->set("sponsor_tree_status", $sponsor_tree_status);
        $this->set("referal_status", $referal_status);
        $this->set("eng_status", $eng_status);

        $this->set("ewallet_status", $ewallet_status);
        $this->set("employee_status", $employee_status);
        $this->set("sms_status", $sms_status);
        $this->set("payout_release_status", $payout_release_status);
        $this->set("upload_status", $upload_status);
        $this->set("payout_release", $payout_release);
        $this->set("pin_status", $pin_status);
        $this->set("rank_status", $rank_status);
        $this->set("product_status", $product_status);
        $this->set("lang_status", $lang_status);
        $this->set("help_status", $help_status);
        $this->set("statcounter_status", $statcounter_status);


        $this->set("tran_Ewallet", $this->lang->line('ewallet'));
        $this->set("tran_payout_release", $this->lang->line('payout_release'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_enable", $this->lang->line('enable'));
        $this->set("tran_disable", $this->lang->line('disable'));
        $this->set("page_top_header", $this->lang->line('set_language_status'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('set_language_status'));
        $this->set("page_small_header", "");

        $help_link = "module-status";
        $this->set("help_link", $help_link);

        $module_status = array();
        //$module_status = $this->configuration_model->getModuleStatus();
        //$this->set("module_status", $module_status);
        $lang_status = array();
        $lang_status = $this->configuration_model->getLanguageStatus();
        $this->set("language_settings_status", $lang_status);
        // print_r ($lang_status);
        //if($lang_status[0]['lang_id']==1)
        $eng_status = $lang_status[0]['lang_status'];
        $span_status = $lang_status[1]['lang_status'];
        $chin_status = $lang_status[2]['lang_status'];
        $ger_status = $lang_status[3]['lang_status'];
        $por_status = $lang_status[4]['lang_status'];
        $this->set("module_status", $lang_status);
        $this->set("eng_status", $eng_status);
        $this->set("span_status", $span_status);
        //$this->set("span_status", $span_status);
        $this->set("chin_status", $chin_status);
        $this->set("ger_status", $ger_status);
        $this->set("por_status", $por_status);

        //echo $eng_status;
        //$this->LANG_STATUS=$module_status['lang_status'];
        //$this->set("LANG_STATUS",$this->LANG_STATUS);

        /* if ($this->input->post('language_settings_status')) {

          $module_name = $this->input->post('module_name');
          $new_status = $this->input->post('module_status');

          $res = $this->configuration_model->setModuleStatus($module_name, $new_status);

          if ($res) {
          $login_id = $this->session->userdata['logged_in']['user_id'];
          $this->val->insertUserActivity($login_id, 'module status change', $login_id);
          $msg = $this->lang->line('Module_Status_Updated_Successfully');
          $this->redirect($msg, "configuration/set_module_status", true);
          } else {
          $msg = $this->lang->line('Error_on_updating_Module_status_please_try_again');
          $this->redirect($msg, "configuration/set_module_status", false);
          }
          }

          else {
          echo "not";
          } */
        $this->set("tran_yes", $this->lang->line('yes'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->setScripts();

        $this->setView();
    }

    function epdq_config() {

        $title = $this->lang->line('epdq_configuration');
        $this->set("title", $this->COMPANY_NAME . " | $title");


        $this->ARR_SCRIPT[1]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->setScripts();


        ////////////////////////// code for language translation  //////////////////////////
        $this->set("tran_you_must_enter_api_pspid", $this->lang->line('you_must_enter_api_pspid'));
        $this->set("tran_you_must_enter_api_password", $this->lang->line('you_must_enter_api_password'));
        $this->set("tran_you_must_enter_accept_url", $this->lang->line('you_must_enter_accept_url'));
        $this->set("tran_you_must_enter_decline_url", $this->lang->line('you_must_enter_decline_url'));
        $this->set("tran_you_must_enter_exception_url", $this->lang->line('you_must_enter_exception_url'));
        $this->set("tran_you_must_enter_cancel_url", $this->lang->line('you_must_enter_cancel_url'));
        $this->set("tran_you_must_enter_api_url", $this->lang->line('you_must_enter_api_url'));
        $this->set("tran_you_must_select_currency", $this->lang->line('you_must_select_currency'));
        $this->set("tran_you_must_select_language", $this->lang->line('you_must_select_language'));


        $this->set("tran_epdq_configuration", $this->lang->line('epdq_configuration'));
        $this->set("tran_api_url", $this->lang->line('api_url'));
        $this->set("tran_api_password", $this->lang->line('api_password'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_api_pspid", $this->lang->line('api_pspid'));
        $this->set("tran_api_language", $this->lang->line('api_language'));
        $this->set("tran_mode", $this->lang->line('mode'));
        $this->set("tran_currency", $this->lang->line('currency'));
        $this->set("tran_accept_url", $this->lang->line('accept_url'));
        $this->set("tran_decline_url", $this->lang->line('decline_url'));
        $this->set("tran_exception_url", $this->lang->line('exception_url'));
        $this->set("tran_cancel_url", $this->lang->line('cancel_url'));
        $this->set("page_top_header", $this->lang->line('epdq_configuration'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('epdq_configuration'));
        $this->set("page_small_header", "");

        $help_link = "epdq-config";
        $this->set("help_link", $help_link);

        ////////////////////////////////////////////////////////////////////////////////////
        $epdq_details = array();
        $epdq_details = $this->configuration_model->getEpdqConfigDetails();

        $this->set("epdq_details", $epdq_details);

        if ($this->input->post('update_epdq')) {
            $api_pspid = $this->input->post('api_pspid');
            $api_password = $this->input->post('api_password');
            $language = $this->input->post('language');
            $currency = $this->input->post('currency');
            $accept_url = $this->input->post('accept_url');
            $decline_url = $this->input->post('decline_url');
            $exception_url = $this->input->post('exception_url');
            $cancel_url = $this->input->post('cancel_url');
            $api_url = $this->input->post('api_url');

            $res = $this->configuration_model->updateEpdqConfig($api_pspid, $api_password, $language, $currency, $accept_url, $decline_url, $exception_url, $cancel_url, $api_url);

            if ($res) {
                $msg = $this->lang->line('epdq_configuration_updated_successfully');
                $this->redirect($msg, "configuration/epdq_config", true);
            } else {
                $msg = $this->lang->line('Error_on_updating_epdq_status_please_try_again');
                $this->redirect($msg, "configuration/epdq_config", false);
            }
        }

        $this->setView();
    }

    function authorize_config() {

        $title = $this->lang->line('authorize_configuration');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "validate_configuration.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->setScripts();


        ////////////////////////// code for language translation  //////////////////////////

        $this->set("tran_authorize_configuration", $this->lang->line('authorize_configuration'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_you_must_enter_merchant_id", $this->lang->line('you_must_enter_merchant_id'));
        $this->set("tran_you_must_enter_transaction_password", $this->lang->line('you_must_enter_transaction_password'));
        $this->set("tran_merchant_log_id", $this->lang->line('merchant_log_id'));
        $this->set("tran_transaction_key", $this->lang->line('transaction_key'));

        $this->set("page_top_header", $this->lang->line('authorize_configuration'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('authorize_configuration'));
        $this->set("page_small_header", "");

        $help_link = "authorize-config";
        $this->set("help_link", $help_link);

        ////////////////////////////////////////////////////////////////////////////////////

        $authorize_details = $this->configuration_model->getAuthorizeConfigDetails();
        $this->set("authorize_details", $authorize_details);



        if ($this->input->post('update_authorize')) {
            if ($this->input->post('merchant_log_id')) {
                $merchant_id = $this->input->post('merchant_log_id');
            } else {
                $msg = $this->lang->line('you_must_enter_merchant_id');
                $this->redirect($msg, "configuration/authorize_config", false);
            }
            if ($this->input->post('transaction_key')) {

                $transaction_key = $this->input->post('transaction_key');
            } else {
                $msg = $this->lang->line('you_must_enter_transaction_password');
                $this->redirect($msg, "configuration/authorize_config", false);
            }
            $res = $this->configuration_model->updateAuthorizeConfig($merchant_id, $transaction_key);

            if ($res) {
                $msg = $this->lang->line('paypal_configuration_updated_successfully');
                $this->redirect($msg, "configuration/authorize_config", true);
            } else {
                $msg = $this->lang->line('Error_on_updating_paypal_status_please_try_again');
                $this->redirect($msg, "configuration/authorize_config", false);
            }
        }

        $this->setView();
    }

    function get_user_summary($username) {
        $is_valid_username = $this->val->isUserNameAvailable($username);
        $this->set('is_valid_username', $is_valid_username);
        if ($is_valid_username) {
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

    function setting_depth() {

//        $title = $this->lang->line('setting_width_depth');
//       $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "validate_depth.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";


        $this->setScripts();

        $mlm_plan = $this->MODULE_STATUS['mlm_plan'];
        $help_status = $this->MODULE_STATUS['help_status'];
        $this->set("help_status", $help_status);
        $help_link = "network-configuration ";
        $this->set("help_link", $help_link);

        $obj_arr = $this->configuration_model->getSettings();

        //print_r($obj_arr);die();
        $depth_no = $obj_arr['depth_ceiling'];


        if ($mlm_plan == 'Binary') {

            $title = $this->lang->line('setting_depth');
            $this->set("title", $this->COMPANY_NAME . " | $title");
            if ($this->input->post('update')) {
//$depth = 0;
                $depth = $this->input->post('depth_value');
                $width = 0;

                $result2 = $this->configuration_model->setLevel($depth, $depth_no);
                $result = $this->configuration_model->updateDepth($depth, $width);
                if ($result) {
                    $msg = $this->lang->line('updated_successfully');
                    $this->redirect($msg, "configuration/setting_depth", true);
                } else {
                    $msg = $this->lang->line('updation_failed');
                    $this->redirect($msg, "configuration/setting_depth", false);
                }
            }
        }



        $obj_arr = $this->configuration_model->getSettings();

        $this->set("mlm_plan", $mlm_plan);
        $this->set("obj_arr", $obj_arr);
        $this->set("tran_setting_depth", $this->lang->line('setting_depth'));
        $this->set("tran_setting_width_depth", $this->lang->line('setting_width_depth'));
        $this->set("tran_depth_value", $this->lang->line('depth_value'));
        $this->set("tran_width_value", $this->lang->line('width_value'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_update", $this->lang->line('update'));

        if ($mlm_plan == 'Binary') {
            $this->set("page_top_header", $this->lang->line('setting_depth'));
            $this->set("page_top_small_header", "");
            $this->set("page_header", $this->lang->line('setting_depth'));
            $this->set("page_small_header", "");
        }

        $this->setView();
    }

    function get_product_value() {
        $product_point_value = mysql_real_escape_string($this->input->post('product_point_value'));
        echo $product_point_value;
    }

    function user_purchase_history() {

        $title = $this->lang->line('user_purchase_history');
        $this->set('title', $this->COMPANY_NAME . "!$title");


        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.css";
        $this->ARR_SCRIPT[3]["type"] = "plugins/css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "bootstrap-social-buttons/social-buttons-3.css";
        $this->ARR_SCRIPT[4]["type"] = "plugins/css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.js";
        $this->ARR_SCRIPT[5]["type"] = "plugins/js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "jquery.pulsate/jquery.pulsate.min.js";
        $this->ARR_SCRIPT[6]["type"] = "plugins/js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "stateprof.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "profile_update.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "validate_select_user.js";
        $this->ARR_SCRIPT[9]["type"] = "js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        $this->ARR_SCRIPT[10]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[10]["type"] = "plugins/css";
        $this->ARR_SCRIPT[10]["loc"] = "header";

        $this->ARR_SCRIPT[11]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[11]["type"] = "plugins/js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

        $this->ARR_SCRIPT[12]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[12]["type"] = "js";
        $this->ARR_SCRIPT[12]["loc"] = "footer";


        $this->setScripts();

        $date_diff = date('Y-m-d', strtotime('today - 30 days'));
        $this->set('date_diff', $date_diff);
        $cur_date = date('Y-m-d');
        $this->set('cur_date', $cur_date);

        $this->set("page_top_header", $this->lang->line('purchase_details'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('purchase_details'));
        $this->set("page_small_header", "");
        $this->set("tran_sl_no", $this->lang->line('sl_no'));
        $this->set("tran_invoice_no", $this->lang->line('invoice_no'));
        $this->set("tran_transaction_id", $this->lang->line('transaction_id'));
        $this->set("tran_joinig_date", $this->lang->line('joinig_date'));
        $this->set("tran_type", $this->lang->line('type'));
        $this->set("tran_payment_method", $this->lang->line('payment_method'));
        $this->set("tran_product_amount", $this->lang->line('product_amount'));
        $this->set("tran_product_quantity", $this->lang->line('product_quantity'));
        $this->set("tran_select_user_name", $this->lang->line('select_user_name'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_users_purchase_details", $this->lang->line('users_purchase_details'));
        $this->set("tran_you_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_weekly_joining", $this->lang->line('weekly_joining'));
        $this->set("tran_from_date", $this->lang->line('from_date'));
        $this->set("tran_to_date", $this->lang->line('to_date'));
        $this->set("tran_Username_not_Exists", $this->lang->line('Username_not_Exists'));
        $this->set("tran_higher", $this->lang->line('higher'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_User_Purchase_Details", $this->lang->line('User_Purchase_Details'));

        $posted = false;
        if ($this->input->post("user_details")) {
            $posted = true;
            $username = $this->input->post('user_name');
            $is_valid_username = $this->val->isUserNameAvailable($username);
            $this->set('is_valid_username', $is_valid_username);
            $user_id = $this->val->userNameToID($username);
            $details = $this->configuration_model->getUserProduct($user_id);
            $count = count($details);
            $this->set('count', $count);
        }
        $value = false;
        if ($this->input->post("weekdate")) {
            $value = true;
            $from_date = $this->input->post('week_date1');
            $to_date = $this->input->post('week_date2');
            $this->set('from_date', $from_date);
            $this->set('to_date', $to_date);


            $data = $this->configuration_model->getTransactionDetails($from_date, $to_date);
      
            $count = count($data);
            $this->set('count', $count);
        }
        $this->set('purchase_data', $data);
        $this->set('value', $value);
        $this->set('purchase_histroy', $details);
        $this->set('posted', $posted);
        $this->setView();
    }

}

?>
