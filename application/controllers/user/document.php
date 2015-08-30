
<?php

require_once 'Inf_Controller.php';

class Document extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function show_document(/* $action = '', $h_id = '' */) {
        $title = $this->lang->line('document');
        $this->set("title", $this->COMPANY_NAME . " | $title");

        $this->ARR_SCRIPT[1]["name"] = "tooltip/standalone.css";
        $this->ARR_SCRIPT[1]["type"] = "css";
        $this->ARR_SCRIPT[1]["loc"] = "header";

        $this->ARR_SCRIPT[2]["name"] = "tooltip/tooltip-generic.css";
        $this->ARR_SCRIPT[2]["type"] = "css";
        $this->ARR_SCRIPT[2]["loc"] = "header";

        $this->ARR_SCRIPT[3]["name"] = "flot/jquery.flot.js";
        $this->ARR_SCRIPT[3]["type"] = "plugins/js";
        $this->ARR_SCRIPT[3]["loc"] = "footer";

        $this->ARR_SCRIPT[4]["name"] = "flot/jquery.flot.pie.js";
        $this->ARR_SCRIPT[4]["type"] = "plugins/js";
        $this->ARR_SCRIPT[4]["loc"] = "footer";


        $this->ARR_SCRIPT[5]["name"] = "tabs_pages.css";
        $this->ARR_SCRIPT[5]["type"] = "css";
        $this->ARR_SCRIPT[5]["loc"] = "header";

        $this->ARR_SCRIPT[6]["name"] = "jquery-ui.min.js";
        $this->ARR_SCRIPT[6]["type"] = "js";
        $this->ARR_SCRIPT[6]["loc"] = "footer";

        $this->ARR_SCRIPT[7]["name"] = "misc.js";
        $this->ARR_SCRIPT[7]["type"] = "js";
        $this->ARR_SCRIPT[7]["loc"] = "header";

        $this->ARR_SCRIPT[8]["name"] = "select2/select2.css";
        $this->ARR_SCRIPT[8]["type"] = "plugins/css";
        $this->ARR_SCRIPT[8]["loc"] = "header";

        $this->ARR_SCRIPT[9]["name"] = "DataTables/media/css/DT_bootstrap.css";
        $this->ARR_SCRIPT[9]["type"] = "plugins/css";
        $this->ARR_SCRIPT[9]["loc"] = "header";

        $this->ARR_SCRIPT[10]["name"] = "select2/select2.min.js";
        $this->ARR_SCRIPT[10]["type"] = "plugins/js";
        $this->ARR_SCRIPT[10]["loc"] = "footer";

        $this->ARR_SCRIPT[11]["name"] = "DataTables/media/js/jquery.dataTables.min.js";
        $this->ARR_SCRIPT[11]["type"] = "plugins/js";
        $this->ARR_SCRIPT[11]["loc"] = "footer";

        $this->ARR_SCRIPT[12]["name"] = "DataTables/media/js/DT_bootstrap.js";
        $this->ARR_SCRIPT[12]["type"] = "plugins/js";
        $this->ARR_SCRIPT[12]["loc"] = "footer";

        $this->ARR_SCRIPT[13]["name"] = "table-data.js";
        $this->ARR_SCRIPT[13]["type"] = "js";
        $this->ARR_SCRIPT[13]["loc"] = "footer";

        $this->set("page_top_header", $this->lang->line('show_document'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('show_document'));
        $this->set("page_small_header", "");

        $this->set("tran_Upload_Materials", $this->lang->line('Upload_Materials'));
        $this->set("tran_File_Title", $this->lang->line('File_Title'));
        $this->set("tran_Select_A_file", $this->lang->line('Select_A_file'));
        $this->set("tran_upload", $this->lang->line('upload'));
        $this->set("tran_slno", $this->lang->line('slno'));
        $this->set("tran_uploaded_date", $this->lang->line('uploaded_date'));
        $this->set("tran_action", $this->lang->line('action'));
        $this->set("tran_rows", $this->lang->line('rows'));
        $this->set("tran_shows", $this->lang->line('shows'));
        $this->set("tran_No_Materials_Found", $this->lang->line('No_Materials_Found'));
        $this->set("tran_errors_check", $this->lang->line('errors_check'));
        $this->set("tran_title_needed", $this->lang->line('title_needed'));

        $this->setScripts();

        /* if ($action == "hide") {
          $result = $this->document_model->hideDocument($h_id,$status=0);
          if ($result) {
          $this->redirect("Material is hidden Successfully", "document/show_document", TRUE);
          } else {
          $this->redirect("Error On hiding Material", "document/show_document", FALSE);
          }
          } */


        $file_details = $this->document_model->getAllDocuments();
        $this->set("file_details", $file_details);
        $this->set("arr_count", count($file_details));


        $this->setView();
    }

}

?>