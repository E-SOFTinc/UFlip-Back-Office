<?php

require_once 'Inf_Model.php';

class product_model extends Inf_Model {

    var $product_detail = Array();
    public $up;
    public $val;

    function __construct() {
        parent::__construct();
        require_once 'FileUpload.php';
        $this->up = new FileUpload();
        
        require_once 'validation.php';
        $this->val = new Validation();
    }

    public function getAllProducts($status = "",$limit='',$page='') {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        //to get all product details

        $product_details = array();
        $i = 0;
        if ($status == '') {
            $this->db->select('product_id ,product_name,active,date_of_insertion,prod_id,product_value,pair_value,product_qty,prod_bv');
            $this->db->from("product");
        } else {

            $this->db->select('product_id ,product_name,active,date_of_insertion,prod_id,product_value,pair_value,product_qty,prod_bv');
            $this->db->from("product");
            $this->db->where('active = ' . "'" . $status . "'");
        }
        $this->db->limit($limit,$page);
        $query = $this->db->get();
        foreach ($query->result_array() as $row) {
            $product_details[] = $row;
        }
        return $product_details;
    }

    function getAllProductsCount($status = '') {
        $this->db->select('count(*) as cnt');
        $this->db->from('product');
        if ($status)
            $this->db->where ('active', $status);
        $qry=  $this->db->get();
        foreach ($qry->result() as $row) {
            return $row->cnt;
        }
    }

    public function addProduct($prod_name, $product_id, $product_amount, $pair_value, $bv_value,$bonus_status) {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        //to add a new  product

        $product = "product";
        $date = date('Y-m-d H:i:s');
        $data = array(
            'product_name' => $prod_name,
            'active' => 'yes',
            'date_of_insertion' => $date,
            'prod_id' => $product_id,
            'product_value' => $product_amount,
            'pair_value' => $pair_value,
            'prod_bv' => $bv_value,
            'participation_bonus_status' => $bonus_status
        );

        $res = $this->db->insert($product, $data);
        return $res;
    }

    public function editProduct($id) {

        //////////////////////  CODE EDITED BY JIJI  //////////////////////////
        //to get  details of a product

        $product = "product";
        $query = $this->db->get_where($product, array('product_id' => $id));
        foreach ($query->result() as $row) {
            return $row;
        }
    }

    public function updateProduct($id, $prod_name, $product_id, $product_amount, $pair_value, $bv_value,$bonus_status) {

        //////////////////////  CODE EDITED BY JIJI  //////////////////////////
        //to update  details of a product

        $product = "product";
        $data = array(
            'product_name' => $prod_name,
            'active' => 'yes',
            'prod_id' => $product_id,
            'product_value' => $product_amount,
            'pair_value' => $pair_value,
            'prod_bv' => $bv_value,
            'participation_bonus_status' => $bonus_status   
        );

        $this->db->where('product_id', $id);
        $res = $this->db->update($product, $data);
        return $res;
    }

    public function inactivateProduct($product_id) {

        //////////////////////  CODE EDITED BY JIJI  //////////////////////////
        //to inactivate a product


        $product = "product";
        $this->db->set('active', 'no');
        $this->db->where('product_id', $product_id);
        $res = $this->db->update($product);
        return $res;
    }

    public function activateProduct($product_id) {

        //////////////////////  CODE EDITED BY JIJI  //////////////////////////
        //to activate a product

        $product = "product";
        $this->db->set('active', 'yes');
        $this->db->where('product_id', $product_id);
        $res = $this->db->update($product);
        return $res;
    }

    public function InsertProductImage($product_id, $file_name) {

        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $product_image_table = $this->table_prefix . "product_image_table";
        $img_id = '';
        $this->db->select('product_image_id')->from($product_image_table)->where('product_ref_id', $product_id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $img_id = $row->product_image_id;
        }

        if ($img_id != '') {

            $this->db->set('product_image_name', $file_name);
            $this->db->where('product_image_id', $img_id);
            $res = $this->db->update($product_image_table);
        } else {

            $this->db->set('product_image_name', $file_name);
            $this->db->set('product_ref_id', $product_id);
            $res = $this->db->insert($product_image_table);
        }
        return $res;
    }

    public function getRandFileName($userfile, $path) {
        return $this->up->getRandFileName($userfile, $path);
    }

    public function config($file_size, $file_type) {
        return $this->up->config($file_size, $file_type);
    }

    public function upload($userfile, $path, $file_name) {
        $this->up->upload($userfile, $path, $file_name);
    }

    public function getPrdocutName($prodcut_id) {
        $product_name = "";
        $this->db->select("product_name");
        $this->db->from("product");
        $this->db->where("product_id", $prodcut_id);
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            $product_name = $row->product_name;
        }
        return $product_name;
    }

    public function isProductAvailable($product_id) {
        $flag = FALSE;
        $this->db->select("count(*) AS cnt");
        $this->db->from("product");
        $this->db->where("product_id", $product_id);
        $this->db->where("active", "yes");
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $count = $row->cnt;
        }
        if ($count > 0)
            $flag = TRUE;
        return $flag;
    }

    public function isProductPinAvailable($prodcutid, $prodcutpin) {
        $flag = 0;
        $this->db->select("count(*) AS cnt");
        $this->db->from("pin_numbers");
        $this->db->where("pin_numbers", $prodcutpin);
        $this->db->where("pin_prod_refid", $prodcutid);
        $this->db->where("status", "yes");
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $count = $row->cnt;
        }
        if ($count > 0)
            $flag = 1;
        return $flag;
    }

    public function isPasscodeAvailable($product_pin, $active = 'yes') {

        $flag = 0;
        $this->db->select("count(*) AS cnt");
        $this->db->from("pin_numbers");
        $this->db->where("pin_numbers", $product_pin);
        $this->db->where("status", $active);
        $qr = $this->db->get();
        foreach ($qr->result() as $row) {
            $count = $row->cnt;
        }
        if ($count > 0)
            $flag = 1;
        return $flag;
    }

    public function getProductValue($amount) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $configuration = $this->table_prefix . "configuration";

        $qr = "SELECT pair_value FROM $configuration";
        $res = $this->selectData($qr, "Error on selecting point value");
        $row = mysql_fetch_array($res);
        $pair_value = $row['pair_value'];
        $pair_value_cal = intval($amount / $pair_value);
        return $pair_value_cal;
    }

    public function getProductAmount($product_id) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $product = $this->table_prefix . "product";

        $qr = "SELECT pair_value FROM $product WHERE product_id='$product_id'";
        $res = $this->selectData($qr, "Error on selecting point Amount");
        $row = mysql_fetch_array($res);
        $pair_value = $row['pair_value'];
        $pair_value_cal = intval($amount / $pair_value);
        return $pair_value_cal;
    }

    public function getProduct($p_id) {
        $amount ="";
        $this->db->select("product_value");
        $this->db->from("product");
        $this->db->where("product_id", $p_id);

        $qr = $this->db->get();
        foreach ($qr->result_array() as $row) {
            $amount = $row['product_value'];
        }

        return $amount;
    }
    
    public function calculateRepurchase($user_id,$father_id,$product_id,$position,$count){
        require_once 'Calculation11Product.php';
        $obj_calc = new Calculation();
        $res  = $obj_calc->calculateLegCount($user_id,$father_id,$product_id,$position,'',$count);
        
        $sponsor_id = $this->val->getSponsorId($user_id);
        $referal_percentage = $this->val->getReferralAmount($product_id);
        $product_amount = $this->getProduct($product_id);
        $referal_amount = $product_amount*($referal_percentage/100);
        
        $res_ref = $obj_calc->insertReferalAmount($sponsor_id,$referal_amount,$user_id);
        
        return $res && $res_ref;
    }
    
    public function getUserLanguage($user_id){
        $lang_code = '';
        $this->db->select('lang_code');
        $this->db->from('languages');
        $this->db->join('login_user', 'login_user.default_lang = languages.lang_id');
        $this->db->where('login_user.user_id', $user_id);
        $query = $this->db->get();
        if($query->num_rows > 0){
            foreach ($query->result() as $row) {
                $lang_code = $row->lang_code;
            }
        }
        return $lang_code;
    }
    
     public function getTransStatus($transaction_id){
        $this->db->select('transaction_approved');
        $this->db->where('transaction_id', $transaction_id);
        $query=$this->db->get('exact_payment_history');
        foreach($query->result() as $row){
            $status=$row->transaction_approved;
        }
        return $status;
    }

}
