<?php

require_once 'Inf_Model.php';

class ewallet_model extends Inf_Model {

    public $OBJ_MISC;
    private $mailObj;

    public function __construct() {
        require_once 'validation.php';
        $this->OBJ_VALI = new Validation();

        require_once 'Misc.php';
        $this->OBJ_MISC = new Misc();

        require_once 'Phpmailer.php';
        $this->mailObj = new PHPMailer();

        // require_once 'Pin.php';
        // $this->OBJ_PIN = new Pin();
    }

//////////////////////vaisakh 12th jan starts//////	
    public function userNameToID($user_name) {
        $user_id = $this->OBJ_VALI->userNameToID($user_name);
        return $user_id;
    }

//////////////////////vaisakh 12th jan ends//////        

    public function IdToUserName($user_name) {
        $user_id = $this->OBJ_VALI->IdToUserName($user_name);
        return $user_id;
    }

//////////////////////vaisakh 14th jan starts//////
    public function getAllProducts($status) {
        $i = 0;
        $this->db->select('product_id');
        $this->db->select('product_name');
        $this->db->select('active');
        $this->db->select('date_of_insertion');
        $this->db->select('prod_id');
        $this->db->select('product_value');
        $this->db->from('product');
        $this->db->where('active', $status);
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
            $product_detail["details$i"]["id"] = $row['product_id'];
            $product_detail["details$i"]["name"] = $row['product_name'];
            $product_detail["details$i"]["active"] = $row['active'];
            $product_detail["details$i"]["date"] = $row['date_of_insertion'];
            $product_detail["details$i"]["prod_id"] = $row['prod_id'];
            $product_detail["details$i"]["product_value"] = $row['product_value'];
            $i++;
        }
        return $product_detail;
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

//////////////////////vaisakh 14th jan ends//////        
//////////////////vaisakh 12th jan starts///    
    public function getBalanceAmount($user_id) {
        $this->db->select('balance_amount');
        $this->db->from('user_balance_amount');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        foreach ($query->result() as $row)
            return $row->balance_amount;
    }

    ////////////// MUJEEB REHMAN O FOR MOBILE APPLICATION ////////////////

    public function getBalanceAmountforMobile($user_id, $table_perfix) {
        $this->db->select('balance_amount');
        $this->db->from($table_perfix . '_user_balance_amount');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        foreach ($query->result() as $row)
            return $row->balance_amount;
    }

    /////////////// ENDS /////////////////////////////////////////////////

    public function getUserPassword($user_id) {
        $this->db->select('tran_password');
        $this->db->from('tran_password');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        foreach ($query->result() as $row)
            return $row->tran_password;
    }

    public function insertBalAmountDetails($from_user_id, $to_user_id, $trans_amount, $amount_type = '', $transaction_concept = '') {
        $date = date("Y-m-d H:i:s");

        if ($amount_type != '') {
            $data = array(
                'from_user_id' => $from_user_id,
                'to_user_id' => $to_user_id,
                'amount' => $trans_amount,
                'date' => $date,
                'amount_type' => $amount_type,
                'transaction_concept' => $transaction_concept
            );
            $res = $this->db->insert('fund_transfer_details', $data);
        } else {
            $data = array(
                'from_user_id' => $from_user_id,
                'to_user_id' => $to_user_id,
                'amount' => $trans_amount,
                'date' => $date,
                'amount_type' => 'user_credit',
                'transaction_concept' => $transaction_concept
            );
            $res = $this->db->insert('fund_transfer_details', $data);
            $data = array(
                'from_user_id' => $to_user_id,
                'to_user_id' => $from_user_id,
                'amount' => $trans_amount,
                'date' => $date,
                'amount_type' => 'user_debit',
                'transaction_concept' => $transaction_concept
            );
            $res = $this->db->insert('fund_transfer_details', $data);
        }
    }

    public function updateBalanceAmountDetails($from_user_id, $to_user_id, $trans_amount) {
        $this->db->set('balance_amount', 'balance_amount - ' . $trans_amount, FALSE);
        $this->db->where('user_id', $from_user_id);
        $this->db->update('user_balance_amount');

        $this->db->set('balance_amount', 'balance_amount + ' . $trans_amount, FALSE);
        $this->db->where('user_id', $to_user_id);
        $up_date2 = $this->db->update('user_balance_amount');

        return $up_date2;
    }

//////////////////vaisakh 12th jan ends///      	
    /*     * *********************vaisakh 14th jan starts************** */
    public function getProductAmount($product_id) {
        $prod_arr = array();
        $this->db->select('product_value');
        $this->db->select('product_name');
        $this->db->from('product');
        $this->db->where('product_id', $product_id);
        $res = $this->db->get();
        foreach ($res->result_array() as $row10) {
            $prod_arr['product_value'] = $row10['product_value'];
            $prod_arr['product_name'] = $row10['product_name'];
        }
        return $prod_arr;
    }

    public function getEwalletAmount($amount_id) {
        $amount_arr = array();
        $this->db->select('amount');
        $this->db->from('pin_amount_details');
        $this->db->where('id', $amount_id);
        $res = $this->db->get();
        foreach ($res->result_array() as $row10) {
            $amount_arr['amount'] = $row10['amount'];
        }
        return $amount_arr;
    }

    /*     * *********************vaisakh 14th jan starts************** */

    public function updateBalanceAmount($user_id, $bal) {
        $data = array(
            'balance_amount' => $bal
        );
        $this->db->where('user_id', $user_id);
        $result = $this->db->update('user_balance_amount', $data);
        return $result;
    }

    /*     * *********************vaisakh 14th jan ends************** */

/////////////////////////vaisakh on 12th jan starts	
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

/////////////////////////vaisakh on 12th jan ends	
    public function getEwalletDetails($id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $fund_transfer_details = $this->table_prefix . "fund_transfer_details";

        $qr = "SELECT to_user_id,amount,date FROM $fund_transfer_details WHERE from_user_id='$id' ";
        $result = $this->selectData($qr, "ERROR-HFGJKHGKHKGHKJGJK");
        $i = 0;
        while ($row = mysql_fetch_array($result)) {
            $arr[$i]["amount"] = $row['amount'];
            $arr[$i]["date"] = $row['date'];
            $arr[$i]["to_user_name"] = $this->getName($row['to_user_id']);
            $i++;
        }
        return $arr;
    }

    /*     * *********************vaisakh 16th jan starts************** */

    public function getName($id, $table_prefix = "") {
        $this->db->select('user_name');
        $this->db->from($table_prefix . 'ft_individual');
        $this->db->where('id', $id);
        $result = $this->db->get();
        //echo "<br/>qryyyyyy--".$this->db->last_query();
        foreach ($result->result() as $row)
            return $row->user_name;
    }

    /*     * *********************vaisakh 16th jan ends************** */

    public function getBalancePin($user_id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $pin_numbers = $this->table_prefix . "pin_numbers";

        $select = "SELECT COUNT(*) AS balance FROM $pin_numbers WHERE allocated_user_id='$user_id' AND status='yes'";
        $res = $this->selectData($select, "Error on select balance pin");
        $row = mysql_fetch_array($res);
        $balance = intval($row['balance']);
        return $balance;
    }

    public function balanceEpinUSer($user_id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $pin_numbers = $this->table_prefix . "pin_numbers";
        $select = "SELECT COUNT(*) AS balance FROM $pin_numbers WHERE allocated_user_id='$user_id' AND status='yes'";
        $res = $this->selectData($select, "Error on select balance pinuser");
        $row = mysql_fetch_array($res);
        $balance = intval($row['balance']);
        return $balance;
    }

    public function generateEpin($user_id, $how_much_pin, $to_user_name_id, $pass) {
        require_once 'Misc.php';
        $this->OBJ_MISC = new Misc();

        if ($_SESSION['user_type'] == "admin") {
            $pass_table = $this->getPass($user_id);
        } else {
            $pass_table = $this->getPass($user_id);
        }
        $pass_c = md5($pass);
        if ($pass_table == $pass_c) {
            if ($this->table_prefix == "") {
                $this->table_prefix = $_SESSION['table_prefix'];
            }
            $pin_numbers = $this->table_prefix . "pin_numbers";

            $delete = "DELETE FROM $pin_numbers WHERE allocated_user_id = '$user_id' AND status='yes' LIMIT $how_much_pin";
            //echo "$delete <br>";
            $res = $this->deleteData($delete, "Error on delete E-Pin");

            require_once 'Pin.php';
            $OBJ_PIN = new Pin();

            $status = "yes";
            $uploded_date = date('Y-m-d');
            //$product = 1;

            for ($m = 0; $m < $how_much_pin; $m++) {
                $passcode = $this->OBJ_MISC->getRandStr(9, 9);
                $res = $OBJ_PIN->insertPasscode($passcode, $status, $uploded_date, $to_user_name_id, $to_user_name_id, $product);
            }
            $flag = true;
        } else {
            $flag = false;
            echo "<script>alert('you enter invalid password');</script>";
        }
        return $flag;
    }

    public function getPass($id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $login_user = $this->table_prefix . "login_user";

        $qr = "SELECT password FROM $login_user WHERE user_id=$id";
        $result = $this->selectData($qr, "ERROJGKJJKKJHKKJGHK");
        $row = mysql_fetch_array($result);
        return $row['password'];
    }

    public function allocatePasscodes($pro_status, $pin_count, $passcode, $status, $uploded_date, $admin_id, $allocate_id, $product) {
        if ($pro_status == "yes") {
            require_once 'Pin.php';
        } else {
            require_once 'PinWithOutProduct.php';
        }
        $OBJ_PIN = new Pin();

        for ($m = 0; $m < $pin_count; $m++) {
            $passcode = $this->OBJ_MISC->getRandStr(9, 9);
            $res = $OBJ_PIN->insertPasscode($passcode, $status, $uploded_date, $admin_id, $allocate_id, $product, 'yes');
        }
        return $res;
    }

    /*     * *************vaisakh 15th jan starts**************** */

    public function addUserBalanceAmount($to_userid, $amount) {
        $this->db->set('balance_amount', 'balance_amount + ' . $amount, FALSE);
        $this->db->where('user_id', $to_userid);
        $res = $this->db->update('user_balance_amount');
        return $res;
    }

    public function deductUserBalanceAmount($to_userid, $amount) {
        $this->db->set('balance_amount', 'balance_amount - ' . $amount, FALSE);
        $this->db->where('user_id', $to_userid);
        $res = $this->db->update('user_balance_amount');
        return $res;
    }

    /*     * *************vaisakh 15th jan ends**************** */
    /*     * *********************vaisakh jan 16th starts*************** */

    public function getUserEwalletDetails($user_id, $from_date, $to_date) {
        $details = array();
        //$this->db->select_sum('amount', 'total_amount');
        $this->db->select_sum('amount');
        $this->db->select('date');
        $this->db->select('amount_type');
        $this->db->from('fund_transfer_details');
        $this->db->where('to_user_id', $user_id);
        $this->db->where("date BETWEEN '$from_date' AND '$to_date'");
        $this->db->group_by('amount_type');
        $res1 = $this->db->get();
        //echo $this->db->last_query(); die();
        $i = 0;
        foreach ($res1->result_array() as $row1) {
            $details["$i"]["total_amount"] = $row1["amount"];
            $details["$i"]["date"] = $row1["date"];
            $details["$i"]["amount_type"] = $row1['amount_type'];
            $i++;
        }
        return $details;
    }

    /*     * *********************vaisakh jan 16th ends*************** */

    public function isUserNameAvailable($user_name) {
        $res = $this->OBJ_VALI->isUserNameAvailable($user_name);
        return $res;
    }

    /*     * *********************vaisakh jan 14th starts*************** */

    //----------Added By M.Ali.KM--------//
    public function getPinAmount() {
        $this->db->select('pin_amount');
        $this->db->from('pin_config');
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
            $value = $row['pin_amount'];
        }
        return $value;
    }

    /*     * ************MUJEEB REHMAN O FOR MOBILE ************* */

    public function getPinAmountForMoblie($table_prefix) {
        $this->db->select('pin_amount');
        $this->db->from($table_prefix . '_pin_config');
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
            $value = $row['pin_amount'];
        }
        return $value;
    }

    /*     * **************************************************** */

    public function allocatePin($pin_num, $product = "") {
        $count = $this->getAvailablePinCount($product);
        $pins = $this->getPinsToAllocate($pin_num, $product);
        if ($count >= $pin_num) {
            $user_id = $this->session->userdata['logged_in']['user_id'];
            for ($i = 0; $i < $pin_num; $i++) {
                $pin = $pins["pin$i"];
                $id = $pins["id$i"];
                $this->allocatePinToUser($user_id, $pin, $id);
            }
            $flag = 1;
        } else {
            $flag = 0;
        }
        return $flag;
    }

    public function getPinsToAllocate($pin_num, $product = "") {
        $pin = array();
        if ($product != "") {
            $this->db->select('pin_numbers');
            $this->db->select('pin_id');
            $this->db->from('pin_numbers');
            $this->db->where('pin_prod_refid', $product);
            $this->db->where('allocated_user_id', 'NA');
            $this->db->where('status', 'yes');
            $this->db->limit($pin_num);
            $res = $this->db->get();
        } else {
            $this->db->select('pin_numbers');
            $this->db->select('pin_id');
            $this->db->from('pin_numbers');
            $this->db->where('allocated_user_id', 'NA');
            $this->db->where('status', 'yes');
            $this->db->limit($pin_num);
            $res = $this->db->get();
        }
        $i = 0;
        foreach ($res->result_array() as $row) {
            $pin["pin$i"] = $row['pin_numbers'];
            $pin["id$i"] = $row['pin_id'];
            $i++;
        }

        return $pin;
    }

    public function allocatePinToUser($user_id, $pin, $id) {
        $date = date("Y-m-d H:i:s");
        $data = array(
            'allocated_user_id' => $user_id,
            'pin_alloc_date' => $date,
            'purchase_status' => 'yes',
        );
        $this->db->where('pin_id', $id);
        $this->db->where('pin_numbers', $pin);
        $this->db->update('pin_numbers', $data);
    }

    public function getAvailablePinCount($product = "") {
        if ($product != "") {
            $this->db->select('COUNT(allocated_user_id) AS cnt');
            $this->db->from('pin_numbers');
            $this->db->where('pin_prod_refid', $product);
            $this->db->where('allocated_user_id', 'NA');
            $this->db->where('status', 'yes');
            $res = $this->db->get();
        } else {
            $this->db->select('COUNT(allocated_user_id) AS cnt');
            $this->db->from('pin_numbers');
            $this->db->where('allocated_user_id', 'NA');
            $this->db->where('status', 'yes');
            $res = $this->db->get();
        }
        foreach ($res->result_array() as $row) {
            $cnt = $row['cnt'];
        }
        return $cnt;
    }

    /*     * *********************vaisakh jan 14th ends*************** */
    /*     * *********************vaisakh jan 16th starts*************** */

    public function getJoiningDate($user_id, $table_perfix = "") {

        if ($table_perfix == "")
            $table_name = "ft_individual";
        else {
            $table_name = $table_perfix . "_ft_individual";
        }
        $table_name = $table_perfix . "ft_individual";
        $this->db->select('date_of_joining');
        $this->db->from($table_name);
        $this->db->where('id', $user_id);
        $res = $this->db->get();
        foreach ($res->result() as $row)
            return $row->date_of_joining;
    }

    public function getCommissionDetails($user_id, $from_date, $to_date, $product_status) {

        $i = 0;
        $details = array();
        $from_user_name = "";
        if ($from_date != "" && $to_date != "") {
            $start = $from_date . " 00:00:00";
            $end = $to_date . " 23:59:59";
        }

        $this->db->select('amount_payable');
        $this->db->select('total_amount');
        $this->db->select('amount_type');
        $this->db->select('date_of_submission');
        $this->db->from('leg_amount');
        $this->db->where('user_id', $user_id);
        if ($from_date != "" && $to_date != "")
            $this->db->where("date_of_submission BETWEEN '$start' AND '$end'");
        $this->db->order_by('date_of_submission');
        $res2 = $this->db->get();
        foreach ($res2->result_array() as $row2) {
            $details[$i]['total_amount'] = $row2['amount_payable'];
            $details[$i]['amount_type'] = $this->validation->getViewAmountType($row2['amount_type']);
            $details[$i]['date'] = date('Y-m-d', strtotime($row2['date_of_submission']));
            $details[$i]['full_date'] = strtotime($row2['date_of_submission']);
            $i++;
        }
        $this->db->select('amount as total_amount');
        $this->db->select('date');
        $this->db->select('amount_type');
        $this->db->select('from_user_id');
        $this->db->select('to_user_id');

        $this->db->from('fund_transfer_details');
        $this->db->where("to_user_id", $user_id);
        if ($from_date != "" && $to_date != "")
            $this->db->where("date BETWEEN '$start' AND '$end'");
        $this->db->order_by('date');
        $res1 = $this->db->get();
        if ($res1->num_rows() != 0) {
            foreach ($res1->result_array() as $row1) {

                $details[$i]['total_amount'] = $row1['total_amount'];
                $details[$i]['amount_type'] = $row1['amount_type'];
                $from_user_id = $row1['from_user_id'];
                $from_user_name = $this->getName($from_user_id);
                $details[$i]['from_user_name'] = $from_user_name;
                $details[$i]['date'] = date('Y-m-d', strtotime($row1['date']));
                $details[$i]['full_date'] = strtotime($row1['date']);
                $i++;
            }
        }

        $pin_status = $this->getPinStatus();
        $pro_status = $this->getProductStatus();

      if ($pin_status) {
            $this->db->select('pin_prod_refid');
            $this->db->select('pin_uploded_date');
            $this->db->select('pin_alloc_date');
            $this->db->select('pin_amount');
            $this->db->from('pin_numbers');
            $this->db->where('allocated_user_id', $user_id);
            $this->db->where('purchase_status', 'yes');
            if ($from_date != "" && $to_date != "")
                $this->db->where("pin_alloc_date BETWEEN '$start' AND '$end'");
            $res3 = $this->db->get();
            foreach ($res3->result_array() as $row3) {
 
                $details[$i]['total_amount'] = $row3['pin_amount'];
                $details[$i]['amount_type'] = $this->validation->getViewAmountType("pin_purchased");
                $details[$i]['date'] = date('Y-m-d', strtotime($row3['pin_alloc_date']));
                $details[$i]['full_date'] = strtotime($row3['pin_alloc_date']);
                $i++;
            }
        }

        $this->db->select('paid_amount,paid_date');
        $this->db->from('amount_paid');
        $this->db->where('paid_user_id', $user_id);
        $this->db->where('paid_type', "released");
        if ($from_date != "" && $to_date != "")
            $this->db->where("paid_date BETWEEN '$start' AND '$end'");
        $res7 = $this->db->get();
        foreach ($res7->result_array() as $row7) {
            $details[$i]['total_amount'] = $row7['paid_amount'];
            $details[$i]['amount_type'] = "payout_released";
            $details[$i]['date'] = date('Y-m-d', strtotime($row7['paid_date']));
//            $details[$i]['date'] = $from_date;
            $details[$i]['full_date'] = strtotime($row7['paid_date']);
            $i++;
        }


        $this->db->select('used_amount');
        $this->db->select('used_for');
        $this->db->select('date');

        $this->db->from('live_account_registration_details');
        $this->db->where('used_user_id', $user_id);
        if ($from_date != "" && $to_date != "")
            $this->db->where("date BETWEEN '$start' AND '$end'");
        $res4 = $this->db->get();
        foreach ($res4->result_array() as $row5) {

            $details[$i]['total_amount'] = $row5['used_amount'];
            $details[$i]['amount_type'] = $row5['used_for'];
            $details[$i]['date'] = date('Y-m-d', strtotime($row5['date']));
            $details[$i]['full_date'] = strtotime($row5['date']);
            $i++;
        }


        if (count($details) > 0) {
            foreach ($details as $key => $row) {
                $volume[$key] = $row['full_date'];
            }
            array_multisort($volume, SORT_ASC, $details);
        }
        return $details;
    }

    /*     * ******************************MUJEEB REHMAN O FOR MOBILE ********************************** */

    public function getCommissionDetailsForMobile($user_id, $table_prefix, $from_date, $to_date, $product_status) {
        $i = 0;
        $details = array();
        $from_user_name = "";
        while ($from_date <= $to_date) {
            $start = $from_date . " 00:00:00";
            $end = $from_date . " 23:59:59";
            //$count[$i]['date'] = $from_date;
            $this->db->select('amount_payable');
            $this->db->select('total_amount');
            $this->db->select('amount_type');
            $this->db->select('date_of_submission');
            $this->db->from($table_prefix . '_leg_amount');
            $this->db->where('user_id', $user_id);
            $this->db->where("date_of_submission BETWEEN '$start' AND '$end'");
            $this->db->order_by('date_of_submission');
            $res2 = $this->db->get();
            foreach ($res2->result_array() as $row2) {
                $details[$i]['total_amount'] = $row2['amount_payable'];
                $details[$i]['amount_type'] = $row2['amount_type'];
                $details[$i]['date'] = $from_date;
                $i++;
            }

            $this->db->select('amount as total_amount');
            $this->db->select('date');
            $this->db->select('amount_type');
            $this->db->select('from_user_id');
            $this->db->select('to_user_id');
            $this->db->from($table_prefix . '_fund_transfer_details');
            $this->db->where("to_user_id", $user_id);
            $this->db->where("date BETWEEN '$start' AND '$end'");
            $this->db->order_by('date');
            $res1 = $this->db->get();
            if ($res1->num_rows() != 0) {
                foreach ($res1->result_array() as $row1) {

                    $details[$i]['total_amount'] = $row1['total_amount'];
                    $details[$i]['amount_type'] = $row1['amount_type'];
                    $from_user_id = $row1['from_user_id'];
                    $from_user_name = $this->getName($from_user_id, $table_prefix . "_");
                    $details[$i]['from_user_name'] = $from_user_name;
                    $details[$i]['date'] = $from_date;
                    $i++;
                }
            } /* else {
              $details[$i]['total_amount'] = 0;
              $details[$i]['amount_type'] = 0;
              $details[$i]['from_user_name'] = "";
              $details[$i]['date'] = $from_date;
              } */
            $pin_status = $this->getPinStatus($table_prefix . "_");
            $pro_status = $this->getProductStatus($table_prefix . "_");


            if ($pin_status) {
                $this->db->select('pin_prod_refid');
                $this->db->select('pin_uploded_date');
                $this->db->from($table_prefix . '_pin_numbers');
                $this->db->where('allocated_user_id', $user_id);
                $this->db->where('purchase_status', 'yes');
                $this->db->where("pin_alloc_date BETWEEN '$start' AND '$end'");
                $res3 = $this->db->get();
                foreach ($res3->result_array() as $row3) {
                    //if ($product_status == "yes") 
                    if ($pro_status) {
                        $product = $this->getProductAmount($row3['pin_prod_refid']);
                        $details[$i]['total_amount'] = $product["product_value"];
                    } else {
                        $pin_amount = $this->getPinAmountForMoblie($table_prefix);
                        $details[$i]['total_amount'] = $pin_amount;
                    }
                    $details[$i]['amount_type'] = "pin_purchased";
                    $details[$i]['date'] = $from_date;
                    //$details[$i]['from_user_name'] = "";
                    $i++;
                }
            }

            $this->db->select('paid_amount');
            $this->db->from($table_prefix . '_amount_paid');
            $this->db->where('paid_user_id', $user_id);
            $this->db->where('paid_type', "released");
            $this->db->where("paid_date BETWEEN '$start' AND '$end'");
            $res4 = $this->db->get();
            foreach ($res4->result_array() as $row4) {
                $details[$i]['total_amount'] = $row4['paid_amount'];
                $details[$i]['amount_type'] = "payout_released";
                $details[$i]['date'] = $from_date;
                $i++;
            }


            $from_date = date('Y-m-d', strtotime('+1 days', strtotime($from_date)));
        }
        return $details;
    }

    /*     * ******************************************************************************************* */

    public function getPinStatus($table_prefix = "") {
        $this->db->select('pin_status');
        $this->db->from($table_prefix . 'module_status');
        $res = $this->db->get();
        foreach ($res->result() as $row)
            $status = $row->pin_status;
        if ($status == 'yes')
            return true;
        else
            return false;
    }

    public function getProductStatus($table_prefix = "") {
        $this->db->select('product_status');
        $this->db->from($table_prefix . 'module_status');
        $res = $this->db->get();
        foreach ($res->result() as $row)
            $status = $row->product_status;
        if ($status == 'yes')
            return true;
        else
            return false;
    }

    /*     * *********************vaisakh jan 16th ends*************** */

    //-----------End---------------//
    /*     * ***************vaisakh jan 14th starts************* */
    public function getAdminEmailId() {
        $this->db->select('user_id');
        $this->db->from('login_user');
        $this->db->where('user_type', 'admin');
        $res1 = $this->db->get();
        foreach ($res1->result() as $row1) {
            $user_id = $row1->user_id;
        }
        $this->db->select('user_detail_email');
        $this->db->from('user_details');
        $this->db->where('user_detail_refid', $user_id);
        $res2 = $this->db->get();
        foreach ($res2->result() as $row2) {
            return $row2->user_detail_email;
        }
    }

    /*     * ***************vaisakh jan 14th starts************* */

    public function sendEmail($mailBodyDetails, $email) {
        $this->mailObj->From = "info@infinitemlmsoftware.com";
        $this->mailObj->FromName = "Infinitemlmsoftware.com";
        $this->mailObj->Subject = "Infinitemlmsoftware Notification";
        $this->mailObj->IsHTML(true);

        $this->mailObj->ClearAddresses();
        $this->mailObj->AddAddress($email);
        //if($FILE_NAME !="")
        //$this->mailObj->AddAttachment($FILE_NAME);

        $this->mailObj->Body = $mailBodyDetails;
        $res = $this->mailObj->send();
        $arr["send_mail"] = $res;
        if (!$res)
            $arr['error_info'] = $mail->ErrorInfo;
        return $arr;
    }

    /*     * ***********************vaisakh jan 14th starts********** */

    public function getTransactionPasscode($user_id) {
        $tran_passcodes = $this->table_prefix . "tran_password";
        $this->db->select('tran_password');
        $this->db->from('tran_password');
        $this->db->where('user_id', $user_id);
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            $passcode = $row->tran_password;
        }
        return $passcode;
    }

    /*     * ***********************vaisakh jan 14th ends********** */

    public function getGrandTotalEwallet($user_id = '') {

        $grand_total = 0;
        if ($user_id == "") {
            $this->db->select_sum('balance_amount');
            $this->db->from('user_balance_amount');
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                $grand_total = $row->balance_amount;
            }
        } else {
            $this->db->select('balance_amount');
            $this->db->from('user_balance_amount');
            $this->db->where("user_id", $user_id);
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                $grand_total = $row->balance_amount;
            }
        }
        return $grand_total;
    }

    //=========================
    public function generatePasscode($cnt, $status, $uploded_date, $amount, $expiry_date, $purchase_status) {

        require_once 'Pin.php';
        $OBJ_PIN = new Pin();
        for ($i = 0; $i < $cnt; $i++) {
            $passcode = $this->OBJ_MISC->getRandStr(9, 9);

            // $generated_user = $this->LOG_USER_ID;
            $user = $this->session->userdata("logged_in");
            $gen_user_id = $user["user_id"];
            if ($this->LOG_USER_TYPE == 'admin') {
                $allocated_user = $this->LOG_USER_ID;
            } else {
                $allocated_user = $gen_user_id;
            }
            $pin_alloc_date = date('Y-m-d') . " 23:59:59";


            $res = $OBJ_PIN->insertPasscode($passcode, $status, $uploded_date, $gen_user_id, $allocated_user, $amount, $expiry_date, $purchase_status, $pin_alloc_date);
        }
        return $res;
    }

    public function getMaxPinCount() {
        require_once 'Pin.php';
        $OBJ_PIN = new Pin();
        $maxpincount = $OBJ_PIN->getMaxPinCount();
        return $maxpincount;
    }

    public function getAllActivePinspage($purchase_status = '') {
        require_once 'Pin.php';
        $OBJ_PIN = new Pin();
        $num = $OBJ_PIN->getAllActivePinspage($purchase_status);
        return $num;
    }

    public function checkUser($user_name) {
        require_once 'validation.php';
        $obj_val = new Validation();
        $flag = false;
        $user_name = mysql_real_escape_string($user_name);
        $user_id = $obj_val->userNameToID($user_name);
        if ($user_id) {
            $flag = 1;
        }
        return $flag;
    }

    public function getTotalRequestAmount($user_id = "") {
        $req_amount = 0;
        $this->db->select_sum('requested_amount');
        $this->db->where('status', 'pending');
        if ($user_id != "")
            $this->db->where('requested_user_id', $user_id);
        $query = $this->db->get('payout_release_requests');
        foreach ($query->result() as $row) {
            $req_amount = $row->requested_amount;
        }
        return $req_amount;
    }

    public function getTotalReleasedAmount($user_id = "") {
        $released_amount = 0;
        $this->db->select_sum('paid_amount');
        $this->db->where('paid_type', 'released');
        if ($user_id != "")
            $this->db->where('paid_user_id', $user_id);
        $query = $this->db->get('amount_paid');
        foreach ($query->result() as $row) {
            $released_amount = $row->paid_amount;
        }
        return $released_amount;
    }

}
