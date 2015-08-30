<?php

require_once 'Inf_Model.php';

class leg_count_model extends Inf_Model {

    private $obj_leg;

    public function initialize($product_status) {
        if ($product_status == 'yes') {
            require_once 'LegWithProduct.php';
        } else {
            require_once 'LegWithOutProduct.php';
        }
        $this->obj_leg = new Leg();
    }

    public function getUserLegDetails($user_id, $page, $limit, $user_type, $table_prefix = '') {

        $this->obj_leg->setTablePrefix($table_prefix);
        $user_leg_detail = $this->obj_leg->getUserLegDetails($user_id, $page, $limit, $user_type);
        return $user_leg_detail;
    }

    public function getCountUserLegDetails($user_id, $user_type) {
        return $this->obj_leg->getCountUserLegDetails($user_id, $user_type);
    }

    public function paging($user_id, $page, $limit, $current_url) {
        require_once 'Page.php';
        $obj_page = new Page();
        $numrows = $this->obj_leg->getUserLegPage($user_id);
        $arr['first'] = $obj_page->paging($page, $limit, $numrows);
        $arr['page_footer'] = $obj_page->setFooter($page, $limit, $current_url);
        return $arr;
    }

    public function getUserTypeFromUserID($user_id, $table_prefix = '') {
        $this->db->select('user_type');
        $this->db->from($table_prefix . "login_user");
        $this->db->where('user_id', $user_id);
        $result = $this->db->get();
        foreach ($result->result_array() as $row) {
            $type = $row['user_type'];
        }
        return $type;
    }

///////////////////Niyasali.//////////////
    public function getUserIdFromUserName($usr, $table_prefix = '') {
        $this->db->select('user_id');
        $this->db->select('user_name');
        $this->db->select('user_type');
        $this->db->from($table_prefix . "login_user");
        $this->db->where('user_name', $usr);
        $result = $this->db->get();
        foreach ($result->result_array() as $row) {
            $users['user_id'] = $row['user_id'];
            $users['user_type'] = $row['user_type'];
            $users['user_name'] = $row['user_name'];
        }
        return $users;
    }

    public function getLegDetails($user_id, $user_type, $table_prefix = '') {
        $users = array();

        $this->db->select('id');
        $this->db->select('total_left_count');
        $this->db->select('total_right_count');
        $this->db->select('total_left_carry');
        $this->db->select('total_right_carry');
        $this->db->select('total_active');
        $this->db->select('total_inactive');
        $this->db->from($table_prefix . "leg_details");
        if ($user_type != 'admin') {
            $this->db->where('id', $user_id);
        }
        $result = $this->db->get();
        $i = 0;
        foreach ($result->result_array() as $row) {
            $users[$i]['total_left_count'] = $row['total_left_count'];
            $users[$i]['total_right_count'] = $row['total_right_count'];
            $users[$i]['total_left_carry'] = $row['total_left_carry'];
            $users[$i]['total_right_carry'] = $row['total_right_carry'];
            $users[$i]['total_active'] = $row['total_active'];
            $users[$i]['total_inactive'] = $row['total_inactive'];
            $users[$i]['total_leg'] = $this->getTotalLeg($row['id']);
            $users[$i]['total_amount'] = $this->getTotalAmount($row['id']);
            $users[$i]['user_nmae'] = $this->getUserName($row['id']);
            $users[$i]['user_detail_name'] = $this->getUserFullName($row['id']);
            $i++;
        }
        
        return $users;
    }

    public function getTotalLeg($user_id, $table_prefix = '') {
        $this->db->select_sum('total_leg');
        $this->db->from($table_prefix . "leg_amount");
        $this->db->where('user_id', $user_id);
        $this->db->where('amount_type', 'leg');
        $result = $this->db->get();
        foreach ($result->result_array() as $row) {
            $total_leg = $row['total_leg'];
            if ($total_leg == '') {
                $total_leg = 0;
            }
        }
        
        return $total_leg;
    }

    public function getTotalAmount($user_id, $table_prefix = '') {
        $this->db->select_sum('total_amount');
        $this->db->from($table_prefix . "leg_amount");
        $this->db->where('user_id', $user_id);
        $this->db->where('amount_type', 'leg');
        $result = $this->db->get();
        foreach ($result->result_array() as $row) {
            $total_amount = $row['total_amount'];
            if ($total_amount == '') {
                $total_amount = 0;
            }
        }
        return $total_amount;
    }

    public function getUserName($user_id, $table_prefix = '') {
        $this->db->select('user_name');
        $this->db->from($table_prefix . "login_user");
        $this->db->where('user_id', $user_id);
        $result = $this->db->get();
        foreach ($result->result_array() as $row) {
            $user_name = $row['user_name'];
        }
        return $user_name;
    }

    public function getUserFullName($user_id, $table_prefix = '') {
        $user_name = '';
        $this->db->select('user_detail_name');
        $this->db->from($table_prefix . "user_details");
        $this->db->where('user_detail_refid', $user_id);
        $result = $this->db->get();
        foreach ($result->result_array() as $row) {
            $user_name = $row['user_detail_name'];
        }
        return $user_name;
    }

    public function isUserAvailable($user_name) {
        $this->db->select("COUNT(*) AS cnt");
        $this->db->from("ft_individual");
        $this->db->where('user_name', $user_name);
        $this->db->where('active !=', 'server');
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $cnt = $row->cnt;
        }

        if ($cnt > 0) {
            $flag = true;
        } else {
            $flag = false;
        }
        return $flag;
    }

//////////////////////End//////////////////////
}
