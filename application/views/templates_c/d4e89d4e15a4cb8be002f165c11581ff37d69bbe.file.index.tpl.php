<?php /* Smarty version Smarty 3.1.4, created on 2015-08-26 11:49:05
         compiled from "application/views/admin/home/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147801361955bb6c042532e2-99643518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4e89d4e15a4cb8be002f165c11581ff37d69bbe' => 
    array (
      0 => 'application/views/admin/home/index.tpl',
      1 => 1440589559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147801361955bb6c042532e2-99643518',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_55bb6c043bc5d',
  'variables' => 
  array (
    'user_type' => 0,
    'PUBLIC_URL' => 0,
    'tran_joinings' => 0,
    'tran_total_joining' => 0,
    'total_joining' => 0,
    'tran_today_joining' => 0,
    'todays_joining' => 0,
    'tran_total_users' => 0,
    'total_users' => 0,
    'ewallet_status' => 0,
    'tran_e_wallet' => 0,
    'tran_total_amount' => 0,
    'total_amount' => 0,
    'tran_total_requested' => 0,
    'requested_amount' => 0,
    'tran_total_released' => 0,
    'released_amount' => 0,
    'pin_status' => 0,
    'tran_epin' => 0,
    'tran_total' => 0,
    'total_pin' => 0,
    'tran_used' => 0,
    'used_pin' => 0,
    'tran_requested' => 0,
    'requested_pin' => 0,
    'tran_mail' => 0,
    'tran_read' => 0,
    'read_mail' => 0,
    'tran_unread' => 0,
    'unread_mail' => 0,
    'tran_today' => 0,
    'mail_today' => 0,
    'tran_payout' => 0,
    'joining_details_per_month' => 0,
    'k' => 0,
    'i' => 0,
    'array_count' => 0,
    'tran_released_amount' => 0,
    'released_payouts_percentage' => 0,
    'tran_pending_amount' => 0,
    'pending_payouts_percentage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bb6c043bc5d')) {function content_55bb6c043bc5d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>''), 0);?>

<?php if ($_smarty_tpl->tpl_vars['user_type']->value!='employee'){?>
    <!-- start: PAGE CONTENT -->
    <div class="row">
        <div class="col-sm-3">
            <div class="core-box gadget-box">
                <div class="gadget-box-img">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/1358515008_1.png">
                </div>

                <div class="heading">
                    <!--<i class="clip-user-4 circle-icon circle-green "></i>-->
                    <h2><?php echo $_smarty_tpl->tpl_vars['tran_joinings']->value;?>
</h2>
                </div>
                <div class="content">
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['tran_total_joining']->value;?>
 : <redspan><?php echo $_smarty_tpl->tpl_vars['total_joining']->value;?>
</redspan>
                    </p>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['tran_today_joining']->value;?>
 : <redspan><?php echo $_smarty_tpl->tpl_vars['todays_joining']->value;?>
</redspan>
                    </p>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['tran_total_users']->value;?>
 : <redspan><?php echo $_smarty_tpl->tpl_vars['total_users']->value;?>
</redspan>
                    </p>
                </div>
            </div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['ewallet_status']->value=="yes"){?> 
            <div class="col-sm-3">
                <div class="core-box gadget-box">
                    <div class="gadget-box-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/1358519474_wallet.png">
                    </div>
                    <div class="heading">
                        <!-- <i class="clip-clip circle-icon circle-teal"></i>-->
                        <h2><?php echo $_smarty_tpl->tpl_vars['tran_e_wallet']->value;?>
</h2>
                    </div>
                    <div class="content">
                        <p>
                            <?php echo $_smarty_tpl->tpl_vars['tran_total_amount']->value;?>
 : <redspan><?php echo round($_smarty_tpl->tpl_vars['total_amount']->value,2);?>
</redspan>
                        </p>
                        <p>
                            <?php echo $_smarty_tpl->tpl_vars['tran_total_requested']->value;?>
: <redspan><?php if ($_smarty_tpl->tpl_vars['requested_amount']->value){?><?php echo $_smarty_tpl->tpl_vars['requested_amount']->value;?>
<?php }else{ ?>0<?php }?></redspan>
                        </p>
                        <p>
                            <?php echo $_smarty_tpl->tpl_vars['tran_total_released']->value;?>
 : <redspan><?php if ($_smarty_tpl->tpl_vars['released_amount']->value){?><?php echo $_smarty_tpl->tpl_vars['released_amount']->value;?>
<?php }else{ ?>0<?php }?></redspan>
                        </p>

                    </div>
                </div>
            </div>
        <?php }?> 

        <?php if ($_smarty_tpl->tpl_vars['pin_status']->value=="yes"){?>  
            <div class="col-sm-3">
                <div class="core-box gadget-box">
                    <div class="gadget-box-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/E-pin.png">
                    </div>		
                    <div class="heading">
                        <!--    <i class="clip-database circle-icon circle-bricky"></i>-->
                        <h2><?php echo $_smarty_tpl->tpl_vars['tran_epin']->value;?>
</h2>
                    </div>
                    <div class="content">
                        <p>
                            <?php echo $_smarty_tpl->tpl_vars['tran_total']->value;?>
  : <redspan><?php echo $_smarty_tpl->tpl_vars['total_pin']->value;?>
</redspan>
                        </p>
                        <p>
                            <?php echo $_smarty_tpl->tpl_vars['tran_used']->value;?>
 : <redspan><?php echo $_smarty_tpl->tpl_vars['used_pin']->value;?>
</redspan>
                        </p>
                        <p>
                            <?php echo $_smarty_tpl->tpl_vars['tran_requested']->value;?>
 : <redspan><?php echo $_smarty_tpl->tpl_vars['requested_pin']->value;?>
</redspan>
                        </p>
                    </div>
                </div>
            </div>

        <?php }?> 

        <div class="col-sm-3">
            <div class="core-box gadget-box">
                <div class="gadget-box-img">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC_URL']->value;?>
images/1358522421_e-mail2 .png">
                </div>		
                <div class="heading">
                    <!--    <i class="clip-database circle-icon circle-bricky"></i>-->
                    <h2><?php echo $_smarty_tpl->tpl_vars['tran_mail']->value;?>
</h2>
                </div>
                <div class="content">
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['tran_read']->value;?>
 : <redspan><?php echo $_smarty_tpl->tpl_vars['read_mail']->value;?>
</redspan>
                    </p>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['tran_unread']->value;?>
 : <redspan><?php echo $_smarty_tpl->tpl_vars['unread_mail']->value;?>
</redspan>
                    </p>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['tran_today']->value;?>
 : <redspan><?php echo $_smarty_tpl->tpl_vars['mail_today']->value;?>
</redspan>
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

                    <?php echo $_smarty_tpl->tpl_vars['tran_joinings']->value;?>

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
                            <?php echo $_smarty_tpl->tpl_vars['tran_payout']->value;?>

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
                                <div id="placeholder-h2" class="flot-placeholder"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>


<script>
    var Index = function() {
        // function to initiate Chart 1
        var runChart1 = function() {
            var pageviews = [
    <?php $_smarty_tpl->tpl_vars['array_count'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['joining_details_per_month']->value), null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['joining_details_per_month']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>

            [<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['i']->value['joining'];?>
]
        <?php if ($_smarty_tpl->tpl_vars['array_count']->value!=$_smarty_tpl->tpl_vars['k']->value){?>
            ,
        <?php }?>

    <?php } ?>
            ];
                    var plot = $.plot($("#placeholder-h1"), [{
                    data: pageviews,
                    label: "<?php echo $_smarty_tpl->tpl_vars['tran_joinings']->value;?>
"
                }], {
                series: {
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                    opacity: 0.08
                                }, {
                                    opacity: 0.01
                                }]
                        }
                    },
                    points: {
                        show: true
                    },
                    bars: {
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
                label: "<?php echo $_smarty_tpl->tpl_vars['tran_released_amount']->value;?>
",
                data: <?php echo $_smarty_tpl->tpl_vars['released_payouts_percentage']->value;?>

            },
            data_pie[1] = {
                label: "<?php echo $_smarty_tpl->tpl_vars['tran_pending_amount']->value;?>
",
                data: <?php echo $_smarty_tpl->tpl_vars['pending_payouts_percentage']->value;?>
,
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
<?php echo $_smarty_tpl->getSubTemplate ("admin/layout/page_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Example Smarty Page",'name'=>''), 0);?>
<?php }} ?>