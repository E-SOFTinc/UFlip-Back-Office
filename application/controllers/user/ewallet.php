<?php

require_once 'Inf_Controller.php';

class Ewallet extends Inf_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('validation');
        $this->val = new Validation();
    }

    function fund_transfer() {

        $this->set("action_page", $this->CURRENT_URL);
        $title = $this->lang->line('fund_transfer');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[4]["name"] = "validate_ewallet_fund_User.js";
        $this->ARR_SCRIPT[4]["type"] = "js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->setScripts();
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_ewallet", $this->lang->line('ewallet'));
        $this->set("tran_transaction_password", $this->lang->line('transaction_password'));
        $this->set("tran_select_to_user", $this->lang->line('select_to_user'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_available_amount", $this->lang->line('available_amount'));
        $this->set("tran_enter_user_name", $this->lang->line('enter_user_name'));

        $this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_NO_BALANCE", $this->lang->line('NO_BALANCE'));
        $this->set("tran_Please_type_transaction_password", $this->lang->line('Please_type_transaction_password'));
        $this->set("tran_Please_type_To_User_name", $this->lang->line('Please_type_To_User_name'));
        $this->set("tran_Please_type_Amount", $this->lang->line('Please_type_Amount'));
        $this->set("tran_you_dont_have_enough_balance", $this->lang->line('you_dont_have_enough_balance'));
        $this->set("tran_digits_only", $this->lang->line('digits_only'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('fund_transfer'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('fund_transfer'));
        $this->set("page_small_header", "");

        $help_link = "fund-transfer";
        $this->set("help_link", $help_link);

        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
//////*************code for user****************/
        $userid = $this->LOG_USER_ID;
        $balamount = $this->ewallet_model->getBalanceAmount($userid);
        $this->set("balamount", round($balamount, 2));
        $pass = $this->ewallet_model->getUserPassword($userid);
        $this->set("pass", $pass);
        $tran_pass = $this->input->post('pswd');
        $msg = "";
        if ($this->input->post("fund_trans")) {


            $post_arr = $this->validation->stripTagsPostArray($this->input->post());

            //$touser=$post_arr['to_user_name'];
            //$tarns_amt=$post_arr['amount'];
            $touser = $this->input->post('to_user_name');
            $user = $this->val->userNameToID($touser);
            if (array_key_exists('to_user_name', $post_arr)) {
                $touser = $post_arr['to_user_name'];
            }
            if (array_key_exists('amount', $post_arr)) {
                $trans_amt = $post_arr['amount'];
            }
            $to_userid = $this->ewallet_model->userNameToID($touser);
            $user_exists = $this->ewallet_model->isUserNameAvailable($touser);
            if ($user_exists && $userid != $to_userid) {
                if ($pass == $tran_pass) {
                    if (is_numeric($trans_amt) && ($trans_amt > 0)) {
                        //$trans_amt = $this->input->post('amount');
                        if ($trans_amt <= $balamount) {
                            $this->ewallet_model->begin();
                            $this->ewallet_model->insertBalAmountDetails($userid, $to_userid, round($trans_amt, 2));
                            $up_date1 = $this->ewallet_model->updateBalanceAmountDetails($userid, $to_userid, round($trans_amt, 2));
                            if ($up_date1) {
                                $this->ewallet_model->commit();
                                $login_id = $this->LOG_USER_ID;
                                $this->val->insertUserActivity($user, 'Fund transfered', $login_id);
                                $msg = $this->lang->line('fund_transfered_successfully');
                                $this->redirect($msg, "ewallet/fund_transfer", TRUE);
                            } else {
                                $this->ewallet_model->rollback();
                                $msg = $this->lang->line('error_on_fund_transfer');
                                $this->redirect($msg, "ewallet/fund_transfer", FALSE);
                            }
                        } else {
                            $msg = $this->lang->line('you_dont_have_enough_balance');
                            $this->redirect($msg, "ewallet/fund_transfer", FALSE);
                        }
                    } else {
                        $msg = $this->lang->line('invalid_amount_please_try_again');
                        $this->redirect($msg, "ewallet/fund_transfer", FALSE);
                    }
                } else {
                    $msg = $this->lang->line('invalid_transaction_password');
                    $this->redirect($msg, "ewallet/fund_transfer", FALSE);
                }
            } else {
                $msg = $this->lang->line('invalid_user_selection');
                $this->redirect($msg, "ewallet/fund_transfer", FALSE);
            }
        }
//////*************code for user****************/        
        $this->setView();
    }

    function ewallet_epin_request() {

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";

        $this->ARR_SCRIPT[3]["name"] = "ewallet.js";
        $this->ARR_SCRIPT[3]["type"] = "js";

        $this->ARR_SCRIPT[4]["name"] = "messages.css";
        $this->ARR_SCRIPT[4]["type"] = "css";

        $this->setScripts();
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line(''));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line(''));
        $this->set("page_small_header", "");
        $title = $this->lang->line('e_pin_transfer');

        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->set("temp_path", TEMPLATE_APP_PATH);
        $this->set("action_page", $this->CURRENT_URL);

        $pro_status = $this->MODULE_STATUS['product_status'];
        $this->set("pro_status", $pro_status);
        $user_name_arr = $this->Ewallet->getUserName_details();
        $this->set("user_name_arr", $user_name_arr);

        if ($_SESSION['user_type'] == "admin") {
            $id = $_POST['user_name'];
        } else {
            $id = $_SESSION['user_id'];
        }

        $amount = $this->Ewallet->balanceEpinUSer($id);
        $pass = $this->Ewallet->getUserPassword($id);
        $this->set("amount", $amount);
        $this->set("pass", $pass);

        if ($pro_status == "yes") {
            $produc_details = $this->Ewallet->getAllProducts('yes');
            $this->set("produc_details", $produc_details);
        }

        if (isset($_POST["reqpasscode"])) {
            $to_user_name = $_POST['to_user'];
            $password = md5($_POST['pswd']);
            if ($this->Ewallet->OBJ_VALI->isUserNameAvailable($to_user_name) && $password == $pass) {
                $how_much_pin = $_POST['count'];
                $original_balance_epin = $this->Ewallet->balanceEpinUSer($id);
                if ($original_balance_epin >= $how_much_pin && is_numeric($how_much_pin)) {
                    $this->Ewallet->begin();
                    $to_user_name_id = $this->Ewallet->OBJ_VALI->userNameToID($to_user_name);
                    $res = $this->Ewallet->generateEpin($id, $how_much_pin, $to_user_name_id, $_POST['pswd']);
                    $this->Ewallet->commit();
                } else {
                    $this->redirect('Error on e-pin transfer, please try again.', "ewallet/ewallet_epin_request", FALSE);
                }
                if ($res) {
                    $this->redirect('E-pin transfered successfully.', "ewallet/ewallet_epin_request", TRUE);
                } else {
                    $this->redirect('Please try again.', "ewallet/ewallet_epin_request", FALSE);
                }
            } else {
                $this->redirect('Invalid username or password.', "ewallet/ewallet_epin_request", FALSE);
            }
        }
    }

    function getLegAmount($user_name) {
        $this->AJAX_STATUS = true;
        $user = $this->ewallet_model->userNameToID($user_name);
        $bal_amount = $this->ewallet_model->getBalanceAmount($user);
        //$pwd = $this->ewallet_model->getUserPassword($user);
        echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Balance Amount:</b></td><td><input type="text" name="bal"  id="bal" readonly="true" value=' . $bal_amount . ' ></td>';
    }

    function getBalance_EPin() {
        $this->AJAX_STATUS = true;
        $user = $this->URL['user'];
        $bal_epin = $this->Ewallet->getBalancePin($user);
        $pwd1 = $this->Ewallet->getUserPassword($user);
        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;<b>Balance E-pin Count</b></td><td><input type='text' name='balance'  readonly='true' id='balance' value=" . $bal_epin . " ></td><input type='hidden' id='u_pwd' name='u_pwd' value=" . $pwd1 . "  /></td>";
    }

    function getPassWordInmd($pswdm) {
        $this->AJAX_STATUS = true;
        //$pswdm=$this->URL['pswdm'];   
        $mdpsw = md5($pswdm);
        echo'<td><input type="hidden" id="md_psd" name="md_psd" value=' . $mdpsw . '  /></td>';
    }

    function ewallet_pin_purchase() {


        $title = $this->lang->line('e_pin_purchase');

        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ewallet.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->setScripts();
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_e_pin_purchase", $this->lang->line('e_pin_purchase'));
        $this->set("tran_your_current_bal", $this->lang->line('your_current_bal'));
        $this->set("tran_select_product", $this->lang->line('select_product'));
        $this->set("tran_epin_count", $this->lang->line('epin_count'));
        $this->set("tran_transaction_password", $this->lang->line('transaction_password'));
        $this->set("tran_pin_purchase", $this->lang->line('pin_purchase'));
        $this->set("tran_product_name", $this->lang->line('product_name'));

        $this->set("tran_You_must_enter_pin_count", $this->lang->line('You_must_enter_pin_count'));
        $this->set("tran_Please_type_transaction_password", $this->lang->line('Please_type_transaction_password'));
        $this->set("tran_you_must_select_an_amount", $this->lang->line('you_must_select_an_amount'));
        $this->set("tran_digits_only", $this->lang->line('digits_only'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_select_amount", $this->lang->line('select_amount'));
        $this->set("tran_you_must_select_a_product_name", $this->lang->line('you_must_select_a_product_name'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('e_pin_purchase'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('e_pin_purchase'));
        $this->set("page_small_header", "");

        $help_link = "pin-purchase";
        $this->set("help_link", $help_link);
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $user_id = $this->LOG_USER_ID;
        $balamount = $this->ewallet_model->getBalanceAmount($user_id);
        $this->set("balamount", $balamount);
        $amount_details = $this->ewallet_model->getAllEwalletAmounts();
        $this->set("amount_details", $amount_details);
        $msg = "";
        if ($this->input->post('transfer')) {
            $pin_count = $this->input->post('pin_count');
            $amount_id = $this->input->post('amount');


            if ($pin_count > 0 && $amount_id != '' && is_numeric($pin_count)) {
                $tran_pass = $this->input->post('passcode');
                $dbpass = $this->ewallet_model->getTransactionPasscode($user_id);
                if ($tran_pass == $dbpass) {
                    $amount_arr = $this->ewallet_model->getEwalletAmount($amount_id);
                    $amount = $amount_arr["amount"];
                    $tot_avb_amt = $amount * $pin_count;
                    if ($tot_avb_amt <= $balamount) {
                        $uploded_date = date('Y-m-d H:i:s');
                        $expiry_date = date('Y-m-d', strtotime("+6 months", strtotime($uploded_date)));
                        $purchase_status = 'yes';
                        $status = "yes";
                        $this->ewallet_model->begin();
                        // $res = $this->ewallet_model->allocatePin($pin_count, $product);
                        //=========================
                        $max_pincount = $this->ewallet_model->getMaxPinCount();
                        $rec = $this->ewallet_model->getAllActivePinspage($purchase_status);
                        if ($rec < $max_pincount) {
                            $errorcount = $max_pincount - $rec;
                            if ($pin_count <= $errorcount) {

                                $res = $this->ewallet_model->generatePasscode($pin_count, $status, $uploded_date, $amount, $expiry_date, $purchase_status);
                            }
                        } else {
                            $msg1 = $this->lang->line('already');
                            $msg2 = $this->lang->line('epin_present');
                            $this->redirect($msg1 . $rec . $msg2, "epin/generate_epin", FALSE);
                        }
                        //=========================
                        if ($res) {
                            //$this->Ewallet->insertBalAmountDetails($from_user_id,$to_user_id,$trans_amount);
                            $bal = round($balamount - $tot_avb_amt, 2);
                            $yes = $this->ewallet_model->updateBalanceAmount($user_id, $bal);
                            if ($res && $yes) {
                                $this->ewallet_model->commit();
                                $loggin_id = $this->LOG_USER_ID;
                                $this->val->insertUserActivity($loggin_id, 'pin purchased', $loggin_id);

                                $msg = $this->lang->line('epin_purchased_successfully');
                                $this->redirect($msg, "ewallet/ewallet_pin_purchase", TRUE);
                            } else {
                                $this->ewallet_model->rollback();
                                $msg = $this->lang->line('error_on_epin_purchase');
                                $this->redirect($msg, "ewallet/ewallet_pin_purchase", FALSE);
                            }
                        } else {
                            $this->ewallet_model->rollback();
                            $mail = $this->ewallet_model->getAdminEmailId();
                            $mailBodyDetails = '<html>
							<head>
							<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
							</head>
							<body >
							<table id="Table_01" width="600"   border="0" cellpadding="0" cellspacing="0">
							<tr><td><br />Dear Admin,<br /></td></tr>
							<tr><td>There is no active E-pin for the product - ' . $product_arr["product_name"] . ' in your company. Please generate new E-pin.</td></tr>
							<tr><td>Thanks,<br />World Class Reward</td></tr> 
							</table>
							</body></html>';
                            $res = $this->ewallet_model->sendEmail($mailBodyDetails, $mail);
                            $msg = $this->lang->line('no_epin_found_please_contact_administrator');
                            $this->redirect($msg, "ewallet/ewallet_pin_purchase", FALSE);
                        }
                    } else {
                        $msg = $this->lang->line('no_sufficient_balance_amount');
                        $this->redirect($msg, "ewallet/ewallet_pin_purchase", FALSE);
                    }
                } else {
                    $msg = $this->lang->line('invalid_transaction_password');
                    $this->redirect($msg, "ewallet/ewallet_pin_purchase", false);
                }
            } else {
                $msg = $this->lang->line('error_on_purchasing_epin_please_try_again');
                $this->redirect($msg, "ewallet/ewallet_pin_purchase", FALSE);
            }
        }
        $this->setView();
    }

    function fund_management() {
        $this->set("action_page", $this->CURRENT_URL);

        $title = $this->lang->line('ewallet_fund_management');

        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";

        $this->ARR_SCRIPT[3]["name"] = "ewallet.js";
        $this->ARR_SCRIPT[3]["type"] = "js";

        $this->ARR_SCRIPT[4]["name"] = "messages.css";
        $this->ARR_SCRIPT[4]["type"] = "css";

        $this->setScripts();
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_ewallet_fund_management", $this->lang->line('ewallet_fund_management'));
        $this->set("tran_enter_user_name", $this->lang->line('enter_user_name'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_add_amount", $this->lang->line('add_amount'));
        $this->set("tran_deduct_amount", $this->lang->line('deduct_amount'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line(''));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line(''));
        $this->set("page_small_header", "");
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $user_name_arr = $this->ewallet_model->getUserName_details();
        $this->set("user_name_arr", $user_name_arr);
        $msg = "";
        if ($this->input->post('add_amount')) {
            $userid = $this->LOG_USER_ID;
            $to_user = $this->input->post('user_name');

            $to_userid = $this->ewallet_model->userNameToID($to_user);
            $amount = $this->input->post('amount');
            $user_exists = $this->ewallet_model->isUserNameAvailable($to_user);
            if ($user_exists) {
                if (is_numeric($amount) && $amount > 0) {
                    $this->ewallet_model->begin();
                    $this->ewallet_model->insertBalAmountDetails($userid, $to_userid, $amount, 'admin_credit');
                    $up_date1 = $this->ewallet_model->addUserBalanceAmount($to_userid, $amount);
                    if ($up_date1) {
                        $this->ewallet_model->commit();
                        $msg = $this->lang->line('fund_credited_successfully');
                        $this->redirect($msg, "ewallet/fund_management", TRUE);
                    } else {
                        $this->ewallet_model->rollback();
                        $msg = $this->lang->line('error_on_crediting_fund');
                        $this->redirect($msg, "ewallet/fund_management", FALSE);
                    }
                } else {
                    $msg = $this->lang->line('error_on_crediting_fund_please_check_the_amount');
                    $this->redirect($msg, "ewallet/fund_management", FALSE);
                }
            } else {
                $msg = $this->lang->line('invalid_user_name');
                $this->redirect($msg, "ewallet/fund_management", FALSE);
            }
        }
        if ($this->input->post('deduct_amount')) {
            $userid = $this->LOG_USER_ID;
            $to_user = $this->input->post('user_name');

            $to_userid = $this->ewallet_model->userNameToID($to_user);
            $amount = $this->input->post('amount');
            $user_exists = $this->ewallet_model->isUserNameAvailable($to_user);
            if ($user_exists) {
                $bal_amount = $this->ewallet_model->getBalanceAmount($to_userid);
                if (is_numeric($amount) && $amount > 0 && $bal_amount >= $amount) {
                    $this->ewallet_model->begin();
                    $this->ewallet_model->insertBalAmountDetails($userid, $to_userid, $amount, 'admin_debit');
                    $up_date1 = $this->ewallet_model->deductUserBalanceAmount($to_userid, $amount);
                    if ($up_date1) {
                        $this->ewallet_model->commit();
                        $msg = $this->lang->line('fund_deducted_successfully');
                        $this->redirect($msg, "ewallet/fund_management", TRUE);
                    } else {
                        $this->ewallet_model->rollback();
                        $msg = $this->lang->line('error_on_deducting_fund');
                        $this->redirect($msg, "ewallet/fund_management", FALSE);
                    }
                } else {
                    $msg = $this->lang->line('error_on_deducting_fund_please_check_the_amount');
                    $this->redirect($msg, "ewallet/fund_management", FALSE);
                }
            } else {
                $msg = $this->lang->line('invalid_user_name');
                $this->redirect($msg, "ewallet/fund_management", FALSE);
            }
        }
        $this->setView();
    }

    function my_transfer_details() {

        $title = $this->lang->line('transfer_details');

        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";
        
        $this->ARR_SCRIPT[1]["name"] = "datepicker/css/datepicker.css";
        $this->ARR_SCRIPT[1]["type"] = "plugins/css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "bootstrap-datepicker/js/bootstrap-datepicker.js";
        $this->ARR_SCRIPT[2]["type"] = "plugins/js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "date_time_picker.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[4]["type"] = "plugins/css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[5]["type"] = "plugins/js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[6]["type"] = "plugins/js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "table-data.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "validate_ewallet_mytransfer.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";


        $this->setScripts();
////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_weekly_transfer", $this->lang->line('weekly_transfer'));
        $this->set("tran_date", $this->lang->line('date'));
	$this->set("tran_from_date", $this->lang->line('from_date'));
	$this->set("tran_to_date", $this->lang->line('to_date'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_weekly_transfer_details", $this->lang->line('weekly_transfer_details'));
        $this->set("tran_slno", $this->lang->line('slno'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_transfer_type", $this->lang->line('transfer_type'));
        $this->set("tran_no_transfer_details", $this->lang->line('no_transfer_details'));
        $this->set("tran_daily_transfer", $this->lang->line('daily_transfer'));
        $this->set("tran_daily_transfer_details", $this->lang->line('daily_transfer_details'));

        $this->set("tran_You_must_select_a_date", $this->lang->line('You_must_select_a_date'));
	$this->set("tran_You_must_select_a_Todate_greaterThan_Fromdate", $this->lang->line('You_must_select_a_Todate_greaterThan_Fromdate'));
        $this->set("tran_invalid_period", $this->lang->line('invalid_period'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('my_transfer'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('my_transfer'));
        $this->set("page_small_header", "");

        $help_link = "my-transfer";
        $this->set("help_link", $help_link);

        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $weekdate = $this->input->post('weekdate');
        $daily = $this->input->post('daily');
        $this->set('weekdate', $weekdate);
        $this->set('daily', $daily);

        if ($this->input->post('weekdate')) {

            $user_name = $this->LOG_USER_NAME;
            $user_id = $this->ewallet_model->userNameToID($user_name);

            $post_arr = $this->validation->stripTagsPostArray($this->input->post());
            $from_date = $post_arr['week_date1'];
            $to_date = $post_arr['week_date2'];


            $details = $this->ewallet_model->getUserEwalletDetails($user_id, $from_date, $to_date);
            $this->set("details", $details);
            $this->set("user_name", $user_name);
            $details_count = count($details);
            $this->set('details_count', $details_count);
        }
        if ($this->input->post('daily')) {
            $user_name = $this->LOG_USER_NAME;
            $user_id = $this->ewallet_model->userNameToID($user_name);

            $post_arr = $this->validation->stripTagsPostArray($this->input->post());
            $from_date = $post_arr['week_date3'];
            $to_date = $post_arr['week_date3'];

            $details = $this->ewallet_model->getUserEwalletDetails($user_id, $from_date, $to_date);
            $this->set("details", $details);
            $this->set("user_name", $user_name);
            $details_count = count($details);
            $this->set('details_count', $details_count);
        }
        $this->setView();
    }

    function my_ewallet() {

        $title = $this->lang->line('transfer_details');

        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[0]["type"] = "plugins/css";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[1]["type"] = "plugins/css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[2]["type"] = "plugins/js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[3]["type"] = "plugins/js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[4]["type"] = "plugins/js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";

        $this->ARR_SCRIPT[5]["name"] = "table-data.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";
       

        $this->setScripts();
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_my_ewallet_details", $this->lang->line('my_ewallet_details'));
        $this->set("tran_ewallet_details", $this->lang->line('ewallet_details'));
        $this->set("tran_slno", $this->lang->line('slno'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_description", $this->lang->line('description'));
        $this->set("tran_amount", $this->lang->line('amount'));
        $this->set("tran_balance", $this->lang->line('balance'));
        $this->set("tran_no_transfer_details", $this->lang->line('no_transfer_details'));
        $this->set("tran_available_amount", $this->lang->line('available_amount'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_My_Ewallet", $this->lang->line('My_Ewallet'));

        $this->set("page_top_header", $this->lang->line('my_ewallet_details'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('my_ewallet_details'));
        $this->set("page_small_header", "");

        $help_link = "my-ewallet";
        $this->set("help_link", $help_link);

        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $details = array();
        $user_id = $this->LOG_USER_ID;
        $user_name = $this->LOG_USER_NAME;
        $from_date = Date("Y-m-d", strtotime($this->ewallet_model->getJoiningDate($user_id)));
        $to_date = Date("Y-m-d");
        $product_status = $this->MODULE_STATUS['product_status'];
        $details = $this->ewallet_model->getCommissionDetails($user_id, $from_date, $to_date, $product_status);

        $this->set('details_count', count($details));
        $this->set("details", $details);
        $this->set("user_name", $user_name);
        $this->setView();
    }

    public function user_availability() {
        //echo 'asd'.$this->input->post('user_name');
        if ($this->ewallet_model->checkUser($this->input->post('user_name'))) {
            echo "yes";
            exit();
        } else {
            echo "no";
            exit();
        }
    }

}

?>