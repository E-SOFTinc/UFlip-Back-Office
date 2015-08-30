<?php
require_once 'Inf_Model.php';
class document_model extends Inf_Model {
    
    function __construct() {
        parent::__construct();
    }
    
     public function getAllDocuments()
    {
        $obj_arr=array();
        $this->db->order_by("uploaded_date", "desc");
        $query = $this->db->get('documents');
        $i=0;
        foreach ($query->result_array() as $row)
        {
            $obj_arr[$i]["id"]=$row['id'];
            $obj_arr[$i]["file_title"]=$row['file_title'];
            $obj_arr[$i]["doc_file_name"]=$row['doc_file_name'];
            $obj_arr[$i]["uploaded_date"]=$row['uploaded_date'];
            $i++;
        }
        return $obj_arr;
    }
    /*
    public function hideDocument($delete_id,$status=0)
    {
        $this->db->set('status',$status);
        $this->db->where('id',$delete_id);
        $res = $this->db->update('documents'); 
        return $res;
    }
    */
}
?>
