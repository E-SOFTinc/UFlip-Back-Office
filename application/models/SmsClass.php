<?php
class SmsClass extends Model
    {
         public $obj_misc;
   public $sms_acct_username;
   public $sms_acct_password;
   public $sms_sender_id;
   public $sms_api_path;
   public $phone_no_arr;
   public $sms_msg;
   public $client_obj;
   public $sms_param;


   public function __construct()
    {
          require_once 'sms_config.php';
          //$this->connectDB();
          $this->obj_misc=new Misc();
          $this->phone_no_arr=null;
          $this->sms_msg=null;
          $this->client_obj=null;
          $this->sms_param=Array();
          $this->sms_acct_username =  $sms_username;
          $this->sms_acct_password = $sms_password ;
          $this->sms_sender_id = $sms_senderid;
          $this->sms_api_path = $sms_api_path;
          $this->client_obj = new soapclient1($this->sms_api_path, true);
		  if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }

    }


    public function setSMSAPI()
    {
       $message=str_replace("\n","\r\n",$this->sms_msg);
       $this->sms_param = array('username'=>$this->sms_acct_username ,'senderid'=>$this->sms_sender_id, 'password'=>$this->sms_acct_password, 'message'=>$message, 'number'=>$this->phone_no_arr);
    }
    public function sendSMS()
    {
        $sms = $this->client_obj->call('SendSMS', $this->sms_param, '', '', false, true);
        return $sms;
    }

    public function insertsmsDeatails($numbers,$message,$sms_count,$sms)
    {
        $now=$this->obj_misc->getNow('Y-m-d H:i:s');
		if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
 	 $sms_history=$this->table_prefix."sms_history";

        $qr="INSERT INTO $sms_history (numbers, message, message_count, status, datetime ) VALUES ( '$numbers', '$message', $sms_count , '$sms' ,'$now')";
        $res = $this->insertData($qr,"Error on Inserting SMS Details..");
        return $res;
    }
public function checkSMSStatus()
{
    $flag=false;
     require_once 'Settings.php';
    $obj_settings=new Settings();
     $obj_arr =$obj_settings->getSettings();
    $status=$obj_arr["sms_status"];
    if($status=="enabled")
    {
    $flag=true;
    }
    else
    {
    $this->obj_misc->alert('You are unable to Send SMS ,Please Contact Administrator');
    }
    return $flag;
}

public function getBalance()
{
    $result = $this->client_obj->call('getBalance', $this->sms_param, '', '', false, true);
    return $result;
}
Public function echoSingleNumber($id)
{
if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
 	 $user_details=$this->table_prefix."user_details";
    $anisql="select user_detail_mobile from $user_details where user_detail_refid=$id";
	$anires=$this->selectData($anisql,'Error on selecting numbers...');
	$user=mysql_fetch_array($anires);
	if($user['user_detail_mobile']=="")
	{
	echo "No no available...";
	exit();
	}
	else
	{
	echo $user['user_detail_mobile'];
	exit();
	}
}
	Public function echoAllNumber($from,$to)
	{
	if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
	 $user_details=$this->table_prefix."user_details";
	$anisql="select user_detail_mobile from $user_details where user_detail_refid BETWEEN $from and $to";
	$anires=$this->selectData($anisql,"Error on selecting numbers...");
	$cnt=mysql_num_rows($anires);
	$numbers="";
	while($user=mysql_fetch_array($anires))
				{
				$len=strlen($user[user_detail_mobile]);
				if($user[user_detail_mobile]!=''&& $len==10)
				$numbers.=$user[user_detail_mobile].",";
				}
				$numbers=substr($numbers,0,(strlen($numbers)-1));
	echo $numbers;
	}
	Public function getAllNumbers()
	{
	if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
	 $user_details=$this->table_prefix."user_details";
	$anisql="select user_detail_mobile from $user_details order by user_detail_id ";
			  $anires=$this->selectData($anisql,"Error on selecting numbers");
			 	while($user=mysql_fetch_array($anires))
				{
				$len=strlen($user[user_detail_mobile]);
                if($user[user_detail_mobile]!=''&& $len==10)
                $numbers.=$user[user_detail_mobile].",";
				}
				return $numbers;
	}

	Public function echoAllUserSms($value,$text)
	{
            $echo="";

            if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
            $login_user=$this->table_prefix."login_user";
            $anisql="select * from $login_user where addedby != 'server' order by user_id asc";
            $anires=$this->selectData($anisql,"Error on selecting user");

            $echo.= "<option value='$value' selected='selected'>$text</option>";
            while($user=mysql_fetch_array($anires))
                {
                    extract($user);
                    $echo.=  "<option value='$user_id' >$user_name</option>";
                }
       return $echo;
    }
    }