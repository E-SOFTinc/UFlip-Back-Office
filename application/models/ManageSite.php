<?php
Class ManageSite extends Model
{
     public $table_prefix="";
 
     public function __construct()
    {
     //$this->connectDB();
     //$this->obj_vali=new Validation();
	  if($this->table_prefix=="")
             {
             $this->table_prefix=$_SESSION['table_prefix'];
             }
    }
  public function closeDB()
    {
       $this->closeDB();
    }
public function inserNewUserDetail($qr)
    {
        $res=$this->insertData($qr,"Invalid insert 123");
        return $res;
    }
	
public function insertReminder($user_id)
    {
        $insert_reminder="INSERT INTO reminder SET user_ref_id='$user_id'";
		//echo $insert_reminder;
		$res=$this->insertData($insert_reminder,"Invalid insert to reminder");
        return $res;
     }	
	 
	 //added by m.ali.km
	 public function upgradeAccount($user_ref_id)
	{
		$qry = "UPDATE infinite_mlm_user_detail SET account_status='upgraded' WHERE id='$user_ref_id'";
		$res = $this->updateData($qry, 'Error : sjdfhjdsfvhd12313135');
		return $res;
	}
	//endssss
	
public function updateNewUserDetail($_SESSION,$user_ref_id)
    {
	
      // $product=$_POST['product'];
       //$passcod=$_POST['passcod'];
       //$payout=$_POST['payout'];
       //$pair=$_POST['pair'];
       
       //$user_name=$_SESSION['username'];
       //$pswd=$_SESSION['password'];
       //$password=md5($_SESSION['password']);
       $company=$_SESSION['company'];
       $fullname=$_SESSION['fullname'];
       $phone=$_SESSION['phone'];
       $email=$_SESSION['email'];
       $country=$_SESSION['country'];
       $state="";
       if($country=="India")
           {
               $state=$_SESSION['state'];
           }
       $location=$_SESSION['location'];
         $qr="UPDATE  infinite_mlm_user_detail 
            SET 
			account_status='upgraded' ,
			company_name ='$company' ,
			full_name='$fullname',
			phone='$phone',
			email='$email',
            country='$country',
			location='$location',
			state='$state' 
			WHERE id='$user_ref_id'";
			//echo$qr;
		$res=$this->updateData($qr,"update fail  123302302");
        return $res;
    }
 public function isUserAvailable($user_name)
    {
	$flag=false;
        $qr="SElECT COUNT(*)AS cnt FROM infinite_mlm_user_detail WHERE user_name='$user_name'";
        $res=$this->selectData($qr,"Error on selecting username");
        $row=mysql_fetch_array($res);
        $cnt=$row['cnt'];
        if($cnt>0)
            {
                $flag=true;
            }
          return $flag;
   }

   
   
   public function getFirstPair($id="")
   {
   $this->table_prefix=$_SESSION['table_prefix'];
   if($id=="")
   {
   $id=$this->table_prefix;
   }
   $qr="SELECT first_pair FROM  infinite_mlm_cofiguration_binary where user_ref_id='$id' ";
	$res=$this->selectData($qr,"Error On Select Data from configuration binary 1 ");
	$row=mysql_fetch_array($res);
    $first_pair=$row['first_pair'];

    return $first_pair;
   }
   
   
   
    public function getProdutStatus()
    {
	$this->table_prefix=$_SESSION['table_prefix'];
        $id=$this->table_prefix;
        $qr="SELECT product_status FROM  infinite_mlm_cofiguration_binary where user_ref_id='$id' ";
	 $res=$this->selectData($qr,"Error On Select Data from configuration binary ");
	 $row=mysql_fetch_array($res);
        $status=$row['product_status'];

    return $status;
    }
	
	public function isProductAdded()
    {
     $flag = "no";
	$this->table_prefix=$_SESSION['table_prefix'];
	
        $product = $this->table_prefix."product";
        $qr="SELECT count(*) AS cnt FROM  $product ";
	$res=$this->selectData($qr,"Error On Select Data from product 001 ");
	 $row=mysql_fetch_array($res);
	 
        $cnt=$row['cnt'];
		
		if($cnt > 0)
		 $flag = "yes";

    return $flag;
    }
	
	public function isPinAdded()
    {
         $flag = "no";
	$this->table_prefix=$_SESSION['table_prefix'];
	
        $pin_numbers = $this->table_prefix."pin_numbers";
        $qr="SELECT count(*) AS cnt FROM  $pin_numbers ";
	$res=$this->selectData($qr,"Error On Select Data from product 001 ");
	 $row=mysql_fetch_array($res);
	 
        $cnt=$row['cnt'];
		
		if($cnt > 0)
		 $flag = "yes";

    return $flag;
    }
	
	
    public function getState()
    {
            $query="SELECT State_Id, State_Name FROM infinite_mlm_state  order by State_Name";
            $result=$this->selectData($query,"Error on slecting state id 23456");
            $i=0;
            while($row=mysql_fetch_array($result))
            {
            $arr["detail$i"]['State_Id']=$row['State_Id'];
            $arr["detail$i"]['State_Name']=$row['State_Name'];
            $i++;
            }

            return $arr;
    }
    public function getPinStatus()
    {
	$this->table_prefix=$_SESSION['table_prefix'];
        $id=$this->table_prefix;
        $qr="SELECT pin_status  FROM  infinite_mlm_cofiguration_binary where user_ref_id='$id' ";
	$res=$this->selectData($qr,"Error On Select Data from configuration binary ");
	 $row=mysql_fetch_array($res);
        $status=$row['pin_status'];

    return $status;
    }


    
	public function getAllMenuItems($id)
    {	
	
    $infinite_mlm_menu=$id."infinite_mlm_menu";
	$qr="SELECT * FROM  $infinite_mlm_menu ORDER BY id";
	$res=$this->selectData($qr,"Error On Select Data from Menu Items");
	$i=0;
	while($row=mysql_fetch_array($res))
	{
	$menu_item["detail$i"]["id"]=$row['id'];
	$menu_item["detail$i"]["link"]=$row['link'];
	$menu_item["detail$i"]["text"]=$row['text'];
	$menu_item["detail$i"]["status"]=$row['status'];
	$i++;
	}
    return $menu_item;
    }

    public function insertConfiguration($last_insert_id,$product,$passcod,$payout,$week_start,$week_end,$pair,$width_cieling,$depth_cieling)
    {
            $qr2="INSERT INTO infinite_mlm_cofiguration_binary SET  user_ref_id='$last_insert_id', product_status='$product',
            pin_status ='$passcod' ,currency='indian',payout_release='$payout', payout_starting_day='$week_start',payout_ending_day='$week_end',
            first_pair='$pair',width_ceiling='$width_cieling',depth_ceiling='$depth_cieling'";
            //echo $qr2;
		   $res=$this->insertData($qr2,"Invalid insert on configuration");
           return $res;
    }
	
	
	
	public function insertFeedback($feed_subject,$feed_detail,$user_id)
	
	{
	$insert4="INSERT INTO infinite_mlm_feedback (user_ref_id,feedback_subject,feedback_detail) values('$user_id','$feed_subject','$feed_detail')";
//echo $insert4;
$result4=$this->insertData($insert4,"Error on insertion to feed back...");
	
	return $result4;
	}
	
	
    public function getPayoutReleaseDate($id)
    {

	$qr="SELECT * FROM  infinite_mlm_cofiguration_binary WHERE user_ref_id='$id'";
	$res=$this->selectData($qr,"Error On Select Data config 556788");

	$row=mysql_fetch_array($res);
	$config["payout_release"]=$row['payout_release'];
        if($row['payout_release']=="week")
            {
        $config["payout_starting_day"]=$row['payout_starting_day'];
        $config["payout_ending_day"]=$row['payout_ending_day'];
            }
	
	
    return  $config;
    }

	  public function insertRequirementForBinary($last_insert_id,$product,$passcod,$payout,$week_start,$week_end,$pair,$width_cieling,$depth_cieling,
		$update_status="no")
    {
            $qr2="INSERT INTO infinite_mlm_binary_requirements SET  user_ref_id='$last_insert_id', product_status='$product',
            pin_status ='$passcod' ,currency='indian',payout_release='$payout', payout_starting_day='$week_start',payout_ending_day='$week_end',
            first_pair='$pair',infinite_mlm_update_status ='$update_status',width_ceiling='$width_cieling' ,depth_ceiling='$depth_cieling'";
           // echo $qr2;
		  $res=$this->insertData($qr2,"Invalid insert on configuration");
           return $res;
    }
	
	
	  public function updateRequirementForBinary($_POST,$user_ref_id,$fname, $plan)
    {
	
		//commented by m.ali.km
	   //print_r($fname);
	   /*
	   $filename=$fname;
       $product_status=$_POST['product'];
       $pin_status=$_POST['pin_status'];
	   $repurchase_status=$_POST['repurchase_status'];
       $currency=$_POST['currency'];
       $payout_release=$_POST['payout'];
       $payout_starting_day=$_POST['week_start'];
       $payout_ending_day=$_POST['week_end'];
       $first_pair=$_POST['first_pair'];
	   $second_pair=$_POST['second_pair'];
       $auto_filling_status=$_POST['auto_filling_status'];
	   $auto_filling_details=$_POST['auto_filling_details'];
	   $mlm_plan=$_POST['mlm_plan'];
	   $other_mlm_plan_details=$_POST['mlm_detail'];
	   $infinite_mlm_plan_interest=$_POST['interest_status'];
	   $infinite_mlm_plan_quote_status=$_POST['quote_status']; */
	  
	   
	  // $infinite_mlm_plan_document=$_POST['document'];
	   /*$sms_status=$_POST['sms_status'];
	   $shopping_status=$_POST['shopping_status'];
	   $payment_gateway_status=$_POST['payment_gateway_status'];
	   $website_design_status=$_POST['website_design_status'];
	   $domain_name_status=$_POST['domain_name_status'];
	   $infinite_mlm_update_status=$_POST['update_status'];
	    $refer_site=$_POST['refer_site'];*/
			
			
			
			
			/*
			$qr2="UPDATE infinite_mlm_binary_requirements SET  product_status='$product_status',pin_status ='$pin_status',repurchase_status='$repurchase_status',currency='indian',payout_release='$payout_release', payout_starting_day='$payout_starting_day',payout_ending_day='$payout_ending_day',first_pair='$first_pair',second_pair='$second_pair',auto_filling_status='$auto_filling_status',auto_filling_details='$auto_filling_details',mlm_plan='$mlm_plan',other_mlm_plan_details='$other_mlm_plan_details',infinite_mlm_plan_interest='$infinite_mlm_plan_interest',infinite_mlm_plan_quote_status='$infinite_mlm_plan_quote_status',sms_status='$sms_status',shopping_status='$shopping_status',payment_gateway_status='$payment_gateway_status',website_design_status='$website_design_status',filename='$filename',domain_name_status='$domain_name_status',refer_site='$refer_site',infinite_mlm_update_status = '$infinite_mlm_update_status' WHERE user_ref_id= '$user_ref_id' "; */
			
			$mlm_details = addslashes($_POST['mlm_details']);
			$shopping_status = $_POST['shopping_status'];
			$repurchase_status = $_POST['repurchase_status'];
			$replication_status = $_POST['replication_status'];
			$reference = addslashes($_POST['reference']);
		
			$qry = "UPDATE infinite_mlm_binary_requirements SET other_mlm_plan_details='$mlm_details', shopping_status='$shopping_status', repurchase_status='$repurchase_status', replication='$replication_status', refer_site='$reference', mlm_plan='$plan', filename='$fname' WHERE user_ref_id='$user_ref_id'";
				
           $res=$this->updateData($qry,"Invalid Update of binary requirements configuration");
		   

           return $res;
    }
	
	public function viewCountry($country="")
	{
	$echo="";
	$country_detail=$this->getCountry();
	$len=count($country_detail);
	$echo.= "<select name='country'  id='country' OnChange='createCountryField(this)'>";
	if($country=="")
            {
         $echo.= "<option value='' selected='selected'>Select Country</options>";
            }
            else if($country!="")
                {
         $echo.= "<option value='$country' selected='selected'>$country</options>";
                }
	for($i=0;$i<$len;$i++)
	{
   $country_name=$country_detail["detail$i"]["country_name"];
	$echo.= "<option value='$country_name'>$country_name</options>";
	}
		$echo.= "<option value='Other' >Other</options>";
	$echo.= "</select>";
    return $echo;
  }
  
  
	public function getCountry()
	{
	$qr02="SELECT * FROM infinie_mlm_country ORDER BY id";
	$res=$this->selectData($qr02,"Error On get Data from user country table");
	$i=0;
	while($row=mysql_fetch_array($res))
	{
	$country_detail["detail$i"]["id"]=$row['id'];
	$country_detail["detail$i"]["country_name"]=$row['country_name'];
	$i++;
	}
    return $country_detail;
	}
	
	public function getAllUserDetail()
	{
	$qr3="select c.*,u.* from infinite_mlm_cofiguration_binary as c  INNER JOIN infinite_mlm_user_detail as u on c.user_ref_id=u.id" ;

	
	$res=$this->selectData($qr3,"Error On get Data from user details");
	$i=0;
	while($row=mysql_fetch_array($res))
	{
	$user_detail["detail$i"]["id"]=$row['id'];
	$user_detail["detail$i"]["user_name"]=$row['user_name'];
	$user_detail["detail$i"]["pswd"]=$row['pswd'];
	$user_detail["detail$i"]["account_status"]=$row['account_status'];
	$user_detail["detail$i"]["company_name"]=$row['company_name'];
	$user_detail["detail$i"]["full_name"]=$row['full_name'];
	$user_detail["detail$i"]["phone"]=$row['phone'];
	$user_detail["detail$i"]["email"]=$row['email'];
	$user_detail["detail$i"]["country"]=$row['country'];
	$user_detail["detail$i"]["state"]=$row['state'];
	$user_detail["detail$i"]["location"]=$row['location'];
	$user_detail["detail$i"]["reg_date"]=$row['reg_date'];
	$user_detail["detail$i"]["product_status"]=$row['product_status'];
	$user_detail["detail$i"]["pv_status"]=$row['pv_status'];
	$user_detail["detail$i"]["pin_status"]=$row['pin_status'];
	$user_detail["detail$i"]["currency"]=$row['currency'];
	$user_detail["detail$i"]["payout_release"]=$row['payout_release'];
	$user_detail["detail$i"]["payout_starting_day "]=$row['payout_starting_day '];
	$user_detail["detail$i"]["payout_ending_day"]=$row['payout_ending_day'];
	$user_detail["detail$i"]["first_pair"]=$row['first_pair'];	
	$i++;
	}
    return $user_detail;
    }

  public function getOneUserDetail($user_id="")
    {
      if($user_id=="")
          {
              $user_id=$_SESSION['table_prefix'];
          }
        $qr3="select c.*,u.* from infinite_mlm_cofiguration_binary as c  INNER JOIN infinite_mlm_user_detail as u on c.user_ref_id=u.id WHERE u.id='$user_id'" ;
	//echo $qr3;
          $res=$this->selectData($qr3,"Error On get Data from user details34546");
	$i=0;
        $row=mysql_fetch_array($res);
	$user_detail["id"]=$row['id'];
	$user_detail["user_name"]=$row['user_name'];
	$user_detail["pswd"]=$row['pswd'];
	$user_detail["account_status"]=$row['account_status'];
	$user_detail["company_name"]=$row['company_name'];
	$user_detail["full_name"]=$row['full_name'];
	$user_detail["phone"]=$row['phone'];
	$user_detail["email"]=$row['email'];
	$user_detail["country"]=$row['country'];
	$user_detail["state"]=$row['state'];
	$user_detail["location"]=$row['location'];
	$user_detail["reg_date"]=$row['reg_date'];
	$user_detail["product_status"]=$row['product_status'];
	$user_detail["pv_status"]=$row['pv_status'];
	$user_detail["pin_status"]=$row['pin_status'];
	$user_detail["currency"]=$row['currency'];
	$user_detail["payout_release"]=$row['payout_release'];
	$user_detail["payout_starting_day "]=$row['payout_starting_day '];
	$user_detail["payout_ending_day"]=$row['payout_ending_day'];
	$user_detail["first_pair"]=$row['first_pair'];
     $user_detail["mlm_plan"]=$row['mlm_plan'];

	
    return $user_detail;
    }
	
	
	
	public function getBinaryDetail()
	{
	$qr4="select * from  infinite_mlm_binary_requirements ORDER BY id" ;

	
	$res=$this->selectData($qr4,"Error On get Data from user details");
	$i=0;
	while($row=mysql_fetch_array($res))
	{
	$user_detail["detail$i"]["id"]=$row['id'];
	$user_detail["detail$i"]["user_ref_id"]=$row['user_ref_id'];
	$user_detail["detail$i"]["product_status"]=$row['product_status'];
	$user_detail["detail$i"]["pv_status"]=$row['pv_status'];
	$user_detail["detail$i"]["pin_status"]=$row['pin_status'];
	$user_detail["detail$i"]["currency"]=$row['currency'];
	$user_detail["detail$i"]["payout_release"]=$row['payout_release'];
	$user_detail["detail$i"]["payout_starting_day"]=$row['payout_starting_day'];
	$user_detail["detail$i"]["payout_ending_day"]=$row['payout_ending_day'];
	$user_detail["detail$i"]["first_pair"]=$row['first_pair'];
	$user_detail["detail$i"]["auto_filling_status"]=$row['auto_filling_status'];
	$user_detail["detail$i"]["auto_filling_details"]=$row['auto_filling_details'];
	$user_detail["detail$i"]["other_mlm_plan_details"]=$row['other_mlm_plan_details'];
	$user_detail["detail$i"]["infinite_mlm_plan_interest"]=$row['infinite_mlm_plan_interest'];
	$user_detail["detail$i"]["infinite_mlm_plan_quote_status"]=$row['  	infinite_mlm_plan_quote_status'];
	$user_detail["detail$i"]["infinite_mlm_plan_document"]=$row['infinite_mlm_plan_document'];
	
	$i++;
	}
    return $user_detail;
    }



 public function createTablesBinary($id,$product,$passcod,$username,$fullname,$phone,$email,$country,$location, $password)
    {

	$first_pair=$this->getFirstPair($id);
	
	
	$module_status=$id."module_status";
    $modules="CREATE TABLE $module_status (
  `id` int(11) NOT NULL auto_increment,
  `mlm_plan` varchar(50) NOT NULL,
  `first_pair` varchar(50) NOT NULL,
  `pin_status` varchar(50) NOT NULL,
  `no_of_pin_types` int(5) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `sms_status` varchar(50) NOT NULL,
  `mailbox_status` varchar(50) NOT NULL,
  `referal_status` varchar(50) NOT NULL,
  `sec_pswd_status` varchar(50) NOT NULL,
  `emp_login_status` varchar(50) NOT NULL,
  `news_status` varchar(50) NOT NULL,
  `galery_status` varchar(50) NOT NULL,
  `feedback_status` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12352 ;
";
	$this->insertData($modules);
	
	
	
	$module_status=$id."module_status";	
$insert1="INSERT INTO $module_status (mlm_plan,first_pair, pin_status, no_of_pin_types,
          product_status,sms_status,mailbox_status,referal_status,sec_pswd_status,emp_login_status,
		  news_status,galery_status,feedback_status) 
		  values('binary','$first_pair','$passcod','1','$product','yes','yes','no','no','no','no','no','no')";

$result1=mysql_query($insert1) or die("Error 1 on insertion to modules ..9.");


	
 $ft_individual=$id."ft_individual";
$qr_ft="CREATE TABLE $ft_individual (
`id` int( 10 ) unsigned NOT NULL AUTO_INCREMENT ,
`order_id` int( 20 ) NOT NULL ,
`user_name` varchar( 30 ) NOT NULL ,
`active` varchar( 10 ) NOT NULL default 'yes',
`position` char( 1 ) NOT NULL default '',
`father_id` int( 10 ) NOT NULL default '0',
`first_pair` varchar( 50 ) NOT NULL ,
`total_leg` int( 20 ) NOT NULL ,
`total_left_carry` int( 20 ) NOT NULL ,
`total_right_carry` int( 20 ) NOT NULL ,
`product_id` int( 20 ) NOT NULL ,
`date_of_joining` timestamp NOT NULL default CURRENT_TIMESTAMP ,
`user_level` int( 20 ) NOT NULL ,
PRIMARY KEY ( `id` ) ,
UNIQUE KEY `first` ( `user_name` )
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT =12345;";
$this->insertData($qr_ft,"Error on ftindual... ");



$login_user=$id."login_user";
echo $login_usr="CREATE TABLE $login_user (
  `user_id` int(11) NOT NULL auto_increment,
  `addedby` varchar(50) NOT NULL default 'server',
  `user_type` varchar(20) NOT NULL default 'distributor',
  `user_name` varchar(100) default NULL,
  `password` varchar(50) default NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12352 ;
";
$this->insertData($login_usr);


$insert1="INSERT INTO $login_user (user_id,user_type, addedby, user_name,password) values('$id','admin','code','admin','$password')";
//echo $insert1;
$result1=mysql_query($insert1) or die("Error 1 on insertion to login_user..9.");




$insert="INSERT INTO $ft_individual SET
		id='$id', 
		father_id=0,
                order_id = '1',
		position = '', 
		user_name ='admin', 
		active='yes',
		product_id=1,
		user_level='1'
		";
		// echo $insert;
		$result2 = mysql_query($insert) or die("Error in inserting table5553");



                $pswd=md5("FFGFG56676FGVBBN");
                $insert1="INSERT INTO $login_user (user_type, addedby, user_name,password) values('distributor','server','InfiniteMLMTemp1','$pswd')";
               // echo $insert1;
                $result2 = mysql_query($insert1) or die("Error in inserting table5634565");
                $last_insert_id=mysql_insert_id();


                $insert3="INSERT INTO $ft_individual SET
		id=' $last_insert_id', father_id='$id', position = 'L', user_name ='InfiniteMLMTemp1', active='server',product_id=1";
		// echo $insert;
		$result2 = mysql_query($insert3) or die("Error in inserting table565");


                  $pswd=md5("FFGFGFG54565VBBN");
                $insert4="INSERT INTO $login_user (user_type, addedby, user_name,password) values('distributor','server','InfiniteMLMTemp2','$pswd')";
                 $result2 = mysql_query($insert4) or die("Error in inserting table56555");
                  $last_insert_id=mysql_insert_id();


                $insert5="INSERT INTO $ft_individual SET
		id=' $last_insert_id', father_id='$id', position = 'R', user_name ='InfiniteMLMTemp2', active='server',product_id=1";
		// echo $insert;
		$result2 = mysql_query($insert5) or die("Error in inserting table534344");
	

//$id="gold_";
$infinite_mlm_menu=$id."infinite_mlm_menu";
   $qr_menu="CREATE TABLE $infinite_mlm_menu (
  `id` int(12) NOT NULL auto_increment,
  `link` varchar(200) NOT NULL,
  `text` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
   `perm_admin` int(12) NOT NULL,
   `perm_dist` int(12) NOT NULL,
   `perm_emp` int(12) NOT NULL,
   `main_order_id` int(12) NOT NULL,
   PRIMARY KEY  (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
//echo "FDDDDD $qr_menu";
$this->insertData($qr_menu,"Error on 34346576");





$infinite_mlm_menu=$id."infinite_mlm_menu";
$infinite_mlm_menu_value="
INSERT INTO $infinite_mlm_menu (link,text,status,perm_admin,perm_emp,perm_dist,main_order_id) VALUES
('tree/ft_chart.php', 'Downline Graphical view','yes',1,1,1,1),
('index.php?page=LegCount', 'My Earnings','yes',1,1,1,2),
('index.php?page=WeeklyPayout', 'Weekly Payout','yes',1,1,1,3),
('index.php?page=ChangePassword', 'Change Password','yes',1,1,1,4),
('index.php?page=UpdateProfile', 'Profile Management','yes',1,1,1,5),
('index.php?page=MemberManagement', 'Member Management','yes',1,0,0,6),
('#', 'Achievers management','yes',1,1,0,7),
('index.php?page=Joining', 'Joining Status','yes',1,1,0,8),
('index.php?page=Config', 'Configuration','yes',1,0,0,9),
('index.php?page=AddProduct', 'Product Management','$product',1,0,0,10),
('#', 'Passcode Management','$passcod',1,1,1,11),
('index.php?page=ProfileReport', 'Reports','yes',1,0,0,12),
('index.php?page=SendSMS','Send SMS','yes',1,1,0,13),
('index.php?page=SMSBalance','SMS Details','yes',1,1,0,14),
('index.php?page=AddNews', 'News Management','yes',1,1,0,15),
('index.php?page=Feedback', 'Feedback','yes',1,1,1,16),
('index.php?page=ComboxMessage', 'Compose Mail','yes',1,1,1,17),
('index.php?page=InboxMail', 'Inbox','yes',1,1,1,18),
('index.php?page=Outbox', 'Outbox','yes',0,0,0,19),
('logout.php', 'Logout','yes',1,1,1,20)
;";
     
//echo $infinite_mlm_menu_value;
$this->insertData($infinite_mlm_menu_value,"Error ion 455767");


  $sub_menu=$id."infinite_mlm_sub_menu";
  $sub_menu_qr="CREATE TABLE IF NOT EXISTS `$sub_menu` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_text` varchar(100) NOT NULL,
  `sub_status` varchar(100) NOT NULL,
  `sub_refid` varchar(100) NOT NULL,
  `sub_link` varchar(100) NOT NULL,
  `perm_admin` int(12) NOT NULL,
   `perm_dist` int(12) NOT NULL,
   `perm_emp` int(12) NOT NULL,
   `sub_order_id` int(12) NOT NULL,
    PRIMARY KEY (`sub_id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ";

$this->insertData($sub_menu_qr,"Error on 454565");


$infinite_mlm_sub_menu=$id."infinite_mlm_sub_menu";
$infinite_mlm_sub_menu_value="
                    INSERT INTO $infinite_mlm_sub_menu (sub_link,sub_text,sub_status,perm_admin,perm_emp,perm_dist,sub_order_id,sub_refid) VALUES
                    ('index.php?page=AddProduct','Add New Product','$product',1,0,0,1,10),
                    ('index.php?page=EditProduct','Edit Product','$product',1,0,0,2,10),
                    ('index.php?page=DeleteProduct','Delete Product','$product' ,1,0,0,3,10),
                    ('index.php?page=InactiveProduct','Inactive Product','$product',1,0,0,4,10),
                    ('index.php?page=GeneratePasscod','Add New Passcode','$passcod',1,0,0,1,11),
                    ('index.php?page=SearchPasscod','Search Passcode','$passcod',1,0,0,2,11),
                    ('index.php?page=DeletePasscod','Delete Passcode','$passcod',1,0,0,3,11),
                    ('index.php?page=ActivePasscod','Active Passcode','$passcod',1,0,0,4,11),
                    ('index.php?page=InactivePasscod', 'Inactive Passcode','$passcod',1,0,0,5,11),
                    ('index.php?page=ViewPinReq', 'View Passcode Request','$passcod',1,1,0,6,11),
                    ('index.php?page=ReqPin', 'Request Passcode','$passcod',0,0,1,7,11),
                    ('index.php?page=ViewMyPin', 'View My Pin','$passcod',0,0,1,8,11),

                    ('index.php?page=ProfileReport', 'Member Profile Report','yes',1,0,0,1,12),
                    ('index.php?page=TotalJoiningReport', 'Joining Reports','yes',1,0,0,2,12),
                    ('index.php?page=TotalPayoutReport', 'Payout Reports','yes',1,0,0,3,12),
                    ('index.php?page=BankStatementReport', 'Bank Statement Reports','yes',1,1,1,4,12);";

$this->insertData($infinite_mlm_sub_menu_value,"Error on 34657");



     
   $configuration=$id."configuration";
   $qr_confic="CREATE TABLE $configuration (
`id` int(11) NOT NULL auto_increment,
`tds` float NOT NULL default '0',
`pair_price` int(11) NOT NULL,
`pair_ceiling` int(11) NOT NULL default '100',
`service_charge` float NOT NULL default '0',
`product_point_value` int(11) NOT NULL default '1',
`pair_value` int(11) NOT NULL,
`payout_release` varchar(50) NOT NULL,
`start_date` varchar(50) NOT NULL,
`end_date` varchar(50) NOT NULL,
`sms_status` varchar(250) NOT NULL default 'enabled',
`setting_staus` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2";
$this->insertData($qr_confic);
$config_arr=$this->getPayoutReleaseDate($id);
//print_r($config_arr);
$pay_release=$config_arr["payout_release"];
if($pay_release=="week")
    {
$pay_start=$config_arr["payout_starting_day"];
$pay_end=$config_arr["payout_ending_day"];


$qr="INSERT INTO $configuration SET tds='0' ,pair_price ='1', pair_ceiling ='100' ,service_charge ='0',pair_value='1',payout_release='$pay_release',start_date='$pay_start',end_date='$pay_end',setting_staus='no'";
    }
    else
        {
  $qr="INSERT INTO $configuration SET tds='0' ,pair_price ='1', pair_ceiling ='100' ,service_charge ='0',pair_value='1',payout_release='$pay_release',setting_staus='no'";
        }
//echo $qr;
$this->insertData($qr,"Error on insert 9468789579");

$leg_amount=$id."leg_amount";
$qr_leg_amount="CREATE TABLE $leg_amount (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `total_leg` int(11) NOT NULL default '0',
  `left_leg` int(11) NOT NULL default '0',
  `right_leg` int(11) NOT NULL default '0',
  `total_amount` float NOT NULL default '0',
  `leg_amount_carry` int(20) NOT NULL,
   `flush_out_pair` int(20) NOT NULL,
  `amount_payable` float NOT NULL default '0',
  `amount_type` varchar(50) NOT NULL,
  `tds` float NOT NULL default '0',
  `date_of_submission` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `service_charge` float NOT NULL default '0',
  `user_level` int(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;

$this->insertData($qr_leg_amount,"Invalid insert Leg amount123");

$amount_paid=$id."amount_paid";
$qr_amount_paid="CREATE TABLE $amount_paid (
  `paid_id` int(11) NOT NULL auto_increment,
  `paid_user_id` int(11) NOT NULL,
  `paid_amount` double NOT NULL,
  `paid_date` date NOT NULL,
  `paid_level` int(11) NOT NULL,
  `paid_type` varchar(50) NOT NULL,
  PRIMARY KEY  (`paid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
$this->insertData($qr_amount_paid,"Invalid insert amount paid");

$leg_carry_forward=$id."leg_carry_forward";
$qr_leg_carry_frwd="CREATE TABLE $leg_carry_forward (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `carry_left` int(11) NOT NULL default '0',
  `carry_right` int(11) NOT NULL default '0',
  `date_to_calculate` datetime NOT NULL default '0000-00-00 00:00:00',
  `date_of_insertion` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `greatest_level` int(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";

$this->insertData($qr_leg_carry_frwd);








$user_details=$id."user_details";
$user_detail_qr="CREATE TABLE $user_details (
  `user_detail_id` int(11) NOT NULL auto_increment,
  `user_detail_refid` int(11) NOT NULL default '0',
  `user_details_ref_user_id` int(11) NOT NULL,
  `userdetail_mobid` varchar(250) NOT NULL,
  `user_detail_name` varchar(250) NOT NULL default '',
  `user_details_prod` varchar(100) NOT NULL,
  `user_detail_father` varchar(250) default NULL,
  `user_details_position` varchar(10) NOT NULL,
  `user_detail_address` text NOT NULL,
  `user_detail_town` varchar(250) NOT NULL default '',
  `user_detail_country` varchar(50) NOT NULL default '',
  `user_detail_state` varchar(250) NOT NULL default '',
  `user_detail_district` varchar(250) NOT NULL default '',
  `user_detail_po` varchar(250) default NULL,
  `user_detail_pin` int(11) NOT NULL default '0',
  `user_detail_college` varchar(250) default NULL,
  `user_detail_course` varchar(250) default NULL,
  `user_detail_year_study` int(250) default NULL,
  `user_detail_blood_group` varchar(10) default NULL,
  `user_detail_donate_blood` varchar(5) default NULL,
  `user_detail_area_interest` varchar(250) default NULL,
  `user_detail_qualification` varchar(250) default NULL,
  `user_detail_designation` varchar(250) default NULL,
  `user_detail_dept` varchar(250) default NULL,
  `user_detail_office` varchar(250) default NULL,
  `user_detail_place_work` varchar(250) default NULL,
  `user_detail_seek_job` varchar(5) default NULL,
  `user_detail_passcode` varchar(250) NOT NULL default '',
  `user_detail_mobile` varchar(250) NOT NULL default '',
  `user_detail_land` varchar(250) NOT NULL default '',
  `user_detail_email` varchar(250) NOT NULL default '',
  `user_detail_dob` date NOT NULL default '0000-00-00',
  `user_detail_gender` varchar(50) NOT NULL default '',
  `user_detail_nominee` varchar(250) NOT NULL default '',
  `user_detail_relation` varchar(250) NOT NULL default '',
  `user_detail_acnumber` varchar(250) NOT NULL default '',
  `user_detail_ifsc` varchar(50) NOT NULL default '',
  `user_detail_nbank` varchar(250) NOT NULL default '',
  `user_detail_nbranch` varchar(250) NOT NULL default '',
  `user_detail_pan` varchar(100) NOT NULL default '',
  `user_level` int(11) NOT NULL,
  `join_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12348 ;
";
$this->insertData($user_detail_qr);

$insert_details="insert into $user_details  set user_detail_refid='$id',user_detail_name='$fullname',user_detail_address='$username',user_detail_town='$location',user_detail_state='',user_detail_district='',user_detail_pin='',user_detail_passcode='000000',user_detail_mobile='',user_detail_land='$phone',user_detail_email='$email',user_detail_dob='',user_detail_gender='M',user_detail_nominee='',user_detail_relation='Self',user_detail_acnumber='',user_detail_nbank='',user_detail_nbranch=''";

$result_details=mysql_query($insert_details) or die("Error 1 on insertion to login_details...");



if($passcod=='yes')
{
$pin_config=$id."pin_config";
$pin_config="CREATE TABLE $pin_config (
  `id` int(11) NOT NULL auto_increment,
  `pin_amount` double default NULL,
  `pin_length` int(11) default NULL,
  `pin_type` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$this->insertData($pin_config,"Error on create pinconfig3543465");
$pin_numbers=$id."pin_numbers";
$pin_no="CREATE TABLE `$pin_numbers` (
  `pin_id` int(11) NOT NULL auto_increment,
  `pin_prod_refid` int(11) NOT NULL default '0',
  `pin_numbers` varchar(15) NOT NULL,
  `pin_alloc_date` date NOT NULL default '0000-00-00',
  `status` varchar(50) NOT NULL default 'active',
  `used_user` varchar(250) NOT NULL,
  `generated_user_id` varchar(100) NOT NULL,
  `allocated_user_id` varchar(20) NOT NULL,
  `user_pin_name` varchar(250) NOT NULL,
  `pin_type` varchar(50),
  `pin_uploded_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`pin_id`),
  UNIQUE KEY `pin_numbers` (`pin_numbers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";
$this->insertData($pin_no,"Error on create pinnum35f4563465");






$pin_request=$id."pin_request";
$qr_pin_request="CREATE TABLE $pin_request (
  `req_id` int(11) NOT NULL auto_increment,
  `req_user_id` int(11) NOT NULL,
  `req_pin_count` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `req_rec_pin_count` int(11) NOT NULL,
  `req_date` date NOT NULL,
  `req_rec_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY  (`req_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

$this->insertData($qr_pin_request,"Error on create qr_pin_request");






}


if($product=='yes')
{
$product=$id."product";
$product="CREATE TABLE $product (
  `product_id` int(11) NOT NULL auto_increment,
  `product_name` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL,
  `date_of_insertion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `prod_id` varchar(10) NOT NULL,
  `product_value` float NOT NULL,
  `pair_value` int(11) NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
";
$this->insertData($product,"Error on create pinconfigfggffg3543465");
$repurchase=$id."repurchase";
$repur="CREATE TABLE $repurchase (
  `repurchase_id` int(11) NOT NULL auto_increment,
  `repurchase_user_id` varchar(250) NOT NULL,
  `repurchase_pro_id` int(250) NOT NULL,
  `repurchase_pro_amount` float NOT NULL,
  `repurchase_date` datetime NOT NULL,
  PRIMARY KEY  (`repurchase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;
";

$this->insertData($repur,"Error on create rep3543466676");
}


$sms_history=$id."sms_history";
$sms_hist="CREATE TABLE $sms_history(
  `id` int(11) NOT NULL auto_increment,
  `numbers` text NOT NULL,
  `message` text NOT NULL,
  `message_count` int(11) NOT NULL default '0',
  `status` varchar(255) NOT NULL default '',
  `datetime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;
";
$this->insertData($sms_hist);
$mailtoadmin=$id."mailtoadmin";
$mail_admin="CREATE TABLE $mailtoadmin (
  `mailadid` int(11) NOT NULL auto_increment,
  `mailaduser` int(12) NOT NULL,
  `mailadsubject` text NOT NULL,
  `mailadiddate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL,
  `mailadidmsg` longtext NOT NULL,
  PRIMARY KEY  (`mailadid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$this->insertData($mail_admin);



$mailtouser=$id."mailtouser";
$mail_usr="CREATE TABLE $mailtouser(
  `mailtousid` int(11) NOT NULL auto_increment,
  `mailtoususer` int(11) NOT NULL,
  `mailtoussub` text NOT NULL,
  `mailtousmsg` longtext NOT NULL,
  `mailtousdate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL default 'yes',
  PRIMARY KEY  (`mailtousid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$this->insertData($mail_usr,"Error 1324");

$events=$id."events";
    $qr_event="CREATE TABLE $events (
  `events_id` int(11) NOT NULL auto_increment,
  `events_title` varchar(250) NOT NULL default '',
  `events_desc` text NOT NULL,
  `events_date` date NOT NULL default '0000-00-00',
  `events_venue` varchar(250) NOT NULL default '',
  `events_time` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`events_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
$this->insertData($qr_event);
$feedback=$id."feedback";
$qr_feedback="CREATE TABLE $feedback (
  `feedback_id` int(11) NOT NULL auto_increment,
  `feedback_name` varchar(250) NOT NULL default '',
  `feedback_company` varchar(250) NOT NULL default '',
  `feedback_email` varchar(250) NOT NULL default '',
  `feedback_phone` varchar(250) NOT NULL default '',
  `feedback_time` varchar(250) NOT NULL default '',
  `feedback_remark` text NOT NULL,
  `feedback_date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$this->insertData($qr_feedback,"Error on creating feedback ..212");
$news=$id."news";
$news="CREATE TABLE $news(
  `news_id` int(11) NOT NULL auto_increment,
  `news_title` varchar(250) NOT NULL default '',
  `news_desc` text NOT NULL,
  `news_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;
";
$this->insertData($news);
$life_district=$id."life_district";
$qr_district="CREATE TABLE $life_district (
  `District_Id` int(11) NOT NULL auto_increment,
  `District_State_Ref_Id` int(11) NOT NULL default '0',
  `District_Name` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`District_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=601 ;
";
$this->insertData($qr_district);


$life_district=$id."life_district";
$life_value="INSERT INTO $life_district (`District_Id`, `District_State_Ref_Id`, `District_Name`) VALUES
(1, 1, 'Thiruvananthapuram'),
(2, 1, 'Kozhikode'),
(3, 1, 'Malappuram'),
(4, 1, 'Kollam'),
(5, 1, 'Pathanamthitta'),
(6, 1, 'Alappuzha'),
(7, 1, 'Kottayam'),
(8, 1, 'Idukki'),
(9, 1, 'Ernakulam'),
(10, 1, 'Thrissur'),
(11, 1, 'Palakkad'),
(12, 1, 'Kannur'),
(13, 1, 'kasargode'),
(14, 1, 'Wayanad'),
(17, 2, 'Agra'),
(18, 2, 'Alahabad'),
(19, 2, 'Aligarh'),
(20, 2, 'Ambedkar Nagar'),
(21, 2, 'Auraiya'),
(22, 2, 'Azamgarh'),
(23, 2, 'Barabanki'),
(24, 2, 'Badaun'),
(25, 2, 'Bagpat'),
(26, 2, 'Bahraich'),
(27, 2, 'Bijnor'),
(28, 2, 'Ballia'),
(29, 2, 'Banda District'),
(30, 2, 'Balrampur'),
(31, 2, 'Bareilly'),
(32, 2, 'Basti'),
(33, 2, 'Bulandshahr'),
(34, 2, 'Chandauli'),
(35, 2, 'Chitrakoot'),
(36, 2, 'Deoria'),
(37, 2, 'Etah'),
(38, 2, 'Etawah'),
(39, 2, 'Firozbad'),
(40, 2, 'Farrukhabad'),
(41, 2, 'Fatehpur'),
(42, 2, 'Faizabad'),
(43, 2, 'Gautam Buddha Nagar'),
(44, 2, 'Gonda'),
(45, 2, 'Ghazipur'),
(46, 2, 'Gorkakhpur'),
(47, 2, 'Ghaziabad'),
(48, 2, 'Hamirpur'),
(49, 2, 'Hardoi'),
(50, 2, 'Mahamaya Nagar'),
(51, 2, 'Jhansi'),
(52, 2, 'Jalaun'),
(53, 2, 'Jyotiba Phule Nagar'),
(54, 2, 'Jaunpur District'),
(55, 2, 'Kanpur Dehat'),
(56, 2, 'Kannauj'),
(57, 2, 'Kanpur Nagar'),
(58, 2, 'Kanshi Ram Nagar'),
(59, 2, 'Kaushambi'),
(60, 2, 'Kushinagar'),
(61, 2, 'Lalitpur'),
(62, 2, 'Lakhimpur Kheri'),
(63, 2, 'Lucknow'),
(64, 2, 'Mau'),
(65, 2, 'Meerut'),
(66, 2, 'Maharajganj'),
(67, 2, 'Mahoba'),
(68, 2, 'Mirzapur'),
(69, 2, 'Moradabad'),
(70, 2, 'Mainpuri'),
(71, 2, 'Mathura'),
(72, 2, 'Muzaffarnagar'),
(73, 2, 'Pilibhit'),
(74, 2, 'Pratapgarh'),
(75, 2, 'Rampur'),
(76, 2, 'Rae Bareli'),
(77, 2, 'Saharanpur'),
(78, 2, 'Sitapur'),
(79, 2, 'Shahjahanpur'),
(80, 2, 'Sant Kabir Nagar'),
(81, 2, 'Siddharthnagar'),
(82, 2, 'Sonbhadra'),
(83, 2, 'Sant Ravidas Nagar'),
(84, 2, 'Sultanpur'),
(85, 2, 'Shravasti'),
(86, 2, 'Unnao'),
(87, 2, 'Varanasi'),
(88, 3, 'Ahmednagar'),
(89, 3, 'Beed'),
(90, 3, 'Dhule'),
(91, 3, 'Jalgaon'),
(92, 3, 'Mumbai City'),
(93, 3, 'Nandurbar'),
(94, 3, 'Pune'),
(95, 3, 'Satara'),
(96, 3, 'Wardha'),
(97, 3, 'Akola'),
(98, 3, 'Bhandara'),
(99, 3, 'Gadchiroli'),
(100, 3, 'Jalna'),
(101, 3, 'Mumbai Sub-urban'),
(102, 3, 'Nashik'),
(103, 3, 'Raigad'),
(104, 3, 'Sindhudurg'),
(105, 3, 'Washim'),
(106, 3, 'Amravati'),
(107, 3, 'Buldhana'),
(108, 3, 'Gondia'),
(109, 3, 'Kolhapur'),
(110, 3, 'Nagpur'),
(111, 3, 'Osmanabad'),
(112, 3, 'Ratnagiri'),
(113, 3, 'Solapur'),
(114, 3, 'Yavatmal'),
(115, 3, 'Aurangabad'),
(116, 3, 'Chandrapur'),
(117, 3, 'Hingoli'),
(118, 3, 'Latur'),
(119, 3, 'Nanded'),
(120, 3, 'Parbhani'),
(121, 3, 'Sangli'),
(122, 3, 'Thane'),
(123, 4, 'Araria'),
(124, 4, 'Bhabhua'),
(125, 4, 'East Champaran'),
(126, 4, 'Katihar'),
(127, 4, 'Madhubani'),
(128, 4, 'Patna'),
(129, 4, 'saran'),
(130, 4, 'Supaul'),
(131, 4, 'Arwal'),
(132, 4, 'Bhagalpur'),
(133, 4, 'Gaya'),
(134, 4, 'Khagaria'),
(135, 4, 'Munger'),
(137, 4, 'Purnia'),
(138, 4, 'Sheohar'),
(139, 4, 'Vaishali'),
(140, 4, 'Aurangabad'),
(141, 4, 'Bhojpur'),
(142, 4, 'Gopalganj'),
(143, 4, 'Kishanganj'),
(144, 4, 'Muzaffarpur'),
(145, 4, 'Rohtas'),
(146, 4, 'Shiekhpura'),
(147, 4, 'West Champaran'),
(148, 4, 'Banka'),
(149, 4, 'Buxar'),
(150, 4, 'Jamui'),
(151, 4, 'Lakhisarai'),
(152, 4, 'Nalanda'),
(153, 4, 'Saharsa'),
(154, 4, 'Sitamarhi'),
(155, 4, 'Begusarai'),
(156, 4, 'Darbhanga'),
(157, 4, 'Jehanabad'),
(158, 4, 'Madhepur'),
(159, 4, 'Nawada'),
(160, 4, 'Samastipur'),
(161, 4, 'Siwan'),
(163, 5, 'Kolkata'),
(164, 5, 'Bankura'),
(165, 5, 'Birbhum'),
(166, 5, 'Burdwan'),
(167, 5, 'Coochbehar'),
(168, 5, 'Darjeeling'),
(169, 5, 'Hoogly'),
(170, 5, 'Howrah'),
(171, 5, 'Jalpaiguri'),
(172, 5, 'Malda'),
(173, 5, 'Midnapore'),
(174, 5, 'Murshidabad'),
(175, 5, 'Nadia'),
(176, 5, 'Purulia'),
(177, 5, 'North 24 Parganas'),
(178, 5, 'South 24 Parganas'),
(179, 5, 'North Dinajpur'),
(180, 5, 'South Dinajpur'),
(181, 6, 'Adilabad'),
(182, 6, 'Anantapur'),
(183, 6, 'Chittoor'),
(184, 6, 'East Godavari'),
(185, 6, 'Guntur'),
(186, 6, 'Hyderabad'),
(187, 6, 'Kadapa'),
(188, 6, 'Karimnagar'),
(189, 6, 'Khammam'),
(190, 6, 'Krishna'),
(191, 6, 'Kurnool'),
(192, 6, 'Mahbubnagar'),
(193, 6, 'Nalgonda'),
(194, 6, 'Medak'),
(195, 6, 'Nellore'),
(196, 6, 'Nizamabad'),
(197, 6, 'Prakasam'),
(198, 6, 'Rangareddi'),
(199, 6, 'Srikakulam'),
(200, 6, 'Vishakhapatnam'),
(201, 6, 'Vizianagaram'),
(202, 6, 'Warangal'),
(203, 6, 'West Godavari'),
(204, 7, 'Ariyalur'),
(205, 7, 'Chennai'),
(206, 7, 'Coimbatore'),
(207, 7, 'Cuddalore'),
(208, 7, 'Dharmapuri'),
(209, 7, 'Dindigul'),
(210, 7, 'Erode'),
(211, 7, 'Kanchipuram'),
(212, 7, 'Kanyakumari'),
(213, 7, 'Karur'),
(214, 7, 'Madurai'),
(215, 7, 'Nagapattinam'),
(216, 7, 'The Nilgiris'),
(217, 7, 'Namakkal'),
(218, 7, 'Perambalur'),
(219, 7, 'Pudukkottai'),
(220, 7, 'Ramanathapuram'),
(221, 7, 'Salem'),
(222, 7, 'Sivaganga'),
(223, 7, 'Tiruchirappalli'),
(224, 7, 'Theni'),
(225, 7, 'Tirunelveli'),
(226, 7, 'Tanjore'),
(227, 7, 'Thoothukudi'),
(228, 7, 'Thiruvallur'),
(229, 7, 'Thiruvarur'),
(230, 7, 'Tirupur'),
(231, 7, 'Tiruvannamalai'),
(232, 7, 'Vellore'),
(233, 0, 'Villupuram'),
(234, 8, 'Balaghat'),
(235, 8, 'Barwani'),
(236, 8, 'Betul'),
(237, 8, 'Bhind'),
(238, 8, 'Bhopal'),
(239, 8, 'Chhatarpur'),
(240, 8, 'Chhindwara'),
(241, 8, 'Damoh'),
(242, 8, 'Datia'),
(243, 8, 'Dewas'),
(244, 8, 'Dhar'),
(245, 8, 'Dindori'),
(246, 8, 'Guna'),
(247, 8, 'Gwalior'),
(248, 8, 'Harda'),
(249, 8, 'Hoshangabad'),
(250, 8, 'Indore'),
(251, 8, 'Jabalpur'),
(252, 8, 'Jhabua'),
(253, 8, 'Katni'),
(254, 8, 'Khandwa (East Nimar)'),
(255, 8, 'Khargone (West Nimar)'),
(256, 8, 'Mandla'),
(257, 8, 'Mandsaur'),
(258, 8, 'Morena'),
(259, 8, 'Narsinghpur'),
(260, 8, 'Neemuch'),
(261, 8, 'Panna'),
(262, 8, 'Rewa'),
(263, 8, 'Rajgarh'),
(264, 8, 'Ratlam'),
(265, 8, 'Raisen'),
(266, 8, 'Sagar'),
(267, 8, 'Satna'),
(268, 8, 'Sehore'),
(269, 8, 'Seoni'),
(270, 8, 'Shahdol'),
(271, 8, 'Shajapur'),
(272, 8, 'Sheopur'),
(273, 8, 'Shivpuri'),
(274, 8, 'Sidhi'),
(275, 8, 'Tikamgarh'),
(276, 8, 'Ujjain'),
(277, 8, 'Umaria'),
(278, 8, 'Vidisha'),
(279, 9, 'Ajmer'),
(280, 9, 'Alwar'),
(281, 9, 'Bikaner'),
(282, 9, 'Barmer'),
(283, 9, 'Banswara'),
(284, 9, 'Bharatpur'),
(285, 9, 'Baran'),
(286, 9, 'Bundi'),
(287, 9, 'Bhilwara'),
(288, 9, 'Churu'),
(289, 9, 'Chittorgarh'),
(290, 9, 'Dausa'),
(291, 9, 'Dholpur'),
(292, 9, 'Dungapur'),
(293, 9, 'Ganganagar'),
(294, 9, 'Hanumangarh'),
(295, 9, 'Juhnjhunun'),
(296, 9, 'Jalore'),
(297, 9, 'Jodhpur'),
(298, 9, 'Jaipur'),
(299, 9, 'Jaisalmer'),
(300, 9, 'Jhalawar'),
(301, 9, 'Karauli'),
(302, 9, 'Kota'),
(303, 9, 'Nagaur'),
(304, 9, 'Pali'),
(305, 9, 'Pratapgarh'),
(306, 9, 'Rajsamand'),
(307, 9, 'Sikar'),
(308, 9, 'Sawai Madhopur'),
(309, 9, 'Sirohi'),
(310, 9, 'Tonk'),
(311, 9, 'Udaipur'),
(312, 10, 'Bidar District'),
(313, 10, 'Belgaum District'),
(314, 10, 'Bijapur District'),
(315, 10, 'Bagalkot District'),
(316, 10, 'Bellary District'),
(317, 10, 'Bangalore Rural District'),
(318, 10, 'Bangalore Urban district'),
(319, 10, 'Chamarajnagar District'),
(320, 10, 'Chikmagalur District'),
(321, 10, 'Chitradurga District'),
(322, 10, 'Davanagere District'),
(323, 10, 'Dharwad District'),
(324, 10, 'Dakshina Kannada'),
(325, 10, 'Gadag District'),
(326, 10, 'Gulbarga District'),
(327, 10, 'Hassan District'),
(328, 10, 'Haveri District'),
(329, 10, 'Kodagu'),
(330, 10, 'Kolar District'),
(331, 10, 'Koppal District'),
(332, 10, 'Mandya District'),
(333, 10, 'Mysore District'),
(334, 10, 'Raichur District'),
(335, 10, 'Shimoga District'),
(336, 10, 'Tumkur District'),
(337, 10, 'Udupi District'),
(338, 10, 'Uttara Kannada'),
(339, 10, 'Ramanagara District'),
(340, 10, 'Chikballapur District'),
(341, 11, 'Ahmedabad'),
(342, 11, 'Amreli District'),
(343, 11, 'Anand'),
(344, 11, 'Banaskantha'),
(345, 11, 'Bharuch'),
(346, 11, 'Bhavnagar'),
(347, 11, 'Dahod'),
(348, 11, 'The Dangs'),
(349, 11, 'Gandhinagar'),
(350, 11, 'Jamnagar'),
(351, 11, 'Junagadh'),
(352, 11, 'Kutch'),
(353, 11, 'Kheda'),
(354, 11, 'Mehsana'),
(355, 11, 'Narmada'),
(356, 11, 'Navsari'),
(357, 11, 'Patan'),
(358, 11, 'Panchmahal'),
(359, 11, 'Porbandar'),
(360, 11, 'Rajkot'),
(361, 11, 'Sabarkantha'),
(362, 11, 'Surendranagar'),
(363, 11, 'Surat'),
(364, 11, 'Vadodara'),
(365, 11, 'Valsad'),
(366, 12, 'Angul'),
(367, 12, 'Boudh (Bauda)'),
(368, 12, 'Bhadrak'),
(369, 12, 'Bolangir (Balangir)'),
(370, 12, 'Bargarh (Baragarh)'),
(371, 12, 'Baleswar (Balasore)'),
(372, 12, 'Cuttack'),
(373, 12, 'Debagarh (Deogarh)'),
(374, 12, 'Dhenkanal'),
(375, 12, 'Ganjam'),
(376, 12, 'Gajapati'),
(377, 12, 'Jharsuguda'),
(378, 12, 'Jajapur (Jajpur)'),
(379, 12, 'Jagatsinghpur'),
(380, 12, 'Khordha'),
(381, 12, 'Kendujhar (Keonjhar)'),
(382, 12, 'Kalahandi'),
(383, 12, 'Kandhamal'),
(384, 12, 'Koraput'),
(385, 12, 'Kendrapara'),
(386, 12, 'Malkangiri'),
(387, 12, 'Mayurbhanj'),
(388, 12, 'Nabarangpur'),
(389, 12, 'Nayagarh'),
(390, 12, 'Nuapada'),
(391, 12, 'Puri'),
(392, 12, 'Rayagada'),
(393, 12, 'Sambalpur'),
(394, 12, 'Subarnapur (Sonepur)'),
(395, 12, 'Sundargarh (Sundergarh)'),
(397, 13, 'Bokaro'),
(398, 13, 'Chatra'),
(399, 13, 'Deoghar'),
(400, 13, 'Dhanbad'),
(401, 13, 'Dumka'),
(402, 13, 'Purba Singhbhum'),
(403, 13, 'Garhwa'),
(404, 13, 'Giridih'),
(405, 13, 'Godda'),
(406, 13, 'Gumla'),
(407, 13, 'Hazaribagh'),
(408, 13, 'Koderma'),
(409, 13, 'Lohardaga'),
(410, 13, 'Pakur'),
(411, 13, 'Palamu'),
(412, 13, 'Ranchi'),
(413, 13, 'Sahibganj'),
(414, 13, 'Pashchim Singhbhum'),
(415, 14, 'Barpeta'),
(416, 14, 'Bongaigaon'),
(417, 14, 'Cachar'),
(418, 14, 'Darrang'),
(419, 14, 'Dhemaji'),
(420, 14, 'Dhubri'),
(421, 14, 'Dibrugarh'),
(422, 14, 'Goalpara'),
(423, 14, 'Golaghat'),
(424, 14, 'Hailakandi'),
(425, 14, 'Jorhat'),
(426, 14, 'Karbi Anglong'),
(427, 14, 'Karimganj'),
(428, 14, 'Kokrajhar'),
(429, 14, 'Lakhimpur'),
(430, 14, 'Marigaon'),
(431, 14, 'Nagaon'),
(432, 14, 'Nalbari'),
(433, 14, 'North Cachar Hills'),
(434, 14, 'Sibsagar'),
(435, 14, 'Sonitpur'),
(436, 14, 'Tinsukia'),
(437, 15, 'Amritsar'),
(438, 15, 'Bathinda'),
(439, 15, 'Firozpur'),
(440, 15, 'Faridkot'),
(441, 15, 'Fatehgarh Sahib'),
(442, 15, 'Gurdaspur'),
(443, 15, 'Hoshiarpur'),
(444, 15, 'Jalandhar'),
(445, 15, 'Kapurthala'),
(446, 15, 'Ludhiana'),
(447, 15, 'Mansa'),
(448, 15, 'Moga'),
(449, 15, 'Mukatsar'),
(450, 15, 'Nawan Shehar'),
(451, 15, 'Patiala'),
(452, 15, 'Rupnagar'),
(453, 15, 'Sangrur'),
(454, 16, 'Ambala'),
(455, 16, 'Bhiwani'),
(456, 16, 'Faridabad'),
(457, 16, 'Fatehabad'),
(458, 16, 'Gurgaon'),
(459, 16, 'Hissar'),
(460, 16, 'Jhajjar'),
(461, 16, 'Jind'),
(462, 16, 'Karnal'),
(463, 16, 'Kaithal'),
(464, 16, 'Kurukshetra'),
(465, 16, 'Mahendragarh'),
(466, 16, 'Mewat'),
(467, 16, 'Panchkula'),
(468, 16, 'Panipat'),
(469, 16, 'Rewari'),
(470, 16, 'Rohtak'),
(471, 16, 'Sirsa'),
(472, 16, 'Sonepat'),
(473, 16, 'Yamuna Nagar'),
(474, 16, 'Palwal District'),
(475, 17, 'Bastar'),
(476, 17, 'Bilaspur'),
(477, 17, 'Dantewada'),
(478, 17, 'Dhamtari'),
(479, 17, 'Durg'),
(480, 17, 'Jashpur'),
(481, 17, 'Janjgir-Champa'),
(482, 17, 'Korba'),
(483, 17, 'Koriya'),
(484, 17, 'Kanker'),
(485, 17, 'Kawardha'),
(486, 17, 'Mahasamund'),
(487, 17, 'Raigarh'),
(488, 17, 'Rajnandgaon'),
(489, 17, 'Raipur'),
(490, 17, 'Surguja'),
(491, 18, 'Anantnag'),
(492, 18, 'Badgam'),
(493, 18, 'Bandipore'),
(494, 18, 'Baramula'),
(495, 18, 'Doda'),
(496, 18, 'Jammu'),
(497, 18, 'Kargil'),
(498, 18, 'Kathua'),
(499, 18, 'Kupwara'),
(500, 18, 'Leh'),
(501, 18, 'Poonch'),
(502, 18, 'Pulwama'),
(503, 18, 'Rajauri'),
(504, 18, 'Srinagar'),
(505, 18, 'Udhampur'),
(506, 19, 'Almora'),
(507, 19, 'Bageshwar'),
(508, 19, 'Chamoli'),
(509, 19, 'Champawat'),
(510, 19, 'Dehradun'),
(511, 19, 'Haridwar'),
(512, 19, 'Nainital'),
(513, 19, 'Pauri Garhwal'),
(514, 19, 'Pithoragharh'),
(515, 19, 'Rudraprayag'),
(516, 19, 'Tehri Garhwal'),
(517, 19, 'Udham Singh Nagar'),
(518, 19, 'Uttarkashi'),
(519, 20, 'Bilaspur'),
(520, 20, 'Chamba'),
(521, 20, 'Hamirpur'),
(522, 20, 'Kangra'),
(523, 20, 'Kinnaur'),
(524, 20, 'Kulu'),
(525, 20, 'Lahaul and Spiti'),
(526, 20, 'Mandi'),
(527, 20, 'Shimla'),
(528, 20, 'Sirmaur'),
(529, 20, 'Solan'),
(530, 20, 'Una'),
(531, 21, 'Dhalai'),
(532, 21, 'North Tripura'),
(533, 21, 'South Tripura'),
(534, 21, 'West Tripura'),
(535, 22, 'Bishnupur'),
(536, 22, 'Churachandpur'),
(537, 22, 'Chandel'),
(538, 22, 'Imphal East'),
(539, 22, 'Senapati'),
(540, 22, 'Tamenglong'),
(541, 22, 'Thoubal'),
(542, 22, 'Ukhrul'),
(543, 22, 'Imphal West'),
(544, 23, 'East Garo Hills'),
(545, 23, 'East Khasi Hills'),
(546, 23, 'Jaintia Hills'),
(547, 23, 'Ri-Bhoi'),
(548, 23, 'South Garo Hills'),
(549, 23, 'West Garo Hills'),
(550, 23, 'West Khasi Hills'),
(551, 24, 'Dimapur'),
(552, 24, 'Kohima'),
(553, 24, 'Mokokchung'),
(554, 24, 'Mon'),
(555, 24, 'Phek'),
(556, 24, 'Tuensang'),
(557, 24, 'Wokha'),
(558, 24, 'Zunheboto'),
(559, 25, 'North Goa'),
(560, 25, 'South Goa'),
(561, 26, 'Anjaw'),
(562, 26, 'Changlang'),
(563, 26, 'East Kameng'),
(564, 26, 'Lohit'),
(565, 26, 'Lower Subansiri'),
(566, 26, 'Papum Pare'),
(567, 26, 'Tirap'),
(568, 26, 'Dibang Valley'),
(569, 26, 'Upper Subansiri'),
(570, 26, 'West Kameng'),
(571, 27, 'Aizawl'),
(572, 27, 'Champhai'),
(573, 27, 'Kolasib'),
(574, 27, 'Lawngtlai'),
(575, 27, 'Lunglei'),
(576, 27, 'Mamit'),
(577, 27, 'Saiha'),
(578, 27, 'Serchhip'),
(579, 28, 'East Sikkim'),
(580, 28, 'North Sikkim'),
(581, 28, 'South Sikkim'),
(582, 28, 'West Sikkim'),
(583, 29, 'Central Delhi'),
(584, 29, 'East Delhi'),
(585, 29, 'New Delhi'),
(586, 29, 'North Delhi'),
(587, 29, 'North East Delhi'),
(588, 29, 'North West Delhi'),
(589, 29, 'South Delhi'),
(590, 29, 'South West Delhi'),
(591, 29, 'West Delhi'),
(592, 30, 'Karaikal'),
(593, 30, 'Mahe'),
(594, 30, 'Puducherry'),
(595, 30, 'Yanam'),
(596, 31, 'Chandigarh'),
(597, 32, 'Andaman and Nicobar Islands'),
(598, 33, 'Dadra and Nagar Haveli'),
(599, 34, 'Daman and Diu'),
(600, 35, 'Lakshadweep');";
$this->insertData($life_value,"Error on life dstrict value insert...212");
$life_location=$id."life_location";
$location="CREATE TABLE $life_location (
  `Location_Id` int(11) NOT NULL auto_increment,
  `Location_State_Ref_Id` int(11) NOT NULL default '0',
  `Location_District_Ref_Id` int(11) NOT NULL default '0',
  `Location_Name` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`Location_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=830 ;
";
$this->insertData($location);
$life_location=$id."life_location";
$location_value="INSERT INTO $life_location(`Location_Id`, `Location_State_Ref_Id`, `Location_District_Ref_Id`, `Location_Name`) VALUES
(4, 1, 1, 'Anad Edso'),
(5, 1, 1, 'Anayara'),
(6, 1, 1, 'Aralumoodu'),
(7, 1, 1, 'Aramada'),
(8, 1, 1, 'Attingal'),
(9, 1, 1, 'Avanavancherry'),
(10, 1, 1, 'Ayroor Varkala'),
(11, 1, 1, 'Balarampuram'),
(12, 1, 1, 'Bharathannu'),
(13, 1, 1, 'Chempazhanthi'),
(14, 1, 1, 'Cheeranikara'),
(15, 1, 1, 'Cheruuniyur'),
(16, 1, 1, 'Chittattumukku'),
(17, 1, 1, 'Dhanuvachapuram'),
(18, 1, 1, 'Kovalam'),
(19, 1, 1, 'chala'),
(20, 1, 1, 'pattanakkad'),
(21, 1, 1, 'Dalmugham'),
(22, 1, 1, 'Edava'),
(23, 1, 1, 'Industrial Estate Tvm'),
(24, 1, 1, 'Irinchayam'),
(25, 1, 1, 'Jawahar Nagar'),
(26, 1, 1, 'Kallambalam'),
(27, 1, 1, 'Kallara'),
(28, 1, 1, 'Kaniyapuram'),
(29, 1, 1, 'Kanjiramkulam'),
(30, 1, 1, 'Kanjirampara'),
(31, 1, 1, 'Karakonam'),
(32, 1, 1, 'Karakulam'),
(33, 1, 1, 'Karamana'),
(34, 1, 1, 'Kariyattam'),
(35, 1, 1, 'Kattachaikuzhi'),
(36, 1, 1, 'Kattakada'),
(37, 1, 1, 'Kaudiar'),
(38, 1, 1, 'Keezharur'),
(39, 1, 1, 'Killimanur'),
(40, 1, 1, 'Kizhuvalam'),
(41, 1, 1, 'Kodungannur'),
(42, 1, 1, 'Kolathur'),
(43, 1, 1, 'Kudappanamoodu'),
(44, 1, 1, 'Kudavoor'),
(45, 1, 1, 'Kunnukuzhi'),
(46, 1, 1, 'Kuvalassery'),
(47, 1, 1, 'Madavoor Pallickal'),
(48, 1, 1, 'Malakkal'),
(49, 1, 1, 'Manacaud'),
(50, 1, 1, 'Manambur'),
(51, 1, 1, 'Dalmugham'),
(52, 1, 1, 'Edava'),
(53, 1, 1, 'Industrial Estate Tvm'),
(54, 1, 1, 'Irinchayam'),
(55, 1, 1, 'Jawahar Nagar'),
(56, 1, 1, 'Kallambalam'),
(57, 1, 1, 'Kallara'),
(58, 1, 1, 'Kaniyapuram'),
(59, 1, 1, 'Kanjiramkulam'),
(60, 1, 1, 'Kanjirampara'),
(61, 1, 1, 'Karakonam'),
(62, 1, 1, 'Karakulam'),
(63, 1, 1, 'Karamana'),
(64, 1, 1, 'Kariyattam'),
(65, 1, 1, 'Kattachaikuzhi'),
(66, 1, 1, 'Kattakada'),
(67, 1, 1, 'Kaudiar'),
(68, 1, 1, 'Keezharur'),
(69, 1, 1, 'Killimanur'),
(70, 1, 1, 'Kizhuvalam'),
(71, 1, 1, 'Kodungannur'),
(72, 1, 1, 'Kolathur'),
(73, 1, 1, 'Kudappanamoodu'),
(74, 1, 1, 'Kudavoor'),
(75, 1, 1, 'Kunnukuzhi'),
(76, 1, 1, 'Kuvalassery'),
(77, 1, 1, 'Madavoor Pallickal'),
(78, 1, 1, 'Malakkal'),
(79, 1, 1, 'Manacaud'),
(80, 1, 1, 'Manambur'),
(81, 1, 1, 'Marayamuttom'),
(82, 1, 1, 'Mariyapuram'),
(83, 1, 1, 'Mithiramala'),
(84, 1, 1, 'Moongode'),
(85, 1, 1, 'Mudapuram'),
(86, 1, 1, 'Murukkumpuzha'),
(87, 1, 1, 'Nagaroor'),
(88, 1, 1, 'Nalanchira'),
(89, 1, 1, 'Nedumangad'),
(90, 1, 1, 'Nedunganda'),
(91, 1, 1, 'Nemom'),
(92, 1, 1, 'Neyyattinkara'),
(93, 1, 1, 'Ooruttambalam'),
(94, 1, 1, 'Ottasekharamangalam'),
(95, 1, 1, 'P.T.P. Nagar'),
(96, 1, 1, 'Pallipuram Tvm'),
(97, 1, 1, 'Panavoor'),
(98, 1, 1, 'Pangode'),
(99, 1, 1, 'Pappanamcode'),
(100, 1, 1, 'Parasala'),
(101, 1, 1, 'Pattom'),
(102, 1, 1, 'Pazhkutty'),
(103, 1, 1, 'Peringammala'),
(104, 1, 1, 'Perukada'),
(105, 1, 1, 'Perumkadavila'),
(106, 1, 1, 'Perumpazuthur'),
(107, 1, 1, 'Perunguzhi'),
(108, 1, 1, 'Peyad'),
(109, 1, 1, 'Plamoottukada'),
(110, 1, 1, 'Poojapura'),
(111, 1, 11, 'Poonthura'),
(112, 1, 1, 'Poovachal'),
(113, 1, 1, 'Pothencode'),
(114, 1, 1, 'Pozhiyur'),
(115, 1, 1, 'Pulimathu'),
(116, 1, 1, 'Puthenkurichy'),
(117, 1, 1, 'Puvar'),
(118, 1, 1, 'Sainik School'),
(119, 1, 1, 'Kazhakuttam'),
(120, 1, 1, 'Sasthamangalam'),
(121, 1, 1, 'Sreekariam'),
(122, 1, 1, 'Sreenivasapuram'),
(123, 1, 1, 'St. XavierCollege'),
(124, 1, 1, 'Thampanoor'),
(125, 1, 1, 'Thattathurmala'),
(126, 1, 1, 'Thiruvallam'),
(127, 1, 1, 'Tvm Engg'),
(128, 1, 1, 'Tvm ISRO'),
(129, 1, 1, 'Tvm M C'),
(130, 1, 1, 'Thuruvikkal'),
(131, 1, 1, 'Tirumala'),
(132, 1, 1, 'Tirupuram'),
(133, 1, 1, 'Titanium'),
(134, 1, 1, 'Uchakada'),
(135, 1, 1, 'Vadasserikikonam'),
(136, 1, 1, 'Vakkam'),
(137, 1, 1, 'Valiyamala'),
(138, 1, 1, 'Vamanapuram'),
(139, 1, 1, 'Vanchiyur'),
(140, 1, 1, 'Varkala'),
(141, 1, 1, 'Vattappara'),
(142, 1, 1, 'Vellanad'),
(143, 1, 1, 'Vembayam'),
(144, 1, 1, 'Venganur'),
(145, 1, 1, 'Venjaramoodu'),
(146, 1, 1, 'Vennicode'),
(147, 1, 1, 'Vettoor'),
(148, 1, 1, 'Vikas Bhawan'),
(149, 1, 1, 'Vithura'),
(150, 1, 1, 'Vizhinjam'),
(151, 1, 1, 'Idukki Colony'),
(152, 1, 1, 'Chempazhanthi'),
(153, 1, 1, 'Vizhinjam'),
(154, 1, 1, 'Valiyamala'),
(155, 1, 1, 'Kunnukuzhi'),
(156, 1, 1, 'Kattakada'),
(157, 1, 1, 'Malakkal'),
(158, 1, 1, 'Kaudiar'),
(159, 1, 1, 'Vadasserikikonam'),
(160, 1, 1, 'Ambalamukku'),
(161, 1, 2, 'Naluthara'),
(162, 1, 2, 'Aliyur'),
(163, 1, 2, 'Beypore'),
(165, 1, 2, 'Kozhikode Medical College'),
(166, 1, 2, 'Kozhikode Civil Station'),
(167, 1, 2, 'Kozhikode Medical College'),
(168, 1, 2, 'Chelakkad'),
(169, 1, 2, 'Cheruvannur'),
(170, 1, 2, 'Feroke'),
(171, 1, 2, 'Govindapuram'),
(172, 1, 2, 'Guruvayurappan College'),
(173, 1, 2, 'Kadalundi'),
(174, 1, 2, 'Karadipara'),
(175, 1, 2, 'Karuvannur'),
(176, 1, 2, 'Karuvanthuruthy'),
(177, 1, 2, 'Kozhikode'),
(178, 1, 2, 'Kumaranallur'),
(179, 1, 2, 'Kuruvangad'),
(180, 1, 2, 'Madappally College'),
(181, 1, 2, 'Mahe'),
(182, 1, 2, 'Mannur'),
(183, 1, 2, 'Mavoor'),
(184, 1, 2, 'Mokkam'),
(185, 1, 2, 'Naluthara'),
(186, 1, 2, 'Nellicode'),
(187, 1, 2, 'New Mahe'),
(188, 1, 2, 'Olavanna'),
(189, 1, 2, 'Omasseri'),
(190, 1, 2, 'Palath'),
(191, 1, 2, 'Palayadnada'),
(192, 1, 2, 'Paleri Town'),
(193, 1, 2, 'Pantheeramkavu'),
(194, 1, 2, 'Parakkadavu'),
(195, 1, 2, 'Perampra'),
(196, 1, 2, 'Ponmeri'),
(197, 1, 2, 'Purakad'),
(198, 1, 2, 'Ramanattukara'),
(199, 1, 2, 'Quilandy'),
(200, 1, 2, 'Santhinagar'),
(201, 1, 2, 'Tamaracherry'),
(202, 1, 2, 'Tiruvangoor'),
(203, 1, 2, 'Unnikulam'),
(204, 1, 2, 'Vadakara'),
(205, 1, 2, 'Vazhayur'),
(206, 1, 2, 'Villiappally'),
(207, 1, 2, 'West Hill'),
(208, 1, 2, 'Palayadnada'),
(209, 1, 2, 'Kuruvangad'),
(210, 1, 2, 'NIT Calicut'),
(211, 1, 3, 'Alathiyur'),
(212, 1, 3, 'Areacode'),
(213, 1, 3, 'Ayirur'),
(214, 1, 3, 'Edavanna'),
(215, 1, 3, 'Kadampuzha'),
(216, 1, 3, 'Kannamangalam'),
(217, 1, 3, 'Karekad'),
(218, 1, 3, 'Karippur Air Port'),
(219, 1, 3, 'Kondotti'),
(220, 1, 3, 'Kuttipuram'),
(221, 1, 3, 'Mampad'),
(222, 1, 3, 'Manjeri'),
(223, 1, 3, 'Manjeri College'),
(224, 1, 3, 'Malappuram'),
(225, 1, 3, 'Nilambur'),
(226, 1, 3, 'Olukkur'),
(227, 1, 3, 'Pazhur'),
(228, 1, 3, 'Parappanangadi'),
(229, 1, 3, 'Perinthalmanna'),
(230, 1, 3, 'Ponani'),
(231, 1, 3, 'Porur'),
(232, 1, 3, 'Pullikanam'),
(233, 1, 3, 'Randathani'),
(234, 1, 3, 'Sugapuram'),
(235, 1, 3, 'Tanur Malabar'),
(236, 1, 3, 'Tirur'),
(237, 1, 3, 'Vellur'),
(238, 1, 3, 'Vengoor'),
(239, 1, 3, 'Vettilapara'),
(240, 1, 3, 'Parappanangadi'),
(242, 1, 3, 'Vattamkulam'),
(243, 1, 3, 'Edappal'),
(244, 1, 3, 'kolathur'),
(245, 1, 3, 'pulamanthol'),
(246, 1, 3, 'TN puram'),
(247, 1, 3, 'Melatoor'),
(248, 1, 3, 'Keezhatoor'),
(249, 1, 3, 'Ucharakadavu'),
(250, 1, 3, 'MEA Engg College'),
(251, 1, 4, 'Kadakkal'),
(252, 1, 4, 'Karunagappalli'),
(253, 1, 4, 'Kottarakkara'),
(254, 1, 4, 'Ambalakara'),
(255, 1, 4, 'Anchal'),
(256, 1, 4, 'Chadayamangalam'),
(257, 1, 4, 'Pravur'),
(258, 1, 4, 'Kundara'),
(259, 1, 4, 'Kollam'),
(260, 1, 4, 'Chavar'),
(261, 1, 4, 'Punalur'),
(262, 1, 4, 'Sasthamkotta'),
(263, 1, 4, 'Ashtamudi'),
(264, 1, 4, 'Mavelikara'),
(265, 1, 4, 'Neendakara'),
(266, 1, 4, 'Karunagappalli'),
(268, 1, 5, 'Konni'),
(269, 1, 5, 'Angadi'),
(270, 1, 5, 'Arattupuzha'),
(271, 1, 5, 'Chengaroor'),
(272, 1, 5, 'Chellakad'),
(273, 1, 5, 'Kottanad'),
(274, 1, 5, 'Kumbanad'),
(275, 1, 5, 'Kuttapuzha'),
(276, 1, 5, 'Mallapally'),
(277, 1, 5, 'Maloor'),
(278, 1, 5, 'Manjappara'),
(279, 1, 5, 'Mylapra'),
(280, 1, 5, 'Omallur'),
(281, 1, 5, 'Pandalam'),
(282, 1, 5, 'Pathanamthitta'),
(283, 1, 5, 'Pathanapuram'),
(284, 1, 5, 'Ranny'),
(285, 1, 5, 'Sabarimala'),
(286, 1, 5, 'Thengumkavu'),
(287, 1, 5, 'Tiruvalla'),
(288, 1, 5, 'Ulanad'),
(289, 1, 5, 'Vaipur'),
(290, 1, 5, 'Vazhamuttom'),
(291, 1, 5, 'Velliyara'),
(292, 1, 5, 'Vennikulam'),
(293, 1, 5, 'Adoor'),
(295, 1, 6, 'Ambalappuzha'),
(296, 1, 6, 'Arookutty'),
(297, 1, 6, 'Aroor'),
(298, 1, 6, 'Chengannur'),
(299, 1, 6, 'Cherthala'),
(300, 1, 6, 'Kayamkulam'),
(301, 1, 6, 'Kokkothamangalam'),
(302, 1, 6, 'Mavelikkara'),
(303, 1, 6, 'Muhamma'),
(304, 1, 6, 'Iramallur'),
(305, 1, 6, 'Edathua'),
(306, 1, 6, 'Mavelikara'),
(307, 1, 6, 'Bhudhanoor'),
(308, 1, 6, 'Kayamkulam'),
(309, 1, 6, 'Aroor'),
(310, 1, 6, 'Haripad'),
(311, 1, 6, 'Thannermukkom'),
(312, 1, 6, 'Muhamma'),
(313, 1, 7, 'Athirampuzha'),
(314, 1, 7, 'Bharanaganam'),
(315, 1, 7, 'Chakampuzha'),
(316, 1, 7, 'Changanassery'),
(317, 1, 7, 'Devagiri'),
(318, 1, 7, 'Devalokom'),
(319, 1, 7, 'Ettumanoor'),
(320, 1, 7, 'Erattupetta'),
(321, 1, 7, 'Erumeli'),
(322, 1, 7, 'Gandhi Nagar Kottayam'),
(323, 1, 7, 'Irumpayam'),
(324, 1, 7, 'Kadapattoor'),
(325, 1, 7, 'Kaduthuruthy'),
(326, 1, 7, 'Kanjirapally'),
(327, 1, 7, 'Karikkattur'),
(328, 1, 7, 'Karikode'),
(329, 1, 7, 'Kidangoor'),
(330, 1, 7, 'Kottayam'),
(331, 1, 7, 'Kottayam Collectorate'),
(332, 1, 7, 'Kudamaloor'),
(333, 1, 7, 'Kumaranallur'),
(334, 1, 7, 'Kuravilangad'),
(335, 1, 7, 'Madappally'),
(336, 1, 7, 'Manimala'),
(337, 1, 7, 'Mariapally'),
(338, 1, 7, 'Mevalloor'),
(339, 1, 7, 'Mundakayam'),
(340, 1, 7, 'Nadackal'),
(341, 1, 7, 'Nedumkunnam'),
(342, 1, 7, 'Neendoor'),
(343, 1, 7, 'Paduva'),
(344, 1, 7, 'Pallom'),
(345, 1, 7, 'Pampady'),
(346, 1, 7, 'Parampuzha'),
(347, 1, 7, 'Peruva'),
(348, 1, 7, 'Ponkunnam'),
(349, 1, 7, 'Puthupally'),
(350, 1, 7, 'Ramapuram'),
(351, 1, 7, 'Ruby Nagar'),
(352, 1, 7, 'Santhipuram'),
(353, 1, 7, 'Sreekantamangalam'),
(354, 1, 7, 'Thalayolapparambu'),
(355, 1, 7, 'Vadakara'),
(356, 1, 7, 'Vaikom'),
(357, 1, 7, 'Vakathanam'),
(358, 1, 7, 'Vechoor'),
(359, 1, 7, 'Velloor'),
(360, 1, 7, 'Athirampuzha'),
(361, 1, 7, 'Madappally'),
(362, 1, 7, 'Mundakayam'),
(363, 1, 7, 'Manimala'),
(364, 1, 7, 'Pala'),
(365, 1, 7, 'Velloor'),
(366, 1, 7, 'Nedumkunnam'),
(367, 1, 7, 'Kaduthuruthy'),
(368, 1, 7, 'Karikode'),
(369, 1, 7, 'Puthupally'),
(370, 1, 7, 'Peruva'),
(371, 1, 8, 'Adimaly'),
(372, 1, 8, 'Elappara'),
(373, 1, 8, 'Kumily'),
(374, 1, 8, 'Munnar'),
(375, 1, 8, 'Neryamangalam'),
(376, 1, 8, 'Peermade'),
(377, 1, 8, 'Rajakkad'),
(378, 1, 8, 'Panniar'),
(379, 1, 8, 'Thekkadi'),
(380, 1, 8, 'Thodupuzha'),
(381, 1, 8, 'Udumbanshola'),
(382, 1, 8, 'Kanjikuzhi - Idukki'),
(383, 1, 8, 'Kanjikuzhi'),
(384, 1, 8, 'Bison Valley'),
(385, 1, 8, 'Vellathooval'),
(386, 1, 8, 'Bison'),
(387, 1, 9, 'Ayyampilly'),
(388, 1, 9, 'EKM-North'),
(389, 1, 9, 'Cherai'),
(390, 1, 9, 'Edathala'),
(391, 1, 9, 'Aluva'),
(392, 1, 9, 'Angamaly'),
(393, 1, 9, 'Chendamangalam'),
(394, 1, 9, 'Chengamanad'),
(395, 1, 9, 'Cheranallur'),
(396, 1, 9, 'Choornikkara'),
(397, 1, 9, 'Chowwara'),
(398, 1, 9, 'Eloor'),
(399, 1, 9, 'Kadamakkudy'),
(400, 1, 9, 'Kalamassery'),
(401, 1, 9, 'Kochi'),
(402, 1, 9, 'Kothamangalam'),
(403, 1, 9, 'Kottuvally'),
(404, 1, 9, 'Kureekkad'),
(405, 1, 9, 'Maradu'),
(406, 1, 9, 'ulavukad'),
(407, 1, 9, 'Muvattupuzha'),
(408, 1, 9, 'North Paravur'),
(409, 1, 9, 'Perumbavoor'),
(410, 1, 9, 'Thiruvankulam'),
(411, 1, 9, 'Thrippunithura'),
(412, 1, 9, 'Varappuzha'),
(413, 1, 9, 'Vazhakkala'),
(414, 1, 9, 'South Paravur'),
(415, 1, 9, 'Kolencherry'),
(416, 1, 9, 'Poothotta'),
(417, 1, 9, 'Kadavanthara'),
(418, 1, 9, 'Ravipuram'),
(419, 1, 9, 'Vallachira'),
(420, 1, 9, 'Narakkal'),
(421, 1, 9, 'Neriamangalam'),
(422, 1, 9, 'Kanjiramatoom'),
(423, 1, 9, 'Vythila'),
(424, 1, 9, 'Palluruthy'),
(425, 1, 9, 'Pachalam'),
(426, 1, 9, 'Kakkanad'),
(427, 1, 9, 'Edapally'),
(428, 1, 9, 'M.G.Road'),
(429, 1, 9, 'Puthencurz'),
(430, 1, 9, 'Edapally'),
(431, 1, 9, 'Mulanthuruthy'),
(432, 1, 9, 'Koothattukulam'),
(433, 1, 9, 'Kaloor'),
(434, 1, 9, 'Kumbalanghi'),
(435, 1, 9, 'Palarivattom'),
(436, 1, 9, 'EKM-North'),
(437, 1, 9, 'Alangad'),
(438, 1, 9, 'Panagad'),
(439, 1, 9, 'Varapuzha'),
(440, 1, 9, 'Puthenvelikara'),
(441, 1, 9, 'Kalady'),
(442, 1, 9, 'Thevara'),
(443, 1, 9, 'High Court'),
(444, 1, 9, 'Piravom'),
(445, 1, 9, 'High Court'),
(446, 1, 9, 'Mattancheri'),
(447, 1, 10, 'Mambra'),
(448, 1, 10, 'Brahmakulam'),
(449, 1, 10, 'Akathiyoor'),
(450, 1, 10, 'Kodungallur'),
(451, 1, 10, 'Chalakudi'),
(452, 1, 10, 'Chavakkad'),
(453, 1, 10, 'Chevoor'),
(454, 1, 10, 'Guruvayur'),
(455, 1, 10, 'Iringapuram'),
(456, 1, 10, 'Irinjalakuda'),
(457, 1, 10, 'Kolazhi'),
(458, 1, 10, 'Koratti'),
(459, 1, 10, 'Kunnamkulam'),
(460, 1, 10, 'Marathakara'),
(461, 1, 10, 'Methala'),
(462, 1, 10, 'Nadathara'),
(463, 1, 10, 'Nemminikara'),
(464, 1, 10, 'Ollur'),
(465, 1, 10, 'Palisseri'),
(466, 1, 10, 'Paluvai'),
(467, 1, 10, 'Parvarattil'),
(468, 1, 10, 'Perakom'),
(469, 1, 10, 'Pottore'),
(470, 1, 10, 'Puranattukara'),
(471, 1, 10, 'Puthukkad'),
(472, 1, 10, 'Thaikkad'),
(473, 1, 10, 'Thrissur'),
(474, 1, 10, 'Vellanchira'),
(475, 1, 10, 'Vemmanad'),
(476, 1, 10, 'Mala Thrisur'),
(477, 1, 10, 'Ripayar'),
(478, 1, 10, 'Avanur'),
(479, 1, 10, 'Tripayar'),
(480, 1, 10, 'Thalassery'),
(481, 1, 10, 'Cheruthuruthy'),
(482, 1, 10, 'Desamangalam'),
(483, 1, 10, 'Wadakkanchery'),
(484, 1, 10, 'Ottupara'),
(485, 1, 10, 'Thali'),
(486, 1, 10, 'Varavoor'),
(487, 1, 11, 'Ambalavattom'),
(488, 1, 11, 'Anakkara'),
(489, 1, 11, 'Athaloor'),
(490, 1, 11, 'Bhimanad'),
(491, 1, 11, 'Arangottukara'),
(492, 1, 11, 'Chalavara'),
(493, 1, 11, 'Chathannur'),
(494, 1, 11, 'Alathur'),
(495, 1, 11, 'Akalur'),
(496, 1, 11, 'Chembra'),
(497, 1, 11, 'Chennangad'),
(498, 1, 11, 'Cherukulam'),
(499, 1, 11, 'Chittur College'),
(500, 1, 11, 'Chittur'),
(501, 1, 11, 'Dhoni'),
(502, 1, 11, 'Edapalam'),
(503, 1, 11, 'Enkakad'),
(504, 1, 11, 'Erattukulam'),
(505, 1, 11, 'Ganeshgiri'),
(506, 1, 11, 'Govindapuram'),
(507, 1, 11, 'Iswaramangalam'),
(508, 1, 11, 'Jellipara'),
(509, 1, 11, 'Kacheriparambu'),
(510, 1, 11, 'Kadambur'),
(511, 1, 11, 'Kalladikode'),
(512, 1, 11, 'Kandamangalam'),
(513, 1, 11, 'Kanhirapuzha'),
(514, 1, 11, 'Kanjikode'),
(515, 1, 11, 'Kanniyampuram'),
(516, 1, 11, 'Karalmanna'),
(517, 1, 11, 'Karara'),
(518, 1, 11, 'Kariyancode'),
(519, 1, 11, 'Kavalapara'),
(520, 1, 11, 'Killimangalam'),
(521, 1, 11, 'Kollengode'),
(522, 1, 11, 'Kotambu'),
(523, 1, 11, 'Kottoppadam'),
(524, 1, 11, 'Kozhinjampara'),
(525, 1, 11, 'Kumaranallur'),
(526, 1, 11, 'Kunisseri'),
(527, 1, 11, 'Lakkidi'),
(528, 1, 11, 'Mala Palaghat'),
(529, 1, 11, 'Malampuzha Dam'),
(530, 1, 11, 'Malmakavu'),
(531, 1, 11, 'Mangode'),
(532, 1, 11, 'Mannarkad College'),
(533, 1, 11, 'Mannur'),
(534, 1, 11, 'Mattom'),
(535, 1, 11, 'Naduvathupara'),
(536, 1, 11, 'Nemmara'),
(537, 1, 11, 'Nemmara College'),
(538, 1, 11, 'Nenmen'),
(539, 1, 11, 'Olasseri'),
(540, 1, 11, 'Ottappalam'),
(541, 1, 11, 'Palakkad'),
(542, 1, 11, 'Palakkad City'),
(543, 1, 11, 'Palakkad Engg.college'),
(544, 1, 11, 'Pallavur'),
(545, 1, 11, 'Pampady'),
(546, 1, 11, 'Parambikulam'),
(547, 1, 11, 'Pattambi'),
(548, 1, 11, 'Peruvamba'),
(549, 1, 11, 'Ramasseri'),
(550, 1, 11, 'Pudunagaram'),
(551, 1, 11, 'Sankaramangalam'),
(552, 1, 11, 'Sholayur-palakkad'),
(553, 1, 11, 'Shoranur Govt.press'),
(554, 1, 11, 'Shoranur'),
(555, 1, 11, 'Srikrishnapuram'),
(556, 1, 11, 'Tattamangalam'),
(557, 1, 11, 'Thiruvalathur'),
(558, 1, 11, 'Thiruvilwamala'),
(559, 1, 11, 'Tiruvalamkunnu'),
(560, 1, 11, 'Ummanazhi'),
(561, 1, 11, 'Vadakethara'),
(562, 1, 11, 'Vadassery'),
(563, 1, 11, 'Vallapuzha'),
(564, 1, 11, 'Velur Bazar'),
(565, 1, 11, 'Walayar Dam'),
(566, 1, 11, 'Shoranur'),
(567, 1, 11, 'Kariyancode'),
(568, 1, 11, 'Kalladikode'),
(569, 1, 11, 'Pallavur'),
(570, 1, 11, 'Alathur'),
(571, 1, 11, 'Malampuzha'),
(572, 1, 11, 'Thrithala'),
(573, 1, 11, 'Koottanad'),
(574, 1, 11, 'Mezhathur'),
(575, 1, 11, 'Pattithara'),
(576, 1, 11, 'Ongallur'),
(577, 1, 12, 'Ancharakandy'),
(578, 1, 12, 'Azhikode North'),
(579, 1, 12, 'Azhikode South'),
(580, 1, 12, 'Chala'),
(581, 1, 12, 'Chelora'),
(582, 1, 12, 'Cheruthazham'),
(583, 1, 12, 'Chirakkal'),
(584, 1, 12, 'Chockli'),
(585, 1, 12, 'Dharmadom'),
(586, 1, 12, 'Elayavoor'),
(587, 1, 12, 'Eranholi'),
(588, 1, 12, 'Iriveri'),
(589, 1, 12, 'Kadachira'),
(590, 1, 12, 'Kadirur'),
(591, 1, 12, 'Kalliasseri'),
(592, 1, 12, 'Kanhirode'),
(593, 1, 12, 'Kannadiparamba'),
(594, 1, 12, 'Kannapuram'),
(595, 1, 12, 'Kannur'),
(596, 1, 12, 'Kannur Cantonment'),
(597, 1, 12, 'Koothuparamba'),
(598, 1, 12, 'Kottayam-Malabar'),
(599, 1, 12, 'Mattannur'),
(600, 1, 12, 'Mavilayi'),
(601, 1, 12, 'Munderi'),
(602, 1, 12, 'Muzhappilangad'),
(603, 1, 12, 'Narath'),
(604, 1, 12, 'New Mahe'),
(605, 1, 12, 'Paduvilayi'),
(606, 1, 12, 'Pallikkunnu'),
(607, 1, 12, 'Panniyannur'),
(608, 1, 12, 'Panoor'),
(609, 1, 12, 'Pappinisseri'),
(610, 1, 12, 'Pathiriyad'),
(611, 1, 12, 'Pattiom'),
(612, 1, 12, 'Payyannur'),
(613, 1, 12, 'Peralasseri'),
(614, 1, 12, 'Peringathur'),
(615, 1, 12, 'Pinarayi'),
(616, 1, 12, 'Puzhathi'),
(617, 1, 12, 'Taliparamba'),
(618, 1, 12, 'Thalassery'),
(619, 1, 12, 'Thottada'),
(620, 1, 12, 'Valapattanam'),
(621, 1, 12, 'Varam'),
(622, 1, 12, 'Taliparamba'),
(623, 1, 12, 'Thalassery'),
(624, 1, 12, 'Valapattanam'),
(625, 1, 12, 'Koothuparamba'),
(626, 1, 12, 'Iriveri'),
(627, 1, 13, 'Adur'),
(628, 1, 13, 'Bekal'),
(629, 1, 13, 'Chandragiri'),
(630, 1, 13, 'Haripuram'),
(631, 1, 13, 'Kanhangad'),
(632, 1, 13, 'Kasaragod'),
(633, 1, 14, 'Anjukunnu'),
(634, 1, 14, 'Bavali'),
(635, 1, 14, 'Bibleland'),
(636, 1, 14, 'Chembra'),
(637, 1, 14, 'Cottanad'),
(638, 1, 14, 'Edavaka'),
(639, 1, 14, 'Kallurutty'),
(640, 1, 14, 'Kalpetta'),
(641, 1, 14, 'Kunnamangalam'),
(642, 1, 14, 'Lakkidi'),
(643, 1, 14, 'Mananthavady'),
(644, 1, 14, 'Nenmeni'),
(645, 1, 14, 'Poomulla'),
(646, 1, 14, 'Pulpalli'),
(647, 1, 14, 'Sultans Bathery'),
(648, 1, 14, 'Tholpetty'),
(649, 1, 14, 'Tiruvambadi'),
(650, 1, 14, 'Vythiri'),
(651, 1, 14, 'Kallurutty'),
(652, 1, 14, 'koodathai'),
(653, 1, 10, 'Mannuthy'),
(654, 1, 10, 'Amala'),
(656, 1, 3, 'Vaniyambalam'),
(657, 1, 11, 'Kootupatha'),
(660, 1, 10, 'Mudikkode'),
(661, 1, 3, 'Wandoor'),
(663, 1, 12, 'Puthiyangadi'),
(664, 1, 10, 'Anthikkad'),
(665, 6, 186, 'Hyderabad'),
(666, 10, 317, 'Sarjapur Main Road'),
(667, 10, 318, 'Bommanhalli'),
(668, 10, 318, 'madivala'),
(669, 1, 8, 'kattappana'),
(670, 7, 214, 'Madurai'),
(671, 11, 341, 'Vastrapur'),
(672, 7, 206, 'Town Hall'),
(673, 7, 221, 'HOME'),
(674, 3, 92, 'Navi Mumbai'),
(675, 10, 318, 'udaynagar'),
(676, 29, 584, 'Dilshad Colony'),
(677, 7, 205, 'T.nagar'),
(678, 7, 232, 'katpadi'),
(679, 6, 191, 'ADONI'),
(680, 10, 318, 'DOMLUR'),
(681, 6, 188, 'manthani'),
(682, 10, 318, 'Rajajinagar'),
(683, 6, 195, 'Nellore'),
(684, 1, 3, 'Saudi Arabia'),
(685, 7, 205, 'Besant Nagar'),
(686, 7, 226, 'Kumbakonam'),
(687, 7, 205, 'Adyar'),
(688, 7, 211, 'THIRUVANMIYUR'),
(689, 7, 224, 'sriviliputhur'),
(690, 7, 205, 'Padi'),
(691, 7, 205, 'Ambattur'),
(692, 1, 337, 'kalamassery'),
(693, 1, 1, 'Vazhutakad'),
(694, 7, 205, 'Nungambakkam'),
(695, 10, 318, 'B.T.M 2nd Stage'),
(696, 10, 318, 'Bohmmanahalli'),
(697, 10, 318, 'HAL'),
(698, 10, 317, 'Bommanahalli.'),
(699, 1, 9, 'Panampilly Nagar'),
(700, 1, 10, 'Engandiyur'),
(701, 1, 1, 'Nettayam'),
(702, 1, 10, 'KOTTUPURAM - VARAVOOR'),
(703, 1, 13, 'padana'),
(704, 1, 1, 'Eanchakkal'),
(705, 10, 318, 'Koramangala'),
(706, 10, 318, 'Lingarajpuram'),
(707, 6, 198, 'hyderabad'),
(708, 4, 155, 'fghfghfgh'),
(709, 1, 1, 'east fort'),
(710, 1, 10, 'Alagappanagar(Vendore)'),
(711, 7, 206, 'Saibaba colony'),
(712, 10, 318, 'Ejipura'),
(713, 11, 363, 'Ring Road'),
(714, 10, 318, 'Banashankari'),
(715, 3, 94, 'Baner'),
(716, 10, 317, 'Banaswadi'),
(717, 7, 219, 'Ramachandra puram (Post)'),
(718, 10, 318, 'Vijayanagar'),
(719, 10, 318, 'Mahadeva puram'),
(720, 3, 103, 'New Panvel'),
(721, 7, 206, 'karumathampatti'),
(722, 1, 9, 'Palachuvad'),
(723, 7, 206, 'Nanjundapuram road'),
(724, 1, 9, 'Trivandrum'),
(725, 1, 239, 'Calicut'),
(726, 6, 186, 'Secunderabad'),
(727, 10, 318, 'J P Nagar'),
(728, 7, 208, 'Chennai, Dharmapuri'),
(729, 3, 94, 'Hadapsar'),
(730, 2, 43, 'Noida'),
(731, 10, 317, 'Electronics City'),
(732, 7, 205, 'Thoraipakam'),
(733, 7, 206, 'Ramanathapuram'),
(734, 29, 589, 'Madangir'),
(735, 31, 596, 'chandigarh'),
(736, 7, 217, 'SOLASIRAMANI'),
(737, 10, 317, 'Mahadevpura'),
(738, 10, 318, 'RT Nagar'),
(739, 1, 6, 'Arunnoottimangalam'),
(740, 6, 190, 'Kosuru'),
(741, 7, 205, 'Choolaimedu'),
(742, 3, 103, 'Kharghar'),
(743, 3, 122, 'Ambarnath'),
(744, 10, 317, 'Marathalli'),
(745, 8, 250, 'Indore'),
(746, 29, 589, 'Malviya nagar'),
(747, 10, 317, 'JJR Nagar'),
(748, 10, 317, 'B.T.M LAYOUT'),
(749, 12, 368, 'samaraipur'),
(750, 7, 533, 'Nagercoil'),
(751, 2, 47, 'Indirapuram'),
(752, 11, 345, 'bharuch'),
(753, 7, 206, 'periyanaikenpalayam'),
(754, 10, 317, 'indira nagar'),
(755, 7, 232, 'Arcot'),
(756, 6, 198, 'shabad'),
(757, 10, 317, 'Whitefield'),
(758, 7, 205, 'Ramapuram'),
(759, 6, 200, 'Pedawaltaire'),
(760, 7, 205, 'Aminjikarai'),
(761, 29, 584, 'Mayur Vihar'),
(762, 7, 205, 'Triplicane'),
(763, 7, 205, 'Velachery'),
(764, 7, 205, 'Kodambakkam'),
(765, 29, 585, 'Inderpuri'),
(766, 6, 183, 'Madanapalle'),
(767, 10, 318, 'BAGALAGUNTE'),
(768, 6, 186, 'madhapur'),
(769, 3, 115, 'navi mumbai'),
(770, 7, 205, 'Ayyappanthangal'),
(771, 16, 458, 'DLF Phase 2'),
(772, 32, 597, 'Andaman'),
(773, 30, 594, 'KALAPET'),
(774, 1, 2, 'Ulliyeri'),
(775, 10, 318, 'nelamangla'),
(776, 10, 317, 'Bangalore'),
(777, 7, 205, 'porur'),
(778, 7, 210, 'Kavindapadi'),
(779, 10, 317, 'Leggere'),
(780, 6, 194, 'siddipet'),
(781, 7, 205, 'Perambur'),
(782, 12, 377, 'Adarsh colony'),
(783, 1, 1, 'SHANGUMUGAM'),
(784, 16, 456, 'sec 45'),
(785, 7, 205, 'Ashok Nagar'),
(786, 6, 185, 'Guntur'),
(787, 6, 202, 'cherial'),
(788, 7, 211, 'Meenambakkam'),
(789, 10, 314, 'Adarsh nagar'),
(790, 3, 94, 'Pashan'),
(791, 11, 341, 'Memnagar'),
(792, 3, 122, 'Dahanu'),
(793, 6, 186, 'SOMAJIGUDA'),
(794, 12, 380, 'Bhubaneswar'),
(795, 7, 205, 'Anna Nagar'),
(796, 6, 190, 'mylavaram'),
(797, 1, 2, 'engapuzha'),
(798, 10, 318, 'Thippasandra'),
(799, 10, 318, 'Hennur Bande'),
(800, 10, 333, 'Kuvempunagar'),
(801, 7, 230, 'COIMBATORE'),
(802, 6, 186, 'PUNJAGUTTA'),
(803, 7, 205, 'Nesapakkam'),
(804, 6, 186, 'Dilsukhnagar'),
(805, 6, 597, 'Others'),
(806, 10, 318, 'Marathahalli'),
(807, 6, 187, 'rayachoti'),
(808, 1, 10, 'Kuttur'),
(809, 7, 205, 'Old Washermenpet'),
(810, 7, 210, 'Erode-town'),
(811, 7, 223, 'tvs tollgate'),
(812, 2, 57, 'Near Hanuman Mandir'),
(813, 10, 318, 'Sanjay Nagar'),
(814, 7, 205, 'villivakkam'),
(815, 10, 317, 'Koramangala'),
(816, 30, 594, 'Lawspet'),
(817, 7, 206, 'Puliyakulam'),
(818, 7, 207, 'chidambaram'),
(819, 10, 318, 'Jayanagar 9th block'),
(820, 1, 12, 'puthiyangadi'),
(821, 1, 13, 'MULLERIA'),
(822, 1, 12, 'vadakkumbad'),
(823, 1, 6, 'Nooranad'),
(824, 9, 298, 'Jaipur'),
(825, 1, 2, 'Palazhi'),
(826, 3, 94, 'SINHAGAD ROAD'),
(827, 7, 214, 'Tirumangalam'),
(828, 3, 92, 'bhandup'),
(829, 7, 227, 'kayalpatnam.');
";
$this->insertData($location_value);
$life_state=$id."life_state";
$state="CREATE TABLE $life_state (
  `State_Id` int(11) NOT NULL auto_increment,
  `State_Name` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`State_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;
";
$this->insertData($state);
$life_state=$id."life_state";
$state_value="
INSERT INTO $life_state (`State_Id`, `State_Name`) VALUES
(1, 'Kerala'),
(2, 'Uttar Pradesh'),
(3, 'Maharashtra'),
(4, 'Bihar'),
(5, 'West Bengal'),
(6, 'Andhra Pradesh'),
(7, 'Tamil Nadu'),
(8, 'Madhya Pradesh'),
(9, 'Rajasthan'),
(10, 'Karnataka'),
(11, 'Gujarat'),
(12, 'Orissa'),
(13, 'Jharkhand'),
(14, 'Assam'),
(15, 'Punjab'),
(16, 'Haryana'),
(17, 'Chhattisgarh'),
(18, 'Jammu and Kashmir'),
(19, 'Uttarakhand'),
(20, 'Himachal Pradesh'),
(21, 'Tripura'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Nagaland'),
(25, 'Goa'),
(26, 'Arunachal Pradesh'),
(27, 'Mizoram'),
(28, 'Sikkim'),
(29, 'National Capital Territory of Delhi'),
(30, 'Puducherry'),
(31, 'Chandigarh'),
(32, 'Andaman and Nicobar Islands'),
(33, 'Dadra and Nagar Haveli'),
(34, 'Daman and Diu'),
(35, 'Lakshadweep');";


$this->insertData($state_value);
    }	
	
	
	
 public function createTablesMatrixOrUnilevel($id,$product,$passcod,$username,$fullname,$phone,$email,$country,$location, $password,$depth_limit,$width_limit,$mlm_plan)
    {
	
	
	
    $module_status=$id."module_status";
    $modules="CREATE TABLE $module_status (
  `id` int(11) NOT NULL auto_increment,
  `mlm_plan` varchar(50) NOT NULL,
  `pin_status` varchar(50) NOT NULL,
  `no_of_pin_types` int(5) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `sms_status` varchar(50) NOT NULL,
  `mailbox_status` varchar(50) NOT NULL,
  `referal_status` varchar(50) NOT NULL,
  `sec_pswd_status` varchar(50) NOT NULL,
  `emp_login_status` varchar(50) NOT NULL,
  `news_status` varchar(50) NOT NULL,
  `galery_status` varchar(50) NOT NULL,
  `feedback_status` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12352 ;
";
	$this->insertData($modules);
	
	
	$module_status=$id."module_status";	
$insert1="INSERT INTO $module_status (mlm_plan, pin_status, no_of_pin_types,
          product_status,sms_status,mailbox_status,referal_status,sec_pswd_status,emp_login_status,
		  news_status,galery_status,feedback_status) 
		  values('$mlm_plan','$passcod','1','$product','yes','yes','no','no','no','no','no','no')";

$result1=mysql_query($insert1) or die("Error 1 on insertion to modules ..9.");
	
	
	//echo "fhdjhghfdh";
$auto_increment = $id + 1;
 $ft_individual=$id."ft_individual";
$qr_ft="CREATE TABLE  $ft_individual (
  `id` int(10) unsigned NOT NULL auto_increment,
  `order_id` int(20),
  `user_name` varchar(30) NOT NULL,
  `active` varchar(10) NOT NULL default 'yes',
  `position` char(1) NOT NULL default '',
  `father_id` int(10) NOT NULL default '0',
  `total_leg` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `date_of_joining` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `user_level` int(20) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `first` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT =$auto_increment ";
$this->insertData($qr_ft,"Error on ftindual... ");

$login_user=$id."login_user";
$login_usr="CREATE TABLE $login_user (
  `user_id` int(11) NOT NULL auto_increment,
  `addedby` varchar(50) NOT NULL default 'server',
  `user_type` varchar(20) NOT NULL default 'distributor',
  `user_name` varchar(100) default NULL,
  `password` varchar(50) default NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=$auto_increment ;
";
$this->insertData($login_usr);


$insert1="INSERT INTO $login_user (user_id,user_type, addedby, user_name,password) values('$id','admin','code','admin','$password')";
//echo $insert1;
$result1=mysql_query($insert1) or die("Error 1 on insertion to login_user..9.");




$insert="INSERT INTO $ft_individual SET
		id='$id', 
		father_id=0, 
	    order_id ='1',
		position = '1', 
		user_name ='admin', 
		active='yes',
		product_id=1,
		user_level='1'
		";
		// echo $insert;
		$result2 = mysql_query($insert) or die("Error in inserting table5553".mysql_error());



                $pswd=md5("FFGFG56676FGVBBN");
                $insert1="INSERT INTO $login_user (user_type, addedby, user_name,password) values('distributor','server','InfiniteMLMTemp1','$pswd')";
               // echo $insert1;
                $result2 = mysql_query($insert1) or die("Error in inserting table5634565");
                $last_insert_id=mysql_insert_id();


                $insert3="INSERT INTO $ft_individual SET
		id=' $last_insert_id', father_id='$id',position = '1', user_name ='InfiniteMLMTemp1', active='server',product_id=1,user_level='2'";
		// echo $insert;
		$result2 = mysql_query($insert3) or die("Error in inserting table5455");


         

     

//$id="gold_";
	$infinite_mlm_menu=$id."infinite_mlm_menu";
   $qr_menu="CREATE TABLE $infinite_mlm_menu (
  `id` int(12) NOT NULL auto_increment,
  `link` varchar(200) NOT NULL,
  `text` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
   `perm_admin` int(12) NOT NULL,
   `perm_dist` int(12) NOT NULL,
   `perm_emp` int(12) NOT NULL,
   `main_order_id` int(12) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
//echo "FDDDDD $qr_menu";
	$this->insertData($qr_menu,"Error on 34346576");
	
	
	
	

$infinite_mlm_menu=$id."infinite_mlm_menu";
$infinite_mlm_menu_value="
INSERT INTO $infinite_mlm_menu (link,text,status,perm_admin,perm_emp,perm_dist,main_order_id) VALUES
('tree/ft_chart.php', 'Downline Graphical view','yes',1,1,1,1),
('index.php?page=LegCount', 'Leg Count','yes',1,1,1,2),
('index.php?page=WeeklyPayout', 'Weekly Payout','yes',1,1,1,3),
('index.php?page=ChangePassword', 'Change Password','yes',1,1,1,4),
('index.php?page=UpdateProfile', 'Profile Management','yes',1,1,1,5),
('index.php?page=MemberManagement', 'Member Management','yes',1,0,0,6),
('#', 'Achievers management','yes',1,1,0,7),
('index.php?page=Joining', 'Joining Status','yes',1,1,0,8),
('index.php?page=Config', 'Configuration','yes',1,0,0,9),
('index.php?page=AddProduct', 'Product Management','$product',1,0,0,10),
('index.php?page=GeneratePasscod', 'Passcode Management','$passcod',1,1,1,11),
('index.php?page=ProfileReport', 'Reports','yes',1,1,1,12),
('index.php?page=SendSMS','Send SMS','yes',1,1,0,13),
('index.php?page=SMSBalance','SMS Details','yes',1,1,0,14),
('index.php?page=AddNews', 'News Management','yes',1,1,0,15),
('index.php?page=Feedback', 'Feedback','yes',1,1,1,16),
('index.php?page=ComboxMessage', 'Compose Mail','yes',1,1,1,17),
('index.php?page=InboxMail', 'Inbox','yes',1,1,1,16),
('index.php?page=Outbox', 'Outbox','yes',0,0,0,19),
('logout.php', 'Logout','yes',1,1,1,20)
;";
//echo $infinite_mlm_menu_value;
$this->insertData($infinite_mlm_menu_value,"Error ion 455767");


         $sub_menu=$id."infinite_mlm_sub_menu";
$sub_menu_qr="CREATE TABLE IF NOT EXISTS `$sub_menu` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_text` varchar(100) NOT NULL,
  `sub_status` varchar(100) NOT NULL,
  `sub_refid` varchar(100) NOT NULL,
  `sub_link` varchar(100) NOT NULL,
  `perm_admin` int(12) NOT NULL,
   `perm_dist` int(12) NOT NULL,
   `perm_emp` int(12) NOT NULL,
   `sub_order_id` int(12) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ";

$this->insertData($sub_menu_qr,"Error on 454565");



$infinite_mlm_sub_menu=$id."infinite_mlm_sub_menu";
$infinite_mlm_sub_menu_value="
INSERT INTO $infinite_mlm_sub_menu (sub_link,sub_text,sub_status,perm_admin,perm_emp,perm_dist,sub_order_id,sub_refid) VALUES
('index.php?page=AddProduct','Add New Product','$product',1,0,0,1,10),
('index.php?page=EditProduct','Edit Product','$product',1,0,0,2,10),
('index.php?page=DeleteProduct','Delete Product','$product' ,1,0,0,3,10),
('index.php?page=InactiveProduct','Inactive Product','$product',1,0,0,4,10),
('index.php?page=GeneratePasscod','Add New Passcode','$passcod',1,0,0,1,11),
('index.php?page=SearchPasscod','Search Passcode','$passcod',1,0,0,2,11),
('index.php?page=DeletePasscod','Delete Passcode','$passcod',1,0,0,3,11),
('index.php?page=ActivePasscod','Active Passcode','$passcod',1,0,0,4,11),
('index.php?page=InactivePasscod', 'Inactive Passcode','$passcod',1,0,0,5,11),
('index.php?page=ViewPinReq', 'View Passcode Request','$passcod',1,1,0,6,11),
('index.php?page=ReqPin', 'Request Passcode','$passcod',0,0,1,7,11),
('index.php?page=ViewMyPin', 'View My Pin','$passcod',0,0,1,8,11),

('index.php?page=ProfileReport', 'Member Profile Report','yes',1,0,0,0,12),
('index.php?page=TotalJoiningReport', 'Joining Reports','yes',1,0,0,2,12),
('index.php?page=TotalPayoutReport', 'Payout Reports','yes',1,0,0,3,12),
('index.php?page=BankStatementReport', 'Bank Statement Reports','yes',0,0,0,4,12)
;";
$this->insertData($infinite_mlm_sub_menu_value,"Error on 34657");

	
	
   $configuration=$id."configuration";
   $qr_confic="CREATE TABLE $configuration (
  `id` int(11) NOT NULL auto_increment,
  `tds` float NOT NULL default '0',
  `service_charge` float NOT NULL default '0',
  `width_cieling` int(12) NOT NULL,
  `depth_cieling` int(12) NOT NULL,
  `payout_release` varchar(50) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `sms_status` varchar(250) NOT NULL default 'enabled',
  `setting_staus` varchar(50) NOT NULL,
  `reg_amount` int(12),
  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;";
$this->insertData($qr_confic);
$config_arr=$this->getPayoutReleaseDate($id);
//print_r($config_arr);
$pay_release=$config_arr["payout_release"];

if($product=="no")
{
$reg_amount=100;
}
else
{
$reg_amount=0;
}

if($pay_release=="week")
    {
$pay_start=$config_arr["payout_starting_day"];
$pay_end=$config_arr["payout_ending_day"];
$qr="INSERT INTO $configuration SET tds='0',service_charge ='0',payout_release='$pay_release',start_date='$pay_start',end_date='$pay_end',setting_staus='no',depth_cieling  ='$depth_limit',width_cieling ='$width_limit', reg_amount='$reg_amount' ";
    }
    else
        {
  $qr="INSERT INTO $configuration SET tds='0' ,service_charge ='0',payout_release='$pay_release',setting_staus='no',depth_cieling  ='$depth_limit',width_cieling ='$width_limit',reg_amount='$reg_amount' ";
        }
//echo $qr;
$this->insertData($qr,"Error on insert 9468789579");






$level_commision=$id."level_commision";

$level_qr="CREATE TABLE $level_commision (
  `id` int(12) NOT NULL auto_increment,
  `level_no` int(12) NOT NULL,
  `level_percentage` int(12) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

$this->insertData($level_qr,"Invalid insert Leg amount1233445");



$level_commision=$id."level_commision";
$depth_limit_tmp = $depth_limit;
for($i=0;$i<$depth_limit;$i++)
{
 $level_no=$i+1;
 $qr="INSERT INTO $level_commision SET level_no = '$level_no', 
 level_percentage='$depth_limit_tmp'";
 $this->insertData($qr,"Error on insert 9468789579");
 
 $depth_limit_tmp=$depth_limit_tmp-1;
}




$leg_amount=$id."leg_amount";
$qr_leg_amount="
CREATE TABLE $leg_amount (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `total_leg` int(11) NOT NULL default '0',
  `total_amount` float NOT NULL default '0',
  `leg_amount_carry` int(20) NOT NULL,
  `amount_payable` float NOT NULL default '0',
  `amount_type` varchar(50) NOT NULL,
  `tds` float NOT NULL default '0',
  `date_of_submission` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `service_charge` float NOT NULL default '0',
  `user_level` int(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
$this->insertData($qr_leg_amount,"Invalid insert Leg amount123");

$amount_paid=$id."amount_paid";
$qr_amount_paid="CREATE TABLE $amount_paid (
  `paid_id` int(11) NOT NULL auto_increment,
  `paid_user_id` int(11) NOT NULL,
  `paid_amount` double NOT NULL,
  `paid_date` date NOT NULL,
  `paid_level` int(11) NOT NULL,
  `paid_type` varchar(50) NOT NULL,
  PRIMARY KEY  (`paid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
$this->insertData($qr_amount_paid,"Invalid insert amount paid");


$leg_carry_forward=$id."leg_carry_forward";
$qr_leg_carry_frwd="CREATE TABLE $leg_carry_forward (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `carry_left` int(11) NOT NULL default '0',
  `carry_right` int(11) NOT NULL default '0',
  `date_to_calculate` datetime NOT NULL default '0000-00-00 00:00:00',
  `date_of_insertion` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `greatest_level` int(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";

$this->insertData($qr_leg_carry_frwd);








$user_details=$id."user_details";
$user_detail_qr="CREATE TABLE $user_details (
  `user_detail_id` int(11) NOT NULL auto_increment,
  `user_detail_refid` int(11) NOT NULL default '0',
  `user_details_ref_user_id` int(11) NOT NULL,
  `userdetail_mobid` varchar(250) NOT NULL,
  `user_detail_name` varchar(250) NOT NULL default '',
  `user_details_prod` varchar(100) NOT NULL,
  `user_detail_father` varchar(250) default NULL,
  `user_details_position` varchar(10) NOT NULL,
  `user_detail_address` text NOT NULL,
  `user_detail_town` varchar(250) NOT NULL default '',
  `user_detail_country` varchar(50) NOT NULL default '',
  `user_detail_state` varchar(250) NOT NULL default '',
  `user_detail_district` varchar(250) NOT NULL default '',
  `user_detail_po` varchar(250) default NULL,
  `user_detail_pin` int(11) NOT NULL default '0',
  `user_detail_college` varchar(250) default NULL,
  `user_detail_course` varchar(250) default NULL,
  `user_detail_year_study` int(250) default NULL,
  `user_detail_blood_group` varchar(10) default NULL,
  `user_detail_donate_blood` varchar(5) default NULL,
  `user_detail_area_interest` varchar(250) default NULL,
  `user_detail_qualification` varchar(250) default NULL,
  `user_detail_designation` varchar(250) default NULL,
  `user_detail_dept` varchar(250) default NULL,
  `user_detail_office` varchar(250) default NULL,
  `user_detail_place_work` varchar(250) default NULL,
  `user_detail_seek_job` varchar(5) default NULL,
  `user_detail_passcode` varchar(250) NOT NULL default '',
  `user_detail_mobile` varchar(250) NOT NULL default '',
  `user_detail_land` varchar(250) NOT NULL default '',
  `user_detail_email` varchar(250) NOT NULL default '',
  `user_detail_dob` date NOT NULL default '0000-00-00',
  `user_detail_gender` varchar(50) NOT NULL default '',
  `user_detail_nominee` varchar(250) NOT NULL default '',
  `user_detail_relation` varchar(250) NOT NULL default '',
  `user_detail_acnumber` varchar(250) NOT NULL default '',
  `user_detail_ifsc` varchar(50) NOT NULL default '',
  `user_detail_nbank` varchar(250) NOT NULL default '',
  `user_detail_nbranch` varchar(250) NOT NULL default '',
  `user_detail_pan` varchar(100) NOT NULL default '',
  `user_level` int(11) NOT NULL,
  `join_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12348 ;
";
$this->insertData($user_detail_qr);

$insert_details="insert into $user_details  set user_detail_refid='$id',user_detail_name='$fullname',user_detail_address='$username',user_detail_town='$location',user_detail_state='',user_detail_district='',user_detail_pin='',user_detail_passcode='000000',user_detail_mobile='',user_detail_land='$phone',user_detail_email='$email',user_detail_dob='',user_detail_gender='M',user_detail_nominee='',user_detail_relation='Self',user_detail_acnumber='',user_detail_nbank='',user_detail_nbranch=''";

$result_details=mysql_query($insert_details) or die("Error 1 on insertion to login_details...");



if($passcod=='yes')
{
$pin_config=$id."pin_config";
$pin_config="CREATE TABLE $pin_config (
  `id` int(11) NOT NULL auto_increment,
  `pin_amount` double default NULL,
  `pin_length` int(11) default NULL,
  `pin_type` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
$this->insertData($pin_config,"Error on create pinconfig3543465");
$pin_numbers=$id."pin_numbers";
$pin_no="CREATE TABLE $pin_numbers (
  `pin_id` int(11) NOT NULL auto_increment,
  `pin_prod_refid` int(11) NOT NULL default '0',
  `pin_numbers` varchar(15) NOT NULL,
  `pin_alloc_date` date NOT NULL default '0000-00-00',
  `status` varchar(50) NOT NULL default 'active',
  `used_user` varchar(250) NOT NULL,
  `generated_user_id` varchar(100) NOT NULL,
  `allocated_user_id` varchar(20) NOT NULL,
  `user_pin_name` varchar(250) NOT NULL,
  `pin_type` varchar(50),
  `pin_uploded_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`pin_id`),
  UNIQUE KEY `pin_numbers` (`pin_numbers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";
$this->insertData($pin_no,"Error on create pinnum35f4563465");


$pin_request=$id."pin_request";
$qr_pin_request="CREATE TABLE $pin_request (
  `req_id` int(11) NOT NULL auto_increment,
  `req_user_id` int(11) NOT NULL,
  `req_pin_count` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `req_rec_pin_count` int(11) NOT NULL,
  `req_date` date NOT NULL,
  `req_rec_date` date NOT NULL,
   `status` varchar(50) NOT NULL,
  PRIMARY KEY  (`req_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
$this->insertData($qr_pin_request,"Error on create qr_pin_request");
}


if($product=='yes')
{
$product=$id."product";
$product="CREATE TABLE $product (
  `product_id` int(11) NOT NULL auto_increment,
  `product_name` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL,
  `date_of_insertion` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `prod_id` varchar(10) NOT NULL,
  `product_value` float NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
";
$this->insertData($product,"Error on create pinconfigfggffg3543465");
$repurchase=$id."repurchase";
$repur="CREATE TABLE $repurchase (
  `repurchase_id` int(11) NOT NULL auto_increment,
  `repurchase_user_id` varchar(250) NOT NULL,
  `repurchase_pro_id` int(250) NOT NULL,
  `repurchase_pro_amount` float NOT NULL,
  `repurchase_date` datetime NOT NULL,
  PRIMARY KEY  (`repurchase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;
";

$this->insertData($repur,"Error on create rep3543466676");
}


$sms_history=$id."sms_history";
$sms_hist="CREATE TABLE $sms_history(
  `id` int(11) NOT NULL auto_increment,
  `numbers` text NOT NULL,
  `message` text NOT NULL,
  `message_count` int(11) NOT NULL default '0',
  `status` varchar(255) NOT NULL default '',
  `datetime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;
";
$this->insertData($sms_hist);
$mailtoadmin=$id."mailtoadmin";
$mail_admin="CREATE TABLE $mailtoadmin (
  `mailadid` int(11) NOT NULL auto_increment,
  `mailaduser` int(12) NOT NULL,
  `mailadsubject` text NOT NULL,
  `mailadiddate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL,
  `mailadidmsg` longtext NOT NULL,
  PRIMARY KEY  (`mailadid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$this->insertData($mail_admin);



$mailtouser=$id."mailtouser";
$mail_usr="CREATE TABLE $mailtouser(
  `mailtousid` int(11) NOT NULL auto_increment,
  `mailtoususer` int(11) NOT NULL,
  `mailtoussub` text NOT NULL,
  `mailtousmsg` longtext NOT NULL,
  `mailtousdate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL default 'yes',
  PRIMARY KEY  (`mailtousid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$this->insertData($mail_usr,"Error 1324");

$events=$id."events";
    $qr_event="CREATE TABLE $events (
  `events_id` int(11) NOT NULL auto_increment,
  `events_title` varchar(250) NOT NULL default '',
  `events_desc` text NOT NULL,
  `events_date` date NOT NULL default '0000-00-00',
  `events_venue` varchar(250) NOT NULL default '',
  `events_time` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`events_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
$this->insertData($qr_event);
$feedback=$id."feedback";
$qr_feedback="CREATE TABLE $feedback (
  `feedback_id` int(11) NOT NULL auto_increment,
  `feedback_name` varchar(250) NOT NULL default '',
  `feedback_company` varchar(250) NOT NULL default '',
  `feedback_email` varchar(250) NOT NULL default '',
  `feedback_phone` varchar(250) NOT NULL default '',
  `feedback_time` varchar(250) NOT NULL default '',
  `feedback_remark` text NOT NULL,
  `feedback_date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$this->insertData($qr_feedback,"Error on creating feedback ..212");
$news=$id."news";
$news="CREATE TABLE $news(
  `news_id` int(11) NOT NULL auto_increment,
  `news_title` varchar(250) NOT NULL default '',
  `news_desc` text NOT NULL,
  `news_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;
";
$this->insertData($news);
$life_district=$id."life_district";
$qr_district="CREATE TABLE $life_district (
  `District_Id` int(11) NOT NULL auto_increment,
  `District_State_Ref_Id` int(11) NOT NULL default '0',
  `District_Name` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`District_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=601 ;
";
$this->insertData($qr_district);






$life_district=$id."life_district";
$life_value="INSERT INTO $life_district (`District_Id`, `District_State_Ref_Id`, `District_Name`) VALUES
(1, 1, 'Thiruvananthapuram'),
(2, 1, 'Kozhikode'),
(3, 1, 'Malappuram'),
(4, 1, 'Kollam'),
(5, 1, 'Pathanamthitta'),
(6, 1, 'Alappuzha'),
(7, 1, 'Kottayam'),
(8, 1, 'Idukki'),
(9, 1, 'Ernakulam'),
(10, 1, 'Thrissur'),
(11, 1, 'Palakkad'),
(12, 1, 'Kannur'),
(13, 1, 'kasargode'),
(14, 1, 'Wayanad'),
(17, 2, 'Agra'),
(18, 2, 'Alahabad'),
(19, 2, 'Aligarh'),
(20, 2, 'Ambedkar Nagar'),
(21, 2, 'Auraiya'),
(22, 2, 'Azamgarh'),
(23, 2, 'Barabanki'),
(24, 2, 'Badaun'),
(25, 2, 'Bagpat'),
(26, 2, 'Bahraich'),
(27, 2, 'Bijnor'),
(28, 2, 'Ballia'),
(29, 2, 'Banda District'),
(30, 2, 'Balrampur'),
(31, 2, 'Bareilly'),
(32, 2, 'Basti'),
(33, 2, 'Bulandshahr'),
(34, 2, 'Chandauli'),
(35, 2, 'Chitrakoot'),
(36, 2, 'Deoria'),
(37, 2, 'Etah'),
(38, 2, 'Etawah'),
(39, 2, 'Firozbad'),
(40, 2, 'Farrukhabad'),
(41, 2, 'Fatehpur'),
(42, 2, 'Faizabad'),
(43, 2, 'Gautam Buddha Nagar'),
(44, 2, 'Gonda'),
(45, 2, 'Ghazipur'),
(46, 2, 'Gorkakhpur'),
(47, 2, 'Ghaziabad'),
(48, 2, 'Hamirpur'),
(49, 2, 'Hardoi'),
(50, 2, 'Mahamaya Nagar'),
(51, 2, 'Jhansi'),
(52, 2, 'Jalaun'),
(53, 2, 'Jyotiba Phule Nagar'),
(54, 2, 'Jaunpur District'),
(55, 2, 'Kanpur Dehat'),
(56, 2, 'Kannauj'),
(57, 2, 'Kanpur Nagar'),
(58, 2, 'Kanshi Ram Nagar'),
(59, 2, 'Kaushambi'),
(60, 2, 'Kushinagar'),
(61, 2, 'Lalitpur'),
(62, 2, 'Lakhimpur Kheri'),
(63, 2, 'Lucknow'),
(64, 2, 'Mau'),
(65, 2, 'Meerut'),
(66, 2, 'Maharajganj'),
(67, 2, 'Mahoba'),
(68, 2, 'Mirzapur'),
(69, 2, 'Moradabad'),
(70, 2, 'Mainpuri'),
(71, 2, 'Mathura'),
(72, 2, 'Muzaffarnagar'),
(73, 2, 'Pilibhit'),
(74, 2, 'Pratapgarh'),
(75, 2, 'Rampur'),
(76, 2, 'Rae Bareli'),
(77, 2, 'Saharanpur'),
(78, 2, 'Sitapur'),
(79, 2, 'Shahjahanpur'),
(80, 2, 'Sant Kabir Nagar'),
(81, 2, 'Siddharthnagar'),
(82, 2, 'Sonbhadra'),
(83, 2, 'Sant Ravidas Nagar'),
(84, 2, 'Sultanpur'),
(85, 2, 'Shravasti'),
(86, 2, 'Unnao'),
(87, 2, 'Varanasi'),
(88, 3, 'Ahmednagar'),
(89, 3, 'Beed'),
(90, 3, 'Dhule'),
(91, 3, 'Jalgaon'),
(92, 3, 'Mumbai City'),
(93, 3, 'Nandurbar'),
(94, 3, 'Pune'),
(95, 3, 'Satara'),
(96, 3, 'Wardha'),
(97, 3, 'Akola'),
(98, 3, 'Bhandara'),
(99, 3, 'Gadchiroli'),
(100, 3, 'Jalna'),
(101, 3, 'Mumbai Sub-urban'),
(102, 3, 'Nashik'),
(103, 3, 'Raigad'),
(104, 3, 'Sindhudurg'),
(105, 3, 'Washim'),
(106, 3, 'Amravati'),
(107, 3, 'Buldhana'),
(108, 3, 'Gondia'),
(109, 3, 'Kolhapur'),
(110, 3, 'Nagpur'),
(111, 3, 'Osmanabad'),
(112, 3, 'Ratnagiri'),
(113, 3, 'Solapur'),
(114, 3, 'Yavatmal'),
(115, 3, 'Aurangabad'),
(116, 3, 'Chandrapur'),
(117, 3, 'Hingoli'),
(118, 3, 'Latur'),
(119, 3, 'Nanded'),
(120, 3, 'Parbhani'),
(121, 3, 'Sangli'),
(122, 3, 'Thane'),
(123, 4, 'Araria'),
(124, 4, 'Bhabhua'),
(125, 4, 'East Champaran'),
(126, 4, 'Katihar'),
(127, 4, 'Madhubani'),
(128, 4, 'Patna'),
(129, 4, 'saran'),
(130, 4, 'Supaul'),
(131, 4, 'Arwal'),
(132, 4, 'Bhagalpur'),
(133, 4, 'Gaya'),
(134, 4, 'Khagaria'),
(135, 4, 'Munger'),
(137, 4, 'Purnia'),
(138, 4, 'Sheohar'),
(139, 4, 'Vaishali'),
(140, 4, 'Aurangabad'),
(141, 4, 'Bhojpur'),
(142, 4, 'Gopalganj'),
(143, 4, 'Kishanganj'),
(144, 4, 'Muzaffarpur'),
(145, 4, 'Rohtas'),
(146, 4, 'Shiekhpura'),
(147, 4, 'West Champaran'),
(148, 4, 'Banka'),
(149, 4, 'Buxar'),
(150, 4, 'Jamui'),
(151, 4, 'Lakhisarai'),
(152, 4, 'Nalanda'),
(153, 4, 'Saharsa'),
(154, 4, 'Sitamarhi'),
(155, 4, 'Begusarai'),
(156, 4, 'Darbhanga'),
(157, 4, 'Jehanabad'),
(158, 4, 'Madhepur'),
(159, 4, 'Nawada'),
(160, 4, 'Samastipur'),
(161, 4, 'Siwan'),
(163, 5, 'Kolkata'),
(164, 5, 'Bankura'),
(165, 5, 'Birbhum'),
(166, 5, 'Burdwan'),
(167, 5, 'Coochbehar'),
(168, 5, 'Darjeeling'),
(169, 5, 'Hoogly'),
(170, 5, 'Howrah'),
(171, 5, 'Jalpaiguri'),
(172, 5, 'Malda'),
(173, 5, 'Midnapore'),
(174, 5, 'Murshidabad'),
(175, 5, 'Nadia'),
(176, 5, 'Purulia'),
(177, 5, 'North 24 Parganas'),
(178, 5, 'South 24 Parganas'),
(179, 5, 'North Dinajpur'),
(180, 5, 'South Dinajpur'),
(181, 6, 'Adilabad'),
(182, 6, 'Anantapur'),
(183, 6, 'Chittoor'),
(184, 6, 'East Godavari'),
(185, 6, 'Guntur'),
(186, 6, 'Hyderabad'),
(187, 6, 'Kadapa'),
(188, 6, 'Karimnagar'),
(189, 6, 'Khammam'),
(190, 6, 'Krishna'),
(191, 6, 'Kurnool'),
(192, 6, 'Mahbubnagar'),
(193, 6, 'Nalgonda'),
(194, 6, 'Medak'),
(195, 6, 'Nellore'),
(196, 6, 'Nizamabad'),
(197, 6, 'Prakasam'),
(198, 6, 'Rangareddi'),
(199, 6, 'Srikakulam'),
(200, 6, 'Vishakhapatnam'),
(201, 6, 'Vizianagaram'),
(202, 6, 'Warangal'),
(203, 6, 'West Godavari'),
(204, 7, 'Ariyalur'),
(205, 7, 'Chennai'),
(206, 7, 'Coimbatore'),
(207, 7, 'Cuddalore'),
(208, 7, 'Dharmapuri'),
(209, 7, 'Dindigul'),
(210, 7, 'Erode'),
(211, 7, 'Kanchipuram'),
(212, 7, 'Kanyakumari'),
(213, 7, 'Karur'),
(214, 7, 'Madurai'),
(215, 7, 'Nagapattinam'),
(216, 7, 'The Nilgiris'),
(217, 7, 'Namakkal'),
(218, 7, 'Perambalur'),
(219, 7, 'Pudukkottai'),
(220, 7, 'Ramanathapuram'),
(221, 7, 'Salem'),
(222, 7, 'Sivaganga'),
(223, 7, 'Tiruchirappalli'),
(224, 7, 'Theni'),
(225, 7, 'Tirunelveli'),
(226, 7, 'Tanjore'),
(227, 7, 'Thoothukudi'),
(228, 7, 'Thiruvallur'),
(229, 7, 'Thiruvarur'),
(230, 7, 'Tirupur'),
(231, 7, 'Tiruvannamalai'),
(232, 7, 'Vellore'),
(233, 0, 'Villupuram'),
(234, 8, 'Balaghat'),
(235, 8, 'Barwani'),
(236, 8, 'Betul'),
(237, 8, 'Bhind'),
(238, 8, 'Bhopal'),
(239, 8, 'Chhatarpur'),
(240, 8, 'Chhindwara'),
(241, 8, 'Damoh'),
(242, 8, 'Datia'),
(243, 8, 'Dewas'),
(244, 8, 'Dhar'),
(245, 8, 'Dindori'),
(246, 8, 'Guna'),
(247, 8, 'Gwalior'),
(248, 8, 'Harda'),
(249, 8, 'Hoshangabad'),
(250, 8, 'Indore'),
(251, 8, 'Jabalpur'),
(252, 8, 'Jhabua'),
(253, 8, 'Katni'),
(254, 8, 'Khandwa (East Nimar)'),
(255, 8, 'Khargone (West Nimar)'),
(256, 8, 'Mandla'),
(257, 8, 'Mandsaur'),
(258, 8, 'Morena'),
(259, 8, 'Narsinghpur'),
(260, 8, 'Neemuch'),
(261, 8, 'Panna'),
(262, 8, 'Rewa'),
(263, 8, 'Rajgarh'),
(264, 8, 'Ratlam'),
(265, 8, 'Raisen'),
(266, 8, 'Sagar'),
(267, 8, 'Satna'),
(268, 8, 'Sehore'),
(269, 8, 'Seoni'),
(270, 8, 'Shahdol'),
(271, 8, 'Shajapur'),
(272, 8, 'Sheopur'),
(273, 8, 'Shivpuri'),
(274, 8, 'Sidhi'),
(275, 8, 'Tikamgarh'),
(276, 8, 'Ujjain'),
(277, 8, 'Umaria'),
(278, 8, 'Vidisha'),
(279, 9, 'Ajmer'),
(280, 9, 'Alwar'),
(281, 9, 'Bikaner'),
(282, 9, 'Barmer'),
(283, 9, 'Banswara'),
(284, 9, 'Bharatpur'),
(285, 9, 'Baran'),
(286, 9, 'Bundi'),
(287, 9, 'Bhilwara'),
(288, 9, 'Churu'),
(289, 9, 'Chittorgarh'),
(290, 9, 'Dausa'),
(291, 9, 'Dholpur'),
(292, 9, 'Dungapur'),
(293, 9, 'Ganganagar'),
(294, 9, 'Hanumangarh'),
(295, 9, 'Juhnjhunun'),
(296, 9, 'Jalore'),
(297, 9, 'Jodhpur'),
(298, 9, 'Jaipur'),
(299, 9, 'Jaisalmer'),
(300, 9, 'Jhalawar'),
(301, 9, 'Karauli'),
(302, 9, 'Kota'),
(303, 9, 'Nagaur'),
(304, 9, 'Pali'),
(305, 9, 'Pratapgarh'),
(306, 9, 'Rajsamand'),
(307, 9, 'Sikar'),
(308, 9, 'Sawai Madhopur'),
(309, 9, 'Sirohi'),
(310, 9, 'Tonk'),
(311, 9, 'Udaipur'),
(312, 10, 'Bidar District'),
(313, 10, 'Belgaum District'),
(314, 10, 'Bijapur District'),
(315, 10, 'Bagalkot District'),
(316, 10, 'Bellary District'),
(317, 10, 'Bangalore Rural District'),
(318, 10, 'Bangalore Urban district'),
(319, 10, 'Chamarajnagar District'),
(320, 10, 'Chikmagalur District'),
(321, 10, 'Chitradurga District'),
(322, 10, 'Davanagere District'),
(323, 10, 'Dharwad District'),
(324, 10, 'Dakshina Kannada'),
(325, 10, 'Gadag District'),
(326, 10, 'Gulbarga District'),
(327, 10, 'Hassan District'),
(328, 10, 'Haveri District'),
(329, 10, 'Kodagu'),
(330, 10, 'Kolar District'),
(331, 10, 'Koppal District'),
(332, 10, 'Mandya District'),
(333, 10, 'Mysore District'),
(334, 10, 'Raichur District'),
(335, 10, 'Shimoga District'),
(336, 10, 'Tumkur District'),
(337, 10, 'Udupi District'),
(338, 10, 'Uttara Kannada'),
(339, 10, 'Ramanagara District'),
(340, 10, 'Chikballapur District'),
(341, 11, 'Ahmedabad'),
(342, 11, 'Amreli District'),
(343, 11, 'Anand'),
(344, 11, 'Banaskantha'),
(345, 11, 'Bharuch'),
(346, 11, 'Bhavnagar'),
(347, 11, 'Dahod'),
(348, 11, 'The Dangs'),
(349, 11, 'Gandhinagar'),
(350, 11, 'Jamnagar'),
(351, 11, 'Junagadh'),
(352, 11, 'Kutch'),
(353, 11, 'Kheda'),
(354, 11, 'Mehsana'),
(355, 11, 'Narmada'),
(356, 11, 'Navsari'),
(357, 11, 'Patan'),
(358, 11, 'Panchmahal'),
(359, 11, 'Porbandar'),
(360, 11, 'Rajkot'),
(361, 11, 'Sabarkantha'),
(362, 11, 'Surendranagar'),
(363, 11, 'Surat'),
(364, 11, 'Vadodara'),
(365, 11, 'Valsad'),
(366, 12, 'Angul'),
(367, 12, 'Boudh (Bauda)'),
(368, 12, 'Bhadrak'),
(369, 12, 'Bolangir (Balangir)'),
(370, 12, 'Bargarh (Baragarh)'),
(371, 12, 'Baleswar (Balasore)'),
(372, 12, 'Cuttack'),
(373, 12, 'Debagarh (Deogarh)'),
(374, 12, 'Dhenkanal'),
(375, 12, 'Ganjam'),
(376, 12, 'Gajapati'),
(377, 12, 'Jharsuguda'),
(378, 12, 'Jajapur (Jajpur)'),
(379, 12, 'Jagatsinghpur'),
(380, 12, 'Khordha'),
(381, 12, 'Kendujhar (Keonjhar)'),
(382, 12, 'Kalahandi'),
(383, 12, 'Kandhamal'),
(384, 12, 'Koraput'),
(385, 12, 'Kendrapara'),
(386, 12, 'Malkangiri'),
(387, 12, 'Mayurbhanj'),
(388, 12, 'Nabarangpur'),
(389, 12, 'Nayagarh'),
(390, 12, 'Nuapada'),
(391, 12, 'Puri'),
(392, 12, 'Rayagada'),
(393, 12, 'Sambalpur'),
(394, 12, 'Subarnapur (Sonepur)'),
(395, 12, 'Sundargarh (Sundergarh)'),
(397, 13, 'Bokaro'),
(398, 13, 'Chatra'),
(399, 13, 'Deoghar'),
(400, 13, 'Dhanbad'),
(401, 13, 'Dumka'),
(402, 13, 'Purba Singhbhum'),
(403, 13, 'Garhwa'),
(404, 13, 'Giridih'),
(405, 13, 'Godda'),
(406, 13, 'Gumla'),
(407, 13, 'Hazaribagh'),
(408, 13, 'Koderma'),
(409, 13, 'Lohardaga'),
(410, 13, 'Pakur'),
(411, 13, 'Palamu'),
(412, 13, 'Ranchi'),
(413, 13, 'Sahibganj'),
(414, 13, 'Pashchim Singhbhum'),
(415, 14, 'Barpeta'),
(416, 14, 'Bongaigaon'),
(417, 14, 'Cachar'),
(418, 14, 'Darrang'),
(419, 14, 'Dhemaji'),
(420, 14, 'Dhubri'),
(421, 14, 'Dibrugarh'),
(422, 14, 'Goalpara'),
(423, 14, 'Golaghat'),
(424, 14, 'Hailakandi'),
(425, 14, 'Jorhat'),
(426, 14, 'Karbi Anglong'),
(427, 14, 'Karimganj'),
(428, 14, 'Kokrajhar'),
(429, 14, 'Lakhimpur'),
(430, 14, 'Marigaon'),
(431, 14, 'Nagaon'),
(432, 14, 'Nalbari'),
(433, 14, 'North Cachar Hills'),
(434, 14, 'Sibsagar'),
(435, 14, 'Sonitpur'),
(436, 14, 'Tinsukia'),
(437, 15, 'Amritsar'),
(438, 15, 'Bathinda'),
(439, 15, 'Firozpur'),
(440, 15, 'Faridkot'),
(441, 15, 'Fatehgarh Sahib'),
(442, 15, 'Gurdaspur'),
(443, 15, 'Hoshiarpur'),
(444, 15, 'Jalandhar'),
(445, 15, 'Kapurthala'),
(446, 15, 'Ludhiana'),
(447, 15, 'Mansa'),
(448, 15, 'Moga'),
(449, 15, 'Mukatsar'),
(450, 15, 'Nawan Shehar'),
(451, 15, 'Patiala'),
(452, 15, 'Rupnagar'),
(453, 15, 'Sangrur'),
(454, 16, 'Ambala'),
(455, 16, 'Bhiwani'),
(456, 16, 'Faridabad'),
(457, 16, 'Fatehabad'),
(458, 16, 'Gurgaon'),
(459, 16, 'Hissar'),
(460, 16, 'Jhajjar'),
(461, 16, 'Jind'),
(462, 16, 'Karnal'),
(463, 16, 'Kaithal'),
(464, 16, 'Kurukshetra'),
(465, 16, 'Mahendragarh'),
(466, 16, 'Mewat'),
(467, 16, 'Panchkula'),
(468, 16, 'Panipat'),
(469, 16, 'Rewari'),
(470, 16, 'Rohtak'),
(471, 16, 'Sirsa'),
(472, 16, 'Sonepat'),
(473, 16, 'Yamuna Nagar'),
(474, 16, 'Palwal District'),
(475, 17, 'Bastar'),
(476, 17, 'Bilaspur'),
(477, 17, 'Dantewada'),
(478, 17, 'Dhamtari'),
(479, 17, 'Durg'),
(480, 17, 'Jashpur'),
(481, 17, 'Janjgir-Champa'),
(482, 17, 'Korba'),
(483, 17, 'Koriya'),
(484, 17, 'Kanker'),
(485, 17, 'Kawardha'),
(486, 17, 'Mahasamund'),
(487, 17, 'Raigarh'),
(488, 17, 'Rajnandgaon'),
(489, 17, 'Raipur'),
(490, 17, 'Surguja'),
(491, 18, 'Anantnag'),
(492, 18, 'Badgam'),
(493, 18, 'Bandipore'),
(494, 18, 'Baramula'),
(495, 18, 'Doda'),
(496, 18, 'Jammu'),
(497, 18, 'Kargil'),
(498, 18, 'Kathua'),
(499, 18, 'Kupwara'),
(500, 18, 'Leh'),
(501, 18, 'Poonch'),
(502, 18, 'Pulwama'),
(503, 18, 'Rajauri'),
(504, 18, 'Srinagar'),
(505, 18, 'Udhampur'),
(506, 19, 'Almora'),
(507, 19, 'Bageshwar'),
(508, 19, 'Chamoli'),
(509, 19, 'Champawat'),
(510, 19, 'Dehradun'),
(511, 19, 'Haridwar'),
(512, 19, 'Nainital'),
(513, 19, 'Pauri Garhwal'),
(514, 19, 'Pithoragharh'),
(515, 19, 'Rudraprayag'),
(516, 19, 'Tehri Garhwal'),
(517, 19, 'Udham Singh Nagar'),
(518, 19, 'Uttarkashi'),
(519, 20, 'Bilaspur'),
(520, 20, 'Chamba'),
(521, 20, 'Hamirpur'),
(522, 20, 'Kangra'),
(523, 20, 'Kinnaur'),
(524, 20, 'Kulu'),
(525, 20, 'Lahaul and Spiti'),
(526, 20, 'Mandi'),
(527, 20, 'Shimla'),
(528, 20, 'Sirmaur'),
(529, 20, 'Solan'),
(530, 20, 'Una'),
(531, 21, 'Dhalai'),
(532, 21, 'North Tripura'),
(533, 21, 'South Tripura'),
(534, 21, 'West Tripura'),
(535, 22, 'Bishnupur'),
(536, 22, 'Churachandpur'),
(537, 22, 'Chandel'),
(538, 22, 'Imphal East'),
(539, 22, 'Senapati'),
(540, 22, 'Tamenglong'),
(541, 22, 'Thoubal'),
(542, 22, 'Ukhrul'),
(543, 22, 'Imphal West'),
(544, 23, 'East Garo Hills'),
(545, 23, 'East Khasi Hills'),
(546, 23, 'Jaintia Hills'),
(547, 23, 'Ri-Bhoi'),
(548, 23, 'South Garo Hills'),
(549, 23, 'West Garo Hills'),
(550, 23, 'West Khasi Hills'),
(551, 24, 'Dimapur'),
(552, 24, 'Kohima'),
(553, 24, 'Mokokchung'),
(554, 24, 'Mon'),
(555, 24, 'Phek'),
(556, 24, 'Tuensang'),
(557, 24, 'Wokha'),
(558, 24, 'Zunheboto'),
(559, 25, 'North Goa'),
(560, 25, 'South Goa'),
(561, 26, 'Anjaw'),
(562, 26, 'Changlang'),
(563, 26, 'East Kameng'),
(564, 26, 'Lohit'),
(565, 26, 'Lower Subansiri'),
(566, 26, 'Papum Pare'),
(567, 26, 'Tirap'),
(568, 26, 'Dibang Valley'),
(569, 26, 'Upper Subansiri'),
(570, 26, 'West Kameng'),
(571, 27, 'Aizawl'),
(572, 27, 'Champhai'),
(573, 27, 'Kolasib'),
(574, 27, 'Lawngtlai'),
(575, 27, 'Lunglei'),
(576, 27, 'Mamit'),
(577, 27, 'Saiha'),
(578, 27, 'Serchhip'),
(579, 28, 'East Sikkim'),
(580, 28, 'North Sikkim'),
(581, 28, 'South Sikkim'),
(582, 28, 'West Sikkim'),
(583, 29, 'Central Delhi'),
(584, 29, 'East Delhi'),
(585, 29, 'New Delhi'),
(586, 29, 'North Delhi'),
(587, 29, 'North East Delhi'),
(588, 29, 'North West Delhi'),
(589, 29, 'South Delhi'),
(590, 29, 'South West Delhi'),
(591, 29, 'West Delhi'),
(592, 30, 'Karaikal'),
(593, 30, 'Mahe'),
(594, 30, 'Puducherry'),
(595, 30, 'Yanam'),
(596, 31, 'Chandigarh'),
(597, 32, 'Andaman and Nicobar Islands'),
(598, 33, 'Dadra and Nagar Haveli'),
(599, 34, 'Daman and Diu'),
(600, 35, 'Lakshadweep');";
$this->insertData($life_value,"Error on life dstrict value insert...212");
$life_location=$id."life_location";
$location="CREATE TABLE $life_location (
  `Location_Id` int(11) NOT NULL auto_increment,
  `Location_State_Ref_Id` int(11) NOT NULL default '0',
  `Location_District_Ref_Id` int(11) NOT NULL default '0',
  `Location_Name` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`Location_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=830 ;
";
$this->insertData($location);
$life_location=$id."life_location";
$location_value="INSERT INTO $life_location(`Location_Id`, `Location_State_Ref_Id`, `Location_District_Ref_Id`, `Location_Name`) VALUES
(4, 1, 1, 'Anad Edso'),
(5, 1, 1, 'Anayara'),
(6, 1, 1, 'Aralumoodu'),
(7, 1, 1, 'Aramada'),
(8, 1, 1, 'Attingal'),
(9, 1, 1, 'Avanavancherry'),
(10, 1, 1, 'Ayroor Varkala'),
(11, 1, 1, 'Balarampuram'),
(12, 1, 1, 'Bharathannu'),
(13, 1, 1, 'Chempazhanthi'),
(14, 1, 1, 'Cheeranikara'),
(15, 1, 1, 'Cheruuniyur'),
(16, 1, 1, 'Chittattumukku'),
(17, 1, 1, 'Dhanuvachapuram'),
(18, 1, 1, 'Kovalam'),
(19, 1, 1, 'chala'),
(20, 1, 1, 'pattanakkad'),
(21, 1, 1, 'Dalmugham'),
(22, 1, 1, 'Edava'),
(23, 1, 1, 'Industrial Estate Tvm'),
(24, 1, 1, 'Irinchayam'),
(25, 1, 1, 'Jawahar Nagar'),
(26, 1, 1, 'Kallambalam'),
(27, 1, 1, 'Kallara'),
(28, 1, 1, 'Kaniyapuram'),
(29, 1, 1, 'Kanjiramkulam'),
(30, 1, 1, 'Kanjirampara'),
(31, 1, 1, 'Karakonam'),
(32, 1, 1, 'Karakulam'),
(33, 1, 1, 'Karamana'),
(34, 1, 1, 'Kariyattam'),
(35, 1, 1, 'Kattachaikuzhi'),
(36, 1, 1, 'Kattakada'),
(37, 1, 1, 'Kaudiar'),
(38, 1, 1, 'Keezharur'),
(39, 1, 1, 'Killimanur'),
(40, 1, 1, 'Kizhuvalam'),
(41, 1, 1, 'Kodungannur'),
(42, 1, 1, 'Kolathur'),
(43, 1, 1, 'Kudappanamoodu'),
(44, 1, 1, 'Kudavoor'),
(45, 1, 1, 'Kunnukuzhi'),
(46, 1, 1, 'Kuvalassery'),
(47, 1, 1, 'Madavoor Pallickal'),
(48, 1, 1, 'Malakkal'),
(49, 1, 1, 'Manacaud'),
(50, 1, 1, 'Manambur'),
(51, 1, 1, 'Dalmugham'),
(52, 1, 1, 'Edava'),
(53, 1, 1, 'Industrial Estate Tvm'),
(54, 1, 1, 'Irinchayam'),
(55, 1, 1, 'Jawahar Nagar'),
(56, 1, 1, 'Kallambalam'),
(57, 1, 1, 'Kallara'),
(58, 1, 1, 'Kaniyapuram'),
(59, 1, 1, 'Kanjiramkulam'),
(60, 1, 1, 'Kanjirampara'),
(61, 1, 1, 'Karakonam'),
(62, 1, 1, 'Karakulam'),
(63, 1, 1, 'Karamana'),
(64, 1, 1, 'Kariyattam'),
(65, 1, 1, 'Kattachaikuzhi'),
(66, 1, 1, 'Kattakada'),
(67, 1, 1, 'Kaudiar'),
(68, 1, 1, 'Keezharur'),
(69, 1, 1, 'Killimanur'),
(70, 1, 1, 'Kizhuvalam'),
(71, 1, 1, 'Kodungannur'),
(72, 1, 1, 'Kolathur'),
(73, 1, 1, 'Kudappanamoodu'),
(74, 1, 1, 'Kudavoor'),
(75, 1, 1, 'Kunnukuzhi'),
(76, 1, 1, 'Kuvalassery'),
(77, 1, 1, 'Madavoor Pallickal'),
(78, 1, 1, 'Malakkal'),
(79, 1, 1, 'Manacaud'),
(80, 1, 1, 'Manambur'),
(81, 1, 1, 'Marayamuttom'),
(82, 1, 1, 'Mariyapuram'),
(83, 1, 1, 'Mithiramala'),
(84, 1, 1, 'Moongode'),
(85, 1, 1, 'Mudapuram'),
(86, 1, 1, 'Murukkumpuzha'),
(87, 1, 1, 'Nagaroor'),
(88, 1, 1, 'Nalanchira'),
(89, 1, 1, 'Nedumangad'),
(90, 1, 1, 'Nedunganda'),
(91, 1, 1, 'Nemom'),
(92, 1, 1, 'Neyyattinkara'),
(93, 1, 1, 'Ooruttambalam'),
(94, 1, 1, 'Ottasekharamangalam'),
(95, 1, 1, 'P.T.P. Nagar'),
(96, 1, 1, 'Pallipuram Tvm'),
(97, 1, 1, 'Panavoor'),
(98, 1, 1, 'Pangode'),
(99, 1, 1, 'Pappanamcode'),
(100, 1, 1, 'Parasala'),
(101, 1, 1, 'Pattom'),
(102, 1, 1, 'Pazhkutty'),
(103, 1, 1, 'Peringammala'),
(104, 1, 1, 'Perukada'),
(105, 1, 1, 'Perumkadavila'),
(106, 1, 1, 'Perumpazuthur'),
(107, 1, 1, 'Perunguzhi'),
(108, 1, 1, 'Peyad'),
(109, 1, 1, 'Plamoottukada'),
(110, 1, 1, 'Poojapura'),
(111, 1, 11, 'Poonthura'),
(112, 1, 1, 'Poovachal'),
(113, 1, 1, 'Pothencode'),
(114, 1, 1, 'Pozhiyur'),
(115, 1, 1, 'Pulimathu'),
(116, 1, 1, 'Puthenkurichy'),
(117, 1, 1, 'Puvar'),
(118, 1, 1, 'Sainik School'),
(119, 1, 1, 'Kazhakuttam'),
(120, 1, 1, 'Sasthamangalam'),
(121, 1, 1, 'Sreekariam'),
(122, 1, 1, 'Sreenivasapuram'),
(123, 1, 1, 'St. XavierCollege'),
(124, 1, 1, 'Thampanoor'),
(125, 1, 1, 'Thattathurmala'),
(126, 1, 1, 'Thiruvallam'),
(127, 1, 1, 'Tvm Engg'),
(128, 1, 1, 'Tvm ISRO'),
(129, 1, 1, 'Tvm M C'),
(130, 1, 1, 'Thuruvikkal'),
(131, 1, 1, 'Tirumala'),
(132, 1, 1, 'Tirupuram'),
(133, 1, 1, 'Titanium'),
(134, 1, 1, 'Uchakada'),
(135, 1, 1, 'Vadasserikikonam'),
(136, 1, 1, 'Vakkam'),
(137, 1, 1, 'Valiyamala'),
(138, 1, 1, 'Vamanapuram'),
(139, 1, 1, 'Vanchiyur'),
(140, 1, 1, 'Varkala'),
(141, 1, 1, 'Vattappara'),
(142, 1, 1, 'Vellanad'),
(143, 1, 1, 'Vembayam'),
(144, 1, 1, 'Venganur'),
(145, 1, 1, 'Venjaramoodu'),
(146, 1, 1, 'Vennicode'),
(147, 1, 1, 'Vettoor'),
(148, 1, 1, 'Vikas Bhawan'),
(149, 1, 1, 'Vithura'),
(150, 1, 1, 'Vizhinjam'),
(151, 1, 1, 'Idukki Colony'),
(152, 1, 1, 'Chempazhanthi'),
(153, 1, 1, 'Vizhinjam'),
(154, 1, 1, 'Valiyamala'),
(155, 1, 1, 'Kunnukuzhi'),
(156, 1, 1, 'Kattakada'),
(157, 1, 1, 'Malakkal'),
(158, 1, 1, 'Kaudiar'),
(159, 1, 1, 'Vadasserikikonam'),
(160, 1, 1, 'Ambalamukku'),
(161, 1, 2, 'Naluthara'),
(162, 1, 2, 'Aliyur'),
(163, 1, 2, 'Beypore'),
(165, 1, 2, 'Kozhikode Medical College'),
(166, 1, 2, 'Kozhikode Civil Station'),
(167, 1, 2, 'Kozhikode Medical College'),
(168, 1, 2, 'Chelakkad'),
(169, 1, 2, 'Cheruvannur'),
(170, 1, 2, 'Feroke'),
(171, 1, 2, 'Govindapuram'),
(172, 1, 2, 'Guruvayurappan College'),
(173, 1, 2, 'Kadalundi'),
(174, 1, 2, 'Karadipara'),
(175, 1, 2, 'Karuvannur'),
(176, 1, 2, 'Karuvanthuruthy'),
(177, 1, 2, 'Kozhikode'),
(178, 1, 2, 'Kumaranallur'),
(179, 1, 2, 'Kuruvangad'),
(180, 1, 2, 'Madappally College'),
(181, 1, 2, 'Mahe'),
(182, 1, 2, 'Mannur'),
(183, 1, 2, 'Mavoor'),
(184, 1, 2, 'Mokkam'),
(185, 1, 2, 'Naluthara'),
(186, 1, 2, 'Nellicode'),
(187, 1, 2, 'New Mahe'),
(188, 1, 2, 'Olavanna'),
(189, 1, 2, 'Omasseri'),
(190, 1, 2, 'Palath'),
(191, 1, 2, 'Palayadnada'),
(192, 1, 2, 'Paleri Town'),
(193, 1, 2, 'Pantheeramkavu'),
(194, 1, 2, 'Parakkadavu'),
(195, 1, 2, 'Perampra'),
(196, 1, 2, 'Ponmeri'),
(197, 1, 2, 'Purakad'),
(198, 1, 2, 'Ramanattukara'),
(199, 1, 2, 'Quilandy'),
(200, 1, 2, 'Santhinagar'),
(201, 1, 2, 'Tamaracherry'),
(202, 1, 2, 'Tiruvangoor'),
(203, 1, 2, 'Unnikulam'),
(204, 1, 2, 'Vadakara'),
(205, 1, 2, 'Vazhayur'),
(206, 1, 2, 'Villiappally'),
(207, 1, 2, 'West Hill'),
(208, 1, 2, 'Palayadnada'),
(209, 1, 2, 'Kuruvangad'),
(210, 1, 2, 'NIT Calicut'),
(211, 1, 3, 'Alathiyur'),
(212, 1, 3, 'Areacode'),
(213, 1, 3, 'Ayirur'),
(214, 1, 3, 'Edavanna'),
(215, 1, 3, 'Kadampuzha'),
(216, 1, 3, 'Kannamangalam'),
(217, 1, 3, 'Karekad'),
(218, 1, 3, 'Karippur Air Port'),
(219, 1, 3, 'Kondotti'),
(220, 1, 3, 'Kuttipuram'),
(221, 1, 3, 'Mampad'),
(222, 1, 3, 'Manjeri'),
(223, 1, 3, 'Manjeri College'),
(224, 1, 3, 'Malappuram'),
(225, 1, 3, 'Nilambur'),
(226, 1, 3, 'Olukkur'),
(227, 1, 3, 'Pazhur'),
(228, 1, 3, 'Parappanangadi'),
(229, 1, 3, 'Perinthalmanna'),
(230, 1, 3, 'Ponani'),
(231, 1, 3, 'Porur'),
(232, 1, 3, 'Pullikanam'),
(233, 1, 3, 'Randathani'),
(234, 1, 3, 'Sugapuram'),
(235, 1, 3, 'Tanur Malabar'),
(236, 1, 3, 'Tirur'),
(237, 1, 3, 'Vellur'),
(238, 1, 3, 'Vengoor'),
(239, 1, 3, 'Vettilapara'),
(240, 1, 3, 'Parappanangadi'),
(242, 1, 3, 'Vattamkulam'),
(243, 1, 3, 'Edappal'),
(244, 1, 3, 'kolathur'),
(245, 1, 3, 'pulamanthol'),
(246, 1, 3, 'TN puram'),
(247, 1, 3, 'Melatoor'),
(248, 1, 3, 'Keezhatoor'),
(249, 1, 3, 'Ucharakadavu'),
(250, 1, 3, 'MEA Engg College'),
(251, 1, 4, 'Kadakkal'),
(252, 1, 4, 'Karunagappalli'),
(253, 1, 4, 'Kottarakkara'),
(254, 1, 4, 'Ambalakara'),
(255, 1, 4, 'Anchal'),
(256, 1, 4, 'Chadayamangalam'),
(257, 1, 4, 'Pravur'),
(258, 1, 4, 'Kundara'),
(259, 1, 4, 'Kollam'),
(260, 1, 4, 'Chavar'),
(261, 1, 4, 'Punalur'),
(262, 1, 4, 'Sasthamkotta'),
(263, 1, 4, 'Ashtamudi'),
(264, 1, 4, 'Mavelikara'),
(265, 1, 4, 'Neendakara'),
(266, 1, 4, 'Karunagappalli'),
(268, 1, 5, 'Konni'),
(269, 1, 5, 'Angadi'),
(270, 1, 5, 'Arattupuzha'),
(271, 1, 5, 'Chengaroor'),
(272, 1, 5, 'Chellakad'),
(273, 1, 5, 'Kottanad'),
(274, 1, 5, 'Kumbanad'),
(275, 1, 5, 'Kuttapuzha'),
(276, 1, 5, 'Mallapally'),
(277, 1, 5, 'Maloor'),
(278, 1, 5, 'Manjappara'),
(279, 1, 5, 'Mylapra'),
(280, 1, 5, 'Omallur'),
(281, 1, 5, 'Pandalam'),
(282, 1, 5, 'Pathanamthitta'),
(283, 1, 5, 'Pathanapuram'),
(284, 1, 5, 'Ranny'),
(285, 1, 5, 'Sabarimala'),
(286, 1, 5, 'Thengumkavu'),
(287, 1, 5, 'Tiruvalla'),
(288, 1, 5, 'Ulanad'),
(289, 1, 5, 'Vaipur'),
(290, 1, 5, 'Vazhamuttom'),
(291, 1, 5, 'Velliyara'),
(292, 1, 5, 'Vennikulam'),
(293, 1, 5, 'Adoor'),
(295, 1, 6, 'Ambalappuzha'),
(296, 1, 6, 'Arookutty'),
(297, 1, 6, 'Aroor'),
(298, 1, 6, 'Chengannur'),
(299, 1, 6, 'Cherthala'),
(300, 1, 6, 'Kayamkulam'),
(301, 1, 6, 'Kokkothamangalam'),
(302, 1, 6, 'Mavelikkara'),
(303, 1, 6, 'Muhamma'),
(304, 1, 6, 'Iramallur'),
(305, 1, 6, 'Edathua'),
(306, 1, 6, 'Mavelikara'),
(307, 1, 6, 'Bhudhanoor'),
(308, 1, 6, 'Kayamkulam'),
(309, 1, 6, 'Aroor'),
(310, 1, 6, 'Haripad'),
(311, 1, 6, 'Thannermukkom'),
(312, 1, 6, 'Muhamma'),
(313, 1, 7, 'Athirampuzha'),
(314, 1, 7, 'Bharanaganam'),
(315, 1, 7, 'Chakampuzha'),
(316, 1, 7, 'Changanassery'),
(317, 1, 7, 'Devagiri'),
(318, 1, 7, 'Devalokom'),
(319, 1, 7, 'Ettumanoor'),
(320, 1, 7, 'Erattupetta'),
(321, 1, 7, 'Erumeli'),
(322, 1, 7, 'Gandhi Nagar Kottayam'),
(323, 1, 7, 'Irumpayam'),
(324, 1, 7, 'Kadapattoor'),
(325, 1, 7, 'Kaduthuruthy'),
(326, 1, 7, 'Kanjirapally'),
(327, 1, 7, 'Karikkattur'),
(328, 1, 7, 'Karikode'),
(329, 1, 7, 'Kidangoor'),
(330, 1, 7, 'Kottayam'),
(331, 1, 7, 'Kottayam Collectorate'),
(332, 1, 7, 'Kudamaloor'),
(333, 1, 7, 'Kumaranallur'),
(334, 1, 7, 'Kuravilangad'),
(335, 1, 7, 'Madappally'),
(336, 1, 7, 'Manimala'),
(337, 1, 7, 'Mariapally'),
(338, 1, 7, 'Mevalloor'),
(339, 1, 7, 'Mundakayam'),
(340, 1, 7, 'Nadackal'),
(341, 1, 7, 'Nedumkunnam'),
(342, 1, 7, 'Neendoor'),
(343, 1, 7, 'Paduva'),
(344, 1, 7, 'Pallom'),
(345, 1, 7, 'Pampady'),
(346, 1, 7, 'Parampuzha'),
(347, 1, 7, 'Peruva'),
(348, 1, 7, 'Ponkunnam'),
(349, 1, 7, 'Puthupally'),
(350, 1, 7, 'Ramapuram'),
(351, 1, 7, 'Ruby Nagar'),
(352, 1, 7, 'Santhipuram'),
(353, 1, 7, 'Sreekantamangalam'),
(354, 1, 7, 'Thalayolapparambu'),
(355, 1, 7, 'Vadakara'),
(356, 1, 7, 'Vaikom'),
(357, 1, 7, 'Vakathanam'),
(358, 1, 7, 'Vechoor'),
(359, 1, 7, 'Velloor'),
(360, 1, 7, 'Athirampuzha'),
(361, 1, 7, 'Madappally'),
(362, 1, 7, 'Mundakayam'),
(363, 1, 7, 'Manimala'),
(364, 1, 7, 'Pala'),
(365, 1, 7, 'Velloor'),
(366, 1, 7, 'Nedumkunnam'),
(367, 1, 7, 'Kaduthuruthy'),
(368, 1, 7, 'Karikode'),
(369, 1, 7, 'Puthupally'),
(370, 1, 7, 'Peruva'),
(371, 1, 8, 'Adimaly'),
(372, 1, 8, 'Elappara'),
(373, 1, 8, 'Kumily'),
(374, 1, 8, 'Munnar'),
(375, 1, 8, 'Neryamangalam'),
(376, 1, 8, 'Peermade'),
(377, 1, 8, 'Rajakkad'),
(378, 1, 8, 'Panniar'),
(379, 1, 8, 'Thekkadi'),
(380, 1, 8, 'Thodupuzha'),
(381, 1, 8, 'Udumbanshola'),
(382, 1, 8, 'Kanjikuzhi - Idukki'),
(383, 1, 8, 'Kanjikuzhi'),
(384, 1, 8, 'Bison Valley'),
(385, 1, 8, 'Vellathooval'),
(386, 1, 8, 'Bison'),
(387, 1, 9, 'Ayyampilly'),
(388, 1, 9, 'EKM-North'),
(389, 1, 9, 'Cherai'),
(390, 1, 9, 'Edathala'),
(391, 1, 9, 'Aluva'),
(392, 1, 9, 'Angamaly'),
(393, 1, 9, 'Chendamangalam'),
(394, 1, 9, 'Chengamanad'),
(395, 1, 9, 'Cheranallur'),
(396, 1, 9, 'Choornikkara'),
(397, 1, 9, 'Chowwara'),
(398, 1, 9, 'Eloor'),
(399, 1, 9, 'Kadamakkudy'),
(400, 1, 9, 'Kalamassery'),
(401, 1, 9, 'Kochi'),
(402, 1, 9, 'Kothamangalam'),
(403, 1, 9, 'Kottuvally'),
(404, 1, 9, 'Kureekkad'),
(405, 1, 9, 'Maradu'),
(406, 1, 9, 'ulavukad'),
(407, 1, 9, 'Muvattupuzha'),
(408, 1, 9, 'North Paravur'),
(409, 1, 9, 'Perumbavoor'),
(410, 1, 9, 'Thiruvankulam'),
(411, 1, 9, 'Thrippunithura'),
(412, 1, 9, 'Varappuzha'),
(413, 1, 9, 'Vazhakkala'),
(414, 1, 9, 'South Paravur'),
(415, 1, 9, 'Kolencherry'),
(416, 1, 9, 'Poothotta'),
(417, 1, 9, 'Kadavanthara'),
(418, 1, 9, 'Ravipuram'),
(419, 1, 9, 'Vallachira'),
(420, 1, 9, 'Narakkal'),
(421, 1, 9, 'Neriamangalam'),
(422, 1, 9, 'Kanjiramatoom'),
(423, 1, 9, 'Vythila'),
(424, 1, 9, 'Palluruthy'),
(425, 1, 9, 'Pachalam'),
(426, 1, 9, 'Kakkanad'),
(427, 1, 9, 'Edapally'),
(428, 1, 9, 'M.G.Road'),
(429, 1, 9, 'Puthencurz'),
(430, 1, 9, 'Edapally'),
(431, 1, 9, 'Mulanthuruthy'),
(432, 1, 9, 'Koothattukulam'),
(433, 1, 9, 'Kaloor'),
(434, 1, 9, 'Kumbalanghi'),
(435, 1, 9, 'Palarivattom'),
(436, 1, 9, 'EKM-North'),
(437, 1, 9, 'Alangad'),
(438, 1, 9, 'Panagad'),
(439, 1, 9, 'Varapuzha'),
(440, 1, 9, 'Puthenvelikara'),
(441, 1, 9, 'Kalady'),
(442, 1, 9, 'Thevara'),
(443, 1, 9, 'High Court'),
(444, 1, 9, 'Piravom'),
(445, 1, 9, 'High Court'),
(446, 1, 9, 'Mattancheri'),
(447, 1, 10, 'Mambra'),
(448, 1, 10, 'Brahmakulam'),
(449, 1, 10, 'Akathiyoor'),
(450, 1, 10, 'Kodungallur'),
(451, 1, 10, 'Chalakudi'),
(452, 1, 10, 'Chavakkad'),
(453, 1, 10, 'Chevoor'),
(454, 1, 10, 'Guruvayur'),
(455, 1, 10, 'Iringapuram'),
(456, 1, 10, 'Irinjalakuda'),
(457, 1, 10, 'Kolazhi'),
(458, 1, 10, 'Koratti'),
(459, 1, 10, 'Kunnamkulam'),
(460, 1, 10, 'Marathakara'),
(461, 1, 10, 'Methala'),
(462, 1, 10, 'Nadathara'),
(463, 1, 10, 'Nemminikara'),
(464, 1, 10, 'Ollur'),
(465, 1, 10, 'Palisseri'),
(466, 1, 10, 'Paluvai'),
(467, 1, 10, 'Parvarattil'),
(468, 1, 10, 'Perakom'),
(469, 1, 10, 'Pottore'),
(470, 1, 10, 'Puranattukara'),
(471, 1, 10, 'Puthukkad'),
(472, 1, 10, 'Thaikkad'),
(473, 1, 10, 'Thrissur'),
(474, 1, 10, 'Vellanchira'),
(475, 1, 10, 'Vemmanad'),
(476, 1, 10, 'Mala Thrisur'),
(477, 1, 10, 'Ripayar'),
(478, 1, 10, 'Avanur'),
(479, 1, 10, 'Tripayar'),
(480, 1, 10, 'Thalassery'),
(481, 1, 10, 'Cheruthuruthy'),
(482, 1, 10, 'Desamangalam'),
(483, 1, 10, 'Wadakkanchery'),
(484, 1, 10, 'Ottupara'),
(485, 1, 10, 'Thali'),
(486, 1, 10, 'Varavoor'),
(487, 1, 11, 'Ambalavattom'),
(488, 1, 11, 'Anakkara'),
(489, 1, 11, 'Athaloor'),
(490, 1, 11, 'Bhimanad'),
(491, 1, 11, 'Arangottukara'),
(492, 1, 11, 'Chalavara'),
(493, 1, 11, 'Chathannur'),
(494, 1, 11, 'Alathur'),
(495, 1, 11, 'Akalur'),
(496, 1, 11, 'Chembra'),
(497, 1, 11, 'Chennangad'),
(498, 1, 11, 'Cherukulam'),
(499, 1, 11, 'Chittur College'),
(500, 1, 11, 'Chittur'),
(501, 1, 11, 'Dhoni'),
(502, 1, 11, 'Edapalam'),
(503, 1, 11, 'Enkakad'),
(504, 1, 11, 'Erattukulam'),
(505, 1, 11, 'Ganeshgiri'),
(506, 1, 11, 'Govindapuram'),
(507, 1, 11, 'Iswaramangalam'),
(508, 1, 11, 'Jellipara'),
(509, 1, 11, 'Kacheriparambu'),
(510, 1, 11, 'Kadambur'),
(511, 1, 11, 'Kalladikode'),
(512, 1, 11, 'Kandamangalam'),
(513, 1, 11, 'Kanhirapuzha'),
(514, 1, 11, 'Kanjikode'),
(515, 1, 11, 'Kanniyampuram'),
(516, 1, 11, 'Karalmanna'),
(517, 1, 11, 'Karara'),
(518, 1, 11, 'Kariyancode'),
(519, 1, 11, 'Kavalapara'),
(520, 1, 11, 'Killimangalam'),
(521, 1, 11, 'Kollengode'),
(522, 1, 11, 'Kotambu'),
(523, 1, 11, 'Kottoppadam'),
(524, 1, 11, 'Kozhinjampara'),
(525, 1, 11, 'Kumaranallur'),
(526, 1, 11, 'Kunisseri'),
(527, 1, 11, 'Lakkidi'),
(528, 1, 11, 'Mala Palaghat'),
(529, 1, 11, 'Malampuzha Dam'),
(530, 1, 11, 'Malmakavu'),
(531, 1, 11, 'Mangode'),
(532, 1, 11, 'Mannarkad College'),
(533, 1, 11, 'Mannur'),
(534, 1, 11, 'Mattom'),
(535, 1, 11, 'Naduvathupara'),
(536, 1, 11, 'Nemmara'),
(537, 1, 11, 'Nemmara College'),
(538, 1, 11, 'Nenmen'),
(539, 1, 11, 'Olasseri'),
(540, 1, 11, 'Ottappalam'),
(541, 1, 11, 'Palakkad'),
(542, 1, 11, 'Palakkad City'),
(543, 1, 11, 'Palakkad Engg.college'),
(544, 1, 11, 'Pallavur'),
(545, 1, 11, 'Pampady'),
(546, 1, 11, 'Parambikulam'),
(547, 1, 11, 'Pattambi'),
(548, 1, 11, 'Peruvamba'),
(549, 1, 11, 'Ramasseri'),
(550, 1, 11, 'Pudunagaram'),
(551, 1, 11, 'Sankaramangalam'),
(552, 1, 11, 'Sholayur-palakkad'),
(553, 1, 11, 'Shoranur Govt.press'),
(554, 1, 11, 'Shoranur'),
(555, 1, 11, 'Srikrishnapuram'),
(556, 1, 11, 'Tattamangalam'),
(557, 1, 11, 'Thiruvalathur'),
(558, 1, 11, 'Thiruvilwamala'),
(559, 1, 11, 'Tiruvalamkunnu'),
(560, 1, 11, 'Ummanazhi'),
(561, 1, 11, 'Vadakethara'),
(562, 1, 11, 'Vadassery'),
(563, 1, 11, 'Vallapuzha'),
(564, 1, 11, 'Velur Bazar'),
(565, 1, 11, 'Walayar Dam'),
(566, 1, 11, 'Shoranur'),
(567, 1, 11, 'Kariyancode'),
(568, 1, 11, 'Kalladikode'),
(569, 1, 11, 'Pallavur'),
(570, 1, 11, 'Alathur'),
(571, 1, 11, 'Malampuzha'),
(572, 1, 11, 'Thrithala'),
(573, 1, 11, 'Koottanad'),
(574, 1, 11, 'Mezhathur'),
(575, 1, 11, 'Pattithara'),
(576, 1, 11, 'Ongallur'),
(577, 1, 12, 'Ancharakandy'),
(578, 1, 12, 'Azhikode North'),
(579, 1, 12, 'Azhikode South'),
(580, 1, 12, 'Chala'),
(581, 1, 12, 'Chelora'),
(582, 1, 12, 'Cheruthazham'),
(583, 1, 12, 'Chirakkal'),
(584, 1, 12, 'Chockli'),
(585, 1, 12, 'Dharmadom'),
(586, 1, 12, 'Elayavoor'),
(587, 1, 12, 'Eranholi'),
(588, 1, 12, 'Iriveri'),
(589, 1, 12, 'Kadachira'),
(590, 1, 12, 'Kadirur'),
(591, 1, 12, 'Kalliasseri'),
(592, 1, 12, 'Kanhirode'),
(593, 1, 12, 'Kannadiparamba'),
(594, 1, 12, 'Kannapuram'),
(595, 1, 12, 'Kannur'),
(596, 1, 12, 'Kannur Cantonment'),
(597, 1, 12, 'Koothuparamba'),
(598, 1, 12, 'Kottayam-Malabar'),
(599, 1, 12, 'Mattannur'),
(600, 1, 12, 'Mavilayi'),
(601, 1, 12, 'Munderi'),
(602, 1, 12, 'Muzhappilangad'),
(603, 1, 12, 'Narath'),
(604, 1, 12, 'New Mahe'),
(605, 1, 12, 'Paduvilayi'),
(606, 1, 12, 'Pallikkunnu'),
(607, 1, 12, 'Panniyannur'),
(608, 1, 12, 'Panoor'),
(609, 1, 12, 'Pappinisseri'),
(610, 1, 12, 'Pathiriyad'),
(611, 1, 12, 'Pattiom'),
(612, 1, 12, 'Payyannur'),
(613, 1, 12, 'Peralasseri'),
(614, 1, 12, 'Peringathur'),
(615, 1, 12, 'Pinarayi'),
(616, 1, 12, 'Puzhathi'),
(617, 1, 12, 'Taliparamba'),
(618, 1, 12, 'Thalassery'),
(619, 1, 12, 'Thottada'),
(620, 1, 12, 'Valapattanam'),
(621, 1, 12, 'Varam'),
(622, 1, 12, 'Taliparamba'),
(623, 1, 12, 'Thalassery'),
(624, 1, 12, 'Valapattanam'),
(625, 1, 12, 'Koothuparamba'),
(626, 1, 12, 'Iriveri'),
(627, 1, 13, 'Adur'),
(628, 1, 13, 'Bekal'),
(629, 1, 13, 'Chandragiri'),
(630, 1, 13, 'Haripuram'),
(631, 1, 13, 'Kanhangad'),
(632, 1, 13, 'Kasaragod'),
(633, 1, 14, 'Anjukunnu'),
(634, 1, 14, 'Bavali'),
(635, 1, 14, 'Bibleland'),
(636, 1, 14, 'Chembra'),
(637, 1, 14, 'Cottanad'),
(638, 1, 14, 'Edavaka'),
(639, 1, 14, 'Kallurutty'),
(640, 1, 14, 'Kalpetta'),
(641, 1, 14, 'Kunnamangalam'),
(642, 1, 14, 'Lakkidi'),
(643, 1, 14, 'Mananthavady'),
(644, 1, 14, 'Nenmeni'),
(645, 1, 14, 'Poomulla'),
(646, 1, 14, 'Pulpalli'),
(647, 1, 14, 'Sultans Bathery'),
(648, 1, 14, 'Tholpetty'),
(649, 1, 14, 'Tiruvambadi'),
(650, 1, 14, 'Vythiri'),
(651, 1, 14, 'Kallurutty'),
(652, 1, 14, 'koodathai'),
(653, 1, 10, 'Mannuthy'),
(654, 1, 10, 'Amala'),
(656, 1, 3, 'Vaniyambalam'),
(657, 1, 11, 'Kootupatha'),
(660, 1, 10, 'Mudikkode'),
(661, 1, 3, 'Wandoor'),
(663, 1, 12, 'Puthiyangadi'),
(664, 1, 10, 'Anthikkad'),
(665, 6, 186, 'Hyderabad'),
(666, 10, 317, 'Sarjapur Main Road'),
(667, 10, 318, 'Bommanhalli'),
(668, 10, 318, 'madivala'),
(669, 1, 8, 'kattappana'),
(670, 7, 214, 'Madurai'),
(671, 11, 341, 'Vastrapur'),
(672, 7, 206, 'Town Hall'),
(673, 7, 221, 'HOME'),
(674, 3, 92, 'Navi Mumbai'),
(675, 10, 318, 'udaynagar'),
(676, 29, 584, 'Dilshad Colony'),
(677, 7, 205, 'T.nagar'),
(678, 7, 232, 'katpadi'),
(679, 6, 191, 'ADONI'),
(680, 10, 318, 'DOMLUR'),
(681, 6, 188, 'manthani'),
(682, 10, 318, 'Rajajinagar'),
(683, 6, 195, 'Nellore'),
(684, 1, 3, 'Saudi Arabia'),
(685, 7, 205, 'Besant Nagar'),
(686, 7, 226, 'Kumbakonam'),
(687, 7, 205, 'Adyar'),
(688, 7, 211, 'THIRUVANMIYUR'),
(689, 7, 224, 'sriviliputhur'),
(690, 7, 205, 'Padi'),
(691, 7, 205, 'Ambattur'),
(692, 1, 337, 'kalamassery'),
(693, 1, 1, 'Vazhutakad'),
(694, 7, 205, 'Nungambakkam'),
(695, 10, 318, 'B.T.M 2nd Stage'),
(696, 10, 318, 'Bohmmanahalli'),
(697, 10, 318, 'HAL'),
(698, 10, 317, 'Bommanahalli.'),
(699, 1, 9, 'Panampilly Nagar'),
(700, 1, 10, 'Engandiyur'),
(701, 1, 1, 'Nettayam'),
(702, 1, 10, 'KOTTUPURAM - VARAVOOR'),
(703, 1, 13, 'padana'),
(704, 1, 1, 'Eanchakkal'),
(705, 10, 318, 'Koramangala'),
(706, 10, 318, 'Lingarajpuram'),
(707, 6, 198, 'hyderabad'),
(708, 4, 155, 'fghfghfgh'),
(709, 1, 1, 'east fort'),
(710, 1, 10, 'Alagappanagar(Vendore)'),
(711, 7, 206, 'Saibaba colony'),
(712, 10, 318, 'Ejipura'),
(713, 11, 363, 'Ring Road'),
(714, 10, 318, 'Banashankari'),
(715, 3, 94, 'Baner'),
(716, 10, 317, 'Banaswadi'),
(717, 7, 219, 'Ramachandra puram (Post)'),
(718, 10, 318, 'Vijayanagar'),
(719, 10, 318, 'Mahadeva puram'),
(720, 3, 103, 'New Panvel'),
(721, 7, 206, 'karumathampatti'),
(722, 1, 9, 'Palachuvad'),
(723, 7, 206, 'Nanjundapuram road'),
(724, 1, 9, 'Trivandrum'),
(725, 1, 239, 'Calicut'),
(726, 6, 186, 'Secunderabad'),
(727, 10, 318, 'J P Nagar'),
(728, 7, 208, 'Chennai, Dharmapuri'),
(729, 3, 94, 'Hadapsar'),
(730, 2, 43, 'Noida'),
(731, 10, 317, 'Electronics City'),
(732, 7, 205, 'Thoraipakam'),
(733, 7, 206, 'Ramanathapuram'),
(734, 29, 589, 'Madangir'),
(735, 31, 596, 'chandigarh'),
(736, 7, 217, 'SOLASIRAMANI'),
(737, 10, 317, 'Mahadevpura'),
(738, 10, 318, 'RT Nagar'),
(739, 1, 6, 'Arunnoottimangalam'),
(740, 6, 190, 'Kosuru'),
(741, 7, 205, 'Choolaimedu'),
(742, 3, 103, 'Kharghar'),
(743, 3, 122, 'Ambarnath'),
(744, 10, 317, 'Marathalli'),
(745, 8, 250, 'Indore'),
(746, 29, 589, 'Malviya nagar'),
(747, 10, 317, 'JJR Nagar'),
(748, 10, 317, 'B.T.M LAYOUT'),
(749, 12, 368, 'samaraipur'),
(750, 7, 533, 'Nagercoil'),
(751, 2, 47, 'Indirapuram'),
(752, 11, 345, 'bharuch'),
(753, 7, 206, 'periyanaikenpalayam'),
(754, 10, 317, 'indira nagar'),
(755, 7, 232, 'Arcot'),
(756, 6, 198, 'shabad'),
(757, 10, 317, 'Whitefield'),
(758, 7, 205, 'Ramapuram'),
(759, 6, 200, 'Pedawaltaire'),
(760, 7, 205, 'Aminjikarai'),
(761, 29, 584, 'Mayur Vihar'),
(762, 7, 205, 'Triplicane'),
(763, 7, 205, 'Velachery'),
(764, 7, 205, 'Kodambakkam'),
(765, 29, 585, 'Inderpuri'),
(766, 6, 183, 'Madanapalle'),
(767, 10, 318, 'BAGALAGUNTE'),
(768, 6, 186, 'madhapur'),
(769, 3, 115, 'navi mumbai'),
(770, 7, 205, 'Ayyappanthangal'),
(771, 16, 458, 'DLF Phase 2'),
(772, 32, 597, 'Andaman'),
(773, 30, 594, 'KALAPET'),
(774, 1, 2, 'Ulliyeri'),
(775, 10, 318, 'nelamangla'),
(776, 10, 317, 'Bangalore'),
(777, 7, 205, 'porur'),
(778, 7, 210, 'Kavindapadi'),
(779, 10, 317, 'Leggere'),
(780, 6, 194, 'siddipet'),
(781, 7, 205, 'Perambur'),
(782, 12, 377, 'Adarsh colony'),
(783, 1, 1, 'SHANGUMUGAM'),
(784, 16, 456, 'sec 45'),
(785, 7, 205, 'Ashok Nagar'),
(786, 6, 185, 'Guntur'),
(787, 6, 202, 'cherial'),
(788, 7, 211, 'Meenambakkam'),
(789, 10, 314, 'Adarsh nagar'),
(790, 3, 94, 'Pashan'),
(791, 11, 341, 'Memnagar'),
(792, 3, 122, 'Dahanu'),
(793, 6, 186, 'SOMAJIGUDA'),
(794, 12, 380, 'Bhubaneswar'),
(795, 7, 205, 'Anna Nagar'),
(796, 6, 190, 'mylavaram'),
(797, 1, 2, 'engapuzha'),
(798, 10, 318, 'Thippasandra'),
(799, 10, 318, 'Hennur Bande'),
(800, 10, 333, 'Kuvempunagar'),
(801, 7, 230, 'COIMBATORE'),
(802, 6, 186, 'PUNJAGUTTA'),
(803, 7, 205, 'Nesapakkam'),
(804, 6, 186, 'Dilsukhnagar'),
(805, 6, 597, 'Others'),
(806, 10, 318, 'Marathahalli'),
(807, 6, 187, 'rayachoti'),
(808, 1, 10, 'Kuttur'),
(809, 7, 205, 'Old Washermenpet'),
(810, 7, 210, 'Erode-town'),
(811, 7, 223, 'tvs tollgate'),
(812, 2, 57, 'Near Hanuman Mandir'),
(813, 10, 318, 'Sanjay Nagar'),
(814, 7, 205, 'villivakkam'),
(815, 10, 317, 'Koramangala'),
(816, 30, 594, 'Lawspet'),
(817, 7, 206, 'Puliyakulam'),
(818, 7, 207, 'chidambaram'),
(819, 10, 318, 'Jayanagar 9th block'),
(820, 1, 12, 'puthiyangadi'),
(821, 1, 13, 'MULLERIA'),
(822, 1, 12, 'vadakkumbad'),
(823, 1, 6, 'Nooranad'),
(824, 9, 298, 'Jaipur'),
(825, 1, 2, 'Palazhi'),
(826, 3, 94, 'SINHAGAD ROAD'),
(827, 7, 214, 'Tirumangalam'),
(828, 3, 92, 'bhandup'),
(829, 7, 227, 'kayalpatnam.');
";
$this->insertData($location_value);
$life_state=$id."life_state";
$state="CREATE TABLE $life_state (
  `State_Id` int(11) NOT NULL auto_increment,
  `State_Name` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`State_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;
";
$this->insertData($state);
$life_state=$id."life_state";
$state_value="
INSERT INTO $life_state (`State_Id`, `State_Name`) VALUES
(1, 'Kerala'),
(2, 'Uttar Pradesh'),
(3, 'Maharashtra'),
(4, 'Bihar'),
(5, 'West Bengal'),
(6, 'Andhra Pradesh'),
(7, 'Tamil Nadu'),
(8, 'Madhya Pradesh'),
(9, 'Rajasthan'),
(10, 'Karnataka'),
(11, 'Gujarat'),
(12, 'Orissa'),
(13, 'Jharkhand'),
(14, 'Assam'),
(15, 'Punjab'),
(16, 'Haryana'),
(17, 'Chhattisgarh'),
(18, 'Jammu and Kashmir'),
(19, 'Uttarakhand'),
(20, 'Himachal Pradesh'),
(21, 'Tripura'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Nagaland'),
(25, 'Goa'),
(26, 'Arunachal Pradesh'),
(27, 'Mizoram'),
(28, 'Sikkim'),
(29, 'National Capital Territory of Delhi'),
(30, 'Puducherry'),
(31, 'Chandigarh'),
(32, 'Andaman and Nicobar Islands'),
(33, 'Dadra and Nagar Haveli'),
(34, 'Daman and Diu'),
(35, 'Lakshadweep');";


$this->insertData($state_value);
    }
}