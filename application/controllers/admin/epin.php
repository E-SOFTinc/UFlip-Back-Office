<?php

require_once 'Inf_Controller.php';

class Epin extends Inf_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('validation');
        $this->val = new Validation();

        $this->load->model('profile_model');
    }

    function generate_epin($from = "") {

        //Set the supported script for generate epin
        $title = $this->lang->line('add_epin');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "EPin_tooltip.js";
        $this->ARR_SCRIPT[0]["type"] = "js";

        $this->ARR_SCRIPT[1]["name"] = "tooltip/standalone.css";
        $this->ARR_SCRIPT[1]["type"] = "css";

        $this->ARR_SCRIPT[2]["name"] = "tooltip/tooltip-generic.css";
        $this->ARR_SCRIPT[2]["type"] = "css";

        $this->ARR_SCRIPT[3]["name"] = "tooltip/change.css";
        $this->ARR_SCRIPT[3]["type"] = "css";

        $this->ARR_SCRIPT[4]["name"] = "validate_epin.js";
        $this->ARR_SCRIPT[4]["type"] = "js";

        $this->setScripts();

        //Set the supported script for generate epin
        //Function start for epin genration page
        $product_status = $this->MODULE_STATUS['product_status'];
        //$this->epin_model->initialize($product_status);

        $total_pin = $this->epin_model->getUnallocatedPinCount();


        $amount_details = $this->epin_model->getAllEwalletAmounts();
        $this->set("amount_details", $amount_details);


        $base_url = base_url();
        $complete_model_path = $base_url . "admin/epin/generate_epin";
        $config['base_url'] = $complete_model_path;
        $limit = 200;
        if ($from == "") {
            $from = 0;
        }
        $this->set("from", $from);
        $config['total_rows'] = $total_pin; //$total_pin;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $pag_arr = $this->epin_model->paging($from, $limit, "generate", "");

        $paging_link = $this->pagination->create_links();

        $this->set("pin_numbers", $pag_arr['pin_numbers']);
        $this->set("un_allocated_pin", $total_pin);
        $this->set("product_status", $product_status);
        $this->set("paging_link", $paging_link);

        ////////////////////////// for language translation  ///////////////////////////////
        /*         * *************************for TAB************************************************ */
        $this->set("tran_add_epin", $this->lang->line('add_epin'));
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));
        $this->set("tran_search_epin", $this->lang->line('search_epin'));
        $this->set("tran_inactive_epin", $this->lang->line('inactive_epin'));
        $this->set("tran_active_epin", $this->lang->line('active_epin'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_refine", $this->lang->line('refine'));
        /*         * **************************TAB end*********************************************** */
        /*         * ***********     CODE ADDED BY JIJI    *********** *              */

        $this->set("tran_add_new_epin", $this->lang->line('add_new_epin'));
        $this->set("tran_number_of_epin", $this->lang->line('number_of_epin'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_product_id", $this->lang->line('product_id'));
        $this->set("tran_used_user", $this->lang->line('used_user'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_allocated_user", $this->lang->line('allocated_user'));
        $this->set("tran_uploaded_date", $this->lang->line('uploaded_date'));
        $this->set("tran_product_name", $this->lang->line('product_name'));
        $this->set("tran_count", $this->lang->line('count'));
        $this->set("tran_select_product", $this->lang->line('select_product'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_epins", $this->lang->line('epins'));
        $this->set("tran_your_account_have_no_active_epin", $this->lang->line('your_account_have_no_active_epin'));
        $this->set("tran_add_epin", $this->lang->line('add_epin'));
        $this->set("tran_you_must_select_a_product_name", $this->lang->line('you_must_select_a_product_name'));
        $this->set("tran_you_must_enter_count", $this->lang->line('you_must_enter_count'));
        $this->set("tran_enter_digits_only", $this->lang->line('enter_digits_only'));
        $this->set("tran_enter_a_valid_count", $this->lang->line('enter_a_valid_count'));
        $this->set("tran_digits_only", $this->lang->line('digits_only'));
        $this->set("tran_select_one_of_these_products", $this->lang->line('select_one_of_these_products'));
        $this->set("tran_no_of_epin_generated", $this->lang->line('no_of_epin_generated'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line(''));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line(''));
        $this->set("page_small_header", "");
        ////////////////////////////////////////////////////////////////////////////////////

        if ($product_status == "yes") {
            $options = $this->epin_model->setProduct('yes');
            $this->set("options", $options);
        }

        if ($this->input->post('addpasscode')) {
            $product_id = "";
            if ($product_status == "yes") {

                $product_id = $this->input->post('product');
            }
            $uploded_date = date('Y-m-d H:i:s');
            $status = 'yes';
            $cnt = $this->input->post('count');
            $max_pincount = $this->epin_model->getMaxPinCount();
            $rec = $this->epin_model->getAllActivePinspage();
            if ($rec < $max_pincount) {
                $errorcount = $max_pincount - $rec;
                if ($cnt <= $errorcount) {

                    $res = $this->epin_model->generatePasscode($cnt, $status, $uploded_date, $product_id);
                    if ($res) {

                        $msg = $this->lang->line('epin_added_successfully');
                        $this->redirect($msg, "epin/generate_epin", TRUE);
                    } else {
                        $msg = $this->lang->line('error_on_adding_epin');
                        $this->redirect($msg, "epin/generate_epin", FALSE);
                    }
                } else {
                    $msg1 = $this->lang->line('you_are_permitted_to_add');
                    $msg2 = $this->lang->line('epin_only');
                    $this->redirect($msg1 . $errorcount . $msg2, "epin/generate_epin", FALSE);
                }
            } else {
                $msg1 = $this->lang->line('already');
                $msg2 = $this->lang->line('epin_present');
                $this->redirect($msg1 . $rec . $msg2, "epin/generate_epin", FALSE);
            }
        }

        $this->setView();
        //}
    }

    function paging_footer() {

        $footer = $this->epin_model->setFooter();
        $this->set("footer", $footer);
    }

    function search_epin() {

        /*         * ***********************     CODE ADDED BY AMEEN   *********** *              */

        $title = $this->lang->line('search_epin');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->set("action_page", $this->CURRENT_URL);
        $this->ARR_SCRIPT[0]["name"] = "validate_epin.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->setScripts();
        $pro_status = $this->MODULE_STATUS['product_status'];
        //$this->epin_model->initialize($pro_status);
        ////////////////////////// for language translation by ///////////////////////////////
        /*         * *************************for TAB************************************************ */
        $this->set("tran_add_epin", $this->lang->line('add_epin'));
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));
        $this->set("tran_search_epin", $this->lang->line('search_epin'));
        $this->set("tran_inactive_epin", $this->lang->line('inactive_epin'));
        $this->set("tran_active_epin", $this->lang->line('active_epin'));
        /*         * **************************TAB end*********************************************** */

        $this->set("tran_search_epin", $this->lang->line('search_epin'));
        $this->set("tran_title", $this->lang->line('title'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_product_id", $this->lang->line('product_id'));
        $this->set("tran_used_user", $this->lang->line('used_user'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_allocated_user", $this->lang->line('allocated_user'));
        $this->set("tran_used_date", $this->lang->line('used_date'));
        $this->set("tran_product_name", $this->lang->line('product_name'));
        $this->set("tran_count", $this->lang->line('count'));
        $this->set("tran_select_product", $this->lang->line('select_product'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_no_pin_found", $this->lang->line('no_pin_found'));
        $this->set("tran_search_epin_with_product", $this->lang->line('search_epin_with_product'));
        $this->set("tran_plan_product", $this->lang->line('plan_product'));
        $this->set("tran_search_pin_numbers", $this->lang->line('search_pin_numbers'));
        $this->set("tran_select", $this->lang->line('select'));
        $this->set("tran_select_one_of_these_products", $this->lang->line('select_one_of_these_products'));
        $this->set("tran_please_enter_any_keyword_like_pin_number_or_pin_id", $this->lang->line('please_enter_any_keyword_like_pin_number_or_pin_id'));
        $this->set("tran_please_select_one_product", $this->lang->line('please_select_one_product'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line(''));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line(''));
        $this->set("page_small_header", "");
        ////////////////////////////////////////////////////////////////////////////////////


        if ($pro_status == "yes") {
            $options = $this->epin_model->setProduct('yes');
            $this->set("options", $options);
        }

        if ($this->input->post('search_pin')) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
            $this->session->unset_userdata('keyword1');
        }

        if ($pro_status == "yes") {
            if ($this->input->post('search_pin_pro')) {
                $this->session->set_userdata('keyword1', $this->input->post('product'));
                $this->session->unset_userdata('keyword');
            }
        }
        ///////////////////////////////////// pagination //////////////////////////////////////

        $base_url = base_url() . "admin/epin/search_epin";
        $config['base_url'] = $base_url;
        $config['per_page'] = 10;
        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;

        $pin_details = $this->epin_model->pinSelector($page, $config['per_page'], "search", "");
        $config['total_rows'] = $pin_details["numrows"];
        $this->pagination->initialize($config);
        $result_per_page = $this->pagination->create_links();
        $pin_numbers = $pin_details["pin_numbers"];

        $this->set("pin_numbers", $pin_numbers);

        //////////////////////////////////////////////////////////////////////////////////

        $this->set("page", $page);
        $this->set("keyword", $this->session->userdata('keyword'));
        $this->set("keyword1", $this->session->userdata('keyword1'));
        $this->set("result_per_page", $result_per_page);
        $this->set("pro_status", $pro_status);

        $this->setView();
    }

    function inactive_epin($action = "", $delete_id = "", $page = "", $limit = "") {

        $product_status = $this->MODULE_STATUS['product_status'];

        ////////////////////////// for language translation by ///////////////////////////////
        /*         * ************************for TAB************************************************ */
        $this->set("tran_add_epin", $this->lang->line('add_epin'));
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));
        $this->set("tran_search_epin", $this->lang->line('search_epin'));
        $this->set("tran_inactive_epin", $this->lang->line('inactive_epin'));
        $this->set("tran_active_epin", $this->lang->line('active_epin'));
        /*         * **************************TAB end*********************************************** */
        $this->set("tran_inactive_epin", $this->lang->line('inactive_epin'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_used_user", $this->lang->line('used_user'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_no_inactive_pin_found", $this->lang->line('no_inactive_pin_found'));
        $this->set("tran_sure_you_want_to_activate_this_passcode_there_is_no_undo", $this->lang->line('sure_you_want_to_activate_this_passcode_there_is_no_undo'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line(''));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line(''));
        $this->set("page_small_header", "");
        ////////////////////////////////////////////////////////////////////////////////////

        if ($action == "activate") {
            $result = $this->epin_model->updateEPin($delete_id, 'yes');
            if ($result) {
                $msg = $this->lang->line('epin_updated_successfully');
                $this->redirect($msg, "epin/epin_management", TRUE);
            } else {
                $msg = $this->lang->line('error_on_updating_epin');
                $this->redirect($msg, "epin/epin_management", FALSE);
            }
        }
        $title = $this->lang->line('inactive_epin');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "misc.js";
        $this->ARR_SCRIPT[0]["type"] = "js";

        $this->setScripts();

        ///////////////////////////////////// pagination //////////////////////////////////////

        $base_url = base_url() . "admin/epin/inactive_epin";
        $config['base_url'] = $base_url;

        $config['per_page'] = 200;

        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;

        $this->set("page", $page);
        $pin_details = $this->epin_model->pinSelector($page, $config['per_page'], "inactive", "");

        $config['total_rows'] = $pin_details["numrows"];
        $this->pagination->initialize($config);
        $pin_numbers = $pin_details["pin_numbers"];
        $this->set("pin_numbers", $pin_numbers);
        $paging_link = $this->pagination->create_links();
        //////////////////////////////////////////////////////////////////////////////////

        $this->set("paging_link", $paging_link);
        $this->set("product_status", $product_status);
        $this->setView();
    }

    function delete_epin($action = "", $delete_id = "", $page = "", $limit = "") {
        /*         * **************************     CODE ADDED BY AMEEN   *********** *              */
        $title = $this->lang->line('delete_epin');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->ARR_SCRIPT[0]["name"] = "misc.js";
        $this->ARR_SCRIPT[0]["type"] = "js";

        $this->setScripts();

        $product_status = $this->MODULE_STATUS['product_status'];
        ////////////////////////// for language translation  ///////////////////////////////
        /*         * ************************for TAB************************************************ */
        $this->set("tran_add_epin", $this->lang->line('add_epin'));
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));
        $this->set("tran_search_epin", $this->lang->line('search_epin'));
        $this->set("tran_inactive_epin", $this->lang->line('inactive_epin'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_active_epin", $this->lang->line('active_epin'));
        /*         * *************************TAB end*********************************************** */
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_product_id", $this->lang->line('product_id'));
        $this->set("tran_used_user", $this->lang->line('used_user'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_allocated_user", $this->lang->line('allocated_user'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_no_product_found", $this->lang->line('no_product_found'));
        $this->set("tran_sure_you_want_to_delete_this_passcode_there_is_no_undo", $this->lang->line('sure_you_want_to_delete_this_passcode_there_is_no_undo'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line(''));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line(''));
        $this->set("page_small_header", "");

        ////////////////////////////////////////////////////////////////////////////////////

        if ($action == "delete") {
            $result = $this->epin_model->deleteEPin($delete_id);
            if ($result) {
                $msg = $this->lang->line('epin_deleted_successfully');
                $this->redirect($msg, "epin/epin_management", TRUE);
            } else {
                $msg = $this->lang->line('error_on_deleting_epin');
                $this->redirect($msg, "epin/epin_management", FALSE);
            }
        }

        ///////////////////////////////////// pagination //////////////////////////////////////

        $base_url = base_url() . "admin/epin/delete_epin";
        $config['base_url'] = $base_url;
        $config['per_page'] = 200;

        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;
        $this->set("page", $page);
        $pin_details = $this->epin_model->pinSelector($page, $config['per_page'], "delete", "");

        $config['total_rows'] = $pin_details["numrows"];

        $this->pagination->initialize($config);
        $pin_numbers = $pin_details["pin_numbers"];
        $this->set("pin_numbers", $pin_numbers);
        $result_per_page = $this->pagination->create_links();
        //////////////////////////////////////////////////////////////////////////////////

        $this->set("result_per_page", $result_per_page);
        $this->set("product_status", $product_status);
        $this->setView();
    }

    function delete_all_epin($action = "", $page = "") {


        /*         * ***************************     CODE ADDED BY NIYASALI   *********** *              */
        $title = $this->lang->line('delete_epin');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->ARR_SCRIPT[0]["name"] = "misc.js";
        $this->ARR_SCRIPT[0]["type"] = "js";

        $this->setScripts();

        $product_status = $this->MODULE_STATUS['product_status'];
        ////////////////////////// for language translation  ///////////////////////////////
        /*         * *************************for TAB************************************************ */
        $this->set("tran_add_epin", $this->lang->line('add_epin'));
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));
        $this->set("tran_search_epin", $this->lang->line('search_epin'));
        $this->set("tran_inactive_epin", $this->lang->line('inactive_epin'));
        $this->set("tran_active_epin", $this->lang->line('active_epin'));
        /*         * **************************TAB end*********************************************** */
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_product_id", $this->lang->line('product_id'));
        $this->set("tran_used_user", $this->lang->line('used_user'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_allocated_user", $this->lang->line('allocated_user'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_no_product_found", $this->lang->line('no_product_found'));
        $this->set("tran_sure_you_want_to_delete_this_passcode_there_is_no_undo", $this->lang->line('sure_you_want_to_delete_this_passcode_there_is_no_undo'));
        $this->set("tran_NULL", $this->lang->line('NULL'));
        $this->set("tran_active", $this->lang->line('active'));
        $this->set("tran_blocked", $this->lang->line('blocked'));
        $this->set("tran_delete", $this->lang->line('delete'));
        ////////////////////////////////////////////////////////////////////////////////////

        if ($action == "delete") {
            $result = $this->epin_model->deleteAllEPin();
            if ($result) {
                $msg = $this->lang->line('epin_deleted_successfully');
                $this->redirect($msg, "epin/epin_management", TRUE);
            } else {
                $msg = $this->lang->line('error_on_deleting_epin');
                $this->redirect($msg, "epin/epin_management", FALSE);
            }
        }

        ///////////////////////////////////// pagination //////////////////////////////////////

        $base_url = base_url() . "admin/epin/delete_all_epin";
        $config['base_url'] = $base_url;

        $config['per_page'] = 200;

        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;
        $this->set("page", $page);
        $pin_details = $this->epin_model->pinSelector($page, $config['per_page'], "delete", "");

        $config['total_rows'] = $pin_details["numrows"];

        $this->pagination->initialize($config);
        $pin_numbers = $pin_details["pin_numbers"];
        $this->set("pin_numbers", $pin_numbers);
        $result_per_page = $this->pagination->create_links();
        //////////////////////////////////////////////////////////////////////////////////

        $this->set("result_per_page", $result_per_page);
        $this->set("product_status", $product_status);
        $this->setView();
    }

    function active_epin($action = "", $delete_id = "", $from = "", $limit = "") {
        $product_status = $this->MODULE_STATUS['product_status'];
        $title = $this->lang->line('active_epin');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        ////////////////////////// for language translation  ///////////////////////////////
        /*         * ************************for TAB************************************************ */
        $this->set("tran_add_epin", $this->lang->line('add_epin'));
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));
        $this->set("tran_search_epin", $this->lang->line('search_epin'));
        $this->set("tran_inactive_epin", $this->lang->line('inactive_epin'));
        $this->set("tran_active_epin", $this->lang->line('active_epin'));
        /*         * **************************TAB end*********************************************** */
        $this->set("tran_product_name", $this->lang->line('product_name'));
        $this->set("tran_select_product", $this->lang->line('select_product'));
        $this->set("tran_active_epin", $this->lang->line('active_epin'));
        $this->set("tran_product_id", $this->lang->line('product_id'));
        $this->set("tran_used_user", $this->lang->line('used_user'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_uploaded_date", $this->lang->line('uploaded_date'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_no_active_epin_found", $this->lang->line('no_active_epin_found'));
        $this->set("tran_view_active_pin", $this->lang->line('view_active_pin'));
        $this->set("tran_product_status", $this->lang->line('product_status'));
        $this->set("tran_select_one_of_these_products", $this->lang->line('select_one_of_these_products'));
        $this->set("tran_view_active_pin_of_select_product", $this->lang->line('view_active_pin_of_select_product'));
        $this->set("tran_you_must_select_a_product_name", $this->lang->line('you_must_select_a_product_name'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line(''));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line(''));
        $this->set("page_small_header", "");
        ////////////////////////////////////////////////////////////////////////////////////
        if ($product_status == "yes") {
            $options = $this->epin_model->setProduct('yes');
            $this->set("options", $options);
        }
        if ($action == "block") {
            $result = $this->epin_model->updateEPin($delete_id, 'no');
            if ($result) {
                $msg = $this->lang->line('epin_updated_successfully');
                $this->redirect($msg, "epin/epin_management", TRUE);
            } else {
                $msg = $this->lang->line('error_on_updating_epin');
                $this->redirect($msg, "epin/epin_management", FALSE);
            }
        }
        $product_id = "";
        if ($this->input->post('viewproductpin')) {
            $product_id = $this->input->post("product");
        }

        $this->ARR_SCRIPT[0]["name"] = "misc.js";
        $this->ARR_SCRIPT[0]["type"] = "js";

        $this->ARR_SCRIPT[1]["name"] = "validate_epin.js";
        $this->ARR_SCRIPT[1]["type"] = "js";

        $this->setScripts();

        ///////////////////////////////////// pagination //////////////////////////////////////

        $base_url = base_url() . "admin/epin/active_epin";
        $config['base_url'] = $base_url;
        $config['per_page'] = 200;

        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;
        $this->set("page", $page);
        $pin_details = $this->epin_model->pinSelector($page, $config['per_page'], "active", $product_id);

        $config['total_rows'] = $pin_details["numrows"];

        $this->pagination->initialize($config);
        $pin_numbers = $pin_details["pin_numbers"];
        $this->set("pin_numbers", $pin_numbers);
        $paging_link = $this->pagination->create_links();
        //////////////////////////////////////////////////////////////////////////////////
        $this->set("paging_link", $paging_link);
        $this->set("product_status", $product_status);
        $this->setView();
    }

    function view_epin_request() {
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

        $this->ARR_SCRIPT[11]["name"] = "jquery.pulsate/jquery.pulsate.min.js";
        $this->ARR_SCRIPT[11]["type"] = "plugins/js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";


        $this->ARR_SCRIPT[12]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[12]["type"] = "css";
        $this->ARR_SCRIPT[12]["loc"] = "header";

        $this->ARR_SCRIPT[13]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[13]["type"] = "js";
        $this->ARR_SCRIPT[13]["loc"] = "footer";


        $this->ARR_SCRIPT[14]["name"] = "validate_epin.js";
        $this->ARR_SCRIPT[14]["type"] = "js";
        $this->ARR_SCRIPT[14]["loc"] = "footer";

        $this->setScripts();
        $pro_status = $this->MODULE_STATUS['product_status'];
        $title = $this->lang->line('view_epin_request');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        ////////////////////////// for language translation  ///////////////////////////////
        /*         * ************************for TAB************************************************ */
        $this->set("tran_add_epin", $this->lang->line('add_epin'));
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));
        $this->set("tran_search_epin", $this->lang->line('search_epin'));
        $this->set("tran_inactive_epin", $this->lang->line('inactive_epin'));
        $this->set("tran_active_epin", $this->lang->line('active_epin'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        /*         * *************************TAB end*********************************************** */
        $this->set("tran_view_epin_request", $this->lang->line('view_epin_request'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_requested_pin_count", $this->lang->line('requested_pin_count'));
        $this->set("tran_product_name", $this->lang->line('product_name'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_count", $this->lang->line('count'));
        $this->set("tran_check", $this->lang->line('check'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_expiry_date", $this->lang->line('expiry_date'));
        $this->set("tran_no_epin_request_found", $this->lang->line('no_epin_request_found'));
        $this->set("tran_allocate", $this->lang->line('allocate'));
        $this->set("tran_you_must_select_a_product_name", $this->lang->line('you_must_select_a_product_name'));
        $this->set("tran_you_must_enter_count", $this->lang->line('you_must_enter_count'));
        $this->set("tran_enter_digits_only", $this->lang->line('enter_digits_only'));
        $this->set("tran_NULL", $this->lang->line('NULL'));
        $this->set("tran_active", $this->lang->line('active'));
        $this->set("tran_blocked", $this->lang->line('blocked'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('view_epin_request'));
        $this->set("tran_please_select_at_least_one_checkbox", $this->lang->line('please_select_at_least_one_checkbox'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('view_epin_request'));
        $this->set("page_small_header", "");

        $help_link = "view-epin-request";
        $this->set("help_link", $help_link);
        //////////////////////////////////////////////////////////////////////////////////////////////////      
        if ($this->input->post('reqpasscode')) {

            $request_date = date('Y-m-d H:i:s');
            $cnt = $this->input->post('count');
            $req_user = $this->session->userdata('user_id');
            $this->epin_model->begin();
            $res = $this->epin_model->insertPinRequest($req_user, $cnt, $request_date);

            if ($res) {
                $this->epin_model->commit();
                $msg = $this->lang->line('pin_request_send_successfully');
                $this->redirect($msg, "epin/view_epin_request", true);
            } else {
                $this->epin_model->rollback();
                $msg = $this->lang->line('error_on_pin_request');
                $this->redirect($msg, "epin/view_epin_request", false);
            }
        }

        if ($this->input->post('allocate')) {

            $total_count = $this->input->post('total_count');
            $admin_id = $this->LOG_USER_ID;
            $user_type = $this->LOG_USER_TYPE;
            if ($user_type == 'employee') {
                $this->load->model('validation');
                $admin_id = $this->validation->getAdminId();
            }
            $uploded_date = date('Y-m-d H:i:s');
            $pin_alloc_date = date('Y-m-d H:i:s');
            $status = "yes";
            $res = 0;
            for ($i = 1; $i < $total_count; $i++) {
                $id = $this->input->post('id' . $i);
                $checked = $this->input->post('active' . $i);
                $pin_count = $this->input->post('count' . $i);
                $allocate_id = $this->input->post('user_id' . $i);
                $rem_count = $this->input->post('rem_count' . $i);


                $expiry_date = $this->input->post('expiry_date' . $i);
                $amount = $this->input->post('amount' . $i);
                if ($checked == "yes") {
                    if ($pin_count <= $rem_count) {
                        $this->epin_model->begin();
                        $res = $this->epin_model->ifChecked($id, $pin_count, $pin_alloc_date, $status, $uploded_date, $admin_id, $allocate_id, $rem_count, $amount, $expiry_date);
                    }
                }
            }
            if ($res) {
                $this->epin_model->commit();
                $msg = $this->lang->line('epin_allocated_successfully');
                $this->redirect($msg, "epin/view_epin_request", true);
            } else {
                $this->epin_model->rollback();
                $msg = $this->lang->line('error_on_epin_allocation');
                $this->redirect($msg, "epin/view_epin_request", false);
            }
        }
        /*         * ***********pagination************ */

        $base_url = base_url() . "admin/epin/view_epin_request";
        $config['base_url'] = $base_url;

        $config['per_page'] = 10;
        $config["uri_segment"] = 4;
        $config['num_links'] = 5;
        if ($this->uri->segment(4) != "") {
            $page = $this->uri->segment(4);
        } else
            $page = 0;
        $tot_rows = $this->epin_model->getAllPinRequestCount();
        $config['total_rows'] = $tot_rows;
        $this->pagination->initialize($config);
        /*         * ***********pagination************ */

        $pin_detail_arr = $this->epin_model->viewEPinRequest($pro_status, $config['per_page'], $page);
        $result_per_page = $this->pagination->create_links();
        $this->set('result_per_page', $result_per_page);

        $this->set("pin_detail_arr", $pin_detail_arr);
        $this->set("pro_status", $pro_status);
        $this->setView();
    }

    function allocate_pin_user() {

        $title = $this->lang->line('epin_allocation_to_user');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $product_status = $this->MODULE_STATUS['product_status'];
        ////////////////////////// for language translation  ///////////////////////////////
        /*         * ************************for TAB************************************************ */
        $this->set("tran_add_epin", $this->lang->line('add_epin'));
        $this->set("tran_you_must_select_an_amount", $this->lang->line('you_must_select_an_amount'));
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));
        $this->set("tran_search_epin", $this->lang->line('search_epin'));
        $this->set("tran_inactive_epin", $this->lang->line('inactive_epin'));
        $this->set("tran_active_epin", $this->lang->line('active_epin'));
        /*         * *************************TAB end*********************************************** */
        $this->set("tran_You_must_select_a_date", $this->lang->line('You_must_select_a_date'));
        $this->set("tran_past_expiry_date", $this->lang->line('past_expiry_date'));
        $this->set("tran_epin_allocation_to_user", $this->lang->line('epin_allocation_to_user'));
        $this->set("tran_select_user", $this->lang->line('select_user'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_select_product", $this->lang->line('select_product'));
        $this->set("tran_epin_count", $this->lang->line('epin_count'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_you_must_select_a_product_name", $this->lang->line('you_must_select_a_product_name'));
        $this->set("tran_you_must_enter_count", $this->lang->line('you_must_enter_count'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_expiry_date", $this->lang->line('expiry_date'));
        $this->set("tran_select_amount", $this->lang->line('select_amount'));

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('epin_allocation_to_user'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('epin_allocation_to_user'));
        $this->set("page_small_header", "");

        $help_link = "allocate-epin-to-user";
        $this->set("help_link", $help_link);

        if ($product_status == "yes") {
            $product_arr = $this->epin_model->getProduct();
            $this->set("product_arr", $product_arr);
        }

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "validate_pin.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "messages.css";
        $this->ARR_SCRIPT[4]["type"] = "css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "custom.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "style.css";
        $this->ARR_SCRIPT[6]["type"] = "css";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[7]["type"] = "plugins/css";
        $this->ARR_SCRIPT[7]["loc"] = "header";

        $this->ARR_SCRIPT[8]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[8]["type"] = "plugins/js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "jquery.pulsate/jquery.pulsate.min.js";
        $this->ARR_SCRIPT[9]["type"] = "plugins/js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        $this->ARR_SCRIPT[10]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[10]["type"] = "css";
        $this->ARR_SCRIPT[10]["loc"] = "header";

        $this->ARR_SCRIPT[11]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[11]["type"] = "js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

        $this->ARR_SCRIPT[12]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[12]["type"] = "js";
        $this->ARR_SCRIPT[12]["loc"] = "header";

        $this->ARR_SCRIPT[13]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[13]["type"] = "plugins/css";
        $this->ARR_SCRIPT[13]["loc"] = "header";

        $this->ARR_SCRIPT[14]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[14]["type"] = "plugins/css";
        $this->ARR_SCRIPT[14]["loc"] = "header";

        $this->ARR_SCRIPT[15]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[15]["type"] = "plugins/js";
        $this->ARR_SCRIPT[15]["loc"] = "footer";

        $this->ARR_SCRIPT[16]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[16]["type"] = "plugins/js";
        $this->ARR_SCRIPT[16]["loc"] = "footer";


        $this->ARR_SCRIPT[17]["name"] = "Epinvalidation.js";
        $this->ARR_SCRIPT[17]["type"] = "js";
        $this->ARR_SCRIPT[17]["loc"] = "footer";


        $this->setScripts();

        $product_status = $this->MODULE_STATUS['product_status'];
        $this->set("product_status", $product_status);

        $amount_details = $this->epin_model->getAllEwalletAmounts();
        $this->set("amount_details", $amount_details);

        if ($this->input->post("insert")) {


            $product_status = $this->MODULE_STATUS['product_status'];
            $user_name = $this->input->post('user_name');
            $user = $this->val->userNameToID($user_name);
            $expirydate = $this->input->post('date');
            $amount = $this->input->post('amount1');

            $user_exists = $this->epin_model->isUserNameAvailable($this->input->post('user_name'));
            if (is_numeric($this->input->post('count')) && $user_exists && $this->input->post('count') > 0) {

                $res = $this->epin_model->generateEpin($this->input->post('user_name'), $amount, $this->input->post('count'), $expirydate);
//                } else {
//                    $res = $this->epin_model->generateEpinWithOut($this->input->post('user_name'), $this->input->post('count'));
//                }
                if ($res) {
                    $login_id = $this->LOG_USER_ID;
                    $user_type = $this->LOG_USER_TYPE;
                    if ($user_type == 'employee') {
                        $login_id = $this->val->getAdminId();
                    }
                    $this->val->insertUserActivity($user, 'allocate epin', $login_id);
                    $msg = $this->lang->line('epin_allocated_successfully');
                    $this->redirect($msg, "epin/allocate_pin_user", TRUE);
                } else {
                    $msg = $this->lang->line('error_please_try_again');
                    $this->redirect($msg, "epin/allocate_pin_user", FALSE);
                }
            } else {
                $msg = $this->lang->line('invalid_user_selection_or_epin_count');
                $this->redirect($msg, "epin/allocate_pin_user", FALSE);
            }
        }
        $this->setView();
    }

    function view_pin() {
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

        $this->ARR_SCRIPT[6]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[6]["type"] = "plugins/css";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[7]["type"] = "plugins/css";
        $this->ARR_SCRIPT[7]["loc"] = "header";

        $this->ARR_SCRIPT[8]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[8]["type"] = "plugins/js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[9]["type"] = "plugins/js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        $this->ARR_SCRIPT[10]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[10]["type"] = "plugins/js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->ARR_SCRIPT[11]["name"] = "table-data.js";
        $this->ARR_SCRIPT[11]["type"] = "js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

        $this->ARR_SCRIPT[12]["name"] = "Epinvalidation.js";
        $this->ARR_SCRIPT[12]["type"] = "js";
        $this->ARR_SCRIPT[12]["loc"] = "footer";

        $this->setScripts();
        $title = $this->lang->line('view_pin_numbers');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        ////////////////////////// for language translation  ///////////////////////////////
        /*         * ************************for TAB************************************************ */
        $this->set("tran_add_epin", $this->lang->line('add_epin'));
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));
        $this->set("tran_search_epin", $this->lang->line('search_epin'));
        $this->set("tran_inactive_epin", $this->lang->line('inactive_epin'));
        $this->set("tran_active_epin", $this->lang->line('active_epin'));
        /*         * *************************TAB end*********************************************** */
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_expiry_date", $this->lang->line('expiry_date'));
        $this->set("tran_view_date_wise_epin_allocation", $this->lang->line('view_date_wise_epin_allocation'));
        $this->set("tran_from", $this->lang->line('from'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_product_id", $this->lang->line('product_id'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_inactive", $this->lang->line('inactive'));
        $this->set("tran_active", $this->lang->line('active'));
        $this->set("tran_used_user", $this->lang->line('used_user'));
        $this->set("tran_allocated_user", $this->lang->line('allocated_user'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_no_data", $this->lang->line('no_data'));
        $this->set("tran_to", $this->lang->line('to'));
        $this->set("tran_balance_amount", $this->lang->line('balance_amount'));
        $this->set("tran_you_must_enter_a_date", $this->lang->line('you_must_enter_a_date'));
        $this->set("tran_You_must_select_a_Todate_greaterThan_Fromdate", $this->lang->line('You_must_select_a_Todate_greaterThan_Fromdate'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('view_date_wise_epin_allocation'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('view_date_wise_epin_allocation'));
        $this->set("page_small_header", "");

        $help_link = "view-allocated-epin";
        $this->set("help_link", $help_link);

        $flag = false;
        $base_url = base_url() . "admin/epin/view_pin/tab";
        $product_status = $this->MODULE_STATUS['product_status'];
        $this->set("product_status", $product_status);
        $this->set("date_submit", $this->input->post('date_submit'));
        if ($this->input->post('date_submit')) {
            $flag = true;
            $week_date1 = $this->input->post('week_date1');
            $week_date2 = $this->input->post('week_date2');
            $this->session->set_userdata('week_date1', $week_date1);
            $this->session->set_userdata('week_date2', $week_date2);
        }
        /*         * ***************pagination************** */
        $config['base_url'] = $base_url;

        $config['per_page'] = 200;
        $config["uri_segment"] = 5;
        $config['num_links'] = 5;
        if ($this->uri->segment(4) != "") {
            $page = $this->uri->segment(5);
            $flag = true;
        } else
            $page = 0;
        $tot_row = $this->epin_model->getPinDetailsBasedData11Count($this->session->userdata('week_date1'), $this->session->userdata('week_date2'));
        $config['total_rows'] = $tot_row;
        $this->pagination->initialize($config);
        /*         * ***************pagination************** */

        $details_arr = $this->epin_model->getPinDetailsBasedData11($this->session->userdata('week_date1'), $this->session->userdata('week_date2'), $config['per_page'], $page);

        $this->set("details_arr", $details_arr);
        $result_per_page = $this->pagination->create_links();
        $this->set('result_per_page', $result_per_page);
        $this->set('flag', $flag);
        $this->setView();
    }

    function view_pin_user($action = "", $delete_id = "") {

        $title = $this->lang->line('view_pin_numbers');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        ////////////////////////// for language translation  ///////////////////////////////
        /*         * *************************for TAB************************************************ */
        $this->set("tran_add_epin", $this->lang->line('add_epin'));
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));
        $this->set("tran_search_epin", $this->lang->line('search_epin'));
        $this->set("tran_inactive_epin", $this->lang->line('inactive_epin'));
        $this->set("tran_active_epin", $this->lang->line('active_epin'));
        /*         * *************************TAB end*********************************************** */
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_expiry_date", $this->lang->line('expiry_date'));
        $this->set("tran_user_wise_epin", $this->lang->line('user_wise_epin'));
        $this->set("tran_select_user", $this->lang->line('select_user'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_product_id", $this->lang->line('product_id'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_uploaded_date", $this->lang->line('uploaded_date'));
        $this->set("tran_delete", $this->lang->line('delete'));
        $this->set("tran_no_epin_found", $this->lang->line('no_epin_found'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_balance_amount", $this->lang->line('balance_amount'));
        $this->set("tran_no_data", $this->lang->line('no_data'));
        $this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_sure_you_want_to_delete_this_passcode_there_is_no_undo", $this->lang->line('sure_you_want_to_delete_this_passcode_there_is_no_undo'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('user_wise_epin'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('user_wise_epin'));
        $this->set("page_small_header", "");

        $help_link = "view-user-epin";
        $this->set("help_link", $help_link);
        $mlm_plan = $this->session->userdata['mlm_plan'];
        $this->set('mlm_plan', $mlm_plan);
        /////////////////////////////////////////////////////////////////////////////////////////////////

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

        $this->ARR_SCRIPT[11]["name"] = "validate_feed.js";
        $this->ARR_SCRIPT[11]["type"] = "js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

        $this->setScripts();
        $flag = false;
        $base_url = base_url() . "admin/epin/view_pin_user/tab";
        $product_status = $this->MODULE_STATUS['product_status'];
        $path_root = base_url() . "admin/";
        $this->set("root", $path_root);
        $this->set("product_status", $product_status);
        $this->set("view", $this->input->post('view'));

        /*         * ************************ */


        $config['base_url'] = $base_url;

        $config['per_page'] = 200;
        $config["uri_segment"] = 5;
        $config['num_links'] = 5;
        if ($this->uri->segment(4) != "") {
            $page = $this->uri->segment(5);
            $flag = true;
        } else
            $page = 0;
        //  echo ">>>".$flag;
        if ($this->input->post('user_name')) {
            $user = $this->input->post('user_name');
            $this->session->set_userdata('username', $user);
            $flag = true;
        } else if ($this->input->get('user')) {
            $user = $this->input->get('user');
            $this->session->set_userdata('username', $user);
            $flag = true;
        } else {
            $msg = $this->lang->line('invalid_user_name');
            $this->redirect($msg, "profile/user_account", false);
        }
        $user_name = $this->session->userdata('username');
        $is_valid_username = $this->val->isUserNameAvailable($user_name);
        $this->set('is_valid_username', $is_valid_username);
        if (!$is_valid_username) {
            $msg = $this->lang->line('Username_not_Exists');
            $this->redirect($msg, "profile/user_account", false);
        } else {
            $this->get_user_summary($user_name);
        }
        $total_rows = $this->epin_model->getPinDetailsForUser11Count($user_name);
        $config['total_rows'] = $total_rows;

        /*         * ************************ */



        $pin_arr = $this->epin_model->getPinDetailsForUser11($user_name, $config['per_page'], $page);
        //print_r($pin_arr);
        $this->pagination->initialize($config);
        $this->set("pin_arr", $pin_arr);
        $result_per_page = $this->pagination->create_links();
        $this->set('result_per_page', $result_per_page);
        $this->set('flag', $flag);
        $this->setView();
    }

    function delete($action = "", $delete_id = "") {

        $product_status = $this->MODULE_STATUS['product_status'];

        if ($action == "delete") {

            $result = $this->epin_model->deleteEPin($delete_id);

            if ($result) {

                $msg = $this->lang->line('epin_deleted_successfully');
                $this->redirect($msg, "profile/user_account", TRUE);
            } else {
                $msg = $this->lang->line('error_on_deleting_epin');
                $this->redirect($msg, "profile/user_account", FALSE);
            }
        }
    }

    function active_inactive_pin_count() {
        $title = $this->lang->line('error_on_deleting_epin');
        $product_status = $this->MODULE_STATUS['product_status'];
        $this->EPin->initialize($product_status);
        $pin_count_details = $this->EPin->getActveInactivePinDetails();

        $this->set("title", $this->COMPANY_NAME . " |$title");
        $this->set("pin_count_details", $pin_count_details);
    }

    function epin_management($from = "", $action = "", $delete_id = "", $page = "", $limit = "") {




        $title = $this->lang->line('epin_management');
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

        $this->ARR_SCRIPT[11]["name"] = "jquery.pulsate/jquery.pulsate.min.js";
        $this->ARR_SCRIPT[11]["type"] = "plugins/js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

        $this->ARR_SCRIPT[12]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[12]["type"] = "css";
        $this->ARR_SCRIPT[12]["loc"] = "header";

        $this->ARR_SCRIPT[13]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[13]["type"] = "js";
        $this->ARR_SCRIPT[13]["loc"] = "footer";

        $this->ARR_SCRIPT[14]["name"] = "validate_epin.js";
        $this->ARR_SCRIPT[14]["type"] = "js";
        $this->ARR_SCRIPT[14]["loc"] = "footer";

        $this->ARR_SCRIPT[15]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[15]["type"] = "js";
        $this->ARR_SCRIPT[15]["loc"] = "header";

        $this->ARR_SCRIPT[16]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[16]["type"] = "plugins/css";
        $this->ARR_SCRIPT[16]["loc"] = "header";

        $this->ARR_SCRIPT[17]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[17]["type"] = "plugins/css";
        $this->ARR_SCRIPT[17]["loc"] = "header";

        $this->ARR_SCRIPT[18]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[18]["type"] = "plugins/js";
        $this->ARR_SCRIPT[18]["loc"] = "footer";

        $this->ARR_SCRIPT[19]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[19]["type"] = "plugins/js";
        $this->ARR_SCRIPT[19]["loc"] = "footer";


        $this->setScripts();

        $tab1 = " active";
        $tab2 = "";

        //Set the supported script for generate epin
        //Function start for epin genration page
        $product_status = $this->MODULE_STATUS['product_status'];
        $total_pin = $this->epin_model->getUnallocatedPinCount();

        $this->set("un_allocated_pin", $total_pin);

        $amount_details = $this->epin_model->getAllEwalletAmounts();
        $this->set("amount_details", $amount_details);

        $this->set("from", $from);
        ////////////////////////// for language translation  ///////////////////////////////

        /*         * ***********     CODE ADDED BY JIJI    *********** *              */
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_bal_amount", 'balance amount');
        $this->set("tran_expiry_date", $this->lang->line('expiry_date'));

        /*         * ***********     CODE ADDED BY JIJI    *********** *  
         *             */
        $this->set("tran_pin_uploaded_date", $this->lang->line('pin_uploaded_date'));
        $this->set("tran_pin_balance_amount", $this->lang->line('pin_balance_amount'));
        $this->set("tran_pin_amount", $this->lang->line('epin_amount'));
        $this->set("tran_you_must_select_an_amount", $this->lang->line('you_must_select_an_amount'));
        $this->set("tran_refine", $this->lang->line('refine'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_expiry_date", $this->lang->line('expiry_date'));
        $this->set("tran_select_amount", $this->lang->line('select_amount'));

        $this->set("tran_add_new_epin", $this->lang->line('add_new_epin'));
        $this->set("tran_epin_management", $this->lang->line('epin_management'));
        $this->set("tran_number_of_epin", $this->lang->line('number_of_epin'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_product_id", $this->lang->line('product_id'));
        $this->set("tran_used_user", $this->lang->line('used_user'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_allocated_user", $this->lang->line('allocated_user'));
        $this->set("tran_uploaded_date", $this->lang->line('uploaded_date'));
        $this->set("tran_product_name", $this->lang->line('product_name'));
        $this->set("tran_count", $this->lang->line('count'));
        $this->set("tran_select_product", $this->lang->line('select_product'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_epins", $this->lang->line('epins'));
        $this->set("tran_You_must_select_a_date", $this->lang->line('You_must_select_a_date'));
        $this->set("tran_past_expiry_date", $this->lang->line('past_expiry_date'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_your_account_have_no_active_epin", $this->lang->line('your_account_have_no_active_epin'));
        $this->set("tran_add_epin", $this->lang->line('add_epin'));
        $this->set("tran_you_must_select_a_product_name", $this->lang->line('you_must_select_a_product_name'));
        $this->set("tran_you_must_enter_count", $this->lang->line('you_must_enter_count'));
        $this->set("tran_enter_digits_only", $this->lang->line('enter_digits_only'));
        $this->set("tran_enter_a_valid_count", $this->lang->line('enter_a_valid_count'));
        $this->set("tran_digits_only", $this->lang->line('digits_only'));
        $this->set("tran_select_one_of_these_products", $this->lang->line('select_one_of_these_products'));
        $this->set("tran_no_of_epin_generated", $this->lang->line('no_of_epin_generated'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_delete_all_epin", $this->lang->line('delete_all_epin'));



        $this->set("page_top_header", $this->lang->line('epin_management'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('epin_management'));
        $this->set("page_small_header", "");
        $this->set("pin_numbers_search", "");
        $this->set("count", "");
        $this->set("count1", "");
        $this->set("keyword", "");
        $help_link = "e-pin-management";
        $this->set("help_link", $help_link);

        ////////////////////////////////////////////////////////////////////////////////////
        /*         * ********************************Add new Epin Start******************************* */
        $base_url = base_url() . "admin/epin/epin_management";
        $config['base_url'] = $base_url;
        $config['per_page'] = 200;

        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;
        $this->set("page", $page);
        //echo "hii";die();
        $pin_details = $this->epin_model->pinSelector($page, $config['per_page'], "delete", "");

        if ($product_status == "yes") {
            $options = $this->epin_model->setProduct('yes');
            $this->set("options", $options);
        }
        $config['total_rows'] = $pin_details["numrows"];
        $this->pagination->initialize($config);
        $pin_numbers = $pin_details["pin_numbers"];

        $flag = 0;
        $flag1 = 0;

        $this->set("flag1", $flag1);
        $this->set("flag", $flag);
        $this->set("pin_numbers", $pin_numbers);
        $result_per_page = $this->pagination->create_links();

        $this->set("result_per_page", $result_per_page);
        $this->set("product_status", $product_status);

        if ($this->input->post('addpasscode')) {

            if (!$this->input->post('amount1')) {
                $msg = $this->lang->line('you_must_select_an_amount');
                $this->redirect($msg, "epin/epin_management", FALSE);
            }
            if (!$this->input->post('count')) {
                $msg = $this->lang->line('you_must_enter_count');
                $this->redirect($msg, "epin/epin_management", FALSE);
            }
            if (!$this->input->post('date')) {
                $msg = $this->lang->line('You_must_select_a_date');
                $this->redirect($msg, "epin/epin_management", FALSE);
            }

            $tab1 = " active";
            $tab2 = "";

            $product_id = "";
            if ($product_status == "yes") {

                $product_id = 1;
            }
            $uploded_date = date('Y-m-d H:i:s');
            $pin_alloc_date = date('Y-m-d H:i:s');

            $status = 'yes';
            $cnt = $this->input->post('count');
            $pin_amount = $this->input->post('amount1');
            $expiry_date = $this->input->post('date');
            $max_pincount = $this->epin_model->getMaxPinCount();

            $rec = $this->epin_model->getAllActivePinspage();
            if ($rec < $max_pincount) {
                $errorcount = $max_pincount - $rec;
                if ($cnt <= $errorcount) {
                    $res = $this->epin_model->generatePasscode($cnt, $status, $uploded_date, $pin_amount, $expiry_date, $pin_alloc_date);

                    if ($res) {
                        $this->set("tab1", $tab1);
                        $this->set("tab2", $tab2);
                        $login_id = $this->LOG_USER_ID;
                        $user_type = $this->LOG_USER_TYPE;
                        if ($user_type == 'employee') {

                            $login_id = $this->val->getAdminId();
                        }
                        $this->val->insertUserActivity($login_id, 'epin added', $login_id);
                        $msg = $this->lang->line('epin_added_successfully');
                        $this->redirect($msg, "epin/epin_management", TRUE);
                    } else {
                        $msg = $this->lang->line('error_on_adding_epin');
                        $this->redirect($msg, "epin/epin_management", FALSE);
                    }
                } else {
                    $msg1 = $this->lang->line('you_are_permitted_to_add');
                    $msg2 = $this->lang->line('epin_only');
                    $this->redirect($msg1 . $errorcount . $msg2, "epin/epin_management", FALSE);
                }
            } else {
                $msg1 = $this->lang->line('already');
                $msg2 = $this->lang->line('epin_present');
                $this->redirect($msg1 . $rec . $msg2, "epin/epin_management", FALSE);
            }
        }
        /*         * *******************************Add new Epin End******************************* */
        /*         * *********************************Delete Epin Start***************************** */
        $this->set("tran_delete_epin", $this->lang->line('delete_epin'));

        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_no_product_found", $this->lang->line('no_product_found'));
        $this->set("tran_sure_you_want_to_delete_this_passcode_there_is_no_undo", $this->lang->line('sure_you_want_to_delete_this_passcode_there_is_no_undo'));
        /*         * ********************************Delete Epin End***************************** */
        /*         * *****************************Inactive Epin Start******************************* */
        $this->set("tran_sure_you_want_to_activate_this_passcode_there_is_no_undo", $this->lang->line('sure_you_want_to_activate_this_passcode_there_is_no_undo'));
        $this->set("tran_inactive_epin", $this->lang->line('inactive_epin'));
        /*         * *****************************Inactive Epin End******************************* */

        /*         * *******************Active Epin Start ***************************** */
        $this->set("tran_active_epin", $this->lang->line('active_epin'));
        $this->set("tran_view_epin", $this->lang->line('view_epin'));

        $pin_status = "";
        $product_id = "";
        if ($this->input->post('viewproductpin')) {
            $product_id = $this->input->post("product");
        }
        if ($this->input->post('view_pin')) {
            $pin_status = $this->input->post('pin_status');
            if ($pin_status == 'active') {
                $pin_details = $this->epin_model->pinSelector($page, $config['per_page'], "active", $product_id);
                $pin_numbers = array();
                $pin_numbers = $pin_details["pin_numbers"];
                // print_r($pin_numbers);die();
                $this->set("pin_numbers", $pin_numbers);
            } else {
                $pin_details = $this->epin_model->pinSelector($page, $config['per_page'], "inactive", "");
                $pin_numbers = array();
                $pin_numbers = $pin_details["pin_numbers"];
                $this->set("pin_numbers", $pin_numbers);
            }
        }
        $this->set("status", $pin_status);

        /*         * *****************Search Epin Start****************************************** */

        $pin_numbers_search = array();
//       $this->set("pin_numbers_search","");
        if ($this->input->post('search_pin')) {

            $flag = 1;
            $tab1 = "";
            $tab2 = " active";
            //$this->session->set_userdata('keyword', $this->input->post('keyword'));
            //$this->session->unset_userdata('keyword1');
            $pin_number = $this->input->post('keyword');

            //$pin_details_search = $this->epin_model->pinSelector($page, $config['per_page'], "search", "", $keyword);

            $details = $this->epin_model->getPinDetails($pin_number);
            //$pin_numbers_search = $pin_details_search["pin_numbers"];
            if (count($details) == 0) {
                $msg = $this->lang->line('no_epin_found');
                $this->redirect($msg, "epin/epin_management", FALSE);
            }
            $this->set("count", count($details));
            $this->set("details", $details);
            $this->set("flag", $flag);
            //$this->set("keyword", $keyword);
//            $this->redirect("", "epin/epin_management#panel_tab4_example2", TRUE);
        }


        /* $pin_details_search = $this->epin_model->pinSelector($page, $config['per_page'], "search", "");
          $pin_numbers_search = $pin_details_search["pin_numbers"]; */

        //if ($product_status == "yes") {
        if ($this->input->post('search_pin_pro')) {
            $flag1 = 1;
            $tab1 = "";
            $tab2 = " active";
            $amount = $this->input->post('amount');
            //$keyword1 = $this->input->post('product');
            //$pin_details_search = $this->epin_model->pinSelector($page, $config['per_page'], "search", "", "", $keyword1);
            //$pin_numbers_search = $pin_details_search["pin_numbers"];
            // print_r($pin_numbers_search);
            $details = $this->epin_model->getPinSearch($amount);
            $count1 = count($details);
            $this->set("count1", $count1);
            $this->set("details", $details);
            $this->set("flag1", $flag1);
        }
        //}
//       $this->set("pin_numbers_search","");
        $this->set("tran_active", $this->lang->line('active'));
        $this->set("tran_inactive", $this->lang->line('inactive'));
        $this->set("tran_search_epin", $this->lang->line('search_epin'));
        $this->set("tran_title", $this->lang->line('title'));
        $this->set("tran_search_pin", $this->lang->line('search_pin'));
        $this->set("tran_used_date", $this->lang->line('used_date'));
        $this->set("tran_product_name", $this->lang->line('product_name'));
        $this->set("tran_count", $this->lang->line('count'));
        $this->set("tran_select_product", $this->lang->line('select_product'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_epin", $this->lang->line('epin'));
        $this->set("tran_no_pin_found", $this->lang->line('no_pin_found'));
        $this->set("tran_search_epin_with_product", $this->lang->line('search_epin_with_product'));
        $this->set("tran_plan_product", $this->lang->line('plan_product'));
        $this->set("tran_search_pin_numbers", $this->lang->line('search_pin_numbers'));
        $this->set("tran_select", $this->lang->line('select'));
        $this->set("tran_select_one_of_these_products", $this->lang->line('select_one_of_these_products'));
        $this->set("tran_please_enter_any_keyword_like_pin_number_or_pin_id", $this->lang->line('please_enter_any_keyword_like_pin_number_or_pin_id'));
        $this->set("tran_please_select_one_product", $this->lang->line('please_select_one_product'));

        /*         * *************************************search ends ************************************* */
        $this->set("tab1", $tab1);
        $this->set("tab2", $tab2);

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

//FUNCTION ENDS [ function active_inactive_pin_count() ]
    public function add_new_epin_amount() {
        $title = $this->lang->line('add_new_epin_amount');
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

        $this->ARR_SCRIPT[11]["name"] = "validate_feed.js";
        $this->ARR_SCRIPT[11]["type"] = "js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

       

        $this->setScripts();

        $this->set("tran_epin_amount", $this->lang->line('epin_amount'));
        $this->set("tran_add", $this->lang->line('add'));
        $this->set("tran_delete", $this->lang->line('delete'));
        $this->set("tran_add_new_epin_amount", $this->lang->line('add_new_epin_amount'));
         $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_no", $this->lang->line('no'));
         $this->set("tran_amount", $this->lang->line('amount'));
         $this->set("tran_there_is_no_epint", $this->lang->line('there_is_no_epin'));
         



        $this->form_validation->set_rules('pin_amount', 'Amount', 'required|integer');

        if ($this->input->post('add_amount')) {
            if ($this->form_validation->run()) {
                $check = $this->epin_model->check_pin_amount($this->input->post('pin_amount'));
                if ($check) {
                    $msg = $this->lang->line('epin_amount_allready_available');
                    $this->redirect($msg, "epin/add_new_epin_amount", false);
                } else {
                    $res = $this->epin_model->addPinAmount($this->input->post('pin_amount'));
                    if ($res == true) {
                        $msg = $this->lang->line('pin_amount_added_sucess');
                        $this->redirect($msg, "epin/add_new_epin_amount", true);
                    } else {
                        $msg = $this->lang->line('unable_to_add_pin_amount');
                        $this->redirect($msg, "epin/add_new_epin_amount", false);
                    }
                }
            }
        }

        if ($this->input->post('delete_amount')) {

            $res = $this->epin_model->deletePinAmount($this->input->post('pin_id'));
            if ($res) {
                $msg = $this->lang->line('pin_amount_deleted_sucess');
                $this->redirect($msg, "epin/add_new_epin_amount", true);
            } else {
                $msg = $this->lang->line('unable_to_delete_pin_amount');
                $this->redirect($msg, "epin/add_new_epin_amount", false);
            }
        }


        $pin_amounts =$this->epin_model->getAllEwalletAmounts();
        $this->set("pin_amounts", $pin_amounts);

       

        $this->set("page_top_header", $this->lang->line('add_new_epin_amount'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('add_new_epin_amount'));
        $this->set("page_small_header", "");
        $this->set("pin_numbers_search", "");
        $help_link = "e-pin-management";
        $this->set("help_link", $help_link);

        $this->setView();
    }

}

?>