<?php

require_once 'Inf_Controller.php';

class employee extends Inf_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('validation');
        $this->val = new Validation();
    }

    function employee_register() {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $title = $this->lang->line('New_Employee_Registration');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        // $this->set('action_page', base_url()."admin/employee/employee_register");
        $this->ARR_SCRIPT[0]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "messages.css";
        $this->ARR_SCRIPT[1]["type"] = "css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "ajax.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "header";


        $this->ARR_SCRIPT[4]["name"] = "style.css";
        $this->ARR_SCRIPT[4]["type"] = "css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[5]["type"] = "plugins/css";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[6]["type"] = "plugins/css";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[7]["type"] = "plugins/js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[8]["type"] = "plugins/js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";


        $this->ARR_SCRIPT[9]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[9]["type"] = "js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";


        $this->ARR_SCRIPT[10]["name"] = "employee_register.js";
        $this->ARR_SCRIPT[10]["type"] = "js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";
        $this->setScripts();

        $msg = "";
        if ($this->input->post('register')) {
            //$POST = $this->input->post();
            //---------------------------------
            if ($this->input->post('full_name')) {
                $reg_arr['full_name'] = $this->input->post('full_name');
            } else {
                $msg = $this->lang->line('you_must_enter_your_name');
                $this->redirect($msg, "employee/employee_register", FALSE);
            }
            if ($this->input->post('ref_username')) {
                if (!ctype_alnum($this->input->post('ref_username'))) {
                    $msg = $this->lang->line('invalid_user_name');
                    $this->redirect($msg, "employee/employee_register", FALSE);
                }elseif (strlen($this->input->post('ref_username'))<6) {
                   $msg = $this->lang->line('minimum_6_characters_required_for_username');
                   $this->redirect($msg, "employee/employee_register", FALSE); 
                }elseif($this->employee_model->isUserNameAvailable($this->input->post('ref_username'))){
                    $msg = $this->lang->line('username_already_exists');
                   $this->redirect($msg, "employee/employee_register", FALSE); 
                }
                $reg_arr['ref_username'] = $this->input->post('ref_username');
            } else {
                $msg = $this->lang->line('you_must_enter_your_name');
                $this->redirect($msg, "employee/employee_register", FALSE);
            }
            if ($this->input->post('pswd')) {
                if (strlen($this->input->post('pswd')) >= 6) {
                    if ($this->input->post('pswd') == $this->input->post('cpswd')) {
                        $reg_arr['pswd'] = $this->input->post('pswd');
                    } else {
                        $msg = $this->lang->line('password_mismatch');
                        $this->redirect($msg, "employee/employee_register", FALSE);
                    }
                } else {
                    $msg = $this->lang->line('Minimum_6character_required');
                    $this->redirect($msg, "employee/employee_register", FALSE);
                }
            } else {
                $msg = $this->lang->line('you_must_enter_your_password');
                $this->redirect($msg, "employee/employee_register", FALSE);
            }
            if ($this->input->post('mobile')) {
                if (strlen($this->input->post('mobile')) == 10) {
                    $reg_arr['mobile'] = $this->input->post('mobile');
                } else {
                    $msg = $this->lang->line('mobile_number_must_10digits_long');
                    $this->redirect($msg, "employee/employee_register", FALSE);
                }
            } else {
                $msg = $this->lang->line('You_must_enter_your_mobile_no');

                $this->redirect($msg, "employee/employee_register", FALSE);
            }
            if ($this->input->post('email')) {
                $reg_arr['email'] = $this->input->post('email');

                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $reg_arr['email'])) {
                    $emailErr = "Invalid email format";
                    $this->redirect($emailErr, "feedback/feedback_view", FALSE);
                }
            } else {
                $msg = $this->lang->line('please_type_your_e_mail_id');
                $this->redirect($msg, "feedback/feedback_view");
            }
            $reg_arr['address'] = $this->input->post('address');
            $reg_arr['pin'] = $this->input->post('pin');
            $reg_arr['land_line'] = $this->input->post('land_line');
            $reg_arr['date_of_birth'] = $this->input->post('date_of_birth');

            //---------------------------------
            $res = $this->employee_model->confirmRegistration($reg_arr);
            if ($res) {
                $msg = $this->lang->line('employee_registered');
                $this->redirect($msg, "employee/employee_register", TRUE);
            } else {
                $msg = $this->lang->line('You_must_enter_your_email');
                $this->redirect($msg, "employee/employee_register", FALSE);
            }
        }
///////////////////////////////////////////for language translation///////////////////////////////////////////////////
        $this->set("tran_New_Employee_Registration", $this->lang->line('New_Employee_Registration'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_password", $this->lang->line('password'));
        $this->set("tran_confirm_password", $this->lang->line('confirm_password'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_pincode", $this->lang->line('pincode'));
        $this->set("tran_mob_no_10_digit", $this->lang->line('mob_no_10_digit'));
        $this->set("tran_land_line_no", $this->lang->line('land_line_no'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_date_of_birth", $this->lang->line('date_of_birth'));
        $this->set("tran_register_new_member", $this->lang->line('register_new_member'));
        $this->set("tran_reset", $this->lang->line('reset'));

        $this->set("tran_you_must_enter_your_name", $this->lang->line('you_must_enter_your_name'));
        $this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_you_must_enter_your_password", $this->lang->line('you_must_enter_your_password'));
        $this->set("tran_You_must_enter_your_Password_again", $this->lang->line('You_must_enter_your_Password_again'));
        $this->set("tran_Minimum_6character_required", $this->lang->line('Minimum_6character_required'));
        $this->set("tran_password_mismatch", $this->lang->line('password_mismatch'));
        $this->set("tran_You_must_enter_your_mobile_no", $this->lang->line('You_must_enter_your_mobile_no'));
        $this->set("tran_You_have_entered_an_invalid_mobile_number", $this->lang->line('You_have_entered_an_invalid_mobile_number'));
        $this->set("tran_You_must_enter_your_email", $this->lang->line('You_must_enter_your_email'));
        $this->set("tran_You_have_entered_an_invalid_email", $this->lang->line('you_have_entered_an_invalid_email'));
        $this->set("tran_digits_only", $this->lang->line('digits_only'));
        $this->set("tran_mobile_number_must_10digits_long", $this->lang->line('mobile_number_must_10digits_long'));
        $this->set("tran_Invalid_Username", $this->lang->line('Invalid_Username'));
        $this->set("tran_checking_username_availability", $this->lang->line('checking_username_availability'));
        $this->set("tran_username_validated", $this->lang->line('username_validated'));
        $this->set("tran_username_already_exists", $this->lang->line('username_already_exists'));
        $this->set("tran_mail_id_format", $this->lang->line('mail_id_format'));
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('New_Employee_Registration'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('New_Employee_Registration'));
        $this->set("page_small_header", "");

        $help_link = "employee-registration";
        $this->set("help_link", $help_link);

        $this->setView();
    }

    function set_employee_permission() {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $title = $this->lang->line('set_employee_modules');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list_employee.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "validate_employee.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";


        $this->setScripts();

        $msg = "";
        if ($this->input->post('permission')) {
            $arr_post = $this->input->post();
           
            if ($this->input->post('user') != "") {
                $user_name = $arr_post['user'];
                //$user_id = $arr_post['user_id'];

                $this->employee_model->insertIntoUserPermission($arr_post);
                $msg = $this->lang->line('successfully_added');
                $this->redirect($msg, "employee/set_employee_permission", TRUE);
            } else {
                $msg = $this->lang->line('enter_user_name');
                $this->redirect($msg, "employee/set_employee_permission", FALSE);
            }
        }
        $user_name_submit = false;
        if ($this->input->post('user_name_submit')) {

            $user_name_submit = true;
            if ($this->input->post('user1')) {
                $user_name = $this->input->post('user1');
            } else {
                $msg = $this->lang->line('you_must_select_user');
                $this->redirect($msg, "employee/set_employee_permission", FALSE);
            }
            //$user_name = $this->input->post('user1');
            //print_r($this->input->post());
            if ($this->employee_model->isUserValid($user_name)) {
                $permission = $this->employee_model->viewPermission($user_name);

////////////////////////////////////////////////////////////////to view menus and submenus////////////////////////////////////////////////////////////////////

                $arrays = array();
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
                $menu_id = $this->employee_model->getMenuId();

                foreach ($menu_id->result_array() as $row) {
                    // $text = $this->getMenuTextId($row['id'], $this->table_prefix);
                    //$sub_row = $this->getsubMenuId($row['id'], $this->table_prefix);
                    // $text = $this->employee_model->getMenuTextId($row['id']);
                    $menu_id = $row['id'];
                    $link = $this->employee_model->getMenuTextId($menu_id);
                    $menu_text = $this->lang->line($menu_id . "_" . $link);
                    $sub_row = $this->employee_model->getsubMenuId($menu_id);
                    $c = $sub_row->num_rows();
                    $sub_menu = "";
                    $i = 0;
                    $flage = "b";
                    $count = 0;

                    foreach ($sub_row->result_array() as $row1) {

                        //$text1 = $this->getSubmenuText($row1['sub_id'], $this->table_prefix);
                        $sub_menu_id = $row1['sub_id'];
                        $sub_link = $this->employee_model->getSubmenuText($sub_menu_id);
                        $sub_text = $this->lang->line($menu_id . "_" . $sub_menu_id . "_" . $sub_link);
                        if (in_array($row1['sub_id'], $sub_menu_arr)) {

                            $sub_menu.="<td></td> 
                                  <td>
                                        <input type='checkbox' name='" . $row1['sub_id'] . "' id='" . $row1['sub_id'] . "' value='" .
                                    $row['id'] . "#" . $row1['sub_id'] . "' checked='checked' />
                                        <label for='" . $row1['sub_id'] . "'></label>
                                        <font color ='#0000'> $sub_text</font>
                                  </td>";
                        } else {


                            $sub_menu.="<td></td> 
                                  <td>
                                        <input type='checkbox' name='" . $row1['sub_id'] . "' id='" . $row1['sub_id'] . "' value='" .
                                    $row['id'] . "#" . $row1['sub_id'] . "'/> 
                                        <label for='" . $row1['sub_id'] . "'></label>
                                        <font color ='#0000'> $sub_text </font>
                                  </td>";
                        }
                        $i++;
                        $count++;
                        if ($count == 3) {
                            $sub_menu.="</tr><tr>";
                            $count = 0;
                        }
                    }

                    if ($c != 0) {
                        $main_menu.= "<table>
                                <tr id='enq_main'>
                                  <td>
                                     <b> <font color ='#0000'>$menu_text</font></b>
                                  </td>
                                </tr> 
                                <tr id='enq'>" . $sub_menu . "</tr>
                              </table>";
                    } else {

                        if (in_array($row['id'], $menu_arr)) {
                            $main_menu.="<table>
                                    <tr>
                                        <td>
                                            <input type='checkbox' name='m" . $row['id'] . "k' id='" . $row['id'] . "' value='" .
                                    "m#" . $row['id'] . "' checked='checked' />
                                        <label for='" . $row['id'] . "'></label>
                                            <b><font color ='#0000'> $menu_text </font></b>
                                        </td>
                                    </tr>
                                </table>";
                        } else {
                            $main_menu.=" <table>
                                    <tr>
                                        <td>
                                            <input type='checkbox' name='m" . $row['id'] . "' id='m" . $row['id'] . "k' value='" .
                                    "m#" . $row['id'] . "' />
                                        <label for='m" . $row['id'] . "k'></label>
                                           <b> <font color ='#0000'> $menu_text</font> </b>
                                        </td>
                                    </tr>
                                </table>";
                        }
                    }
                }

                //$other_id = $this->getOtherId($this->table_prefix);
                $other_id = $this->employee_model->getOtherId();
                foreach ($other_id->result_array() as $row) {

                    //$text = $this->getOtherLink($row['id'], $this->table_prefix);
                    $text = $this->employee_model->getOtherLink($row['id']);
                    if (in_array($row['id'], $other_menu_arr)) {
                        $other_menu.="<table>
                                <tr>
                                    <td>
                                        <input type='checkbox' name='100' id='" . $row['id'] . "' value='" . "o#" .
                                $row['id'] . "' checked='checked' />
                                    <label for='" . $row['id'] . "'></label>
                                        <b><font color ='#0000'> $text </font ></b>
                                    </td>
                                </tr>
                            </table>";
                    } else {
                        $other_menu.=" <table>
                                <tr>
                                    <td>
                                        <input type='checkbox' name='" . $row['id'] . "' id='" . $row['id'] . "' value='" . "o#" .
                                $row['id'] . "'/>
                                    <label for='" . $row['id'] . "'></label>
                                        <b><font color ='#0000'> $text</font> </b>
                                    </td>
                                </tr>
                            </table>";
                    }
                }

                $submit_button = " <div class='form-group'>
                        <div class='col-sm-2 col-sm-offset-2'>
                            <button class='btn btn-bricky'  type='submit' align='center' name='permission' id='permission' value='Set Permission'>
                              Set Permission
                            </button>
                        </div>
                               </div>";

                ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                /*  $main_menu = $aa_rr['main_menu'];
                  $other_menu = $aa_rr['other_menu'];
                  $submit_button = $aa_rr['submit_button']; */

                $this->set("main_menu", $main_menu);
                $this->set("other_menu", $other_menu);
                $this->set("submit_button", $submit_button);
                $this->set("user_name", $user_name);
            } else {
                $msg = $this->lang->line('invalid_user');
                $this->redirect($msg, $this->CURRENT_URL);
            }
        }

        $this->set("user_name_submit", $user_name_submit);

        ///////////////////////////////////////////for language translation///////////////////////////////////////////////////
        $this->set("tran_select_user", $this->lang->line('select_user'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_set_module_permission", $this->lang->line('set_module_permission'));
        $this->set("tran_view_module_permission", $this->lang->line('view_module_permission'));
        $this->set("tran_set_permission_of", $this->lang->line('set_permission_of'));
        $this->set("tran_you_must_select_user", $this->lang->line('you_must_select_user'));
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('set_module_permission'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('set_module_permission'));
        $this->set("page_small_header", "");

        $help_link = "set-module-permission";
        $this->set("help_link", $help_link);

        $this->setView();
    }

    public function employee_auto($letters = '') {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $employee_details = $this->employee_model->getEmployeeDetails($letters);
        echo $employee_details;
    }

    public function employee_username_availability() {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $username = $this->input->post('user_name');
        $flag = $this->employee_model->isUserValid($username);
        if ($flag || !ctype_alnum($username))
            echo "no"; //user already exists, hence username not available
        else
            echo "yes";
    }

    //-----------------------------------------------edited by amrutha
    function search_employee() {

        $title = $this->lang->line('search_employee');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        
        $this->ARR_SCRIPT[1]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[1]["type"] = "plugins/css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[2]["type"] = "plugins/css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[3]["type"] = "plugins/js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";        
        
        $this->ARR_SCRIPT[4]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[4]["type"] = "js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "validate_employee_search.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[6]["type"] = "plugins/css";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[7]["type"] = "plugins/css";
        $this->ARR_SCRIPT[7]["loc"] = "header";

        $this->ARR_SCRIPT[8]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[8]["type"] = "plugins/js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[9]["type"] = "plugins/js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        $this->ARR_SCRIPT[10]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[10]["type"] = "plugins/js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->ARR_SCRIPT[11]["name"] = "table-data.js";
        $this->ARR_SCRIPT[11]["type"] = "js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

        //----------
        $this->ARR_SCRIPT[12]["name"] = "ajax-dynamic-list_employee.js";
        $this->ARR_SCRIPT[12]["type"] = "js";
        $this->ARR_SCRIPT[12]["loc"] = "header";
        
        $this->ARR_SCRIPT[13]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[13]["type"] = "plugins/js";
        $this->ARR_SCRIPT[13]["loc"] = "footer";

        $this->ARR_SCRIPT[14]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[14]["type"] = "css";
        $this->ARR_SCRIPT[14]["loc"] = "header";

        $this->ARR_SCRIPT[15]["name"] = "ajax.js";
        $this->ARR_SCRIPT[15]["type"] = "js";
        $this->ARR_SCRIPT[15]["loc"] = "header";
        
        


        $this->setScripts();
        $flag = false;
        $help_link = "search-employee";
        $this->set("help_link", $help_link);

        $this->set("tran_You_must_enter_keyword_to_search", $this->lang->line('you_must_enter_keyword_to_search'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_edit", $this->lang->line('edit'));
        $this->set("page_top_header", $this->lang->line('search_employee'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('search_employee'));
        $this->set("page_small_header", "");

        $this->set("tran_keyword", $this->lang->line('keyword'));
        $this->set("tran_edit_employee", $this->lang->line('edit_employee'));
        $this->set("tran_search_employee", $this->lang->line('search_employee'));
        $this->set("tran_must_enter_keyword", $this->lang->line('You_must_enter_keyword_to_search'));
        $this->set("tran_edit", $this->lang->line('edit'));
        $this->set("tran_remove", $this->lang->line('remove'));

        $this->set("tran_employee_user_name", $this->lang->line('user_name'));
        $this->set("tran_employee_fullname", $this->lang->line('full_name'));
        $this->set("tran_mobile_no", $this->lang->line('mobile_no'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_view_profile", $this->lang->line('view_profile'));
        $this->set("tran_No_User_Found", $this->lang->line('No_User_Found'));
        $this->set("tran_Username_or_Name", $this->lang->line('Username_or_Name'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_pincode", $this->lang->line('pincode'));
        $this->set("tran_mob_no_10_digit", $this->lang->line('mob_no_10_digit'));
        $this->set("tran_land_line_no", $this->lang->line('land_line_no'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_date_of_birth", $this->lang->line('date_of_birth'));
        $this->set("tran_you_must_enter_your_name", $this->lang->line('you_must_enter_your_name'));

        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_view_employee", $this->lang->line('view_all_employee'));

        $this->set("emp_detail", "");
        $this->set("count", "");

        $this->set('keyword', "");
        $base_url = base_url() . "admin/employee/search_employee/tab";

        $config['uri_segment'] = 5;
        if ($this->uri->segment(4) != "") {
            $page = $this->uri->segment(5);
            $flag = TRUE;
        }
        else
            $page = 0;

        $config['base_url'] = $base_url;
        $config['per_page'] = 2;
        $config['num_links'] = 5;

        $keyword = "";
        $count = 0;
        $emp_detail = array();

        if ($this->input->post('search_employee')) {
            $flag = TRUE;
            if ($this->input->post('keyword') != "") {
                $post_arr = $this->validation->stripTagsPostArray($this->input->post());
                $keyword = $post_arr["keyword"];
                $this->session->set_userdata('ser_keyword', $keyword);
            }
        } else if ($this->input->post('view_all')) {
            $this->redirect("", "employee/view_all_employee");
        }

        $numrows = $this->employee_model->getCountMembers($this->session->userdata('ser_keyword'));
        $config['total_rows'] = $numrows;
        $this->pagination->initialize($config);

        $emp_detail = $this->employee_model->getDetails($this->session->userdata('ser_keyword'), $config['per_page'], $page);
        //  print_r($emp_detail);
        $count = count($emp_detail);


        $this->set("count", $count);
        $this->set("keyword", $keyword);
        $this->pagination->initialize($config);
        $this->set("emp_detail", $emp_detail);
        $this->set('flag', $flag);
        $result_per_page = $this->pagination->create_links();
        $this->set("result_per_page", $result_per_page);

        $this->setView();
    }

    public function view_all_employee($action = '', $id = '') {

        $title = $this->lang->line('view_all_employee');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        
        $this->ARR_SCRIPT[0]["name"] = "bootstrap-timepicker/css/bootstrap-timepicker.min.css";
        $this->ARR_SCRIPT[0]["type"] = "plugins/css";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[1]["type"] = "plugins/js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "bootstrap-timepicker/js/bootstrap-timepicker.min.js";
        $this->ARR_SCRIPT[2]["type"] = "plugins/js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "validate_employee_search.js";
        $this->ARR_SCRIPT[4]["type"] = "js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";
        

        $this->ARR_SCRIPT[5]["name"] = "misc.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[6]["type"] = "plugins/css";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[7]["type"] = "plugins/css";
        $this->ARR_SCRIPT[7]["loc"] = "header";

        $this->ARR_SCRIPT[8]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[8]["type"] = "plugins/js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[9]["type"] = "plugins/js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        $this->ARR_SCRIPT[10]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[10]["type"] = "plugins/js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->ARR_SCRIPT[11]["name"] = "table-data.js";
        $this->ARR_SCRIPT[11]["type"] = "js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

        $this->ARR_SCRIPT[12]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[12]["type"] = "plugins/css";
        $this->ARR_SCRIPT[12]["loc"] = "header";

        


        $this->setScripts();
        $help_link = "employee-registration";
        $this->set("help_link", $help_link);

        $this->set("tran_You_must_enter_keyword_to_search", $this->lang->line('you_must_enter_keyword_to_search'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_edit", $this->lang->line('edit'));
        $this->set("page_top_header", $this->lang->line('view_all_employee'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('view_all_employee'));
        $this->set("page_small_header", "");

        $this->set("tran_keyword", $this->lang->line('keyword'));
        $this->set("tran_edit_employee", $this->lang->line('edit_employee'));
        $this->set("tran_search_employee", $this->lang->line('search_employee'));
        $this->set("tran_must_enter_keyword", $this->lang->line('You_must_enter_keyword_to_search'));
        $this->set("tran_edit", $this->lang->line('edit'));
        $this->set("tran_remove", $this->lang->line('remove'));

        $this->set("tran_employee_user_name", $this->lang->line('user_name'));
        $this->set("tran_employee_fullname", $this->lang->line('full_name'));
        $this->set("tran_mobile_no", $this->lang->line('mobile_no'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_view_profile", $this->lang->line('view_profile'));
        $this->set("tran_No_User_Found", $this->lang->line('No_User_Found'));
        $this->set("tran_Username_or_Name", $this->lang->line('Username_or_Name'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_pincode", $this->lang->line('pincode'));
        $this->set("tran_mob_no_10_digit", $this->lang->line('mob_no_10_digit'));
        $this->set("tran_land_line_no", $this->lang->line('land_line_no'));
        $this->set("tran_email", $this->lang->line('email'));
        $this->set("tran_date_of_birth", $this->lang->line('date_of_birth'));
        $this->set("tran_you_must_enter_your_name", $this->lang->line('you_must_enter_your_name'));
        $this->set("tran_You_must_enter_your_mobile_no", $this->lang->line('You_must_enter_your_mobile_no'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_view_employee", $this->lang->line('view_all_employee'));

        $this->set("tran_You_must_enter_your_email", $this->lang->line('You_must_enter_your_email'));
        $this->set("emp_detail", "");
        $this->set("count", "");
        $this->set("editdetails", "");

        $this->set("visible", "none");
        $this->set('keyword', "");
        $this->set("visibility", "none");
        $emp_detail = array();
        $keyword = "all";
        /*         * *******pagination******* */
        $base_url = base_url() . "admin/employee/view_all_employee";
        $config['base_url'] = $base_url;
        $config['per_page'] = 200;
        $amount = $this->session->userdata('amount');
        $total_rows = $this->employee_model->getEmployeeDetailsCount();
        //echo $tot_rows;
        $config['total_rows'] = $total_rows;
        $config["uri_segment"] = 4;

        $config['num_links'] = 5;

        $this->pagination->initialize($config);
        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;


        $emp_detail = $this->employee_model->getEmployeDetails($config['per_page'], $page);
        $count = count($emp_detail);
        $numrows = $count;
        $config['total_rows'] = $numrows;
        $this->set("count", $count);
        $this->set("keyword", $keyword);
        $this->set("emp_detail", $emp_detail);
        $pagination = $this->pagination->create_links();
        $this->set('pagination', $pagination);


//       
        $this->set("action", $action);
        $editdetails = array();



        $this->set("visibility", "none");
        $emp_detail = array();
        if (($action == 'delete') && ($id != '')) {
            $res1 = $this->employee_model->deleteEmpDetails($id);

            if ($res1) {
                $this->redirect("Deleted Sucessfully", "employee/view_all_employee", TRUE);
            } else {
                $this->redirect("Deleted Unsucessfully", "employee/view_all_employee", FALSE);
            }
        } else if ($action == 'edit') {
            $this->set("visibility", "block");
            $this->set("visible", "");

            $editdetails = $this->employee_model->editEmpDetails($id);
        }
        $this->set("editdetails", $editdetails);

        if ($this->input->post("update")) {
            $content_title = $this->input->post("full_name");
            $emp_mob = $this->input->post("mobile");
            $email = $this->input->post("email");
            $dob = $this->input->post("date_of_birth");
            $pin = $this->input->post("pin");
            $land = $this->input->post("land_line");
            $address = $this->input->post("address");


            $this->employee_model->updateContent($editdetails[0]['user_detail_id'], $content_title, $emp_mob, $email, $dob, $pin, $land, $address);
            $this->redirect("Employee Details updated", "employee/view_all_employee", TRUE);
        }


        $this->setView();
    }

    function change_password() {

        $title = $this->lang->line('change_employee_password');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list_employee.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";


        $this->ARR_SCRIPT[2]["name"] = "validate_employee_password.js";
        $this->ARR_SCRIPT[2]["type"] = "js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[3]["type"] = "css";
        $this->ARR_SCRIPT[3]["loc"] = "header";


        

        $this->setScripts();

        $help_link = "change-employee-password";
        $this->set("help_link", $help_link);

        $this->set("tran_change_password", $this->lang->line('change_employee_password'));
        $this->set("tran_new_password", $this->lang->line('new_password'));
        $this->set("tran_confirm_password", $this->lang->line('confirm_password'));
        $this->set("tran_change_user_password", $this->lang->line('change_user_password'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_you_must_enter_new_password", $this->lang->line('you_must_enter_new_password'));
        $this->set("tran_the_password_length_should_be_greater_than_6", $this->lang->line('the_password_length_should_be_greater_than_6'));
        $this->set("tran_you_must_enter_your_current_password", $this->lang->line('you_must_enter_your_current_password'));
        $this->set("tran_you_must_enter_your_new_password_again", $this->lang->line('you_must_enter_your_new_password_again'));
        $this->set("tran_password_mismatch", $this->lang->line('password_mismatch'));
        $this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_you_must_enter_your_new_password", $this->lang->line('you_must_enter_your_new_password'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_you_must_enter_your_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_you_must_enter_your_new_password", $this->lang->line('you_must_enter_your_new_password'));
        $this->set("tran_you_must_enter_your_confirm_password", $this->lang->line('you_must_enter_your_confirm_password'));
        $this->set("tran_special_chars_not_allowed", $this->lang->line('special_chars_not_allowed'));

        $this->set("page_top_header", $this->lang->line('change_employee_password'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('change_employee_password'));
        $this->set("page_small_header", "");

        if ($this->input->post('change_pass_button')) {
            $emp_name = mysql_real_escape_string($this->input->post('user_name'));
            if ($this->employee_model->isUserNameAvailable($emp_name) && strlen($this->input->post('new_pwd')) >= 6) {
                if (strcmp($this->input->post('new_pwd'), $this->input->post('confirm_pwd')) == 0) {

                    $new_pswd = mysql_real_escape_string($this->input->post('new_pwd'));
                    $confirm_pswd = mysql_real_escape_string($this->input->post('confirm_pwd'));
                    $res = $this->employee_model->updatePassword($new_pswd, $emp_name);
                    if ($res) {
                        $msg = $this->lang->line('password_updated_successfully');
                        $this->redirect($msg, "employee/change_password", TRUE);
                    }
                } else {
                    $msg = $this->lang->line('password_mismatch');
                    $this->redirect($msg, "employee/change_password", FALSE);
                }
            } else {
                $msg = $this->lang->line("Invalid_UserName_or_new_password_is_too_short");
                $this->redirect($msg, "employee/change_password", FALSE);
            }
        }

        $this->setView();
    }

    function validate_pswd($password) {
        if (!preg_match('/^[a-z0-9A-Z]*$/', $password)) {

            return false;
        }
        else
            return true;
    }

}

?>