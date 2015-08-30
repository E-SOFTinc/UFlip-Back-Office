<?php

require_once 'Inf_Model.php';

Class news_model extends Inf_Model {

    function __construct() {
        parent::__construct();
    }

    public function editNews($id) {
        $this->db->where('news_id', $id);
        $query = $this->db->get('news');
        foreach ($query->result_array() as $row) {
            $obj_arr["news_id"] = $row['news_id'];
            $obj_arr["news_title"] = $row['news_title'];
            $obj_arr["news_desc"] = $row['news_desc'];
            $obj_arr["news_date"] = $row['news_date'];
        }
        return $obj_arr;
    }

    public function deleteNews($id) {
        $this->db->where('news_id', $id);
        $res = $this->db->delete('news');
        return $res;
    }

    public function addNews($news_title, $news_desc) {
        $date = date('Y-m-d H:i:s');
        $date = date('Y-m-d H:i:s');
        $this->db->set('news_title', $news_title);
        $this->db->set('news_desc', $news_desc);
        $this->db->set('news_date', $date);
        $res = $this->db->insert('news');
        return $res;
    }

    public function updateNews($news_id, $news_title, $news_desc) {
        $date = date('Y-m-d H:i:s');
        $this->db->set('news_title', $news_title);
        $this->db->set('news_desc', $news_desc);
        $this->db->set('news_date', $date);
        $this->db->where('news_id', $news_id);
        $res = $this->db->update('news');
        return $res;
    }

    public function getAllNews() {
        $obj_arr = array();
        $this->db->order_by("news_date", "desc");
        $query = $this->db->get('news');
        $i = 0;
        foreach ($query->result_array() as $row) {
            $obj_arr[$i]["news_id"] = $row['news_id'];
            $obj_arr[$i]["news_title"] = $row['news_title'];
            $obj_arr[$i]["news_desc"] = $row['news_desc'];
            $obj_arr[$i]["news_date"] = $row['news_date'];
            $i++;
        }
        return $obj_arr;
    }

    public function addDocuments($file_title, $doc_file_name) {
        $date = date('Y-m-d H:i:s');
        $this->db->set('file_title', $file_title);
        $this->db->set('doc_file_name', $doc_file_name);
        $this->db->set('uploaded_date', $date);
        $res = $this->db->insert('documents');
        return $res;
    }

    public function getAllDocuments() {
        $obj_arr = array();
        $this->db->order_by("uploaded_date", "desc");
        $query = $this->db->get('documents');
        $i = 0;
        foreach ($query->result_array() as $row) {
            $obj_arr[$i]["id"] = $row['id'];
            $obj_arr[$i]["file_title"] = $row['file_title'];
            $obj_arr[$i]["doc_file_name"] = $row['doc_file_name'];
            $obj_arr[$i]["uploaded_date"] = $row['uploaded_date'];
            $i++;
        }
        return $obj_arr;
    }

    public function deleteDocument($delete_id) {
        $this->db->where('id', $delete_id);
        $res = $this->db->delete('documents');
        return $res;
    }

}
