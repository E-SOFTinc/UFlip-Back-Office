<?php

require_once 'Inf_Model.php';
require_once 'validation.php';
require_once 'boardview_model.php';
require_once 'Shuffling.php';
require_once 'Settings.php';

class AutoFillingBoard extends Inf_Model {

    public $each_level_leg_count = Array();
    public $level_user_id;
    public $obj_vali;
    public $obj_board_view;
    public $PLACEMENT_DETAILS_ARRS = Array();
    public $upline_id_arr;
    public $NO_OF_LEVEL;
    public $OBJ_SHUFFLING_BOARD;
    public $level_user_id_only;
    public $ACTIVE_SPONSER;
    public $OBJ_SET;
    public $BOARD_TABLE_NO;

    public function __construct() {
        parent::__construct();
        $this->obj_vali = new Validation();
        $this->obj_board_view = new boardview_model();
        $this->level_user_id = null;
        $this->upline_id_arr = array();
        $this->obj_set = new Settings();
        $this->ACTIVE_SPONSER = 0;
        $this->NO_OF_LEVEL = 3; //IF THE BOARD SEVEN PUT TAKE 2 or FIFTEEN TAKE IT AS 3
        $this->OBJ_SHUFFLING_BOARD = new Shuffling();
        $this->BOARD_TABLE_NO = 0;
        $this->OBJ_SET = new Settings();
//$this->connectDB();
    }

    public function addBoard($ft_user_id, $user_name, $active, $board_table_name, $board_no, $shuffle_status, $type = '', $ft_referral_id = "", $board_id_top = '') {

        //echo "<br/> $ft_user_id--$user_name, $active, $board_table_name, $board_no, $type,$ft_referral_id";

        $board_name = $board_table_name . $board_no;
        $auto_board_table = "auto_board_" . $board_no;
        $board_table_no = $board_no;
        $amount_type = "auto_board_" . $board_no;
        $ref_count = 0;

        if ($type == 're_entry') {
            $sponsor_det = $this->obj_vali->getSponserIdName($ft_user_id);
            if ($sponsor_det['id'] != 0) {
                $ft_referral_id = $sponsor_det['id'];
            } else {
                $arr_user_left_right = $this->obj_board_view->getLeftRightUserID($board_id_top, $board_name);
                $left_user_id_1 = $arr_user_left_right['left_id'];
                $ft_referral_id = $this->getRefferenceID($left_user_id_1, $auto_board_table);
            }

            $board_ref_id = 0;
            $ref_count = 2;
        } else {
            $board_ref_id = $this->getBoardId($auto_board_table, $ft_referral_id);
            $this->updateReferralCount($board_ref_id, $ft_referral_id);
        }

        $placement_arr = $this->getPlacementIDAndPostionNew($ft_referral_id, $board_no);
//        $placement_arr = $this->getPlacementIDAndPostion($ft_referral_id, $board_no);
//        $placement_arr = $this->getBoardPlacementIDAndPositionRecursively($ft_referral_id, $board_no);
        $user_detail_arr["user_name"] = $user_name;
        $user_detail_arr["user_ref_id"] = $ft_user_id;
        $user_detail_arr["position"] = $placement_arr["position"];
        $user_detail_arr["father_id"] = $placement_arr["id"];
        $father_id = $placement_arr["id"];
        $board_level = $placement_arr["board_level"];
        $user_detail_arr["active"] = $active;
        $user_detail_arr["date_of_joining"] = date('Y-m-d H:i:s');
        $user_level = $this->getLevel($father_id, $board_name) + 1;
        $user_detail_arr["user_level"] = $user_level;
        $insert_id = $this->insertIntoAutoBoard($user_detail_arr, $auto_board_table, $type, $board_id_top);

        $this->insertIntoReferralCount($insert_id, $ft_user_id, $type, $board_id_top);

        $board_serial_number = $this->obj_board_view->getBoardNumberFromBoardUserDetails($father_id, $board_table_no);
        $this->obj_board_view->insertBoardUserDetails($insert_id, $board_serial_number, $board_table_no, $board_level);

        // INSERT DATA INTO ACHIEVER BOARD SPLIT STATUS

        $this->insertIntoBoardSplitStatus($insert_id, $board_serial_number);
        $board_top_id = $this->obj_board_view->getBoardTopID($board_serial_number, $board_no);

        // END OF BOARD SPLIT STATUS INSERTION


        $new_user_father_id = $user_detail_arr["father_id"];
        $this->getAllUplineId($new_user_father_id, 0, $this->NO_OF_LEVEL + 1, "$auto_board_table");
        $up_arr_count = count($this->upline_id_arr);



        if ($up_arr_count >= $this->NO_OF_LEVEL) {

            $total_level_users = pow(2, $this->NO_OF_LEVEL);
            $top_level = $this->NO_OF_LEVEL - 1;
            $top_id = $this->upline_id_arr["detail$top_level"]['id'];

            $this->getLevelUserCount($top_id, $this->NO_OF_LEVEL, $board_name);
            $no_level = $this->NO_OF_LEVEL;
            $total_third_level_users = intval($this->each_level_leg_count["level$no_level"]);
            
            if ($total_third_level_users == $total_level_users) {

                //INSERTING AMOUNT ----board_commission
                $top_id_refid = $this->getRefferenceID($top_id, $auto_board_table);
                $board_commission = $this->getBoardCommission();

                if ($board_commission > 0)
                    $this->insertAmount($top_id_refid, $board_no, $amount_type, $board_commission);
                //END OD AMOUNT INSERT

                if ($shuffle_status == "yes") {
                    //START SHUFFLING FROM HERE
                    $arr_for_shuff["top_id"] = $top_id;
                    $arr_for_shuff["table_name"] = $board_name;
                    $arr_for_shuff["board_table_no"] = $board_table_no;
                    $this->OBJ_SHUFFLING_BOARD->doShuffling($arr_for_shuff);
                    //END SHUFFLING BOARD
                }

                //START BOARD VIEW FROM HERE
                //$this->obj_board_view->insertIntoBoardView($top_id, $board_serial_number, $board_table_no, $this->NO_OF_LEVEL);
                $this->obj_board_view->insertIntoBoardViewNew($top_id, $board_serial_number, $board_table_no, $this->NO_OF_LEVEL);
                //END BOARD VIEW

                $user_id_for_board_split = $this->getRefferenceID($top_id, $auto_board_table);
                $user_name_for_board_split = $this->getBoardUserName($board_name, $user_id_for_board_split);

                //INSERTING Re-Entry TO THE PREVIOUS BAORD(First BOARD)	
                $active = "yes";
                $board_no = 1;
                $board_table_name = "auto_board_";
                $toatal_rentry_count = $this->getUserCount($user_id_for_board_split, $auto_board_table);
                $toatal_rentry_count = $toatal_rentry_count + 1;
                $user_name_for_board_split1 = $user_name_for_board_split . "_" . $toatal_rentry_count;
                $this->addBoard($user_id_for_board_split, $user_name_for_board_split1, $active, $board_table_name, $board_no, $shuffle_status, 're_entry', $ft_referral_id, $top_id);

                // END of INSERTING Re-Entry 
            }
        }
    }

    //////////////////////////////////////////////////////
    public function getBoardTopID($board_seriel_no, $board_no) {
        $board_top_id = 0;
        if ($board_no == 2 && $board_seriel_no == 1) {
            return $board_top_id = 12345;
        } elseif ($board_no == 3 && $board_seriel_no == 1) {
            return $board_top_id = 12345;
        } else {
            $res_b = $this->db->select("board_top_id")->where("board_no", $board_seriel_no)->where("board_table_name = ", $board_no)->get("board_view");
            //echo "<br/>$board_seriel_no - $board_no ->" . $this->db->last_query();
            foreach ($res_b->result() as $row_b) {
                $board_top_id = $row_b->board_top_id;
            }
        }
        return $board_top_id;
    }

    public function getUserLatestBoardSerialNumber($board_id, $board_no) {
        $board_serial_no = 0;

        $this->db->select("bu.board_serial_no");
        $this->db->from("board_user_detail AS bu");
        $this->db->join("board_view AS bv", "bv.board_no = bu.board_serial_no", "INNER");
        $this->db->order_by("bu.date_of_join", "DESC");
        $this->db->where("bu.user_id", $board_id);
        $this->db->where("bu.board_table_name", $board_no);
        $this->db->where("bv.board_table_name", $board_no);
        $this->db->where("bv.board_split_status", "no");
        $query = $this->db->get();
        foreach ($query->result_array() AS $row) {
            $board_serial_no = $row['board_serial_no'];
        }

        return $board_serial_no;
    }

    public function getMaxBoardPositionDetails($board_serial_no, $board_table_no) {

        $details = array();
        $this->db->from("board_user_detail AS bu");
        $this->db->join("auto_board_$board_table_no AS ab", "ab.id=bu.user_id", "INNER");
        $this->db->where("board_serial_no", $board_serial_no);
        $this->db->order_by("bu.board_position", "DESC");
        $this->db->limit(1);
        $res = $this->db->get();

        foreach ($res->result_array() AS $row) {
            $details = $row;
        }
        return $details;
    }

    public function isLevelMaxCountReached($user_level, $board_no, $board_serial_no) {
        $level_count = pow(2, $user_level);
        $flag = false;

        $this->db->where("board_level", $user_level);
        $this->db->where("board_table_name", $board_no);
        $this->db->where("board_serial_no", $board_serial_no);
        $count = $this->db->count_all_results("board_user_detail");
        if ($count == $level_count) {
            $flag = true;
        }
        return $flag;
    }

    public function getLevelPosition($level, $board_no) {
        $position_id = 0;

        $res = $this->db->select_min("id")->where("board_level", $level)->get("auto_board_$board_no");
        foreach ($res->result_array() AS $row) {
            $position_id = $row['id'];
        }
        return $position_id;
    }

    public function getBoardPlacement($board_no, $board_serial_no) {

        $placement_arr = array();
        $board_name = "auto_board_$board_no";
        $board_details = $this->getMaxBoardPositionDetails($board_serial_no, $board_no);
        $last_user_id = $board_details['id'];
        $last_father_id = $board_details['father_id'];
        $auto_position = $board_details['position'];

        //$board_level = $this->getLevel($last_user_id, $board_name);
        $board_level = $this->getBoardLevel($last_user_id, $board_no);
        $admin_id = $this->obj_vali->getAdminId();
        
        if ($last_user_id > $admin_id) {
            if ($auto_position == 2) {
                if ($this->isLevelMaxCountReached($board_level, $board_no, $board_serial_no)) {
                    //$min_position_id = $this->getLevelPosition($board_level, $board_no);
                    $min_position_id = $this->getBoardLevelMinimumPosition($board_level, $board_no, $board_serial_no);
                    if ($min_position_id > 0) {
                        $board_name = "auto_board_$board_no";
                        $left_right_arr = $this->getLeftRightUserID($min_position_id, $board_name);
                        // print_r($left_right_arr);
                        $downline_cnt = count($left_right_arr);
                        if ($downline_cnt > 0) {
                            $placement_arr['id'] = $min_position_id;
                            $placement_arr['position'] = 2;
                            $placement_arr['board_level'] = $board_level + 1;
                        } else {
                            $placement_arr['id'] = $min_position_id;
                            $placement_arr['position'] = 1;
                            $placement_arr['board_level'] = $board_level + 1;
                        }
                    }
                } else {
                    $placement_arr['id'] = $last_father_id + 1;
                    $placement_arr['position'] = 1;
                    $placement_arr['board_level'] = $board_level;
                }
            } else {
                $placement_arr['id'] = $last_father_id;
                $placement_arr['position'] = 2;
                $placement_arr['board_level'] = $board_level;
            }
        } else {
            $placement_arr['id'] = $last_user_id;
            $placement_arr['position'] = 1;
            $placement_arr['board_level'] = 1;
        }
        return $placement_arr;
    }

    public function getPlacementIDAndPostionNew($ft_referral_id, $board_no) {
        $board_table = "auto_board_" . $board_no;
//        
        $placment_id_pos_arr = array();
        if (!$this->isBoardEmpty($board_table)) {
            if ($this->isEntryExistInBoard($ft_referral_id, $board_table)) {
                $board_id_refferal = $this->getBoardId($board_table, $ft_referral_id);

                $latest_non_splitted_serial_no = $this->getUserLatestBoardSerialNumber($board_id_refferal, $board_no);
                if ($latest_non_splitted_serial_no) {
                    $board_top_id = $this->getBoardTopID($latest_non_splitted_serial_no, $board_no);
                    $placment_id_pos_arr = $this->getBoardPlacement($board_no, $latest_non_splitted_serial_no);
                } else {
                    $ft_referral_id_recursive = $this->getReferalId($ft_referral_id);
                    if ($ft_referral_id_recursive != '' && $ft_referral_id_recursive != 0) {
                        $placment_id_pos_arr = $this->getPlacementIDAndPostionNew($ft_referral_id_recursive, $board_no);
                    }
                }
            } else {
                $ft_referral_id_recursive = $this->getReferalId($ft_referral_id);
                if ($ft_referral_id_recursive != '' && $ft_referral_id_recursive != 0) {
                    $placment_id_pos_arr = $this->getPlacementIDAndPostionNew($ft_referral_id_recursive, $board_no);
                } else {
                    $placment_id_pos_arr = $this->getBoardPlacementIDAndPosition($board_table);
                }
            }
        } else {
            $placment_id_pos_arr["id"] = '0';
            $placment_id_pos_arr["position"] = '';
        }
        return $placment_id_pos_arr;
    }

    public function isEntryExistInBoard($user_id, $board_name) {
        $flag = false;
        $count = $this->db->select("*")->where("user_ref_id", $user_id)->from("$board_name")->count_all_results();
        if ($count > 0) {
            $flag = true;
        }
        return $flag;
    }

    //////////////////////////////////////////////////////////

    public function getDirectReferalCount($user_id) {
        $refer_count = 0;
        $qr = "SELECT  referral_count FROM  board_referral_count  WHERE  board_id='$user_id' ";
        $qry = $this->db->query($qr);

        foreach ($qry->result_array() AS $row) {
            $refer_count = $row['referral_count'];
        }
        return $refer_count;
    }

    public function insertAmount($user_id, $board_no, $type, $total_amount = '') {
        //$total_amount = 0;
        $obj_arr = $this->obj_set->getSettings();
        $tds_db = $obj_arr["tds"];
        $service_db = $obj_arr["service_charge"];

        if ($total_amount == "") {
            $total_amount = $obj_arr["$type"];
        }

        $tds = $total_amount * $tds_db / 100;
        $service_charge = $total_amount * $service_db / 100;
        $amount_payable = $total_amount - ($tds + $service_charge);
        $arr_amount["user_id"] = $user_id;
        $arr_amount["total_amount"] = $total_amount;
        $arr_amount["tds"] = $tds;
        $arr_amount["service_charge"] = $service_charge;
        $arr_amount["amount_payable"] = $amount_payable;
        $arr_amount["amount_type"] = $type;
        $arr_amount["board_no"] = $board_no;
        //print_r($arr_amount);
        $this->insertInToLegAmount($arr_amount);
    }

    public function insertInToLegAmount($arr_amount) {

        $user_ref_id = $arr_amount["user_id"];
        $total_amount = $arr_amount["total_amount"];
        $tds = $arr_amount["tds"];
        $service_charge = $arr_amount["service_charge"];
        $amount_payable = $arr_amount["amount_payable"];
        $amount_type = $arr_amount["amount_type"];
        $board_no = $arr_amount["board_no"];

        $date_of_joining = date("Y-m-d H:i:s");
        $data = array("user_id" => $user_ref_id,
            "total_leg" => $total_amount,
            "total_amount" => $total_amount,
            "amount_payable" => $amount_payable,
            "amount_type" => $amount_type,
            "tds" => $tds,
            "service_charge" => $service_charge,
            "date_of_submission" => $date_of_joining);

        $result = $this->db->insert("leg_amount", $data);
        //echo "<br/>qryy>>>" . $this->db->last_query();

        $this->updateBalanceAmount($user_ref_id, $amount_payable);
    }

    public function getFatherID($user_id, $auto_board_table) {
        $res = $this->db->select("father_id")->where("id", $user_id)->get("$auto_board_table");
        foreach ($res->result() as $row) {
            if ($row->father_id != 0)
                $father_id = $row->father_id;
            else {
                $re_arr = $this->getFatherIDAndPosition("$auto_board_table");
                $father_id = $re_arr['id'];
            }
        }
        return $father_id;
    }

    public function insertIntoAutoBoard($user_detail_arr, $achiever_table, $type = "", $board_id_top = "") {

        $insert_id = "";
        $user_name = $user_detail_arr["user_name"];
        $user_ref_id = $user_detail_arr["user_ref_id"];
        $position = $user_detail_arr["position"];
        $father_id = $user_detail_arr["father_id"];
        $active = $user_detail_arr["active"];
        $date_of_joining = $user_detail_arr["date_of_joining"];
        $user_level = $user_detail_arr["user_level"];

        $data = array(
            "user_name" => $user_name,
            "user_ref_id" => $user_ref_id,
            "position" => $position,
            "father_id" => $father_id,
            "active" => $active,
            "date_of_joining" => $date_of_joining,
            "user_level" => $user_level
        );
        $res = $this->db->insert("$achiever_table", $data);
        $insert_id = $this->db->insert_id();


        return $insert_id;
    }

    public function insertIntoReferralCount($board_user_id, $user_ref_id, $type, $board_id_top) {
        $count = 0;
        if ($type == 're_entry') {
            $count = 2;
            $this->db->set("status", "no");
            $this->db->where("user_ref_id", "$user_ref_id");
            $this->db->where("status", "yes");
            $this->db->where("board_id", "$board_id_top");
            $this->db->limit(1);
        }
        $data = array("referral_count" => $count,
            "board_id" => $board_user_id,
            "user_ref_id" => $user_ref_id,
            "status" => 'yes');

        $this->db->insert("board_referral_count", $data);
    }

    public function isBoardSplitted($board_table, $board_id) {
        $flag = false;
        $auto_user_id = $board_id;
        $sec_level_user_count_arr = $this->getLevelUserCount($auto_user_id, $this->NO_OF_LEVEL, $board_table);
        if ($this->NO_OF_LEVEL == 2) {
            $total_level_users = 4;
        } else if ($this->NO_OF_LEVEL == 3) {
            $total_level_users = 8;
        }
        $no_level = $this->NO_OF_LEVEL;
        $sec_level_user_count = $sec_level_user_count_arr["level$no_level"];
        if ($sec_level_user_count == $total_level_users) {
            $flag = true;
        }
        return $flag;
    }

    public function getBoardId($board_table, $ft_referral_id) {

        //$qr = "SELECT max(id) AS id FROM $board_table WHERE user_ref_id = '$user_ref_id'";
        //echo "<br />getBoardId>>>" . $qr;
        $this->db->select_max("id");
        $this->db->where("user_ref_id", $ft_referral_id);
        $res = $this->db->get("$board_table");
        foreach ($res->result() AS $row)
            return $row->id;
    }

    public function isBoardTopUserInLevelFour($user_id) {
        $flag = false;
        $i = 0;
        $id_up = 0;
        $id_up1 = 0;
        $id_up2 = 0;
        $id_up3 = 0;

        $sql = "SELECT father_id FROM auto_board_1 WHERE id = '$user_id'";
        $query = $this->db->query($sql);

        foreach ($query->result() as $row) {
            if ($row->father_id != 0)
                $id_up1 = $row->father_id;
        }

        $sql = "SELECT father_id FROM auto_board_1 WHERE id = '$id_up1'";
        $query = $this->db->query($sql);

        foreach ($query->result() as $row) {
            if ($row->father_id != 0)
                $id_up2 = $row->father_id;
        }

        $sql = "SELECT father_id FROM auto_board_1 WHERE id = '$id_up2'";
        $query = $this->db->query($sql);

        foreach ($query->result() as $row) {
            if ($row->father_id != 0)
                $id_up3 = $row->father_id;
        }

        return $id_up3;
    }

    public function getLevelUserCount($user_id, $no_of_level, $auto_goc_table_name) {
        $arr[] = $user_id;
        $this->each_level_leg_count = array();
        //echo "<br/>no of level->" . $no_of_level;
        $liimit_incriment = 0;
        $next = 1;
        $arr = $this->insertLevelCount($arr, $liimit_incriment, $no_of_level, $next, $auto_goc_table_name);
        return $this->each_level_leg_count;
    }

    public function insertLevelCount($arr, $liimit_incriment, $no_of_level, $next, $auto_goc_table_name) {
        $liimit_incriment = $liimit_incriment + 1;
        $user_id_temp = null;
        $user_id = $arr;
        $count_id = count($user_id);
        $flag = 0;
        $sql = "";
        //echo "array";
        //print_r($user_id);
        if (count($user_id) > 0) {

            for ($i = 0; $i < $count_id; $i++) {
                if ($i !== 0) {
                    $flag = 1;
                    $sql .= " OR father_id = $user_id[$i]";
                } else {
                    $sql .= "( father_id = '$user_id[$i]'";
                }
            }
            $sql = $sql . " )";

            //  echo "<br>$flag " . $select_users;
            $query = $this->db->select("id")->where("active !=", 'server')->where("$sql")->get("$auto_goc_table_name");
            $current_level_leg_count = $query->num_rows();
            if (array_key_exists("level$next", $this->each_level_leg_count)) {
                $old_count = $this->each_level_leg_count["level$next"];
            } else {
                $old_count = 0;
            }
            //echo "######" . $old_count;
            $this->each_level_leg_count["level$next"] = $current_level_leg_count + $old_count;

            foreach ($query->result() as $row1) {
                $user_id[] = $row1->id;
                $user_id_temp[] = $row1->id;
            }
        }

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
//echo "Loop<br>";
//print_r($split_arr[$i]);
                        $this->insertLevelCount($split_arr[$i], $liimit_incriment, $no_of_level, $next, $auto_goc_table_name);
                    }
                } else {
// echo "<br>In ELSE";
//print_r($user_id_temp);
                    $next = $next + 1;


                    $this->insertLevelCount($user_id_temp, $liimit_incriment, $no_of_level, $next, $auto_goc_table_name);
                }
            }
        }
        return $user_id_temp;
    }

    public function getLeftRightUserID($user_id, $board_table_name = "auto_board_1") {
        $arr = array();

        $this->db->select("id,user_ref_id,position");
        $this->db->where("father_id", $user_id);
        $this->db->order_by("position", "asc");
        $res = $this->db->get("$board_table_name");
        // echo "<br/>getLeftRightUserID->" . $this->db->last_query();
        foreach ($res->result_array() AS $row) {
            $position = $row['position'];
            $id = $row['id'];
            // $user_refer_d = $row['user_ref_id'];

            if ($position == 1) {
                $arr['left_id'] = $id;
                // $arr['left_refer_id'] = $user_refer_d;
            } else
            if ($position == 2) {
                $arr['right_id'] = $id;
                //$arr['right_refer_id'] = $user_refer_d;
            }
        }
        //print_r($arr);
        return $arr;
    }

    public function getAllUplineId($id, $i, $limit, $auto_goc_table_name) {
        if ($id > 0) {

            $this->db->select("father_id,position,user_ref_id,user_level");
            $this->db->where("id", $id);
            $query = $this->db->get("$auto_goc_table_name");
            $cnt = $query->num_rows();
            if ($cnt > 0) {
                foreach ($query->result() as $row) {
                    $father_id = $row->father_id;

                    $this->upline_id_arr["detail$i"]["id"] = $id;
                    $this->upline_id_arr["detail$i"]["user_ref_id"] = $row->user_ref_id;
                    $this->upline_id_arr["detail$i"]["user_level"] = $row->user_level;
                    $this->upline_id_arr["detail$i"]["position"] = $row->position;
                    $i = $i + 1;

                    if ($i < $limit) {
                        $this->getAllUplineId($father_id, $i, $limit, $auto_goc_table_name);
                    }
                }
            }
        }
    }

    public function getTotalLeftRightCount($arr_user_id, $board_table_name) {
        $arr_len = count($arr_user_id);
        $use_id_arr_detail = array();
        for ($i = 0; $i < $arr_len; $i++) {
            $user_id = $arr_user_id[$i];
            $count = $this->getDownLevelCount($user_id, $board_table_name);
            $use_id_arr_detail[$i]["id"] = $user_id;
            $use_id_arr_detail[$i]["count"] = $count;
        }
        return $use_id_arr_detail;
    }

    public function getDownLevelCount($user_id, $table_name) {
        $qr = "SELECT count(*) AS cnt FROM $table_name WHERE father_id = '$user_id' ";
        $res = $this->selectData($qr, "Error on slect=444");
        $row = mysql_fetch_array($res);
        $count = $row["cnt"];
        return $count;
    }

    public function getLevelUsers($user_id, $level, $auto_goc_table_name) {
        $arr[] = $user_id;
        $this->level_user_id = null;
        $this->level_user_id["level1"][0] = $user_id;
        $this->level_user_id_only = null;
        $this->level_user_id_only[] = $user_id;
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
        $count_id = count($user_id);
        $flag = 0;
//print_r($user_id);

        if (count($user_id) > 0) {

            for ($i = 0; $i < $count_id; $i++) {
                if ($i !== 0) {
                    $flag = 1;
                    $sql .= " OR  father_id='$user_id[$i]'";
                } else {
                    $ft_individual = $auto_goc_table_name;
                    $sql .= "( father_id='$user_id[$i]'";
                }
            }
            $sql .= " )";

// echo "<br>$flag ".$select_users;
            $res1 = $this->db->select("id,user_name,user_ref_id")->where("active !=", "server")->where("$sql")->get("$ft_individual");
            $current_level_leg_count = mysql_num_rows($res1);

            $m = 0;
//NOTE :- NOT ADD EXTRA ELEMENT IN THIS ARRAY $this->level_user_id
            foreach ($res1->result_array() AS $row1) {

                $user_id[] = $row1['id'];
                $user_id_temp[] = $row1['id'];
                $this->level_user_id["level$next"][] = $row1['id'];
                $this->level_user_id_only[] = $row1['id'];
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

    public function getUserNameFromAuto($id, $auto_goc_table_name) {
        $user_name = '';
        $qr = "select user_name from $auto_goc_table_name where id = '$id'";
        $grpres2 = $this->db->select("user_name")->where("id", $id)->get("$auto_goc_table_name");
        foreach ($grpres2->result_array() AS $group2)
            $user_name = $group2["user_name"];
        return $user_name;
    }

    public function getReffedrenceID($id, $auto_goc_table_name) {
        $select_qr = "SELECT user_ref_id
			  FROM $auto_goc_table_name
			  WHERE id='$id'";
        $res_set = $this->db->query($select_qr);
        foreach ($res_set->result() as $row) {
            return $row->user_ref_id;
        }
    }

    public function insertIntoBoardSplitStatus($user_id, $board_number) {
        $date = date('Y-m-d H:i:s');

        $data = array("user_ref_id" => $user_id,
            "board_number" => $board_number,
            "status" => 'no',
            "date_of_update" => $date);
        $query = $this->db->insert("board_split_status", $data);
        // echo "<br/>insertIntoBoardSplitStatus->" . $this->db->last_query();
    }

    public function updateAchieverBoardSplitStatus($user_id, $board_number) {
        $date = date('Y-m-d H:i:s');
        $qr = "UPDATE board_split_status SET 
            status='yes',date_of_update='$date' WHERE user_ref_id='$user_id' AND board_number='$board_number'";
        $res = $this->updateData($qr, "Error on Inserting Data in to board_split_status");
        return $res;
    }

    public function getFatherIDAndPosition($auto_goc_table_name, $bottom_level_users_arr = array()) {

        $new_reg_id = "";
        $bottom_level = intval($this->getBottomLevel($auto_goc_table_name));
        $bottom_level_users_arr = $this->getOneLevelUsersId($bottom_level, $auto_goc_table_name);
        $bottom_level_users_count = count($bottom_level_users_arr);
        $max_users_in_level = intval(pow(2, $bottom_level));
        // echo "maxusers $max_users_in_level<br/>";
        if ($bottom_level_users_count == $max_users_in_level) {
            $new_reg_id = $bottom_level_users_arr['0'];
            $new_reg_pos = "1";
        } else {
            //echo "elseeee";
            $bottom_level = $bottom_level - 1;
            $bottom_level_users_arr = $this->getOneLevelUserDetailsArray($bottom_level, $auto_goc_table_name);
            //print_r($bottom_level_users_arr);
            $new_id_arr = $this->getNewRegistrationFatherIDAndPosition($bottom_level_users_arr, $auto_goc_table_name);

            $new_reg_id = $new_id_arr['id'];
            $new_reg_pos = $new_id_arr['position'];
        }


        $re_arr['id'] = $new_reg_id;
        $re_arr['position'] = $new_reg_pos;
        $re_arr['father_userlevel'] = $bottom_level;

        return $re_arr;
    }

    public function getBottomLevel($auto_goc_table_name) {

        $bottom_level = "";
        $qry = '';

        if ($auto_goc_table_name == "ft_individual") {
            $auto_goc_table_name = "31_" . $auto_goc_table_name;
            $qry = "SELECT MAX(user_level) AS bottom_level FROM $auto_goc_table_name WHERE active!='server'";
        }
        else
            $qry = "SELECT MAX(user_level) AS bottom_level FROM $auto_goc_table_name";

        $query = $this->db->query("$qry");
        foreach ($query->result() as $row) {
            $bottom_level = $row->bottom_level;
        }
        // echo"qry>>>>" . $this->db->last_query();
        return $bottom_level;
    }

    public function getOneLevelUsersId($level, $auto_goc_table_name) {
        $arr = Array();
        $qry = "";

        if ($auto_goc_table_name == "ft_individual") {

            $auto_goc_table_name = "31_" . $auto_goc_table_name;
            $qry = "SELECT id FROM $auto_goc_table_name WHERE user_level='$level'  AND active!= 'server' ORDER BY id ";
        }
        else
            $qry = "SELECT id FROM $auto_goc_table_name WHERE user_level='$level' ORDER BY id ";

        $query = $this->db->query("$qry");
        //echo"qry>>>>" . $this->db->last_query();
        foreach ($query->result() as $row) {
            $arr[] = $row->id;
        }
        //print_r($arr);
        return $arr;
    }

    public function getOneLevelUserDetailsArray($level, $auto_goc_table_name) {

        $arr = Array();

        if ($auto_goc_table_name == "ft_individual") {
            $auto_goc_table_name = "31_" . $auto_goc_table_name;
            $subQuery1 = "SELECT count( * ) FROM $auto_goc_table_name AS t2  WHERE t1.id = t2.father_id  AND t2.`position` = '1'  AND active !='server'";
            $subQuery2 = "SELECT count( * ) FROM $auto_goc_table_name AS t3  WHERE t1.id = t3.father_id  AND t3.`position` = '2'  AND active !='server'";

            $this->db->select('t1.id');
            $this->db->select("($subQuery1) as POS_1");
            $this->db->select("($subQuery2) as POS_2");
            $this->db->from("ft_individual AS t1");
            $this->db->where("t1.user_level", "$level");
            $this->db->order_by("id", "asc");
            $query = $this->db->get("$auto_goc_table_name");
        } else {
            $subQuery1 = "SELECT count( * ) FROM $auto_goc_table_name AS t2  WHERE t1.id = t2.father_id  AND t2.`position` = '1'  AND active !='server' ORDER BY position";
            $subQuery2 = "SELECT count( * ) FROM $auto_goc_table_name AS t3  WHERE t1.id = t3.father_id  AND t3.`position` = '2'  AND active !='server' ORDER BY position";

            $qr = "SELECT t1.id, ($subQuery1) as POS_1, ($subQuery2) as POS_2 FROM  $auto_goc_table_name AS t1  WHERE user_level='$level' ORDER BY position";
            $query = $this->db->query("$qr");
        }
        // echo"qry>>>>" . $this->db->last_query();
        $i = 0;
        foreach ($query->result() as $row) {
            $arr["detail$i"]["id"] = $row->id;
            $arr["detail$i"]["POS_1"] = $row->POS_1;
            $arr["detail$i"]["POS_2"] = $row->POS_2;
            $i++;
        }
        // print_r($arr);
        return $arr;
    }

    public function getNewRegistrationFatherIDAndPosition($bottem_up_level_usr_det_arr, $auto_goc_table_name) {
        // echo "Before";
        // sort($bottem_up_level_usr_det_arr);
        $len = count($bottem_up_level_usr_det_arr);
        $new_reg_id = "";
        $new_reg_pos = "";


        for ($i = 0; $i < $len; $i++) {
            $position_1 = $bottem_up_level_usr_det_arr["detail$i"]["POS_1"];
            $position_2 = $bottem_up_level_usr_det_arr["detail$i"]["POS_2"];

            $user_id = $bottem_up_level_usr_det_arr["detail$i"]["id"];


            if ($position_1 != 1 and $new_reg_pos == "") {
                $new_reg_id = $user_id;
                $new_reg_pos = "1";
            } else if ($position_2 != 1 and $new_reg_pos == "") {
                $new_reg_id = $user_id;
                $new_reg_pos = "2";
            }
        }

        if ($new_reg_id == "") {
            for ($i = 0; $i < $len; $i++) {

                $position_1 = $bottem_up_level_usr_det_arr["detail$i"]["POS_1"];
                $position_2 = $bottem_up_level_usr_det_arr["detail$i"]["POS_2"];

                $user_id = $bottem_up_level_usr_det_arr["detail$i"]["id"];


                if ($position_1 != 1 and $new_reg_pos == "") {
                    $new_reg_id = $user_id;
                    $new_reg_pos = "1";
                } else if ($position_2 != 1 and $new_reg_pos == "") {
                    $new_reg_id = $user_id;
                    $new_reg_pos = "2";
                }
            }
        }



        $re_arr['id'] = $new_reg_id;
        $re_arr['position'] = $new_reg_pos;

        //print_r($re_arr);
        return $re_arr;
    }

    public function getUserCount($user_ref_id, $auto_table_name) {
        $this->db->select("*")->where("user_ref_id", $user_ref_id);
        $count = $this->db->count_all_results("$auto_table_name");
        return $count;
    }

    public function getLevel($id, $table_name) {
        $user_level = "0";
        //$qry = "SELECT user_level FROM $table_name WHERE id = '$id'";
        //  echo "<br/>getLevel->" . $qry;
        $this->db->select("user_level");
        $this->db->where("id", $id);
        $qr = $this->db->get("$table_name");
        foreach ($qr->result() as $row) {
            $user_level = $row->user_level;
        }
        return $user_level;
    }

    public function getBoardUserName($auto_board_table_name, $board_user_id) {
      
        $grpres2 = $this->db->select("user_name")->where("id", $board_user_id)->get("ft_individual");
        foreach ($grpres2->result() as $row) {
            return $row->user_name;
        }
    }

    public function getReferalId($user_id) {

        $referal_id = "";
        $this->db->select('user_details_ref_user_id');
        $this->db->from("user_details");
        $this->db->where('user_detail_refid ', $user_id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $referal_id = $row->user_details_ref_user_id;
        }
        //echo "<br/>qryy>>>" . $this->db->last_query();
        return $referal_id;
    }

    public function updateBalanceAmount($user_id, $total_amount) {

        $this->db->set('balance_amount', 'balance_amount +' . $total_amount, FALSE);

        $this->db->where('user_id', $user_id);

        $res = $this->db->update('user_balance_amount');

        //echo "<br/>qryy>>>" . $this->db->last_query();

        return $res;
    }

    public function getPlacementIDAndPostion($ft_referral_id, $board_name) {
        // echo "<br>DIRECT SPONSER PRESENT IN BOARRD:$board_name ----->>>>>>>>>refid--$referral_id ";
        $placment_id_pos_arr = array();
        $board_id = $this->obj_board_view->getUserBoardMinID($ft_referral_id, $board_name);
        $board_no = 1;
        $board_Serial_no = $this->getLatestBoardSerialNumber($board_id, $board_no);
        $board_top_id = $this->obj_board_view->getBoardTopID($board_Serial_no, $board_no);
        $placment_id_pos_arr = $this->getPlacmentIdFromBoardTopId($board_name, $board_top_id);
        $placment_id_pos_arr["top_id"] = $board_id;

        //print_r($placment_id_pos_arr);
        return $placment_id_pos_arr;
    }

    public function getBoardPlacementIDAndPositionRecursively($referrer_id, $board_table_no) {

        $placment_id_pos_arr = array();
        $board_name = "auto_board_" . $board_table_no;

        if (!$this->isBoardEmpty($board_name)) {

            $board_id = $this->getBoardId($board_name, $referrer_id);
            $latest_non_splitted_serial_no = $this->getUserLatestBoardSerialNumber($board_id, $board_table_no);

            if ($latest_non_splitted_serial_no) {
                $board_top_id = $this->obj_board_view->getBoardTopID($latest_non_splitted_serial_no, $board_table_no);
                $placment_id_pos_arr = $this->getPlacmentIdFromBoardTopId($board_name, $board_top_id);
//                
            } else {//SPONSER BOARD IS ALREADY SPLITTED
                $referrer_id = $this->getReferalId($referrer_id);
                if ($referrer_id != '' && $referrer_id != 0) {
                    $placment_id_pos_arr = $this->getBoardPlacementIDAndPositionRecursively($referrer_id, $board_table_no);
                } else {
                    // WHEN REFERARID IS NULL, ie;Admin
                    $placment_id_pos_arr = $this->getPlacmentIdFromBoardTopId($board_name, $board_top_id);
                }
            }
        } else {
            $placment_id_pos_arr["id"] = '0';
            $placment_id_pos_arr["position"] = '';
        }

        //print_r($placment_id_pos_arr);
        return $placment_id_pos_arr;
    }

    public function getPlacementIDAndPostiontmp($referral_id, $board_name) {
        $referral_id = $this->obj_vali->getReferralid($referral_id);
        //   echo "<br/>REFERAL ID:$referral_id BOARD NAME :$board_name";

        if ($this->isEntryExsitInBoard($board_name, $referral_id)) {
            // echo "<br>DIRECT SPONSER PRESENT IN BOARRD:$board_name ----->>>>>>>>> ";
            $board_id = $this->getBoardId($board_name, $referral_id);
            //echo "<br />$referral_id BORAD ID:".$board_id;
            if (!$this->isBoardSplitted($board_name, $board_id)) {
                //SPONSER BOARD IS NOT SPLITTED
                // echo "<br>DIRECT SPONSER  BOARRD IS NOT SPLITTED:$board_name ----->>>>>>>>> ";
                $board_table_no = $this->BOARD_TABLE_NO;
                $board_Serial_no = $this->getLatestBoardSerialNumber($board_id);
                //echo "<br />$referral_id BOARD SER :".$board_Serial_no."BOARD NO". $board_table_no ;
                $board_top_id = $this->obj_board_view->getBoardTopID($board_Serial_no, $board_table_no);

                // $board_top_id = $this->getBoardId($board_name, $referral_id);
                $placment_id_pos_arr = $this->getPlacmentIdFromBoardTopId($board_name, $board_top_id);
                $placment_id_pos_arr["top_id"] = $board_id;
            } else {
                //BOARD IS SPLITTED
                //  echo "<br> --$referral_id --DIRECT SPONSER BOARRD IS SPLITTED:$board_name ----->>>>>>>>> ";
                $referral_id_arr = null;
                $referral_id_arr[] = $referral_id;
                $this->NOT_SPLITED_REF_ID_ARR = null;
                $this->getNotSplittedReferalIds($board_name, $referral_id_arr);
                $non_splitted_referal_id_arr = $this->NOT_SPLITED_REF_ID_ARR;
                // echo "<br />NON SPLITTED REF ID ARRAY:";
                //print_r($non_splitted_referal_id_arr);
                $non_split_ref_arr_len = count($non_splitted_referal_id_arr);
                if ($non_split_ref_arr_len > 0) {
                    //TAKING THE BOARD WHICH IS GOING TO BE SPLIT FIREST FROM $non_splitted_referal_id_arr
                    $user_board_id_arr = $this->converRefIdArrToBoardIdArr($non_splitted_referal_id_arr, $board_name);
                    // echo "<br />AFTER CONVEERTING REF ID TO BOARD ID ARR";
                    //  print_r($user_board_id_arr);
                    $fastest_board_top_id = $this->getFastestBoardSplitIdFromArr($user_board_id_arr, $board_name);
                    //$board_top_id = $this->getBoardId($board_name, $referral_id);
                    $board_table_no = $this->BOARD_TABLE_NO;
                    $board_Serial_no = $this->getLatestBoardSerialNumber($fastest_board_top_id);
                    //echo "<br />$referral_id BOARD SER :".$board_Serial_no."BOARD NO". $board_table_no ;
                    $fastest_board_top_id = $this->obj_board_view->getBoardTopID($board_Serial_no, $board_table_no);

                    $placment_id_pos_arr = $this->getPlacmentIdFromBoardTopId($board_name, $fastest_board_top_id);
                    $placment_id_pos_arr["top_id"] = $fastest_board_top_id;
                } else {
                    echo "<script>alert('Placment Postion Not Available - 654768');</script>";
                    die();
                }
            }
        } else {
            //SPONSER ID DOES NOT EXIST IN THE BOARD
            //echo "<br>DIRECT SPONSER NOT PRESENT INT BOARRD:$board_name ----->>>>>>>>> ";
            $this->ACTIVE_SPONSER = 0;
            $this->getActiveSponser($board_name, $referral_id);
            $active_sponser_ref_id = $this->ACTIVE_SPONSER;
            //  echo "<br />$referral_id FOUND ACITIVE SPONSER :$active_sponser_ref_id---->>>>>>>";
            $active_sponser_board_id = $this->getBoardId($board_name, $active_sponser_ref_id);
            // echo "<br /> ACTIVE BOATRD ID: $active_sponser_board_id";
            if (!$this->isBoardSplitted($board_name, $active_sponser_board_id)) {
                //ACTIVE SPONSER BOARD IS NOT SPLITTED
                //  echo "<br />ACITIVE SPONSER BOARD IS NOT SPLITTED:---->>>>>>>";

                $board_table_no = $this->BOARD_TABLE_NO;
                $board_Serial_no = $this->getLatestBoardSerialNumber($active_sponser_board_id);
                //echo "<br />$referral_id BOARD SER :".$board_Serial_no."BOARD NO". $board_table_no ;
                $fastest_board_top_id = $this->obj_board_view->getBoardTopID($board_Serial_no, $board_table_no);

                $placment_id_pos_arr = $this->getPlacmentIdFromBoardTopId($board_name, $fastest_board_top_id);
                //print_R($placment_id_pos_arr);
                $placment_id_pos_arr["top_id"] = $active_sponser_board_id;
            } else {
                //ACTIVE SPONSER BOARD IS SPLITTED
                // echo "<br /> ACITIVE SPONSER BOARD IS SPLITTED:---->>>>>>>";
                $referral_id_arr = null;
                $referral_id_arr[] = $active_sponser_ref_id;
                $this->NOT_SPLITED_REF_ID_ARR = null;
                $this->getNotSplittedReferalIds($board_name, $referral_id_arr);
                $non_splitted_referal_id_arr = $this->NOT_SPLITED_REF_ID_ARR;
                // echo "<br/>NOT SPLITED REFERAL ID ARr";
                //print_r($non_splitted_referal_id_arr);
                $non_split_ref_arr_len = count($non_splitted_referal_id_arr);
                if ($non_split_ref_arr_len > 0) {
                    //TAKING THE BOARD WHICH IS GOING TO BE SPLIT FIREST FROM $non_splitted_referal_id_arr
                    //echo "<br /> NON SPLITTED USER REF ID";
                    // print_R($non_splitted_referal_id_arr);
                    $user_board_id_arr = $this->converRefIdArrToBoardIdArr($non_splitted_referal_id_arr, $board_name);
                    $fastest_board_top_id = $this->getFastestBoardSplitIdFromArr($user_board_id_arr, $board_name);



                    $board_table_no = $this->BOARD_TABLE_NO;
                    $board_Serial_no = $this->getLatestBoardSerialNumber($fastest_board_top_id);
                    //echo "<br />$referral_id BOARD SER :".$board_Serial_no."BOARD NO". $board_table_no ;
                    $fastest_board_top_id = $this->obj_board_view->getBoardTopID($board_Serial_no, $board_table_no);

                    $placment_id_pos_arr = $this->getPlacmentIdFromBoardTopId($board_name, $fastest_board_top_id);
                    $placment_id_pos_arr["top_id"] = $fastest_board_top_id;
                } else {
                    echo "<script>alert('Placment Postion Not Available - 546576');</script>";
                    die();
                }
            }
        }
        return $placment_id_pos_arr;
    }

    public function getPlacmentIdFromBoardTopId($board_name, $board_top_id) {
        //echo "<br/>getPlacmentIdFromBoardTopId board_top_id->$board_top_id";
        $user_id_arr_0_1 = $this->getLeftRightUserID($board_top_id, $board_name);
        //print_r($user_id_arr_0_1);
        //echo "<br/>LEN:" . count($user_id_arr_0_1);
        $flag = false;
        $flag = $this->addLeftRightUserId($user_id_arr_0_1, $board_top_id);
//        if (count($user_id_arr_0_1) == 0) {
//            $this->PLACEMENT_DETAILS_ARRS["id"] = $board_top_id;
//            $this->PLACEMENT_DETAILS_ARRS["position"] = 1;
//            $flag = true;
//        } else if (count($user_id_arr_0_1) == 1) {
//            $this->PLACEMENT_DETAILS_ARRS["id"] = $board_top_id;
//            $this->PLACEMENT_DETAILS_ARRS["position"] = 2;
//            $flag = true;
//        }
        if (!$flag) {
            // echo "<br/>flag false";
            $user_id_1_1 = $user_id_arr_0_1["left_id"];
            $user_id_1_2 = $user_id_arr_0_1["right_id"];

            if ($user_id_1_1 > 0) {
                $user_id_arr_1_1 = $this->getLeftRightUserID($user_id_1_1, $board_name);
                $flag = $this->addLeftRightUserId($user_id_arr_1_1, $user_id_1_1);
//                if (count($user_id_arr_1_1) == 0) {
//                    $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id_1_1;
//                    $this->PLACEMENT_DETAILS_ARRS["position"] = 1;
//                    $flag = true;
//                } else if (count($user_id_arr_1_1) == 1) {
//                    $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id_1_1;
//                    $this->PLACEMENT_DETAILS_ARRS["position"] = 2;
//                    $flag = true;
//                }
            }


            if ($user_id_1_2 > 0 && !$flag) {
                $user_id_arr_1_2 = $this->getLeftRightUserID($user_id_1_2, $board_name);
                $flag = $this->addLeftRightUserId($user_id_arr_1_2, $user_id_1_2);
//                if (count($user_id_arr_1_2) == 0) {
//                    $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id_1_2;
//                    $this->PLACEMENT_DETAILS_ARRS["position"] = 1;
//                    $flag = true;
//                } else if (count($user_id_arr_1_2) == 1) {
//                    $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id_1_2;
//                    $this->PLACEMENT_DETAILS_ARRS["position"] = 2;
//                    $flag = true;
//                }
            }

            if (!$flag) {
                $user_id_2_1 = $user_id_arr_1_1["left_id"];
                $user_id_2_2 = $user_id_arr_1_1["right_id"];
                $user_id_2_3 = $user_id_arr_1_2["left_id"];
                $user_id_2_4 = $user_id_arr_1_2["right_id"];
                print_r($user_id_2_4);
                if ($user_id_2_1 > 0) {
                    $user_id_arr_2_1 = $this->getLeftRightUserID($user_id_2_1, $board_name);
                    $flag = $this->addLeftRightUserId($user_id_arr_2_1, $user_id_2_1);
//                    if (count($user_id_arr_2_1) == 0) {
//                        //echo "<br/>FILLING 2-1-ID---->$user_id_2_1";
//                        $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id_2_1;
//                        $this->PLACEMENT_DETAILS_ARRS["position"] = 1;
//                        $flag = true;
//                    } else if (count($user_id_arr_2_1) == 1) {
//                        $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id_2_1;
//                        $this->PLACEMENT_DETAILS_ARRS["position"] = 2;
//                        $flag = true;
//                    }
                }

                if ($user_id_2_2 > 0 && !$flag) {
                    $user_id_arr_2_2 = $this->getLeftRightUserID($user_id_2_2, $board_name);
                    $flag = $this->addLeftRightUserId($user_id_arr_2_2, $user_id_2_2);
//                    if (count($user_id_arr_2_2) == 0) {
//                        $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id_2_2;
//                        $this->PLACEMENT_DETAILS_ARRS["position"] = 1;
//                        $flag = true;
//                    } else if (count($user_id_arr_2_2) == 1) {
//                        $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id_2_2;
//                        $this->PLACEMENT_DETAILS_ARRS["position"] = 2;
//                        $flag = true;
//                    }
                }
                if ($user_id_2_3 > 0 && !$flag) {
                    $user_id_arr_2_3 = $this->getLeftRightUserID($user_id_2_3, $board_name);
                    $flag = $this->addLeftRightUserId($user_id_arr_2_3, $user_id_2_3);
//                    if (count($user_id_arr_2_3) == 0) {
//                        $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id_2_3;
//                        $this->PLACEMENT_DETAILS_ARRS["position"] = 1;
//                        $flag = true;
//                    } else if (count($user_id_arr_2_3) == 1) {
//                        $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id_2_3;
//                        $this->PLACEMENT_DETAILS_ARRS["position"] = 2;
//                        $flag = true;
//                    }
                }
                if ($user_id_2_4 > 0 && !$flag) {
                    $user_id_arr_2_4 = $this->getLeftRightUserID($user_id_2_4, $board_name);
                    $flag = $this->addLeftRightUserId($user_id_arr_2_4, $user_id_2_4);
//                    if (count($user_id_arr_2_4) == 0) {
//                        $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id_2_4;
//                        $this->PLACEMENT_DETAILS_ARRS["position"] = 1;
//                        $flag = true;
//                    } else if (count($user_id_arr_2_4) == 1) {
//                        $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id_2_4;
//                        $this->PLACEMENT_DETAILS_ARRS["position"] = 2;
//                        $flag = true;
//                    }
                }
            }
        }

        //echo "print array-->";
        //print_r($this->PLACEMENT_DETAILS_ARRS);

        return $this->PLACEMENT_DETAILS_ARRS;
    }

    public function addLeftRightUserId($user_id_arr, $user_id) {
        $flag = false;
        if (count($user_id_arr) == 0) {
            $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id;
            $this->PLACEMENT_DETAILS_ARRS["position"] = 1;
            $flag = true;
        } else if (count($user_id_arr) == 1) {
            $this->PLACEMENT_DETAILS_ARRS["id"] = $user_id;
            $this->PLACEMENT_DETAILS_ARRS["position"] = 2;
            $flag = true;
        }
        return $flag;
    }

    public function getLatestBoardSerialNumber($board_user_id, $board_table_no) {

        $this->db->select_max("board_serial_no");
        $this->db->where("user_id", $board_user_id);
        $this->db->where("board_table_name", $board_table_no);
        $res = $this->db->get("board_user_detail");

        foreach ($res->result() AS $row)
            return $row->board_serial_no;
    }

    public function converRefIdArrToBoardIdArr($user_ref_id_arr, $board_name) {
        $arr_len = count($user_ref_id_arr);
        for ($i = 0; $i < $arr_len; $i++) {
            $user_board_id_arr[] = $this->getBoardId($board_name, $user_ref_id_arr[$i]);
        }
        return $user_board_id_arr;
    }

    public function getFastestBoardSplitIdFromArr($user_board_id_arr, $board_name) {
        $arr_len = count($user_board_id_arr);
        //print_R($user_board_id_arr);
        for ($i = 0; $i < $arr_len; $i++) {
            $board_usr_id = $user_board_id_arr[$i];


            $sec_level_user_count_arr = $this->getLevelUserCount($board_usr_id, 3, $board_name);
            $first_level_user_count = $sec_level_user_count_arr["level1"];
            $sec_level_user_count = $sec_level_user_count_arr["level2"];
            $third_level_user_count = $sec_level_user_count_arr["level2"];
            $total_count = $first_level_user_count + $sec_level_user_count + $third_level_user_count;
            $user_id_board_count_detail_arr["$i"]["id"] = $board_usr_id;
            $user_id_board_count_detail_arr["$i"]["count"] = $total_count;
        }
        // echo "<br>FASTEST BOARD BEFORE SORT ARR ";
        // print_r($user_id_board_count_detail_arr);
        $sorted_user_id_board_count_detail_arr = $this->sortMultiArray($user_id_board_count_detail_arr, "count");
        //echo "<br>FASTEST BOARD SORTED ARR ";
        //print_r($sorted_user_id_board_count_detail_arr);
        $fastest_board_id = $sorted_user_id_board_count_detail_arr["0"]["id"];
        return $fastest_board_id;
    }

    function sortMultiArray($arr, $key) {
        //print_r($arr);
        $temp_arr = array();
        $arr_len = count($arr);
        for ($i = 0; $i < $arr_len; $i++) {
            $element[] = $arr["$i"][$key];
        }
        //echo "<br> BEFORE SORT";
        //print_r($element);
        rsort($element);
        //echo "<br> AFTER SORT";
        //print_r($element);
        //echo "Length".$arr_len."Elemt len".count($element);

        for ($i = 0; $i < $arr_len; $i++) {
            $index = $i;
            $first_element = $element[$index];
            for ($j = 0; $j < $arr_len; $j++) {
                $sec_element = $arr["$j"][$key];
                if ($first_element == $sec_element) {

                    $arr_new["$i"][$key] = $element[$index];
                    if (!in_array($arr["$j"]["id"], $temp_arr)) {
                        //echo "<br/>Element:".$element[$i]."All".$arr["detail$j"][$key];
                        $temp_arr[] = $arr["$j"]["id"];
                        $arr_new["$i"]["id"] = $arr["$j"]["id"];
                        //echo "<br>ELEEMENT".$arr["detail$j"]["id"];
                        $arr["$j"][$key] = "";
                        break;
                    }
                }
            }
        }
        return $arr_new;
        //print_r($arr_new);
    }

    public function getActiveSponser($board_table_name, $sponser_user_ref_id) {
        $this->ACTIVE_SPONSER = $sponser_user_ref_id;
        /*
          $sponser_sponser_referal = $this->obj_vali->getReferralid($sponser_user_ref_id);

          if($this->isEntryExsitInBoard($board_table_name, $sponser_sponser_referal))
          {
          //echo "<br/> ACti1111:$sponser_sponser_referal";
          $this->ACTIVE_SPONSER = $sponser_sponser_referal;
          return $this->ACTIVE_SPONSER;
          }
          else
          {
          $this->getActiveSponser($board_table_name, $sponser_sponser_referal);
          }
         * 
         */
    }

    public function isEntryExsitInBoard($board_name, $user_ref_id) {

        $qr = "SELECT count(*) AS cnt FROM $board_name WHERE user_ref_id = '$user_ref_id'";
        $res = $this->selectData($qr, "Error on select count - 54646 ");
        $row = mysql_fetch_array($res);
        $count = $row['cnt'];
        $flag = false;
        if ($count > 0) {
            $flag = true;
        }
        return $flag;
    }

    public function getFatherPos($user_id) {

        $ret = array();

        $select_qr = "  SELECT *
                        FROM 31_ft_individual
                        WHERE father_id='$user_id' AND active!='yes' 
                        ORDER BY date_of_joining DESC
                        LIMIT 2 ";
        //echo "<br>getFatherPos>>>>>>>>>>" . $select_qr;
        $query = $this->db->query($select_qr);
        $num_rows = $query->num_rows();
        $i = 0;
        foreach ($query->result_array() as $row) {
            $i = $i + 1;
            if ($row['active'] != 'yes' && $i == 1) {
                $ret['id'] = $user_id;
                $ret['position'] = $row["position"];
                $ret['user_level'] = $row['user_level'];
                break;
            } else if ($row['active'] != 'yes' && $i == 2) {
                $ret['id'] = $user_id;
                $ret['position'] = $row["position"];
                $ret['user_level'] = $row['user_level'];
            }
        }

        return $ret;
    }

    public function getRefferenceID($id, $auto_goc_table_name) {
         
        $res_set = $this->db->select("user_ref_id")->where("id", $id)->get("$auto_goc_table_name");
        foreach ($res_set->result() as $row) {
            return $row->user_ref_id;
        }
    }

    public function updateReferralCount($board_ref_user_id, $ft_referral_id) {

        $this->db->select("board_id");
        $this->db->where("user_ref_id", $ft_referral_id);
        $this->db->where("status", "yes");
        $res_set = $this->db->get("board_referral_count");
        //echo "<br/>updateReferralCount->" . $this->db->last_query();

        foreach ($res_set->result_array() as $row1) {
            $board_ref_user_id = $row1['board_id'];
            $this->updateBoardReferralCount($board_ref_user_id, $ft_referral_id);
//            $this->db->set('referral_count', 'referral_count + 1', FALSE);
//            $this->db->where("board_id", $board_user_id);
//            $this->db->where("user_ref_id", $user_ref_id);
//            $this->db->update("board_referral_count");
            //echo "<br/>updateReferralCount->" . $this->db->last_query();
        }
    }

    public function updateBoardReferralCount($board_ref_user_id, $ft_referral_id) {

        $this->db->set('referral_count', 'referral_count + 1', FALSE);
        $this->db->where("board_id", $board_ref_user_id);
        $this->db->where("user_ref_id", $ft_referral_id);
        $this->db->update("board_referral_count");
    }

    public function insertIntoSingleEntry($user_id, $user_name) {

        $date = date("Y-m-d");
        $qry = "INSERT INTO single_entry_users SET user_id='$user_id', user_name='$user_name', entry_date='$date'";
        $this->db->query("$qry");
        //echo "<br/>insertIntoSingleEntry->" . $this->db->last_query();
    }

    public function getBoardCommission() {

        $res = $this->db->select("board_commission")->get("configuration");
        //echo "<br/>getBoardCommission->" . $this->db->last_query();
        foreach ($res->result() AS $row)
            return $row->board_commission;
    }

    public function isBoardEmpty($board_name) {
        $flag = false;

        $count = $this->db->from("$board_name")->count_all_results();
        if ($count == 0) {
            $flag = true;
        }
        return $flag;
    }

    public function getBoardLevel($id, $board_no) {
        $user_level = 0;
        $this->db->select("board_level");
        $this->db->where("user_id", $id);
        $this->db->where("board_table_name", $board_no);
        $qr = $this->db->get("board_user_detail");
        foreach ($qr->result() as $row) {
            $user_level = $row->board_level;
        }
        return $user_level;
    }

    public function getBoardLevelMinimumPosition($board_level, $board_no, $board_serial_no) {
        $position_id = 0;

        $res = $this->db->select_min("user_id")->where("board_level", $board_level)->where("board_table_name", $board_no)->where("board_serial_no", $board_serial_no)->get("board_user_detail");
        foreach ($res->result_array() AS $row) {
            $position_id = $row['user_id'];
        }
        return $position_id;
    }

    ///////////////////////////////  EDITED BY YASIR   ////////////////////////////////////

    public function getFirstSecondThirdUserId($user_id, $board_table_name = "auto_board_1") {
        $arr = array();

        $this->db->select("id,user_ref_id,position")->where("father_id", $user_id);
        $this->db->order_by("position", "asc");
        $res = $this->db->get("$board_table_name");
        //echo "<br/>getLeftRightUserID->" . $this->db->last_query();
        foreach ($res->result_array() AS $row) {
            $position = $row['position'];
            $id = $row['id'];
            // $user_refer_d = $row['user_ref_id'];

            if ($position == 1) {
                $arr['first_id'] = $id;
                // $arr['left_refer_id'] = $user_refer_d;
            } else
            if ($position == 2) {
                $arr['second_id'] = $id;
                //$arr['right_refer_id'] = $user_refer_d;
            }
        }
        //print_r($arr);
        return $arr;
    }

    ///////////////////////////////  EDITED BY YASIR   ////////////////////////////////////
}
