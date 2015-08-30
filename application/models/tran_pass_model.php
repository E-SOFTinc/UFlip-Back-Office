<?php

require_once 'Inf_Model.php';

class tran_pass_model extends Inf_Model {

    public $obj_vali;

    function __construct() {
        parent::__construct();
        require_once 'validation.php';
        $this->obj_vali = new Validation();
    }

    public function getUserPasscode($user_id) {
        $tran_password = "";
        $this->db->select('tran_password');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $res = $this->db->get('tran_password');
        
        foreach ($res->result_array() as $row) {
            $tran_password = $row['tran_password'];
        }
        return $tran_password;
    }

    public function sentTransactionPasscode($user_id, $passcode,$user_name) {
        $subject=$this->lang->line('Transaction_Password');
        $password=$this->lang->line('Your_current_transaction_password');
        $thank=$this->lang->line('Thanking_you');
        $dear=$this->lang->line('dear');
        $letter_arr = $this->getLetterSetting();
        $message = "$dear $user_name,<br /> $password <br /><b> $subject " . $passcode . "</b>";
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
                            		$dear $user_name<br>  
                                            <p>
                            			<table border='0' cellpadding='0' width='60%' >
                            			<tr>
                            				<td colspan='2' align='center'><b>$password " . $passcode . "</b></td>
                            			</tr>
                            			<tr>
                            				<td colspan='2'>$thank</td>
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

        $res=$this->obj_vali->sendEmail($mailBodyDetails, $user_id,$subject);
        return $res;
    }
    public function getLetterSetting() {
        $letter_arr=array();
        $this->db->select('*');
        $this->db->from('letter_config');
        $this->db->limit(1);
        $res = $this->db->get();
        foreach ($res->result_array() as $row) {
            $letter_arr['company_name'] = $row['company_name'];
            $letter_arr['address_of_company'] = $row['address_of_company'];
            $letter_arr['main_matter'] = $row['main_matter'];
            $letter_arr['logo'] = $row['logo'];
            $letter_arr['productmatter'] = $row['productmatter'];
            $letter_arr['place'] = $row['place'];
        }
       
        return $letter_arr;
    }
    public function updatePasscode($user_id, $new, $old = '') {
        if ($old != '') {
            $this->db->set('tran_password', $new);
            $this->db->where('user_id', $user_id);
            $this->db->where('tran_password', $old);
            $res = $this->db->update('tran_password');
        } else {
            $this->db->set('tran_password', $new);
            $this->db->where('user_id', $user_id);
            $res = $this->db->update('tran_password');
        }
        return $res;
    }

}