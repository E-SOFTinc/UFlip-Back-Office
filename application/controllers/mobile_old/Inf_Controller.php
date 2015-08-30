<?php

/*
 * You can modify this class
 */
/**
 * Description of Settings Class
 * THIS CLASS IS THE ROOT OF ALL CONTROLLER 
 * THIS CLASS CREATED BY EXTENDING CODIGNATOR CI_Contoller CLASS 
 * HERE WE INITIALISE ALL THE COMMON VARIABLES USED IN THE SOFTWARE 
 * LIKE MENU, TABLE PREFIX, Validation Class etc
 *
 * @author Abdul Majeed.P - 9946605558
  CSA Of IOSS
  www.ioss.in
 */
//session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inf_Controller extends CI_Controller {

    protected $table_prefix;
    public $LOG_USER_NAME = NULL;
    public $LOG_USER_ID = NULL;
    public $LOG_USER_TYPE = NULL;
    public $CURRENT_CTRL = NULL;
    protected $MENU_HTML = Null;
    protected $VIEW_DATA_ARR = array();
    protected $ARR_SCRIPT = array();
    protected $COMPANY_NAME;
    protected $MODULE_STATUS = array();
    protected $CURRENT_URL;
    protected $CURRENT_URL_FULL;
    protected $LANG_ID;
    protected $MLM_PLAN;
    protected $SHUFFLE_STATUS;

    function __construct() {
        parent::__construct();

        $this->set("SESS_STATUS", FALSE);
        $controler_class = $this->router->class;
        $this->set("CURRENT_CTRL", $controler_class);

        //////CODE EDITED BY JIJI---FROM HERE---///////
        $this->LANG_ID = 1; //for default language--english 
        $this->CURRENT_URL = "home/index"; //default url--home page
        $this->CURRENT_URL_FULL = "home/index";
        $lang_arr = array();

        //for language selector
        $current_language = $this->session->userdata('language');
        $this->set('current_language', $current_language);
        //end of language selector
        //////CODE EDITED BY JIJI---UPTO HERE---///////

        if ($controler_class != "login" && $controler_class != "backup") {

            if ($controler_class != 'register' && $controler_class != 'register_board') {
               // $this->checkAdminLoged();
            } else {
               // $this->checkLoged();

                ///////////////////////////CODE ADDED BY JIJI----------for board_register of user
                $this->load->model('menu', '', TRUE);
                //$session_data = $this->session->userdata('logged_in');
                $user_id = $this->input->post('userid');
                $user_details = $this->menu->getUserDetails($user_id);
                $name = $user_details['name'];
                $email = $user_details['email'];
                $affiliates_count = $user_details['affiliates_count'];
                $status = $user_details['status'];
                $photo = $user_details['photo'];
                $this->set("usr_name", $name);
                $this->set("email", $email);
                $this->set("affiliates_count", $affiliates_count);
                $this->set("status", $status);
                $this->set("photo", $photo);

                $this->set("tran_status", $this->lang->line('status'));
                $this->set("tran_new_affiliates", $this->lang->line('new_affiliates'));
                $this->set("tran_name", $this->lang->line('name'));
                $this->set("tran_mail_id", $this->lang->line('mail_id'));
                //////CODE ADDED BY JIJI---UPTO HERE---///////
            }

            if ($this->checkSession()) {

                $logged_in_arr = $this->session->userdata('logged_in');
                $this->LOG_USER_NAME = $logged_in_arr['user_name'];
                $this->LOG_USER_ID = $logged_in_arr['user_id'];
                $this->LOG_USER_TYPE = $logged_in_arr['user_type'];

                $this->set("SESS_STATUS", TRUE);
                $this->load->model('validation', '', TRUE);
                $this->load->model('menu', '', TRUE);
                $this->MODULE_STATUS = $this->menu->MODULE_STATUS;

                //////CODE EDITED BY JIJI---FROM HERE---///////
                $this->MLM_PLAN = $this->MODULE_STATUS ['mlm_plan'];

                if ($this->MLM_PLAN == "Board")
                    $this->SHUFFLE_STATUS = $this->MODULE_STATUS ['shuffle_status'];

                $this->set('MLM_PLAN', $this->MLM_PLAN);
                //////CODE EDITED BY JIJI---UPTO HERE---///////
                // <--------AUTO LOAD MODEL CLASS----->
                $controler_class = $this->router->class;
                $controler_class_model = $controler_class . "_model";
                $controller_method = $this->router->method;

                $this->CURRENT_URL = "$controler_class/$controller_method";
                /////////////////if there are any variables passed through url
                $this->CURRENT_URL_FULL = "";
                for ($i = 1; $i <= count($this->uri->segments); $i++) {
                    if ($this->uri->segments[$i] != 'en' && $this->uri->segments[$i] != 'es' && $this->uri->segments[$i] != 'ch' && $this->uri->segments[$i] != 'pt' && $this->uri->segments[$i] != 'de') {

                        $this->CURRENT_URL_FULL.="" . $this->uri->segments[$i];
                        if (($i + 1) <= count($this->uri->segments))
                            $this->CURRENT_URL_FULL.="/";
                    }
                    //echo "<br>url>" . $this->CURRENT_URL_FULL;
                }
                ////////////////////

                $this->load->model($controler_class_model, '', TRUE);
                // <--------END OF AUTO LOAD MODEL CLASS----->

                $this->MENU_HTML = $this->setMenu();
                $this->VIEW_DATA_ARR['sess_data'] = $this->session->userdata('logged_in');
                $this->VIEW_DATA_ARR['COMPANY_NAME'] = $this->COMPANY_NAME;
                $this->VIEW_DATA_ARR['MODULE_STATUS'] = $this->MODULE_STATUS;
                $this->VIEW_DATA_ARR['HELP_STATUS'] = TRUE;

                $profile_pic = $this->menu->getProfilePic($logged_in_arr['user_id']);
                $this->set('profile_pic', $profile_pic);

                //setting upgrade_cond
                $session_data = $this->session->userdata('logged_in');
                $table_prefix = $session_data['table_prefix'];
                $user_ref_id = str_replace("_", "", $table_prefix);
                $upgrade_cond = $this->menu->checkUpgrade($user_ref_id);
                $this->set('upgrade_cond', $upgrade_cond);
                //end of setting upgrade_cond
                //////CODE EDITED BY JIJI---FROM HERE---///////for language selector
                $lang_arr = $this->menu->getAllLanguages();
                $this->set('lang_arr', $lang_arr);
                $this->session->set_userdata("lang_arr", $lang_arr);
                //////CODE EDITED BY JIJI---UPTO HERE---///////
            } //End of [if($this->checkSession())]
        }//End of [if($controler_class != "login")]
        //<-------SETTING FLASH MESSAGE----------->
        $FLASH_ARR_MSG = $this->session->flashdata('MSG_ARR');

        if (isset($FLASH_ARR_MSG)) {

            $this->set("MESSAGE_DETAILS", $FLASH_ARR_MSG["MESSAGE"]["DETAIL"]);
            $this->set("MESSAGE_TYPE", $FLASH_ARR_MSG["MESSAGE"]["TYPE"]);
            $this->set("MESSAGE_STATUS", $FLASH_ARR_MSG["MESSAGE"]["STATUS"]);
        } else {
            $this->set("MESSAGE_STATUS", FALSE);
        }
        //<-------END FLASH MESSAGE-----------> 
        //////CODE EDITED BY JIJI---FROM HERE---///////for language selector
        for ($i = 0; $i < count($lang_arr); $i++) {
            // ECHO "<BR/>" . $current_language . "==" . $lang_arr[$i]['lang_name_in_english'];
            if ($current_language == $lang_arr[$i]['lang_name_in_english']) {
                $this->LANG_ID = $lang_arr[$i]['lang_id'];
            }
        }

        $this->set("CURRENT_URL", $this->CURRENT_URL);
        $this->set("CURRENT_URL_FULL", $this->CURRENT_URL_FULL);
        //echo "currnet ur full".$this->CURRENT_URL_FULL;
        $this->set("LANG_ID", $this->LANG_ID);
        //////CODE EDITED BY JIJI---UPTO HERE---///////
        //setting username
        $session_data = $this->session->userdata('logged_in');
        $user_name = $session_data['user_name'];
        $this->set('username', $user_name);
        //END of  setting username
        //LANGUAGE TRANSLATION//
        //HEADER
        $this->set('tran_welcome', $this->lang->line("welcome"));
        $this->set("tran_dashboard", $this->lang->line('dashboard'));
        $this->set("tran_change_password", $this->lang->line('change_password'));
        $this->set("tran_profile_management", $this->lang->line('profile_management'));
        $this->set("tran_logout", $this->lang->line('logout'));
        $this->set("tran_select_language", $this->lang->line('select_language'));
        //END OF HEADER
        //FOOTER
        $this->set("tran_this_demo_can_customize_your_own_mlm_plan_with_fully_licensed_mode", $this->lang->line('this_demo_can_customize_your_own_mlm_plan_with_fully_licensed_mode'));
        $this->set("tran_once_the_demo_is_ready_you_can_simply_move_the_demo_to_your_own_domain_name", $this->lang->line('once_the_demo_is_ready_you_can_simply_move_the_demo_to_your_own_domain_name'));
        $this->set("tran_this_demo_will_be_automatically_deleted_after_48_hours_unless_upgraded", $this->lang->line('this_demo_will_be_automatically_deleted_after_48_hours_unless_upgraded'));
        $this->set("tran_you_can_upgrade_this_demo_to_one_month_or_can_purchase_the_software", $this->lang->line('you_can_upgrade_this_demo_to_one_month_or_can_purchase_the_software'));
        $this->set("tran_use_google_chrome_or_mozilla_firefox_for_better_view", $this->lang->line('use_google_chrome_or_mozilla_firefox_for_better_view'));
        $this->set("tran_please", $this->lang->line('please'));
        $this->set("tran_click_here_to_upgrade", $this->lang->line('click_here_to_upgrade'));
        $this->set("tran_click_here_to_place_a_feedback_for_support", $this->lang->line('click_here_to_place_a_feedback_for_support'));
        $this->set("tran_website", $this->lang->line('website'));
        $this->set("tran_for_discussion_form", $this->lang->line('for_discussion_form'));
        //END OF FOOTER
        //END OF LANGUAGE TRANSLATION//
        // $this->set('SESS_STATUS', '0');
        $this->COMPANY_NAME = $this->getSiteInformation();
    }

    public function setMenu() {

        $path_root_reg = base_url();
        $path_root = base_url();
        $menu_html = "";
        $image_path = $path_root . "public_html/images/";

        $user_type = $this->session->userdata['logged_in']['user_type'];
        if ($user_type == "admin")
            $path_root = $path_root . "admin/";
        else
            $path_root = $path_root . "user/";

        $menu_item = $this->menu->getMainMenuItems();

        $len = count($menu_item);
        $Session_module_arr = array();
        if ($this->session->userdata("module_status")) {
            $Session_module = $this->session->userdata("module_status");
            $Session_module_arr = explode(",", $Session_module);
            //print_r($Session_module_arr);
        }

        $menu_html .="<div id='jqxWidget' style='height: 300px;'>
                        <div id='jqxMenu' style='visibility:'>
                            <ul>";

        for ($i = 0; $i < $len; $i++) {

            $menu_id = $menu_item["detail$i"]["id"];
            $menu_text = $menu_item["detail$i"]["text"];
            $menu_link = $menu_item["detail$i"]["link"];
            $menu_image = $menu_item["detail$i"]["image"];
            $menu_status = $menu_item["detail$i"]["status"];
            $menu_perm_admin = $menu_item["detail$i"]["perm_admin"];
            $menu_perm_emp = $menu_item["detail$i"]["perm_emp"];
            $menu_perm_dist = $menu_item["detail$i"]["perm_dist"];

            $row_item["perm_admin"] = $menu_perm_admin;
            $row_item["perm_emp"] = $menu_perm_emp;
            $row_item["perm_dist"] = $menu_perm_dist;


            if (($menu_status == "yes") && ($this->menu->getMenuItemStatus($user_type, $row_item, $menu_id, $Session_module_arr)
                    || $menu_link == "login/logout" || $menu_link == "#")) {

                $count_sub_menu_item = $this->menu->getUserSubMenuItemCount($menu_id, $user_type);
                if ($user_type == "employee") {
                    if ($this->menu->getMenuItemStatus($user_type, $row_item, $menu_id, $Session_module_arr)) {
                        $emp_main_menu_status = true;
                    } else {
                        $assigned_sub_menu = $this->menu->getAssignedSubmenuCount($menu_id, $Session_module_arr);
                        // print_r($assigned_sub_menu);
                        $count_assigned_sub_menu = count($assigned_sub_menu);

                        $count_sub_menu_item = $count_assigned_sub_menu;
                        if (($count_sub_menu_item > 0) && ( $count_assigned_sub_menu > 0)) {
                            $emp_main_menu_status = true;
                        } else {
                            $emp_main_menu_status = false;
                        }
                    }
                } else {
                    $emp_main_menu_status = true;
                }

                if ($count_sub_menu_item < 1) {
                    $class = 'menuitem';
                } else {
                    //echo "SUB-> $count_sub_menu_item";
                    //$con_html = "<div id='con3'>\n";
                    $class = 'menuitem submenuheader';
                }

                if ($user_type == "distributor") {
                    $flag = $this->menu->getMenuItemStatus($user_type, $row_item, $menu_id);
                    if ($flag) {


                        if ($menu_link == 'Configuration/my_referal') {
                            if ($this->MODULE_STATUS["referal_status"] == 'yes') {
                                $menu_text = $this->lang->line($menu_id . "_" . $menu_link); //for language translation
                                if ($menu_link == "#") {
                                    $menu_link = "home";
                                }
                                $menu_html.="<li>
                                                <img src='" . $image_path . $menu_image . "' />
                                                <span>
                                                    <a href= '{$path_root}$menu_link'>$menu_text</a>
                                                </span>";
                            }
                        } else if ($menu_link == 'register_board/user_register') {
                            $menu_text = $this->lang->line($menu_id . "_" . $menu_link); //for language translation
                            if ($menu_link == "#") {
                                $menu_link = "home";
                            }

                            $menu_html.="<li>
                                                <img src='" . $image_path . $menu_image . "' />
                                                <span>
                                                    <a href= '{$path_root_reg}$menu_link'>$menu_text</a>
                                                </span>";
                        } else if ($menu_link == 'register/user_register') {
                            $menu_text = $this->lang->line($menu_id . "_" . $menu_link); //for language translation
                            if ($menu_link == "#") {
                                $menu_link = "home";
                            }

                            $menu_html.="<li>
                                                <img src='" . $image_path . $menu_image . "' />
                                                <span>
                                                    <a href= '{$path_root_reg}$menu_link'>$menu_text</a>
                                                </span>";
                        } else {
                            $menu_text = $this->lang->line($menu_id . "_" . $menu_link); //for language translation
                            if ($menu_link == "#") {
                                $menu_link = "home";
                            }
                            $menu_html.="<li>
                                                <img src='" . $image_path . $menu_image . "' />
                                                <span>
                                                    <a href= '{$path_root}$menu_link'>$menu_text</a>
                                                </span>";
                        }
                    }
                } else {

                    $flag = TRUE;
                    if ($menu_link == 'Configuration/my_referal') {
                        if ($this->MODULE_STATUS["referal_status"] == 'yes') {
                            $menu_text = $this->lang->line($menu_id . "_" . $menu_link); //for language translation
                            if ($menu_link == "#") {
                                $menu_link = "home";
                            }
                            $menu_html.="<li>
                                                <img src='" . $image_path . $menu_image . "' />
                                                <span>
                                                    <a href= '{$path_root}$menu_link'>$menu_text</a>
                                                </span>";
                        }
                    } else if ($menu_link == 'register_board/user_register') {
                        $menu_text = $this->lang->line($menu_id . "_" . $menu_link); //for language translation
                        if ($menu_link == "#") {
                            $menu_link = "home";
                        }

                        $menu_html.="<li>
                                                <img src='" . $image_path . $menu_image . "' />
                                                <span>
                                                    <a href= '{$path_root_reg}$menu_link'>$menu_text</a>
                                                </span>";
                    } else if ($menu_link == 'register/user_register') {
                        $menu_text = $this->lang->line($menu_id . "_" . $menu_link); //for language translation
                        if ($menu_link == "#") {
                            $menu_link = "home";
                        }

                        $menu_html.="<li>
                                                <img src='" . $image_path . $menu_image . "' />
                                                <span>
                                                    <a href= '{$path_root_reg}$menu_link'>$menu_text</a>
                                                </span>";
                    } else {
                        $menu_text = $this->lang->line($menu_id . "_" . $menu_link); //for language translation
                        if ($emp_main_menu_status) {
                            if ($menu_link == "#") {
                                $menu_link = "home";
                            }
                            $menu_html.="<li>
                                                <img src='" . $image_path . $menu_image . "' />
                                                <span>
                                                    <a href= '{$path_root}$menu_link'>$menu_text</a>
                                                </span>";
                        }
                    }
                }

                if ($count_sub_menu_item > 0 && $flag) {
                    $sub_menu_item = $this->menu->getSubMenuItem($menu_id, $user_type);

                    $sub_len = count($sub_menu_item);
                    //$menu_html .= $con_html;
                    $menu_html .= "<ul>";

                    for ($j = 0; $j < $sub_len; $j++) {
                        $sub_menu_link = $sub_menu_item["detail$j"]["link"];
                        $sub_menu_text = $sub_menu_item["detail$j"]["text"];
                        $sub_menu_image = $sub_menu_item["detail$j"]["sub_image"];
                        $sub_menu_id = $sub_menu_item["detail$j"]["id"];
                        $sub_menu_status = $sub_menu_item["detail$j"]["status"];
                        $sub_menu_perm_admin = $sub_menu_item["detail$j"]['perm_admin'];
                        $sub_menu_perm_emp = $sub_menu_item["detail$j"]['perm_emp'];
                        $sub_menu_perm_dist = $sub_menu_item["detail$j"]['perm_dist'];

                        $sub_row_item["perm_admin"] = $sub_menu_perm_admin;
                        $sub_row_item["perm_emp"] = $sub_menu_perm_emp;
                        $sub_row_item["perm_dist"] = $sub_menu_perm_dist;

                        if ($user_type == "employee") {
                            if ($count_assigned_sub_menu > 0) {
                                $check = $menu_id . "#" . $sub_menu_id;
                                if (in_array($check, $assigned_sub_menu)) {
                                    if (($i == 0) && ($j == 0)) {
                                        $encr_id = $this->menu->getEncrypt($this->session->userdata['logged_in']['user_id']);
                                        $sub_menu_text = $this->lang->line($menu_id . "_" . $sub_menu_id . "_" . $sub_menu_link); //for language translation
                                        //$menu_html .= "<li><a href='{$path_root}tree/tree_view/id:$encr_id'> $sub_menu_text</a></li>\n";
                                        $menu_html.="<li>
                                                <img src='" . $image_path . $sub_menu_image . "' />
                                                <span>
                                                    <a href='{$path_root}tree/tree_view/id:$encr_id'> $sub_menu_text</a>
                                                </span>
                                             </li>";
                                    } else {
                                        $sub_menu_text = $this->lang->line($menu_id . "_" . $sub_menu_id . "_" . $sub_menu_link); //for language translation
                                        //$menu_html .= "<li><a href='{$path_root}$sub_menu_link'> $sub_menu_text</a></li>\n";
                                        $menu_html.="<li>
                                                <img src='" . $image_path . $sub_menu_image . "' />
                                                <span>
                                                    <a href='{$path_root}$sub_menu_link'> $sub_menu_text</a>
                                                </span>
                                             </li>";
                                    }
                                }
                            }
                        } else {
                            if ($this->menu->getMenuItemStatus($user_type, $sub_row_item, $sub_menu_id, $Session_module_arr, $menu_id)) {
                                if (($i == 0) && ($j == 0)) {
                                    $encr_id = $this->getEncrypt($this->session->userdata['logged_in']['user_id']);
                                    $sub_menu_text = $this->lang->line($menu_id . "_" . $sub_menu_id . "_" . $sub_menu_link); //for language translation
                                    //$menu_html .= "<li><a href='{$path_root}tree/tree_view/id:$encr_id'> $sub_menu_text</a></li>\n";
                                    $menu_html.="<li>
                                                <img src='" . $image_path . $sub_menu_image . "' />
                                                <span>
                                                    <a href='{$path_root}tree/tree_view/id:$encr_id'> $sub_menu_text</a>
                                                </span>
                                             </li>";
                                } else {
                                    //echo "<br/>" . $sub_menu_id . "_" . $menu_id . "_" . $sub_menu_link;
                                    $sub_menu_text = $this->lang->line($menu_id . "_" . $sub_menu_id . "_" . $sub_menu_link); //for language translation
                                    //$menu_html .= "<li><a href='{$path_root}$sub_menu_link'> $sub_menu_text</a></li>\n";
                                    $menu_html.="<li>
                                                <img src='" . $image_path . $sub_menu_image . "' />
                                                <span>
                                                    <a href='{$path_root}$sub_menu_link'> $sub_menu_text</a>
                                                </span>
                                             </li>";
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

        $menu_html .= "</ul></div></div>";
        // echo "<br/>menu-->" . $menu_html;
        return $menu_html;
    }

    public function checkAdminLoged() {
        if ($this->checkSession()) {
            $logged_in_arr = $this->session->userdata('logged_in');
            $is_logged_in = $logged_in_arr['is_logged_in'];
            $user_type = $logged_in_arr['user_type'];
            $user_mlm_plan = $this->session->userdata('mlm_plan');

            if ($user_mlm_plan == 'Binary' || $user_mlm_plan == 'Board') {
                if ($user_type != "admin")
                    $this->redirect("", "../user/home");
            }
            else
                $this->redirect("", "../../matrix/admin/home");
        } else {
            $base_url = base_url();
            $login_link = $base_url . "login";
            echo "You don't have permission to access this page. <a href='$login_link'>Login</a>";
            die();
        }
        return true;
    }

    public function checkLoged() {
        $base_url = base_url();
        $login_link = $base_url . "login";

        if (!$this->checkSession()) {
            echo "You don't have permission to access this page. <a href='$login_link'>Login</a>";
            die();
        } else {
            $user_mlm_plan = $this->session->userdata('mlm_plan');
            if ($user_mlm_plan != 'Binary' && $user_mlm_plan != 'Board') {
                $this->redirect("", "../admin/home");
            }
        }
        return true;
    }

    public function checkSession() {
        $flag = false;
        $logged_in = $this->session->userdata('logged_in');
        $is_logged_in = $this->session->userdata('logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            $flag = false;
        } else {
            $flag = true;
        }
        return $flag;
    }

    public function setScripts() {
        if (count($this->ARR_SCRIPT) > 0) {
            $this->VIEW_DATA_ARR['ARR_SCRIPT'] = $this->ARR_SCRIPT;
        }
    }

    public function set($set_key, $set_value) {
        $this->VIEW_DATA_ARR[$set_key] = $set_value;
    }

    // <--- THIS FUNCTION IS USDED TO SET THE DATA TO THE SMARTY VIEW PAGE-->
    public function setView() {
        $controler_class = $this->router->class;
        $controller_method = $this->router->method;
        $this->VIEW_DATA_ARR['menu_html'] = $this->MENU_HTML;

        /* if(count($this->VIEW_DATA_ARR)>0)
          { */
        //print_r($this->VIEW_DATA_ARR);
        //echo $controler_class.'/'.$controller_method.'.tpl';
        if ($this->router->class == "register" || $this->router->class == "register_board" || $this->router->class == "login") {
            //register controller is common for both user and admin
            $this->smarty->view($controler_class . '/' . $controller_method . '.tpl', $this->VIEW_DATA_ARR);
        } else {
            $this->smarty->view("admin/" . $controler_class . '/' . $controller_method . '.tpl', $this->VIEW_DATA_ARR);
        }

        /* }else
          {
          echo "Error no view loaded...";
          } */
    }

    // <--- REDIRECT TO ANOTHER PAGE WITH FLASH MESSAGE-->
    public function redirect($msg, $page, $message_type = false, $MSG_ARR = array()) {

        $MSG_ARR["MESSAGE"]["DETAIL"] = $msg;
        $MSG_ARR["MESSAGE"]["TYPE"] = $message_type;
        $MSG_ARR["MESSAGE"]["STATUS"] = true;
        $bace = base_url();
        $this->session->set_flashdata('MSG_ARR', $MSG_ARR);

        if ($this->checkSession()) {
            $logged_in_arr = $this->session->userdata('logged_in');
            $user_type = $logged_in_arr['user_type'];
            if ($user_type == "admin") {
                $path = $bace . "admin/" . $page;
                //header("Location:$path");
                redirect("$path", 'refresh');
            } else {
                $path = $bace . "user/" . $page;
                //header("Location:$path");
                redirect("$path", 'refresh');
            }
        } else {
            $path = $bace . "admin/" . $page;
            //header("Location:$path");
            redirect("$path", 'refresh');
        }
    }

    public function getSiteInformation() {
        $this->load->model('validation', '', TRUE);
        if ($this->checkSession()) {
            $site_title = $this->validation->getSiteInformation();
        } else {
            $site_title = $this->validation->getDefaultInformation();
        }
        return $site_title;
    }

}

?>
