<?php
set_time_limit(0);
ignore_user_abort(true);
$cfg_server="localhost";
$cfg_database    = "uflipca_members";
$cfg_username    = "uflipca_esoft";
$cfg_password    = "!!Esoft321";
@mysql_connect($cfg_server,$cfg_username,$cfg_password);
$con = mysql_select_db($cfg_database);
date_default_timezone_set('Asia/Calcutta');
?>
