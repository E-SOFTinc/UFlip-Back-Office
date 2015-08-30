<?php

require_once 'Inf_Model.php';

class joining_model extends Inf_Model {

    private $obj_join;
    private $obj_page;

    public function __construct() {
        require_once 'JoiningClass.php';
        $this->obj_join = new JoiningClass();
        require_once 'Page.php';
        $this->obj_page = new Page();
    }

    public function paging($page, $limit, $url, $from, $to) {
        $numrows = $this->obj_join->allJoiningpage($from, $to);
        $page_arr['first'] = $this->obj_page->paging($page, $limit, $numrows);
        $page_arr['page_footer'] = $this->obj_page->setFooter($page, $limit, $url);
        return $page_arr;
    }

    public function todaysJoining($today, $page, $limit) {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $arr = $this->obj_join->todaysJoining($today, $page, $limit);
        for ($i = 0; $i < count($arr); $i++) {
            $father_id = $arr["detail$i"]["father_id"];
            $arr["detail$i"]["father_user"] = $this->obj_join->getUserName($father_id);
        }
        return $arr;
    }

    public function todaysJoiningCount($date) {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        return $this->obj_join->todaysJoiningCount($date);
    }

    public function weeklyJoining($from, $to, $page, $limit) {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $arr = $this->obj_join->weeklyJoining($from, $to, $page, $limit);
        for ($i = 0; $i < count($arr); $i++) {
            $father_id = $arr["detail$i"]["father_id"];
            $arr["detail$i"]["father_user"] = $this->obj_join->getUserName($father_id);
        }
        return $arr;
    }

    public function allJoiningpage($from, $to) {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        return $this->obj_join->allJoiningpage($from, $to);
    }

    public function totalJoiningpage($user_id = '', $table_prefix = "") {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        $numrows = 0;
        if ($user_id == "") {
            $this->db->select('*');
            $this->db->from($table_prefix . "login_user");
            $this->db->not_like('addedby', 'server');
            $this->db->not_like('user_type', 'admin');
            $numrows = $this->db->count_all_results(); // Number of rows returned from above query.
        } else {
            $this->db->select('*');
            $this->db->from($table_prefix . "user_details");
            $this->db->where('user_details_ref_user_id', $user_id);
            $numrows = $this->db->count_all_results(); // Number of rows returned from above query. 
        }
        return $numrows;
    }

    public function getJoiningDetailsperMonth($user_id = '') {

        /////////////////////  CODE ADDED BY JIJI  //////////////////////////
        $details = array();
        $month_start_end_dates = array();
        $month = "";
        $start_date = "";
        $end_date = "";
        $count = 0;
        $yr = "";
        $date = "";
        for ($i = 1; $i <= 12; $i++) {
            $yr = date("Y");
            $date = date("Y-m-d", strtotime("$yr-$i-01"));
            $month_start_end_dates = $this->getCurrentMonthStartEndDates($date);
            $start_date = $month_start_end_dates["month_first_date"] . " 00:00:00";
            $end_date = $month_start_end_dates["month_end_date"] . " 23:59:59";
            $count = $this->getJoiningCountPerMonth($start_date, $end_date, $user_id);

            switch ($i) {
                case 1:
                    $month = "Jan";
                    break;
                case 2:
                    $month = "Feb";
                    break;
                case 3:
                    $month = "Mar";
                    break;
                case 4:
                    $month = "Apr";
                    break;
                case 5:
                    $month = "May";
                    break;
                case 6:
                    $month = "Jun";
                    break;
                case 7:
                    $month = "Jul";
                    break;
                case 8:
                    $month = "Aug";
                    break;
                case 9:
                    $month = "Sep";
                    break;
                case 10:
                    $month = "Oct";
                    break;
                case 11:
                    $month = "Nov";
                    break;
                case 12:
                    $month = "Dec";
                    break;
            }
            $details[$i]["country"] = "United States";
            $details[$i]["month"] = $month;
            $details[$i]["joining"] = $count;
        }
        return $details;
    }

    public function getJoiningCountPerMonth($start_date, $end_date, $user_id = '') {

        /////////////////////  CODE ADDED BY JIJI  //////////////////////////

        $count = 0;
        if ($user_id == "") {

            $this->db->select('*');
            $this->db->from('login_user AS lu');
            $this->db->join('ft_individual AS ft', 'ft.id = lu.user_id', 'INNER');
            $this->db->where("date_of_joining BETWEEN '$start_date' AND '$end_date'");
            $this->db->not_like('user_type', 'admin');
            $count = $this->db->count_all_results();
        } else {
            $this->db->select('*');
            $this->db->from("user_details");
            $this->db->where('user_details_ref_user_id', $user_id);
            $this->db->where("join_date BETWEEN '$start_date' AND '$end_date'");
            $count = $this->db->count_all_results();
        }
        return $count;
    }

    public function getCurrentMonthStartEndDates($current_date) {

        $start_date = '';
        $end_date = '';
        $date = $current_date;

        list($yr, $mo, $da) = explode('-', $date);

        $start_date = date('Y-m-d', mktime(0, 0, 0, $mo, 1, $yr));
        $i = 2;

        list($yr, $mo, $da) = explode('-', $start_date);

        while (date('d', mktime(0, 0, 0, $mo, $i, $yr)) > 1) {
            $end_date = date('Y-m-d', mktime(0, 0, 0, $mo, $i, $yr));
            $i++;
        }

        $ret_arr["month_first_date"] = $start_date;
        $ret_arr["month_end_date"] = $end_date;
        return $ret_arr;
    }

}
