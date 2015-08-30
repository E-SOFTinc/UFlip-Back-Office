<?php

require_once 'Inf_Model.php';
require_once 'validation.php';

Class report_model extends Inf_Model {

    private $OBJ_VALI;

    function __construct() {
        parent::__construct();
        require_once 'validation.php';
        $this->obj_val = new Validation();
        $this->OBJ_VALI = new Validation();
    }

    public function getBankStatement($user_mob_name) {

        $user_id = $this->obj_val->userNameToID($user_mob_name);
        $bank_stmt_arr['details'] = $this->getUserDetails($user_id);
        $bank_stmt_arr['member_payout'] = $this->getMemberPayout($user_mob_name);
        return $bank_stmt_arr;
    }

    /*     * **************************code added by ameen STARTS******************************** */

    public function includereport($u_name) {

        $user_id = $this->OBJ_VALI->userNameToID($u_name);
        $this->db->select("u.*");
        $this->db->from("user_details AS u");
        $this->db->join("ft_individual", "u.user_detail_refid=ft_individual.id", 'INNER');
        $this->db->where("user_detail_refid", $user_id);
        $qr = $this->db->get();
        $profile_arr['details'] = $this->getUserDetailsArray($qr);
        $profile_arr['sponser'] = $this->OBJ_VALI->getSponserIdName($user_id);
        return $profile_arr;
    }

    public function getMemberPayout($user_mob_name) {
        $member_payout_details = array();
        require_once 'LegClass.php';
        $obj_leg = new LegClass();
        $user_id = $this->obj_val->userNameToID($user_mob_name);

        $this->db->select_sum('total_leg', 'total_leg');
        $this->db->select_sum('total_amount', 'total_amount');
        $this->db->select_sum('amount_payable', 'amount_payable');
        $this->db->select_sum('tds', 'tds');
        $this->db->select_sum('service_charge', 'service_charge');
        $this->db->select('user_id');
        $this->db->from('leg_amount');
        $this->db->where('user_id', $user_id);
        $this->db->group_by('user_id');
        $this->db->select('user.user_detail_acnumber,user.user_detail_nbank,user.user_detail_nbranch,user.user_detail_pan,user.user_detail_address');
        $this->db->join('user_details as user', 'user.user_detail_refid=leg_amount.user_id', 'INNER');
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
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
            $member_payout_details["user_pan"] = $row['user_detail_pan'];
            if ($row['user_detail_acnumber'])
                $member_payout_details["acc_number"] = $row['user_detail_acnumber'];
            else
                $member_payout_details["acc_number"] = 'NA';
            if ($row['user_detail_nbank'])
                $member_payout_details["user_bank"] = $row['user_detail_nbank'];
            else
                $member_payout_details["user_bank"] = 'NA';

            if ($row['user_detail_address'])
                $member_payout_details["user_address"] = $row['user_detail_address'];
            else
                $member_payout_details["user_address"] = 'NA';
        }
        return $member_payout_details;
    }

    public function getUserDetails($user_id) {

        $this->db->select('*');
        $this->db->from('user_details');
        $this->db->where('user_detail_refid', $user_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        $i = 1;
        foreach ($query->result_array() as $row) {

            $user_detail["detail$i"]["id"] = $row["user_detail_refid"];
            $user_detail["detail$i"]["name"] = $row["user_detail_name"];
            $user_detail["detail$i"]["address"] = $row["user_detail_address"];
            $user_detail["detail$i"]["town"] = $row["user_detail_town"];
            $user_detail["detail$i"]["country"] = $row["user_detail_country"];
            $user_detail["detail$i"]["state"] = $row["user_detail_state"];
            $user_detail["detail$i"]["district"] = $row["user_detail_district"];
            $user_detail["detail$i"]["pincode"] = $row["user_detail_pin"];
            $user_detail["detail$i"]["passcode"] = $row["user_detail_passcode"];
            $user_detail["detail$i"]["mobile"] = $row["user_detail_mobile"];
            $user_detail["detail$i"]["land"] = $row["user_detail_land"];
            $user_detail["detail$i"]["email"] = $row["user_detail_email"];
            $user_detail["detail$i"]["dob"] = $row["user_detail_dob"];
            $user_detail["detail$i"]["gender"] = $row["user_detail_gender"];
            $user_detail["detail$i"]["nominee"] = $row["user_detail_nominee"];
            $user_detail["detail$i"]["relation"] = $row["user_detail_relation"];
            $user_detail["detail$i"]["acnumber"] = $row["user_detail_acnumber"];
            $user_detail["detail$i"]["ifsc"] = $row["user_detail_ifsc"];
            $user_detail["detail$i"]["nbank"] = $row["user_detail_nbank"];
            $user_detail["detail$i"]["nbranch"] = $row["user_detail_nbranch"];
            $user_detail["detail$i"]["pan"] = $row["user_detail_pan"];
            $user_detail["detail$i"]["level"] = $row["user_level"];
            $user_detail["detail$i"]["date"] = $row["join_date"];
            $user_detail["detail$i"]["town"] = $row["user_detail_town"];
            $user_detail["detail$i"]["referral"] = $row["user_details_ref_user_id"];
            $i++;
        }
        $user_detail = $this->replaceNullFromArray($user_detail, "NA");
        return $user_detail;
    }

    public function userNameToID($user_name) {
        $user_id = $this->OBJ_VALI->userNameToID($user_name);
        return $user_id;
    }

    public function getUserDetailsArray($qr) {
        $user_detail = "";
        foreach ($qr->result_array()as $row) {

            $user_detail[] = $row;
        }
        $user_detail = $this->replaceNullFromArray($user_detail, "NA");



        return $user_detail;
    }

    public function replaceNullFromArray($user_detail, $replace = '') {
        if ($replace == '') {
            $replace = "NA";
        }

        $len = count($user_detail);
        $key_up_arr = array_keys($user_detail);
        for ($i = 1; $i <= $len; $i++) {
            $k = $i - 1;
            $fild = $key_up_arr[$k];
            $arr_key = array_keys($user_detail["$fild"]);
            $key_len = count($arr_key);
            for ($j = 0; $j < $key_len; $j++) {
                $key_field = $arr_key[$j];
                if ($user_detail["$fild"]["$key_field"] == "") {
                    $user_detail["$fild"]["$key_field"] = $replace;
                }
            }
        }
        return $user_detail;
    }

    /*     * ********************code END*********************************** */

    public function getTodaysJoining($today) {
        require_once 'JoiningClass.php';
        $obj_join = new JoiningClass();
        $obj_join->todaysJoining($today);
        $arr = $obj_join->today_join;
        for ($i = 0; $i < count($arr); $i++) {
            $father_id = $arr["detail$i"]["father_id"];
            $arr["detail$i"]["father_user"] = $obj_join->getUserName($father_id);
        }
        return $arr;
    }

    public function getWeeklyJoining($from, $to) {
        require_once 'JoiningClass.php';
        $obj_join = new JoiningClass();
        $arr = $obj_join->weeklyJoining($from, $to);
        for ($i = 0; $i < count($arr); $i++) {
            $father_id = $arr["detail$i"]["father_id"];
            $arr["detail$i"]["father_user"] = $obj_join->getUserName($father_id);
        }
        return $arr;
    }

    public function getTotalPayout($from_date = "", $to_date = "") {
        require_once 'PayoutClass.php';
        $obj_payout = new PayoutClass();
        return $obj_payout->getTotalPayout($from_date, $to_date);
    }

    public function getBankStatement1($user_mob_name) {
        require_once 'PayoutClass.php';
        $obj_payout = new PayoutClass();
        $user_id = $this->OBJ_VALI->userNameToID($user_mob_name);

        $table_prefix = $_SESSION['table_prefix'];

        $user_details = $table_prefix . "user_details";
        $qr = "select * from $user_details
                        where user_detail_refid='" . $user_id . "'";
        $bank_stmt_arr['details'] = $this->getUserDetails($qr);
        $bank_stmt_arr['member_payout'] = $obj_payout->getMemberPayout($user_mob_name);
        return $bank_stmt_arr;
    }

//////////////////////////////////////////////////////////////////////////////////////////////

    public function getReleasedPayoutDetailsEwalletRequest($from_date, $to_date, $status, $mount_type_arr) {


        $details = array();
        $this->db->select('*');
        $this->db->from('amount_paid as a');
        $this->db->join("ft_individual AS f", 'f.id=a.paid_user_id', 'INNER');
        $this->db->where('f.active', 'yes');
        $where = "paid_date  between '$from_date' and '$to_date'";
        $this->db->where($where);
        $query = $this->db->get();

        $i = 0;
        foreach ($query->result_array() as $row) {

            $details["detail$i"]["paid_user_id"] = $this->OBJ_VALI->IdToUserName($row['paid_user_id']);
            $details["detail$i"]["full_name"] = $this->OBJ_VALI->getUserFullName($row['paid_user_id']);
            $details["detail$i"]["paid_amount"] = $row['paid_amount'];
            $details["detail$i"]["paid_date"] = $row['paid_date'];
            $details["detail$i"]["paid_level"] = $row['paid_level'];
            $details["detail$i"]["paid_type"] = $row['paid_type'];

            $i++;
        }

        return $details;
    }

    public function getPayoutRequestEwalletRequest($from_date, $to_date, $status, $mount_type_arr) {


        $details = array();
        $this->db->select('*');
        $this->db->from('payout_release_requests');
        $where = "requested_date  between '$from_date' and '$to_date' AND status ='pending'";
        $this->db->where($where);
        $query = $this->db->get();

        $i = 0;
        foreach ($query->result_array() as $row) {

            $details["detail$i"]["paid_user_id"] = $this->OBJ_VALI->IdToUserName($row['requested_user_id']);
            $details["detail$i"]["full_name"] = $this->OBJ_VALI->getUserFullName($row['requested_user_id']);
            $details["detail$i"]["paid_amount"] = $row['requested_amount'];
            $details["detail$i"]["paid_date"] = $row['requested_date'];
            $details["detail$i"]["status"] = $row['status'];
            $i++;
        }

        return $details;
    }

    public function getReleasedPayoutDetails($released_date, $status, $mount_type_arr) {

        $this->binary_details = array();
        $arr_len = count($mount_type_arr);
        for ($i = 0; $i < $arr_len; $i++) {
            $mount_type = $mount_type_arr[$i];
            if ($i == 0)
                $amount_type_qr = "amount_type = '$mount_type'";
            else
                $amount_type_qr = $amount_type_qr . " OR amount_type = '$mount_type'";
        }

        $this->db->select('SUM(leg.total_amount) AS total_amount');
        $this->db->select('SUM(leg.amount_payable) AS amount_payable');
        $this->db->select('SUM(leg.tds) AS tds');
        $this->db->select('SUM(leg.service_charge) AS service_charge');
        $this->db->select("u.*,f.*");
        $this->db->from("leg_amount As leg");
        $this->db->join("user_details AS u", 'leg.user_id=u.user_detail_refid', 'INNER');
        $this->db->join("ft_individual AS f", 'f.id=u.user_detail_refid', 'INNER');
        $this->db->where('f.active', 'yes');
        $this->db->where("leg.released_date ='$released_date' AND leg.paid_status ='$status'");
        $this->db->group_by('leg.user_id');
        $this->db->order_by('leg.paid_date', 'DESC');
        $select = $this->db->get();
        $i = 0;
        foreach ($select->result_array() as $row) {
            $this->binary_details["detail$i"]["total_amount"] = $row['total_amount'];
            $this->binary_details["detail$i"]["amount_payable"] = $row['amount_payable'];
            $this->binary_details["detail$i"]["tds"] = $row['tds'];
            $this->binary_details["detail$i"]["user_name"] = $row['user_name'];
            $this->binary_details["detail$i"]["user_detail_name"] = $row['user_detail_name'];
            $this->binary_details["detail$i"]["service_charge"] = $row['service_charge'];
            $this->binary_details["detail$i"]["user_detail_acnumber"] = $row['user_detail_acnumber'];
            $this->binary_details["detail$i"]["user_detail_ifsc"] = $row['user_detail_ifsc'];
            $this->binary_details["detail$i"]["user_detail_nbank"] = $row['user_detail_nbank'];
            $this->binary_details["detail$i"]["user_detail_nbranch"] = $row['user_detail_nbranch'];
            $this->binary_details["detail$i"]["user_detail_pan"] = $row['user_detail_pan'];
            $this->binary_details["detail$i"]["user_detail_mobile"] = $row['user_detail_mobile'];
            $this->binary_details["detail$i"]["user_detail_address"] = $row['user_detail_address'];
            $this->binary_details["detail$i"]["state"] = $row['user_detail_state'];
            $this->binary_details["detail$i"]["district"] = $row['user_detail_district'];
            $this->binary_details["detail$i"]["pin"] = $row['user_detail_pin'];
            $i++;
        }

        return $this->binary_details;
    }

    public function getBeforePayoutDateBinary($date_sub) {
        $previous_date = "";
        $check_dates = $date_sub;
        $arr_dates = $this->getAllBinaryPayoutDates("DESC");
        $arr_len = count($arr_dates);
        for ($i = 1; $i < $arr_len; $i++) {
            $k = $i - 1;
            $date_from_arr = $arr_dates[$i];
            if ($check_dates == $date_from_arr) {

                $previous_date = $arr_dates[$k];
                break;
            }
        }

        return $previous_date;
    }

    public function getAllBinaryPayoutDates($order = "DESC") {

        $current_date = date("Y-m-d H:i:s");
        $newdate = strtotime('7 day', strtotime($current_date));
        $newdate_1 = date('Y-m-j', $newdate);
        $this->db->distinct();
        $this->db->select("release_date");
        $this->db->from("payout_release_date");
        $this->db->where("release_date <= '$newdate_1'");
        $this->db->order_by("release_date", $order);
        $res = $this->db->get();

        foreach ($res->result() as $row) {
            $timestamp = strtotime($row->release_date);
            $dat_arr[] = date("Y-m-d", $timestamp);
        }
        $dat_arr1 = array_unique($dat_arr);
        return $dat_arr1;
    }

    public function getEwalletDetails($user_id, $from_date, $to_date) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $fund_transfer_details = $this->table_prefix . "fund_transfer_details";
        $qr1 = "SELECT SUM(amount) AS credit,date FROM $fund_transfer_details WHERE to_user_id='$user_id' AND date BETWEEN '$from_date' AND '$to_date' GROUP BY date";
        $res1 = $this->selectData($qr1, "Error on select date & sum amount111111");
        $qr2 = "SELECT SUM(amount) AS debit,date FROM $fund_transfer_details WHERE from_user_id='$user_id' AND date BETWEEN '$from_date' AND '$to_date' GROUP BY date";
        $res2 = $this->selectData($qr2, "Error on select date & sum amount222222");
        $trans_det = Array();
        $temp = array();
        $i = 0;
        while ($row1 = mysql_fetch_array($res1)) {
            $trans_det["$i"]["credit"] = $row1["credit"];
            $trans_det["$i"]["date"] = $row1["date"];
            $temp[$row1["date"]] = $i;
            $i++;
        }
        $i = 0;
        while ($row2 = mysql_fetch_array($res2)) {
            $k = $temp[$row2["date"]];
            if ($k != "") {
                $trans_det["$k"]["debit"] = $row2["debit"];
            } else {
                $trans_det["$i"]["debit"] = $row2["debit"];
                $trans_det["$i"]["date"] = $row2["date"];
                $i++;
            }
        }
        return $trans_det;
    }

    public function getEwalletDailyDetails($user_id, $date) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $fund_transfer_details = $this->table_prefix . "fund_transfer_details";
        $qr1 = "SELECT SUM(amount) AS credit,date FROM $fund_transfer_details WHERE to_user_id='$user_id' AND date='$date' ";
        $res1 = $this->selectData($qr1, "Error on select date & sum amountdaily111111");
        $qr2 = "SELECT SUM(amount) AS debit,date FROM $fund_transfer_details WHERE from_user_id='$user_id' AND  date='$date' ";
        $res2 = $this->selectData($qr2, "Error on select date & sum amountdaily222222");
        $row1 = mysql_fetch_array($res1);
        $row2 = mysql_fetch_array($res2);
        $trans_daily["0"] ["credit"] = $row1["credit"];
        $trans_daily["0"] ["date"] = $date;
        $trans_daily["0"] ["debit"] = $row2["debit"];
        return $trans_daily;
    }

    /*     * *****************************code added by ameen STARTS********************** */

    public function profileReport($cnt) {

        $user_detail = array();
        $this->db->select("user_name");
        $this->db->from("ft_individual");
        $this->db->where("active", "yes");
        $this->db->limit($cnt);
        $qr = $this->db->get();

        foreach ($qr->result() as $row) {
            $u_name = $row->user_name;
            $user_id = $this->OBJ_VALI->userNameToID($u_name);

            $this->db->select('u.*');
            $this->db->from("user_details AS u");
            $this->db->join("ft_individual", "u.user_detail_refid=ft_individual.id", 'INNER');
            $this->db->where("user_detail_refid", $user_id);
            $qr = $this->db->get();

            foreach ($qr->result_array()as $rows) {
                $sponser_data = $this->OBJ_VALI->getSponserIdName($user_id);
                $rows['sponser_name'] = $sponser_data['name'];
                $rows['sponser_id'] = $sponser_data['id'];
                $rows['uname'] = $row->user_name;
                $user_detail[] = $rows;
            }
            $user_detail = $this->replaceNullFromArray($user_detail, "NA");
        }

        return $user_detail;
    }

    public function profileReportFromTo($count_to, $count_from) {
        $user_detail = array();
        $this->db->select("user_name");
        $this->db->from("ft_individual");
        $this->db->where("active", "yes");
        $this->db->limit($count_to, $count_from);
        $qr = $this->db->get();
        $i = 0;
        foreach ($qr->result() as $row) {
            $u_name = $row->user_name;
            $user_id = $this->OBJ_VALI->userNameToID($u_name);

            $this->db->select("u.*");
            $this->db->from("user_details AS u");
            $this->db->join("ft_individual", "u.user_detail_refid=ft_individual.id", "INNER");
            $this->db->where("user_detail_refid", $user_id);
            $qr = $this->db->get();

            foreach ($qr->result_array()as $rows) {
                $sponser_data = $this->OBJ_VALI->getSponserIdName($user_id);
                $rows['sponser_name'] = $sponser_data['name'];
                $rows['sponser_id'] = $sponser_data['id'];
                $rows['uname'] = $row->user_name;
                $user_detail[] = $rows;
            }

            $user_detail = $this->replaceNullFromArray($user_detail, "NA");
        }

        return $user_detail;
    }

    /*     * ********************code ENDS***************************** */

    public function getPayoutType() {

        $this->db->select("payout_release");
        $this->db->from("configuration");
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            return $row->payout_release;
        }
    }

    public function getDailyPaidoutDetails($paid_date, $amount_type_arr) {

        $this->binary_details = array();
        $arr_len = count($amount_type_arr);
        for ($i = 0; $i < $arr_len; $i++) {
            $mount_type = $amount_type_arr[$i];
            if ($i == 0)
                $amount_type_qr = "amount_type = '$mount_type'";
            else
                $amount_type_qr = $amount_type_qr . " OR amount_type = '$mount_type'";
        }
        $this->db->select('SUM(leg.total_amount) AS total_amount');
        $this->db->select('SUM(leg.amount_payable) AS amount_payable');
        $this->db->select('SUM(leg.tds) AS tds');
        $this->db->select('SUM(leg.service_charge) AS service_charge');
        $this->db->select("u.*,f.*");
        $this->db->from("leg_amount As leg");
        $this->db->join("user_details AS u", 'leg.user_id=u.user_detail_refid', 'INNER');
        $this->db->join("ft_individual AS f", 'f.id=u.user_detail_refid', 'INNER');
        $this->db->where("leg.paid_date like '$paid_date%' AND leg.paid_status ='yes'");
        $this->db->group_by('leg.user_id');
        $this->db->order_by('leg.paid_date', 'DESC');
        $select = $this->db->get();

        $i = 0;
        foreach ($select->result_array() as $row) {
            $this->binary_details["detail$i"]["total_amount"] = $row['total_amount'];
            $this->binary_details["detail$i"]["amount_payable"] = $row['amount_payable'];
            $this->binary_details["detail$i"]["tds"] = $row['tds'];
            $this->binary_details["detail$i"]["user_name"] = $row['user_name'];
            $this->binary_details["detail$i"]["user_detail_name"] = $row['user_detail_name'];
            $this->binary_details["detail$i"]["service_charge"] = $row['service_charge'];
            $this->binary_details["detail$i"]["user_detail_acnumber"] = $row['user_detail_acnumber'];
            $this->binary_details["detail$i"]["user_detail_ifsc"] = $row['user_detail_ifsc'];
            $this->binary_details["detail$i"]["user_detail_nbank"] = $row['user_detail_nbank'];
            $this->binary_details["detail$i"]["user_detail_nbranch"] = $row['user_detail_nbranch'];
            $this->binary_details["detail$i"]["user_detail_pan"] = $row['user_detail_pan'];
            $this->binary_details["detail$i"]["user_detail_mobile"] = $row['user_detail_mobile'];
            $this->binary_details["detail$i"]["user_detail_address"] = $row['user_detail_address'];
            $this->binary_details["detail$i"]["state"] = $row['user_detail_state'];
            $this->binary_details["detail$i"]["district"] = $row['user_detail_district'];
            $this->binary_details["detail$i"]["pin"] = $row['user_detail_pin'];
            $i++;
        }
        return $this->binary_details;
    }

    public function getDailyPaidoutPendingDetails($date, $amount_type_arr) {
        $this->binary_details = array();

        $arr_len = count($amount_type_arr);
        for ($i = 0; $i < $arr_len; $i++) {
            $mount_type = $amount_type_arr[$i];
            if ($i == 0)
                $amount_type_qr = "amount_type = '$mount_type'";
            else
                $amount_type_qr = $amount_type_qr . " OR amount_type = '$mount_type'";
        }
        $this->db->select('SUM(leg.total_amount) AS total_amount');
        $this->db->select('SUM(leg.amount_payable) AS amount_payable');
        $this->db->select('SUM(leg.tds) AS tds');
        $this->db->select('SUM(leg.service_charge) AS service_charge');
        $this->db->select("u.*,f.*");
        $this->db->from("leg_amount As leg");
        $this->db->join("user_details AS u", 'leg.user_id=u.user_detail_refid', 'INNER');
        $this->db->join("ft_individual AS f", 'f.id=u.user_detail_refid', 'INNER');
        $this->db->where("leg.date_of_submission like '$date%' AND leg.paid_status ='no'");
        $this->db->group_by('leg.user_id');
        $this->db->order_by('leg.date_of_submission', 'DESC');
        $select = $this->db->get();

        $i = 0;
        foreach ($select->result_array() as $row) {
            $this->binary_details["detail$i"]["total_amount"] = $row['total_amount'];
            $this->binary_details["detail$i"]["amount_payable"] = $row['amount_payable'];
            $this->binary_details["detail$i"]["tds"] = $row['tds'];
            $this->binary_details["detail$i"]["user_name"] = $row['user_name'];
            $this->binary_details["detail$i"]["user_detail_name"] = $row['user_detail_name'];
            $this->binary_details["detail$i"]["service_charge"] = $row['service_charge'];
            $this->binary_details["detail$i"]["user_detail_acnumber"] = $row['user_detail_acnumber'];
            $this->binary_details["detail$i"]["user_detail_ifsc"] = $row['user_detail_ifsc'];
            $this->binary_details["detail$i"]["user_detail_nbank"] = $row['user_detail_nbank'];
            $this->binary_details["detail$i"]["user_detail_nbranch"] = $row['user_detail_nbranch'];
            $this->binary_details["detail$i"]["user_detail_pan"] = $row['user_detail_pan'];
            $this->binary_details["detail$i"]["user_detail_mobile"] = $row['user_detail_mobile'];
            $this->binary_details["detail$i"]["user_detail_address"] = $row['user_detail_address'];
            $this->binary_details["detail$i"]["state"] = $row['user_detail_state'];
            $this->binary_details["detail$i"]["district"] = $row['user_detail_district'];
            $this->binary_details["detail$i"]["pin"] = $row['user_detail_pin'];
            $i++;
        }
        return $this->binary_details;
    }

    public function getReportdetails() {
        $detail["address"] = "";
        $detail["phone"] = "";
        $detail["email"] = "";
        $detail["logo"] = "";
        $this->db->select('*');
        $this->db->from('site_information');
        $query = $this->db->get();
        foreach ($query->result() as $row) {

            $detail["company_name"] = $row->company_name;
            $detail["address"] = $row->company_address;
            $detail["phone"] = $row->phone;
            $detail["email"] = $row->email;
            $detail["logo"] = $row->logo;
        }
        return $detail;
    }

    //=====================================edited by amrutha

    function getFundTransferDeductReport($week, $year, $type) {
        $result = array();
        $this->db->select('*');
        if ($week != 'all') {

            $this->db->where('WEEKOFYEAR(`date`)', $week);
        }
        if ($year != 'all') {
            $this->db->where('year(`date`)', $year);
        }

        if ($type == "transfer") {
            $this->db->where("amount_type", "admin_credit");
        } else {
            $this->db->where("amount_type", "admin_debit");
        }
        $this->db->from('fund_transfer_details');

        $this->db->join("ft_individual AS f", 'f.id=fund_transfer_details.to_user_id', 'INNER');
        $this->db->where('f.active', 'yes');
        $this->db->order_by("fund_transfer_details.id", "asc");
        $res = $this->db->get();

        $i = 0;
        foreach ($res->result_array() as $row) {

            $result[$i]['to_user_id'] = $row['to_user_id'];
            $result[$i]['user_name'] = $this->obj_val->IdToUserName($row['to_user_id']);
            $result[$i]["full_name"] = $this->obj_val->getFullName($row['to_user_id']);
            $result[$i]['amount'] = $row['amount'];
            $result[$i]['amount_type'] = $row['amount_type'];
            $i++;
        }

        return $result;
    }

    //**************code added by Dijil Palakkal****************
    function rankedUsers($ranks, $from_date, $to_date) {
        $i = 0;
        $rank_details = array();
        foreach ($ranks as $rank) {
            $this->db->select('user_id,new_rank,date');
            $this->db->from('rank_history');
            $this->db->where("new_rank ='" . $rank . "' and date between '$from_date' and '$to_date'");
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                $rank_details[$i]["rank_name"] = $this->getRank($row->new_rank);
                $rank_details[$i]["user_name"] = $this->OBJ_VALI->IdToUserName($row->user_id);
                $rank_details[$i]["user_detail_name"] = $this->userFullName($row->user_id);
                $rank_details[$i]["date"] = $row->date;
                $i++;
            }
        }
        return $rank_details;
    }

    function getRank($rank_id) {

        $rank_name = '';
        $this->db->select('rank_name');
        $this->db->from('rank_details');
        $this->db->where('rank_id', "$rank_id");
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $rank_name = $row->rank_name;
        }
        return $rank_name;
    }

    function userFullName($user_id) {
        $user_full_name = '';
        $this->db->select('user_detail_name');
        $this->db->from('user_details');
        $this->db->where('user_detail_refid', "$user_id");
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_full_name = $row->user_detail_name;
        }
        return $user_full_name;
    }

    //---------------------end code of Dijil-------------------
    function salesReport($from_date, $to_date) {
        $i = 0;
        $sum = 0;
        $detail = array();
        $this->db->select('*');
        $this->db->from('sales_order');
        $where = "date_submission  between '$from_date' and '$to_date'";
        $this->db->where($where);

        $query = $this->db->get();
        foreach ($query->result() as $row) {

            $detail[$i]["id"] = $row->id;
            $detail[$i]["invoice_no"] = $row->invoice_no;
            $detail[$i]["prod_id"] = $this->OBJ_VALI->getPrdocutName($row->prod_id);
            $detail[$i]["user_id"] = $this->OBJ_VALI->IdToUserName($row->user_id);
            $detail[$i]["amount"] = $row->amount;
            $detail[$i]['date_submission'] = $row->date_submission;
            $detail[$i]['payment_method'] = $row->payment_method;
            $sum+= $detail[$i]["amount"];
            $detail[$i]['sum'] = $sum;
            $i++;
        }
        // echo $this->db->last_query();
        return $detail;
    }

    function productSalesReport($prod_id) {

        $i = 0;
        $sum = 0;
        $detail = array();
        if ($prod_id == 'all') {
            $this->db->select('*');
            $this->db->from('sales_order');
        } else {
            $this->db->select('*');
            $this->db->from('sales_order');
            $this->db->where("prod_id", $prod_id);
        }


        $query = $this->db->get();
        foreach ($query->result() as $row) {

            $detail[$i]["id"] = $row->id;
            $detail[$i]["invoice_no"] = $row->invoice_no;
            $detail[$i]["prod_id"] = $this->OBJ_VALI->getPrdocutName($row->prod_id);
            $detail[$i]["user_id"] = $this->OBJ_VALI->IdToUserName($row->user_id);
            $detail[$i]["amount"] = $row->amount;
            $detail[$i]['date_submission'] = $row->date_submission;
            $detail[$i]['payment_method'] = $row->payment_method;
            $sum+= $detail[$i]["amount"];
            $detail[$i]['sum'] = $sum;
            $i++;
        }
        // echo $this->db->last_query();
        return $detail;
    }

    /////////// --- Code added by Dijil Palakkal----------------
     function getCommisionDetails($type, $from_date, $to_date) {

        $i = 0;
        $details = array();
        $count = count($type);
        $from_date=$from_date." 00:00:00";
        $to_date=$to_date." 23:59:59";


        $this->db->select('user_id,from_id,amount_type,date_of_submission');
//        $this->db->select("SUM(total_amount) as total_amount");
//        $this->db->select("SUM(amount_payable) as amount_payable");
        $this->db->select("total_amount");
        $this->db->select("amount_payable");
        $this->db->from('leg_amount');
        //$where2 = "amount_type like '$type[0]'";
        //for ($j = 1; $j < $count; $j++) {
        //    $where2 = $where2 . " OR amount_type like '$type[$j]'";
        //}
        //$this->db->where($where2);
        $this->db->where_in('amount_type',$type);
        $this->db->where("date_of_submission between '$from_date' AND '$to_date'");
        //$this->db->group_by('user_id');
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            foreach ($query->result_array() as $row) {


                $details[$i]['user_name'] = $this->validation->IdToUserName($row['user_id']);
                $details[$i]['full_name'] = $this->validation->getFullName($row['user_id']);
                $details[$i]['from_user'] = $this->validation->IdToUserName($row['from_id']);
                $view_amt=$this->validation->getViewAmountType($row['amount_type']);
                $details[$i]['amount_type'] = $row['amount_type'];
                $details[$i]['view_amt'] = $view_amt;
                $details[$i]['date'] = $row['date_of_submission'];
                $details[$i]['total_amount'] = $row['total_amount'];
                $details[$i]['amount_payable'] = $row['amount_payable'];
                $i = $i + 1;
            }
        }


        return $details;
    }

    ////////------ end of code ----------- Dijil Palakkal---
    function getUsedPin() {
        $i=0;
        $detail = array();
        $this->db->select('*');
        $this->db->from('pin_used');
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {

            $detail[$i]["id"] = $row['pin_id'];
            $detail[$i]["pin_number"] = $row['pin_number'];
            $detail[$i]["used_user"] =  $this->OBJ_VALI->IdToUserName($row['used_user']);
            $detail[$i]["pin_alloc_date"] = $row['pin_alloc_date'];
            $detail[$i]["pin_amount"] = $row['pin_amount'];
            $detail[$i]['pin_balance_amount'] = $row['pin_balance_amount'];
            $i++;
        }
        
        return $detail;
    }
    
    //********* Code added by AFFAR *************//
    function getAmountPaid($from_date, $to_date)
    {
        $result=array();
        $this->db->select('paid_user_id, paid_amount, paid_date');
        $this->db->from('amount_paid');
        $condition="paid_date BETWEEN '$from_date' AND '$to_date'";
        $this->db->where($condition);
        $this->db->where('paid_type', "released");
        $array=$this->db->get()->result_array();
        $i=0;
        foreach ($array as $value)
        {
            $t=$this->getUserDetail($value['paid_user_id']);
            $user_name=$this->idToUsername($value['paid_user_id']);
            $result[$i]['user_name']=$user_name;
            $result[$i]['fullname']=$t['user_detail_name'];
            $result[$i]['address']=$t['user_detail_address'];
            if($t['user_detail_nbank']=="")
            {
                $t['user_detail_nbank']="NA";
            }
            $result[$i]['bank']=$t['user_detail_nbank'];
            if($t['user_detail_acnumber']=="")
            {
                $t['user_detail_acnumber']="NA";
            }
            $result[$i]['account_number']=$t['user_detail_acnumber'];
            $result[$i]['amount']=$value['paid_amount'];
            $result[$i]['date']=$value['paid_date'];
            $i++;
        }
        return $result;
    }

    function getUserDetail($user_id)
    {
        $this->db->select('user_detail_name, user_detail_address, user_detail_acnumber, user_detail_nbank');
        $this->db->from('user_details');
        $this->db->where('user_detail_refid', $user_id);
        $temp = $this->db->get()->result_array();
        return $temp[0];
    }
    
    function idToUsername($user_id)
    {
        $this->db->select('user_name');
        $this->db->from('login_user');
        $this->db->where('user_id', $user_id);
        $temp=$this->db->get()->result_array();
        return $temp[0]['user_name'];
    }
}
