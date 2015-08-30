<?php
class  Wallet extends Model
{
  
   public function __construct()
    {
            //$this->connectDB();
		   if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
		  
    }
   public function closeDB()
    {
       $this->closeDB();
    }

  public function insertCreditEwalletToLegAmount($user_id,$amount)
  {
       $date=date('Y-m-d');
	   if($this->table_prefix=="")
				 {
				$this->table_prefix=$_SESSION['table_prefix'];
				 }
		 
	 $leg_amount=$this->table_prefix."leg_amount";
	 $qr="INSERT INTO $leg_amount SET user_id='$user_id',total_amount='$amount',amount_type='ewallet',date_of_submission='$date',amount_payable='$amount'";
	 $res = $this->insertData($qr,"Error on Inserting insertCreditEwalletToLegAmount..");
	 return $res;
	 

     }
	 
 public function insertDebitEwalletToAmountPaid($user_id,$amount)
  {
       $date=date('Y-m-d');
	   if($this->table_prefix=="")
				 {
				$this->table_prefix=$_SESSION['table_prefix'];
				 }
		 
	 $amount_paid=$this->table_prefix."amount_paid";
	 $qr="INSERT INTO $amount_paid SET paid_user_id='$user_id',paid_amount='$amount',paid_date='$date',paid_type='ewallet'";
	 $res = $this->insertData($qr,"Error on Inserting insertDebitEwalletToAmountPaid..");
	 return $res;
	 

     }	 
	 
public function isBalanceAmountAvailable($user_id,$amount_transfer)
  {
       $date=date('Y-m-d');
	   if($this->table_prefix=="")
				 {
				$this->table_prefix=$_SESSION['table_prefix'];
				 }
		 
	 $amount_paid=$this->table_prefix."amount_paid";
	 $qr_paid="SELECT SUM(paid_amount) as paid FROM $amount_paid WHERE paid_user_id ='$user_id'";
	 $res_paid = $this->selectData($qr_paid,"Error on selecting checkBalanceAmount..");
	 $row_paid=mysql_fetch_array($res_paid);
	 $paid_amount=$row_paid['paid'];
	// echo "<script>alert('$paid_amount');</script>";
	 
	 
	 $leg_amount=$this->table_prefix."leg_amount";
	 $qr_payable="SELECT SUM(amount_payable) as payable FROM $leg_amount WHERE user_id ='$user_id'";
	 $res_payable = $this->selectData($qr_payable,"Error on selecting checkBalanceAmount..");
	 $row_payable=mysql_fetch_array($res_payable);
	 $payable_amount=$row_payable['payable'];
	 //echo "<script>alert('$payable_amount');</script>";
	 
	 $flag=false;
	 $balance_amount=$payable_amount-$paid_amount;
	// echo "<script>alert('$balance_amount');</script>";
	 if($balance_amount>=$amount_transfer)
	 {
	 $flag=true;
	 }
	 
	 return $flag;
	 
	  }	 
	  
	
  }