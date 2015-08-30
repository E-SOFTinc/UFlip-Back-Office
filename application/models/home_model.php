<?php
require_once 'Inf_Model.php';
Class home_model extends Inf_Model {

    private $obj_join;
    private $obj_join_model;
    private $obj_mail_model;
    private $obj_epin_model;
    private $obj_ewallet_model;
    private $obj_payoutt_model;
    public $obj_vali;

    public function __construct() {
        
        require_once 'validation.php';
        $this->obj_vali = new Validation();
        require_once 'JoiningClass.php';
        $this->obj_join = new JoiningClass();
        require_once 'joining_model.php';
        $this->obj_join_model = new joining_model();
        require_once 'mail_model.php';
        $this->obj_mail_model = new mail_model();
        require_once 'epin_model.php';
        $this->obj_epin_model = new epin_model();
        require_once 'ewallet_model.php';
        $this->obj_ewallet_model = new ewallet_model();
        require_once 'payout_model.php';
        $this->obj_payoutt_model = new payout_model();
    }

    public function todaysJoiningCount($user_id='',$table_prefix='') {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        $date = date("Y-m-d");
        return $this->obj_join->todaysJoiningCount($date,$user_id,$table_prefix);
    }

    public function totalJoiningpage($user_id='',$table_prefix = "") {
        /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_join_model->totalJoiningpage($user_id,$table_prefix);
    }
    public function getAllReadMessages($type){
         /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_mail_model->getAllReadMessages($type);
    }
    public function getAllUnreadMessages($type){
         /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_mail_model->getAllUnreadMessages($type);
    }
    
    public function getCountUserUnreadMessages($type,$id){
         /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_mail_model->getCountUserUnreadMessages($type,$id);
    }
    public function getAllUserUnreadMessages($type){
         /////////////////////  CODE EDITED BY Niyas  //////////////////////////
        return $this->obj_mail_model->getAllUserUnreadMessages($type);
    }
    
    public function getAllMessagesToday($type){
         /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_mail_model->getAllMessagesToday($type);
    }
    public function getAllPinCount($user_id=''){
         /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_epin_model->getAllPinCount($user_id);
    }
    public function getUsedPinCount($user_id=''){
         /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_epin_model->getUsedPinCount($user_id);
    }
    public function getRequestedPinCount($user_id=''){
         /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_epin_model->getRequestedPinCount($user_id);
    }
     public function getGrandTotalEwallet($user_id=''){
         /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_ewallet_model->getGrandTotalEwallet($user_id);
    }
    public function getTotalRequestAmount($user_id=''){
         /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_ewallet_model->getTotalRequestAmount($user_id);
    }
    public function getTotalReleasedAmount($user_id=''){
         /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_ewallet_model->getTotalReleasedAmount($user_id);
    }
     public function getJoiningDetailsperMonth($user_id=''){
         /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_join_model->getJoiningDetailsperMonth($user_id);
    }
    public function getPayoutReleasePercentages($user_id=''){
         /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        return $this->obj_payoutt_model->getPayoutReleasePercentages($user_id);
    }
    function login($username, $password) {
        $this->db->select('user_id, user_name, password,user_type');
        $this->db->from('31_login_user');
        $this->db->where('user_name = ' . "'" . $username . "'");
        $this->db->where('password = ' . "'" . MD5($password) . "'");
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function getUnreadMessages($type, $user_id) {
        //code added by Niyas ----
        $result = array();
        if ($type == "admin") {
            $tbl = 'mailtoadmin';
            $this->db->select('*');
            $this->db->where('status', 'yes');
            $this->db->where('read_msg', 'no');
            $this->db->order_by("mailadiddate", "desc"); 
            $this->db->from($tbl);
            $res = $this->db->get();
            $i = 0;
            foreach ($res->result_array() as $row) {
                $result[$i] = $row;
                $result[$i]['username'] = $this->obj_vali->IdToUserName($row['mailaduser']);
                $mail_userid=$this->obj_vali->userNameToID($result[$i]['username']);
                $result[$i]['image'] = $this->obj_vali->getProfilePicture($mail_userid);
                $i++;
            }
            return $result;
        } else {
            
            $tbl = 'mailtouser';
            $this->db->select('*');
            $this->db->where('status', 'yes');
            $this->db->where('read_msg', 'no');
            $this->db->order_by("mailtousdate", "desc"); 
            $this->db->where('mailtoususer', $user_id);
            $this->db->from($tbl);
            $res = $this->db->get();
            $i = 0;
            foreach ($res->result_array() as $row) {
                
                $result[$i]["mailaduser"] = $row["mailtoususer"];
                $result[$i]["mailadsubject"] = $row["mailtoussub"];
                $result[$i]["mailadiddate"] = $row["mailtousdate"];
                $result[$i]['username'] = $this->obj_vali->getAdminUsername();
                $mail_userid=$this->obj_vali->userNameToID($result[$i]['username']);
                $result[$i]['image'] = $this->obj_vali->getProfilePicture($mail_userid);
                $i++;
            }
            return $result;
        }
    }
    


    public function getSubMenuItems() {

        //    $session_data = $this->session->userdata('logged_in');
        // $table_prefix= $session_data['table_prefix'];

        $infinite_mlm_sub_menu = $this->table_prefix . "infinite_mlm_sub_menu";
        $qrCat = "select * from  $infinite_mlm_sub_menu WHERE sub_status='yes' order by sub_order_id";
        $res = $this->selectData($qrCat, "eroro on 34657 435");
        $i = 0;
        while ($row = mysql_fetch_array($res)) {
            $menu_item["detail$i"]["id"] = $row['sub_id'];
            $menu_item["detail$i"]["link"] = $row['sub_link'];
            $menu_item["detail$i"]["text"] = $row['sub_text'];
            $menu_item["detail$i"]["status"] = $row['sub_status'];
            $menu_item["detail$i"]["perm_admin"] = $row['perm_admin'];
            $menu_item["detail$i"]["perm_emp"] = $row['perm_emp'];
            $menu_item["detail$i"]["perm_dist"] = $row['perm_dist'];
            $menu_item["detail$i"]["order_id"] = $row['sub_order_id'];
            $i++;
        }
        return $menu_item;
    }
    
    
    public function getDownCount($user_id) {
       $this->downc = 0;
       $id_arr[] = $user_id;
       return $this->downCount($id_arr);
       
   }

   public function downCount($userid_arr) {
       $temp_array = array();
       $query = $this->createQuery($userid_arr);
       foreach ($query->result_array() as $row) {
          $temp_array[] = $row['id'];
       }
       $count = count($temp_array);
       $this->downc = $this->downc + $count;
       if ($count > 0) {
           
           $this->downCount($temp_array);
       }
       return $this->downc;
   }

   public function createQuery($userid_arr) {
      $limit = count($userid_arr);
       for ($i = 0; $i < $limit; $i++) {
           $user_id = $userid_arr[$i];
           if ($i == 0) {
               $where = "father_id = $user_id AND active != 'server'";
           } else {
               $where .= " OR father_id = $user_id  AND active != 'server'";
           }

         
       }
        $this->db->select("*");
        $this->db->where("$where");
        //$this->db->where("active !=", 'server');
        $query = $this->db->get('ft_individual');
        return $query;
   }

}