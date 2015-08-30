<?php

require_once 'Inf_Controller.php';

class Income_Details extends Inf_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('validation');
        $this->val = new Validation();

        $this->load->model('profile_model');
    }

    function income() {

        //Set the supported script for generate epin
        $title = $this->lang->line('income_details');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "EPin_tooltip.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "tooltip/standalone.css";
        $this->ARR_SCRIPT[1]["type"] = "css";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "tooltip/tooltip-generic.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "tooltip/change.css";
        $this->ARR_SCRIPT[3]["type"] = "css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "validate_income.js";
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

        $this->ARR_SCRIPT[11]["name"] = "ajax.js";
        $this->ARR_SCRIPT[11]["type"] = "js";
        $this->ARR_SCRIPT[11]["loc"] = "header";

        $this->ARR_SCRIPT[12]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[12]["type"] = "js";
        $this->ARR_SCRIPT[12]["loc"] = "header";

        $this->ARR_SCRIPT[13]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[13]["type"] = "css";
        $this->ARR_SCRIPT[13]["loc"] = "header";

        $this->setScripts();

        $user_id = $this->LOG_USER_ID;
        $mlm_plan = $this->session->userdata['mlm_plan'];
        $this->set('mlm_plan', $mlm_plan);
        ////////////////////////// for language translation  ///////////////////////////////
        /*         * *************************for TAB************************************************ */
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_Amount_Type", $this->lang->line('Amount_Type'));
        $this->set("tran_Amount_Total", $this->lang->line('Amount_Total'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_from", $this->lang->line('from'));
        $this->set("tran_level", $this->lang->line('level'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_binary", $this->lang->line('binary'));
        $this->set("tran_income_details", $this->lang->line('income_details'));

        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_select_user", $this->lang->line('select_user'));
        $this->set("tran_select_user_id", $this->lang->line('select_user_id'));
        $this->set("tran_type_members_name", $this->lang->line('type_members_name'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_no_details_found", $this->lang->line('no_details_found'));

        $this->set("page_top_header", $this->lang->line('income_details'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('income_details'));
        $this->set("page_small_header", "");


        $help_link = "income_details";
        $this->set("help_link", $help_link);

        /////////////////////////////////////////////////

        if ($this->input->post('user_name')) {
            if (!$this->input->post('user_name')) {
                $msg = $this->lang->line('you_must_select_a_username');
                $this->redirect($msg, "profile/user_account", false);
            } else {
                $posted_user_name = $this->input->post('user_name');
                $user_name = $this->income_details_model->userNameToID($posted_user_name);
                $this->set('posted_user_name', $posted_user_name);
            }
            $this->get_user_summary($user_name);
            $this->session->set_userdata('usr_name', $this->input->post('user_name'));
            $u_name = $this->input->post('user_name');
            
        } else if ($this->input->get('user_name')) {
            if (!$this->input->get('user_name')) {
                $msg = $this->lang->line('you_must_select_a_username');
                $this->redirect($msg, "profile/user_account", false);
            } else {
                $posted_user_name = $this->input->get('user_name');
                $user_name = $this->income_details_model->userNameToID($posted_user_name);
                $this->set('posted_user_name', $posted_user_name);
            }
            $this->get_user_summary($user_name);
            $this->session->set_userdata('usr_name', $this->input->get('user_name'));
            $u_name = $this->input->get('user_name');
        } else {
            $msg = $this->lang->line('you_must_select_a_username');
            $this->redirect($msg, "profile/user_account", false);
        }
        $u_id = $this->income_details_model->getUserId($u_name);
        if (!$u_id) {
            $msg = $this->lang->line('Username_not_Exists');
            $this->redirect($msg, "profile/user_account", false);
        }
        $this->set('u_id', $u_id);

        ////////////////////////////////////////////////////////////////////////////////////
        $this->set("tran_Username_not_Exists", $this->lang->line('Username_not_Exists'));
        $arr = $this->income_details_model->add_income($u_id);
        $this->set("amount", $arr);
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

}

?>