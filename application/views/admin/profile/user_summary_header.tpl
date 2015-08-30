<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i>{$tran_user_account}
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                        <i class="fa fa-refresh"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-expand" href="#">
                        <i class="fa fa-resize-full"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-close" href="#">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12"><div class="center">
                        {if !$is_valid_username}
                            <h4 align="center"><font color="#FF0000">{$tran_Username_not_Exists}</font></h4>
                            {else}
                        </div>                     
                        {if count($details)!=0}
                            <div class="panel-body">
                                {assign var="k" value ="0"}
                                {assign var="class" value =""}
                                {foreach from=$details item=v}
                                    <table class="table table-condensed table-hover">
                                        <thead></thead>
                                        <tbody>
                                            <tr><div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="{$PUBLIC_URL}images/profile_picture/{$file_name}" alt="">
                                        </div></tr>
                                        <tr><td  width="180px">{$tran_User_Name}  <td  width="50px">: </td></td><td>{$user_name}</td>
                                        <tr><td>{$tran_full_name}  <td>:</td></td><td> {$v.name}</td>
                                        <tr><td>{$tran_email}  <td>:</td></td><td> {$v.email}</td>
                                        <tr><td>{$tran_mobile_no}  <td>:</td></td><td> {$v.mobile}</td>
                                        <tr><td>{$tran_address}  <td>:</td></td><td> {$v.address}</td>
                                        <tr><td>{$tran_country}  <td>:</td></td><td> {$v.country}</td>
                                            </tbody>
                                    </table>
                                    {assign var="i" value ="0"}
                                    <ul style="list-style-type:none">
                                        <li><form action="../profile/profile_view" method="get">
                                                <input type="hidden" name="user_name" value="{$user_name}" />
                                                
                                                <button type="submit" name="profile_view" class="btn btn-bricky top-btn" value="profile_view">{$tran_view_profile}</button>
                                            </form>
                                        {$i=$i+1}{if $i%3==0}</li><li>{/if}
                                        {if $mlm_plan != "Board"}    
                                            <form action="../leg_count/view_leg_count"  method="get">
                                                <button type="submit" name="user_name" class="btn btn-bricky top-btn" value="{$user_name}">{$tran_view_commission_details}</button>
                                            </form>
                                        {/if}
                                    {$i=$i+1}{if $i%3==0}</li><li>{/if}
                                    <form action="../income_details/income" method="get">
                                        <button type="submit" name="user_name" class="btn btn-bricky top-btn" value="{$user_name}">{$tran_view_income_details}</button>
                                    </form>
                                {$i=$i+1}{if $i%3==0}</li><li>{/if}
                                {if $referal_status=="yes"}
                                    <form action="../configuration/my_referal" method="get">
                                        <button type="submit" name="user_name" class="btn btn-bricky top-btn" value="{$user_name}">{$tran_view_refferal_details}</button>
                                    </form>
                                {$i=$i+1}{if $i%3==0}</li><li>{/if}
                            {/if}
                            {if $ewallet_status=="yes"}
                                <form action="../ewallet/my_ewallet"  method="get">
                                    <button type="submit" name="user_name" class="btn btn-bricky top-btn" value="{$user_name}">{$tran_view_ewallet_details}</button>
                                </form>
                            {$i=$i+1}{if $i%3==0}</li><li>{/if}
                        {/if}
                        {if $pin_status=="yes"}
                            <form action="../epin/view_pin_user" method="get">
                                <button type="submit" name="user" class="btn btn-bricky top-btn" value="{$user_name}">{$tran_view_user_epin}</button>
                            </form>
                        {$i=$i+1}{if $i%3==0}</li><li>{/if}
                    {/if}<form action="../payout/my_income"  method="get">
                        <button type="submit" name="user_name" class="btn btn-bricky top-btn" value="{$user_name}">{$tran_view_income_statement}</button>
                    </form>{$i=$i+1}{if $i%3==0}</li><li>{/if}
            </ul>
        {/foreach}
    {/if}
{/if}
</div>
</div>
</div>  
</div>
</div>
</div>

