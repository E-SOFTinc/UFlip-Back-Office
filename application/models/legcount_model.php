<?php
require_once 'Inf_Model.php';
class leg_count_model extends Inf_Model {

    private $obj_leg;

    public function initialize($product_status) {
        if ($product_status == 'yes') {
            require_once 'LegWithProduct.php';
        } else {
            require_once 'LegWithOutProduct.php';
        }
        $this->obj_leg = new Leg();
    }

    public function getUserLegDetails($user_id, $page, $limit, $user_type,$table_prefix ="") {
     
        
        
        $user_leg_detail = $this->obj_leg->getUserLegDetails($user_id, $page, $limit, $user_type);

        return $user_leg_detail;
    }

    public function paging($user_id, $page, $limit, $current_url) {
        require_once 'Page.php';
        $obj_page = new Page();
        $numrows = $this->obj_leg->getUserLegPage($user_id);

        $arr['first'] = $obj_page->paging($page, $limit, $numrows);
        $arr['page_footer'] = $obj_page->setFooter($page, $limit, $current_url);

        return $arr;
    }
 
}