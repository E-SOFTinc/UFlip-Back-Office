<?php

require_once 'Inf_Controller.php';

class Sponsor_tree extends Inf_Controller {
    
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->redirect("", "sponsor_tree_view");
    }

    
    function sponsor_tree_view($user_id = "") { 
        
        echo "user_id====>".$user_id;

        $this->sponsor_tree_model->intitailze();

         if ($user_id == "") {
            $user_id = $this->LOG_USER_ID;
            $id_encode = $this->encrypt->encode($user_id);
            $id_encode = str_replace("/", "_", $id_encode);
            $user_id = urlencode($id_encode);
        }
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

        $this->ARR_SCRIPT[4]["name"] = "validate_select_user.js";
        $this->ARR_SCRIPT[4]["type"] = "js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "style_tree.css";
        $this->ARR_SCRIPT[5]["type"] = "css";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "easyTooltip.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->setScripts();
        ////////////////////////// code for language translation  ///////////////////////////////

        $this->set("tran_paid", $this->lang->line('paid'));
        $this->set("tran_inactive", $this->lang->line('inactive'));
        $this->set("tran_vacant", $this->lang->line('vacant'));
        $this->set("tran_find_id", $this->lang->line('find_id'));
        $this->set("tran_tree_view", $this->lang->line('tree_view'));
        $this->set("tran_retail_subscriber", $this->lang->line('retail_subscriber'));
        $this->set("tran_brand_partner", $this->lang->line('brand_partner'));


         if ($this->input->post('go_submit')) {

            $post_arr =$this->input->post();


                $pass_user_id = $user_id;
                $go = $post_arr['go_id'];
                $go = $go . "_1";
                $go = $this->validation->userNameToID($go);
                if (!$go)
                    $go = $this->LOG_USER_ID;
                $child_id = $go;
                $user_id = $this->LOG_USER_ID;

                $id = $pass_user_id;
                //$go = $this->encrypt->encode($go);

                if ($user_id < $child_id) {
                    $status = $this->sponser_tree_model->userDownlineUser($child_id, $user_id);

                    if ($status == "yes") {
                        //$go = urlencode($go);
                        $id_encode = $this->encrypt->encode($go);
                        $id_encode = str_replace("/", "_", $id_encode);
                        $go = urlencode($id_encode);


                        redirect("admin/sponsor_tree/sponsor_tree_view/$go", 'refresh');
                    } else {
                        //$go = $this->encrypt->encode($user_id);
                        //$go = urlencode($go);

                        $id_encode = $this->encrypt->encode($user_id);
                        $id_encode = str_replace("/", "_", $id_encode);
                        $go = urlencode($id_encode);
                        redirect("admin/sponser_tree/sponser_tree/$go", 'refresh');
                    }
                } else {
                    //$go = $this->encrypt->encode($user_id);
                    //$go = urlencode($go);

                    $id_encode = $this->encrypt->encode($user_id);
                    $id_encode = str_replace("/", "_", $id_encode);
                    $go = urlencode($id_encode);
                    redirect("admin/sponsor_tree/sponsor_tree_view/$go", 'refresh');
                }
            
        }

        $id = urldecode($user_id);
        $id_decode = str_replace("_", "/", $id);
        $id_decrypt = $this->encrypt->decode($id_decode);
        if ($this->validation->isUserAvailable($user_id)) {

            $this->tree_model->intitailze();
            $user_details = $this->sponser_tree_model->getSponserDetails($id_decrypt); //print_r($user_details);
            $this->set('user_details', $user_details);
           $tooltip = $this->sponser_tree_model->getToolTip($user_details);

//print_r($tooltip);
            $this->set('tooltip', $tooltip);
            $title = $this->lang->line('tree_view');
            $this->set('title', "$title");
            $this->set('action_page', $this->CURRENT_URL . "/$go"); //To DO    

            $log_user_id = $this->LOG_USER_ID;


            $display = $this->sponser_tree_model->viewTree($user_id, $id_decrypt);

            $this->set('display_tree', $display);
            //print $display;

            //$this->setView();
        } else {
            echo "Invalid User Name...";
            die();
            // $this->redirect("Invalid User Name...", "tree/select_tree",false);
        }
    
        $this->set("tran_tree_views", $this->lang->line('tree_views'));
        $this->set("tran_select_user", $this->lang->line('select_user'));
        $this->set("tran_select_user_id", $this->lang->line('select_user_id'));
        $this->set("tran_type_members_name", $this->lang->line('type_members_name'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_sponsor_tree", $this->lang->line('sponsor_tree'));
        $this->set("tran_you_must_select_user", $this->lang->line('you_must_select_user'));
        $this->set("page_top_header", $this->lang->line('tree_view'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('sponsor_tree'));
        $this->set("page_small_header", "");

        $help_link = "sponsor-tree";
        $this->set("help_link", $help_link);
echo "11111111";
        $this->setView();
    }

}
