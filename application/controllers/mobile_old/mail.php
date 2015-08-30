<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mail
 *
 * @author ioss
 */
require_once ('Inf_Controller.php');
class Mail  extends Inf_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    public function getMailDetails()
    {
        $this->load->model('mail_model');
        $this->load->model('login_model');
        $admin_username = $this->input->post('adminname');
        //$admin_username ="admin";
        $user_id = $this->input->post('userid');
        //$user_id=12346;
        $details = $this->login_model->loginPrimaryUser($admin_username);
        $res = $this->mail_model->getUserMessages($user_id, 0, '',$details["id"]."_");
        
        echo json_encode($res->result_array());
        
        
    }
    
    public function updateMessage()
    {
        
        $this->load->model('login_model');
        $this->load->model('mail_model');
        $admin_username = $this->input->post('adminname');
        $msg_id = $this->input->post('msg_id');
        $details = $this->login_model->loginPrimaryUser($admin_username);
        $this->mail_model->updateUserOneMessage($msg_id,$details["id"]."_");
        
       echo "success!!";
    }
    
    public function sendMailToAdmin()
    {
        $this->load->model('login_model');
        $this->load->model('mail_model');
        
        $admin_username = $this->input->post('adminname');
        $user_id = $this->input->post('userid');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $dt = date('Y-m-d H:i:s');
                
        $details = $this->login_model->loginPrimaryUser($admin_username);
    
       $this->mail_model->sendMesageToAdmin($user_id, $message, $subject, $dt,$details["id"]."_");
       echo "success!!";
        
    }
    
    
    
    
    
}
