<?php
   define ('LEVEL',4);
   define('TOP_MARGIN',50);
   define('LEFT_MARGIN',10);
   define('BOX_WIDTH',180);
   define('BOX_HIGHT',95);
   define('PATH ',"..");
class BoardTreeView extends Model {
    public $GRAPH_WIDTH;
    public $MATRIX;
	public $MAX_LEVEL;
    public $MAX_COL;        
	public $POINT;
	public $BOARD_TABLE;

   function balancematrix() {



	

    

       // global $this->MAX_COL;



	# ASSIGN WEIGHT TO EACH PARENT

	for ($level=$this->MAX_LEVEL;$level>=1;$level--) {

		for ($column=1;$column<=$this->MAX_COL;$column++) {

			if ($level==$this->MAX_LEVEL) {

				$this->MATRIX[$level][$column]["weight"]=1;

			} else {

				$weight=0;

				for ($col=1;$col<=$this->MAX_COL;$col++) {

					if ($this->MATRIX[$level+1][$col]["parent"]==$this->MATRIX[$level][$column]["id"]) {

						$weight=$weight+$this->MATRIX[$level+1][$col]["weight"];

					}

				}

				$this->MATRIX[$level][$column]["children"]=$weight;

				if ($weight==0) { $weight=1; }

				$this->MATRIX[$level][$column]["weight"]=$weight;

			}

		}

	}





	# DEFINE X COORDINATES

	$this->MATRIX[1][1]["x"]=.5;

	$this->MATRIX[1][1]["width"]=1;

	for ($level=2;$level<=$this->MAX_LEVEL;$level++) {

		for ($column=1;$column<=$this->MAX_COL;$column++) {

			if ($this->MATRIX[$level][$column]["id"]) {

				$parentweight=1; $parentwidth=1; $parentx=1;

				for ($col=1;$col<=$this->MAX_COL;$col++) {

					if ($this->MATRIX[$level-1][$col]["id"]==$this->MATRIX[$level][$column]["parent"]) {

						$parentweight=$this->MATRIX[$level-1][$col]["weight"];

						$parentwidth=$this->MATRIX[$level-1][$col]["width"];

						$parentx=$this->MATRIX[$level-1][$col]["x"];

					}

				}

				$mywidth=($this->MATRIX[$level][$column]["weight"] / $parentweight) * $parentwidth;

				# IF I AM NOT THE FIRST CHILD, CALCULATE LEFT EDGE

				if ($this->MATRIX[$level][$column-1]["parent"]!=$this->MATRIX[$level][$column]["parent"]) {

					$myleftedge = $parentx - ($parentwidth / 2);

				} else {

					$myleftedge = $this->MATRIX[$level][$column-1]["x"] +

					($this->MATRIX[$level][$column-1]["width"]/2);

				}

				$myx = $myleftedge + ($mywidth / 2);

				$this->MATRIX[$level][$column]["width"]=$mywidth;

				$this->MATRIX[$level][$column]["x"]= $myx;

			} else {

				$column=9999;

			}

		}

	}

}





function displaymatrix($user_id,$id) {
//require_once "../class/TreeViewAs.php";
//$this = new TreeViewAs();
//require_once "../class/Treeconfig.php";
//$obj_config= new Treeconfig();
//$obj_config->set_config($id);

	//global $this->MATRIX;

	//global $this->MAX_COL;

	//global $this->MAX_LEVEL;
         $this->set_config($id);
	$graphwidth = $this->GRAPH_WIDTH;
//echo "<script>alert('$graphwidth');</script>";
	//global $boxwidth;
        $boxwidth = BOX_WIDTH;

	//global $boxheight
        $boxheight = BOX_HIGHT;
	//global $topmargin;
 $topmargin = TOP_MARGIN;
	//global $leftmargin;
$leftmargin = LEFT_MARGIN;
        $maxweight=$this->MATRIX[1][1]["weight"];

        $unit=$graphwidth/$maxweight;



	#$display_tree.= "<div style='position:absolute; top:$topmargin; left:$leftmargin; padding:0px; background-color:#dcbe7a; height:".(40 + ($boxheight * $this->MAX_LEVEL))."px; width:$graphwidth;'>&nbsp;</div>";



	for ($level=1;$level<=$this->MAX_LEVEL;$level++) {

		for ($column=1;$column<=$this->MAX_COL;$column++) {

			# DRAW BOXES

			if ($this->MATRIX[$level][$column]["id"]) {








			        $id_encrypt = $this->getEncrypt($this->MATRIX[$level][$column]["id"]);
                                 

				$x=($this->MATRIX[$level][$column]["x"] * $graphwidth) - ($boxwidth / 2 ) + $leftmargin;

				$y=($level * $boxheight)- $boxheight + $topmargin + 20;

//background-color:$color; border:.5px solid #000;

				$display_tree.= "<div align='center' style='position:absolute; top:$y; left:$x;

				padding:0px;

				height:".($boxheight - 20)."px; 		width:$boxwidth;'><div id=\"member\">";


                                   
				if($this->MATRIX[$level][$column]["active"]=="no")

			{

			$active=$this->get_active_status($this->MATRIX[$level][$column]["id"]);

			if($get_active_status=="yes")

			{

			$display_tree.= "<a href=\"#\"><img src='".TEMPLATE_APP_PATH."images/freezed.gif' height='48px' width='48px' border='0' title='Account Freezed'/><br>";

			}

			else

			{

				$display_tree.= "<a href=\"#\" id='userlink".$this->MATRIX[$level][$column]['id']."'><img src='".TEMPLATE_APP_PATH."images/inactive.png' height='48px' width='48px' border='0' title='Not Activated'/><br>";

			}

				}

				elseif($this->MATRIX[$level][$column]["active"]=="server")



				$display_tree.= "<a href=\"../../register/user_register/id:{$id_encrypt}/position:".$this->MATRIX[$level][$column]["position"]."/sponserid:".$this->MATRIX[$level][$column]["father_id"]."\"><img src='".TEMPLATE_APP_PATH."images/add.png' height='48px' width='48px' border='0' title='Add new member here...'/><br>";



				else

				 $display_tree.= "<a href=\"#\" id='userlink".$this->MATRIX[$level][$column]['id']."'><img src='".TEMPLATE_APP_PATH."images/active.gif' height='48px' width='48px' border='0'  /><br>";





				$display_tree.= $this->MATRIX[$level][$column]["name"]."</a><br>";

				if($this->MATRIX[$level][$column]["active"]!="server")

			$display_tree.= "["."<font color='#009900'>".$this->MATRIX[$level][$column]["track_id"]."</font>]";

					  $display_tree.= "</div>";





				# $display_tree.= SPOUSE

				//$display_tree.= spouselist ($this->MATRIX[$level][$column]["id"]);



				$display_tree.= "</div>";



				# DRAW CONNECTING LINES

				if ($this->MATRIX[$level][$column]["parent"] == $this->MATRIX[$level][$column-1]["parent"]) {

					if ($level > 1) {

						# HORIZONTAL LINE

						$prevx=($this->MATRIX[$level][$column-1]["x"] *

						$graphwidth) + $leftmargin;

						$y2=$y-10;

						$width = $x - $prevx + ($boxwidth / 2);

						$display_tree.= "<div style='position:absolute; top:$y2; 							left:$prevx; border-top:1px solid #000; width:$width ; 						height:0px'>&nbsp;</div>";

					}

				}



				# VERTICAL LINE (TOP)

				if ($level > 1) {

					$x=($this->MATRIX[$level][$column]["x"] * $graphwidth) + $leftmargin;

					$y2=$y-10;

					$display_tree.= "<div style='position:absolute; top:$y2; left:$x;

					border-left:1px solid #000; width:0px;height:10px'>&nbsp;</div>";

				}

				# VERTICAL LINE (BOTTOM)

				if ($level < $this->MAX_LEVEL && $this->MATRIX[$level][$column]["children"]) {

					$x=($this->MATRIX[$level][$column]["x"] * $graphwidth) + $leftmargin;

					$y2=$y+$boxheight-20+1;

					$display_tree.= "<div style='position:absolute; top:$y2; left:$x;

					border-left:1px solid #000; width:0px;height:10px'>&nbsp;</div>";

				}



				# "REDRAW" ICON

				if ($level == 1) {

				  if($table_prefix=="")

				 {

				 $table_prefix=$_SESSION['table_prefix'];

				 }

				  $ft_individual=$table_prefix."ft_individual";


                                        $qry="SELECT father_id FROM $ft_individual WHERE id=".$this->MATRIX[$level][$column]["id"];

					$rs=$this->selectData($qry,"tree view");

					$member = mysql_fetch_array($rs);

					$root = $member["father_id"];

					if($user_id>$root)        // BY ASHOK

					$root=$this->MATRIX[$level][$column]["id"];

				} else {

					$root=$this->MATRIX[$level][$column]["id"];

				}

				if ($root) {

					$x=($this->MATRIX[$level][$column]["x"] * $graphwidth) -8 + $leftmargin;





						$id_encrypt = $this->getEncrypt($root);



if(($this->MATRIX[$level][$column]["active"]!="server") and $this->MATRIX[$level][$column]["id"]!="12345")

{

					$display_tree.= "<div title='UP' onclickonclick=\"#\"

					style='position:absolute; top:".($y-9)."; left:$x;

					border:0px solid #000; cursor:pointer; '><img src='".TEMPLATE_APP_PATH."images/up.png' height='16px' width='16px' border='0' /></div>\n";

					}

				}

			}



		}

	}
        return $display_tree;

}





function addtomatrix($id,$level,$parent) {





	# GET POSITION IN MATRIX

	$this->MATRIX[$level][0]++;

	$column=$this->MATRIX[$level][0];

//$display_tree.=_r($this->MATRIX);

	# SET MAXCOL AND MAXLEVEL

	if ($column>$this->MAX_COL) { $this->MAX_COL=$column; }

	if ($level>$this->MAX_LEVEL) { $this->MAX_LEVEL=$level; }



	# RECURSIVITY AIRBAG

	if ($level>LEVEL) { return; }

	 $ft_individual = $this->BOARD_TABLE;

	//echo "2222222". $this->BOARD_TABLE;

	$sql = "SELECT * FROM $ft_individual WHERE id=$id";

     //echo "<br><br/><br/>11 ".$sql;

    //$rs=$obj->selectData($sql);

    $rs=$this->selectData($sql,"Error 12") ;





	if ( $member = mysql_fetch_array($rs) ) {



		# ADD TO MATRIX

		$name=$member["user_name"];

		$this->MATRIX[$level][$column]["id"]=$id;

		$this->MATRIX[$level][$column]["name"]=$member["user_name"];

		$this->MATRIX[$level][$column]["parent"]=$parent;

		$this->MATRIX[$level][$column]["active"]=$member["active"];

		$this->MATRIX[$level][$column]["position"]=$member["position"];

		$this->MATRIX[$level][$column]["father_id"]=$member["father_id"];



		for ($e=0;$e<$level;$e++) { $display_tree.= "&nbsp;&nbsp;&nbsp;"; }



		# GET CHILDREN

		 if($table_prefix=="")

				 {

				 $table_prefix=$_SESSION['table_prefix'];

				 }

		 $ft_individual = $this->BOARD_TABLE;

		 //echo "3333333". $ft_individual;
                 $qr ="SELECT id FROM  $ft_individual WHERE  father_id=$id";
		$rs=$this->selectData($qr,"Error 22");

		                                          //^^^^  BY ASHOK

		/*$display_tree.= "<script>alert('SELECT id FROM ft_individual WHERE father_id=$id ORDER BY position ASC');</script>";*/





		while ( $member = mysql_fetch_array($rs) )

        {

			$this->addtomatrix($member["id"],$level+1, $id);



		}



	}

}
  function get_parent($child)
{
 $table_prefix=$_SESSION['table_prefix'];
$ft_individual= $table_prefix."ft_individual";
$tmpinsert="select father_id FROM `$ft_individual` where id='$child'";
//echo $tmpinsert;
$tmpres = $this->selectData($tmpinsert,"Error on selecting parent");

$member = mysql_fetch_array($tmpres );

$father=$member["father_id"];

$tmpinsert1="select first FROM `ft_individual` where id=$father";
//echo $tmpinsert1;
$tmpres1 =$this->selectData($tmpinsert1,"Error on selecting parentqq");;

$member1 = mysql_fetch_array($tmpres1 );

return $member1['first'];

}


function get_active_status($id)
{
  $table_prefix=$_SESSION['table_prefix'];
$ft_individual= $table_prefix."ft_individual";
$tmpinsert="select *  FROM `$ft_individual` where id=$id AND active='yes'";

//echo $tmpinsert;
$tmpres =$this->selectData($tmpinsert,"Error on selecting freezed user 123");


$cnt=mysql_num_rows($tmpres);

if($cnt>0)
$status="yes";
else
$status="no";

return $status;

}





function get_user_id($id)
{
  $table_prefix=$_SESSION['table_prefix'];
$login_user= $table_prefix."login_user";
$tmpinsert="select log_user_id FROM `$login_user` where log_trackid='$id'";

//echo $tmpinsert;
$tmpres = $this->selectData($tmpinsert,"Error on selecting user id");

$member = mysql_fetch_array($tmpres );

return $member["log_user_id"];

}


function getEncrypt($string) {
    $key ="EASY1055MLM!@#$";
  $result = '';
  for($i=0; $i<strlen($string); $i++) {
    $char = substr($string, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char)+ord($keychar));
    $result.=$char;
  }

  return base64_encode($result);
}

function getDecrypt($string) {
  $key ="EASY1055MLM!@#$";
  $result = '';
  $string = base64_decode($string);

  for($i=0; $i<strlen($string); $i++) {
    $char = substr($string, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char)-ord($keychar));
    $result.=$char;
  }

  return $result;
}
 function set_config($id)
    {
         //require_once "../class/TreeView.php";
         require_once ('getTree.php');
         $obj_tree=new getTree();
         //$obj_tree_view = new TreeView();
         $decrypted=$this->getDecrypt($id);
         $user_arr=$obj_tree->getDownlineUsers( $decrypted,3);
         //echo "<script>alert('hi')</script>";
//$display_tree.=_r($user_arr);
         $max_level_count=$obj_tree->getMaxLevelCount($user_arr);
//echo "#########".$max_level_count;
         $this->GRAPH_WIDTH=($max_level_count)*125;

        if($this->GRAPH_WIDTH<850)
            {
                $this->GRAPH_WIDTH=900;
            }


    }
}