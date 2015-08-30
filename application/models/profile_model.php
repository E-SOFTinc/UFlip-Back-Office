<?php

require_once 'Inf_Model.php';

class profile_model extends Inf_Model {

    public $fileup;
    private $OBJ_VALI;
    private $OBJ_REG;
    private $obj_mem;

    // private $OBJ_TOOLTIP;
    public function __construct() {
        parent::__construct();
        require_once 'registersubmit.php';

        $this->OBJ_REG = new registersubmit();

        require_once 'validation.php';
        $this->OBJ_VALI = new Validation();

        require_once 'FileUpload.php';
        $this->fileup = new FileUpload();

        require_once 'member_model.php';
        $this->obj_mem = new member_model();
    }

////////////////////////
    public function userNameToId($user_name) {

        $user_id = $this->OBJ_VALI->userNameToID($user_name);
        return $user_id;
    }

    public function getStateName($state_id) {

        ////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////      CODE ADDED BY JIJI     /////////////////////////////////
        //to get statename from state id

        $this->db->select('State_Name');
        $this->db->from('life_state');
        $this->db->where('State_Id', $state_id);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row->State_Name;
        }
    }

/////////////////////////code edited vaisakh on 9th jan
    public function getProfileDetails($user_id, $u_name, $product_status, $lang_id = '', $table_prefix = "") {
        $this->db->select('*');
        $this->db->from($table_prefix . 'user_details AS u');
        $this->db->join($table_prefix . 'ft_individual AS f', 'u.user_detail_refid = f.id', 'INNER');
        $this->db->where('user_detail_refid', $user_id);
        $result = $this->db->get();
        $qr = $this->db->last_query();
        $profile_arr['details'] = $this->getUserDetails($qr, $lang_id, $table_prefix);
        $profile_arr['sponser'] = $this->OBJ_VALI->getSponserIdName($user_id, $table_prefix);

        if ($product_status == "yes") {
            $profile_arr['product_name'] = $this->OBJ_VALI->getProductNameFromUserID($user_id, $table_prefix);
        }
        return $profile_arr;
    }

    public function updateUserDetails($regr, $user_ref_id) {
        $res = $this->OBJ_REG->updateUserDetails($regr, $user_ref_id);
        return $res;
    }

    public function changeUsername($user_id, $uname, $new_uname) {
        $flag = false;

        $this->db->set('user_name', $new_uname);
        $this->db->where('user_id', $user_id);
        $this->db->where('user_name', $uname);
        $reg_res = $this->db->update('login_user');
        if ($reg_res) {

            $res_ft = $this->updateUsernameFtIndividual($user_id, $uname, $new_uname);
            if ($res_ft) {
                $res_his = $this->updateUsernameHistory($user_id, $uname, $new_uname);
                if ($res_his) {


                    $flag = true;
                }
            }
        }
//        }
        return $flag;
    }

    public function updateUsernameFtIndividual($user_id, $uname, $new_uname) {
        $res_unilevel = 0;
        $this->db->set('user_name', $new_uname);
        $this->db->where('id', $user_id);
        $res = $this->db->update('ft_individual');
        if ($res) {
            $this->db->set('user_name', $new_uname);
            $this->db->where('id', $user_id);
            $res_unilevel = $this->db->update('ft_individual_unilevel');
        }
        return $res_unilevel;
    }

    public function updateUsernameHistory($user_id, $uname, $new_uname) {
        $data = array(
            'user_id' => $user_id,
            'old_username' => $uname,
            'new_username' => $new_uname,
            'modified_date' => date('y-m-d H:i:s')
        );
        $res = $this->db->insert('username_change_history', $data);
        return $res;
    }

    public function getUserDetails($qr, $lang_id = '', $table_prefix = '') {

        $res1 = $this->db->query($qr);
        $i = 1;
        foreach ($res1->result_array() as $row) {
            $user_detail["detail$i"]["id"] = $row["user_detail_refid"];
            $user_detail["detail$i"]["name"] = $row["user_detail_name"];
            $user_detail["detail$i"]["address"] = $row["user_detail_address"];
            $user_detail["detail$i"]["town"] = $row["user_detail_town"];
            $user_detail["detail$i"]["position"] = $row["position"];
            $user_detail["detail$i"]["network"] = $row["default_leg"];
            $user_detail["detail$i"]["country_code"] = $row["user_detail_country"];
            $user_detail["detail$i"]["country"] = $row['user_detail_country'];
            $user_detail["detail$i"]["state"] = $row["user_detail_state"];
            $user_detail["detail$i"]["district"] = $row["user_detail_district"];
            $user_detail["detail$i"]["pincode"] = $row["user_detail_pin"];
            $user_detail["detail$i"]["passcode"] = $row["user_detail_passcode"];
            $user_detail["detail$i"]["mobile"] = $row["user_detail_mobile"];
            $user_detail["detail$i"]["land"] = $row["user_detail_land"];
            $user_detail["detail$i"]["email"] = $row["user_detail_email"];
            $user_detail["detail$i"]["dob"] = $row["user_detail_dob"];
            $user_detail["detail$i"]["gender"] = $row["user_detail_gender"];
            $user_detail["detail$i"]["nominee"] = $row["user_detail_nominee"];
            $user_detail["detail$i"]["relation"] = $row["user_detail_relation"];
            $user_detail["detail$i"]["acnumber"] = $row["user_detail_acnumber"];
            $user_detail["detail$i"]["ifsc"] = $row["user_detail_ifsc"];
            $user_detail["detail$i"]["nbank"] = $row["user_detail_nbank"];
            $user_detail["detail$i"]["nbranch"] = $row["user_detail_nbranch"];
            $user_detail["detail$i"]["pan"] = $row["user_detail_pan"];
            $user_detail["detail$i"]["level"] = $row["user_level"];
            $user_detail["detail$i"]["date"] = $row["join_date"];
            $user_detail["detail$i"]["town"] = $row["user_detail_town"];
            $user_detail["detail$i"]["referral"] = $row["user_details_ref_user_id"];
            $user_detail["detail1"]["nominee"] = $row["user_detail_nominee"];
            $user_detail["detail1"]["relation"] = $row["user_detail_relation"];
            $user_detail["detail1"]["acnumber"] = $row["user_detail_acnumber"];
            $user_detail["detail1"]["ifsc"] = $row["user_detail_ifsc"];
            $user_detail["detail1"]["nbank"] = $row["user_detail_nbank"];
            $user_detail["detail1"]["nbranch"] = $row["user_detail_nbranch"];
            $user_detail["detail1"]["pan"] = $row["user_detail_pan"];
            $user_detail["detail$i"]["facebook"] = $row["user_detail_facebook"];
            $user_detail["detail$i"]["twitter"] = $row["user_detail_twitter"];
            $i++;
        }
        $user_detail = $this->replaceNullFromArray($user_detail, "NA");
        return $user_detail;
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
            $arr_key = array_keys($user_detail["$fild"]);
            $key_len = count($arr_key);
            for ($j = 0; $j < $key_len; $j++) {
                $key_field = $arr_key[$j];
                if ($user_detail["$fild"]["$key_field"] == "") {
                    $user_detail["$fild"]["$key_field"] = $replace;
                }
            }
        }
        return $user_detail;
    }

    public function getCountryName($country_code, $lang_id = '', $table_prefix = '') {

        $this->db->select('country_name');
        $this->db->where('country_code', $country_code);

        if ($lang_id != '')
            $this->db->where('lang_ref_id', $lang_id);

        $grpres = $this->db->get($table_prefix . "country_all");

        foreach ($grpres->result() AS $row) {
            return $row->country_name;
        }
    }

    public function viewCountry($country_code, $lang_id = "") {

        //CODE ADDED BY JIJI
        $country_detail = "";

        $this->db->select('*');
        $this->db->from('country_all');
        $this->db->order_by('country_name', 'ASC');
        //$this->db->where("lang_ref_id", 1);

        $query = $this->db->get();

        $i = 0;
        foreach ($query->result_array() as $row) {

            if ($country_code == $row['country_id'])
                $country_detail .= "<option value='" . $row['country_id'] . "' selected=''>" . $row['country_name'] . "</option>";
            else
                $country_detail .= "<option value='" . $row['country_id'] . "'>" . $row['country_name'] . "</option>";
        }
        return $country_detail;
    }

    public function viewState($country_id, $option = '') {
        $this->db->select('State_Id');
        $this->db->select('State_Name');
        $this->db->order_by('State_Name', 'ASC');
        $this->db->from('life_state');
        if ($country_id != null)
            $this->db->where('country_id', $country_id);
        else
            $this->db->where('country_id', 244);
        $this->db->order_by('State_Name');
        $grpres = $this->db->get();
        if ($option == '') {
            $state = "<option value='' selected='selected'>Select State</option>";
        } else {
            $state_id = $this->getStateID($option);

            $state = "<option value='$state_id' selected='selected'>$option</option>";
        }
        foreach ($grpres->result_array() as $row) {


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
        $html_option_dt = "<select name='district'  id='district' class='form-control' tabindex='8' onChange='setHiddenValue(this.value)' >
         <option value='$district' selected='selected'>$district</options>";
        $cnt = count($arr);
        for ($i = 0; $i < $cnt; $i++) {
            $id = $arr["detail$i"]["district_id"];
            $name = $arr["detail$i"]["district_name"];
            if ($district != $name) {
                $html_option_dt .= "<option value='$name'>$name</option>";
            }
        }
        $html_option_dt .='</select>';

        return $html_option_dt;
    }

    public function getDistrict($state_id) {
        $this->db->select('District_Id');
        $this->db->select('District_Name');
        $this->db->from('life_district');
        $this->db->where('District_State_Ref_Id', $state_id);
        $this->db->order_by('District_Name');
        $result = $this->db->get();
        $i = 0;
        $arr = array();
        foreach ($result->result_array() as $row) {
            $arr["detail$i"]['district_id'] = $row['District_Id'];
            $arr["detail$i"]['district_name'] = $row['District_Name'];
            $i++;
        }
        return $arr;
    }

    public function getStateID($state_name) {
        $this->db->select('State_Id');
        $this->db->from('life_state');
        $this->db->where('State_Name', $state_name);
        $grpres = $this->db->get();
        foreach ($grpres->result() as $row) {
            return $row->State_Id;
        }
    }

    public function getUserPhoto($user_id) {
        $this->db->select('user_photo');
        $this->db->from('user_details');
        $this->db->where('user_detail_refid', $user_id);
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            return $row->user_photo;
        }
    }

////////////////////////code edited vaisakh 9th jan ends
////////////////////////code edited vaisakh 10th jan starts
    public function changeProfilePicture($user_id, $file_name) {
        $arr = array(
            'user_photo' => $file_name
        );
        $this->db->where('user_detail_refid', $user_id);
        $res = $this->db->update('user_details', $arr);
        return $res;
    }

////////////////////////code edited vaisakh 10th jan ends
    public function createThumbs($from_name, $to_name, $max_x, $max_y) {
        ini_set('memory_limit', '-1');

        // include image processing code
        include('image.class.php');
        $img = new Zubrag_image;

        // initialize
        $img->max_x = $max_x;
        $img->max_y = $max_y;

        $img->cut_x = 0;
        $img->cut_y = 0;
        $img->quality = 100;
        $img->save_to_file = true;
        $img->image_type = -1;
        $img->GenerateThumbFile($from_name, $to_name);
    }

    function getCountryID($country_name) {
        $res = $this->db->get_where('country_all', array('country_name' => $country_name));
        foreach ($res->result() as $row)
            return $row->country_id;
    }

    function getCountryNameFromID($country_id) {
        $res = $this->db->get_where('country_all', array('country_id' => $country_id));
        foreach ($res->result() as $row)
            return $row->country_name;
    }

    public function menuPresent($url) {
        $menu_id = '';
        $this->db->select("id");
        $this->db->from("infinite_mlm_menu");
        $this->db->where('link', $url);
        // $this->db->where('perm_emp', 1);
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $menu_id = $row->id;
        }
        if ($menu_id)
            return $menu_id;
        else {
            $this->db->select("sub_id");
            $this->db->from("infinite_mlm_sub_menu");
            $this->db->where('sub_link', $url);
            $qr = $this->db->get();
            foreach ($qr->result() as $row) {
                $menu_id = $row->sub_id;
                return $menu_id;
            }
        }
    }

    public function getPermittedMenus($user_id, $url) {
        $menu_id = "";
        $menu_sub_refid = "";
        $menu_id1 = "";
        $menu_id2 = "";
        $menu_id3 = "";
        $this->db->select("module_status");
        $this->db->from("login_employee");
        $this->db->where('user_id', $user_id);
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $user_menus = $row->module_status;
            //return $user_id;
        }
        $splittedstring = explode(",", $user_menus);
        $this->db->select("id");
        $this->db->from("infinite_mlm_menu");
        $this->db->where('link', $url);
        $this->db->where('perm_emp', 1);
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $menu_id = $row->id;
            //return $user_id;
        }
        if ($menu_id == null) {
            $this->db->select("sub_id");
            $this->db->select("sub_refid");
            $this->db->from("infinite_mlm_sub_menu");
            $this->db->where('sub_link', $url);
            $qr = $this->db->get();
            foreach ($qr->result() as $row) {
                $menu_id = $row->sub_id;
                $menu_sub_refid = $row->sub_refid;
                //return $user_id;
            }
            $menu_id1 = $menu_sub_refid . '#' . $menu_id;
        } else {
            $menu_id1 = '1#' . $menu_id;
        }
        if ($menu_id == null) {
            $this->db->select("id");
            $this->db->from("module_names");
            $this->db->where('module_name', $url);
            $qr1 = $this->db->get();
            foreach ($qr1->result() as $row) {
                $menu_id = $row->id;
            }
            $menu_id3 = "o" . "#" . $menu_id;
        } else {
            $menu_id2 = 'm#' . $menu_id;
        }
        $flag = 0;

        for ($i = 0; $i < count($splittedstring); $i++) {

            if (($splittedstring[$i] == $menu_id1) || ($splittedstring[$i] == $menu_id2) || ($splittedstring[$i] == $menu_id3 )) {

                return true;
                break;
            }
        }

        //print_r($splittedstring);
        //echo $menu_id;
    }

//////////////////////CODE ADDED BY YASIR ///////////////////////
    public function updateUserNetwork($network) {

        $id = $network['id'];
        $position = $network['position'];
        $this->db->where('id', $id);
        $this->db->set('default_leg', $position);
        $res = $this->db->update('ft_individual');
        return $res;
    }

    public function checkUserName($new_uname) {

        $flag = 0;

        $res = $this->db->query("select * from infinite_mlm_user_detail  WHERE user_name='$new_uname' AND account_status != 'deleted' LIMIT 1");
        if ($res->num_rows() == 0) {
            $flag = 1;
        }
        return $flag;
    }

    public function updtMlmUsrDetails($new_uname) {
        $table_prefix = $this->table_prefix;

        $res = $this->db->query("update infinite_mlm_user_detail SET user_name ='$new_uname' WHERE id='$table_prefix'");
        return $res;
    }

}
