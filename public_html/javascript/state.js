function trim(a)
{

    return a.replace(/^\s+|\s+$/, '');
}

function getXMLHTTP() { //fuction to return the xml http object
    var xmlhttp = false;
    try {
	xmlhttp = new XMLHttpRequest();
    }
    catch (e) {
	try {
	    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	catch (e) {
	    try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	    }
	    catch (e1) {
		xmlhttp = false;
	    }
	}
    }

    return xmlhttp;
}

function getAllStates(country_id)
{
    if (country_id == '') {
	document.getElementById('state_div').style.display = 'none';///////CODE EDITED BY YASIR//////////////
    }
    else {
	//alert(country_code);
	getPhoneCode(country_id);
	var root = document.form.path.value
	var lang_id = document.form.lang_id.value
	//alert(root);
	var strURL = root + "register/get_states/" + country_id + "/" + lang_id;
	var req = getXMLHTTP();

	if (req) {

	    req.onreadystatechange = function() {
		if (req.readyState == 4) {
		    // only if "OK"
		    if (req.status == 200) {
			//alert(trim(req.responseText));
			document.getElementById('state_div').innerHTML = trim(req.responseText);
			document.getElementById('state_div').style.display = '';
			//document.getElementById('district_div').style.display='none';
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
}
function getPhoneCode(country_id)
{
    var root = document.form.path.value
    var lang_id = document.form.lang_id.value
    //alert(root);
    var strURL = root + "register/get_phone_code/" + country_id;
    var req = getXMLHTTP();

    if (req) {

	req.onreadystatechange = function() {
	    if (req.readyState == 4) {

		if (req.status == 200) {
		    document.getElementById('mobile_code').value = trim(req.responseText);
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
    var root = document.form.path.value
    //alert(root);
    var strURL = root + "register/get_district/" + stateId;
    var req = getXMLHTTP();

    if (req) {

	req.onreadystatechange = function() {
	    if (req.readyState == 4) {
		// only if "OK"
		if (req.status == 200) {
		    //alert(trim(req.responseText));
		    document.getElementById('district_div').innerHTML = trim(req.responseText);
		    document.getElementById('district_div').style.display = '';
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
function getCity(countryId, stateId)
{
    var strURL = "findCity1.php?country=" + countryId + "&state=" + stateId;
    var req = getXMLHTTP();

    if (req) {

	req.onreadystatechange = function() {
	    if (req.readyState == 4) {
		// only if "OK"
		if (req.status == 200) {
		    document.getElementById('citydiv').innerHTML = req.responseText;

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

function getStateProfile(stateId, type)
{
    var root = document.form.path.value
    //alert(root);
    var strURL = root + type + "/profile/get_district/" + stateId;
    var req = getXMLHTTP();

    if (req) {

	req.onreadystatechange = function() {
	    if (req.readyState == 4) {
		// only if "OK"
		if (req.status == 200) {
		    //alert(trim(req.responseText));
		    document.getElementById('statediv1').innerHTML = trim(req.responseText);
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
    var strURL = "ajax/getUser.php?pin=" + pin;
    var req = getXMLHTTP();

    if (req) {

	req.onreadystatechange = function() {
	    if (req.readyState == 4) {
		// only if "OK"

		if (req.status == 200) {


		    var user_name = trim(req.responseText);

		    document.form.username.value = user_name;
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
