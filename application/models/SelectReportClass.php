<?php
require_once 'validation.php';
require_once 'Settings.php';

class  SelectReportClass extends Inf_Model
{
 
   public $obj_val;
   public $obj_settings;

   public $all_payout_details; 
   public $member_payout_details;

   public function __construct()
    {
		   $this->obj_settings=new Settings();
		   
           $this->obj_val = new Validation();
    }
 

    public function getTotalPayout($from_date='',$to_date='')
    {
       require_once 'LegClass.php';
        $obj_leg = new LegClass();
        if($from_date == '' AND $to_date == '')
        {
		if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
		 $leg_amount=$this->table_prefix."leg_amount";
            $select = "SELECT SUM(total_leg) AS total_leg,
                            SUM(total_amount) AS total_amount,
                            SUM(amount_payable) AS amount_payable,
                            SUM(tds) AS tds,
                            SUM(service_charge) AS service_charge,
							SUM(leg_amount_carry) AS leg_amount_carry,
                            user_id
                    FROM $leg_amount
                    GROUP BY user_id";
        }
        else
        {
		if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
		 $leg_amount=$this->table_prefix."leg_amount";
        $select = "SELECT SUM(total_leg) AS total_leg,
                            SUM(total_amount) AS total_amount,
                            SUM(amount_payable) AS amount_payable,
                            SUM(tds) AS tds,
                            SUM(service_charge) AS service_charge,
							SUM(leg_amount_carry) AS leg_amount_carry,
                            user_id
                    FROM $leg_amount
                    WHERE date_of_submission BETWEEN '$from_date' AND '$to_date'
                    GROUP BY user_id";
        }
        //echo $select;
        $result = $this->selectData($select,"Error on selecting leg amount ..");
        
        $i = 0;
        while($row = mysql_fetch_array($result))
            {
			
			
                $this->all_payout_details["detail$i"]["user_id"] = $row['user_id'];
		$this->all_payout_details["detail$i"]["full_name"] =$this->obj_val->getFullName($row['user_id']);
                $this->all_payout_details["detail$i"]["user_name"] = $this->obj_val->IdToUserName($row['user_id']);
                $this->all_payout_details["detail$i"]["left_leg"] = $obj_leg->getLeftLegCount($row['user_id']);
                $this->all_payout_details["detail$i"]["right_leg"] = $obj_leg->getRightLegCount($row['user_id']);
                $this->all_payout_details["detail$i"]["total_leg"] = $row['total_leg'];
                $this->all_payout_details["detail$i"]["total_amount"] = $row['total_amount'] + $row['leg_amount_carry'];
                $this->all_payout_details["detail$i"]["amount_payable"] = round($row['amount_payable'],2);
                $this->all_payout_details["detail$i"]["tds"] = round($row['tds'],2);
                $this->all_payout_details["detail$i"]["service_charge"] = round($row['service_charge'],2);
                $i++;            
			
            }
      return $this->all_payout_details;

    }
	

    public function getMemberPayout($user_mob_name)
    {
         require_once 'LegClass.php';
        $obj_leg = new LegClass();
         if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
        $user_id = $this->obj_val->userNameToID($user_mob_name);
		$leg_amount=$this->table_prefix."leg_amount";
         $select = "SELECT SUM(total_leg) AS total_leg,
                            SUM(total_amount) AS total_amount,
                            SUM(amount_payable) AS amount_payable,
                            SUM(tds) AS tds,
                            SUM(service_charge) AS service_charge,
                            user_id
                    FROM $leg_amount
                    WHERE user_id='$user_id'
                    GROUP BY user_id
                    ";
       // echo $select;
        $result = $this->selectData($select,"Error on selecting leg amount ..");

        $row = mysql_fetch_array($result);

        $this->member_payout_details["user_id"] = $row['user_id'];
        $this->member_payout_details["user_name"] = $this->obj_val->IdToUserName($row['user_id']);
	    $this->member_payout_details["full_name"] = $this->obj_val->getFullName($row['user_id']);
        $this->member_payout_details["left_leg"] = $obj_leg->getLeftLegCount($row['user_id']);
		  $this->member_payout_details["right_leg"] = $obj_leg->getRightLegCount($row['user_id']);
        $this->member_payout_details["total_leg"] = $row['total_leg'];
        $this->member_payout_details["total_amount"] = $row['total_amount'];
        $this->member_payout_details["amount_payable"] = round($row['amount_payable'],2);
        $this->member_payout_details["tds"] = round($row['tds'],2);
        $this->member_payout_details["service_charge"] = round($row['service_charge'],2);

   return $this->member_payout_details;
    }
public function payoutAllPage()
    {

    }
	public function payoutWeeklyDetails()
    {

    }
	public function payoutWeeklyPage($from_date,$to_date)
    {
	if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
	$leg_amount=$this->table_prefix."leg_amount";
	$select = "SELECT SUM(total_leg) AS total_leg,
                            SUM(total_amount) AS total_amount,
                            SUM(amount_payable) AS amount_payable,
                            SUM(tds) AS tds,
                            SUM(service_charge) AS service_charge,
                            user_id
                    FROM $leg_amount
                    WHERE date_of_submission BETWEEN '$from_date' AND '$to_date'
                    GROUP BY user_id";
	$result = $this->selectData($select,"Error on selecting leg amount ..");
	$count=mysql_numrows($result);
	
    return $count;
    }
	
	public function payoutWeeklyTotal($limit,$page,$from_date,$to_date,$user='')
    {
        require_once 'LegClass.php';
        $obj_leg = new LegClass();

       if($user!='')
	   {
	   if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
	   $leg_amount=$this->table_prefix."leg_amount";
	      $select = "SELECT SUM(total_leg) AS total_leg,
                            SUM(total_amount) AS total_amount,
                            SUM(amount_payable) AS amount_payable,
                            SUM(tds) AS tds,
                            SUM(service_charge) AS service_charge,
							SUM(leg_amount_carry) AS leg_amount_carry,
                            user_id
                    FROM $leg_amount
                    WHERE date_of_submission BETWEEN '$from_date' AND '$to_date' and user_id ='$user'
                    GROUP BY user_id limit $page, $limit";
					
		}
		else
		{
		if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
		$leg_amount=$this->table_prefix."leg_amount";
        $select = "SELECT SUM(total_leg) AS total_leg,
                            SUM(total_amount) AS total_amount,
                            SUM(amount_payable) AS amount_payable,
                            SUM(tds) AS tds,
                            SUM(service_charge) AS service_charge,
							SUM(leg_amount_carry) AS leg_amount_carry,
                            user_id
                    FROM $leg_amount
                    WHERE date_of_submission BETWEEN '$from_date' AND '$to_date'
                    GROUP BY user_id limit $page, $limit";
		}
        
        //echo $select;
        $result = $this->selectData($select,"Error on selecting leg amount ..");
        $i = 0;
        while($row = mysql_fetch_array($result))
            {
               $this->weekly_payout_details["detail$i"]["user_id"] = $row['user_id'];
               $this->weekly_payout_details["detail$i"]["user_name"] = $this->obj_val->IdToUserName($row['user_id']);
              $this->weekly_payout_details["detail$i"]["total_leg"] = $row['total_leg'];
                $this->weekly_payout_details["detail$i"]["total_amount"] = $row['total_amount'];
				$this->weekly_payout_details["detail$i"]["leg_amount_carry"] = $row['leg_amount_carry'];
                 $this->weekly_payout_details["detail$i"]["amount_payable"] = round($row['amount_payable'],2);
                $this->weekly_payout_details["detail$i"]["tds"] = round($row['tds'],2);
                $this->weekly_payout_details["detail$i"]["service_charge"] = round($row['service_charge'],2);
                $i++;            
            }
      return   $this->weekly_payout_details;
    }
	
	
	
	
  
		public function getActivation($from_date='',$to_date='',$status='')
    {
        require_once 'Leg.php';
        $obj_leg = new Leg();

        if($from_date == '' AND $to_date == '')
        {
		if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
		 $ft_individual=$this->table_prefix."ft_individual";
            $select = "SELECT user_name FROM $ft_individual where active!='$status'
                    GROUP BY order_id";
        }
        else
        {
		if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
		 $ft_individual=$this->table_prefix."ft_individual";
        $select = "SELECT user_name FROM $ft_individual where active!='$status' AND date_of_joining BETWEEN '$from_date' AND '$to_date' GROUP BY order_id ";
        }
        //echo $select;
        $result = $this->selectData($select,"Error on selecting Activated User ..");

        $i = 0;
        while($row = mysql_fetch_array($result))
            {

                $this->actiavtion_details["detail$i"]["user_name"] = $row['user_name'];
                $i++;

            }

			//print_r($this->actiavtion_details);
    }
	

public function updatePaidStatus($POST/*,$mount_type_arr*/)
	{
                      if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
		$leg_amount=$this->table_prefix."leg_amount";
                $amount_type_qr ="";
         //$arr_len = count($mount_type_arr);

               /* for($i=0;$i<$arr_len;$i++)
                {
                     $mount_type = $mount_type_arr[$i];
                    if($i == 0)
                     $amount_type_qr = "amount_type = '$mount_type'";
                    else
                    $amount_type_qr = $amount_type_qr. " OR amount_type = '$mount_type'";
                }*/

         $total_count = $POST['total_count'];

         $current_date =$POST['week_date1']." 00:00:00";
         $date_sub =$POST['date_sub']." 23:59:59";
         $previous_date = $POST['previous_date']." 00:00:00";
         $paid_date = date("Y-m-d H:i:s");
              //echo "Date Of Sub  $date_sub Current Date :$current_date";
              //  echo "Total $total_count";
         if(($current_date!= "")&&($previous_date != ""))
             {

            // $qry_updt="UPDATE payout_pair_details  SET payour_release_date ='$current_date'
              //    WHERE date_of_insert <= '$date_sub' AND date_of_insert > '$previous_date' AND ($amount_type_qr) ";
           // echo $qry_updt;
            //     $res=$this->updateData($qry_updt,"eroro on update payout 4444t56");


	 for($i=0;$i<$total_count;$i++)
	  {
          $user_id=$POST["user_id$i"];
        //  echo "<br>Active". $_POST["active$i"];
	  if($POST["active$i"]=='yes')
	   {
	    $qry="UPDATE $leg_amount SET paid_status ='yes',released_date = '$current_date'  WHERE
               user_id= '$user_id' AND paid_status ='no'    AND date_of_submission <= '$date_sub'   ";
         //echo $qry;
	   $res=$this->updateData($qry,"eroro on update payout 8789857");

           $qry="UPDATE $leg_amount SET paid_date = '$paid_date' WHERE user_id= '$user_id' and paid_date  = '0000-00-00 00:00:00'
                  AND date_of_submission <= '$date_sub'  AND  date_of_submission  > '$previous_date'  ";
          // echo $qry;
	   $res=$this->updateData($qry,"eroro on update payout 8789857");
	   }
	  }
             }
          return $res;
	}

        public function getAllBinaryPayoutDates($order= "DESC")
        {
		        
                
				$obj_arr = $this->obj_settings->getSettings();
                if(strcmp($obj_arr["payout_release"],"month")==0) 
				 {
				 $payout_releasedate='365 day';
				 }
				elseif(strcmp($obj_arr["payout_release"],"week")==0)
				{
                 $payout_releasedate='7 day';			
				}
                $current_date = date("Y-m-d H:i:s");
                $newdate = strtotime ($payout_releasedate,strtotime ( $current_date ) ) ;
                $newdate_1 = date ( 'Y-m-j' , $newdate );
                $this->db->distinct();
		$this->db->select("release_date");
                $this->db->from("payout_release_date");
                $this->db->where("release_date <= '$newdate_1'");
                $this->db->order_by("release_date",$order);
                $res=$this->db->get();
              
               $dat_arr =Array();
               foreach ($res->result() as $row)
               {
              
                        $timestamp = strtotime($row->release_date);

                        $dat_arr[]=  date("Y-m-d",$timestamp);
                    }
                    
                    $dat_arr1 = array_unique($dat_arr);
                    //print_r($dat_arr1);

                return $dat_arr1;
        }


         public function getBeforePayoutDateBinary($date_sub)
{

    $check_dates = $date_sub;
    $arr_dates = $this->getAllBinaryPayoutDates("ASC");
    //print_r($arr_dates);
    $arr_len =count($arr_dates);
    for($i =0;$i<$arr_len;$i++)
    {
        $k= $i-1;
        $date_from_arr =$arr_dates[$i];
      //  echo "CHECK DATE:$check_dates Arr Date:$date_from_arr ";
     if($check_dates==$date_from_arr)
         {
         $previous_date = $arr_dates[$k];
             break;
         }
    }

 return $previous_date;
}

public function getNonPaidAmounts($previous_pyout_date,$date_sub)
    {
        require_once 'LegClass.php';
        $obj_leg = new LegClass();
       $previous_pyout_date=$previous_pyout_date." 23:59:59";
	   $date_sub_tmp=$date_sub;
          $date_sub=$date_sub." 23:59:59";

         //$amount_type_len= count($amount_type_arr);
          $qr_amount_type ="";
          /*for($j=0;$j<$amount_type_len;$j++)
          {
              $amount_type = $amount_type_arr[$j];
              if($j == 0)
                  {

                      $qr_amount_type = " amount_type = '$amount_type' ";
                  }
                  else
                      {
                           $qr_amount_type .= " OR amount_type = '$amount_type' ";
                      }
          }*/

        if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }

               $before_payout_date =$this->getBeforePayoutDateBinary($date_sub_tmp);
               $leg_amount=$this->table_prefix."leg_amount";
        $select = "SELECT SUM(total_leg) AS total_leg,
                            SUM(total_amount) AS total_amount,
                            SUM(amount_payable) AS amount_payable,
                            SUM(tds) AS tds,
                            SUM(service_charge) AS service_charge,
			    SUM(leg_amount_carry) AS leg_amount_carry,
                            user_id,amount_type
                            FROM $leg_amount
                            WHERE paid_status = 'no'
                            AND  date_of_submission  <= '$date_sub' GROUP BY user_id";

       //echo   $select;

        $result = $this->selectData($select,"Error on selecting leg amount 4546 ..");
        $i = 0;
        while($row = mysql_fetch_array($result))
            {
               $this->weekly_payout_details["detail$i"]["user_id"] = $row['user_id'];
               $this->weekly_payout_details["detail$i"]["amount_type"] = $row['amount_type'];
               $this->weekly_payout_details["detail$i"]["user_name"] = $this->obj_val->IdToUserName($row['user_id']);
               $this->weekly_payout_details["detail$i"]["fullname"] = $this->obj_val->getFullName($row['user_id']);
               $this->weekly_payout_details["detail$i"]["total_leg"] = $row['total_leg'];
               $this->weekly_payout_details["detail$i"]["total_amount"] = $row['total_amount'];
	           $this->weekly_payout_details["detail$i"]["leg_amount_carry"] = $row['leg_amount_carry'];
               $this->weekly_payout_details["detail$i"]["amount_payable"] = round($row['amount_payable'],2);
                $this->weekly_payout_details["detail$i"]["tds"] = round($row['tds'],2);
                $this->weekly_payout_details["detail$i"]["service_charge"] = round($row['service_charge'],2);
                $i++;
            }
            return $this->weekly_payout_details;
    }
	
}