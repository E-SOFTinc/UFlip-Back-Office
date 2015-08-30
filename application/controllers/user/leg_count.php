<?php

require_once 'Inf_Controller.php';

class Leg_Count extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function view_leg_count() {

        /////////////////////  CODE ADDED BY JIJI  //////////////////////////
        $title = $this->lang->line('leg_count');
        $this->set('title', $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[1]["type"] = "plugins/js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "table-data.js";
        $this->ARR_SCRIPT[2]["type"] = "js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[3]["type"] = "plugins/css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[4]["type"] = "plugins/css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[5]["type"] = "plugins/js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[6]["type"] = "plugins/js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->setScripts();
        $product_status = $this->MODULE_STATUS['product_status'];
        $this->leg_count_model->initialize($product_status);

        $user_id = $this->LOG_USER_ID;
        $user_type = $this->LOG_USER_TYPE;

        ////////////////////////// code for language translation  ///////////////////////////////
        $this->set("tran_leg_count", $this->lang->line('leg_count'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_full_name", $this->lang->line('full_name'));
        $this->set("tran_left_point", $this->lang->line('left_point'));
        $this->set("tran_right_point", $this->lang->line('right_point'));
        $this->set("tran_left_carry", $this->lang->line('left_carry'));
        $this->set("tran_right_carry", $this->lang->line('right_carry'));
        $this->set("tran_total_pair", $this->lang->line('total_pair'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_total", $this->lang->line('total'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_No_Leg_Count_Found", $this->lang->line('No_Leg_Count_Found'));
        $this->set("page_top_header", $this->lang->line('leg_count'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('leg_count'));
        $this->set("page_small_header", "");

        $help_link = "commision-details";
        $this->set("help_link", $help_link);
        /////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////// pagination ////////////////////////////////////////

        $base_url = base_url() . "leg_count/view_leg_count";
        $config['base_url'] = $base_url;
        $config['per_page'] = 25;
        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;

        $users = $this->leg_count_model->getLegDetails($user_id, $user_type);
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

}

?>