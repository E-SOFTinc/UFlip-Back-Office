<?php

require_once 'Inf_Controller.php';

class Epin extends Inf_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('validation');
        $this->val = new Validation();
    }

    function request_epin() {

        $title = $this->lang->line('request_e_pin');
        $this->set("title", $this->COMPANY_NAME . " | $title ");

        $this->ARR_SCRIPT[0]["name"] = "validation_pin_request.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $pro_status = $this->MODULE_STATUS['product_status'];

        ////////////////////////// for language translation  ///////////////////////////////
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_expiry_date", $this->lang->line('expiry_date'));
        $this->set("tran_request_epin", $this->lang->line('request_epin'));
        $this->set("tran_product_name", $this->lang->line('product_name'));
        $this->set("tran_select_product", $this->lang->line('select_product'));
        $this->set("tran_select_amount", $this->lang->line('select_amount'));
        $this->set("tran_you_must_select_an_amount", $this->lang->line('you_must_select_an_amount'));
        $this->set("tran_count", $this->lang->line('count'));
        $this->set("tran_no_of_epin_generated", $this->lang->line('no_of_epin_generated'));
        $this->set("tran_you_must_select_a_product_name", $this->lang->line('you_must_select_a_product_name'));
        $this->set("tran_you_must_enter_count", $this->lang->line('you_must_enter_count'));
        $this->set("tran_enter_digits_only", $this->lang->line('enter_digits_only'));
        $success = $this->lang->line('pin_request_send_successfully');
        $error = $this->lang->line('error_on_pin_request');
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('request_epin'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('request_epin'));
        $this->set("page_small_header", "");

        $help_link = "request-epin";
        $this->set("help_link", $help_link);
        $amount_details = $this->epin_model->getAllEwalletAmounts();
        $this->set("amount_details", $amount_details);


//        
        /////////////////////////////////////////////////////////////////////////////////////
        if ($this->input->post('reqpasscode')) {

            if ($this->input->post('amount1') == "") {

                $msg = $this->lang->line('you_must_select_an_amount');
                $this->redirect($msg, "epin/request_epin", FALSE);
            } else if ($this->input->post('count') == "") {
                $msg1 = $this->lang->line('you_must_enter_count');
                $this->redirect($msg1, "epin/request_epin", FALSE);
            } else {
                $request_date = date('Y-m-d H:i:s');
                $post_arr = $this->validation->stripTagsPostArray($this->input->post());
                $cnt = $post_arr['count'];
                $pin_amount = $this->input->post('amount1');
                $expiry_date = date('Y-m-d', strtotime('+6 months'));  //pin valid for 6 months
                //$cnt = $this->input->post('count');
                $req_user = $this->LOG_USER_ID;


                $res = $this->epin_model->insertPinRequest($req_user, $cnt, $request_date, $expiry_date, $pin_amount);

                if ($res) {
                    $loggin_id = $this->LOG_USER_ID;
                    $this->val->insertUserActivity('12345', 'request e-pin', $loggin_id);
                    $this->redirect($success, "epin/request_epin", TRUE);
                } else {
                    $this->redirect($error, "epin/request_epin", FALSE);
                }
            }
        }
        if ($pro_status == "yes") {
            $produc_details = $this->epin_model->getAllProducts('yes');
            $this->set("produc_details", $produc_details);
        }

        $this->set("pro_status", $pro_status);

        $this->setScripts();
        $this->setView();
    }

    public function my_epin($page = "", $limit = "") {

        $pro_status = $this->MODULE_STATUS['product_status'];

        ////////////////////////// for language translation  ///////////////////////////////
        $this->set("tran_epins", $this->lang->line('epins'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_product_id", $this->lang->line('product_id'));
        $this->set("tran_used_user", $this->lang->line('used_user'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_uploaded_date", $this->lang->line('uploaded_date'));
        $this->set("tran_no_epin_found", $this->lang->line('no_epin_found'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_expiry_date", $this->lang->line('expiry_date'));
        $this->set("tran_expired", $this->lang->line('expired'));
        $this->set("tran_active", $this->lang->line('active'));
        $this->set("tran_blocked", $this->lang->line('blocked'));
        $this->set("tran_used", $this->lang->line('used'));
        $this->set("tran_no_epin_found", $this->lang->line('no_epin_found'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_balance_amount", $this->lang->line('balance_amount'));

        $this->set("page_top_header", $this->lang->line('my_e_pin'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('my_e_pin'));
        $this->set("page_small_header", "");

        $help_link = "view-my-pin";
        $this->set("help_link", $help_link);
        /////////////////////////////////////////////////////////////////////////////////////
        if ($this->input->post('addpasscode')) {
            $pin_amount = $obj_pin->getPinAmount();
            $balance_amount = $obj_ewallet->getBalanceAmountWithoutTds($this->LOG_USER_ID);
            $uploded_date = date('Y-m-d H:i:s');
            $status = 'yes';
            $cnt = $this->input->post('count');
            $generated_user = $this->session->userdata('user_id');
            $k = 0;
            for ($i = 0; $i < $cnt; $i++) {
                if ($balance_amount >= $pin_amount) {
                    $passcode = $obj_misc->getRandStr(9, 9);
                    $res_insert_pass = $obj_pin->insertPasscode($passcode, $status, $uploded_date, "", $generated_user, $generated_user);
                    $res_insert_EPin = $obj_pin->insertDebitEPinAmountToAmountPaid($this->session->userdata('user_id'), $pin_amount);
                    $balance_amount = $balance_amount - $pin_amount;
                    $k++;
                }
            }
            if ($res_insert_pass && $res_insert_EPin) {
                $msg = $this->lang->line('Epin_Generated_Successfully');
                $this->redirect("$k $msg", "epin/my_epin", TRUE);
            } else {
                $msg = $this->lang->line('you_have_no_balance_amount_to_generate_Epin');
                $this->redirect($msg, "epin/my_epin", FALSE);
            }
        }
        $title = $this->lang->line('my_e_pin');
        $this->set("title", $this->COMPANY_NAME . " | $title ");

       

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


        ///////////////////////////////////// pagination //////////////////////////////////////
        //$pin_count = $this->epin_model->paging($page, "", "generate", "");
        // echo count($pin_count["pin_numbers"]);
        $pin_count = $this->epin_model->getUserFreePinCount();
        $config['total_rows'] = $pin_count; //count($pin_count["pin_numbers"]);

        $base_url = base_url() . "user/epin/my_epin";

        $config['base_url'] = $base_url;

        $config['per_page'] = 200;
        $config['uri_segment'] = 4;

        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;


        $pin_details = $this->epin_model->pinSelector($page, $config['per_page'], "generate", "");
        //print_r($pin_details);
        $this->pagination->initialize($config);
        $page_footer = $this->pagination->create_links();
        $pin_numbers = $pin_details["pin_numbers"];
        $this->set("pin_numbers", $pin_numbers);


        //////////////////////////////////////////////////////////////////////////////////
        /*  if (!($limit)) {
          $limit = 25;
          } // Default results per-page.
          if (!($page)) {
          $page = 0;
          } // Default page value.


          $pag_arr = $this->epin_model->paging($page, $limit, "generate");

          $page_footer = $this->epin_model->setFooter($page, $limit, $this->CURRENT_URL); */

        $this->set("page_footer", $page_footer);
        $this->set("pro_status", $pro_status);

        $this->setScripts();
        $this->setView();
    }

}

?>
