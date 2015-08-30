function validate_newsupload(upload_news)

{

    var msg = "";  

    var news_title = upload_news.news_title.value;

    var news_desc = upload_news.news_desc.value;



    if(news_title == "") {

        msg = $("#error_msg1").html();  
        inlineMsg('news_title',msg,4);

        return false;

    }

    if(news_desc == "") {

        msg = $("#error_msg2").html();
        inlineMsg('news_desc',msg,4);

        return false;

    }



    return true;





}



function validate_fileupload(upload_fle)

{


    var file_title = upload_fle.file_title.value;

    var upload_doc = upload_fle.upload_doc.value;



    if(file_title == "") {

        inlineMsg('file_title',"You must enter File Title...",4);

        return false;

    }

    if(upload_doc == "") {

        inlineMsg('upload_doc',"You must Select A File...",4);

        return false;

    }

    return true;

}
function edit_events(id,root)

{
    var confirm_msg = $('#confirm_msg1').html();
    if(confirm(confirm_msg))

    {

        document.location.href=root+'news/event/edit/'+id;

    }



}

//Delete News

function delete_events(id,root)

{
    var confirm_msg = $('#confirm_msg2').html();
    if(confirm(confirm_msg))

    {

        document.location.href=root+'news/event/delete/'+id;

    }



}
function edit_system(id,root)

{
    var confirm_msg = $('#confirm_msg1').html();
    if(confirm(confirm_msg))

    {

        document.location.href=root+'news/system/edit/'+id;

    }



}

//Delete News

function delete_system(id,root)

{
    var confirm_msg = $('#confirm_msg2').html();
    if(confirm(confirm_msg))

    {

        document.location.href=root+'news/system/delete/'+id;

    }



}
function validate_event(upload_news)
{
    var msg = "";  

    var event_title = upload_news.event_title.value;

    var event_venue = upload_news.event_venue.value;
    
    var event_date = upload_news.event_date.value;
    
    var event_time = upload_news.event_time.value;
    
    var event_desc = upload_news.event_desc.value;

    if(event_title == "") {

        msg = $("#validate_msg1").html();  
        inlineMsg('event_title',msg,4);

        return false;

    }
    if(event_venue == "") {

        msg = $("#validate_msg2").html();  
        inlineMsg('event_venue',msg,4);

        return false;

    }
    if(event_date == "") {

        msg = $("#validate_msg3").html();  
        inlineMsg('event_date',msg,4);

        return false;

    }
    if(event_time == "") {

        msg = $("#validate_msg4").html();  
        inlineMsg('event_time',msg,4);

        return false;

    }
    if(event_desc == "") {

        msg = $("#validate_msg5").html();  
        inlineMsg('event_desc',msg,4);

        return false;

    }
    return true;
    
}
function validate_quote(upload_news)
{
    var msg = "";  

    var quote = upload_news.quote.value;
   

    if(quote == "") {

        msg = $("#validate_msg1").html();  
        inlineMsg('quote',msg,4);

        return false;

    }
   
    return true;
    
}
function edit_quote(id,root)

{
    var confirm_msg = $('#confirm_msg1').html();
    if(confirm(confirm_msg))

    {

        document.location.href=root+'news/motivation/edit/'+id;

    }



}

//Delete News

function delete_quote(id,root)

{
    var confirm_msg = $('#confirm_msg2').html();
    if(confirm(confirm_msg))

    {

        document.location.href=root+'news/motivation/delete/'+id;

    }



}

var ValidateUser = function () {
    
    // function to initiate Validation Sample 1
    var msg=$("#error_msg").html();
    var msg1=$("#error_msg1").html();

    var runValidatorweeklySelection = function () {
        var searchform = $('#upload_news');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#upload_news').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function (error, element) { // render error placement for each input type
             
                error.insertAfter(element);
            // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                
                news_title: {
                    minlength: 1,
                    required: true
                },
                news_desc: {
                    minlength: 1,
                    required: true
                }
            },
            messages: {                
               
                news_title: msg,
                news_desc: msg1
                
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                errorHandler1.show();
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
            // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
            // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                //$(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
                $(element).closest('.form-group').removeClass('has-error').addClass('ok');
            }
        });
    };
 
    return {
        //main function to initiate template pages
        init: function () {
            runValidatorweeklySelection();
           
        }
    };
}();

var ValidateNewsUpload = function () {
    
    // function to initiate Validation Sample 1
    var msg=$("#validate_msg1").html();
    var msg1=$("#validate_msg2").html();
    var runValidateNewsUpload = function () {
        var searchform = $('#upload_materials');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#upload_materials').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function (error, element) { // render error placement for each input type
             
                error.insertAfter(element);
            // for other inputs, just perform default behavior
            },
            ignore: ':hidden',
            rules: {
                
                file_title: {
                    minlength: 1,
                    required: true
                },
                upload_doc:{
                     minlength: 1,
                    required: true
                }
            },
            messages: {                
               
                file_title: msg,
                upload_doc:msg1
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                errorHandler1.show();
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
            // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
            // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                //$(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
                $(element).closest('.form-group').removeClass('has-error').addClass('ok');
            }
        });
    };
 
    return {
        //main function to initiate template pages
        init: function () {
            runValidateNewsUpload();
           
        }
    };
}();