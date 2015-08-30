<?php

require_once 'Inf_Model.php';

Class login_model extends Inf_Model {

    public $mailObj;
    public $obj_val;

    /** For Captcha */
    public $width = 200;
    public $height = 70;
    public $wordsFile = 'words/en.php';
    public $resourcesPath = 'resources';
    public $minWordLength = 5;
    public $maxWordLength = 8;
    public $session_var = 'captcha';
    public $session_var1 = 'captcha_user';
    public $backgroundColor = array(255, 255, 255);
    public $colors = array(
        array(27, 78, 181), // blue
        array(22, 163, 35), // green
        array(214, 36, 7), // red
    );
    public $shadowColor = null; //array(0, 0, 0);
    public $lineWidth = 0;
    public $fonts = array(
        'Antykwa' => array('spacing' => -3, 'minSize' => 27, 'maxSize' => 30, 'font' => 'AntykwaBold.ttf'),
        'Candice' => array('spacing' => -1.5, 'minSize' => 28, 'maxSize' => 31, 'font' => 'Candice.ttf'),
        'DingDong' => array('spacing' => -2, 'minSize' => 24, 'maxSize' => 30, 'font' => 'Ding-DongDaddyO.ttf'),
        'Duality' => array('spacing' => -2, 'minSize' => 30, 'maxSize' => 38, 'font' => 'Duality.ttf'),
        'Heineken' => array('spacing' => -2, 'minSize' => 24, 'maxSize' => 34, 'font' => 'Heineken.ttf'),
        'Jura' => array('spacing' => -2, 'minSize' => 28, 'maxSize' => 32, 'font' => 'Jura.ttf'),
        'StayPuft' => array('spacing' => -1.5, 'minSize' => 28, 'maxSize' => 32, 'font' => 'StayPuft.ttf'),
        'Times' => array('spacing' => -2, 'minSize' => 28, 'maxSize' => 34, 'font' => 'TimesNewRomanBold.ttf'),
        'VeraSans' => array('spacing' => -1, 'minSize' => 20, 'maxSize' => 28, 'font' => 'VeraSansBold.ttf'),
    );
    public $Yperiod = 12;
    public $Yamplitude = 14;
    public $Xperiod = 11;
    public $Xamplitude = 5;
    public $maxRotation = 8;
    public $scale = 2;
    public $blur = false;
    public $debug = false;
    public $imageFormat = 'jpeg';
    public $im;

    /** For Captcha */
    public function __construct() {
        require_once 'Phpmailer.php';
        $this->mailObj = new PHPMailer();
        require_once 'validation.php';
        $this->obj_val = new Validation();
    }

    function login($username, $password,$autologin='') {
        if ($username && $password) {
            $this->db->select('user_id, user_name, password,user_type');
            $this->db->from('login_user');
            $this->db->where('user_name = ' . "'" . $username . "'");
            $this->db->where('password = ' . "'" . MD5($password) . "'");
            $this->db->where('addedby', "code");
            $this->db->limit(1);
            $query = $this->db->get();
        }else if ($autologin == 'yes') {
            $this->db->select('user_id, user_name, password,user_type');
            $this->db->from('login_user');
            $this->db->where('user_name = ' . "'" . $username . "'");
            $this->db->where('addedby', "code");
            $this->db->limit(1);
            $query = $this->db->get();
        } else {
            return false;
        }
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function login_employee($username, $password) {
/////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $this->db->select('user_id, user_name, password,user_type,module_status');
        $this->db->from('login_employee');
        $this->db->where('user_name = ' . "'" . $username . "'");
        $this->db->where('password = ' . "'" . MD5($password) . "'");
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            return $query->result();
        } else {
            return false;
        }
    }

    public function setUserSessionDatasEmployee($result) {

        $sess_array = array();
        $module_status = "";
        foreach ($result as $row) {
            $sess_array = array(
                'user_id' => $row->user_id,
                'user_name' => $row->user_name,
                'user_type' => $row->user_type,
                'table_prefix' => $this->db->dbprefix,
                'is_logged_in' => true
            );
            $module_status = $row->module_status;
        }
        $this->session->set_userdata('logged_in', $sess_array);
        $this->session->set_userdata('module_status', $module_status);
        $this->session->set_userdata('mlm_plan', 'Binary');
    }

    public function setUserSessionDatas($result) {
        $sess_array = array();

        foreach ($result as $row) {
            $sess_array = array(
                'user_id' => $row->user_id,
                'user_name' => $row->user_name,
                'user_type' => $row->user_type,
                'table_prefix' => $this->db->dbprefix,
                'is_logged_in' => true
            );
        }
        $this->session->set_userdata('mlm_plan', "Binary");
        if (isset($_POST['remember']) AND $_POST['remember'] == "yes") {
            $this->session->sess_expiration = 10;
        } else {
            $this->session->sess_expiration = 10;
        }
        $res = $this->session->set_userdata('logged_in', $sess_array);
    }

    public function getSubMenuItems() {

        $session_data = $this->session->userdata('logged_in');
        $table_prefix = $session_data['table_prefix'];

        $infinite_mlm_sub_menu = $this->table_prefix . "infinite_mlm_sub_menu";
        $qrCat = "select * from  $infinite_mlm_sub_menu WHERE sub_status='yes' order by sub_order_id";
        $res = $this->selectData($qrCat, "eroro on 34657 435");
        $i = 0;
        while ($row = mysql_fetch_array($res)) {
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

    public function userNameToIdFromOut($user_name) {
        /*         * ************************************edited by AMEEN**************************** */
        $this->db->from("ft_individual");
        $this->db->where("user_name", $user_name);
        $result = $this->db->get();
        foreach ($result->result() as $row) {
            return $row->id;
        }
    }

////////////////////////////code added for the inclusion of language in login by albert//////////////
    public function getAllLanguages() {
        $lang_arr = Array();
        $qry = $this->db->where("status", "yes")->get("languages");
        foreach ($qry->result_array() as $row) {
            $lang_arr[] = $row;
        }
        return $lang_arr;
    }

////////////////////////////code added for the inclusion of language in login by albert//////////////
    public function checkEmail($user_id, $e_mail) {
        $mail_db = '';
        $flag = FALSE;
        if ($user_id != "" && $e_mail != "") {
            $this->db->select("user_detail_email");
            $this->db->from("user_details");
            $this->db->where("user_detail_refid", $user_id);
            $result = $this->db->get();
            foreach ($result->result() as $row) {
                $mail_db = $row->user_detail_email;
            }

            if ($e_mail == $mail_db) {
                $flag = TRUE;
            }
        }
        return $flag;
    }

    public function sendEmail($user_id, $e_mail) {

        $keyword = $this->getKeyWord($user_id);
        //$reg_mail = $this->checkMailStatus();
        
        $subject = $this->lang->line('password_recovery'); //subject
        $mail_content=$this->lang->line('forgot_password_mail');
        $link = base_url() . "login/reset_password/$keyword";

        $mail_body = '<body>
<table border="0" width="800" height="700" align="center">
<tr>
<td    colspan="4"valign="top" ><br><br><br>
<br>
<font size="3" face="Trebuchet MS">
Dear  Customer,</b><br>
     <p syte="pading-left:20px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$mail_content.':<p>
  <a href="' . $link . '">' . $link . '</a>
  <br><br><br>
  </td>
</tr>
</font>
</table>
</body>';


        $res=$this->obj_val->sendEmail($mail_body, $user_id, $subject);
        return $res;
    }

    public function getKeyWord($user_id) {
        do {
            $keyword = rand(1000000000, 9999999999);
        } while ($this->keywordAvailable($keyword));

        $this->db->set('keyword', $keyword);
        $this->db->set('user_id', $user_id);
        $res = $this->db->insert("password_reset_table");

        if ($res) {
            return $keyword;
        }
    }

    public function keywordAvailable($keyword) {
        $flag = FALSE;
        $this->db->select('COUNT(*) AS count');
        $this->db->from('password_reset_table');
        $this->db->where('keyword', $keyword);
        $this->db->where('reset_status', 'no');
        $result = $this->db->get();
        foreach ($result->result_array() as $row) {
            $cnt = $row['count'];
            if ($cnt > 0) {
                $flag = TRUE;
            }
            return $flag;
        }
    }

    public function updatePasswordOut($user_id, $pass_word, $key) {


        $encrypted_password = md5($pass_word);
        $this->db->set("password", $encrypted_password);
        $this->db->where("user_id", $user_id);
        $result_1 = $this->db->update("login_user");
        $this->db->set("reset_status", 'yes');
        $this->db->where("keyword", $key);
        $result_2 = $this->db->update("password_reset_table");

        if ($result_1 && $result_2) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getUserDetailFromKey($resetkey) {
        $id = NULL;
        $this->db->select("user_id");
        $this->db->from("password_reset_table");
        $this->db->where("keyword", $resetkey);
        $this->db->where("reset_status", "no");
        $result = $this->db->get();
        foreach ($result->result() as $row) {
            $id = $row->user_id;
        }
        if ($id != "") {
            $username = $this->idFromToUserNameOut($id);
            $arr[] = $id;
            $arr[] = $username;

            return $arr;
        } else {

            $arr[] = "";
            return $arr;
        }
    }

    public function idFromToUserNameOut($user_id) {
        $this->db->select("user_name");
        $this->db->from("ft_individual");
        $this->db->where("id", $user_id);
        $result = $this->db->get();
        foreach ($result->result() as $row)
            return $row->user_name;
    }

    public function loginPrimary($username, $password) {
        $login_detail = array();
        $condition = "(account_status ='active' OR account_status ='upgraded')";
        $pswd = MD5($password);
        $this->db->select('id,mlm_plan');
        $this->db->from('infinite_mlm_user_detail');
        $this->db->where('user_name', "$username");
        $this->db->where('pswd', "$pswd");
        $this->db->where($condition);
        $this->db->limit(1);
        $result = $this->db->get();

        foreach ($result->result_array() as $row) {
            $login_detail = $row;
        }
        return $login_detail;
    }

    public function loginPrimaryUser($admin_username) {
        $login_detail = array();
        $condition = "(account_status ='active' OR account_status ='upgraded')";
        $this->db->select('id,mlm_plan');
        $this->db->from('infinite_mlm_user_detail');
        $this->db->where('user_name', $admin_username);
        $this->db->where($condition);
        $this->db->limit(1);
        $result = $this->db->get();
        foreach ($result->result_array() as $row) {
            $login_detail["id"] = $row['id'];
            $login_detail["mlm_plan"] = $row['mlm_plan'];
        }

        return $login_detail;
    }

    public function setDefaultLang($lang_code) {
//-------------------code added by amrutha
        $user = $this->session->userdata('logged_in');
        if ($user) {
            $this->db->set('default_lang', $lang_code);
            $this->db->where('user_id', $user['user_id']);
            $this->db->update("login_user");
        }
    }

    public function getDefaultLang($user) {
        $lang = 1;
        $this->db->select('default_lang');
        $this->db->from('login_user');
        $this->db->where('user_id', $user);
        $result = $this->db->get();
        foreach ($result->result_array() as $row) {
            $lang = $row['default_lang'];
        }
        return $lang;
    }

    public function getLanguageName($id) {
        $lang = "english";
        $this->db->select('lang_name_in_english');
        $this->db->from('languages');
        $this->db->where('lang_id', $id);
        $result = $this->db->get();
        foreach ($result->result() as $row) {
            $lang = $row->lang_name_in_english;
        }
        return $lang;
    }

    public function isEmployeeLoginValid($user_name, $password) {

/////////////////////  CODE EDITED BY JIJI  ////////////////////////// 
        $table_prefix = "37_";
        $flag = FALSE;
        $sess_array = array();
        $password = md5($password);
        $this->db->where('user_name', $user_name);
        $this->db->where('password', $password);
        $this->db->from('10_login_employee');
        $res = $this->db->get();
        if ($res->num_rows() == 1) {
            $flag = TRUE;
            $module_status = "m#16";
            foreach ($res->result() as $row) {
                $user_id = $row->user_id;
                $sess_array = array(
                    'user_id' => $row->user_id,
                    'user_name' => $row->user_name,
                    'user_name_prefix' => $row->user_name,
                    'user_type' => "employee",
                    'table_prefix' => $table_prefix,
                    'is_logged_in' => true
                );
                $module_status = $row->module_status;
            }
            $this->session->set_userdata('module_status', $module_status);
            $this->session->set_userdata('logged_in', $sess_array);
            $this->session->set_userdata('mlm_plan', 'Binary');
        }
        if ($flag) {
            return "yes";
        } else {
            return "no";
        }
    }

    public function getAdminid() {
        $id = "";
        $this->db->select('id');
        $this->db->from('ft_individual');
        $this->db->where('user_name', 'admin');
        $result = $this->db->get();
        foreach ($result->result() as $row) {
            $id = $row->id;
        }
        return $id;
    }

    public function insertActivityHistory($login_id, $activity = "") {
//      echo  $prifix = $this->session->userdata['table_prefix'];
//      die();
        $date = date("Y-m-d H:i:s");
        $ip_adress = $_SERVER['REMOTE_ADDR'];
        $this->db->set('user_id', $login_id);
        $this->db->set('done_by', $login_id);
        $this->db->set('activity', $activity);
        $this->db->set('ip', $ip_adress);
        $this->db->set('date', $date);
        $result = $this->db->insert("activity_history");
    }

    /*     * ***************** For Captcha ******************starts***** */

    public function CreateImage($type) {
        $ini = microtime(true);

        /** Initialization */
        $this->ImageAllocate();

        /** Text insertion */
        $text = $this->GetCaptchaText();
        $fontcfg = $this->fonts[array_rand($this->fonts)];
        $this->WriteText($text, $fontcfg);
        if ($type == "admin") {
            $this->session->set_userdata($this->session_var, $text);
        } else {
            $this->session->set_userdata($this->session_var1, $text);
        }


        /** Transformations */
        if (!empty($this->lineWidth)) {
            $this->WriteLine();
        }
        $this->WaveImage();
        if ($this->blur && function_exists('imagefilter')) {
            imagefilter($this->im, IMG_FILTER_GAUSSIAN_BLUR);
        }
        $this->ReduceImage();


        if ($this->debug) {
            imagestring($this->im, 1, 1, $this->height - 8, "$text {$fontcfg['font']} " . round((microtime(true) - $ini) * 1000) . "ms", $this->GdFgColor
            );
        }


        /** Output */
        $this->WriteImage();
        $this->Cleanup();
    }

    /**
     * Creates the image resources
     */
    protected function ImageAllocate() {
        // Cleanup
        if (!empty($this->im)) {
            imagedestroy($this->im);
        }

        $this->im = imagecreatetruecolor($this->width * $this->scale, $this->height * $this->scale);

        // Background color
        $this->GdBgColor = imagecolorallocate($this->im, $this->backgroundColor[0], $this->backgroundColor[1], $this->backgroundColor[2]
        );
        imagefilledrectangle($this->im, 0, 0, $this->width * $this->scale, $this->height * $this->scale, $this->GdBgColor);

        // Foreground color
        $color = $this->colors[mt_rand(0, sizeof($this->colors) - 1)];
        $this->GdFgColor = imagecolorallocate($this->im, $color[0], $color[1], $color[2]);

        // Shadow color
        if (!empty($this->shadowColor) && is_array($this->shadowColor) && sizeof($this->shadowColor) >= 3) {
            $this->GdShadowColor = imagecolorallocate($this->im, $this->shadowColor[0], $this->shadowColor[1], $this->shadowColor[2]
            );
        }
    }

    /**
     * Text generation
     *
     * @return string Text
     */
    protected function GetCaptchaText() {
        $text = $this->GetDictionaryCaptchaText();
        if (!$text) {
            $text = $this->GetRandomCaptchaText();
        }
        return $text;
    }

    /**
     * Random text generation
     *
     * @return string Text
     */
    protected function GetRandomCaptchaText($length = null) {
        if (empty($length)) {
            $length = rand($this->minWordLength, $this->maxWordLength);
        }

        $words = "abcdefghijlmnopqrstvwyz";
        $vocals = "aeiou";

        $text = "";
        $vocal = rand(0, 1);
        for ($i = 0; $i < $length; $i++) {
            if ($vocal) {
                $text .= substr($vocals, mt_rand(0, 4), 1);
            } else {
                $text .= substr($words, mt_rand(0, 22), 1);
            }
            $vocal = !$vocal;
        }
        return $text;
    }

    /**
     * Random dictionary word generation
     *
     * @param boolean $extended Add extended "fake" words
     * @return string Word
     */
    function GetDictionaryCaptchaText($extended = false) {
        if (empty($this->wordsFile)) {
            return false;
        }

        // Full path of words file
        if (substr($this->wordsFile, 0, 1) == '/') {
            $wordsfile = $this->wordsFile;
        } else {
            $wordsfile = $this->resourcesPath . '/' . $this->wordsFile;
        }

        if (!file_exists($wordsfile)) {
            return false;
        }

        $fp = fopen($wordsfile, "r");
        $length = strlen(fgets($fp));
        if (!$length) {
            return false;
        }
        $line = rand(1, (filesize($wordsfile) / $length) - 2);
        if (fseek($fp, $length * $line) == -1) {
            return false;
        }
        $text = trim(fgets($fp));
        fclose($fp);


        /** Change ramdom volcals */
        if ($extended) {
            $text = preg_split('//', $text, -1, PREG_SPLIT_NO_EMPTY);
            $vocals = array('a', 'e', 'i', 'o', 'u');
            foreach ($text as $i => $char) {
                if (mt_rand(0, 1) && in_array($char, $vocals)) {
                    $text[$i] = $vocals[mt_rand(0, 4)];
                }
            }
            $text = implode('', $text);
        }

        return $text;
    }

    /**
     * Horizontal line insertion
     */
    protected function WriteLine() {

        $x1 = $this->width * $this->scale * .15;
        $x2 = $this->textFinalX;
        $y1 = rand($this->height * $this->scale * .40, $this->height * $this->scale * .65);
        $y2 = rand($this->height * $this->scale * .40, $this->height * $this->scale * .65);
        $width = $this->lineWidth / 2 * $this->scale;

        for ($i = $width * -1; $i <= $width; $i++) {
            imageline($this->im, $x1, $y1 + $i, $x2, $y2 + $i, $this->GdFgColor);
        }
    }

    /**
     * Text insertion
     */
    protected function WriteText($text, $fontcfg = array()) {
        if (empty($fontcfg)) {
            // Select the font configuration
            $fontcfg = $this->fonts[array_rand($this->fonts)];
        }

        // Full path of font file
        $fontfile = $this->resourcesPath . '/fonts/' . $fontcfg['font'];


        /** Increase font-size for shortest words: 9% for each glyp missing */
        $lettersMissing = $this->maxWordLength - strlen($text);
        $fontSizefactor = 1 + ($lettersMissing * 0.09);

        // Text generation (char by char)
        $x = 20 * $this->scale;
        $y = round(($this->height * 27 / 40) * $this->scale);
        $length = strlen($text);
        for ($i = 0; $i < $length; $i++) {
            $degree = rand($this->maxRotation * -1, $this->maxRotation);
            $fontsize = rand($fontcfg['minSize'], $fontcfg['maxSize']) * $this->scale * $fontSizefactor;
            $letter = substr($text, $i, 1);

            if ($this->shadowColor) {
                $coords = imagettftext($this->im, $fontsize, $degree, $x + $this->scale, $y + $this->scale, $this->GdShadowColor, $fontfile, $letter);
            }
            $coords = imagettftext($this->im, $fontsize, $degree, $x, $y, $this->GdFgColor, $fontfile, $letter);
            $x += ($coords[2] - $x) + ($fontcfg['spacing'] * $this->scale);
        }

        $this->textFinalX = $x;
    }

    /**
     * Wave filter
     */
    protected function WaveImage() {
        // X-axis wave generation
        $xp = $this->scale * $this->Xperiod * rand(1, 3);
        $k = rand(0, 100);
        for ($i = 0; $i < ($this->width * $this->scale); $i++) {
            imagecopy($this->im, $this->im, $i - 1, sin($k + $i / $xp) * ($this->scale * $this->Xamplitude), $i, 0, 1, $this->height * $this->scale);
        }

        // Y-axis wave generation
        $k = rand(0, 100);
        $yp = $this->scale * $this->Yperiod * rand(1, 2);
        for ($i = 0; $i < ($this->height * $this->scale); $i++) {
            imagecopy($this->im, $this->im, sin($k + $i / $yp) * ($this->scale * $this->Yamplitude), $i - 1, 0, $i, $this->width * $this->scale, 1);
        }
    }

    /**
     * Reduce the image to the final size
     */
    protected function ReduceImage() {
        // Reduzco el tama�o de la imagen
        $imResampled = imagecreatetruecolor($this->width, $this->height);
        imagecopyresampled($imResampled, $this->im, 0, 0, 0, 0, $this->width, $this->height, $this->width * $this->scale, $this->height * $this->scale
        );
        imagedestroy($this->im);
        $this->im = $imResampled;
    }

    /**
     * File generation
     */
    protected function WriteImage() {
        if ($this->imageFormat == 'png' && function_exists('imagepng')) {
            header("Content-type: image/png");
            imagepng($this->im);
        } else {
            header("Content-type: image/jpeg");
            imagejpeg($this->im, null, 80);
        }
    }

    /**
     * Cleanup
     */
    protected function Cleanup() {
        imagedestroy($this->im);
    }

    /*     * ***************** For Captcha ******************ends***** */

    public function upadetUserCookie($salt, $username, $cookie_val, $ip,$user_agent) {
      
        $this->db->where('user_name ',$username);
        $this->db->where('user_agent ',$user_agent);
        $this->db->where('ip ',$ip);
        $res=$this->db->delete('cookie_user');
        
        
        $this->db->set('salt', $salt);
        $this->db->set('user_name', $username);
        $this->db->set('ip', $ip);
        $this->db->set('cookie', $cookie_val);
        $this->db->set('user_agent', $user_agent);
        $res = $this->db->insert('cookie_user');
        return $res;
    }

    public function getUSername($mlm_user_name) {
        $name = '';
        $this->db->select("*");
        $this->db->from("cookie_user");
        $this->db->where('cookie', $mlm_user_name);
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            $name = $row->user_name;
        }
        return $name;
    }

    public function getPassword($user_name) {
        $this->db->select("*");
        $this->db->from("login_user");
        $this->db->where('user_name', $user_name);
        $res = $this->db->get();
        foreach ($res->result()as $row) {
            $password = $row->password;
        }
        return $password;
    }
    
    public function getCookieDetails($cookie_value,$username,$ip,$user_agent){
        $details=array();
        $this->db->select('*');
        $this->db->where('cookie',$cookie_value);
        $this->db->where('user_name',$username);
        $this->db->where('ip',$ip);
        $this->db->where('user_agent',$user_agent);
        $query=$this->db->get('cookie_user');
        
        if ($query->num_rows() == 1) {
            return true;
        }else{
            return false;
        }
    }

}
