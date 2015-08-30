<?php

require_once 'Inf_Model.php';
require_once ("getTree.php");
require_once ("TreeView.php");
require_once 'ToolTipView.php';
require_once 'TabularTreeClass.php';
require_once ("validation.php");
require_once ("validation.php");
require_once 'boardview_model.php';
require_once 'AutoFillingBoard.php';

class tree_model extends Inf_Model {

    public $OBJ_TREE_VIEW;
    public $OBJ_GET_TREE;
    public $OBJ_VAL;
    public $OBJ_AUTH;
    private $obj_tooltip;
    public $board_view;
    public $auto_filling;

    function __construct() {
        parent::__construct();
    }

    public function intitailze() {

        $this->OBJ_TREE_VIEW = new TreeView();

        $this->OBJ_GET_TREE = new getTree();

        $this->OBJ_VAL = new validation();
        $this->obj_tooltip = new ToolTipView();
        $this->obj_tabular_tree = new TabularTreeClass();
        $this->board_view = new boardview_model();
        $this->auto_filling = new AutoFillingBoard();
    }

    public function viewTree($user_id, $id_decrypt) {

        //$id_decrypt=$this->OBJ_TREE_VIEW->getDecrypt($id);
        $this->OBJ_TREE_VIEW->addtomatrix($id_decrypt, 1, 0);
        $this->OBJ_TREE_VIEW->balancematrix();

        return $this->OBJ_TREE_VIEW->displaymatrix($user_id, $id_decrypt);
    }

    public function viewTreeBoard($user_id, $id_decrypt, $board_no = '') {
        //$id_decrypt=$this->OBJ_TREE_VIEW->getDecrypt($id);
        $this->OBJ_TREE_VIEW->addtoboardmatrix($id_decrypt, 1, 0, $board_no);
        $this->OBJ_TREE_VIEW->balanceboardmatrix();
        return $this->OBJ_TREE_VIEW->displayboardmatrix($user_id, $id_decrypt, $board_no);
    }

    public function userDownlineUserUnilevel($child_id, $user_id) {
        $this->intitailze();

        $user_id = $this->OBJ_GET_TREE->userDownlineUserUnilevel($child_id, $user_id);
        return $user_id;
    }

    public function userDownlineUser($child_id, $user_id) {
        $this->intitailze();
        $user_id = $this->OBJ_GET_TREE->userDownlineUser($child_id, $user_id);
        return $user_id;
    }

    public function getUserDetails($id, $ft_individual = '') {

        $user_details = $this->obj_tooltip->getUserDetails($id, $ft_individual);
        return $user_details;
    }

    public function getSponserDetails($id) {

        $user_details = $this->obj_tooltip->getUserDetail($id);
        return $user_details;
    }

    public function getToolTip($user_detail, $plan, $board_no = 1) {

        $tootip = '';
        if ($plan == "Board") {
            $tootip = $this->obj_tooltip->getBoardToolTip($user_detail, $board_no);
        } else {
            $tootip = $this->obj_tooltip->getToolTip($user_detail);
        }
        return $tootip;
    }

    public function getSponserToolTip($user_detail) {

        $tootip = '';
        $tootip = $this->obj_tooltip->getSponserToolTip($user_detail);
        return $tootip;
    }

    public function getUserDetailss($id) {
        $user_details = $this->obj_tooltip->getUserDetail($id);
        return $user_details;
    }

    public function viewSponsorTree($user_id, $id_decrypt) {

        //$id_decrypt=$this->OBJ_TREE_VIEW->getDecrypt($id);
        $this->OBJ_TREE_VIEW->addtomatrixUnilevel($id_decrypt, 1, 0);
        $this->OBJ_TREE_VIEW->balancematrixsponser();

        return $this->OBJ_TREE_VIEW->displaymatrixUnilevel($user_id, $id_decrypt);
    }

    function createChildren($id, $recursive = false) {
        return $this->obj_tabular_tree->createChildren($id);
    }

    function getUserFullName($user_id) {
        return $this->obj_tabular_tree->getUserFullName($user_id);
    }

    function getChildren($data) {
        return $this->obj_tabular_tree->getChildren($data);
    }

    public function getUserId($user_name) {
        return $this->obj_tabular_tree->getUserId($user_name);
    }

    public function getDecryptID($id) {
        return $this->OBJ_TREE_VIEW->getDecrypt($id);
    }

    /////////////////////////////CODE EDITED BY YASIR////////////////////////////////////


    public function getUserRefIdByAutoID($id, $goc_table_name) {
        $user_ref_id = 0;
        $res = $this->db->select("user_ref_id")->where("id", $id)->get("$goc_table_name");
        foreach ($res->result() as $row) {

            $user_ref_id = $row->user_ref_id;
        }
        //echo "<br/>$id====->$user_ref_id";
        return $user_ref_id;
    }

    public function getMyBoardIDs($ft_userid, $board_no) {
        return $this->board_view->getMyBoardIDs($ft_userid, $board_no);
    }

    public function getBoardNumberFromBoardUserDetails($user_id, $board_number) {

        $board_seriel_no = 0;
        if ($user_id != 0) {
            $query = $this->db->select_max("board_serial_no")->where("user_id", "$user_id")->where("board_table_name", "$board_number")->get("board_user_detail");

            foreach ($query->result() as $row) {
                if ($row->board_serial_no != "") {
                    $board_seriel_no = $row->board_serial_no;
                }
            }
            //echo"<br/>num->$board_seriel_no qry>>>>" . $this->db->last_query();
        } else {
            $board_seriel_no = 1;
        }
        return $board_seriel_no;
    }

    public function viewBoardTree1($user_id, $id, $board_table, $board_no, $user_board_serial_number = '') {
        $this->getLevelUsers($user_id, $board_table, $board_no, $user_board_serial_number);
        return $this->each_level_users;
    }

    public function getLevelUsers($user_id, $auto_goc_table_name, $board_no, $user_board_serial_number = '') {

        $this->each_level_users = null;
        $level = 0;
        $i = 1;
        $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);

        $user_id_arr_0_1 = $this->getFirstSecondThirdUserId($user_id, $auto_goc_table_name);
        //print_r($user_id_arr_0_1);
        $flag = false;

        if (count($user_id_arr_0_1) > 0) {
            $user_id_1_1 = $user_id_arr_0_1["first_id"];
            $user_id_1_2 = $user_id_arr_0_1["second_id"];

            if ($user_id_1_1 > 0) {
                $level = 1;
                $i = 1;
                $user_id = $user_id_1_1;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
            if ($user_id_1_2 > 0) {
                $level = 1;
                $i = 2;
                $user_id = $user_id_1_2;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
        }
        if ($user_id_1_1 > 0) {
            $user_id_arr_1_1 = $this->getFirstSecondThirdUserId($user_id_1_1, $auto_goc_table_name);
            //print_r($user_id_arr_1_1);
        }
        if ($user_id_1_2 > 0) {
            $user_id_arr_1_2 = $this->getFirstSecondThirdUserId($user_id_1_2, $auto_goc_table_name);
        }


        if (count($user_id_arr_1_1) > 0) {
            $user_id_2_1 = $user_id_arr_1_1["first_id"];
            $user_id_2_2 = $user_id_arr_1_1["second_id"];


            if ($user_id_2_1 > 0) {
                $level = 2;
                $i = 1;
                $user_id = $user_id_2_1;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
            if ($user_id_2_2 > 0) {
                $level = 2;
                $i = 2;
                $user_id = $user_id_2_2;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
        }
        if (count($user_id_arr_1_2) > 0) {
            $user_id_2_4 = $user_id_arr_1_2["first_id"];
            $user_id_2_5 = $user_id_arr_1_2["second_id"];


            if ($user_id_2_4 > 0) {
                $level = 2;
                $i = 3;
                $user_id = $user_id_2_4;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
            if ($user_id_2_5 > 0) {

                $level = 2;
                $i = 4;
                $user_id = $user_id_2_5;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
        }

        /*if ($user_id_2_1 > 0)
            $user_id_arr_2_1 = $this->getFirstSecondThirdUserId($user_id_2_1, $auto_goc_table_name);
        if ($user_id_2_2 > 0)
            $user_id_arr_2_2 = $this->getFirstSecondThirdUserId($user_id_2_2, $auto_goc_table_name);

        if ($user_id_2_4 > 0)
            $user_id_arr_2_4 = $this->getFirstSecondThirdUserId($user_id_2_4, $auto_goc_table_name);
        if ($user_id_2_5 > 0)
            $user_id_arr_2_5 = $this->getFirstSecondThirdUserId($user_id_2_5, $auto_goc_table_name);



        if (count($user_id_2_1) > 0) {
            $user_id_3_1 = $user_id_arr_2_1["first_id"];
            $user_id_3_2 = $user_id_arr_2_1["second_id"];


            if ($user_id_3_1 > 0) {
                $level = 3;
                $i = 1;
                $user_id = $user_id_3_1;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
            if ($user_id_3_2 > 0) {

                $level = 3;
                $i = 2;
                $user_id = $user_id_3_2;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
        }
        if (count($user_id_2_2) > 0) {
            $user_id_3_3 = $user_id_arr_2_2["first_id"];
            $user_id_3_4 = $user_id_arr_2_2["second_id"];


            if ($user_id_3_3 > 0) {
                $level = 3;
                $i = 3;
                $user_id = $user_id_3_3;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
            if ($user_id_3_4 > 0) {

                $level = 3;
                $i = 4;
                $user_id = $user_id_3_4;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
        }
        if (count($user_id_2_4) > 0) {
            $user_id_3_5 = $user_id_arr_2_4["first_id"];
            $user_id_3_6 = $user_id_arr_2_4["second_id"];


            if ($user_id_3_5 > 0) {
                $level = 3;
                $i = 5;
                $user_id = $user_id_3_5;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
            if ($user_id_3_6 > 0) {

                $level = 3;
                $i = 6;
                $user_id = $user_id_3_6;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
        }
        if (count($user_id_2_5) > 0) {
            $user_id_3_7 = $user_id_arr_2_5["first_id"];
            $user_id_3_8 = $user_id_arr_2_5["second_id"];


            if ($user_id_3_7 > 0) {
                $level = 3;
                $i = 7;
                $user_id = $user_id_3_7;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
            if ($user_id_3_8 > 0) {

                $level = 3;
                $i = 8;
                $user_id = $user_id_3_8;
                $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
            }
        }

        $no_of_level = $this->auto_filling->NO_OF_LEVEL;
        $no_users_level = pow(2, $no_of_level);
        $l = 3;

        if ($no_of_level == 4) {
            if ($user_id_3_1 > 0)
                $user_id_arr_3_1 = $this->getFirstSecondThirdUserId($user_id_3_1, $auto_goc_table_name);
            if ($user_id_3_2 > 0)
                $user_id_arr_3_2 = $this->getFirstSecondThirdUserId($user_id_3_2, $auto_goc_table_name);

            if ($user_id_3_3 > 0)
                $user_id_arr_3_3 = $this->getFirstSecondThirdUserId($user_id_3_3, $auto_goc_table_name);
            if ($user_id_3_4 > 0)
                $user_id_arr_3_4 = $this->getFirstSecondThirdUserId($user_id_3_4, $auto_goc_table_name);
            if ($user_id_3_5 > 0)
                $user_id_arr_3_5 = $this->getFirstSecondThirdUserId($user_id_3_5, $auto_goc_table_name);
            if ($user_id_3_6 > 0)
                $user_id_arr_3_6 = $this->getFirstSecondThirdUserId($user_id_3_6, $auto_goc_table_name);

            if ($user_id_3_7 > 0)
                $user_id_arr_3_7 = $this->getFirstSecondThirdUserId($user_id_3_7, $auto_goc_table_name);
            if ($user_id_3_8 > 0)
                $user_id_arr_3_8 = $this->getFirstSecondThirdUserId($user_id_3_8, $auto_goc_table_name);

            if (count($user_id_3_1) > 0) {
                $user_id_4_1 = $user_id_arr_3_1["first_id"];
                $user_id_4_2 = $user_id_arr_3_1["second_id"];


                if ($user_id_4_1 > 0) {
                    $level = 4;
                    $i = 1;
                    $user_id = $user_id_4_1;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
                if ($user_id_4_2 > 0) {

                    $level = 4;
                    $i = 2;
                    $user_id = $user_id_4_2;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
            }
            if (count($user_id_3_2) > 0) {
                $user_id_4_3 = $user_id_arr_3_2["first_id"];
                $user_id_4_4 = $user_id_arr_3_2["second_id"];


                if ($user_id_4_3 > 0) {
                    $level = 4;
                    $i = 3;
                    $user_id = $user_id_4_3;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
                if ($user_id_4_4 > 0) {

                    $level = 4;
                    $i = 4;
                    $user_id = $user_id_4_4;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
            }
            if (count($user_id_3_3) > 0) {
                $user_id_4_5 = $user_id_arr_3_3["first_id"];
                $user_id_4_6 = $user_id_arr_3_3["second_id"];


                if ($user_id_4_5 > 0) {
                    $level = 4;
                    $i = 5;
                    $user_id = $user_id_4_5;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
                if ($user_id_4_6 > 0) {

                    $level = 4;
                    $i = 6;
                    $user_id = $user_id_4_6;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
            }
            if (count($user_id_3_4) > 0) {
                $user_id_4_7 = $user_id_arr_3_4["first_id"];
                $user_id_4_8 = $user_id_arr_3_4["second_id"];


                if ($user_id_4_7 > 0) {
                    $level = 4;
                    $i = 7;
                    $user_id = $user_id_4_7;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
                if ($user_id_4_8 > 0) {

                    $level = 4;
                    $i = 8;
                    $user_id = $user_id_4_8;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
            }
            if (count($user_id_3_5) > 0) {
                $user_id_4_9 = $user_id_arr_3_5["first_id"];
                $user_id_4_10 = $user_id_arr_3_5["second_id"];


                if ($user_id_4_9 > 0) {
                    $level = 4;
                    $i = 9;
                    $user_id = $user_id_4_9;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
                if ($user_id_4_10 > 0) {

                    $level = 4;
                    $i = 10;
                    $user_id = $user_id_4_10;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
            }
            if (count($user_id_3_6) > 0) {
                $user_id_4_11 = $user_id_arr_3_6["first_id"];
                $user_id_4_12 = $user_id_arr_3_6["second_id"];


                if ($user_id_4_11 > 0) {
                    $level = 4;
                    $i = 11;
                    $user_id = $user_id_4_11;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
                if ($user_id_4_12 > 0) {

                    $level = 4;
                    $i = 12;
                    $user_id = $user_id_4_12;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
            }
            if (count($user_id_3_7) > 0) {
                $user_id_4_13 = $user_id_arr_3_7["first_id"];
                $user_id_4_14 = $user_id_arr_3_7["second_id"];


                if ($user_id_4_13 > 0) {
                    $level = 4;
                    $i = 13;
                    $user_id = $user_id_4_13;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
                if ($user_id_4_14 > 0) {

                    $level = 4;
                    $i = 14;
                    $user_id = $user_id_4_14;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
            }
            if (count($user_id_3_8) > 0) {
                $user_id_4_15 = $user_id_arr_3_8["first_id"];
                $user_id_4_16 = $user_id_arr_3_8["second_id"];


                if ($user_id_4_15 > 0) {
                    $level = 4;
                    $i = 15;
                    $user_id = $user_id_4_15;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
                if ($user_id_4_16 > 0) {

                    $level = 4;
                    $i = 16;
                    $user_id = $user_id_4_16;
                    $this->insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number);
                }
            }
        }*/
//        print_R($this->each_level_users);
//        die();
    }

    public function insertIntoArray($user_id, $level, $i, $auto_goc_table_name, $board_no, $user_board_serial_number) {

        $this->each_level_users["level$level"][$i]["id"] = $user_id;
        $user_ref_id = $this->getRefferenceID($user_id, $auto_goc_table_name, $user_board_serial_number);
        //echo "<br>$user_id==$user_ref_id REF";


        /* $id_encode = $this->encrypt->encode($user_id);
          $id_encode1 = str_replace("/", "_", $id_encode);
          $encr_id = urlencode($id_encode1); */

        $user_type = 'user';
        if ($this->session->userdata['logged_in']['user_type'] == 'admin') {
            $user_type = 'admin';
        }

        //$this->each_level_users["level$level"][$i]["link_tree"] = base_url() . $user_type . '/tree/tree_view_board/' . $encr_id . '/' . $board_no;
        $this->each_level_users["level$level"][$i]["link_tree"] = "javascript:view_board_tree('" . $user_id . "','" . $board_no . "','" . $user_type . "',true);";

        if ($level == 0 && $i == 1) {
            $upline_id = $this->getUplineBoardID($user_id, $board_no);
            $upline_board_table_no = $board_no;
            $upline_user_ref_id = $this->getRefferenceID($upline_id, $auto_goc_table_name, $user_board_serial_number);
            $ft_username = $this->OBJ_VAL->IdToUserName($upline_user_ref_id);

            $board_user_details = $this->OBJ_VAL->getLatestBoardIDFromFTUsername($ft_username);

            $board_count = count($board_user_details);
            if ($board_count > 0) {
                $upline_board_table_no = $board_user_details['board_table_no'];
                $upline_id = $board_user_details['board_id'];
            }

            $uplineid_encode = $this->encrypt->encode($upline_id);
            $uplineid_encode1 = str_replace("/", "_", $uplineid_encode);
            $encr_uplineid = urlencode($uplineid_encode1);

            $this->each_level_users["level$level"][$i]["upline_board_table_no"] = $upline_board_table_no;
            $this->each_level_users["level$level"][$i]["upline_id"] = $upline_id;
            $this->each_level_users["level$level"][$i]["upline_link"] = base_url() . $user_type . '/tree/tree_view_board/' . $encr_uplineid . '/' . $upline_board_table_no;
            $upline_board_serial_number = $this->getBoardNumberFromBoardUserDetails($upline_id, $upline_board_table_no);
            $this->each_level_users["level$level"][$i]["upline_username"] = $this->getBoardUserName($upline_id, $auto_goc_table_name, $upline_board_serial_number);

            $upline_refferrals = $this->obj_tooltip->getTwoReferralsBoard($upline_id, $upline_board_table_no, $upline_board_serial_number);


            $referrals_name = '';

            if (count($upline_refferrals) > 0) {
                if (count($upline_refferrals) > 2) {
                    $limit = 2;
                } else {
                    $limit = count($upline_refferrals);
                }

                $more_than_two = "";
                for ($j = 0; $j < $limit; $j++) {
                    if ($j == 1) {
                        $more_than_two = "*";
                    }

                    //$referrals_name .= $referrals[$j]['referral_username'];
                    $referrals_name .= '<tr>
                                        <td class="spillstyle" valign="top" align="center">' . $upline_refferrals[$j]['referral_username'] . $more_than_two . '</td>
                                    </tr>';
                }
            } else {
                //$referrals_name .= "No Referrals <br/>&nbsp;&nbsp;&nbsp;Found.";
                $referrals_name .= "";
            }
            $this->each_level_users["level$level"][$i]["upline_referrals"] = $referrals_name;
        } else {
            $this->each_level_users["level$level"][$i]["upline_id"] = "";
            $this->each_level_users["level$level"][$i]["upline_board_table_no"] = "";
            $this->each_level_users["level$level"][$i]["upline_link"] = "#";
            $this->each_level_users["level$level"][$i]["upline_username"] = '';
            $this->each_level_users["level$level"][$i]["upline_referrals"] = '';
        }

//        $refcount = intval($this->getRefCountAndCheck($user_ref_id, $board_no, $user_board_serial_number));
//        $this->each_level_users["level$level"][$i]["ref_count"] = $refcount;
        $this->each_level_users["level$level"][$i]["user_name"] = $this->getBoardUserName($user_id, $auto_goc_table_name, $user_board_serial_number);
        $this->each_level_users["level$level"][$i]["full_name"] = $this->getBoardFullName($user_id, $board_no);
        $this->each_level_users["level$level"][$i]["user_id"] = $user_id;
        $this->each_level_users["level$level"][$i]["user_ref_id"] = $user_ref_id;

        //echo "<br>board ref=>" . $user_ref_id . "==" . $user_id;
        $directref = $this->getDirectRefID($user_ref_id);
        $this->each_level_users["level$level"][$i]["directref"] = $this->OBJ_VAL->IdToUserName($directref);
        $referrals = $this->obj_tooltip->getTwoReferralsBoard($user_ref_id, $board_no, $user_board_serial_number);
        // print_r($referrals);

        $referrals_name = '';

        if (count($referrals) > 0) {
            if (count($referrals) > 2) {
                $limit = 2;
            } else {
                $limit = count($referrals);
            }
            $more_than_two = "";
            for ($j = 0; $j < $limit; $j++) {
                if ($j == 1) {
                    $more_than_two = "";
                }
                //$referrals_name .= $referrals[$j]['referral_username'];
                $referrals_name .= '<tr>
                                        <td class="spillstyle" valign="top" align="center">' . $referrals[$j]['referral_username'] . $more_than_two . '</td>
                                    </tr>';
            }
            //$referrals_name .= $referrals[0]['referral_name'] . "<br/>&nbsp;&nbsp;&nbsp;" . $referrals[1]['referral_name'];
            if ($refcount > 2) {
                //$referrals_name .= "*";
            }
        } else {
            //$referrals_name .= "No Referrals <br/>&nbsp;&nbsp;&nbsp;Found.";
            $referrals_name .= "";
        }
        $this->each_level_users["level$level"][$i]["two_referrals"] = $referrals_name;
    }

    public function getBoardUserName($id, $auto_goc_table_name, $user_board_serial_number = '') {
        $board_split_query = '';
        if ($auto_goc_table_name == "auto_board_1_backup" || $auto_goc_table_name == "auto_board_2_backup") {
            $board_split_query = " AND board_serial_no=$user_board_serial_number";
        }

        $this->db->select("user_name");
        $this->db->where("id =$id $board_split_query");
        $res = $this->db->get("$auto_goc_table_name");
        foreach ($res->result() as $row) {
            $user_name = $row->user_name;
        }

        return $user_name;
    }

    public function getBoardFullName($id, $board_no) {
        $auto_goc_table_name = $this->table_prefix . "auto_board_" . $board_no;
        $select_qr = "SELECT user_ref_id
			  FROM $auto_goc_table_name
			  WHERE id='$id'";
        //echo "<br>" .$select_qr;
        $res_set = $this->selectData($select_qr, "Error on sel au 007");
        $row = mysql_fetch_array($res_set);
        $user_name = $row['user_ref_id'];
        $full_name = $this->OBJ_VAL->getUserFullName($user_name);

        return $full_name;
    }

    public function getRefCountAndCheck($user_ref_id, $board_no, $user_board_serial_number = '') {

        $refer_count = 0;
//        if ($user_board_serial_number != '') {
//            $this->db->where("board_serial_no", $user_board_serial_number);
//        }

        $qry = $this->db->select("referral_count")->where("user_ref_id", $user_ref_id)->where("board_no", $board_no)->limit(1)->get("board_referral_count");
        //echo $this->db->last_query();
        foreach ($qry->result_array() AS $row) {
            $refer_count = $row['referral_count'];
        }

        return $refer_count;
    }

    public function getUplineBoardID($board_id, $board_no) {
        $res = $this->db->select("father_id")->where("id", $board_id)->get("auto_board_" . $board_no);
        //echo "<br>" . $this->db->last_query();
        foreach ($res->result() AS $row) {
            return $row->father_id;
        }
    }

    public function getRefferenceID($id, $auto_goc_table_name, $user_board_serial_number) {

        $board_split_query = '';
        if ($auto_goc_table_name == "auto_board_1_backup" || $auto_goc_table_name == "auto_board_2_backup") {
            $board_split_query = " AND board_serial_no=$user_board_serial_number";
        }
//        $select_qr = "SELECT user_ref_id
//			  FROM $auto_goc_table_name
//			  WHERE id='$id'$board_split_query";
//        //echo "<br>" .$select_qr;
//        $res_set = $this->selectData($select_qr, "Error on sel au 008");
//        $row = mysql_fetch_array($res_set);
//        $user_ref_id = $row['user_ref_id'];

        $this->db->select("user_ref_id");
        $this->db->where("id =$id $board_split_query");
        $res = $this->db->get("$auto_goc_table_name");
        foreach ($res->result() as $row) {
            $user_ref_id = $row->user_ref_id;
        }

        return $user_ref_id;
    }

    public function getDirectRefID($user_id) {

        $user_details = "user_details";
        $this->db->select('user_details_ref_user_id');
        $this->db->from($user_details);
        $this->db->where('user_detail_refid', $user_id);
        $res = $this->db->get();
        foreach ($res->result() AS $row) {
            return $row->user_details_ref_user_id;
        }
    }

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
