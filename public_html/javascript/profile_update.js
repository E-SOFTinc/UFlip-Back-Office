function change_day(e)
{
	var dob = document.form.date_of_birth.value;
	day = e.value;
	var new_dob = dob.substr(0,7);
	document.form.date_of_birth.value = new_dob+"-"+day;
}

function change_month(e)
{
	var dob = document.form.date_of_birth.value;
	month = e.value;
	var year = dob.substr(0,4);
	var day = dob.substr(7,3);
	document.form.date_of_birth.value = year+"-"+month+day;
}
function day_month(e){
        var day = document.form.day.value;
        var i=1;
        var month=e.value;
        var month_day= new Array();
        var option = "";
        option = option + "<option value=''>DD</option>";
        if(month== '04' || month== '06' || month== '09' || month== '11')
        {

            for (i = 1; i <= 30; i++) {
              option = option + "<option value=" + i;
              if(day!="" && i==day)
                option = option + " selected ";
              option = option + ">" + i + "</option>";
            }
            document.getElementById('day').innerHTML = option;
        }
        else if(month== '02')
        {  
              for (i = 1; i <= 29; i++) {
                option = option + "<option value=" + i;
                if(day!="" && i==day)
                  option = option + " selected ";
                option = option + ">" + i + "</option>";
              }
             document.getElementById('day').innerHTML = option;
        }
        else
        {
              for (i = 1; i <= 31; i++) {
                option = option + "<option value=" + i;
                if(day!="" && i==day)
                  option = option + " selected ";
                option = option + ">" + i + "</option>";
              }
             document.getElementById('day').innerHTML = option;
        }        
        
}
function change_year(e)
{
	var dob = document.form.date_of_birth.value;
	year = e.value;
	var new_dob = dob.substr(4,10);
	document.form.date_of_birth.value = year+new_dob;
}

//validate crd
function expiry_month(e)
{
	var exm = document.form.card_expiry_date.value;
	month = e.value;
	var year = exm.substr(0,4);
	//var day = dob.substr(7,3);
	document.form.card_expiry_date.value = year+"-"+month;
       
         
}

function expiry_year(e)
{
	var exm = document.form.card_expiry_date.value;
	year = e.value;
	var new_exm = exm.substr(4,10);
	document.form.card_expiry_date.value = year+new_exm;
        
}

//up to here
//validate registration..............

function validate_profile(form)
{
var msg = "";
var numberRegex = /^[0-9]+/;
var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
if(document.form.full_name)
 {
var full_name = form.full_name.value;
 }
 if(document.form.address)
 {
var address = form.address.value;
 }
  if(document.form.town)
 {
var town = form.town.value;
 }
if(document.form.state)
 {
var state = form.state.value;
 }
 if(document.form.district_hid)
 {
var district = form.district_hid.value;
 }
  if(document.form.post_office)
 {
var post_office = form.post_office.value;
 }
if(document.form.pin)
 {
var pin = form.pin.value;
 }
if(document.form.gender)
 {
var  gender = form.gender.value;
 }
if(document.form.mobile)
 {
var mobile = form.mobile.value;
 }
 if(document.form.college)
 {
var college = form.college.value;
 }
  if(document.form.course)
 {
var course = form.course.value;
 }
 if(document.form.year_study)
 {
var year_study = form.year_study.value;
 }
 if(document.form.date_of_birth)
 {
var date_of_birth = form.date_of_birth.value;
 }
 if(document.form.email)
 {
var email = form.email.value;
 }
 if(full_name == "")
   {
  msg = $("#error_msg2").html();
  inlineMsg('full_name',msg,4);
  return false;
  }

  if(address == "")
   {
  msg = $("#error_msg3").html();
  inlineMsg('address',msg,4);
  return false;
  }
   if(town == "")
   {
  msg = $("#error_msg4").html();
  inlineMsg('town',msg,4);
  return false;
  }

  if(state == "")
   {
  msg = $("#error_msg5").html();
  inlineMsg('state',msg,4);
  return false;
  }
//  alert(district);
  if(district == "")
   {
  msg = $("#error_msg6").html();
  inlineMsg('district',msg,4);
  return false;
  }
  if(post_office == "")
   {
  msg = $("#error_msg7").html();
  inlineMsg('post_office',msg,4);
  return false;
  }
   if(pin == "") {
  msg = $("#error_msg8").html();
  inlineMsg('pin',msg,4);
  return false;
  }
  /*if(pin.length < 6 ) {
    inlineMsg('pin','pin length error...',4);
    return false;
  }
  if(!pin.match(numberRegex)) {
    inlineMsg('pin','You have entered an invalid pincode.',4);
    return false;
  }*/
       
   if(mobile == "") {
   msg = $("#error_msg9").html();
   inlineMsg('mobile',msg,4);
  return false;
  }
  if(college == "") {
  msg = $("#error_msg10").html();
  inlineMsg('college',msg,4);
  return false;
  }
  if(course == "") {
  msg = $("#error_msg11").html();
  inlineMsg('course',msg,4);
  return false;
  }
  if(year_study == "") {
  inlineMsg('year_study','You must enter education period...',4);
  return false;
  }
  if(date_of_birth == "") {
       //alert(date_of_birth);

  inlineMsg('jscal_trigger_Month2','You must enter your date of birth...',4);
  return false;
  }

    if(gender == "") {
  msg = $("#error_msg12").html();
  inlineMsg('gender',msg,4);
  return false;
  }
 if(email!="" && !email.match(emailRegex) && email!="NA")
       {
   inlineMsg('email','Invalid  email...',4);
       return false;

       }
   return true;

}


function setHiddenValue(dst)
{
    
    document.form.district_hid.value=dst;
}





var MSGTIMER = 20;
var MSGSPEED = 10;
var MSGOFFSET = 10;
var MSGHIDE = 100;

// build out the divs, set attributes and call the fade function //
/*function inlineMsg(target,string,autohide) {
 
  var msg;
  var msgcontent;
  if(!document.getElementById('msg')) {
    msg = document.createElement('div');
    msg.id = 'msg';
    msgcontent = document.createElement('div');
    msgcontent.id = 'msgcontent';
    document.body.appendChild(msg);
    msg.appendChild(msgcontent);
    msg.style.filter = 'alpha(opacity=0)';
    msg.style.opacity = 0;
    msg.alpha = 0;
  } else {
    msg = document.getElementById('msg');
    msgcontent = document.getElementById('msgcontent');
  }
  msgcontent.innerHTML = string;
  msg.style.display = 'block';
  var msgheight = msg.offsetHeight;
  if( document.target){
  var targetdiv = document.getElementById(target);
  targetdiv.focus();
  var targetheight = targetdiv.offsetHeight;
  var targetwidth = targetdiv.offsetWidth;
  var topposition = topPosition(targetdiv) - ((msgheight - targetheight) / 2);
  var leftposition = leftPosition(targetdiv) + targetwidth + MSGOFFSET;
  }
  msg.style.top = topposition + 'px';
  msg.style.left = leftposition + 'px';
  clearInterval(msg.timer);
  msg.timer = setInterval("fadeMsg(1)", MSGTIMER);
  if(!autohide) {
    autohide = MSGHIDE;
  }
  window.setTimeout("hideMsg()", (autohide * 1000));
}*/

// hide the form alert //
function hideMsg(msg) {
  var msg = document.getElementById('msg');
  if(!msg.timer) {
    msg.timer = setInterval("fadeMsg(0)", MSGTIMER);
  }
}

// face the message box //
function fadeMsg(flag) {
  if(flag == null) {
    flag = 1;
  }
  var msg = document.getElementById('msg');
  var value;
  if(flag == 1) {
    value = msg.alpha + MSGSPEED;
  } else {
    value = msg.alpha - MSGSPEED;
  }
  msg.alpha = value;
  msg.style.opacity = (value / 100);
  msg.style.filter = 'alpha(opacity=' + value + ')';
  if(value >= 99) {
    clearInterval(msg.timer);
    msg.timer = null;
  } else if(value <= 1) {
    msg.style.display = "none";
    clearInterval(msg.timer);
  }
}

// calculate the position of the element in relation to the left of the browser //
function leftPosition(target) {
  var left = 0;
  if(target.offsetParent) {
    while(1) {
      left += target.offsetLeft;
      if(!target.offsetParent) {
        break;
      }
      target = target.offsetParent;
    }
  } else if(target.x) {
    left += target.x;
  }
  return left;
}

// calculate the position of the element in relation to the top of the browser window //
function topPosition(target) {
  var top = 0;
  if(target.offsetParent) {
    while(1) {
      top += target.offsetTop;
      if(!target.offsetParent) {
        break;
      }
      target = target.offsetParent;
    }
  } else if(target.y) {
    top += target.y;
  }
  return top;
}

// preload the arrow //
if(document.images)
{
  arrow = new Image(7,80);
  arrow.src = "../public_html/images/msg_arrow.gif";
}
