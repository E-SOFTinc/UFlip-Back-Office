<?php

require_once 'Inf_Controller.php';

class Product extends Inf_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('register_model');
        $this->load->model('profile_model');
        $this->load->model('ewallet_model');
        $this->load->model('validation');
        $this->load->model('validation');
    }

    function product_repurchase() {

        $msg = $this->lang->line('product_repurchase');
        $this->set('title', $this->COMPANY_NAME . " | $msg");

        $this->ARR_SCRIPT[0]["name"] = "product_repurchase.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->setScripts();
        $user_id = $this->LOG_USER_ID;
        $u_name = $this->LOG_USER_NAME;
        $products = $this->register_model->viewProducts();
        $this->set("products", $products);
        $module_status = $this->MODULE_STATUS;
        $rank_status = $module_status['rank_status'];

        $tab1 = " active";
        $tab2 = "";
        $tab3 = "";

        if ($this->input->post('purchase')) {

            $tab3 = $tab2 = "";
            $tab1 = " active";
            $this->session->set_userdata("prof_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2, "tab3" => $tab3));

            $this->form_validation->set_rules('product_id', 'Product Name', 'trim|required|numeric');
            $this->form_validation->set_rules('product_count', 'Prodcut Count', 'required|numeric|is_natural_no_zero');
            $val = $this->form_validation->run();
            if (!$val) {
                $msg = validation_errors();
                $this->redirect($msg, "product/product_repurchase", FALSE);
            } else {
                $user_id = $this->LOG_USER_ID;
                $count = $this->input->post('product_count');
                $balance_amount = $this->ewallet_model->getBalanceAmount($user_id);

                $product_id = $this->input->post('product_id');
                $product_amount = $this->validation->getPrdocutAmount($product_id);
                $father_id = $this->validation->getFatherId($user_id);
                $position = $this->validation->getPosition($user_id);



                $this->exact_repurchase();
                die();

                $res = $this->product_model->calculateRepurchase($user_id, $father_id, $product_id, $position, $count);
                $res_sales = $this->register_model->insertIntoSalesOrder($user_id, $product_id, 'free_payment', $count);
                if ($res) {
                    $msg = $this->lang->line('product_repurchase_success');
                    $this->redirect($msg, "product/product_repurchase", TRUE);
                } else {
                    $msg = $this->lang->line('product_repurchase_failed');
                    $this->redirect($msg, "product/product_repurchase", FALSE);
                }
            }
        }
        $product_status = $this->MODULE_STATUS['product_status'];
        $lang_id = $this->LANG_ID;
        $profile_arr = $this->profile_model->getProfileDetails($user_id, $u_name, $product_status, $lang_id);
        $details = $profile_arr['details']['detail1'];

        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_product_amount", $this->lang->line('product_amount'));
        $this->set("tran_purchase", $this->lang->line('purchase'));

        $this->set("tran_ewallet", $this->lang->line('ewallet'));
        $this->set("tran_beekash", $this->lang->line('beekash'));
        $this->set("tran_money", $this->lang->line('money'));
        $this->set("tran_credit_card_number", $this->lang->line('credit_card_number'));
        $this->set("tran_CCV", $this->lang->line('CCV'));
        $this->set("tran_expiry_date", $this->lang->line('expiry_date'));
        $this->set("tran_date_of_birth", $this->lang->line('date_of_birth'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_product_count", $this->lang->line('product_count'));
        $this->set("tran_phone", $this->lang->line('phone'));
        $this->set("tran_zip_code", $this->lang->line('zip_code'));
        $this->set("tran_city", $this->lang->line('city'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_country", $this->lang->line('country'));
        $this->set("tran_remarks", $this->lang->line('remarks'));
        $this->set("tran_purchase", $this->lang->line('purchase'));
        $this->set("tran_choose_payment_option", $this->lang->line('choose_payment_option'));




        $this->set("tran_kb", $this->lang->line('kb'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('product_repurchase'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('product_repurchase'));
        $this->set("page_small_header", "");
        $this->set("tran_product_purchase", $this->lang->line('product_repurchase'));
        $this->set("user_type", $this->LOG_USER_TYPE);

        $this->set("tran_name", $this->lang->line('name'));

        $help_link = "product-purchase";
        $this->set("help_link", $help_link);

        if ($this->session->userdata("prof_tab_active_arr")) {
            $tab1 = $this->session->userdata['prof_tab_active_arr']['tab1'];
            $tab2 = $this->session->userdata['prof_tab_active_arr']['tab2'];
            $tab3 = $this->session->userdata['prof_tab_active_arr']['tab3'];
            $this->session->unset_userdata("prof_tab_active_arr");
        }
        $this->set("tab1", $tab1);
        $this->set("tab2", $tab2);
        $this->set("tab3", $tab3);


        $this->setView();
    }

    public function exact_repurchase() {


        $user_id = $this->LOG_USER_ID;

        $user_language = $this->product_model->getUserLanguage($user_id);

        $count = $this->input->post('product_count');

        $balance_amount = $this->ewallet_model->getBalanceAmount($user_id);

        $product_id = $this->input->post('product_id');

        $product_amount = $this->validation->getPrdocutAmount($product_id);
        $product_amount = $product_amount * $count;

        $father_id = $this->validation->getFatherId($user_id);

        $position = $this->validation->getPosition($user_id);



        $time_stamp = $_SERVER['REQUEST_TIME'];

        if ($user_language == 'en') {
            $login = 'WSP-E-SOF-&lphygAPTA';
            $secret_code = "$login^12345^" . $time_stamp . "^" . $product_amount . "^";
            $hash = $this->hmac("p~Qa3TkgFcRyZvbizV~g", $secret_code);
        } else if ($user_language == 'fr') {
            $login = 'WSP-E-SOF-yRxCowAPTQ';
            $secret_code = "$login^12345^" . $time_stamp . "^" . $product_amount . "^";
            $hash = $this->hmac("d9Nwm6oR8f6qJ3towQuU", $secret_code);
        }

        $click_here = $this->lang->line('click_here');
        $redirect_msg = $this->lang->line('checkout_redirect_message');


        $html = '';
        $html .= '<script type="text/javascript">
            window.onload = function () {
            //document.payment_form.paymentsubmit.hide();
        	document.payment_form.paymentsubmit.click();
            }
        	</script><form name="payment_form" action="https://checkout.e-xact.com/payment" method="post"> ';

        $html .= $redirect_msg;

        $html .= '<input name="x_login" value="' . $login . '" type="hidden"> 
  		<input name="x_amount" value="' . $product_amount . '" type="hidden"> 
  		<input name="x_fp_sequence" value="12345" type="hidden"> 
  		<input name="x_fp_timestamp" value="' . $time_stamp . '" type="hidden">
  		<input name="x_fp_hash" value="' . $hash . '" type="hidden">
  		<input name="user_id" value="' . $user_id . '" type="hidden"> 
  		<input name="count" value="' . $count . '" type="hidden">
  		<input name="balance_amount" value="' . $balance_amount . '" type="hidden">
  		<input name="product_id" value="' . $product_id . '" type="hidden">
  		<input name="father_id" value="' . $father_id . '" type="hidden">
  		<input name="position" value="' . $position . '" type="hidden">
  		<input name="x_show_form" value="PAYMENT_FORM" type="hidden"> ';

        $html .= '<input value="' . $click_here . '" name="paymentsubmit" id="paymentsubmit" type="submit">
  		<!--<input name="x_line_item" value="101999 Cabernet Sauvignon, 0.7 l <|>1<|>".$amount."<|>YES" type="hidden">-->
 
		</form>';



        echo $html;
    }

    public function exact_repurchase_response() {

        $response_data = $this->input->post();
        $this->register_model->insertExactHistory($response_data);
        if ($response_data['Transaction_Approved'] == 'YES') {

            $res = $this->product_model->calculateRepurchase($response_data['user_id'], $response_data['father_id'], $response_data['product_id'], $response_data['position'], $response_data['count']);

            $res_sales = $this->register_model->insertIntoSalesOrder($response_data['user_id'], $response_data['product_id'], 'E-xact', $response_data['count']);

            if ($res) {
                $msg = $this->lang->line('product_repurchase_success');
                $this->redirect($msg, "product/product_repurchase", TRUE);
            } else {
                $msg = $this->lang->line('product_repurchase_failed');
                $this->redirect($msg, "product/product_repurchase", FALSE);
            }
        }
    }

    public function exact_repurchase_receipt() {
        $transaction_id = $this->input->post('x_trans_id');
        $trans_status = $this->product_model->getTransStatus($transaction_id);
        if ($trans_status == 'YES') {
            $msg = $this->lang->line('product_purchased_successfully');
            $this->redirect($msg, "product/product_repurchase", TRUE);
        }else{
            $msg = $this->lang->line('product_repurchase_failed');
            $this->redirect($msg, "product/product_repurchase", FALSE);
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
