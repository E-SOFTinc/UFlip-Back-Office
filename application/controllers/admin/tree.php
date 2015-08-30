<?php

require_once 'Inf_Controller.php';

class Tree extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->redirect("", "tree_view");
    }

    public function genology_tree($user_id = "") {
        /*         * ********************************genology tree *********************** */
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_paid", $this->lang->line('active'));
        $this->set("tran_inactive", $this->lang->line('inactive'));
        $this->set("tran_vacant", $this->lang->line('vacant'));
        $this->set("tran_find_id", $this->lang->line('find_id'));
        $this->set("tran_tree_view", $this->lang->line('tree_view'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_you_must_select_user", $this->lang->line('you_must_select_user'));

        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */

        $user_type = $this->session->userdata['logged_in']['user_type'];
        if ($user_id == "") {
            $user_id = $this->LOG_USER_ID;
            if ($user_type == 'employee') {
                $user_id = $this->validation->getAdminId();
            }
            $id_encode = $this->encrypt->encode($user_id);
            $id_encode = str_replace("/", "_", $id_encode);
            $user_id = urlencode($id_encode);
        }
        $go = "";
        if ($this->input->post('go_submit')) {

            $pass_user_id = $user_id;
            $go = $this->input->post('go_id');
            $go = $this->validation->userNameToID($go);
            if (!$go)
                $go = $this->LOG_USER_ID;
            $child_id = $go;
            $user_id = $this->LOG_USER_ID;
            $id = $pass_user_id;
            //$go = $this->encrypt->encode($go);

            if ($user_id < $child_id) {
                $status = $this->tree_model->userDownlineUser($child_id, $user_id);
                if ($status == "yes") {
                    //$go = urlencode($go);
                    $id_encode = $this->encrypt->encode($go);
                    $id_encode = str_replace("/", "_", $id_encode);
                    $go = urlencode($id_encode);
                } else {
                    //$go = $this->encrypt->encode($user_id);
                    //$go = urlencode($go);

                    $id_encode = $this->encrypt->encode($user_id);
                    $id_encode = str_replace("/", "_", $id_encode);
                    $go = urlencode($id_encode);
                }
            } else {
                //$go = $this->encrypt->encode($user_id);
                //$go = urlencode($go);

                $id_encode = $this->encrypt->encode($user_id);
                $id_encode = str_replace("/", "_", $id_encode);
                $go = urlencode($id_encode);
                //redirect("admin/tree/tree_view/$go", 'refresh');
            }

            $id_decrypt = $this->encrypt->decode($id_decode);
            //echo $id_decode;die();
        }
        $id = urldecode($user_id);
        $id_decode = str_replace("_", "/", $id);
        $id_decrypt = $this->encrypt->decode($id_decode);
        // $id_decrypt = $this->encrypt->decode($user_id);

        if ($this->validation->isUserAvailable($id_decrypt)) {
            $this->tree_model->intitailze();
            $user_details = $this->tree_model->getUserDetails($id_decrypt);
            $this->set('user_details', $user_details);
            $tooltip = $this->tree_model->getToolTip($user_details, $this->MLM_PLAN);

            $this->set('tooltip', $tooltip);
            $title = $this->lang->line('tree_view');
            $this->set('title', "$title");
            $this->set('action_page', $this->CURRENT_URL . "/$go"); //To DO    

            $display = $this->tree_model->viewTree($user_id, $id_decrypt);

            $this->set('display_tree', $display);
            //print $display;
        }
        /* else {
          }
          }
          echo "Invalid User Name...";
          die();
          // $this->redirect("Invalid User Name...", "tree/select_tree",false);
          } */

        /*         * ********************************genology tree *********************** */


        if ($this->input->post('profile_update')) {
            //Admin
            $user_name = $this->input->post('user_name');
            $user_id = $this->validation->userNameToID($user_name);
            if ($user_id != "") {
                $id_encode = $this->encrypt->encode($user_id);
                $id_encode = str_replace("/", "_", $id_encode);
                $encrypt_id = urlencode($id_encode);
                $this->set('encrypt_id', $encrypt_id);
                $date_of_join = $this->validation->getJoiningData($user_id);
                $this->set("date_of_join", $date_of_join);
            } else {
                $msg = $this->lang->line('invalid_user_name');
                $this->redirect($msg, "tree/genology_tree", FALSE);
            }
        } else if ($this->input->post('go_submit')) {
            $user_name = $this->input->post('go_id');
            $user_id = $this->validation->userNameToID($user_name);
            if ($user_id != "") {
                $id_encode = $this->encrypt->encode($user_id);
                $id_encode = str_replace("/", "_", $id_encode);
                $encrypt_id = urlencode($id_encode);
                $this->set('encrypt_id', $encrypt_id);
                $date_of_join = $this->validation->getJoiningData($user_id);
                $this->set("date_of_join", $date_of_join);
            } else {
                $msg = $this->lang->line('invalid_user_name');
                $this->redirect($msg, "tree/genology_tree", FALSE);
            }
        } else {
            $user_id = $this->LOG_USER_ID;
            $user_name = $this->LOG_USER_NAME;
            if ($user_type == 'employee') {
                $user_id = $this->validation->getAdminId();
                $user_name = $this->validation->getAdminUsername();
            }
            $id_encode = $this->encrypt->encode($user_id);
            $id_encode = str_replace("/", "_", $id_encode);
            $encrypt_id = urlencode($id_encode);
            $this->set('encrypt_id', $encrypt_id);
            $date_of_join = $this->validation->getJoiningData($user_id);
            $this->set("date_of_join", $date_of_join);
        }

        $this->set('user_name', $user_name);
        $this->set('user_id', $user_id);

        $title = $this->lang->line('tree_view');
        $this->set('title', $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[1]["type"] = "css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "ajax.js";
        $this->ARR_SCRIPT[2]["type"] = "js";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "validate_select_user.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "style_tree.css";
        $this->ARR_SCRIPT[4]["type"] = "css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "easyTooltip.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "zoom.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->setScripts();

        $this->set("tran_tree_views", $this->lang->line('tree_views'));
        $this->set("tran_genealogy_tree", $this->lang->line('genealogy_tree'));
        $this->set("tran_tabular_tree", $this->lang->line('tabular_tree'));
        $this->set("tran_select_user", $this->lang->line('select_user'));
        $this->set("tran_select_user_id", $this->lang->line('select_user_id'));
        $this->set("tran_type_members_name", $this->lang->line('type_members_name'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_binary_genealogy_view", $this->lang->line('binary_genealogy_view'));
        $this->set("page_top_header", $this->lang->line('tree_view'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('binary_genealogy_view'));
        $this->set("page_small_header", "");
        $help_link = "genealogy-tree";
        $this->set("help_link", $help_link);
        $this->setView();
    }

    function tree_view_sponsor() {

        $user_id = $this->input->post('user_id');
        
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_paid", $this->lang->line('active'));
        $this->set("tran_inactive", $this->lang->line('inactive'));
        $this->set("tran_vacant", $this->lang->line('vacant'));
        $this->set("tran_find_id", $this->lang->line('find_id'));
        $this->set("tran_tree_view", $this->lang->line('tree_view'));
        $this->set("tran_terminated", $this->lang->line('terminated'));
        $this->set("tran_retail_subscriber", $this->lang->line('retail_subscriber'));
        $this->set("tran_brand_partner", $this->lang->line('brand_partner'));
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */

        $go = "";
        if ($this->input->post('go_submit')) {

            $pass_user_id = $user_id;
            $go = $this->input->post('go_id');
            $go = $this->validation->userNameToID($go);
            if (!$go)
                $go = $this->LOG_USER_ID;
            $child_id = $go;
            $user_id = $this->LOG_USER_ID;

            $id = $pass_user_id;
            echo $id;
            //$go = $this->encrypt->encode($go);

            if ($user_id < $child_id) {
                $status = $this->tree_model->userDownlineUserUnilevel($child_id, $user_id);

                if ($status == "yes") {
                    //$go = urlencode($go);
                    $id_encode = $this->encrypt->encode($go);
                    $id_encode = str_replace("/", "_", $id_encode);
                    $go = urlencode($id_encode);


                    redirect("admin/tree/tree_view_sponsor/$go", 'refresh');
                } else {
                    //$go = $this->encrypt->encode($user_id);
                    //$go = urlencode($go);

                    $id_encode = $this->encrypt->encode($user_id);
                    $id_encode = str_replace("/", "_", $id_encode);
                    $go = urlencode($id_encode);
                    redirect("admin/tree/tree_view_sponsor/$go", 'refresh');
                }
            } else {
                //$go = $this->encrypt->encode($user_id);
                //$go = urlencode($go);

                $id_encode = $this->encrypt->encode($user_id);
                $id_encode = str_replace("/", "_", $id_encode);
                $go = urlencode($id_encode);
                redirect("admin/tree/tree_view_sponsor/$go", 'refresh');
            }
        }

        $id = urldecode($user_id);
        $id_decode = str_replace("_", "/", $id);
        $id_decrypt = $this->encrypt->decode($id_decode);
        if ($this->validation->isUserAvailable($user_id)) {

            $this->tree_model->intitailze();
            $user_details = $this->tree_model->getSponserDetails($user_id); //print_r($user_details);
            $this->set('user_details', $user_details);
            $tooltip = $this->tree_model->getSponserToolTip($user_details);

//print_r($tooltip);
            $this->set('tooltip', $tooltip);
            $title = $this->lang->line('tree_view');
            $this->set('title', "$title");
            $this->set('action_page', $this->CURRENT_URL . "/$go"); //To DO    

            $log_user_id = $this->LOG_USER_ID;


            $display = $this->tree_model->viewSponsorTree($log_user_id, $user_id);

            $this->set('display_tree', $display);
            //print $display;

            $this->setView();
        } else {
            echo "Invalid User Name...";
            die();
            // $this->redirect("Invalid User Name...", "tree/select_tree",false);
        }
    }

    public function sponsor_tree($user_id = "") {
        /*         * ********************************genology tree *********************** */
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_paid", $this->lang->line('active'));
        $this->set("tran_inactive", $this->lang->line('inactive'));
        $this->set("tran_vacant", $this->lang->line('vacant'));
        $this->set("tran_find_id", $this->lang->line('find_id'));
        $this->set("tran_tree_view", $this->lang->line('tree_view'));
        $this->set("tran_sponsor_tree", $this->lang->line('sponsor_tree'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $user_type = $this->session->userdata['logged_in']['user_type'];
        if ($user_id == "") {
            $user_id = $this->LOG_USER_ID;
            if ($user_type == 'employee') {
                $user_id = $this->validation->getAdminId();
            }
            $id_encode = $this->encrypt->encode($user_id);
            $id_encode = str_replace("/", "_", $id_encode);
            $user_id = urlencode($id_encode);
        }
        $go = "";
        if ($this->input->post('go_submit')) {

            $pass_user_id = $user_id;
            $go = $this->input->post('go_id');
            $go = $this->validation->userNameToID($go);
            if (!$go)
                $go = $this->LOG_USER_ID;
            $child_id = $go;
            $user_id = $this->LOG_USER_ID;

            $id = $pass_user_id;
            //$go = $this->encrypt->encode($go);

            if ($user_id < $child_id) {
                $status = $this->tree_model->userDownlineUserUnilevel($child_id, $user_id);

                if ($status == "yes") {
                    //$go = urlencode($go);
                    $id_encode = $this->encrypt->encode($go);
                    $id_encode = str_replace("/", "_", $id_encode);
                    $go = urlencode($id_encode);
                } else {
                    //$go = $this->encrypt->encode($user_id);
                    //$go = urlencode($go);

                    $id_encode = $this->encrypt->encode($user_id);
                    $id_encode = str_replace("/", "_", $id_encode);
                    $go = urlencode($id_encode);
                }
            } else {
                //$go = $this->encrypt->encode($user_id);
                //$go = urlencode($go);

                $id_encode = $this->encrypt->encode($user_id);
                $id_encode = str_replace("/", "_", $id_encode);
                $go = urlencode($id_encode);
                //redirect("admin/tree/tree_view/$go", 'refresh');
            }
            $id_decrypt = $this->encrypt->decode($id_decode);
        }

        $id = urldecode($user_id);
        $id_decode = str_replace("_", "/", $id);
        $id_decrypt = $this->encrypt->decode($id_decode);
        //$id_decrypt = $this->encrypt->decode($user_id);
        if ($this->validation->isUserAvailable($id_decrypt)) {
            $this->tree_model->intitailze();
            $user_details = $this->tree_model->getSponserDetails($id_decrypt);
            $this->set('user_details', $user_details);

            $tooltip = $this->tree_model->getSponserToolTip($user_details);

            $this->set('tooltip', $tooltip);
            $title = $this->lang->line('tree_view');
            $this->set('title', "$title");
            $this->set('action_page', $this->CURRENT_URL . "/$go"); //To DO    



            $display = $this->tree_model->viewSponsorTree($user_id, $id_decrypt);

            $this->set('display_tree', $display);



            $this->setView();
        }

        /* else {
          echo "Invalid User Name...";
          die();
          // $this->redirect("Invalid User Name...", "tree/select_tree",false);
          } */

        /*         * ********************************genology tree *********************** */


        if ($this->input->post('profile_update')) {
            //Admin
            $user_name = $this->input->post('user_name');
            $user_id = $this->validation->userNameToID($user_name);
            if ($user_id != "") {
                $id_encode = $this->encrypt->encode($user_id);
                $id_encode = str_replace("/", "_", $id_encode);
                $encrypt_id = urlencode($id_encode);
                $this->set('encrypt_id', $encrypt_id);
                $date_of_join = $this->validation->getJoiningData($user_id);
                $this->set("date_of_join", $date_of_join);
            } else {
                $msg = $this->lang->line('invalid_user_name');
                $this->redirect($msg, "tree/sponsor_tree", FALSE);
            }
        } else if ($this->input->post('go_submit')) {
            $user_name = $this->input->post('go_id');
            $user_id = $this->validation->userNameToID($user_name);
            if ($user_id != "") {
                $id_encode = $this->encrypt->encode($user_id);
                $id_encode = str_replace("/", "_", $id_encode);
                $encrypt_id = urlencode($id_encode);
                $this->set('encrypt_id', $encrypt_id);
                $date_of_join = $this->validation->getJoiningData($user_id);
                $this->set("date_of_join", $date_of_join);
            } else {
                $msg = $this->lang->line('invalid_user_name');
                $this->redirect($msg, "tree/genology_tree", FALSE);
            }
        } else {
            $user_id = $this->LOG_USER_ID;
            $user_name = $this->LOG_USER_NAME;
            if ($user_type == 'employee') {
                $user_id = $this->validation->getAdminId();
                $user_name = $this->validation->getAdminUsername();
            }
            $id_encode = $this->encrypt->encode($user_id);
            $id_encode = str_replace("/", "_", $id_encode);
            $encrypt_id = urlencode($id_encode);
            $this->set('encrypt_id', $encrypt_id);
            $date_of_join = $this->validation->getJoiningData($user_id);
            $this->set("date_of_join", $date_of_join);
        }

        $this->set('user_name', $user_name);
        $this->set('user_id', $user_id);

        $title = $this->lang->line('tree_view');
        $this->set('title', $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[1]["type"] = "css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "ajax.js";
        $this->ARR_SCRIPT[2]["type"] = "js";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "validate_select_user.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "style_tree.css";
        $this->ARR_SCRIPT[4]["type"] = "css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "easyTooltip.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "zoom.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";


        $this->setScripts();

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

        $this->setView();
    }

    public function select_tree($id = "") {
        /*         * ********************************genology tree *********************** */
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_paid", $this->lang->line('active'));
        $this->set("tran_inactive", $this->lang->line('inactive'));
        $this->set("tran_vacant", $this->lang->line('vacant'));
        $this->set("tran_find_id", $this->lang->line('find_id'));
        $this->set("tran_tree_view", $this->lang->line('tree_view'));
        $this->set("tran_you_must_select_user_id", $this->lang->line('you_must_select_user_id'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $user_type = $this->session->userdata['logged_in']['user_type'];
        if ($user_id == "") {
            $user_id = $this->LOG_USER_ID;
            if ($user_type == 'employee') {
                $user_id = $this->validation->getAdminId();
            }
            $id_encode = $this->encrypt->encode($user_id);
            $id_encode = str_replace("/", "_", $id_encode);
            $user_id = urlencode($id_encode);
        }
    
        if ($this->input->post('go_submit')) {
    
            $pass_user_id = $user_id;
            $go = $this->input->post('go_id');
            $go = $this->validation->userNameToID($go);
            if (!$go)
                $go = $this->LOG_USER_ID;
            $child_id = $go;
            $user_id = $this->LOG_USER_ID;
    
            $id = $pass_user_id;
            //$go = $this->encrypt->encode($go);
    
            if ($user_id < $child_id) {
                $status = $this->tree_model->userDownlineUser($child_id, $user_id);
    
                if ($status == "yes") {
                    //$go = urlencode($go);
                    $id_encode = $this->encrypt->encode($go);
                    $id_encode = str_replace("/", "_", $id_encode);
                    $go = urlencode($id_encode);
                } else {
                    //$go = $this->encrypt->encode($user_id);
                    //$go = urlencode($go);
    
                    $id_encode = $this->encrypt->encode($user_id);
                    $id_encode = str_replace("/", "_", $id_encode);
                    $go = urlencode($id_encode);
                }
            } else {
                //$go = $this->encrypt->encode($user_id);
                //$go = urlencode($go);

                $id_encode = $this->encrypt->encode($user_id);
                $id_encode = str_replace("/", "_", $id_encode);
                $go = urlencode($id_encode);
                //redirect("admin/tree/tree_view/$go", 'refresh');
            }
            $id_decrypt = $this->encrypt->decode($id_decode);
        }

        $id = urldecode($user_id);
        $id_decode = str_replace("_", "/", $id);
        $id_decrypt = $this->encrypt->decode($id_decode);
        // $id_decrypt = $this->encrypt->decode($user_id);

        if ($this->validation->isUserAvailable($id_decrypt)) {

            $this->tree_model->intitailze();
            $user_details = $this->tree_model->getUserDetails($id_decrypt);
            $this->set('user_details', $user_details);
            $tooltip = $this->tree_model->getToolTip($user_details, $this->MLM_PLAN);

            $this->set('tooltip', $tooltip);
            $title = $this->lang->line('tree_view');
            $this->set('title', "$title");
            $this->set('action_page', $this->CURRENT_URL . "/$go"); //To DO
            
            
            
            $display = $this->tree_model->viewTree($user_id, $id_decrypt);

            $this->set('display_tree', $display);
            


            $this->setView();
        } /* else {
          echo "Invalid User Name...";
          die();
          // $this->redirect("Invalid User Name...", "tree/select_tree",false);
          } */

        /*         * ********************************genology tree *********************** */

        if ($this->input->post('profile_update')) {
            //Admin
            $user_name = $this->input->post('user_name');
            $user_id = $this->validation->userNameToID($user_name);
            if ($user_id != "") {
                $id_encode = $this->encrypt->encode($user_id);
                $id_encode = str_replace("/", "_", $id_encode);
                $encrypt_id = urlencode($id_encode);
                $this->set('encrypt_id', $encrypt_id);
                $date_of_join = $this->validation->getJoiningData($user_id);
                $this->set("date_of_join", $date_of_join);
            } else {
                $msg = $this->lang->line('invalid_user_name');
                $this->redirect($msg, "home", FALSE);
            }
        } else {
            $user_id = $this->LOG_USER_ID;
            $user_name = $this->LOG_USER_NAME;
            $user_type = $this->session->userdata['logged_in']['user_type'];
            if ($user_type == 'employee') {
                $user_id = $this->validation->getAdminId();
                $user_name = $this->validation->getAdminUsername();
            }
            $id_encode = $this->encrypt->encode($user_id);
            $id_encode = str_replace("/", "_", $id_encode);
            $encrypt_id = urlencode($id_encode);
            $this->set('encrypt_id', $encrypt_id);
            $date_of_join = $this->validation->getJoiningData($user_id);
            $this->set("date_of_join", $date_of_join);
        }
                
        $this->set('user_name', $user_name);
        $this->set('user_id', $user_id);

        $title = $this->lang->line('tree_view');
        $this->set('title', $this->COMPANY_NAME . " | $title");

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

        $this->ARR_SCRIPT[4]["name"] = "jquery-ui/jquery-ui-1.10.1.custom.min.css";
        $this->ARR_SCRIPT[4]["type"] = "plugins/css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "dynatree/src/skin-vista/ui.dynatree.css";
        $this->ARR_SCRIPT[5]["type"] = "plugins/css";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "jquery-ui/jquery-ui-1.10.1.custom.min.js";
        $this->ARR_SCRIPT[6]["type"] = "plugins/js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "dynatree/src/jquery.dynatree.js";
        $this->ARR_SCRIPT[7]["type"] = "plugins/js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "validate_select_user.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->setScripts();

        $this->set("tran_tree_views", $this->lang->line('tree_views'));
        $this->set("tran_genealogy_tree", $this->lang->line('genealogy_tree'));
        $this->set("tran_tabular_tree", $this->lang->line('tabular_tree'));
        $this->set("tran_select_user", $this->lang->line('select_user'));
        $this->set("tran_select_user_id", $this->lang->line('select_user_id'));
        $this->set("tran_type_members_name", $this->lang->line('type_members_name'));
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_binary_genealogy_view", $this->lang->line('binary_genealogy_view'));

        $this->set("page_top_header", $this->lang->line('tree_view'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('tabular_tree'));
        $this->set("page_small_header", "");

        $help_link = "tabular_tree";
        $this->set("help_link", $help_link);
        $this->setView();
    }
    
    function tree_view() {

        $user_id = $this->input->post('user_id');
        $this->setScripts();
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_paid", $this->lang->line('active'));
        $this->set("tran_inactive", $this->lang->line('inactive'));
        $this->set("tran_vacant", $this->lang->line('vacant'));
        $this->set("tran_find_id", $this->lang->line('find_id'));
        $this->set("tran_tree_view", $this->lang->line('tree_view'));
        $this->set("tran_terminated", $this->lang->line('terminated'));
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */

        $go = "";
        if ($this->input->post('go_submit')) {

            $pass_user_id = $user_id;
            $go = $this->input->post('go_id');
            $go = $this->validation->userNameToID($go);
            if (!$go)
                $go = $this->LOG_USER_ID;
            $child_id = $go;
            $user_id = $this->LOG_USER_ID;

            $id = $pass_user_id;
            //$go = $this->encrypt->encode($go);

            if ($user_id < $child_id) {
                $status = $this->tree_model->userDownlineUser($child_id, $user_id);

                if ($status == "yes") {
                    //$go = urlencode($go);
                    $id_encode = $this->encrypt->encode($go);
                    $id_encode = str_replace("/", "_", $id_encode);
                    $go = urlencode($id_encode);


                    redirect("admin/tree/tree_view/$go", 'refresh');
                } else {
                    //$go = $this->encrypt->encode($user_id);
                    //$go = urlencode($go);

                    $id_encode = $this->encrypt->encode($user_id);
                    $id_encode = str_replace("/", "_", $id_encode);
                    $go = urlencode($id_encode);
                    redirect("admin/tree/tree_view/$go", 'refresh');
                }
            } else {
                //$go = $this->encrypt->encode($user_id);
                //$go = urlencode($go);

                $id_encode = $this->encrypt->encode($user_id);
                $id_encode = str_replace("/", "_", $id_encode);
                $go = urlencode($id_encode);
                redirect("admin/tree/tree_view/$go", 'refresh');
            }
        }

        $id = urldecode($user_id);
        $id_decode = str_replace("_", "/", $id);
        $id_decrypt = $this->encrypt->decode($id_decode);
        if ($this->validation->isUserAvailable($user_id)) {

            $this->tree_model->intitailze();
            $user_details = $this->tree_model->getUserDetails($user_id);
            $this->set('user_details', $user_details);


            $tooltip = $this->tree_model->getToolTip($user_details, $this->MLM_PLAN);

            $this->set('tooltip', $tooltip);
            $title = $this->lang->line('tree_view');
            $this->set('title', "$title");
            $this->set('action_page', $this->CURRENT_URL . "/$go"); //To DO    

            $log_user_id = $this->LOG_USER_ID;


            $display = $this->tree_model->viewTree($log_user_id, $user_id);

            $this->set('display_tree', $display);
            $this->set('user_id', $user_id);
            //print $display;

            $this->setView();
        } else {
            echo "Invalid User Name...";
            die();
            // $this->redirect("Invalid User Name...", "tree/select_tree",false);
        }
    }

    function tree_view_board($user_id = "", $board_no = '') {

        ///////////////////////////////  EDITED BY YASIR   ////////////////////////////////////
        $this->ARR_SCRIPT[0]["name"] = "style_tree.css";
        $this->ARR_SCRIPT[0]["type"] = "css";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "easyTooltip.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";
        $this->setScripts();
        ////////////////////////// code for language translation  ///////////////////////////////

        $this->set("tran_paid", $this->lang->line('paid'));
        $this->set("tran_inactive", $this->lang->line('inactive'));
        $this->set("tran_vacant", $this->lang->line('vacant'));
        $this->set("tran_find_id", $this->lang->line('find_id'));
        $this->set("tran_tree_view", $this->lang->line('tree_view'));
        $this->set("page_top_header", $this->lang->line('board_view'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('board_view'));
        $this->set("page_small_header", "");




        $id = urldecode($user_id);
        $id_decode = str_replace("_", "/", $id);
        $id_decrypt = $this->encrypt->decode($id_decode);
        if ($this->validation->isUserAvailableinBoard($id_decrypt)) {

            $this->tree_model->intitailze();
            $user_details = $this->tree_model->getUserDetails($id_decrypt, "auto_board_" . $board_no);

            //print_r($user_details);die();

            $this->set('user_details', $user_details);
            $tooltip = $this->tree_model->getToolTip($user_details, $this->MLM_PLAN, $board_no);

            //print_r($tooltip);die();

            $this->set('tooltip', $tooltip);
            $title = $this->lang->line('board_view');
            $this->set('title', "$title");
            $this->set('action_page', $this->CURRENT_URL . "/$go"); //To DO    

            $user_id = $id_decrypt;


//            $display = $this->tree_model->viewTreeBoard($user_id, $id_decrypt, $board_no);
//
//            $this->set('display_tree', $display);
            $board_no = 1;
            $table_name = "auto_board_" . $board_no;
            $tbl_name = $table_name;
            $board_name = "auto_board_" . $board_no;


            $ft_userid = $this->tree_model->getUserRefIdByAutoID($id_decrypt, "auto_board_" . $board_no);
            //die($ft_userid);
            $board_user_details = $this->tree_model->getMyBoardIDs($ft_userid, $board_no);

            //print_r($board_user_details);

            $board_count = count($board_user_details);
            if ($board_count > 0) {
                $board_id = $board_user_details['board_id'];
                $searched_username = $board_user_details['board_username'];

                $user_board_serial_number = $this->tree_model->getBoardNumberFromBoardUserDetails($user_id, $board_no);
                $this->set("user_board_number", $user_board_serial_number);

                //die(print_r($user_board_serial_number));

                $downline_board_id_arr = $this->tree_model->viewBoardTree1($user_id, $user_id, $tbl_name, $board_no, $user_board_serial_number);
                $this->set('downline_board_id_arr', $downline_board_id_arr);
            }

//print $display;

            $this->setView();
        } else {
            $msg = $this->lang->line('invalid_user_name');
            echo "$msg";
            die();
            // $this->redirect("Invalid User Name...", "tree/select_tree",false);
        }
    }

    function tabular_tree($id = "") {
        $this->tree_model->intitailze();
        $this->setScripts();
        if ($this->input->post('go_submit')) {

            $user_name = $this->input->post('go_id');
            $user_id = $this->tree_model->OBJ_VAL->userNameToID($user_name);
            if ($user_id == "") {
                $user_id = $this->LOG_USER_ID;
                $user_name = $this->LOG_USER_NAME;
            }
            //$this->set('user_id', $user_id);
        } else if ($id != "") {
            $uid = urldecode($id);
            $id_decode = str_replace("_", "/", $uid);
            $user_id = $this->encrypt->decode($id_decode);
            $user_name = $this->tree_model->OBJ_VAL->idToUserName($user_id);
        } else {
            $user_id = $this->LOG_USER_ID;
            $user_name = $this->LOG_USER_NAME;
        }
        $this->set('user_id', $user_id);
        $this->set('user_name', $user_name);

        $title = $this->lang->line('tabular_tree_view');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->set('temp_path', TEMPLATE_APP_PATH);
        $this->setView();
    }

    public function get_children($id = "") {


        $this->tree_model->intitailze();


        /* header("HTTP/1.0 200 OK");
          header('Content-type: text/json; charset=utf-8');
          header("Cache-Control: no-cache, must-revalidate");
          header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
          header("Pragma: no-cache"); */
        echo $this->tree_model->getChildren($id);
    }

}

?>
