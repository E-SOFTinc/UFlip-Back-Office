<?php

require_once 'Inf_Model.php';

class configuration_model extends Inf_Model {

    public $OBJ_SETTINGS;
    public $file_upload;
    public $tool_tip;
    public $OBJ_VALI;
    private $mailObj;

    public function __construct() {
        parent::__construct();
        require_once 'validation.php';
        $this->OBJ_VALI = new Validation();
        require_once 'Phpmailer.php';
        $this->mailObj = new PHPMailer();
    }

    public function initialize() {

        require_once 'Settings.php';
        $this->OBJ_SETTINGS = new Settings();
        require_once 'FileUpload.php';
        $this->file_upload = new FileUpload();
        require_once 'ToolTipClass.php';
        $this->tool_tip = new ToolTipClass();
    }

    public function getSettings() {
        $query = $this->db->get('configuration');
        foreach ($query->result_array() as $row) {
            $obj_arr = $row;
        }

        return $obj_arr;
    }

    function setLevel($depth, $depth_no) {

        $res = '';
        if ($depth_no != $depth) {

            $this->db->truncate('level_commision');

            for ($j = 1, $i = $depth; $j <= $depth; $j++, $i--) {
                $this->db->set('level_no', $j);
                $this->db->set('level_percentage', $i);
                $res = $this->db->insert('level_commision');
            }
        }
        return $res;
    }

    public function updateDepth($depth) {

        $this->db->set('depth_ceiling', $depth);
        $result = $this->db->update('configuration');

        return $result;
    }

    public function getPayOutTypes() {
        $payout_release = "";
        $this->db->select('payout_release');
        $query = $this->db->get('configuration');
        foreach ($query->result() as $row) {
            $payout_release = $row->payout_release;
        }

        return $payout_release;
    }

    public function insertdate($arr) {
        $result = '';
        $l = count($arr);
        $data = array();
        for ($i = 0; $i < $l; $i++) {
//           $data['']=$arr[$i];  
            $res = $this->isExist($arr[$i]);
            if ($res) {
                $this->db->set('release_date', $arr[$i]);
                $result = $this->db->insert('payout_release_date');
            }
        }
        return $result;
    }

    //added

    public function getmonth($startDate, $endDate) {
        $mnth = array();
        $start = new DateTime($startDate);
        $start->modify('first day of this month');
        $end = new DateTime($endDate);
        $end->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 month');
        $period = new DatePeriod($start, $interval, $end);

        foreach ($period as $dt) {
            $mnth[] = $dt->format("Y-m-d") . "<br>\n";
        }
        return $mnth;
    }

    public function insertmonth($arr) {
        $result = "";
        $l = count($arr);
        $data = array();
        for ($i = 0; $i < $l; $i++) {
//           $data['']=$arr[$i];  
            $res = $this->isExist($arr[$i]);
            if ($res) {
                $this->db->set('release_date', $arr[$i]);
                $result = $this->db->insert('payout_release_date');
            }
        }
        return $result;
    }

    public function isExist($data) {

        $this->db->select("COUNT('release_date') AS cnt");
        $this->db->where('release_date', $data);
        $this->db->from("payout_release_date");
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            if ($row->cnt != 0) {
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    public function getDateForSpecificDayBetweenDates($startDate, $endDate, $weekdayNumber) {

        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        $dateArr = array();

        do {
            if (date("w", $startDate) != $weekdayNumber) {
                $startDate += (24 * 3600); // add 1 day
            }
        } while (date("w", $startDate) != $weekdayNumber);


        while ($startDate <= $endDate) {
            $dateArr[] = date('Y-m-d', $startDate);
            $startDate += (7 * 24 * 3600); // add 7 days
        }

        return($dateArr);
    }

    //

    public function getLetterSetting($lang_id = '') {

        $arr = "";
        if ($lang_id != '')
            $this->db->where("lang_ref_id", $lang_id);
        $query = $this->db->get('letter_config');

        foreach ($query->result() as $row) {
            $arr['company_name'] = $row->company_name;
            $arr['address_of_company'] = $row->address_of_company;
            $arr['main_matter'] = stripslashes($row->main_matter);
            $arr['logo'] = $row->logo;
            $arr['productmatter'] = $row->productmatter;
            $arr['place'] = $row->place;
        }

        return $arr;
    }

    public function updateLetterSetting($post) {



        $company_name = $post['company_name'];
        $company_add = $post['company_add'];
        $lang_id = $post['lang_id'];
        $main_matter = addslashes($post['txtDefaultHtmlArea']);
        $main_matter = strip_tags($main_matter, "<b><p><i><u><h2><h3><ol><li><ul><sub><sup><span><br><hr><a>");
        $product_matter = $post['product_matter'];
        $place = $post['place'];
        if (array_key_exists('logo_name', $post)) {



            $file_name = $post["logo_name"];

            $this->db->set('company_name', $company_name);
            $this->db->set('address_of_company', $company_add);
            $this->db->set('main_matter', $main_matter);
            $this->db->set('logo', $file_name);
            $this->db->set('productmatter', $product_matter);
            $this->db->set('place', $place);
            if ($lang_id != '')
                $this->db->where("lang_ref_id", $lang_id);
            $query = $this->db->update('letter_config');
        } else {

            $this->db->set('company_name', $company_name);
            $this->db->set('address_of_company', $company_add);
            $this->db->set('main_matter', $main_matter);
            $this->db->set('productmatter', $product_matter);
            $this->db->set('place', $place);
            if ($lang_id != '')
                $this->db->where("lang_ref_id", $lang_id);
            $query = $this->db->update('letter_config');
        }

        return $query;
    }

    public function updatSettings($tds, $pair, $ceiling, $service, $pair_value, $product_point_value, $referal_amount, $percentorflat, $reg_amount = '', $board_commission = '', $percentorflatlvlcomsn = '', $participation_bonus, $week_limit) {
        $this->db->set('tds', $tds);
        $this->db->set('pair_price', $pair);
        $this->db->set('pair_ceiling', $ceiling);
        $this->db->set('service_charge', $service);
        $this->db->set('pair_value', $pair_value);
        $this->db->set('product_point_value', $product_point_value);
        $this->db->set('setting_staus', 'yes');
        $this->db->set('referal_amount', $referal_amount);
//        $this->db->set('min_payout', $min_payout);
        $this->db->set('participation_bonus', $participation_bonus);
        $this->db->set('week_limit', $week_limit);
        $this->db->set('reg_amount', $reg_amount);
//        $this->db->set('payout_request_validity', $payout_validity);
        if ($percentorflat != '')
            $this->db->set('percentorflat', $percentorflat);
        if ($percentorflatlvlcomsn != '')
            $this->db->set('percentorflatlvlcomsn', $percentorflatlvlcomsn);
        if ($board_commission != "")
            $this->db->set('board_commission', $board_commission);

        $result = $this->db->update('configuration');

//        if ($payout_status == "ewallet_request")
//            $this->db->set('sub_status', 'yes');
//        else
//            $this->db->set('sub_status', 'no');
//        $this->db->where('sub_id', 49);
//        $result = $this->db->update('infinite_mlm_sub_menu');


        return $result;
        //return $res;
    }

    public function updateConfiguration($min_payout, $payout_validity, $payout_status) {

        $this->db->set('min_payout', $min_payout);

        $this->db->set('payout_request_validity', $payout_validity);

        $result = $this->db->update('configuration');
        if ($result) {
            if ($payout_status == "ewallet_request")
                $this->db->set('sub_status', 'yes');
            else
                $this->db->set('sub_status', 'no');
            $this->db->where('sub_id', 49);
            $result1 = $this->db->update('infinite_mlm_sub_menu');
            return $result1;
        }
    }

    public function getUserId($user_name) {
        $user_id = "";
        $table = $this->table_prefix . "ft_individual";
        $this->db->select('id');
        $this->db->from('ft_individual');
        $this->db->where('user_name', $user_name);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_id = $row->id;
        }

        return $user_id;
    }

    public function getReferalDetails($user_id, $limit, $offset, $table_prefix = "") {

        $session_data = $this->session->userdata('logged_in');
        $arr = array();

        if ($session_data['user_type'] == "admin" || $table_prefix != "" || $session_data['user_type'] == "employee") {
            $id = $user_id;
        } else {
            $id = $session_data['user_id'];
        }
        if ($id != "") {

            $this->db->select('user_detail_refid');
            $this->db->select('user_detail_name');
            $this->db->select('join_date');
            $this->db->select('user_detail_email');
            $this->db->select('user_detail_country');
            $this->db->from('user_details');
            $this->db->where('user_details_ref_user_id', $id);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();

            $i = 0;
            foreach ($query->result_array() as $row) {
                $user_id = $row['user_detail_refid'];
                $arr[$i]['user_name'] = $this->getUsername($user_id, $table_prefix);
                $arr[$i]['name'] = $row['user_detail_name'];
                $arr[$i]['join_date'] = $row['join_date'];
                $arr[$i]['email'] = $row['user_detail_email'];
                $arr[$i]['country'] = $row['user_detail_country'];
                $i++;
            }
            // print_r(count($arr));
            for ($j = 0; $j < count($arr); $j++) {
                if ($arr[$j]['email'] == "")
                    $arr[$j]['email'] = 'NA';
                if ($arr[$j]['country'] == "")
                    $arr[$j]['country'] = 'NA';
            }
            return $arr;
        }
    }

    public function getReferalDetailscount($user_id) {
        $this->db->select('count(*) as cnt');
        $this->db->from('user_details');
        $this->db->where('user_details_ref_user_id', $user_id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            return $row->cnt;
        }
    }

    public function getAllUsernames() {
        $username = array();
        $this->db->select('user_name');
        $this->db->from('login_user');
        $query = $this->db->get();
        $i = 0;
        foreach ($query->result() as $row) {
            $user_name[$i] = $row->user_name;
            $i++;
        }
        return $user_name;
    }

    public function getUsername($user_id, $table_prefix = '') {

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

    public function setReferalStatus($referal_status) {
        if ($referal_status != "") {
            $this->db->set('referal_status', $referal_status);
            $res = $this->db->update('module_status');

            /* $this->db->set('status', $referal_status);
              $this->db->where('id', 21);
              $res = $this->db->update('infinite_mlm_menu'); */
            return $res;
        }
    }

    public function setCreditCardStatus($id, $status) {
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $res = $this->db->update('payment_gateway_config');
    }

    public function getCreditCardStatus() {

        $this->db->select('*');
        $this->db->from("payment_gateway_config");
        $query = $this->db->get();
        $details = array();
        $i = 0;
        foreach ($query->result() as $row) {
            $details[$i]['id'] = $row->id;
            $details[$i]['gateway_name'] = $row->gateway_name;
            $details[$i]['status'] = $row->status;
            $i++;
        }
        return $details;
    }

    public function setLanguageStatus($module_name, $status) {

        //$this->db->set($module_name, $status);
        // $res = $this->db->update('languages');
        if ($module_name == "eng_status") {
            $this->db->set('status', $status);
            $this->db->where('lang_id', 1);
            $res = $this->db->update('languages');
        } else if ($module_name == "span_status") {
            $this->db->set('status', $status);
            $this->db->where('lang_id', 2);
            $res = $this->db->update('languages');
        } else if ($module_name == "chin_status") {
            $this->db->set('status', $status);
            $this->db->where('lang_id', 3);
            $res = $this->db->update('languages');
        } else if ($module_name == "ger_status") {
            $this->db->set('status', $status);
            $this->db->where('lang_id', 4);
            $res = $this->db->update('languages');
        } else if ($module_name == "por_status") {
            $this->db->set('status', $status);
            $this->db->where('lang_id', 5);
            $res = $this->db->update('languages');
        }

        return $res;
    }

    //.............................code added by Deepthy...................//start

    public function setModuleStatus($module_name, $status) {

        $this->db->set($module_name, $status);
        $res = $this->db->update('module_status');

        if ($module_name == "ewallet_status") {
            $this->db->set('status', $status);
            $this->db->where('id', 28);
            $res = $this->db->update('infinite_mlm_menu');
            if ($res) {
                $this->setSubMenuStatus(28, $status);
            }
        } else if ($module_name == "sponsor_tree_status") {
            $this->db->set('sub_status', $status);
            $this->db->where('sub_id', 58);
            $res = $this->db->update('infinite_mlm_sub_menu');
        } else if ($module_name == "rank_status") {
            $this->db->set('sub_status', $status);
            $this->db->where("(sub_id='59' OR sub_id = '67') ");
            $res = $this->db->update('infinite_mlm_sub_menu');
        } else if ($module_name == "sms_status") {
            $this->db->set('status', $status);
            $this->db->where('id', 26);
            $res = $this->db->update('infinite_mlm_menu');
            if ($res) {
                $this->setSubMenuStatus(26, $status);
            }
        } else if ($module_name == "employee_status") {
            $res = false;
            $this->db->set('status', $status);
            $this->db->where('id', 32);
            $res1 = $this->db->update('infinite_mlm_menu');
            if ($res1) {
                $this->setSubMenuStatus(32, $status);
            }
        } else if ($module_name == "upload_status") {
            $this->db->set('sub_status', $status);
            $this->db->where("(sub_id='1' OR sub_id = '4') ");
            $res = $this->db->update('infinite_mlm_sub_menu');
        } else if ($module_name == "pin_status") {
            $res = false;
            $this->db->set('status', $status);
            $this->db->where('id', 11);
            $res1 = $this->db->update('infinite_mlm_menu');
            if ($res1) {
                $this->db->set('sub_status', $status);
                $this->db->where("(sub_refid='11' OR sub_id = '35' OR sub_id = '36' OR sub_id = '42') ");
                $res = $this->db->update('infinite_mlm_sub_menu');
            }
        } else if ($module_name == "product_status") {
            $res = false;
            $this->db->set('status', $status);
            $this->db->where('id', 10);
            $res = $this->db->update('infinite_mlm_menu');
        } else if ($module_name == "referal_status") {
            $this->db->set('status', $status);
            $this->db->where("id", 21);
            $res = $this->db->update('infinite_mlm_menu');
        } else if ($module_name == "sponsor_commission_status") {
            if ($status == "yes") {
                $this->db->set('db_amt_type', 'level_commission');
                $this->db->set('view_amt_type', 'Level Commission');
                $res1 = $this->db->insert('amount_type');
            } else {
                $this->db->where('db_amt_type', 'level_commission');
                $res1 = $this->db->delete('amount_type');
            }
        }
        return $res;
    }

    public function setSubMenuStatus($sub_refid, $status) {
        $this->db->set('sub_status', $status);
        $this->db->where("sub_refid", $sub_refid);
        $res = $this->db->update('infinite_mlm_sub_menu');
    }

    public function getCapchatatus() {
        $status_arr;
        $this->db->select('*');
        $this->db->from("34_module_status");
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $status_arr = $row['captcha_status'];
        }
        return $status_arr;
    }

    public function getModuleStatus() {
        $status_arr = array();
        $this->db->select('*');
        $this->db->from("module_status");
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $status_arr["pin_status"] = $row['pin_status'];
            $status_arr["product_status"] = $row['product_status'];
            $status_arr["sms_status"] = $row['sms_status'];
            $status_arr["referal_status"] = $row['referal_status'];
            $status_arr["ewallet_status"] = $row['ewallet_status'];
            $status_arr["upload_status"] = $row['upload_status'];
            $status_arr["rank_status"] = $row['rank_status'];
            $status_arr["sponsor_tree_status"] = $row['sponsor_tree_status'];
            $status_arr["employee_status"] = $row['employee_status'];
            $status_arr["lang_status"] = $row['lang_status'];
            $status_arr["help_status"] = $row['help_status'];
            $status_arr["statcounter_status"] = $row['statcounter_status'];
            $status_arr["footer_demo_status"] = $row['footer_demo_status'];
            $status_arr["captcha_status"] = $row['captcha_status'];
            $status_arr["sponsor_commission_status"] = $row['sponsor_commission_status'];
        }
        $this->db->select('status');
        $this->db->where('payment_type', 'Credit Card');
        $this->db->from("payment_methods");
        $query2 = $this->db->get();
        //echo $this->db->last_query();
        foreach ($query2->result_array() as $row) {
            $status_arr["credit_card"] = $row['status'];
        }
        return $status_arr;
    }

    //.........................code added by Deepthy......................//end
    //*************************************
    public function getLanguageStatus() {
        $status_arr = array();
        $this->db->select('*');
        $this->db->from("languages");
        $query = $this->db->get();
        $i = 0;
        foreach ($query->result_array() as $row) {
            $status_arr[$i]["lang_id"] = $row['lang_id'];
            $status_arr[$i]["lang_name_in_english"] = $row['lang_name_in_english'];
            $status_arr[$i]["lang_status"] = $row['status'];
            $i++;
        }
        return $status_arr;
    }

    public function getTermsConditionsSettings($lang_id = '') {

        if ($lang_id != '')
            $this->db->where("lang_ref_id", $lang_id);
        $query = $this->db->get('terms_conditions');

        foreach ($query->result() as $row) {
            $TermsConditions = $row->terms_conditions;
        }
        return stripslashes($TermsConditions);
    }

    public function updateTermsConditionsSettings($post) {
        //$newone = mysql_real_escape_string($post['txtDefaultHtmlArea']);
        $newone = addslashes($post['txtDefaultHtmlArea1']);
        $lang_id = $post['lang_id'];
        $this->db->set('terms_conditions', $newone);
        if ($lang_id != '')
            $this->db->where("lang_ref_id", $lang_id);
        $res = $this->db->update('terms_conditions');
        return $res;
    }

    public function getPinConfig() {
        $arr = "";

        $query = $this->db->get('pin_config');

        foreach ($query->result() as $row) {
            $arr['pin_amount'] = $row->pin_amount;
            $arr['pin_length'] = $row->pin_length;
            $arr['pin_type'] = $row->pin_type;
            $arr['pin_maxcount'] = $row->pin_maxcount;
            $arr['pin_character_set'] = $row->pin_character_set;
        }

        return $arr;
    }

    public function setPinConfig($pin_value, $pin_length, $pin_maxcount, $pin_character_set) {
        $this->db->set('pin_amount', $pin_value);
        $this->db->set('pin_maxcount', $pin_maxcount);
        $this->db->set('pin_length', $pin_length);
        $this->db->set('pin_character_set', $pin_character_set);
        $result = $this->db->update('pin_config');

        return $result;
    }

    public function getUsernameConfig() {


        $query = $this->db->get('username_config');
        foreach ($query->result() as $row) {
            $config["length"] = $row->length;
            $config["prefix_status"] = $row->prefix_status;
            $config["prefix"] = $row->prefix;
            $config["type"] = $row->user_name_type;
        }


        return $config;
    }

    public function setUsernameConfig($length, $prefix_status, $prefix = '', $type) {


        $this->db->set('length', $length);
        $this->db->set('prefix_status', $prefix_status);
        $this->db->set('prefix', $prefix);
        $this->db->set('user_name_type', $type);
        $res = $this->db->update('username_config');

        return $res;
    }

    public function setUsernametype($type) {

        $length = 6;
        $prefix_status = 'no';
        $prefix = "";
        $this->db->set('length', $length);
        $this->db->set('prefix_status', $prefix_status);
        $this->db->set('prefix', $prefix);
        $this->db->set('user_name_type', $type);
        $res = $this->db->update('username_config');

        return $res;
    }

    public function getUsernamePrefix() {
        $this->db->select('prefix');
        $this->db->from('username_config');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $prefix = $row->prefix;
        }

        return $prefix;
    }

    /*
      //edited by m.ali.km on 26/11/2011
      public function siteConfiguration($post) {
      $res = "";
      if ((array_key_exists('icon_name', $post)) && (array_key_exists('logo_name', $post))) {

      $file_name = $post['logo_name'];
      $company_name = $post['co_name'];
      $email = strtolower($post['email']);
      $phone = $post['phone'];
      $favicon_icon = $post['icon_name'];

      $this->db->set('company_name', $company_name);
      $this->db->set('logo', $file_name);
      $this->db->set('email', $email);
      $this->db->set('phone', $phone);
      $this->db->set('favicon', $favicon_icon);
      $this->db->where('id', '1');
      $res = $this->db->update('site_information');
      } else if (array_key_exists('logo_name', $post)) {
      $file_name = $post['logo_name'];
      $company_name = $post['co_name'];
      $email = strtolower($post['email']);
      $phone = $post['phone'];

      $this->db->set('company_name', $company_name);
      $this->db->set('logo', $file_name);
      $this->db->set('email', $email);
      $this->db->set('phone', $phone);
      $this->db->where('id', '1');
      $res = $this->db->update('site_information');
      } else if ((array_key_exists('icon_name', $post))) {
      $company_name = $post['co_name'];
      $email = strtolower($post['email']);
      $phone = $post['phone'];
      $favicon_icon = $post['icon_name'];

      $this->db->set('company_name', $company_name);
      $this->db->set('email', $email);
      $this->db->set('phone', $phone);
      $this->db->set('favicon', $favicon_icon);
      $this->db->where('id', '1');
      $res = $this->db->update('site_information');
      } else {
      $company_name = $post['co_name'];
      $email = strtolower($post['email']);
      $phone = $post['phone'];


      $this->db->set('company_name', $company_name);
      $this->db->set('email', $email);
      $this->db->set('phone', $phone);
      $this->db->where('id', '1');
      $res = $this->db->update('site_information');
      }


      if ($res) {
      $stat['response'] = 1;
      } else {
      $stat['response'] = 2;
      }
      return $stat;
      }
     */

    public function getUserPhoto() {
        $this->db->select('img');
        $this->db->from('photo');
        $this->db->where('id', '1');
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            return $row->img;
        }
    }

    public function siteConfiguration($nam, $address, $lang, $em, $ph, $thum, $thumb) {

        $this->db->set('company_name', $nam);
        $this->db->set('company_address', $address);
        $this->db->set('default_lang', $lang);
        $this->db->set('logo', $thum);
        $this->db->set('email', $em);
        $this->db->set('phone', $ph);
        $this->db->set('favicon', $thumb);
        $this->db->where('id', '1');
        $res = $this->db->update('site_information');
        return $res;
    }

    public function getSiteConfiguration() {
        $this->db->select('*');
        $this->db->from('site_information');
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $site_info_arr["co_name"] = $row['company_name'];
            $site_info_arr["company_address"] = $row['company_address'];
            $site_info_arr["logo"] = $row['logo'];
            $site_info_arr["email"] = $row['email'];
            $site_info_arr["phone"] = $row['phone'];
            $site_info_arr["favicon"] = $row['favicon'];
            $site_info_arr["default_lang"] = $row['default_lang'];
        }
        return $site_info_arr;
    }

    public function setreportconfig() {
        $report_arr = array();
        $this->db->select('address,phone,email');
        $this->db->from('report_configuration');
        $res = $this->db->get();

        foreach ($res->result_array() as $row) {
            $report_arr["address"] = $row['address'];
            $report_arr["phone"] = $row['phone'];
            $report_arr["email"] = $row['email'];
            $report_arr['count'] = $res->num_rows();
        }

        return $report_arr;
    }

    public function updatereportconfig($adr, $email, $phone) {
        //echo "...".$adr."....".$email."...///".$phone;die();
        $this->db->set('address', $adr);
        $this->db->set('phone', $phone);
        $this->db->set('email', $email);

        $this->db->where('id', '1');
        $res = $this->db->update('report_configuration');

        // echo $this->db->last_query();die();
        return $res;
    }

    public function getLanguages() {
        $this->db->select('*');
        $this->db->from('languages');
        $res = $this->db->get();
        $i = 0;
        foreach ($res->result_array() as $row) {
            $lang[$i]['lang_id'] = $row['lang_id'];
            $lang[$i]['lang_code'] = $row['lang_code'];
            $lang[$i]['lang_name'] = $row['lang_name'];
            $lang[$i]['lang_name_in_english'] = $row['lang_name_in_english'];
            $lang[$i]['status'] = $row['status'];
            $i++;
        }
        return $lang;
    }

    public function getDefaultLang() {
        $this->db->select('default_lang');
        $this->db->from('site_information');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $def_lang = $row->default_lang;
        }
        return $def_lang;
    }

    //==========================
    public function updateSiteStatus($status, $content) {
        $this->db->set('site_status', $status);
        $this->db->set('content', $content);

        $result = $this->db->update('configuration');

        return $result;
    }

    //==========================
    public function getMailDetails() {
        $mail_details = array();
        $this->db->select('*');
        $this->db->where('id', 1);
        $this->db->from('mail_settings');
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $mail_details = $row;
        }
        return $mail_details;
    }

    public function updateMailSettings($mail_setting) {
        $this->db->set('from_name', $mail_setting['from_name']);
        $this->db->set('from_email', $mail_setting['from_email']);
        /* $this->db->set('smtp_host', $mail_setting['smtp_host']);
          $this->db->set('smtp_username', $mail_setting['smtp_username']);
          $this->db->set('smtp_password', $mail_setting['smtp_password']);
          $this->db->set('smtp_port', $mail_setting['smtp_port']);
          $this->db->set('smtp_timeout', $mail_setting['smtp_timeout']); */
        $this->db->set('reg_mail_status', $mail_setting['reg_mail_status']);
        $this->db->set('reg_mail_content', addslashes($mail_setting['reg_mail_content']));
        $this->db->where('id', '1');
        $res = $this->db->update('mail_settings');
        return $res;
    }

    public function insertGeneralMail($post) {
        $main_matter = $post['txtDefaultHtmlArea'];
        $main_matter = strip_tags($main_matter, "<b><p><i><u><h2><h3><ol><li><ul><sub><sup><span><br><hr><a>");
        if (array_key_exists('userfile0', $post) || array_key_exists('userfile1', $post) || array_key_exists('userfile2', $post)) {
            $this->db->set('main_matter', $main_matter);
            if (array_key_exists('userfile0', $post))
                $this->db->set('attach_1', $post['userfile0']);
            if (array_key_exists('userfile1', $post))
                $this->db->set('attach_2', $post['userfile1']);
            if (array_key_exists('userfile2', $post))
                $this->db->set('attach_3', $post['userfile2']);
            $this->db->set('send_from', $post['send_from']);
            $query = $this->db->insert('general_mail_history');
        }
        else {
            $this->db->set('main_matter', $main_matter);
            $this->db->set('send_from', $post['send_from']);
            $query = $this->db->insert('general_mail_history');
        }
        return $query;
    }

    public function sendMail($mail_details) {
        $user_detail_array = $this->getUserEmailList($mail_details);
        $logo_path = base_url();
        foreach ($user_detail_array as $data) {
            $user_full_name = $this->OBJ_VALI->getFullName($data['id']);
            $mail_body = '<html>
                    <body>
                    <table width="100%"  cellpadding="2" cellspacing="4" bgcolor = "white">
                        <tr>
                        <td colspan="2"> 
                        
                        <table width = "100%">
                         <tr>
                         <td >
                          <img  height="100px" src="' . $logo_path . 'public_html/images/logos/logo.png" alt="" /> 
                         </td>
                         </tr>
                        </table>


                    </td>
                        </tr>
                        <tr>
                        <td>
                         <table width = "100%">
                         <tr>
                         <td >Dear, ' . $user_full_name . '</td>
                         </tr>
                         
                         </table>
                        </td>
                        </tr>
                        <tr><td >' . stripslashes($mail_details['txtDefaultHtmlArea']) . '</td></tr>

                    </table>
                    </body>

                        </html>';
            //echo $mail_body;
            //echo '<br/>email---->' . $data['email'] . '<br/>';
            @set_magic_quotes_runtime(false);
            ini_set('magic_quotes_runtime', 0);
            $from_address = $mail_details['send_from'];
            $sent_address = $data['email'];
            $subject = "General Mail: Infinitemlmsoftware.com"; //subject
            $this->mailObj->From = $from_address;
            $this->mailObj->FromName = "info@Infinitemlmsoftware.com";
            $this->mailObj->Subject = $subject;
            $this->mailObj->IsHTML(true);

            $this->mailObj->ClearAddresses();
            $this->mailObj->ClearAttachments();

            $this->mailObj->AddAddress($sent_address);
            if (array_key_exists('userfile0', $mail_details))
                $this->mailObj->AddAttachment('./public_html/images/general_mail/' . $mail_details['userfile0']);
            if (array_key_exists('userfile1', $mail_details))
                $this->mailObj->AddAttachment('./public_html/images/general_mail/' . $mail_details['userfile1']);
            if (array_key_exists('userfile2', $mail_details))
                $this->mailObj->AddAttachment('./public_html/images/general_mail/' . $mail_details['userfile2']);

            /* if ($FILE_NAME != "")
              $this->mailObj->AddAttachment($FILE_NAME); */

            $this->mailObj->Body = $mail_body;
            $res = $this->mailObj->send();
            $res = $res;
            if (!$res)
                $res = $this->mailObj->ErrorInfo;
        }
//        die();
        //die();
        //print_r($mail_details);
//$row->main_matter;

        return $res;
    }

    public function getUserEmailList($mail_detilas) {
        $result = array();
        $this->db->select('user_detail_email,user_detail_refid,user_detail_country');
        $this->db->where('user_detail_refid !=', 12345);
        $res = $this->db->get('user_details');

        $i = 0;

        foreach ($res->result_array() as $row) {
            if ($this->checkUser($row['user_detail_refid'])) {
                $result[$i]['email'] = $row['user_detail_email'];
                $result[$i]['id'] = $row['user_detail_refid'];
                $i++;
            }
        }
        return $result;
    }

    public function checkUser($id) {
        $this->db->select('active');
        $this->db->where('id', $id);
        $res = $this->db->get('ft_individual');
        foreach ($res->result_array() as $row) {
            if ($row['active'] != 'terminated') {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function insertRankDetails($rank_name, $ref_count, $rank_bonus) {
        $this->db->set('rank_name', $rank_name);
        $this->db->set('referal_count', $ref_count);
        $this->db->set('rank_bonus', $rank_bonus);
        $result = $this->db->insert('rank_details');
        return $result;
    }

    public function editRank($edit_id) {
        $this->db->where('rank_id', $edit_id);
        $query = $this->db->get('rank_details');
        foreach ($query->result_array() as $row) {
            $obj_arr["rank_id"] = $row['rank_id'];
            $obj_arr["rank_name"] = $row['rank_name'];
            $obj_arr["referal_count"] = $row['referal_count'];
            $obj_arr["rank_bonus"] = $row['rank_bonus'];
        }
        return $obj_arr;
    }

    public function updateRank($rank_id1, $rank_name1, $referal_count1, $rank_bonus) {


        $this->db->set('rank_name', $rank_name1);
        $this->db->set('referal_count', $referal_count1);
        $this->db->set('rank_bonus', $rank_bonus);
        $this->db->where('rank_id', $rank_id1);
        $res = $this->db->update('rank_details');
        return $res;
    }

    public function getMailHistory() {

        $arr = array();
        $query = $this->db->get('general_mail_history');
        //echo $this->db->last_query();
        $i = 0;
        foreach ($query->result() as $row) {
            $arr[$i]['id'] = $row->id;
            $arr[$i]['sent_from'] = $row->send_from;
            $arr[$i]['main_matter'] = $row->main_matter;
            $arr[$i]['logo'] = $row->attach_1;
            $arr[$i]['logo_1'] = $row->attach_2;
            $arr[$i]['logo_2'] = $row->attach_3;
            $i++;
        }
//         print_r($arr);

        return $arr;
    }

    public function getAllRankDetails($rank_id = '') {
        $arr = array();
        if ($rank_id != '')
            $this->db->where('rank_id', $rank_id);
        $query = $this->db->get('rank_details');
        //echo $this->db->last_query();
        $i = 0;
        foreach ($query->result() as $row) {
            $arr[$i]['rank_id'] = $row->rank_id;
            $arr[$i]['rank_name'] = $row->rank_name;
            $arr[$i]['referal_count'] = $row->referal_count;
            $arr[$i]['rank_bonus'] = $row->rank_bonus;

            $i++;
        }
//         print_r($arr);

        return $arr;
    }

    public function deleteMessage($id) {
        $res = $this->db->delete('mail_history', array('id' => $id));
        return $res;
    }

    public function setSmsConfig($details) {

        $this->db->set('sender_id', $details['sender_id']);
        $this->db->set('username', $details['user_name']);
        $this->db->set('password', $details['password']);
        $res = $this->db->insert('sms_config');

        return $res;
    }

    public function getSmsConfigDetails() {

        $details = array();
        $this->db->select('sender_id,username,password');
        $this->db->from('sms_config');
        $query = $this->db->get();

        foreach ($query->result() as $row) {

            $details['sender_id'] = $row->sender_id;
            $details['username'] = $row->username;
            $details['password'] = $row->password;
        }

        return $details;
    }

    public function updatePaypalConfig($api_username, $api_password, $api_signature, $mode, $currency, $return_url, $cancel_url) {
        $this->db->select('id');
        $this->db->from('paypal_config');
        $query = $this->db->get();
        $data = array(
            'api_username' => $api_username,
            'api_password' => $api_password,
            'api_signature' => $api_signature,
            'mode' => $mode,
            'currency' => $currency,
            'return_url' => $return_url,
            'cancel_url' => $cancel_url
        );
        if ($query->num_rows()) {
            $res = $this->db->update('paypal_config', $data);
        } else {
            $res = $this->db->insert('paypal_config', $data);
        }
        return $res;
    }

    public function getPaypalConfigDetails() {

        $this->db->select('*');
        $this->db->from('paypal_config');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $details['api_username'] = $row->api_username;
            $details['api_password'] = $row->api_password;
            $details['api_signature'] = $row->api_signature;
            $details['mode'] = $row->mode;
            $details['currency'] = $row->currency;
            $details['return_url'] = $row->return_url;
            $details['cancel_url'] = $row->cancel_url;
        }
        if ($query->num_rows()) {
            return $details;
        }
    }

    public function getPaymentMethods() {

        $this->db->select('*');
        $this->db->from('payment_methods');
        $query = $this->db->get();
        $details = array();
        $i = 0;
        foreach ($query->result() as $row) {
            $details[$i]['id'] = $row->id;
            $details[$i]['payment_type'] = $row->payment_type;
            $details[$i]['status'] = $row->status;
            $i++;
        }

        return $details;
    }

    public function setPaymentStatus($id, $status) {
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $res = $this->db->update('payment_methods');
        if ($id == 1 && $status == 'no') {
            $this->setGatewayStatusFalse();
        }
        return $res;
    }

    public function checkAtleastOnePaymentActive($id) {
        $this->db->select('status');
        $this->db->where('id !=', $id);
        $this->db->where('status', 'yes');
        $this->db->from('payment_methods');
        $count = $this->db->count_all_results();
        return $count;
    }

    public function checkAtleastOneCreditCardActive($id) {
        $this->db->select('status');
        $this->db->where('id !=', $id);
        $this->db->where('status', 'yes');
        $this->db->from('payment_gateway_config');
        $count = $this->db->count_all_results();
        return $count;
    }

    public function getLevelSettings() {
        $arr_comm = array();
        $this->db->select('*');
        $this->db->from('level_commision');
        $query = $this->db->get();
        $l = 0;
        foreach ($query->result_array() as $row) {
            $arr_comm[$l] = $row['level_percentage'];
            $l++;
        }
        return $arr_comm;
    }

    public function updatLevelSettings($k_arr) {
        $c = count($k_arr);
        for ($j = 1; $j <= $c; $j++) {
            $this->db->set('level_percentage', $k_arr[$j]);
            $this->db->where('level_no', $j);
            $rec = $this->db->update('level_commision');
        }
        return $rec;
    }

    public function getEpdqConfigDetails() {

        $this->db->select('*');
        $this->db->from('epdq_config');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $details['api_pspid'] = $row->api_pspid;
            $details['api_password'] = $row->api_password;
            $details['api_language'] = $row->api_language;
            $details['api_currency'] = $row->api_currency;
            $details['accept_url'] = $row->accept_url;
            $details['decline_url'] = $row->decline_url;
            $details['exception_url'] = $row->exception_url;
            $details['cancel_url'] = $row->cancel_url;
            $details['api_url'] = $row->api_url;
        }
        if ($query->num_rows()) {
            return $details;
        }
    }

    public function updateEpdqConfig($api_pspid, $api_password, $language, $currency, $accept_url, $decline_url, $exception_url, $cancel_url, $api_url) {
        $this->db->select('id');
        $this->db->from('paypal_config');
        $query = $this->db->get();
        $data = array(
            'api_pspid' => $api_pspid,
            'api_language' => $language,
            'api_currency' => $currency,
            'accept_url' => $accept_url,
            'decline_url' => $decline_url,
            'exception_url' => $exception_url,
            'cancel_url' => $cancel_url,
            'api_password' => $api_password,
            'api_url' => $api_url
        );
        if ($query->num_rows()) {
            $res = $this->db->update('epdq_config', $data);
        } else {
            $res = $this->db->insert('epdq_config', $data);
        }
        return $res;
    }

    public function setGatewayStatusFalse() {
        $this->db->set('status', 'no');
        return $this->db->update('payment_gateway_config');
    }

    public function getAuthorizeConfigDetails() {
        $details = array();
        $this->db->select('*');
        $this->db->from('authorize_config');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $details['merchant_id'] = $row->merchant_id;
            $details['transaction_key'] = $row->transaction_key;
        }

        return $details;
    }

    public function updateAuthorizeConfig($merchant_id, $transaction_key) {

        $data = array(
            'merchant_id' => $merchant_id,
            'transaction_key' => $transaction_key,
        );
        $res = $this->db->update('authorize_config', $data);
        return $res;
    }

    public function getUserPurcahseProduct($user_id) {
        $details = array();
        $this->db->select("invoice_no,amount,trans_id,quantity,date_submission,type");
        $this->db->from("sales_order");
        $this->db->where('user_id', $user_id);
        $res = $this->db->get();
        $i = 0;
        foreach ($res->result_array() as $row) {
            $details[$i] = $row;
            $i++;
        }
        return $details;
    }

    public function getUserProduct($user_id) {
        $details = array();
        $this->db->select("invoice_no,amount,trans_id,quantity,date_submission,type,payment_method");
        $this->db->from("sales_order");
        $this->db->where('user_id', $user_id);
        $res = $this->db->get();
        $i = 0;
        foreach ($res->result_array() as $row) {
            $details[$i] = $row;
            $i++;
        }
        return $details;
    }

    public function getTransactionDetails($from_date, $to_date) {
        $from_date = $from_date . ' 00:00:00';
        $to_date = $to_date . ' 23:23:59';
        $data = array();
        $this->db->select('invoice_no,amount,trans_id,user_id,quantity,date_submission,type,payment_method');
        $this->db->where("date_submission >=", $from_date);
        $this->db->where("date_submission <=", $to_date);
        $query = $this->db->get('sales_order');
        $i = 0;
        foreach ($query->result_array() as $row) {
            $data[$i] = $row;
            $data[$i]['username'] = $this->OBJ_VALI->IdToUserName($row['user_id']);
            $i++;
        }
        return $data;
    }

}

?>
<?php

define("MAX_SIZE", "150");
define("WIDTH", "191");
define("HEIGHT", "123");

function make_thumb($img_name, $filename, $new_w, $new_h) {
    //get image extension.
    $ext = getExtension($img_name);
    //creates the new image using the appropriate function from gd library
    if (!strcmp("jpg", $ext) || !strcmp("jpeg", $ext))
        $src_img = imagecreatefromjpeg($img_name);

    if (!strcmp("png", $ext))
        $src_img = imagecreatefrompng($img_name);

    //gets the dimmensions of the image
    $old_x = imageSX($src_img);
    $old_y = imageSY($src_img);

    // next we will calculate the new dimmensions for the thumbnail image
    // the next steps will be taken: 
    // 1. calculate the ratio by dividing the old dimmensions with the new ones
    //	 2. if the ratio for the width is higher, the width will remain the one define in WIDTH variable
    //	 and the height will be calculated so the image ratio will not change
    //	 3. otherwise we will use the height ratio for the image
    // as a result, only one of the dimmensions will be from the fixed ones
    $ratio1 = $old_x / $new_w;
    $ratio2 = $old_y / $new_h;
    if ($ratio1 > $ratio2) {
        $thumb_w = $new_w;
        $thumb_h = $old_y / $ratio1;
    } else {
        $thumb_h = $new_h;
        $thumb_w = $old_x / $ratio2;
    }

    // we create a new image with the new dimmensions
    $dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);

    // resize the big image to the new created one
    imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);

    // output the created image to the file. Now we will have the thumbnail into the file named by $filename
    if (!strcmp("png", $ext))
        imagepng($dst_img, $filename);
    else
        imagejpeg($dst_img, $filename);

    //destroys source and destination images. 
    imagedestroy($dst_img);
    imagedestroy($src_img);
}

function getExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}
