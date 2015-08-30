<?php

require_once 'Inf_Controller.php';

class Home extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        
        $this->ARR_SCRIPT[1]["name"] = "tooltip/standalone.css";
        $this->ARR_SCRIPT[1]["type"] = "css";
        $this->ARR_SCRIPT[1]["loc"]  = "header";

        $this->ARR_SCRIPT[2]["name"] = "tooltip/tooltip-generic.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"]  = "header";

        $this->ARR_SCRIPT[3]["name"] = "flot/jquery.flot.js";
        $this->ARR_SCRIPT[3]["type"] = "plugins/js";
        $this->ARR_SCRIPT[3]["loc"]  = "footer";
        
        $this->ARR_SCRIPT[4]["name"] = "flot/jquery.flot.pie.js";
        $this->ARR_SCRIPT[4]["type"] = "plugins/js";
        $this->ARR_SCRIPT[4]["loc"]  = "footer";

        $this->VIEW_DATA_ARR['username'] = $this->LOG_USER_NAME;
        $user_id = $this->LOG_USER_ID;
        $this->VIEW_DATA_ARR['ip_address'] = $this->input->server('REMOTE_ADDR');

        $title = $this->lang->line('home');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->set("pinstatus", "NO");

        //joining 
        $total_joining = $this->home_model->totalJoiningpage();
        $todays_joining = $this->home_model->todaysJoiningCount();
        $total_users = $this->home_model->getDownCount($user_id);
        
        $this->set("total_joining", $total_joining);
        $this->set("todays_joining", $todays_joining);
        $this->set("total_users", $total_users);
        

        //ewallet
        $ewallet_status = $this->MODULE_STATUS['ewallet_status'];
        $this->set('ewallet_status', $ewallet_status);
        if ($ewallet_status == 'yes') {
            $total_amount = $this->home_model->getGrandTotalEwallet();
            $requested_amount = $this->home_model->getTotalRequestAmount();
            $released_amount = $this->home_model->getTotalReleasedAmount();
            $total_request = $this->home_model->totalJoiningpage();
            $this->set("total_amount", round($total_amount, 2));
            $this->set("requested_amount", $requested_amount);
            $this->set("total_request", $total_request);
            $this->set("released_amount", $released_amount);
        }

        //sms
        $sms_status = $this->MODULE_STATUS['sms_status'];
        $this->set('sms_status', $sms_status);

        //epin
        $pin_status = $this->MODULE_STATUS['pin_status'];
        $this->set('pin_status', $pin_status);
        if ($pin_status == 'yes') {
            $total_pin = $this->home_model->getAllPinCount();
            $used_pin = $this->home_model->getUsedPinCount();
            $requested_pin = $this->home_model->getRequestedPinCount();
            $this->set("total_pin", $total_pin);
            $this->set("used_pin", $used_pin);
            $this->set("requested_pin", $requested_pin);
        }
        //mail
        $read_mail = $this->home_model->getAllReadMessages('admin');
        $unread_mail = $this->home_model->getAllUnreadMessages('admin');
        $mail_today = $this->home_model->getAllMessagesToday('admin');
        $this->set("read_mail", $read_mail);
        $this->set("unread_mail", $unread_mail);
        $this->set("mail_today", $mail_today);

        //chart
        $joining_details_per_month = $this->home_model->getJoiningDetailsperMonth();
        $this->set("joining_details_per_month", $joining_details_per_month);

        //pie diagram
        $payout_details = $this->home_model->getPayoutReleasePercentages();
        $released_payouts_percentage = round($payout_details["released"], 2);
        $pending_payouts_percentage = round($payout_details["pending"], 2);
        $this->set("released_payouts_percentage", $released_payouts_percentage);
        $this->set("pending_payouts_percentage", $pending_payouts_percentage);
/////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_joinings", $this->lang->line('joinings'));
        $this->set("tran_total_joining", $this->lang->line('total_joining'));
        $this->set("tran_today_joining", $this->lang->line('today_joining'));
        $this->set("tran_e_wallet", $this->lang->line('e_wallet'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_total", $this->lang->line('total'));
        $this->set("tran_used", $this->lang->line('used'));
        $this->set("tran_requested", $this->lang->line('requested'));
        $this->set("tran_mail", $this->lang->line('mail'));
        $this->set("tran_read", $this->lang->line('read'));
        $this->set("tran_unread", $this->lang->line('unread'));
        $this->set("tran_today", $this->lang->line('today'));
        $this->set("tran_dashboard", $this->lang->line('dashboard'));
        $this->set("tran_tree_view", $this->lang->line('tree_view'));
        $this->set("tran_genealogy_treeview", $this->lang->line('genealogy_treeview'));
        $this->set("tran_tabular_treeview", $this->lang->line('tabular_treeview'));
        $this->set("tran_configuration", $this->lang->line('configuration'));
        $this->set("tran_network_configuration", $this->lang->line('network_configuration'));
        $this->set("tran_welcome_letter", $this->lang->line('welcome_letter'));
        $this->set("tran_terms_and_conditions", $this->lang->line('terms_and_conditions'));
        $this->set("tran_site_information", $this->lang->line('site_information'));
        $this->set("tran_referral_status", $this->lang->line('referral_status'));
        $this->set("tran_module_status", $this->lang->line('module_status'));
        $this->set("tran_user_name_configuration", $this->lang->line('user_name_configuration'));
        $this->set("tran_report", $this->lang->line('report'));
        $this->set("tran_member_profile_report", $this->lang->line('member_profile_report'));
        $this->set("tran_joining_report", $this->lang->line('joining_report'));
        $this->set("tran_bank_statement_report", $this->lang->line('bank_statement_report'));
        $this->set("tran_payout_report", $this->lang->line('payout_report'));
        $this->set("tran_payout_release_report", $this->lang->line('payout_release_report'));
        $this->set("tran_my_transfer_report", $this->lang->line('my_transfer_report'));
        $this->set("tran_earnings", $this->lang->line('earnings'));
        $this->set("tran_home", $this->lang->line('home'));
        $this->set("tran_joining_status", $this->lang->line('joining_status'));
        $this->set("tran_profiles", $this->lang->line('profiles'));
        $this->set("tran_view_profile", $this->lang->line('view_profile'));
        $this->set("tran_sms", $this->lang->line('sms'));
        $this->set("tran_send_sms", $this->lang->line('send_sms'));
        $this->set("tran_sms_details", $this->lang->line('sms_details'));
        $this->set("tran_inbox", $this->lang->line('inbox'));
        $this->set("tran_compose_mail", $this->lang->line('compose_mail'));
        $this->set("tran_payout", $this->lang->line('payout'));
        $this->set("tran_pending_amount", $this->lang->line('pending_amount'));
        $this->set("tran_released_amount", $this->lang->line('released_amount'));
        $this->set("tran_income", $this->lang->line('income'));
        $this->set("tran_view_club", $this->lang->line('view_club'));
        $this->set("tran_search_club", $this->lang->line('search_club'));
        $this->set("tran_Club_View", $this->lang->line('Club_View'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_total_requested", $this->lang->line('total_requested'));
        $this->set("tran_total_users", $this->lang->line('total_users'));

        $this->set("page_top_header", $this->lang->line('dashboard'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('dashboard'));
        $this->set("page_small_header", "");
        $help_link="dashboard";
        $this->set("help_link", $help_link);        
        
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->setScripts();

        $this->setView();
      
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }

}

?>