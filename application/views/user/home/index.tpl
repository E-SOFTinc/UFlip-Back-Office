{include file="user/layout/header.tpl"  name=""}

<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-sm-3">
        <div class="core-box gadget-box">
            <div class="gadget-box-img">
                <img src="{$PUBLIC_URL}images/1358515008_1.png">
            </div>

            <div class="heading">
                <!--<i class="clip-user-4 circle-icon circle-green "></i>-->
                <h2>{$tran_joinings}</h2>
            </div>
            <div class="content">
                <p>
                    {$tran_total_joining} : <redspan>{$total_joining}</redspan>
                </p>
                <p>
                    {$tran_today_joining} : <redspan>{$todays_joining}</redspan>
                </p>
                 <p>
                        {$tran_total_users} : <redspan>{$total_users}</redspan>
                    </p>
            </div>
        </div>
    </div>
    {if $ewallet_status == "yes"}             
        <div class="col-sm-3">
            <div class="core-box gadget-box">
                <div class="gadget-box-img">
                    <img src="{$PUBLIC_URL}images/1358519474_wallet.png">
                </div>
                <div class="heading">
                    <!-- <i class="clip-clip circle-icon circle-teal"></i>-->
                    <h2>{$tran_e_wallet}</h2>
                </div>
                <div class="content">
                    <p>
                        Total : <redspan>{round($total_amount,2)}</redspan>
                    </p>
                    {if $payout_release_type == "ewallet_request"}
                        <p>
                            Req. Amt : <redspan>{round($requested_amount,2)}</redspan>
                        </p>
                    {/if}
                    <p>
                        {$tran_released_amount} : <redspan>{round($total_released,2)}</redspan>
                    </p>

                </div>
            </div>
        </div>
    {/if}               

    {if $pin_status == "yes"}  
        <div class="col-sm-3">
            <div class="core-box gadget-box">
                <div class="gadget-box-img">
                    <img src="{$PUBLIC_URL}images/E-pin.png">
                </div>		
                <div class="heading">
                    <!--    <i class="clip-database circle-icon circle-bricky"></i>-->
                    <h2>{$tran_epin}</h2>
                </div>
                <div class="content">
                    <p>
                        {$tran_total}  : <redspan>{$total_pin}</redspan>
                    </p>
                    <p>
                        {$tran_used} : <redspan>{$used_pin}</redspan>
                    </p>
                    <p>
                        {$tran_requested} : <redspan>{$requested_pin}</redspan>
                    </p>
                </div>
            </div>
        </div>

    {/if}    


    <div class="col-sm-3">
        <div class="core-box gadget-box">
            <div class="gadget-box-img">
                <img src="{$PUBLIC_URL}images/1358522421_e-mail2 .png">
            </div>		
            <div class="heading">
                <!--    <i class="clip-database circle-icon circle-bricky"></i>-->
                <h2>{$tran_mail}</h2>
            </div>
            <div class="content">
                <p>
                    {$tran_read} : <redspan>{$read_mail}</redspan>
                </p>
                <p>
                    {$tran_unread} : <redspan>{$unread_mail}</redspan>
                </p>
                <p>
                    {$tran_today} : <redspan>{$mail_today}</redspan>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 sm-fifty">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="clip-stats"></i>
                {$tran_joinings}
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>
                    <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                        <i class="fa fa-refresh"></i>
                    </a>
                    <a class="btn btn-xs btn-link panel-close" href="#">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <div class="flot-medium-container">
                    <div id="placeholder-h1" class="flot-placeholder"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 sm-fifty">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="clip-pie"></i>
                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                            </a>
                            <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <a class="btn btn-xs btn-link panel-refresh" href="#">
                                <i class="fa fa-refresh"></i>
                            </a>
                            <a class="btn btn-xs btn-link panel-close" href="#">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                        {$tran_payout}
                    </div>
                    <div class="panel-body">
                        <div class="flot-medium-container">
                            <div id="placeholder-h2" class="flot-placeholder"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{*!-- end: PAGE CONTENT--*}
{include file="user/layout/footer.tpl" title="Example Smarty Page" name=""}

<script>
    var Index = function() {
        // function to initiate Chart 1
        var runChart1 = function() {
            var pageviews = [
    {assign var=array_count value=$joining_details_per_month|@count}
    {foreach from=$joining_details_per_month key=k item=i}

            [{$k}, {$i.joining}]
        {if $array_count != $k}
            ,
        {/if}

    {/foreach}
            ];
                    var plot = $.plot($("#placeholder-h1"), [{
                    data: pageviews,
                    label: "Joinings"
                }], {
                series: {
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                    opacity: 0.05
                                }, {
                                    opacity: 0.01
                                }]
                        }
                    },
                    points: {
                        show: false
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#eee",
                    borderWidth: 0
                },
                colors: ["#d12610", "#37b7f3", "#52e136"],
                xaxis: {
                    ticks: [[1, "Jan"], [2, "Feb"], [3, "Mar"], [4, "Apr"], [5, "May"], [6, "Jun"], [7, "Jul"], [8, "Aug"], [9, "Sep"], [10, "Oct"], [11, "Nov"], [12, "Dec"]],
                },
                yaxis: {
                    ticks: 11,
                    tickDecimals: 0
                }
            });

            function showTooltip(x, y, contents) {
                $('<div id="tooltip">' + contents + '</div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y + 5,
                    left: x + 15,
                    border: '1px solid #333',
                    padding: '4px',
                    color: '#fff',
                    'border-radius': '3px',
                    'background-color': '#333',
                    opacity: 0.80
                }).appendTo("body").fadeIn(200);
            }
            var previousPoint = null;
            $("#placeholder-h1").bind("plothover", function(event, pos, item) {
                $("#x").text(pos.x.toFixed(2));
                $("#y").text(pos.y.toFixed(2));
                if (item) {
                    if (previousPoint != item.dataIndex) {
                        previousPoint = item.dataIndex;
                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                         var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                        showTooltip(item.pageX, item.pageY, item.series.label + " of " + monthNames[x-1] + " = " + y);
                    }
                } else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });
        };
        // function to initiate Chart 2
        var runChart2 = function() {
            var data_pie = [];

            data_pie[0] = {
                label: "Released Amount",
                data: {$released_payouts_percentage}
            },
            data_pie[1] = {
                label: "Pending Amount",
                data: {$pending_payouts_percentage},
            };

            $.plot('#placeholder-h2', data_pie, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        tilt: 0.5,
                        label: {
                            show: true,
                            radius: 1,
                            formatter: labelFormatter,
                            background: {
                                opacity: 0.8
                            }
                        },
                        combine: {
                            color: '#999',
                            threshold: 0.1
                        }
                    }
                },
                legend: {
                    show: false
                }
            });

            function labelFormatter(label, series) {
                return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
            }
        };


        return {
            init: function() {
                runChart1();
                runChart2();
                //runChart3();
                //runSparkline();
                //runEasyPieChart();
            }
        };
    }();
</script>

<script>
    jQuery(document).ready(function() {
        Main.init();
        Index.init();
        $(".core-box").addClass("slideUp");
        $(".badge").addClass("fadeIn");
        //$(".panel").addClass("bigEntrance");

    });
</script>
{include file="user/layout/page_footer.tpl" title="Example Smarty Page" name=""}