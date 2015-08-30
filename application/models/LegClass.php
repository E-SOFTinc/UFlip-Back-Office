<?php
require_once 'Inf_Model.php';
require_once 'validation.php';
Class LegClass extends Inf_Model
{
 
     var $user_leg_det=Array();
     var $total_user_leg_det=Array();
     public $user_arr=null;
     public $obj_vali=null;
     public $table_prefix ="";

     public function __construct()
    {

     $this->obj_vali=new Validation();
	 
    }
    public function setTablePrefix($table_prefix)
    {
        $this->table_prefix =$table_prefix;
    }



    public function getTotalLegCount($id)
    { 
        $this->user_arr=null;
        $left_leg_count=0;
       

        $arr[]=$id;
        $arr=$this->getUserArray($arr);
        //print_r($this->user_arr);
        $left_leg_count=count($this->user_arr);
      

        return $left_leg_count;

    }
	
	
	
    public function getLeftLegCount($id)
    { 
        $this->user_arr=null;
        $left_leg_count=0;
        $id_left= $this->obj_vali->getLeftNodeId($id);
        if($id_left>0)
        {
        $this->user_arr[]=$id_left;
        $arr[]=$id_left;
        $arr=$this->getUserArray($arr);
        //print_r($this->user_arr);
        $left_leg_count=count($this->user_arr);
        }

        return $left_leg_count;

    }
      public function getRightLegCount($id)
    {
        $this->user_arr=null;
        $right_leg_count=0;
        $id_right= $this->obj_vali->geRighttNodeId($id);
       if( $id_right>0)
       {
       $this->user_arr[]=$id_right;
       $arr[]=$id_right;
       // $this->user_arr[]= $id ;
      //  $arr[]=$id;
        $arr=$this->getUserArray($arr);
        //print_r($this->user_arr);
        $right_leg_count=count($this->user_arr);
       }
        return $right_leg_count;

    }
    public function getUserArray($arr)
   {
      $user_id_temp=null;
      $user_id=$arr;
      $select_users = "";
	  $sql = "";
      $count_id = count($user_id);
      $flag=0;
      //print_r($user_id);
      if(count($user_id)>0)
      {
      for($i=0;$i<$count_id;$i++)
      {
          if($i!==0)
          {
          $flag=1;
          $sql .= " OR  father_id='$user_id[$i]'";
          }
          else
          {
		 
		
                   
         $this->db->select('id');
         $this->db->from('ft_individual');
         $this->db->where('active','yes');
         $this->db->where('father_id',$user_id[$i]);
         $query = $this -> db -> get();
         
          //$sql .= "SELECT id FROM $ft_individual WHERE (active='yes') AND ( father_id='$user_id[$i]'";
          }
      }
      $as = "";
      if($i>0)
      {
      $as=" )";
      $select_users.=$sql." )";
      }
      else
      {
          $select_users.=$sql;
      }
     //echo "<br>$flag ".$select_users;
      //$res1 = $this->selectData($select_users);
      foreach($query->result_array() as $row)
          {
      
            $this->user_arr[] = $row['id'];
            $user_id[] = $row['id'];
            $user_id_temp[] = $row['id'];

      }
       }
    
       $count=count($user_id_temp);
       if($count>0)
       {
           if($count>=8)
           {
           $input_array = $user_id_temp;
         //  echo "In Codition Count div:".intval($count/3);
           $split_arr=array_chunk($input_array,intval($count/4));
           // print_r($split_arr);
           for($i=0;$i<count($split_arr);$i++)
           {
            //echo "Loop<br>";
           //print_r($split_arr[$i]);
           $this->getUserArray($split_arr[$i]);
           } 
           }
           else
           {
          // echo "<br>In ELSE";
           //print_r($user_id1);
           $this->getUserArray($user_id_temp);
           }
       }
      return $user_id_temp;
 }

    public function  getUserLegDetails($user_id,$page,$limit)
    {
      if($_SESSION['user_type']=='admin')
            $sql="";
            else
                {
            $sql = " where am.user_id=".$_SESSION['user_id'];
            $sql_carry = " where ca.user_id=".$_SESSION['user_id'];
                }
				if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
$leg_amount=$this->table_prefix."leg_amount";
$login_user=$this->table_prefix."login_user";
$ft_individual = $this->table_prefix."ft_individual";
$leg_carry_forward=$this->table_prefix."leg_carry_forward";
            $select=" (SELECT id AS user_id ,user_name
                        FROM $ft_individual
						GROUP BY id
                        )";
          
            /*
            $select="SELECT SUM( am.total_amount ) AS tot_amt,SUM( am.total_leg ) AS tot_leg,
            SUM( am.left_leg ) AS left_leg_tot_ind, SUM( am.right_leg ) AS right_leg_tot_ind,
            am. * , nm.user_id AS uuu_id, nm.user_name AS uuu_name,SUM(flush_out_pair) AS flush_out_pair
            FROM leg_amount AS am INNER JOIN login_user AS nm ON am.user_id = nm.user_id
            $sql GROUP BY am.user_id ORDER BY am.user_id asc limit $page, $limit";
           */
 //echo $select;
       //echo $select;
	$result = $this->selectData($select,"Error on selecting leg carry frwd in leg 234");
	$left_leg_tot=0;
	$right_leg_tot=0;
	$total_leg_tot=0;
	$total_amount_tot=0;
	if($count=="")
	$i=1;
	else
	$i=$count;
        $j=0;
        while($row = mysql_fetch_array($result))
	{
	extract($row);
    
  
        $product_value_arr = $this->getUserPointCount($user_id);
        $left_dream = $product_value_arr['left'];
        $right_dream = $product_value_arr['right'];

        //echo "<br> ID: $user_id L: $left_dream R: $right_dream <br>";

        $leg_carry = $this->getLegCountCarry($user_id);
        $left_carry = $leg_carry['left_carry'];
        $right_carry = $leg_carry['right_carry'];
		
		//echo "<br> ID: $user_id L: $left_carry R: $right_carry <br>";

        $total_leg_arr = $this->getTotalLegTotalAmount($user_id);
        $tot_leg = $total_leg_arr['total_leg'];
        $tot_amount = $total_leg_arr['total_amount'];

        //print_R($total_leg_arr);

        $this->user_leg_det["detail$j"]["user"] = "$user_id - $user_name";
        $this->user_leg_det["detail$j"]["left"] = $left_dream;
        $this->user_leg_det["detail$j"]["right"] = $right_dream;
        $this->user_leg_det["detail$j"]["left_carry"] = $left_carry;
        $this->user_leg_det["detail$j"]["right_carry"] = $right_carry ;
        $this->user_leg_det["detail$j"]["total_leg"] = $tot_leg ;
        $this->user_leg_det["detail$j"]["total_amount"]= $tot_amount;
        $j=$j+1;
    }
    return $this->user_leg_det;
    }



    public function getTotalLegTotalAmount($user_id)
    {
	if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
	$leg_amount=$this->table_prefix."leg_amount";
        $select = "SELECT SUM(total_leg) AS total_leg,SUM(total_amount) AS total_amount
                   FROM $leg_amount WHERE user_id='$user_id'";
        //echo $select."<br>";
        $result = $this->selectData($select,"Error on selecting leg 100");
        $row = mysql_fetch_array($result);
        if($row['total_leg']=="")
            {
            $tot_arr['total_leg']='0';
            }
            else
                {
        $tot_arr['total_leg'] = $row['total_leg'];
                }
        if($row['total_amount']=="")
            {
                  $tot_arr['total_amount']='0';
            }
            else
            $tot_arr['total_amount'] = $row['total_amount'];

        return $tot_arr;

    }

    public function getTotalLegUserDetail($user_det)
    {
        $left_leg_tot=0;
	$right_leg_tot=0;
	$total_leg_tot=0;
	$total_amount_tot=0;

    for($i=0;$i<count($user_det);$i++)
    {
        $user_det["detail$i"]["user"];
        $left=$user_det["detail$i"]["left"];
        $right=$user_det["detail$i"]["right"];
        $left_carry=$user_det["detail$i"]["left_carry"];
        $right_carry=$user_det["detail$i"]["right_carry"];
        $tot_leg=$user_det["detail$i"]["total_leg"];
        $flush_out_pair=$user_det["detail$i"]["flush_out_pair"];
        $tot_amt=$user_det["detail$i"]["total_amount"];
        $left_leg_tot+=$left;
        $right_leg_tot+=$right;
        $left_carry_tot += $left_carry;
        $right_carry_tot += $right_carry;
        $total_leg_tot+=$tot_leg;
        $total_amount_tot+=$tot_amt;
        $flush_out_pair_tot += $flush_out_pair;
    }

     $this->total_user_leg_det["right"]=  $right_leg_tot;
     $this->total_user_leg_det["left"]= $left_leg_tot;
     $this->total_user_leg_det["left_carry"]= $left_carry_tot;
     $this->total_user_leg_det["right_carry"]=  $right_carry_tot;
     $this->total_user_leg_det["total_leg"]=  $total_leg_tot;
     $this->total_user_leg_det["total_amount"]=  $total_amount_tot;
     $this->total_user_leg_det["right_carry"]=  $right_carry_tot;
     $this->total_user_leg_det["total_leg"]= $flush_out_pair_tot;
     
    return $this->total_leg_detail;

    }

    public function getLegCountCarry($id)
{
if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
$leg_carry_forward=$this->table_prefix."leg_carry_forward";
	$select = "SELECT * FROM $leg_carry_forward WHERE user_id='$id'";
	$result = $this->selectData($select);
	$row = mysql_fetch_array($result);

	$left_carry = $row['carry_left'];
	$right_carry = $row['carry_right'];

	if($left_carry =="")
	$left_carry = 0;
	if($right_carry =="")
	$right_carry = 0;


	$arr["left_carry"] = $left_carry;
	$arr["right_carry"] = $right_carry;

	return $arr;
}
 public function getRightLegCountOld($id)
 {
 if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
 $ft_individual=$this->table_prefix."ft_individual";
$selectleft1 = "select * from  $ft_individual where father_id = ".$id." and active = 'yes' and position='R'";
//echo $selectleft1;
$selectleftres1=$this->selectData($selectleft1);

$row1=mysql_fetch_array($selectleftres1);
$cnt2=mysql_num_rows($selectleftres1);
if($cnt2>0)
{


		$lid=$row1['id'];


	$total_left_temp = $this->calculateEach($lid,0);
	//$total_right = $total_left_temp - $total_right_previos + 1;
	//$total_right_previos = $total_left_temp;
	$total_right = $total_left_temp ;
	if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
$ft_individual=$this->table_prefix."ft_individual";
	$selectleft1 = "select * from $ft_individual where father_id = ".$id." and active = 'yes' and position='R'";


	$selectleftres1=$this->selectData($selectleft1);
	$row1=mysql_fetch_array($selectleftres1);
	$cnt3=mysql_num_rows($selectleftres1);
	if($cnt3 > 0)
	$total_right = $total_right + 1;


return $total_right;
}
 }
 
public function  getUserLegPage($user_id)
    {
        
      if($_SESSION['user_type']=='admin')
            $sql="";
            else
            $sql=" where am.user_id=".$_SESSION['user_id'];
			$ft_individual=$this->table_prefix."ft_individual";
			$login_user=$this->table_prefix."login_user";
		if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }	
            $select="SELECT id
					FROM $ft_individual 
					WHERE active='yes'";
					
  	$result = $this->selectData($select);
	$cnt2=mysql_num_rows($result);
	return $cnt2;
    }




    public function  getUserPointCount($id)
    {
         $product_value_child1 = 0;
        $product_value_child2 = 0;
   if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }      
 $ft_individual=$this->table_prefix."ft_individual";
        $product_value_id = $this->get_product_point($id);
        $select = "SELECT * FROM  $ft_individual WHERE father_id=$id and active='yes' ORDER BY position";
        //echo "<br>".$select."<br>";
        $result = $this->selectData($select,"Error on selecting 302");
        while($row = mysql_fetch_array($result))
        {
            if($row["position"] == "L")
           $user_id['0'] = $row["id"];
            else if($row["position"] == "R")
                $user_id['1'] = $row["id"];

		   //echo "<br># ".$row["id"];
        }

       
        if($user_id["0"] > 0)
        {
        $product_value_child1 = $this->get_product_point($user_id["0"]) + $this->getTotalLegCount($user_id["0"]);
        //echo "<br> 1111 ".$this->get_product_point($user_id["0"]) . " && $user_id[0] ". $this->calculate_each_leg_count($user_id["0"],0)."<br>";
        }
        if($user_id["1"] > 0)
        {
        $product_value_child2 = $this->get_product_point($user_id["1"]) + $this->getTotalLegCount($user_id["1"]);
        }


        $total_arr["left"] = $product_value_child1;
        $total_arr["right"] = $product_value_child2;

        
       
        return $total_arr;
    }



   public function calculate_each_leg_count($id,$cnt)
{
	global $count;
	$count = $cnt;
if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
 $ft_individual=$this->table_prefix."ft_individual";
$selectleft1 = "select * from $ft_individual where father_id = $id";
//echo "<br># $count #".$selectleft1."<br>#";
	$selectleftres1=mysql_query($selectleft1) or die("Error on selecting blocked member 11");

	while($row1=mysql_fetch_array($selectleftres1))
		{
		$active = $row1['active'];
			if($active == 'yes')
			{
				//echo "<br>inside<br>";
				$count+=$this->get_product_point($row1['id']); // just changed $row['id'] from id

 			}

		$this->calculate_each_leg_count($row1['id'],$count);
		}

	return $count;
}


public function get_product_point($id)
{

if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
$point=0;
$ft_individual=$this->table_prefix."ft_individual";
$product=$this->table_prefix."product";
$tmpinsert="select p.pair_value from $ft_individual as f INNER JOIN $product as p on f.product_id=p.product_id where id=$id";

//echo "<br> 222 ".$tmpinsert."<br>";
$tmpres = mysql_query($tmpinsert) or die("Error on selecting product point");


$cnt=mysql_num_rows($tmpres);

if($cnt>0)
{
$row = mysql_fetch_array($tmpres);
$point = $row['pair_value'];
}

return $point;
}




public function getLevelUsers($user_id,$level)
{
    $arr[]=$user_id;
	 $this->each_level_leg_count = null;
	 $this->last_level_user=null;
   //  echo $no_of_level;
      $liimit_incriment=0;
	  $next=1;
	 
	  
	    if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
		   $table_prefix=$this->table_prefix;
     $this->last_level_user=$this->getOneLevelUsers($arr,$liimit_incriment,$level,$next,$table_prefix);
	  
	  return $this->last_level_user;
}


public function getOneLevelUsers($arr,$liimit_incriment,$no_of_level,$next,$table_prefix)
   {
      $liimit_incriment=$liimit_incriment+1;
      $user_id_temp=null;
      $user_id=$arr;
      $select_users = "";
      $count_id = count($user_id);
      $flag=0;
      //print_r($user_id);
	  
	  
	  
      if(count($user_id)>0)
      {
	 
      for($i=0;$i<$count_id;$i++)
      {
          if($i!==0)
          {
          $flag=1;
          $sql .= " OR  father_id='$user_id[$i]'";
          }
          else
          {
		 
		   $ft_individual=$table_prefix."ft_individual";
          $sql .= "SELECT id FROM $ft_individual WHERE  (active='yes') AND ( father_id='$user_id[$i]'";
          }
      }
      $as = "";
      if($i>0)
      {
      $as=" )";
      $select_users.=$sql." )";
      }
      else
      {
          $select_users.=$sql;
      }
    // echo "<br>$flag ".$select_users;
      $res1 = $this->selectData($select_users);
       $current_level_leg_count=mysql_num_rows($res1);
        $old_count= $this->each_level_leg_count["level$next"];
		// echo  "######".$old_count;
        $this->each_level_leg_count["level$next"]=$current_level_leg_count+$old_count;
		$reach=false;
		
		//echo "Level User Count:".$next;
		
		if($next>=$no_of_level)
		{
		//echo "Reach....";
		$reach=true;
		}
       
      while($row1=mysql_fetch_array($res1))
      {
            
            $user_id[] = $row1['id'];
            $user_id_temp[] = $row1['id'];
			if($reach)
			{
			//echo "##".$row1['id'];
			$this->last_level_user[]=$row1['id'];
			}
      }
       }
	  
	  //print_r($last_level_user);

       if($liimit_incriment<$no_of_level)
       {
       $count=count($user_id_temp);
       if($count>0)
       {
	     
           if($count>=5000)
           {
		   
		   $next=$next+1;
           $input_array = $user_id_temp;
         //  echo "In Codition Count div:".intval($count/3);
           $split_arr=array_chunk($input_array,intval($count/4));
           // print_r($split_arr);
           for($i=0;$i<count($split_arr);$i++)
           {
            ///echo "Loop<br>";
            //print_r($split_arr[$i]);
           $this->getOneLevelUsers($split_arr[$i],$liimit_incriment,$no_of_level,$next,$table_prefix);
           }
           }
           else
           {
          // echo "<br>In ELSE";
           //print_r($user_id_temp);
		     $next=$next+1;
           
            $this->getOneLevelUsers($user_id_temp,$liimit_incriment,$no_of_level,$next,$table_prefix);
           }
       }
       }
      return $this->last_level_user;
 }


public function getAllUplineId($id,$i,$limit)
{

    if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
	 $ft_individual=$this->table_prefix."ft_individual";
    $select = "SELECT father_id,total_leg,product_id
               FROM $ft_individual
               WHERE id=$id";
    //echo "<br>".$select."<br>";
    $result = $this->selectData($select, "Error on selction 001");
    $cnt = mysql_num_rows($result);
    if($cnt > 0)
        {
        $row = mysql_fetch_array($result);
        $father_id = $row['father_id'];
		if($i>0)
		{
        $this->upline_id_arr[]=$id;
		//$this->upline_id_arr["detail$i"]["product_id"]=$row['product_id'];
		}
        $i=$i+1;
         if($i<$limit)
             {
              $this->getAllUplineId($father_id,$i,$limit);
             }
        }
		
		return  $this->upline_id_arr;
}



}