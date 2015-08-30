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
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inf_Controller extends CI_Controller {

    protected $table_prefix;
    public $LOG_USER_NAME = NULL;  //Logged usename
    public $LOG_USER_ID = NULL;   //Logged user Sytsem id
    public $LOG_USER_TYPE = NULL;  //Logged user  type admin or distributer or employee etc
    public $CURRENT_CTRL = NULL;   //Current Controller Class name
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
    protected $LANG_STATUS;
    protected $HELP_STATUS;
    protected $STATCOUNTER_STATUS;
    protected $FOOTER_DEMO_STATUS;

    /*     * ****** Contructer of Class Inf_Controller************** */
    /* @access    public
     * @param    No Parameter
     * @return    void
     */

    function __construct() {
        parent::__construct();

        $this->set("SESS_STATUS", FALSE);

        $controler_class = $this->router->class;
        $this->set("CURRENT_CTRL", $controler_class);

        //////CODE EDITED BY JIJI---FROM HERE---///////
        $this->LANG_ID = 1; //for default language--english
        $this->CURRENT_URL = "home/index"; //default url--home page
        $this->CURRENT_URL_FULL = "home/index"; //default url--home page
        $lang_arr = array();
        
        $session_data = $this->session->userdata('logged_in');
        $username = $session_data["user_name"];
        $this->set('username', $username);

        $this->load->model('menu', '', TRUE);   //LOAD Menu MODEL CLASS
        $this->setModuleStatus();
        $this->setLoggedUserData();
        //for language selector
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
        $current_page = $this->router->class . '/' . $this->router->method;
        
        if ($controler_class == 'register') {
            $this->load->model('register_model');
            $this->setModuleStatus();
            $this->setLanguage();     //Set language selector
            $this->set("CURRENT_URL", $this->CURRENT_URL);
            $this->set("CURRENT_URL_FULL", $this->CURRENT_URL_FULL);
            $this->setFlashData();
            //$this->setLoggedUserData();      // Set Logged user data 
        }
        
        if ($controler_class != "login") {
           if ($controler_class != 'register') {
                $this->checkUserLoged();
            } else if ($this->checkSession()) {
                $this->checkLoged();
            }

            if ($this->checkSession()) {
                $this->set("SESS_STATUS", TRUE);
                $this->load->model('validation', '', TRUE);
                $this->load->model('menu', '', TRUE);

                //////CODE EDITED BY JIJI---FROM HERE---///////
                $this->setModuleStatus();

                //////CODE EDITED BY JIJI---UPTO HERE---///////

                $this->autoLoadModelClass();     //AUTO LOAD MODEL CLASS

                $this->setViewDataArray();       //SETTING VIEW DATA ARRAY-->-VIEW_DATA_ARR

                $this->menuPermitted();

                $this->MENU_HTML = $this->menu->setMenu($this->CURRENT_URL);   //SET MENU

                $this->setLoggedUserData();      // Set Logged user data

                $this->setLanguage();     //Set language selector

                $this->setHeaderContent();       //HEADER

                $this->setHeaderMailBox();       //FOR COUNTING THE UNREAD MESSAGES

                $this->setFooterContent();    //SETTING FOOTER CONTENTS       

                if ($this->MODULE_STATUS['footer_demo_status'] == "yes") {
                    $this->setUpgradeStatus();   //setting upgrade_cond
                }
            } //End of [if($this->checkSession())]
        }//End of [if($controler_class != "login")]

        $this->setFlashData();

        $this->setSiteInformation();

        $this->set("CURRENT_URL", $this->CURRENT_URL);
        $this->set("CURRENT_URL_FULL", $this->CURRENT_URL_FULL);

        if ($controler_class == 'shopping') {
            $this->set("tran_Shopping_Cart", $this->lang->line("Shopping_Cart"));
            $this->set("tran_Total_Items", $this->lang->line("Total_Items"));
            $this->set("tran_Amount", $this->lang->line("amount"));
            $this->set("tran_Home", $this->lang->line("Home"));
            $this->set("tran_View_Cart", $this->lang->line("View_Cart"));
        }
    }

    //--------------------------------END OF CONSTRUCTOR------------------------------------------//

    /*     * **** Setting Software Footer Contents ****** */

    public function setFooterContent() {
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
    }

    //-----------------------------------------End setFooterContent---------------------------------------//

    /*     * *****Setting Software Common Header bar Contents ******* */
    public function setHeaderContent() {
        $this->set('tran_welcome', $this->lang->line("welcome"));
        $this->set("tran_dashboard", $this->lang->line('dashboard'));
        $this->set("tran_change_password", $this->lang->line('change_password'));
        $this->set("tran_profile_management", $this->lang->line('profile_management'));
        $this->set("tran_logout", $this->lang->line('logout'));
        $this->set("tran_select_language", $this->lang->line('select_language'));
    }

    ////////-----------------------------------------End setHeaderContent---------------------------------//
    //******************code added by Dijil Palakkal************start*****
    public function setModuleStatus() {
        $this->MODULE_STATUS = $this->menu->MODULE_STATUS;
        if ($this->MODULE_STATUS ['mlm_plan'] == "Board")
            $this->SHUFFLE_STATUS = $this->MODULE_STATUS ['shuffle_status'];
        $this->MLM_PLAN = $this->MODULE_STATUS ['mlm_plan'];
        $this->set('MLM_PLAN', $this->MODULE_STATUS ['mlm_plan']);
        $this->set("HELP_STATUS", $this->MODULE_STATUS['help_status']);
        $this->set("STATCOUNTER_STATUS", $this->MODULE_STATUS['statcounter_status']);
        $this->set("LANG_STATUS", $this->MODULE_STATUS['lang_status']);
        $this->set("FOOTER_DEMO_STATUS", $this->MODULE_STATUS['footer_demo_status']);
        $chat_code = '<div class=mod_mylivechat><script type="text/javascript" src="https://www.mylivechat.com/chatinline.aspx?hccid=90825524"></script></div>
<script>
if(!MyLiveChat.Departments[0]["Online"]){var $_Tawk_API={},$_Tawk_LoadStart=new Date();(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];s1.async=true;s1.src="https://embed.tawk.to/5465a1c8eebdcbe3576a5f8f/default";s1.charset="UTF-8";s1.setAttribute("crossorigin","*");s0.parentNode.insertBefore(s1,s0);})();$(".inpagebase").hide();};
</script>';
        $this->set("CHAT_CODE", $chat_code);
    }

    //--------------------end code------------
    //<-***************SETTING FLASH MESSAGE******************-->
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

    //************code added by Dijil Palakkal****************
    //---------------------end----------------
    //<-------END FLASH MESSAGE----------->

    /*     * ******* This fuction is used set the loged user data to the view ******** */
    /* @access    public
     * @param    No Parameter
     * @return    void
     */
    public function setLoggedUserData() {
        $session_data = $this->session->userdata('logged_in');
        $user_name = $session_data['user_name'];
        $this->set('username', $user_name);
        $log_user_type = $session_data['user_type'];
        $logged_in_arr = $this->session->userdata('logged_in');
        $user_id = $logged_in_arr['user_id'];
        $user_details = $this->menu->getUserDetails($user_id);
        if ($log_user_type == 'user') {

            $photo = $user_details['photo'];
            $name = $user_details['name'];
            $email = $user_details['email'];
            $this->set("email", $email);
            $this->set("photo", $photo);
            $this->set("usr_name", $name);
        }
        $rank_status = $user_details['rank_status'];
        if ($rank_status == 'yes') {
            $rank = $user_details['rank'];
            if ($rank == 0) {
                $rank_status = "no";
            } else {
                $rank_status = "yes";
                $rank_name = $this->validation->getRankName($rank);
                $this->set('rank_name', $rank_name);
            }
        }
        $this->set('rank_status', $rank_status);
        //$name = $user_details['name'];
        //$email = $user_details['email'];

        $affiliates_count = $user_details['affiliates_count'];
        $status = $user_details['status'];
        //$photo = $user_details['photo'];
        $profile_pic = $this->menu->getProfilePic($logged_in_arr['user_id']);


        $this->LOG_USER_NAME = $logged_in_arr['user_name'];
        $this->LOG_USER_ID = $logged_in_arr['user_id'];
        $this->LOG_USER_TYPE = $logged_in_arr['user_type'];

        /*         * ** Setting to the view *** */
        $this->set('profile_pic', $profile_pic);

        //$this->set("email", $email);
        $this->set("affiliates_count", $affiliates_count);
        $this->set("status", $status);

        //$this->set("photo", $photo);
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_new_affiliates", $this->lang->line('new_affiliates'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_mail_id", $this->lang->line('mail_id'));
    }

//-----------------------------------------End setLoggedUserData---------------------------------------//


    /*     * ****** Set Header Language selector and Default langauge ************** */
    public function setLanguage() {
        $this->load->model('menu', '', TRUE);
        $current_language = $this->session->userdata('tran_language');
        $this->set('current_language', $current_language);
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

    //--------------End Language selector--------------------------------------//

    /*     * ****** Set Header Mail Selector Drop down************** */
    /* @access    public
     * @param    No Parameter
     * @return    void
     */

    public function setHeaderMailBox() {
        $this->load->model('home_model', '', TRUE);
        $user_type = $this->session->userdata['logged_in']['user_type'];
        $user_id = $this->session->userdata['logged_in']['user_id'];
        //$unread_mail = $this->home_model->getCountUserUnreadMessages($user_type, $user_id);
        $mail_content = $this->home_model->getUnreadMessages($user_type, $user_id);
        $unread_mail = count($mail_content);
        $this->set("mail_content", $mail_content);
        $this->set("unread_mail", $unread_mail);
    }

//--------------------------------End setHeaderMailBox------------------------------------------//


    /*     * ****** Set Set View Data Array************************** */
    /* @access    public
     * @param    No Parameter
     * @return    void
     */
    public function setViewDataArray() {
        $this->VIEW_DATA_ARR['sess_data'] = $this->session->userdata('logged_in');
        $this->VIEW_DATA_ARR['COMPANY_NAME'] = $this->COMPANY_NAME;
        $this->VIEW_DATA_ARR['MODULE_STATUS'] = $this->MODULE_STATUS;
    }

//--------------------------------End setViewDataArray------------------------------------------//

    /*     * ****** Automatic Load Model Class************** */
    public function autoLoadModelClass() {
        $controler_class = $this->router->class;
        $controler_class_model = $controler_class . "_model";
        $controller_method = $this->router->method;

        $this->CURRENT_URL = "$controler_class/$controller_method";

        $this->CURRENT_URL_FULL = "";

        for ($i = 1; $i <= count($this->uri->segments); $i++) {
            if ($this->uri->segments[$i] != 'en' && $this->uri->segments[$i] != 'es' && $this->uri->segments[$i] != 'ch' && $this->uri->segments[$i] != 'pt' && $this->uri->segments[$i] != 'de' && $this->uri->segments[$i] != 'fr' && $this->uri->segments[$i] != 'pl' && $this->uri->segments[$i] != 'it') {

                $this->CURRENT_URL_FULL.="" . $this->uri->segments[$i];
                if (($i + 1) <= count($this->uri->segments))
                    $this->CURRENT_URL_FULL.="/";
            }
        }

        $this->load->model($controler_class_model, '', TRUE);
    }

//------------------------------End autoLoadModelClass------------------------------------------//
    /*     * ******setUpgradeStatus ************************** */

    public function setUpgradeStatus() {
        $session_data = $this->session->userdata('logged_in');
        $table_prefix = $session_data['table_prefix'];
        $user_ref_id = str_replace("_", "", $table_prefix);
        $upgrade_cond = $this->menu->checkUpgrade($user_ref_id);
        $this->set('upgrade_cond', $upgrade_cond);
    }

//-----------------------------------------End setUpgradeStatus-------------------------------------


    public function setScripts() {
        if (count($this->ARR_SCRIPT) > 0) {
            $this->VIEW_DATA_ARR['ARR_SCRIPT'] = $this->ARR_SCRIPT;
        }
    }

//-----------------------------------------End setScripts---------------------------------------//

    public function set($set_key, $set_value) {
        $this->VIEW_DATA_ARR[$set_key] = $set_value;
    }

    // <--- THIS FUNCTION IS USDED TO SET THE DATA TO THE SMARTY VIEW PAGE-->
    public function setView() {
        $controler_class = $this->router->class;
        $controller_method = $this->router->method;
        $this->VIEW_DATA_ARR['menu_html'] = $this->MENU_HTML;

        $controler_class . '/' . $controller_method . '.tpl';
        if ($this->router->class == "register" || $this->router->class == "register_board" || $this->router->class == "login") {
            $this->smarty->view($controler_class . '/' . $controller_method . '.tpl', $this->VIEW_DATA_ARR);
        } else {
            $this->smarty->view("user/" . $controler_class . '/' . $controller_method . '.tpl', $this->VIEW_DATA_ARR);
        }
    }

//-----------------------------------------End setView---------------------------------------//
    // <--- REDIRECT TO ANOTHER PAGE WITH FLASH MESSAGE-->
    public function redirect($msg, $page, $message_type = false) {
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

//------------------------------------End getSiteInformation----------------------------------//
    //********* This fuction is used set to check the user login status- looged or not *********/
    /* @access    public
     * @param    No Parameter
     * @return    Ture/False
     */

    public function checkUserLoged() {

        if (!$this->checkSession()) {
            $base_url = base_url();
            $login_link = $base_url . "login";
            echo "You don't have permission to access this page. <a href=' $login_link'>Login</a>";
            die();
        } else {
            $user_type = $this->session->userdata['logged_in']['user_type'];
            if ($user_type != "distributor") {
                $this->redirect("", "../admin/home");
            }
        }
        return true;
    }

//-----------------------------------------End checkuserLoged---------------------------------------//

    public function checkLoged() {
        $base_url = base_url();
        $login_link = $base_url . "login";

        if (!$this->checkSession()) {
            echo "You don't have permission to access this page. <a href='$login_link'>Login</a>";
            die();
        }
        return true;
    }

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
    public function menuPermitted() {

        if ($this->session->userdata['logged_in']['user_type'] == 'employee') {
            $user_id = $this->session->userdata['logged_in']['user_id'];
            $segment = $this->uri->segments[2];
            if (isset($this->uri->segments[3]))
                $segment = $this->uri->segments[2] . "/" . $this->uri->segments[3];

            $this->load->model('income_details_model');

            if ($segment != 'home') {
                $status = $this->income_details_model->getPermittedMenus($user_id, $segment);

                //echo $status;die();
                if (!$status) {

                    $this->redirect('', '/home', false);
                }
            }
        }
    }

    /////////////////End Of menuPermitted///////////////////
}

?>