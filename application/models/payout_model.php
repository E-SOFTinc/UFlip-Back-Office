<?php

require_once 'Inf_Model.php';

class payout_model extends Inf_Model {

    private $obj_payout;
    private $obj_page;
    public $obj_val;
    public $obj_reg;

    function __construct() {

        parent::__construct();

        require_once 'PayoutClass.php';
        $this->obj_payout = new PayoutClass();

        require_once 'PayoutClass.php';
        $this->obj_page = new PayoutClass();

        require_once 'Page.php';
        $this->obj_page = new Page();

        require_once 'validation.php';
        $this->obj_val = new Validation();

        require_once 'register_model.php';
        $this->obj_reg = new register_model();
    }

    public function paging($page, $limit, $url) {
        $numrows = $this->obj_payout->payoutWeeklyPage($this->session->userdata('from'), $this->session->userdata('to'));
        $page_arr['first'] = $this->obj_page->paging($page, $limit, $numrows);
        $page_arr['page_footer'] = $this->obj_page->paging($page, $limit, $url);
        return $page_arr;
    }

    public function payoutWeeklyTotal($limit, $page, $from, $to, $user_id = "") {
        $row1 = array();
        if ($user_id == "") {
            $this->db->select_sum('leg_amount.total_leg', 'total_leg');
            $this->db->select_sum('total_amount', 'total_amount');
            $this->db->select_sum('amount_payable', 'amount_payable');
            $this->db->select_sum('tds', 'tds');
            $this->db->select_sum('service_charge', 'service_charge');
            $this->db->select_sum('leg_amount_carry', 'leg_amount_carry');
            $this->db->select('user_id');
            $this->db->from('leg_amount');
            $this->db->join('ft_individual AS ft', 'ft.id = leg_amount.user_id', 'INNER');
            $where = "date_of_submission BETWEEN '$from' AND '$to'";
            $this->db->where($where);
            $this->db->where('ft.active', 'yes');
            $this->db->group_by('user_id');
            $this->db->limit($limit, $page);

            $query = $this->db->get();
        } else {
            $this->db->select_sum('total_leg', 'total_leg');
            $this->db->select_sum('total_amount', 'total_amount');
            $this->db->select_sum('amount_payable', 'amount_payable');
            $this->db->select_sum('tds', 'tds');
            $this->db->select_sum('service_charge', 'service_charge');
            $this->db->select_sum('leg_amount_carry', 'leg_amount_carry');
            $this->db->select('user_id');
            $this->db->from('leg_amount');
            $this->db->join('ft_individual AS ft', 'ft.id = leg_amount.user_id', 'INNER');
            $where = "date_of_submission BETWEEN '$from' AND '$to' AND user_id ='$user_id'";
            $this->db->where($where);
            $this->db->where('ft.active', 'yes');
            $this->db->group_by('user_id');
            $this->db->limit($limit, $page);
            $query = $this->db->get();
        }
        $i = 0;
        $row1 = array();
        foreach ($query->result_array() as $row) {
            $row1[$i]["user_id"] = $row['user_id'];
            $row1[$i]["total_leg"] = $row['total_leg'];
            $row1[$i]["total_amount"] = $row['total_amount'];
            $row1[$i]["leg_amount_carry"] = $row['leg_amount_carry'];
            $row1[$i]['user_name'] = $this->obj_val->IdToUserName($row['user_id']);
            $row1[$i]['full_name'] = $this->obj_val->getUserFullName($row['user_id']);
            $row1[$i]['amount_payable'] = round($row['amount_payable'], 2);
            $row1[$i]['tds'] = round($row['tds'], 2);
            $row1[$i]['service_charge'] = round($row['service_charge'], 2);
            $i++;
        }
        return $row1;
    }

    public function getIncome($username) {

        $income_arr = array();
        $user_id = $this->obj_val->userNameToID($username);

        $this->db->select('user_id,released_date,paid_status');
        $this->db->select_sum('total_amount');
        $this->db->select_sum('amount_payable');
        $this->db->select_sum('tds', 'tds');
        $this->db->select_sum('service_charge');
        $this->db->where('released_date !=', '0000-00-00');
        $this->db->where('user_id', $user_id);
        $this->db->group_by('released_date');
        $this->db->from("leg_amount");
        $query = $this->db->get();

        $i = 0;
        foreach ($query->result_array() as $row) {
            $income_arr["detail$i"]["paid_status"] = $row['paid_status'];
            $income_arr["detail$i"]["total_amount"] = round($row['total_amount'], 2);
            $income_arr["detail$i"]["amount_payable"] = round($row['amount_payable'], 2);
            $income_arr["detail$i"]["release_date"] = $row['released_date'];
            $income_arr["detail$i"]["process_charge"] = round($row['service_charge'], 2);
            $income_arr["detail$i"]["tds"] = round($row['tds'], 2);
            $join_date = $this->getJoiningDate($user_id);
            $income_arr["detail$i"]["week_no"] = $this->getWeekNo($row['released_date'], $join_date);
            $income_arr["detail$i"]["start_date"] = $this->getBeforePayoutDate($row['released_date']);
            $i++;
        }
        return $income_arr;
    }

    public function getAllBinaryPayoutDates($des) {
        return $this->obj_payout->getAllBinaryPayoutDates("DESC");
    }

    public function getBeforePayoutDate($date_sub) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $this->session->userdata('table_prefix');
        }

        $this->db->select('release_date');
        $this->db->where('release_date < ', $date_sub);
        $this->db->order_by("release_date", "desc");
        $this->db->limit(1);
        $this->db->from("payout_release_date");
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row->release_date;
        }
    }

    public function updatePaidStatus($post) {
        return $this->obj_payout->updatePaidStatus($post);
    }

    public function getBeforePayoutDateBinary($date_sub) {
        return $this->obj_payout->getBeforePayoutDateBinary($date_sub);
    }

    public function getNonPaidAmounts($previous_pyout_date, $date_sub) {
        return $this->obj_payout->getNonPaidAmounts($previous_pyout_date, $date_sub);
    }

    public function insertPayoutDate($date) {

        $payout = "payout_release_date";

        $data = array(
            'release_date' => $date
        );

        $res = $this->db->insert("$payout", $data);

        return $res;
    }

    public function getJoiningDate($user_id) {
        $this->db->select('join_date');
        $this->db->where('user_detail_refid', "$user_id");
        $this->db->from("user_details");
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row->join_date;
        }
    }

    public function getWeekNo($release_date, $join_date) {

        $date1 = strtotime($release_date);
        $date2 = strtotime($join_date);
        $dateDiff = $date1 - $date2;
        $fullDays = floor($dateDiff / (60 * 60 * 24));
        $week = round($fullDays / 7);
        return $week;
    }

    public function getPayoutUserDetails($previous_pyout_date, $date_sub) {

        $payout_type = $this->getPayoutType();

        if ($payout_type == "daily") {
            $this->db->select('a.user_name');
            $this->db->select('b.user_id ');
            $this->db->select_sum('total_amount');
            $this->db->select_sum('amount_payable');
            $this->db->select('b.paid_status ');
            $this->db->select('b.amount_type ');
            $this->db->select('c.user_detail_name');
            $this->db->select('c.user_detail_address');
            $this->db->select('c.user_detail_mobile');
            $this->db->select('c.user_detail_nbank');
            $this->db->select('c.user_detail_nbranch');
            $this->db->select('c.user_detail_acnumber');
            $this->db->select(' c.user_detail_ifsc');
            $this->db->from("ft_individual AS a");
            $this->db->join("leg_amount AS b", 'a.id = b.user_id', 'inner');
            $this->db->join("user_details AS c", 'a.id = c.user_detail_refid', 'inner');
            $this->db->like('date_of_submission', $date_sub, 'after');
            $this->db->where('paid_status', 'no');
            $this->db->where('active', 'yes');
            $this->db->group_by('a . id');
            $query = $this->db->get();
        } else {
            $this->db->select('a.user_name');
            $this->db->select('b.user_id ');
            $this->db->select_sum('total_amount');
            $this->db->select_sum('amount_payable');
            $this->db->select('b.paid_status ');
            $this->db->select('b.amount_type ');
            $this->db->select('c.user_detail_name');
            $this->db->select('c.user_detail_address');
            $this->db->select('c.user_detail_mobile');
            $this->db->select('c.user_detail_nbank');
            $this->db->select('c.user_detail_nbranch');
            $this->db->select('c.user_detail_acnumber');
            $this->db->select(' c.user_detail_ifsc');
            $this->db->from("ft_individual AS a");
            $this->db->join("leg_amount AS b", 'a.id = b.user_id', 'inner');
            $this->db->join("user_details AS c", 'a.id = c.user_detail_refid', 'inner');
            $this->db->where('released_date', $date_sub);
            $this->db->where('paid_status', 'no');
            $this->db->where('active', 'yes');
            $this->db->group_by('a . id');
            $query = $this->db->get();
        }

        $release = array();
        $i = 0;
        foreach ($query->result_array() as $row) {
            $release["$i"]['name'] = $row['user_name'];
            $release["$i"]['uid'] = $row['user_id'];
            $release["$i"]['total_amount'] = $row['total_amount'];
            $release["$i"]['amount_payable'] = $row['amount_payable'];
            $release["$i"]['status'] = $row['paid_status'];
            $release["$i"]['type'] = $row['amount_type'];
            $release["$i"]['user_name'] = $row['user_detail_name'];
            $release["$i"]['address'] = $row['user_detail_address'];
            $release["$i"]['mobile'] = $row['user_detail_mobile'];
            $release["$i"]['bank'] = $row['user_detail_nbank'];
            $release["$i"]['branch'] = $row['user_detail_nbranch'];
            $release["$i"]['acc'] = $row['user_detail_acnumber'];
            $release["$i"]['ifsc'] = $row['user_detail_ifsc'];
            $i++;
        }

        return $release;
    }

    public function getPayoutType() {
        $this->db->select('payout_release');
        $this->db->from("configuration");
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row->payout_release;
        }
    }

    public function getUnPaidAmount($date) {

        $this->db->select_sum('total_leg');
        $this->db->select_sum('total_amount');
        $this->db->select_sum('amount_payable');
        $this->db->select_sum('tds', 'tds');
        $this->db->select_sum('service_charge');
        $this->db->select_sum('leg_amount_carry');
        $this->db->select('user_id');
        $this->db->select('amount_type');
        $this->db->from('leg_amount');
        $this->db->join('ft_individual AS ft', 'ft.id = leg_amount.user_id', 'INNER');
        $this->db->where('paid_status', 'no');
        $this->db->where('ft.active', 'yes');
        $this->db->like('date_of_submission', $date, 'after');
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
                $row1[$i]["total_amount"] = round($row['total_amount'], 2);
                $row1[$i]["leg_amount_carry"] = $row['leg_amount_carry'];
                $row1[$i]['amount_payable'] = round($row['amount_payable'], 2);
                $row1[$i]['tds'] = round($row['tds'], 2);
                $row1[$i]['service_charge'] = round($row['service_charge'], 2);
                $i++;
            }
        }
        $payout_details = $row1;
        return $payout_details;
    }

    public function payDailyAmount($post) {
        ///////////////////////// CODE EDITED BY JIJI \\\\\\\\\\\\\\\\\\\\\\\\\

        $total_count = $post['total_count'];
        for ($i = 0; $i < $total_count; $i++) {
            $user_id = $post["user_id$i"];
            $key = "active$i";

            if (array_key_exists($key, $post)) {
                //if the array index [active$i] exists in array $post...

                if ($post["active$i"] == "yes") {
                    $paid_date = date("Y-m-d H:i:s");
                    $date_sub = $this->session->userdata('payout_date');

                    $data = array
                        (
                        'paid_status' => 'yes',
                        'paid_date' => $paid_date,
                    );

                    $this->db->where('user_id', $user_id);
                    $this->db->where('paid_status', 'no');
                    $this->db->like('date_of_submission', $date_sub);
                    $res = $this->db->update('leg_amount', $data);

                    $this->db->where('user_id', $user_id);
                    $this->db->where('paid_status', 'yes');
                    $this->db->from("leg_amount");
                    $query = $this->db->get();

                    foreach ($query->result_array() as $row) {
                        $paid_id = $user_id;
                        $paid_amount = $row['total_amount'];
                        $paid_date = $row['paid_date'];
                        $paid_type = "released";

                        $data = array(
                            'paid_user_id' => $paid_id,
                            'paid_amount' => $paid_amount,
                            'paid_date' => $paid_date,
                            'paid_type' => $paid_type
                        );

                        $this->db->insert('amount_paid', $data);
                    }
                }
            }
        }
        return $res;
    }

    public function getPayoutReleasePercentages($user_id = '') {
        //code added by jiji

        $payout_details = array();


        $released_payouts = $this->getReleasedPayoutCount($user_id);
        $pending_payouts = $this->getPendingPayoutCount($user_id);
        $total_payouts = $pending_payouts + $released_payouts;
        if ($total_payouts > 0) {
            $released_payouts_percentage = ($released_payouts / $total_payouts) * 100;
            $pending_payouts_percentage = ($pending_payouts / $total_payouts) * 100;
        } else {
            $released_payouts_percentage = 100;
            $pending_payouts_percentage = 0;
        }

        $payout_details["released"] = $released_payouts_percentage;
        $payout_details["pending"] = $pending_payouts_percentage;

        return $payout_details;
    }

    public function getReleasedPayoutCount($user_id = '') {

        $count = 0;
        if ($user_id == "") {
            $this->db->select('*');
            $this->db->from("leg_amount");
            $this->db->where("paid_status", 'yes');
            $count = $this->db->count_all_results();
        } else {
            $this->db->select('*');
            $this->db->from("leg_amount");
            $this->db->where("paid_status", 'yes');
            $this->db->where("user_id", $user_id);
            $count = $this->db->count_all_results();
        }
        return $count;
    }

    public function getPendingPayoutCount($user_id = '') {
        $count = 0;
        if ($user_id == "") {
            $this->db->select('*');
            $this->db->from("leg_amount");
            $this->db->where("paid_status", 'no');
            $count = $this->db->count_all_results();
        } else {
            $this->db->select('*');
            $this->db->from("leg_amount");
            $this->db->where("paid_status", 'no');
            $this->db->where("user_id", $user_id);
            $count = $this->db->count_all_results();
        }
        return $count;
    }

    public function getPayoutDetails($payout_release_type, $amount = "") {
        //Code added by Jiji
        $details = array();
        if ($amount == "") {
            $amount = $this->getMinimumPayoutAmount();
        }
        if ($payout_release_type == "from_ewallet") {
            $this->db->select('usr.user_id,usr.balance_amount,ft.user_name,ud.user_detail_name');
            $this->db->from('user_balance_amount AS usr');
            $this->db->join('ft_individual AS ft', 'ft.id = usr.user_id', 'INNER');
            $this->db->join('user_details AS ud', 'ud.user_detail_refid = usr.user_id', 'INNER');
            $this->db->where('active', "yes");
            $this->db->where('balance_amount >=', $amount);
            $this->db->order_by('balance_amount', "DESC");
            $query = $this->db->get();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $details["user$i"]["id"] = $row["user_id"];
                $details["user$i"]["balance_amount"] = $row["balance_amount"];
                $details["user$i"]["user_name"] = $row["user_name"];
                $details["user$i"]["user_detail_name"] = $row["user_detail_name"];
                $details["user$i"]["payout_amount"] = $amount;
                $details["user$i"]["requested_date"] = "";
                $i++;
            }
        } else {

            $req_validity = $this->getPayoutRequestValidity();
            $current_date = date("Y-m-d H:i:s");
            $this->db->select('pr.req_id,pr.requested_user_id,pr.requested_date,pr.requested_amount,ft.user_name');
            $this->db->from('payout_release_requests AS pr');
            $this->db->join('ft_individual AS ft', 'ft.id = pr.requested_user_id', 'INNER');
            $this->db->where('active', "yes");
            $this->db->where('requested_amount >=', $amount);
            $this->db->where('status', "pending");
            $this->db->order_by('pr.requested_date', "DESC");
            $query = $this->db->get();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $requested_date = $row["requested_date"];
                $req_id = $row["req_id"];
                $diff = abs(strtotime($requested_date) - strtotime($current_date));
                $days = floor(($diff) / (60 * 60 * 24));
                $balance_amount = $this->getUserBalanceAmount($row["requested_user_id"]);
                $requested_amount = $row["requested_amount"];
                if ($days > $req_validity || $balance_amount < $requested_amount) {
                    $this->db->set('status', "inactive");
                    $this->db->where('status', "pending");
                    $this->db->where('req_id', $req_id);
                    $this->db->update('payout_release_requests');
                } else {
                    $details["user$i"]["req_id"] = $row["req_id"];
                    $details["user$i"]["id"] = $row["requested_user_id"];
                    $details["user$i"]["balance_amount"] = $this->getUserBalanceAmount($row["requested_user_id"]);
                    $details["user$i"]["payout_amount"] = $row["requested_amount"];
                    $details["user$i"]["user_name"] = $row["user_name"];
                    $details["user$i"]["user_detail_name"] = $this->obj_val->getUserFullName($row["requested_user_id"]);
                    $details["user$i"]["requested_date"] = $row["requested_date"];
                    $i++;
                }
            }
        }
        return $details;
    }

    public function getMinimumPayoutAmount() {
        $amount = 0;
        $this->db->select('min_payout');
        $this->db->from('configuration');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $amount = $row->min_payout;
        }
        return $amount;
    }

    public function getPayoutRequestValidity() {
        $request_validity = 0;
        $this->db->select('payout_request_validity');
        $this->db->from('configuration');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $request_validity = $row->payout_request_validity;
        }
        return $request_validity;
    }

    public function getUserBalanceAmount($user_id) {
        //Code Added by jiji
        $user_balance = 0;
        $this->db->select('balance_amount');
        $this->db->from("user_balance_amount");
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $user_balance = $row->balance_amount;
        }
        return $user_balance;
    }

    public function updateUserBalanceAmount($user_id, $payout_release_amount, $payout_release_type, $requested_date) {

        //Code Added by jiji
        //update user balance amount
        $res = 0;
        $balance_amount = $this->getUserBalanceAmount($user_id);
        if ($balance_amount >= $payout_release_amount && $payout_release_amount > 0) {
            $this->db->set('balance_amount', "balance_amount - $payout_release_amount", FALSE);
            $this->db->where('user_id', $user_id);
            $res = $this->db->update('user_balance_amount');
            if ($res) {
                //insert into amount paid
                $date = date("Y-m-d");
                $data = array(
                    'paid_user_id' => $user_id,
                    'paid_amount' => $payout_release_amount,
                    'paid_date' => $date,
                    'paid_type' => "released"
                );

                $res1 = $this->db->insert("amount_paid", $data);
                if ($payout_release_type == "ewallet_request") {
                    //update payout release request status
                    $this->db->set('status', '"released"', FALSE);
                    $this->db->where('requested_user_id', "$user_id");
                    $this->db->where('status', "pending");
                    $this->db->where('requested_date', "$requested_date");
                    $this->db->update('payout_release_requests');
                }
            }
        }
        return $res;
    }

    public function insertPayoutReleaseRequest($user_id, $payout_amount, $request_date, $status = "pending") {
        //Code added by Jiji

        $data = array(
            'requested_user_id' => $user_id,
            'requested_amount' => $payout_amount,
            'requested_date' => $request_date,
            'status' => $status
        );

        $res = $this->db->insert('payout_release_requests', $data);
        return $res;
    }

    public function IdToUserName($user_id) {

        $user_name = "";
        $this->db->select('user_name');
        $this->db->from('ft_individual');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_name = $row->user_name;
        }
        return $user_name;
    }

    public function getRequestPendingAmount($user_id) {
        $req_amount = "";
        $this->db->select_sum('requested_amount');
        $this->db->where('requested_user_id', $user_id);
        $this->db->where('status', 'pending');
        $this->db->from('payout_release_requests');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $req_amount = $row->requested_amount;
        }
        return $req_amount;
    }

    public function deletePayoutRequest($del_id) {
        
        $this->db->set("status",'inactive');
        $this->db->where("req_id", $del_id);
        $res = $this->db->update("payout_release_requests");
        return $res;
    }

    public function getMonthlyDetails($date) {
        $date = strtotime($date);
        $month = date("m", $date);
        $year = date("Y", $date);
        $this->db->select('product_id');
        $this->db->where('active', 'yes');
        $this->db->where('month(date_of_joining)', $month);
        $this->db->where('year(date_of_joining)', $year);

        $this->db->from('ft_individual');
        $res = $this->db->get();
        $toatal_amount = 0;
        foreach ($res->result_array() as $row) {
            $toatal_amount +=$this->gteProductValue($row['product_id']);
        }
        return $toatal_amount;
    }

    public function gteProductValue($pd_id) {
        $this->db->select('product_value');
        $this->db->where('product_id', $pd_id);
        $this->db->from('product');
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
            return $row['product_value'];
        }
    }

    public function getMonthlyCommisionDetails($date) {
        $date = strtotime($date);
        $month = date("m", $date);
        $year = date("Y", $date);
        $this->db->select_sum('total_amount');
        $this->db->select('amount_type');
        $this->db->where('month(date_of_submission)', $month);
        $this->db->where('year(date_of_submission)', $year);
        $this->db->group_by('amount_type');
        $this->db->from('leg_amount');
        $res = $this->db->get();
        $i = 0;
        $result['total'] = 0;
        foreach ($res->result_array() as $row) {
            $result[$i]['total_amount'] = $row['total_amount'];
            $result[$i]['amount_type'] = $row['amount_type'];
            $result['total']+=$row['total_amount'];
            $i++;
        }
        return $result;
    }

    public function getUserDetails($user_id) {
        $this->db->select('*');
        $this->db->where('user_detail_refid', $user_id);
        $this->db->from('user_details');
        $res = $this->db->get();
        $i = 0;
        foreach ($res->result_array() as $row) {
            $result[$i]['name'] = $row['user_detail_name'];
            $result[$i]['address'] = $row['user_detail_address'];
            $result[$i]['pin'] = $row['user_detail_pin'];
            $result[$i]['email'] = $row['user_detail_email'];
            $result[$i]['user_name'] = $this->obj_val->IdToUserName($user_id);
            $result[$i]['mobile'] = $row['user_detail_mobile'];
            $result[$i]['country'] = $row['user_detail_country'];
//            $result[$i]['city'] = $row['user_detail_city'];
            $result[$i]['dob'] = $row['user_detail_dob'];
            if ($row['user_detail_gender'] == 'M')
                $result[$i]['gender'] = "Male";
            else
                $result[$i]['gender'] = "Female";
            $result[$i]['pan'] = $row['user_detail_pan'];
            $result[$i]['acc'] = $row['user_detail_acnumber'];
            $result[$i]['bank'] = $row['user_detail_nbank'];
            $result[$i]['branch'] = $row['user_detail_nbranch'];
            $i++;
        }
        return $result;
    }
    
    function getIncomeStatement($username)
    {
        $result=array();
        $user_id = $this->obj_val->userNameToID($username);
        $this->db->select('paid_amount, paid_date, paid_type');
        $this->db->from('amount_paid');
        $this->db->where('paid_type', "released");
        $this->db->where('paid_user_id', $user_id);
        $array=$this->db->get()->result_array();
        $i=0;
        foreach ($array as $value)
        {
            $result[$i]['amount']=$value['paid_amount'];
            $result[$i]['date']=$value['paid_date'];
            $result[$i]['status']=$value['paid_type'];
            $i++;
        }
        return $result;
    }

}