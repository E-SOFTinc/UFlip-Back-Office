<?php

require_once 'Inf_Controller.php';

class BoardView extends Inf_Controller {

    function __construct() {
	parent::__construct();
    }

    public function board_view_management() {
	$title = $this->lang->line('BOARD_VIEW');
	$this->set("title", $this->COMPANY_NAME . " | $title");
	$this->ARR_SCRIPT[0]["name"] = "ajax-dynamic-list.js";
	$this->ARR_SCRIPT[0]["type"] = "js";
	$this->ARR_SCRIPT[0]["loc"] = "header";
	$this->ARR_SCRIPT[1]["name"] = "messages.css";
	$this->ARR_SCRIPT[1]["type"] = "css";
	$this->ARR_SCRIPT[1]["loc"] = "header";
	$this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
	$this->ARR_SCRIPT[2]["type"] = "css";
	$this->ARR_SCRIPT[2]["loc"] = "header";
	$this->ARR_SCRIPT[3]["name"] = "ajax.js";
	$this->ARR_SCRIPT[3]["type"] = "js";
	$this->ARR_SCRIPT[3]["loc"] = "header";
	$this->ARR_SCRIPT[4]["name"] = "style.css";
	$this->ARR_SCRIPT[4]["type"] = "css";
	$this->ARR_SCRIPT[4]["loc"] = "header";

	$this->ARR_SCRIPT[5]["name"] = "style_pop_up.css";
	$this->ARR_SCRIPT[5]["type"] = "css";
	$this->ARR_SCRIPT[5]["loc"] = "header";

	$this->ARR_SCRIPT[6]["name"] = "top_up-min.js";
	$this->ARR_SCRIPT[6]["type"] = "js";
	$this->ARR_SCRIPT[6]["loc"] = "header";

	$this->ARR_SCRIPT[7]["name"] = "tabs_pages.css";
	$this->ARR_SCRIPT[7]["type"] = "css";
	$this->ARR_SCRIPT[7]["loc"] = "header";

	$this->ARR_SCRIPT[8]["name"] = "jquery-ui.min.js";
	$this->ARR_SCRIPT[8]["type"] = "js";
	$this->ARR_SCRIPT[8]["loc"] = "header";

	$this->ARR_SCRIPT[9]["name"] = "select2/select2.css";
	$this->ARR_SCRIPT[9]["type"] = "plugins/css";
	$this->ARR_SCRIPT[9]["loc"] = "header";

	$this->ARR_SCRIPT[10]["name"] = "DataTables/media/css/DT_bootstrap.css";
	$this->ARR_SCRIPT[10]["type"] = "plugins/css";
	$this->ARR_SCRIPT[10]["loc"] = "header";

	$this->ARR_SCRIPT[11]["name"] = "select2/select2.min.js";
	$this->ARR_SCRIPT[11]["type"] = "plugins/js";
	$this->ARR_SCRIPT[11]["loc"] = "header";

	$this->ARR_SCRIPT[12]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
	$this->ARR_SCRIPT[12]["type"] = "plugins/js";
	$this->ARR_SCRIPT[12]["loc"] = "header";


	$this->ARR_SCRIPT[13]["name"] = "DataTables/media/js/DT_bootstrap.js";
	$this->ARR_SCRIPT[13]["type"] = "plugins/js";
	$this->ARR_SCRIPT[13]["loc"] = "header";

	$this->ARR_SCRIPT[14]["name"] = "table-data.js";
	$this->ARR_SCRIPT[14]["type"] = "js";
	$this->ARR_SCRIPT[14]["loc"] = "header";

	$this->ARR_SCRIPT[15]["name"] = "validate_select_user.js";
	$this->ARR_SCRIPT[15]["type"] = "js";
	$this->ARR_SCRIPT[15]["loc"] = "footer";

	$this->setScripts();
	/*	 * *****************************view_board*************************** */
	$user_id = "";
	$user_name = "";
	$encrypt_id = '';
	$board_submit = FALSE;
	if ($this->input->post('profile_update')) {
	    //Admin

	    $board_submit = TRUE;
	    $user_name = $this->input->post('user_name');
	    $user_id = $this->boardview_model->obj_vali->userNameToID($user_name);
	    $id_encode = $this->encrypt->encode($user_id);
	    $id_encode1 = str_replace("/", "_", $id_encode);
	    $encrypt_id = urlencode($id_encode1);
	} /* else {
	  $user_id = $this->session->userdata['logged_in']['user_id'];
	  $user_name = $this->boardview_model->obj_vali->IdToUserName($user_id);
	  $id_encode = $this->encrypt->encode($user_id);
	  $id_encode1 = str_replace("/", "_", $id_encode);
	  $encrypt_id = urlencode($id_encode1);
	  } */

	$date_of_join = $this->boardview_model->getJoiningData($user_id);
	$this->set('encrypt_id', $encrypt_id);
	$this->set("date_of_join", $date_of_join);

	$user_board_id_arr = array();
	$board_details_arr = array();
	$board_table_number = '';
	$downline_count = '';
	$direct_ref_count = '';
	$member_this_month = '';
	$club_split_count = 0;
	$club_completed_count = 0;

	if ($user_id > 0) {
	    $board_no = 1;
	    $board_name = "auto_board_" . $board_no;
	    if ($this->boardview_model->isEntryExsitInBoard($board_name, $user_id)) {
		//  $user_board_id_arr = $this->boardview_model->getMyBoardIDs($user_id, 1);
		$board_details_arr = $this->boardview_model->getMyBoards($user_id, $board_no);
		//print_r($board_details_arr);
		$user_board_id_arr = $board_details_arr['board_arr'];
		$board_serial_numbers = $board_details_arr['board_serial_numbers'];
		$club_split_count = $this->boardview_model->getClubSplitCount($board_serial_numbers, $user_id, $board_no);
		$club_completed_count = $this->boardview_model->getClubCompletedCount($board_serial_numbers, $user_id, $board_no);
		$downline_count = $this->boardview_model->getDownLineUSerCount($user_id);
		$direct_ref_count = $this->boardview_model->getDirectRefCount($user_id);
		$member_this_month = $this->boardview_model->getMemberThisMonth($user_id);
		//$member_this_week = $this->boardview_model->getMemberThisWeek();
		//$member_this_direct_week = $this->boardview_model->getDirectRefMemberThisWeek($user_id);
	    }
	}

	$user_board = $this->boardview_model->getAllBoarddetails(1);
	$this->set("user_board", $user_board);


	$this->set('board_submit', $board_submit);
	//print_r($user_board_id_arr);
	$this->set("tran_You_must_enter_user_name", $this->lang->line('You_must_enter_user_name'));
	$this->set("tran_errors_check", $this->lang->line('errors_check'));
	$this->set("user_board_id_arr", $user_board_id_arr);
	$this->set("tran_rows", $this->lang->line('rows'));
	$this->set("tran_shows", $this->lang->line('shows'));
	$this->set("user_name", strtoupper($user_name));
	$this->set("member_this_month", $member_this_month);
	$this->set("club_split_count", $club_split_count);
	$this->set("club_completed_count", $club_completed_count);
	//$this->set("member_this_week",  $member_this_week);
	//$this->set("member_this_direct_week",  $member_this_direct_week);
	$this->set("downline_count", $downline_count);
	$this->set("direct_ref_count", $direct_ref_count);
	$this->set("board_table_number", $board_table_number);

	////language translation
	$this->set("tran_Club_View", $this->lang->line('Club_View'));
	$this->set("tran_view_club", $this->lang->line('view_club'));
	$this->set("tran_select_user_name", $this->lang->line('select_user_name'));
	$this->set("tran_type_members_name", $this->lang->line('type_members_name'));
	$this->set("tran_user_club_details", $this->lang->line('user_club_details'));
	$this->set("tran_summary", $this->lang->line('summary'));
	$this->set("tran_user_id", $this->lang->line('user_id'));
	$this->set("tran_no_of_members_in_downline", $this->lang->line('no_of_members_in_downline'));
	$this->set("tran_directly_enrolled_members", $this->lang->line('directly_enrolled_members'));
	$this->set("tran_members_enrolled_in_this_month", $this->lang->line('members_enrolled_in_this_month'));
	$this->set("tran_clubs_splitted", $this->lang->line('clubs_splitted'));
	$this->set("tran_clubs_completed", $this->lang->line('clubs_completed'));
	$this->set("tran_slno", $this->lang->line('slno'));
	$this->set("tran_date_of_joining", $this->lang->line('date_of_joining'));
	$this->set("tran_club_id", $this->lang->line('club_id'));
	$this->set("tran_club_username", $this->lang->line('club_username'));
	$this->set("tran_club_split", $this->lang->line('club_split'));
	$this->set("tran_view", $this->lang->line('view'));
	$this->set("tran_yes", $this->lang->line('yes'));
	$this->set("tran_no", $this->lang->line('no'));
	$this->set("tran_invalid_user_id_or_not_found", $this->lang->line('invalid_user_id_or_not_found'));
	$this->set("tran_you_must_select_user_name", $this->lang->line('select_user_name'));


	$this->set("page_top_header", $this->lang->line('board_view_management'));
	$this->set("page_top_small_header", "");
	$this->set("page_header", $this->lang->line('board_view_management'));
	$this->set("page_small_header", "");
	/*	 * ********************************************************************************************* */
	/*	 * **************************************search_borad****************************************** */
	$boardnumber = 0;
	$submit_boardnumber = false;
	$user_board_id_arr_search = array();
	if ($this->input->post('submit_boardnumber')) {
	    //Admin
	    $tab1 = "";
	    $tab2 = " active";
	    $this->session->set_userdata("board_tab_active_arr", array("tab1" => $tab1, "tab2" => $tab2));
	    $boardnumber = $this->input->post('boardnumber');
	    $user_board_id_arr_search = $this->boardview_model->getBoardDetails($boardnumber);

	    $submit_boardnumber = true;
	}
	$this->set("user_board_id_arr_search", $user_board_id_arr_search);
	$this->set("submit_boardnumber", $submit_boardnumber);

	////language translation
	$this->set("tran_Club_View", $this->lang->line('Club_View'));
	$this->set("tran_board_view_management", $this->lang->line('board_view_management'));
	$this->set("tran_search_club", $this->lang->line('search_club'));
	$this->set("tran_submit", $this->lang->line('submit'));
	$this->set("tran_enter_club_no", $this->lang->line('enter_club_no'));
	$this->set("tran_type_members_name", $this->lang->line('type_members_name'));
	$this->set("tran_club_details", $this->lang->line('club_details'));
	$this->set("tran_slno", $this->lang->line('slno'));
	$this->set("tran_board_number", $this->lang->line('board_number'));
	$this->set("tran_date_of_joining", $this->lang->line('date_of_joining'));
	$this->set("tran_club_id", $this->lang->line('club_id'));
	$this->set("tran_club_username", $this->lang->line('club_username'));
	$this->set("tran_club_split", $this->lang->line('club_split'));
	$this->set("tran_view", $this->lang->line('view'));
	$this->set("tran_yes", $this->lang->line('yes'));
	$this->set("tran_no", $this->lang->line('no'));
	$this->set("tran_invalid_club_no", $this->lang->line('invalid_club_no'));
	/*	 * ************************************************************************************** */

	$help_link = "board_view";
	$this->set("help_link", $help_link);

	$this->setView();
    }

    public function view_board() {
	$this->setView();
    }

    function search_board() {

	$title = $this->lang->line('SEARCH_BOARD');
	$this->set("title", $this->COMPANY_NAME . " | $title");

	$this->ARR_SCRIPT[0]["name"] = "ajax-dynamic-list.js";
	$this->ARR_SCRIPT[0]["type"] = "js";
	$this->ARR_SCRIPT[1]["name"] = "messages.css";
	$this->ARR_SCRIPT[1]["type"] = "css";
	$this->ARR_SCRIPT[2]["name"] = "autoComplete.css";
	$this->ARR_SCRIPT[2]["type"] = "css";
	$this->ARR_SCRIPT[3]["name"] = "ajax.js";
	$this->ARR_SCRIPT[3]["type"] = "js";
	$this->ARR_SCRIPT[4]["name"] = "style.css";
	$this->ARR_SCRIPT[4]["type"] = "css";
	$this->ARR_SCRIPT[5]["name"] = "style_pop_up.css";
	$this->ARR_SCRIPT[5]["type"] = "css";
	$this->ARR_SCRIPT[6]["name"] = "top_up-min.js";
	$this->ARR_SCRIPT[6]["type"] = "js";


	$this->setScripts();

	$boardnumber = 0;
	$submit_boardnumber = false;
	$user_board_id_arr = array();
	if ($this->input->post('submit_boardnumber')) {
	    //Admin
	    $boardnumber = $this->input->post('boardnumber');
	    $user_board_id_arr = $this->boardview_model->getBoardDetails($boardnumber);

	    $submit_boardnumber = true;
	}
	$this->set("user_board_id_arr", $user_board_id_arr);
	$this->set("submit_boardnumber", $submit_boardnumber);

	////language translation
	$this->set("tran_Club_View", $this->lang->line('Club_View'));
	$this->set("tran_search_club", $this->lang->line('search_club'));
	$this->set("tran_enter_club_no", $this->lang->line('enter_club_no'));
	$this->set("tran_type_members_name", $this->lang->line('type_members_name'));
	$this->set("tran_club_details", $this->lang->line('club_details'));
	$this->set("tran_slno", $this->lang->line('slno'));
	$this->set("tran_date_of_joining", $this->lang->line('date_of_joining'));
	$this->set("tran_club_id", $this->lang->line('club_id'));
	$this->set("tran_club_username", $this->lang->line('club_username'));
	$this->set("tran_club_split", $this->lang->line('club_split'));
	$this->set("tran_view", $this->lang->line('view'));
	$this->set("tran_yes", $this->lang->line('yes'));
	$this->set("tran_no", $this->lang->line('no'));
	$this->set("tran_invalid_club_no", $this->lang->line('invalid_club_no'));

	$this->setView();
    }

    public function board_activation() {

	if (isset($this->input->post['board_activate'])) {
	    $user = $this->input->post['user_name'];
	    $pin = $this->input->post['pin_no'];

	    $flag = $this->boardview_model->activateBoardUser($user, $pin);

	    if ($flag) {
		$this->redirect('Board activated Sucessfully', $this->CURRENT_URL);
	    } else {
		$this->redirect('Error On Board Activation,Please check your account status or E-Pin Status', $this->CURRENT_URL);
	    }
	}

	$this->ARR_SCRIPT[0]["name"] = "profileUpdate.js";
	$this->ARR_SCRIPT[0]["type"] = "js";
	$this->ARR_SCRIPT[1]["name"] = "ajax-dynamic-list.js";
	$this->ARR_SCRIPT[1]["type"] = "js";
	$this->ARR_SCRIPT[2]["name"] = "messages.css";
	$this->ARR_SCRIPT[2]["type"] = "css";
	$this->ARR_SCRIPT[3]["name"] = "autoComplete.css";
	$this->ARR_SCRIPT[3]["type"] = "css";
	$this->ARR_SCRIPT[4]["name"] = "ajax.js";
	$this->ARR_SCRIPT[4]["type"] = "js";
	$this->ARR_SCRIPT[5]["name"] = "board_pin.js";
	$this->ARR_SCRIPT[5]["type"] = "js";
	$this->ARR_SCRIPT[6]["type"] = "js";
	$this->ARR_SCRIPT[6]["name"] = "validate_board_activation.js";
	$this->setScripts();
	$this->set('title', $this->COMPANY_NAME . ' | BOARD ACTIVATION');
    }

    function pass_availability() {
	$this->checkUserLoged();

	$this->AJAX_STATUS = true;


	if ($this->boardview_model->checkPassCode($this->input->post['prodcutpin'])) {
	    echo "yes";
	    exit();
	} else {
	    echo "no";
	    exit();
	}
    }

}
