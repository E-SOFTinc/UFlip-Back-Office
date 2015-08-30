<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class ticket_model extends inf_model {

    public $OBJ_MISC;
    private $mailObj;
    private $OBJ_VALI;

    public function __construct() {
        require_once 'validation.php';
        $this->OBJ_VALI = new Validation();

        require_once 'Misc.php';
        $this->OBJ_MISC = new Misc();

        require_once 'Phpmailer.php';
        $this->mailObj = new PHPMailer();

        require_once 'payout_model.php';
        $this->obj_payout = new payout_model();
        

        // require_once 'Pin.php';
        // $this->OBJ_PIN = new Pin();
    }
    
    public function getCategory()
    {
        $cat_arr = array();
        $this->db->select('id');
        $this->db->select('name');
        $this->db->from('ticket_categories');
        $res = $this->db->get();
        $i=0;
        foreach ($res->result_array() as $row) {
            $cat_arr["details$i"]['cat_id'] = $row['id'];
            $cat_arr["details$i"]['cat_name'] = $row['name'];
            $i++;
        }
        return $cat_arr;
    }
    public function createTicketId()
    {
	$useChars = 'AEUYBDGHJLMNPQRSTVWXZ123456789';
	$trackingID = '';

	for ($i=1;$i<=3;$i++)
        {
	    $trackingID .= $useChars[mt_rand(0,29)];
	    $trackingID .= $useChars[mt_rand(0,29)];
	    $trackingID .= $useChars[mt_rand(0,29)];
	    $trackingID .= $useChars[mt_rand(0,29)];
	    $trackingID .= $useChars[mt_rand(0,29)];
	    $trackingID .= $useChars[mt_rand(0,29)];
	    $trackingID .= $useChars[mt_rand(0,29)];
	    $trackingID .= $useChars[mt_rand(0,29)];
	    $trackingID .= $useChars[mt_rand(0,29)];
	    $trackingID .= $useChars[mt_rand(0,29)];

        $trackingID = $this->ticketformatID($trackingID);
            $cat_arr = array();
            $this->db->select('id');
            $this->db->where('trackid',$trackingID);
            $this->db->from('tickets');
            $res = $this->db->get();

		if ($res->num_rows() == 0)
		{
			return $trackingID;
                }

        $trackingID = '';
    }
    /* No valid tracking ID, try one more time with microtime() */
	$trackingID  = $useChars[mt_rand(0,29)];
	$trackingID .= $useChars[mt_rand(0,29)];
	$trackingID .= $useChars[mt_rand(0,29)];
	$trackingID .= $useChars[mt_rand(0,29)];
	$trackingID .= $useChars[mt_rand(0,29)];
	$trackingID .= substr(microtime(), -5);
	$trackingID = $this->ticketformatID($trackingID);
            $this->db->select('id');
            $this->db->where('trackid',$trackingID);
            $this->db->from('tickets');
            $res = $this->db->get();
	if ($res->num_rows() == 0)
	{
		return $trackingID;
    }

  //  $hesk_error_buffer['etid'] = $hesklang['e_tid'];
	return false;

}

   function ticketformatID($id)
{

	$useChars = 'AEUYBDGHJLMNPQRSTVWXZ123456789';

    $replace  = $useChars[mt_rand(0,29)];
    $replace .= mt_rand(1,9);
    $replace .= $useChars[mt_rand(0,29)];

    /*
    Remove 3 letter bad words from ID
    Possiblitiy: 1:27,000
    */
	$remove = array(
    'ASS',
    'CUM',
    'FAG',
    'FUK',
    'GAY',
    'SEX',
    'TIT',
    'XXX',
    );

    $id = str_replace($remove,$replace,$id);

    /*
    Remove 4 letter bad words from ID
    Possiblitiy: 1:810,000
    */
	$remove = array(
	'ANAL',
	'ANUS',
	'BUTT',
	'CAWK',
	'CLIT',
	'COCK',
	'CRAP',
	'CUNT',
	'DICK',
	'DYKE',
	'FART',
	'FUCK',
	'JAPS',
	'JERK',
	'JIZZ',
	'KNOB',
	'PISS',
	'POOP',
	'SHIT',
	'SLUT',
	'SUCK',
	'TURD',

    // Also, remove words that are known to trigger mod_security
	'WGET',
    );

	$replace .= mt_rand(1,9);
    $id = str_replace($remove,$replace,$id);

    /* Format the ID string into XXX-XXX-XXXX format for easier readability */
    $id = $id[0].$id[1].$id[2].'-'.$id[3].$id[4].$id[5].'-'.$id[6].$id[7].$id[8].$id[9];

    return $id;

} 
    function createNewTicket($ticket)
    {
        $user_name=$this->session->userdata['logged_in']['user_name'];
	global $hesk_settings, $hesklang, $hesk_db_link;
	$data_ticket=array(
		'trackid' =>$ticket['trackid'],
		'name'=>$user_name,
		'email'=>'',
                'user_id'=>$ticket['user_id'],
		'category'=>$ticket['category'],
		'priority'=>$ticket['priority'],
		'subject'=>$ticket['subject'],
		'message'=>$ticket['message'],
		'dt'=>date("Y-m-d H:i:s"),
		'lastchange'=>date("Y-m-d H:i:s"),
		'ip'=>$_SERVER['REMOTE_ADDR'],
		'language'=>'',
                'status'=>'0',
		'owner'=>'0',
		'attachments'=>$ticket['file_name'],
		'merged'=>'ss',
		'history'=>'ss',
		'custom1'=>'',
		'custom2'=>'',
	'custom3'=>'',
		'custom4'=>'',
		'custom5'=>'',
		'custom6'=>'',
		'custom7'=>'',
		'custom8'=>'',
		'custom9'=>'',
		'custom10'=>'',
		'custom11'=>'',
		'custom12'=>'',
		'custom13'=>'',
		'custom14'=>'',
		'custom15'=>'',
		'custom16'=>'',
		'custom17'=>'',
		'custom18'=>'',
		'custom19'=>'',
		'custom20'=>''
	);
       
	$res = $this->db->insert('tickets', $data_ticket);
        return $res;
    }
    public function getTicketData($ticket_id='',$user_id=''){
        $_SESSION['logged_in']['table_prefix'] = '42_';
       $table_prefix=$_SESSION['logged_in']['table_prefix'];
        $ticket_arr = array();
      if($ticket_id){
        
        $this->db->select('*');
        $this->db->where('trackid',$ticket_id);
        $this->db->where('user_id',$user_id);
        $this->db->from('tickets');
        $this->db->order_by('lastchange', 'desc');
        
        $tickets=$table_prefix.'tickets';
        $select = "SELECT *FROM $tickets WHERE trackid='$ticket_id' AND user_id='$user_id'";
        $res = $this->selectData($select, "");
        $row = mysql_fetch_array($res);
        $res = $this->db->get();
        $i=0;
        foreach ($res->result_array() as $row) {
            $ticket_arr["details$i"]['id'] = $row['id'];
            $ticket_arr["details$i"]['read']=1;
            //$this->db->select('count(id) AS cnt');
            $this->db->select('read');
            $this->db->where('replyto',$row['id']);
            $this->db->from('ticket_replies');
            $res1 = $this->db->get();
            foreach ($res1->result_array() as $row1) {
               // $ticket_arr["details$i"]['count']=$row1['cnt'];
                if($row1['read']==0)
                $ticket_arr["details$i"]['read'] = $row1['read'];
            }
            $ticket_arr["details$i"]['ticket_id'] = $row['trackid'];
            $ticket_arr["details$i"]['status'] = $row['status'];
            $ticket_arr["details$i"]['created_date'] = $row['dt'];
            $ticket_arr["details$i"]['updated_date'] = $row['lastchange'];
            $ticket_arr["details$i"]['subject'] = $row['subject'];
            $ticket_arr["details$i"]['user'] = $this->OBJ_VALI->IdToUserName($row['user_id']);
            $ticket_arr["details$i"]['lastreplier'] = $this->OBJ_VALI->IdToUserName($row['lastreplier']);
           // $ticket_arr["details$i"]['category'] = $this->getCategoryTicket($row['category']);
            $ticket_arr["details$i"]['category'] = $this->getCategoryTicket($row['category']);
            $ticket_arr["details$i"]['priority'] = $row['priority'];
            $ticket_arr["details$i"]['name'] = $row['name'];
            $i++;
        }
        return $ticket_arr;
      }
 else {
        $this->db->select('*');
        $this->db->where('user_id',$user_id);
        $this->db->from('tickets');
        $this->db->order_by('lastchange', 'desc');
        $res = $this->db->get();
        $i=0;
        foreach ($res->result_array() as $row) {
            $ticket_arr["details$i"]['id'] = $row['id'];
            $ticket_arr["details$i"]['read']=1;
            //$this->db->select('count(id) AS cnt');
            $this->db->select('read');
            $this->db->where('replyto',$row['id']);
            $this->db->from('ticket_replies');
            $res1 = $this->db->get();
            foreach ($res1->result_array() as $row1) {
                //$ticket_arr["details$i"]['count']=$row1['cnt'];
                if($row1['read']==0)
                $ticket_arr["details$i"]['read'] = $row1['read'];
            }
            $ticket_arr["details$i"]['ticket_id'] = $row['trackid'];
            $ticket_arr["details$i"]['status'] = $row['status'];
            $ticket_arr["details$i"]['created_date'] = $row['dt'];
            $ticket_arr["details$i"]['updated_date'] = $row['lastchange'];
          
            $ticket_arr["details$i"]['subject'] = $row['subject'];
            $ticket_arr["details$i"]['user'] = $this->OBJ_VALI->IdToUserName($row['user_id']);
            $ticket_arr["details$i"]['lastreplier'] = $this->OBJ_VALI->IdToUserName($row['lastreplier']);
            //$ticket_arr["details$i"]['category'] = $this->getCategoryTicket($row['category']);
            $ticket_arr["details$i"]['category'] = $this->getCategoryTicket($row['category']);
            $ticket_arr["details$i"]['priority'] = $row['priority'];
            $ticket_arr["details$i"]['name'] = $row['name'];
            $i++;
        }
        return $ticket_arr;
      }
    }
     public function getCategoryTicket($cat_id){
        $cat_name=''; 
        $this->db->select('name');
        $this->db->from('tickets_categories');
        $this->db->where('id',$cat_id);
        $res = $this->db->get();
        $i=0;
        foreach ($res->result_array() as $row) {
             $cat_name=$row['name'];
        }
        return $cat_name;
     }
     public function replyTicket($details,$message,$user_id,$file_name){
         $data_ticket=array(
		'replyto' =>$details["details0"]['id'],
		'user_id'=>$user_id,
		'message'=>$message,
                'attachments'=>$file_name,
                'dt'=>date('Y-m-d H:i:s'),
                 'read'=>'1');
         $res = $this->db->insert('ticket_replies', $data_ticket);
         if($res){
                $this->db->set('lastreplier', $user_id);
                $this->db->set('lastchange', date('Y-m-d H:i:s'));
                $this->db->where('id', $details["details0"]['id']);
                $res = $this->db->update('tickets');
         }
         return $res;
		
     }
     public function markedAsResolved($ticket_id){
          $this->db->set('lastchange', date('Y-m-d H:i:s'));
          $this->db->set('status','3');
          $this->db->where('id', $ticket_id);
          $res = $this->db->update('tickets');
          return $res;
     }
      public function getAllReply($ticket_id){
        $details=array();
        $this->db->select('message');
        $this->db->select('dt');
        $this->db->select('user_id');
        $this->db->select('attachments');
        $this->db->order_by('id', 'asc');
        $this->db->from('ticket_replies');
        $this->db->where('replyto',$ticket_id);
        $res = $this->db->get();
        $i=0;
        foreach ($res->result_array() as $row) {
            $details[$i]['message']=$row['message'];
            $details[$i]['date']=$row['dt'];
            $details[$i]['file']=$row['attachments'];
            $details[$i]['user']=$this->OBJ_VALI->IdToUserName($row['user_id']);
            $i++;
        }
        return $details;
        
      }
      public function insertIntoAttachment($ticket_id, $file_details,$saved_name=''){
          
         $data_ticket=array(
		'ticket_id' =>$ticket_id,
		'saved_name'=>$saved_name,
		'real_name'=>$file_details['original_name'],
                'size'=>$file_details['file_size']);
                 
         $res = $this->db->insert('attachments', $data_ticket);
         return $this->db->insert_id();
		
     }
     public function readTicket($id){
                
                $this->db->set('read', '1');
                $this->db->where('replyto', $id);
                $res = $this->db->update('ticket_replies');
     }
     public function replyTicketFromMail($details,$reply_msg,$user_id,$file_name,$date,$read){
         $res='';
         //for($i=0;$i<count($reply_msg);$i++){
         $data_ticket=array(
		'replyto' =>$details["details0"]['id'],
		'user_id'=>$user_id,
		'message'=>$reply_msg,
                'attachments'=>$file_name,
                'dt'=>$date,
                 'read'=>$read);
         $res = $this->db->insert('ticket_replies', $data_ticket);
         if($res){
                $this->db->set('lastreplier', $user_id);
                $this->db->set('lastchange', date('Y-m-d H:i:s'));
                $this->db->where('id', $details["details0"]['id']);
                $res = $this->db->update('tickets');
         }
        // }
         return $res;
		
     }
      public function getTicketRepliesToUser($ticket){
         $subject=explode("/",$ticket['subject']);
          $i=0;
         $ticket_reply=array();
         for($j=0;$j<count($subject);$j++){
        $this->db->select('mailtousmsg,file_name,mailtousdate');
        $this->db->from('mailtouser');
        $this->db->where('mailtoususer',$ticket['user_id']);
        $this->db->like("mailtoussub", $subject[$j]);
        $res = $this->db->get();
       
        foreach ($res->result_array() as $row) {
             $ticket_reply[$i]['msg']=$row['mailtousmsg'];
             $ticket_reply[$i]['img']=$row['file_name'];
             $ticket_reply[$i]['date']=$row['mailtousdate'];
             $i++;
        }
         }
        return $ticket_reply;
     
     }
     
      function createNewTicketFromOld($ticket)
    {
        $user_name=$this->OBJ_VALI->IdToUserName($ticket['user_id']);;
	global $hesk_settings, $hesklang, $hesk_db_link;
	$data_ticket=array(
		'trackid' =>$ticket['trackid'],
		'name'=>$user_name,
		'email'=>'',
                'user_id'=>$ticket['user_id'],
		'category'=>$ticket['category'],
		'priority'=>$ticket['priority'],
		'subject'=>$ticket['subject'],
		'message'=>$ticket['message'],
		'dt'=>$ticket['date'],
		'lastchange'=>date("Y-m-d H:i:s"),
		'ip'=>$_SERVER['REMOTE_ADDR'],
		'language'=>'',
                'status'=>$ticket['mail_status'],
		'owner'=>'0',
		'attachments'=>$ticket['file_name'],
		'merged'=>'ss',
		'history'=>'ss',
		'custom1'=>'',
		'custom2'=>'',
	'custom3'=>'',
		'custom4'=>'',
		'custom5'=>'',
		'custom6'=>'',
		'custom7'=>'',
		'custom8'=>'',
		'custom9'=>'',
		'custom10'=>'',
		'custom11'=>'',
		'custom12'=>'',
		'custom13'=>'',
		'custom14'=>'',
		'custom15'=>'',
		'custom16'=>'',
		'custom17'=>'',
		'custom18'=>'',
		'custom19'=>'',
		'custom20'=>''
	);
       
	$res = $this->db->insert('tickets', $data_ticket);
        return $res;
    }
     public function getTicketId($ticket){
        $ticket_id=''; 
        $this->db->select('id');
        $this->db->from('tickets');
        $this->db->where('trackid',$ticket);
        $res = $this->db->get();
       // $i=0;
        foreach ($res->result_array() as $row) {
             $ticket_id=$row['id'];
        }
        return $ticket_id;
     }
      public function getTicketRepliesToAdmin($ticket){
        $ticket_reply=array(); 
        $this->db->select('mailadidmsg,mailaduser,image_name,mailadiddate');
        $this->db->from('mailtoadmin');
        $this->db->where('mailaduser',$ticket['user_id']);
        $this->db->like("mailadsubject", $ticket['subject']);
        $res = $this->db->get();
        $i=0;
        foreach ($res->result_array() as $row) {
             $ticket_reply[$i]['msg']=$row['mailadidmsg'];
             $ticket_reply[$i]['img']=$row['image_name'];
             $ticket_reply[$i]['date']=$row['mailadiddate'];
             $i++;
        }
        return $ticket_reply;
        
     }
     public function updateTicket($tkt_id,$image){
                $this->db->set('attachments', $image);
                $this->db->where('trackid', $tkt_id);
                $res = $this->db->update('tickets');
         
     }
     
}
?>
