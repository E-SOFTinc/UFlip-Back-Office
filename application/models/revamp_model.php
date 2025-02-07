<?php

require_once 'Inf_Model.php';

class revamp_model extends Inf_Model {

    private $mailObj;
    private $obj_upload;

    public function __construct() {
        require_once 'FileUpload.php';
        require_once 'Phpmailer.php';

        $this->mailObj = new PHPMailer();
        $this->obj_upload = new FileUpload();
    }

    public function getOneUserDetail($user_id = "") {
        $user_detail = array();
        $query = $this->db->query("select c.*,u.* from infinite_mlm_cofiguration_binary as c  INNER JOIN infinite_mlm_user_detail as u on c.user_ref_id=u.id WHERE u.id='$user_id'");
        foreach ($query->result_array() as $row) {
            $user_detail["id"] = $row['id'];
            $user_detail["user_name"] = $row['user_name'];
            $user_detail["pswd"] = $row['pswd'];
            $user_detail["account_status"] = $row['account_status'];
            $user_detail["company_name"] = $row['company_name'];
            $user_detail["full_name"] = $row['full_name'];
            $user_detail["phone"] = $row['phone'];
            $user_detail["email"] = $row['email'];
            $user_detail["country"] = $row['country'];
            $user_detail["state"] = $row['state'];
            $user_detail["location"] = $row['location'];
            $user_detail["reg_date"] = $row['reg_date'];
            $user_detail["product_status"] = $row['product_status'];
            $user_detail["pv_status"] = $row['pv_status'];
            $user_detail["pin_status"] = $row['pin_status'];
            $user_detail["currency"] = $row['currency'];
            $user_detail["payout_release"] = $row['payout_release'];
            $user_detail["payout_starting_day "] = $row['payout_starting_day'];
            $user_detail["payout_ending_day"] = $row['payout_ending_day'];
            $user_detail["first_pair"] = $row['first_pair'];
            $user_detail["mlm_plan"] = $row['mlm_plan'];
        }

        return $user_detail;
    }

    public function upload($file_name, $size, $type, $doc, $path) {
        if ($file_name != "") {
            $this->obj_upload->config($size, $type);
            $this->obj_upload->upload($doc, $path);
        }
        $fname = $this->obj_upload->fileInfo['fname'];
        return $fname;
    }

    public function updateRequirementForBinary($mlm_details, $shopping_status, $repurchase_status, $replication_status, $reference, $user_ref_id, $fname, $plan) {

        $mlm_details = addslashes($mlm_details);
        $reference = addslashes($reference);

        $res = $this->db->query("UPDATE infinite_mlm_binary_requirements SET other_mlm_plan_details='$mlm_details', shopping_status='$shopping_status', repurchase_status='$repurchase_status', replication='$replication_status', refer_site='$reference', mlm_plan='$plan', filename='$fname' WHERE user_ref_id='$user_ref_id'");
        return $res;
    }

    //added by m.ali.km
    public function upgradeAccount($user_ref_id) {

        $res = $this->db->query("UPDATE infinite_mlm_user_detail SET account_status='upgraded' WHERE id='$user_ref_id'");
        return $res;
    }

    ///////ends
    public function updateNewUserDetail($ref_id, $user_ref_id) {
        $this->obj_mng->updateNewUserDetail($ref_id, $user_ref_id);
    }

    public function sendMail($mailBodyDetails, $FILE_NAME = '') {
        $this->mailObj->From = "info@ioss.in";
        $this->mailObj->FromName = "MLM@IOSS";
        $this->mailObj->Subject = "InfiniteMLM Feedback";
        $this->mailObj->IsHTML(true);

        $this->mailObj->ClearAddresses();
        $this->mailObj->AddAddress('info@ioss.in');
        if ($FILE_NAME != "")
            $this->mailObj->AddAttachment($FILE_NAME);

        $this->mailObj->Body = $mailBodyDetails;
        $res = $this->mailObj->send();
        $arr["send_mail"] = $res;
        if (!$res)
            $arr['error_info'] = $this->mailObj->ErrorInfo;
        return $arr;
    }

    public function viewCountry($country) {
        $view = $this->obj_mng->viewCountry($country);
        return $view;
    }

    public function getState() {
        return $arr = $this->obj_mng->getState();
    }

    public function insertFeedback($feed_subject, $feed_detail, $user_id) {
        $res = $this->db->query("INSERT INTO infinite_mlm_feedback SET user_ref_id='$user_id',feedback_subject='$feed_subject',feedback_detail='$feed_detail'");
        return $res;
    }

    public function getUpgardeStatus() {
        
        $session_data = $this->session->userdata('logged_in');
        $table_prefix = $session_data['table_prefix'];
        $user_ref_id = str_replace("_", "", $table_prefix);

        $res = $this->db->query("SELECT account_status FROM infinite_mlm_user_detail WHERE id='$user_ref_id'");
        foreach ($res->result() as $row) {
            $account_status = $row->account_status;
        }
        
        return $account_status;
    }

}
