<?php

require_once 'Inf_Controller.php';

class Configuration extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function my_referal() {
        $title = $this->lang->line('view_my_refferals');
        $this->set("title", $this->COMPANY_NAME . " | $title");

       
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

        $this->setScripts();
         $res = array();
        $user_id = $this->LOG_USER_ID;
        /*         * *pagination**** */
        $basurl = base_url() . "user/configuration/my_referal";
        $config['base_url'] = $basurl;


        $config['per_page'] = 100;

        $total_rows = $this->configuration_model->getReferalDetailscount($user_id);
        $config['total_rows'] = $total_rows;
        $config["uri_segment"] = 4;

        $config['num_links'] = 5;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
       

        $res = $this->configuration_model->getReferalDetails($user_id, $config['per_page'], $page);
      
        $this->set("arr", $res);
        $result_per_page = $this->pagination->create_links();
        $this->set("result_per_page", $result_per_page);
        $count = count($res);
        $this->set("count", $count);
        //for language translation///
        $this->set("tran_users_referal_details", $this->lang->line('users_referal_details'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_referal_details", $this->lang->line('referal_details'));
        $this->set("tran_sl_no", $this->lang->line('sl_no'));
        $this->set("tran_full_name", $this->lang->line('full_name'));
        $this->set("tran_joinig_date", $this->lang->line('joinig_date'));
        $this->set("tran_no_referels", $this->lang->line('no_referels'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_view_refferal_details", $this->lang->line('view_refferal_details'));
        $this->set("tran_you_must_enter_user_name", $this->lang->line('you_must_enter_user_name'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_nofond", $this->lang->line('nofond'));
        $this->set("tran_showing", $this->lang->line('showing'));
        $this->set("tran_to", $this->lang->line('to'));
        $this->set("tran_of", $this->lang->line('of'));
        $this->set("tran_entries", $this->lang->line('entries'));
        $this->set("tran_notavailable", $this->lang->line('notavailable'));

        $this->set("page_top_header", $this->lang->line('users_referal_details'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('users_referal_details'));
        $this->set("page_small_header", "");
        $this->set("trans_email", $this->lang->line('email'));
        $this->set("trans_country", $this->lang->line('country'));

        $help_link = "view-my-referrals";
        $this->set("help_link", $help_link);
        $this->setView();
    }

    function getUsernamePrefix() {
        $prefix = $this->configuration_model->getUsernamePrefix();
        if ($prefix != "") {
            echo $prefix;
        }
        exit();
    }
    public function user_purchase_history(){
        $title=$this->lang->line('user_purchase_details');
        $this->set('title',$this->COMPANY_NAME."!$title");
        
        $this->ARR_SCRIPT[0]['name']='ajax.js';
        $this->ARR_SCRIPT[0]['type']='js';
        $this->ARR_SCRIPT[0]['loc']='header';
        
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
        $this->setScripts();
        //language added//
        $this->set("tran_users_purchase_details",$this->lang->line('purchase_details'));
        $this->set("tran_sl_no",$this->lang->line('sl_no'));
        $this->set("tran_invoice",$this->lang->line('invoice_no'));
        $this->set("tran_joinig_date",$this->lang->line('joinig_date'));
        $this->set("tran_amount",$this->lang->line('amount'));
        $this->set("tran_transaction_id",$this->lang->line('trans_id'));
        $this->set("tran_type",$this->lang->line('status'));
        $this->set("tran_no_referels", $this->lang->line('no_referels'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_nofond", $this->lang->line('nofond'));
        $this->set("tran_showing", $this->lang->line('showing'));
        $this->set("tran_to", $this->lang->line('to'));
        $this->set("tran_of", $this->lang->line('of'));
        $this->set("tran_entries", $this->lang->line('entries'));
        $this->set("tran_notavailable", $this->lang->line('notavailable'));
        $this->set("tran_count", $this->lang->line('count'));
        $this->set("tran_total_amount", $this->lang->line('total_amount'));
        $this->set("tran_total", $this->lang->line('total'));
        
        $this->set("page_top_header", $this->lang->line('purchase_details'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('purchase_details'));
        $this->set("page_small_header", "");
        
        $user_id= $this->LOG_USER_ID;
        $details=$this->configuration_model->getUserPurcahseProduct($user_id);
        $count=count($details);
      
        $this->set('purchase_histroy',$details);
        $this->set('count',$count);
        
        $this->setView();
    }
}

?>
