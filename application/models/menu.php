<?php

/*
 * You can modify this class
 */
/**
 * Description of Settings Class
  Contain the fuctions for seeting the configurations of Infinite MLM Software
 *
 * @author Abdul Majeed.P - 9946605558
  CSA Of IOSS
  www.ioss.in
 */
require_once 'Inf_Model.php';

Class Menu extends Inf_Model {

    public $MODULE_STATUS;

    function __construct() {
	parent::__construct();
	$this->trackModule();
    }

    public function trackModule() {
	//Code Edited By Jiji
	$this->db->select("*");
	$this->db->from("module_status");
	$qry = $this->db->get();
	foreach ($qry->result_array() as $row) {
	    $this->MODULE_STATUS = $row;
	}
	$payment_status = array();
	$i = 0;
	$this->db->select('status');
	$this->db->from("payment_methods");
	$query2 = $this->db->get();

	foreach ($query2->result_array() as $row) {
	    $payment_status[$i] = $row['status'];
	    $i++;
	}
	$this->MODULE_STATUS['credit_card'] = $payment_status[0];
	$this->MODULE_STATUS['free_joining_status'] = $payment_status[3];
    }

    public function getAllLanguages() {
	$lang_arr = array();

	$qry = $this->db->where("status", "yes")->get("languages");

	foreach ($qry->result_array() as $row) {
	    $lang_arr[] = $row;
	}
	//print_r($lang_arr);
	return $lang_arr;
    }

    public function updateMainMenuItem($arr) {


	$infinite_mlm_menu = $this->table_prefix . "infinite_mlm_menu";
	$total_count = $_POST['total_count'];
	for ($i = 0; $i < $total_count; $i++) {
	    if ($_POST["active$i"] == 'yes') {
		$menu_id = $arr["menu_id$i"];
		$menu_text = $_arr["menu_text$i"];
		$perm_admin = $_arr["perm_admin$i"];
		$perm_emp = $_arr["perm_emp$i"];
		$perm_dist = $_arr["perm_dist$i"];
		$menu_link = $_arr["menu_link$i"];
		$qry = "UPDATE $infinite_mlm_menu SET link='$menu_link',text ='$menu_text', perm_admin ='$perm_admin', perm_emp='$perm_emp', perm_dist='$perm_dist'
	         WHERE id= '$menu_id'";
		$res = $this->updateData($qry, "erorr on 56568769788");
	    }
	}
    }

    public function getAssignedSubmenuCount($menu_id, $Session_module_arr) {

	/*	 * ***************** CODE EDITED BY JIJI****************** */
	$assigned_sub_menu = array();
	$count_assigned_sub_menu = 0;
	$count_modules = count($Session_module_arr);
	for ($i = 0; $i < $count_modules; $i++) {
	    $menu_ids = explode("#", $Session_module_arr[$i]);
	    if ($menu_ids[0] == $menu_id) {
		$count_assigned_sub_menu++;
		$assigned_sub_menu[$count_assigned_sub_menu] = $menu_ids[0] . "#" . $menu_ids[1];
	    }
	}
	return $assigned_sub_menu;
    }

    public function getMainMenuItems() {

	/////////////////////  CODE EDITED BY JIJI  //////////////////////////
	$menu_item = array();
	$infinite_mlm_menu = "infinite_mlm_menu";
	$this->db->select('*');
	$this->db->from($infinite_mlm_menu);
	$this->db->where("status", "yes");
	$this->db->order_by("main_order_id");
	$qry = $this->db->get();

	$i = 0;
	foreach ($qry->result_array() as $row) {
	    $menu_item["detail$i"]["id"] = $row['id'];
	    $menu_item["detail$i"]["link"] = $row['link'];
	    $menu_item["detail$i"]["text"] = $row['text'];
	    $menu_item["detail$i"]["image"] = $row['image'];
	    $menu_item["detail$i"]["status"] = $row['status'];
	    $menu_item["detail$i"]["perm_admin"] = $row['perm_admin'];
	    $menu_item["detail$i"]["perm_emp"] = $row['perm_emp'];
	    $menu_item["detail$i"]["perm_dist"] = $row['perm_dist'];
	    $menu_item["detail$i"]["order_id"] = $row['main_order_id'];
	    $menu_item["detail$i"]["icon"] = $row['icon'];
	    $i++;
	}
	return $menu_item;
    }

    public function getSubMenuItems() {
	/////////////////////  CODE EDITED BY JIJI  //////////////////////////
	$infinite_mlm_sub_menu = "infinite_mlm_sub_menu";
	$menu_item = array();

	$this->db->select('*');
	$this->db->from($infinite_mlm_sub_menu);
	$this->db->where("sub_status", "yes");
	$this->db->order_by("sub_order_id");
	$qry = $this->db->get();
	$i = 0;
	foreach ($qry->result_array() as $row) {
	    $menu_item["detail$i"]["id"] = $row['sub_id'];
	    $menu_item["detail$i"]["link"] = $row['sub_link'];
	    $menu_item["detail$i"]["text"] = $row['sub_text'];
	    $menu_item["detail$i"]["status"] = $row['sub_status'];
	    $menu_item["detail$i"]["perm_admin"] = $row['perm_admin'];
	    $menu_item["detail$i"]["perm_emp"] = $row['perm_emp'];
	    $menu_item["detail$i"]["perm_dist"] = $row['perm_dist'];
	    $menu_item["detail$i"]["order_id"] = $row['sub_order_id'];
	    $i++;
	}
	return $menu_item;
    }

    public function changeOrder($new_order_id) {
	//$new_order_id=$new_order_id+1;
	if ($this->table_prefix == "") {
	    $this->table_prefix = $_SESSION['table_prefix'];
	}
	$menu_arr = $this->getMainMenuItems();
	$len = count($menu_arr);

	$no_of_updation = $len - $new_order_id;


	$new_order_id = $new_order_id + $no_of_updation;

	$infinite_mlm_menu = $this->table_prefix . "infinite_mlm_menu";
	for ($i = 0; $i < $no_of_updation; $i++) {
	    $id = $this->getMainMenuId($new_order_id);

	    $qrCat = "UPDATE  $infinite_mlm_menu SET main_order_id = main_order_id+1 WHERE id='$id'";
	    echo "<br/>" . $qrCat;

	    $res = $this->updateData($qrCat, "eroro on 9946605558 -4568");
	    $new_order_id = $new_order_id - 1;
	}
    }

    public function changeSubMenuOrder($new_order_id, $refrece_id) {
	//$new_order_id=$new_order_id+1;
	if ($this->table_prefix == "") {
	    $this->table_prefix = $_SESSION['table_prefix'];
	}

	// echo "<br/>Array Len:$len New Order ID:$new_order_id No_OF_UP:$no_of_updation";
	$no_of_updation = $this->getNoOfSubMenuItem($refrece_id);

	//echo "Total Limit: $no_of_updation";
	$no_of_updation = $no_of_updation - $new_order_id;
	// echo "<br/>Limit: $no_of_updation";
	$new_order_id = $this->getNoOfSubMenuItem($refrece_id);
	$infinite_mlm_sub_menu = $this->table_prefix . "infinite_mlm_sub_menu";
	for ($i = 0; $i < $no_of_updation; $i++) {
	    $id = $this->getSubMenuId($new_order_id, $refrece_id);
	    // echo "###### $id";
	    $qrCat = "UPDATE  $infinite_mlm_sub_menu SET sub_order_id = sub_order_id+1 WHERE sub_id='$id'";
	    // echo "<br/>".$qrCat;
	    $res = $this->updateData($qrCat, "eroro on 9946605558 -4566448656645");
	    $new_order_id = $new_order_id - 1;
	}
    }

    public function getMainMenuId($order_id) {


	$infinite_mlm_menu = $this->table_prefix . "infinite_mlm_menu";


	$qrlink = "SELECT id FROM  $infinite_mlm_menu where main_order_id='$order_id'";
	$res = $this->selectData($qrlink, "Oops!!!!!!!......Error on link Selection");
	$i = 0;
	$row = mysql_fetch_array($res);
	$menu_id = $row['id'];
	return $menu_id;
    }

    public function getSubMenuId($order_id, $refrece_id) {


	$infinite_mlm_sub_menu = $this->table_prefix . "infinite_mlm_sub_menu";


	$qrlink = "SELECT sub_id FROM  $infinite_mlm_sub_menu where sub_order_id='$order_id' and sub_refid= '$refrece_id'";
	$res = $this->selectData($qrlink, "Oops!!!!!!!......Error on link Selection35464");
	$i = 0;
	$row = mysql_fetch_array($res);
	$menu_id = $row['sub_id'];
	return $menu_id;
    }

    //=========added by Aparna===============//
    public function getSubMenuStatus($sub_id) {

	$this->db->select('sub_status');
	$this->db->from('infinite_mlm_sub_menu');
	$this->db->where("sub_id", $sub_id);
	$qry = $this->db->get();
	foreach ($qry->result_array() as $row) {
	    $menu_item["status"] = $row['sub_status'];
	}
	return $menu_item;
    }

    //========================================//

    public function getNoOfSubMenuItem($refrece_id) {

	$infinite_mlm_sub_menu = $this->table_prefix . "infinite_mlm_sub_menu";

	$qrlink = "SELECT count(*) as cnt FROM  $infinite_mlm_sub_menu where sub_refid='$refrece_id'";
	$res = $this->selectData($qrlink, "Oops!!!!!!!......Error on link Selection3444543654347");

	$row = mysql_fetch_array($res);
	$cnt = $row['cnt'];
	return $cnt;
    }

    public function addMainMenuItem($_arr) {
	$order_id = $_arr['menu_id'];
	$link = $_arr['link'];
	$text = $_arr['text'];
	$per_admin = $_arr['perm_admin'];
	$per_emp = $_arr['perm_emp'];
	$per_user = $_arr['perm_user'];
	$target = $_arr['target'];
	$this->changeOrder($order_id);
	$order_id = $order_id + 1;


	$infinite_mlm_menu = $this->table_prefix . "infinite_mlm_menu";
	$qrCat = "INSERT INTO  $infinite_mlm_menu (link,text,status,perm_admin,perm_dist,perm_emp,main_order_id) 
		          VALUES ('$link','$text','yes','$per_admin','$per_emp','$per_user','$order_id') ";
	$res = $this->insertData($qrCat, "eroro on 9946605558 -4568354");
    }

    public function getSubMenuReferceId($id) {

	$infinite_mlm_sub_menu = $this->table_prefix . "infinite_mlm_sub_menu";

	$qrlink = "SELECT sub_refid	  FROM  $infinite_mlm_sub_menu where sub_id='$id'";
	$res = $this->selectData($qrlink, "Oops!!!!!!!......Error on link Selection343654347");

	$row = mysql_fetch_array($res);
	$sub_refid = $row['sub_refid'];
	return $sub_refid;
    }

    public function getSubMenuOrderId($menu_id) {


	$infinite_mlm_sub_menu = $this->table_prefix . "infinite_mlm_sub_menu";

	$qrlink = "SELECT sub_order_id FROM  $infinite_mlm_sub_menu where sub_id='$menu_id'";
	$res = $this->selectData($qrlink, "Oops!!!!!!!......Error on link Selection343655464347");

	$row = mysql_fetch_array($res);
	$sub_order_id = $row['sub_order_id'];
	return $sub_order_id;
    }

    public function addSubMenuItem($_arr) {
	$menu_id = $_arr['menu_id'];
	$menu_ref_id = $this->getSubMenuReferceId($menu_id);
	$order_id = $this->getSubMenuOrderId($menu_id);
	//echo "Order ID:".$order_id;
	$ref_id_post = $_arr['refrence_id'];
	$link = $_arr['link'];
	$text = $_arr['text'];
	$per_admin = $_arr['perm_admin'];
	$per_emp = $_arr['perm_emp'];
	$per_user = $_arr['perm_user'];
	$target = $_arr['target'];
	//echo "Ref ID :$menu_ref_id ";
	if ($menu_id > 0) {
	    $this->changeSubMenuOrder($order_id, $menu_ref_id);
	    $order_id = $order_id + 1;


	    $infinite_mlm_sub_menu = $this->table_prefix . "infinite_mlm_sub_menu";
	    $qrCat = "INSERT INTO  $infinite_mlm_sub_menu (sub_link,sub_text,sub_status,perm_admin,perm_dist,perm_emp,sub_order_id,sub_refid) 
		          VALUES ('$link','$text','yes','$per_admin','$per_emp','$per_user','$order_id','$menu_ref_id')";
	    $res = $this->insertData($qrCat, "eroro on 9946605558 -4568354");
	} else {
	    if ($this->table_prefix == "") {
		$this->table_prefix = $_SESSION['table_prefix'];
	    }
	    $menu_ref_id = $_POST['refrence_id'];
	    ;
	    $order_id = 1;
	    $infinite_mlm_sub_menu = $this->table_prefix . "infinite_mlm_sub_menu";
	    $qrCat = "INSERT INTO  $infinite_mlm_sub_menu (sub_link,sub_text,sub_status,perm_admin,perm_dist,perm_emp,sub_order_id,sub_refid) 
		          VALUES ('$link','$text','yes','$per_admin','$per_emp','$per_user','$order_id','$menu_ref_id')";
	    $res = $this->insertData($qrCat, "eroro on 9946605558 -4568354");
	}
    }

    public function getUserSubMenuItemCount($menu_id, $user_type) {
	switch ($user_type) {
	    case "distributor":
		$per = 'perm_dist';
		break;
	    case "employee":
		$per = 'perm_emp';
		break;
	    case "admin":
		$per = 'perm_admin';
		break;
	    default:
		echo "Not Get Per";
	}

	$this->db->select('*');
	$this->db->from("infinite_mlm_sub_menu");
	$this->db->where("sub_refid = '$menu_id' AND $per='1' AND sub_status LIKE 'yes'");
	$cnt = $this->db->count_all_results();
	return $cnt;
    }

    public function getSubMenuItem($menu_id) {

	/////////////////////  CODE EDITED BY JIJI  //////////////////////////

	$sub_menu_item = array();

	$this->db->select('*');
	$this->db->from("infinite_mlm_sub_menu");
	$this->db->where("sub_refid = '$menu_id' AND sub_status LIKE 'yes'");
	$this->db->order_by("sub_order_id");
	$qry = $this->db->get();
	$i = 0;
	foreach ($qry->result_array() as $row) {
	    $sub_menu_item["detail$i"]["id"] = $row['sub_id'];
	    $sub_menu_item["detail$i"]["link"] = $row['sub_link'];
	    $sub_menu_item["detail$i"]["text"] = $row['sub_text'];
	    $sub_menu_item["detail$i"]["sub_image"] = $row['sub_image'];
	    $sub_menu_item["detail$i"]["status"] = $row['sub_status'];
	    $sub_menu_item["detail$i"]["perm_admin"] = $row['perm_admin'];
	    $sub_menu_item["detail$i"]["perm_emp"] = $row['perm_emp'];
	    $sub_menu_item["detail$i"]["perm_dist"] = $row['perm_dist'];
	    $sub_menu_item["detail$i"]["sub_refid"] = $row['sub_refid'];
	    $sub_menu_item["detail$i"]["order_id"] = $row['sub_order_id'];
	    $sub_menu_item["detail$i"]["icon"] = $row['icon'];

	    $i++;
	}
	return $sub_menu_item;
    }

    public function getMenuItemStatus($user_type, $user_per_arr, $menu_id, $module_status_arr = "", $main_menu_id = "") {
	$flag = false;
	// print_r($user_per_arr);
	switch ($user_type) {
	    case 'admin':
		$permision_admin = $user_per_arr["perm_admin"];
		if ($permision_admin == "1") {
		    $flag = true;
		}
		break;

	    case 'employee':
		$permision_emp = $user_per_arr["perm_emp"];
		if ($permision_emp == "1") {
		    if ($main_menu_id == "") {
			$check = "m#" . $menu_id;
		    } else {
			$check = $main_menu_id . "#" . $menu_id;
		    }
		    if (in_array($check, $module_status_arr)) {
			$flag = true;
		    }
		}
		break;

	    case 'distributor':
		$permision_dist = $user_per_arr["perm_dist"];
		if ($permision_dist == "1") {
		    $flag = true;
		}
		break;
	}
	return $flag;
    }

    public function getUserDetails($user_id) {

	//code added by jiji

	$user_details = array();

	$this->db->select('user_detail_name,user_detail_email,user_photo');
	$this->db->from("user_details");
	$this->db->where("user_detail_refid", $user_id);
	$query = $this->db->get();

	foreach ($query->result() as $row) {
	    $user_details['name'] = $row->user_detail_name;
	    $user_details['email'] = $row->user_detail_email;
	    $user_details['photo'] = $row->user_photo;
	}
	$user_details["affiliates_count"] = $this->getAffiliatesCount($user_id);
	$user_details["status"] = $this->getUserStatus($user_id);
	$user_details["rank_status"] = $this->getUserRankStatus();
	$user_details["rank"] = $this->getUserRank($user_id);

	// print_r($user_details);
	return $user_details;
    }

    public function getAffiliatesCount($user_id) {

	//code added by jiji

	$count = 0;

	$this->db->select('*');
	$this->db->from("user_details");
	$this->db->where("user_details_ref_user_id", $user_id);
	$count = $this->db->count_all_results();

	return $count;
    }

    public function getUserStatus($user_id) {

	//code added by jiji
	$status = "0";

	$this->db->select('active');
	$this->db->from("ft_individual");
	$this->db->where("id", $user_id);
	$qry = $this->db->get();
	foreach ($qry->result() as $row) {
	    if ($row->active == "yes")
		$status = "active";
	    else
		$status = "inactive";
	}

	return $status;
    }

    public function getUserRankStatus() {
	//code added by yasir
	$rank_status = "";
	$this->db->select('rank_status');
	$this->db->from("module_status");
	//$this->db->where("id", $user_id);
	$qry = $this->db->get();
	foreach ($qry->result() as $row) {
	    $rank_status = $row->rank_status;
	}
	return $rank_status;
    }

    public function getUserRank($user_id) {
	//code added by yasir
	$rank = "0";
	$this->db->select('user_rank_id');
	$this->db->from("ft_individual");
	$this->db->where("id", $user_id);
	$qry = $this->db->get();
	foreach ($qry->result() as $row) {
	    $rank = $row->user_rank_id;
	}
	return $rank;
    }

    /*     * ****vaisakh 25 02 2013*********** */

    public function getProfilePic($user_id) {
	$profile_pic = '';
	$this->db->select('user_photo');
	$this->db->from('user_details');
	$this->db->where('user_detail_refid', $user_id);
	$res = $this->db->get();
	foreach ($res->result() as $row) {
	    $profile_pic = $row->user_photo;
	}
	return $profile_pic;
    }

    public function getPic($user_id) {
	$image = array();
	$this->db->select('user_photo');
	$this->db->from('user_details');
	$this->db->where('user_detail_refid', $user_id);
	$res = $this->db->get();
	foreach ($res->result() as $row) {
	    $img = $row->user_photo;
	}
	return $img;
    }

    public function checkUpgrade($user_ref_id) {
	$res = $this->db->query("SELECT account_status FROM infinite_mlm_user_detail WHERE id='$user_ref_id'");
	foreach ($res->result() as $row) {
	    $upgrade_cond = $row->account_status;
	}
	return $upgrade_cond;
    }

    /*     * ****vaisakh 25 02 2013 ends********* */

    public function getMainMenuIdFromSubLink($menu_link) {
	$sub_refid = "";
	$this->db->select('sub_refid');
	$this->db->from('infinite_mlm_sub_menu');
	$this->db->where('sub_link', $menu_link);
	$query = $this->db->get();
	foreach ($query->result() as $row) {
	    $sub_refid = $row->sub_refid;
	}
	return $sub_refid;
    }

    public function getMainMenuDetailsForSubMenu($menu_id) {
	$main = array();
	$this->db->select('*');
	$this->db->from('infinite_mlm_menu');
	$this->db->where('id', $menu_id);
	$query = $this->db->get();
	foreach ($query->result_array() as $row) {
	    $main['id'] = $row['id'];
	    $main['link'] = $row['link'];
	    $main['text'] = $row['text'];
	    $main['image'] = $row['image'];
	    $main['status'] = $row['status'];
	    $main['main_order_id'] = $row['main_order_id'];
	}
	return $main;
    }

    public function setMenu($current_url) {

	$path_root_reg = base_url();
	$path_root = base_url();

	$user_type = $this->session->userdata['logged_in']['user_type'];
	if ($user_type == "admin" || $user_type == "employee") {
	    $path_root = $path_root . "admin/";
	} else {
	    $path_root = $path_root . "user/";
	}

	$menu_item = $this->getMainMenuItems();
	$len = count($menu_item);
	$Session_module_arr = array();
	if ($this->session->userdata("module_status")) {
	    $Session_module = $this->session->userdata("module_status");
	    $Session_module_arr = explode(",", $Session_module);
	}

	$menu_html = "<ul class='main-navigation-menu'>";

	for ($i = 0; $i < $len; $i++) {

	    $menu_id = $menu_item["detail$i"]["id"];
	    $menu_text = $menu_item["detail$i"]["text"];
	    $menu_link = $menu_item["detail$i"]["link"];
	    $menu_status = $menu_item["detail$i"]["status"];
	    $menu_perm_admin = $menu_item["detail$i"]["perm_admin"];
	    $menu_perm_emp = $menu_item["detail$i"]["perm_emp"];
	    $menu_perm_dist = $menu_item["detail$i"]["perm_dist"];
	    $menu_icon = $menu_item["detail$i"]["icon"];

	    $row_item["perm_admin"] = $menu_perm_admin;
	    $row_item["perm_emp"] = $menu_perm_emp;
	    $row_item["perm_dist"] = $menu_perm_dist;

	    if (($menu_status == "yes") && ($this->getMenuItemStatus($user_type, $row_item, $menu_id, $Session_module_arr) || $menu_link == "login/logout" || $menu_link == "#")) {

		$count_sub_menu_item = $this->getUserSubMenuItemCount($menu_id, $user_type);
		$main_menu_status = false;
		if ($count_sub_menu_item < 1) {
		    $class = 'menuitem';
		} else {
		    $class = 'menuitem submenuheader';
		}
		if ($user_type == "employee") {
		    if ($this->getMenuItemStatus($user_type, $row_item, $menu_id, $Session_module_arr)) {
			$main_menu_status = true;
		    } else {
			$assigned_sub_menu = $this->getAssignedSubmenuCount($menu_id, $Session_module_arr);
			$count_assigned_sub_menu = count($assigned_sub_menu);
			$count_sub_menu_item = $count_assigned_sub_menu;
			if (($count_sub_menu_item > 0) && ( $count_assigned_sub_menu > 0)) {
			    $main_menu_status = true;
			} else {
			    $main_menu_status = false;
			}
		    }
		} else if ($user_type == "distributor" || $user_type == "admin") {
		    $flag = $this->menu->getMenuItemStatus($user_type, $row_item, $menu_id);
		    if ($flag) {
			$main_menu_status = true;
		    }
		}
		if ($main_menu_status) {
		    if ($menu_link == 'register_board/user_register') {
			$menu_text = $this->lang->line($menu_id . "_" . $menu_link); //for language translation
			$menu_html.="<li";
			if ($current_url == $menu_link) {
			    $menu_html.=" class='active open' ";
			}
			$menu_html.="><a href= '{$path_root_reg}$menu_link'>
                                                <i class='" . $menu_icon . "' ></i>
                                                <span class='title'>
                                                    $menu_text
                                                </span><span class='selected'></span></a>";
		    } else if ($menu_link == 'register/user_register') {
			$menu_text = $this->lang->line($menu_id . "_" . $menu_link); //for language translation
			$menu_html.="<li";
			if ($current_url == $menu_link) {
			    $menu_html.=" class='active open' ";
			}
			$menu_html.="><a href= '{$path_root_reg}$menu_link'>
                                                <i class='" . $menu_icon . "' ></i>
                                                <span class='title'>
                                                    $menu_text
                                                </span><span class='selected'></span></a>";
		    } else {
			$menu_text = $this->lang->line($menu_id . "_" . $menu_link); //for language translation

			if ($menu_link == "#") {
			    $main_menu_id = $this->getMainMenuIdFromSubLink($current_url);
			    $main_menu_details_for_sub = $this->getMainMenuDetailsForSubMenu($main_menu_id);
			    if ($main_menu_id == $menu_id) {
				$menu_html.="<li";
				$menu_html.=" class='active open' ";
				$menu_html.="><a href= 'javascript:void(0)'>
                                                <i class='" . $menu_icon . "' ></i>
                                                <span class='title'>
                                                    $menu_text
                                                </span><span class='selected'></span></a>";
			    } else {
				$menu_html.="<li";
				if ($current_url == $menu_link) {
				    $menu_html.=" class='active open' ";
				}
				$menu_html.=">
                                    <a href= 'javascript:void(0)'><i class='" . $menu_icon . "' ></i>
                                        <span class='title'>                                                
                                                $menu_text</span><i class='clip-chevron-right pull-right'></i>
                                                    <span class='selected'></span></a>";
			    }
			} else {$blank='';
			    if ($menu_link == "home") {
				$menu_link = "home/index";
			    }
			    $menu_html.="<li";
			    if ($current_url == $menu_link) {
				$menu_html.=" class='active open' ";
			    }
                            else if($menu_link == "mail/ticket_system"){
                                $blank="target='_blank'";
                            }
			    $menu_html.="><a href= '{$path_root}$menu_link' $blank>
                                                <i class='" . $menu_icon . "' ></i>
                                                <span class='title'>
                                                   $menu_text
                                                </span><span class='selected'></span></a>";
			}
		    }

		    if ($count_sub_menu_item > 0) {
			$sub_menu_item = $this->getSubMenuItem($menu_id, $user_type);
			$sub_len = count($sub_menu_item);

			$menu_html .= "<ul class='sub-menu'>";
			//print_r($sub_menu_item);
			for ($j = 0; $j < $sub_len; $j++) {
			    $sub_menu_link = $sub_menu_item["detail$j"]["link"];
			    $sub_menu_text = $sub_menu_item["detail$j"]["text"];
			    $sub_menu_id = $sub_menu_item["detail$j"]["id"];
			    $sub_menu_status = $sub_menu_item["detail$j"]["status"];
			    $sub_menu_perm_admin = $sub_menu_item["detail$j"]['perm_admin'];
			    $sub_menu_perm_emp = $sub_menu_item["detail$j"]['perm_emp'];
			    $sub_menu_perm_dist = $sub_menu_item["detail$j"]['perm_dist'];
			    $sub_menu_icon = $sub_menu_item["detail$j"]['icon'];

			    $sub_row_item["perm_admin"] = $sub_menu_perm_admin;
			    $sub_row_item["perm_emp"] = $sub_menu_perm_emp;
			    $sub_row_item["perm_dist"] = $sub_menu_perm_dist;

			    if ($this->getMenuItemStatus($user_type, $sub_row_item, $sub_menu_id, $Session_module_arr, $menu_id)) {
				$sub_menu_status = false;

				if ($user_type == "employee") {
				    if ($count_assigned_sub_menu > 0) {
					$check = $menu_id . "#" . $sub_menu_id;
					if (in_array($check, $assigned_sub_menu)) {
					    $sub_menu_status = true;
					} else {
					    $sub_menu_status = false;
					}
				    }
				} else {
				    $sub_menu_status = true;
				}

				if ($sub_menu_status) {
				    if (($i == 0) && ($j == 0)) {
					$encr_id = $this->getEncrypt($this->session->userdata['logged_in']['user_id']);
					$sub_menu_text = $this->lang->line($menu_id . "_" . $sub_menu_id . "_" . $sub_menu_link); //for language translation
					$menu_html.="<li><a href='{$path_root}tree/tree_view/id:$encr_id'>
                                                <i class='" . $sub_menu_icon . "' ></i>
                                                <span class='title'>
                                                     $sub_menu_text
                                                </span>
                                             </a></li>";
				    } else {
					$sub_menu_text = $this->lang->line($menu_id . "_" . $sub_menu_id . "_" . $sub_menu_link); //for language translation
					if ($sub_menu_text == 'New Purchase') {
					    $menu_html.="<li><a href='{$path_root}$sub_menu_link' target='_blank'>
                                                <i class='" . $sub_menu_icon . "' ></i>
                                                <span class='title'>
                                                     $sub_menu_text
                                                </span></a>
                                             </li>";
					} else {
					    // if($sub_menu_text=='')
					    {
						//    $sub_menu_text='Rank Achievers Report';
					    }
					    $menu_html.="<li><a href='{$path_root}$sub_menu_link'>
                                                <i class='" . $sub_menu_icon . "' ></i>
                                                <span class='title'>
                                                    $sub_menu_text 
                                                        
                                                </span></a>
                                             </li>";
					}
				    }
				}
			    }
			}

			$menu_html .= "</ul></li>";
		    } else {
			$menu_html .= "</li>";
		    }
		}
	    }
	}

	$menu_html .= "</ul>";
	return $menu_html;
    }

}
