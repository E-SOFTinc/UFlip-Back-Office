
function trim(s)
{
    return s.replace(/^\s+|\s+$/, '');
}

$(document).ready(function()
{
    $("#login_form").submit(function()
    {
       
        var post_path = $("#path_root").val() + "login/validate_login";
        var image = $("#view_image").val() + "images/loader.gif"


        //remove all the class add the messagebox classes and start fading
        $("#loginmsg").removeClass().addClass('messageboxok').addClass('messagebox').html('<img align="absmiddle" src=' + image + ' /> Validating.......').show().fadeTo(200, 1);
        //check the username exists or not from ajax\

        $.post(post_path, {user_name: $('#user_name').val(), password: $('#password').val(), rand: Math.random(), secure_token: $("#secure_token").val(), secure_index: $("#secure_index").val()}, function(data)
        {
            //alert('#'+data+'#');
            if (trim(data) == 'yes') //if correct login detail
            {

                $("#loginmsg").fadeTo(200, 0.1, function()  //start fading the messagebox
                {
                    //alert(data); 
                    //add message and change the class of the box and start fading
                    $(this).html('Logging in...........').removeClass().addClass('messageboxok').addClass('messagebox').fadeTo(900, 1,
                            function()
                            {
                                document.location = $("#path_root_home").val();
                            });
                });
            }
            else if (data == 'no')
            {
                $("#loginmsg").fadeTo(200, 0.1, function() //start fading the messagebox
                {
                    //add message and change the class of the box and start fading
                    $(this).html('Incorrect User Name or Password...').removeClass().addClass('messageboxerror').addClass('messagebox').fadeTo(900, 1);
                });
            }
            else if (data == 'blocked')
            {
                $("#loginmsg").fadeTo(200, 0.1, function() //start fading the messagebox
                {
                    //add message and change the class of the box and start fading
                    $(this).html('IM Blocked,Please Try again...').removeClass().addClass('messageboxerror').addClass('messagebox').fadeTo(900, 1);
                });
            }
            else if (data == 'token missmatch')
            {
                $("#loginmsg").fadeTo(200, 0.1, function() //start fading the messagebox
                {
                    //add message and change the class of the box and start fading
                    $(this).html('Token Missmatch!!!').removeClass().addClass('messageboxerror').addClass('messagebox').fadeTo(900, 1);
                });
            }

            else
            {
                $("#loginmsg").fadeTo(200, 0.1, function() //start fading the messagebox
                {
                    //add message and change the class of the box and start fading
                    $(this).html('Check database connectivity...').removeClass().addClass('messageboxerror').addClass('messagebox').fadeTo(900, 1);
                });
            }
        });
        return false; //not to post the  form physically
    });
});