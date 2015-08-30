<?php

require_once 'Inf_Controller.php';

class News extends Inf_Controller {

    function __construct() {
	parent::__construct();
    }

    function add_news($action = '', $edit_id = '') {
	$title = $this->lang->line('news');
	$this->set("title", $this->COMPANY_NAME . " | $title");
	$this->ARR_SCRIPT[0]["name"] = "validate_news.js";
	$this->ARR_SCRIPT[0]["type"] = "js";

	$this->ARR_SCRIPT[1]["name"] = "misc.js";
	$this->ARR_SCRIPT[1]["type"] = "js";
	$this->setScripts();

	$this->set("edit_id", null);
	$this->set("news_id", null);
	$this->set("news_title", null);
	$this->set("news_desc", null);
	$this->set("news_date", null);
	if ($action == "edit") {
	    $row = $this->news_model->editNews($edit_id);
	    $this->set("edit_id", $edit_id);
	    $this->set("news_id", $row['news_id']);
	    $this->set("news_title", $row['news_title']);
	    $this->set("news_desc", $row['news_desc']);
	    $this->set("news_date", $row['news_date']);
	}
	$delete_id = $edit_id;
	if ($action == "delete") {
	    $result = $this->news_model->deleteNews($delete_id);
	    if ($result) {
		$msg = $this->lang->line('news_deleted_successfully');
		$this->redirect($msg, "news/add_news", TRUE);
	    } else {
		$msg = $this->lang->line('error_on_deleting_news');
		$this->redirect($msg, "news/add_news", FALSE);
	    }
	}
	if ($this->input->post('news_submit')) {
	    $news_title = $this->input->post('news_title');
	    $news_desc = $this->input->post('news_desc');
	    $res = $this->news_model->addNews($news_title, $news_desc);
	    if ($res) {
		$msg = $this->lang->line('news_added_successfully');
		$this->redirect($msg, "news/add_news", TRUE);
	    } else {
		$msg = $this->lang->line('error_on_adding_news');
		$this->redirect($msg, "news/add_news", FALSE);
	    }
	}
	if ($this->input->post('news_update')) {
	    $news_id1 = $this->input->post('news_id');
	    $news_title1 = $this->input->post('news_title');
	    $news_desc1 = $this->input->post('news_desc');
	    $res = $this->news_model->updateNews($news_id1, $news_title1, $news_desc1);
	    if ($res) {
		$msg = $this->lang->line('news_updated_successfully');
		$this->redirect($msg, "news/add_news", TRUE);
	    } else {
		$msg = $this->lang->line('error_on_updating_news');
		$this->redirect($msg, "news/add_news", FALSE);
	    }
	}
	$news_details = $this->news_model->getAllNews();
	$this->set("news_details", $news_details);
	$this->set("arr_count", count($news_details));
	$this->setView();
    }

    function view_news() {
//////////////////////////////CODE ADDED BY YASIR//////////////////////////////
	$title = $this->lang->line('news');
	$this->set("title", $this->COMPANY_NAME . " | $title");

	

	$this->ARR_SCRIPT[0]["name"] = "ajax.js";
	$this->ARR_SCRIPT[0]["type"] = "js";
	$this->ARR_SCRIPT[0]["loc"] = "header";

	$this->ARR_SCRIPT[1]["name"] = "select2/select2.css";
	$this->ARR_SCRIPT[1]["type"] = "plugins/css";
	$this->ARR_SCRIPT[1]["loc"] = "header";

	$this->ARR_SCRIPT[2]["name"] = "DataTables/media/css/DT_bootstrap.css";
	$this->ARR_SCRIPT[2]["type"] = "plugins/css";
	$this->ARR_SCRIPT[2]["loc"] = "header";

	$this->ARR_SCRIPT[3]["name"] = "select2/select2.min.js";
	$this->ARR_SCRIPT[3]["type"] = "plugins/js";
	$this->ARR_SCRIPT[3]["loc"] = "footer";

	$this->ARR_SCRIPT[4]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
	$this->ARR_SCRIPT[4]["type"] = "plugins/js";
	$this->ARR_SCRIPT[4]["loc"] = "footer";

	$this->ARR_SCRIPT[5]["name"] = "DataTables/media/js/DT_bootstrap.js";
	$this->ARR_SCRIPT[5]["type"] = "plugins/js";
	$this->ARR_SCRIPT[5]["loc"] = "footer";

	$this->ARR_SCRIPT[6]["name"] = "table-data.js";
	$this->ARR_SCRIPT[6]["type"] = "js";
	$this->ARR_SCRIPT[6]["loc"] = "footer";

	$this->ARR_SCRIPT[7]["name"] = "style-popup.css";
	$this->ARR_SCRIPT[7]["type"] = "css";
	$this->ARR_SCRIPT[7]["loc"] = "header";


	$this->setScripts();



	$user_type = $this->LOG_USER_TYPE;
	$this->set('user_type', $user_type);
        

	////////////////////////// code for language translation  ///////////////////////////////

	$this->set("tran_news_title", $this->lang->line('news_title'));
	$this->set("tran_view_news_and_events", $this->lang->line('view_news_and_events'));
	$this->set("tran_no", $this->lang->line('no'));
	$this->set("tran_date", $this->lang->line('date'));
	$this->set("tran_news_details", $this->lang->line('news_details'));
	$this->set("tran_You_have_no_news_in_inbox", $this->lang->line('You_have_no_news_in_inbox'));


	$user_id = $this->LOG_USER_ID;
	$user_type = $this->LOG_USER_TYPE;
	$this->set('user_id', $user_id);
	$this->set('user_type', $user_type);
	$this->set("tran_errors_check", $this->lang->line('errors_check'));
	$this->set("page_top_header", $this->lang->line('view_news_and_events'));
	$this->set("page_top_small_header", "");
	$this->set("page_header", $this->lang->line('view_news_and_events'));
	$this->set("page_small_header", "");

	$help_link = "view-news";
	$this->set("help_link", $help_link);
	////////////////////////// code for language translation  ///////////////////////////////

	$news_details = $this->news_model->getAllNews();
	$this->set("news_details", $news_details);
	$this->set("arr_count", count($news_details));
	$this->setView();
    }

}

?>
