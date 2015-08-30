<?php

require_once 'Inf_Controller.php';

class Income_Details extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function income() {

        //Set the supported script for generate epin
        $title = $this->lang->line('income_details');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        

        $this->ARR_SCRIPT[0]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[0]["type"] = "plugins/css";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[1]["type"] = "plugins/css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[2]["type"] = "plugins/js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[3]["type"] = "plugins/js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[4]["type"] = "plugins/js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "table-data.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->setScripts();

        $user_id = $this->LOG_USER_ID;
        $arr = $this->income_details_model->add_income($user_id);
        $this->set("amount", $arr);

        ////////////////////////// for language translation  ///////////////////////////////
        /*         * *************************for TAB************************************************ */
        $this->set("tran_Sl_no", $this->lang->line('Sl_no'));
        $this->set("tran_Amount_Type", $this->lang->line('Amount_Type'));
        $this->set("tran_level", $this->lang->line('level'));
        $this->set("tran_binary", $this->lang->line('binary'));
        $this->set('tran_amount', $this->lang->line('amount'));
        $this->set("tran_from", $this->lang->line('commision_from'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_Amount_Total", $this->lang->line('Amount_Total'));
        $this->set("tran_income_details", $this->lang->line('income_details'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_no_details_found", $this->lang->line('no_details_found'));
        $this->set("page_top_header", $this->lang->line('income_details'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('income_details'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_nofond", $this->lang->line('nofond'));
        $this->set("tran_showing", $this->lang->line('showing'));
        $this->set("tran_to", $this->lang->line('to'));
        $this->set("tran_of", $this->lang->line('of'));
        $this->set("tran_entries", $this->lang->line('entries'));
        $this->set("tran_notavailable", $this->lang->line('notavailable'));
        $this->set("page_small_header", "");
        
        $help_link="income_details";
        $this->set("help_link",$help_link);
        ////////////////////////////////////////////////////////////////////////////////////

        $this->setView();
    }

}

?>