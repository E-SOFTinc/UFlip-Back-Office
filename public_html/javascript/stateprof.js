/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


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
	
 function getAllStates(country_id)
{
  // alert(country_id);
  var root =document.user_register.path.value
    var lang_id =document.user_register.lang_id.value
    //alert(root);
    var strURL=root+"profile/get_states/"+country_id+"/"+lang_id;
    var req = getXMLHTTP();
		
    if (req) {
			
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    //alert(trim(req.responseText));
//                    if(country_id=='IN')
//                        {
                          //  alert("cccc");
                    document.getElementById('prof_state_div').innerHTML=trim(req.responseText);
//                    document.getElementById('state_div').style.display='';
//                    document.getElementById('statediv1').style.display='none';
//                    document.getElementById('locationdiv').style.display='none';
                       /* }
                        else
                            {
                                document.getElementById('state_div').style.display='none';
                                document.getElementById('statediv1').style.display='none';
                                document.getElementById('locationdiv').innerHTML=trim(req.responseText);
                                document.getElementById('locationdiv').style.display='';
                            }*/
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }				
        }			
        req.open("GET", strURL, true);
        //alert(strURL);
        req.send(null);
    }		
}
function getState(stateId)
{
    var root =document.user_register.path.value
    //alert(root);
    var strURL=root+"register/get_district/"+stateId;
    var req = getXMLHTTP();
		
    if (req) {
			
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    //alert(trim(req.responseText));
                    document.getElementById('statediv1').innerHTML=trim(req.responseText);
                    document.getElementById('statediv1').style.display='';
                    document.getElementById('locationdiv').style.display='none';
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }				
        }			
        req.open("GET", strURL, true);
        //alert(strURL);
        req.send(null);
    }		
}
	function getCity(countryId,stateId) 
	{		
		var strURL="findCity1.php?country="+countryId+"&state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;
                                            
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			//alert(strURL);
			req.send(null);
		}
				
	}
        
	function getStateProfile(stateId,type)
        {
            var root =document.user_register.path.value
            //alert(root);
	   var strURL=root+type+"/profile/get_district/"+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
                                                //alert(trim(req.responseText));
						document.getElementById('statediv1').innerHTML=trim(req.responseText);
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			//alert(strURL);
			req.send(null);
		}		
	}        

function getUser(pin)
 {
		var strURL="ajax/getUser.php?pin="+pin;
		var req = getXMLHTTP();

		if (req) {

			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
                                       
					if (req.status == 200) {

						
                                                var user_name=trim(req.responseText);
                               
                                                document.user_register.username.value=user_name;
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}
			}
			req.open("GET", strURL, true);
			//alert(strURL);
			req.send(null);
		}

	}
 window.onload = function() {
     var country = document.searchform.cur_country.value;
     if(country == "India")
         {
             document.getElementById('state_div').style.display='';
             document.getElementById('statediv1').style.display='';
             document.getElementById('locationdiv').style.display='none';
         }
         else
             {
             document.getElementById('state_div').style.display='none';
             document.getElementById('statediv1').style.display='none';
             document.getElementById('locationdiv').style.display='';
             }
 }