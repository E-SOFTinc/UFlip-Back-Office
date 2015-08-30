<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

    private static $instance;

    /**
     * Constructor
     */
    public function __construct() {
        self::$instance = & $this;

        // Assign all the class objects that were instantiated by the
        // bootstrap file (CodeIgniter.php) to local class variables
        // so that CI can run as one big super object.
        foreach (is_loaded() as $var => $class) {
            $this->$var = & load_class($class);
        }

        $this->load = & load_class('Loader', 'core');


        $this->load->set_base_classes()->ci_autoloader();
        $this->load->model('login_model', '', TRUE);

        //////CODE EDITED BY JIJI---FROM HERE---///////for language selector

        $lang_arr = $this->session->userdata('lang_arr');
        
        if (strlen($this->uri->segment(1)) == 2)
        {
            for ($i = 0; $i < count($lang_arr); $i++)
            {
                if ($this->uri->segment(1) == $lang_arr[$i]['lang_code'])
                {
                    $this->login_model->setDefaultLang($lang_arr[$i]['lang_id']);
                    $this->lang->load($lang_arr[$i]['lang_name_in_english'], $lang_arr[$i]['lang_name_in_english']);
                    $this->session->set_userdata('tran_language', $lang_arr[$i]['lang_name_in_english']);
                }
            }
        }
        else
        {
            if (($this->session->userdata('tran_language')))
            {
                if($this->checkSession())
                {
                    $controler_class = $this->router->class;
                    if($controler_class != 'login')
                    {
                        $user_type= $this->session->userdata['logged_in']['user_type'];
                        if($user_type =="employee")
                        {
                        $id= $this->login_model->getAdminid();
                        $lang_id=  $this->login_model->getDefaultLang($id);
                        $language=  $this->login_model->getLanguageName($lang_id); 
                        $this->lang->load($language, $language);
                        $this->session->set_userdata('tran_language', $language);
                        }
                        else{
                        $user_id=$this->session->userdata['logged_in']['user_id'];
                        $lang_id=  $this->login_model->getDefaultLang($user_id);
                        $language=  $this->login_model->getLanguageName($lang_id); 
                        $this->lang->load($language, $language);
                        $this->session->set_userdata('tran_language', $language);
                        }
                    }
                }
                else
                {
                     $this->lang->load($this->session->userdata('tran_language'), $this->session->userdata('tran_language'));
                     $this->session->set_userdata('tran_language', $this->session->userdata('tran_language'));
                }
            }
            else
            {
                $this->lang->load('french', 'french');
                $this->session->set_userdata('tran_language', 'french');
            }
        }
        //////CODE EDITED BY JIJI---UPTO HERE---///////
        
        log_message('debug', "Controller Class Initialized");
    }

    public static function &get_instance() {
        return self::$instance;
    }
    public function checkSession()
    {
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

}

// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */
