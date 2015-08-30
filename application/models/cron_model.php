<?php

require_once 'Inf_Model.php';

class Cron_model extends Inf_Model {

    function __construct() {
        parent::__construct();
    }

    public function getTeamBonusUsersAndQuantity($weekly_bonus_limit) {
        $users = array();
        $this->db->select("id,user_id,prod_id,quantity,participation_bonus_count,participation_bonus_date,date_submission");
        $this->db->where("participation_bonus_count <", $weekly_bonus_limit);
        $query = $this->db->get('sales_order');
        $i = 0;
        foreach ($query->result() as $row) {
            $participation_bonus_status = $this->getParticipationBonusStatus($row->prod_id);
            if ($participation_bonus_status == 'yes') {
                $users[$i]['sales_id'] = $row->id;
                $users[$i]['user_id'] = $row->user_id;
                $users[$i]['quantity'] = $row->quantity;
                $users[$i]['purchase_date'] = $row->date_submission;
                $users[$i]['bonus_date'] = $row->participation_bonus_date;
                $i++;
            }
        }
        return $users;
    }

    public function getParticipationBonusStatus($product_id) {
        $this->db->select('participation_bonus_status');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('product');
        foreach ($query->result() as $row) {
            $participation_bonus_status = $row->participation_bonus_status;
        }
        return $participation_bonus_status;
    }

    public function getWeekBonusLimit() {
        $this->db->select("week_limit");
        $this->db->from("configuration");
        $res = $this->db->get();
        foreach ($res->result()as $row) {
            $result = $row->week_limit;
        }
        return $result;
    }

    public function getTeambonus() {
        $this->db->select("participation_bonus");
        $res = $this->db->get('configuration');
        foreach ($res->result()as $row) {
            $result = $row->participation_bonus;
        }
        return $result;
    }

    public function getPurchaseDate($id) {
        $date = '';
        $this->db->select("date_submission");
        $this->db->from('sales_order');
        $this->db->where('user_id', $id);
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            $date = $row->date_submission;
        }
        return $date;
    }

    public function updateCronHistory($status, $cron_id) {
        $this->db->set('status', $status)->where('cron_id', $cron_id);
        return $this->db->update('cron_history');
    }

    public function insertIntoCronHistory($cron_name) {

        $data_arr = array('cron' => $cron_name,
            'date' => date('Y-m-d H:i:s'),
            'status' => 'started');

        $this->db->insert('cron_history', $data_arr);
        return $this->db->insert_id();
    }

    public function getConfigurationEntries() {
        $qry = $this->db->get("configuration");
        $config_array = array();

        foreach ($qry->result_array() AS $row) {
            $config_array = $row;
        }
        return $config_array;
    }

    public function insertLegAmount($user_id, $total_amount, $amount_type = '') {


        $obj_arr = $this->getConfigurationEntries();

        $tds_db = $obj_arr["tds"];

        $service_charge_db = $obj_arr["service_charge"];

        $amount_type = $amount_type;

        $tds_amount = ($total_amount * $tds_db ) / 100;
        $service_charge = ($total_amount * $service_charge_db ) / 100;
        $amount_payable = $total_amount - ($tds_amount + $service_charge);

//$date_of_sub = date("Y-m-d H:i:s");
        $date_of_sub = date('Y-m-d H:i:s');
//=========================================
        require_once 'Calculation11Product.php';
        $obj_calc = new Calculation();

        $obj_calc->insertInToLegAmount($user_id, 0, 0, 0, $total_amount, $amount_payable, $tds_amount, $service_charge, $date_of_sub, $amount_type, 0);

        return TRUE;
    }

    public function updateParticipationBonusDetails($sales_id) {
        $this->db->set('participation_bonus_count', 'participation_bonus_count+1', false);
        $this->db->set('participation_bonus_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $sales_id);
        $res = $this->db->update('sales_order');
    }

}
