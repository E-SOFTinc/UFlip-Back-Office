<?php

require_once 'Inf_Model.php';

Class board_registersubmit extends Inf_Model {

    public $obj_vali;
    public $obj_module;

    public function __construct() {
        parent::__construct();
        require_once 'validation.php';
        $this->obj_vali = new Validation();
    }

    public function validateRegisterData($regr) {

        $this->MODULE_STATUS = $this->menu->MODULE_STATUS;

        $product_status = $this->MODULE_STATUS['product_status'];
        $pin_status = $this->MODULE_STATUS['pin_status'];

        $username = $regr['username'];
        $position = $regr['position'];
        $passcode = $regr['passcode'];
        $fatherid = $regr['fatherid'];
        $product_id = $regr['prodcut_id'];
        $flag = true;
        //for pin avail
        if ($this->obj_vali->isUserNameAvailable($username)) {
            $flag = false;
            echo "<script>alert('Error on registration. User already registered 69')</script>";
            echo "<script>document.location.href='../admin/home'</script>";
        } else
        if (!$this->obj_vali->isLegAvailable($fatherid, $position)) { // User already registered
            $flag = false;
            echo "<script>alert('Error on registration. User already registered in this position')</script>";
            echo "<script>document.location.href='../admin/home'</script>";
        } else
        if ($product_status == 'yes') {
            
        }
        if ($pin_status == "yes") {
            if (!$this->obj_vali->checkUserPin($passcode)) {
                $flag = false;
                echo "<script>alert('Error on registration. E-pin is already used')</script>";
                echo "<script>document.location.href='../admin/home'</script>";
            }
        }
        return $flag;
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
        //echo"<br/>lu qry>>>>" . $this->db->last_query();
        return $result1;
    }

    public function updateFTIndividual($father_id, $position, $username, $id_up, $order_id , $reg_by_using = '', $user_level = '', $product_id = '') {

        $time_now = date("Y-m-d H:i:s");

        if ($product_id == '') {
            $this->db->set('father_id', $father_id);
            $this->db->set('order_id', $order_id);
            $this->db->set('position', $position);
            $this->db->set('user_level', $user_level);
            $this->db->set('user_name', $username);
            $this->db->set('active', 'yes');
            $this->db->set('date_of_joining', $time_now);
            $this->db->set('register_by_using', $reg_by_using);
            $this->db->set('order_id', $order_id);
            $this->db->where('id', $id_up);
            $result = $this->db->update('ft_individual');
            $this->session->set_userdata('active', 'yes');
        } else {
            $this->db->set('father_id', $father_id);
            $this->db->set('order_id', $order_id);
            $this->db->set('position', $position);
            $this->db->set('user_name', $username);
            $this->db->set('active', 'yes');
            $this->db->set('date_of_joining', $time_now);
            $this->db->set('product_id', $product_id);
            $this->db->set('user_level', $user_level);
            $this->db->set('register_by_using', $reg_by_using);
            $this->db->set('order_id', $order_id);
            $this->db->where('id', $id_up);
            $result = $this->db->update('ft_individual');
            $this->session->set_userdata('active', 'yes');
        }
        //echo"<br/>qry>>>>" . $this->db->last_query();
        return $result;
    }

    public function getNewPositionOfUser($user_id) {
        $this->db->select_max('position', 'new_position');
        $this->db->from('ft_individual');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $new_position = $row->new_position;
        }

        return $new_position;
    }

    public function insertBalanceAmount($user_id) {

        $this->db->set('balance_amount', '0');
        $this->db->set('user_id', $user_id);
        $result = $this->db->insert('user_balance_amount');
        return $result;
    }

    public function savePassCodes($user_id, $tran_code) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $tran_passcodes = $this->table_prefix . "tran_password";

        $qr = "INSERT INTO $tran_passcodes SET user_id='$user_id',tran_password='$tran_code'";
        $res = $this->insertData($qr, 'Error on inserting transaction passcode');
    }

    public function getlastInsertId() {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $login_user = $this->table_prefix . "login_user";
        $get_id = $this->selectData("SELECT MAX(user_id) as id FROM $login_user");
        $get_id = mysql_fetch_array($get_id);
        $id1 = $get_id['id'];
        return $id1;
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


        $datas = array(
            'id' => $insert_id,
        );
        $result = $this->db->insert('leg_details', $datas);
        return $insert_id;
    }

    public function insertUserDetails($regr) {
               $flag = false;


        $data = array(
            'user_detail_refid' => $regr['userid'],
            'user_detail_name' => $regr['full_name'],
            'user_details_ref_user_id' => $regr['referral_id'],
            //'user_detail_father' => $regr['fathername'],
            'user_detail_address' => $regr['address'],
            'user_detail_nominee' => $regr['nominee'],
            'user_detail_pan' => $regr['pan_no'],
            'user_detail_town' => $regr['town'],
            'user_detail_country' => $regr['country'],
            'user_detail_state' => $regr['state'],
            'user_detail_district' => $regr['district'],
           // 'user_detail_po' => $regr['post_office'],
            //'user_detail_passcode' => $regr['passcode'],
            'user_detail_pin' => $regr['pin'],
            'user_detail_mobile' => $regr['mobile'],
            'user_detail_land' => $regr['land_line'],
            'user_detail_email' => $regr['email'],
            //'user_detail_college' => $regr['college'],
            //'user_detail_course' => $regr['course'],
            'user_detail_dob' => $regr['date_of_birth'],
            'user_detail_gender' => $regr['gender'],
            //'user_detail_blood_group' => $regr['bloodgroup'],
            //'user_detail_donate_blood' => $regr['donate_yes'],
            //'user_detail_qualification' => $regr['qualification'],
            //'user_detail_designation' => $regr['designation'],
            //'user_detail_dept' => $regr['dept'],
            //'user_detail_office' => $regr['Office'],
            //'user_detail_place_work' => $regr['place_work'],
            //'user_detail_seek_job' => $regr['seek_job'],
            //'user_detail_area_interest' => $regr['interest'],
           //'user_detail_year_study' => $regr['year_study'],
            //'userdetail_mobid' => $regr['mobid'],
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
                            'user_detail_nric_no' => $regr['nric_no'],
                            'user_detail_mobile' => $regr['mobile'],
                            'user_detail_email' => $regr['email'],
                            'user_detail_acnumber' => $regr['bank_acc_no'],
                            'user_detail_nbank' => $regr['bank_name'],
                            'user_detail_swift_code' => $regr['swift_code'],
                            'user_detail_dob' => $regr['date_of_birth'],
                            'user_detail_bank_code' => $regr['bank_code'],
                            'user_detail_branch_code' => $regr['branch_code'],
                            'user_detail_gender' => $regr['gender'],
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
        //echo"<br/luysr qry>>>>" . $this->db->last_query();
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

    public function viewState($option = '') {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $life_state = $this->table_prefix . "life_state";
        $grpsql = "select State_Id,State_Name from $life_state order by State_Name";
        $grpres = $this->selectData($grpsql, "Erorr on selecting state on 13344");
        if ($option == '') {
            echo "<option value='' selected='selected'>Select State</option>";
        } else {
            echo "<option value='$option' selected='selected'>$option</option>";
        }
        while ($row = mysql_fetch_array($grpres)) {
            $State_Id = $row['State_Id'];
            $State_Name = $row['State_Name'];
            if ($option != $State_Name) {
                echo "<option value='$State_Id'>$State_Name</option>";
            }
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

    public function getDistrict($state_id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $life_district = $this->table_prefix . "life_district";
        $query = "SELECT District_Id, District_Name FROM $life_district WHERE District_State_Ref_Id='$state_id' order by District_Name";
        $result = $this->selectData($query, "Error on slecting district id 23456");
        $i = 0;
        while ($row = mysql_fetch_array($result)) {
            $arr["detail$i"]['district_id'] = $row['District_Id'];
            $arr["detail$i"]['district_name'] = $row['District_Name'];
            $i++;
        }
        return $arr;
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

    public function getStateID($state_name) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $life_state = $this->table_prefix . "life_state";
        $grpsql = "select State_Id from $life_state WHERE  State_Name='$state_name'";
        $grpres = $this->selectData($grpsql);
        $row = mysql_fetch_array($grpres);
        $State_id = $row['State_Id'];
        return $State_id;
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
        //echo"<br/>upin qry>>>>" . $this->db->last_query();
        return $result;
    }

    public function getLevel($id) {
        $user_level = '';
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

        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $tran_password = $this->table_prefix . "tran_password";

        $qr = "SELECT * FROM $tran_password WHERE tran_password='$randum_id'";
        $res = $this->selectData($qr, "Error on selecting passcode.");
        if (!mysql_num_rows($res))
            return $key;
        else
            $this->getRandTransPasscode($length);
    }
   

    public function insertToUnilevelTree($regr,$unilevel_arr) {
         
     
        $data = array(
            'id' => $regr['userid'],
            'user_name' => $regr['username'],
            'father_id' => $regr['referral_id'],
            'order_id' => $unilevel_arr['order_id'],
            'active' => 'yes',
            'position' => $unilevel_arr['position'],
            'product_id' => $regr['prodcut_id'],
            'user_level' => $unilevel_arr['user_level'],
            'date_of_joining' => $regr['joining_date']
        );
        $res = $this->db->insert('ft_individual_unilevel', $data);
        return $res;
    }

}