<?php

require_once 'Inf_Controller.php';

class Leg_Count extends Inf_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('validation');
        $this->val = new Validation();

        $this->load->model('profile_model');
    }

    function view_leg_count() {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $this->ARR_SCRIPT[0]["name"] = "table-data.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[1]["type"] = "css";
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

        $this->ARR_SCRIPT[6]["name"] = "ajax.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "header";


        $this->setScripts();
        $title = $this->lang->line('leg_count');
        $this->set('title', $this->COMPANY_NAME . " | $title");

        $product_status = $this->MODULE_STATUS['product_status'];
        $this->leg_count_model->initialize($product_status);

        $user_id = $this->LOG_USER_ID;
        $user_type = $this->LOG_USER_TYPE;

        $mlm_plan = $this->session->userdata['mlm_plan'];
        $this->set('mlm_plan', $mlm_plan);

        ////////////////////////// code for language translation  ///////////////////////////////
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_leg_count", $this->lang->line('leg_count'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_userid_fullname", $this->lang->line('userid_fullname'));
        $this->set("tran_left_point", $this->lang->line('left_point'));
        $this->set("tran_right_point", $this->lang->line('right_point'));
        $this->set("tran_left_carry", $this->lang->line('left_carry'));
        $this->set("tran_right_carry", $this->lang->line('right_carry'));
        $this->set("tran_total_pair", $this->lang->line('total_pair'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_total", $this->lang->line('total'));
        $this->set("tran_No_Leg_Count_Found", $this->lang->line('No_Leg_Count_Found'));
        $this->set("tran_select_user_id", $this->lang->line('select_user_id'));
        $this->set("tran_select_user_name", $this->lang->line('select_user_name'));
        $this->set("tran_you_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_type_members_name", $this->lang->line('type_members_name'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("page_top_header", $this->lang->line('leg_count'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('leg_count'));
        $this->set("page_small_header", "");
        $this->set("invalid_user_name", "");
        $this->set('is_valid_username', "");
        $this->set("tran_Username_not_Exists", $this->lang->line('Username_not_Exists'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));


        $help_link = "commision-details";
        $this->set("help_link", $help_link);
        /////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////// pagination ////////////////////////////////////////

        $base_url = base_url() . "leg_count/view_leg_count";
        $config['base_url'] = $base_url;
        $this->set("user_name", $this->LOG_USER_NAME);

        $config['per_page'] = 25;
        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;
        ////////////////////Niyasali////////////
        $legcount = FALSE;
        if ($this->input->post('user_name')) {
            $legcount = TRUE;
            $usr = $this->input->post('user_name');
            if ($usr == null || !$usr) {
                $msg = $this->lang->line("you_must_enter_user_name");
                $this->redirect($msg, "profile/user_account", FALSE);
            }
            $is_valid_username = $this->leg_count_model->isUserAvailable($usr);
            $this->set('is_valid_username', $is_valid_username);
            if ($is_valid_username) {

                $users = $this->leg_count_model->getUserIdFromUserName($usr);
                $user_id = $users['user_id'];
                $user_type = $users['user_type'];
                $user_name = $users['user_name'];
                $this->set("user_name", $user_name);

                $this->get_user_summary($user_name);
            } else {
                $msg = $this->lang->line('Username_not_Exists');
                $this->redirect($msg, "leg_count/view_leg_count", false);
            }
        } else if ($this->input->get('user_name')) {
            $legcount = TRUE;
            $usr = $this->input->get('user_name');
            if ($usr == null || !$usr) {
                $msg = $this->lang->line("you_must_enter_user_name");
                $this->redirect($msg, "profile/user_account", FALSE);
            }
            $is_valid_username = $this->leg_count_model->isUserAvailable($usr);
            $this->set('is_valid_username', $is_valid_username);
            if ($is_valid_username) {

                $users = $this->leg_count_model->getUserIdFromUserName($usr);
                $user_id = $users['user_id'];
                $user_type = $users['user_type'];

                $user_name = $users['user_name'];
                $this->set("user_name", $user_name);

                $this->get_user_summary($user_name);
            } else {
                $msg = $this->lang->line('Username_not_Exists');
                $this->redirect($msg, "profile/user_account", false);
            }
        } else {
            $msg = $this->lang->line("you_must_enter_user_name");
            $this->redirect($msg, "profile/user_account", FALSE);
        }
        ////////////////////////////////
        $this->set('legcount', $legcount);

        $users = $this->leg_count_model->getLegDetails($user_id, $user_type);
        //$user_leg_detail = $this->leg_count_model->getUserLegDetails($user_id, $page, $config['per_page'], $user_type);
        $count = count($users);
        $numrows = $this->leg_count_model->getCountUserLegDetails($user_id, $user_type);

        $config['total_rows'] = $numrows;
        $this->pagination->initialize($config);
        $this->set("count", $numrows);
        $this->set("users", $users);
        $this->set("count", $count);
        $result_per_page = $this->pagination->create_links();
        $this->set("result_per_page", $result_per_page);

        $this->setView();
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