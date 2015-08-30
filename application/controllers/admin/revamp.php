<?php

require_once 'Inf_Controller.php';

class Revamp extends Inf_Controller {

    function revamp_update_plan() {

        $account_status = $this->revamp_model->getUpgardeStatus();
        if ($account_status != 'active') {
            $msg = "You are already upgraded your plan";
            $this->redirect($msg, "home", false);
        }
        $title = $this->lang->line('upgrade_plan');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "validate_requirement.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";

        $this->ARR_SCRIPT[1]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.css";
        $this->ARR_SCRIPT[1]["type"] = "plugins/css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.js";
        $this->ARR_SCRIPT[2]["type"] = "plugins/js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->setScripts();

        if ($this->input->post('update')) {


            $mlm_details = $this->input->post('mlm_details');
            $shopping_status = $this->input->post('shopping_status');
            $repurchase_status = $this->input->post('repurchase_status');
            $replication_status = $this->input->post('replication_status');
            $reference = $this->input->post('reference');
            $document = $_FILES['document']['name'];
            $session_data = $this->session->userdata('logged_in');
            $user_id = $this->LOG_USER_ID;
            $table_prefix = $session_data['table_prefix'];
            $user_ref_id = str_replace("_", "", $table_prefix);
            $user_detail = $this->revamp_model->getOneUserDetail($user_ref_id);
            $plan = $user_detail["mlm_plan"];
            $documentupload = 'document';
            $new_file_name = '';
            $msg = "";
            if ($mlm_details != "") {
                    $config['upload_path'] = './public_html/images/document/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|ppt|doc|xls|xlsx';
                    $config['max_size'] = '2000000';
                    $config['max_width'] = '800';
                    $config['max_height'] = '800';
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($documentupload)) {
                        
                    } else {
                        if ($document) {
                            $data = array('upload_data' => $this->upload->data());
                            $new_file_name = $data['upload_data']['file_name'];
                        } else {
                            $new_file_name = "";
                        }
                    }
                    $res1 = $this->revamp_model->updateRequirementForBinary($mlm_details, $shopping_status, $repurchase_status, $replication_status, $reference, $user_ref_id, $new_file_name, $plan);
                    $res2 = $this->revamp_model->upgradeAccount($user_ref_id);
                    if ($res1 && $res2) {
                        $msg = $this->lang->line('your_request_has_saved_successfully');
                        $this->redirect($msg, "home", true);
                    }
                
            } else {
                $msg = $this->lang->line('all_fields_are_mandatory');
                $this->redirect($msg, "revamp/revamp_update_plan", FALSE);
            }
        }



        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_upgrade_infinite_mlm", $this->lang->line('upgrade_infinite_mlm'));
        $this->set("tran_please_fill_the_following_details_all_fields_are_mandatory", $this->lang->line('please_fill_the_following_details_all_fields_are_mandatory'));
        $this->set("tran_mlm_plan_details", $this->lang->line('mlm_plan_details'));
        $this->set("tran_you_must_enter_mlm_plan_details", $this->lang->line('you_must_enter_mlm_plan_details'));
        $this->set("tran_do_you_need_shopping_cart_ecommerce", $this->lang->line('do_you_need_shopping_cart_ecommerce'));
        $this->set("tran_yes", $this->lang->line('yes'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_do_you_need_repurchase_monthly_subscribe", $this->lang->line('do_you_need_repurchase_monthly_subscribe'));
        $this->set("tran_do_you_need_website_replication", $this->lang->line('do_you_need_website_replication'));
        $this->set("tran_reference_url", $this->lang->line('reference_url'));
        $this->set("tran_you_must_enter_reference_url", $this->lang->line('you_must_enter_reference_url'));
        $this->set("tran_you_must_select_mlm_documents", $this->lang->line('you_must_select_mlm_documents'));
        $this->set("tran_mlm_plan_documents", $this->lang->line('mlm_plan_documents'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));

        $this->set("page_top_header", $this->lang->line('upgrade_plan'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('upgrade_plan'));
        $this->set("page_small_header", '');

        $help_link = "revamp";
        $this->set("help_link", $help_link);
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */

        $this->setView();
    }

    function isValidURL($url) {
        $exp = '|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i';
        return preg_match($exp, $url);
    }

    function findState() {
        $this->AJAX_STATUS = true;
        $arr = $this->revamp_model->getState();
        echo '<td><b>State Name <span><font color="#FF0000">*</font></span> </b></td><td><br/><select name="india_state"  id="india_state" style="width: 158px;"  " >
            <option value="">Select State</option>';
        for ($i = 0; $i < count($arr); $i++) {
            $id = $arr["detail$i"]["State_Id"];
            $name = $arr["detail$i"]["State_Name"];
            echo "<option value='$name'>$name</option>";
        }
        echo '</select></td>';
    }

    function send_feedback() {

        $title = $this->lang->line('feedbacks');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $session_data = $this->session->userdata('logged_in');
        $table_prefix = $session_data['table_prefix'];
        $infinite_id = str_replace("_", "", $table_prefix);
        $this->ARR_SCRIPT[0]["name"] = "validate_requirement.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "footer";


        $this->setScripts();

        if ($this->input->post('send')) {
            if (!$this->input->post('feedback_subject')) {
                $msg = $this->lang->line('you_must_enter_feedback_subject');
                $this->redirect($msg, "revamp/send_feedback", FALSE);
            }
            if (!$this->input->post('feedback_detail')) {
                $msg = $this->lang->line('you_must_enter_feedback_details');
                $this->redirect($msg, "revamp/send_feedback", FALSE);
            }
            $feed_subject = $this->input->post('feedback_subject');
            $feed_detail = $this->input->post('feedback_detail');
            $result = $this->revamp_model->insertFeedback($feed_subject, $feed_detail, $infinite_id);
            $user_detail = $this->revamp_model->getOneUserDetail($infinite_id);
            $full_name = $user_detail["full_name"];
            $user_name = $user_detail["user_name"];
            $country = $user_detail["country"];
            $state = $user_detail["state"];
            $location = $user_detail["location"];
            $phone = $user_detail["phone"];
            $email = $user_detail["email"];
            $mlm_plan = $user_detail["mlm_plan"];
            $mailBodyDetails = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body >
<table id="Table_01" width="600"   border="0" cellpadding="0" cellspacing="0">
	<tr><td COLSPAN="3"></td></tr>

		<td width="50px"></td>
<td   width="520px"  >
		Dear Admin<br>  
                <p>
<table>
    <tr>    <td width ="100px" > <h3> User Details </h3> </td>  </tr>
    <tr>    <td widh="300px">  Full Name </td> <td>  ' . $full_name . '  </td></tr>
    <tr>    <td>    Mobile No   </td>  <td>   ' . $phone . '  </td>  </tr>
    <tr>    <td>    Email    </td>    <td>    ' . $email . '    </td>    </tr>
    <tr>    <td>    User Name    </td>    <td>        ' . $user_name . '    </td>    </tr>
    <tr>    <td>    Country    </td>    <td>        ' . $country . '    </td>    </tr>
    <tr>    <td>    State    </td>    <td>            ' . $state . '    </td>    </tr>
    <tr>    <td>    Location    </td>    <td>            ' . $location . '    </td>    </tr>
    <tr>    <td>    MLM Plan    </td>    <td>            ' . $mlm_plan . '    </td>    </tr>
    <tr>    <td>    Feedback Subject     </td> <td>    ' . $feed_subject . '</td></tr>
    <tr>    <td>    Feedback Details    </td>    <td>        ' . $feed_detail . '    </td>    </tr>
</table>
        </p>
        For more information Infinite MLM Software <a href="www.infinitemlmsoftware.com">www.infinitemlmsoftware.com</a><br>
        InfiniteMLM Software blog:<a href="www.blog.infinitemlmsoftware.com">www.blog.infinitemlmsoftware.com</a><br>
        For Support:<a href="www.ioss.in"><b>www.ioss.in</b></a><br> <br/>
	<b>Note:</b><br>
	The demo that will be <font color="#FF0000"><b>automatically deleted after 48 hours</b> </font>unless upgraded.<br>
        Have a nice Day..<br><br>
        <b>Contact Us</b>
<table><tr><td><h2>Infinite Open Source Solutions,</h2></td></tr><tr><td><b>Technology Business Incubator, <br>National Institute of Technology Calicut,<b>NIT Campus (P.O.),<br>Calicut - 673601, Kerala<br>Phone: +91 495 2287430</b></td> </tr><tr><td><a ><img src="https://www.ioss.in/images/phone.gif" width="40" align="middle" height="40"><b> +91 9747380289</b></a></td></tr><tr><td><img src="https://www.ioss.in/images/site.gif" align="middle"> <a href="https://www.ioss.in"><b>https://www.ioss.in</b></a></td></tr><tr><td><img src="https://www.ioss.in/images/mail.gif" width="40" align="middle" height="28"> <a><b>info@ioss.in<b></a></td></tr></table>
</td>
<td width="30px"></td>
</tr>
<tr>
        <td COLSPAN="3">
        </td>
</tr>
</table>
</body>
</html>';
            $arr = $this->revamp_model->sendMail($mailBodyDetails);
            $msg = "";
            if ($result) {
                $msg = $this->lang->line('your_feedback_send_successfully_thank_you_for_posting_feedback');
                $this->redirect($msg, "home", TRUE);
            } else {
                $msg = $this->lang->line('feedback_sending_failed');
                $this->redirect($msg, "revamp/send_feedback", FALSE);
            }
        }

        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_infinite_mlm_feedback", $this->lang->line('infinite_mlm_feedback'));
        $this->set("tran_all_entries_with", $this->lang->line('all_entries_with'));
        $this->set("tran_are_mandatory", $this->lang->line('are_mandatory'));
        $this->set("tran_feedback_subject", $this->lang->line('feedback_subject'));
        $this->set("tran_feedback_details", $this->lang->line('feedback_details'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_send", $this->lang->line('send'));

        $this->set("tran_you_must_enter_feedback_subject", $this->lang->line('you_must_enter_feedback_subject'));
        $this->set("tran_you_must_enter_feedback_details", $this->lang->line('you_must_enter_feedback_details'));
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */

        $this->set("page_top_header", "Send Feedback");
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('send_feedback'));
        $this->set("page_small_header", "");

        $help_link = "send_feedback";
        $this->set("help_link", $help_link);

        $this->setView();
    }

}

?>
