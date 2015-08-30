<?php

require_once 'Inf_Model.php';

Class registersubmit extends Inf_Model {

    public $obj_vali;
    public $obj_module;

    public function __construct() {
        parent::__construct();
        require_once 'validation.php';
        $this->obj_vali = new Validation();
    }


    public function updateLoginUser($username, $pwd, $id_up) {
        $data = array(
            'user_name' => $username,
            'password' => $pwd,
            'user_type' => 'distributor',
            'addedby' => 'code'
        );
        $this->db->where('user_id', $id_up);
        $result1 = $this->db->update('login_user', $data);
        return $result1;
    }

    public function updateFTIndividual($father_id, $position, $username, $id_up, $order_id='', $reg_by_using='', $user_level = '', $product_id = '') {
        
        /*if($reg_by_using=="free join")
            $status="no";
        else*/
            $status="yes";

        $time_now = date("Y-m-d H:i:s");
        $this->db->set('father_id', $father_id);
        $this->db->set('order_id', $order_id);
        $this->db->set('position', $position);
        $this->db->set('user_name', $username);
        $this->db->set('active', $status);
        $this->db->set('date_of_joining', $time_now);
        $this->db->set('user_level', $user_level);
        $this->db->set('register_by_using', $reg_by_using);
        if ($product_id != '') {
            $this->db->set('product_id', $product_id);
        } 
        $this->db->where('id', $id_up);
        $result = $this->db->update('ft_individual');
        $this->session->set_userdata('active', 'yes');
        return $result;
    }

    public function getMaxOrderIDUnilevel() {
        $max_order_id = "";
        $this->db->select_max('order_id', 'order_id');
        $this->db->from('ft_individual_unilevel');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $max_order_id = $row->order_id;
        }
        return $max_order_id;
    }

    public function getFatherLevelUni($father_id) {
        $user_level = "";
        $this->db->select_max('user_level', 'user_level');
        $this->db->from('ft_individual_unilevel');
        $this->db->where('id', $father_id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_level = $row->user_level;
        }
        return $user_level;
    }

    public function getPositionUnilevel($father_id) {
        $position = "";
        $this->db->select_max('position', 'position');
        $this->db->where('father_id', $father_id);
        $this->db->from('ft_individual_unilevel');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $position = $row->position;
        }
        return $position;
    }

    public function insertToUnilevelTree($regr) {
        /*if($regr['by_using']=="free join")
            $status="no";
        else*/
            $status="yes";
        
        $order_id = $this->getMaxOrderIDUnilevel();
        $new_order_id = $order_id + 1;
        $position = $this->getPositionUnilevel($regr['referral_id']);
        $new_position = $position + 1;
        $level = $this->getFatherLevelUni($regr['referral_id']);
        $new_level = $level + 1;
        $product_id = $regr['prodcut_id'];
        $data = array(
            'id' => $regr['userid'],
            'user_name' => $regr['username'],
            'father_id' => $regr['referral_id'],
            'order_id' => "$new_order_id",
            'active' => $status,
            'position' => "$new_position",
            'product_id' => "$product_id",
            'user_level' => "$new_level",
            'date_of_joining' => $regr['joining_date']
        );
        $res = $this->db->insert('ft_individual_unilevel', $data);
        return $res;
    }

    public function insertBalanceAmount($user_id) {
        $this->db->set('balance_amount', '0');
        $this->db->set('user_id', $user_id);
        $result = $this->db->insert('user_balance_amount');
        return $result;
    }

    public function savePassCodes($user_id, $tran_code) {
        $this->db->set("user_id", $user_id);
        $this->db->set("tran_password", $tran_code);
        $res = $this->db->insert("tran_password");
        return $res;
    }

    public function tmpInsert($father_id, $newpos) {
        $user_name1 = $this->str_rand(5, 9);
        $user_name = $user_name1 . $father_id;
        $insert_id = $this->insertInToFtIndividual($father_id, $newpos, $user_name);
        return $this->insertInToLoginUser($insert_id);
    }

    public function str_rand($minlength, $maxlength, $useupper = true, $usenumbers = true) {
        $key = "";
        $charset = "";
        if ($useupper)
            $charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if ($usenumbers)
            $charset .= "0123456789";
        if ($minlength > $maxlength)
            $length = mt_rand($maxlength, $minlength);
        else
            $length = mt_rand($minlength, $maxlength);
        for ($i = 0; $i < $length; $i++)
            $key .= $charset[(mt_rand(0, (strlen($charset) - 1)))];
        return $key;
    }

    public function insertInToFtIndividual($father_id, $position, $username) {
        $date = date("Y-m-d H:i:s");
        $data = array(
            'father_id' => $father_id,
            'position' => $position,
            'active' => 'server',
            'user_name' => $username,
        );
        $res = $this->db->insert('ft_individual', $data);
        $insert_id = $this->db->insert_id();
        $data = array(
            'id' => $insert_id,
        );
        $result = $this->db->insert('leg_details', $data);
        return $insert_id;
    }

    public function insertUserDetails($regr) {
        $flag = false;
        $done_by = $regr['done_by'];
        $this->insertUserActivity($regr['userid'], 'Register new member', $done_by);
        $data = array(
            'user_detail_refid' => $regr['userid'],
            'user_detail_name' => $regr['full_name'],
            'user_details_ref_user_id' => $regr['referral_id'],
            'user_detail_address' => $regr['address'],
            'user_detail_nominee' => $regr['nominee'],
            'user_detail_pan' => $regr['pan_no'],
            'user_detail_town' => $regr['town'],
            'user_detail_country' => $regr['country'],
            'user_detail_state' => $regr['state'],
            'user_detail_district' => $regr['district'],
//            'user_detail_passcode' => $regr['passcode'],
            'user_detail_pin' => $regr['pin'],
            'user_detail_mobile' => $regr['mobile'],
            'user_detail_land' => $regr['land_line'],
            'user_detail_email' => $regr['email'],
            'user_detail_dob' => $regr['date_of_birth'],
            'user_detail_gender' => $regr['gender'],
            'join_date' => $regr['joining_date'],
            'user_detail_relation' => $regr['relation'],
            'user_detail_acnumber' => $regr['bank_acc_no'],
            'user_detail_ifsc' => $regr['ifsc'],
            'user_detail_nbank' => $regr['bank_name'],
            'user_detail_nbranch' => $regr['bank_branch']
        );
        $res = $this->db->insert('user_details', $data);
        if ($res > 0) {
            $flag = true;
        }
        return $flag;
    }

    public function updateUserDetails($regr, $uid) {
        $flag = false;
        $this->db->where('user_detail_refid', $uid);
        $reg_update = array('user_detail_name' => $regr['full_name'],
            'user_detail_address' => $regr['address'],
            'user_detail_country' => $regr['country'],
            'user_detail_town' => $regr['town'],
            'user_detail_state' => $regr['state'],
            'user_detail_district' => $regr['district'],
            'user_detail_mobile' => $regr['mobile'],
            'user_detail_land' => $regr['land_line'],
            'user_detail_email' => $regr['email'],
            'user_detail_pin' => $regr['pin'],
           // 'user_detail_nominee' => $regr['nominee'],
            //'user_detail_relation' => $regr['relation'],
            //'user_detail_acnumber' => $regr['bank_acc_no'],
            //'user_detail_ifsc' => $regr['ifsc'],
            //'user_detail_nbank' => $regr['bank_name'],
            //'user_detail_nbranch' => $regr['bank_branch'],
            //'user_detail_pan' => $regr['pan_no'],
            'user_detail_dob' => $regr['date_of_birth'],
            'user_detail_gender' => $regr['gender'],
            //'user_detail_facebook' => $regr['facebook'],
            //'user_detail_twitter' => $regr['twitter'],
            //'user_detail_name' => $regr['name']
        );
        $reg_res = $this->db->update('user_details', $reg_update);
        if ($reg_res) {
            $flag = true;
        }
        return $flag;
    }

    public function insertInToLoginUser($id) {
        $pwd = "";
        $pwd = md5($pwd);
        $data = array(
            'user_id' => $id,
            'user_name' => 'InfiniteMLM' . $id,
            'password' => $pwd,
            'addedby' => 'server',
        );
        $result = $this->db->insert('login_user', $data);
        return $result;
    }

    public function viewProducts() {
        require_once 'Product.php';
        $obj_product = new Product();
        $obj_product->getAllProducts('yes');

        echo "<option value='' selected='selected'>Select Product</option>";
        for ($i = 0; $i < count($obj_product->product_detail); $i++) {
            $id = $obj_product->product_detail["details$i"]["id"];
            $product_name = $obj_product->product_detail["details$i"]["name"];
            echo "<option value='$id' >$product_name</option>";
        }
    }

    public function viewDistrict($state, $district) {
        $state_id = $this->getStateID($state);
        $arr = $this->getDistrict($state_id);
        echo "&nbsp;&nbsp;&nbsp;<select name='district'  id='district' style='width: 158px;' tabindex='14' onChange='setHiddenValue(this.value)' >
					<option value='$district' selected='selected'>$district</options>";
        $cnt = count($arr);
        for ($i = 0; $i < $cnt; $i++) {
            $id = $arr["detail$i"]["district_id"];
            $name = $arr["detail$i"]["district_name"];
            if ($district != $name) {
                echo "<option value='$name'>$name</option>";
            }
        }
        echo '</select>';
    }

    public function getStateName($state_id) {
        $State_Name = "";
        $this->db->select("State_Name");
        $this->db->from("life_state");
        $this->db->where('State_Id', $state_id);
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $State_Name = $row->State_Name;
        }
        return $State_Name;
    }

    public function updatePinNumber($pin_no, $user_name = '') {
        if ($user_name == '') {

            $this->db->set('status', 'no');
            $this->db->where('pin_numbers', $pin_no);
            $result = $this->db->update('pin_numbers');
        } else {

            $date = date('Y-m-d');
            $this->db->set('status', 'no');
            $this->db->set('pin_alloc_date', $date);
            $this->db->set('used_user', $user_name);
            $this->db->where('pin_numbers', $pin_no);
            $result = $this->db->update('pin_numbers');
        }
        return $result;
    }

    public function getLevel($id) {
        $this->db->select("user_level");
        $this->db->from("ft_individual");
        $this->db->where('id', $id);
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $user_level = $row->user_level;
        }
        return $user_level;
    }

    public function getMaxOrderID() {

        $this->db->select_max('order_id', 'order_id');
        $this->db->from('ft_individual');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $max_order_id = $row->order_id;
        }
        return $max_order_id;
    }

    public function getUsername() {

        $config = $this->getUsernameConfig();
        $length = $config["length"];
        $u_name = $this->getRandId($length);
        if ($config["prefix_status"] == "yes") {
            $prefix = $config["prefix"];
            $u_name = $prefix . $u_name;
        }
        return $u_name;
    }

    public function getUsernameConfig() {
        $query = $this->db->get('username_config');
        foreach ($query->result_array() as $row) {
            $config["length"] = $row["length"];
            $config["prefix_status"] = $row["prefix_status"];
            $config["prefix"] = $row["prefix"];
        }
        return $config;
    }

    public function getRandId($length) {

        $key = "";
        $charset = "0123456789";
        for ($i = 0; $i < $length; $i++)
            $key .= $charset[(mt_rand(0, (strlen($charset) - 1)))];
        $randum_id = $key;



        $config = $this->getUsernameConfig();
        if ($config["prefix_status"] == "yes") {

            $prefix = $config["prefix"];
            $randum_id = $prefix . $randum_id;
        }


        $this->db->select('*');
        $this->db->from('login_user');
        $this->db->where('user_name', $randum_id);
        $query = $this->db->get();
        $count = $query->num_rows();
        if ($count == 0)
            return $key;
        else
            $this->getRandId($length);
    }

    public function getRandTransPasscode($length) {
        $key = "";
        $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for ($i = 0; $i < $length; $i++)
            $key .= $charset[(mt_rand(0, (strlen($charset) - 1)))];
        $randum_id = $key;

        $this->db->select("*");
        $this->db->from("tran_password");
        $this->db->where('tran_password', $randum_id);
        $qr = $this->db->get();
        $count = $qr->num_rows();
        if (!$count)
            return $key;
        else
            $this->getRandTransPasscode($length);
    }

    public function insertUserActivity($login_id, $activity, $done_by) {

        $date = date("Y-m-d H:i:s");
        $ip_adress = $_SERVER['REMOTE_ADDR'];
        $this->db->set('user_id', $login_id);
        $this->db->set('activity', $activity);
        $this->db->set('done_by', $done_by);
        $this->db->set('ip', $ip_adress);
        $this->db->set('date', $date);
        $result = $this->db->insert('activity_history');
        return $result;
    }

}