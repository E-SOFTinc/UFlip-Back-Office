<?php
class ProductDelivery extends Model {

    public $obj_porduct;
    public $obj_vali;
    public function  __construct() {
        parent::__construct();

        require_once 'ProductModel.php';
        $this->obj_porduct = new Product();

        require_once 'Validation.php';
        $this->obj_vali = new Validation();

    }//FUNCTION ENDS [ public function  __construct() ]

    public function updateqty($post_arr)
	{

             for($j=0;$j<count($post_arr);$j++)
              {
                      if($post_arr["active$j"]=='yes')
                      {
                              $new=$post_arr["new$j"];
                              $pro=$post_arr["pro$j"];


                              if($this->table_prefix=="")
                                {
                                    $this->table_prefix=$_SESSION['table_prefix'];
                                }//IF ENDS [ if($this->table_prefix=="") ]
                                
                                       $product=$this->table_prefix."product";
                                        $qry="UPDATE $product SET product_qty = product_qty+'$new' WHERE product_id='$pro'";

                                       $res=$this->updateData($qry,"erorr on updating stock quantity");

                      }//IF ENDS [ if($post_arr["active$j"]=='yes') ]

              }//FOR LOOP ENDS [  for($j=0;$j<count($post_arr);$j++) ]
              
              return $res;

  	 }//FUNCTION ENDS [ public function updateqty($post_arr)  ]

   public function getAllActiveProducts()
        {
            return $this->obj_porduct->getAllProducts("yes");
        }//FUNCTION ENDS [ public function getAllActiveProducts() ]


        public function getAllDeliveredProducts($from_date="" , $to_date="")
    {

	  $i=0;
	  if($this->table_prefix=="")
				 {
				 $this->table_prefix=$_SESSION['table_prefix'];
				 }
	   $pu_products=$this->table_prefix."purchased_products";
           if($from_date!="" && $to_date!="")
           {
                $qrd= "SELECT * FROM $pu_products WHERE delivery_status ='yes' AND delivered_date BETWEEN '$from_date' AND '$to_date'  ";
           }//IF ENDS [ if($from_date!="" & $to_date!="") ]

           else {
                $qrd= "SELECT * FROM $pu_products WHERE delivery_status ='yes'   ";

           }//ELSE ENDS [ if($from_date!="" & $to_date!="") ]

      $resd = $this->selectData($qrd,"Error on selecting deliveredproducts");
      while($rowd=mysql_fetch_array($resd))
      {
              $this->delivery_detail["details$i"]["id"] = $rowd['puser_name'];
              $this->delivery_detail["details$i"]["puserid"] = $rowd['puserid'];
              $this->delivery_detail["details$i"]["name"] = $rowd['name'];
              $this->delivery_detail["details$i"]["date"] = $rowd['product_name'];
              $this->delivery_detail["details$i"]["prod_id"] = $rowd['product_id'];
              $this->delivery_detail["details$i"]["product_value"] = $rowd['purchased_date'];
              $this->delivery_detail["details$i"]["product_qty"] = $rowd['delivered_date'];
              $this->delivery_detail["details$i"]["product_serial"] = $rowd['serial_no'];
      $i++;

      }//WHILE LOOP ENDS [ while($rowd=mysql_fetch_array($resd)) ]

      return  $this->delivery_detail;

    }//FUNCTION ENDS [ public function getAllDeliveredProducts() ]

    public function purchasedproducts($username,$userid,$name,$product,$prod_id)
    {
            $date=date("y-m-d");
            if($this->table_prefix=="")
                 {
                 $this->table_prefix=$_SESSION['table_prefix'];

                 }//IF ENDS [ if($this->table_prefix=="") ]

            $purch_products=$this->table_prefix."purchased_products";
            $qirs= "INSERT INTO $purch_products SET puser_name='$username',puserid='$userid',name='$name',product_name='$product',product_id='$prod_id',purchased_date='$date'";
            $result = $this->insertData($qirs,"Error on inserting purchased products");
            return $result;


    }//FUNCTION ENDS [ public function purchasedproducts($username,$userid,$name,$product,$prod_id) ]


    public function updateproducts($productname,$prod_id)
    {
            if($this->table_prefix=="")
             {
                    $this->table_prefix=$_SESSION['table_prefix'];

             }//IF ENDS [ if($this->table_prefix=="") ]

            $product=$this->table_prefix."product";
            $qts= "UPDATE  $product SET product_qty = product_qty-'1' WHERE product_name='$productname' AND product_id='$prod_id'";
            $res=$this->updateData($qts,"erorr on updating product quantity");

    }//FUNCTION ENDS [  public function updateproducts($productname,$prod_id) ]


    public function userNameToID($user_name)
    {
        return $this->obj_vali->userNameToID($user_name);

    }//FUNCTION ENDS [ public function userNameToID($user_name) ]


    public function getPurchaseUserDetails($user_id)
    {
        $table_prefix=$_SESSION['table_prefix'];
        $ft_individual= $table_prefix."ft_individual";
        $user_details= $table_prefix."user_details";

        $qr="select u.*,f.position from $user_details AS u
             INNER JOIN $ft_individual AS f ON u.user_detail_refid=f.id
             where user_detail_refid='".$user_id."'";

        return $this->getUserDetails($qr);

    }//FUNCTION ENDS [ public function getPurchaseUserDetails($user_id) ]



     public function getUserDetails($qr,$table="")
 {
 
  $res1 = $this->selectData($qr);
  $num=mysql_num_rows($res1);
  $i=1;
  while($row=mysql_fetch_array($res1))
      {
	
       $user_detail["detail$i"]["id"]=$row["user_detail_refid"];
    $user_detail["detail$i"]["name"]=$row["user_detail_name"];
    $user_detail["detail$i"]["address"]=$row["user_detail_address"];
    $user_detail["detail$i"]["father"]=$row["user_detail_fathername"];
    $user_detail["detail$i"]["product"]=$row["user_details_prod"];
    $user_detail["detail$i"]["town"]=$row["user_detail_town"];
    $user_detail["detail$i"]["position"]=$row["position"];
    $user_detail["detail$i"]["country"]=$row["user_detail_country"];
    $user_detail["detail$i"]["state"]=$row["user_detail_state"];
    $user_detail["detail$i"]["district"]=$row["user_detail_district"];
    $user_detail["detail$i"]["po"]= $row["user_detail_po"];
    $user_detail["detail$i"]["pincode"]=$row["user_detail_pin"];
    $user_detail["detail$i"]["college"]= $row["user_detail_college"];
    $user_detail["detail$i"]["course"]= $row["user_detail_course"];
    $user_detail["detail$i"]["year_study"]= $row["user_detail_year_study"];
    $user_detail["detail$i"]["blood"]= $row["user_detail_blood_group"];
    $user_detail["detail$i"]["donate_blood"]= $row["user_detail_donate_blood"];
    $user_detail["detail$i"]["area_interest"]=$row["user_detail_area_interest"];
    $user_detail["detail$i"]["qualification"]=$row["user_detail_qualification"];
    $user_detail["detail$i"]["designation"]=$row["user_detail_designation"];
    $user_detail["detail$i"]["dept"]=$row["user_detail_dept"];
    $user_detail["detail$i"]["office"]=$row["user_detail_office"];
    $user_detail["detail$i"]["place_work"]=$row["user_detail_place_work"];
    $user_detail["detail$i"]["passcode"]=$row["user_detail_passcode"];
    $user_detail["detail$i"]["mobile"]=$row["user_detail_mobile"];
    $user_detail["detail$i"]["land"]=$row["user_detail_land"];
    $user_detail["detail$i"]["email"]=$row["user_detail_email"];
    $user_detail["detail$i"]["dob"]= $row["user_detail_dob"];

    $user_detail["detail$i"]["gender"]=$row["user_detail_gender"];
    $user_detail["detail$i"]["nominee"]=$row["user_detail_nominee"];
    $user_detail["detail$i"]["seek_job"]=$row["user_detail_seek_job"];
    $user_detail["detail$i"]["relation"]=$row["user_detail_relation"];
    $user_detail["detail$i"]["acnumber"]=$row["user_detail_acnumber"];
    $user_detail["detail$i"]["ifsc"]=$row["user_detail_ifsc"];
    $user_detail["detail$i"]["nbank"]= $row["user_detail_nbank"];
    $user_detail["detail$i"]["nbranch"]=$row["user_detail_nbranch"];
    $user_detail["detail$i"]["pan"]=$row["user_detail_pan"];
    $user_detail["detail$i"]["level"]=$row["user_level"];
    $user_detail["detail$i"]["date"]=$row["date_of_joining"];
    $user_detail["detail$i"]["town"]=$row["user_detail_town"];
    $user_detail["detail$i"]["house"]=$row["user_detail_house_name"];
    $user_detail["detail$i"]["referral"]=$row["user_details_ref_user_id"];
	$user_detail["detail$i"]["pack"]=$row["user_detail_package"];
	$user_detail["detail$i"]["fname"]=$row["user_detail_father"];
	$user_detail["detail$i"]["leftcf"]=$row["total_left_carry"];
    $user_detail["detail$i"]["rightcf"]=$row["total_right_carry"];
    $user_detail["detail$i"]["image"]=$row["user_photos"];
    //$user_detail["detail1"]["acnumber"]=$row["user_detail_acnumber"];
    //$user_detail["detail1"]["ifsc"]=$row["user_detail_ifsc"];
    //$user_detail["detail1"]["nbank"]=$row["user_detail_nbank"];
    //$user_detail["detail1"]["nbranch"]=$row["user_detail_nbranch"];
    //$user_detail["detail1"]["pan"]=$row["user_detail_pan"];
    //$user_detail["detail1"]["house"]=$row["user_detail_house_name"];
    $user_detail["detail$i"]["left_max_deep_level"]=$row["left_max_deep_level"];
    $user_detail["detail$i"]["right_max_deep_level"]=$row["right_max_deep_level"];
    $user_detail["detail$i"]["left"]=$row["total_left_users"];
    $user_detail["detail$i"]["right"]=$row["total_right_users"];

    $i++;

    }//WHILE LOOP ENDS [ while($row=mysql_fetch_array($res1)) ]

    $user_detail=$this->replaceNullFromArray($user_detail,"NA");
     
  return  $user_detail;
 }//FUNCTION ENDS [  public function getUserDetails($qr,$table="") ]

  public function replaceNullFromArray($user_detail,$replace='')
 {
     if($replace=='')
         {
            $replace="NA";
         }

     $len= count($user_detail);
     $key_up_arr=array_keys($user_detail);
     for($i=1;$i<=$len;$i++)
     {
         $k=$i-1;
         $fild= $key_up_arr[$k];
         $arr_key=array_keys($user_detail["$fild"]);
         $key_len=count($arr_key);
         for($j=0;$j<$key_len;$j++)
         {
            $key_field = $arr_key[$j];

            if($user_detail["$fild"]["$key_field"]=="")
                {
                   $user_detail["$fild"]["$key_field"]=$replace;

                }//IF ENDS

         }//FOR LOOP ENDS [ for($j=0;$j<$key_len;$j++) ]

     }//FOR LOOP ENDS [ for($i=1;$i<=$len;$i++) ]

     return  $user_detail;

 }//FUNCTION ENDS [ public function replaceNullFromArray($user_detail,$replace='') ]

        public function chkPurchase($u_name,$user_id)
        {
                if($this->table_prefix=="")
                {
                    $this->table_prefix=$_SESSION["table_prefix"];
                }
                $purchased_products = $this->table_prefix."purchased_products";
            
                $purs= "SELECT * FROM $purchased_products WHERE puser_name ='$u_name' and puserid='$user_id'";
                $pesuu = $this->selectData($purs,"Error on selecting platinum users");
                $row=mysql_fetch_array($pesuu);
                $row_arr[]=mysql_num_rows($pesuu);
                $row_arr[]=$row['product_name'];
                return $row_arr;
                //$purows=mysql_num_rows($pesuu);

        }//FUNCTION ENDS [ public function chkPurchase($u_name,$user_id)  ]



        public function getProductqty($product_name)
        {
                if($this->table_prefix=="")
                 {
                        $this->table_prefix=$_SESSION['table_prefix'];
                 }//IF ENDS [ if($this->table_prefix=="") ]
                $product=$this->table_prefix."product";
                 $qrs= "SELECT product_qty,product_id,prod_id FROM $product WHERE product_name ='$product_name' and active ='yes' ";
                $resu = $this->selectData($qrs,"Error on selecting productqty");
                $rows=mysql_fetch_array($resu);
                $product_qty=$rows['product_qty'];
                $product_id=$rows['product_id'];
                $product_code=$rows['prod_id'];

                 $str.= $product_qty."###".$product_id."###".$product_code;

                 return $str;

        }//FUNCTION ENDS [ public function getProductqty($product_name) ]




      public function deliverProducts($username,$userid,$name,$serial)
        {
                $date=date("y-m-d");
                if($this->table_prefix=="")
                     {
                     $this->table_prefix=$_SESSION['table_prefix'];
                     }
                $purch_products=$this->table_prefix."purchased_products";
                $qtsi="UPDATE  $purch_products SET    delivered_date='$date',
                                                      delivery_status='yes',
                                                      serial_no='$serial'
                                               WHERE  puser_name = '$username'
                                               AND    puserid='$userid'";
                
                return $resi=$this->updateData($qtsi,"erorr on updating delivered product");

        }//FUNCTION ENDS [ public function Deliverproducts($username,$userid,$name,$serial) ]


        public function getDeliverUser($letters)
        {
             $letters = preg_replace("/[^a-z0-9 ]/si","",$letters);

                    $table_prefix=$_SESSION['table_prefix'];

                                $purchased_products= $table_prefix."purchased_products";

                       $qry="select puserid,puser_name from $purchased_products where puser_name like '".$letters."%' and delivery_status='no' order by ppid LIMIT 500";

                        $res = $this->selectData($qry,"Error on user selection");

                        echo "qry=".$echo= $res;

                       

                        while($inf = mysql_fetch_array($res)){

                                $echo.= $inf["puserid"]."###".$inf["puser_name"]."|";

                        }//WHILE LOOP ENDS [ while($inf = mysql_fetch_array($res)) ]

                        return $echo;

        }//FUNCTION ENDS [ public function getDeliverUser($letters) ]

    
}//CLASS ENDS [ class ProductDeliveryModel ]
