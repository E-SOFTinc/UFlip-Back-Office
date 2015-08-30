<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mail
 *
 * @author pavanan
 */
require_once 'Inf_Model.php';

class mail_model extends Inf_Model {

    public $MEMBER_DETAILS;
    public $OBJ_PAGE;
    public $mailObj;
    public $obj_val;

    public function __construct() {
        //$this->connectDB();
        parent::__construct();

        require_once("Page.php");
        $this->OBJ_PAGE = new Page();

        require_once 'Phpmailer.php';
        $this->mailObj = new PHPMailer();

        require_once 'validation.php';
        $this->obj_val = new Validation();
    }

    public function setFooter($page, $limit, $current_url) {

        return $this->OBJ_PAGE->setFooter($page, $limit, $current_url);
    }

    public function paging($page, $limit, $pages_selection) {
        //require_once 'Pin.php';
        //$this->OBJ_PIN=new Pin();
        $pag_arr = array();
        //$arr=$this->getAdminMessages($page,$limit);
        // $this->set("row",$arr);
        //$this->set("num_rows",$arr['num_rows']);
        //print_r($user_name_arr);
        //$this->set("user_name_arr",$user_name_arr);
        // $pag_arr['arr']=$arr;
        //$pag_arr['numrows']=$arr['num_rows'];
        $num_rows = $this->getMessagesPages($pages_selection);
        //echo "<script>alert('$num_rows')</script>";
        //$pag_arr['pin_numbers']=$pin_numbers;
        //echo "#################";
        require_once("Page.php");
        $this->OBJ_PAGE = new Page();
        //echo "<script>alert('$page,$limit')</script>";
        $first = $this->OBJ_PAGE->paging($page, $limit, $num_rows);
        $pag_arr['first'] = $first;
        return $pag_arr;
    }

    public function getCountUserUnreadMessages($type, $id) {
        //code added by jiji ----06/02/2013

        $mail = 'mailtouser';
        $this->db->select('*');
        $this->db->where('status', 'yes');
        $this->db->where('read_msg', 'no');
        $this->db->where('mailtoususer', $id);
        $this->db->from('mailtouser');
        $count = $this->db->count_all_results();
        return $count;
    }

    public function getMessagesPages($pages_selection) {
        switch ($pages_selection) {
            case 'admin' :
                $num_rows = $this->getAdminMessagesPages();
                break;

            case 'distributter' :
                $num_rows = $this->getUserMessagesPages($_SESSION['user_id']);
                break;
        }
        return $num_rows;
    }

    public function getAdminMessagesPages() {

        //code edited by jiji

        $mailtoadmin = "mailtoadmin";
        $this->db->select('*');
        $this->db->from($mailtoadmin);
        $this->db->where('status', 'yes');
        $count = $this->db->count_all_results();

        return $count;
    }

    public function getUserMessagesPages($user_id) {

        //code edited by jiji

        $mailtouser = "mailtouser";
        $this->db->select('*');
        $this->db->from($mailtouser);
        $this->db->where('status', 'yes');
        $this->db->where('mailtoususer', $user_id);
        $count = $this->db->count_all_results();

        return $count;
    }

    public function getUsers() {

        $user_arr = array();
        $this->db->select('user_id');
        $this->db->from('login_user');
        $this->db->NOT_LIKE('addedby', 'server');
        $this->db->NOT_LIKE('user_type', 'admin');
        $this->db->order_by('user_id', 'asc');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_arr[] = $row->user_id;
        }
        return $user_arr;
    }

////////////////////code added by vaisakh on 4th january 2013 starts
    public function userNameToId($user_name) {

        return $this->obj_val->userNameToID($user_name);
    }

    public function sendMessageToUser($user_id, $subject, $message, $dt) {
        $data = array(
            'mailtoususer' => $user_id,
            'mailtoussub' => $subject,
            'mailtousmsg' => $message,
            'mailtousdate' => $dt
        );
        $res = $this->db->insert('mailtouser', $data);
        return $res;
    }

    public function sendMesageToAdmin($from, $message, $subject, $dt) {

        $data = array(
            'mailaduser' => $from,
            'mailadsubject' => $subject,
            'mailadidmsg' => $message,
            'status' => 'yes',
            'mailadiddate' => $dt
        );
        $res = $this->db->insert('mailtoadmin', $data);
        return $res;
    }

    public function getAdminUsername() {

        $this->db->select('user_name');
        $this->db->from('login_user');
        $this->db->where('user_type', "admin");
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $user_name = $row->user_name;
        }
        return $user_name;
    }

////////////////////code added by vaisakh on 4th january 2013 ends    
////////////////////code added by vaisakh on 5th january 2013 starts    

    public function getAdminMessages($page, $limit) {
        $arr = array();
        $this->db->select('*');
        $this->db->from('mailtoadmin');
        $this->db->where('status', 'yes');
        $this->db->order_by('mailadiddate', 'desc');
        $this->db->limit($limit, $page);
        $query = $this->db->get();
        $i = 0;
        foreach ($query->result_array() as $row) {
            $arr[$i]["id"] = $row["mailadid"];
            $arr[$i]["mailaduser"] = $row["mailaduser"];
            $arr[$i]["mailadsubject"] = $row["mailadsubject"];
            $arr[$i]["mailadiddate"] = $row["mailadiddate"];
            $arr[$i]["status"] = $row["status"];
            $arr[$i]["mailadidmsg"] = $row["mailadidmsg"];
            $arr[$i]["read_msg"] = $row["read_msg"];

            $i++;
        }
        return $arr;
    }

////////////////////code added vaisakh on 8th jan starts    
    public function getCountAdminMessages() {

        $this->db->select('*');
        $this->db->from('mailtoadmin');
        $this->db->where('status', 'yes');
        $count = $this->db->count_all_results();
        return $count;
    }

    public function getCountUserMessages($user_id) {

        $this->db->select('*');
        $this->db->from('mailtouser');
        $this->db->where('status', 'yes');
        $this->db->where('mailtoususer', $user_id);
        $count = $this->db->count_all_results();
        return $count;
    }

////////////////////code added vaisakh on 8th jan ends        
////////////////////code added by vaisakh on 5th january 2013 ends        
////////////////////code added by vaisakh on 7th january 2013 starts            

    public function getAdminOneMessage($id) {
        $this->db->select('*');
        $this->db->from('mailtoadmin');
        $this->db->where('mailadid', $id);
        $this->db->where('status', 'yes');
        $res = $this->db->get();
        return $res;
    }

    public function updateAdminOneMessage($msg_id) {
        $data = array(
            'read_msg' => 'yes',
        );
        $this->db->where('mailadid', $msg_id);
        $this->db->where('status', 'yes');
        $this->db->update('mailtoadmin', $data);
    }

////////////////////code added by vaisakh on 7th january 2013 ends        
////////////////////code added by vaisakh on 7th january 2013 starts
    public function updateUserOneMessage($msg_id) {
        $data = array(
            'read_msg' => 'yes',
        );
        $this->db->where('mailtousid', $msg_id);
        $this->db->where('status', 'yes');
        $this->db->update('mailtouser', $data);
    }

    public function getUserOneMessage($id, $user_id) {
        $this->db->select('*');
        $this->db->from('mailtouser');
        $this->db->where('mailtousid', $id);
        $this->db->where('mailtoususer', $user_id);
        $this->db->where('status', 'yes');
        $res = $this->db->get();
        return $res;
    }

////////////////////code added by vaisakh on 7th january 2013 ends        
    public function getUserOneMessageForAdmins($id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $mailtouser = $this->table_prefix . "mailtouser";
        $qr = "SELECT * FROM $mailtouser where mailtousid='$id'";
        $res = $this->selectData($qr, "Error on 12324234");
        return $res;
    }

    public function getUserOneMessageForUser($id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $mailtouser = $this->table_prefix . "mailtouser";
        $qr = "SELECT * FROM $mailtouser where mailadid='$id'";
        $res = $this->selectData($qr);
        return $res;
    }

////////////////////code added by vaisakh on 7th january 2013 starts 
    public function getUserMessages($user_id, $page, $limit) {
        $this->db->select('*');
        $this->db->from('mailtouser');
        $this->db->where('mailtoususer', $user_id);
        $this->db->where('status', 'yes');
        $this->db->order_by('mailtousdate', 'desc');
        $this->db->limit($limit, $page);
        $res = $this->db->get();
        return $res;
    }

////////////////////code added by vaisakh on 7th january 2013 starts     
////////////////////code added by vaisakh on 7th january 2013 starts  
    public function getUserName($user_id) {
        $this->db->select('user_name');
        $this->db->from('login_user');
        $this->db->where('user_id', $user_id);
        $res = $this->db->get();
        $row = $res->result_array();
        $user_name = $row[0]['user_name'];
        return $user_name;
    }

////////////////////code added by vaisakh on 7th january 2013 ends  
    public function getAdminSendItem() {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $mailtouser = $this->table_prefix . "mailtouser";
        $qr = "SELECT * FROM  $mailtouser WHERE mailtoususer='12346'";
        $res = $this->selectData($qr, "Error on 23557");
        return $res;
    }

    public function getUserSendItem($user_id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $mailtoadmin = $this->table_prefix . "mailtoadmin";
        $qr = "SELECT * FROM  $mailtoadmin WHERE mailaduser='$user_id'";
        $res = $this->selectData($qr);
        return $res;
    }

////////////////////code added by vaisakh on 7th january 2013 starts  

    public function updateAdminMessage($msg_id) {
        $data = array(
            'status' => 'no'
        );
        $this->db->where('mailadid', $msg_id);
        $res = $this->db->update('mailtoadmin', $data);
        return $res;
    }

    public function updateUserMessage($msg_id) {
        $data = array(
            'status' => 'no'
        );
        $this->db->where('mailtousid', $msg_id);
        $res = $this->db->update('mailtouser', $data);
        return $res;
    }

////////////////////code added by vaisakh on 7th january 2013 ends  

    public function deleteAdminMessage($msg_id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $mailtoadmin = $this->table_prefix . "mailtoadmin";
        $qr = "DELETE FROM $mailtoadmin  WHERE mailadid='$msg_id'";
        $res = $this->deleteData($qr, "Message Delete Failed");
        return $res;
    }

    //////////////////////code added by amrutha on april 5,2014
    public function updateMsgStatus($msg_id) {
        $res1 = "";
        $res2 = "";
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $user_type = $this->session->userdata['logged_in']['user_type'];
        $user_name = $this->session->userdata['logged_in']['user_name'];
        if ($user_type == 'admin') {
            $data = array(
                'read_msg' => 'yes'
            );

            $this->db->where('mailadid', $msg_id);
            $res1 = $this->db->update('mailtoadmin', $data);
        } else {
            $data = array(
                'read_msg' => 'yes'
            );
            $this->db->where('mailtousid', $msg_id);
            $res2 = $this->db->update('mailtouser', $data);
        }
        if ($res1) {
            $this->db->select('mailaduser');
            $this->db->where('read_msg', 'no');
            $this->db->from('mailtoadmin');
            $count = $this->db->count_all_results();
            return $count;
        }
        if ($res2) {
            $this->db->select('mailtoususer');
            $this->db->where('read_msg', 'no');
            $this->db->where('mailtoususer', $user_id);
            $this->db->from('mailtouser');
            $count = $this->db->count_all_results();
            return $count;
        }
    }

    /////////////////////

    public function deleteUserMessage($msg_id) {

        $qr = "DELETE mailtouser  WHERE mailtousid='$msg_id'";
        $res = $this->deleteData($qr, "Message Delete Failed");
        return $res;
    }

    public function getAdminMessageStatus($msg_id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $mailtoadmin = $this->table_prefix . "mailtoadmin";
        $qr = "SELECT status FROM  $mailtoadmin WHERE mailadid='$msg_id'";
        $res = $this->selectData($qr, "Error on selecting message satatus");
        $row = mysql_fetch_array($res);
        $status = $row['status'];
        return $status;
    }

    public function getUSerMessageStatus($msg_id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $mailtouser = $this->table_prefix . "mailtouser";
        $qr = "SELECT status FROM  $mailtouser WHERE  mailtousid='$msg_id'";
        $res = $this->selectData($qr, "Error on selecting message satatus");
        $row = mysql_fetch_array($res);
        $status = $row['status'];

        return $status;
    }

////////////////////code added by vaisakh on 5th january 2013 starts

    public function getAdminId() {
        return $admin_id = $this->getAdminIdOfValidation();
    }

    public function getAdminIdOfValidation() {
        $this->db->select('user_id');
        $this->db->from('login_user');
        $this->db->where('user_type', 'admin');
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $adminid = $row['user_id'];
        }
        return $adminid;
    }

////////////////////code added by vaisakh on 5th january 2013 ends    

    public function idToUserName($user_id) {

        return $this->obj_val->IdToUserName($user_id);
    }

    public function getEmailId($user_id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $user_details = $this->table_prefix . "user_details";

        $qr = "SELECT user_detail_email FROM $user_details WHERE user_detail_refid='$user_id'";
        $res = $this->selectData($qr, "Error on selecting user email");
        $row = mysql_fetch_array($res);
        if($row["user_detail_email"])
        {
        
             $this->sendEmail($mailBodyDetails, $row["user_detail_email"], $subject); 
        }
    }

    public function sendEmail($mailBodyDetails, $email, $subject = '') {
        $this->mailObj->From = "info@ioss.in";
        $this->mailObj->FromName = "MLM@IOSS";
        if ($subject == '')
            $this->mailObj->Subject = "InfiniteMLM Notification";
        else
            $this->mailObj->Subject = "InfiniteMLM " . $subject;
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

    public function getAllReadMessages($user_id) {
        //code added by jiji ----06/02/2013
        $session_data = $this->session->userdata('logged_in');
        $type = $session_data['user_type'];
        if ($type == "admin") {
            $mail = 'mailtoadmin';
            $this->db->select('*');
            $this->db->from($mail);
            $this->db->where('status', 'yes');
            $this->db->where('read_msg', 'yes');
        } else if ($type == "distributor") {
            $mail = 'mailtouser';

            $this->db->select('*');
            $this->db->from($mail);
            $this->db->where('status', 'yes');
            $this->db->where('read_msg', 'yes');
            $this->db->where('mailtoususer', $user_id);
        }
        $count = $this->db->count_all_results();
        return $count;
    }

    public function getAllUnreadMessages($user_id) {
        //code added by jiji ----06/02/2013
        $session_data = $this->session->userdata('logged_in');
        $type = $session_data['user_type'];
        if ($type == "admin") {
            $mail = 'mailtoadmin';
            $this->db->select('*');
            $this->db->from($mail);
            $this->db->where('status', 'yes');
            $this->db->where('read_msg', 'no');
        } else if ($type == "distributor") {
            $mail = 'mailtouser';

            $this->db->select('*');
            $this->db->from($mail);
            $this->db->where('status', 'yes');
            $this->db->where('read_msg', 'no');
            $this->db->where('mailtoususer', $user_id);
        }

        $count = $this->db->count_all_results();
        return $count;
    }

    public function getAllMessagesToday($type) {
        //code added by jiji ----06/02/2013

        $count = 0;
        $date = date("Y-m-d");

        if ($type == "admin") {
            $mail = 'mailtoadmin';
            $this->db->select('*');
            $this->db->from($mail);
            $this->db->where('status', 'yes');
            $this->db->like('mailadiddate', $date);

            $count = $this->db->count_all_results();
        } else if ($type == "distributor") {
            $mail = 'mailtouser';
            $this->db->select('*');
            $this->db->from($mail);
            $this->db->where('status', 'yes');
            $this->db->like('mailtousdate', $date);

            $count = $this->db->count_all_results();
        }

        return $count;
    }
     public function getTicketsCategories() {
        $cat_arr = array();
        $this->db->select('id,name');
        $this->db->from('tickets_categories');
        $this->db->order_by("cat_order");
        $res = $this->db->get();
        $i = 0;
        foreach ($res->result_array() as $row) {
            $cat_arr["details$i"]['cat_id'] = $row['id'];
            $cat_arr["details$i"]['cat_name'] = $row['name'];
            $i++;
        }
        return $cat_arr;
    }
     public function getSubjects() {
        $arr = array();
        $this->db->select('*');
        $this->db->from('mail_subjects');
        $this->db->where('status', 'yes');
        $res = $this->db->get();
        $i = 0;
        foreach ($res->result_array() as $row) {
            $arr[$i]['id'] = $row['id'];
            $arr[$i]['subject'] = $row['subject'];
            $arr[$i]['date'] = $row['date'];
            $i++;
        }
        return $arr;
    }

    public function getCategory() {
        $cat_arr = array();
        $this->db->select('id');
        $this->db->select('name');
        $this->db->from('ticket_categories');
        $res = $this->db->get();
        $i = 0;
        foreach ($res->result_array() as $row) {
            $cat_arr["details$i"]['cat_id'] = $row['id'];
            $cat_arr["details$i"]['cat_name'] = $row['name'];
            $i++;
        }
        return $cat_arr;
    }

}

?>