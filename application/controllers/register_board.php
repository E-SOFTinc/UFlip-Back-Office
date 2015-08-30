<?php

require_once 'admin/Inf_Controller.php';

class Register_Board extends Inf_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('register_board_model', '', TRUE);
        $this->load->model('configuration_model');
        $this->obj_config = new configuration_model();
    }

    function user_register($id = "", $posion = "", $sponser_id = "", $placement = "") {

        $title = $this->lang->line('new_user_signup');
        $this->set('title', $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_register_board.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->set('status_id', $sponser_id);
        $this->set('reg_count', 0);
        $st_name = $this->session->userdata['logged_in']['user_name'];
        $this->set('status_name', $st_name);
        $is_product_added = "";
        $is_pin_added = "";

        $username_config = $this->obj_config->getUsernameConfig();
        $user_name_type = $username_config["type"];

        $curr_date = date('Y');
        $j = 0;
        for ($i = 1900; $i <= $curr_date; $i++) {
            $aray[$j] = $i;
            $j++;
        }
        $j = 0;
        for ($i = 1; $i <= 31; $i++) {
            $aray1[$j] = $i;
            $j++;
        }

        /////// setting expiry years--- start 
        $ex_year = $curr_date + 100;
        /////// end---- setting expiry years 
        for ($i = $curr_date; $i <= $ex_year; $i++) {
            $aray2[$j] = $i;
            $j++;
        }

        $tab1 = "";
        $tab2 = "";
        $tab3 = $tab4 = $tab5 = "";

        $this->session->set_userdata("registration_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2, "tab3" => $tab3, "tab4" => $tab4, "tab5" => $tab5));
        if ($this->session->userdata("registration_tab_active_arr")) {
            $tab1 = $this->session->userdata['registration_tab_active_arr']['tab1'];
            $tab2 = $this->session->userdata['registration_tab_active_arr']['tab2'];
            $tab3 = $this->session->userdata['registration_tab_active_arr']['tab3'];
            $tab4 = $this->session->userdata['registration_tab_active_arr']['tab4'];
            $tab5 = $this->session->userdata['registration_tab_active_arr']['tab5'];
            $this->session->unset_userdata("registration_tab_active_arr");
        }
        $this->set("tab1", $tab1);
        $this->set("tab2", $tab2);
        $this->set("tab3", $tab3);
        $this->set("tab4", $tab4);
        $this->set("tab5", $tab5);

        $product_status = $this->MODULE_STATUS['product_status'];
        $pin_status = $this->MODULE_STATUS['pin_status'];
        $referal_status = $this->MODULE_STATUS['referal_status'];

        $this->set('user_name_type', $user_name_type);
        if (($product_status == "yes") && ($pin_status == "yes") || ($product_status == "no") && ($pin_status == "yes")) {
            if ($sponser_id != "") {

                $this->ARR_SCRIPT[1]["name"] = "register.js";
                $this->ARR_SCRIPT[1]["type"] = "js";
                $this->ARR_SCRIPT[1]["loc"] = "footer";
            } else {
                $this->ARR_SCRIPT[1]["name"] = "register_link.js";
                $this->ARR_SCRIPT[1]["type"] = "js";
                $this->ARR_SCRIPT[1]["loc"] = "footer";
            }
        } else {
            if ($sponser_id != "") {
                $this->ARR_SCRIPT[1]["name"] = "register_without_pin.js";
                $this->ARR_SCRIPT[1]["type"] = "js";
                $this->ARR_SCRIPT[1]["loc"] = "footer";
            } else {
                $this->ARR_SCRIPT[1]["name"] = "register_board_link_without_pin.js";
                $this->ARR_SCRIPT[1]["type"] = "js";
                $this->ARR_SCRIPT[1]["loc"] = "footer";
            }
        }


        $this->ARR_SCRIPT[2]["name"] = "state.js";
        $this->ARR_SCRIPT[2]["type"] = "js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "calendar-win2k-cold-1.css";
        $this->ARR_SCRIPT[3]["type"] = "css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "jscalendar/calendar.js";
        $this->ARR_SCRIPT[4]["type"] = "js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "jscalendar/calendar-setup.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "jscalendar/lang/calendar-en.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "custom.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "style-popup.css";
        $this->ARR_SCRIPT[8]["type"] = "css";
        $this->ARR_SCRIPT[8]["loc"] = "header";

        $this->ARR_SCRIPT[9]["name"] = "profile_update.js";
        $this->ARR_SCRIPT[9]["type"] = "js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        $this->ARR_SCRIPT[10]["name"] = "form-wizard.js";
        $this->ARR_SCRIPT[10]["type"] = "js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->set('years', $aray);
        $this->set('month', $aray1);
        $this->set("referal_status", $referal_status);
        $this->set('product_status', $product_status);
        $this->set('pin_status', $pin_status);


        $tab_inactive = false;
        $register_amount = $this->register_board_model->getRegisterAmount();
        if ($register_amount == 0 && $product_status == 'no') {
            $tab_inactive = 'yes';
        }

        $payment_status_array = $this->register_board_model->getPaymentGatewayStatus();

        $payment_module_status = $this->register_board_model->getPaymentModuleStatus();



        $payment_pin_status = $payment_module_status['epin_type'];
        $free_joining_status = $payment_module_status['free_joining_type'];
        $payment_ewallet_status = $payment_module_status['ewallet_type'];
        $payment_gateway_status = $payment_module_status['gateway_type'];

        $paypal_status = $payment_status_array['paypal_status'];
        $credit_card_status = $payment_status_array['creditcard_status'];
        $epdq_status = $payment_status_array['epdq_status'];
        $authorize_status = $payment_status_array['authorize_status'];

        $this->set('authorize_status', $authorize_status);
        $this->set('epdq_status', $epdq_status);
        $this->set('paypal_status', $paypal_status);
        $this->set('years', $aray);
        $this->set('month', $aray1);
        $this->set('exp_year', $aray2);
        $this->set("referal_status", $referal_status);
        $this->set('product_status', $product_status);
        $this->set('pin_status', $pin_status);
        $this->set('tab_inactive', $tab_inactive);

        $this->set('payment_pin_status', $payment_pin_status);
        $this->set('payment_ewallet_status', $payment_ewallet_status);
        $this->set('payment_gateway_status', $payment_gateway_status);
        $this->set('credit_card_status', $credit_card_status);
        $this->set('free_joining_status', $free_joining_status);

        $registration_amount = $this->register_board_model->getRegisterAmount();
        $this->set("registration_amount", $registration_amount);

        if ($product_status == "yes")
            $is_product_added = $this->register_board_model->isProductAdded();

        if ($pin_status == "yes")
            $is_pin_added = $this->register_board_model->isPinAdded();

        $sponser_id = $this->session->userdata['logged_in']['user_id'];
        $user_type = $this->session->userdata['logged_in']['user_type'];
        $user_name = $this->register_board_model->obj_vali->IdToUserName($sponser_id);
        $spnser_full_name = $this->register_board_model->obj_vali->getFullName($sponser_id);
        $this->set("user_name", $user_name);
        $this->set("spnser_full_name", $spnser_full_name);
        $read = "";
        if ($sponser_id != "") {
            $read = "readonly='true'";
        }
        if ($product_status == "yes") {
            $products = $this->register_board_model->viewProducts();
            $this->set("products", $products);
        }

        $lang_id = $this->LANG_ID;
        $this->set("lang_id", $lang_id);

        $termsconditions = $this->register_board_model->getTermsConditions($lang_id);
        $this->set('termsconditions', $termsconditions);

        $state = $this->register_board_model->viewState('Select State');
        $this->set("state", $state);
        $this->set("read", $read);
        $this->set('posion', $posion);
        $this->set("user_type", $user_type);

        $countries = $this->register_board_model->viewCountry($lang_id);
        $this->set('countries', $countries);


        $this->set("is_pin_added", $is_pin_added);
        $this->set('is_product_added', $is_product_added);

        $user_type = $this->session->userdata['logged_in']['user_type'];
        $this->set('user_type', $user_type);


        //for language translation///
        $this->set("tran_currency", $this->lang->line('currency'));
        $this->set("tran_authorize", $this->lang->line('authorize'));
        $this->set("tran_epdq", $this->lang->line('epdq'));
        $this->set("tran_back", $this->lang->line('back'));
        $this->set("tran_next", $this->lang->line('next'));
        $this->set("tran_finish", $this->lang->line('finish'));
        $this->set("tran_mobile_no", $this->lang->line('mobile_no'));
        $this->set("tran_paypal", $this->lang->line('paypal'));
        $this->set("tran_registration_amount", $this->lang->line('registration_amount'));
        $this->set("tran_you_must_enter_pin_value", $this->lang->line('you_must_enter_pin_value'));
        $this->set("tran_you_must_select_pay_type", $this->lang->line('you_must_select_pay_type'));
        $this->set("tran_reg_type", $this->lang->line('reg_type'));
        $this->set("tran_transaction_password", $this->lang->line('transaction_password'));
        $this->set("tran_checking_trans_details", $this->lang->line('checking_trans_details'));
        $this->set("tran_invalid_trans_details", $this->lang->line('invalid_trans_details'));
        $this->set("tran_valid_trans_details", $this->lang->line('valid_trans_details'));
        $this->set("tran_checking_balance", $this->lang->line('checking_balance'));
        $this->set("tran_insuff_bal", $this->lang->line('insuff_bal'));
        $this->set("tran_bal_ok", $this->lang->line('bal_ok'));
        $this->set("tran_invalid_transaction_password", $this->lang->line('invalid_transaction_password'));
        $this->set("tran_transaction_ok", $this->lang->line('transaction_ok'));
        $this->set("tran_checking_transaction", $this->lang->line('checking_transaction'));

        $this->set("tran_free_join", $this->lang->line('free_joining'));
        $this->set("tran_ewallet", $this->lang->line('ewallet'));
        $this->set("tran_enter_card_no", $this->lang->line('ent_card_num'));
        $this->set("tran_ent_amnt", $this->lang->line('ent_amnt'));
        $this->set("tran_ent_valid_no", $this->lang->line('ent_valid_no'));
        $this->set("tran_ent_expiry_date", $this->lang->line('ent_expiry_date'));
        $this->set("tran_ent_fore_name", $this->lang->line('ent_fore_name'));
        $this->set("tran_ent_sure_name", $this->lang->line('ent_sure_name'));
        $this->set("tran_special_chars_not_allowed", $this->lang->line('special_chars_not_allowed'));
        $this->set("tran_account", $this->lang->line('account'));
        $this->set("tran_step1", $this->lang->line('step1'));
        $this->set("tran_step2", $this->lang->line('step2'));
        $this->set("tran_step3", $this->lang->line('step3'));
        $this->set("tran_credit_card", $this->lang->line('Credit_Card'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_card_information", $this->lang->line('card_information'));
        $this->set("tran_card_number", $this->lang->line('card_number'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_card_type", $this->lang->line('card_type'));
        $this->set("tran_card_verification", $this->lang->line('card_verification'));
        $this->set("tran_visa", $this->lang->line('visa'));
        $this->set("tran_master_card", $this->lang->line('master_card'));
        $this->set("tran_expiry_date", $this->lang->line('expiry_date'));
        $this->set("tran_first_name", $this->lang->line('first_name'));
        $this->set("tran_last_name", $this->lang->line('last_name'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_back", $this->lang->line('back'));
        $this->set("tran_epin_amount", $this->lang->line('epin_amount'));
        $this->set("tran_remain_epin_amount", $this->lang->line('remain_epin_amount'));
        $this->set("tran_req_epin_amount", $this->lang->line('req_epin_amount'));
        $this->set("tran_sl_no", $this->lang->line('sl_no'));
        $this->set("tran_product_amount", $this->lang->line('product_amount'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_sl_no", $this->lang->line('sl_no'));
        $this->set("tran_epin_val", $this->lang->line('epin_val'));
        $this->set("tran_digits_only", $this->lang->line('digits_only'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_new_user_signup", $this->lang->line('new_user_signup'));
        $this->set("tran_no_product_added_yet", $this->lang->line('no_product_added_yet'));
        $this->set("tran_please_click_here_to_add_product", $this->lang->line('please_click_here_to_add_product'));
        $this->set("tran_no_e_pin_added_yet", $this->lang->line('no_e_pin_added_yet'));
        $this->set("tran_please_click_here_to_add_e_pin", $this->lang->line('please_click_here_to_add_e_pin'));
        $this->set("tran_sponser_and_package_information", $this->lang->line('sponser_and_package_information'));
        $this->set("tran_placement_user_name", $this->lang->line('placement_user_name'));
        $this->set("tran_placement_full_name", $this->lang->line('placement_full_name'));
        $this->set("tran_position", $this->lang->line('position'));
        $this->set("tran_left_leg", $this->lang->line('left_leg'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_right_leg", $this->lang->line('right_leg'));
        $this->set("tran_select_leg", $this->lang->line('select_leg'));
        $this->set("tran_You_must_select_a_date", $this->lang->line('You_must_select_a_date'));
        $this->set("tran_You_must_select_a_month", $this->lang->line('You_must_select_a_month'));
        $this->set("tran_You_must_select_a_year", $this->lang->line('You_must_select_a_year'));
        $this->set("tran_You_must_select_country", $this->lang->line('You_must_select_country'));
        $this->set("tran_mail_id_format", $this->lang->line('mail_id_format'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_sponsor_user_name", $this->lang->line('sponsor_user_name'));
        $this->set("tran_personal_info", $this->lang->line('personal_info'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_password", $this->lang->line('password'));
        $this->set("tran_confirm_password", $this->lang->line('confirm_password'));
        $this->set("tran_date_of_birth", $this->lang->line('date_of_birth'));
        $this->set("tran_gender", $this->lang->line('gender'));
        $this->set("tran_You_must_select_gender", $this->lang->line('You_must_select_gender'));
        $this->set("tran_select_gender", $this->lang->line('select_gender'));
        $this->set("tran_male", $this->lang->line('male'));
        $this->set("tran_female", $this->lang->line('female'));
        $this->set("tran_contact_info", $this->lang->line('contact_info'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_country", $this->lang->line('country'));
        $this->set("tran_select_country", $this->lang->line('select_country'));
        $this->set("tran_state", $this->lang->line('state'));
        $this->set("tran_select_state", $this->lang->line('select_state'));
        $this->set("tran_district", $this->lang->line('district'));
        $this->set("tran_pin_code", $this->lang->line('pin_code'));
        $this->set("tran_mob_no_10_digit", $this->lang->line('mob_no_10_digit'));
        $this->set("tran_land_line_no", $this->lang->line('land_line_no'));
        $this->set("tran_nominee_info", $this->lang->line('nominee_info'));
        $this->set("tran_nominee_name", $this->lang->line('nominee_name'));
        $this->set("tran_relation", $this->lang->line('relation'));
        $this->set("tran_bank_info", $this->lang->line('bank_info'));
        $this->set("tran_pan_no", $this->lang->line('pan_no'));
        $this->set("tran_invalid", $this->lang->line('invalid'));
        $this->set("tran_bank_account_number", $this->lang->line('bank_account_number'));
        $this->set("tran_ifsc_code", $this->lang->line('ifsc_code'));
        $this->set("tran_bank_name", $this->lang->line('bank_name'));
        $this->set("tran_branch_name", $this->lang->line('branch_name'));
        $this->set("tran_terms_&_conditions", $this->lang->line('terms_&_conditions'));
        $this->set("tran_checking_placement_data", $this->lang->line('checking_placement_data'));
        $this->set("tran_validate_placement_data", $this->lang->line('validate_placement_data'));
        $this->set("tran_checking_your_position", $this->lang->line('checking_your_position'));
        $this->set("tran_position_validated", $this->lang->line('position_validated'));
        $this->set("tran_position_not_useable", $this->lang->line('position_not_useable'));
        $this->set("tran_sponser_name_validated", $this->lang->line('sponser_name_validated'));
        $this->set("tran_checking_sponser_user_name", $this->lang->line('checking_sponser_user_name'));
        $this->set("tran_invalid_sponser_user_name", $this->lang->line('invalid_sponser_user_name'));
        $this->set("tran_invalid_e_pin", $this->lang->line('invalid_e_pin'));
        $this->set("tran_e_pin_validated", $this->lang->line('e_pin_validated'));
        $this->set("tran_checking_e_pin_availability", $this->lang->line('checking_e_pin_availability'));
        $this->set("tran_you_must_select_product", $this->lang->line('you_must_select_product'));
        $this->set("tran_you_must_enter_e_pin", $this->lang->line('you_must_enter_e_pin'));
        $this->set("tran_you_must_enter_full_name", $this->lang->line('you_must_enter_full_name'));
        $this->set("tran_you_must_enter_password", $this->lang->line('you_must_enter_password'));
        $this->set("tran_minimum_six_characters_required", $this->lang->line('minimum_six_characters_required'));
        $this->set("tran_you_must_enter_your_password_again", $this->lang->line('you_must_enter_your_password_again'));
        $this->set("tran_password_miss_match", $this->lang->line('password_miss_match'));
        $this->set("tran_you_must_enter_username", $this->lang->line('you_must_enter_user_name'));
        $this->set("tran_you_must_select_date_of_birth", $this->lang->line('you_must_select_date_of_birth'));
        $this->set("tran_age_should_be_greater_than_18", $this->lang->line('age_should_be_greater_than_18'));
        $this->set("tran_you_must_enter_sponser_user_name", $this->lang->line('you_must_enter_sponser_user_name'));
        $this->set("tran_you_must_enter_sponser_id", $this->lang->line('you_must_enter_sponser_id'));
        $this->set("tran_you_must_select_your_position", $this->lang->line('you_must_select_your_position'));
        $this->set("tran_referral_name", $this->lang->line('referral_name'));
        $this->set("tran_You_must_enter_your_mobile_no", $this->lang->line('You_must_enter_your_mobile_no'));
        $this->set("tran_terms_condition", $this->lang->line('terms_condition'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_user_name_not_availablity", $this->lang->line('user_name_not_availablity'));
        $this->set("tran_user_name_not_available", $this->lang->line('user_name_not_available'));
        $this->set("tran_user_name_available", $this->lang->line('user_name_available'));
        $this->set("tran_special_chars_not_allowed", $this->lang->line('special_chars_not_allowed'));
        $this->set("tran_you_must_enter_email_id", $this->lang->line('you_must_enter_email_id'));
        $this->set("tran_You_must_enter_your_address", $this->lang->line('You_must_enter_your_address'));
        $this->set("tran_terms_conditions", $this->lang->line('terms_&_conditions'));
        $this->set("tran_I_ACCEPT_TERMS_AND_CONDITIONS", $this->lang->line('I_ACCEPT_TERMS_AND_CONDITIONS'));
        $this->set("tran_register_new_member", $this->lang->line('register_new_member'));
        $this->set("tran_month", $this->lang->line('month'));
        $this->set("tran_day", $this->lang->line('day'));
        $this->set("tran_year", $this->lang->line('year'));
        $this->set("tran_reset", $this->lang->line('reset'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_invalid_product", $this->lang->line('invalid_product'));
        $this->set("tran_turn_on_product", $this->lang->line('turn_on_product'));
        $this->set("tran_characters_only", $this->lang->line('characters_only'));
        $this->set("tran_pan_format", $this->lang->line('pan_format'));

        $this->set("page_top_header", $this->lang->line('new_user_signup'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('new_user_signup'));
        $this->set("page_small_header", "");

        $this->set("page_top_header", $this->lang->line('new_user_signup'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('new_user_signup'));
        $this->set("page_small_header", "");
        $help_link = "register_downline";
        $this->set("help_link", $help_link);



        $this->setScripts();
        $this->setView();
    }

    function preview($uname = "", $pass = "", $id = "") {

        $userid = urldecode($uname);
        $id_decode = str_replace("_", "/", $userid);
        $uname = $this->encrypt->decode($id_decode);
        $this->ARR_SCRIPT[0]["name"] = "validate_register.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $session_data = $this->session->userdata('logged_in');
        $user_name = $session_data['user_name'];
        $user_type = $session_data['user_type'];
        $admin_user_name = $session_data['admin_user_name'];
        if ($user_type != "admin")
            $user_type = 'user';
        $title = $this->lang->line('letter_preview');
        $this->set('title', $this->COMPANY_NAME . " | $title");

        $this->set('username', $user_name);
        $this->set("uname", $uname);
        $this->set("pass", $pass);
        $this->set("admin_user_name", $admin_user_name);
        $this->set("id", $id);
        $this->set("user_name", $user_name);
        $this->set("user_type", $user_type);
        $date = Date('Y-m-d H:i:s');
        $this->set("Date", $date);

        $lang_id = $this->LANG_ID;
        $this->set("lang_id", $lang_id);


        $letter_arr = $this->register_board_model->getLetterSetting($lang_id);
        $this->set("letter_arr", $letter_arr);

        $uid = $this->register_board_model->getUidFromUsername($uname);


        $row = $this->register_board_model->getFatherName($uid);


        $fid = $row->father_id;
        $prdtid = $row->product_id;



        $product_status = $this->MODULE_STATUS['product_status'];
        $referal_status = $this->MODULE_STATUS['referal_status'];

        if ($product_status == "yes") {
            $prdt_arr = $this->register_board_model->getProduct($prdtid);
            $this->set("prdt_arr", $prdt_arr);
            $this->set("product_status", $product_status);
        }
//        print_r($prdt_arr);die();
        $this->set("product_status", $product_status);
        $user_details = $this->register_board_model->getUserDetails($uid);

        $user_details_ref_user_id = $user_details[0]['user_details_ref_user_id'];
        if ($referal_status == "yes") {

            $sponsorname = $this->register_board_model->getFname($user_details_ref_user_id);
            $this->set("sponsorname", $sponsorname);
            $this->set("referal_status", $referal_status);
        }
        $adjusted_id = $this->register_board_model->getFname($fid);
        $this->set("adjusted_id", $adjusted_id);
        $this->set("referal_status", $referal_status);
        $this->set("user_details", $user_details);
        $this->load->model('register_model');
        $reg_amount = $this->register_board_model->getRegisterAmount();
        $this->set("reg_amount", $reg_amount);

        //for language translation
        $this->set("tran_distributers_name", $this->lang->line('distributers_name'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_date_of_joining", $this->lang->line('date_of_joining'));
        $this->set("page_header", $this->lang->line('new_user_signup'));
        $this->set("tran_phone_number", $this->lang->line('phone_number'));
        $this->set("tran_nominee", $this->lang->line('nominee'));
        $this->set("tran_pan_number", $this->lang->line('pan_number'));
        $this->set("tran_sponsor", $this->lang->line('sponsor'));
        $this->set("tran_package", $this->lang->line('package'));
        $this->set("page_top_header", $this->lang->line('new_user_signup'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_winning_regards", $this->lang->line('winning_regards'));
        $this->set("tran_admin", $this->lang->line('admin'));
        $this->set("tran_place", $this->lang->line('place'));
        $this->set("page_top_small_header", "");
        $this->set("page_small_header", "");
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_go_to_tree_view", $this->lang->line('go_to_tree_view'));
        $this->set("tran_go_to_board_view", $this->lang->line('go_to_board_view'));
        $this->set("tran_preview", $this->lang->line('preview'));
        $this->set("tran_Placment_ID", $this->lang->line('Placment_ID'));
        $this->set("tran_Login_Link", $this->lang->line('Login_Link'));
        $this->set("page_top_header", $this->lang->line('preview'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('preview'));
        $this->set("page_small_header", "");
        $help_link = "register_downline";
        $this->set("help_link", $help_link);
        $this->setScripts();
        $this->setView();
    }

    function register_submit() {

        $this->session->unset_userdata('regr');

        $regr = array();
        $username_config = $this->obj_config->getUsernameConfig();
        $regr['user_name_type'] = $username_config["type"];
        $regr['user_name_entry'] = $this->input->post('user_name_entry');

        $regr['address'] = $this->input->post('address');
        $regr['post_office'] = $this->input->post('post_office');
        $regr['town'] = $this->input->post('town');
        $regr['state'] = $this->input->post('state');
        $regr['district'] = $this->input->post('district_hid');
        $regr['pin'] = $this->input->post('pin');
        $regr['land_line'] = $this->input->post('land_line');
        $regr['email'] = $this->input->post('email');
        $regr['date_of_birth'] = $this->input->post('date_of_birth');
        $regr['nominee'] = $this->input->post('nominee');
        $regr['relation'] = $this->input->post('relation');
        $regr['pan_no'] = $this->input->post('pan_no');
        $regr['bank_acc_no'] = $this->input->post('bank_acc_no');
        $regr['ifsc'] = $this->input->post('ifsc');
        $regr['bank_name'] = $this->input->post('bank_name');
        $regr['bank_branch'] = $this->input->post('bank_branch');
        $regr['joining_date'] = date('Y-m-d H:i:s');
        $regr['year'] = $this->input->post('year');
        $regr['month'] = $this->input->post('month');
        $regr['day'] = $this->input->post('day');
        $regr['mobile_code'] = $this->input->post('mobile_code');
        $regr['is_pin'] = $this->input->post('is_pin_ok');
        $active_tab = $this->input->post('active_tab');

        $product_status = $this->MODULE_STATUS['product_status'];
        $module_status = $this->MODULE_STATUS;

        if ($this->input->post('ref_username') != "") {
            $regr['referral_name'] = mysql_real_escape_string($this->input->post('ref_username'));
        } else {
            $msg = $this->lang->line('invalid_sponser_user_name');
            $this->redirect($msg, "../register_board/user_register", false);
        }

        if ($product_status == "yes") {

            if ($this->input->post('prodcut_id') != "") {
                $regr['prodcut_id'] = mysql_real_escape_string($this->input->post('prodcut_id'));
            } else {
                $msg = $this->lang->line('invalid_product');
                $this->redirect($msg, "../register_board/user_register", false);
            }
        } else {
            $regr['prodcut_id'] = 0;
        }

        if ($this->input->post('full_name') != "") {
            $regr['full_name'] = mysql_real_escape_string($this->input->post('full_name'));
        } else {
            $msg = $this->lang->line('you_must_enter_full_name');
            $this->redirect($msg, "../register_board/user_register", FALSE);
        }
        if ($this->input->post('pswd') != "") {

            if ($this->input->post('cpswd')) {

                if (strcmp($this->input->post('pswd'), $this->input->post('cpswd')) == 0 && strlen($this->input->post('pswd')) >= 6) {
                    $validate = $this->validate_pswd($this->input->post('pswd'));
                    if ($validate) {
                        $regr['pswd'] = mysql_real_escape_string($this->input->post('pswd'));
                        $regr['cpswd'] = mysql_real_escape_string($this->input->post('cpswd'));
                    } else {
                        $msg = $this->lang->line('special_chars_not_allowed');
                        $this->redirect($msg, "../register_board/user_register", FALSE);
                    }
                } else {

                    $msg = $this->lang->line('password_mismatch_or_password_is_too_short');
                    $this->redirect($msg, "../register_board/user_register", FALSE);
                }
            }
        } else {
            $msg = $this->lang->line('you_must_enter_password');
            $this->redirect($msg, "../register_board/user_register", FALSE);
        }

        if ($this->input->post('gender')) {
            $regr['gender'] = mysql_real_escape_string($this->input->post('gender'));
        } else {
            $msg = $this->lang->line('select_gender');

            $this->redirect($msg, "../register_board/user_register", FALSE);
        }

        if ($this->input->post('country')) {
            $regr['country'] = $this->register_board_model->countryNameFromID(mysql_real_escape_string($this->input->post('country')));
        } else {
            $msg = $this->lang->line('select_country');
            $this->redirect($msg, "../register_board/user_register", FALSE);
        }

        if ($this->input->post('mobile')) {
            $regr['mobile'] = mysql_real_escape_string($this->input->post('mobile'));
        } else {

            $msg = $this->lang->line('You_must_enter_your_mobile_no');
            $this->redirect($msg, "../register_board/user_register", FALSE);
        }

        ////////////////////////// fOR E-Wallet DETAILS----START////////////////
        $is_ewallet_ok = false;
        if ($active_tab == 'ewallet_tab') {
            $ewallet_bal = $this->input->post('ewallet_bal');
            $used_amount = $this->input->post('product_amount');
            $ewallet_user = $this->input->post('user_name_ewallet');

            $ewallet_trans_password = $this->input->post('tran_pass_ewallet');
            if ($ewallet_user != "") {
                $user_available = $this->register_board_model->isUserAvailable($ewallet_user);
                if ($user_available) {
                    if ($ewallet_trans_password != "") {
                        $ewallet_user_id = $this->register_board_model->userNameToID($ewallet_user);
                        $trans_pass_available = $this->register_board_model->ewalletPassword($ewallet_user_id, $ewallet_trans_password);
                        if ($trans_pass_available == 'yes') {

                            $is_ewallet_ok = true;
                        } else {
                            $msg = $this->lang->line('invalid_transaction_password');
                            $this->redirect($msg, "../register_board/user_register", false);
                        }
                    } else {
                        $msg = $this->lang->line('invalid_transaction_password');
                        $this->redirect($msg, "../register_board/user_register", false);
                    }
                } else {
                    $msg = $this->lang->line('invalid_user_name_ewallet_tab');
                    $this->redirect($msg, "../register_board/user_register", false);
                }
            } else {
                $msg = $this->lang->line('invalid_user_name_ewallet_tab');
                $this->redirect($msg, "../register_board/user_register", false);
            }
        }
        ////////////////////////E-Wallet DETAILS----UP TO HERE......///////////////
        ////////////////////////// fOR CREDIT CARD DETAILS----START////////////////
        $is_card_ok = false;

        if ($active_tab == "credit_card_tab") {


            $credit_card = array();

            if ($this->input->post('card_number') != "") {
                $credit_card['card_no'] = mysql_real_escape_string($this->input->post('card_number'));
            } else {
                $msg = $this->lang->line('invalid_card_no');
                $this->redirect($msg, "../register_board/user_register", false);
            }
            if ($this->input->post('credit_currency') != "") {
                $credit_card['credit_currency'] = mysql_real_escape_string($this->input->post('credit_currency'));
            } else {
                $msg = $this->lang->line('you_must_select_currency');
                $this->redirect($msg, "../register_board/user_register", false);
            }
            if ($this->input->post('credit_card_type') != "") {
                $credit_card['credit_card_type'] = mysql_real_escape_string($this->input->post('credit_card_type'));
            } else {
                $msg = $this->lang->line('invalid_card_type');
                $this->redirect($msg, "../register_board/user_register", false);
            }

            if ($this->input->post('card_cvn') != "") {
                $credit_card['card_veri_no'] = mysql_real_escape_string($this->input->post('card_cvn'));
            } else {
                $msg = $this->lang->line('invalid_verify_no');
                $this->redirect($msg, "../register_board/user_register", false);
            }
            if ($this->input->post('card_expiry_date') != "") {
                $credit_card['card_expiry_date'] = mysql_real_escape_string($this->input->post('card_expiry_date'));
            } else {
                $msg = $this->lang->line('invalid_expiry_date');
                $this->redirect($msg, "../register_board/user_register", false);
            }
            if ($this->input->post('bill_to_forename') != "") {
                $credit_card['card_forename'] = mysql_real_escape_string($this->input->post('bill_to_forename'));
            } else {
                $msg = $this->lang->line('invalid_fore_name');
                $this->redirect($msg, "../register_board/user_register", false);
            }

            if ($this->input->post('bill_to_surname') != "") {
                $credit_card['card_surename'] = mysql_real_escape_string($this->input->post('bill_to_surname'));
            } else {
                $msg = $this->lang->line('invalid_sure_name');
                $this->redirect($msg, "../register_board/user_register", false);
            }

            if ($this->input->post('bill_to_email') != "") {
                $credit_card['card_email'] = mysql_real_escape_string($this->input->post('bill_to_email'));
            } else {
                $msg = $this->lang->line('You_have_entered_an_invalid_email');
                $this->redirect($msg, "../register_board/user_register", false);
            }

            if ($this->input->post('bill_to_phone') != "") {
                $credit_card['card_phone'] = mysql_real_escape_string($this->input->post('bill_to_phone'));
            } else {
                $msg = $this->lang->line('invalid_phone_no');
                $this->redirect($msg, "../register_board/user_register", false);
            }
            if ($credit_card['card_no'] != null) {
                $p_id = $regr['prodcut_id'];
                $product_amount = $this->register_board_model->getprdctAmount($p_id);
                $register_amount = $this->register_board_model->getRegisterAmount();

                $credit_card['total_amount'] = $product_amount + $register_amount;
                $is_card_ok = true;
            }
        }


        ////////////////////////CREDIT CARD DETAILS----UP TO HERE......///////
        ////////////__________EPin Details___Start/////////////////////////

        $is_pin_ok = false;
        if ($active_tab == 'epin_tab') {
            $string = $regr['is_pin'];

            //  echo 'ssss  '.$string.'  <br>';
            $json_array = Array();

            $jsonData = json_decode($string, TRUE);



            $pin_details = $jsonData;
            $pin_number = array();
            $arr_length = count($jsonData);


            $k = 1;
            for ($i = 0; $i < $arr_length; $i++) {
                if ($this->input->post("epin$k") == "") {
                    $this->redirect("You Must Enter the E-pin..", "../register_board/user_register", false);
                }
                $k++;
                $pin_number[$i . 'pin'] = ($pin_details[$i]['used_pin']);
                $pin_number[$i . 'bal_amount'] = ($pin_details[$i]['bal_amount']);
                $pin_number[$i . 'pin_ok'] = ($pin_details[$i]['pin_ok']);
                $pin_number[$i . 'pin_amount'] = ($pin_details[$i]['pin_amount']);
                if ($pin_number[$i . 'pin_ok'] == 1) {
                    $is_pin_ok = true;
                }
            }
        }

        ////////////__________EPin Details___End/////////////////////////


        $is_paypal_ok = false;
        if (($active_tab == "paypal_tab"))
            $is_paypal_ok = true;
        $is_epdq_ok = false;
        if (($active_tab == "epdq_tab"))
            $is_epdq_ok = true;
        $is_authorize_ok = false;
        if (($active_tab == "authorize_tab"))
            $is_authorize_ok = true;



        $regr['referral_id'] = $regr['referral_name'];
        $regr['referral_name'] = $this->input->post('ref_username');
        $regr['fatherid'] = $regr['referral_id'];

        $father_id = $this->register_board_model->userNameToID($regr['referral_name']);
        $regr['position'] = $this->register_board_model->getNextPosition($father_id);
        $regr['fathername'] = $this->register_board_model->obj_vali->IdToUserName($regr['fatherid']);
        $payment_status = 0;
        if ($is_card_ok) {
            $this->register_board_model->begin();
            $regr['by_using'] = 'credit card';

            $status = $this->register_board_model->confirmRegister($regr, $module_status);

            $user = $status['user'];
            $user_id = $this->register_board_model->userNameToID($user);
            $credit_card['user_id'] = $user_id;
            if ($status) {
                $card_res = $this->register_board_model->insertCredicardDetails($credit_card);
                if ($card_res) {
                    $payment_details = array(
                        'payment_method' => 'credit_card',
                        'token_id' => '',
                        'currency' => $credit_card['credit_currency'],
                        'amount' => $credit_card['total_amount'],
                        'acceptance' => "",
                        'payer_id' => "",
                        'user_id' => $user_id,
                        'status' => "",
                        'card_number' => $credit_card['card_no'],
                        'ED' => "",
                        'card_holder_name' => $credit_card['card_forename'],
                        'submit_date' => date("Y-m-d H:i:s"),
                        'pay_id' => "",
                        'error_status' => "",
                        'brand' => $credit_card['credit_card_type']);

                    $this->register_board_model->insertintoPaymenDetails($payment_details);
                    $payment_status = 1;
                }
            }
        } elseif ($is_pin_ok) {
            $this->register_board_model->begin();
            $regr['by_using'] = 'pin';
            $status = $this->register_board_model->confirmRegister($regr, $module_status);
            if ($status) {
                $pin_number['user'] = $status['user'];
                for ($i = 0; $i < $arr_length; $i++) {
                    if ($pin_number[$i . 'pin_ok'] == 1) {
                        $this->register_board_model->insertUsedPin($pin_number, $arr_length);
                        $res = $this->register_board_model->UpdateUsedEpin($pin_number, $arr_length);
                    }
                }
                if ($res)
                    $payment_status = 1;
            }
        }
        elseif ($is_ewallet_ok) {
            $this->register_board_model->begin();
            $used_user = $ewallet_user;

            $regr['by_using'] = 'ewallet';

            $status = $this->register_board_model->confirmRegister($regr, $module_status);

            $user = $status['user'];
            if ($status['status']) {

                $res1 = $this->register_board_model->insertUsedEwallet($used_user, $user, $used_amount);


                if ($res1) {

                    $res2 = $this->register_board_model->updateUsedEwallet($used_user, $user, $used_amount);
                    if ($res2)
                        $payment_status = 1;
                }
            }
        }
        elseif ($is_paypal_ok) {
            $regr['by_using'] = 'paypal';

            $this->session->set_userdata('regr', $regr);
            $msg = "";
            $this->redirect_out($msg, "register_board/pay_now/", FALSE);
        } elseif ($is_epdq_ok) {
            $regr['by_using'] = 'epdq';

            $this->session->set_userdata('regr', $regr);
            $msg = "";
            $this->redirect_out($msg, "register_board/epdqPayment/", FALSE);
        } elseif ($is_authorize_ok) {
            $regr['by_using'] = 'Authorize.Net';
            $this->register_board_model->begin();
            $this->session->set_userdata('regr', $regr);
            $msg = "";
            $this->redirect_out($msg, "register_board/authorizeNetPayment/", FALSE);
        } else {//______free joining________
            $regr['by_using'] = 'free join';

            $this->register_board_model->begin();
            $status = $this->register_board_model->confirmRegister($regr, $module_status);
            if ($status)
                $payment_status = 1;
        }
        $user = $status['user'];
        $pass = $status['pwd'];
        $encr_id = $status['id'];
        $tran_code = $status['tran'];

        $msg = '';
        if ($status['status'] && $payment_status) {
            $id_encode = $this->encrypt->encode($user);
            $id_encode = str_replace("/", "_", $id_encode);
            $user1 = urlencode($id_encode);

            $this->register_board_model->commit();
            $msg = $this->lang->line('registration_completed_successfully') . "<font size='2px'><b>$msg</b>  Username : $user &nbsp;&nbsp; Password : $pass ";

            if ($this->MODULE_STATUS['ewallet_status'] == "yes")
                $msg.="&nbsp;&nbsp; Transaction Password : $tran_code";

            $msg.="</font>";

            $this->redirect_out($msg, "register_board/preview/$user1", true);
        } else {
            $this->register_board_model->rollback();
            $msg = $this->lang->line('registration_failed');
            $this->redirect_out($msg, 'register_board/user_register', false);
        }
    }

    public function pay_now() {

        $p_id = $this->session->userdata["regr"]["prodcut_id"];
        $product_amount = $this->register_board_model->getprdctAmount($p_id);
        $register_amount = $this->register_board_model->getRegisterAmount();
        $total_amount = $product_amount + $register_amount;
        $paypal_details = $this->obj_config->getPaypalConfigDetails();

        $this->load->library('merchant');
        $this->merchant->load('paypal_express');

//        $settings = array(
//            'username' => 'business_api1.ioss.in',
//            'password' => '1400571384',
//            'signature' => 'ALnz-uC-Rm29guXy62muZVvYZTIVAZt6p6YLdh5JenpLbnHJW02gWPlt',
//            'test_mode' => TRUE);
        if ($paypal_details['mode'] == 'test')
            $mode = TRUE;
        else
            $mode = FALSE;
        $settings = array(
            'username' => $paypal_details['api_username'],
            'password' => $paypal_details['api_password'],
            'signature' => $paypal_details['api_signature'],
            'test_mode' => $mode);
        $this->merchant->initialize($settings);

        $base_url = base_url();
        $params = array(
            'amount' => $total_amount,
            'currency' => $paypal_details['currency'],
            'return_url' => $base_url . $paypal_details['return_url'],
            'cancel_url' => $base_url . $paypal_details['cancel_url']
        );


        $response = $this->merchant->purchase($params);
        //$this->setView();
    }

    public function payment_success() {

        $p_id = $this->session->userdata["regr"]["prodcut_id"];
        $product_amount = $this->register_board_model->getprdctAmount($p_id);
        $register_amount = $this->register_board_model->getRegisterAmount();
        $total_amount = $product_amount + $register_amount;
        $paypal_details = $this->obj_config->getPaypalConfigDetails();
        $this->load->library('merchant');
        $this->merchant->load('paypal_express');

//        $settings = array(
//            'username' => 'business_api1.ioss.in',
//            'password' => '1400571384',
//            'signature' => 'ALnz-uC-Rm29guXy62muZVvYZTIVAZt6p6YLdh5JenpLbnHJW02gWPlt',
//            'test_mode' => TRUE);
        if ($paypal_details['mode'] == 'test')
            $mode = TRUE;
        else
            $mode = FALSE;
        $settings = array(
            'username' => $paypal_details['api_username'],
            'password' => $paypal_details['api_password'],
            'signature' => $paypal_details['api_signature'],
            'test_mode' => $mode);
        $this->merchant->initialize($settings);

        $base_url = base_url();
        $params = array(
            'amount' => $total_amount,
            'currency' => $paypal_details['currency'],
            'return_url' => $base_url . $paypal_details['return_url'],
            'cancel_url' => $base_url . $paypal_details['cancel_url']
        );


        $response = $this->merchant->purchase_return($params);
        $regr = $this->session->userdata('regr');


        if ($response->success()) {

            $paypal_output = $this->input->get();

            $this->register_board_model->begin();
            if ($this->session->userdata('regr')) {

                $referral_id = $regr["referral_id"];
                $payment_details = array(
                    'payment_method' => 'paypal',
                    'token_id' => $paypal_output['token'],
                    'currency' => $paypal_details['currency'],
                    'amount' => $total_amount,
                    'acceptance' => '',
                    'payer_id' => $paypal_output['PayerID'],
                    'user_id' => $referral_id,
                    'status' => '',
                    'card_number' => '',
                    'ED' => '',
                    'card_holder_name' => '',
                    'submit_date' => date("Y-m-d H:i:s"),
                    'pay_id' => '',
                    'error_status' => '',
                    'brand' => '');

                $this->register_board_model->insertintoPaymenDetails($payment_details);
                $module_status = $this->MODULE_STATUS;
                $regr['by_using'] = 'paypal';

                $status = $this->register_board_model->confirmRegister($regr, $module_status);
            }
            $user = $status['user'];
            $pass = $status['pwd'];
            $encr_id = $status['id'];
            $tran_code = $status['tran'];

            $msg = '';
            if ($status['status']) {
                $id_encode = $this->encrypt->encode($user);
                $id_encode = str_replace("/", "_", $id_encode);
                $user1 = urlencode($id_encode);

                $this->register_board_model->commit();
                $this->session->unset_userdata('regr');
                $msg = $this->lang->line('registration_completed_successfully') . "<font size='2px'><b>$msg</b>  Username : $user &nbsp;&nbsp; Password : $pass ";

                if ($this->MODULE_STATUS['ewallet_status'] == "yes")
                    $msg.="&nbsp;&nbsp; Transaction Password : $tran_code";

                $msg.="</font>";

                $this->redirect_out($msg, "register_board/preview/$user1", true);
            } else {
                $this->register_board_model->rollback();
                $msg = $this->lang->line('registration_failed');
                $this->redirect_out($msg, 'register_board/user_register', false);
            }
        }
    }

    public function epdqPayment() {

        $p_id = $this->session->userdata["regr"]["prodcut_id"];
        $product_amount = $this->register_board_model->getprdctAmount($p_id);
        $register_amount = $this->register_board_model->getRegisterAmount();
        $total_amount = $product_amount + $register_amount;
        $epdq_details = $this->obj_config->getEpdqConfigDetails();

        $fullname = $this->session->userdata["regr"]["full_name"];



        $order_id = $this->register_board_model->generateOrderid($fullname, 'user_register');

        if (!$order_id) {
            echo "<script> alert('error on registration')</script>";
            $this->redirect_out('', 'register/user_register');
        }
        $base_url = base_url();
        //--------------sha value
        $sha_array = array(
            'PSPID' => $epdq_details['api_pspid'],
            'ORDERID' => $order_id,
            'AMOUNT' => $total_amount * 100,
            'CURRENCY' => $epdq_details['api_currency'],
            'LANGUAGE' => $epdq_details['api_language'],
            'ACCEPTURL' => $base_url . $epdq_details['accept_url'],
            'DECLINEURL' => $base_url . $epdq_details['decline_url'],
            'EXCEPTIONURL' => $base_url . $epdq_details['exception_url'],
            'CANCELURL' => $base_url . $epdq_details['cancel_url']
        );

        $pass = $epdq_details['api_password'];
        ksort($sha_array);
        $string_to_hash = '';
        foreach ($sha_array as $key => $val) {
            $string_to_hash.=sprintf("%s=%s%s", $key, $val, $pass);
        }
        $sha_sign = sha1($string_to_hash);

        strtoupper($sha_sign);

        $curl = curl_init();
        $order_details["PSPID"] = $epdq_details['api_pspid'];
        $order_details["ORDERID"] = $order_id;
        $order_details["AMOUNT"] = $total_amount;
        $order_details["CURRENCY"] = $epdq_details['api_currency'];
        $order_details["LANGUAGE"] = $epdq_details['api_language'];
        $order_details["SHASIGN"] = $sha_sign;
        $order_details["ACCEPTURL"] = $base_url . $epdq_details['accept_url'];
        $order_details["DECLINEURL"] = $base_url . $epdq_details['decline_url'];
        $order_details["EXCEPTIONURL"] = $base_url . $epdq_details['exception_url'];
        $order_details["CANCELURL"] = $base_url . $epdq_details['cancel_url'];



//        $order_details["PSPID"] = 'epdq1058670';
//        $order_details["ORDERID"] = $order_id;
//        $order_details["AMOUNT"] = $product_amount * 100;
//        $order_details["CURRENCY"] = 'GBP';
//        $order_details["LANGUAGE"] = 'en_US';
//        $order_details["SHASIGN"] = $sha_sign;
//        $order_details["ACCEPTURL"] = "https://localhost/WC/Revamp_Responsive/binary/register/edpqPaymentSuccess";
//        $order_details["DECLINEURL"] = "https://localhost/WC/Revamp_Responsive/binary/register/epdqPaymentFailure";
//        $order_details["EXCEPTIONURL"] = "https://localhost/WC/Revamp_Responsive/binary/register/epdqPaymentFailure";
//        $order_details["CANCELURL"] = "https://localhost/WC/Revamp_Responsive/binary/register/epdqPaymentFailure";
//
//
//        $url = 'https://mdepayments.epdq.co.uk/ncol/test/orderstandard.asp';

        $url = $epdq_details['api_url'];
        curl_setopt($curl, CURLOPT_URL, $url);
        $field_string = http_build_query($order_details);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $field_string);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        echo $result = curl_exec($curl);

        curl_close($curl);
    }

    public function edpqPaymentSuccess() {

        $detail_array = $this->input->get();
        $this->register_board_model->begin();
        $regr = $this->session->userdata("regr");
        $referral_id = $regr["referral_id"];
        $payment_details = array(
            'payment_method' => 'epdq',
            'token_id' => $detail_array['orderID'],
            'currency' => $detail_array['currency'],
            'amount' => $detail_array['amount'],
            'acceptance' => $detail_array['ACCEPTANCE'],
            'payer_id' => "",
            'user_id' => $referral_id,
            'status' => $detail_array['STATUS'],
            'card_number' => $detail_array['CARDNO'],
            'ED' => $detail_array['ED'],
            'card_holder_name' => $detail_array['CN'],
            'submit_date' => date("Y-m-d H:i:s"),
            'pay_id' => $detail_array['PAYID'],
            'error_status' => $detail_array['ED'],
            'brand' => $detail_array['BRAND']);

        $this->register_board_model->insertintoPaymenDetails($payment_details);
        if ($detail_array['STATUS'] == 9) {
            $module_status = $this->MODULE_STATUS;
            $regr['by_using'] = 'epdq';

            $status = $this->register_board_model->confirmRegister($regr, $module_status);
        }
        $user = $status['user'];
        $pass = $status['pwd'];
        $encr_id = $status['id'];
        $tran_code = $status['tran'];

        $msg = '';
        if ($status['status']) {
            $id_encode = $this->encrypt->encode($user);
            $id_encode = str_replace("/", "_", $id_encode);
            $user1 = urlencode($id_encode);

            $this->register_board_model->commit();
            $this->session->unset_userdata('regr');
            $msg = $this->lang->line('registration_completed_successfully') . "<font size='2px'><b>$msg</b>  Username : $user &nbsp;&nbsp; Password : $pass ";

            if ($this->MODULE_STATUS['ewallet_status'] == "yes")
                $msg.="&nbsp;&nbsp; Transaction Password : $tran_code";

            $msg.="</font>";

            $this->redirect_out($msg, "register_board/preview/$user1", true);
        } else {
            $this->register_board_model->rollback();
            $msg = $this->lang->line('registration_failed');
            $this->redirect_out($msg, 'register_board/user_register', false);
        }
    }

    public function epdqPaymentFailure() {
        $this->redirect('..ERROR ON REGISTRATION!! Payment failed..', '../register_board/user_register');
    }

    public function authorizeNetPayment() {

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";
        $this->setScripts();

        $this->set("page_top_header", $this->lang->line('authorize_authentication'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('authorize_authentication'));
        $this->set("page_small_header", "");
        $help_link = "";
        $this->set("help_link", $help_link);

        $this->set("action_page", $this->CURRENT_URL);
        $title = $this->lang->line('authorize_authentication');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $total_amount = 0;
        $p_id = $this->session->userdata["regr"]["prodcut_id"];
        $product_amount = $this->register_board_model->getprdctAmount($p_id);
        $register_amount = $this->register_board_model->getRegisterAmount();
        $total_amount = $product_amount + $register_amount;

        $merchant_details = array();
        $merchant_details = $this->register_board_model->getAuthorizeDetails();
        $api_login_id = $merchant_details['merchant_id'];
        $transaction_key = $merchant_details['transaction_key'];
//        $api_login_id = '82Lcmj5Wz2z';
//        $transaction_key = '8G5Y3z75dG7dXk2b';

        $fp_timestamp = time();
        $fp_sequence = "123" . time(); // Enter an invoice or other unique number.
        $fingerprint = $this->register_board_model->authorizePay($api_login_id, $transaction_key, $total_amount, $fp_sequence, $fp_timestamp);

        $this->set("tran_upgrade_now", $this->lang->line('upgrade_now'));
        $this->set('user_type', $this->LOG_USER_TYPE);
        $this->set('api_login_id', $api_login_id);
        $this->set('transaction_key', $transaction_key);
        $this->set('amount', $total_amount);
        $this->set('fp_timestamp', $fp_timestamp);
        $this->set('fingerprint', $fingerprint);
        $this->set('fp_sequence', $fp_sequence);

        $this->setView();
    }

    public function payment_done() {

        $response = $this->input->post();

        $regr = $this->session->userdata('regr');
        $this->session->unset_userdata('regr');
        $module_status = $this->MODULE_STATUS;
        $product_status = $this->MODULE_STATUS['product_status'];

        $status = $this->register_board_model->confirmRegister($regr, $module_status);

        $user = $status['user'];
        $pass = $status['pwd'];
        $tran_code = $status['tran'];

        $payment_method = 'Authorize.Net';
        $user_id = $this->register_board_model->userNameToID($user);
        if ($product_status == "yes") {
            $insert_into_sales = $this->register_model->insertIntoSalesOrder($user_id, $regr['prodcut_id'], $payment_method);
        }
        $res = $this->register_board_model->insertAuthorizeNetPayment($response, $user_id);


        if ($status['status']) {
            $id_encode = $this->encrypt->encode($user);
            $id_encode = str_replace("/", "_", $id_encode);
            $user1 = urlencode($id_encode);


            $this->register_board_model->commit();
            $msg = $this->lang->line('registration_completed_successfully') . "<font size='2px'><b>$msg</b>  Username : $user &nbsp;&nbsp; Password : $pass ";

            if ($this->MODULE_STATUS['ewallet_status'] == "yes")
                $msg.="&nbsp;&nbsp; Transaction Password : $tran_code";

            $msg.="</font>";

            $this->redirect_out($msg, "register_board/preview/$user1", true);
        } else {
            $this->register_board_model->rollback();
            $msg = $this->lang->line('registration_failed');
            $this->redirect_out($msg, 'register_board/user_register', false);
        }
    }

    function external_register() {

        $sponsor_username = "";
        $sponsor_fullname = '';
        $sponser_id = '';
        $user_type = 'distributor';
        if ($this->session->userdata('logged_in') != null) {
            $sponsor_username = $this->session->userdata['logged_in']['user_name'];
            $user_type = $this->session->userdata['logged_in']['user_type'];
            $sponser_id = $this->session->userdata['logged_in']['user_id'];
            $sponsor_fullname = $this->register_board_model->obj_vali->getFullName($sponser_id);
        }
        $this->set("sponsor_username", $sponsor_username);
        $this->set("sponsor_fullname", $sponsor_fullname);
        $this->set("user_type", $user_type);
        $this->ARR_SCRIPT[0]["name"] = "validate_register.js";
        $this->ARR_SCRIPT[0]["type"] = "js";

        $is_product_added = "";
        $is_pin_added = "";

        $username_config = $this->register_board_model->obj_config->getUsernameConfig();
        $user_name_type = $username_config["type"];

        $j = 0;
        for ($i = 1900; $i <= 2020; $i++) {
            $aray[$j] = $i;
            $j++;
        }
        $j = 0;
        for ($i = 1; $i <= 31; $i++) {
            $aray1[$j] = $i;
            $j++;
        }
        $module_status_arr = array();
        $product_status = "";
        $pin_status = "";
        $referal_status = "";

        if ($this->MODULE_STATUS) {
            $product_status = $this->MODULE_STATUS['product_status'];
            $pin_status = $this->MODULE_STATUS['pin_status'];
            $referal_status = $this->MODULE_STATUS['referal_status'];
        } else {
            $module_status_arr = $this->register_board_model->trackModule();
            $product_status = $module_status_arr['product_status'];
            $pin_status = $module_status_arr['pin_status'];
            $referal_status = $module_status_arr['referal_status'];
        }
        $title = $this->lang->line('new_user_signup');
        $this->set('title', $this->COMPANY_NAME . " | $title");
        $this->set('user_name_type', $user_name_type);

        if (($product_status == "yes") && ($pin_status == "yes") || ($product_status == "no") && ($pin_status == "yes")) {
            $this->ARR_SCRIPT[1]["name"] = "register.js";
            $this->ARR_SCRIPT[1]["type"] = "js";
        } else {
            $this->ARR_SCRIPT[1]["name"] = "register_without_pin.js";
            $this->ARR_SCRIPT[1]["type"] = "js";
        }

        $this->ARR_SCRIPT[2]["name"] = "state.js";
        $this->ARR_SCRIPT[2]["type"] = "js";
        $this->ARR_SCRIPT[3]["name"] = "calendar-win2k-cold-1.css";
        $this->ARR_SCRIPT[3]["type"] = "css";
        $this->ARR_SCRIPT[4]["name"] = "jscalendar/calendar.js";
        $this->ARR_SCRIPT[4]["type"] = "js";
        $this->ARR_SCRIPT[5]["name"] = "jscalendar/calendar-setup.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[6]["name"] = "jscalendar/lang/calendar-en.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[7]["name"] = "custom.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[8]["name"] = "style-popup.css";
        $this->ARR_SCRIPT[8]["type"] = "css";
        $this->ARR_SCRIPT[9]["name"] = "profile_update.js";
        $this->ARR_SCRIPT[9]["type"] = "js";

        $this->set('years', $aray);
        $this->set('month', $aray1);
        $this->set("referal_status", $referal_status);
        $this->set('product_status', $product_status);
        $this->set('pin_status', $pin_status);
        //$this->set('username', "User Name");

        if ($product_status == "yes")
            $is_product_added = $this->register_board_model->isProductAdded();

        if ($pin_status == "yes")
            $is_pin_added = $this->register_board_model->isPinAdded();

        if ($product_status == "yes") {
            $products = $this->register_board_model->viewProducts();
            $this->set("products", $products);
        }
        $termsconditions = $this->register_board_model->getTermsConditions();
        $this->set('termsconditions', $termsconditions);

        $reg_date = date("Y-m-d");
        $this->set("reg_date", $reg_date);
        $state = $this->register_board_model->viewState('Select State');
        $this->set("state", $state);
        $this->set("read", $read);
        //$this->set('posion', $posion);

        $this->set("is_pin_added", $is_pin_added);
        $this->set('is_product_added', $is_product_added);
        //for language translation///
        $this->set("tran_new_user_signup", $this->lang->line('new_user_signup'));
        $this->set("tran_no_product_added_yet", $this->lang->line('no_product_added_yet'));
        $this->set("tran_please_click_here_to_add_product", $this->lang->line('please_click_here_to_add_product'));
        $this->set("tran_no_e_pin_added_yet", $this->lang->line('no_e_pin_added_yet'));
        $this->set("tran_please_click_here_to_add_e_pin", $this->lang->line('please_click_here_to_add_e_pin'));
        $this->set("tran_sponser_and_package_information", $this->lang->line('sponser_and_package_information'));
        $this->set("tran_placement_user_name", $this->lang->line('placement_user_name'));
        $this->set("tran_placement_full_name", $this->lang->line('placement_full_name'));
        $this->set("tran_position", $this->lang->line('position'));
        $this->set("tran_left_leg", $this->lang->line('left_leg'));
        $this->set("tran_right_leg", $this->lang->line('right_leg'));
        $this->set("tran_select_leg", $this->lang->line('select_leg'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_sponsor_user_name", $this->lang->line('sponsor_user_name'));
        $this->set("tran_sponsor_full_name", $this->lang->line('sponsor_full_name'));
        $this->set("tran_personal_info", $this->lang->line('personal_info'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_password", $this->lang->line('password'));
        $this->set("tran_confirm_password", $this->lang->line('confirm_password'));
        $this->set("tran_date_of_birth", $this->lang->line('date_of_birth'));
        $this->set("tran_contact_info", $this->lang->line('contact_info'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_state", $this->lang->line('state'));
        $this->set("tran_district", $this->lang->line('district'));
        $this->set("tran_pin_code", $this->lang->line('pin_code'));
        $this->set("tran_mob_no_10_digit", $this->lang->line('mob_no_10_digit'));
        $this->set("tran_land_line_no", $this->lang->line('land_line_no'));
        $this->set("tran_nominee_info", $this->lang->line('nominee_info'));
        $this->set("tran_nominee_name", $this->lang->line('nominee_name'));
        $this->set("tran_relation", $this->lang->line('relation'));
        $this->set("tran_bank_info", $this->lang->line('bank_info'));
        $this->set("tran_pan_no", $this->lang->line('pan_no'));
        $this->set("tran_bank_account_number", $this->lang->line('bank_account_number'));
        $this->set("tran_ifsc_code", $this->lang->line('ifsc_code'));
        $this->set("tran_bank_name", $this->lang->line('bank_name'));
        $this->set("tran_branch_name", $this->lang->line('branch_name'));
        $this->set("tran_terms_and_conditions", $this->lang->line('terms_and_conditions'));
        $this->set("tran_checking_placement_data", $this->lang->line('checking_placement_data'));
        $this->set("tran_validate_placement_data", $this->lang->line('validate_placement_data'));
        $this->set("tran_checking_your_position", $this->lang->line('checking_your_position'));
        $this->set("tran_position_validated", $this->lang->line('position_validated'));
        $this->set("tran_position_not_useable", $this->lang->line('position_not_useable'));
        $this->set("tran_sponser_name_validated", $this->lang->line('sponser_name_validated'));
        $this->set("tran_checking_sponser_user_name", $this->lang->line('checking_sponser_user_name'));
        $this->set("tran_invalid_sponser_user_name", $this->lang->line('invalid_sponser_user_name'));
        $this->set("tran_invalid_e_pin", $this->lang->line('invalid_e_pin'));
        $this->set("tran_e_pin_validated", $this->lang->line('e_pin_validated'));
        $this->set("tran_checking_e_pin_availability", $this->lang->line('checking_e_pin_availability'));
        $this->set("tran_you_must_select_product", $this->lang->line('you_must_select_product'));
        $this->set("tran_you_must_enter_e_pin", $this->lang->line('you_must_enter_e_pin'));
        $this->set("tran_you_must_enter_full_name", $this->lang->line('you_must_enter_full_name'));
        $this->set("tran_you_must_enter_password", $this->lang->line('you_must_enter_password'));
        $this->set("tran_minimum_six_characters_required", $this->lang->line('minimum_six_characters_required'));
        $this->set("tran_you_must_enter_your_password_again", $this->lang->line('you_must_enter_your_password_again'));
        $this->set("tran_password_miss_match", $this->lang->line('password_miss_match'));
        $this->set("tran_you_must_select_date_of_birth", $this->lang->line('you_must_select_date_of_birth'));
        $this->set("tran_age_should_be_greater_than_18", $this->lang->line('age_should_be_greater_than_18'));
        $this->set("tran_you_must_enter_sponser_user_name", $this->lang->line('you_must_enter_sponser_user_name'));
        $this->set("tran_you_must_enter_sponser_id", $this->lang->line('you_must_enter_sponser_id'));
        $this->set("tran_you_must_select_your_position", $this->lang->line('you_must_select_your_position'));
        $this->set("tran_referral_name", $this->lang->line('referral_name'));
        $this->set("tran_You_must_enter_your_mobile_no", $this->lang->line('You_must_enter_your_mobile_no'));
        $this->set("tran_terms_condition", $this->lang->line('terms_condition'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_user_name_not_availablity", $this->lang->line('user_name_not_availablity'));
        $this->set("tran_user_name_not_available", $this->lang->line('user_name_not_available'));
        $this->set("tran_user_name_available", $this->lang->line('user_name_available'));
        $this->set("tran_select_product", $this->lang->line('select_product'));

        $this->setScripts();
        $this->setView();
    }

    function pass_availability() {


        if ($this->register_board_model->checkPassCode($this->input->post('prodcutpin'))) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    function sponsor_availability() {

        if ($this->register_board_model->checkSponser($this->input->post('sponser_name'), $this->input->post('user_id'))) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    function leg_availability() {

        if ($this->register_board_model->checkLeg($this->input->post('sponserleg'), $this->input->post('sponser_user_name'))) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    function user_name_availability() {

        if ($this->register_board_model->checkUser($this->input->post('user_name'))) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    function get_district($state_id) {

        $arr = $this->register_board_model->getDistrict($state_id);
        echo '&nbsp;&nbsp;&nbsp;<select name="district"  id="district" style="width: 158px;" tabindex="14" onChange="setHiddenValue(this.value)" >
				<option value="">Select District</option>';
        for ($i = 0; $i < count($arr); $i++) {
            $id = $arr["detail$i"]["district_id"];
            $name = $arr["detail$i"]["district_name"];
            echo "<option value='$name'>$name</option>";
        }
        echo '</select>';
    }

    function ref_user_availability() {

        $username = mysql_real_escape_string($this->input->post('username'));
        if ($this->register_board_model->isUserAvailable($username)) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    function get_referral_name() {

        $username = mysql_real_escape_string($this->input->post('username'));

        $user_id = $this->register_board_model->getUidFromUsername($username);
        $referral_name = $this->register_board_model->getReferralName($user_id);
        echo $referral_name;
        exit();
    }

    public function redirect_out($msg, $page, $message_type = false) {
        //redirection for the registration as it needs not the admin/user in url redirect function is modified 
        $MSG_ARR["MESSAGE"]["DETAIL"] = $msg;
        $MSG_ARR["MESSAGE"]["TYPE"] = $message_type;
        $MSG_ARR["MESSAGE"]["STATUS"] = true;

        $this->session->set_flashdata('MSG_ARR', $MSG_ARR);
        redirect($page, 'refresh');
    }

    function epin_submited() {


        $input = file_get_contents('php://input');

        $jsonData = json_decode($input, TRUE);

        $pin_details = Array();

        foreach ($jsonData as $key => $value) {
            $pin_details = $value;
        }
        $pin_number = array();
        $arr_length = count($pin_details);

        for ($i = 0; $i < $arr_length; $i++) {

            $pin_number[$i]['pin'] = ($pin_details[$i]['used_pin']);
            $pin_number[$i]['bal_amount'] = ($pin_details[$i]['bal_amount']);
            $pin_number[$i]['pin_ok'] = ($pin_details[$i]['pin_ok']);
            $pin_number[$i]['pin_amount'] = ($pin_details[$i]['pin_amount']);

            if ($pin_number[$i]['pin_ok'] == 1) {
                echo 1;
            }
        }
    }

    public function isEpinValid() {

        $input = file_get_contents('php://input');

        $jsonData = json_decode($input, TRUE);

        $pin_details = Array();

        foreach ($jsonData as $key => $value) {
            $pin_details = $value;
        }

        $arr_length = count($pin_details);
        for ($i = 0; $i < $arr_length; $i++) {
            $pin_number[$i] = $pin_details[$i]['pin'];
            $epin[$i] = mysql_real_escape_string($pin_number[$i]);
            $done = $this->register_board_model->getEpin($epin[$i]);
            if ($done) {
                $pin["$i"]['pin'] = $done['pin_numbers'];
                $pin["$i"]['amount'] = $done['pin_amount'];
                // echo $done['pin_numbers'].$done['pin_amount'];
            } else {

                $pin["$i"]['pin'] = 'nopin';
                $pin["$i"]['amount'] = '0';
            }
        }
        $value = json_encode($pin);
        echo $value;
        //echo $pin['pin'] . "--" . $pin['amount'];
        exit();
    }

    public function product_amount() {

        $pin = $this->input->post('p_id');
        // $res=$this->register_model->prdct_amount($pin);
        $res = $this->register_board_model->getprdctAmount($pin);
        //$this->set("total", '100');
        if ($res) {
            echo $res;
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    public function balance_available() {


        $ewallet_user = $this->input->post('user_name');
        $balance = $this->input->post('balance');
        $user_name_ewallet = $this->register_board_model->userNameToID($ewallet_user);
        $user_bal_amount = $this->register_board_model->balnceAmount($user_name_ewallet, $balance);
        if ($user_bal_amount != "") {

            echo $user_bal_amount;
        }
    }

    public function ewallet_available() {


        $ewallet_user = $this->input->post('user_name');
        $ewallet_pass = $this->input->post('ewallet');
        $user_name_ewallet = $this->register_board_model->userNameToID($ewallet_user);
        $user_bal_amount = $this->register_board_model->ewalletPassword($user_name_ewallet, $ewallet_pass);
        if ($user_bal_amount == 'yes') {

            echo 'yes';
        } else {
            echo 'no';
        }
    }

    public function register_amount() {

        $res = $this->register_board_model->getRegisterAmount();
        if ($res)
            echo $res;
        else
            echo 'no_data';
    }

    function validate_pswd($password) {
        if (!preg_match('/^[a-z0-9A-Z]*$/', $password)) {

            return false;
        } else
            return true;
    }

    function checkUserNameAvailability() {

        if ($this->register_board_model->checkUser($this->input->post('user_name'))) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    function checkRefUserAvailability() {

        $username = mysql_real_escape_string($this->input->post('username'));

        if ($this->register_board_model->isUserAvailable($username)) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    public function checkBalanceAvailable() {


        $ewallet_user = $this->input->post('user_name');
        $balance = $this->input->post('balance');
        $user_name_ewallet = $this->register_board_model->userNameToID($ewallet_user);
        echo $user_bal_amount = $this->register_board_model->balanceAmount($user_name_ewallet, $balance);
        if ($user_bal_amount != "") {

            echo $user_bal_amount;
        }
    }

    public function checkEwalletAvailable() {


        $ewallet_user = $this->input->post('user_name');
        $ewallet_pass = $this->input->post('ewallet');
        $user_name_ewallet = $this->register_board_model->userNameToID($ewallet_user);
        $user_bal_amount = $this->register_board_model->ewalletPassword($user_name_ewallet, $ewallet_pass);
        if ($user_bal_amount == 'yes') {

            echo 'yes';
        } else {
            echo 'no';
        }
    }

}

?>