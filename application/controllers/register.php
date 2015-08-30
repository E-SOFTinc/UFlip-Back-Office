<?php

require_once 'user/Inf_Controller.php';

class Register extends Inf_Controller {

    public $obj_config;

    function __construct() {

        parent::__construct();


        $this->load->model('configuration_model', '', TRUE);
        $this->obj_config = new configuration_model();
        $this->load->library('form_validation');
    }

    function user_register($id = "", $posion = "", $sponser_id = "", $placement = "") {
        
        if($_GET['username']){
            $sponser_name = $_GET['username'];
            $this->load->model('register_model');
            if($this->register_model->checkUser($sponser_name)){
                $this->redirect($this->lang->line('Invalid_Username'), "../", false);
            }
            
        }

        if (!$this->checkSession()) {
            if ($id == '') {
                $id = $this->register_model->getAdminUserName();
            } else {
                $ref_present = $this->register_model->checkUserName($id);
                if (!$ref_present) {
                    $id = $this->register_model->getAdminUserName();
                }
            }
            $this->set('sponser_id_ext', $id);
        }

        $title = $this->lang->line('new_user_signup');
        $this->set('title', $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_register.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->set('status_id', $sponser_id);

        if ($this->checkSession()) {
            $st_name = $this->session->userdata['logged_in']['user_name'];
        } else {
            $st_name = '';
        }

        $this->set('status_name', $st_name);
        $is_product_added = "";
        $is_pin_added = "";
        $username_config = $this->obj_config->getUsernameConfig();
        $user_name_type = $username_config["type"];
        if ($this->checkSession()) {
            $user_type = $this->session->userdata['logged_in']['user_type'];
        } else {
            $user_type = '';
        }

        //      $this->session->unset_userdata('regr');
        $state_fill = '';
        $reg_count = 0;
        $regr = array();
        if ($this->session->userdata("regr")) {
            $regr = $this->session->userdata("regr");
            $state_fill = $this->register_model->viewState($regr['country_id']);
            $reg_count = count($this->session->userdata("regr"));
            $regr['product'] = $this->register_model->getPrdocut($regr['prodcut_id']);
            //$regr['country']; //= $this->register_model->getCountryName($regr['prodcut_id']);
        }
        $this->set('regr', $regr);
        $this->set('state_fill', $state_fill);
        $this->set('reg_count', $reg_count);
        $this->session->unset_userdata("regr");


        $j = 0;
        $curr_date = date('Y');
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
        $tab3 = $tab4 = $tab5 = $tab6 = "";

        $this->session->set_userdata("registration_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2, "tab3" => $tab3, "tab4" => $tab4, "tab5" => $tab5, "tab6" => $tab6));
        if ($this->session->userdata("registration_tab_active_arr")) {
            $tab1 = $this->session->userdata['registration_tab_active_arr']['tab1'];
            $tab2 = $this->session->userdata['registration_tab_active_arr']['tab2'];
            $tab3 = $this->session->userdata['registration_tab_active_arr']['tab3'];
            $tab4 = $this->session->userdata['registration_tab_active_arr']['tab4'];
            $tab5 = $this->session->userdata['registration_tab_active_arr']['tab5'];
            $tab6 = $this->session->userdata['registration_tab_active_arr']['tab6'];
            $this->session->unset_userdata("registration_tab_active_arr");
        }
        $this->set("tab1", $tab1);
        $this->set("tab2", $tab2);
        $this->set("tab3", $tab3);
        $this->set("tab4", $tab4);
        $this->set("tab5", $tab5);
        $this->set("tab6", $tab6);
        $product_status = $this->MODULE_STATUS['product_status'];
        $pin_status = $this->MODULE_STATUS['pin_status'];
        $referal_status = $this->MODULE_STATUS['referal_status'];

//        $ewallet_status = $this->MODULE_STATUS['ewallet_status'];
//        $credit_card_status = $this->MODULE_STATUS['credit_card'];
//        $free_joining_status = $this->MODULE_STATUS['free_joining_status'];


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
                $this->ARR_SCRIPT[1]["name"] = "register_link_without_pin.js";
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

        $this->ARR_SCRIPT[7]["name"] = "style-popup.css";
        $this->ARR_SCRIPT[7]["type"] = "css";
        $this->ARR_SCRIPT[7]["loc"] = "header";

        $this->ARR_SCRIPT[8]["name"] = "profile_update.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "form-wizard.js";
        $this->ARR_SCRIPT[9]["type"] = "js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        /*         * ****************for form validation************ */
        if ($this->session->userdata('error')) {
            $error = $this->session->userdata('error');
            $this->set('error', $error);
            $this->session->unset_userdata('error');
        }

        if ($this->session->userdata('num_of_epins')) {
            $num_of_epins = $this->session->userdata('num_of_epins');
            $this->set('num_of_epins', $num_of_epins);
            $this->session->unset_userdata('num_of_epins');
        }

        /*         * *******************form validation************ */
//        $paypal_status_array = $this->register_model->getPaymentGatewayStatus();
//
//
//        $payment_module_status = $this->register_model->getPaymentStatus();
//        $i = 0;
//
//        $final_array = array();
//        foreach ($payment_module_status as $val) {
//            foreach ($val as $val2) {
//                //    if($i!=2)'
//                $final_array[] = $val2;
//            }
//        }
//        $payment_count = count($final_array);
//        for ($i = 0; $i < $payment_count; $i++) {
//            if ($final_array[$i] == 'Payment Gateway') {
//                $payment_gateway_status = $final_array[$i + 1];
//            }
//            if ($final_array[$i] == 'E-pin') {
//                $'payment_pin_status' = $final_array[$i + 1];
//            }
//            if ($final_array[$i] == 'Free Joining') {
//                $free_joining_status = $final_array[$i + 1];
//            }
//            if ($final_array[$i] == 'E-wallet') {
//                $payment_ewallet_status = $final_array[$i + 1];
//            }
//        }

        $payment_status_array = $this->register_model->getPaymentGatewayStatus();

        $payment_module_status = $this->register_model->getPaymentModuleStatus();
//        echo "<pre>";print_r($payment_module_status); echo "</pre>";die();

        $tab_inactive = false;
        $register_amount = $this->register_model->getRegisterAmount();
        if ($register_amount == 0 && $product_status == 'no') {
            $tab_inactive = 'yes';
        }
        $payment_pin_status = $payment_module_status['epin_type'];
        $free_joining_status = $payment_module_status['free_joining_type'];
        $payment_ewallet_status = $payment_module_status['ewallet_type'];
        $payment_gateway_status = $payment_module_status['gateway_type'];
        $i = 0;

        $paypal_status = $payment_status_array['paypal_status'];
        $credit_card_status = $payment_status_array['creditcard_status'];
        $epdq_status = $payment_status_array['epdq_status'];
        $authorize_status = $payment_status_array['authorize_status'];
        $e_xact_status = $payment_status_array['e_xact_status'];

        $this->set('e_xact_status', $e_xact_status);
        $this->set('authorize_status', $authorize_status);
        $this->set('epdq_status', $epdq_status);
        $this->set('paypal_status', $paypal_status);
        $this->set('tab_inactive', $tab_inactive);
        $this->set('years', $aray);
        $this->set('month', $aray1);
        $this->set('exp_year', $aray2);
        $this->set("referal_status", $referal_status);
        $this->set('product_status', $product_status);
        $this->set('pin_status', $pin_status);

        $this->set('payment_pin_status', $payment_pin_status);
        $this->set('payment_ewallet_status', $payment_ewallet_status);
        $this->set('payment_gateway_status', $payment_gateway_status);
        $this->set('credit_card_status', $credit_card_status);
        $this->set('free_joining_status', $free_joining_status);
        if ($product_status == "yes")
            $is_product_added = $this->register_model->isProductAdded();

        if ($pin_status == "yes")
            $is_pin_added = $this->register_model->isPinAdded();


        if ($sponser_id != "") {
            $user_name = $this->register_model->obj_vali->IdToUserName($sponser_id);
            $spnser_full_name = $this->register_model->obj_vali->getFullName($sponser_id);
            $this->set("spnser_full_name", $spnser_full_name);
        } else if ($_GET['username']) {
            $sponser_name = $_GET['username'];
            $this->set('sponser_name', $sponser_name);
        } else if ($this->checkSession()) {
            $user_name = $this->session->userdata['logged_in']['user_name'];
        } else {
            $user_name = '';
        }
        $this->set("user_name", $user_name);

        $read = "";
        if ($sponser_id != "") {
            $read = "readonly='true'";
        }
        if ($product_status == "yes") {
            $products = $this->register_model->viewProducts();
//            echo'<pre>'.print_r($products);die(); echo'</pre>';
            $this->set("products", $products);
        }

        $registration_amount = $this->register_model->getRegisterAmount();
        $this->set("registration_amount", $registration_amount);
        $lang_id = $this->LANG_ID;
        $this->set("lang_id", $lang_id);

        $termsconditions = $this->register_model->getTermsConditions($lang_id);
        $this->set('termsconditions', $termsconditions);

        $countries = $this->register_model->viewCountry($lang_id);
//        echo'<pre>'.print_r($countries);die(); echo'</pre>';
        $this->set('countries', $countries);

        $states_of_canada = $this->register_model->viewState_of_canada();


        $state = $this->register_model->viewState('Select State');
        $this->set("state", $state);
        $this->set("read", $read);
        $this->set('posion', $posion);

        $this->set("is_pin_added", $is_pin_added);
        $this->set('is_product_added', $is_product_added);
        if ($this->checkSession()) {
            $user_type = $this->session->userdata['logged_in']['user_type'];
        } else {
            $user_type = '';
        }

        $this->set('user_type', $user_type);

        //for language translation///
        $this->set("tran_currency", $this->lang->line('currency'));
        $this->set("tran_paypal", $this->lang->line('paypal'));
        $this->set("tran_authorize", $this->lang->line('authorize'));
        $this->set("tran_epdq", $this->lang->line('epdq'));
        $this->set("tran_upgrade_now", $this->lang->line('upgrade_now'));
        $this->set("tran_you_must_enter_pin_value", $this->lang->line('you_must_enter_pin_value'));
        $this->set("tran_next", $this->lang->line('next'));
        $this->set("tran_you_must_select_pay_type", $this->lang->line('you_must_select_pay_type'));
        $this->set("tran_reg_type", $this->lang->line('reg_type'));
        $this->set("tran_transaction_password", $this->lang->line('transaction_password'));
        $this->set("tran_checking_trans_details", $this->lang->line('checking_trans_details'));
        $this->set("tran_invalid_trans_details", $this->lang->line('invalid_trans_details'));
        $this->set("tran_valid_trans_details", $this->lang->line('valid_trans_details'));
        $this->set("tran_insuff_bal", $this->lang->line('insuff_bal'));
        $this->set("tran_bal_ok", $this->lang->line('bal_ok'));
        $this->set("tran_invalid_transaction_password", $this->lang->line('invalid_transaction_password'));
        $this->set("tran_transaction_ok", $this->lang->line('transaction_ok'));
        $this->set("tran_checking_transaction", $this->lang->line('checking_transaction'));

        $this->set("tran_select_product", $this->lang->line('select_product'));
        $this->set("tran_free_join", $this->lang->line('free_joining'));
        $this->set("tran_back", $this->lang->line('back'));
        $this->set("tran_finish", $this->lang->line('finish'));
        $this->set("tran_mobile_no", $this->lang->line('mobile_no'));
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
        $this->set("tran_registration_amount", $this->lang->line('registration_amount'));
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
        $this->set("tran_see_all_messages", $this->lang->line('see_all_messages'));
        $this->set("tran_you_have_no_new_mail", $this->lang->line('you_have_no_new_mail'));
        $this->set("tran_quantity", $this->lang->line('quantity'));
        $this->set("tran_valid_quantity", $this->lang->line('valid_quantity'));
        $this->set("tran_enter_more_than_4_characters", $this->lang->line('enter_more_than_4_characters'));
        $this->set("tran_enter_more_than_3_characters", $this->lang->line('minimum_three_characters_required'));
        $this->set("tran_Sponsor_username_validated", $this->lang->line('Sponsor_username_validated'));
        $this->set("tran_Invalid_Sponsor_data", $this->lang->line('Invalid_Sponsor_data'));
        $this->set("tran_sponsor_full_name", $this->lang->line('sponsor_full_name'));
        $this->set("tran_Credit_card_or_Interac_debit_card", $this->lang->line('Credit_card_or_Interac_debit_card'));
        $this->set("tran_Invalid_Sponsor_username", $this->lang->line('Invalid_Sponsor_username'));
        $this->set("tran_alpha_numeric_values_only", $this->lang->line('alpha_numeric_values_only'));
        $this->set("tran_maximum_username_length", $this->lang->line('maximum_username_length'));
        $this->set("tran_invalid_password", $this->lang->line('invalid_password'));

        $this->set("page_top_header", $this->lang->line('new_user_signup'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('new_user_signup'));
        $this->set("page_small_header", "");


        $help_link = "register-new-member";
        $this->set("help_link", $help_link);

        $this->setScripts();

        $this->setView();
    }

    function checkPassAvailability() {


        if ($this->register_model->checkPassCode($this->input->post('prodcutpin'), $this->input->post('prodcutid'))) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    function checkSponsorAvailability() {

        if ($this->register_model->checkSponser($this->input->post('sponser_name'), $this->input->post('user_id'))) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    function checkLegAvailability() {

        if ($this->register_model->checkLeg($this->input->post('sponserleg'), $this->input->post('sponser_user_name'))) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    function checkUserNameAvailability($user = '') {

        /*         * ****For Severside Validation */
        if ($user != '') {
            if (!$this->register_model->isUserAvailable($user)) {
                return TRUE;
            } else
                return FALSE;
        }
        /*         * *****Severside Validation Ends */


        if ($this->register_model->checkUser($this->input->post('user_name'))) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    function get_states($country_id, $lang_id = '') {
        $state_select = '';

        $tran_state = $this->lang->line('state');
        $state_select = " <label for='state' class='col-sm-3 control-label'>
                                $tran_state :
                            </label>
                                ";
        $state_select .= '<div class="col-sm-7"><select name="state" id="state" tabindex="15" class="form-control">';

        $option = $this->lang->line('select_state');
//        if($option == ''){
//            
//        }else{
//            $option = 'Québec';
//        }

        $state_select .= $this->register_model->viewState($country_id, $lang_id, $option);
        $state_select .= '</select></div>';

        echo $state_select;
    }

    function get_states_of_canada($lang_id = '') {
        $state_select = '';

        $tran_state = $this->lang->line('state');
        $state_select = " <label for='state' class='col-sm-3 control-label'>
                                $tran_state :
                            </label>
                                ";
        $state_select .= '<div class="col-sm-7"><select name="state" id="state" tabindex="15" class="form-control">';

        $option = $this->lang->line('select_state');
        $state_select .= $this->register_model->viewState_of_canada();
        $state_select .= '</select></div>';

        echo $state_select;
    }

    function get_phone_code($country_id) {
        $country_telephone_code = $this->register_model->getCountryTelephoneCode($country_id);
        echo "+$country_telephone_code";
    }

    function get_district($state_id) {

        $arr = $this->register_model->getDistrict($state_id);

        $tran_district = $this->lang->line('district');

        $district_select = "   <div id='state_div'>
                                     
                                        <div class='form-group'>
                                            <label class='col-sm-3 control-label'>
                                                $tran_district
                                            </label>
                                        
                                            <div class='col-sm-7'> ";
        $district_select .='<select name="district"  id="district" class="form-control" tabindex="16" onChange="setHiddenValue(this.value)" >';

        $option = $this->lang->line('select_district');

        $district_select .= '<option value="">' . $option . '</option>';

        for ($i = 0; $i < count($arr); $i++) {
            $id = $arr["detail$i"]["district_id"];
            $name = $arr["detail$i"]["district_name"];

            $district_select .= "<option value='$name'>$name</option>";
        }
        $district_select .= '</select>
                                            </div>
                                         
                                    </div>
                                 
                            </div>';

        echo $district_select;
    }

    function checkRefUserAvailability($ref_user = '') {

        /*         * ****For Severside Validation */
        if ($ref_user != '') {
            if ($this->register_model->isUserAvailable($ref_user)) {
                return TRUE;
            } else
                return FALSE;
        }
        /*         * *****Severside Validation Ends */

        $username = mysql_real_escape_string($this->input->post('username'));

        if ($this->register_model->isUserAvailable($username)) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    function getReferralName() {

        $username = mysql_real_escape_string($this->input->post('username'));

        $user_id = $this->register_model->getUidFromUsername($username);
        $referral_name = $this->register_model->getReferralName($user_id);
        echo $referral_name;
        exit();
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

    function register_submit() {

        $post_details = $this->input->post();
//        echo '<pre>';print_r($post_details); echo '</pre>';die();

        $title = $this->lang->line('letter_preview');
        $this->set('title', $this->COMPANY_NAME . " | $title");
        $this->set("page_top_header", $this->lang->line('new_user_signup'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('new_user_signup'));
        $this->set("page_small_header", "");


        $regr = array();
        $username_config = $this->obj_config->getUsernameConfig();
        $regr['user_name_type'] = $username_config["type"];
        $regr['user_name_entry'] = $this->input->post('user_name_entry');
        $regr['position'] = $this->input->post('position');
        $regr['address'] = $this->input->post('address');
        $regr['post_office'] = $this->input->post('post_office');
        $regr['town'] = $this->input->post('town');
        $regr['state'] = $this->input->post('state');
        $regr['state_name'] = $this->register_model->getStateName($this->input->post('state'));
        $regr['district'] = $this->input->post('district_hid');
        $regr['pin'] = $this->input->post('pin');
        $regr['land_line'] = $this->input->post('land_line');
        $regr['email'] = $this->input->post('email');
        $regr['date_of_birth'] = $this->input->post('date_of_birth');
        $regr['nominee'] = $this->input->post('nominee');
        $regr['relation'] = $this->input->post('relation');

//        $regr['pan_no'] = $this->input->post('pan_no');
//        $regr['bank_acc_no'] = $this->input->post('bank_acc_no');
//        $regr['ifsc'] = $this->input->post('ifsc');
//        $regr['bank_name'] = $this->input->post('bank_name');
//        $regr['bank_branch'] = $this->input->post('bank_branch');

        $regr['pan_no'] = '';
        $regr['bank_acc_no'] = '';
        $regr['ifsc'] = '';
        $regr['bank_name'] = '';
        $regr['bank_branch'] = '';

        $regr['joining_date'] = date('Y-m-d H:i:s');
        $regr['year'] = $this->input->post('year');
        $regr['month'] = $this->input->post('month');
        $regr['day'] = $this->input->post('day');
        $regr['mobile_code'] = $this->input->post('mobile_code');
        $regr['active_tab'] = $this->input->post('active_tab');
        $regr['is_pin'] = $this->input->post('is_pin_ok');

        $regr['referral_name'] = mysql_real_escape_string($this->input->post('ref_username'));
        $regr['full_name'] = mysql_real_escape_string($this->input->post('full_name'));
        $regr['prodcut_id'] = mysql_real_escape_string($this->input->post('prodcut_id'));
        $regr['prodcut_name'] = $this->register_model->getPrdocut($regr['prodcut_id']);
        $regr['pswd'] = mysql_real_escape_string($this->input->post('pswd'));
        $regr['cpswd'] = mysql_real_escape_string($this->input->post('cpswd'));
        $regr['gender'] = mysql_real_escape_string($this->input->post('gender'));
        $regr['country_id'] = mysql_real_escape_string($this->input->post('country'));
        $regr['country'] = $this->register_model->countryNameFromID(mysql_real_escape_string($this->input->post('country')));
        $regr['mobile'] = mysql_real_escape_string($this->input->post('mobile'));
        $regr['quantity'] = mysql_real_escape_string($this->input->post('quantity'));
        //$regr['email'] = $this->input->post('email');
        //print_r($regr);die();
        $product_status = $this->MODULE_STATUS['product_status'];
        $active_tab = $this->input->post('active_tab');
        $module_status = $this->MODULE_STATUS;
//        if ($this->input->post('ref_username') != "") {
//            $regr['referral_name'] = mysql_real_escape_string($this->input->post('ref_username'));
//        } else {
//            $msg = $this->lang->line('invalid_sponser_user_name');
//            $this->redirect($msg, "../register/user_register", false);
//        }
  //      if ($product_status == "yes") {
	    
//		$this->form_validation->set_rules('prodcut_id', 'Product', 'trim|required');
//            if ($this->input->post('prodcut_id') != "") {
//                $regr['prodcut_id'] = mysql_real_escape_string($this->input->post('prodcut_id'));
//            } else {
//                $msg = $this->lang->line('invalid_product');
//                $this->redirect($msg, "../register/user_register", false);
//            }
//        } else {
 //           $regr['prodcut_id'] = 0;
 //       }
        $pin_status = $this->MODULE_STATUS['pin_status'];


        /*         * *****************form Validation rules start********************************************* */

        $this->form_validation->set_rules('ref_username', 'Sponsor Username', 'required|callback_checkRefUserAvailability|trim');
        if ($product_status == "yes") {
            $this->form_validation->set_rules('prodcut_id', 'Product', 'trim|required');
        }
        if ($regr['user_name_type'] == 'static') {
            $this->form_validation->set_rules('user_name_entry', 'User Name', 'trim|required|alpha_numeric|min_length[3]|max_length[20]|callback_checkUserNameAvailability');
        }
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|callback_alpha_french');
        $this->form_validation->set_rules('pswd', 'Password', 'trim|required|alpha_dash|matches[cpswd]|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('cpswd', 'Confirm Password', 'trim|required|alpha_dash');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('year', 'Date of Borth', 'required');
        $this->form_validation->set_rules('month', 'Date of Borth', 'required');
        $this->form_validation->set_rules('day', 'Date of Borth', 'required');
        $this->form_validation->set_rules('position', 'Position', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|numeric|is_natural_no_zero');



        if ($this->input->post('active_tab') == "credit_card_tab") {
            $this->form_validation->set_rules('card_number', 'Card Number', 'trim|required|numeric');
            $this->form_validation->set_rules('credit_currency', 'Credit currency', 'trim|required');
            $this->form_validation->set_rules('credit_card_type', 'Credit Card Type', 'trim|required');
            $this->form_validation->set_rules('card_cvn', 'CVN number', 'trim|required|numeric');
            $this->form_validation->set_rules('card_expiry_date', 'Credit card expiry date', 'trim|required');
            $this->form_validation->set_rules('bill_to_forename', 'Account Holder First name', 'trim|required');
            $this->form_validation->set_rules('bill_to_surname', 'Account Holder Last name', 'trim|required');
            $this->form_validation->set_rules('bill_to_email', 'Account Holder Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('bill_to_phone', 'Account Holder Phone number', 'trim|required|numeric');
        }

        if ($active_tab == 'epin_tab') {

            $regr['done_by'] = 'E-Pin';
            $string = $regr['is_pin'];
           

            $json_array = Array();
            $jsonData = json_decode($string, TRUE);

            
            



            $pin_details = $jsonData;
            $pin_number = array();
            $arr_length = count($jsonData);
            if (!$this->validate_is_pin($pin_details)) {

                $this->redirect("Epin Duplicated OR Amount Not Sufficient", "../register/user_register", false);
            }

            $k = 1;
            for ($i = 0; $i < $arr_length; $i++) {
                $epin_post = $pin_details[$i]['used_pin'];
                $this->form_validation->set_rules("epin$k", "Epin$k", "trim|required|callback_has_match[$epin_post]");
                $k++;
                $epin_post = "";
            }

            $num_of_epins = $k - 1;
        }
        if ($this->input->post('active_tab') == 'ewallet_tab') {

            $this->form_validation->set_rules('user_name_ewallet', 'Ewallet User Name', 'trim|required');
            $this->form_validation->set_rules('tran_pass_ewallet', 'Transaction Password', 'trim|required');
        }
        $this->form_validation->set_message('required', '%s is Required');
        $this->form_validation->set_message('exact_length', 'The %s field must be exactly 10 digit.');
        $this->form_validation->set_message('checkRefUserAvailability', 'The Sponsor Username is Not Available');
        $this->form_validation->set_message('checkUserNameAvailability', 'The Username is Not Available');
        $this->form_validation->set_message('is_natural_no_zero', 'Invalid %s');

        $this->form_validation->set_error_delimiters("<div style='color:rgba(249, 6, 6, 1)'>", "</div>");

        $vali_stat = $this->form_validation->run();

        if ($vali_stat) {
            $regr['referral_name'] = mysql_real_escape_string($this->input->post('ref_username'));
            $regr['full_name'] = mysql_real_escape_string($this->input->post('full_name'));
            if ($product_status == "yes") {
                $regr['prodcut_id'] = mysql_real_escape_string($this->input->post('prodcut_id'));
            } else {
                $regr['prodcut_id'] = 0;
            }

            $regr['pswd'] = mysql_real_escape_string($this->input->post('pswd'));
            $regr['cpswd'] = mysql_real_escape_string($this->input->post('cpswd'));
            $validate = $this->validate_pswd($this->input->post('pswd'));
            if ($validate) {
                $regr['pswd'] = mysql_real_escape_string($this->input->post('pswd'));
                $regr['cpswd'] = mysql_real_escape_string($this->input->post('cpswd'));
            } else {
                $msg = $this->lang->line('special_chars_not_allowed');
                $this->redirect($msg, "../register/user_register", FALSE);
            }
            $regr['gender'] = mysql_real_escape_string($this->input->post('gender'));
            $regr['country'] = $this->register_model->countryNameFromID(mysql_real_escape_string($this->input->post('country')));
            $regr['mobile'] = mysql_real_escape_string($this->input->post('mobile'));
            $regr['email'] = $this->input->post('email');
            
            
            $regr['product_amount']=$this->register_model->getProductAmount($regr['prodcut_id']);
            $regr['product_amount']=$regr['product_amount']*$regr['quantity'];

            $is_card_ok = false;
            if ($this->input->post('active_tab') == "credit_card_tab") {

                $credit_card = array();

                $credit_card['card_no'] = mysql_real_escape_string($this->input->post('card_number'));
                $credit_card['credit_currency'] = mysql_real_escape_string($this->input->post('credit_currency'));
                $credit_card['credit_card_type'] = mysql_real_escape_string($this->input->post('credit_card_type'));
                $credit_card['card_veri_no'] = mysql_real_escape_string($this->input->post('card_cvn'));
                $credit_card['card_expiry_date'] = mysql_real_escape_string($this->input->post('card_expiry_date'));
                $credit_card['card_forename'] = mysql_real_escape_string($this->input->post('bill_to_forename'));
                $credit_card['card_surename'] = mysql_real_escape_string($this->input->post('bill_to_surname'));
                $credit_card['card_email'] = mysql_real_escape_string($this->input->post('bill_to_email'));
                $credit_card['card_phone'] = mysql_real_escape_string($this->input->post('bill_to_phone'));

                if ($credit_card['card_no'] != null) {
                    $p_id = $regr['prodcut_id'];
                    $product_amount = $this->register_model->getprdctAmount($p_id);
                    $register_amount = $this->register_model->getRegisterAmount();

                    $credit_card['total_amount'] = $product_amount + $register_amount;
                    $is_card_ok = true;
                }
            }

            ////////////__________EPin Details___Start/////////////////////////

            $is_pin_ok = false;
            if ($active_tab == 'epin_tab') {
                $string = $regr['is_pin'];
                $pin_amount = 0;

                //  echo 'ssss  '.$string.'  <br>';
                $json_array = Array();

                $jsonData = json_decode($string, TRUE);
                foreach ($jsonData as $amts) {
                    $pin = $amts['used_pin'];
                    $pin_amount += $this->register_model->getPinAmount($pin);
                }
                if ($pin_amount < $regr['product_amount']) {
                    $msg = $this->lang->line('invalid_product_or_pin_amount');
                    $this->redirect($msg, "../register/user_register", false);
                }


                $pin_details = $jsonData;
                $pin_number = array();
                $arr_length = count($jsonData);


                $k = 1;
                for ($i = 0; $i < $arr_length; $i++) {
//		    if ($this->input->post("epin$k") == "") {
//			$this->redirect("You Must Enter the E-pin..", "../register/user_register", false);
//		    }
                    $k++;
                    $pin_number[$i . 'pin'] = ($pin_details[$i]['used_pin']);
                    $pin_number[$i . 'bal_amount'] = ($pin_details[$i]['bal_amount']);
                    $pin_number[$i . 'pin_ok'] = ($pin_details[$i]['pin_ok']);
                    $pin_number[$i . 'pin_amount'] = ($pin_details[$i]['pin_amount']);
                    if ($pin_number[$i . 'pin_ok'] == 1) {
                        $is_pin_ok = true;

                        //               
                    }
                }
            }
//               
            ////////////__________EPin Details___End/////////////////////////

            $is_ewallet_ok = false;
            if ($this->input->post('active_tab') == 'ewallet_tab') {
                $ewallet_bal = $this->input->post('ewallet_bal');
                $used_amount = $this->input->post('product_amount');
                $ewallet_user = $this->input->post('user_name_ewallet');

                $ewallet_trans_password = $this->input->post('tran_pass_ewallet');
                if ($ewallet_user != "") {
                    $user_available = $this->register_model->isUserAvailable($ewallet_user);
                    if ($user_available) {
                        if ($ewallet_trans_password != "") {
                            $ewallet_user_id = $this->register_model->userNameToID($ewallet_user);
                            $trans_pass_available = $this->register_model->ewalletPassword($ewallet_user_id, $ewallet_trans_password);
                            if ($trans_pass_available == 'yes') {
                                $ewallet_balance_amount = $this->register_model->getBalanceAmount($ewallet_user_id);
                                if ($ewallet_balance_amount >= $used_amount) {

                                    $is_ewallet_ok = true;
                                } else {
                                    $msg = $this->lang->line('insuff_bal');
                                    $this->redirect($msg, "../register/user_register", false);
                                }
                            } else {
                                $msg = $this->lang->line('invalid_transaction_password');
                                $this->redirect($msg, "../register/user_register", false);
                            }
                        } else {
                            $msg = $this->lang->line('invalid_transaction_password');
                            $this->redirect($msg, "../register/user_register", false);
                        }
                    } else {
                        $msg = $this->lang->line('invalid_user_name_ewallet_tab');
                        $this->redirect($msg, "../register/user_register", false);
                    }
                } else {
                    $msg = $this->lang->line('invalid_user_name_ewallet_tab');
                    $this->redirect($msg, "../register/user_register", false);
                }
            }
            if ($this->input->post('active_tab') == 'e_xact_tab') {
//                $regr['product_amount'] = $this->input->post('product_amount');
                
                
                $this->session->set_userdata('reg_array', $regr);
                $this->session->set_userdata('module_array', $module_status);
            }
        } else {

            $error = $this->form_validation->error_array();
            $this->session->set_userdata('error', $error);
            if (isset($num_of_epins))
                $this->session->set_userdata('num_of_epins', $num_of_epins);

            $this->session->set_userdata('regr', $regr);

            $msg = validation_errors();
            $error = $this->form_validation->error_array();
            $this->session->set_userdata('error', $error);
            $this->redirect($msg, "../register/user_register", FALSE);
        }
        /*         * ***********************form Validation end************************************************* */


        $is_paypal_ok = false;
        if (($active_tab == "paypal_tab"))
            $is_paypal_ok = true;
        $is_epdq_ok = false;
        if (($active_tab == "epdq_tab"))
            $is_epdq_ok = true;
        $is_authorize_ok = false;
        if (($active_tab == "authorize_tab"))
            $is_authorize_ok = true;
        $is_e_xact_ok = false;
        if (($active_tab == "e_xact_tab"))
            $is_e_xact_ok = true;




        if ($this->input->post('status_id') == "") {
            $fatherid = $this->register_model->userNameToID($this->input->post('ref_username'));
            $last_user_id = $this->register_model->getPlacement($fatherid, $this->input->post('position'));
            $last_user_name = $this->register_model->IdToUserName($last_user_id);
            $regr['fatherid'] = $last_user_name;
            $last_insert_id = $last_user_id;
        } else {
            $regr['fatherid'] = $this->input->post('sponser_user_name');
            $last_insert_id = $this->register_model->userNameToID($regr['fatherid']);
        }

        $regr['referral_id'] = $regr['referral_name'];
        //================================================
//        $regr['state'] = $this->input->post('state');
//        $placement_det = $this->register_model->getPlacementunilevel($regr['referral_id']);
//
//        $last_user_id = $placement_det['id'];
//        $last_position = $placement_det['position'];
//        $regr['pos'] = $last_position;
        ////////////////////////////////////////////////////////

        if ($is_card_ok) {
            $this->register_model->begin();
            $regr['by_using'] = 'credit card';

            $status = $this->register_model->confirmRegister($regr, $module_status);

            $user = $status['user'];
            $user_id = $this->register_model->userNameToID($user);
            $credit_card['user_id'] = $user_id;
            if ($status) {
                $card_res = $this->register_model->insertCredicardDetails($credit_card);
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

                    $this->register_model->insertintoPaymenDetails($payment_details);
                    $payment_status = 1;
                }
            }
        } elseif ($is_pin_ok) {
            $this->register_model->begin();
            $regr['by_using'] = 'pin';
            $regr['done_by'] = 'e-pin';
            $status = $this->register_model->confirmRegister($regr, $module_status);
            if ($status) {
                $pin_number['user'] = $status['user'];
                for ($i = 0; $i < $arr_length; $i++) {
                    if ($pin_number[$i . 'pin_ok'] == 1) {
                        $this->register_model->insertUsedPin($pin_number, $arr_length);
                        $res = $this->register_model->UpdateUsedEpin($pin_number, $arr_length);
                    }
                }
                if ($res)
                    $payment_status = 1;
            }
        }
        elseif ($is_ewallet_ok) {
            $this->register_model->begin();
            //$ewallet_bal = $this->session->userdata('ewallet_bal');
            //$used_amount = $this->session->userdata('product_amnt');
            $used_user = $ewallet_user;

            $regr['by_using'] = 'ewallet';

            $status = $this->register_model->confirmRegister($regr, $module_status);
            $user = $status['user'];
            $user_id = $this->register_model->userNameToID($user);


            if ($status) {

                $res1 = $this->register_model->insertUsedEwallet($used_user, $user, $used_amount);

                if ($res1) {

                    $res2 = $this->register_model->updateUsedEwallet($used_user, $ewallet_bal);
                    if ($res2)
                        $payment_status = 1;
                }
            }
        }
        elseif ($is_paypal_ok) {
            $regr['by_using'] = 'paypal';

            $this->session->set_userdata('regr', $regr);
            $msg = "";
            $this->redirect_out($msg, "register/pay_now/", FALSE);
        } elseif ($is_epdq_ok) {
            $regr['by_using'] = 'epdq';

            $this->session->set_userdata('regr', $regr);
            $msg = "";
            $this->redirect_out($msg, "register/epdqPayment/", FALSE);
        } elseif ($is_authorize_ok) {
            $regr['by_using'] = 'Authorize.Net';
            $this->register_model->begin();
            $this->session->set_userdata('regr', $regr);
            $msg = "";
            $this->redirect_out($msg, "register/authorizeNetPayment/", FALSE);
        } elseif ($is_e_xact_ok) {
            $this->register_model->begin();
            $regr['by_using'] = 'E-xact';
            $regr['done_by'] = 'E-xact';

            $lang_set = $this->session->userdata('tran_language');
            if ($lang_set == 'french') {
                $this->exact_checkout_french($regr, $module_status);
            } else if ($lang_set == 'english') {
                $this->exact_checkout($regr, $module_status);
            }


            die();
            //$ewallet_bal = $this->session->userdata('ewallet_bal');
            //$used_amount = $this->session->userdata('product_amnt');
            $used_user = $ewallet_user;

            $regr['by_using'] = 'exact';

            //$status = $this->register_model->confirmRegister($regr, $module_status);
            //$user = $status['user'];
            $user_id = $this->register_model->userNameToID($user);


//            if ($status) {
//
//                $res1 = $this->register_model->insertUsedEwallet($used_user, $user, $used_amount);
//
//                if ($res1) {
//
//                    $res2 = $this->register_model->updateUsedEwallet($used_user, $ewallet_bal);
//                    if ($res2)
//                        $payment_status = 1;
//                }
//            }
//            $this->redirect_out($msg, "register/authorizeNetPayment/", FALSE);
        } else {//______free joining________
            $regr['by_using'] = 'free join';
            $regr['done_by'] = 'free';
            $this->register_model->begin();
            $status = $this->register_model->confirmRegister($regr, $module_status);
            if ($status)
                $payment_status = 1;
            // print_r($status);die();
        }
        $user = $status['user'];
        $pass = $status['pwd'];
        $encr_id = $status['id'];
        $tran_code = $status['tran'];

        //================
        if ($is_pin_ok == true)
            $pay_type = 'epin';
        elseif ($is_card_ok == true)
            $pay_type = 'creditcard';
        elseif ($is_ewallet_ok == true)
            $pay_type = 'ewallet';
        elseif ($is_paypal_ok)
            $pay_type = 'paypal';
        elseif ($is_epdq_ok)
            $pay_type = 'epdq';
        elseif ($is_authorize_ok)
            $pay_type = 'Athurize.Net';
        elseif ($is_e_xact_ok)
            $pay_type = 'E-xact';
        else
            $pay_type = 'free join';

        if ($product_status == "yes") {

            $user_id = $this->register_model->userNameToID($user);

            $insert_into_sales = $this->register_model->insertIntoSalesOrder($user_id, $regr['prodcut_id'], $pay_type, $regr['quantity']);
        }
        //================
        $msg = '';

        if ($status['status'] && $payment_status) {
            $this->register_model->commit();
            $id_encode = $this->encrypt->encode($user);
            $id_encode = str_replace("/", "_", $id_encode);
            $user1 = urlencode($id_encode);

            $this->session->unset_userdata('regr');
            $msg = $this->lang->line('registration_completed_successfully');

            $this->redirect_out("<span><b>$msg!</b>  Username : $user &nbsp;&nbsp; Password : $pass &nbsp; Transaction Password : $tran_code</span>", "register/preview/" . $user1, true);
        } else {
            $this->register_model->rollback();
            $msg = $this->lang->line('registration_failed');
            $this->redirect($msg, 'tree/select_tree', false);
        }
    }

    public function pay_now() {

        $p_id = $this->session->userdata["regr"]["prodcut_id"];
        $product_amount = $this->register_model->getprdctAmount($p_id);
        $register_amount = $this->register_model->getRegisterAmount();
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
        $product_amount = $this->register_model->getprdctAmount($p_id);
        $register_amount = $this->register_model->getRegisterAmount();
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

            $this->register_model->begin();
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

                $this->register_model->insertintoPaymenDetails($payment_details);
                $module_status = $this->MODULE_STATUS;
                $regr['by_using'] = 'paypal';

                $status = $this->register_model->confirmRegister($regr, $module_status);
            }

            $user = $status['user'];
            $pass = $status['pwd'];
            // $encr_id = $status['id'];
            $tran_code = $status['tran'];

            //================
            $product_status = $this->MODULE_STATUS['product_status'];
            $pin_status = $this->MODULE_STATUS['pin_status'];
            $payment_method = "";
            if ($product_status == "yes") {
                if ($pin_status == 'yes') {
                    $payment_method = 'epin';
                }
                $user_id = $this->register_model->userNameToID($user);

                //$insert_into_sales = $this->register_model->insertIntoSalesOrder($user_id, $regr['prodcut_id'], $payment_method,$regr['quantity']);
            }
            //================
            $msg = '';
            if ($status['status']) {
                $this->register_model->commit();
                $id_encode = $this->encrypt->encode($user);
                $id_encode = str_replace("/", "_", $id_encode);
                $user1 = urlencode($id_encode);

                $this->session->unset_userdata('regr');
                $msg = $this->lang->line('registration_completed_successfully');

                $this->redirect_out("<span><b>$msg!</b>  Username : $user &nbsp;&nbsp; Password : $pass &nbsp; Transaction Password : $tran_code</span>", "register/preview/" . $user1, true);
            } else {
                $this->register_model->rollback();
                $msg = $this->lang->line('registration_failed');
                $this->redirect($msg, 'tree/select_tree', false);
            }
        }
    }

    function preview($uname = "", $pass = "", $id = "") {

        $userid = urldecode($uname);
        $id_decode = str_replace("_", "/", $userid);
        $uname = $this->encrypt->decode($id_decode);
        $title = $this->lang->line('letter_preview');
        $this->set('title', $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_register.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";
        $this->setScripts();

        $session_data = $this->session->userdata('logged_in');
        $user_name = $session_data['user_name'];
        $user_type = $session_data['user_type'];
        if ($this->MODULE_STATUS['footer_demo_status'] == "yes") {
            $admin_user_name = $session_data['admin_user_name'];
            $this->set("admin_user_name", $admin_user_name);
        }

        if ($user_type != "admin") {
            $user_type = 'user';
        }

        $u_id = $this->register_model->obj_vali->userNameToID($uname);
        if (!$u_id) {
            $this->redirect("Invalid User Details.", "home", FALSE);
        }

        $this->set('username', $user_name);
        $this->set("uname", $uname);
        $this->set("pass", $pass);
        $this->set("id", $id);
        $this->set("user_name", $user_name);
        $this->set("user_type", $user_type);
        $date = Date('Y-m-d H:i:s');
        $this->set("Date", $date);

        $lang_id = $this->LANG_ID;

        $letter_arr = $this->register_model->getLetterSetting($lang_id);
        $this->set("letter_arr", $letter_arr);

        $uid = $this->register_model->getUidFromUsername($uname);
        $row = $this->register_model->getFatherName($uid);
        $fid = $row->father_id;
        $prdtid = $row->product_id;
        $product_status = $this->MODULE_STATUS['product_status'];
        $referal_status = $this->MODULE_STATUS['referal_status'];
        $this->load->model('register_model');
        $reg_amount = $this->register_model->getRegisterAmount();
        $this->set("reg_amount", $reg_amount);
        if ($product_status == "yes") {
            $prdt_arr = $this->register_model->getProduct($prdtid);
            $this->set("prdt_arr", $prdt_arr);
            $this->set("product_status", $product_status);
        }
        $this->set("product_status", $product_status);
        $user_details = $this->register_model->getUserDetails($uid);

        $user_details_ref_user_id = $user_details['user_details_ref_user_id'];
        if ($referal_status == "yes") {

            $sponsorname = $this->register_model->getFname($user_details_ref_user_id);
            $this->set("sponsorname", $sponsorname);
            $this->set("referal_status", $referal_status);
        }
        $adjusted_id = $this->register_model->getFname($fid);
        $this->set("adjusted_id", $adjusted_id);
        $this->set("referal_status", $referal_status);
        $this->set("user_details", $user_details);

        //for language translation
        $this->set("tran_distributers_name", $this->lang->line('distributers_name'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_date_of_joining", $this->lang->line('date_of_joining'));
        $this->set("tran_phone_number", $this->lang->line('phone_number'));
        $this->set("tran_nominee", $this->lang->line('nominee'));
        $this->set("tran_pan_number", $this->lang->line('pan_number'));
        $this->set("tran_sponsor", $this->lang->line('sponsor'));
        $this->set("tran_package", $this->lang->line('package'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_upgrade_now", $this->lang->line('upgrade_now'));
        $this->set("tran_winning_regards", $this->lang->line('winning_regards'));
        $this->set("tran_admin", $this->lang->line('admin'));
        $this->set("tran_place", $this->lang->line('place'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_go_to_tree_view", $this->lang->line('go_to_tree_view'));
        $this->set("tran_preview", $this->lang->line('preview'));
        $this->set("tran_Placment_ID", $this->lang->line('Placment_ID'));
        $this->set("tran_Login_Link", $this->lang->line('Login_Link'));
        $this->set("page_top_header", $this->lang->line('preview'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('preview'));
        $this->set("page_small_header", "");
        $help_link = "register_downline";
        $this->set("help_link", $help_link);
        $this->setView();
    }

    public function redirect_out($msg, $page, $message_type = false) {
        //redirection for the registration as it needs not the admin/user in url redirect function is modified 
        $MSG_ARR = array();
        $MSG_ARR["MESSAGE"]["DETAIL"] = $msg;
        $MSG_ARR["MESSAGE"]["TYPE"] = $message_type;
        $MSG_ARR["MESSAGE"]["STATUS"] = true;

        $this->session->set_flashdata('MSG_ARR', $MSG_ARR);
        redirect($page, 'refresh');
    }

    function validate_pswd($password) {
        if (!preg_match('/^[a-z0-9A-Z _~\-!@#\$%\^&\*\(\)?,.:<>|\\+\/\[\]{}\'";`~]*$/', $password)) {

            return false;
        } else
            return true;
    }

    public function payment() {

        $title = $this->lang->line('new_user_signup');
        $this->set('title', $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_regitser.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";



        $st_name = $this->session->userdata['logged_in']['user_name'];
        $this->set('status_name', $st_name);
        $is_product_added = "";
        $is_pin_added = "";
        $username_config = $this->obj_config->getUsernameConfig();
        $user_name_type = $username_config["type"];
        $user_type = $this->session->userdata['logged_in']['user_type'];
        $this->set('user_type', $user_type);
        $j = 0;
        $curr_date = date('Y');
        for ($i = $curr_date; $i <= 2050; $i++) {
            $aray[$j] = $i;
            $j++;
        }

        $j = 0;
        for ($i = 1; $i <= 31; $i++) {
            $aray1[$j] = $i;
            $j++;
        }
        $lang_id = $this->LANG_ID;
        $product_status = $this->MODULE_STATUS['product_status'];
        $pin_status = $this->MODULE_STATUS['pin_status'];
        $referal_status = $this->MODULE_STATUS['referal_status'];
        $countries = $this->register_model->viewCountry($lang_id);
        $this->set('countries', $countries);
        $this->set('user_name_type', $user_name_type);
        if (($product_status == "yes") && ($pin_status == "yes") || ($product_status == "no") && ($pin_status == "yes")) {
            
        } else {

            $this->ARR_SCRIPT[1]["name"] = "register_without_pin.js";
            $this->ARR_SCRIPT[1]["type"] = "js";
            $this->ARR_SCRIPT[1]["loc"] = "footer";
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

        $this->set('years', $aray);
        $this->set('month', $aray1);
        $this->set("referal_status", $referal_status);
        $this->set('product_status', $product_status);
        $this->set('pin_status', $pin_status);

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
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_terms_conditions", $this->lang->line('terms_&_conditions'));
        $this->set("tran_I_ACCEPT_TERMS_AND_CONDITIONS", $this->lang->line('I_ACCEPT_TERMS_AND_CONDITIONS'));
        $this->set("tran_register_new_member", $this->lang->line('register_new_member'));
        $this->set("tran_month", $this->lang->line('month'));
        $this->set("tran_day", $this->lang->line('day'));
        $this->set("tran_year", $this->lang->line('year'));
        $this->set("tran_reset", $this->lang->line('reset'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_invalid_product", $this->lang->line('invalid_product'));
        $this->set("page_top_header", $this->lang->line('new_user_signup'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('new_user_signup'));
        $this->set("page_small_header", "");
        $this->setScripts();

        $this->setView();
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
            $done = $this->register_model->getEpin($epin[$i]);
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

    public function getPrdctAmount() {

        $pin = $this->input->post('p_id');
        // $res=$this->register_model->prdct_amount($pin);
        $res = $this->register_model->getprdctAmount($pin);
        //$this->set("total", '100');
        if ($res) {
            echo $res;
            exit();
        } else {
            echo "no";
            exit();
        }
    }

    public function checkBalanceAvailable() {


        $ewallet_user = $this->input->post('user_name');
        $balance = $this->input->post('balance');
        $user_name_ewallet = $this->register_model->userNameToID($ewallet_user);
        $user_bal_amount = $this->register_model->balanceAmount($user_name_ewallet, $balance);
        if ($user_bal_amount != "") {

            echo $user_bal_amount;
        }
    }

    public function checkEwalletAvailable() {


        $ewallet_user = $this->input->post('user_name');
        $ewallet_pass = $this->input->post('ewallet');

        $user_name_ewallet = $this->register_model->userNameToID($ewallet_user);

        $user_password = $this->register_model->ewalletPassword($user_name_ewallet, $ewallet_pass);
        if ($user_password == 'yes') {
            $user_bal_amount = $this->register_model->balanceAmount($user_name_ewallet);
            if ($user_bal_amount > 0) {
                echo $user_bal_amount;
            } else {
                echo 'no';
            }
//        } else {
//            echo 'no';
        }
    }

    public function getRegisterAmount() {

        $res = $this->register_model->getRegisterAmount();
        // if ($res)
        echo $res;
        //else
        //    echo 'no_data';
    }

    public function epdqPayment() {

        $p_id = $this->session->userdata["regr"]["prodcut_id"];
        $product_amount = $this->register_model->getprdctAmount($p_id);
        $register_amount = $this->register_model->getRegisterAmount();
        $total_amount = $product_amount + $register_amount;
        $epdq_details = $this->obj_config->getEpdqConfigDetails();
        //print_r($epdq_details);die();
        $fullname = $this->session->userdata["regr"]["full_name"];



        $order_id = $this->register_model->generateOrderid($fullname, 'user_register');

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
        $order_details["AMOUNT"] = $total_amount * 100;
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
        $this->register_model->begin();
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

        $this->register_model->insertintoPaymenDetails($payment_details);
        if ($detail_array['STATUS'] == 9) {
            $module_status = $this->MODULE_STATUS;
            $regr['by_using'] = 'epdq';

            $status = $this->register_model->confirmRegister($regr, $module_status);
        }
        $user = $status['user'];
        $pass = $status['pwd'];
        // $encr_id = $status['id'];
        $tran_code = $status['tran'];
        $msg = '';
        if ($status['status']) {
            $this->register_model->commit();
            $id_encode = $this->encrypt->encode($user);
            $id_encode = str_replace("/", "_", $id_encode);
            $user1 = urlencode($id_encode);

            $this->session->unset_userdata('regr');
            $msg = $this->lang->line('registration_completed_successfully');

            $this->redirect_out("<span><b>$msg!</b>  Username : $user &nbsp;&nbsp; Password : $pass &nbsp; Transaction Password : $tran_code</span>", "register/preview/" . $user1, true);
        } else {
            $this->register_model->rollback();
            $msg = $this->lang->line('registration_failed');
            $this->redirect($msg, 'tree/select_tree', false);
        }
    }

    public function epdqPaymentFailure() {
        $this->redirect('..ERROR ON REGISTRATION!! Payment failed..', '../register/user_register');
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
        $product_amount = $this->register_model->getprdctAmount($p_id);
        $register_amount = $this->register_model->getRegisterAmount();
        $total_amount = $product_amount + $register_amount;

        $merchant_details = array();
        $merchant_details = $this->register_model->getAuthorizeDetails();
        $api_login_id = $merchant_details['merchant_id'];
        $transaction_key = $merchant_details['transaction_key'];
//        $api_login_id = '82Lcmj5Wz2z';
//        $transaction_key = '8G5Y3z75dG7dXk2b';

        $fp_timestamp = time();
        $fp_sequence = "123" . time(); // Enter an invoice or other unique number.
        $fingerprint = $this->register_model->authorizePay($api_login_id, $transaction_key, $total_amount, $fp_sequence, $fp_timestamp);

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

        $product_status = $this->MODULE_STATUS['product_status'];
        $module_status = $this->MODULE_STATUS;

        $status = $this->register_model->ConfirmRegister($regr, $module_status);

        $user = $status['user'];
        $pass = $status['pwd'];
        $tran_code = $status['tran'];

        $payment_method = 'Authorize.Net';
        $user_id = $this->register_model->userNameToID($user);
        if ($product_status == "yes") {
            $insert_into_sales = $this->register_model->insertIntoSalesOrder($user_id, $regr['prodcut_id'], $payment_method, $regr['quantity']);
        }
        $res = $this->register_model->insertAuthorizeNetPayment($response, $user_id);


        if ($status['status']) {
            $this->register_model->commit();
            $id_encode = $this->encrypt->encode($user);
            $id_encode = str_replace("/", "_", $id_encode);
            $user1 = urlencode($id_encode);

            $this->session->unset_userdata('regr');
            $msg = $this->lang->line('registration_completed_successfully');

            $this->redirect_out("<span><b>$msg!</b>  Username : $user &nbsp;&nbsp; Password : $pass &nbsp; Transaction Password : $tran_code</span>", "register/preview/" . $user1, true);
        } else {
            $this->register_model->rollback();
            $msg = $this->lang->line('registration_failed');
            $this->redirect($msg, 'tree/select_tree', false);
        }
    }

    /* form validation rule* 
     *    Method is used to validate strings to allow alpha
     *    numeric spaces underscores and dashes ONLY.
     *    @param $str    String    The item to be validated.
     *    @return BOOLEAN   True if passed validation false if otherwise.
     */

    function _alpha_dash_space($str_in = '') {
        if (!preg_match("/^([-a-z0-9_ ])+$/i", $str_in)) {
            $this->form_validation->set_message('_alpha_dash_space', 'The %s field may only contain alpha-numeric characters, spaces, underscores, and dashes.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
        function alpha_french($str)
{
        $this->form_validation->set_message('alpha_french',$this->lang->line('Invalid_name') );
        return (!preg_match("~[-\p{L}'\s]{2,30}$~u", $str)) ? FALSE : TRUE;
} 

    public function has_match($arr_epin, $post_epin) {
        $flag = false;
        if ($arr_epin == $post_epin) {
            $flag = true;
        } else {
            $msg = $this->lang->line('invalid_epin');
            $this->redirect_out($msg, "register/user_register", false);
        }
        return $flag;
    }

    /* form validation rule ends */

    function validate_is_pin($data_arr) {

        $registration_amount = $this->register_model->getRegisterAmount();

        $total_epin_amount = 0;
        $epin_arr = array();
        foreach ($data_arr as $key => $value) {
            if (in_array($value['used_pin'], $epin_arr))
                return FALSE;
            else
                $epin_arr[] = $value['used_pin'];
        }
        foreach ($epin_arr as $epin) {
            $epin_details = $this->register_model->getEpin($epin);
            if (empty($epin_details))
                return FALSE;
            else
                $total_epin_amount += $epin_details['pin_amount'];
        }
        if ($total_epin_amount >= $registration_amount)
            return TRUE;
        else
            return FALSE;
    }

    public function exact_receipt() {
        $regr = array();

        $regr = $this->input->post();

        $tran_password = $this->register_model->getTranPassword($regr['user_name_entry']);

        if (!$this->register_model->checkUser($regr['user_name_entry'])) {
            $msg = $this->lang->line('successfully_registred').". ".$this->lang->line('user_name')." : " . $regr['user_name_entry'] . ", " .$this->lang->line('trans_id')." : ". $regr['x_trans_id'] . ", " .$this->lang->line('Transaction_Password')." :". $tran_password . ". ".$this->lang->line('email_sent_to_registerd_user').". ";
            $status = true;
        } else {
            $msg = $this->lang->line('registration_failed');
            $status = false;
        }

        if (!$this->checkSession()) {
            $this->redirect($msg, "../login/index", $status);
        } else {
            $this->redirect($msg, "home/index", $status);
        }
    }

    public function exact_checkout($regr = '', $modulo_status = '') {


        $redirect_msg = $this->lang->line('checkout_redirect_message');
        $click_here = $this->lang->line('click_here');
//        echo '<pre>'; print_r($regr); echo '</pre>';die();

        $username = $regr['user_name_entry'];
        $regr['user_language'] = $this->session->userdata('tran_language');

        $email = $regr['email'];
        $amount = $regr['product_amount'];
        $time_stamp = $_SERVER['REQUEST_TIME'];
        $login = 'WSP-E-SOF-wAO7@AAPSg';
        $secret_code = "$login^12345^" . $time_stamp . "^" . $amount . "^";


        $hash = $this->hmac("ZoSpngQSUa0NNsVrM1Gh", $secret_code);
        $this->set('time_stamp', $time_stamp);
        $this->set('hash', $hash);
        $this->set('username', $username);
        $this->set('email', $email);
        $this->set('amount', $amount);
        $html = '';
        $html .= '<script type="text/javascript">
            window.onload = function () {
            //document.payment_form.paymentsubmit.hide();
        	document.payment_form.paymentsubmit.click();
            }
        </script><form name="payment_form" action="https://checkout.e-xact.com/payment" method="post"> ';
        $html .= $redirect_msg;
        $html .= '<input name="x_login" value="' . $login . '" type="hidden"> 
  <input name="x_amount" value="' . $amount . '" type="hidden"> 
  <input name="x_fp_sequence" value="12345" type="hidden"> 
  <input name="x_fp_timestamp" value="' . $time_stamp . '" type="hidden">
  <input name="x_fp_hash" value="' . $hash . '" type="hidden"> 
  <input name="x_show_form" value="PAYMENT_FORM" type="hidden"> ';
        foreach ($regr as $key => $value) {
            $html .= '<input name="' . $key . '" value="' . $value . '" type="hidden">';
        }

        $html .= '<input value="Click here" name="paymentsubmit" id="paymentsubmit" type="submit">
  <!--<input name="x_line_item" value="101999 Cabernet Sauvignon, 0.7 l <|>1<|>".$amount."<|>YES" type="hidden">-->
 
</form>';

        echo $html;


//        $this->setView();
    }

    public function exact_checkout_french($regr = '', $modulo_status = '') {


        $redirect_msg = $this->lang->line('checkout_redirect_message');
        $click_here = $this->lang->line('click_here');
//        echo '<pre>'; print_r($regr); echo '</pre>';die();

        $username = $regr['user_name_entry'];
        $regr['user_language'] = $this->session->userdata('tran_language');

        $email = $regr['email'];
        $amount = $regr['product_amount'];
        $time_stamp = $_SERVER['REQUEST_TIME'];
        $login = 'WSP-E-SOF-9q3I9AAPSw';
        $secret_code = "$login^12345^" . $time_stamp . "^" . $amount . "^";

        $hash = $this->hmac("Fzf6W0_NKYoxr1vvL0R0", $secret_code);
        $this->set('time_stamp', $time_stamp);
        $this->set('hash', $hash);
        $this->set('username', $username);
        $this->set('email', $email);
        $this->set('amount', $amount);
        $html = '';
        $html .= '<script type="text/javascript">
            window.onload = function () {
            //document.payment_form.paymentsubmit.hide();
        	document.payment_form.paymentsubmit.click();
            }
        </script><form name="payment_form" action="https://checkout.e-xact.com/payment" method="post"> ';
        $html .= $redirect_msg;
        $html .= '<input name="x_login" value="' . $login . '" type="hidden"> 
  <input name="x_amount" value="' . $amount . '" type="hidden"> 
  <input name="x_fp_sequence" value="12345" type="hidden"> 
  <input name="x_fp_timestamp" value="' . $time_stamp . '" type="hidden">
  <input name="x_fp_hash" value="' . $hash . '" type="hidden"> 
  <input name="x_show_form" value="PAYMENT_FORM" type="hidden"> ';
        foreach ($regr as $key => $value) {
            $html .= '<input name="' . $key . '" value="' . $value . '" type="hidden">';
        }

        $html .= '<input value="' . $click_here . '" name="paymentsubmit" id="paymentsubmit" type="submit">
  <!--<input name="x_line_item" value="101999 Cabernet Sauvignon, 0.7 l <|>1<|>".$amount."<|>YES" type="hidden">-->
 
</form>';

        echo $html;


//        $this->setView();
    }

    public function exact_response() {


        $regr = array();
        $response = $this->input->post();
        //$regr = $this->session->userdata('regr');
        $regr = $this->input->post();
        foreach ($regr as $key => $value) {
            $regr[$key] = urldecode($value);
        }
        $this->register_model->insertExactHistory($regr);
        if ($regr['Transaction_Approved'] == 'YES') {
            $this->session->set_userdata('tran_language', $regr['user_language']);

            $product_status = $this->MODULE_STATUS['product_status'];
            $module_status = $this->MODULE_STATUS;
            $this->load->model('register_model');
            $status = $this->register_model->confirmRegister($regr, $module_status);

            $user = $status['user'];
            $pass = $status['pwd'];
            $tran_code = $status['tran'];

            $payment_method = 'E-xact';
            $user_id = $this->register_model->userNameToID($user);

            if ($product_status == "yes") {
                $insert_into_sales = $this->register_model->insertIntoSalesOrder($user_id, $regr['prodcut_id'], $payment_method, $regr['quantity'], $regr['x_trans_id']);
            }
            //$res = $this->register_model->insertAuthorizeNetPayment($response, $user_id);


            if ($status['status']) {
                $this->register_model->commit();
                $id_encode = $this->encrypt->encode($user);
                $id_encode = str_replace("/", "_", $id_encode);
                $user1 = urlencode($id_encode);


                $msg = $this->lang->line('registration_completed_successfully');
                $this->session->unset_userdata('regr');

                $this->redirect_out("<span><b>$msg!</b>  Username : $user &nbsp;&nbsp; Password : $pass &nbsp; Transaction Password : $tran_code</span>", "register/preview/" . $user1, true);
            } else {
                $this->register_model->rollback();
                $msg = $this->lang->line('registration_failed');
                $this->redirect($msg, 'tree/select_tree', false);
            }
        }
    }

    public function exact_repurchase_response() {


        $response_data = $this->input->post();
        $this->load->model('product_model');
        $this->load->model('register_model');
        $this->register_model->insertExactHistory($response_data);
        if ($response_data['Transaction_Approved'] == 'YES') {
            $res = $this->product_model->calculateRepurchase($response_data['user_id'], $response_data['father_id'], $response_data['product_id'], $response_data['position'], $response_data['count']);

            $res_sales = $this->register_model->insertIntoSalesOrder($response_data['user_id'], $response_data['product_id'], 'E-xact', $response_data['count'], $response_data['x_trans_id'], 'repurchase');
        }
    }

    public function hmac($key, $data) {
        $b = 64;
        if (strlen($key) > $b) {
            $key = pack("H*", md5($key));
        }
        $key = str_pad($key, $b, chr(0x00));
        $ipad = str_pad('', $b, chr(0x36));
        $opad = str_pad('', $b, chr(0x5c));
        $k_ipad = $key ^ $ipad;
        $k_opad = $key ^ $opad;

        return md5($k_opad . pack("H*", md5($k_ipad . $data)));
    }

}

?>