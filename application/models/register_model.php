<?php

require_once 'Inf_Model.php';
require_once 'validation.php';
require_once 'product_model.php';
require_once 'configuration_model.php';

class register_model extends Inf_Model {

    public $obj_vali;
    public $table_prefix;
    public $active;
    private $mailObj;
    public $obj_product;
    public $obj_config;

    public function __construct() {
        parent::__construct();
        require_once 'validation.php';
        $this->obj_vali = new Validation();
        $this->obj_product = new product_model();
        $this->obj_config = new configuration_model();

        require_once 'Phpmailer.php';
        $this->mailObj = new PHPMailer();
    }

    public function validateRegisterData($regr, $module_status) {

        $product_status = $module_status['product_status'];
        $pin_status = $module_status['pin_status'];

        $username = $regr['username'];
        $position = $regr['position'];
        $fatherid = $regr['fatherid'];
        if ($product_status == 'yes') {
            $product_id = $regr['prodcut_id'];
        }


        $flag = true;

        //for pin avail
        if ($this->obj_vali->isUserNameAvailable($username)) {
            $flag = false;
            $this->rollBack();
            $msg = $this->lang->line('user_name_not_available');
            $this->redirect_out($msg, 'register/user_register');
        } else
        if (!$this->obj_vali->isLegAvailable($fatherid, $position)) { // User already registered
            $flag = false;
            $this->rollBack();
            $msg = $this->lang->line('user_already_registered');
        
            $this->redirect_out($msg, 'register/user_register');
        }
        if ($product_status == 'yes') {

            if (!$this->obj_product->isProductAvailable($product_id)) {
                $flag = false;
                $this->rollBack();
                $msg = $this->lang->line('product_not_available');
                $this->redirect_out($msg, 'register/user_register');
            }
        }
        return $flag;
    }

    public function viewProducts() {
        $product_array = $this->obj_product->getAllProducts('yes');
        $products = '';
        $lang_product = $this->lang->line('select_product');
//        $products = "<option value='' >$lang_product</option>";
        for ($i = 0; $i < count($product_array); $i++) {
            $id = $product_array["$i"]["product_id"];
            $product_name = $product_array["$i"]["product_name"];
            $product_value = $product_array["$i"]["product_value"];
            $products.="<option value='$id' >$product_name - $$product_value</option>";
        }
        return $products;
    }

    public function viewState($country_id, $lang_id = '', $option = '') {
        $state = NULL;
        $this->db->select('State_Id,');
        $this->db->select('State_Name');
        $this->db->where('country_id', $country_id);
        $this->db->order_by('State_Name');
        $this->db->from('life_state');
        $query = $this->db->get();
        if ($option == '') {
            $state = "<option value='' selected='selected'>Select State</option>";
        } else {
            $state = "<option value='' selected='selected'>$option</option>";
        }
        $i = 0;
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $State_Id = $row['State_Id'];
                $State_Name = $row['State_Name'];

                if ($option != $State_Name) {
                    $state .= "<option value='$State_Id'>$State_Name</option>";
                }
            }
        } else {
            $state .= "<option value='0'>--None--</option>";
        }
        return $state;
    }
    
    public function viewState_of_canada($lang_id = '', $option = 'Québec') {
        $state = NULL;
        $canada_state_id = 38;
        $this->db->select('State_Id,');
        $this->db->select('State_Name');
        $this->db->where('country_id', $canada_state_id);
        $this->db->order_by('State_Name');
        $this->db->from('life_state');
        $query = $this->db->get();
        if ($option == '') {
            $state = "<option value='' selected='selected'>Select State</option>";
        } else {
            $state = "<option value='' selected='selected'>$option</option>";
        }
        $i = 0;
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $State_Id = $row['State_Id'];
                $State_Name = $row['State_Name'];

                if ($option != $State_Name) {
                    $state .= "<option value='$State_Id'>$State_Name</option>";
                }
            }
        } else {
            $state .= "<option value='0'>--None--</option>";
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
        $arr = array();
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
        $State_Name = NULL;
        $this->db->select('State_Name');
        $this->db->from('life_state');
        $this->db->where('State_Id', $state_id);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $State_Name = $row->State_Name;
        }

        return $State_Name;
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

    public function checkPassCode($prodcutpin, $prodcutid = "") {
        require_once 'product_model.php';


        $obj_product = new product_model();
        $prodcutpin = mysql_real_escape_string($prodcutpin);
        if ($obj_product->isProductPinAvailable($prodcutid, $prodcutpin))
            return $obj_product->isPasscodeAvailable($prodcutpin);
    }

    public function getfatherid($fid) {
        $this->db->select('id');
        $this->db->from('ft_individual');
        $this->db->where('user_name', $fid);
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            if ($row->active == "server") {
                return $sponsor_id;
            } else {
                $placement = $this->getPlacement($row->id, $position);
                return $placement;
            }
        }
    }

    public function checkSponser($sponser_full_name, $user_id) {

        require_once 'validation.php';
        $obj_val = new Validation();
        $flag = false;

        $sponser_full_name = mysql_real_escape_string($sponser_full_name);
        $sponser_user_name = mysql_real_escape_string($user_id);

        $sponser_user_id = $obj_val->userNameToID($sponser_user_name);
        $sponser_full_name = $obj_val->getUserFullName($sponser_user_id);

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

    public function getPlacement($sponsor_id, $position) {
        $this->db->select('id');
        $this->db->select('active');
        $this->db->from('ft_individual');
        $this->db->where('father_id', $sponsor_id);
        $this->db->where('position', $position);
        //$this->db->order_by('position');
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            if ($row->active == "server") {
                return $sponsor_id;
            } else {
                $placement = $this->getPlacement($row->id, $position);
                return $placement;
            }
        }
    }

    public function getPlacementunilevel($sponsor_id) {
        $placement_details = array();
        $this->db->select("id");
        $this->db->select("position");
        $this->db->from("ft_individual_unilevel");
        $this->db->where('father_id', $sponsor_id);
        $this->db->where('active !=', 'server');
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
            $placement_details['id'] = $row['id'];
            $placement_details['position'] = $row['position'];
        }
        return $placement_details;
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
    
    public function confirmRegister($regr, $module_status) { 
        $this->load->model('configuration_model');
        $this->load->model('registersubmit');

        $reg = new registersubmit();

        $max_nod_id = $reg->getMaxOrderID();

        $next_order_id = $max_nod_id + 1;

        if ($regr['user_name_type'] == 'dynamic') {

            $regr['username'] = $reg->getUsername();
        } else {
            $regr['username'] = $regr['user_name_entry'];
        }

        $regr['fatherid'] = $reg->obj_vali->userNameToID($regr['fatherid']);

        $regr['referral_id'] = $reg->obj_vali->userNameToID($regr['referral_name']);


        if ($regr['state'] != "") {
            $regr['state'] = $reg->getStateName($this->input->post('state'));
        }
        if ($this->validateRegisterData($regr, $module_status)) {

            $child_node = $reg->obj_vali->getChildNodeId($regr['fatherid'], $regr['position']);

            $updt_login_res = $res_login_update = $reg->updateLoginUser($regr['username'], md5($regr['pswd']), $child_node);

            if ($res_login_update) {

                $user_level = $reg->getLevel($regr['fatherid']) + 1;

                $updt_ft_res = $res_ftindi_update = $reg->updateFTIndividual($regr['fatherid'], $regr['position'], $regr['username'], $child_node, $next_order_id, $regr['by_using'], $user_level, $regr['prodcut_id']);

                if ($res_ftindi_update) {

                    $last_insert_id = $reg->obj_vali->userNameToID($regr['username']);
//echo "......vvv";die();
                    $pin_status = $module_status['pin_status'];
                    $pin_status;

                    $regr['userid'] = $last_insert_id;

                    $updt_ft_uni = $reg->insertToUnilevelTree($regr);
                    $insert_user_det_res = $res = $reg->insertUserDetails($regr);
                    $id = $insert_tmp1_res = $res1 = $reg->tmpInsert($last_insert_id, 'L');
                    $insert_tmp2_res = $res1 = $reg->tmpInsert($last_insert_id, 'R');
                }
            }

            $rank_status = $module_status['rank_status'];
            $product_status = $module_status['product_status'];
            $first_pair = $module_status['first_pair'];
            $referal_status = $module_status['referal_status'];
            $balance_amount = 0;

            if ($product_status == "yes" && $first_pair == "1:1") {
                require_once 'Calculation11Product.php';
            } else if ($product_status == "no" && $first_pair == "1:1") {
                require_once 'Calculation11WithOutProduct.php';
            } else if ($product_status == "yes" && $first_pair == "2:1") {
                require_once 'Calculation21Product.php';
            } else if ($product_status == "no" && $first_pair == "2:1") {
                require_once 'Calculation21WithOutProduct.php';
            }
            $obj_calc = new Calculation();
 
            if ($rank_status == "yes") {

                $referal_count = $reg->obj_vali->getReferalCount($regr['referral_id']);
                $old_rank = $reg->obj_vali->getUserRank($regr['referral_id']);
                $regr['rank'] = $reg->obj_vali->getCurrentRankFromRankConfig($referal_count);
                $new_rank = $regr['rank'];

                $this->updateUserRank($regr['referral_id'], $new_rank);
 

                if ($old_rank != $new_rank) {

                    $rank_bonuss = array();
                    $rank_bonuss = $this->configuration_model->getAllRankDetails($new_rank);
                    $this->insertIntoRankHistory($old_rank, $regr['rank'], $regr['referral_id']);

                    $date_of_sub = date("Y-m-d H:i:s");
                    $amount_type = "rank_bonus";
                    //$level = $this->getUserLevel($regr['referral_id']);
                    $obj_arr = $this->getSettings();
                    $tds_db = $obj_arr["tds"];
                    $service_charge_db = $obj_arr["service_charge"];

                    $rank_amount = $rank_bonuss[0]['rank_bonus'];
                    $tds_amount = ($rank_amount * $tds_db) / 100;

                    $service_charge = ($rank_amount * $service_charge_db) / 100;

                    $amount_payable = $rank_amount - ($tds_amount + $service_charge);

                    $obj_calc->insertInToLegAmount($regr['referral_id'], 0, 0, 0, $rank_amount, $amount_payable, $tds_amount, $service_charge, $date_of_sub, $amount_type);
                }
            }

            $product_status = $module_status['product_status'];

            $first_pair = $module_status['first_pair'];

            $referal_status = $module_status['referal_status'];

            
            if ($referal_status == "yes") {
                $referal_amount = $this->getReferalAmount();
                $referal_id = $obj_calc->getReferalId($last_insert_id);
                if ($referal_amount > 0) {
                    $raferal_amount = ($balance_amount + $referal_amount)*$regr['quantity'];
                    $ref_amt = $obj_calc->insertReferalAmount($referal_id, $raferal_amount, $regr['userid']);
                }
            }


                if ($product_status == "yes") {

                    if ($first_pair == "2:1") {

                        require_once 'Calculation21Product.php';
                        $obj_calc = new Calculation();
                        $obj_calc->calculateLegCount($regr['userid'], $regr['fatherid'], $regr['prodcut_id'], $regr['position'], $regr['userid']);
                        
                    } else {

                        require_once 'Calculation11Product.php';
                        $obj_calc = new Calculation();
                        $obj_calc->calculateLegCount($regr['userid'], $regr['fatherid'], $regr['prodcut_id'], $regr['position'], $regr['userid'],$regr['quantity']);

                    }
                } else {

                    if ($first_pair == "2:1") {

                        require_once 'Calculation21WithOutProduct.php';
                        $obj_calc = new Calculation();
                        $obj_calc->calculateLegCount($regr['userid'], $regr['fatherid'], $regr['position'], $regr['userid']);
                        
                    } else {

                        require_once 'Calculation11WithOutProduct.php';
                        $obj_calc = new Calculation();
                        $obj_calc->calculateLegCount($regr['userid'], $regr['fatherid'], $regr['position'], $regr['referral_id'], $regr['userid']);
                        
                    }
                }

            $level_count = $this->getLevelCount();

            if ($level_count > 0) {
                if ($module_status['sponsor_commission_status'] == 'yes')
                    $obj_calc->calculateLevelCommission($regr['userid'], $referal_id, $regr['prodcut_id']);
            }
            
            if (($updt_ft_res) && ($updt_login_res) && ($insert_user_det_res) && ($insert_tmp1_res) && ($insert_tmp2_res)) { 
                $mobile = $regr['mobile'];
                $username = $regr['username'];
                $password = $regr['pswd'];
                $full_name = $regr['full_name'];
                $trans_password = $this->getTransPassword($regr['userid']);
                
                $site_info = $this->obj_config->getSiteConfiguration();
                $site_name = $site_info['co_name'];
                $site_logo = $site_info['logo'];
                $base_url = base_url();
                

                $tran_code = $reg->getRandTransPasscode(8);
                $reg->savePassCodes($last_insert_id, $tran_code);

                if (($regr['email'] != "") && ($regr['email'] != null)) {
                    
                    $reg_mail = $this->checkMailStatus();
                    if ($reg_mail['reg_mail_status'] == 'yes') {
                        $email = $regr['email'];
                        
                        if($this->session->userdata('tran_language') == 'french'){
                            $mail_content = $this->obj_vali->getMailBody(2);
                        }else if($this->session->userdata('tran_language') == 'english'){
                            $mail_content = $this->obj_vali->getMailBody(1);
                            
                        }
                        $subject = "$site_name" . $this->lang->line('register_notification');
                        $mailBodyDetails = '<html xmlns="https://www.w3.org/1999/xhtml">
                                                <head>
                                                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                                    
                                                    <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
                                                    <style>
 
                                                                margin:0px;
                                                                padding:0px;
                                                          
                                                    </style>

                                                </head>

                                                <body>
                                                    <div style="width:80%;padding:40px;border: solid 10px #D0D0D0;margin:50px auto;">
                                                      <div style="min-height: 62px;border: solid 1px #d0d0d0;background: url(' . $base_url . 'public_html/images/head-bg.png) no-repeat center center;padding: 0px!important;">
                                                       <img src="' . $base_url . 'public_html/images/logos/' . $site_logo . '" alt="logo" style="width: 114px;margin-top: 10px;margin-left: 10px;"/>  
                                                      </div>
                                                      <div style="width:100%;margin:15px 0 0 0;">
                                                        <h1 style="font: normal 20px Tahoma, Geneva, sans-serif;">'.$this->lang->line('dear').' <font color="#e10000">' . $full_name . ',</font></h1>
                                                       <p style="font: normal 12px Tahoma, Geneva, sans-serif;text-align:justify;color:#212121;line-height:23px;">' . $mail_content . '</p>
                                                        
                                                        <div style="width:400px;height:225px;margin:16px auto;background:url(' . $base_url . 'public_html/images/page.png);border: solid 1px #d0d0d0;border-radius: 10px;">
                                                          <h2 style="color:#C70716;font:normal 16px Tahoma, Geneva, sans-serif;line-height:34px;background:url(' . $base_url . 'public_html/images/login-icons.png) center left no-repeat;background-size: 35px 35px;margin:10px 0 0 22px;float:left;padding-left: 54px;">LOGIN DETAILS</h2>
                                                          <div style="clear:both;"></div>
                                                          <ul style="display:block;margin:14px 0 0 0;float:left;">
                                                            <li style="list-style:none;font:normal 15px Tahoma, Geneva, sans-serif;color:#212121;margin:5px 0 0 20px;border:1px solid #ccc;background:#fff;width:300px;padding:5px;"><span style="width:150px;float:left;">Login Link</span><font color="#025BB9"> : <a href="http://infinitemlmsoftware.com/soft/binary/login/index/user/' . $username . '" target="_blank">Click Here</a></font></li>
                                                            <li style="list-style:none;font:normal 15px Tahoma, Geneva, sans-serif;color:#212121;margin:5px 0 0 20px;border:1px solid #ccc;background:#fff;width:300px;padding:5px;"><span style="width:150px;float:left;">Your UserName</span><font color="#e10000"> : ' . $username . '</font></li>
                                                            <li style="list-style:none;font:normal 15px Tahoma, Geneva, sans-serif;color:#212121;margin:5px 0 0 20px;border:1px solid #ccc;background:#fff;width:300px;padding:5px;"><span style="width:150px;float:left;">Your Password</span><font color="#e10000"> : ' . $password . '</font></li>
                                                          </ul>
                                                        </div>
                                                      </div>

                                                    </div>
                                                </body>
                                            </html>';
                        
                        

                        $this->obj_vali->sendEmail($mailBodyDetails, $last_insert_id, $subject);
                    }
                }



                $reg->insertBalanceAmount($regr['userid']);
                $encr_id = $this->session->userdata('user_id');
                $encr_id = $this->getEncrypt($encr_id);


                $msg['user'] = $username;
                $msg['pwd'] = $password;
                $msg['id'] = $encr_id;
                $msg['status'] = true;
                $msg['tran'] = $tran_code;
                return $msg;
            } else {
                $reg->rollBack();
                $encr_id = $this->session->userdata('user_id');
                $encr_id = $this->getEncrypt($encr_id);


                $msg['user'] = "";
                $msg['pwd'] = "";
                $msg['id'] = "";
                $msg['status'] = false;
                $msg['tran'] = "";
                return $msg;
            }
        }
    }

    public function confirmRegisterNew($regr, $module_status) {
        $this->load->model('configuration_model');
        $this->load->model('registersubmit');

        $reg = new registersubmit();

        $max_nod_id = $reg->getMaxOrderID();

        $next_order_id = $max_nod_id + 1;

        if ($regr['user_name_type'] == 'dynamic') {

            $regr['username'] = $reg->getUsername();
        } else {
            $regr['username'] = $regr['user_name_entry'];
        }

        $regr['fatherid'] = $reg->obj_vali->userNameToID($regr['fatherid']);

        $regr['referral_id'] = $reg->obj_vali->userNameToID($regr['referral_name']);


        if ($regr['state'] != "") {
            $regr['state'] = $reg->getStateName($this->input->post('state'));
        }
        if ($this->validateRegisterData($regr, $module_status)) {

            $child_node = $reg->obj_vali->getChildNodeId($regr['fatherid'], $regr['position']);
                

            $updt_login_res = $res_login_update = $reg->updateLoginUser($regr['username'], md5($regr['pswd']), $child_node);
             

            if ($res_login_update) {

                $user_level = $reg->getLevel($regr['fatherid']) + 1;

                $updt_ft_res = $res_ftindi_update = $reg->updateFTIndividual($regr['fatherid'], $regr['position'], $regr['username'], $child_node, $next_order_id, $regr['by_using'], $user_level, $regr['prodcut_id']);

                if ($res_ftindi_update) {

                    $last_insert_id = $reg->obj_vali->userNameToID($regr['username']);
//echo "......vvv";die();
                    $pin_status = $module_status['pin_status'];
                    $pin_status;

                    $regr['userid'] = $last_insert_id;

                    $updt_ft_uni = $reg->insertToUnilevelTree($regr);
                    $insert_user_det_res = $res = $reg->insertUserDetails($regr);
                    $id = $insert_tmp1_res = $res1 = $reg->tmpInsert($last_insert_id, 'L');
                    $insert_tmp2_res = $res1 = $reg->tmpInsert($last_insert_id, 'R');
                }
            }

            $rank_status = $module_status['rank_status'];
            $product_status = $module_status['product_status'];
            $first_pair = $module_status['first_pair'];
            $referal_status = $module_status['referal_status'];
            $balance_amount = 0;

            if ($product_status == "yes" && $first_pair == "1:1") {
                require_once 'Calculation11Product.php';
            } else if ($product_status == "no" && $first_pair == "1:1") {
                require_once 'Calculation11WithOutProduct.php';
            } else if ($product_status == "yes" && $first_pair == "2:1") {
                require_once 'Calculation21Product.php';
            } else if ($product_status == "no" && $first_pair == "2:1") {
                require_once 'Calculation21WithOutProduct.php';
            }
            $obj_calc = new Calculation();

            if ($rank_status == "yes") {

                $referal_count = $reg->obj_vali->getReferalCount($regr['referral_id']);
                $old_rank = $reg->obj_vali->getUserRank($regr['referral_id']);
                $regr['rank'] = $reg->obj_vali->getCurrentRankFromRankConfig($referal_count);
                $new_rank = $regr['rank'];

                $this->updateUserRank($regr['referral_id'], $new_rank);
 

                if ($old_rank != $new_rank) {

                    $rank_bonuss = array();
                    $rank_bonuss = $this->configuration_model->getAllRankDetails($new_rank);
                    $this->insertIntoRankHistory($old_rank, $regr['rank'], $regr['referral_id']);

                    $date_of_sub = date("Y-m-d H:i:s");
                    $amount_type = "rank_bonus";
                    //$level = $this->getUserLevel($regr['referral_id']);
                    $obj_arr = $this->getSettings();
                    $tds_db = $obj_arr["tds"];
                    $service_charge_db = $obj_arr["service_charge"];

                    $rank_amount = $rank_bonuss[0]['rank_bonus'];
                    $tds_amount = ($rank_amount * $tds_db) / 100;

                    $service_charge = ($rank_amount * $service_charge_db) / 100;

                    $amount_payable = $rank_amount - ($tds_amount + $service_charge);

                    $obj_calc->insertInToLegAmount($regr['referral_id'], 0, 0, 0, $rank_amount, $amount_payable, $tds_amount, $service_charge, $date_of_sub, $amount_type);
                }
            }

            $product_status = $module_status['product_status'];

            $first_pair = $module_status['first_pair'];

            $referal_status = $module_status['referal_status'];

            
            if ($referal_status == "yes") {
                $referal_amount = $this->getReferalAmount();
                $referal_id = $obj_calc->getReferalId($last_insert_id);
                if ($referal_amount > 0) {
                    $raferal_amount = ($balance_amount + $referal_amount)*$regr['quantity'];
                    $ref_amt = $obj_calc->insertReferalAmount($referal_id, $raferal_amount, $regr['userid']);
                }
            }


                if ($product_status == "yes") {

                    if ($first_pair == "2:1") {

                        require_once 'Calculation21Product.php';
                        $obj_calc = new Calculation();
                        $obj_calc->calculateLegCount($regr['userid'], $regr['fatherid'], $regr['prodcut_id'], $regr['position'], $regr['userid']);
                        
                    } else {

                        require_once 'Calculation11Product.php';
                        $obj_calc = new Calculation();
                        $obj_calc->calculateLegCount($regr['userid'], $regr['fatherid'], $regr['prodcut_id'], $regr['position'], $regr['userid'],$regr['quantity']);

                    }
                } else {

                    if ($first_pair == "2:1") {

                        require_once 'Calculation21WithOutProduct.php';
                        $obj_calc = new Calculation();
                        $obj_calc->calculateLegCount($regr['userid'], $regr['fatherid'], $regr['position'], $regr['userid']);
                        
                    } else {

                        require_once 'Calculation11WithOutProduct.php';
                        $obj_calc = new Calculation();
                        $obj_calc->calculateLegCount($regr['userid'], $regr['fatherid'], $regr['position'], $regr['referral_id'], $regr['userid']);
                        
                    }
                }

            $level_count = $this->getLevelCount();

            if ($level_count > 0) {
                if ($module_status['sponsor_commission_status'] == 'yes')
                    $obj_calc->calculateLevelCommission($regr['userid'], $referal_id, $regr['prodcut_id']);
            }
         
            if (($updt_ft_res) && ($updt_login_res) && ($insert_user_det_res) && ($insert_tmp1_res) && ($insert_tmp2_res)) {
                $mobile = $regr['mobile'];
                $username = $regr['username'];
                $password = $regr['pswd'];
                $full_name = $regr['full_name'];

                $site_info = $this->obj_config->getSiteConfiguration();
                $site_name = $site_info['co_name'];
                $site_logo = $site_info['logo'];
                $base_url = base_url();

                $tran_code = $reg->getRandTransPasscode(8);
                $reg->savePassCodes($last_insert_id, $tran_code);

                if (($regr['email'] != "") && ($regr['email'] != null)) {
                    $reg_mail = $this->checkMailStatus();
                    if ($reg_mail['reg_mail_status'] == 'yes') {
                        $email = $regr['email'];

                        $mail_content = $this->obj_vali->getMailBody();

                        $subject = "$site_name Registration Notification";
                        $mailBodyDetails = '<html xmlns="https://www.w3.org/1999/xhtml">
                                                <head>
                                                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                                    
                                                    <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
                                                    <style>
 
                                                                margin:0px;
                                                                padding:0px;
                                                          
                                                    </style>

                                                </head>

                                                <body>
                                                    <div style="width:80%;padding:40px;border: solid 10px #D0D0D0;margin:50px auto;">
                                                      <div style="min-height: 62px;border: solid 1px #d0d0d0;background: url(' . $base_url . 'public_html/images/head-bg.png) no-repeat center center;padding: 0px!important;">
                                                       <img src="' . $base_url . 'public_html/images/logos/' . $site_logo . '" alt="logo" style="width: 114px;margin-top: 10px;margin-left: 10px;"/>  
                                                      </div>
                                                      <div style="width:100%;margin:15px 0 0 0;">
                                                        <h1 style="font: normal 20px Tahoma, Geneva, sans-serif;">Dear <font color="#e10000">' . $full_name . ',</font></h1>
                                                       <p style="font: normal 12px Tahoma, Geneva, sans-serif;text-align:justify;color:#212121;line-height:23px;">' . $mail_content . '</p>
                                                        
                                                        <div style="width:400px;height:225px;margin:16px auto;background:url(' . $base_url . 'public_html/images/page.png);border: solid 1px #d0d0d0;border-radius: 10px;">
                                                          <h2 style="color:#C70716;font:normal 16px Tahoma, Geneva, sans-serif;line-height:34px;background:url(' . $base_url . 'public_html/images/login-icons.png) center left no-repeat;background-size: 35px 35px;margin:10px 0 0 22px;float:left;padding-left: 54px;">LOGIN DETAILS</h2>
                                                          <div style="clear:both;"></div>
                                                          <ul style="display:block;margin:14px 0 0 0;float:left;">
                                                            <li style="list-style:none;font:normal 15px Tahoma, Geneva, sans-serif;color:#212121;margin:5px 0 0 20px;border:1px solid #ccc;background:#fff;width:300px;padding:5px;"><span style="width:150px;float:left;">Login Link</span><font color="#025BB9"> : <a href="http://infinitemlmsoftware.com/soft/binary/login/index/user/' . $username . '" target="_blank">Click Here</a></font></li>
                                                            <li style="list-style:none;font:normal 15px Tahoma, Geneva, sans-serif;color:#212121;margin:5px 0 0 20px;border:1px solid #ccc;background:#fff;width:300px;padding:5px;"><span style="width:150px;float:left;">Your UserName</span><font color="#e10000"> : ' . $username . '</font></li>
                                                            <li style="list-style:none;font:normal 15px Tahoma, Geneva, sans-serif;color:#212121;margin:5px 0 0 20px;border:1px solid #ccc;background:#fff;width:300px;padding:5px;"><span style="width:150px;float:left;">Your Password</span><font color="#e10000"> : ' . $password . '</font></li>
                                                          </ul>
                                                        </div>
                                                      </div>

                                                    </div>
                                                </body>
                                            </html>';

                        $this->obj_vali->sendEmail($mailBodyDetails, $last_insert_id, $subject);
                    }
                }



                $reg->insertBalanceAmount($regr['userid']);
                $encr_id = $this->session->userdata('user_id');
                $encr_id = $this->getEncrypt($encr_id);


                $msg['user'] = $username;
                $msg['pwd'] = $password;
                $msg['id'] = $encr_id;
                $msg['status'] = true;
                $msg['tran'] = $tran_code; 
                //if($using=='exact'){
                	$user = $msg['user'];
		        $pass = $msg['pwd'];
		        $tran_code = $msg['tran'];
                	$product_status = $module_status['product_status'];
                	
	            	$payment_method = 'e-xact';
	        	$user_id = $this->userNameToID($user);
	        	if ($product_status == "yes") {
	        			        		
	            		$insert_into_sales = $this->insertIntoSalesOrder($user_id, $regr['prodcut_id'],$payment_method,$regr['quantity'], $regr['x_trans_id'], "register");
	            		//$this->insertExactHistory($regr);
	            		 
	            		
            			$reg->commit();
            			
        	}
                //}
                return $msg;
            } else {
                $reg->rollBack();
                $encr_id = $this->session->userdata('user_id');
                $encr_id = $this->getEncrypt($encr_id);


                $msg['user'] = "";
                $msg['pwd'] = "";
                $msg['id'] = "";
                $msg['status'] = false;
                $msg['tran'] = "";
                
                return $msg;
            }if ($msg['status']) {
             	//mail('yazirpp@gmail.com','commit',  ' starting' );//unc 
            	//$reg->commit();
            	//mail('yazirpp@gmail.com','commit',  ' ending' );//unc 
            }
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

    /*     * **************** edited on 2/3/2011 starts ***jishma*************** */

    public function getReferalAmount() {
        $referal_amount = "";
        $this->db->select('referal_amount');
        $this->db->from('configuration');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $referal_amount = $row->referal_amount;
        }
        return $referal_amount;
    }

    /*     * **************** edited on 2/3/2011 ends ***jishma*************** */

    public function isUserAvailable($user_name) {
        if(!$this->checkAdminAvalability($user_name)){
            return false;
        }else{
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
    }

    public function getTermsConditions($lang_id = '') {
        $this->db->select('terms_conditions');
        $this->db->from("terms_conditions");
        if ($lang_id != '')
            $this->db->where("lang_ref_id", $lang_id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $terms_con = $row->terms_conditions;
        }
        return stripslashes($terms_con);
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
        $user_id = NULL;
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
        $arr = array();

        $this->db->select('*');
        $this->db->from('user_details');
        $this->db->where('user_detail_refid', $uid);
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $arr = $row;
        }
        return $this->replaceNullFromArray($arr, "NA");
    }

    public function replaceNullFromArray($user_detail, $replace = '') {

        if ($replace == '') {
            $replace = "NA";
        }

        $len = count($user_detail);
        //echo "<br>length---" . $len;
        $key_up_arr = array_keys($user_detail);

        for ($i = 0; $i < $len; $i++) {

            $key_field = $key_up_arr[$i];
            //echo "<br>$i---" . $key_field;
            if ($user_detail["$key_field"] == "") {
                $user_detail["$key_field"] = $replace;
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
        $product = array();
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
        $user_detail_name = NULL;
        $this->db->select('user_detail_name');
        $this->db->from('user_details');
        $this->db->where('user_detail_refid', $user_id);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $user_detail_name = $row->user_detail_name;
        }
        return $user_detail_name;
    }

    function userNameToID($user_name) {
        return $this->obj_vali->userNameToID($user_name);
    }

    function IdToUserName($user_id) {
        return $this->obj_vali->IdToUserName($user_id);
    }

    public function viewCountry($lang_id = "") {
        $default_country_name = 'Canada';
        $default_country_id = '38';
        
        $country_detail = NULL;
        $this->db->select('*');
        $this->db->from('country_all');
        $this->db->order_by('country_name', 'ASC');
        $query = $this->db->get();
        $i = 0;
        $country_detail .= "<option value='" . $default_country_id . "'>" . $default_country_name . "</option>";
        foreach ($query->result_array() as $row) {
            $country_detail .= "<option value='" . $row['country_id'] . "'>" . $row['country_name'] . "</option>";
        }
        
        return $country_detail;
    }

    public function insertIntoRankHistory($old_rank, $new_rank, $ref_id) {
        $date = date('Y-m-d H:i:s');
        $this->db->set('user_id', $ref_id);
        $this->db->set('current_rank', $old_rank);
        $this->db->set('new_rank', $new_rank);
        $this->db->set('date', $date);
        $res = $this->db->insert('rank_history');
        return $res;
    }

    public function updateUserRank($id, $rank) {
        $this->db->set('user_rank_id', $rank);
        $this->db->where('id', $id);
        $result = $this->db->update('ft_individual');
        return $result;
    }

    public function getAllUnreadMessages($type, $user_id) {
        //code added by jiji ----06/02/2013
        if ($type == "admin")
            $mail = 'mailtoadmin';
        else
            $mail = 'mailtouser';

        $this->db->select('*');
        if ($type != "admin")
            $this->db->where('mailtoususer', $user_id);
        $this->db->where('status', 'yes');
        $this->db->where('read_msg', 'no');
        $this->db->from($mail);

        $count = $this->db->count_all_results();
        return $count;
    }

    public function getUnreadMessages($type, $user_id) {
        //code added by Niyas ----28/03/2014
        $result = array();
        if ($type == "admin") {
            $tbl = 'mailtoadmin';
            $this->db->select('*');
            $this->db->where('status', 'yes');
            $this->db->where('read_msg', 'no');
            $this->db->from($tbl);
            $res = $this->db->get();
            $i = 0;
            foreach ($res->result_array() as $row) {
                $result[$i] = $row;
                $result[$i]['username'] = $this->obj_vali->IdToUserName($row['mailaduser']);
                $result[$i]['image'] = $this->getPic($user_id);
                $i++;
            }
            return $result;
        } else {

            $tbl = 'mailtouser';
            $this->db->select('*');
            $this->db->where('status', 'yes');
            $this->db->where('read_msg', 'no');
            $this->db->where('mailtoususer', $user_id);
            $this->db->from($tbl);
            $res = $this->db->get();
            $i = 0;
            foreach ($res->result_array() as $row) {
                $result[$i] = $row;
                $result[$i]['username'] = 'Admin';
                $result[$i]['image'] = $this->getPic($user_id);
                $i++;
            }
            return $result;
        }
    }

    public function getPic($user_id) {
        $image = array();
        $this->db->select('user_photo');
        $this->db->from('user_details');
        $this->db->where('user_detail_refid', $user_id);
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            $img = $row->user_photo;
        }
        return $img;
    }

    public function checkMailStatus() {
        $stat = NULL;
        $this->db->select('from_name');
        $this->db->select('reg_mail_status');
        $this->db->from('mail_settings');
        $this->db->where('id', 1);
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
            $stat = $row;
        }
        return $stat;
    }

    //==============added on 30/4/2014
                     
    public function insertIntoSalesOrder($user_id, $prod_id, $payment_method = "",$quantity=1, $tran_id='', $type = '') {
        $date = date('Y-m-d H:i:s');
        $last_inserted_id = $this->db->insert_id();
        $invoice_no = 1000 + $last_inserted_id;
        $product_details = $this->getProduct($prod_id);
        $amount = $product_details['product_value'];

	$this->db->set('trans_id', $tran_id);
        $this->db->set('invoice_no', $invoice_no);
        
        $this->db->set('prod_id', $prod_id);
        $this->db->set('user_id', $user_id);
        $this->db->set('amount', $amount);
        $this->db->set('quantity', $quantity);
        $this->db->set('date_submission', $date);
        $this->db->set('payment_method', $payment_method);
        $this->db->set('type', $type);
        $res = $this->db->insert('sales_order');
        return $res;
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
    }

    public function getEpin($epin) {
        $epin_arr = array();
        $date = date('Y-m-d');
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

    //___________________
    public function getCountryTelephoneCode($country_id) {
        $this->db->select('phone_code')->where('country_id', $country_id)->limit(1)->from('country_all');
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            return $row->phone_code;
        }
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

    public function getprdctAmount($p_id) {
        $prct_amount = NULL;
        $prct_amount = $this->obj_product->getProduct($p_id);
        return $prct_amount;
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

    public function updateUsedEwallet($ewallet_user, $ewallet_bal, $up_bal = '') {
        if ($up_bal == '') {
            $user_id = $this->obj_vali->userNameToID($ewallet_user);
        } else {
            $user_id = $ewallet_user;
        }
        $this->db->set('balance_amount', $ewallet_bal);
        $this->db->where('user_id', $user_id);
        $result = $this->db->update('user_balance_amount');
        return $result;
    }

    public function getPaymentGatewayStatus() {

        $details ['paypal_status'] = $this->getGatewayStatus('Paypal');
        $details ['creditcard_status'] = $this->getGatewayStatus('Creditcard');
        $details ['epdq_status'] = $this->getGatewayStatus('EPDQ');
        $details ['authorize_status'] = $this->getGatewayStatus('Authorize.net');
        $details ['e_xact_status'] = $this->getGatewayStatus('E-xact');

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

    public function getPrdocut($p_id) {
        return $this->obj_product->getPrdocutName($p_id);
    }

    public function getBalanceAmount($user_id) {
        $amount = 0;
        $this->db->select('balance_amount');
        $this->db->from('user_balance_amount');
        $this->db->where('user_id', $user_id);
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            $amount = $row->balance_amount;
        }
        return $amount;
    }

    public function updateBalanceAmount($balance_amount, $user_id) {
        $this->db->set('balance_amount', $balance_amount);
        $this->db->where('user_id', $user_id);
        $result = $this->db->update('user_balance_amount');
        return $result;
    }

    public function generateOrderid($name, $type) {
        $order_id = null;
        $date = date('Y-m-d H:i:s');
        $this->db->set('firstname', $name);
        $this->db->set('status', $type);
        $this->db->set('date_added', $date);
        $res = $this->db->insert('epdq_payment_order');
        $order_id = $this->db->insert_id();
        return $order_id;
    }

    public function redirect_out($msg, $page, $message_type = false) {
        //redirection for the registration as it needs not the admin/user in url redirect function is modified 
        $MSG_ARR = array();
        $MSG_ARR["MESSAGE"]["DETAIL"] = $msg;
        $MSG_ARR["MESSAGE"]["TYPE"] = $message_type;
        $MSG_ARR["MESSAGE"]["STATUS"] = true;

        $this->session->set_flashdata('MSG_ARR', $MSG_ARR);
        redirect($page, 'refresh');
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

    public function getAuthorizeDetails() {
        return $this->obj_config->getAuthorizeConfigDetails();
    }

    public function getLevelCount() {
        $this->db->select('*');
        $this->db->from('level_commision');
        $res = $this->db->get();
        return $res->num_rows();
    }

    public function getSettings() {
        $obj_arr = array();
        $this->db->select("*");
        $this->db->from("configuration");
        $res = $this->db->get();

        foreach ($res->result_array() as $row) {
            $obj_arr["id"] = $row['id'];
            $obj_arr["tds"] = $row['tds'];
            $obj_arr["pair_price"] = $row['pair_price'];
            $obj_arr["pair_ceiling"] = $row['pair_ceiling'];
            $obj_arr["service_charge"] = $row['service_charge'];
            $obj_arr["product_point_value"] = $row['product_point_value'];
            $obj_arr["pair_value"] = $row['pair_value'];
            $obj_arr["startDate"] = $row['start_date'];
            $obj_arr["endDate"] = $row['end_date'];
            $obj_arr["sms_status"] = $row['sms_status'];
            $obj_arr["payout_release"] = $row['payout_release'];
            $obj_arr["referal_amount"] = $row['referal_amount'];
            $obj_arr["percentorflatlvlcomsn"] = $row['percentorflatlvlcomsn'];
            $obj_arr["percentorflat"] = $row['percentorflat'];
            $obj_arr["depth_ceiling"] = $row['depth_ceiling'];
        }


        return $obj_arr;
    }
    
    public function tempRegister($username, $email){
        $this->db->set('username', $username);
        $this->db->set('email', $email);
        $this->db->insert('temp_register');
    }
    
    public function temporaryRegister($regr){
        $this->db->set('username', $username);
        $this->db->set('user_name_type', $username);
        $this->db->set('user_name_entry', $username);
        $this->db->set('fatherid', $username);
        $this->db->set('referral_name', $username);
        $this->db->set('state', $username);
        $this->db->set('position', $username);
        $this->db->set('by_using', $username);
        $this->db->set('username', $username);
        $this->db->set('username', $username);
        $this->db->set('username', $username);
        $this->db->set('username', $username);
        $this->db->set('username', $username);
        $this->db->set('username', $username);
        $this->db->set('username', $username);
    }
    
    public function insertExactHistory($regr){
    	//echo '<pre>';
        //print_r($regr);die();echo '</pre>';
   	$date = date('Y-m-d H:i:s');
    	//$user_id = $this->getUidFromUsername($regr['user_name_entry']);
    	
        //$this->db->set('user_id', $user_id);
        $this->db->set('date', $date);
        $this->db->set('transaction_id', $regr['x_trans_id']);
        $this->db->set('transaction_approved', $regr['Transaction_Approved']);
        $this->db->set('response_text', serialize($regr));
        
        $result = $this->db->insert('exact_payment_history');
        
        return $result;
    }
    
    public function getAdminUserName() {
        $this->db->select('user_name');
        $this->db->where('user_type', 'admin');
        $res = $this->db->get('login_user');
        foreach ($res->result() as $row) {

            $username = $row->user_name;
        }

        return $username;
    }
    
    public function getTransPassword($user_id){
        $user_id = '';
        $this->db->select('tran_password');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tran_password', 1);
        if($query->num_rows > 0){
            foreach ($query->result() as $row) {
                $user_id = $row->tran_password;
            }
        }
        return $user_id;
    }
    
    public function getUserLanguage($user_id){
        $lang_code = '';
        $this->db->select('lang_code');
        $this->db->from('languages');
        $this->db->join('login_user', 'login_user.default_lang = languages.lang_id');
        $this->db->where('login_user.user_id', $user_id);
        $query = $this->db->get();
        if($query->num_rows > 0){
            foreach ($query->result() as $row) {
                $lang_code = $row->lang_code;
            }
        }
        return $lang_code;
    }
    
    public function getTranPassword($user_name){
        $tran_pass = '';
        $this->db->select('tran_password');
        $this->db->from('tran_password');
        $this->db->join('ft_individual', 'ft_individual.id = tran_password.user_id');
        $this->db->where('ft_individual.user_name', $user_name);
        $query = $this->db->get();
        if($query->num_rows > 0){
            foreach ($query->result() as $row) {
                $tran_pass = $row->tran_password;
            }
        }
        return $tran_pass;
    }
    
    public function getProductAmount($product_id){
        $product_amount = 0;
        $this->db->select('product_value');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('product');
        foreach ($query->result() as $row){
            $product_amount = $row->product_value;
        }
        return $product_amount;
    }
    
    public function checkAdminAvalability($user_name){
        if($this->checkUserType($user_name) == 'admin' && $this->checkSponsorCount($user_name) >= 1){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    public function checkUserType($username){
        $user_type = '';
        $this->db->select('user_type');
        $this->db->from('login_user');
        $this->db->where('user_name', $username);
        $query = $this->db->get();
        foreach ($query->result() as $row){
            $user_type = $row->user_type;
        }
        return $user_type;
    }
    
    public function checkSponsorCount($user_name){
        $user_id = $this->getUidFromUsername($user_name);
        $this->db->select('COUNT(*) as total');
        $this->db->from('ft_individual_unilevel');
        $this->db->where('father_id', $user_id);
        $query = $this->db->get();
        foreach ($query->result() as $row){
            return $row->total;
        }
    }
    
    public function getPinAmount($pin_number) {
        $amount = 0;
        $this->db->select('pin_balance_amount');
        $this->db->where('pin_numbers', $pin_number);
        $res = $this->db->get('pin_numbers');
        foreach ($res->result() as $row){
            $amount = $row->pin_balance_amount;
        }
        return $amount;
    }

}
