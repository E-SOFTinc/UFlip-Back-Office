<?php

require_once 'Inf_Model.php';

require_once 'validation.php';

Class Shuffling extends Inf_Model {

    public $level_user_id = null;
    public $level_user_id_only;
    public $NO_OF_LEVEL;

    public function __construct() {
        parent::__construct();
        $this->obj_vali = new Validation();
        $this->level_user_id = null;

        $this->NO_OF_LEVEL = 3;
        $this->table_prefix = "31";
    }

    public function doShuffling($arr_for_shuff) {

        $auto_user_id = $arr_for_shuff["top_id"];
        $board_name = $arr_for_shuff["table_name"];
        $board_table_no = $arr_for_shuff["board_table_no"];
        $user_arr_for_shuf = $this->getLevelUsers($auto_user_id, $this->NO_OF_LEVEL, $board_name);


        //echo "<br />DELETED USER ARR OR SINGLE LINE ARR : $auto_user_id";
        $single_shuf_arr = $this->level_user_id_only;
        // print_r($single_shuf_arr);
        //STORE BOARD SERIAL NO AND ID FOR UPDATING BOARD SERIAL NUMBER AFTER SHUFF
        $board_user_detail_arr = $this->getBoardNumbersForUpdate($single_shuf_arr, $board_table_no);

        //THIS THE ORDERED SHUFLED ARRAY CONTAINS USER_ID AND PIN LEVEL
        $ordered_shuffeling_user_arr = $this->getOrderedShufflingArray($single_shuf_arr, $board_name);
        //echo "<br /> ORDERED SHUF ARRAY";
        //print_r($ordered_shuffeling_user_arr);
        // print_r($ordered_shuffeling_user_arr);
        // Take first id and corresponding position to fill
        $boadr_first_id = $ordered_shuffeling_user_arr["detail1"]["id"];
        $board_first_array = $this->getBoardFatherIDandPosition($auto_user_id, $board_name);  // TO DO 1
        // print_r($board_first_array);
        $board_first_father_id = $board_first_array["father_id"];
        $board_first_position = $board_first_array["position"];
        $board_first_level = $board_first_array["level"];

        //echo "<br>BOARD LEVEL :$board_first_level";
        //echo "<br>POSTION :$board_first_position";
        //echo "<br>BOARD SPLIT IS :$boadr_first_id";

        $first_user_ref_id = $this->getRefferenceID($boadr_first_id, $board_name);
        $first_user_name = $this->obj_vali->idToUserName($first_user_ref_id);

        //DELETE EXISTING BOARD FROM THE ABOVE ARRAY($user_arr_for_shuf)
        $this->deleteBoardUsers($single_shuf_arr, $board_name);


        //print_r($ordered_shuffeling_user_arr);
        // START RE ASSIGNING USING --  $ordered_shuffeling_user_arr -- ARRAY
        // Add user 1 st user
        $board_first_level = $board_first_level + 1;
        $brd_ord_id = 1;
        $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail1"]["id"], $first_user_ref_id, $ordered_shuffeling_user_arr["detail1"]["user_name"], $auto_user_id, 1, $board_first_level, $board_name, $brd_ord_id);
        /*  $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail1"]["id"], $first_user_ref_id, $ordered_shuffeling_user_arr["detail1"]["user_name"], $auto_user_id, 1, $board_first_level, $board_name,$brd_ord_id); */

        // Add user 2 nd user
        $brd_ord_id = $brd_ord_id + 1;
        $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail2"]["id"], $ordered_shuffeling_user_arr["detail2"]["ref_id"], $ordered_shuffeling_user_arr["detail2"]["user_name"], $auto_user_id, 2, $board_first_level, $board_name, $brd_ord_id);


        // Add user 3 nd user
        $brd_ord_id = $brd_ord_id + 1;
        $board_first_level = $board_first_level + 1;
        $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail3"]["id"], $ordered_shuffeling_user_arr["detail3"]["ref_id"], $ordered_shuffeling_user_arr["detail3"]["user_name"], $ordered_shuffeling_user_arr["detail1"]["id"], 1, $board_first_level, $board_name, $brd_ord_id);
        // Add user 4 nd user
        $brd_ord_id = $brd_ord_id + 1;
        $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail4"]["id"], $ordered_shuffeling_user_arr["detail4"]["ref_id"], $ordered_shuffeling_user_arr["detail4"]["user_name"], $ordered_shuffeling_user_arr["detail1"]["id"], 2, $board_first_level, $board_name, $brd_ord_id);
        // Add user 5 nd user
        $brd_ord_id = $brd_ord_id + 1;
        $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail5"]["id"], $ordered_shuffeling_user_arr["detail5"]["ref_id"], $ordered_shuffeling_user_arr["detail5"]["user_name"], $ordered_shuffeling_user_arr["detail2"]["id"], 1, $board_first_level, $board_name, $brd_ord_id);
        // Add user 6 nd user
        $brd_ord_id = $brd_ord_id + 1;
        $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail6"]["id"], $ordered_shuffeling_user_arr["detail6"]["ref_id"], $ordered_shuffeling_user_arr["detail6"]["user_name"], $ordered_shuffeling_user_arr["detail2"]["id"], 2, $board_first_level, $board_name, $brd_ord_id);
        if ($this->NO_OF_LEVEL == 3) {
            $board_first_level = $board_first_level + 1;
            $brd_ord_id = $brd_ord_id + 1;
            $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail7"]["id"], $ordered_shuffeling_user_arr["detail7"]["ref_id"], $ordered_shuffeling_user_arr["detail7"]["user_name"], $ordered_shuffeling_user_arr["detail3"]["id"], 1, $board_first_level, $board_name, $brd_ord_id);
            $brd_ord_id = $brd_ord_id + 1;
            $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail8"]["id"], $ordered_shuffeling_user_arr["detail8"]["ref_id"], $ordered_shuffeling_user_arr["detail8"]["user_name"], $ordered_shuffeling_user_arr["detail3"]["id"], 2, $board_first_level, $board_name, $brd_ord_id);
            $brd_ord_id = $brd_ord_id + 1;
            $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail9"]["id"], $ordered_shuffeling_user_arr["detail9"]["ref_id"], $ordered_shuffeling_user_arr["detail9"]["user_name"], $ordered_shuffeling_user_arr["detail4"]["id"], 1, $board_first_level, $board_name, $brd_ord_id);
            $brd_ord_id = $brd_ord_id + 1;
            $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail10"]["id"], $ordered_shuffeling_user_arr["detail10"]["ref_id"], $ordered_shuffeling_user_arr["detail10"]["user_name"], $ordered_shuffeling_user_arr["detail4"]["id"], 2, $board_first_level, $board_name, $brd_ord_id);
            $brd_ord_id = $brd_ord_id + 1;
            $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail11"]["id"], $ordered_shuffeling_user_arr["detail11"]["ref_id"], $ordered_shuffeling_user_arr["detail11"]["user_name"], $ordered_shuffeling_user_arr["detail5"]["id"], 1, $board_first_level, $board_name, $brd_ord_id);
            $brd_ord_id = $brd_ord_id + 1;
            $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail12"]["id"], $ordered_shuffeling_user_arr["detail12"]["ref_id"], $ordered_shuffeling_user_arr["detail12"]["user_name"], $ordered_shuffeling_user_arr["detail5"]["id"], 2, $board_first_level, $board_name, $brd_ord_id);
            $brd_ord_id = $brd_ord_id + 1;
            $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail13"]["id"], $ordered_shuffeling_user_arr["detail13"]["ref_id"], $ordered_shuffeling_user_arr["detail13"]["user_name"], $ordered_shuffeling_user_arr["detail6"]["id"], 1, $board_first_level, $board_name, $brd_ord_id);
            $brd_ord_id = $brd_ord_id + 1;
            $this->addShuffledUsersToBoard($ordered_shuffeling_user_arr["detail14"]["id"], $ordered_shuffeling_user_arr["detail14"]["ref_id"], $ordered_shuffeling_user_arr["detail14"]["user_name"], $ordered_shuffeling_user_arr["detail6"]["id"], 2, $board_first_level, $board_name, $brd_ord_id);
        }
    }

    public function getOrderedShufflingArray($shuffled_arr, $board_name) {

        $i = 1;
        $user_sorted_arr = $this->getSortedArray($shuffled_arr, $board_name);
        $order_shuf_arr = array();
        // echo "<br /> SORTED SINGLE ARR";
        // print_R($user_sorted_arr);
        $sort_shuf_arr_len = count($user_sorted_arr);
        for ($k = 0; $k < $sort_shuf_arr_len; $k++) {
            $order_shuf_arr["detail$i"]["id"] = $user_sorted_arr["detail$k"]["id"];
            $order_shuf_arr["detail$i"]["ref_id"] = $this->getRefferenceID($user_sorted_arr["detail$k"]["id"], $board_name);
            $order_shuf_arr["detail$i"]["user_name"] = $this->getUserNameFromAuto($user_sorted_arr["detail$k"]["id"], $board_name);
            $i = $i + 1;
        }
        //echo "<br/>LAST SHUFFLED RETURN";
        //print_r($order_shuf_arr);
        return $order_shuf_arr;
    }

    public function getSortedArray($arr_users, $table_name) {
        // sort($arr_users);
        // echo "ARRAY FOR SORT <br>:";
        //  print_r($arr_users);

        $direct_referal = 0;
        $tmp_direct_referal = 0;
        $arr_len = count($arr_users);
        $j = 0;
        $arr_user_detail = array();

        for ($i = 0; $i < $arr_len; $i++) {
            $user_id = $arr_users[$i];
            $user_ref_id = $this->getRefferenceID($user_id, $table_name);
            //echo "USER REF ID : $user_ref_id";
            $direct_referal_count = $this->getDirectReferalCount($user_id, $user_ref_id);

            $arr_user_detail["detail$j"]["referal"] = $direct_referal_count;
            $arr_user_detail["detail$j"]["id"] = $user_id;
            $j++;
            // echo "<br/>PERFORMING SHUFFLING REFERAL : REFID :$user_ref_id ,USERID_BOARD :$user_id ,COUNT: $direct_referal_count ";
        }

        //print_r($arr_user_detail);
        $arr_new_sort = $this->sortMultiArray($arr_user_detail, "referal", $table_name);
        //print_r($arr_new_sort);
        return $arr_new_sort;
    }

    function sortMultiArray($arr, $key, $table_name) {
//print_r($arr);
        $arr_len = count($arr);
        $temp_arr = array();
        for ($i = 0; $i < $arr_len; $i++) {
            $element[] = $arr["detail$i"][$key];
//$arr["detail$i"][$key]
//echo"####".$arr["detail$i"][$key];
        }
//echo "<br> BEFORE SORT";
//print_r($element);

        rsort($element);

//echo "<br /> SORTED SINGLE REFERAL";
//print_r($element);


        /*
          $repeat_status=false;
          if (count(array_unique($element)) < count($element))
          {
          $repeat_status=true;
          }
         */

//echo "Length".$arr_len."Elemt len".count($element);
//echo "<br>ACTUAL ARR";
        //   print_r($arr);

        $arr_new = array();
        for ($i = 0; $i < $arr_len; $i++) {
            $index = $i;
            $first_element = $element[$index];
            for ($j = 0; $j < $arr_len; $j++) {
                $sec_element = $arr["detail$j"][$key];
                if ($first_element == $sec_element) {
                    //echo "<br/>Element:".$element[$i]."All: ".$arr["detail$j"][$key]."ID :".$arr["detail$j"]["id"];
                    $arr_new["detail$i"][$key] = $element[$index];

                    if (!in_array($arr["detail$j"]["id"], $temp_arr)) {
                        $arr_new["detail$i"]["id"] = $arr["detail$j"]["id"];
                        $temp_arr[] = $arr["detail$j"]["id"];
                        //   echo "<br>ELEEMENT".$arr["detail$j"]["id"];
                        $arr["detail$j"][$key] = "";
                        break;
                    }
                }
            }
        }

//print_r($arr_new);
//echo "<br> AFTER SORT REFERAL";
//print_r($arr_new);
        /*
          if($arr_new)
          {
          for($i=0;$i<$arr_len;$i++)
          {
          $user_id=$arr_new["detail$i"]["id"];
          $joining_date= $this->getBoardEntryData($user_id,$table_name);
          $arr_new["detail$i"]["joining"]=$joining_date;
          }
          $arr_new1=$this->sortMultiArrayByDate($arr_new,"joining");
          $arr_new=$arr_new1;
          } */

        return $arr_new;
    }

    function sortMultiArrayByDate($arr, $key) {
        $arr_len = count($arr);
        for ($i = 0; $i < $arr_len; $i++) {
            $element[] = $arr["detail$i"][$key];
//$arr["detail$i"][$key]
//echo"####".$arr["detail$i"][$key];
        }

        sort($element);
//echo "Length".$arr_len."Elemt len".count($element);
//print_r($arr);
        for ($i = 0; $i < $arr_len; $i++) {
            $index = $i;
            $first_element = $element[$index];
//echo "FIREST ELEMENT $first_element";
            for ($j = 0; $j < $arr_len; $j++) {
                $sec_element = $arr["detail$j"][$key];
//echo "ELEMENTS $sec_element SEC$sec_element ";
                if ($first_element == $sec_element) {
//echo "<br/>Element:".$element[$i]."All".$arr["detail$j"][$key];
                    $arr_new["detail$i"]["id"] = $arr["detail$j"]["id"];
//echo "<br>ID :".$arr["detail$j"]["id"];
                    $arr["detail$j"][$key] = "";
                    break;
                }
            }
        }
//print_r($arr_new);

        return $arr_new;
    }

    public function getBoardEntryData($user_id, $table_name) {
        $qr = "SELECT date_of_joining FROM $table_name WHERE id ='$user_id'";
        //  echo "<br>".$qr;
        $res = $this->selectData($qr, "Error on selcting joining 576768");
        $row = mysql_fetch_array($res);
        $date_of_joining = $row['date_of_joining'];
        return $date_of_joining;
    }

    public function getDirectReferalCount($user_id, $user_ref_id) {

        /* $select_qr = "SELECT COUNT(*) AS refer_count FROM 31_user_details WHERE user_details_ref_user_id='$user_id'";
          $res_set = $this->selectData($select_qr, "Error on sel au 546437");
          $row = mysql_fetch_array($res_set);
          $refer_count = $row['refer_count']; */

        $refer_count = 0;

        $qr = "SELECT  referral_count FROM  board_referral_count  WHERE  board_id='$user_id' AND user_ref_id='$user_ref_id'";
        $qry = $this->db->select("referral_count")->where("board_id", $user_id)->where("user_ref_id", $user_ref_id)->get("board_referral_count");

        foreach ($qry->result_array() AS $row) {
            $refer_count = $row['referral_count'];
        }
        return $refer_count;
    }

    public function getDirectReferalCountLegendz($user_id, $board_name) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }

        $user_details = $this->table_prefix . "user_details";


        $count = 0;
        $select_qr = "SELECT user_detail_refid FROM $user_details
				     WHERE user_details_ref_user_id=$user_id";
        $res_set = $this->selectData($select_qr, "Error on sel au 46548");
        while ($row = mysql_fetch_array($res_set)) {
            if ($this->isEntryExsitInBoard($board_name, $row["user_detail_refid"])) {
                $count++;
            }
        }
        $refer_count = $count;

        return $refer_count;
    }

    public function getBoardFatherIDandPosition($board_first_id, $board_table_name) {
        $select = "SELECT * FROM $board_table_name WHERE id=$board_first_id";
        $ret = array();
        $res = $this->db->select("*")->where("id", $board_first_id)->get("$board_table_name");
        foreach ($res->result_array() AS $row) {
            $ret["father_id"] = $row["father_id"];
            $ret["position"] = $row["position"];
            $ret["level"] = $row["user_level"];
        }
        return $ret;
    }

    public function deleteBoardUsers($user_detail_arr, $auto_board) {
        $arr_len = count($user_detail_arr);
        // print_r($user_detail_arr);
        for ($i = 0; $i < $arr_len; $i++) {
            $user_id = $user_detail_arr[$i];
            if ($i == 0)
                $this->db->where("id",$user_id);
            else
                $this->db->or_where("id",$user_id);
        }
        $this->db->delete("$auto_board");
        //echo "<br/>" . $this->db->last_query();
    }

    public function addShuffledUsersToBoard($boadr_user_id, $user_ref_id, $user_name, $board_father_id, $board_position, $board_level, $board_table_name, $brd_ord_id = 1) {

        $insert = "INSERT INTO $board_table_name SET
               id=$boadr_user_id,
               user_ref_id='$user_ref_id',
               father_id=$board_father_id,
               position='$board_position',
               user_name ='$user_name',
               user_level='$board_level' ";

        $data = array(
            "id" => $boadr_user_id,
            "user_ref_id" => $user_ref_id,
            "user_name" => $user_name,
            "position" => $board_position,
            "father_id" => $board_father_id,
            "user_level" => $board_level
        );
        $res = $this->db->insert("$board_table_name", $data);
    }

    public function updateFTIndividualAfterBoardShuffling($boadr_user_id, $user_ref_id, $user_name, $board_father_id, $board_position, $board_level, $board_table_name) {

        /* $update = " UPDATE 31_ft_individual SET 
          father_id=$user_ref_id
          WHERE father_id=$boadr_user_id";
          echo "<br/>update ft>>>>> $update";
          $res = $this->db->query($update); */

        $update1 = " UPDATE 31_ft_individual SET
                    id='$user_ref_id',
                    father_id=$board_father_id,
                    position='$board_position',
                    user_name ='$user_name',
                    user_level='$board_level' 
                    WHERE id=$boadr_user_id";
        //echo "<br/>update ft>>>>> $update1";
        $res = $this->db->query($update1);
    }

    public function getUserCount($user_ref_id, $auto_table_name) {
        $qr = "SELECT COUNT(*) AS cnt FROM $auto_table_name WHERE user_ref_id ='$user_ref_id'";
        // echo "<br>".$qr;
        $res = $this->selectData($qr, "Error on selcting user count 45666");
        $row = mysql_fetch_array($res);
        $count = $row['cnt'];
        return $count;
    }

    public function updateBoardUserStatus($auto_board_table, $user_id, $status) {
        $qr = "UPDATE $auto_board_table SET active ='$status' WHERE user_ref_id  = '$user_id'";
        //echo "<br> $qr";
        $res = $this->updateData($qr, "Error on updating board active status -224444");
        return $res;
    }

    public function getRefferenceID($id, $auto_goc_table_name) {
        $select_qr = "SELECT user_ref_id
			  FROM $auto_goc_table_name
			  WHERE id='$id'";
        $res_set = $this->db->select("user_ref_id")->where("id", $id)->get("$auto_goc_table_name");
        foreach ($res_set->result() as $row) {
            return $row->user_ref_id;
        }
    }

    public function getUserNameFromAuto($id, $auto_goc_table_name) {
        $user_name = '';
        $qr = "select user_name from $auto_goc_table_name where id = '$id'";
        $grpres2 = $this->db->select("user_name")->where("id", $id)->get("$auto_goc_table_name");
        foreach ($grpres2->result_array() AS $group2)
            $user_name = $group2["user_name"];
        return $user_name;
    }

    public function getLevelUsers($user_id, $level, $auto_goc_table_name) {
        $arr[] = $user_id;
        $this->level_user_id = null;
        $this->level_user_id_only = null;
        $this->level_user_id["level1"][0] = $user_id;
        // $this->level_user_id_only[] = $user_id;
        $this->level_user_id["level1"]["user_name0"] = $this->getUserNameFromAuto($user_id, $auto_goc_table_name);
        $this->level_user_id["level1"]["ref_id0"] = $this->getRefferenceID($user_id, $auto_goc_table_name);
        //  echo $no_of_level;
        $liimit_incriment = 0;
        $next = 2;

        $this->getLevelUsersID($arr, $liimit_incriment, $level, $next, $auto_goc_table_name);
        return $this->level_user_id;
    }

    public function getLevelUsersID($arr, $liimit_incriment, $no_of_level, $next, $auto_goc_table_name) {
        $liimit_incriment = $liimit_incriment + 1;
        $user_id_temp = null;
        $user_id = $arr;
        $select_users = "";
        $count_id = count($user_id);
        $flag = 0;
        //print_r($user_id);
        $sql = '';
        if (count($user_id) > 0) {

            for ($i = 0; $i < $count_id; $i++) {
                if ($i !== 0) {
                    $flag = 1;
                    $sql .= " OR  father_id='$user_id[$i]'";
                } else {
                    $sql .= "( father_id='$user_id[$i]'";
                }
            }
            $sql .= " )";

            $res1 = $this->db->select("id,user_name,user_ref_id")->where("active !=", "server")->where("$sql")->get("$auto_goc_table_name");
           // $current_level_leg_count = mysql_num_rows($res1);



            $m = 0;
            //NOTE :- NOT ADD EXTRA ELEMENT IN THIS ARRAY $this->level_user_id
            foreach ($res1->result_array() AS $row1) {

                $user_id[] = $row1['id'];
                $user_id_temp[] = $row1['id'];
                $this->level_user_id_only[] = $row1['id'];
                $this->level_user_id["level$next"][] = $row1['id'];
                $this->level_user_id["level$next"]["user_name$m"] = $row1['user_name'];
                $this->level_user_id["level$next"]["ref_id$m"] = $row1['user_ref_id'];
                $m++;
            }
        }

        //print_r($last_level_user);

        if ($liimit_incriment < $no_of_level) {
            $count = count($user_id_temp);
            if ($count > 0) {
                if ($count >= 5000) {
                    $next = $next + 1;
                    $input_array = $user_id_temp;
                    //  echo "In Codition Count div:".intval($count/3);
                    $split_arr = array_chunk($input_array, intval($count / 4));
                    // print_r($split_arr);
                    for ($i = 0; $i < count($split_arr); $i++) {
                        ///echo "Loop<br>";
                        //print_r($split_arr[$i]);
                        $this->getLevelUsersID($split_arr[$i], $liimit_incriment, $no_of_level, $next, $auto_goc_table_name);
                    }
                } else {
                    // echo "<br>In ELSE";
                    //print_r($user_id_temp);
                    $next = $next + 1;
                    $this->getLevelUsersID($user_id_temp, $liimit_incriment, $no_of_level, $next, $auto_goc_table_name);
                }
            }
        }
        return $this->level_user_id;
    }

    public function getBoardNumbersForUpdate($user_id_arr, $board_table_no) {
        require_once 'boardview_model.php';
        $obj_board_view = new boardview_model();
        $board_user_detail_arr = array();
        $arr_len = count($user_id_arr);
        for ($i = 0; $i < $arr_len; $i++) {
            $user_id = $user_id_arr[$i];
            $board_user_detail_arr[$i]["id"] = $user_id;
            $board_user_detail_arr[$i]["serial_no"] = $obj_board_view->getBoardNumberFromBoardUserDetails($user_id, $board_table_no);
        }
        return $board_user_detail_arr;
    }

    public function isEntryExsitInBoard($board_name, $user_ref_id) {
        $qr = "SELECT count(*) AS cnt FROM $board_name WHERE user_ref_id = '$user_ref_id'";
        // echo $qr;
        $res = $this->selectData($qr, "Error on select count - 54646 ");
        $row = mysql_fetch_array($res);
        $count = $row['cnt'];
        $flag = false;
        if ($count > 0) {
            $flag = true;
        }
        return $flag;
    }

}