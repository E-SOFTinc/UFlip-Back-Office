<?php

require_once 'Inf_Controller.php';

class cron extends Inf_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('cron_model', '', TRUE);
    }

    public function participation_bonus() {// done by Jipin
        $cron_id = $this->cron_model->insertIntoCronHistory("participation_bonus");
        $weekly_bonus_limit = $this->cron_model->getWeekBonusLimit();
        $sales = $this->cron_model->getTeamBonusUsersAndQuantity($weekly_bonus_limit);
        $amount_payable = $this->cron_model->getTeambonus();
        $this->cron_model->begin();
        if (count($sales) > 0) {
            foreach ($sales as $row) {
                $today = date("Y-m-d H:i:s");
                $id = $row['user_id'];
                $sales_id = $row['sales_id'];
                $quantity = $row['quantity'];
                $last_bonus_date = $row['bonus_date'];
                if ($last_bonus_date == "") {
                    $last_bonus_date = $row['purchase_date'];
                }

                $date1 = date("Y-m-d H:i:s", strtotime($today));
                $today_dt = strtotime("$date1");
                $date2 = date("Y-m-d H:i:s", strtotime($last_bonus_date));
                $last_bonus_dt = strtotime("$date2");
                $datediff = $today_dt - $last_bonus_dt;
                $interval = floor($datediff / (60 * 60 * 24));

                //echo "sales=>$sales_id==user_id=>$id==qty=>$quantity=>last date=>$last_bonus_date=interval=>$interval=><br/>";
                if ($interval >= 7) {
                    $amount = $amount_payable * $quantity;
                    $res = $this->cron_model->insertLegAmount($id, $amount, "participation_bonus");
                    if (!$res) {
                        $this->cron_model->updateCronHistory('failed', $cron_id);
                        $this->cron_model->rollBack();
                    } else {
                        $this->cron_model->updateParticipationBonusDetails($sales_id);
                    }
                }
            }
        }

        $this->cron_model->commit();
        $this->cron_model->updateCronHistory('success', $cron_id);
    }

    
}
