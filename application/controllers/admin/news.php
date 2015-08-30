<?php

require_once 'Inf_Controller.php';

class News extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function add_news($action = '', $edit_id = '') {
        $title = $this->lang->line('news');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[0]["name"] = "misc.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "ckeditor/ckeditor.js";
        $this->ARR_SCRIPT[1]["type"] = "plugins/js";
        $this->ARR_SCRIPT[1]["loc"] = "footer";

        $this->ARR_SCRIPT[2]["name"] = "ckeditor/adapters/jquery.js";
        $this->ARR_SCRIPT[2]["type"] = "plugins/js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "ckeditor/contents.css";
        $this->ARR_SCRIPT[3]["type"] = "plugins/css";
        $this->ARR_SCRIPT[3]["loc"] = "header";

        $this->ARR_SCRIPT[4]["name"] = "validate_news.js";
        $this->ARR_SCRIPT[4]["type"] = "js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";
        $this->setScripts();
        ////////////////////////// code for language translation  ///////////////////////////////
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
        $this->set("tran_add_news_and_events", $this->lang->line('add_news_and_events'));
        $this->set("tran_news_title", $this->lang->line('news_title'));
        $this->set("tran_news_description", $this->lang->line('news_description'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_no", $this->lang->line('no'));
        $this->set("tran_date", $this->lang->line('date'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_no_news_found", $this->lang->line('no_news_found'));
        $this->set("tran_delete", $this->lang->line('delete'));
        $this->set("tran_edit", $this->lang->line('edit'));
        $this->set("tran_remove", $this->lang->line('remove'));
        $this->set("tran_you_must_enter_news_title", $this->lang->line('you_must_enter_news_title'));
        $this->set("tran_you_must_enter_news", $this->lang->line('you_must_enter_news'));
        $this->set("tran_sure_you_want_to_edit_this_news_there_is_no_undo", $this->lang->line('sure_you_want_to_edit_this_news_there_is_no_undo'));
        $this->set("tran_sure_you_want_to_delete_this_news_there_is_no_undo", $this->lang->line('sure_you_want_to_delete_this_news_there_is_no_undo'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("page_top_header", $this->lang->line('add_news_and_events'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('add_news_and_events'));
        $this->set("page_small_header", "");
        
        $help_link="news-management";
        $this->set("help_link", $help_link); 
             
        /*         * ***********     CODE ADDED BY vaisakh    *********** *              */
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
        $msg = "";
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
            //------------------
            if ($this->input->post('news_title')) {
                $news_title = $this->input->post('news_title');
            } else {
                $msg = $this->lang->line('you_must_enter_news_title');
                $this->redirect($msg, "news/add_news", FALSE);
            }
            if ($this->input->post('news_desc')) {
                $news_desc = $this->input->post('news_desc');
            } else {
                $msg = $this->lang->line('you_must_enter_news');
                $this->redirect($msg, "news/add_news", FALSE);
            }
            //------------------
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

    function upload_materials($action = '', $delete_id = '') {
        $this->set("title", $this->COMPANY_NAME . " | Upload Materials");

        $this->ARR_SCRIPT[0]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.css";
        $this->ARR_SCRIPT[0]["type"] = "plugins/css";
        $this->ARR_SCRIPT[0]["loc"] = "header";

        $this->ARR_SCRIPT[1]["name"] = "bootstrap-social-buttons/social-buttons-3.css";
        $this->ARR_SCRIPT[1]["type"] = "plugins/css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "bootstrap-fileupload/bootstrap-fileupload.min.js";
        $this->ARR_SCRIPT[2]["type"] = "plugins/js";
        $this->ARR_SCRIPT[2]["loc"] = "footer";

        $this->ARR_SCRIPT[3]["name"] = "jquery.pulsate/jquery.pulsate.min.js";
        $this->ARR_SCRIPT[3]["type"] = "plugins/js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[4]["type"] = "css";
        $this->ARR_SCRIPT[4]["loc"] = "header";

        $this->ARR_SCRIPT[5]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[5]["type"] = "js";
        $this->ARR_SCRIPT[5]["loc"] = "footer";

        $this->ARR_SCRIPT[6]["name"] = "validate_news.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "misc.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "header";
        $this->setScripts();

        $this->set("page_top_header", $this->lang->line('Upload_Materials'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('Upload_Materials'));
        $this->set("page_small_header", "");
        
        $help_link="upload-document";
        $this->set("help_link", $help_link); 

        $this->set("tran_Upload_Materials", $this->lang->line('Upload_Materials'));
        $this->set("tran_File_Title", $this->lang->line('File_Title'));
        $this->set("tran_Select_A_file", $this->lang->line('Select_A_file'));
        $this->set("tran_you_must_select_a_file", $this->lang->line('you_must_select_a_file'));
        $this->set("tran_upload", $this->lang->line('upload'));
        $this->set("tran_slno", $this->lang->line('slno'));
        $this->set("tran_uploaded_date", $this->lang->line('uploaded_date'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_No_Materials_Found", $this->lang->line('No_Materials_Found'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_title_needed", $this->lang->line('title_needed'));
        $this->set("tran_kb", $this->lang->line('kb'));
        $this->set("tran_Allowed_types_are_pdf_ppt_docs_xls_xlsx", $this->lang->line('Allowed_types_are_pdf_ppt_docs_xls_xlsx'));
        $res='';

        if ($action == "delete") {
            $result = $this->news_model->deleteDocument($delete_id);
            if ($result) {
                $this->redirect("Material Deleted Successfully", "news/upload_materials", TRUE);
            } else {
                $this->redirect("Error On Deleting Material", "news/upload_materials", FALSE);
            }
        }
        if ($this->input->post('upload_submit')) {
            $file_title = $this->input->post('file_title');
            $document1 = $_FILES['upload_doc']['name'];
            $upload_doc = 'upload_doc';
            $config['upload_path'] = './public_html/images/document/';
            $config['allowed_types'] = 'pdf|ppt|docs|xls|xlsx|doc';
            $config['max_size'] = '2000000';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload($upload_doc)) {
                $data = array('upload_data' => $this->upload->data());
                $doc_file_name = $data['upload_data']['file_name'];
                $res = $this->news_model->addDocuments($file_title, $doc_file_name);
            }
            if ($res) {
                $this->redirect("File Uploaded Successfully", "news/upload_materials", TRUE);
            } else {
                $this->redirect("Error On File Uploading", "news/upload_materials", FALSE);
            }
        }
        $file_details = $this->news_model->getAllDocuments();
        $this->set("file_details", $file_details);
        $this->set("arr_count", count($file_details));
        $this->setView();
    }

}

?>