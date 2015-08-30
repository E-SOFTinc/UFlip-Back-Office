<?php
require_once 'Inf_Model.php';
class excel_model extends Inf_Model {

    private $obj_xml;
    private $obj_payout;
    private $obj_val;
    private $OBJ_VALI;

    public function __construct() {
        parent::__construct();
        require_once 'validation.php';
        $this->OBJ_VALI = new Validation();
        require_once 'excel/class-excel-xml.inc.php';
        $this->obj_xml = new Excel_XML();
        require_once 'payout_model.php'; 
        $this->obj_payout = new payout_model();
    }

    public function writeToExcel($doc_arr, $file_name) 
    {
        $this->obj_xml->addArray($doc_arr);
        $this->obj_xml->generateXML("$file_name");
    }

    public function getUserArray($from, $to) {
        $excel_array = array();
        $details_arr = $this->obj_payout->getPayoutUserDetails($from, $to);
        $detail_count = count($details_arr);
        $excel_array[1] = array("Name", "user name", "Address", "Mobile", "Amount Payable", "Bank", "Branch", "Acc No.", "IFSC");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $details_arr[$i - 2]["user_name"];
            $excel_array[$i][1] = $details_arr[$i - 2]["name"];
            $excel_array[$i][2] = $details_arr[$i - 2]["address"];
            $excel_array[$i][3] = $details_arr[$i - 2]["mobile"];
            $excel_array[$i][4] = $details_arr[$i - 2]["amount_payable"];
            $excel_array[$i][5] = $details_arr[$i - 2]["bank"];
            $excel_array[$i][6] = $details_arr[$i - 2]["branch"];
            $excel_array[$i][7] = $details_arr[$i - 2]["acc"];
            $excel_array[$i][8] = $details_arr[$i - 2]["ifsc"];
        }
        return $excel_array;
    }

    public function getProfiles($cnt) {
        $excel_array = array();
        $details_arr = $this->profileReport($cnt);
        $detail_count = count($details_arr);
        $excel_array[1] = array("Name", "Passcode", "Username", "Sponser Name", "Address", "Pincode", "Mobile", "Landline", "Email", "Nominee", "Relation", "Bank", "Branch", "Acc No.", "Pan No", "IFSC", "Date Of Join");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $details_arr[$i - 2]['details']["detail1"]["name"];
            $excel_array[$i][1] = $details_arr[$i - 2]['details']["detail1"]["passcode"];
            $excel_array[$i][2] = $details_arr[$i - 2]['uname'];
            $excel_array[$i][3] = $details_arr[$i - 2]['sponser_name'];
            $excel_array[$i][4] = $details_arr[$i - 2]['details']["detail1"]["address"];
            $excel_array[$i][5] = $details_arr[$i - 2]['details']["detail1"]["pincode"];
            $excel_array[$i][6] = $details_arr[$i - 2]['details']["detail1"]["mobile"];
            $excel_array[$i][7] = $details_arr[$i - 2]['details']["detail1"]["land"];
            $excel_array[$i][8] = $details_arr[$i - 2]['details']["detail1"]["email"];
            $excel_array[$i][9] = $details_arr[$i - 2]['details']["detail1"]["nominee"];
            $excel_array[$i][10] = $details_arr[$i - 2]['details']["detail1"]["relation"];
            $excel_array[$i][11] = $details_arr[$i - 2]['details']["detail1"]["nbank"];
            $excel_array[$i][12] = $details_arr[$i - 2]['details']["detail1"]["nbranch"];
            $excel_array[$i][13] = $details_arr[$i - 2]['details']["detail1"]["acnumber"];
            $excel_array[$i][14] = $details_arr[$i - 2]['details']["detail1"]["pan"];
            $excel_array[$i][15] = $details_arr[$i - 2]['details']["detail1"]["ifsc"];
            $excel_array[$i][16] = $details_arr[$i - 2]['details']["detail1"]["date"];
        }
        return $excel_array;
    }

    public function getProfilesFrom($count_from, $count_to) {
        $excel_array = array();
        $details_arr = $this->profileReportFromTo($count_from, $count_to);
        $detail_count = count($details_arr);
        $excel_array[1] = array("Name", "Passcode", "Username", "Sponser Name", "Address", "Pincode", "Mobile", "Landline", "Email", "Nominee", "Relation", "Bank", "Branch", "Acc No.", "Pan No", "IFSC", "Date Of Join");
        for ($i = 2; $i <= $detail_count + 1; $i++) {
            $excel_array[$i][0] = $details_arr[$i - 2]['details']["detail1"]["name"];
            $excel_array[$i][1] = $details_arr[$i - 2]['details']["detail1"]["passcode"];
            $excel_array[$i][2] = $details_arr[$i - 2]['uname'];
            $excel_array[$i][3] = $details_arr[$i - 2]['sponser_name'];
            $excel_array[$i][5] = $details_arr[$i - 2]['details']["detail1"]["address"];
            $excel_array[$i][6] = $details_arr[$i - 2]['details']["detail1"]["pincode"];
            $excel_array[$i][7] = $details_arr[$i - 2]['details']["detail1"]["mobile"];
            $excel_array[$i][8] = $details_arr[$i - 2]['details']["detail1"]["land"];
            $excel_array[$i][9] = $details_arr[$i - 2]['details']["detail1"]["email"];
            $excel_array[$i][10] = $details_arr[$i - 2]['details']["detail1"]["nominee"];
            $excel_array[$i][11] = $details_arr[$i - 2]['details']["detail1"]["relation"];
            $excel_array[$i][12] = $details_arr[$i - 2]['details']["detail1"]["nbank"];
            $excel_array[$i][13] = $details_arr[$i - 2]['details']["detail1"]["nbranch"];
            $excel_array[$i][14] = $details_arr[$i - 2]['details']["detail1"]["acnumber"];
            $excel_array[$i][15] = $details_arr[$i - 2]['details']["detail1"]["pan"];
            $excel_array[$i][16] = $details_arr[$i - 2]['details']["detail1"]["ifsc"];
            $excel_array[$i][17] = $details_arr[$i - 2]['details']["detail1"]["date"];
        }
        return $excel_array;
    }

    public function profileReport($cnt) {   
        $user_detail=array();
        $this->db->select("user_name");
        $this->db->from("login_user");
        $this->db->where("addedby !=", "server");
        $this->db->limit($cnt);
        $qr = $this->db->get();
        $i = 0;
        foreach ($qr->result() as $row) {
            $u_name = $row->user_name;
            $user_id = $this->OBJ_VALI->userNameToID($u_name);
            
            $this->db->select('u.*');
            $this->db->from("user_details AS u");
            $this->db->join("ft_individual", "u.user_detail_refid=ft_individual.id", 'INNER');
            $this->db->where("user_detail_refid", $user_id);
            $qr = $this->db->get();
            
            foreach ($qr->result_array()as $rows) {
                $sponser_data = $this->OBJ_VALI->getSponserIdName($user_id);
                $rows['sponser_name'] = $sponser_data['name'];
                $rows['sponser_id'] = $sponser_data['id'];
                $rows['uname'] = $row->user_name;
                $user_detail[] = $rows;
            }
            $user_detail[$i]['details'] = $this->getUserDetails($user_id);
            $i = $i+1;
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

    public function getUserDetails($user_id) {

        $this->db->select('*');
        $this->db->from('user_details');
        $this->db->where('user_detail_refid', $user_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        $i = 1;
        foreach ($query->result_array() as $row) {

            $user_detail["detail$i"]["id"] = $row["user_detail_refid"];
            $user_detail["detail$i"]["name"] = $row["user_detail_name"];
            $user_detail["detail$i"]["address"] = $row["user_detail_address"];
            $user_detail["detail$i"]["town"] = $row["user_detail_town"];
            $user_detail["detail$i"]["country"] = $row["user_detail_country"];
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
            $i++;
        }
        $user_detail = $this->replaceNullFromArray($user_detail, "NA");
        return $user_detail;
    }
    public function profileReportFromTo($count_to, $count_from) {
        $user_detail=array();
        $this->db->select("user_name");
        $this->db->from("login_user");
        $this->db->where("addedby !=", "server");
        $this->db->limit($count_from,$count_to);
        $qr = $this->db->get();
        $i = 0;
        foreach ($qr->result() as $row) {
            $u_name = $row->user_name;
            $user_id = $this->OBJ_VALI->userNameToID($u_name);

            $this->db->select("u.*");
            $this->db->from("user_details AS u");
            $this->db->join("ft_individual", "u.user_detail_refid=ft_individual.id", "INNER");
            $this->db->where("user_detail_refid", $user_id);
            $qr = $this->db->get();

            foreach ($qr->result_array()as $rows) {
                $sponser_data = $this->OBJ_VALI->getSponserIdName($user_id);
                $rows['sponser_name'] = $sponser_data['name'];
                $rows['sponser_id'] = $sponser_data['id'];
                $rows['uname'] = $row->user_name;
                $user_detail[] = $rows;
            }
            $user_detail[$i]['details'] = $this->getUserDetails($user_id);
            $i = $i+1;
        }
        $user_detail = $this->replaceNullFromArray($user_detail, "NA");
        return $user_detail;
    }
}