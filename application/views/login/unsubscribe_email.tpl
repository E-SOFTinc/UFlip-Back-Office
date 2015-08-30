{include file="admin/layout/header.tpl"  name=""}
<div id="span_js_messages" style="display: none;"> 
            <span id="error_msg">{$tran_invalid_email}</span>
</div>
    <div class="main-login col-sm-4 col-sm-offset-4">
        <div class="logo">
            <img src="{$PUBLIC_URL}images/logo.png"/>
        </div>
        <!-- start: LOGIN BOX -->
        <div class="box-login">
            <p>
            <mesasge>{include file="admin/layout/error_box.tpl" title="" name=""}</mesasge>
            </p>
            <div id="admin" class="tab_content">
                <section>
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td>
                        <left>
                            <h3>
                                {$tran_unsubscribe_email}
                            </h3>
                        </left>
                        </td>
                        
                        </tr>
                    </table>     
                    <form class="form-login" action="{$PATH_TO_ROOT_DOMAIN}login/unsubscribe_email" method="post"  id="login_form" name="login_form">

                        <input type="hidden" value="{$BASE_URL}" name="path_root"  id="path_root">
                        <input type="hidden" value="{$BASE_URL}admin/home" name="path_root_home"  id="path_root_home">
                        <input type="hidden" value="{$BASE_URL}public_html/" name="view_image"  id="view_image">

                        <div class="errorHandler alert alert-danger no-display">
                            <i class="fa fa-remove-sign"></i>{$tran_errors_check}
                        </div>
                        <fieldset>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input tabindex="1" type="text" name="email"  id="email" placeholder="{$tran_email_to_unsubscribe}" class="form-control" />
                            </div>
                            <div class="form-group form-actions">

                            </div>
                            <div class="form-actions">

                                <input type ="submit"  tabindex="2" id="unsubscribe" name="unsubscribe" value = "{$tran_unsubscribe}" class="btn btn-bricky pull-right" /><span id="loginmsg" style="display:none"></span>
                            <leftspan style="float:none"><a href="{$BASE_URL}../../" ><div class="btn btn-light-grey go-back">
                            <i class="fa fa-circle-arrow-left"></i> Cancel
                            </div></a></leftspan>

                            </div>
                        </fieldset>
                    </form>
                </section>
            </div>
        </div>
    </div>
{include file="admin/layout/login_footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function() {
        Main.init();
        ValidateEmail.init();
    });
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}