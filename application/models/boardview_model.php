<?php

require_once 'validation.php';
require_once 'Inf_Model.php';

Class boardview_model extends Inf_Model {

    public $NO_OF_LEVEL;
    public $upline_id_arr;
    public $board_serial_no;

    public function __construct() {
        $this->obj_vali = new Validation();
        $this->NO_OF_LEVEL = 3;
        $this->upline_id_arr = array();
        $this->board_serial_no = array();
    }

    public function isEntryExsitInBoard($board_name, $user_ref_id) {

        $qr = "SELECT count(*) AS cnt FROM $board_name WHERE user_ref_id = '$user_ref_id'";
        $this->db->select("*")->from("$board_name")->where("user_ref_id", $user_ref_id);

        $count = $this->db->count_all_results();
        //echo "<br/>innnn--$count--nnnnnnnnnn->" . $this->db->last_query();
        $flag = false;
        if ($count > 0) {
            $flag = true;
        }
        return $flag;
    }

    public function insertIntoBoardViewNew($new_reg_id, $board_serial_no, $board_no, $no_level) {
        //echo "<br> NO Of Level: $no_level";
        $board_name = "auto_board_" . $board_no;
        $board_number_split = $this->getBoardNumber($new_reg_id, $board_no);
        $this->setBoardStatusYES($board_number_split, $board_no);
        $max_board_number_left = $this->getMaxBoardNumber($board_no) + 1;
        $max_board_number_right = $max_board_number_left + 1;

        $user_ref_id = $this->getUserRefIdByAutoID($new_reg_id, $board_name);
        $this->updateBoardSplitStatus($user_ref_id, $board_serial_no);

        $arr_user_left_right = $this->getLeftRightUserID($new_reg_id, $board_name);
        $left_user_id_1 = $arr_user_left_right['left_id'];
        $right_user_id_1 = $arr_user_left_right['right_id'];

        $this->insertBoardView($max_board_number_left, $left_user_id_1, $board_no);
        $this->insertBoardView($max_board_number_right, $right_user_id_1, $board_no);


        $this->insertBoardUserDetails($left_user_id_1, $max_board_number_left, $board_no, 0);
        $this->insertBoardUserDetails($right_user_id_1, $max_board_number_right, $board_no, 0);

        if ($no_level >= 2) {
            $board_level = 1;
            $this->insertBoardViewDetails($left_user_id_1, $board_name, $board_no, $max_board_number_left, $board_level);
            $this->insertBoardViewDetails($right_user_id_1, $board_name, $board_no, $max_board_number_right, $board_level);
        }
        if ($no_level >= 3) {
            $board_level = $board_level + 1;

            $arr_user_left_users = $this->getLeftRightUserID($left_user_id_1, $board_name);
            $left_user_id_2 = $arr_user_left_users["left_id"];
            $left_user_id_3 = $arr_user_left_users["right_id"];
            $this->insertBoardViewDetails($left_user_id_2, $board_name, $board_no, $max_board_number_left, $board_level);
            $this->insertBoardViewDetails($left_user_id_3, $board_name, $board_no, $max_board_number_left, $board_level);


            $arr_user_right_users = $this->getLeftRightUserID($right_user_id_1, $board_name);
            $right_user_id_2 = $arr_user_right_users["left_id"];
            $right_user_id_3 = $arr_user_right_users["right_id"];
            $this->insertBoardViewDetails($right_user_id_2, $board_name, $board_no, $max_board_number_right, $board_level);
            $this->insertBoardViewDetails($right_user_id_3, $board_name, $board_no, $max_board_number_right, $board_level);
        }



        //////////THIS IS USED FOR WHEN NO_OF_LEVELS IS 4----START------//////////////////
//        if ($no_level >= 4) {
//            $board_level = $board_level + 1;
//            $arr_user_left_users = $this->getLeftRightUserID($left_user_id_2, $board_name);
//            $left_user_id_4 = $arr_user_left_users["left_id"];
//            $left_user_id_5 = $arr_user_left_users["right_id"];
//            $this->insertBoardViewDetails($left_user_id_4, $board_name, $board_no, $max_board_number_left, $board_level);
//            $this->insertBoardViewDetails($left_user_id_5, $board_name, $board_no, $max_board_number_left, $board_level);
//            
//            $arr_user_right_users = $this->getLeftRightUserID($left_user_id_3, $board_name);
//            $right_user_id_4 = $arr_user_right_users["left_id"];
//            $right_user_id_5 = $arr_user_right_users["right_id"];
//            $this->insertBoardViewDetails($right_user_id_4, $board_name, $board_no, $max_board_number_left, $board_level);
//            $this->insertBoardViewDetails($right_user_id_5, $board_name, $board_no, $max_board_number_left, $board_level);
//
//            $arr_user_left_users = $this->getLeftRightUserID($right_user_id_2, $board_name);
//            $left_user_id_6 = $arr_user_left_users["left_id"];
//            $left_user_id_7 = $arr_user_left_users["right_id"];
//            $this->insertBoardViewDetails($left_user_id_6, $board_name, $board_no, $max_board_number_right, $board_level);
//            $this->insertBoardViewDetails($left_user_id_7, $board_name, $board_no, $max_board_number_right, $board_level);
//            
//            
//            $arr_user_right_users = $this->getLeftRightUserID($right_user_id_3, $board_name);
//            $right_user_id_6 = $arr_user_right_users["left_id"];
//            $right_user_id_7 = $arr_user_right_users["right_id"];
//             $this->insertBoardViewDetails($right_user_id_6, $board_name, $board_no, $max_board_number_right, $board_level);
//            $this->insertBoardViewDetails($right_user_id_7, $board_name, $board_no, $max_board_number_right, $board_level); 
//             
//        }
        //////////THIS IS USED FOR WHEN NO_OF_LEVELS IS 4----END------//////////////////
    }

    public function insertBoardViewDetails($left_user_id_1, $board_name, $board_no, $max_board_number_left, $board_level) {
        $arr_user_left_users = $this->getLeftRightUserID($left_user_id_1, $board_name);
        $left_user_id_2 = $arr_user_left_users["left_id"];
        $left_user_id_3 = $arr_user_left_users["right_id"];

        $this->insertBoardUserDetails($left_user_id_2, $max_board_number_left, $board_no, $board_level);
        $this->insertBoardUserDetails($left_user_id_3, $max_board_number_left, $board_no, $board_level);
    }

    public function insertIntoBoardView($new_reg_id2, $board_no, $board_table_no, $no_level = "") {

        $board_name = "auto_board_" . $board_table_no;

        $board_number_split = $this->getBoardNumber($new_reg_id2, $board_table_no);
        $this->setBoardStatusYES($board_number_split, $board_table_no);
        $max_board_number_left = $this->getMaxBoardNumber($board_table_no) + 1;
        $max_board_number_right = $max_board_number_left + 1;

        $user_ref_id2 = $this->getUserRefIdByAutoID($new_reg_id2, $board_name);
        $this->updateBoardSplitStatus($user_ref_id2, $board_no);


        $arr_user_left_right = $this->getLeftRightUserID($new_reg_id2, $board_name);
        $left_user_id_1 = $arr_user_left_right['left_id'];
        $right_user_id_1 = $arr_user_left_right['right_id'];
        $left_user_id_1_refer = $arr_user_left_right['left_refer_id'];
        $right_user_id_1_refer = $arr_user_left_right['right_refer_id'];

        $this->insertBoardDetails($max_board_number_left, $left_user_id_1, $board_table_no);
        $this->insertBoardDetails($max_board_number_right, $right_user_id_1, $board_table_no);

        $arr_user_left_users = $this->getLeftRightUserID($left_user_id_1, $board_name);
        $left_user_id_2 = $arr_user_left_users["left_id"];
        $left_user_id_3 = $arr_user_left_users["right_id"];
        $left_user_id_2_refer = $arr_user_left_users["left_refer_id"];
        $left_user_id_3_refer = $arr_user_left_users["right_refer_id"];


        $arr_user_right_users = $this->getLeftRightUserID($right_user_id_1, $board_name);
        $right_user_id_2 = $arr_user_right_users["left_id"];
        $right_user_id_3 = $arr_user_right_users["right_id"];
        $right_user_id_2_refer = $arr_user_right_users["left_refer_id"];
        $right_user_id_3_refer = $arr_user_right_users["right_refer_id"];

        $this->insertBoardUserDetails($left_user_id_1, $max_board_number_left, $board_table_no, 0);
        $this->insertBoardUserDetails($left_user_id_2, $max_board_number_left, $board_table_no, 1);
        $this->insertBoardUserDetails($left_user_id_3, $max_board_number_left, $board_table_no, 1);

        $this->insertBoardUserDetails($right_user_id_1, $max_board_number_right, $board_table_no, 0);
        $this->insertBoardUserDetails($right_user_id_2, $max_board_number_right, $board_table_no, 1);
        $this->insertBoardUserDetails($right_user_id_3, $max_board_number_right, $board_table_no, 1);

        if ($this->NO_OF_LEVEL == 3) {
            $arr_user_right_users = $this->getLeftRightUserID($left_user_id_2, $board_name);
            $left_user_id = $arr_user_right_users["left_id"];
            $right_user_id = $arr_user_right_users["right_id"];
            $left_user_id_refer = $arr_user_right_users["left_refer_id"];
            $right_user_id_refer = $arr_user_right_users["right_refer_id"];
            $this->insertBoardUserDetails($left_user_id, $max_board_number_left, $board_table_no, 2);
            $this->insertBoardUserDetails($right_user_id, $max_board_number_left, $board_table_no, 2);

            $arr_user_right_users = $this->getLeftRightUserID($left_user_id_3, $board_name);
            $left_user_id = $arr_user_right_users["left_id"];
            $right_user_id = $arr_user_right_users["right_id"];
            $left_user_id_refer = $arr_user_right_users["left_refer_id"];
            $right_user_id_refer = $arr_user_right_users["right_refer_id"];
            $this->insertBoardUserDetails($left_user_id, $max_board_number_left, $board_table_no, 2);
            $this->insertBoardUserDetails($right_user_id, $max_board_number_left, $board_table_no, 2);
            //END OF LEFT INSERT


            $arr_user_right_users = $this->getLeftRightUserID($right_user_id_2, $board_name);
            $left_user_id = $arr_user_right_users["left_id"];
            $right_user_id = $arr_user_right_users["right_id"];
            $left_user_id_refer = $arr_user_right_users["left_refer_id"];
            $right_user_id_refer = $arr_user_right_users["right_refer_id"];
            $this->insertBoardUserDetails($left_user_id, $max_board_number_right, $board_table_no, 2);
            $this->insertBoardUserDetails($right_user_id, $max_board_number_right, $board_table_no, 2);

            $arr_user_right_users = $this->getLeftRightUserID($right_user_id_3, $board_name);
            $left_user_id = $arr_user_right_users["left_id"];
            $right_user_id = $arr_user_right_users["right_id"];
            $left_user_id_refer = $arr_user_right_users["left_refer_id"];
            $right_user_id_refer = $arr_user_right_users["right_refer_id"];
            $this->insertBoardUserDetails($left_user_id, $max_board_number_right, $board_table_no, 2);
            $this->insertBoardUserDetails($right_user_id, $max_board_number_right, $board_table_no, 2);
            //END OF RIGHT INSERT
        }
    }

    public function getLeftRightUserID($user_id, $board_table_name) {

        //$qr = "SELECT id,user_ref_id,position FROM $board_table_name WHERE father_id='$user_id'";
        $res = $this->db->select("id,user_ref_id,position")->where("father_id", $user_id)->get("$board_table_name");
//        echo "<br/>";
//        echo "<br/>" . $this->db->last_query();
//        echo "<br/>";
        foreach ($res->result() as $row) {
            $position = $row->position;
            $id = $row->id;
            $user_refer_d = $row->user_ref_id;

            if ($position == 1) {
                $arr['left_id'] = $id;
                $arr['left_refer_id'] = $user_refer_d;
            } else
            if ($position == 2) {
                $arr['right_id'] = $id;
                $arr['right_refer_id'] = $user_refer_d;
            }
        }
        return $arr;
    }

    public function getBoardNumber($user_id, $board_number) {
        $select = "SELECT board_no FROM board_view WHERE board_top_id=$user_id AND board_table_name = '$board_number'";
        // echo $select;
        $query = $this->db->select("board_no")->where("board_top_id", $user_id)->where("board_table_name", $board_number)->get("board_view");
        ;
        $board_seriel_no = "";

        foreach ($query->result() as $row) {
            $board_seriel_no = $row->board_no;
        }

        return $board_seriel_no;
    }

    public function getBoardSplitStatus($board_seriel_no, $board_table) {

        $res_b = $this->db->select("board_split_status")->where("board_no", $board_seriel_no)->where("board_table_name", $board_table)->get("board_view");

        foreach ($res_b->result() AS $row)
            return $row->board_split_status;
    }

    public function getUserBoardStatus($user_id) {

        $select_b = "SELECT status FROM board_split_status WHERE  user_ref_id = '$user_id'";
        //echo " <br>$select_b";
        $res_b = $this->db->query($select_b);
        foreach ($res_b->result() AS $row_b) {
            return $row_b->status;
        }
    }

    public function getBoardNumberByFather($user_id, $board_table) {
        $select = "SELECT board_serial_no FROM $board_table WHERE father_id=$user_id AND position = 1";
        $res = $this->selectData($select, "Error on sele fath left id ");
        $row = mysql_fetch_array($res);
        $board_serial_no = $row['board_serial_no'];

        return $board_serial_no;
    }

    public function insertBoardUserDetails($inser_id_user_id, $board_number, $board_table_no, $board_level = '') {
        $curent_date = date("Y-m-d H:i:s");
        $position = $this->getMaxBoardPosition($board_number);
        $data = array("user_id" => $inser_id_user_id,
            "board_serial_no" => $board_number,
            "date_of_join" => $curent_date,
            "board_position" => $position,
            "board_level" => $board_level,
            "board_table_name" => $board_table_no);
        $query = $this->db->insert("board_user_detail", $data);
    }

    public function getFatherID($user_id, $board_number) {
        $qr = "SELECT father_id  FROM $board_number WHERE id='$user_id'";
        //echo $qr;
        $res = $this->selectData($qr, "Error on selecting fahter 654647 ");
        $row = mysql_fetch_array($res);
        $father_id = $row['father_id'];
        return $father_id;
    }

    public function getBoardTopID($board_seriel_no, $board_no) {

        $board_top_id = "";
        $this->db->select("board_top_id");
        $this->db->where("board_no", $board_seriel_no);
        $this->db->where("board_table_name = ", $board_no);
        $res_b = $this->db->get("board_view");
        foreach ($res_b->result() as $row_b) {
            $board_top_id = $row_b->board_top_id;
        }
        return $board_top_id;
    }

    public function getUserBoardMinID($user_ft_id, $board_name) {
        $this->db->select("MIN(a.id) AS board_id");
        $this->db->from("$board_name AS a");
        $this->db->join("board_user_detail AS b", "a.id = b.user_id", "INNER");
        $this->db->join("board_view AS c", "b.board_serial_no = c.board_no", "INNER");
        $this->db->where("a.user_ref_id", "$user_ft_id");
        $this->db->where("c.board_split_status", "no");
        $res_b = $this->db->get();
        //echo "<br/>$user_ft_id -->" . $this->db->last_query();
        foreach ($res_b->result() as $row_b) {
            return $row_b->board_id;
        }
    }

    public function getBoardSerialNumber($board_user_id, $board_number) {
        $select_b = "SELECT MAX(board_serial_no) FROM board_user_detail
                            WHERE user_id=$board_user_id AND board_table_name = '$board_number' ";
        // echo $select_b;
        $res_b = $this->selectData($select_b, "Error on take status444");
        $row_b = mysql_fetch_array($res_b);
        $board_serial_no = $row_b['MAX(board_serial_no)'];
        return $board_serial_no;
    }

    public function setBoardStatusYES($board_number, $board_table_no) {
        $insert = " UPDATE board_view  SET  board_split_status='yes' 
                    WHERE board_no='$board_number' AND board_table_name = '$board_table_no' LIMIT 1";
        //ECHO "<br>$insert<br>";
        $this->db->set("board_split_status", "yes");
        $this->db->where("board_no", "$board_number");
        $this->db->where("board_table_name", "$board_table_no");
        $this->db->limit(1);
        $this->db->update("board_view");
    }

    public function getMaxBoardNumber($board_table_name_no) {
        $max_num = "";
        $this->db->select_max("board_no");
        $this->db->where("board_table_name", "$board_table_name_no");
        $res_b = $this->db->get("board_view");
        foreach ($res_b->result() as $row_b) {
            $max_num = $row_b->board_no;
        }

        return $max_num;
    }

    public function insertBoardDetails($board_number, $board_top_id, $board_table_name_no) {
        $cur_date = date("Y-m-d H:i:s");
        $data = array("board_no" => $board_number,
            "board_top_id" => $board_top_id,
            "date_of_join" => $cur_date,
            "board_split_status" => 'no',
            "board_table_name" => $board_table_name_no);

        //   echo "<BR>$insert<BR>";
        $this->db->insert("board_view", $data);
    }

    public function insertBoardView($board_number, $board_top_id, $board_table_name_no) {
        $cur_date = date("Y-m-d H:i:s");
        $data = array("board_no" => $board_number,
            "board_top_id" => $board_top_id,
            "date_of_join" => $cur_date,
            "board_split_status" => 'no',
            "board_table_name" => $board_table_name_no);

        //   echo "<BR>$insert<BR>";
        $this->db->insert("board_view", $data);
    }

    public function getBoardNumberFromBoardUserDetails($user_id, $board_number) {

        $board_seriel_no = 0;
        $this->db->select_max("board_serial_no");
        $this->db->where("user_id", "$user_id");
        $this->db->where("board_table_name", "$board_number");
        $query = $this->db->get("board_user_detail");

        foreach ($query->result() as $row) {
            if ($row->board_serial_no != "")
                $board_seriel_no = $row->board_serial_no;
        }
        //echo"<br/>num->$board_seriel_no qry>>>>" . $this->db->last_query();

        return $board_seriel_no;
    }

    public function getNotSpitedBoardTableNameMaxReached($user_id) {
        $board_number = "";
        $select = "SELECT max(board_number) as board_number FROM board_split_status WHERE user_ref_id='$user_id' AND status='no'";
        //echo "<br/>getNotSpitedBoardTableNameMaxReached>>>>>>>>>>>>>>>>" . $select;
        $query = $this->db->query($select);
        foreach ($query->result() as $row) {
            if ($row->board_number != "")
                $board_number = $row->board_number;
        }

        return $board_number;
    }

    public function getMyBoardSerialNumbers($board_id, $board_number) {
        $select_b = "SELECT board_serial_no FROM board_user_detail
                        WHERE user_id=$board_id AND board_table_name = '$board_number' ";
//echo $select_b;
        $res_b = $this->selectData($select_b, "Error on take  56578689");
        while ($row_b = mysql_fetch_array($res_b)) {
            $board_serial_no_arr[] = $row_b["board_serial_no"];
        }
        return $board_serial_no_arr;
    }

    public function getBoardTopIdByBoardSerailNumber($board_serail_no_arr, $board_table_no) {
        $board_top_idp = array();
        $arr_len = count($board_serail_no_arr);
        for ($i = 0; $i < $arr_len; $i++) {
            $board_ser_no = $board_serail_no_arr[$i];
            $board_top_idp["$i"]["id"] = $this->getBoardTopID($board_ser_no, $board_table_no);
            $board_top_idp["$i"]["serial"] = $board_ser_no;
        }
        return $board_top_idp;
    }

    public function getUserRefIdByAutoID($id, $board_table) {
        $user_ref_id = 0;
        $res = $this->db->select("user_ref_id")->where("id", $id)->get("$board_table");
        foreach ($res->result() as $row) {
            $user_ref_id = $row->user_ref_id;
        }
        return $user_ref_id;
    }

    public function updateBoardSplitStatus($user_id, $board_number) {
        $date = date('Y-m-d H:i:s');

        $this->db->set('status', 'yes');
        $this->db->set('date_of_update', $date);
        $this->db->where("user_ref_id", $user_id);
        $this->db->where("board_number", $board_number);
        $res = $this->db->update("board_split_status");
        return $res;
    }

    public function getBoardID($user_id, $board_table) {
        $this->db->select('user_ref_id');
        $this->db->where("id", $user_id);
        $this->db->from($board_table);
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
            $user_ref_id = $row['user_ref_id'];
        }
        return $user_ref_id;
    }

    //////////////////////////////ADDED BY YASIR////////////////////////////////////////

    public function getMyBoardIDs($uesr_id, $board_table_no) {
        /* require_once 'validation.php';
          $obj_vali = new Validation(); */
        $board_table = $this->table_prefix . "auto_board_" . $board_table_no;
        $user_boar_id_arr = array();
        $arr_id = $this->getBoardIDs($uesr_id, $board_table); //die(print_r($arr_id));
        $where_qr = "";
        $arr_len = count($arr_id);
        //print_r($arr_id);
        //$where_qr = "  WHERE user_id = '$uesr_id'";
        for ($i = 0; $i < $arr_len; $i++) {
            $board_id = $arr_id['detail' . $i]['id'];
            if ($i == 0) {
                $where_qr .= "b.user_id = '$board_id'";
            } else {
                $where_qr .= " OR  b.user_id = '$board_id'";
            }
        }
        if ($arr_len > 0) {
            $this->db->select('*');
            $this->db->from('board_user_detail AS b');
            $this->db->join($board_table . ' AS a', 'a.id=b.user_id');
            $this->db->where($where_qr);
            $this->db->where("b.board_table_name", $board_table_no);
            $res = $this->db->get();
            //die($this->db->last_query());
//	    $qr = " SELECT *     
//		FROM board_user_detail AS b
//                    INNER JOIN $board_table AS a
//                    ON a.id=b.user_id
//                  $where_qr AND (b.board_table_name = '$board_table_no')";
            //echo"<br/>getMyBoardIDs>>>>>>>" . $qr;
//	    $res = $this->db->query($qr);
            $m = 0;
            $id_encode = '';
            $encrypt_id = '';
            foreach ($res->result_array() as $row) {
                $user_boar_id_arr[$m]["seriel_no"] = $row["board_serial_no"];
                // echo "<BR />######".$this->getBoardTopID($row["board_serial_no"],$board_table_no);
                $user_boar_id_arr[$m]["top_id"] = $this->getBoardTopID($row["board_serial_no"], $board_table_no);
                $id_encode = $this->encrypt->encode($user_boar_id_arr[$m]["top_id"]);
                $id_encode = str_replace("/", "_", $id_encode);
                $encrypt_id = urlencode($id_encode);
                $user_boar_id_arr[$m]["encr_id"] = $encrypt_id;
                // $user_boar_id_arr[$m]["encr_id"] = $this->obj_vali->getEncrypt($user_boar_id_arr[$m]["top_id"]);
                $user_boar_id_arr[$m]["id"] = $row["user_ref_id"];
                $user_boar_id_arr[$m]["user_name"] = $this->obj_vali->IdToUserName($this->getBoardID($row["user_id"], $board_table));
                $user_boar_id_arr[$m]["date_of_joining"] = $row["date_of_join"];
                $user_boar_id_arr[$m]["split_status"] = strtoupper($this->getBoardSplitStatus($row["board_serial_no"], $board_table_no));
                $user_boar_id_arr[$m]["table_no"] = 1;

                $m++;
            }
        }

        return $user_boar_id_arr;
    }

    ///////////////////////////////  EDITED BY YASIR   ////////////////////////////////////
    public function getRefferenceID($id, $auto_goc_table_name) {
        $select_qr = "SELECT user_ref_id
			  FROM $auto_goc_table_name
			  WHERE id='$id'";
        $res_set = $this->db->select("user_ref_id")->where("id", $id)->get("$auto_goc_table_name");
        foreach ($res_set->result() as $row) {
            return $row->user_ref_id;
        }
    }

    public function getMyBoards($uesr_id, $board_table_no) {

        $board_table = "auto_board_" . $board_table_no;
        $user_boar_id_arr = array();
        $board_details_arr = array();
        $arr_id = $this->getBoardIDs($uesr_id, $board_table);
        //print_r($arr_id);
        $user_ft_id = $this->getRefferenceID($uesr_id, $board_table);
        $arr_len = count($arr_id);
        $m = 0;

        for ($k = 0; $k < $arr_len; $k++) {

            $board_id = $arr_id["detail$k"]['id'];
            $board_username = $arr_id["detail$k"]['user_name'];
            //echo "<br/>Board_ID$k-->$board_id==username>>$board_username";
            $this->getAllUplineId($board_id, 0, $this->NO_OF_LEVEL + 1, "$board_table");
            //echo "<br/>upline_array-->";
            //print_r($this->upline_id_arr);

            $up_arr_count = count($this->upline_id_arr);
            //echo "<br/>upline_array-count-->" . ($up_arr_count - 1);
            for ($i = ($up_arr_count - 1); $i >= 0; $i--) {

                $new_reg_id = $this->upline_id_arr["detail$i"]["id"];
                $new_username = $this->upline_id_arr["detail$i"]["user_name"];
                $date_of_joining = $this->upline_id_arr["detail$i"]["date_of_joining"];

                $id_encode = $this->encrypt->encode($new_reg_id);
                $id_encode1 = str_replace("/", "_", $id_encode);
                $encrypt_id = urlencode($id_encode1);

                $board_datails = $this->getUserBoardNumber($new_reg_id);
                $board_serial_num = $board_datails['board_no'];
                $board_status = $board_datails['status'];

                if (count($board_datails) != 0) {

                    //echo "<br/>iddddd>>>$new_reg_id====m>>$m===board_status>>$board_status==boardsno>>$board_serial_num";
                    $user_boar_id_arr["details$m"]["top_id"] = $new_reg_id;
                    $user_boar_id_arr["details$m"]["encr_id"] = $encrypt_id;
                    $user_boar_id_arr["details$m"]["id"] = $user_ft_id;
                    $user_boar_id_arr["details$m"]["board_user_name"] = "$board_username";
                    $user_boar_id_arr["details$m"]["user_name"] = $this->obj_vali->IdToUserName($user_ft_id);
                    $user_boar_id_arr["details$m"]["seriel_no"] = $board_serial_num;
                    $user_boar_id_arr["details$m"]["split_status"] = strtoupper($board_status);
                    $user_boar_id_arr["details$m"]["table_no"] = 1;
                    $user_boar_id_arr["details$m"]["date_of_joining"] = $date_of_joining;

                    $m++;
                    if (!array_search($board_serial_num, $this->board_serial_no))
                        $this->board_serial_no[] = $board_serial_num;
                }


                if ($board_status == 'yes') {
                    continue;
                } else {
                    break;
                }
            }
        }
        //echo "<br/>board_details array==>";
        //print_r($user_boar_id_arr);
        $board_details_arr['board_arr'] = $user_boar_id_arr;
        $board_details_arr['board_serial_numbers'] = $this->board_serial_no;
        return $board_details_arr;
    }

    public function getAllUplineId($id, $i, $limit, $auto_goc_table_name) {

        if ($id > 0) {

            $select = "SELECT father_id,position,user_ref_id,user_name,user_level,date_of_joining
                FROM $auto_goc_table_name
                WHERE id=$id";

            $query = $this->db->select("father_id,position,user_ref_id,user_name,user_level,date_of_joining")->where("id", $id)->get("$auto_goc_table_name");
            $cnt = $query->num_rows();
            //echo "<br>aaaaa $cnt bbbbbbb $select <br>";
            if ($cnt > 0) {
                foreach ($query->result() as $row) {
                    $father_id = $row->father_id;

                    $this->upline_id_arr["detail$i"]["id"] = $id;
                    $this->upline_id_arr["detail$i"]["user_name"] = $row->user_name;
                    $this->upline_id_arr["detail$i"]["user_ref_id"] = $row->user_ref_id;
                    $this->upline_id_arr["detail$i"]["user_level"] = $row->user_level;
                    $this->upline_id_arr["detail$i"]["position"] = $row->position;
                    $this->upline_id_arr["detail$i"]["date_of_joining"] = $row->date_of_joining;
                    $i = $i + 1;
                    //echo "<br/>$i < $limit";
                    if ($i < $limit) {
                        $this->getAllUplineId($father_id, $i, $limit, $auto_goc_table_name);
                    }
                }
            }
        }
    }

    public function getUserBoardNumber($user_id) {
        $board_details = array();
        $qr = "SELECT board_no,board_split_status FROM board_view WHERE board_top_id='$user_id'";
        //echo "<br/>qry>>".$qr;
        $query = $this->db->select("board_no,board_split_status")->where("board_top_id", $user_id)->get("board_view");
        foreach ($query->result() as $row) {
            if ($row->board_no != '')
                $board_details['board_no'] = $row->board_no;
            $board_details['status'] = $row->board_split_status;
        }
        return $board_details;
    }

    public function getSplitBoardDetails($board_id, $board_no) {
        $select = "SELECT * FROM board_split_status WHERE board_top_id=$board_id AND board_no!=$board_no";
        //echo $select;
        $res = $this->selectData($select, "Error on select board details 231645");
        $cnt = mysql_num_rows($res);
        if ($cnt > 0) {
            $row = mysql_fetch_array($res);
            $ret_arr['board_split_status'] = strtoupper($row['board_split_status']);
            $ret_arr['board_no'] = $row['board_no'];
            $ret_arr['date_of_join'] = $row['date_of_join'];
        }

        return $ret_arr;
    }

    public function getBoardIDs($user_ref_id, $board_table) {
        $arr_id = array();
        $qr = "SELECT id,user_name FROM $board_table WHERE  user_ref_id  = '$user_ref_id' ";
        //echo "<br>$qr";
        $res = $this->db->select("id,user_name")->where("user_ref_id", $user_ref_id)->get("$board_table");
        $i = 0;
        foreach ($res->result_array() as $row) {

            $arr_id["detail$i"] = $row;
            $i++;
        }
        return $arr_id;
    }

    public function getJoiningData($user_id) {
        $date_of_joining = "";
        $this->db->select("date_of_joining");
        $this->db->where("id", "$user_id");
        $res = $this->db->get("ft_individual");

        foreach ($res->result() as $row) {

            $date_of_joining = $row->date_of_joining;
        }
        return $date_of_joining;
    }

    public function getDownLineUSerCount($user_id) {
        /* require_once 'getTree.php';
          $Obj_tree = new GetTree();
          $count = $Obj_tree->getDownlineUsersNew($user_id);
          return $count; */

        $count = $this->getAlldownlineUsers($user_id);
        return $count;
    }

    public function getAlldownlineUsers($user_id, $start_date = '', $end_date = '') {

        $this->downline_user = array();
        $this->downline_count = 0;

        if ($user_id != "") {
            $arr[] = $user_id;
            $no_level = "";
            $downline = array();
            $liimit_incriment = 0;
            $next = 1;
            $arr = $this->getChildren($arr, $liimit_incriment, $no_level, $next);
            //print_r($this->downline_user);
            $p = 0;
            $detail_count = 0;

            for ($i = 1; $i <= count($this->downline_user) + 1; $i++) {

                if (array_key_exists("details$i", $this->downline_user))
                    $detail_count = count($this->downline_user["details$i"]);

                for ($j = 0; $j < $detail_count; $j++) {

                    if (array_key_exists("details$i", $this->downline_user))
                        $userid = $this->downline_user["details$i"]["$j"]["user_id"];
                    else
                        $userid = 0;

                    if ($userid > 0) {

                        $this->downline_count++;

                        if ($start_date != '' && $end_date != '') {

                            $query = $this->db->select("*")->from("ft_individual")->where("id", $userid)->get();

                            foreach ($query->result_array() as $row) {

                                if ($row["date_of_joining"] >= $start_date && $row["date_of_joining"] <= $end_date) {
                                    $row["full_name"] = $this->obj_vali->getUserFullName($userid);
                                    $downline["$p"] = $row;
                                }
                            }
                        }
                    }

                    $p++;
                }
            }
            //print_r($downline);
            if ($start_date != '' && $end_date != '')
                return count($downline);
            else
                return $this->downline_count;
        }
    }

    public function getChildren($arr, $liimit_incriment, $no_of_level, $next) {


        $this->each_level_leg_count = array();
        $liimit_incriment = $liimit_incriment + 1;
        $user_id_temp = null;
        $user_id = $arr;
        $sql = "";
        $select_users = "";
        $count_id = count($user_id);
        $flag = 0;
        if (count($user_id) > 0) {
            for ($i = 0; $i < $count_id; $i++) {
                if ($i !== 0) {
                    $flag = 1;
                    $sql .= " OR  father_id=$user_id[$i]";
                } else {
                    $sql .= "( father_id=$user_id[$i]";
                }
            }
            $sql.= " )";


            $res1 = $this->db->select("*")->where("active !=", "server")->where("$sql")->get("ft_individual");
            $current_level_leg_count = $res1->num_rows();
            if (array_key_exists("level$next", $this->each_level_leg_count))
                $old_count = $this->each_level_leg_count["level$next"];
            else
                $old_count = 0;
        }
        foreach ($res1->result_array() AS $row1) {
            $user_id[] = $row1['id'];
            $user_id_temp[] = $row1['id'];
            $this->downline_user["details$next"][]["user_id"] = $row1['id'];
        }

        if (($liimit_incriment < $no_of_level) OR ($no_of_level == 0)) {
            $count = count($user_id_temp);
            if ($count > 0) {
                if ($count >= 5000) {
                    $next = $next + 1;
                    $input_array = $user_id_temp;
                    $split_arr = array_chunk($input_array, intval($count / 4));
                    // print_r($split_arr);
                    for ($i = 0; $i < count($split_arr); $i++) {
                        $this->getChildren($split_arr[$i], $liimit_incriment, $no_of_level, $next);
                    }
                } else {
                    $next = $next + 1;
                    $this->getChildren($user_id_temp, $liimit_incriment, $no_of_level, $next);
                }
            }
        }
        return $user_id_temp;
    }

    public function getDirectRefCount($user_id) {

        $count_ref = 0;
        $qr = "SELECT referral_count FROM board_referral_count WHERE user_ref_id='$user_id' LIMIT 1";
        $query = $this->db->select("referral_count")->where("user_ref_id", $user_id)->limit(1)->get("board_referral_count");
        //echo "<br/>qr3>>>>>" . $this->db->last_query();

        foreach ($query->result() AS $row) {
            $count_ref = $row->referral_count;
        }
        //print_r($referrals);
        return $count_ref;
    }

    public function getMemberThisMonth($user_id) {
        /*  require_once 'getTree.php';
          $Obj_tree = new GetTree();

          $current_date = date("Y-m-d");

          $month_arr = $this->getCurrentMonthStartEndDates($current_date);

          $from_date = $month_arr["month_first_date"] . " 00:00:00";

          $to_date = $month_arr["month_end_date"] . " 23:59:59";
          //$count_ref=$Obj_tree->getMemberMonth($from_date,$to_date);
          $count = $Obj_tree->getDownlineUsersNewThisMonth($user_id, $from_date, $to_date);
          return $count; */

        $current_date = date("Y-m-d");
        $start_end_dates = $this->getCurrentMonthStartEndDates($current_date);
        $from_date = $start_end_dates['month_first_date'];
        $to_date = $start_end_dates['month_end_date'];

        $count = $this->getAlldownlineUsers($user_id, $from_date, $to_date);
        return $count;
    }

    public function getCurrentMonthStartEndDates($current_date) {

        $ret_arr = array();
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

    public function getBoardDetails($boarduser) {

        $user_boar_id_arr = array();
        $boardnumber = $this->obj_vali->userNameToID($boarduser);
        $qr = "SELECT * FROM board_view WHERE board_no='$boardnumber' AND board_table_name='1'";
        $query = $this->db->select("*")->where("board_no", $boardnumber)->where("board_table_name", "1")->get("board_view");

        $m = 0;
        foreach ($query->result_array() AS $row) {

            $board_serial_num = $row['board_no'];
            $board_status = $row['board_split_status'];

            $new_reg_id = $row['board_top_id'];
            $new_username = $this->obj_vali->IdToUserNameBoard($new_reg_id);
            $date_of_joining = $row["date_of_join"];

            $id_encode = $this->encrypt->encode($new_reg_id);
            $id_encode1 = str_replace("/", "_", $id_encode);
            $encrypt_id = urlencode($id_encode1);

            $user_boar_id_arr["details$m"]["top_id"] = $new_reg_id;
            $user_boar_id_arr["details$m"]["encr_id"] = $encrypt_id;
            //$user_boar_id_arr["details$m"]["id"] = $user_ft_id;
            $user_boar_id_arr["details$m"]["board_user_name"] = $new_username;
            //$user_boar_id_arr["details$m"]["user_name"] = $this->obj_vali->IdToUserName($user_ft_id);
            $user_boar_id_arr["details$m"]["seriel_no"] = $board_serial_num;
            $user_boar_id_arr["details$m"]["split_status"] = strtoupper($board_status);
            $user_boar_id_arr["details$m"]["table_no"] = 1;
            $user_boar_id_arr["details$m"]["date_of_joining"] = $date_of_joining;
        }
        return $user_boar_id_arr;
    }

    public function getReferralDetails($user_name, $month) {

        $date = date("Y") . "-" . $month . "-" . date("d");
        $start_end_dates = $this->getCurrentMonthStartEndDates($date);
        $start_date = $start_end_dates["month_first_date"] . " 00:00:00";
        $end_date = $start_end_dates["month_end_date"] . " 23:59:59";

        $referrals = array();
        $details = array();
        $user_id = $this->obj_vali->userNameToID($user_name);

        $this->db->select('*');
        $this->db->from('ft_individual');
        $where = "father_id = '$user_id' AND date_of_joining BETWEEN '$start_date' AND '$end_date'";
        $this->db->where($where);
        $query = $this->db->get();
        //echo "<br/>qryyyyy>>" . $this->db->last_query();
        $i = 0;
        foreach ($query->result_array() as $row) {
            $row["full_name"] = $this->obj_vali->getUserFullName($row['id']);
            $details["details$i"] = $row;
            $i++;
        }
        //print_r($referrals);
        $id_encode = $this->encrypt->encode($user_id);
        $id_encode1 = str_replace("/", "_", $id_encode);
        $encrypt_id = urlencode($id_encode1);

        $referrals['encr_id'] = $encrypt_id;
        $referrals['month_first_date'] = $start_end_dates["month_first_date"];
        $referrals['month_end_date'] = $start_end_dates["month_end_date"];
        $referrals['referral_details'] = $details;

        return $referrals;
    }

    public function getClubSplitCount($board_serial_numbers, $user_id, $board_no) {

        $auto_board = "auto_board_" . $board_no;
        $board_ids = $this->getBoardIDs($user_id, "$auto_board");

        $whr1 = '(';
        for ($k = 0; $k < count($board_ids); $k++) {
            $whr1.= " board_top_id !='" . $board_ids["detail$k"]['id'] . "'";

            if (($k + 1) != count($board_ids))
                $whr1.= " AND ";
        }

        $whr1 .= ')';
        $whr2 = '(';
        for ($i = 0; $i < count($board_serial_numbers); $i++) {
            $whr2.= "board_no='" . $board_serial_numbers[$i] . "'";

            if (($i + 1) != count($board_serial_numbers))
                $whr2.= " OR ";
        }
        $whr2 .= ')';

        $this->db->select("*")->where("$whr1")->where("$whr2")->where("board_split_status", "yes")->from("board_view");
        $count = $this->db->count_all_results();
        //echo "cnt>>" . $count . "qry>>" . $this->db->last_query();
        return $count;
    }

    public function getClubCompletedCount($board_serial_numbers, $user_id, $board_no) {

        $auto_board = "auto_board_" . $board_no;
        $board_ids = $this->getBoardIDs($user_id, "$auto_board");

        $whr1 = '(';
        for ($k = 0; $k < count($board_ids); $k++) {
            $whr1.= " board_top_id ='" . $board_ids["detail$k"]['id'] . "'";

            if (($k + 1) != count($board_ids))
                $whr1.= " OR ";
        }

        $whr1 .= ')';
        $whr2 = '(';
        for ($i = 0; $i < count($board_serial_numbers); $i++) {
            $whr2.= "board_no='" . $board_serial_numbers[$i] . "'";

            if (($i + 1) != count($board_serial_numbers))
                $whr2.= " OR ";
        }
        $whr2 .= ')';
        $this->db->select("*")->where("$whr1")->where("$whr2")->where("board_split_status", "yes")->from("board_view");
        $count = $this->db->count_all_results();

        /* foreach ($res->result() AS $row) {
          $count = $row->cnt;
          } */
        return $count;
    }

    public function getAllBoards($user_id = "") {

        $arr_id = array();
        $board_table_no = 1;
        $board_table = "auto_board_" . $board_table_no;

        if ($user_id == "") {
            $board_id = $this->getFormedBoards();
            $cnt = count($board_id);
            if (count($board_id) > 0) {
                $this->db->select("id,user_name");
                for ($i = 0; $i < $cnt; $i++) {
                    if ($i == 0) {
                        $this->db->where('user_ref_id', $board_id[$i]);
                    } else {
                        $this->db->or_where('user_ref_id', $board_id[$i]);
                    }
                }
                $res = $this->db->get('auto_board_1');
                $i = 0;
                //echo "query111===>" . $this->db->last_query();
                foreach ($res->result_array() as $row) {

                    $arr_id["detail$i"] = $row;
                    $i++;
                }
                // print_r($arr_id);
//        



                $arr_len = count($arr_id);
                $m = 0;

                for ($k = 0; $k < $arr_len; $k++) {

                    $board_id = $arr_id["detail$k"]['id'];
                    $board_username = $arr_id["detail$k"]['user_name'];
                    $user_ft_id = $this->getRefferenceID($board_id, $board_table);

                    //echo "<br/>Board_ID$k-->$board_id==username>>$board_username";
                    $this->getAllUplineId($board_id, 0, $this->NO_OF_LEVEL + 1, "$board_table");
                    //echo "<br/>upline_array-->";
                    //print_r($this->upline_id_arr);

                    $up_arr_count = count($this->upline_id_arr);
                    //echo "<br/>upline_array-count-->top_id" . ($up_arr_count - 1);
                    for ($i = ($up_arr_count - 1); $i >= 0; $i--) {

                        $new_reg_id = $this->upline_id_arr["detail$i"]["id"];
                        $new_username = $this->upline_id_arr["detail$i"]["user_name"];
                        $date_of_joining = $this->upline_id_arr["detail$i"]["date_of_joining"];

                        $id_encode = $this->encrypt->encode($new_reg_id);
                        $id_encode1 = str_replace("/", "_", $id_encode);
                        $encrypt_id = urlencode($id_encode1);

                        $board_datails = $this->getUserBoardNumber($new_reg_id);
                        $board_serial_num = $board_datails['board_no'];
                        $board_status = $board_datails['status'];

                        if (count($board_datails) != 0) {

                            //echo "<br/>iddddd>>>$new_reg_id====m>>$m===board_status>>$board_status==boardsno>>$board_serial_num";
                            $user_boar_id_arr["details$m"]["top_id"] = $new_reg_id;
                            $user_boar_id_arr["details$m"]["encr_id"] = $encrypt_id;
                            $user_boar_id_arr["details$m"]["id"] = $user_ft_id;
                            $user_boar_id_arr["details$m"]["board_user_name"] = "$board_username";
                            $user_boar_id_arr["details$m"]["user_name"] = $this->obj_vali->IdToUserName($user_ft_id);
                            $user_boar_id_arr["details$m"]["seriel_no"] = $board_serial_num;
                            $user_boar_id_arr["details$m"]["split_status"] = strtoupper($board_status);
                            $user_boar_id_arr["details$m"]["table_no"] = 1;
                            $user_boar_id_arr["details$m"]["date_of_joining"] = $date_of_joining;

                            $m++;
                            if (!array_search($board_serial_num, $this->board_serial_no))
                                $this->board_serial_no[] = $board_serial_num;
                        }


                        if ($board_status == 'yes') {
                            continue;
                        } else {
                            break;
                        }
                    }
                }
                //echo "<br/>board_details array==>";
                //print_r($user_boar_id_arr);
                $board_details_arr['board_arr'] = $user_boar_id_arr;
                $board_details_arr['board_serial_numbers'] = $this->board_serial_no;

                return $board_details_arr;
            }
        }
    }

    public function getAllBoarddetails($board_no) {
        $board_name = "auto_board_$board_no";
        $details = array();
        $i = 0;
        $this->db->select("board_table_name,board_no,board_top_id,board_split_status");
        $this->db->from("board_view");
        $this->db->where("board_table_name", $board_no);
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
            $details[$i]['table_no'] = $row['board_table_name'];
            $details[$i]['seriel_no'] = $row['board_no'];
            $details[$i]['top_id'] = $row['board_top_id'];

            $id_encode = $this->encrypt->encode($details[$i]['top_id']);
            $id_encode1 = str_replace("/", "_", $id_encode);
            $encrypt_id = urlencode($id_encode1);

            $details[$i]['encr_id'] = $encrypt_id;
            $details[$i]['id'] = $this->getUserRefIdByAutoID($details[$i]['top_id'], $board_name);
            $details[$i]['user_name'] = $this->getBoardUsernameFromUserRefID($board_name, $details[$i]['id']);
            $details[$i]["split_status"] = $row['board_split_status'];
            $details[$i]["date_of_joining"] = $this->getDateOfjoinig($details[$i]['top_id'], $details[$i]['table_no'], $details[$i]['seriel_no']);
            $i++;
        }
        return $details;
    }

    public function getFormedBoards() {
        $id = array();
        $i = 0;
        $this->db->select('board_top_id');
        $query = $this->db->get('board_view');
        foreach ($query->result() as $row) {
            $id[$i] = $row->board_top_id;
            $i++;
        }
        return $id;
    }

    public function getBoardUsernameFromUserRefID($auto_board_table_name, $board_user_id) {

        $grpres2 = $this->db->select("user_name")->where("user_ref_id", $board_user_id)->order_by("date_of_joining", "ASC")->limit(1)->get("$auto_board_table_name");
        //echo "<br /><br />rentry _user_name==>" . $this->db->last_query();
        foreach ($grpres2->result() as $row) {
            return $row->user_name;
        }
    }

    public function getDateOfjoinig($board_ref_id, $board_id, $board_serial_no) {
        $this->db->select("date_of_join");
        $this->db->from("board_user_detail");
        $this->db->where("board_table_name", $board_id);
        $this->db->where("board_serial_no", $board_serial_no);
        $this->db->where("user_id", $board_ref_id);
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            return $row->date_of_join;
        }
    }

    public function getMaxBoardPosition($board_serial_no) {
        $this->db->where("board_serial_no", $board_serial_no);
        $position = $this->db->count_all_results("board_user_detail");
        return $position;
    }

}

