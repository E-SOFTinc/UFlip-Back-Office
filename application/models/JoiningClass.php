<?php

require_once 'Inf_Model.php';

class JoiningClass extends Inf_Model {

    public function __construct() {
        
    }

    public function getUserName($fatherId) {
        require_once 'validation.php';
        $obj_val = new Validation();
        $username = $obj_val->IdToUserName($fatherId);
        return $username;
    }

    public function allJoining() {

        $ft_individual = $this->table_prefix . "ft_individual";
        $search_my_joinin = "select * from $ft_individual where active!='server' and active NOT LIKE 'terminated%' order by id asc limit $page, $limit";

        //echo $serchpin;
        $search_joining = $this->selectData($search_my_joinin, "Error on selecting all joining....");
        $cnt = mysql_num_rows($search_joining);
        if ($cnt > 0) {
            $i = 0;
            while ($search_active = mysql_fetch_array($search_joining)) {
                $this->all_join["detail$i"]["id"] = $search_active['id'];
                $this->all_join["detail$i"]["user_name"] = $search_active['user_name'];
                $this->all_join["detail$i"]["pin"] = $search_active['pin_numbers'];
                $this->all_join["detail$i"]["active"] = $search_active['active'];
                $this->all_join["detail$i"]["father_id"] = $search_active['father_id'];
                $this->all_join["detail$i"]["date_of_joining"] = $search_active['date_of_joining'];
                $this->all_join["detail$i"]["first_pair"] = $search_active['first_pair'];
                $i++;
            }
        }
    }

    public function todaysJoining($today, $page = '', $limit = '',$table_prefix='') {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        if ($page == "" and $limit == "") {
            $this->db->select('*');
            $this->db->from($table_prefix."ft_individual");
            $this->db->where("active NOT LIKE 'server%' AND active NOT LIKE 'terminated%' AND date_of_joining LIKE '$today%'");
            $this->db->order_by("date_of_joining", "asc");
            $query = $this->db->get();
        } else {
            $this->db->select('*');
            $this->db->from($table_prefix."ft_individual");
            $this->db->where("active NOT LIKE 'server%' AND active NOT LIKE 'terminated%' AND date_of_joining LIKE '$today%'");
            $this->db->order_by("date_of_joining", "asc");
            $this->db->limit($limit, $page);
            $query = $this->db->get();
        }
        //echo"<br/>todaysJoining". $this->db->last_query();
        $cnt = $query->num_rows();
        $this->today_join = null;
        if ($cnt > 0) {
            $i = 0;
            foreach ($query->result_array() as $search_active) {
                $this->today_join["detail$i"]["id"] = $search_active['id'];
                $this->today_join["detail$i"]["user_name"] = $search_active['user_name'];
                $this->today_join["detail$i"]["active"] = $search_active['active'];
                $this->today_join["detail$i"]["father_id"] = $search_active['father_id'];
                $this->today_join["detail$i"]["date_of_joining"] = $search_active['date_of_joining'];
                $this->today_join["detail$i"]["first_pair"] = $search_active['first_pair'];
                $usr=$search_active['id'];
                $this->today_join["detail$i"]["user_full_name"]=$this->userFullName($usr);
                $this->today_join["detail$i"]["sponsor_name"]=$this->getSponsorId($search_active['user_name']);
                $i++;
            }
        }
        //print_r($this->today_join);
       
        return $this->today_join;
        
    }

    public function todaysJoiningCount($date, $user_id = '',$table_prefix='') {

        ///////////////////// CODE EDITED BY JIJI  //////////////////////////
        $count = 0;
        if ($user_id == "") {
            /* $this->db->select('*');
              $this->db->from("ft_individual");
              $this->db->where("active NOT LIKE 'server%' AND  date_of_joining LIKE '$date%'");
              $count = $this->db->count_all_results(); */

            $this->db->select('*');
            $this->db->from($table_prefix.'login_user AS lu');
            $this->db->join($table_prefix.'ft_individual AS ft', 'ft.id = lu.user_id', 'INNER');
            $this->db->where("active NOT LIKE 'server%' AND active NOT LIKE 'terminated%' AND date_of_joining LIKE '$date%'");
            $this->db->not_like('user_type', 'admin');
            $count = $this->db->count_all_results();
        } else {
            $this->db->select('*');
            $this->db->from($table_prefix."user_details");
            $this->db->where('user_details_ref_user_id', $user_id);
            $this->db->where("join_date LIKE '$date%'");
            $count = $this->db->count_all_results();
        }
        //echo"<br/>todaysJoiningCount". $this->db->last_query();
        return $count;
    }

    public function weeklyJoining($from, $to, $page = '', $limit = '') {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        if ($page == "" and $limit == "") {

            $this->db->select('*');
            $this->db->from("ft_individual");
            $this->db->where("active NOT LIKE 'server%' and active NOT LIKE 'terminated%' and date_of_joining BETWEEN '$from' and '$to'");
            $this->db->order_by("date_of_joining", "asc");
            $query = $this->db->get();
        } else {
            $this->db->select('*');
            $this->db->from("ft_individual");
            $this->db->where("active NOT LIKE 'server%' and active NOT LIKE 'terminated%' and date_of_joining BETWEEN '$from' and '$to'");
            $this->db->order_by("date_of_joining", "asc");
            $this->db->limit($limit, $page);
            $query = $this->db->get();
        }

        //echo"<br/>weeklyJoining". $this->db->last_query();
        $this->weekly_join = null;

        $cnt = $query->num_rows();
        if ($cnt > 0) {
            $i = 0;
            foreach ($query->result_array() as $search_active) {

                $this->weekly_join["detail$i"]["id"] = $search_active['id'];
                $this->weekly_join["detail$i"]["user_name"] = $search_active['user_name'];
                $this->weekly_join["detail$i"]["active"] = $search_active['active'];
                $this->weekly_join["detail$i"]["father_id"] = $search_active['father_id'];
                $this->weekly_join["detail$i"]["date_of_joining"] = $search_active['date_of_joining'];
                $this->weekly_join["detail$i"]["first_pair"] = $search_active['first_pair'];
                $this->weekly_join["detail$i"]["user_full_name"]=$this->userFullName($search_active['id']);
                $this->weekly_join["detail$i"]["sponsor_name"]=$this->getSponsorId($search_active['user_name']);
                $i++;
            }
        }
        //print_r($this->weekly_join);
        return $this->weekly_join;
    }
    
 function getSponsorId($user_name)
    {
        $fathers='';
        $this->db->select('father_id');
        $this->db->from('ft_individual_unilevel');
        $this->db->where('user_name',"$user_name");
        $query = $this->db->get();
        foreach ($query->result() as $father_id) {
                $fathers = $father_id->father_id;
        }
        return $this->getSponsorName($fathers);
        
    }
    public function getSponsorName($user_id)
    {
        $sponsor='';
        $this->db->select('user_name');
        $this->db->from('login_user');
        $this->db->where('user_id',"$user_id");
        $query = $this->db->get();
        foreach ($query->result() as $sponsor_name) {
                $sponsor = $sponsor_name->user_name;
        }
        return $sponsor;
    }
    
    
 public function userFullName($user_id)
    {
        $user_full_name='';
        $this->db->select('user_detail_name');
        $this->db->from('user_details');
        $this->db->where('user_detail_refid',"$user_id");
        $query = $this->db->get();
        foreach ($query->result() as $user_name) {
                $user_full_name = $user_name->user_detail_name;
        }
        return $user_full_name;
        
    }
    public function allJoiningpage($from, $to) {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        if ($to == "") {
            $to = $from;
        }
        $from = $from . " 00:00:00";
        $to = $to . " 23:59:59";

        $this->db->select('*');
        $this->db->from("ft_individual");
        $this->db->where("active NOT LIKE 'server%' and active NOT LIKE 'terminated%' and  date_of_joining BETWEEN '$from' and '$to'");
        $numrows = $this->db->count_all_results(); // Number of rows returned from above query.
        return $numrows;
    }

}