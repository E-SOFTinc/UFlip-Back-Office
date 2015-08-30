
jQuery.fn.wordCount = function(params){
	var p = 
	{
		counterElement:"display_count"
	
	};
		var a = 
	{
	countersmsElement:"display_smscount"
	
	};
		
	var total_words;
	
	if(params) {
		jQuery.extend(p, params);
	}
	
	//for each keypress function on text areas
	this.keypress(function()
	{ 
		total_words=this.value.length;
		total_words+=1;
		jQuery('#'+p.counterElement).html(total_words);
		total_sms=Math.floor(total_words/160)+1;
		jQuery('#'+a.countersmsElement).html(total_sms);
		document.send_sms.sms_count.value=total_sms;
	});	
};
