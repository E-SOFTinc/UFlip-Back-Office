<?php

require_once 'Inf_Model.php';
require_once 'validation.php';
require_once 'product_model.php';
require_once 'configuration_model.php';

class register_board_model extends Inf_Model {

    public $obj_vali;
    public $table_prefix;
    public $active;
    private $mailObj;
    public $obj_product;
    public $obj_config;
    public $obj_autofilling;

    public function __construct() {

        parent::__construct();
        require_once 'validation.php';
        $this->obj_vali = new Validation();
        $this->obj_product = new product_model();
        $this->obj_config = new configuration_model();
        require_once 'Phpmailer.php';
        $this->mailObj = new PHPMailer();
        require_once 'AutoFillingBoard.php';
        $this->obj_autofilling = new AutoFillingBoard();
    }

    public function trackModule() {
        //Code Edited By Jiji

        $module_status_arr = array();
        $this->db->select("*");
        $this->db->from("module_status");
        $qry = $this->db->get();
        //echo $this->db->last_query();
        foreach ($qry->result_array() as $row) {
            $module_status_arr = $row;
        }

        return $module_status_arr;
    }

    public function confirmRegister($regr, $module_status) {

        /* print_r($regr);
          die(); */

        $this->load->model('board_registersubmit');

        $reg = new board_registersubmit();

        $max_nod_id = $reg->getMaxOrderID();

        $next_order_id = $max_nod_id + 1;

        if ($regr['user_name_type'] == 'dynamic') {

            $regr['username'] = $reg->getUsername();
        } else {
            $regr['username'] = $regr['user_name_entry'];
        }

        $regr['fatherid'] = $reg->obj_vali->userNameToID($regr['fatherid']);
        // echo  $regr['fatherid'];die();


        $regr['referral_id'] = $reg->obj_vali->userNameToID($regr['referral_name']);

        if ($this->validateRegisterData($regr, $module_status)) {

            $child_node = $reg->obj_vali->getChildNodeId($regr['fatherid'], $regr['position']);

            $reg->begin();

            $updt_login_res = $res_login_update = $reg->updateLoginUser($regr['username'], md5($regr['pswd']), $child_node);


            if ($res_login_update) {

                $user_level = $reg->getLevel($regr['fatherid']) + 1;


                $updt_ft_res = $res_ftindi_update = $reg->updateFTIndividual($regr['fatherid'], $regr['position'], $regr['username'], $child_node, $next_order_id, $regr['by_using'], $user_level, $regr['prodcut_id']);


                if ($res_ftindi_update) {

                    $last_insert_id = $reg->obj_vali->userNameToID($regr['username']);

                    $pin_status = $module_status['pin_status'];
                    $pin_status;

//                    if ($pin_status == "yes") {
//
//                        $updt_pin_status_res = $pin_upd_res = $reg->updatePinNumber($regr['passcode'], $regr['username']);
//                    }

                    $regr['userid'] = $last_insert_id;
                    $unilevel_arr['order_id'] = $next_order_id;
                    $unilevel_arr['position'] = $regr['position'];
                    $unilevel_arr['user_level'] = $user_level;
                    $updt_ft_uni = $reg->insertToUnilevelTree($regr, $unilevel_arr);

                    $insert_user_det_res = $reg->insertUserDetails($regr, $unilevel_arr);


                    $insert_tmp1_res = $reg->tmpInsert($last_insert_id, '1');

                    $new_position = $reg->getNewPositionOfUser($last_insert_id) + 1;


                    $insert_tmp2_res = $reg->tmpInsert($regr['fatherid'], $new_position);
                }
            }

            $board_no = 1;
            $user_name_for_board_split = $regr['username'];
            $active = "yes";
            $auto_goc_table_name_next = "auto_board_";
            $shuffle_status = $module_status['shuffle_status'];
            $shuffle_status . $this->obj_autofilling->addBoard($last_insert_id, $user_name_for_board_split, $active, $auto_goc_table_name_next, $board_no, $shuffle_status, "", $regr['referral_id']);


            $referal_amount = 0;
            $boardno = '';
            $amount_type = 'referal';

            $referal_status = $module_status['referal_status'];

            if ($referal_status == "yes")
                $referal_amount = $this->getReferalAmount();

            $referal_id = $this->obj_autofilling->getReferalId($last_insert_id);

            if ($referal_amount > 0)
                $this->obj_autofilling->insertAmount($referal_id, $boardno, $amount_type, $referal_amount);



//            $leadership_bonus = $this->getLeaderShipBonus();
//            $leadership_users = $this->getLeaderShipUsers($child_node);
//            for ($i = 0; $i < count($leadership_users); $i++) {
//                $leader_bonus = $leadership_bonus["leader$i"];
//                $leader_user = $leadership_users[$i];
//                $this->obj_autofilling->insertLeaderShipBonus($leader_user, $boardno, 'leadership_bonus', $leader_bonus, $child_node);
//            }

            if (($updt_ft_res) && ($updt_login_res) && ($insert_user_det_res) && ($insert_tmp1_res) && ($insert_tmp2_res)) {

               
                $mobile = $regr['mobile'];
                $username = $regr['username'];
                $password = $regr['pswd'];
                //$mobid = $regr['mobid'];

                $tran_code = $reg->getRandTransPasscode(8);
                //$tran_code = $password;
                $reg->savePassCodes($last_insert_id, $tran_code);

                if (($regr['email'] != "") && ($regr['email'] != null)) {
                    $mailBodyDetails = '<html>
                      <head>
                      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                      </head>
                      <body >
                      <table id="Table_01" width="700"   border="0" cellpadding="0" cellspacing="0">
                      <tr><td colspan="2">
                      <table width="400"   border="0" cellpadding="0" cellspacing="0">
                      <tr><td colspan="2"><b>Account Details</b></td></tr>
                      <tr><td>Username :</td><td><b>' . $username . '</b></td></tr>
                      <tr><td>Password :</td><td><b>' . $password . '</b></td></tr>
                      <tr><td>Transaction Passcode :</td><td><b>' . $tran_code . '</b></td></tr>
                      </table>
                      </td></tr>
                      <tr><td colspan="2" >Welcome ' . $username . ',<br />Your account has successfully registered.
                      </td></tr>
                      <tr><td colspan="2">Regards,<br />In</td></tr>
                      <tr><td colspan="2">www.ventures99.com</td></tr>
                      </table>
                      </body></html>';
                    $this->sendEmail($mailBodyDetails, $regr['email']);
                }

                $reg->insertBalanceAmount($regr['userid']);
                $encript_id = $this->session->userdata('user_id');
                $encr_id = $this->getEncrypt($encript_id);

                 $reg->commit();
                $msg['user'] = $username;
                $msg['pwd'] = $password;
                $msg['id'] = $encr_id;
                $msg['status'] = true;
                $msg['tran'] = $tran_code;
                return $msg;
            } else {
                $reg->rollBack();
                $encript_id = $this->session->userdata('user_id');
                $encr_id = $this->getEncrypt($encript_id);


                $msg['user'] = "";
                $msg['pwd'] = "";
                $msg['id'] = "";
                $msg['status'] = false;
                $msg['tran'] = "";
                return $msg;
            }
        }
    }

    public function validateRegisterData($regr, $module_status) {

        $product_status = $module_status['product_status'];

        $pin_status = $module_status['pin_status'];



        $username = $regr['username'];
        $position = $regr['position'];
        //$passcode = $regr['passcode'];
        $fatherid = $regr['fatherid'];
        $product_id = $regr['prodcut_id'];


        $flag = true;

        //for pin avail
        if ($this->isUserNameAvailable($username)) {
            $flag = false;
            echo "<script>alert('Error on registration. User already registered.')</script>";
            echo "<script>document.location.href='../admin/home'</script>";
        } else
        if (!$this->isLegAvailable($fatherid, $position, $module_status)) { // User already registered
            $flag = false;
            echo "<script>alert('Error on registration. User already registered in this position')</script>";
            echo "<script>document.location.href='../admin/home'</script>";
        } else
        if ($product_status == 'yes') {

            if (!$this->obj_product->isProductAvailable($product_id)) {
                $flag = false;
                echo "<script>alert('Error on registration ,Product not Available')</script>";
                echo "<script>document.location.href='../admin/home'</script>";
            }
        }


        return $flag;
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

    public function viewProducts() {


        $product_array = $this->obj_product->getAllProducts('yes');
        $products = "<option value='' selected='selected'>Select Product</option>";
        for ($i = 0; $i < count($product_array); $i++) {
            $id = $product_array["$i"]["product_id"];
            $product_name = $product_array["$i"]["product_name"];
            $products.="<option value='$id' >$product_name</option>";
        }
        return $products;
    }

    public function viewState($option = '') {

        $this->db->select('State_Id,');
        $this->db->select('State_Name');
        $this->db->order_by('State_Name');
        $this->db->from('life_state');
        $query = $this->db->get();

        if ($option == '') {
            $state = "<option value='' selected='selected'>Select State</option>";
        } else {
            $state = "<option value='$option' selected='selected'>$option</option>";
        }

        $i = 0;
        foreach ($query->result_array() as $row) {


            $State_Id = $row['State_Id'];
            $State_Name = $row['State_Name'];

            if ($option != $State_Name) {
                $state .= "<option value='$State_Id'>$State_Name</option>";
            }
        }

        return $state;
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

        $this->db->select('District_Id,District_Name');
        $this->db->where('District_State_Ref_Id', $state_id);
        $this->db->from("life_district");
        $this->db->order_by('District_Name');
        $query = $this->db->get();

        $i = 0;
        foreach ($query->result_array() as $row) {
            $arr["detail$i"]['district_id'] = $row['District_Id'];
            $arr["detail$i"]['district_name'] = $row['District_Name'];
            $i++;
        }

        return $arr;
    }

    public function getStateName($state_id) {


        $this->db->select('State_Name');
        $this->db->from('life_state');
        $this->db->where('State_Id', $state_id);
        $query = $this->db->get();


        foreach ($query->result() as $row) {
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

    public function getLevel($id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $ft_individual = $this->table_prefix . "ft_individual";
        $qr = "SELECT user_level FROM $ft_individual where id =$id";

        $grpres = $this->selectData($qr, "Invalid select 1111");
        $row = mysql_fetch_array($grpres);
        $user_level = $row['user_level'];
        return $user_level;
    }

    public function isProductAdded() {

        $flag = "no";

        $this->db->select("COUNT(*) AS cnt");
        $this->db->from("product");
        $qr = $this->db->get();

        foreach ($qr->result() as $row) {
            $count = $row->cnt;
        }

        if ($count > 0)
            $flag = "yes";

        return $flag;
    }

    public function isPinAdded() {
        $flag = "no";

        $this->db->select("COUNT(*) AS cnt");
        $this->db->from("pin_numbers");
        $qr = $this->db->get();

        foreach ($qr->result() as $row) {
            $count = $row->cnt;
        }

        if ($count > 0)
            $flag = "yes";

        return $flag;
    }

    public function checkPassCode($prodcutpin, $prodcutid) {
        require_once 'product_model.php';


        $this->obj_product = new product_model();
        $prodcutpin = mysql_real_escape_string($prodcutpin);
        if ($this->obj_product->isProductPinAvailable($prodcutid, $prodcutpin))
            return $this->obj_product->isPasscodeAvailable($prodcutpin);
    }

    public function checkSponser($sponser_full_name, $user_id) {

        require_once 'validation.php';
        $obj_val = new Validation();
        $flag = false;

        $sponser_full_name = mysql_real_escape_string($sponser_full_name);
        $sponser_user_name = mysql_real_escape_string($user_id);

        $sponser_user_id = $obj_val->userNameToID($sponser_user_name);

        if ($sponser_user_id > 0) {


            $this->db->select("COUNT(*) AS cnt");
            $this->db->from("user_details");
            $this->db->where('user_detail_refid', $sponser_user_id);
            $this->db->where('user_detail_name', $sponser_full_name);
            $qr = $this->db->get();
            foreach ($qr->result() as $row) {
                $count = $row->cnt;
            }

            if ($count > 0) {
                $flag = true;
            }
        }
        return $flag;
    }

    public function checkLeg($sponserleg, $sponser_user_name) {
        require_once 'validation.php';
        $obj_val = new Validation();
        $sponserleg = mysql_real_escape_string($sponserleg);
        $sponser_user_name = mysql_real_escape_string($sponser_user_name);
        $sponserid = $obj_val->userNameToID($sponser_user_name);
        return $obj_val->isLegAvailable($sponserid, $sponserleg);
    }

    public function checkUser($user_name) {
        $flag = TRUE;

        if ($user_name == "") {
            $flag = FALSE;
            return $flag;
        }

        $this->db->select("COUNT(*) AS cnt");
        $this->db->from("ft_individual");
        $this->db->where('user_name', $user_name);

        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $count = $row->cnt;
        }
        if ($count > 0) {
            $flag = FALSE;
        }
        return $flag;
    }

    public function getNextPosition($user_id) {

        $this->db->select_min('position');
        $this->db->from('ft_individual');
        $this->db->where('father_id', $user_id);
        $this->db->where('active', "server");
        $query = $this->db->get();
        //echo "<br/>qryy>>>" . $this->db->last_query();
        foreach ($query->result() as $row) {
            return $row->position;
        }
    }

    function getEncrypt($string) {

        $key = "EASY1055MLM!@#$";
        $result = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result.=$char;
        }
        return base64_encode($result);
    }

    public function getReferalAmount() {


        $this->db->select('referal_amount');
        $this->db->from('configuration');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $referal_amount = $row->referal_amount;
        }

        return $referal_amount;
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

    public function getTermsConditions($lang_id) {

        $this->db->select('terms_conditions');
        $this->db->from("terms_conditions");
        if ($lang_id != '')
            $this->db->where("lang_ref_id", $lang_id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {

            $terms_con = $row->terms_conditions;
        }


        return stripslashes($terms_con);
        ;
    }

    public function getLetterSetting($lang_id = '') {

        $arr = "";
        if ($lang_id != '')
            $this->db->where("lang_ref_id", $lang_id);
        $query = $this->db->get('letter_config');



        foreach ($query->result() as $row) {
            $arr['company_name'] = $row->company_name;
            $arr['address_of_company'] = $row->address_of_company;
            $arr['main_matter'] = $row->main_matter;
            $arr['logo'] = $row->logo;
            $arr['productmatter'] = $row->productmatter;
            $arr['place'] = $row->place;
        }


        return $arr;
    }

    public function getUidFromUsername($uname) {

        $user_id = "";
        $this->db->select('user_id');
        $this->db->from('login_user');
        $this->db->where('user_name', $uname);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_id = $row->user_id;
        }
        return $user_id;
    }

    public function getUserDetails($uid) {

        $this->db->select('*');
        $this->db->from('user_details');
        $this->db->where('user_detail_refid', $uid);
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $arr[] = $row;
        }
        return $this->replaceNullFromArray($arr);
    }

    public function replaceNullFromArray($user_detail, $replace = '') {
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

    public function getFatherName($uid) {

        $this->db->select('*');
        $this->db->from('ft_individual');
        $this->db->where('id', $uid);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            return $row;
        }
    }

    public function getFname($fid) {
        $fnam = "";

        $this->db->select('user_name');
        $this->db->from('login_user');
        $this->db->where('user_id', $fid);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $fnam = $row->user_name;
        }

        return $fnam;
    }

    public function getProduct($prdtid) {

        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_id', $prdtid);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $product['product_id'] = $row->product_id;
            $product['product_name'] = $row->product_name;
            $product['active'] = $row->active;
            $product['product_value'] = $row->product_value;
            $product['prod_bv'] = $row->prod_bv;
            $product['pair_value'] = $row->pair_value;
        }
        return $product;
    }

    public function getReferralName($user_id) {


        $user_detail_name = "";

        $this->db->select('user_detail_name');
        $this->db->from('user_details');
        $this->db->where('user_detail_refid', $user_id);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $user_detail_name = $row->user_detail_name;
        }

        return $user_detail_name;
    }

    public function sendEmail($mailBodyDetails, $email) {
        $this->mailObj->From = "info@infinitemlmsoftware.com";
        $this->mailObj->FromName = "Infinitemlmsoftware.com";
        $this->mailObj->Subject = "Infinitemlmsoftware Notification";
        $this->mailObj->IsHTML(true);

        $this->mailObj->ClearAddresses();
        $this->mailObj->AddAddress($email);


        $this->mailObj->Body = $mailBodyDetails;
        $res = $this->mailObj->send();
        $arr["send_mail"] = $res;
        if (!$res)
            $arr['error_info'] = $this->mailObj->ErrorInfo;
        return $arr;
    }

    public function getWidthCieling() {

        $obj_arr = $this->getSettings();
        $width_cieling = $obj_arr["width_cieling"];
        return $width_cieling;
    }

    public function getSettings() {
        $obj_arr = array();
        $this->db->select("*");
        $this->db->from("configuration");
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
            $obj_arr["id"] = $row['id'];
            $obj_arr["tds"] = $row['tds'];
            $obj_arr["percentorvalue"] = $row['percentorvalue'];
            $obj_arr["service_charge"] = $row['service_charge'];
            $obj_arr["width_cieling"] = $row['width_cieling'];
            $obj_arr["depth_cieling"] = $row['depth_cieling'];
            $obj_arr["startDate"] = $row['start_date'];
            $obj_arr["endDate"] = $row['end_date'];
            $obj_arr["sms_status"] = $row['sms_status'];
            $obj_arr["payout_release"] = $row['payout_release'];
            $obj_arr["reg_amount"] = $row['reg_amount'];
            $obj_arr["referal_amount"] = $row['referal_amount'];
        }

        return $obj_arr;
    }

    public function isLegAvailable($sponserid, $sponserleg, $module_status) {
        $flag = 0;
        $mlm_plan = $module_status['mlm_plan'];

        if ($mlm_plan == "Matrix") {

            $width_cieling = $this->getWidthCieling();
        }


        $this->db->select("COUNT(*) AS cnt");
        $this->db->from("ft_individual");
        $this->db->where('father_id', $sponserid);
        $this->db->where('position', $sponserleg);
        $this->db->where('active', 'yes');
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $count = $row->cnt;
        }
        //echo $this->db->last_query();

        if ($sponserid == "") {

            $flag = 0;
        } if ($mlm_plan == "Matrix") {
            if ($count > $width_cieling) {
                $flag = 0;
            }
        } else if ($count > 0) {
            $flag = 0;
        }

        $sponser = $this->IdToUserName($sponserid);
        $user = $this->isUserAvailable($sponser);
        if (!$user) {
            $flag = 0;
        } else {
            $flag = 1;
        }


        return $flag;
    }

    public function isUserNameAvailable($user_name) {


        $flag = 0;

        $this->db->select("COUNT(*) AS cnt");
        $this->db->from("ft_individual");
        $this->db->where('user_name', $user_name);
        $this->db->where('active !=', 'server');
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $count = $row->cnt;
        }

        if ($count > 0) {
            $flag = 1;
        }

        return $flag;
    }

    public function IdToUserName($user_id) {

        $user_name = "";

        $this->db->select('user_name');
        $this->db->from('ft_individual');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_name = $row->user_name;
        }

        return $user_name;
    }

    public function viewCountry($lang_id) {
//        $country_detail = array();
//        if ($country_code == "") {
//            $this->db->select('*');
//            $this->db->order_by('country_id', 'ASC');
//        } else {
//            $this->db->select('*');
//            $this->db->where('country_code', $country_code);
//        }
//
//        $this->db->where("lang_ref_id", $lang_id);
//        $this->db->from('country_all');
//        $query = $this->db->get();
        $country_detail = "";
        $this->db->select('*');
        $this->db->order_by('country_name', 'ASC');
        $this->db->where("lang_ref_id", $lang_id);
        $this->db->from('country_all');
        $query = $this->db->get();
        $i = 0;
        foreach ($query->result_array() as $row) {

            $country_detail .= "<option value='" . $row['country_id'] . "'>" . $row['country_name'] . "</option>";
        }
        //echo $this->db->last_query();
        return $country_detail;
    }

    public function getFatherIDBoard($user_id, $board_no) {
        $father_username = '';
        $board_name = "auto_board_" . $board_no;
        $qry = "SELECT father_id FROM $board_name WHERE  user_ref_id='$user_id'";
        $res = $this->db->query($qry);

        foreach ($res->result() AS $row) {
            $father_id = $row->father_id;
            $father_username = $this->obj_vali->IdToUserNameBoard($father_id);
        }
        return $father_username;
    }

    public function getPrdocut($p_id) {

        return $this->obj_product->getPrdocutName($p_id);
    }

    public function getPaymentGatewayStatus() {

        $details ['paypal_status'] = $this->getGatewayStatus('Paypal');
        $details ['creditcard_status'] = $this->getGatewayStatus('Creditcard');
        $details ['epdq_status'] = $this->getGatewayStatus('EPDQ');
        $details ['authorize_status'] = $this->getGatewayStatus('Authorize.net');

        return $details;
    }

    public function getGatewayStatus($gateway) {
        $this->db->select('status');
        $this->db->like('gateway_name', $gateway);
        $this->db->from("payment_gateway_config");
        $this->db->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {

            return $row->status;
        }
    }

    public function getPaymentStatus($type) {
        $this->db->select('status');
        $this->db->like('payment_type', $type);
        $this->db->from("payment_methods");
        $this->db->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {

            return $row->status;
        }
    }

    public function getPaymentModuleStatus() {

        $details = array();
        $details ['gateway_type'] = $this->getPaymentStatus('Payment Gateway');
        $details ['epin_type'] = $this->getPaymentStatus('E-pin');
        $details ['free_joining_type'] = $this->getPaymentStatus('Free Joining');
        $details ['ewallet_type'] = $this->getPaymentStatus('E-wallet');
        return $details;
    }

    public function countryNameFromID($country_id) {
        $this->db->select('country_name');
        $this->db->from('country_all');
        $this->db->where('country_id', $country_id);
        $res = $this->db->get();
        foreach ($res->result() as $row)
            return $row->country_name;
    }

    public function getprdctAmount($p_id) {
        $prct_amount = NULL;
        $prct_amount = $this->obj_product->getProduct($p_id);
        return $prct_amount;
    }

    public function getRegisterAmount() {
        $amount = NULL;
        $this->db->select('reg_amount');
        $this->db->from('configuration');
        $res = $this->db->get();
        foreach ($res->result() as $row) {

            $amount = $row->reg_amount;
        }

        return $amount;
    }

    public function userNameToID($username) {

        return $this->obj_vali->userNameToID($username);
    }

    public function balanceAmount($user_id, $balance = '') {
        $user_balance = NULL;
        $this->db->select('balance_amount');
        $this->db->select('user_id');
        $this->db->where('user_id', $user_id);
        if ($balance != '')
            $this->db->where('balance_amount >', $balance);
        $this->db->from('user_balance_amount');
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {

            $user_balance = $row['balance_amount'];
        }
        return $user_balance;
    }

    public function ewalletPassword($user_id, $password) {
        $flag = "no";
        $this->db->select("COUNT(*) AS cnt");
        $this->db->where('user_id', $user_id);
        $this->db->where('tran_password', $password);
        $this->db->from('tran_password');
        $qr = $this->db->get();

        foreach ($qr->result() as $row) {
            $count = $row->cnt;
        }

        if ($count > 0)
            $flag = "yes";
        return $flag;
    }

    public function insertCredicardDetails($credit_card) {
        $data = array(
            'ecom_user_id' => $credit_card['user_id'],
            'credit_card_number' => $credit_card['card_no'],
            'credit_card_type' => $credit_card['credit_card_type'],
            'credit_date' => $credit_card['card_expiry_date'],
            'credit_invoice_number' => $credit_card['card_veri_no'],
            'credit_user_forename' => $credit_card['card_forename'],
            'credit_user_surname' => $credit_card['card_surename'],
            'credit_email' => $credit_card['card_email'],
            'mobile_no' => $credit_card['card_phone'],
        );

        $res = $this->db->insert('credit_card_purchase_details', $data);
        return $res;
    }

    public function insertintoPaymenDetails($payment_details) {

        $data = array(
            'type' => $payment_details['payment_method'],
            'user_id' => $payment_details['user_id'],
            'acceptance' => $payment_details['acceptance'],
            'payer_id' => $payment_details['payer_id'],
            'order_id' => $payment_details['token_id'],
            'amount' => $payment_details['amount'],
            'currency' => $payment_details['currency'],
            'status' => $payment_details['status'],
            'card_number' => $payment_details['card_number'],
            'ED' => $payment_details['ED'],
            'card_holder_name' => $payment_details['card_holder_name'],
            'date_of_submission' => $payment_details['submit_date'],
            'pay_id' => $payment_details['pay_id'],
            'error_status' => $payment_details['error_status'],
            'brand' => $payment_details['brand']
        );
        $res = $this->db->insert('payment_registration_details', $data);
        return $res;
    }

    public function insertUsedPin($epin_det, $arr_length) {
        $user_id = $this->obj_vali->userNameToID($epin_det['user']);
        $date = date('Y-m-d H:m:s');
        for ($i = 0; $i < $arr_length; $i++) {
            $pin_no = $epin_det[$i . 'pin'];
            $pin_balnce = $epin_det[$i . 'bal_amount'];
            $pin_amount = $epin_det[$i . 'pin_amount'];
            if ($pin_balnce == 0)
                $this->db->set('status', 'no');
            else
                $this->db->set('status', 'yes');
            $this->db->set('pin_number', $pin_no);
            $this->db->set('used_user', $user_id);
            $this->db->set('pin_alloc_date', $date);
            $this->db->set('pin_amount', $pin_amount);
            $this->db->set('pin_balance_amount', $pin_balnce);
            $res = $this->db->insert('pin_used');
        }
        return $res;
    }

    public function UpdateUsedEpin($pin_det, $arr_length) {
        $user_id = $this->obj_vali->userNameToID($pin_det['user']);
        $date = date('Y-m-d H:m:s');
        for ($i = 0; $i < $arr_length; $i++) {
            $pin_no = $pin_det[$i . 'pin'];
            $pin_balnce = $pin_det[$i . 'bal_amount'];
            if ($pin_balnce == 0)
                $this->db->set('status', 'no');
            else
                $this->db->set('status', 'yes');
            $this->db->set('pin_alloc_date', $date);
            $this->db->set('used_user', $user_id);
            $this->db->set('pin_balance_amount', $pin_balnce);
            $this->db->where('pin_numbers', $pin_no);
            $result = $this->db->update('pin_numbers');
        }
        return $result;
    }

    public function insertUsedEwallet($ref_user, $user, $used_amount) {
        $date = date('Y-m-d H:i:s');


        $user_id = $this->obj_vali->userNameToID($user);
        $user_ref_id = $this->obj_vali->userNameToID($ref_user);
        $this->db->set('used_user_id', $user_ref_id);
        $this->db->set('used_amount', $used_amount);
        $this->db->set('user_id', $user_id);
        $this->db->set('used_for', 'registration');
        $this->db->set('date', $date);
        $res1 = $this->db->insert('live_account_registration_details');

        return $res1;
    }

    public function updateUsedEwallet($ewallet_user, $reg_user, $ewallet_bal) {

        $user_id = $this->obj_vali->userNameToID($reg_user);
        $this->db->set('balance_amount', 0);
        $this->db->where('user_id', $user_id);
        $result = $this->db->update('user_balance_amount');
        if ($result && $ewallet_user != "") {
            $ewallet_user_id = $this->obj_vali->userNameToID($ewallet_user);
            $this->deductUserBalanceAmount($ewallet_user_id, $ewallet_bal);
            return $result;
        }
    }

    public function deductUserBalanceAmount($to_userid, $amount) {
        $this->db->set('balance_amount', 'balance_amount - ' . $amount, FALSE);
        $this->db->where('user_id', $to_userid);
        $res = $this->db->update('user_balance_amount');
        return $res;
    }

    public function getEpin($epin) {
        $epin_arr = array();
        $date = date('Y-m-d H:m:s');
        $this->db->select('pin_numbers,pin_balance_amount');
        $this->db->from('pin_numbers');
        $this->db->where('pin_numbers', $epin);
        $this->db->where('status', "yes");
        //$this->db->where('allocated_user_id', "NA");
        $this->db->where("pin_expiry_date >=", $date);
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
            $epin_arr["pin_numbers"] = $row['pin_numbers'];
            $epin_arr["pin_amount"] = $row['pin_balance_amount'];
        }
        return $epin_arr;
    }

    public function generateOrderid($name, $type) {
        $order_id = null;
        $date = date('Y-m-d H:i:s');
        $this->db->set('firstname', $name);
        $this->db->set('status', $type);
        $this->db->set('date_added', $date);
        $res = $this->db->insert('order');
        $order_id = $this->db->insert_id();
        return $order_id;
    }

    public function getAuthorizeDetails() {
        return $this->obj_config->getAuthorizeConfigDetails();
    }

    public function authorizePay($api_login_id, $transaction_key, $amount, $fp_sequence, $fp_timestamp) {
        require_once 'anet_php_sdk/AuthorizeNet.php';
        $fingerprint = AuthorizeNetSIM_Form::getFingerprint($api_login_id, $transaction_key, $amount, $fp_sequence, $fp_timestamp);
        return $fingerprint;
    }

    public function insertAuthorizeNetPayment($response, $user_id) {

        $date = date('Y-m-d H:i:s');

        $this->db->set('user_id', $user_id);
        $this->db->set('first_name', $response['x_first_name']);
        $this->db->set('last_name', $response['x_last_name']);
        $this->db->set('company', $response['x_company']);
        $this->db->set('address', $response['x_address']);
        $this->db->set('city', $response['x_city']);
        $this->db->set('state', $response['x_state']);
        $this->db->set('zip', $response['x_zip']);
        $this->db->set('country', $response['x_country']);
        $this->db->set('phone', $response['x_phone']);
        $this->db->set('fax', $response['x_fax']);
        $this->db->set('email', $response['x_email']);
        $this->db->set('date', $date);
        $this->db->set('invoice_num', $response['x_invoice_num']);
        $this->db->set('description', $response['x_description']);
        $this->db->set('cust_id', $response['x_cust_id']);
        $this->db->set('ship_to_first_name', $response['x_ship_to_first_name']);
        $this->db->set('ship_to_last_name', $response['x_ship_to_last_name']);
        $this->db->set('ship_to_company', $response['x_ship_to_company']);
        $this->db->set('ship_to_address', $response['x_ship_to_address']);
        $this->db->set('ship_to_city', $response['x_ship_to_city']);
        $this->db->set('ship_to_state', $response['x_ship_to_state']);
        $this->db->set('ship_to_zip', $response['x_ship_to_zip']);
        $this->db->set('ship_to_country', $response['x_ship_to_country']);
        $this->db->set('amount', $response['x_amount']);
        $this->db->set('tax', $response['x_tax']);
        $this->db->set('duty', $response['x_duty']);
        $this->db->set('freight', $response['x_freight']);
        $this->db->set('auth_code', $response['x_auth_code']);
        $this->db->set('trans_id', $response['x_trans_id']);
        $this->db->set('method', $response['x_method']);
        $this->db->set('card_type', $response['x_card_type']);
        $this->db->set('account_number', $response['x_account_number']);
        $res = $this->db->insert('authorize_payment_details');

        return $res;
    }

}

?>
