<?php

require_once 'Inf_Model.php';

class epin_model extends Inf_Model {

    public $OBJ_MISC;
    public $OBJ_PIN;
    public $OBJ_PRODUCT;
    public $OBJ_PAGE;
    public $OBJ_VALI;

    function __construct($product_status = '11') {
        parent::__construct();
        if ($this->uri->segments[1] != 'mobile') {
            $this->MODULE_STATUS = $this->menu->MODULE_STATUS;
            $product_status = $this->MODULE_STATUS['product_status'];
        }
        require_once("Page.php");
        $this->OBJ_PAGE = new Page();

        require_once 'Misc.php';
        $this->OBJ_MISC = new Misc();

        if ($product_status == 'yes') {
            require_once 'Pin.php';
        } else {
            require_once 'PinWithOutProduct.php';
        }
        $this->OBJ_PIN = new Pin();

        if ($product_status == "yes") {
            require_once 'product_model.php';
            $this->OBJ_PRODUCT = new product_model();
        }
        require_once 'validation.php';
        $this->OBJ_VALI = new validation();
    }

    public function generatePasscode($cnt, $status, $uploded_date, $pin_amount, $expiry_date, $pin_alloc_date) {

        for ($i = 0; $i < $cnt; $i++) {
            $passcode = $this->OBJ_MISC->getRandStr(9, 9);

            $generated_user = $this->LOG_USER_ID;
            $user_type = $this->LOG_USER_TYPE;
            if($user_type=='employee'){
              $this->load->model('validation');
              $generated_user=$this->validation->getAdminId(); 
             }
            if ($this->LOG_USER_TYPE == 'admin'|| $this->LOG_USER_TYPE=='employee') {
                $allocated_user = "NA";
            } else {
                $allocated_user = $generated_user;
            }
            //  print_r($expiry_date);die();
            $res = $this->OBJ_PIN->insertPasscode($passcode, $status, $uploded_date, $generated_user, $allocated_user, $pin_amount, $expiry_date, $pin_alloc_date, $purchase_status = "");
        }
        return $res;
    }

    public function setProduct($status = "") {

        $product_arr = $this->OBJ_PRODUCT->getAllProducts($status);
        $option = "";

        foreach ($product_arr as &$value) {
            $option.= "<option value='" . $value["product_id"] . "'>" . $value["prod_id"] . "-" . $value["product_name"] . "</option>";
        }
        unset($value);

        return $option;
    }

    public function paging($page, $limit, $pages_selection, $product_id = '') {
        $pag_arr = array();
        $arr = $this->pinSelector($page, $limit, $pages_selection, $product_id);
        $pin_numbers = $arr['pin_numbers'];
        $pag_arr['pin_numbers'] = $pin_numbers;

        return $pag_arr;
    }

    public function setFooter($page, $limit, $current_url) {

        return $this->OBJ_PAGE->setFooter($page, $limit, $current_url);
    }

    /*     * ****************************************code added by AMEEN ***************************************** */

    public function pinSelector($page, $limit, $pages_selection, $product_id = "", $keyword = "", $keyword1 = "") {
        $arr = array();

        switch ($pages_selection) {
            case 'generate':
                $arr['pin_numbers'] = $this->OBJ_PIN->getFreePins($page, $limit, "");
                break;
            case 'search':
                if ($keyword == "") {
                    $arr['pin_numbers'] = "";
                    $arr['numrows'] = "";
                }
                if ($keyword) {
                    //  echo ">".$keyword;die();
                    // $keyword = $this->session->userdata('keyword');
                    $arr['pin_numbers'] = $this->OBJ_PIN->getAllPinsearch($keyword, $page, $limit);
                    //print_r($arr);die();
                    $arr['numrows'] = $this->OBJ_PIN->getAllPinsearchpage($keyword);
                }
                if ($keyword1) {
                    //$keyword1 = $this->session->userdata('keyword1');
                    $limit = $page + $limit;
                    $arr['pin_numbers'] = $this->OBJ_PIN->getAllPinsearchProd($keyword1, $page, $limit);
                    $arr['numrows'] = $this->OBJ_PIN->getAllPinsearchProdpage($keyword1);
                }
                break;
            case 'inactive':
                $arr['pin_numbers'] = $this->OBJ_PIN->getInactivePins($page, $limit);
                $arr['numrows'] = $this->OBJ_PIN->getAllInactivePinspage();
                break;
            case 'delete':
                $arr['pin_numbers'] = $this->OBJ_PIN->getAllPins($page, $limit);
                $arr['numrows'] = $this->OBJ_PIN->getAllPinspage();
                break;
            case 'active':
                $arr['pin_numbers'] = $this->OBJ_PIN->getActivePins($page, $limit, $product_id);
                $arr['numrows'] = $this->OBJ_PIN->getAllActivePinspage();
                break;
        }
        return $arr;
    }
    public function getUserFreePinCount()
    {
            $user_id = $this->session->userdata('user_id');
            $this->db->select("count(*) as cnt");
            $this->db->from("pin_numbers");
            $this->db->where("allocated_user_id", $user_id);
            $this->db->where("status", "yes");
            
            $search_my_active = $this->db->get();
            foreach ($search_my_active->result() as $row) {
                return $row->cnt;
            }
          
    }

    public function updateEPin($delete_id, $status) {
        return $this->OBJ_PIN->updatePasscode($delete_id, $status);
    }

    public function deleteEpin($delete_id) {
        return $this->OBJ_PIN->deletePasscode($delete_id);
    }

    public function deleteAllEPin() {

        $res = $this->db->truncate('pin_numbers');

        return $res;
    }

    public function ifChecked($id, $pin_count, $pin_alloc_date, $status, $uploded_date, $admin_id, $allocate_id, $rem_count, $amount, $expiry_date) {

        for ($m = 0; $m < $pin_count; $m++) {
            $passcode = $this->OBJ_MISC->getRandStr(9, 9);
            $res = $this->OBJ_PIN->insertPasscode($passcode, $status, $uploded_date, $admin_id, $allocate_id, $amount, $expiry_date);
        }
        $res = $this->OBJ_PIN->updatePinRequest($id, $rem_count, $pin_count);
        return $res;
    }

    public function viewEpinRequest($pro_status,$limit='',$page='') {
        require_once 'validation.php';
        $obj_val = new Validation();

        $pin_detail_arr = $this->OBJ_PIN->getAllPinRequest($limit,$page);
        $arr_length = count($pin_detail_arr);
        for ($i = 0; $i < $arr_length; $i++) {

            $user_id = $pin_detail_arr["detail$i"]["user_id"];
            $pin_detail_arr["detail$i"]["user_name"] = $obj_val->IdToUserName($user_id);

            if ($pro_status == "yes") {
                $prodcut_id = $pin_detail_arr["detail$i"]["product_id"];
                $pin_detail_arr["detail$i"]["product_name"] = $this->OBJ_PRODUCT->getPrdocutName($prodcut_id);
            }
        }
        return $pin_detail_arr;
    }

    public function getAllPinRequestCount() {
        $this->db->select('count(*) as cnt');
        $this->db->from("pin_request");
        $this->db->where("status", "yes");
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            return $row->cnt;
        }
    }

    public function insertPinRequest($req_user, $cnt, $request_date, $expiry_date, $pin_amount) {


        return $res = $this->OBJ_PIN->insertPinRequest($req_user, $cnt, $request_date, $expiry_date, $pin_amount);
    }

    public function getAllProducts($status) {
        return $this->OBJ_PRODUCT->getAllProducts('yes');
    }

    public function getBalanceAmountWithoutTds($user_id) {
        require_once 'Ewallet.php';
        $obj_ewallet = new Wallet();
        $balance_amount = $obj_ewallet->getBalanceAmountWithoutTds($_SESSION['user_id']);
        return $balance_amount;
    }

    public function getProduct() {

        $arr=array();
        $this->db->select("product_name,product_id");
        $this->db->from("product");
        $result = $this->db->get();

        $i = 0;
        foreach ($result->result_array() as $row) {
            $arr[$i]["product_name"] = $row['product_name'];
            $arr[$i]["product_id"] = $row['product_id'];
            $i++;
        }
        return $arr;
    }

    public function generateEpin($user_name, $amount, $count, $expiry_date) {
        $user_id = $this->userNameToId($user_name);
        $user = $this->session->userdata("logged_in");
        $user_type = $user["user_type"];
        $gen_user_id = $user["user_id"];
        if($user_type=='employee'){
            $this->load->model('validation');
            $gen_user_id=$this->validation->getAdminId(); 
        }
        $status = "yes";
        $uploded_date = date('Y-m-d h:m:s');
        $pin_alloc_date = date('Y-m-d h:m:s');
        if ($user_name != "" && $count != "") {
            for ($i = 0; $i < $count; $i++) {
                $passcode = $this->OBJ_MISC->getRandStr(9, 9);
                $res = $this->insertPasscode($passcode, $status, $uploded_date, $gen_user_id, $user_id, $amount, $expiry_date, $pin_alloc_date);
            }
            return $res;
        }
    }

    public function userNameToId($user_name) {

        $this->db->select("id");
        $this->db->from("ft_individual");
        $this->db->where("user_name", $user_name);
        $result = $this->db->get();

        foreach ($result->result() as $row) {

            return $row->id;
        }
    }

    public function getPinDetailsBasedData($from, $to) {

        if ($from != "" && $to != "") {

            require_once 'validation.php';
            $this->OBJ_VALI = new Validation();

            $from = $from . " 00:00:00";
            $to = $to . " 23:59:59";
            $this->db->select("pin_prod_refid,pin_numbers,status,allocated_user_id,pin_alloc_date");
            $this->db->from("pin_numbers");
            $this->db->where("pin_alloc_date between '$from' and '$to'");
            $this->db->where("allocated_user_id !=", "NA");
            $this->db->where("purchase_status", "no");
            $result = $this->db->get();

            $i = 0;
            foreach ($result->result_array() as $row) {

                $arr[$i]["pin_prod_refid"] = $row['pin_prod_refid'];
                $arr[$i]["productname"] = $this->getProductName($row['pin_prod_refid']);
                $arr[$i]["pin_numbers"] = $row['pin_numbers'];
                $arr[$i]["status"] = $row['status'];
                $arr[$i]["pin_uploded_date"] = $row['pin_alloc_date'];
                $arr[$i]["allocated_user"] = $this->OBJ_VALI->IdToUserName($row['allocated_user_id']);
                $i++;
            }
            return $arr;
        }
    }

    public function getProductName($product_id) {

        $this->db->select("product_name");
        $this->db->from("product");
        $this->db->where("product_id", $product_id);
        $result = $this->db->get();
        $this->db->last_query();

        foreach ($result->result() as $row) {
            return $row->product_name;
        }
    }

    public function getProductId($product_id) {

        $this->db->select("prod_id");
        $this->db->from("product");
        $this->db->where("product_id", $product_id);
        $result = $this->db->get();


        foreach ($result->result() as $row) {
            return $row->prod_id;
        }
    }

    public function getPinDetailsForUser($user_name) {
        $arr = array();
        if ($user_name != "") {
            $user_id = $this->userNameToId($user_name);
            $this->db->select("pin_prod_refid,pin_numbers,pin_uploded_date,pin_id");
            $this->db->from("pin_numbers");
            $this->db->where("allocated_user_id ='$user_id' AND status ='yes'");
            $result = $this->db->get();
            $i = 0;
            foreach ($result->result_array() as $row) {
                $arr[$i]["pin_prod_refid"] = $row['pin_prod_refid'];
                $arr[$i]["productname"] = $this->getProductName($row['pin_prod_refid']);
                $arr[$i]["pin_numbers"] = $row['pin_numbers'];
                $arr[$i]["pin_uploded_date"] = $row['pin_uploded_date'];
                $arr[$i]["id"] = $row['pin_id'];
                $arr[$i]["prod_id"] = $this->getProductId($row['pin_prod_refid']);
                $i++;
            }
            return $arr;
        }
    }

    public function insertPasscode($passcode, $status, $pin_uploded_date, $generated_user, $allocate_id, $amount, $expiry_date, $pin_alloc_date = "") {

        $used_user = "";
        $array = array('pin_numbers' => $passcode, 'pin_alloc_date' => $pin_alloc_date, 'status' => $status, 'used_user' => $used_user, 'pin_uploded_date' => $pin_uploded_date, 'generated_user_id' => $generated_user, 'allocated_user_id' => $allocate_id, 'pin_amount' => $amount, 'pin_expiry_date' => $expiry_date, 'pin_balance_amount'=>$amount);
        $this->db->set($array);
        $res = $this->db->insert('pin_numbers');
        return $res;
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getAllActivePinspage() {
        $num = $this->OBJ_PIN->getAllActivePinspage();
        return $num;
    }

    public function getMaxPinCount() {
        $maxpincount = $this->OBJ_PIN->getMaxPinCount();
        return $maxpincount;
    }

    public function generateEpinWithOut($user_name, $count) {
        $user_id = $this->userNameToId($user_name);
        $status = "yes";
        $user = $this->session->userdata("logged_in");
        $gen_user_id = $user["user_id"];
        $uploded_date = date('Y-m-d h:m:s');
        $pin_alloc_date = date('Y-m-d h:m:s');
        if ($user_name != "" && $count != "") {
            for ($i = 0; $i < $count; $i++) {
                $passcode = $this->OBJ_MISC->getRandStr(9, 9);
                $res = $this->insertPasscode($passcode, $status, $uploded_date, $gen_user_id, $user_id, "", $pin_alloc_date);
            }
            return $res;
        }
    }

    public function getPinDetailsBasedData11($from, $to,$limit='',$page='') {
        $arr = array();
        if ($from != "" && $to != "") {

            require_once 'validation.php';
            $this->OBJ_VALI = new Validation();

            $from = $from . " 00:00:00";
            $to = $to . " 23:59:59";
            $this->db->select("*");
            $this->db->from("pin_numbers");
            $this->db->where("pin_alloc_date between '$from' and '$to'");
            $this->db->where("allocated_user_id !=", "NA");
            $this->db->where("purchase_status", "no");
            $this->db->limit($limit,$page);
            $result = $this->db->get();
            $i = 0;
            foreach ($result->result_array() as $row) {
                $arr[$i]["pin_numbers"] = $row['pin_numbers'];
                $arr[$i]["status"] = $row['status'];
                $arr[$i]["pin_uploded_date"] = $row['pin_alloc_date'];
                $arr[$i]["used_user"] = $row['used_user'];
                $arr[$i]["amount"] = $row['pin_amount'];
                $arr[$i]["pin_balance_amount"] = $row['pin_balance_amount'];
                $arr[$i]["expiry_date"] = $row['pin_expiry_date'];
                $arr[$i]["allocated_user"] = $this->OBJ_VALI->IdToUserName($row['allocated_user_id']);
                $i++;
            }
            return $arr;
        }
    }

    public function getPinDetailsBasedData11Count($from, $to) {
        $this->db->select('count(*) as cnt');
        $this->db->from("pin_numbers");
        $this->db->where("pin_alloc_date between '$from' and '$to'");
        $this->db->where("allocated_user_id !=", "NA");
        $this->db->where("purchase_status", "no");
        $result = $this->db->get();
        foreach ($result->result() as $row) {
            return $row->cnt;
        }
    }

    public function getPinDetailsForUser11($user_name, $limit, $page) {
        $arr = array();
        if ($user_name != "") {
            $user_id = $this->userNameToId($user_name);

            $this->db->select("*");
            $this->db->from("pin_numbers");
            $this->db->where("allocated_user_id ='$user_id' AND status ='yes'");
            $this->db->limit($limit, $page);
            $result = $this->db->get();
            // echo $this->db->last_query();
            $i = 0;
            foreach ($result->result_array() as $row) {

                $arr[$i]["pin_numbers"] = $row['pin_numbers'];
                $arr[$i]["pin_uploded_date"] = $row['pin_uploded_date'];
                $arr[$i]["id"] = $row['pin_id'];
                $arr[$i]["expiry_date"] = $row['pin_expiry_date'];
                $arr[$i]["amount"] = $row['pin_amount'];
                $arr[$i]["pin_balance_amount"] = $row['pin_balance_amount'];
                $i++;
            }


            return $arr;
        }
    }

    public function getPinDetailsForUser11Count($user_name) {
        $user_id = $this->userNameToId($user_name);
        $this->db->select('count(*) as cnt');
        $this->db->from('pin_numbers');
        $this->db->where("allocated_user_id ='$user_id' AND status ='yes'");
        $result = $this->db->get();
        foreach ($result->result() as $row) {
            return $row->cnt;
        }
    }

    public function getActveInactivePinDetails() {
        $this->table_prefix = $_SESSION["table_prefix"];
        $pin_numbers = $this->table_prefix . "pin_numbers";
        $qr = "SELECT allocated_user_id  FROM $pin_numbers GROUP BY allocated_user_id";
        $query = $this->selectData($qr, "ERROR ON SELECTING ALLOCATED USER ID-423658347");
        $i = 0;
        while ($row = mysql_fetch_array($query)) {
            $user_id = $row["allocated_user_id"];
            $details[$i]["user_id"] = $user_id;
            $details[$i]["user_name"] = $this->OBJ_VALI->IdToUserName($user_id);
            $details[$i]["full_name"] = $this->OBJ_VALI->getFullName($user_id);
            $details[$i]["inactive_count"] = $this->getAciveInactiveCount($user_id, "inactive");
            $details[$i]["active_count"] = $this->getAciveInactiveCount($user_id, "active");
            $details[$i]["total_count"] = $details[$i]["inactive_count"] + $details[$i]["active_count"];
            $i++;
        }//WHILE LOOP ENDS [ while ($row = mysql_fetch_array($query)) ]

        return $details;
    }

//FUNCTION ENDS [ public function getActveInactivePinDetails() ]

    public function getAciveInactiveCount($user_id, $status) {
        if ($status == "active") {
            $stat = "yes";
        }//IF ENDS [ if($status=="active") ]
        else if ($status == "inactive") {
            $stat = "no";
        }//ELSE IF ENDS [ else if ($status=="inactive") ]

        $pin_numbers = $this->table_prefix . "pin_numbers";

        $qr = "SELECT count(*) as count FROM $pin_numbers WHERE allocated_user_id = $user_id AND status = '$stat'";
        $result = $this->selectData($qr, "ERROR ON SELECTING PIN -33443-ss");
        $row = mysql_fetch_array($result);
        return $row["count"];
    }

//FUNCTION ENDS  [ public function getAciveInactiveCount($user_id,$status) ]

    public function getUnallocatedPinCount() {
        $user_id = $this->LOG_USER_ID;
        $user_type = $this->LOG_USER_TYPE;
        if($user_type=='employee'){
           $this->load->model('validation');
           $user_id=$this->validation->getAdminId(); 
        }
        $this->db->select("COUNT(*) AS count");
        $this->db->from("pin_numbers");
        $this->db->where("allocated_user_id", "NA");
        $this->db->where("generated_user_id", $user_id);
        $this->db->like("status", "yes");
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            return $row->count;
        }
    }

    public function isUserNameAvailable($user_name) {
        $res = $this->OBJ_VALI->isUserNameAvailable($user_name);
        return $res;
    }

    public function getAllPinCount($user_id = '') {
        //code added by jiji ----06/02/2013

        $count = 0;
        if ($user_id == "") {
            $this->db->select('*');
            $this->db->from('pin_numbers');
            $this->db->where('status !=', 'delete');
            $count = $this->db->count_all_results();
        } else {
            $this->db->select('*');
            $this->db->from('pin_numbers');
            $this->db->where('status !=', 'delete');
            $this->db->where('allocated_user_id', $user_id);
            $count = $this->db->count_all_results();
        }
        return $count;
    }

    public function getUsedPinCount($user_id = '') {
        //code added by jiji ----06/02/2013
        $count = 0;
        if ($user_id == "") {
            $this->db->select('*');
            $this->db->from('pin_numbers');
            $this->db->where('status', 'no');

            $count = $this->db->count_all_results();
        } else {
            $this->db->select('*');
            $this->db->from('pin_numbers');
            $this->db->where('status', 'no');
            $this->db->where('allocated_user_id', $user_id);
            $count = $this->db->count_all_results();
        }
        return $count;
    }

    public function getRequestedPinCount($user_id = '') {
        //code added by jiji ----06/02/2013
        $count = 0;
        if ($user_id == "") {
            $this->db->select_sum('req_pin_count');
            $this->db->from('pin_request');
            $this->db->where('status', 'yes');
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                if ($row->req_pin_count != "")
                    $count = $row->req_pin_count;
            }
        } else {
            $this->db->select_sum('req_pin_count');
            $this->db->from('pin_request');
            $this->db->where('status', 'yes');
            $this->db->where('req_user_id', $user_id);
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                if ($row->req_pin_count != "")
                    $count = $row->req_pin_count;
            }
        }
        return $count;
    }

    public function getPinDetails($pin_number) {

        $details = Array();
        $i = 0;
        $this->db->select('status,allocated_user_id,pin_uploded_date,pin_expiry_date,pin_amount,pin_balance_amount');
        $this->db->where('pin_numbers', $pin_number);
        $query = $this->db->get('pin_numbers');
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            foreach ($query->result_array() as $row) {

                $details["detail$i"]["pin_number"] = $pin_number;
                $details["detail$i"]["status"] = $row['status'];
                $details["detail$i"]["allocated_user_id"] = $this->OBJ_VALI->IdToUserName($row['allocated_user_id']);
                $details["detail$i"]["pin_uploaded_date"] = $row['pin_uploded_date'];
                $details["detail$i"]["pin_expiry_date"] = $row['pin_expiry_date'];
                $details["detail$i"]["pin_amount"] = $row['pin_amount'];
                $details["detail$i"]["pin_balance_amount"] = $row['pin_balance_amount'];
                $i++;
            }
        }

        return $details;
    }

    public function getPinSearch($amount) {

        $details = Array();
        $i = 0;
        $this->db->select('status,pin_numbers,allocated_user_id,pin_uploded_date,pin_expiry_date,pin_balance_amount');
        $this->db->where('pin_amount', $amount);
        $query = $this->db->get('pin_numbers');
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            foreach ($query->result_array() as $row) {

                $details["detail$i"]["pin_number"] = $row['pin_numbers'];
                $details["detail$i"]["status"] = $row['status'];
                $details["detail$i"]["allocated_user_id"] = $this->OBJ_VALI->IdToUserName($row['allocated_user_id']);
                $details["detail$i"]["pin_uploaded_date"] = $row['pin_uploded_date'];
                $details["detail$i"]["pin_expiry_date"] = $row['pin_expiry_date'];
                $details["detail$i"]["pin_amount"] = $amount;
                $details["detail$i"]["pin_balance_amount"] = $row['pin_balance_amount'];
                $i++;
            }
        }

        return $details;
    }

    public function getAllEwalletAmounts() {
        $i = 0;
        $this->db->select('id');
        $this->db->select('amount');
        $this->db->from('pin_amount_details');
        $this->db->order_by("amount", "asc");
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
            $amount_detail["details$i"]["id"] = $row['id'];
            $amount_detail["details$i"]["amount"] = $row['amount'];
            $i++;
        }
        return $amount_detail;
    }
    public function addPinAmount($amount) {
        $this->db->set('amount', $amount);
        $res = $this->db->insert('pin_amount_details');
        return $res;
    }

    public function deletePinAmount($id) {
        $this->db->where('id', $id);
        $res = $this->db->delete('pin_amount_details');
        return $res;
    }

    public function check_pin_amount($amount) {
        $flag = false;
        $this->db->select('id');
        $this->db->from('pin_amount_details');
        $this->db->where('amount', $amount);
        $this->db->limit(1);
        $res = $this->db->get();
        $amount_avilable = $res->num_rows();
        if ($amount_avilable > 0) {
            $flag = true;
        }
        return $flag;
    }

}
