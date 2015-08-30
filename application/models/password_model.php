<?php

require_once 'Inf_Model.php';

class password_model extends Inf_Model {

    private $OBJ_PASS;
    public $OBJ_VAL;
    public $mail;

    public function __construct() {
        parent::__construct();
        require_once 'validation.php';
        require_once 'ProfileClass.php';
        $this->OBJ_PASS = new ProfileClass();
        $this->OBJ_VAL = new Validation();
       
    }

    public function isUserNameAvailable($user_name) {
        $res = $this->OBJ_VAL->isUserNameAvailable($user_name);
        return $res;
    }

    public function selectPassword($id, $user_type = '') {
        $this->db->select('password');
        $this->db->from('login_user');
        $this->db->where('user_id', $id);
        $this->db->where('addedby !=', 'server');
        $res = $this->db->get();

        foreach ($res->result_array() as $row) {
            $dbpassword = $row['password'];
        }
        $cnt = $res->num_rows();
        $pass_arr['dbpassword'] = $dbpassword;
        $pass_arr['cnt'] = $cnt;
        return $pass_arr;
    }

    public function updatePassword($new_pwd, $id = "", $user_name = "", $user_type = "", $user_ref_id = "", $table_prefix = "") {
        if ($user_name != "") {
            $id = $this->OBJ_VAL->userNameToID($user_name);
        }
        $this->db->set('password', $new_pwd);
        $this->db->where('user_id', $id);
        $res = $this->db->update($table_prefix . 'login_user');
//        if ($user_type == "admin") {
//            $res = $this->db->query("update infinite_mlm_user_detail SET pswd ='$new_pwd' WHERE id='$user_ref_id'");
//        }
        return $res;
    }

    //--------------------------------------------------
    public function sentPassword($user_id, $password, $user_name) {
        
        $letter_arr = $this->getLetterSetting();
        $subject = "Password Change";
        //$message = "Dear $user_name,<br /> Your current password is : <br /><b> Password : " . $password . "</b>";
        $message=$this->lang->line('dear')." $user_name,<br /> ".$this->lang->line('password_changed');
        $dt = date('Y-m-d h:m:s');

        $mailBodyDetails = "<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>
<body >
<table id='Table_01' width='600'   border='0' cellpadding='0' cellspacing='0'>
	<tr><td COLSPAN='3'></td></tr>

		<td width='50px'></td>
<td   width='520px'  >
		Dear $user_name<br>  
                <p>
			<table border='0' cellpadding='0' width='60%' >
			<tr>
				<td colspan='2' align='center'><b>Your current password is : " . $password . "</b></td>
			</tr>
			<tr>
				<td colspan='2'>Thanking you,</td>
			</tr>
			
            <tr>
				<td colspan='2'><p align='left'>" . $letter_arr['company_name'] . "<br />Date:" . $dt . "<br />Place : " . $letter_arr['place'] . "</p></td>				
            </tr>
		</table>
	<tr>
			<td COLSPAN='3'>
			</td>
	</tr>
	</table>
	</body>
	</html>";
      
            $this->OBJ_VAL->sendEmail($mailBodyDetails, $user_id, $subject);

        return true;
    }

    public function getPassword($user_id) {
        $this->db->select('password');
        $this->db->from('login_user');
        $this->db->where('user_id', $user_id);
        $res = $this->db->get();

        foreach ($res->result_array() as $row) {
            $dbpassword = $row['password'];
        }
        return $dbpassword;
    }

    public function getLetterSetting() {
        
        $this->db->select('*');
        $this->db->from('letter_config');
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
           $arr['company_name'] = $row['company_name'];
            $arr['address_of_company'] = $row['address_of_company'];
            $arr['main_matter'] = $row['main_matter'];
            $arr['logo'] = $row['logo'];
            $arr['productmatter'] = $row['productmatter'];
            $arr['place'] = $row['place'];
        }
       
        return $arr;
    }

    //----------------------------------------------------
}
