<?php
require_once 'validation.php';
require_once 'Settings.php';
require_once 'Inf_Model.php';

class PayoutClass extends Inf_Model {

    public $obj_val;
    public $obj_settings;
    public $all_payout_details;
    public $member_payout_details;

    public function __construct() {

        $this->obj_settings = new Settings();
        $this->obj_val = new Validation();
    }

    public function getTotalPayout($from_date = '', $to_date = '') { 
        require_once 'LegClass.php';
        $obj_leg = new LegClass();
        if ($from_date == '' AND $to_date == '') {
           
            $this->db->select_sum('leg_amount.total_leg', 'total_leg');
            $this->db->select_sum('leg_amount.total_amount', 'total_amount');
            $this->db->select_sum('leg_amount.amount_payable', 'amount_payable');
            $this->db->select_sum('leg_amount.tds', 'tds');
            $this->db->select_sum('leg_amount.service_charge', 'service_charge');
            $this->db->select_sum('leg_amount.leg_amount_carry', 'leg_amount_carry');
            $this->db->select('leg_amount.user_id');
            $this->db->from("leg_amount ");
            $this->db->join("ft_individual", "leg_amount.user_id=ft_individual.id", 'INNER');
            $this->db->where('ft_individual.active','yes');
            $this->db->group_by("leg_amount.user_id");



            /* $select = "SELECT SUM(total_leg) AS total_leg,
              SUM(total_amount) AS total_amount,
              SUM(amount_payable) AS amount_payable,
              SUM(tds) AS tds,
              SUM(service_charge) AS service_charge,
              SUM(leg_amount_carry) AS leg_amount_carry,
              user_id
              FROM $leg_amount
              GROUP BY user_id"; */
        } else {


            $this->db->select_sum('leg_amount.total_leg', 'total_leg');
            $this->db->select_sum('leg_amount.total_amount', 'total_amount');
            $this->db->select_sum('leg_amount.amount_payable', 'amount_payable');
            $this->db->select_sum('leg_amount.tds', 'tds');
            $this->db->select_sum('leg_amount.service_charge', 'service_charge');
            $this->db->select_sum('leg_amount.leg_amount_carry', 'leg_amount_carry');
            $this->db->select('leg_amount.user_id');
            $this->db->from("leg_amount ");
            $this->db->join("ft_individual", "leg_amount.user_id=ft_individual.id", 'INNER');
            $this->db->where('ft_individual.active','yes');
            $where = "leg_amount.date_of_submission BETWEEN '$from_date' AND '$to_date'";
            $this->db->where($where);
            $this->db->group_by("leg_amount.user_id");

            /* $select = "SELECT SUM(total_leg) AS total_leg,
              SUM(total_amount) AS total_amount,
              SUM(amount_payable) AS amount_payable,
              SUM(tds) AS tds,
              SUM(service_charge) AS service_charge,
              SUM(leg_amount_carry) AS leg_amount_carry,
              user_id
              FROM $leg_amount
              WHERE date_of_submission BETWEEN '$from_date' AND '$to_date'
              GROUP BY user_id"; */
        }
        //echo $select;
        //$result = $this->selectData($select, "Error on selecting leg amount ..");
       
        //------bank details----
        $this->db->select('user.user_detail_acnumber,user.user_detail_nbank,user.user_detail_nbranch,user.user_detail_pan,user.user_detail_address');
        $this->db->join('user_details as user','user.user_detail_refid=leg_amount.user_id','INNER');
        //-----bank details end ---
        
        $all_payout_details = array();
        $i = 0;
        $query = $this->db->get();
        $row = $query->result_array();
        foreach ($query->result_array() as $row) {
            $all_payout_details["detail$i"]["user_id"] = $row['user_id'];
            $all_payout_details["detail$i"]["full_name"] = $this->obj_val->getFullName($row['user_id']);
            $all_payout_details["detail$i"]["user_name"] = $this->obj_val->IdToUserName($row['user_id']);
            $all_payout_details["detail$i"]["left_leg"] = $obj_leg->getLeftLegCount($row['user_id']);
            $all_payout_details["detail$i"]["right_leg"] = $obj_leg->getRightLegCount($row['user_id']);
            $all_payout_details["detail$i"]["total_leg"] = $row['total_leg'];
            $all_payout_details["detail$i"]["total_amount"] = $row['total_amount'] + $row['leg_amount_carry'];
            $all_payout_details["detail$i"]["amount_payable"] = round($row['amount_payable'], 2);
            $all_payout_details["detail$i"]["tds"] = round($row['tds'], 2);
            $all_payout_details["detail$i"]["service_charge"] = round($row['service_charge'], 2);
             //------bank details----
             $all_payout_details["detail$i"]["user_pan"] = $row['user_detail_pan'];
             if ($row['user_detail_acnumber'])
                $all_payout_details["detail$i"]["acc_number"] = $row['user_detail_acnumber'];
            else
                $all_payout_details["detail$i"]["acc_number"] = 'NA';
            if ($row['user_detail_nbank'])
                $all_payout_details["detail$i"]["user_bank"] = $row['user_detail_nbank'];
            else
                $all_payout_details["detail$i"]["user_bank"] = 'NA';
           
            if ($row['user_detail_address'])
                $all_payout_details["detail$i"]["user_address"] = $row['user_detail_address'];
            else
                $all_payout_details["detail$i"]["user_address"] = 'NA';
              //-----bank details end ---
            $i++;
        }
        /* while ($row = mysql_fetch_array($result)) {


          $this->all_payout_details["detail$i"]["user_id"] = $row['user_id'];
          $this->all_payout_details["detail$i"]["full_name"] = $this->obj_val->getFullName($row['user_id']);
          $this->all_payout_details["detail$i"]["user_name"] = $this->obj_val->IdToUserName($row['user_id']);
          $this->all_payout_details["detail$i"]["left_leg"] = $obj_leg->getLeftLegCount($row['user_id']);
          $this->all_payout_details["detail$i"]["right_leg"] = $obj_leg->getRightLegCount($row['user_id']);
          $this->all_payout_details["detail$i"]["total_leg"] = $row['total_leg'];
          $this->all_payout_details["detail$i"]["total_amount"] = $row['total_amount'] + $row['leg_amount_carry'];
          $this->all_payout_details["detail$i"]["amount_payable"] = round($row['amount_payable'], 2);
          $this->all_payout_details["detail$i"]["tds"] = round($row['tds'], 2);
          $this->all_payout_details["detail$i"]["service_charge"] = round($row['service_charge'], 2);
          $i++;
          }
          return $this->all_payout_details; */
        return $all_payout_details;
    }

    public function getMemberPayout($user_mob_name) {
        require_once 'LegClass.php';
        $obj_leg = new LegClass();
        if ($this->table_prefix == "") {
            $this->table_prefix = $this->session->userdata('table_prefix');
        }
        $user_id = $this->obj_val->userNameToID($user_mob_name);
        $leg_amount = $this->table_prefix . "leg_amount";

        $this->db->select_sum('total_leg', 'total_leg');
        $this->db->select_sum('total_amount', 'total_amount');
        $this->db->select_sum('amount_payable', 'amount_payable');
        $this->db->select_sum('tds', 'tds');
        $this->db->select_sum('service_charge', 'service_charge');
        $this->db->select('user_id');
        $this->db->from($leg_amount);
        $where = "date_of_submission BETWEEN '$from_date' AND '$to_date'";
        $this->db->where($where);
        $this->db->group_by(user_id);
        $query = $this->db->get();
        $row = $query->result_array();
        $member_payout_details["user_id"] = $row['user_id'];
        $member_payout_details["user_name"] = $this->obj_val->IdToUserName($row['user_id']);
        $member_payout_details["user_id"] = $row['user_id'];
        $member_payout_details["full_name"] = $this->obj_val->getFullName($row['user_id']);
        $member_payout_details["left_leg"] = $obj_leg->getLeftLegCount($row['user_id']);
        $member_payout_details["right_leg"] = $obj_leg->getRightLegCount($row['user_id']);
        $member_payout_details["total_leg"] = $row['total_leg'];
        $member_payout_details["total_amount"] = $row['total_amount'];
        $member_payout_details["amount_payable"] = round($row['amount_payable'], 2);
        $member_payout_details["tds"] = round($row['tds'], 2);
        $member_payout_details["service_charge"] = round($row['service_charge'], 2);



        /* $select = "SELECT SUM(total_leg) AS total_leg,
          SUM(total_amount) AS total_amount,
          SUM(amount_payable) AS amount_payable,
          SUM(tds) AS tds,
          SUM(service_charge) AS service_charge,
          user_id
          FROM $leg_amount
          WHERE user_id='$user_id'
          GROUP BY user_id
          ";
          // echo $select;
          $result = $this->selectData($select, "Error on selecting leg amount ..");

          $row = mysql_fetch_array($result);

          $this->member_payout_details["user_id"] = $row['user_id'];
          $this->member_payout_details["user_name"] = $this->obj_val->IdToUserName($row['user_id']);
          $this->me$this->member_payout_details["user_id"] = $row['user_id'];
          $this->mmber_payout_details["full_name"] = $this->obj_val->getFullName($row['user_id']);
          $this->member_payout_details["left_leg"] = $obj_leg->getLeftLegCount($row['user_id']);
          $this->member_payout_details["right_leg"] = $obj_leg->getRightLegCount($row['user_id']);
          $this->member_payout_details["total_leg"] = $row['total_leg'];
          $this->member_payout_details["total_amount"] = $row['total_amount'];
          $this->member_payout_details["amount_payable"] = round($row['amount_payable'], 2);
          $this->member_payout_details["tds"] = round($row['tds'], 2);
          $this->member_payout_details["service_charge"] = round($row['service_charge'], 2); */

        return $member_payout_details;
    }

    public function payoutAllPage() {
        
    }

    public function payoutWeeklyDetails() {
        
    }

    public function payoutWeeklyPage($from_date, $to_date) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $this->session->userdata('table_prefix');
        }
        $leg_amount = $this->table_prefix . "leg_amount";
        $this->db->select_sum('total_leg', 'total_leg');
        $this->db->select_sum('total_amount', 'total_amount');
        $this->db->select_sum('amount_payable', 'amount_payable');
        $this->db->select_sum('tds', 'tds');
        $this->db->select_sum('service_charge', 'service_charge');
        $this->db->select('user_id');
        $this->db->from($leg_amount);
        $where = "date_of_submission BETWEEN '$from_date' AND '$to_date'";
        $this->db->where($where);
        $this->db->group_by(user_id);
        $query = $this->db->get();
        $count = $this->db->count_all_results();


        /* $select = "SELECT SUM(total_leg) AS total_leg,
          SUM(total_amount) AS total_amount,
          SUM(amount_payable) AS amount_payable,
          SUM(tds) AS tds,
          SUM(service_charge) AS service_charge,
          user_id
          FROM $leg_amount
          WHERE date_of_submission BETWEEN '$from_date' AND '$to_date'
          GROUP BY user_id";
          $result = $this->selectData($select, "Error on selecting leg amount ..");
          $count = mysql_numrows($result); */

        return $count;
    }

    public function payoutWeeklyTotal($limit, $page, $from_date, $to_date, $user = '') {

        //echo "<br/>payoutWeeklyTotal";
        require_once 'LegClass.php';
        $obj_leg = new LegClass();

        if ($user != '') {
            if ($this->table_prefix == "") {
                $this->table_prefix = $this->session->userdata('table_prefix');
            }
            $leg_amount = $this->table_prefix . "leg_amount";

            /* echo "<br/>qr1" . $select = "SELECT SUM(total_leg) AS total_leg,
              SUM(total_amount) AS total_amount,
              SUM(amount_payable) AS amount_payable,
              SUM(tds) AS tds,
              SUM(service_charge) AS service_charge,
              SUM(leg_amount_carry) AS leg_amount_carry,
              user_id
              FROM $leg_amount
              WHERE date_of_submission BETWEEN '$from_date' AND '$to_date' and user_id ='$user'
              GROUP BY user_id limit $page, $limit"; */

            $this->db->select_sum('total_leg', 'total_leg');
            $this->db->select_sum('total_amount', 'total_amount');
            $this->db->select_sum('amount_payable', 'amount_payable');
            $this->db->select_sum('tds', 'tds');
            $this->db->select_sum('service_charge', 'service_charge');
            $this->db->select_sum('leg_amount_carry', 'leg_amount_carry');
            $this->db->select('user_id');
            $this->db->from($leg_amount);
            $where = "date_of_submission BETWEEN '$from_date' AND '$to_date' AND user_id ='$user'";
            $this->db->where($where);
            $this->db->group_by(user_id);
            $this->db->limit($limit, $page);

            $query = $this->db->get();
            //echo "<br/>qry". $this->db->last_query();
        } else {

            if ($this->table_prefix == "") {
                $this->table_prefix = $this->session->userdata('table_prefix');
            }
            $leg_amount = $this->table_prefix . "leg_amount";

            $this->db->select_sum('total_leg', 'total_leg');
            $this->db->select_sum('total_amount', 'total_amount');
            $this->db->select_sum('amount_payable', 'amount_payable');
            $this->db->select_sum('tds', 'tds');
            $this->db->select_sum('service_charge', 'service_charge');
            $this->db->select_sum('leg_amount_carry', 'leg_amount_carry');
            $this->db->select('user_id');
            $this->db->from($leg_amount);
            $where = "date_of_submission BETWEEN '$from_date' AND '$to_date'";
            $this->db->where($where);
            //$this->db->group_by($user);
            $this->db->limit($limit, $page);

            $query = $this->db->get();
            // echo "<br/>qry".$result= $this->db->last_query();
        }
        $i = 0;
        foreach ($query->result_array() as $row) {
            $row1 = array();
            $user_id = $row['user_id'];
            if ($user_id) {
                $row1[$i]["user_id"] = $row['user_id'];
                $row1[$i]["total_leg"] = $row['total_leg'];
                $row1[$i]["total_amount"] = $row['total_amount'];
                $row1[$i]["leg_amount_carry"] = $row['leg_amount_carry'];
                $row1[$i]['user_name'] = $this->obj_val->IdToUserName($user_id);
                $row1[$i]['amount_payable'] = round($row['amount_payable'], 2);
                $row1[$i]['tds'] = round($row['tds'], 2);
                $row1[$i]['service_charge'] = round($row['service_charge'], 2);
                $i++;
            }
        }

        //print_r($row);      
        $weekly_payout_details = $row1;
        //print_r($weekly_payout_details);
        return $weekly_payout_details;
    }

    public function getActivation($from_date = '', $to_date = '', $status = '') {
        require_once 'Leg.php';
        $obj_leg = new Leg();

        if ($from_date == '' AND $to_date == '') {
            if ($this->table_prefix == "") {
                $this->table_prefix = $this->session->userdata('table_prefix');
            }
            $ft_individual = $this->table_prefix . "ft_individual";

            $this->db->select('user_name');
            $this->db->where('active!=', '$status');
            $this->db->from($ft_individual);
            $this->db->group_by(order_id);

            /* $select = "SELECT user_name FROM $ft_individual where active!='$status'
              GROUP BY order_id"; */
        } else {
            if ($this->table_prefix == "") {
                $this->table_prefix = $this->session->userdata('table_prefix');
            }
            $ft_individual = $this->table_prefix . "ft_individual";

            $this->db->select('user_name');
            $this->db->where('active!=', '$status');
            $where = "date_of_submission BETWEEN '$from_date' AND '$to_date'";
            $this->db->where($where);
            $this->db->from($ft_individual);
            $this->db->group_by('order_id');


            /* $select = "SELECT user_name FROM $ft_individual where active!='$status' AND date_of_joining BETWEEN '$from_date' AND '$to_date' GROUP BY order_id "; */
        }
        //echo $select;
        $query = $this->db->get();
        //$result = $this->selectData($select, "Error on selecting Activated User ..");
        $i = 0;
        foreach ($query->result_array() as $row) {
            $actiavtion_details["detail$i"]["user_name"] = $row['user_name'];
            $i++;
        }

        /* while ($row = mysql_fetch_array($result)) {

          $this->actiavtion_details["detail$i"]["user_name"] = $row['user_name'];
          $i++;
          } */

        //print_r($this->actiavtion_details);
    }

    public function updatePaidStatus($POST/* ,$mount_type_arr */) {

        $total_count = $POST['total_count'];
        $current_date = $POST['week_date1'] . " 00:00:00";
        $date_sub = $POST['date_sub'] . " 23:59:59";
        $previous_date = $POST['previous_date'] . " 00:00:00";
        $paid_date = date("Y-m-d H:i:s");

        if (($current_date != "") && ($previous_date != "")) {

            for ($i = 0; $i < $total_count; $i++) {
                $user_id = $POST["user_id$i"];

                if ($POST["active$i"] == 'yes') {
                    $data = array
                        (
                        'paid_status' => 'yes',
                        'paid_date' => $paid_date,
                    );
                    $this->db->where('user_id', $user_id);
                    $this->db->where('paid_status', 'no');
                    $this->db->where('date_of_submission <', $date_sub);
                    $this->db->where('date_of_submission >', $previous_date);
                    $res = $this->db->update('leg_amount', $data);

                    $this->db->select_sum('amount_payable','amount_payable');
                    $this->db->where('user_id', $user_id);
                    $this->db->where('paid_status', 'yes');
                    $this->db->where('paid_date', $paid_date);
                    $this->db->from('leg_amount');
                    $query = $this->db->get();

                    foreach ($query->result_array() as $row) {

                        $paid_id = $user_id;
                        $paid_amount = $row['amount_payable'];
                        $paid_date = $row['paid_date'];
                        $paid_type = "released";
                    }
					$data = array(
						'paid_user_id' => $paid_id,
						'paid_amount' => $paid_amount,
						'paid_date' => $paid_date,
						'paid_type' => $paid_type
					);
					$this->db->insert('amount_paid', $data);
					
					$this->db->set('balance_amount', 'balance_amount -' . $paid_amount, FALSE);
					$this->db->where('user_id', $user_id);
					$res = $this->db->update('user_balance_amount');
                }
            }
        }
        return $res;
    }

    public function getAllBinaryPayoutDates($order = "DESC") {

        $obj_arr = $this->obj_settings->getSettings();

        if (strcmp($obj_arr["payout_release"], "month") == 0) {
            $payout_releasedate = '365 day';
        } elseif (strcmp($obj_arr["payout_release"], "week") == 0) {
            $payout_releasedate = '7 day';
        } else {
            $payout_releasedate = '1 day';
        }

        $current_date = date("Y-m-d H:i:s");
        $newdate = strtotime($payout_releasedate, strtotime($current_date));
        $newdate_1 = date('Y-m-j', $newdate);

        //$qr = "SELECT DISTINCT(release_date) FROM $payout_release_date WHERE  release_date <= '$newdate_1' ORDER BY release_date $order";
        $this->db->distinct('release_date');
        $this->db->from("payout_release_date");
        $this->db->where('release_date <=', $newdate_1);
        $this->db->order_by("release_date", $order);
        $dat_arr = Array();
        $query = $this->db->get();
        //echo $this->db->last_query();
        $i = 0;
        foreach ($query->result() as $row) {

            $timestamp = strtotime($row->release_date);
            $dat_arr[] = date("Y-m-d", $timestamp);
        }
        $dat_arr1 = array_unique($dat_arr);

        return $dat_arr1;
    }

    public function getBeforePayoutDateBinary($date_sub) {
        $check_dates = $date_sub;
        $previous_date = "";
        $arr_dates = $this->getAllBinaryPayoutDates("ASC");
        //print_r($arr_dates);
        $arr_len = count($arr_dates);
        for ($i = 1; $i < $arr_len; $i++) {
            $k = $i - 1;
            $date_from_arr = $arr_dates[$i];
            //  echo "CHECK DATE:$check_dates Arr Date:$date_from_arr ";
            if ($check_dates >= $date_from_arr) {
                $previous_date = $arr_dates[$k];

                break;
            }
        }
        return $previous_date;
    }

    public function getNonPaidAmounts($previous_pyout_date, $date_sub) {

        require_once 'LegClass.php';
        $obj_leg = new LegClass();
        $previous_pyout_date = $previous_pyout_date . " 23:59:59";
        $date_sub_tmp = $date_sub;
        $date_sub = $date_sub . " 23:59:59";

        $before_payout_date = $this->getBeforePayoutDateBinary($date_sub_tmp);

        /* $select = "SELECT SUM(total_leg) AS total_leg,
          SUM(total_amount) AS total_amount,
          SUM(amount_payable) AS amount_payable,
          SUM(tds) AS tds,
          SUM(service_charge) AS service_charge,
          SUM(leg_amount_carry) AS leg_amount_carry,
          user_id,amount_type
          FROM $leg_amount
          WHERE paid_status = 'no' AND released_date ='$date_sub_tmp'  GROUP BY user_id"; */

        $this->db->select_sum('total_leg');
        $this->db->select_sum('total_amount');
        $this->db->select_sum('amount_payable');
        $this->db->select_sum('tds');
        $this->db->select_sum('service_charge');
        $this->db->select_sum('leg_amount_carry');
        $this->db->select('user_id');
        $this->db->select('amount_type');
        $this->db->from('leg_amount');
        $this->db->where('paid_status', 'no');
        $this->db->where('released_date', $date_sub_tmp);
        $this->db->group_by("user_id");
        $query = $this->db->get();
        $i = 0;
        $row1 = array(); 
        foreach ($query->result_array() as $row) {
            
            $user_id = $row['user_id'];
            if ($user_id) {
                $row1[$i]["user_id"] = $row['user_id'];
                $row1[$i]["amount_type"] = $row['amount_type'];
                $row1[$i]['user_name'] = $this->obj_val->IdToUserName($user_id);
                $row1[$i]["fullname"] = $this->obj_val->getFullName($row['user_id']);
                $row1[$i]["total_leg"] = $row['total_leg'];
                $row1[$i]["total_amount"] = round($row['total_amount'],2);
                $row1[$i]["leg_amount_carry"] = $row['leg_amount_carry'];
                $row1[$i]['amount_payable'] = round($row['amount_payable'], 2);
                $row1[$i]['tds'] = round($row['tds'], 2);
                $row1[$i]['service_charge'] = round($row['service_charge'], 2);
                $i++;
            }
        } 
            $weekly_payout_details = $row1;
            return $weekly_payout_details;        
    }

    /* public function getOldPayoutDateBinary($date_sub)
      {


      if($this->table_prefix=="")
      {
      $this->table_prefix= $this->session->userdata('table_prefix');
      }
      $payout_release_date=$this->table_prefix."payout_release_date";
      $qj= "SELECT release_date FROM $payout_release_date WHERE  release_date >'$date_sub' limit 1";
      $res=$this->selectData($qj,"Error on select date 45456");
      $row =mysql_fetch_array($res);
      $previous_date=$row['release_date'];



      return $previous_date;

      //SELECT `release_date` FROM `76_payout_release_date` WHERE `release_date`>2012-02-29 limit 1
      } */
}

?>
