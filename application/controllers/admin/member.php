<?php

require_once 'Inf_Controller.php';

class member extends Inf_Controller {

    function search_member($action = "", $id = "") {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";
        
        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";
        
        $this->ARR_SCRIPT[3]["name"] = "validate_member.js";
        $this->ARR_SCRIPT[3]["type"] = "js";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[4]["type"] = "plugins/css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[5]["type"] = "plugins/css";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[6]["type"] = "plugins/js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[7]["type"] = "plugins/js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";

        $this->ARR_SCRIPT[8]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[8]["type"] = "plugins/js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";

        $this->ARR_SCRIPT[9]["name"] = "table-data.js";
        $this->ARR_SCRIPT[9]["type"] = "js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";
        
        $this->ARR_SCRIPT[10]["name"] = "misc.js";
        $this->ARR_SCRIPT[10]["type"] = "js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->setScripts();
        $title = $this->lang->line('member_management');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        ////////////////////////// code for language translation  ///////////////////////////////
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_Username_Name_Nominee_Address_MobileNo_City", $this->lang->line('Username_Name_Nominee_Address_MobileNo_City'));
        $this->set("tran_keyword", $this->lang->line('keyword'));

        $this->set("tran_user_id", $this->lang->line('user_id'));
        $this->set("tran_terminate_date", $this->lang->line('terminate_date'));
        $this->set("tran_terminate_member", $this->lang->line('terminate_member'));
        $this->set("tran_reason", $this->lang->line('reason'));

        $this->set("tran_search_member", $this->lang->line('search_member'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_sponser_name", $this->lang->line('sponser_name'));
        $this->set("tran_nominee", $this->lang->line('nominee'));
        $this->set("tran_mobile_no", $this->lang->line('mobile_no'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_town", $this->lang->line('town'));
        $this->set("tran_country", $this->lang->line('country'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_view_profile", $this->lang->line('view_profile'));
        $this->set("tran_active", $this->lang->line('active'));
        $this->set("tran_blocked", $this->lang->line('blocked'));
        $this->set("tran_No_User_Found", $this->lang->line('No_User_Found'));
        $this->set("tran_member_details", $this->lang->line('member_details'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_Sure_you_want_to_Block_this_User_There_is_NO_undo", $this->lang->line('Sure_you_want_to_Block_this_User_There_is_NO_undo'));
        $this->set("tran_Sure_you_want_to_Activate_this_User_There_is_NO_undo", $this->lang->line('Sure_you_want_to_Activate_this_User_There_is_NO_undo'));
        $this->set("tran_You_must_enter_keyword_to_search", $this->lang->line('You_must_enter_keyword_to_search'));
        $this->set("tran_block", $this->lang->line('block'));
        $this->set("tran_activate", $this->lang->line('activate'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_edit", $this->lang->line('edit'));
        $this->set("page_top_header", $this->lang->line('search_member'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('search_member'));
        $this->set("page_small_header", "");
 
        ////////////////////////////////////////////////////////////////////////////////////

        $help_link = "search-member";
        $this->set("help_link", $help_link);

        $this->set("mem_arr", "");
        $this->set("count", "");

        $mem_arr = array();
        $msg = '';
        if ($action == "block") {
            $result = $this->member_model->blockMember($id, 'no');
            //echo $result; die();
            if ($result) {
                $msg = $this->lang->line('User_blocked_Successfully');
                $this->redirect($msg, "member/search_member", TRUE);
            } else {
                $msg = $this->lang->line('Error_on_blocking_User');
                $this->redirect($msg, "member/search_member", FALSE);
            }
            $result2=$this->member_model->abc($id,'no');
        }
        if ($action == "activate") {
            $result = $this->member_model->blockMember($id, 'yes');
            if ($result) {
                $msg = $this->lang->line('User_Activated_Successfully');
                $this->redirect($msg, "member/search_member", TRUE);
            } else {
                $msg = $this->lang->line('Error_on_Activating_User');
                $this->redirect($msg, "member/search_member", FALSE);
            }
        }


        $flag = false;
        $config['uri_segment'] = 5;
        $base_url = base_url() . "admin/member/search_member/tab";
       
        if ($this->uri->segment(4) != "") {
            $page = $this->uri->segment(5);
            $flag = true;
        }
          else
            $page = 0;
          
          
        if ($this->input->post('search_member')) {
            $flag = true;
            $post_arr = $this->validation->stripTagsPostArray($this->input->post());
            $keyword = $post_arr['keyword'];
            $user_type = $this->LOG_USER_TYPE;
            if($user_type=='employee'){
                $check_user_id=$this->member_model->userNameToID($keyword);
                $check_user_type=$this->member_model->getUserType($check_user_id);
                if($check_user_type=='admin'){
                    $msg ="You can't access admin";
                    $this->redirect($msg, "member/search_member", FALSE);
                }
            }
            if ($keyword != "" && $keyword != "'") {
                //$keyword = $this->input->post('keyword');
                $this->session->set_userdata('ser_keyword', $keyword);
            }

            ///////////////////////////////////// pagination //////////////////////////////////////
        }

     
        $config['base_url'] = $base_url;
        $config['num_links'] = 5;
        
    
        $numrows = $this->member_model->getCountMembers($this->session->userdata('ser_keyword'));
        $config['per_page'] = $numrows;
        //echo $numrows;
        $config['total_rows'] = $numrows;

        $mem_arr = $this->member_model->searchMembers($this->session->userdata('ser_keyword'), $page, $config['per_page']);
        //  print_r($mem_arr);
        $this->set("mem_arr", $mem_arr);
        $count = count($mem_arr);
        $this->set("count", $count);
        $this->set('flag', $flag);



        $this->pagination->initialize($config);

        $this->set("mem_arr", $mem_arr);
        $result_per_page = $this->pagination->create_links();
        $this->set("result_per_page", $result_per_page);


        $this->set("action_page", $this->CURRENT_URL);

        $this->setView();
    }

    function terminate_member($action = "", $id = "") {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        $this->ARR_SCRIPT[0]["name"] = "validate_member.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "summernote/build/summernote.css";
        $this->ARR_SCRIPT[1]["type"] = "plugins/css";
        $this->ARR_SCRIPT[1]["loc"] = "header";


        $this->ARR_SCRIPT[2]["name"] = "ckeditor/contents.css";
        $this->ARR_SCRIPT[2]["type"] = "plugins/css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "jquery-validation/dist/jquery.validate.min.js";
        $this->ARR_SCRIPT[3]["type"] = "plugins/js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "jQuery-Smart-Wizard/js/jquery.smartWizard.js";
        $this->ARR_SCRIPT[4]["type"] = "plugins/js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";


        $this->ARR_SCRIPT[5]["name"] = "misc.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "header";

        $this->ARR_SCRIPT[7]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[7]["type"] = "css";
        $this->ARR_SCRIPT[7]["loc"] = "header";


        $this->ARR_SCRIPT[8]["name"] = "ajax.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "header";

        $this->ARR_SCRIPT[9]["name"] = "validate_MemberTerminate.js";
        $this->ARR_SCRIPT[9]["type"] = "js";
        $this->ARR_SCRIPT[9]["loc"] = "footer";

        $this->ARR_SCRIPT[10]["name"] = "terminate_member.js";
        $this->ARR_SCRIPT[10]["type"] = "js";
        $this->ARR_SCRIPT[10]["loc"] = "header";

        $this->setScripts();
        $title = $this->lang->line('member_management');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        ////////////////////////// code for language translation  ///////////////////////////////
        $this->set("tran_view", $this->lang->line('view'));
        $this->set("tran_Username_Name_Nominee_Address_MobileNo_City", $this->lang->line('Username_Name_Nominee_Address_MobileNo_City'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_keyword", $this->lang->line('keyword'));
        $this->set("tran_user_id", $this->lang->line('user_id'));
        $this->set("tran_terminate_date", $this->lang->line('terminate_date'));
        $this->set("tran_terminate_member", $this->lang->line('terminate_member'));
        $this->set("tran_reason", $this->lang->line('reason'));
        $this->set("tran_you_must_enter_the_user_name", $this->lang->line('you_must_enter_the_user_name'));
        $this->set("tran_you_must_enter_the_reason", $this->lang->line('you_must_enter_the_reason'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_search_member", $this->lang->line('search_member'));
        $this->set("tran_user_name", $this->lang->line('user_name'));
        $this->set("tran_name", $this->lang->line('name'));
        $this->set("tran_sponser_name", $this->lang->line('sponser_name'));
        $this->set("tran_nominee", $this->lang->line('nominee'));
        $this->set("tran_mobile_no", $this->lang->line('mobile_no'));
        $this->set("tran_address", $this->lang->line('address'));
        $this->set("tran_town", $this->lang->line('town'));
        $this->set("tran_country", $this->lang->line('country'));
        $this->set("tran_status", $this->lang->line('status'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_view_profile", $this->lang->line('view_profile'));
        $this->set("tran_active", $this->lang->line('active'));
        $this->set("tran_blocked", $this->lang->line('blocked'));
        $this->set("tran_No_User_Found", $this->lang->line('No_User_Found'));
        $this->set("tran_You_must_enter_keyword_to_search", $this->lang->line('You_must_enter_keyword_to_search'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_edit", $this->lang->line('edit'));
        $this->set("page_top_header", $this->lang->line('terminate_member'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('terminate_member'));
        $this->set("page_small_header", "");
        $help_link = "terminate-member ";
        $this->set("help_link", $help_link);
        ////////////////////////////////////////////////////////////////////////////////////
        $this->set("mem_arr", "");
        $this->set("count", "");


        if ($this->input->post('terminate_member')) {

            if ($this->input->post('keyword') == "") {
                $msg = $this->lang->line('please_enter_a_username');
                $this->redirect($msg, "member/terminate_member", FALSE);
            }
            $user_name_arr = $this->member_model->getUserName_details();
            $this->set("user_name_arr", $user_name_arr);


            $user_name = $this->input->post('keyword');
            $reason_ter = $this->input->post('reason');
            $new_username = $user_name . "_terminated";
            $this->session->set_userdata('ser_reason', $reason_ter);
            $this->session->set_userdata('ser_keyword', $user_name);
            $to_userid = $this->member_model->userNameToID($user_name);
            $res = $this->member_model->insertTerminateDetails($to_userid, $user_name, $reason_ter);
            if ($res) {
                $this->member_model->changeUsername($user_name, $new_username);
                $msg = $this->lang->line('user_terminated_successfully');
                $this->redirect($msg, "member/terminate_member", TRUE);
            } else {
                $msg = $this->lang->line('user_not_terminated');
                $this->redirect($msg, "member/terminate_member", FALSE);
            }
        }
        /*         * *******pagination******* */
        $base_url = base_url() . "admin/member/terminate_member";
        $config['base_url'] = $base_url;
        $config['per_page'] = 5;

        $total_rows = $this->member_model->terminateMembersCount();
        echo $total_rows;
        $config['total_rows'] = $total_rows;
        $config["uri_segment"] = 4;

        $config['num_links'] = 5;

        $this->pagination->initialize($config);
        if ($this->uri->segment(4) != "")
            $page = $this->uri->segment(4);
        else
            $page = 0;

        $mem_arr = $this->member_model->terminateMembers($config['per_page'], $page);

        $count = count($mem_arr);
        $this->set("count", $count);
        $this->set("mem_arr", $mem_arr);
        $result_per_page = $this->pagination->create_links();
        $this->set('result_per_page', $result_per_page);
        $this->setView();
    }

    function change_placement($action = "", $id = "") {

        $this->ARR_SCRIPT[0]["name"] = "ajax.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
        $this->ARR_SCRIPT[1]["type"] = "js";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.css";
        $this->ARR_SCRIPT[3]["type"] = "plugins/css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "bootstrap-social-buttons/social-buttons-3.css";
        $this->ARR_SCRIPT[4]["type"] = "plugins/css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.js";
        $this->ARR_SCRIPT[5]["type"] = "plugins/js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "jquery.pulsate/jquery.pulsate.min.js";
        $this->ARR_SCRIPT[6]["type"] = "plugins/js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "pages-user-profile.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "footer";


        $this->ARR_SCRIPT[8]["name"] = "validate_income.js";
        $this->ARR_SCRIPT[8]["type"] = "js";
        $this->ARR_SCRIPT[8]["loc"] = "footer";



        $this->setScripts();

        $user_type = $this->LOG_USER_TYPE;
        $this->set('user_type', $user_type);

        $title = "Change Placement";
        $this->set("title", $this->COMPANY_NAME . " | $title");


        $user_id = "";
        $user_name = "";
        $duration = "";

        if ($this->input->post('select_user')) {
            $user_name = $this->input->post('user_name');
            if ($user_name == "") {
                $msg = "You Must Select a Username..";
                $this->redirect($msg, "member/change_placement", false);
            }
            $this->load->model('validation', '', TRUE);
            $user_id = $this->validation->userNameToID($user_name);
        }

        $this->set("user_id", $user_id);
        $this->set("user_name", $user_name);


        if ($this->input->post("register")) {
            $post_arr = $this->input->post();
            // print_r($post_arr);
            $user_id = $post_arr['user_id'];
            $user_name = $post_arr['user_name'];
            $placement_name = $post_arr['ir_id_no'];
            $this->load->model('register_model', '', TRUE);

            $flag1 = $this->register_model->isUserAvailable($placement_name);

            if ($flag1) {



                $sponser_id = $this->member_model->getUnilevelFatherID($user_id);

                $res = $this->member_model->changeUserPlacement($post_arr, $user_id, $user_name);

                if ($res) {
                    $this->redirect("Placement Changed Successsfully..", "member/change_placement", TRUE);
                } else {
                    $this->redirect("Error On Changing Placement", "member/change_placement", FALSE);
                }
            } else {
                $this->redirect("Invalid Placement ID", "member/change_placement", FALSE);
            }
        }

        //  echo $u_name;die();

        $this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
        $this->set("tran_you_must_enter_your_Full_Name", $this->lang->line('you_must_enter_your_Full_Name'));
        $this->set("tran_You_must_enter_your_address", $this->lang->line('You_must_enter_your_address'));
        $this->set("tran_You_must_enter_your_taluk", $this->lang->line('You_must_enter_your_taluk'));
        $this->set("tran_You_must_Select_State", $this->lang->line('You_must_Select_State'));
        $this->set("tran_You_must_Select_District", $this->lang->line('You_must_Select_District'));
        $this->set("tran_You_must_enter_Post_office_name", $this->lang->line('You_must_enter_Post_office_name'));
        $this->set("tran_You_must_enter_pincode", $this->lang->line('You_must_enter_pincode'));
        $this->set("tran_You_must_enter_your_mobile_no", $this->lang->line('You_must_enter_your_mobile_no'));
        $this->set("tran_You_must_enter_your_college_name", $this->lang->line('You_must_enter_your_college_name'));
        $this->set("tran_you_must_enter_your_course_details", $this->lang->line('you_must_enter_your_course_details'));
        $this->set("tran_You_Select_A_Gender", $this->lang->line('You_Select_A_Gender'));
        $this->set("tran_digits_only", $this->lang->line('digits_only'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_select_user_id", $this->lang->line('select_user_id'));

        $this->set("page_top_header", "Change Placement");
        $this->set("page_top_small_header", "");
        $this->set("page_header", "Change Placement");
        $this->set("page_small_header", "");
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */

        $help_link = "profile-management";
        $this->set("help_link", $help_link);


        $this->setView();
    }

    function placement_availability() {

        $ir_id_no = mysql_real_escape_string($this->input->post('ir_id_no'));

        $change_userid = mysql_real_escape_string($this->input->post('change_userid'));

        $this->load->model('validation', '', TRUE);
        $change_username = $this->validation->IdToUserName($change_userid);

        $split_arr1 = explode("_", $ir_id_no);
        $split_arr2 = explode("_", $change_username);

        if ($split_arr1[0] == $split_arr2[0]) {
            echo "no";
            exit();
        } else {
            if ($this->member_model->isPlacementAvailable($ir_id_no)) {
                echo "yes";
                exit();
            } else {
                echo "no";
                exit();
            }
        }
    }

}

?>