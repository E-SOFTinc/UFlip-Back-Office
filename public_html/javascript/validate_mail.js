function validate_mailbox(compose_admin)

{



var subject = compose_admin.subject.value;

var message = compose_admin.message.value;

var msg="";

if(subject == "") {

  msg = $("#error_msg1").html();
  inlineMsg('subject',msg,4);

  return false;

  }

  if(message == "") {

  msg = $("#error_msg2").html();
  inlineMsg('message',msg,4);

  return false;

  }

return true;

}

function trim(a)
{

    return a.replace(/^\s+|\s+$/,'');
}

function getXMLHTTP() { //fuction to return the xml http object
    var xmlhttp=false;	
    try{
        xmlhttp=new XMLHttpRequest();
    }
    catch(e)	{		
        try{			
            xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch(e){
            try{
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch(e1){
                xmlhttp=false;
            }
        }
    }
		 	
    return xmlhttp;
}


function getUsername(username,mail_message)
{
    document.getElementById("user_id").value = username;
    document.getElementById("subject").value = mail_message;
}
//validate Mailbox Admin

function validate_mailbox_admin(compose)

{



var subject = compose.subject.value;

var message = compose.message.value;

var status_mul = compose.status_mul.checked;
//alert(status_mul);

if(status_mul){
    var user_id = compose.user_id.value;
}

var msg="";
if(status_mul){
    
   if(user_id == "") {

    msg = $("#error_msg1").html();
    inlineMsg('user_id',msg,4);

  return false;

  }
}

  

  if(subject == "") {

  msg = $("#error_msg2").html();
  inlineMsg('subject',msg,4);

  return false;

  }

  if(message == "") {
  
  msg = $("#error_msg3").html();
  inlineMsg('message',msg,4);

  return false;

  }

return true;

}


//validate reply mail-------

function validate_replay_message(reply_mail_to)
{

var user_id = reply_mail_to.user_id.value;

var subject = reply_mail_to.subject.value;

var message = reply_mail_to.message.value;

var msg="";


  if(subject == "") {

  msg = $("#error_msg1").html();
  inlineMsg('subject',msg,4);

  return false;

  }

  if(message == "") {

  msg = $("#error_msg2").html();
  inlineMsg('message',msg,4);

  return false;

  }

return true;


}

function show_text()
{
	var html;
	html = " <label class='col-sm-2 control-label' for='user_id'>User Name<span class='symbol required'></span></label><div class='col-sm-6'><input tabindex='1' type='text' id='user_id' name='user_id' onKeyUp=\"ajax_showOptions(this,'getCountriesByLetters',event)\" autocomplete='Off' /></div>";
	document.getElementById('user_div').innerHTML=html;
	document.getElementById('user_div').style.display="";	
}

function hid_text()
{
	document.getElementById('user_div').style.display="none";	
}