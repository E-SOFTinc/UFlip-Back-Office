<?php

require_once 'Inf_Model.php';

class select_report_model extends Inf_Model {

    private $obj_payout;
    private $obj_page;

    public function __construct() {
        parent::__construct();
        require_once 'SelectReportClass.php';
        $this->obj_payout = new SelectReportClass();
        require_once 'Page.php';
        $this->obj_page = new Page();
    }

    public function paging($page, $limit, $url) {
        $numrows = $this->obj_payout->payoutWeeklyPage($_SESSION['from'], $_SESSION['to']);
        $page_arr['first'] = $this->obj_page->paging($page, $limit, $numrows);
        $page_arr['page_footer'] = $this->obj_page->paging($page, $limit, $url);
        return $page_arr;
    }

    public function payoutWeeklyTotal($limit, $page, $from, $to, $user_id = "") {
        return $this->obj_payout->payoutWeeklyTotal($limit, $page, $from, $to, $user_id);
    }

    //////edited
    public function getAllBinaryPayoutDates($des) {
        return $this->obj_payout->getAllBinaryPayoutDates("DESC");
    }

    public function updatePaidStatus($POST) {
        return $this->obj_payout->updatePaidStatus($POST);
    }

    public function getBeforePayoutDateBinary($date_sub) {
        return $this->obj_payout->getBeforePayoutDateBinary($date_sub);
    }

    public function getNonPaidAmounts($previous_pyout_date, $date_sub) {
        return $this->obj_payout->getNonPaidAmounts($previous_pyout_date, $date_sub);
    }

    public function getPayoutType() {
        $payout_release = "";
        $this->db->select("payout_release");
        $this->db->from("configuration");
        $res = $this->db->get();

        foreach ($res->result() as $row) {
            $payout_release = $row->payout_release;
        }
        return $payout_release;
    }

    public function getPayoutReleaseStatus() {
        $payout_release_status = "";
        $this->db->select("payout_release_status");
        $this->db->from("module_status");
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            $payout_release_status = $row->payout_release_status;
        }
        return $payout_release_status;
    }

    //////////////////////code added by ameen//////////////////////////////////////////////////////
    //////////////////////for ajax////////////////////////////////////////////////////////////////
    public function selectUser($letters) {

        $this->db->select('id,user_name');
        $this->db->from("ft_individual");
        $this->db->where('active !=', 'server');
        $this->db->like('user_name', $letters, 'after');
        $this->db->order_by('id');
        $this->db->limit(500);
        $qr = $this->db->get();
        $str = "";
        foreach ($qr->result() as $row) {
            $str.= $row->id . "###" . $row->user_name . "|";
        }
        return $str;
    }
     public function selectEpin($letters) {
        $this->db->select('pin_id,pin_numbers');
        $this->db->from("pin_numbers");
        $this->db->where('status', 'yes');
        $this->db->like('pin_numbers', $letters, 'after');
        $this->db->order_by('pin_id');
        $this->db->limit(500);
        $qr = $this->db->get();
        $str = "";
        foreach ($qr->result() as $row) {
            $str.= $row->pin_id . "###" . $row->pin_numbers . "|";
        }
        return $str;
     }

    public function getAllRank() {
        $rank_arr = array();
        $this->db->select('rank_name');
        $this->db->select('rank_id');
        $this->db->from("rank_details");
        $qr = $this->db->get();
        $i = 0;
        foreach ($qr->result() as $row) {
            $rank_arr[$i]["rank_name"] = $row->rank_name;
            $rank_arr[$i]["rank_id"] = $row->rank_id;
            $i++;
        }
        return $rank_arr;
    }

    public function getCommissinTypes() {
        $commission_types=array();
        $this->db->select('db_amt_type,view_amt_type');
        $this->db->where('status','yes');
        $this->db->from('amount_type');
        $qr = $this->db->get();
        $i = 0;
        foreach ($qr->result_array() as $row) {
            $commission_types["$i"]["db_amt_type"] = $row['db_amt_type'];
            $commission_types["$i"]["view_amt_type"] = $row['view_amt_type'];
            $i++;
        }
        return $commission_types;
    }

}
