{include file="admin/layout/header.tpl"  name=""}
<gadgetsgroup>
    <gadgets>
        <gadico>
            <img src="{$PUBLIC_URL}images/1358515008_1.png" />
        </gadico>
        <a href="#">
            <gadcontent>
                <h2>{$tran_joinings}</h2>
                <p>
                    {$tran_total_joining} : <redspan>{$total_joining}</redspan>
                <br/>
                {$tran_today_joining} : <redspan>{$todays_joining}</redspan>
                </p>
            </gadcontent>
        </a>
    </gadgets>
    <gadgets>
        <gadico>
            <img src="{$PUBLIC_URL}images/1358519474_wallet.png" />
        </gadico>
        <a href="#">
            <gadcontent>
                <h2>{$tran_e_wallet}</h2>
                <p>
                    {$tran_total_amounts} : <redspan>{$total_amount}</redspan>
                    {* <br/>
                    Requested Amounts : <redspan>{$requested_amount}</redspan>
                    <br/>
                    Total Requested : <redspan>{$total_request}</redspan>*}
                </p>
            </gadcontent>
        </a>
    </gadgets>
    {if $pin_status == "yes"}  
        <gadgets>
            <gadico>
                <img src="{$PUBLIC_URL}images/E-pin.png" />
            </gadico>
            <a href="#">
                <gadcontent>
                    <h2>{$tran_epin}</h2>
                    <p>
                        {$tran_total} : <redspan>{$total_pin}</redspan>
                    <br/>
                    {$tran_used} : <redspan>{$used_pin}</redspan>
                    <br/>
                    {$tran_requested} : <redspan>{$requested_pin}</redspan>
                    </p>
                </gadcontent>
            </a>
        </gadgets>
    {/if} 
    <gadgets>
        <gadico>
            <img src="{$PUBLIC_URL}images/1358522421_e-mail2 .png" />
        </gadico>
        <a href="#">	
            <gadcontent>
                <h2>{$tran_mail}</h2>
                <p>
                    {$tran_read} : <redspan>{$read_mail}</redspan>
                <br/>
                {$tran_unread} : <redspan>{$unread_mail}</redspan>
                <br/>
                {$tran_today} : <redspan>{$mail_today}</redspan>
                </p>
            </gadcontent>
        </a>
    </gadgets>
</gadgetsgroup>
<dashes>
    <hdash>{$tran_dashboard}</hdash>
    <cdash>

        <bubbleInfo>

           {if $MLM_PLAN !="Board"}
                <menus>
                    <a href="#">
                        <center><img src="{$PUBLIC_URL}images/Family Tree.png" /></center>
                        <h3>{$tran_tree_view}</h3>
                    </a>
                </menus>
                <popup>
                    <simplearrow></simplearrow>
                    <ul>
                        <li><a href="{$PATH_TO_ROOT}admin/tree/select_tree">{$tran_genealogy_treeview}</a></li>
                        <li><a href="{$PATH_TO_ROOT}admin/tree/select_tree">{$tran_tabular_treeview}</a></li>
                    </ul>
                </popup>
            {else}
                <menus>
                    <a href="#">
                        <center><img src="{$PUBLIC_URL}images/Family Tree.png" /></center>
                        <h3>{$tran_Club_View}</h3>
                    </a>
                </menus>
                <popup>
                    <simplearrow></simplearrow>
                    <ul>
                        <li><a href="{$PATH_TO_ROOT}admin/boardview/view_board">{$tran_view_club}</a></li>
                        <li><a href="{$PATH_TO_ROOT}admin/boardview/search_board">{$tran_search_club}</a></li>
                    </ul>
                </popup>
            {/if}
        </bubbleInfo>

        <bubbleInfo>
            <menus>
                <a href="#">
                    <center><img src="{$PUBLIC_URL}images/1358441562_Settings.png" /></center>
                    <h3>{$tran_configuration}</h3>
                </a>
            </menus>
            <popup>
                <simplearrow></simplearrow>
                <ul>
                    <li><a href="{$PATH_TO_ROOT}admin/configuration/configuration_view">{$tran_network_configuration}</a></a></li>
                    <li><a href="{$PATH_TO_ROOT}admin/configuration/content_management">Content Management</a></a></li>
                    <li><a href="{$PATH_TO_ROOT}admin/configuration/site_information">{$tran_site_information}</a></span></li>
                    <li><a href="{$PATH_TO_ROOT}admin/configuration/set_referal_status">{$tran_referral_status}</a></li>
                    <!--<li><a href="{$PATH_TO_ROOT}admin/configuration/set_module_status">{$tran_module_status}</a></li>-->
                    <li><a href="{$PATH_TO_ROOT}admin/configuration/username_config">{$tran_user_name_configuration}</a></li>
                </ul>
            </popup>
        </bubbleInfo>
        <bubbleInfo>
            <menus>
                <a href="#">
                    <center><img src="{$PUBLIC_URL}images/1358442694_Chart_Bar.png" /></center>
                    <h3>{$tran_report}</h3>
                </a>
            </menus>
            <popup>
                <simplearrow></simplearrow>
                <ul>
                    <li><a href="{$PATH_TO_ROOT}admin/select_report/admin_profile_report">{$tran_member_profile_report}</a></a></li>
                    <li><a href="{$PATH_TO_ROOT}admin/select_report/total_joining_report">{$tran_joining_report}</a></a></li>
                    <li><a href="{$PATH_TO_ROOT}admin/select_report/bank_statement_report">{$tran_bank_statement_report}</a></a></li>
                    <li><a href="{$PATH_TO_ROOT}admin/select_report/total_payout_repor">{$tran_payout_report}</a></a></li>
                    <li><a href="{$PATH_TO_ROOT}admin/select_report/Payout_Release_Report">{$tran_payout_release_report}</a></a></li>
                    <li><a href="{$PATH_TO_ROOT}admin/select_report/my_transfer_details">{$tran_my_transfer_report}</a></a></li>
                </ul>
            </popup>
        </bubbleInfo>
        <bubbleInfo>
            <menus>
                <a href="#">
                    <center><img src="{$PUBLIC_URL}images/1358446082_23.png" /></center>
                    <h3>{$tran_earnings}</h3>
                </a>
            </menus>
            <popup>
                <simplearrow></simplearrow>
                <ul>
                    <li><a href="{$PATH_TO_ROOT}admin/leg_count/view_leg_count">{$tran_earnings}</a></li>
                </ul>
            </popup>
        </bubbleInfo>
        <bubbleInfo>
            <menus>
                <a href="#">
                    <center><img src="{$PUBLIC_URL}images/1358446215_Tag_Add.png" /></center>
                    <h3>{$tran_joinings}</h3>
                </a>
            </menus>
            <popup>
                <simplearrow></simplearrow>
                <ul>
                    <li><a href="{$PATH_TO_ROOT}admin/joining/joining_status">{$tran_joining_status}</a></li>
                </ul>
            </popup>
        </bubbleInfo>
        <bubbleInfo>
            <menus>
                <a href="#">
                    <center><img src="{$PUBLIC_URL}images/1358446299_Buddy_Group.png" /></center>
                    <h3>{$tran_profiles}</h3>
                </a>
            </menus>
            <popup>
                <simplearrow></simplearrow>
                <ul>
                    <li><a href="{$PATH_TO_ROOT}admin/profile/profile_view">{$tran_view_profile}</a></li>
                </ul>
            </popup>
        </bubbleInfo>
        {if $sms_status=="yes"}
            <bubbleInfo>
                <menus>
                    <a href="#">
                        <center><img src="{$PUBLIC_URL}images/1358446499_Android-Messages.png" /></center>
                        <h3>{$tran_sms}</h3>
                    </a>
                </menus>
                <popup>
                    <simplearrow></simplearrow>
                    <ul>
                        <li><a href="{$PATH_TO_ROOT}admin/">{$tran_send_sms}</a></li>
                        <li><a href="{$PATH_TO_ROOT}admin/">{$tran_sms_details}</a></li>
                    </ul>
                </popup>
            </bubbleInfo>
        {/if}
        <bubbleInfo>
            <menus>
                <a href="#">
                    <center><img src="{$PUBLIC_URL}images/1358446494_Android-Email.png" /></center>
                    <h3>{$tran_mail}</h3>
                </a>
            </menus>
            <popup>
                <simplearrow></simplearrow>
                <ul>
                    <li><a href="{$PATH_TO_ROOT}admin/mail/inbox">{$tran_inbox}</a></li>
                    <li><a href="{$PATH_TO_ROOT}admin/mail/compose_mail">{$tran_compose_mail}</a></li>
                </ul>
            </popup>
        </bubbleInfo>
    </cdash>
</dashes>       
<graph>

    <chart>
        <div id="chart"></div>
        <script>
            var joiningstatus =  [
                
            {assign var=array_count value=$joining_details_per_month|@count} 
            {foreach from=$joining_details_per_month key=k item=i}
               
                       { country: "{$i.country}",month: "{$i.month}", joining: "{$i.joining}" } 
                {if $array_count != $k }
                        ,
                {/if}            
 
            {/foreach} ];
                       
                    function createChartgraph() {
                    $("#chart").kendoChart({
                    theme: $(document).data("kendoSkin") || "default",
                    dataSource: {
                    data: joiningstatus
                },
                title: {
                text: "{$tran_joinings}"
            },
            legend: {
            position: "bottom"
        },
        seriesDefaults: {
        type: "line",
        labels: {
        visible: true,
        format: "{0}"
    }
},
series: [{
    field: "joining",
    name: "{$tran_joining_status}"
}],
valueAxis: {
labels: {
format: "{0}"
}
},
categoryAxis: {
field: "month"
}
});
}

$(document).ready(function() {
setTimeout(function() {
// Initialize the chart with a delay to make sure
// the initial animation is visible
createChartgraph();

$("#example").bind("kendo:skinChange", function(e) {

createChartgraph();
});
}, 400);
});
        </script>
    </chart>
    <pie>
        <div id="pie"></div>
        <script>

var payoutstatus = [
                                                        {
            "amounttype": "{$tran_pending_amount}",
            "percentage": {$pending_payouts_percentage},
            "explode": true
        },
                                                        {
        "amounttype": "{$tran_released_amount}",
        "percentage": {$released_payouts_percentage}
    }
];

function createChartpie() {
$("#pie").kendoChart({
theme: $(document).data("kendoSkin") || "default",
title: {
text: "{$tran_payout}"
},
legend: {
position: "bottom"
},
dataSource: {
data: payoutstatus
},
series: [{
type: "pie",
field: "percentage",
categoryField: "amounttype",
explodeField: "explode"
}],
tooltip: {
visible: true,
template: "${ category } - ${ value }%"
}
});
}

$(document).ready(function() {
setTimeout(function() {
// Initialize the chart with a delay to make sure
// the initial animation is visible
createChartpie();

$("#example").bind("kendo:skinChange", function(e) {
createChartpie();
});
}, 400);
});
        </script>
    </pie>
</graph>      

{include file="admin/layout/footer.tpl" title="Example Smarty Page" name=""}
