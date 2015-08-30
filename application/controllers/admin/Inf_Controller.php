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
  Date:
  Version:3.0
  www.ioss.in

 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inf_Controller extends CI_Controller {

    protected $table_prefix;
    public $LOG_USER_NAME = NULL;  //Logged usename
    public $LOG_USER_ID = NULL;    //Logged user Sytsem id
    public $LOG_USER_TYPE = NULL;  //Logged user  type admin or distributer or employee etc
    public $CURRENT_CTRL = NULL;   //Current Controller Class name
    protected $MENU_HTML = Null;
    protected $VIEW_DATA_ARR = array();
    protected $ARR_SCRIPT = array();
    protected $COMPANY_NAME;
    protected $MODULE_STATUS = array();
    protected $CURRENT_URL;
    protected $CURRENT_URL_FULL;
    static protected $LANG_ID;
    protected $MLM_PLAN;
    protected $SHUFFLE_STATUS;
    protected $HOME_URL;
    protected $LANG_STATUS;
    protected $HELP_STATUS;
    protected $STATCOUNTER_STATUS;
    protected $FOOTER_DEMO_STATUS;
    protected $CAPTCHA_STATUS;
   

    /*     * ****** Contructer of Class Inf_Controller************** */
    /* @Created By: Abdul Majeed
      Date:
      Version:3.0
      Desc:Initalise the sytsem fuction heret */
    /* @access	public
     * @param	No Parameter
     * @return	void
     */

    function __construct() {
        parent::__construct();


        $this->set("SESS_STATUS", FALSE);

        $controler_class = $this->router->class;
        $this->set("CURRENT_CTRL", $controler_class);
        $this->load->model('configuration_model');
        $this->LANG_ID = 1; //for default language--english 
        $this->CURRENT_URL_FULL = "login";
        $this->set("CURRENT_URL", $this->CURRENT_URL);
        $this->set("CURRENT_URL_FULL", $this->CURRENT_URL_FULL);
        $lang_arr = array();

        $this->load->model('menu', '', TRUE);   //LOAD Menu MODEL CLASS
        $this->setModuleStatus();
        $this->setLoggedUserData();
        //$this->session->set_userdata('langs', "1");
        //for language selector
        
        //$this->session->set_userdata('tran_language','french');
        $current_language = $this->session->userdata('tran_language');
        $this->set('current_language', $current_language);
        if ($current_language == "") {
            $this->session->set_userdata('lang_id', 1);
        }
        //end of language selector
        //session time-out----
        if ($controler_class != "time") {
            $this->session->set_userdata("user_page_load_time", time());
            $last_page_load_time = $this->session->userdata("user_page_load_time");
        }
        //session time-out ends----

        $this->set("CURRENT_URL", $this->CURRENT_URL);
        $this->set("CURRENT_URL_FULL", $this->CURRENT_URL_FULL);
        
        if ($controler_class == 'cron') {
            $this->load->model('cron_model');
        }

        if ($controler_class != "login" && $controler_class != "backup" && $controler_class != 'cron') {
            if ($controler_class != 'register' && $controler_class != 'register_board') {
                $this->checkAdminLoged();
            } else {
                $this->checkLoged();
                // $this->setUserDataToView();
            }


            if ($this->checkSession()) {

                $this->load->model('menu', '', TRUE);   //LOAD Menu MODEL CLASS
                $this->load->model('validation', '', TRUE);  //LOAD Validattion MODEL CLASS

                $this->set("SESS_STATUS", TRUE);

                $this->setModuleStatus();
                
                $this->menuPermitted();

                $this->setViewDataArray();           //SETTING VIEW DATA ARRAY-->-VIEW_DATA_ARR

                $this->autoLoadModelClass();         //AUTO LOAD MODEL CLASS

                $this->MENU_HTML = $this->menu->setMenu($this->CURRENT_URL); //SET MENU  

                $this->setLoggedUserData();          // Set Logged user data 

                $this->setHeaderMailBox();           //FOR COUNTING THE UNREAD MESSAGES

                $this->setLanguage();                //Set language selector

                $this->setHeaderContent();       //HEADER

                if($this->MODULE_STATUS['footer_demo_status']=="yes")
                {
                   $this->setUpgradeStatus();          //setting upgrade_cond
                }

                $this->setFooterContent();

                //SETTING FOOTER CONTENTS
            } //End of [if($this->checkSession())]
        }//End of [if($controler_class != "login")]


        $this->setFlashData();

        $this->setSiteInformation();  //for set site information
    }

//--------------------------------END OF CONSTRUCTOR------------------------------------------//


    /*     * ****** setViewDataArray************************** */
    /* @Created By: Abdul Majeed
      Date:03/04/2014
      Version:5.0
      Desc:Set the Array VIEW_DATA_ARR to the View part
      @access	public
     * @param	No Parameter
     * @return	void
     */
    public function setViewDataArray() {
        $logged_in_arr = $this->session->userdata('logged_in');
        $this->VIEW_DATA_ARR['sess_data'] = $logged_in_arr;
        $this->VIEW_DATA_ARR['COMPANY_NAME'] = $this->COMPANY_NAME;
        $this->VIEW_DATA_ARR['MODULE_STATUS'] = $this->MODULE_STATUS;
    }

//--------------------------------End setViewDataArray------------------------------------------//


    /*     * ****** Set Header Mail Selector Drop down ************** */
    /* @Created By: Niyas
      Date:03/04/2014
      Version:5.0
      Desc:Initalise the system fuction here */
    /* @access	public
     * @param	No Parameter
     * @return	void
     */

    public function setHeaderMailBox() {
        $this->load->model('home_model', '', TRUE);
        $user_type = $this->session->userdata['logged_in']['user_type'];
        $user_id = $this->session->userdata['logged_in']['user_id'];
        //$unread_mail_count = $this->home_model->getAllUnreadMessages($user_type);
        //echo "niy unread_msg---->".$unread_mail_count;
        $mail_content = $this->home_model->getUnreadMessages($user_type, $user_id);
        $unread_mail_count = count($mail_content);
        $this->set("tran_you_have_no_new_mail", $this->lang->line('you_have_no_new_mail'));
        $this->set("tran_see_all_messages", $this->lang->line('see_all_messages'));
        $this->set("unread_mail", $unread_mail_count);
        $this->set("mail_content", $mail_content);
    }

//--------------------------------End setHeaderMailBox------------------------------------------//


    /*     * **************  setLanguage ********************** */
    /* @Created By: Abdul Majeed
      Date:03/04/2014
      Version:5.0
      Desc:Set Header Language selector and Default langauge */
    /* @access	public
     * @param	No Parameter
     * @return	void
     */
    public function setLanguage() {
        $this->load->model('menu', '', TRUE);
        $current_language = $this->session->userdata('tran_language');
        $lang_arr = $this->menu->getAllLanguages();
        $this->set('lang_arr', $lang_arr);
        $this->session->set_userdata("lang_arr", $lang_arr);
        for ($i = 0; $i < count($lang_arr); $i++) {
            if ($current_language == $lang_arr[$i]['lang_name_in_english']) {
                $this->LANG_ID = $lang_arr[$i]['lang_id'];
            }
        }
        $this->set("LANG_ID", $this->LANG_ID);
    }

//-----------------------------------------End setLanguage----------------------------------------------//


    /*     * ****** autoLoadModelClass ************** */
    /* @Created By: Abdul Majeed
      Date:03/04/2014
      Version:5.0
      Desc:Set Header Language selector and Default langauget */
    /* @access	public
     * @param	No Parameter
     * @return	void
     */
    public function autoLoadModelClass() {
        $controler_class = $this->router->class;
        $controler_class_model = $controler_class . "_model";
        $controller_method = $this->router->method;

        $this->CURRENT_URL = "$controler_class/$controller_method";
        $this->CURRENT_URL_FULL = "";
        for ($i = 1; $i <= count($this->uri->segments); $i++) {
            if ($this->uri->segments[$i] != 'en' && $this->uri->segments[$i] != 'es' && $this->uri->segments[$i] != 'ch' && $this->uri->segments[$i] != 'pt' && $this->uri->segments[$i] != 'de'&& $this->uri->segments[$i] != 'fr' && $this->uri->segments[$i] != 'pl' && $this->uri->segments[$i] != 'it') {

                $this->CURRENT_URL_FULL.="" . $this->uri->segments[$i];

                if (($i + 1) <= count($this->uri->segments))
                    $this->CURRENT_URL_FULL.="/";
            }
        }

        $this->load->model($controler_class_model, '', TRUE);
        $this->set("CURRENT_URL", $this->CURRENT_URL);
        $this->set("CURRENT_URL_FULL", $this->CURRENT_URL_FULL);
    }

//------------------------------End autoLoadModelClass------------------------------------------//
    //********setLanguageStatus*************
    //***********Code added by Dijil Palakkal************start**********

    public function setModuleStatus() {
        $this->MODULE_STATUS = $this->menu->MODULE_STATUS;
        if ($this->MODULE_STATUS ['mlm_plan'] == "Board") {
            $this->SHUFFLE_STATUS = $this->MODULE_STATUS ['shuffle_status'];
        }
        $this->MLM_PLAN = $this->MODULE_STATUS ['mlm_plan'];
        $this->set('MLM_PLAN', $this->MODULE_STATUS ['mlm_plan']);
        $this->set("LANG_STATUS", $this->MODULE_STATUS ['lang_status']);
        $this->set("HELP_STATUS", $this->MODULE_STATUS ['help_status']);
        $this->set("STATCOUNTER_STATUS", $this->MODULE_STATUS ['statcounter_status']);
        $this->set("FOOTER_DEMO_STATUS", $this->MODULE_STATUS ['footer_demo_status']);
        $this->set("CAPTCHA_STATUS", $this->MODULE_STATUS ['captcha_status']);
        $chat_code='<div class=mod_mylivechat><script type="text/javascript" src="https://www.mylivechat.com/chatinline.aspx?hccid=90825524"></script></div>
<script>
if(!MyLiveChat.Departments[0]["Online"]){var $_Tawk_API={},$_Tawk_LoadStart=new Date();(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];s1.async=true;s1.src="https://embed.tawk.to/5465a1c8eebdcbe3576a5f8f/default";s1.charset="UTF-8";s1.setAttribute("crossorigin","*");s0.parentNode.insertBefore(s1,s0);})();$(".inpagebase").hide();};
</script>';
        $this->set("CHAT_CODE", $chat_code);
    }

    //--------------End ----------------

    /*     * ******setUpgradeStatus ************************** */
    /* @Created By: Abdul Majeed
      Date:03/04/2014
      Version:5.0
      Desc:Set Revamp Upgrade Status */
    /* @access	public
     * @param	No Parameter
     * @return	void
     */
    public function setUpgradeStatus() {
        $session_data = $this->session->userdata('logged_in');
        $table_prefix = $session_data['table_prefix'];
        $user_ref_id = str_replace("_", "", $table_prefix);
        $upgrade_cond = $this->menu->checkUpgrade($user_ref_id);
        $this->set('upgrade_cond', $upgrade_cond);
    }

//-----------------------------------------End setUpgradeStatus-------------------------------------//


    /*     * ***** ***************** setHeaderContent ************ ******* */
    /* @Created By: Abdul Majeed
      Date:03/04/2014
      Version:5.0
      Desc:Setting Software Common Header bar Contents */
    /* @access	public
     * @param	No Parameter
     * @return	void
     */
    public function setHeaderContent() {
        $this->set('tran_welcome', $this->lang->line("welcome"));
        $this->set("tran_dashboard", $this->lang->line('dashboard'));
        $this->set("tran_change_password", $this->lang->line('change_password'));
        $this->set("tran_profile_management", $this->lang->line('profile_management'));
        $this->set("tran_logout", $this->lang->line('logout'));
        $this->set("tran_select_language", $this->lang->line('select_language'));
    }

//-----------------------------------------End setHeaderContent---------------------------------//



    /*     * ***** ***************** setFooterContent ******************* */
    /* @Created By: Abdul Majeed
      Date:03/04/2014
      Version:5.0
      Desc:setFooterContent */
    /* @access	public
     * @param	No Parameter
     * @return	void
     */
    public function setFooterContent() {
        $this->set("tran_this_demo_can_customize_your_own_mlm_plan_with_fully_licensed_mode", $this->lang->line('this_demo_can_customize_your_own_mlm_plan_with_fully_licensed_mode'));
        $this->set("tran_once_the_demo_is_ready_you_can_simply_move_the_demo_to_your_own_domain_name", $this->lang->line('once_the_demo_is_ready_you_can_simply_move_the_demo_to_your_own_domain_name'));
        $this->set("tran_this_demo_will_be_automatically_deleted_after_48_hours_unless_upgraded", $this->lang->line('this_demo_will_be_automatically_deleted_after_48_hours_unless_upgraded'));
        $this->set("tran_you_can_upgrade_this_demo_to_one_month_or_can_purchase_the_software", $this->lang->line('you_can_upgrade_this_demo_to_one_month_or_can_purchase_the_software'));
        $this->set("tran_use_google_chrome_or_mozilla_firefox_for_better_view", $this->lang->line('use_google_chrome_or_mozilla_firefox_for_better_view'));
        $this->set("tran_please", $this->lang->line('please'));
        $this->set("tran_upgrade_now", $this->lang->line('upgrade_now'));
        $this->set("tran_click_here_to_upgrade", $this->lang->line('click_here_to_upgrade'));
        $this->set("tran_click_here_to_place_a_feedback_for_support", $this->lang->line('click_here_to_place_a_feedback_for_support'));
        $this->set("tran_website", $this->lang->line('website'));
        $this->set("tran_for_discussion_form", $this->lang->line('for_discussion_form'));
    }

//-----------------------------------------End setFooterContent---------------------------------------//


    /*     * ***** ***************** setFlashData ******************* */
    /* @Created By: Abdul Majeed
      Date:03/04/2014
      Version:5.0
      Desc:Setting Flash Data Message */
    /* @access	public
     * @param	No Parameter
     * @return	void
     */
    public function setFlashData() {

        $FLASH_ARR_MSG = $this->session->flashdata('MSG_ARR');
        if (isset($FLASH_ARR_MSG)) {

            $this->set("MESSAGE_DETAILS", $FLASH_ARR_MSG["MESSAGE"]["DETAIL"]);
            $this->set("MESSAGE_TYPE", $FLASH_ARR_MSG["MESSAGE"]["TYPE"]);
            $this->set("MESSAGE_STATUS", $FLASH_ARR_MSG["MESSAGE"]["STATUS"]);
        } else {
            $this->set("MESSAGE_STATUS", FALSE);
        }
    }

    /*     * ***************** setLoggedUserData *************** */
    /* @Created By: Abdul Majeed
      Date:03/04/2014
      Version:5.0
      Desc:This fuction is used set the loged user data to the view */
    /* @access	public
     * @param	No Parameter
     * @return	void
     */

    public function setLoggedUserData() {
        $session_data = $this->session->userdata('logged_in');
        $user_name = $session_data['user_name'];
        $user_id = $session_data["user_id"];
        $log_user_type = $session_data['user_type'];
        $user_details = $this->menu->getUserDetails($user_id);
        if($log_user_type=='admin')
        {
             
             $photo = $user_details['photo'];
             $name = $user_details['name'];
             $email = $user_details['email'];
             $this->set("email", $email);
             $this->set("photo", $photo);
        }
        //$name = $user_details['name'];
        //$email = $user_details['email'];
        $affiliates_count = $user_details['affiliates_count'];
        $status = $user_details['status'];
        //$photo = $user_details['photo'];
        $profile_pic = $this->menu->getProfilePic($user_id);
        

        if (!file_exists('public_html/images/profile_picture/' . $profile_pic)) {
            $profile_pic = "nophoto.jpg";
        }
        $this->LOG_USER_NAME = $user_name;
        $this->LOG_USER_ID = $user_id;
        $this->LOG_USER_TYPE = $log_user_type;


        /*         * ** Setting to the view *** */
        $this->set('username', $user_name);
        $this->set("user_type", $log_user_type);
        
        $this->set("affiliates_count", $affiliates_count);
        $this->set("status", $status);
        
        $this->set('profile_pic', $profile_pic);
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_new_affiliates", $this->lang->line('new_affiliates'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_mail_id", $this->lang->line('mail_id'));


        $this->set("usr_name", $user_name);
    }

//-----------------------------------------End setLoggedUserData---------------------------------------//

    /*     * ********************** setScripts *************************** */
    /* @Created By: Abdul Majeed
      Date:
      Version:3.0
      Desc:setScripts */
    /* @access	public
     * @param	No Parameter
     * @return	Ture/False
     */
    public function setScripts() {
        if (count($this->ARR_SCRIPT) > 0) {
            $this->VIEW_DATA_ARR['ARR_SCRIPT'] = $this->ARR_SCRIPT;
        }
    }

//-----------------------------------------End setScripts---------------------------------------//

    /*     * ********************** set *************************** */
    /* @Created By: Abdul Majeed
      Date:
      Version:3.0
      Desc:set to public array */
    /* @access	public
     * @param	No Parameter
     * @return	Ture/False
     */
    public function set($set_key, $set_value) {
        $this->VIEW_DATA_ARR[$set_key] = $set_value;
    }

    /*     * ********************** setView *************************** */
    /* @Created By: Abdul Majeed
      Date:
      Version:3.0
      Desc:THIS FUNCTION IS USDED TO SET THE DATA TO THE SMARTY VIEW PAGE */
    /* @access	public
     * @param	No Parameter
     * @return	Ture/False
     */

    public function setView() {
        $controler_class = $this->router->class;
        $controller_method = $this->router->method;
        $this->VIEW_DATA_ARR['menu_html'] = $this->MENU_HTML;

        if ($this->router->class == "register" || $this->router->class == "register_board" || $this->router->class == "login") {
            //register controller is common for both user and admin
            $this->smarty->view($controler_class . '/' . $controller_method . '.tpl', $this->VIEW_DATA_ARR);
        } else {
            $this->smarty->view("admin/" . $controler_class . '/' . $controller_method . '.tpl', $this->VIEW_DATA_ARR);
        }
    }

//-----------------------------------------End setView---------------------------------------//


    /*     * ********************* redirect  ************** */
    /* @Created By: Abdul Majeed
      Date:
      Version:3.0
      Desc:REDIRECT TO ANOTHER PAGE WITH FLASH MESSAGE */
    /* @access	public
     * @param	$msg --String 
     * @param	$page --String 
     * @param	$message_type --Ture/Fals
     * @return	Ture/False
     */
    public function redirect($msg, $page, $message_type = false, $MSG_ARR = array()) {

        $MSG_ARR["MESSAGE"]["DETAIL"] = $msg;
        $MSG_ARR["MESSAGE"]["TYPE"] = $message_type;
        $MSG_ARR["MESSAGE"]["STATUS"] = true;
        $bace = base_url();
        $this->session->set_flashdata('MSG_ARR', $MSG_ARR);

        if ($this->checkSession()) {
            $logged_in_arr = $this->session->userdata('logged_in');
            $user_type = $logged_in_arr['user_type'];
            if ($user_type == "admin" || $user_type == "employee") {
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
            redirect("$path", 'refresh');
        }
        exit();
    }

//-----------------------------------------End redirect---------------------------------------//

    public function setSiteInformation() {
        $this->load->model('validation', '', TRUE);
        $site_info = $this->validation->getSiteInformation();
        $this->COMPANY_NAME = $site_info['company_name'];
        $this->set("site_info", $site_info);
    }
    
//-----------------------------------------End getSiteInformation---------------------------------------//
    
    


    /*     * ************** checkAdminLoged *********** */
    /* @Created By: Abdul Majeed
      Date:
      Version:3.0
      Desc:This fuction is used set to check the admin login status- looged or not */
    /* @access	public
     * @param	No Parameter
     * @return	Ture/False
     */
    public function checkAdminLoged() {
        if ($this->checkSession()) {
            $user_type = $this->session->userdata['logged_in']['user_type']; 

            if ($user_type != "admin" && $user_type != "employee")
                $this->redirect("", "../user/home");
        } else {
            $base_url = base_url();
            $login_link = $base_url . "login";
            echo "You don't have permission to access this page. <a href='$login_link'>Login</a>";
            die();
        }
        return true;
    }

//-----------------------------------------End checkAdminLoged---------------------------------------//


    /*     * ************** checkLoged *********** */
    /* @Created By: Abdul Majeed
      Date:03/04/2014
      Version:3.0
      Desc:checkLoged */
    /* @access	public
     * @param	No Parameter
     * @return	Ture/False
     */
    public function checkLoged() {
        $base_url = base_url();
        $login_link = $base_url . "login";

        if (!$this->checkSession()) {
            echo "You don't have permission to access this page. <a href='$login_link'>Login</a>";
            die();
        } else {
            $this->redirect("", "../admin/home");
        }
        return true;
    }

//-----------------------------------------End checkLoged---------------------------------------//

    /*     * ********************** checkSession *************************** */
    /* @Created By: Abdul Majeed
      Date:
      Version:3.0
      Desc:checkSession */
    /* @access	public
     * @param	No Parameter
     * @return	Ture/False
     */
    public function checkSession() {
        $flag = false;
        $is_logged_in = $this->session->userdata('logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            $flag = false;
        } else {
            $flag = true;
        }
        return $flag;
    }

//-----------------------------------------End checkSession---------------------------------------//


    ///////-------Code added by Dijil Palakkal-////////
    public function menuPermitted()
    {
       
         if ($this->session->userdata['logged_in']['user_type'] == 'employee') {
            $user_id = $this->session->userdata['logged_in']['user_id'];
            $segment='';
            if (isset($this->CURRENT_URL) && $this->CURRENT_URL!='home/index')
            { $segment = $this->CURRENT_URL;

            $this->load->model('profile_model');

            if ($segment != 'home') {
                $menu_avilable=$this->profile_model->menuPresent($segment);
                 //echo $menu_avilable."=".$segment;die();
                if($menu_avilable){
                $status = $this->profile_model->getPermittedMenus($user_id, $segment);
               
                if (!$status) {
                    $msg="you don't have permission to access this page";
                    $this->redirect($msg, 'home', false);
                }
               }
            }
            }
        }
    }
    /////////////////End Of menuPermitted///////////////////
    
}

?>
