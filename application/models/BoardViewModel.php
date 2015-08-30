<?php

require_once 'Validation.php';

Class BoardView extends Model {

    public $NO_OF_LEVEL;

    public function __construct() {
        $this->obj_vali = new Validation();
        $this->NO_OF_LEVEL = 3;
        $this->table_prefix = 0;
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
    }

    public function insertIntoBoardView($new_reg_id2, $board_table_no) {

        $board_name = "auto_board_" . $board_table_no;

        $board_number_split = $this->getBoardNumber($new_reg_id2, $board_table_no);
        $this->setBoardStatusYES($board_number_split, $board_table_no);
        $max_board_number_left = $this->getMaxBoardNumber($board_table_no) + 1;
        $max_board_number_right = $max_board_number_left + 1;

        $user_ref_id2 = $this->getUserRefIdByAutoID($new_reg_id2, $board_name);
        $this->updateBoardSplitStatus($user_ref_id2, $board_table_no);

        $arr_user_left_right = $this->getLeftRightUserID($new_reg_id2, $board_name);
        $left_user_id_1 = $arr_user_left_right['left_id'];
        $right_user_id_1 = $arr_user_left_right['right_id'];
        $left_user_id_1_refer = $arr_user_left_right['left_refer_id'];
        $right_user_id_1_refer = $arr_user_left_right['right_refer_id'];

        $this->insertBoardDetails($max_board_number_left, $arr_user_left_right['left_id'], $board_table_no);
        $this->insertBoardDetails($max_board_number_right, $arr_user_left_right['right_id'], $board_table_no);

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

        $this->insertBoardUserDetails($left_user_id_1, $max_board_number_left, $board_table_no);
        $this->insertBoardUserDetails($left_user_id_2, $max_board_number_left, $board_table_no);
        $this->insertBoardUserDetails($left_user_id_3, $max_board_number_left, $board_table_no);

        $this->insertBoardUserDetails($right_user_id_1, $max_board_number_right, $board_table_no);
        $this->insertBoardUserDetails($right_user_id_2, $max_board_number_right, $board_table_no);
        $this->insertBoardUserDetails($right_user_id_3, $max_board_number_right, $board_table_no);

        if ($this->NO_OF_LEVEL == 3) {
            $arr_user_right_users = $this->getLeftRightUserID($left_user_id_2, $board_name);
            $left_user_id = $arr_user_right_users["left_id"];
            $right_user_id = $arr_user_right_users["right_id"];
            $left_user_id_refer = $arr_user_right_users["left_refer_id"];
            $right_user_id_refer = $arr_user_right_users["right_refer_id"];
            $this->insertBoardUserDetails($left_user_id, $max_board_number_left, $board_table_no);
            $this->insertBoardUserDetails($right_user_id, $max_board_number_left, $board_table_no);

            $arr_user_right_users = $this->getLeftRightUserID($left_user_id_3, $board_name);
            $left_user_id = $arr_user_right_users["left_id"];
            $right_user_id = $arr_user_right_users["right_id"];
            $left_user_id_refer = $arr_user_right_users["left_refer_id"];
            $right_user_id_refer = $arr_user_right_users["right_refer_id"];
            $this->insertBoardUserDetails($left_user_id, $max_board_number_left, $board_table_no);
            $this->insertBoardUserDetails($right_user_id, $max_board_number_left, $board_table_no);
            //END OF LEFT INSERT


            $arr_user_right_users = $this->getLeftRightUserID($right_user_id_2, $board_name);
            $left_user_id = $arr_user_right_users["left_id"];
            $right_user_id = $arr_user_right_users["right_id"];
            $left_user_id_refer = $arr_user_right_users["left_refer_id"];
            $right_user_id_refer = $arr_user_right_users["right_refer_id"];
            $this->insertBoardUserDetails($left_user_id, $max_board_number_right, $board_table_no);
            $this->insertBoardUserDetails($right_user_id, $max_board_number_right, $board_table_no);

            $arr_user_right_users = $this->getLeftRightUserID($right_user_id_3, $board_name);
            $left_user_id = $arr_user_right_users["left_id"];
            $right_user_id = $arr_user_right_users["right_id"];
            $left_user_id_refer = $arr_user_right_users["left_refer_id"];
            $right_user_id_refer = $arr_user_right_users["right_refer_id"];
            $this->insertBoardUserDetails($left_user_id, $max_board_number_right, $board_table_no);
            $this->insertBoardUserDetails($right_user_id, $max_board_number_right, $board_table_no);
            //END OF RIGHT INSERT
        }
    }

    public function getLeftRightUserID($user_id, $board_table_name) {
        $qr = "SELECT id,user_ref_id,position FROM $board_table_name WHERE father_id='$user_id'";
        $res = $this->selectData($qr, "Error on selecting fahter 657866");
        while ($row = mysql_fetch_array($res)) {
            $position = $row['position'];
            $id = $row['id'];
            $user_refer_d = $row['user_ref_id'];

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
        echo $select;
        $res = $this->selectData($select, "Error on select board split status");
        $row = mysql_fetch_array($res);
        $board_seriel_no = $row['board_no'];
        return $board_seriel_no;
    }

    public function getBoardSplitStatus($board_seriel_no, $board_table) {

        $select_b = "SELECT board_split_status  FROM board_view WHERE board_no=$board_seriel_no AND board_table_name = '$board_table'";
        $res_b = $this->selectData($select_b, "Error on take status333");
        $row_b = mysql_fetch_array($res_b);
        $board_status = $row_b['board_split_status'];
        if ($board_status == "yes")
            $ret_msg = "yes";
        else
            $ret_msg = "no";


        return $ret_msg;
    }

    public function getBoardNumberByFather($user_id, $board_table) {
        $select = "SELECT board_serial_no FROM $board_table WHERE father_id=$user_id AND position = 1";
        $res = $this->selectData($select, "Error on sele fath left id ");
        $row = mysql_fetch_array($res);
        $board_serial_no = $row['board_serial_no'];
        return $board_serial_no;
    }

    public function insertBoardUserDetails($inser_id_user_id, $board_number, $board_table_no) {
        $curent_date = date("Y-m-d H:i:s");
        $qr_insert = "INSERT INTO  board_user_detail SET
                    user_id = '$inser_id_user_id' ,
                    board_serial_no = '$board_number',
                    date_of_join = '$curent_date',
                    board_table_name = '$board_table_no'";
        $this->insertData($qr_insert, "Error on insert -546");
    }

    public function getFatherID($user_id, $board_number) {
        $qr = "SELECT father_id  FROM $board_number WHERE id='$user_id'";
        $res = $this->selectData($qr, "Error on selecting fahter 654647 ");
        $row = mysql_fetch_array($res);
        $father_id = $row['father_id'];
        return $father_id;
    }

    public function getBoardTopID($board_seriel_no, $board_no) {
        $select_b = "SELECT board_top_id FROM board_view WHERE board_no=$board_seriel_no AND board_table_name = '$board_no' ";
        $res_b = $this->selectData($select_b, "Error on take status111");
        $row_b = mysql_fetch_array($res_b);
        $board_top_id = $row_b['board_top_id'];
        return $board_top_id;
    }

    public function getBoardSerialNumber($board_user_id, $board_number) {
        $select_b = "SELECT MAX(board_serial_no) FROM board_user_detail
 WHERE user_id=$board_user_id AND board_table_name = '$board_number' ";
        $res_b = $this->selectData($select_b, "Error on take status444");
        $row_b = mysql_fetch_array($res_b);
        $board_serial_no = $row_b['MAX(board_serial_no)'];
        return $board_serial_no;
    }

    public function setBoardStatusYES($board_number, $board_table_no) {
        $insert = "UPDATE board_view SET
            board_split_status='yes' WHERE board_no=$board_number AND board_table_name = '$board_table_no' LIMIT 1
            ";
        $this->updateData($insert, "Error on update Board status");
    }

    public function getMaxBoardNumber($board_table_name_no) {

        $select_b = "SELECT MAX(board_no) AS max_num FROM board_view WHERE board_table_name = '$board_table_name_no'";
        $res_b = $this->selectData($select_b, "Error on take status222");
        $row_b = mysql_fetch_array($res_b);
        $max_num = $row_b['max_num'];

        return $max_num;
    }

    public function insertBoardDetails($board_number, $board_top_id, $board_table_name_no) {
        $cur_date = date("Y-m-d H:i:s");
        $insert = "INSERT INTO board_view SET
            board_no=$board_number,
            board_top_id = $board_top_id,
            date_of_join = '$cur_date',
            board_split_status='no',
            board_table_name = '$board_table_name_no'
            ";
        $this->insertData($insert, "Error on insert Board status");
    }

    public function getBoardNumberFromBoardUserDetails($user_id, $board_number) {
        $select = "SELECT max(board_serial_no) as board_s_no FROM board_user_detail WHERE user_id=$user_id
               AND board_table_name = '$board_number'";
        $res = $this->selectData($select, "Error on select board serial no-3546");
        $row = mysql_fetch_array($res);
        $board_seriel_no = $row['board_s_no'];
        return $board_seriel_no;
    }

    public function getNotSpitedBoardTableNameMaxReached($user_id) {
        $select = "SELECT max(board_number) as board_number FROM board_split_status WHERE user_ref_id='$user_id' AND status='no'";
        $res = $this->selectData($select, "Error on select board serial no-3546");
        $row = mysql_fetch_array($res);
        $board_number = $row['board_number'];
        return $board_number;
    }

    public function getMyBoardSerialNumbers($board_id, $board_number) {
        $select_b = "SELECT board_serial_no FROM board_user_detail
 WHERE user_id=$board_id AND board_table_name = '$board_number' ";
        $res_b = $this->selectData($select_b, "Error on take  56578689");
        while ($row_b = mysql_fetch_array($res_b)) {
            $board_serial_no_arr[] = $row_b["board_serial_no"];
        }
        return $board_serial_no_arr;
    }

    public function getBoardTopIdByBoardSerailNumber($board_serail_no_arr, $board_table_no) {
        $arr_len = count($board_serail_no_arr);
        for ($i = 0; $i < $arr_len; $i++) {
            $board_ser_no = $board_serail_no_arr[$i];
            $board_top_idp["$i"]["id"] = $this->getBoardTopID($board_ser_no, $board_table_no);
            $board_top_idp["$i"]["serial"] = $board_ser_no;
        }
        return $board_top_idp;
    }

    public function getUserRefIdByAutoID($id, $goc_table_name) {
        $select = "SELECT user_ref_id FROM $goc_table_name WHERE id=$id";
        $res = $this->selectData($select, "Error on selecting user id 01");
        $row = mysql_fetch_array($res);
        return $row['user_ref_id'];
    }

    public function updateBoardSplitStatus($user_id, $board_number) {
        $date = date('Y-m-d H:i:s');
        $qr = "UPDATE board_split_status SET 
            status='yes',date_of_update='$date' WHERE user_ref_id='$user_id' AND board_number='$board_number'";
        $res = $this->updateData($qr, "Error on Inserting Data in to board_split_status -3546");
        return $res;
    }

    public function getBoardID($user_id, $board_table) {
        $qr = "SELECT user_ref_id  FROM $board_table WHERE id='$user_id'";
        $res = $this->selectData($qr, "Error on selecting fahter 65786 from ft");
        $row = mysql_fetch_array($res);
        $user_ref_id = $row['user_ref_id'];
        return $user_ref_id;
    }

    public function getMyBoardIDs($uesr_id, $board_table_no) {
        require_once 'Validation.php';
        $obj_vali = new Validation();
        $board_table = "auto_board_" . $board_table_no;
        $arr_id = null;
        $arr_id = $this->getBoardIDs($uesr_id, $board_table);

        $arr_len = count($arr_id);
        for ($i = 0; $i < $arr_len; $i++) {
            $board_id = $arr_id[$i];
            if ($i == 0) {
                $where_qr .= "WHERE user_id = '$board_id'";
            } else {
                $where_qr .= " OR  user_id = '$board_id'";
            }
        }
        if ($arr_len > 0) {
            $qr = "SELECT *
                FROM board_user_detail AS b
                  $where_qr AND (board_table_name = '$board_table_no')";
            $res = $this->selectData($qr, "Error on insert 42365");
            $m = 0;
            while ($row = mysql_fetch_array($res)) {
                $user_boar_id_arr[$m]["seriel_no"] = $row["board_serial_no"];
                // echo "<BR />######".$this->getBoardTopID($row["board_serial_no"],$board_table_no);
                $user_boar_id_arr[$m]["top_id"] = $this->getBoardTopID($row["board_serial_no"], $board_table_no);
                $user_boar_id_arr[$m]["encr_id"] = $obj_vali->getEncrypt($user_boar_id_arr[$m]["top_id"]);
                $user_boar_id_arr[$m]["id"] = $row["user_refer_id"];
                $user_boar_id_arr[$m]["user_name"] = $obj_vali->IdToUserName($this->getBoardID($row["user_id"], $board_table));
                $user_boar_id_arr[$m]["date_of_joining"] = $row["date_of_join"];
                $user_boar_id_arr[$m]["split_status"] = strtoupper($this->getBoardSplitStatus($row["board_serial_no"], $board_table_no));

                $m++;
            }
        }

        return $user_boar_id_arr;
    }

    public function getSplitBoardDetails($board_id, $board_no) {
        $select = "SELECT * FROM board_split_status WHERE board_top_id=$board_id AND board_no!=$board_no";
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
        $qr = "SELECT id FROM $board_table WHERE  user_ref_id  = '$user_ref_id' ";
        $res = $this->selectData($qr, "Eror on insert -4577476");
        while ($row = mysql_fetch_array($res)) {
            $arr_id[] = $row['id'];
        }
        return $arr_id;
    }

}
