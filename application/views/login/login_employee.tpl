{include file="admin/layout/header.tpl"  name=""}
		<div class="main-login col-sm-4 col-sm-offset-4">
			<div class="logo">
                <img src="{$PUBLIC_URL}images/logos/{$site_info["logo"]}"  />
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
                                Employee Login Form
                            </h3>
                        </left>
                        </td>
                        <td>
                        <right>
                            <img src="{$PUBLIC_URL}images/1358434827_gnome-keyring-manager.png" width="50" />
                        </right>
                        </td>
                        </tr>
                    </table>     
                    <form class="form-login" action="{$PATH_TO_ROOT_DOMAIN}login/verify_employee_login" method="post"  id="login_form" name="login_form">
					
					 <input type="hidden" value="{$BASE_URL}" name="path_root"  id="path_root">
                        <input type="hidden" value="{$BASE_URL}admin/home" name="path_root_home"  id="path_root_home">
                        <input type="hidden" value="{$BASE_URL}public_html/" name="view_image"  id="view_image">

					<div class="errorHandler alert alert-danger no-display">
						<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
					</div>
					<fieldset>
						<div class="form-group">
							<span class="input-icon">
								<input tabindex="1" type="text" name="user_name"  id="user_name" autocomplete="Off"size="32" maxlength="128" border="0" value="" placeholder="Employee User Name" class="form-control" />
								<i class="fa fa-user"></i> </span>
						</div>
						<div class="form-group form-actions">
                                            <span class="input-icon">
                                                <input type="password" tabindex="2" class="form-control password" name="password" placeholder="Password">
                                                <i class="fa fa-lock"></i>
                                            </span>
                        </div>
						<div class="form-actions">
							
							<input type ="submit"  tabindex="3" id="login" name="login" value = "Login" class="btn btn-bricky pull-right" /><span id="loginmsg" style="display:none"></span>
							<a href="{$BASE_URL}" ><div class="btn btn-light-grey go-back">
                                <i class="fa fa-circle-arrow-left"></i>{$tran_back}
                            </div></a>
							
						</div>
					</fieldset>
					
					
					
                    </form>
                </section>
            </div>
    	</div>
    </div>

{include file="admin/layout/login_footer.tpl" title="Example Smarty Page" name=""}
<script>
    jQuery(document).ready(function () {
        Main.init();
        //TableData.init();

        ValidateUser.init();
        //DateTimePicker.init();
    });
</script>

{include file="admin/layout/page_footer.tpl" title="Example Smarty Page" name=""}