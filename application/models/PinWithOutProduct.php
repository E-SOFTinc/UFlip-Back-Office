<?php

require_once 'Inf_Model.php';

class Pin extends Inf_Model {

    private $obj_val;
    var $active_pin = Array();
    var $all_pin = Array();
    var $used_pin = Array();
    var $active_search = Array();

    public function __construct() {
        //$this->connectDB();

        require_once 'validation.php';
        $this->obj_val = new Validation();
    }

    public function getNoOfRows($user_id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $pin_numbers = $this->table_prefix . "pin_numbers";
        $top = "select * from $pin_numbers where pin_alloc_user_ref_id = '$user_id' AND status ='active' ";
        $numresults = $this->selectData($top); // the query.
        $numrows = mysql_num_rows($numresults); // Number of rows returned from above query.
        return $numrows;
    }

    public function insertPinRequest($req_user, $cnt, $request_date, $expiry_date, $pin_amount) {
        $array = array('req_user_id' => $req_user, 'req_pin_count' => $cnt, 'req_rec_pin_count' => $cnt, 'req_date' => $request_date, 'status' => 'yes', 'pin_amount' => $pin_amount, 'pin_expiry_date' => $expiry_date);
        $this->db->set($array);
        $res = $this->db->insert('pin_request');
        return $res;
    }


    public function getActivePins($page, $limit) {

        $this->db->select("*");
        $this->db->from("pin_numbers");
        $this->db->where('status', 'yes');
        $this->db->order_by("pin_id");
        $this->db->limit($limit, $page);
        $search_my_active = $this->db->get();
        //echo 'jjjjj'.$this->db->last_query();
        /* $search_my_active = "select * from  $pin_numbers  where status ='yes' order by pin_id limit $page, $limit";

          //echo $search_my_active;
          $search_my_res_active = $this->selectData($search_my_active); */
        $cnt = $search_my_active->num_rows();
        if ($cnt > 0) {
            $i = 0;
            foreach ($search_my_active->result_array() as $search_active) {
                $this->active_pin["detail$i"]["pin_id"] = $search_active['pin_id'];
                $this->active_pin["detail$i"]["pin"] = $search_active['pin_numbers'];
                $this->active_pin["detail$i"]["pin_alloc_date"] = $search_active['pin_alloc_date'];
                $this->active_pin["detail$i"]["used_user"] = $search_active['used_user'];
                $this->active_pin["detail$i"]["pin_uploded_date"] = $search_active['pin_uploded_date'];
                $this->active_pin["detail$i"]["status"] = $search_active['status'];
                if ($search_active['allocated_user_id'] != "NA") {
                    $this->active_pin["detail$i"]["allocated_user"] = $this->obj_val->IdToUserName($search_active['allocated_user_id']);
                } else
                    $this->active_pin["detail$i"]["allocated_user"] = "NULL";
                $i++;
            }
        }
        //print_r($this->active_pin);
        return $this->active_pin;
    }

    public function getInactivePins($page, $limit) {
        $this->inactive_pin = array();
        $this->db->select("*");
        $this->db->from("pin_numbers");
        $this->db->where("status", "no");
        $this->db->order_by("pin_id");
        $this->db->limit($limit, $page);
        $search_my_active = $this->db->get();
        $cnt = $search_my_active->num_rows();
        if ($cnt > 0) {
            $i = 0;
            foreach ($search_my_active->result_array() as $search_active) {
                $this->inactive_pin["detail$i"]["pin_id"] = $search_active['pin_id'];
                $this->inactive_pin["detail$i"]["pin"] = $search_active['pin_numbers'];
                $this->inactive_pin["detail$i"]["pin_alloc_date"] = $search_active['pin_alloc_date'];
                $this->inactive_pin["detail$i"]["used_user"] = $search_active['used_user'];
                $this->inactive_pin["detail$i"]["pin_uploded_date"] = $search_active['pin_uploded_date'];
                $this->inactive_pin["detail$i"]["status"] = $search_active['status'];
                $this->inactive_pin["detail$i"]["pin_amount"] = $search_active["pin_amount"];
                $this->inactive_pin["detail$i"]["pin_bal_amount"] = $search_active["pin_balance_amount"];
                $this->inactive_pin["detail$i"]["pin_expiry_date"] = $search_active["pin_expiry_date"];
                if ($search_active['allocated_user_id'] != "NA") {
                    $this->inactive_pin["detail$i"]["allocated_user"] = $this->obj_val->IdToUserName($search_active['allocated_user_id']);
                } else
                    $this->inactive_pin["detail$i"]["allocated_user"] = "NULL";
                $i++;
            }
        }
        //print_r($this->inactive_pin);
        return $this->inactive_pin;
    }

    public function getAllPins($page, $limit) {

        $session_data = $this->session->userdata('logged_in');
        $user_id = $session_data['user_id'];
        $user_type = $session_data['user_type'];
        if ($user_type == "admin") {
            $this->db->select("*");
            $this->db->from("pin_numbers");
            //$this->db->where("allocated_user_id = '$user_id' or allocated_user_id='NA'");
            $this->db->where("allocated_user_id", "NA");
            $this->db->where("pin_balance_amount >", 0);
            $this->db->where("status", "yes");
            $this->db->order_by("status", "DESC");
            $this->db->limit($limit, $page);
            $search_my_active = $this->db->get();
        } else {
            $user_id = $this->session->userdata('user_id');
            $this->db->select("*");
            $this->db->from("pin_numbers");
            $this->db->where("allocated_user_id", $user_id);
            $this->db->where("status", "yes");
            $this->db->where("pin_balance_amount >", 0);
            $this->db->order_by("status", "DESC");
            $this->db->limit($limit, $page);
            $search_my_active = $this->db->get();
        }

        $cnt = $search_my_active->num_rows();
        if ($cnt > 0) {
            $i = 0;
            foreach ($search_my_active->result_array() as $search_active) {
                $this->all_pin["detail$i"]["pin_id"] = $search_active['pin_id'];
                $this->all_pin["detail$i"]["pin"] = $search_active['pin_numbers'];
                $this->all_pin["detail$i"]["pin_alloc_date"] = $search_active['pin_alloc_date'];
                $this->all_pin["detail$i"]["used_user"] = $search_active['used_user'];
                $this->all_pin["detail$i"]["pin_uploded_date"] = $search_active['pin_uploded_date'];
                $this->all_pin["detail$i"]["status"] = $search_active['status'];
                $this->all_pin["detail$i"]["pin_bal_amount"] = $search_active['pin_balance_amount'];
                $this->all_pin["detail$i"]["pin_amount"] = $search_active['pin_amount'];
                $this->all_pin["detail$i"]["pin_expiry_date"] = $search_active['pin_expiry_date'];
                if ($search_active['allocated_user_id'] != "NA") {
                    $this->all_pin["detail$i"]["allocated_user"] = $this->obj_val->IdToUserName($search_active['allocated_user_id']);
                } else
                    $this->all_pin["detail$i"]["allocated_user"] = "NULL";
                $date1 = $search_active['pin_uploded_date'];
                $middle = strtotime($date1);
                $pin_expired1 = strtotime(date('Y-m-d', $middle)) . "       ";
                $date2 = $search_active['pin_expiry_date'];
                $pin_expired2 = strtotime($date2);
                $pin_expired = $pin_expired2 - $pin_expired1;
                if ($pin_expired <= 0)
                    $this->all_pin["detail$i"]["pin_expired"] = 'yes';
                else {
                    $this->all_pin["detail$i"]["pin_expired"] = 'no';
                }

                $i++;
            }
        }
        return $this->all_pin;
    }

    public function getAllUserPins($page, $limit) {
        $user_id = $_SESSION['user_id'];
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }

        $pin_numbers = $this->table_prefix . "pin_numbers";

        $search_my_active = "select* from  $pin_numbers WHERE allocated_user_id='$user_id' order by status asc limit $page, $limit";
        //  echo $search_my_active;
        $search_my_res_active = $this->selectData($search_my_active);
        $cnt = mysql_num_rows($search_my_res_active);
        if ($cnt > 0) {
            $i = 0;
            while ($search_active = mysql_fetch_array($search_my_res_active)) {
                $this->all_pin["detail$i"]["pin_id"] = $search_active['pin_id'];

                $this->all_pin["detail$i"]["pin"] = $search_active['pin_numbers'];
                $this->all_pin["detail$i"]["pin_alloc_date"] = $search_active['pin_alloc_date'];
                $this->all_pin["detail$i"]["used_user"] = $search_active['used_user'];
                $this->all_pin["detail$i"]["pin_uploded_date"] = $search_active['pin_uploded_date'];

                $this->all_pin["detail$i"]["status"] = $search_active['status'];
                $this->all_pin["detail$i"]["generated"] = $search_active['generated_user_id'];
                $i++;
            }
        }
        return $this->all_pin;
    }

    public function getAllPinspage() {

        $user_id = $this->session->userdata('user_id');
        $this->db->select("*");
        $this->db->from("pin_numbers");
        $this->db->where("allocated_user_id", $user_id);
        $search_all = $this->db->get();
        $cnt = $search_all->num_rows();
        return $cnt;
    }

    public function getAllActivePinspage() {
        $this->db->select("*");
        $this->db->from("pin_numbers");
        $this->db->where('status', 'yes');
        $search_all = $this->db->get();
        /* $search_all="select * from $pin_numbers WHERE status='yes'";

          // echo "maaaaaaaaaa".$search_all;
          $search_my_res_all=$this->selectData($search_all,"Eror on selecting pin page 1234544"); */
        $cnt = $search_all->num_rows();

        return $cnt;
    }

    public function getAllInactivePinspage() {

        $this->db->select('*');
        $this->db->from('pin_numbers');
        $this->db->where('status !=', 'yes');
        $search_all = $this->db->get();
        $cnt = $search_all->num_rows();
        return $cnt;
    }

    public function getAllUserPinspage() {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $pin_numbers = $this->table_prefix . "pin_numbers";

        $user_id = $_SESSION['user_id'];
        $search_all = "select * from $pin_numbers WHERE allocated_user_id='$user_id'";
        // echo "maaaaaaaaaa".$search_all;
        $search_my_res_all = $this->selectData($search_all, "Eror on selecting pin page 1234544");
        $cnt = mysql_num_rows($search_my_res_all);
        return $cnt;
    }

    public function getUserName($pin) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $pin_numbers = $this->table_prefix . "pin_numbers";

        $pin_user = "select user_pin_name FROM $pin_numbers WHERE pin_numbers='$pin' and status='yes'";

        //echo $serchpin;
        $res = $this->selectData($pin_user, "Error on Selecting user from pin");
        $row = mysql_fetch_array($res);
        $user_name = $row['user_pin_name'];
        return $user_name;
    }

    public function insertPasscode($passcode, $status, $pin_uploded_date, $generated_user, $allocate_id, $pin_amount, $expiry_date, $purchase_status = "", $pin_alloc_date = "") {

        $used_user = "";
        //$purchase_status = "";
        if ($purchase_status == "") {
            $array = array('pin_numbers' => $passcode, 'pin_alloc_date' => $pin_alloc_date, 'status' => $status, 'used_user' => $used_user, 'pin_uploded_date' => $pin_uploded_date, 'generated_user_id' => $generated_user, 'allocated_user_id' => $allocate_id, 'pin_expiry_date' => $expiry_date, 'pin_amount' => $pin_amount, 'pin_balance_amount' => $pin_amount);
            $this->db->set($array);
            $res = $this->db->insert('pin_numbers');
        } else {

            $array = array('pin_numbers' => $passcode, 'pin_alloc_date' => $pin_alloc_date, 'status' => $status, 'used_user' => $used_user, 'pin_uploded_date' => $pin_uploded_date, 'generated_user_id' => $generated_user, 'allocated_user_id' => $allocate_id, 'purchase_status' => 'yes', 'pin_expiry_date' => $expiry_date, 'pin_amount' => $pin_amount, 'pin_balance_amount' => $pin_amount, 'purchase_status' => $purchase_status);

            $this->db->set($array);
            $res = $this->db->insert('pin_numbers');
        }
        return $res;
    }

    public function getAllPinsearch($keyword, $page, $limit) {

        $this->db->select("*");
        $this->db->from("pin_numbers");
        $where = "pin_numbers LIKE '$keyword%' AND status!='delete' OR pin_id = '$keyword'";
        $this->db->where($where);
        $this->db->order_by("status", "asc");
        $this->db->limit($limit, $page);
        $search_my = $this->db->get();

        $cnt = $search_my->num_rows();
        if ($cnt > 0) {
            $i = 0;
            foreach ($search_my->result_array() as $row_search) {
                $this->active_search["detail$i"]["pin_id"] = $row_search['pin_id'];
                $this->active_search["detail$i"]["pin"] = $row_search['pin_numbers'];
                $this->active_search["detail$i"]["pin_alloc_date"] = $row_search['pin_alloc_date'];
                $this->active_search["detail$i"]["used_user"] = $row_search['used_user'];
                $id = $row_search['allocated_user_id'];

                if ($id != "NA" && $id != "") {
                    $this->active_search["detail$i"]["allocated_user"] = $this->obj_val->IdToUserName($id);
                } else {
                    $this->active_search["detail$i"]["allocated_user"] = "NA";
                }
                //$this->active_search["detail$i"]["allocated_user"] = $this->obj_val->IdToUserName($row_search['allocated_user_id']);
                $this->active_search["detail$i"]["pin_uploded_date"] = $row_search['pin_uploded_date'];
                $this->active_search["detail$i"]["status"] = $row_search['status'];
                $i++;
            }
        }
        return $this->active_search;
    }

    public function getAllPinsearchpage($keyword) {

        $this->db->select("*");
        $this->db->from("pin_numbers");
        $where = "pin_numbers LIKE '$keyword%'  AND status!='delete' OR pin_id = '$keyword'";
        $this->db->where($where);
        $this->db->order_by("status", "asc");
        $search_my = $this->db->get();

        $cnt = $search_my->num_rows();
        return $cnt;
    }

    public function deletePasscode($pin_id) {

        $this->db->where('pin_id', $pin_id);
        $res = $this->db->delete('pin_numbers');

        return $res;
        /* $qr="DELETE from $pin_numbers WHERE pin_id ='$pin_id'";
          $res = $this->deleteData($qr,"Error on deleting passcode..");
          return $res; */
    }

    public function updatePasscode($pin_id, $status) {

        $this->db->set("status", $status);
        $this->db->where("pin_id", $pin_id);
        $res = $this->db->update("pin_numbers");


        return $res;
    }

    public function getPinDetails($pin_no) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $purchase_pin = $this->table_prefix . "pin";

        $search_my = "select * from $purchase_pin WHERE pin_numbers='$pin_no'";
        //echo $serchpin;
        $search_my_res_active = $this->selectData($search_my, "Error on selecting pin detail124546787");
        $cnt = mysql_num_rows($search_my_res_active);
        if ($cnt > 0) {
            $i = 0;
            $row_search = mysql_fetch_array($search_my_res_active);
            $pin_detail_arr["pin_id"] = $row_search['pin_id'];
            $pin_detail_arr["pin_status"] = $row_search['status'];
        }
        return $pin_detail_arr;
    }

    public function getAllPinRequest() {

        $pin_detail_arr = array();
        $this->db->select("*");
        $this->db->from("pin_request");
        $this->db->where("status", "yes");
        $qr_pin_req = $this->db->get();
        $cnt = $qr_pin_req->num_rows();
        if ($cnt > 0) {
            $i = 0;

            foreach ($qr_pin_req->result_array() as $row_search) {
                $pin_detail_arr["detail$i"]["req_id"] = $row_search['req_id'];
                $pin_detail_arr["detail$i"]["user_id"] = $row_search['req_user_id'];
                $pin_detail_arr["detail$i"]["pin_count"] = $row_search['req_pin_count'];
                $pin_detail_arr["detail$i"]["rem_count"] = $row_search['req_rec_pin_count'];
                $pin_detail_arr["detail$i"]["req_date"] = $row_search['req_date'];
                $pin_detail_arr["detail$i"]["amount"] = $row_search['pin_amount'];
                $i++;
            }
        }
        return $pin_detail_arr;
    }

    public function updatePinRequest($id, $rem_count, $pin_count) {
        $date = date('Y-m-d');

        if ($pin_count == $rem_count) {
            $this->db->where('req_id', $id);
            $this->db->set('status', 'no');
            $res = $this->db->update('pin_request');
        } else {
            $count = $rem_count - $pin_count;

            $data = array('req_pin_count' => $count, 'req_rec_pin_count' => $count);
            $this->db->where('req_id', $id);
            $res = $this->db->update('pin_request', $data);
        }

        return $res;
    }

    public function getMaxPinCount() {
        $this->db->select("pin_maxcount");
        $this->db->from("pin_config");
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            $maxpincount = $row->pin_maxcount;
        }
        return $maxpincount;
    }

    public function getFreePins($page, $limit) {
        $product_id = "";


        if ($product_id == "") {
            $type = $this->LOG_USER_TYPE;
            $user_id = $this->LOG_USER_ID;
            if ($type != 'admin') {
                $this->db->select("*");
                $this->db->from("pin_numbers");
                $this->db->where("allocated_user_id", $user_id);
                $this->db->order_by("pin_id");
                $this->db->limit($limit, $page);
                $search_my_active = $this->db->get();
            } else {
                $this->db->select("*");
                $this->db->from("pin_numbers");
                $where = "status = 'yes'AND used_user ='' AND allocated_user_id  = 'NA'";
                $this->db->where($where);
                $this->db->order_by("pin_id");
                $this->db->limit($limit, $page);
                $search_my_active = $this->db->get();
            }
        } else {
            $this->db->select("*");
            $this->db->from("pin_numbers");
            $where = "status = 'yes'AND used_user ='' AND pin_prod_refid  = '$product_id'";
            $this->db->where($where);
            $this->db->order_by("pin_id");
            $this->db->limit($page, $limit);
            $search_my_active = $this->db->get();
        }
        $cnt = $search_my_active->num_rows();
        if ($cnt > 0) {
            $i = 0;
            foreach ($search_my_active->result_array() as $search_active) {
                $this->active_pin["detail$i"]["pin_id"] = $search_active['pin_id'];
                $this->active_pin["detail$i"]["pin"] = $search_active['pin_numbers'];
                $this->active_pin["detail$i"]["pin_balance_amount"] = $search_active["pin_balance_amount"];
                $this->active_pin["detail$i"]["pin_expiry_date"] = $search_active["pin_expiry_date"];
                $this->active_pin["detail$i"]["pin_amount"] = $search_active["pin_amount"];
                $this->active_pin["detail$i"]["pin_alloc_date"] = $search_active['pin_alloc_date'];
                if ($search_active["used_user"] == "" || $search_active["used_user"] == "NA")
                    $this->active_pin["detail$i"]["used_user"] = "NULL";
                else
                    $this->active_pin["detail$i"]["used_user"] = $this->obj_val->IdToUserName($search_active["used_user"]);
                if ($search_active["allocated_user_id"] == "" || $search_active["allocated_user_id"] == "NA")
                    $this->active_pin["detail$i"]["allocated_user"] = "NULL";
                else
                    $this->active_pin["detail$i"]["allocated_user"] = $this->obj_val->IdToUserName($search_active['allocated_user_id']);
                $this->active_pin["detail$i"]["pin_uploded_date"] = $search_active['pin_uploded_date'];
                $this->active_pin["detail$i"]["status"] = $search_active['status'];
                $i++;
            }
        }
        return $this->active_pin;
    }

    public function getAllFreePinspage() {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $pin_numbers = $this->table_prefix . "pin_numbers";

        $search_all = "select * from $pin_numbers WHERE status='yes' and used_user=''";

        // echo "<br />qr==>".$search_all;
        $search_my_res_all = $this->selectData($search_all, "Error on selecting pin page 1234544");
        $cnt = mysql_num_rows($search_my_res_all);
        return $cnt;
    }

    public function getAllPinsearchProd($keyword, $page, $limit) {


        $this->db->select("pr.*,pi.*");
        $this->db->from("product as pr");
        $this->db->join("pin_numbers as pi", "pr.product_id = pi.pin_prod_refid", "INNER");
        $this->db->where("pin_prod_refid = '$keyword%' AND status!='delete'");
        $this->db->order_by("status", "asc");
        $this->db->limit($limit, $page);
        $search_my_res_active = $this->db->get();

        $cnt = $search_my_res_active->num_rows();
        if ($cnt > 0) {
            $i = 0;
            foreach ($search_my_res_active->result_array() as $row_search) {
                $this->active_search["detail$i"]["pin_id"] = $row_search['pin_id'];
                $this->active_search["detail$i"]["product"] = $row_search['product_name'];
                $this->active_search["detail$i"]["pin"] = $row_search['pin_numbers'];
                $this->active_search["detail$i"]["pin_alloc_date"] = $row_search['pin_alloc_date'];
                $this->active_search["detail$i"]["used_user"] = $this->obj_val->IdToUserName($row_search['used_user']);
                /* $id = $row_search['allocated_user_id'];

                  if ($id != "NA" && $id != "") {
                  $this->active_search["detail$i"]["allocated_user"] = $this->obj_val->IdToUserName($id);
                  } else {
                  $this->active_search["detail$i"]["allocated_user"] = "NA";
                  } */
                $this->active_search["detail$i"]["allocated_user"] = $this->obj_val->IdToUserName($row_search['allocated_user_id']);
                $this->active_search["detail$i"]["pin_uploded_date"] = $row_search['pin_uploded_date'];
                $this->active_search["detail$i"]["prod_id"] = $row_search['prod_id'];
                $this->active_search["detail$i"]["status"] = $row_search['status'];
                $i++;
            }
        }
        return $this->active_search;
    }

    public function getAllPinsearchProdpage($keyword) {

        $this->db->select("pr.*,pi.*");
        $this->db->from("product as pr");
        $this->db->join("pin_numbers as pi", "pr.product_id = pi.pin_prod_refid", "INNER");
        $this->db->where("pin_prod_refid LIKE '$keyword%' AND status!='delete'");
        $this->db->order_by("status", "asc");
        $search_my_res_active = $this->db->get();
        //echo"hhhh".$this->db->last_query();
        return $cnt = $search_my_res_active->num_rows();
    }

}
