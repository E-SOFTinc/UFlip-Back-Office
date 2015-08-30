<?php
//CRATED BY ABDUL MAJEED 
	require_once 'Validation.php';
class Test extends Model {
    
	
    public $OBJ_VALI;
	
	 public function __construct()
    {
     $this->OBJ_VALI = new Validation();
    }
	public function performBoardRegTest()
    {
	    require_once 'AutoFillingBoardClass.php';
        $obj_reg=new AutofillingBoard();
	
		$board_no = 1;
		 for($i=0;$i<5;$i++)
		{
               $obj_reg->begin();
                $qr_sel = "SELECT id,user_name FROM 22ft_individual WHERE active = 'yes' AND board_activation_status = 'no' ORDER BY RAND()
                                LIMIT 1 ";
                $res= $this->selectData($qr_sel, "eror -4444");
                $row = mysql_fetch_array($res);
				
		$user_name =$row["user_name"];
		$referral_id = $row["id"];
		$obj_reg->addBoard($board_no,$referral_id,$user_name);
                 $obj_reg->commit();
		}
	   
      // echo "<br />ME FROM TEST FUCTUON ------------------------------>";
	} 
	
	public function performAutoReg($module_status)
	{

      require_once 'RegisterModel.php';
      $obj_reg=new Register();
	  
		$regr = array();
		
		$limit =50;
		$regr['referral_name']= "admin";
		$regr['referral_id']= "12345";
	    $regr['prodcut_id']= 1;
		
		$regr['full_name'] ="TEST NAME";
		$regr['pswd']      = "123";
		$regr['cpswd']     = "123";
		$regr['fathername']= "TEST FATHER NAME";
		$regr['address']   =  "TEST ADDRESS";
		$regr['post_office'] = "546537";
		$regr['town']      =  "TEST TOWN";
		$regr['district']  =  "TEST DT";
		$regr['pin']       = "TEST PIN";
		$regr['mobile']    = "TEST MOB";
		$regr['land_line'] = "TEST LAND";
		$regr['email']     = "testabdulmajeedpk@gmail.com";
		$regr['state']= "TEST ST";	

		
		for($i = 10;$i<$limit;$i++)
		{	
		$regr['username']= date("Y-m-d H:i:s")+$i;	
	    $fathet_pos_pass_arr = $this->getFatherPositionPassCode();	  
		$regr['fatherid']=$this->OBJ_VALI->IdToUserName($fathet_pos_pass_arr['father_id']);
	    $regr['position']=$fathet_pos_pass_arr['position'];
	    $regr['passcode']=$fathet_pos_pass_arr['passcode'];
		$regr['joining_date']= date('Y-m-d H:i:s');		
	    $obj_reg->confirmRegister($regr,$module_status);
        }
	}
	
	
	public function getFatherPositionPassCode()
{
    if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
	 $ft_individual=$this->table_prefix."ft_individual";
	 $pin_numbers=$this->table_prefix."pin_numbers";
	 $select = "SELECT *
	FROM $ft_individual
	WHERE active = 'server'
	ORDER BY user_level,id ASC LIMIT 1";
	$res = $this->selectData($select,"Error on select new user1");
	$row = mysql_fetch_array($res);
	$father_id = $row['father_id'];
	$position = $row['position'];

	$select_pass = "SELECT *
	FROM $pin_numbers
	WHERE 	status = 'yes' LIMIT 1";
	$res = $this->selectData($select_pass,"Error on select new pass1");
	$row = mysql_fetch_array($res);
	$passcode = $row['pin_numbers'];

	$ret['father_id'] = $father_id;
	$ret['position'] = $position;
	$ret['passcode'] = $passcode;

return $ret;
}


}