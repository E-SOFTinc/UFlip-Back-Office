<?php

require_once 'Inf_Controller.php';

class Product extends Inf_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('validation');
        $this->val = new Validation();
        
    }

    function product_management($action = '', $edit_id = '') {

        /////////////////////  CODE ADDED BY JIJI  //////////////////////////

        $msg = $this->lang->line('10_product/product_management');
        $this->set('title', $this->COMPANY_NAME . " | $msg");

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

        $this->ARR_SCRIPT[11]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.css";
        $this->ARR_SCRIPT[11]["type"] = "plugins/css";
        $this->ARR_SCRIPT[11]["loc"] = "header";

        $this->ARR_SCRIPT[12]["name"] = "bootstrap-social-buttons/social-buttons-3.css";
        $this->ARR_SCRIPT[12]["type"] = "plugins/css";
        $this->ARR_SCRIPT[12]["loc"] = "header";

        $this->ARR_SCRIPT[13]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.js";
        $this->ARR_SCRIPT[13]["type"] = "plugins/js";
        $this->ARR_SCRIPT[13]["loc"] = "footer";

        $this->ARR_SCRIPT[14]["name"] = "jquery.pulsate/jquery.pulsate.min.js";
        $this->ARR_SCRIPT[14]["type"] = "plugins/js";
        $this->ARR_SCRIPT[14]["loc"] = "footer";

        $this->ARR_SCRIPT[15]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[15]["type"] = "css";
        $this->ARR_SCRIPT[15]["loc"] = "header";

        $this->ARR_SCRIPT[16]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[16]["type"] = "js";
        $this->ARR_SCRIPT[16]["loc"] = "footer";

        $this->ARR_SCRIPT[17]["name"] = "validate_product.js";
        $this->ARR_SCRIPT[17]["type"] = "js";
        $this->ARR_SCRIPT[17]["loc"] = "footer";

        $this->setScripts();

        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY JIJI    *********** *              */

        ////////////////////FOR PRODUCT_TAB
        $this->set("tran_add_product_title", $this->lang->line('10_product/product_management'));
        $this->set("tran_add_product", $this->lang->line('add_product'));
        $this->set("tran_add_product_image", $this->lang->line('add_product_image'));
        ///////////////////////////////////////////////////////////////////////////

        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_name_of_the_product", $this->lang->line('name_of_the_product'));
        $this->set("tran_manage_product", $this->lang->line('manage_product'));
        $this->set("tran_product_amount", $this->lang->line('product_amount'));
        $this->set("tran_product", $this->lang->line('product'));
        $this->set("tran_product_id", $this->lang->line('product_id'));
        $this->set("tran_pair_value", $this->lang->line('pair_value'));
        $this->set("tran_product_status", $this->lang->line('product_status'));
        $this->set("tran_product_name", $this->lang->line('product_name'));
        $this->set("tran_product_available", $this->lang->line('product_available'));
        $this->set("tran_product_pair_value", $this->lang->line('product_pair_value'));
        $this->set("tran_active_product", $this->lang->line('active_product'));
        $this->set("tran_inactive_product", $this->lang->line('inactive_product'));
        $this->set("tran_refine", $this->lang->line('refine'));
        $this->set("tran_no_product_found", $this->lang->line('no_product_found'));
        $this->set("tran_active", $this->lang->line('active'));
        $this->set("tran_inactive", $this->lang->line('inactive'));
        $this->set("tran_Name_of_the_Product_eg", $this->lang->line('Name_of_the_Product_eg'));
        $this->set("tran_Product_identification_code_eg", $this->lang->line('Product_identification_code_eg'));
        $this->set("tran_Actual_amount_of_the_product", $this->lang->line('Actual_amount_of_the_product'));
        $this->set("tran_This_is_the_amount_to_be_taken_for_the_product", $this->lang->line('This_is_the_amount_to_be_taken_for_the_product'));
        $this->set("tran_digits_only", $this->lang->line('digits_only'));
        $this->set("tran_you_must_enter_your_product_name", $this->lang->line('you_must_enter_your_product_name'));
        $this->set("tran_you_must_enter_your_product_identifying_number", $this->lang->line('you_must_enter_your_product_identifying_number'));
        $this->set("tran_you_must_enter_your_product_amount", $this->lang->line('you_must_enter_your_product_amount'));
        $this->set("tran_you_must_enter_your_product_pair_value", $this->lang->line('you_must_enter_your_product_pair_value'));
        $this->set("tran_enter_digits_only", $this->lang->line('enter_digits_only'));
        $this->set("tran_Sure_you_want_to_edit_this_Product_There_is_NO_undo", $this->lang->line('Sure_you_want_to_edit_this_Product_There_is_NO_undo'));
        $this->set("tran_Sure_you_want_to_Activate_this_Product_There_is_NO_undo", $this->lang->line('Sure_you_want_to_Activate_this_Product_There_is_NO_undo'));
        $this->set("tran_Sure_you_want_to_inactivate_this_Product_There_is_NO_undo", $this->lang->line('Sure_you_want_to_inactivate_this_Product_There_is_NO_undo'));
        $this->set("tran_you_must_select_a_product_name", $this->lang->line('you_must_select_a_product_name'));
        $this->set("tran_you_must_select_a_product_image", $this->lang->line('you_must_select_a_product_image'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_update_Product", $this->lang->line('update_Product'));
        $this->set("tran_Allowed_types_are_gif_jpg_png_jpeg_JPG", $this->lang->line('Allowed_types_are_gif_jpg_png_jpeg_JPG'));
        $this->set("tran_kb", $this->lang->line('kb'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('product_management'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('product_management'));
        $this->set("page_small_header", "");
        $this->set("tran_product_management", $this->lang->line('product_management'));
        $this->set("tran_nofond", $this->lang->line('nofond'));
        $this->set("tran_showing", $this->lang->line('showing'));
        $this->set("tran_to", $this->lang->line('to'));
        $this->set("tran_of", $this->lang->line('of'));
        $this->set("tran_entries", $this->lang->line('entries'));
        $this->set("tran_notavailable", $this->lang->line('notavailable'));
        $this->set("tran_yes", $this->lang->line('yes'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_Participation_bonus_status", $this->lang->line('Participation_bonus_status'));
        
        $help_link="product-management";
        $this->set("help_link", $help_link); 

        ////////////////////////////////////////////////////////////////////////////////////
        $tab1 = " active";
        $tab2 = "";
        $session_data = $this->session->userdata('logged_in');
        $this->set("paln_mlm",$this->MODULE_STATUS ['mlm_plan']);
        if ($this->input->post('refine')) {
            $pro_status = $this->input->post('pro_status');
            $this->session->set_userdata('pro_status',$pro_status);
           
        } else {
//            $pro_status="";
           $pro_status="yes";
           $this->session->set_userdata('pro_status',$pro_status);
        }
         $pro_status=$this->session->userdata('pro_status');
         /*         * *****pagination******** */
        $user=  $this->session->userdata('user');
        $base_url = base_url() . "admin/product/product_management";
        $config['base_url'] = $base_url;
        $config['per_page'] = 200;
        $tot_rows = $this->product_model->getAllProductsCount($pro_status);
       // echo $tot_rows;
        $config['total_rows'] = $tot_rows;
        $config["uri_segment"] = 4;

        $config['num_links'] = 5;
        

        $this->pagination->initialize($config);
        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;
        /***********************/
        
       
         $product_details = $this->product_model->getAllProducts($pro_status,$config['per_page'],$page);
            $this->set('product_details', $product_details);
            $this->set('sub_status', $pro_status);

        $this->set("tran_add_product_image", $this->lang->line('add_product_image'));
        ///////////////////////////////////////////////////////////////////////////

        $this->set("tran_select_product", $this->lang->line('select_product'));
        $this->set("tran_select_image", $this->lang->line('select_image'));
        $this->set("tran_upload", $this->lang->line('upload'));

        $this->set("tran_you_must_select_a_product_name", $this->lang->line('you_must_select_a_product_name'));
        $this->set("tran_you_must_select_a_product_image", $this->lang->line('you_must_select_a_product_image'));
        /////////////////////////////////////////////////////////////////////////////////////////////
         
        
        $product_image_details = $this->product_model->getAllProducts('yes');
        $this->set('product_image_details', $product_image_details);
        $result_per_page=$this->pagination->create_links();
        $this->set('result_per_page',$result_per_page);

        if ($this->input->post('submit_prod')) {
            $tab1 = " active";
            $tab2 = "";
            $this->session->set_userdata("prod_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2));
            $redirect_msg = "";
            //---------------------------------------------------
            if ($this->input->post('prod_name') != "") {
                $prod_name = mysql_real_escape_string($this->input->post('prod_name'));
            } else {
                $redirect_msg = $this->lang->line('you_must_enter_your_product_name');
                $this->redirect($redirect_msg, "product/product_management", FALSE);
            }
            if ($this->input->post('product_id') != "") {

                $product_id = mysql_real_escape_string($this->input->post('product_id'));
            } else {
                $redirect_msg = $this->lang->line('you_must_enter_your_product_identifying_number');
                $this->redirect($redirect_msg, "product/product_management", FALSE);
            }
            if ($this->input->post('product_amount') != "") {
                $product_amount = mysql_real_escape_string($this->input->post('product_amount'));
            } else {
                $redirect_msg = $this->lang->line('you_must_enter_your_product_amount');
                $this->redirect($redirect_msg, "product/product_management", FALSE);
            }
            if ($this->MODULE_STATUS ['mlm_plan']!='Board')
            {
                if ($this->input->post('pair_value') != "") {
                $pair_value = mysql_real_escape_string($this->input->post('pair_value'));
            } else {
                $redirect_msg = $this->lang->line('you_must_enter_your_product_pair_value');
                $this->redirect($redirect_msg, "product/product_management", FALSE);
            }
            }
            else {$pair_value=0;}
         
            //---------------------------------------------------

            $bv_value = $this->input->post('bv_value');
            $bonus_status=$this->input->post('bonus_status');
            $result = $this->product_model->addProduct($prod_name, $product_id, $product_amount, $pair_value, $bv_value,$bonus_status);
            if ($result) {
                $login_id = $this->LOG_USER_ID;
                $this->val->insertUserActivity($login_id,'product added',$login_id);
                $redirect_msg = $this->lang->line('product_added_successfully');
                $this->redirect($redirect_msg, "product/product_management", TRUE);
            } else {
                $redirect_msg = $this->lang->line('error_on_adding_product');
                $this->redirect($redirect_msg, "product/product_management", FALSE);
            }
        }

        if ($this->input->post('update_prod')) {

            $prod_name = $this->input->post('prod_name');
            $product_id = $this->input->post('product_id');
            $product_amount = $this->input->post('product_amount');
            $prod_id = $this->input->post('prod_id');
            $pair_value = $this->input->post('pair_value');
            $bv_value = $this->input->post('bv_value');
            $bonus_status = $this->input->post('bonus_status');
            
            $result = $this->product_model->updateProduct($prod_id, $prod_name, $product_id, $product_amount, $pair_value, $bv_value,$bonus_status);
            $redirect_msg = "";
            if ($result) {
                $redirect_msg = $this->lang->line('product_updated_successfully');
                $this->redirect($redirect_msg, "product/product_management", TRUE);
            } else {
                $redirect_msg = $this->lang->line('error_on_updating_product');
                $this->redirect($redirect_msg, "product/product_management", FALSE);
            }
        }

        //edit product---------------


        if ($action == "edit") {

            $row = $this->product_model->editProduct($edit_id);
            $product_id = $row->product_id;
            $product_name = $row->product_name;
            $prod_id = $row->prod_id;
            $product_value = $row->product_value;
            $pair_value = $row->pair_value;
            $bv_value = $row->prod_bv;
            $bonus_status=$row->participation_bonus_status;

            $this->set('pr_id', $product_id);
            $this->set('pr_id_no', $prod_id);
            $this->set('pr_name', $product_name);
            $this->set('pr_value', $product_value);
            $this->set('action', $action);
            $this->set('pair_value', $pair_value);
            $this->set('bv_value', $bv_value);
            $this->set('participation_bonus_status', $bonus_status);
            $this->set('action_page', "../../edit_product");
        } else {
            $this->set('pr_id_no', "");
            $this->set('pr_name', "");
            $this->set('pr_id', "");
            $this->set('pr_value', "");
            $this->set('action', "");
            $this->set('pair_value', "");
            $this->set('bv_value', "");
            $this->set('participation_bonus_status', "");
            $this->set('action_page', "add_product");
        }

        if ($action == "delete") {
            $redirect_msg = "";
            $result = $this->product_model->deleteProduct($id);

            if ($result) {
                $redirect_msg = $this->lang->line('product_inactivated_successfully');
                $this->redirect($redirect_msg, "product/product_management", TRUE);
            } else {
                $redirect_msg = $this->lang->line('error_on_inactivating_product');
                $this->redirect($redirect_msg, "product/product_management", FALSE);
            }
        }
        
        
        if ($this->input->post('upload')) {
            $tab1 = "";
            $tab2 = " active";
            $this->session->set_userdata("prod_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2));
            $product_id = $this->input->post('product_id');
            $document1 = $_FILES['userfile']['name'];

            $config['upload_path'] = './public_html/images/product/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
            $config['max_size'] = '2000000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
              
                $redirect_msg=$this->lang->line('image_ratio')." " .$config['max_width'] ." * " . $config['max_height']. " ". $this->lang->line('pixels');
                $this->redirect($redirect_msg, "product/product_management", FALSE);
            } else {
                $data = array('upload_data' => $this->upload->data());

                $res = $this->product_model->InsertProductImage($product_id, $document1);
                if ($res) {
                   $login_id = $this->LOG_USER_ID;
                   $this->val->insertUserActivity($login_id,'product image added',$login_id);
                    $redirect_msg = $this->lang->line('image_added_successfully');
                    $this->redirect($redirect_msg, "product/product_management", TRUE);
                } else {
                    $redirect_msg = $this->lang->line('image_cannot_be_uploaded');
                    $this->redirect($redirect_msg, "product/product_management", FALSE);
                }
            }
        }
        if ($this->session->userdata("prod_tab_active_arr")) {
            $tab1 = $this->session->userdata['prod_tab_active_arr']['tab1'];
            $tab2 = $this->session->userdata['prod_tab_active_arr']['tab2'];
            $this->session->unset_userdata("prod_tab_active_arr");
        }
        $this->set("tab1", $tab1);
        $this->set("tab2", $tab2);

        $this->setView();
    }

//    function add_product() {
//
//        if ($this->input->post('submit_prod')) {
//            $redirect_msg = "";
//            $prod_name = $this->input->post('prod_name');
//            $product_id = $this->input->post('product_id');
//            $product_amount = $this->input->post('product_amount');
//            $product_value = $this->input->post('product_value');
//            $result = $this->product_model->addProduct($prod_name, $product_id, $product_amount, $product_value);
//            if ($result) {
//                $redirect_msg = $this->lang->line('product_added_successfully');
//                $this->redirect($redirect_msg, "product/product_management", TRUE);
//            } else {
//                $redirect_msg = $this->lang->line('error_on_adding_product');
//                $this->redirect($redirect_msg, "product/product_management", FALSE);
//            }
//        }
//
//    }
    function edit_product() {
        if ($this->input->post('update_prod')) {

            $prod_name = $this->input->post('prod_name');
            $product_id = $this->input->post('product_id');
            $product_amount = $this->input->post('product_amount');
            $product_value = $this->input->post('product_value');
            $prod_id = $this->input->post('prod_id');

            $result = $this->product_model->updateProduct($prod_id, $prod_name, $product_id, $product_amount, $product_value);
            $redirect_msg = "";
            if ($result) {
                $redirect_msg = $this->lang->line('product_updated_successfully');
                $this->redirect($redirect_msg, "product/product_management", TRUE);
            } else {
                $redirect_msg = $this->lang->line('error_on_updating_product');
                $this->redirect($redirect_msg, "product/product_management", FALSE);
            }
        }
    }

    function inactivate_product($action = '', $prod_id = '') {

        if ($action == "inactivate") {
            $redirect_msg = "";
            $result = $this->product_model->inactivateProduct($prod_id);

            if ($result) {
                $redirect_msg = $this->lang->line('product_inactivated_successfully');
                $this->redirect($redirect_msg, "product/product_management", TRUE);
            } else {
                $redirect_msg = $this->lang->line('error_on_inactivating_product');
                $this->redirect($redirect_msg, "product/product_management", FALSE);
            }
        }
    }

    function active_product($action = '', $activate_id = '') {

        if ($action == "activate") {
            $redirect_msg = "";
            $result = $this->product_model->activateProduct($activate_id);
            if ($result) {
                $redirect_msg = $this->lang->line('product_activated_successfully');
                $this->redirect($redirect_msg, "product/product_management", TRUE);
            } else {
                $redirect_msg = $this->lang->line('error_on_activating_product');
                $this->redirect($redirect_msg, "product/product_management", FALSE);
            }
        }
    }

    function add_product_image() {
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line(''));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line(''));
        $this->set("page_small_header", "");
        if ($this->input->post('upload')) {

            $product_id = $this->input->post('product_id');

            $config['upload_path'] = './public_html/images/product/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
            $config['max_size'] = '2000000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';

            $this->load->library('upload', $config);
            $redirect_msg = "";
            $error = "";
            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                $redirect_msg = $this->lang->line('image_ratio')." " .$config['max_width'] ." * " . $config['max_height']. " ". $this->lang->line('pixels');
                $this->redirect($redirect_msg, "product/product_management#tabs-2", FALSE);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $product_image = $data['upload_data']['file_name'];

                $res = $this->product_model->InsertProductImage($product_id, $product_image);
                if ($res) {
                    $redirect_msg = $this->lang->line('image_added_successfully');
                    $this->redirect($redirect_msg, "product/product_management#tabs-2", TRUE);
                } else {
                    $redirect_msg = $this->lang->line('image_cannot_be_uploaded');
                    $this->redirect($redirect_msg, "product/product_management#tabs-2", FALSE);
                }
            }
        }
    }

}

?>