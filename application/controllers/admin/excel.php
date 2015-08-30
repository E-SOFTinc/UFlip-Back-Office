<?php
require_once 'Inf_Controller.php';
class Excel extends Inf_Controller {
    function __construct() {
        
        parent::__construct();
    }
    function user_detail_excel()
    {
        $from = $this->session->userdata['prev_date'];
        $to   = $this->session->userdata['payout_date'];
        $arr = $this->excel_model->getUserArray($from,$to);
        $date = date("Y-m-d H:i:s");
        $this->excel_model->writeToExcel($arr,"Binary Released User Report ($date)");
    }

 function user_profiles_excel()
    {
       $this->session->userdata['profile_type'];
       if ($this->session->userdata['profile_type'] == "one_count") 
        {
            $cnt = $this->session->userdata['profile_count'];
            $arr = $this->excel_model->getProfiles($cnt);
            $date = date("Y-m-d H:i:s");
            $this->excel_model->writeToExcel($arr,"Profile Report ($date)");
        } 
        else if ($this->session->userdata['profile_type'] == "two_count") 
        {
            $count_from = $this->session->userdata['count_from'];
            $count_to = $this->session->userdata['count_to'];
            $date = date("Y-m-d H:i:s");
            $arr = $this->excel_model->getProfilesFrom($count_from, $count_to);
            $this->excel_model->writeToExcel($arr,"Profile Report ($date)");
        }
    }
}
?>