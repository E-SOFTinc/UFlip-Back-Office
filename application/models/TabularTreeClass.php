<?php

require_once 'Inf_Model.php';

class TabularTreeClass extends Inf_Model {

    function createChildren($id, $recursive = false) {
        $children = array();

        $this->db->select('id');
        $this->db->select('father_id');
        $this->db->select('active');
        $this->db->select('user_name');
        $this->db->from('ft_individual');
        $this->db->where("father_id", $id);
        $this->db->order_by('position', 'ASC');

        $res = $this->db->get();
        //echo $this->db->last_query();

        $i = 0;
        foreach ($res->result_array() as $row) {
            $children[$i]["id"] = $row["id"];
            $children[$i]["father_id"] = $row["father_id"];
            $children[$i]["position"] = $row["position"];
            $children[$i]["active"] = $row["active"];
            $children[$i]["user_name"] = $row["user_name"];
            $children[$i]["current_status"] = $row["active"];
            $i++;
        }
        return $children;
    }

    function getUserFullName($user_id) {
        $user_name = "";
        $this->db->select('user_name');
        $this->db->from('ft_individual');
        $this->db->where('id', $user_id);
        $this->db->limit('1');
        $res = $this->db->get();

        foreach ($res->result() as $row) {
            $user_name = $row->user_name;
        }
        return $user_name;
    }

    function getChildren($data) {
        $tmp = $this->createChildren((int) $data);
        //print_r($tmp);
        $result = array();

        $arr_len = count($tmp);
        for ($i = 0; $i < $arr_len; $i++) {
            $fullname = $this->getUserFullName($tmp[$i]["id"]);
            $id = $tmp[$i]["id"];

            if ($tmp[$i]["active"] == "yes") {
                $state = "true";
                $icon = "file.png";
                $title = $fullname;
            } else if ($tmp[$i]["active"] == "server") {
                $state = "false";
                $icon = "add_1.png";
                $title = $this->lang->line("BLANK");
            } else {
                $state = "closed";
                $icon = "file.png";
                $title = $fullname;
            }
            if ($tmp[$i]["current_status"] == 'yes') {
                $active = " - ACTIVE";
            } else if ($tmp[$i]["current_status"] == 'no') {
                $active = " - INACTIVE";
            } else {
                $active = $this->lang->line("BLANK");
            }


            $result[] = array(
                //"attr" => array("id" => "".$id, "rel" => "$state"),
                "title" => $title,
                "id" => $id,
                "icon" => $icon,
                "expand" => true
                    //"children" => 'yes'
            );
        }
        return json_encode($result);
    }

    public function getUserId($user_name) {

        require_once 'Validation.php';
        $obj_vali = new Validation();
        $user_id = $obj_vali->userNameToId($user_name);
        return $user_id;
    }

}
