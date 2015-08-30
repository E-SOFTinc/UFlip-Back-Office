<?php

require_once 'Inf_Model.php';

class member_model extends Inf_Model {

    private $OBJ_PROFILE;
    private $OBJ_VALI;
    private $OBJ_PAGE;

    public function __construct() {
        require_once 'ProfileClass.php';
        require_once 'validation.php';
        require_once 'Page.php';
        $this->OBJ_PROFILE = new profileClass();
        $this->OBJ_VALI = new Validation();
        $this->OBJ_PAGE = new Page();
    }

    public function blockMember($block_id, $status) {
        $res = $this->OBJ_PROFILE->blockMember($block_id, $status);
        return $res;
    }

    public function paging($page, $limit, $keyword) {
        $numrows = $this->OBJ_PROFILE->searchMemberPage($keyword);
        $first = $this->OBJ_PAGE->paging($page, $limit, $numrows);
        return $first;
    }

    public function setFooter($page, $limit, $current_url) {
        return $this->OBJ_PAGE->setFooter($page, $limit, $current_url);
    }

    public function searchMembers($keyword, $page, $limit) {
        /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        $mem_arr = $this->OBJ_PROFILE->searchMember($keyword, $page, $limit);

        for ($i = 0; $i < count($mem_arr); $i++) {
            $father_id = $mem_arr["detail$i"]["father_id"];
            $mem_arr["detail$i"]["sponser_name"] = $this->OBJ_VALI->IdToUserName($father_id);
            $mem_arr["detail$i"]["active"] = $this->OBJ_VALI->isUserActive($mem_arr["detail$i"]["user_id"]);
        }
        return $mem_arr;
    }

    public function getCountMembers($keyword) {
        /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->OBJ_PROFILE->getCountMembers($keyword);
    }

    public function terminateMembers($limit='',$page='') {

        $details = array();
        $this->db->select('*');
        $this->db->from('terminated_members');
        $this->db->limit($limit,$page);
        $query = $this->db->get();
        $i = 0;
        foreach ($query->result_array() as $row) {
            $details["detail$i"]["user_id"] = $row['user_id'];
            $details["detail$i"]["user_name"] = $row['user_name'];
            $details["detail$i"]["date"] = $row['date'];
            $details["detail$i"]["reason"] = $row['reason'];
            $i++;
        }
        return $details;
    }

    public function terminateMembersCount() {
        $this->db->select('count(*) as cnt');
        $this->db->from('terminated_members');
        $qry = $this->db->get();
        foreach ($qry->result() as $row) {
            return $row->cnt;
        }
    }

    public function getUserName_details() {
        $this->db->select('id');
        $this->db->select('user_name');
        $this->db->from('ft_individual');
        $this->db->where('active !=', 'server');
        $this->db->group_by('id');
        $query = $this->db->get();
        $i = 0;
        foreach ($query->result() as $row) {
            $name_arr[$i]["id"] = $row->id;
            $name_arr[$i]["user_name"] = $row->user_name;
            $i++;
        }
        return $name_arr;
    }

    public function insertTerminateDetails($userid, $user_name, $reason_ter) {
        $date = date("Y-m-d H:i:s");
        $this->db->select('*');
        $this->db->from('terminated_members');
        $this->db->where('user_name', $user_name);
        $query = $this->db->get();
        $this->db->where('user_name', $user_name);
        $this->db->from('login_user');
        $username_exists = $this->db->count_all_results();
        if ($query->num_rows() == 0 && $username_exists) {

            if ($user_name != '') {
                $data = array(
                    'user_id' => $userid,
                    'user_name' => $user_name,
                    'date' => $date,
                    'reason' => $reason_ter
                );
                $res1 = $this->db->insert('terminated_members', $data);
                if ($res1) {
                    $res = $this->updateFtIndividualStatus($userid, 'terminated');
                }
            }
            return $res;
        } else {
            return;
        }
    }

    public function updateFtIndividualStatus($userid, $status) {
        $flag = 0;
        $this->db->set('active', $status);
        $this->db->where('id', $userid);
        $result = $this->db->update('ft_individual');
        if ($result) {
            $this->db->set('active', $status);
            $this->db->where('id', $userid);
            $result_uni = $this->db->update('ft_individual_unilevel');
            if ($result_uni) {
                $flag = 1;
            }
        }
        return $flag;
    }

    public function userNameToID($user_name) {
        $user_id = $this->OBJ_VALI->userNameToID($user_name);
        return $user_id;
    }

    public function changeUsername($uname, $new_uname) {
        $flag = false;
        $this->db->where('user_name', $uname);
        $this->db->from('login_user');
        $count = $this->db->count_all_results();
        $this->db->where('user_name', $new_uname);
        $this->db->from('login_user');
        $count_new = $this->db->count_all_results();
        if ($count > 0 && $count_new == 0) {
            $this->db->where('user_name', $uname);
            $uname_update = array('user_name' => $new_uname);
            $reg_res = $this->db->update('login_user', $uname_update);
            if ($reg_res) {
                $res_ft = $this->updateUsernameFtIndividual($uname, $new_uname);
                if ($res_ft) {
                    $flag = true;
                    $this->updateUsernameHistory($uname, $new_uname);
                }
            }
        }

        return $flag;
    }

    public function updateUsernameFtIndividual($uname, $new_uname) {
        $flag = 0;
        $this->db->where('user_name', $uname);
        $uname_update = array('user_name' => $new_uname);
        $res = $this->db->update('ft_individual', $uname_update);
        if ($res) {
            $this->db->where('user_name', $uname);
            $uname_update = array('user_name' => $new_uname);
            $res_unilevel = $this->db->update('ft_individual_unilevel', $uname_update);
            if ($res_unilevel) {
                $flag = 1;
            }
        }
        return $flag;
    }

    public function updateUsernameHistory($uname, $new_uname) {
        $data = array(
            'old_username' => $uname,
            'new_username' => $new_uname,
            'modified_date' => date('y-m-d')
        );
        $res = $this->db->insert('username_change_history', $data);
        return $res;
    }

    public function isPlacementAvailable($user_name) {
        $flag = false;

        $user_id = $this->OBJ_VALI->userNameToID($user_name);

        if ($user_id) {
            $flag = true;
        }
        return $flag;
    }

    public function getUnilevelFatherID($user_name) {
        $father_id = 0;
        $this->db->select("father_id");
        $this->db->where('user_name', $user_name);
        $qr = $this->db->get("ft_individual_unilevel");

        foreach ($qr->result() as $row) {
            $father_id = $row->father_id;
        }
        return $father_id;
    }

    public function changeUserPlacement($post_arr, $user_id, $user_name) {

        //print_r($post_arr);
        //  echo"</br>userid---".$user_id."</br>";
        //  echo"</br>user_name---".$user_name."</br>";

        $status = FALSE;



        $ft_details = $this->getAllDetails($user_id);


        $new_userid = $this->getFTMaxAutoIncrementID() + 1;
        //    echo"</br>new_us2222222erid---".$new_userid."</br>";
        //     echo "<br>==$new_userid<br>";
        $update_ft_ids = $this->updateFTCurrentIDUsername($user_id, $user_name, $new_userid, "terminated");
        if ($update_ft_ids) {
            $this->setNewAutoIncrementFT($new_userid);
            $this->updateDownlineDetails($user_id, $new_userid);
        }
        //     }
//echo "..66666666..";
        $sponsor_id = $this->checkPlacement(mysql_real_escape_string($post_arr['ir_id_no']));
        //  echo "..sponsor_id..".$sponsor_id;
        $last_user_id = $this->getPlacement($sponsor_id, mysql_real_escape_string($post_arr['placement']));
        //  echo "..last_user_id..".$last_user_id;
        $last_user_name = $this->IdToUserNameAll($last_user_id);
        //   echo "..last_user_name..".$last_user_name;
//echo "<br>sponser=$sponsor_tc_id==new fr id=$last_user_id==new fr name=$last_user_name<br>";
        if ($last_user_name != "" && $last_user_id != '') {
            $regr['position'] = mysql_real_escape_string($post_arr['placement']);
            $regr['father_name'] = $last_user_name;
            $regr['father_id'] = $last_user_id;
            $regr['referral_name'] = mysql_real_escape_string($post_arr['ir_id_no']);

            $placement_type = "placement_change";
            $this->insertPlacementHistory($user_id, $regr['father_id'], $regr['position'], $placement_type);

//                for ($i = 0; $i < 3; $i++) {
//
            $username = $ft_details[0]['user_name'];
            $ft_user_id = $ft_details[0]['id'];

//echo "<br>username $username=== id $user_id<br>";
            $regr['father_id'] = $this->userNameToIDAll($regr['father_name']);
            $regr['referral_id'] = $this->userNameToIDAll($regr['referral_name']);

            // echo "<br>father=>" . $regr['father_name'] . "==" . $regr['father_id'];

            $child_node = $this->OBJ_VALI->getChildNodeId($regr['father_id'], $regr['position']);
//echo "<<<<<,".$child_node;
            $ft_result = $this->updateFTDetails($ft_details[0], $regr, $child_node);
            $status = TRUE;
//                    
        } else {
            $status = FALSE;
        }

        return $status;
    }

    public function getBinaryFatherId($unilevel_father_id, $current_user_id) {
        $res = $this->db->select("father_id")->where("id", $current_user_id)->get("ft_individual");
        //echo"jjjj".$this->db->last_query();
        foreach ($res->result_array() AS $row) {
            if ($row['father_id'] == $unilevel_father_id)
                return $current_user_id;
            else
                return $this->getBinaryFatherId($unilevel_father_id, $row['father_id']);
        }
    }

    public function getFatherIDPosition($user_id) {

        $father_details = array();
        $res = $this->db->select("father_id,position")->where("id", $user_id)->get("ft_individual");

        foreach ($res->result() AS $row) {
            $father_details['father_id'] = $row->father_id;
            $father_details['position'] = $row->position;
        }

        return $father_details;
    }

    public function getUserPosition($user_id) {
        $position = "";
        $res = $this->db->select("position")->where("id", $user_id)->get("ft_individual");
        foreach ($res->result() AS $row) {
            $position = $row->position;
        }
        return $position;
    }

    public function getCurrentUserFatherPosition($bin_father_id, $current_user_id) {
        $res = $this->db->select("father_id,position")->where("id", $current_user_id)->get("ft_individual");
        //echo"jjjj".$this->db->last_query();
        foreach ($res->result_array() AS $row) {
            if ($row['father_id'] == $bin_father_id) {

                return $row['position'];
            }
            else
                return $this->getCurrentUserFatherPosition($bin_father_id, $row['father_id']);
        }
    }

    public function checkIdExist($user_id) {
        $flag = 0;
        $this->db->select("count(*) AS cnt");
        $this->db->from('qualify_count_details');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        //echo"lll".$this->db->last_query();
        foreach ($query->result() as $row) {
            $cnt = $row->cnt;
        }
        if ($cnt > 0)
            $flag = 1;
        return $flag;
    }

    public function getFTMaxAutoIncrementID() {
        $res = $this->db->select_max("id")->get("ft_individual");
        foreach ($res->result() AS $row) {
            return $row->id;
        }
    }

    public function updateFTCurrentIDUsername($current_userid, $current_username, $new_userid, $new_status = "terminated") {
        $new_username = $current_username . "_terminated";

        $STATUS = $this->OBJ_VALI->isUserNameAvailable($new_username);
        if ($STATUS) {
            $username_count = $this->OBJ_VALI->getUsernameCount($new_username) + 1;
            $new_username = $new_username . "_$username_count";
        }


        $this->db->set("user_name", $new_username);
        $this->db->set("active", $new_status);
        $this->db->set("id", $new_userid);
        $this->db->where("id", "$current_userid");

        $res = $this->db->update("ft_individual");

        return $res;
    }

    public function setNewAutoIncrementFT($new_userid) {
        $auto = $new_userid + 1;
        $set_auto_increment_ft = "ALTER TABLE 34_ft_individual AUTO_INCREMENT=$auto";
        $this->db->query($set_auto_increment_ft);
    }

    public function updateDownlineDetails($current_userid, $new_userid) {

        $res = $this->db->get_where("ft_individual", array('father_id' => $current_userid));
// echo "<br>ft select=>" . $this->db->last_query();
        foreach ($res->result_array() AS $row) {
            $id = $row['id'];

            $this->db->where("id", $id);
            $this->db->update("ft_individual", array("father_id" => $new_userid));
//echo "<br>ft update=>" . $this->db->last_query();
        }
    }

    public function checkPlacement($ir_id_no) {

        $sponsor_id = "";
        $user_id = $this->OBJ_VALI->userNameToID($ir_id_no);

        return $user_id;
    }

    public function getPlacement($sponsor_id, $position) {

        $this->db->select('id');
        $this->db->select('active');
        $this->db->from('ft_individual');
        $this->db->where('father_id', $sponsor_id);
        $this->db->where('position', $position);
        //$this->db->order_by('position');
        $res = $this->db->get();
        //echo"dddd".$this->db->last_query();die();
        foreach ($res->result() as $row) {
            if ($row->active == "server") {
                return $sponsor_id;
            } else {
                $placement = $this->getPlacement($row->id, $position);
                return $placement;
            }
        }
    }

    public function IdToUserNameAll($user_id) {

        $user_name = "";

        $this->db->select('user_name');
        $this->db->from('ft_individual');
        $this->db->where('id', $user_id);
        $this->db->where('active !=', 'server');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $user_name = $row->user_name;
        }
        //echo $user_name;
        return $user_name;
    }

    public function updateFTDetails($ft_details, $regr, $child_node, $set_active_status = '') {

        if ($set_active_status == "") {
            $active_status = $ft_details['active'];
        } else {
            $active_status = $set_active_status;
        }

        $id = $ft_details['id'];
        $order_id = $ft_details['order_id'];
        $user_name = $ft_details['user_name'];

        $product_id = $ft_details['product_id'];
        $time_now = $ft_details['date_of_joining'];
        $user_level = $ft_details['user_level'];




        $father_id = $regr['father_id'];
        $position = $regr['position'];

        $this->db->set('father_id', $father_id);
        $this->db->set('order_id', $order_id);
        $this->db->set('position', $position);
        $this->db->set('user_name', $user_name);
        $this->db->set('active', "$active_status");
        $this->db->set('date_of_joining', $time_now);


        $this->db->set('user_level', $user_level);
        $this->db->set('product_id', $product_id);

        $this->db->set('id', $id);
        $this->db->where('id', $child_node);
        $result = $this->db->update('ft_individual');
        //  echo "<br>ft placement changed=>" . $this->db->last_query();
        if ($result) {
            if ($set_active_status == "") {
                $this->load->model('registersubmit');
                $reg = new registersubmit();
                $res1 = $reg->tmpInsert($id, 'L');
                $res2 = $reg->tmpInsert($id, 'R');
            }
        }


        return $result;
    }

    public function getAllDetails($user_id, $type = "") {

        $ft_details = array();
        $user_name = $this->IdToUserNameAll($user_id);
        //  echo"</br>userccc_name---".$user_name."</br>";
        $user_type = $this->getUserType($user_id);

        if ($user_type != "admin") {

            $this->db->where("id", "$user_id");
            $this->db->not_like("user_name", "terminated");
            $res = $this->db->get_where("ft_individual");
            //echo "<br>" . $this->db->last_query();
            $count = $res->num_rows;

            foreach ($res->result_array() AS $row) {
                $ft_details[] = $row;
            }
        }

        return $ft_details;
    }

    public function getUserType($user_id) {
        $user_type = '';
        $this->db->select("user_type");
        $this->db->from("login_user");
        $this->db->where("user_id", $user_id);
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            $user_type = $row->user_type;
        }
        return $user_type;
    }

    public function insertPlacementHistory($user_id, $father_id, $position, $placement_type = "placement_change") {
        $date = date("Y-m-d H:i:s");

        $data = array("main_user_id" => $user_id, "father_id" => $father_id, "position" => $position, "changed_date" => $date, "placement_type" => "$placement_type");

        $this->db->insert("placement_history", $data);
//echo "<br>placement histry===>" . $this->db->last_query();
    }

    public function userNameToIDAll($username) {
        $user_id = "";
        $this->db->select('id');
        $this->db->from('ft_individual');
        $this->db->where('user_name', $username);
        $this->db->where('active !=', 'server');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $user_id = $row->id;
        }

        return $user_id;
    }

}
