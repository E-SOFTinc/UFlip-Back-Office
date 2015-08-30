<?php

/*
 * You can modify this class
 */
/**
 * Description of ToolTip Class
  Contain the fuctions for ToolTip in Infinite MLM Software
 *
 * @author Abdul Majeed.P
  CSA Of IOSS
  www.ioss.in
 */
//require_once 'Database.php';
require_once 'Inf_Model.php';
require_once 'LegClass.php';

Class ToolTipClass extends Inf_Model {

    public $no_of_level = 4;
    public $user_arr = null;
    private $table_prefix1 = null;

    public function getSponserDetails($qr) {
        $obj_leg = new LegClass();
        $user_detail = array();

        $res1 = $this->db->query($qr);
        $num = $res1->num_rows;

        $i = 1;
        foreach ($res1->result_array() as $row) {
            $user_detail["detail$i"]["id"] = $row["user_detail_refid"];
            $user_detail["detail$i"]["name"] = $row["user_detail_name"];
            $user_detail["detail$i"]["address"] = $row["user_detail_address"];
            $user_detail["detail$i"]["father"] = $row["user_detail_father"];
            $user_detail["detail$i"]["product"] = $row["user_details_prod"];
            $user_detail["detail$i"]["town"] = $row["user_detail_town"];
            $user_detail["detail$i"]["position"] = $row["position"];
            $user_detail["detail$i"]["country"] = $row["user_detail_country"];
            $user_detail["detail$i"]["state"] = $row["user_detail_state"];
            $user_detail["detail$i"]["district"] = $row["user_detail_district"];
            $user_detail["detail$i"]["po"] = $row["user_detail_po"];
            $user_detail["detail$i"]["pincode"] = $row["user_detail_pin"];
            $user_detail["detail$i"]["college"] = $row["user_detail_college"];
            $user_detail["detail$i"]["course"] = $row["user_detail_course"];
            $user_detail["detail$i"]["year_study"] = $row["user_detail_year_study"];
            $user_detail["detail$i"]["blood"] = $row["user_detail_blood_group"];
            $user_detail["detail$i"]["donate_blood"] = $row["user_detail_donate_blood"];
            $user_detail["detail$i"]["area_interest"] = $row["user_detail_area_interest"];
            $user_detail["detail$i"]["qualification"] = $row["user_detail_qualification"];
            $user_detail["detail$i"]["designation"] = $row["user_detail_designation"];
            $user_detail["detail$i"]["dept"] = $row["user_detail_dept"];
            $user_detail["detail$i"]["office"] = $row["user_detail_office"];
            $user_detail["detail$i"]["place_work"] = $row["user_detail_place_work"];
            $user_detail["detail$i"]["passcode"] = $row["user_detail_passcode"];
            $user_detail["detail$i"]["mobile"] = $row["user_detail_mobile"];
            $user_detail["detail$i"]["land"] = $row["user_detail_land"];
            $user_detail["detail$i"]["email"] = $row["user_detail_email"];
            $user_detail["detail$i"]["dob"] = $row["user_detail_dob"];
            $user_detail["detail$i"]["gender"] = $row["user_detail_gender"];
            $user_detail["detail$i"]["nominee"] = $row["user_detail_nominee"];
            $user_detail["detail$i"]["seek_job"] = $row["user_detail_seek_job"];
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
            $user_detail["detail$i"]["user_photo"] = $row["user_photo"];
            $user_detail["detail1"]["nominee"] = $row["user_detail_nominee"];
            $user_detail["detail1"]["relation"] = $row["user_detail_relation"];
            $user_detail["detail1"]["acnumber"] = $row["user_detail_acnumber"];
            $user_detail["detail1"]["ifsc"] = $row["user_detail_ifsc"];
            $user_detail["detail1"]["nbank"] = $row["user_detail_nbank"];
            $user_detail["detail1"]["nbranch"] = $row["user_detail_nbranch"];
            $user_detail["detail1"]["pan"] = $row["user_detail_pan"];
            $leg_arr = $this->getLegLeftRightCount($row["user_detail_refid"]);
            $user_detail["detail$i"]["left"] = $leg_arr['total_left_count'];
            $user_detail["detail$i"]["right"] = $leg_arr['total_right_count'];
            $i++;
        }

        return $this->replaceNullFromArray($user_detail, "NA");
    }
    public function getUserDetails($qr) {
        $obj_leg = new LegClass();
        $user_detail = array();

        $res1 = $this->db->query($qr);
        $num = $res1->num_rows;

        $i = 1;
        foreach ($res1->result_array() as $row) {
            $user_detail["detail$i"]["id"] = $row["user_detail_refid"];
            $user_detail["detail$i"]["name"] = $row["user_detail_name"];
            $user_detail["detail$i"]["address"] = $row["user_detail_address"];
            $user_detail["detail$i"]["father"] = $row["user_details_ref_user_id"];
            $user_detail["detail$i"]["product"] = $row["product_id"];
            $user_detail["detail$i"]["town"] = $row["user_detail_town"];
            $user_detail["detail$i"]["position"] = $row["position"];
            $user_detail["detail$i"]["country"] = $row["user_detail_country"];
            $user_detail["detail$i"]["state"] = $row["user_detail_state"];
            $user_detail["detail$i"]["district"] = $row["user_detail_district"];
            $user_detail["detail$i"]["po"] = $row["user_detail_pin"];
            $user_detail["detail$i"]["pincode"] = $row["user_detail_pin"];
//            $user_detail["detail$i"]["college"] = $row["user_detail_college"];
//            $user_detail["detail$i"]["course"] = $row["user_detail_course"];
//            $user_detail["detail$i"]["year_study"] = $row["user_detail_year_study"];
//            $user_detail["detail$i"]["blood"] = $row["user_detail_blood_group"];
//            $user_detail["detail$i"]["donate_blood"] = $row["user_detail_donate_blood"];
//            $user_detail["detail$i"]["area_interest"] = $row["user_detail_area_interest"];
//            $user_detail["detail$i"]["qualification"] = $row["user_detail_qualification"];
//            $user_detail["detail$i"]["designation"] = $row["user_detail_designation"];
//            $user_detail["detail$i"]["dept"] = $row["user_detail_dept"];
//            $user_detail["detail$i"]["office"] = $row["user_detail_office"];
//            $user_detail["detail$i"]["place_work"] = $row["user_detail_place_work"];
            $user_detail["detail$i"]["passcode"] = $row["user_detail_passcode"];
            $user_detail["detail$i"]["mobile"] = $row["user_detail_mobile"];
            $user_detail["detail$i"]["land"] = $row["user_detail_land"];
            $user_detail["detail$i"]["email"] = $row["user_detail_email"];
            $user_detail["detail$i"]["dob"] = $row["user_detail_dob"];
            $user_detail["detail$i"]["gender"] = $row["user_detail_gender"];
            $user_detail["detail$i"]["nominee"] = $row["user_detail_nominee"];
//            $user_detail["detail$i"]["seek_job"] = $row["user_detail_seek_job"];
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
            $user_detail["detail$i"]["user_photo"] = $row["user_photo"];
            $user_detail["detail1"]["nominee"] = $row["user_detail_nominee"];
            $user_detail["detail1"]["relation"] = $row["user_detail_relation"];
            $user_detail["detail1"]["acnumber"] = $row["user_detail_acnumber"];
            $user_detail["detail1"]["ifsc"] = $row["user_detail_ifsc"];
            $user_detail["detail1"]["nbank"] = $row["user_detail_nbank"];
            $user_detail["detail1"]["nbranch"] = $row["user_detail_nbranch"];
            $user_detail["detail1"]["pan"] = $row["user_detail_pan"];
            $leg_arr = $this->getLegLeftRightCount($row["user_detail_refid"]);
            $user_detail["detail$i"]["left"] = $leg_arr['total_left_count'];
            $user_detail["detail$i"]["right"] = $leg_arr['total_right_count'];
            $i++;
        }

        return $this->replaceNullFromArray($user_detail, "NA");
    }
    
    
    
    /*public function getTotalRsp($user_id) {
        $this->db->select('sum(rsp) as rsp_total');
        $query = $this->db->get_where('rsp_points_history', array('user_id' => $user_id));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                return $row->rsp_total;
            }
        }
    }*/
    
    


    public function getBoardUserDetails($qr) {
        $obj_leg = new LegClass();
        $user_detail = array();

        $res1 = $this->db->query($qr);
        $num = $res1->num_rows;

        $i = 1;
        foreach ($res1->result_array() as $row) {
            $user_detail["detail$i"]["id"] = $row["id"];
            $user_detail["detail$i"]["name"] = $row["user_detail_name"];
            $user_detail["detail$i"]["user_photo"] = $row["user_photo"];
            $i++;
        }

        return $this->replaceNullFromArray($user_detail, "NA");
    }

   
    public function getLegLeftRightCount($user_id) {
        $this->db->select('total_left_count');
        $this->db->select('total_right_count');
        $this->db->from('leg_details');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $arr['total_left_count'] = $row->total_left_count;
            $arr['total_right_count'] = $row->total_right_count;
        }
        return $arr;
    }

    public function getUserData($qr) {
        $user_detail = $this->getUserDetails($qr);
        return $user_detail;
    }

    public function replaceNullFromArray($user_detail = array(), $replace = '') {
        if ($replace == '') {
            $replace = "NA";
        }

        $len = count($user_detail);
        $key_up_arr = array_keys($user_detail);
        for ($i = 1; $i <= $len; $i++) {
            $k = $i - 1;
            $fild = $key_up_arr[$k];
            //print_r($fild);
            $arr_key = array_keys($user_detail["$fild"]);
            $key_len = count($arr_key);
            //print_r($arr_key);
            for ($j = 0; $j < $key_len; $j++) {
                $key_field = $arr_key[$j];
                // echo "<br>".$key_field;
                if ($user_detail["$fild"]["$key_field"] == "") {
                    $user_detail["$fild"]["$key_field"] = $replace;
                }
            }
        }
        return $user_detail;
    }

    public function createQuery($user_id, $ft_individual = '') {

        $where = "";

        $count_id = count($user_id);

        $user_details = $this->table_prefix . "user_details";

        if ($ft_individual == '') {


            for ($i = 0; $i < $count_id; $i++) {
                if ($i !== 0) {
                    $where .= " OR user_detail_refid='$user_id[$i]' ";
                } else {
                    $where .= " user_detail_refid='$user_id[$i]' ";
                }
            }
            $ft_individual = $this->table_prefix . "ft_individual";
            $select_users = "SELECT * FROM $user_details INNER JOIN $ft_individual on id=user_detail_refid  WHERE " . $where;
        } else {

            for ($i = 0; $i < $count_id; $i++) {
                if ($i !== 0) {
                    $where .= " OR ft.id='$user_id[$i]' ";
                } else {
                    $where .= " ft.id='$user_id[$i]' ";
                }
            }
            $ft_individual = $this->table_prefix . $ft_individual;
            $select_users = "SELECT * FROM $user_details AS ud INNER JOIN $ft_individual AS ft on ft.user_ref_id=ud.user_detail_refid  WHERE " . $where;
        }


        //$select_users = "SELECT * FROM $user_details AS ud INNER JOIN $ft_individual AS ft on ft.id=ud.user_detail_refid  WHERE " . $where;
        //echo $select_users;
        //die();
        return $select_users;
    }

    public function getSponsor($arr, $ft_individual = "") {
        // print_r($arr);die();
        $user_id1 = $arr;
        $this->user_arr = $arr;
        if (count($user_id1) > 0) {
            for ($k = 1; $k <= $this->no_of_level; $k++) {
                $user_id1 = $this->getUserArray1($user_id1, $ft_individual);
                // echo "<br>";
                //$user_id1=null;
            }
        }
        return $this->user_arr;
    }
    public function getUsers($arr, $ft_individual = "") {
        // print_r($arr);die();
        $user_id1 = $arr;
        $this->user_arr = $arr;
        if (count($user_id1) > 0) {
            for ($k = 1; $k <= $this->no_of_level; $k++) {
                $user_id1 = $this->getUserArray($user_id1, $ft_individual);
                // echo "<br>";
                //$user_id1=null;
            }
        }
        return $this->user_arr;
    }

   

   

   
//Second Level User Array
    public function getUserArray($arr, $ft_individual) {
        $user_id1 = null;
        $user_id = $arr;
        $select_users = "";
        $sql = "";

        $count_id = count($user_id);

        $flag = 0;
        if (count($user_id) > 0) {
            for ($i = 0; $i < $count_id; $i++) {

                if ($i != 0) {
                    $flag = 1;
                    $sql .= " OR  father_id='$user_id[$i]'";
                } else {
                    if ($ft_individual == '') {
                        $ft_individual = $this->table_prefix . "ft_individual";

                        $sql .= "SELECT id FROM $ft_individual WHERE   (active!='server') AND ( father_id='$user_id[$i]'";
                    } else {
                        $ft_individual = $this->table_prefix . $ft_individual;

                        $sql .= "SELECT id FROM $ft_individual WHERE   (active!='server') AND ( father_id='$user_id[$i]'";
                    }
                }
            }


            $as = "";
            if ($i > 0) {
                $as = " )";
                $select_users.=$sql . " )";
            } else {
                $select_users.=$sql;
            }

            $res1 = $this->selectData($select_users);
            while ($row1 = mysql_fetch_array($res1)) {
                $this->user_arr[] = $row1['id'];
                $user_id[] = $row1['id'];
                $user_id1[] = $row1['id'];
            }
        }

        return $user_id1;
    }
    
    public function getUserArray1($arr, $ft_individual) {
        $user_id1 = null;
        $user_id = $arr;
        $select_users = "";
        $sql = "";

        $count_id = count($user_id);

        $flag = 0;
        if (count($user_id) > 0) {
            for ($i = 0; $i < $count_id; $i++) {

                if ($i != 0) {
                    $flag = 1;
                    $sql .= " OR  father_id='$user_id[$i]'";
                } else {
                    if ($ft_individual == '') {
                        $ft_individual = $this->table_prefix . "ft_individual_unilevel";

                        $sql .= "SELECT id FROM $ft_individual WHERE   (active!='server') AND ( father_id='$user_id[$i]'";
                    } else {
                        $ft_individual = $this->table_prefix . $ft_individual;

                        $sql .= "SELECT id FROM $ft_individual WHERE   (active!='server') AND ( father_id='$user_id[$i]'";
                    }
                }
            }


            $as = "";
            if ($i > 0) {
                $as = " )";
                $select_users.=$sql . " )";
            } else {
                $select_users.=$sql;
            }

            $res1 = $this->selectData($select_users);
            while ($row1 = mysql_fetch_array($res1)) {
                $this->user_arr[] = $row1['id'];
                $user_id[] = $row1['id'];
                $user_id1[] = $row1['id'];
            }
        }

        return $user_id1;
    }
    
    
    public function getStatus($id) {


        $ft_individual = $this->table_prefix . "ft_individual";
        $qr = "SELECT status FROM $ft_individual WHERE id='$id'";
        $res = $this->selectData($qr);
        $row = mysql_fetch_array($res);
        $status = $row['status'];
        return $status;
    }

}
