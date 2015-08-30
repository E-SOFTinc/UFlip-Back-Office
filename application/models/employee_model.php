<?php
require_once 'Inf_Model.php';
class employee_model extends Inf_Model {

    public function __construct() {
        
    }

    public function confirmRegistration($reg_arr) {

        /////////////////////  CODE EDITED BY JIJI  ////////////////////////// 

        $reg_arr1['ref_username'] = $reg_arr['ref_username'];
        $reg_arr1['pswd'] = $reg_arr['pswd'];
        $user_id = $this->updateEmployeeLogin($reg_arr1);
        if ($user_id != "") {
            $reg_arr['full_name'] = $reg_arr['full_name'];
            $reg_arr['address'] = $reg_arr['address'];
            $reg_arr['pin'] = $reg_arr['pin'];
            $reg_arr['mobile'] = $reg_arr['mobile'];
            $reg_arr['land_line'] = $reg_arr['land_line'];
            $reg_arr['email'] = $reg_arr['email'];
            $reg_arr['date_of_birth'] = $reg_arr['date_of_birth'];
            $reg_arr['user_id'] = $user_id;
            $res = $this->updateEmployeeDetails($reg_arr);
            return $res;
        }
        else
            return false;
    }

    public function updateEmployeeLogin($reg_arr1) {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $user_name = $reg_arr1['ref_username'];
        $password = md5($reg_arr1['pswd']);

        $this->db->set('user_name', $user_name);
        $this->db->set('password', $password);
        $this->db->set('user_type', "employee");
        $this->db->set('addedby', "code");
        $this->db->set('module_status', "m#20");
        $res = $this->db->insert('login_employee');

        if ($res) {
            $this->db->select("user_id");
            $this->db->where("user_name", $user_name);
            $this->db->from("login_employee");
            $qry = $this->db->get();

            foreach ($qry->result() as $row) {
                return $row->user_id;
            }
        }
        else
            return "";
    }

    public function updateEmployeeDetails($reg_arr) {

        /////////////////////  CODE EDITED BY JIJI  ////////////////////////// 

        $full_name = $reg_arr['full_name'];
        $address = $reg_arr['address'];
        $pin = $reg_arr['pin'];
        $mobile = $reg_arr['mobile'];
        $land_line = $reg_arr['land_line'];
        $email = $reg_arr['email'];
        $date_of_birth = $reg_arr['date_of_birth'];
        $user_id = $reg_arr['user_id'];

        $employee_details = "employee_details";

        /* /* $qr = "INSERT INTO $employee_details SET user_detail_name = '" . $full_name . "',
         * user_detail_address = '" . $address . "',user_detail_pin = " . $pin . " ,
          user_detail_mobile = '" . $mobile . "',user_detail_land = '" . $land_line . "',
         * user_detail_email = '" . $email . "', user_detail_dob = '" . $date_of_birth . "'
          , user_detail_refid = " . $user_id; */
        $this->db->set("user_detail_refid", $user_id);
        $this->db->set("user_detail_name", $full_name);
        $this->db->set("user_detail_address", $address);
        $this->db->set("user_detail_pin", $pin);
        $this->db->set("user_detail_mobile", $mobile);
        $this->db->set("user_detail_land", $land_line);
        $this->db->set("user_detail_email", $email);
        $this->db->set("user_detail_dob", $date_of_birth);
        $this->db->set("user_detail_email", $email);

        $res = $this->db->insert("employee_details");
        return $res;
    }

    //===================================================================================================================//
    //                                THIS FOR UPDATING THE PERMISSION STATUS OF A USER                                  //
    //===================================================================================================================//

    public function insertIntoUserPermission($arr_post) {

        /////////////////////  CODE EDITED BY JIJI  ////////////////////////// 

        if (!in_array("m#20", $arr_post)) {
            $len = count($arr_post);
            $arr_post[$len] = "m#20";
        }
        $rr = array_keys($arr_post);
        $module_permission = "";
        $user_name = $arr_post['user'];
        for ($i = 0; $i < count($arr_post); $i++) {
            if ($rr[$i] != "user" AND $rr[$i] != "permission") {
                $module_permission.= $arr_post[$rr[$i]] . ",";
            }
        }
        $module_permission = substr($module_permission, 0, strlen($module_permission) - 1);
        //echo $module_permission;
        // $qr = "UPDATE  $login_user SET module_status='$module_permission' WHERE user_name='$user_name'";

        $this->db->set('module_status', $module_permission);
        $this->db->where('user_name', $user_name);
        $this->db->update("login_employee");
    }

    //===================================================================================================================//
    //                                  THIS FOR VIEWING THE CHOICES FOR PERMISSION                                      //
    //===================================================================================================================//



    public function viewPermission($user) {

        /////////////////////  CODE EDITED BY JIJI  ////////////////////////// 
        // $qr = "SELECT module_status FROM $login_user WHERE user_name='$user' OR  user_id='$user'";
        $this->db->select('module_status');
        $this->db->from("login_employee");
        $this->db->where('user_name', $user);
        $this->db->or_where('user_id', $user);
        $qry = $this->db->get();

        foreach ($qry->result() as $row) {
            $permission = $row->module_status;
        }
        return $permission;
        /* $arrays = array();
          $arr = explode(",", $permission);

          $c = 0;
          $main_menu = "";
          $other_menu = "";
          $main_count = 0;
          $other_count = 0;
          $other_menu_arr = Array();
          $menu_arr = Array();
          $main_menu2 = Array();
          $sub_menu_arr = Array();
          for ($i = 0; $i < count($arr); $i++) {
          $menu = explode("#", $arr[$i]);
          $m = "m";

          if ($menu[0] == $m) {

          $menu_arr[$main_count++] = $menu[1];
          } else if ($menu[0] == "o") {

          $other_menu_arr[$other_count++] = $menu[1];
          } else {

          $sub_menu_main_arr[$c] = $menu[0];
          if (count($menu) == 2)
          $sub_menu_arr[$c++] = $menu[1];
          }
          }



          // $menu_id = $this->getMenuId($this->table_prefix);
          $menu_id = $this->getMenuId();

          foreach ($menu_id->result_array() as $row) {
          // $text = $this->getMenuTextId($row['id'], $this->table_prefix);
          //$sub_row = $this->getsubMenuId($row['id'], $this->table_prefix);
          $text = $this->getMenuTextId($row['id']);
          $sub_row = $this->getsubMenuId($row['id']);
          $c = $sub_row->num_rows();
          $main_menu2 = "";
          $i = 0;
          $flage = "b";
          $count = 0;

          foreach ($sub_row->result_array() as $row1) {

          //$text1 = $this->getSubmenuText($row1['sub_id'], $this->table_prefix);
          $text1 = $this->getSubmenuText($row1['sub_id']);

          if (in_array($row1['sub_id'], $sub_menu_arr)) {

          $main_menu2.="<td></td>
          <td>
          <input type='checkbox' name='" . $row1['sub_id'] . "' id='" . $row1['sub_id'] . "' value='" .
          $row['id'] . "#" . $row1['sub_id'] . "' checked='checked' />
          <font color ='#0000'> $text1</font>
          </td>";
          } else {


          $main_menu2.="<td></td>
          <td>
          <input type='checkbox' name='" . $row1['sub_id'] . "' id='" . $row1['sub_id'] . "' value='" .
          $row['id'] . "#" . $row1['sub_id'] . "'/>
          <font color ='#0000'> $text1 </font>
          </td>";
          }
          $i++;
          $count++;
          if ($count == 3) {
          $main_menu2.="</tr><tr>";
          $count = 0;
          }
          }

          if ($c != 0) {
          $main_menu.= "<table>
          <tr id='enq_main'>
          <td>
          <font color ='#0000'>$text</font>
          </td>
          </tr>
          <tr id='enq'>" . $main_menu2 . "</tr>
          </table>";
          } else {

          if (in_array($row['id'], $menu_arr)) {
          $main_menu.="<table>
          <tr>
          <td>
          <input type='checkbox' name='m" . $row['id'] . "k' id='" . $row['id'] . "' value='" .
          "m#" . $row['id'] . "' checked='checked' />
          <font color ='#0000'> $text </font>
          </td>
          </tr>
          </table>";
          } else {
          $main_menu.=" <table>
          <tr>
          <td>
          <input type='checkbox' name='" . $row['id'] . "' id='m" . $row['id'] . "k' value='" .
          "m#" . $row['id'] . "' />
          <font color ='#0000'> $text</font>
          </td>
          </tr>
          </table>";
          }
          }
          }

          //$other_id = $this->getOtherId($this->table_prefix);
          $other_id = $this->getOtherId();
          foreach ($other_id->result_array() as $row) {

          //$text = $this->getOtherLink($row['id'], $this->table_prefix);
          $text = $this->getOtherLink($row['id']);
          if (in_array($row['id'], $other_menu_arr)) {
          $other_menu.="<table>
          <tr>
          <td>
          <input type='checkbox' name='" . $row['id'] . "' id='" . $row['id'] . "' value='" . "o#" .
          $row['id'] . "' checked='checked' />
          <font color ='#0000'> $text </font >
          </td>
          </tr>
          </table>";
          } else {
          $other_menu.=" <table>
          <tr>
          <td>
          <input type='checkbox' name='" . $row['id'] . "' id='" . $row['id'] . "' value='" . "o#" .
          $row['id'] . "'/>
          <font color ='#0000'> $text</font>
          </td>
          </tr>
          </table>";
          }
          }
          $submit_button = "<tr>
          <td></td>
          <td><input type='submit' name='permission' id='permission' value='Set Permission'> </td>
          </tr>
          </table>";

          $arrays['main_menu'] = $main_menu;
          $arrays['other_menu'] = $other_menu;
          $arrays['submit_button'] = $submit_button;


          return $arrays; */
    }

    public function getMenuId() {

        /////////////////////  CODE EDITED BY JIJI  ////////////////////////// 
        // $menu = $table_prefix . "infinite_mlm_menu";
        // $qr = "SELECT id FROM $menu where perm_emp = 1";

        $this->db->select('id');
        $this->db->where('perm_emp', 1);
        $this->db->where('status', 'yes');
        $this->db->order_by("main_order_id");
        $this->db->from("infinite_mlm_menu");
        $qry = $this->db->get();

        return $qry;
    }

    public function getMenuTextId($menu_id) {
        /////////////////////  CODE EDITED BY JIJI  ////////////////////////// 

        /* $menu = $table_prefix . "infinite_mlm_menu";
          $qr = "SELECT text FROM $menu WHERE id='" . $menu_id . "'"; */

        /*  $language = $this->session->userdata('language');
          if ($language == "english") {
          $infinite_mlm_menu = "infinite_mlm_menu";
          } elseif ($language == "spanish") {
          $infinite_mlm_menu = "infinite_mlm_menu_es";
          } else {
          $infinite_mlm_menu = "infinite_mlm_menu";
          }
         */
        $infinite_mlm_menu = "infinite_mlm_menu";
        $this->db->select('text,link');
        $this->db->where('id', $menu_id);
        $this->db->from($infinite_mlm_menu);
        $qry = $this->db->get();

        foreach ($qry->result() as $row) {
            return $row->link;
        }
    }

    public function getsubMenuId($id) {
        /////////////////////  CODE EDITED BY JIJI  ////////////////////////// 
        /* $menu = $table_prefix . "infinite_mlm_sub_menu";
          $qr = "SELECT  sub_id,sub_refid FROM $menu WHERE sub_refid =" . $id . " AND perm_emp = 1"; */

        $this->db->select('sub_id,sub_refid');
        $this->db->where("sub_refid ='$id' AND perm_emp = 1");
        $this->db->where('sub_status', 'yes');
        $this->db->order_by("sub_order_id");
        $this->db->from("infinite_mlm_sub_menu");
        $qry = $this->db->get();

        return $qry;
    }

    public function getSubmenuText($menu_id) {
        /////////////////////  CODE EDITED BY JIJI  ////////////////////////// 

        /* $menu = $table_prefix . "infinite_mlm_sub_menu";
          $qr = "SELECT sub_text FROM $menu WHERE sub_id='" . $menu_id . "'"; */

        /* $language = $this->session->userdata('language');
          if ($language == "english") {
          $infinite_mlm_sub_menu = "infinite_mlm_sub_menu";
          } elseif ($language == "spanish") {
          $infinite_mlm_sub_menu = "infinite_mlm_sub_menu_es";
          } else {
          $infinite_mlm_sub_menu = "infinite_mlm_sub_menu";
          }
         */
        $infinite_mlm_sub_menu = "infinite_mlm_sub_menu";
        $this->db->select('sub_text,sub_link');
        $this->db->where('sub_id', $menu_id);
        $this->db->from($infinite_mlm_sub_menu);
        $qry = $this->db->get();
        foreach ($qry->result() as $row) {
            return $row->sub_link;
        }
    }

    public function getOtherId() {
        /////////////////////  CODE EDITED BY JIJI  ////////////////////////// 

        /* $menu = $table_prefix . "module_names";
          $qr = "SELECT id FROM $menu"; */

        $this->db->select('id');
        $this->db->from("module_names");
        $qry = $this->db->get();
        return $qry;
    }

    public function getOtherLink($menu_id) {
        /////////////////////  CODE EDITED BY JIJI  ////////////////////////// 
        /* $module_names = $table_prefix . "module_names";
          $qr = "SELECT module_name FROM $module_names WHERE id = " . $menu_id; */
        $arr = array();
        $this->db->select('module_name');
        $this->db->from("module_names");
        $this->db->where('id', $menu_id);
        $qry = $this->db->get();
        foreach ($qry->result() as $row) {
            $arr = explode("/", $row->module_name);
            return $arr[1];
        }
    }

    public function getEmployeeDetails($letters) {

        /////////////////////  CODE EDITED BY JIJI  ////////////////////////// 


        $details = "";
        $letters = preg_replace("/[^a-z0-9 ]/si", "", $letters);

        $this->db->select('user_id,user_name');
        $this->db->from("login_employee");
        $this->db->where("user_name LIKE '$letters%'");
        $this->db->where("emp_status","yes");
        $this->db->order_by("user_id");
        $qry = $this->db->get();
        //echo $this->db->last_query();
        foreach ($qry->result_array() as $row) {

            $details .= $row['user_id'] . "###" . $row['user_name'] . "|";
        }

        return $details;
    }

    public function isUserValid($user_name) {

        /////////////////////  CODE EDITED BY JIJI  ////////////////////////// 

        $flag = FALSE;
        $this->db->where('user_name', $user_name);
        $this->db->from('login_employee');
        $count = $this->db->count_all_results();
        if ($count > 0) {
            $flag = TRUE;
        }
        return $flag;
    }

    /* ------------------------------------------------------------------------------------------------------------------------------- */
    //========================================edited by amrutha
     public function getDetails($keyword,$limit='',$page='') {
        $i = 0;
        $detail = array();
        $this->db->select('*');
        $this->db->select('l.user_name as user_name');
        $this->db->select('l.user_id as user_id');
        $this->db->select('ed.user_detail_name as user_detail_name');
        $this->db->select('ed.user_detail_mobile as user_detail_mobile');
        $this->db->select('ed.user_detail_pin as user_detail_pin');
        $this->db->select('ed.user_detail_address as user_detail_address');
        $this->db->select('ed.user_detail_email as user_detail_email');

        $this->db->from('login_employee as l');
        $this->db->join('employee_details as ed', 'ed.user_detail_id=l.user_id');

        // $this->db->or_like('l.user_name', $keyword);
        //$this->db->or_like('ed.user_detail_name', $keyword);
        // $this->db->where('l.emp_status', 'no');
        $where = "(l.user_name LIKE '%$keyword%' OR ed.user_detail_name LIKE '%$keyword%') AND l.emp_status= 'yes'";
        $this->db->where($where);
        $this->db->limit($limit,$page);

        $query = $this->db->get();
      //  echo $this->db->last_query();
        if ($query->num_rows > 0) {
            //echo $this->db->last_query();
            foreach ($query->result_array() AS $row) {
                if ($row['emp_status'] == 'yes') {
                    $detail[$i]['user_name'] = $row['user_name'];
                    $detail[$i]['user_detail_name'] = $row['user_detail_name'];
                    $detail[$i]['user_detail_email'] = $row['user_detail_email'];
                    $detail[$i]['user_detail_address'] = $row['user_detail_address'];
                    $detail[$i]['user_detail_pin'] = $row['user_detail_pin'];

                    $detail[$i]['user_id'] = $row['user_id'];
                    $detail[$i]['user_detail_mobile'] = $row['user_detail_mobile'];
                    $i++;
                }
            }
        }

        return $detail;
    }

    public function getCountMembers($keyword) {
      
        $this->db->select('l.user_name as user_name');
        $this->db->select('l.user_id as user_id');
        $this->db->select('ed.user_detail_name as user_detail_name');
        $this->db->select('ed.user_detail_mobile as user_detail_mobile');
        $this->db->select('ed.user_detail_pin as user_detail_pin');
        $this->db->select('ed.user_detail_address as user_detail_address');
        $this->db->select('ed.user_detail_email as user_detail_email');

        $this->db->from('login_employee as l');
        $this->db->join('employee_details as ed', 'ed.user_detail_id=l.user_id');

        $where = "(l.user_name LIKE '%$keyword%' OR ed.user_detail_name LIKE '%$keyword%') AND l.emp_status= 'yes'";
        $this->db->where($where);
        $count = $this->db->count_all_results();
       
        return $count;
    }

    public function getEmployeDetails($limit='',$page='') {

        $detail = array();
        $i = 0;
        $this->db->select('u.*');
        $this->db->select('l.user_name as user_name');
        $this->db->select('l.user_id as user_id');
        $this->db->from("employee_details as u");
        $this->db->join('login_employee as l', 'l.user_id=u.user_detail_id');
        $this->db->where("l.emp_status",'yes');
        $this->db->limit($limit,$page);
        $qry = $this->db->get();
        //echo $this->db->last_query();

        if ($qry->num_rows > 0) {
            foreach ($qry->result_array() as $row) {
                $detail[$i]['user_detail_name'] = $row['user_detail_name'];
                $detail[$i]['user_detail_mobile'] = $row['user_detail_mobile'];
                $detail[$i]['user_detail_email'] = $row['user_detail_email'];
                $detail[$i]['user_detail_dob'] = $row['user_detail_dob'];
                $detail[$i]['user_detail_id'] = $row['user_detail_id'];
                $detail[$i]['user_name'] = $row['user_name'];
                $detail[$i]['user_id'] = $row['user_id'];
                $detail[$i]['user_detail_pin'] = $row['user_detail_pin'];

                $detail[$i]['user_detail_land'] = $row['user_detail_land'];
                $detail[$i]['user_detail_address'] = $row['user_detail_address'];
                //die();
                $i++;
            }
        }
      //  echo $this->db->last_query();die();
        return $detail;
    }
    public function getEmployeeDetailsCount()
    {
        $this->db->select('count(*) as cnt');
      
        $this->db->from("employee_details as u");
        $this->db->join('login_employee as l', 'l.user_id=u.user_detail_id');
        $this->db->where("l.emp_status",'yes');
        $qry = $this->db->get();
        foreach ($qry->result() as $row) {
            return $row->cnt;
        }
    }

    public function deleteEmpDetails($delete_id) {


        $this->db->set('emp_status', "no");
        $this->db->where('user_id', $delete_id);
        $res = $this->db->update('login_employee');
        return $res;
    }

    public function editEmpDetails($id) {
        $details = array();
        $i = 0;
        $this->db->select('u.*');
        $this->db->select('l.user_name as user_name');
        $this->db->from("employee_details as u");
        $this->db->join('login_employee as l', 'l.user_id=u.user_detail_id');
        $this->db->where("u.user_detail_id", $id);
        $qry = $this->db->get();
        if ($qry->num_rows > 0) {
            foreach ($qry->result_array() as $row) {
              
                $details[]=$row;
               
            }
        }

       // print_r($details);die();
        return $details;
       
    }

    public function updateContent($editdetails_id, $content_title, $emp_mob, $email, $dob, $pin, $land, $address) {



        $this->db->set('user_detail_name', $content_title);
        $this->db->set('user_detail_mobile', $emp_mob);
        $this->db->set('user_detail_email', $email);
        $this->db->set('user_detail_dob', $dob);

        $this->db->set('user_detail_pin', $pin);
        $this->db->set('user_detail_land', $land);
        $this->db->set('user_detail_address', $address);

        $this->db->where('user_detail_id', $editdetails_id);
        $result = $this->db->update("employee_details");
        return $result;
        //print_r($details);
    }
    function updatePassword($new_pswd,$user_name)
    {
        $this->db->set('password', md5($new_pswd));
        $this->db->where('user_name', $user_name);
        $res = $this->db->update('login_employee');
        
        return $res;
    
    }
    function isUserNameAvailable($user)
    {
         $flag = false;

        $this->db->select("COUNT(*) AS cnt");
        $this->db->from("login_employee");
        $this->db->where('user_name', $user);
        $this->db->where('emp_status','yes');
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $count = $row->cnt;
        }
        if ($count > 0) {
            $flag = true;
        } else {
            $flag = false;
        }
     
        return $flag;
    }

    
}