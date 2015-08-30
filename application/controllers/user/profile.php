<?php

require_once 'Inf_Controller.php';

class Profile extends Inf_Controller {

    function __construct() {
	parent::__construct();
	$this->load->model('validation');
	$this->val = new Validation();
    }

    function profile_view() {

	$this->ARR_SCRIPT[0]["name"] = "ajax.js";
	$this->ARR_SCRIPT[0]["type"] = "js";
	$this->ARR_SCRIPT[0]["loc"] = "header";

	$this->ARR_SCRIPT[1]["name"] = "validate_profile_user.js";
	$this->ARR_SCRIPT[1]["type"] = "js";
	$this->ARR_SCRIPT[1]["loc"] = "footer";

	$this->ARR_SCRIPT[2]["name"] = "stateprof.js";
	$this->ARR_SCRIPT[2]["type"] = "js";
	$this->ARR_SCRIPT[2]["loc"] = "footer";

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

	$this->ARR_SCRIPT[7]["name"] = "profile_update.js";
	$this->ARR_SCRIPT[7]["type"] = "js";
	$this->ARR_SCRIPT[7]["loc"] = "footer";



	$this->setScripts();
	$product_status = $this->MODULE_STATUS['product_status'];
	$pin_status = $this->MODULE_STATUS['pin_status'];
	$user_type = $this->LOG_USER_TYPE;
	$this->set('user_type', $user_type);
	$mlm_plan = $this->session->userdata['mlm_plan'];
	$this->set('mlm_plan', $mlm_plan);

	$edit_profile = "";
	$lang_id = $this->LANG_ID;
	$this->set('lang_id', $lang_id);
	$tab1 = " active";
	$tab2 = "";

	if ($this->input->post('profile_edit')) {
	    $edit_profile = $this->input->post('profile_edit');
	    $country_code = $this->input->post('country_code');
	    $user_state = $this->input->post('user_state');
	    $user_district = $this->input->post('user_district');

	    $countries = $this->profile_model->viewCountry($country_code, $lang_id);
	    $this->set('countries', $countries);

	    $state = $this->profile_model->viewState($user_state);
	    $this->set("state", $state);
//                $district = $this->profile_model->viewDistrict($user_state, $user_district);
//                $this->set("district", $district);
	}
	$this->set('edit_profile', $edit_profile);

	$u_name = $this->LOG_USER_NAME;

	////////////////////////// code for language translation  ///////////////////////////////
	/*	 * ***********     CODE ADDED BY vaisakh    *********** *              */
	$this->set("tran_select_user", $this->lang->line('select_user'));
	$this->set("tran_select_user_name", $this->lang->line('select_user_name'));
	$this->set("tran_view", $this->lang->line('view'));
	$this->set("tran_type_members_name", $this->lang->line('type_members_name'));
	$this->set("tran_s_profile", $this->lang->line('s_profile'));
	$this->set("tran_change_profile_picture", $this->lang->line('change_profile_picture'));
	$this->set("tran_upload_profile_picture", $this->lang->line('upload_profile_picture'));
	$this->set("tran_sponsor_package_info", $this->lang->line('sponsor_package_info'));
	$this->set("tran_placement_user_name", $this->lang->line('placement_user_name'));
	$this->set("tran_position", $this->lang->line('position'));
	$this->set("tran_left", $this->lang->line('left'));
	$this->set("tran_right", $this->lang->line('right'));
	$this->set("tran_package", $this->lang->line('package'));
	$this->set("tran_epin", $this->lang->line('epin'));
	$this->set("tran_personal_info", $this->lang->line('personal_info'));
	$this->set("tran_name", $this->lang->line('name'));
	$this->set("tran_user_name", $this->lang->line('user_name'));
	$this->set("tran_date_of_birth", $this->lang->line('date_of_birth'));
	$this->set("tran_gender", $this->lang->line('gender'));
	$this->set("tran_male", $this->lang->line('male'));
	$this->set("tran_female", $this->lang->line('female'));
	$this->set("tran_contact_info", $this->lang->line('contact_info'));
	$this->set("tran_address", $this->lang->line('address'));
	$this->set("tran_country", $this->lang->line('country'));
	$this->set("tran_state", $this->lang->line('state'));
	$this->set("tran_district", $this->lang->line('district'));
	$this->set("tran_location", $this->lang->line('location'));
	$this->set("tran_pincode", $this->lang->line('pincode'));
	$this->set("tran_mob_no_10_digit", $this->lang->line('mob_no_10_digit'));
	$this->set("tran_land_line_no", $this->lang->line('land_line_no'));
	$this->set("tran_email", $this->lang->line('email'));
	$this->set("tran_nominee_info", $this->lang->line('nominee_info'));
	$this->set("tran_nominee_name", $this->lang->line('nominee_name'));
	$this->set("tran_relation", $this->lang->line('relation'));
	$this->set("tran_bank_info", $this->lang->line('bank_info'));
	$this->set("tran_pan_no", $this->lang->line('pan_no'));
	$this->set("tran_bank_account_number", $this->lang->line('bank_account_number'));
	$this->set("tran_ifsc_code", $this->lang->line('ifsc_code'));
	$this->set("tran_bank_name", $this->lang->line('bank_name'));
	$this->set("tran_branch_name", $this->lang->line('branch_name'));
	$this->set("tran_social_profiles", $this->lang->line('social_profiles'));
	$this->set("tran_edit_profile", $this->lang->line('edit_profile'));
	$this->set("tran_edit", $this->lang->line('edit'));
	$this->set("tran_select_gender", $this->lang->line('select_gender'));
	$this->set("tran_update_profile", $this->lang->line('update_profile'));
	$this->set("tran_reset", $this->lang->line('reset'));
	$this->set("tran_Facebook", $this->lang->line('Facebook'));
	$this->set("tran_Twitter", $this->lang->line('Twitter'));
	$this->set("tran_Overview", $this->lang->line('Overview'));
	$this->set("tran_Edit_Account", $this->lang->line('Edit_Account'));
	$this->set("tran_image_upload", $this->lang->line('image_upload'));
	$this->set("tran_Select_image", $this->lang->line('Select_image'));
	$this->set("tran_Change", $this->lang->line('Change'));
	$this->set("tran_Remove", $this->lang->line('Remove'));
	$this->set("tran_Required_Fields", $this->lang->line('Required_Fields'));
	$this->set("tran_term", $this->lang->line('term'));
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
	$this->set("page_top_header", $this->lang->line('profile_management'));
	$this->set("page_top_small_header", "");
	$this->set("page_header", $this->lang->line('profile_management'));
	$this->set("page_small_header", "");

	$help_link = "profile-management";
	$this->set("help_link", $help_link);
	/*	 * ***********     CODE ADDED BY vaisakh    *********** *              */
	if ($this->input->post('update_profile')) {
	    $tab1 = "";
	    $tab2 = " active";
	    $this->session->set_userdata("prof_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2));

	    $this->form_validation->set_rules('full_name', 'Name', 'trim|required');
	    $this->form_validation->set_rules('username', 'User Name', 'trim|required|');
//	    $this->form_validation->set_rules('year', 'Year', 'trim|required');
	    $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'trim|required');
//	    $this->form_validation->set_rules('day', 'Day', 'trim|required');
	    $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
	    $this->form_validation->set_rules('address', 'Address', 'trim|required');
	    $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|max_length[10]');
	    
	    $this->form_validation->set_message('required', '%s is Required');
	    $this->form_validation->set_message('max_length', 'The %s field can not exceed 10 digits.');
	    
	    $this->form_validation->set_error_delimiters("<div style='color:rgba(249, 6, 6, 1)'>", "</div>");
//	    print_r($this->input->post());die();
	    $res_val = $this->form_validation->run();
	    if ($res_val) {
		$regr = array();
		$post_arr = $this->validation->stripTagsPostArray($this->input->post());

		if (array_key_exists("username", $post_arr)) {
		    $regr['username'] = $post_arr['username'];
		}
		if (array_key_exists("full_name", $post_arr)) {
		    $regr['full_name'] = $post_arr['full_name'];
		}
		if (array_key_exists("address", $post_arr)) {
		    $regr['address'] = $post_arr['address'];
		}
		if (array_key_exists("post_office", $post_arr)) {
		    $regr['post_office'] = $post_arr['post_office'];
		}
		if (array_key_exists("country", $post_arr)) {
		    $regr['country'] = $this->profile_model->getCountryNameFromID($post_arr['country']);
		}
		if (array_key_exists("town", $post_arr)) {
		    $regr['town'] = $post_arr['town'];
		} else {
		    $regr['town'] = 'NA';
		}
		$regr['state'] = $this->profile_model->getStateName($post_arr['state']);
		if (array_key_exists("district", $post_arr)) {
		    $regr['district'] = $post_arr['district'];
		} else {
		    $regr['district'] = 'NA';
		}
		if (array_key_exists("mobile", $post_arr)) {
		    $regr['mobile'] = $post_arr['mobile'];
		}
		if (array_key_exists("land_line", $post_arr)) {
		    $regr['land_line'] = $post_arr['land_line'];
		}
		if (array_key_exists("email", $post_arr)) {
		    $regr['email'] = $post_arr['email'];
		}
		if (array_key_exists("date_of_birth", $post_arr)) {
		
		    $regr['date_of_birth'] = $post_arr['date_of_birth'];
//		     $year = $this->input->post('year');
//		     $month = $this->input->post('month');
//		     $day = $this->input->post('day');
		     //$regr['date_of_birth'] = $year . '-' . $month . '-' . $day;
		 // die();
//		    if (($year == '0000') || ($month == '00') || ($day == '00')) {
//			$msg = $this->lang->line('you_must_select_date_of_birth');
//			$this->redirect($msg, "profile/profile_view", FALSE);
//		    }
		    //$regr['date_of_birth'] = $post_arr['date_of_birth'];
		}

		if (array_key_exists("gender", $post_arr)) {
		    $regr['gender'] = $post_arr['gender'];
		}
		if (array_key_exists("pin", $post_arr)) {
		    $regr['pin'] = $post_arr['pin'];
		}
		if (array_key_exists("nominee", $post_arr)) {
		    $regr['nominee'] = $post_arr['nominee'];
		}
		if (array_key_exists("relation", $post_arr)) {
		    $regr['relation'] = $post_arr['relation'];
		}
		if (array_key_exists("pan_no", $post_arr)) {
		    $regr['pan_no'] = $post_arr['pan_no'];
		}
		if (array_key_exists("bank_acc_no", $post_arr)) {
		    $regr['bank_acc_no'] = $post_arr['bank_acc_no'];
		}
		if (array_key_exists("ifsc", $post_arr)) {
		    $regr['ifsc'] = $post_arr['ifsc'];
		}
		if (array_key_exists("bank_name", $post_arr)) {
		    $regr['bank_name'] = $post_arr['bank_name'];
		}
		if (array_key_exists("bank_branch", $post_arr)) {
		    $regr['bank_branch'] = $post_arr['bank_branch'];
		}
		if (array_key_exists("facebook", $post_arr)) {
		    $regr['facebook'] = $post_arr['facebook'];
		}
		if (array_key_exists("twitter", $post_arr)) {
		    $regr['twitter'] = $post_arr['twitter'];
		}

		/* $regr['username'] = $post_arr['username'];
		  $regr['full_name'] = $post['full_name'];
		  $regr['address'] = $post_arr['address'];
		  $regr['post_office'] = $post_arr['post_office'];
		  $regr['country'] = $post_arr['country'];
		  $regr['town'] = $post_arr['town'];
		  $regr['state'] = $this->profile_model->getStateName($post_arr['state']);
		  $regr['district'] = $post_arr['district'];
		  $regr['mobile'] = $post_arr['mobile'];
		  $regr['land_line'] = $post_arr['land_line'];
		  $regr['email'] = $post_arr['email'];
		  $regr['date_of_birth'] = $post_arr['date_of_birth'];
		  $regr['gender'] = $post_arr['gender'];
		  $regr['pin'] = $post_arr['pin'];
		  $regr['nominee'] = $post_arr['nominee'];
		  $regr['relation'] = $post_arr['relation'];
		  $regr['pan_no'] = $post_arr['pan_no'];
		  $regr['bank_acc_no'] = $post_arr['bank_acc_no'];
		  $regr['ifsc'] = $post_arr['ifsc'];
		  $regr['bank_name'] = $post_arr['bank_name'];
		  $regr['bank_branch'] = $post_arr['bank_branch'];
		  $regr['facebook'] = $post_arr['facebook'];
		  $regr['twitter'] = $post_arr['twitter']; */

		if ($_FILES['userfile']['error'] != 4) {

		    $user_id = $this->profile_model->userNameToId($regr['username']);
		    $config['upload_path'] = './public_html/images/profile_picture/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg';
		    $config['max_size'] = '2000000';
		    $config['remove_spaces'] = true;
		    $config['overwrite'] = false;

		    $this->load->library('upload', $config);
		    $msg = "";
		    if (!$this->upload->do_upload()) {
			$msg = $this->lang->line('image_not_selected');
			$error = array('error' => $this->upload->display_errors());
			$this->redirect($msg, "profile/profile_view", FALSE);
		    } else {
			$image_arr = array('upload_data' => $this->upload->data());
			$new_file_name = $image_arr['upload_data']['file_name'];
			$image = $image_arr['upload_data'];

			if ($image['file_name']) {
			    $data['photo'] = "public_html/images/profile_picture/" . $image['file_name'];
			    $data['raw'] = $image['raw_name'];
			    $data['ext'] = $image['file_ext'];
			}

			/* //thumbnail creation start
			  $config1['image_library'] = 'gd2';
			  $config1['source_image'] = $image['full_path'];
			  $config1['create_thumb'] = TRUE;
			  $config1['maintain_ratio'] = FALSE;
			  $config1['width'] = 116;
			  $config1['height'] = 116;

			  $this->load->library('image_lib', $config1);
			  $this->image_lib->initialize($config1);
			  if (!$this->image_lib->resize()) {
			  $msg = $this->lang->line('image_cannot_be_uploaded');
			  $this->redirect($msg, "profile/profile_view", FALSE);
			  } else {
			  // get file THUMBNAIL image name //
			  $thumbnail = $image_arr['upload_data']['raw_name'] . '_thumb' . $image_arr['upload_data']['file_ext'];
			  }
			  //THUMBNAIL ENDS */


			$res = $this->profile_model->changeProfilePicture($user_id, $new_file_name);
			if (!$res) {
			    $msg = $this->lang->line('image_cannot_be_uploaded');
			    $this->redirect($msg, "profile/profile_view", FALSE);
			}
		    }
		}

		$user_ref_id = $this->profile_model->userNameToId($regr['username']);
		$res = $this->profile_model->updateUserDetails($regr, $user_ref_id);
		$msg = "";
		if ($res) {
		    $loggin_id = $this->LOG_USER_ID;
		    $this->val->insertUserActivity($loggin_id, 'profile updated', $loggin_id);
		    $msg = $this->lang->line('user_profile_updated_successfully');
		    $this->redirect($msg, "profile/profile_view", TRUE);
		} else {
		    $msg = $this->lang->line('error_on_profile_updation');
		    $this->redirect($msg, "profile/profile_view", FALSE);
		}
	    }
	}
	$user_id = $this->profile_model->userNameToId($u_name);
	if ($user_id == "") {
	    $user_id = $this->LOG_USER_ID;
	    $u_name = $this->LOG_USER_NAME;
	}
	$profile_arr = $this->profile_model->getProfileDetails($user_id, $u_name, $product_status, $lang_id);
	$details = $profile_arr['details'];


	$this->set('cur_country', $details['detail1']['country']);
	$country_id = $this->profile_model->getCountryID($details['detail1']['country']);
	$countries = $this->profile_model->viewCountry($country_id, $lang_id);
	$this->set('countries', $countries);
	$state = $this->profile_model->viewState($country_id, $details['detail1']['state']);
	$this->set("state", $state);

	$district = $this->profile_model->viewDistrict($details['detail1']['state'], $details['detail1']['district']);
	$this->set("district", $district);

	$sponser = $profile_arr['sponser'];
	if ($product_status == "yes") {
	    $product_name = $profile_arr['product_name'];
	    $this->set("product_name", $product_name);
	}
	$title = $this->lang->line('s_profile');
	$this->set("title", $this->COMPANY_NAME . " | " . $u_name . "'$title");

	$this->set("u_name", $u_name);
	$this->set("product_status", $product_status);
	$this->set("pin_status", $pin_status);
	$this->set("sponser", $sponser);
	$this->set("details", $details);
	$file_name = $this->profile_model->getUserPhoto($user_id);
	if (!file_exists('public_html/images/profile_picture/' . $file_name)) {
	    $file_name = "nophoto.jpg";
	}
	$this->set("file_name", $file_name);
	if ($this->session->userdata("prof_tab_active_arr")) {
	    $tab1 = $this->session->userdata['prof_tab_active_arr']['tab1'];
	    $tab2 = $this->session->userdata['prof_tab_active_arr']['tab2'];
	    $this->session->unset_userdata("prof_tab_active_arr");
	}
	$this->set("tab1", $tab1);
	$this->set("tab2", $tab2);
	$this->setView();
    }

    function profile_picture() {
	$this->ARR_SCRIPT[0]["name"] = "profile_update.js";
	$this->ARR_SCRIPT[0]["type"] = "js";

	$this->ARR_SCRIPT[1]["name"] = "ajax.js";
	$this->ARR_SCRIPT[1]["type"] = "js";

	$this->ARR_SCRIPT[2]["name"] = "ajax-dynamic-list.js";
	$this->ARR_SCRIPT[2]["type"] = "js";

	$this->ARR_SCRIPT[3]["name"] = "autoComplete.css";
	$this->ARR_SCRIPT[3]["type"] = "css";

	$u_name = $this->LOG_USER_NAME;
	$title = $this->lang->line('s_profile_pic');
	$this->set("title", $this->COMPANY_NAME . " | " . $u_name . "'$title");
	////////////////////////// code for language translation  ///////////////////////////////
	/*	 * ***********     CODE ADDED BY vaisakh    *********** *              */
	$this->set("tran_s_profile_pic", $this->lang->line('s_profile_pic'));
	$this->set("tran_change_profile_pic", $this->lang->line('change_profile_pic'));
	$this->set("tran_max_size", $this->lang->line('max_size'));
	/*	 * ***********     CODE ADDED BY vaisakh    *********** *              */
	if ($this->input->post('profile_update')) {
	    $this->session->set_userdata('usr_name', $this->input->post('user_name'));
	    $u_name = $this->input->post('user_name');
	} else if (array_key_exists('usr_name', $this->session->userdata))
	    if ($this->session->userdata['usr_name']) {
		$u_name = $this->session->userdata['usr_name'];
	    }
	$user_id = $this->profile_model->userNameToId($u_name);
	if ($user_id == "") {
	    $user_id = $this->LOG_USER_ID;
	    $u_name = $this->LOG_USER_NAME;
	}
	$this->set("u_name", $u_name);
	$file_name = $this->profile_model->getUserPhoto($user_id);
	if ($file_name == "")
	    $file_name = "nophoto.jpg";

	$this->set("file_name", $file_name);

	if ($this->input->post('change_picture')) {

	    $config['upload_path'] = './public_html/images/profile_picture/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['max_size'] = '2000000';
	    $config['remove_spaces'] = true;
	    $config['overwrite'] = false;

	    $this->load->library('upload', $config);
	    $msg = "";
	    if (!$this->upload->do_upload()) {
		$msg = $this->lang->line('image_not_selected');
		$error = array('error' => $this->upload->display_errors());
		$this->redirect($msg, "profile/profile_view", FALSE);
	    } else {
		$image_arr = array('upload_data' => $this->upload->data());
		$new_file_name = $image_arr['upload_data']['file_name'];
		$image = $image_arr['upload_data'];

		if ($image['file_name']) {
		    $data['photo'] = "public_html/images/profile_picture/" . $image['file_name'];
		    $data['raw'] = $image['raw_name'];
		    $data['ext'] = $image['file_ext'];
		}

		//thumbnail creation start
		$config1['image_library'] = 'gd2';
		$config1['source_image'] = $image['full_path'];
		$config1['create_thumb'] = TRUE;
		$config1['maintain_ratio'] = FALSE;
		$config1['width'] = 116;
		$config1['height'] = 116;

		$this->load->library('image_lib', $config1);
		$this->image_lib->initialize($config1);
		if (!$this->image_lib->resize()) {
		    $msg = $this->lang->line('image_cannot_be_uploaded');
		    $this->redirect($msg, "profile/profile_view", FALSE);
		} else {
		    // get file THUMBNAIL image name //
		    $thumbnail = $image_arr['upload_data']['raw_name'] . '_thumb' . $image_arr['upload_data']['file_ext'];
		}
		//THUMBNAIL ENDS

		$res = $this->profile_model->changeProfilePicture($user_id, $thumbnail);
		if ($res) {
		    $msg = $this->lang->line('image_added_successfully');
		    $this->redirect($msg, "profile/profile_view", TRUE);
		} else {
		    $msg = $this->lang->line('image_cannot_be_uploaded');
		    $this->redirect($msg, "profile/profile_view", FALSE);
		}
	    }
	}

	$this->setScripts();
	$this->setView();
    }

    function get_district($state_id) {

	$arr = $this->profile_model->getDistrict($state_id);
	$tran_district = $this->lang->line('district');
	$district_select = "   <div id='state_div'>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label'>
                                $tran_district
                            </label>
                            <div class='row'>
                                <div class='col-md-9'> ";
	$district_select .= '<select name="district"  id="district" class="form-control" tabindex="16" onChange="setHiddenValue(this.value)" >';

	$option = $this->lang->line('select_district');

	$district_select .= '<option value="">' . $option . '</option>';

	for ($i = 0; $i < count($arr); $i++) {
	    $id = $arr["detail$i"]["district_id"];
	    $name = $arr["detail$i"]["district_name"];

	    $district_select .= "<option value='$name'>$name</option>";
	}
	$district_select .= '</select></div>
                            </div>
                        </div>
                    </div>
                    </div>';

	echo $district_select;
    }

    function get_states($country_id, $lang_id = '') {
	$state = '';
	$state_txt = $this->lang->line('state');
	;
	$state = "<div class='col-md-6'>
                 <div class='form-group'>
                       <label class='control-label'>
                               $state_txt                  
                         </label>
                   <div class='row'>
                        <div class='col-md-9'> 

                           <select name='state' id='state' tabindex='13' class='form-control'>";

	$state.=$this->profile_model->viewState($country_id);
	$state.="</select>                                    
                        </div>
                    </div>
                </div> ";
	// $state=  $this->profile_model->viewState($country_id);
	echo $state;
    }

}

?>