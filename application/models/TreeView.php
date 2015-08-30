<?php

define('LEVEL', 4);
define('TOP_MARGIN', 50);
define('LEFT_MARGIN', 100);
define('BOX_WIDTH', 180);
define('BOX_HIGHT', 95);
define('PATH ', "..");

require_once 'Inf_Model.php';
require_once ('getTree.php');

error_reporting(E_ALL ^ E_NOTICE);

class TreeView extends Inf_Model {

    public $GRAPH_WIDTH;
    public $MATRIX;
    public $MAX_LEVEL;
    public $MAX_COL;
    public $POINT;

    function __construct() {
        parent::__construct();
        $this->obj_tree = new getTree();
    }

    function addtomatrixUnilevel($id, $level, $parent) {
       
        $display_tree = "";


# GET POSITION IN MATRIX
        
        if(!isset($this->MATRIX[$level][0]))
            $this->MATRIX[$level][0]=0;
        $this->MATRIX[$level][0] ++;

        $column = $this->MATRIX[$level][0];


# SET MAXCOL AND MAXLEVEL

        if ($column > $this->MAX_COL) {
            $this->MAX_COL = $column;
        }

        if ($level > $this->MAX_LEVEL) {
            $this->MAX_LEVEL = $level;
        }



# RECURSIVITY AIRBAG

        if ($level > LEVEL) {
            return;
        }
        $this->db->select('*');
        $this->db->from('ft_individual_unilevel');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $member) {

# ADD TO MATRIX

            $name = $member->user_name;

            $this->MATRIX[$level][$column]["id"] = $id;

            $this->MATRIX[$level][$column]["name"] = $member->user_name;

            $this->MATRIX[$level][$column]["parent"] = $parent;

            $this->MATRIX[$level][$column]["active"] = $member->active;

            $this->MATRIX[$level][$column]["position"] = $member->position;

            $this->MATRIX[$level][$column]["father_id"] = $member->father_id;
            $this->MATRIX[$level][$column]["package"] ="";



            for ($e = 0; $e < $level; $e++) {
                $display_tree.= "&nbsp;&nbsp;&nbsp;";
            }



# GET CHILDREN

            $this->db->select('id');
            $this->db->from('ft_individual_unilevel');
            $this->db->where('father_id', $id);
            $this->db->order_by("position", "asc");
            $query_ch = $this->db->get();
            
            foreach ($query_ch->result() as $member_ch) {
                $this->addtomatrixUnilevel($member_ch->id, $level + 1, $id);
            }
        }
    }

    function displaymatrixUnilevel($user_id, $id) {

        $this->set_config($id);
        $graphwidth = $this->GRAPH_WIDTH;
        //$graphwidth=2500;
//global $boxwidth;
        $boxwidth = BOX_WIDTH;

//global $boxheight
        $boxheight = BOX_HIGHT;
//global $topmargin;
        $topmargin = TOP_MARGIN;
//global $leftmargin;
        $leftmargin = LEFT_MARGIN;
        $maxweight = $this->MATRIX[1][1]["weight"];

        $unit = $graphwidth / $maxweight;
        $display_tree="";

        for ($level = 1; $level <= $this->MAX_LEVEL; $level++) {

            for ($column = 1; $column <= $this->MAX_COL; $column++) {

# DRAW BOXES

                if (isset($this->MATRIX[$level][$column]["id"])) {

                    $id_encrypt = $this->getEncrypt($this->MATRIX[$level][$column]["id"]);
                    $id_t = $this->MATRIX[$level][$column]["id"];

                    $x = ($this->MATRIX[$level][$column]["x"] * $graphwidth) - ($boxwidth / 2) + $leftmargin;


                    $y = ($level * $boxheight) - $boxheight + $topmargin + 20;


                    $display_tree.= "<div align='center' style='position:absolute; top:$y; left:$x;

				padding:0px;

				height:" . ($boxheight - 20) . "px;width:$boxwidth;'><div id=\"member\">";

                    if ($this->MATRIX[$level][$column]["active"] == "no") {

                        $active = $this->get_active_status($this->MATRIX[$level][$column]["id"]);

                        if ($get_active_status == "yes") {

                            $display_tree.= "<a href=\"\"><img src='" . $this->TEMPLATE_APP_PATH . "images/freezed.gif' height='48px' width='48px' border='0' title='Account Freezed'/><br>";
                        } else {



                            $display_tree.= "<a href=\"javascript:void(0);\" onclick=\"getSponsorTree('{$id_t}')\" id='userlink" . $this->MATRIX[$level][$column]['id'] . "'><img src='" . $this->TEMPLATE_APP_PATH . "images/inactive.png' height='48px' width='48px' border='0'  /><br>";
                        }
                    } 
                    elseif ($this->MATRIX[$level][$column]["active"] == "terminated")
                        $display_tree.= "<a href=\"javascript:void(0);\" onclick=\"getSponsorTree('{$id_t}')\" id='userlink" . $this->MATRIX[$level][$column]['id'] . "'><img src='" . $this->TEMPLATE_APP_PATH . "images/terminate.gif' height='48px' width='48px' border='0'  /><br>";
                        
                    elseif ($this->MATRIX[$level][$column]["active"] == "server")
                        $display_tree.= "<a href=\"" . base_url() . "register/user_register/{$id_encrypt}/" . $this->MATRIX[$level][$column]["position"] . "/" . $this->MATRIX[$level][$column]["father_id"] . "\" target=_parent><img src='" . $this->TEMPLATE_APP_PATH . "images/add.png' height='48px' width='48px' border='0' title='Add new member here...'/><br>";


                    else {
                        if ($this->MATRIX[$level][$column]["package"] == 'brand_partner')
                            $display_tree.= "<a href=\"javascript:void(0);\" onclick=\"getSponsorTree('{$id_t}')\" id='userlink" . $this->MATRIX[$level][$column]['id'] . "'><img src='" . $this->TEMPLATE_APP_PATH . "images/bp.png' height='48px' width='48px' border='0'  /><br>";
                        else
//------------
                            $display_tree.= "<a class=\"ttip\" href=\"javascript:void(0);\" onclick=\"getSponsorTree('{$id_t}')\" id='userlink" . $this->MATRIX[$level][$column]['id'] . "'><img src='" . $this->TEMPLATE_APP_PATH . "images/active.gif' height='48px' width='48px' border='0'  /><br>";
                    }
                    if ($this->MATRIX[$level][$column]["active"] != "server") {
                        $display_tree.= $this->MATRIX[$level][$column]["name"] . "</a><br>";
                    } else {
                        $display_tree.=$this->lang->line("ADD_HERE") . "</a><br>";
                    }
                    if ($this->MATRIX[$level][$column]["active"] != "server")
                        $display_tree.= "[" . "<font color='#009900'>" ./* $this->MATRIX[$level][$column]["track_id"] . */"</font>]";

                    $display_tree.= "</div>";

                    $display_tree.= "</div>";



# DRAW CONNECTING LINES

                    if ($this->MATRIX[$level][$column]["parent"] == $this->MATRIX[$level][$column - 1]["parent"]) {

                        if ($level > 1) {

# HORIZONTAL LINE

                            $prevx = ($this->MATRIX[$level][$column - 1]["x"] *
                                    $graphwidth) + $leftmargin;

                            $y2 = $y - 10;

                            $width = $x - $prevx + ($boxwidth / 2);

                            $display_tree.= "<div style='position:absolute; top:$y2; 							left:$prevx; border-top:1px solid #000; width:$width ; 						height:0px'>&nbsp;</div>";
                        }
                    }



# VERTICAL LINE (TOP)

                    if ($level > 1) {

                        $x = ($this->MATRIX[$level][$column]["x"] * $graphwidth) + $leftmargin;

                        $y2 = $y - 10;

                        $display_tree.= "<div style='position:absolute; top:$y2; left:$x;

					border-left:1px solid #000; width:0px;height:10px'>&nbsp;</div>";
                    }

# VERTICAL LINE (BOTTOM)

                    if ($level < $this->MAX_LEVEL && $this->MATRIX[$level][$column]["children"]) {

                        $x = ($this->MATRIX[$level][$column]["x"] * $graphwidth) + $leftmargin;

                        $y2 = $y + $boxheight - 20 + 1;

                        $display_tree.= "<div style='position:absolute; top:$y2; left:$x;

					border-left:1px solid #000; width:0px;height:10px'>&nbsp;</div>";
                    }



# "REDRAW" ICON

                    if ($level == 1) {

                        $this->db->select('father_id');
                        $this->db->from('ft_individual_unilevel');
                        $this->db->where('id', $this->MATRIX[$level][$column]["id"]);
                        $this->db->limit(1);
                        $query_parent = $this->db->get();
                        $row = $query_parent->row_array();
                        $root = $row["father_id"];
                        
                        if ($user_id > $root)        // BY ASHOK
                            $root = $this->MATRIX[$level][$column]["id"];
                    } else {

                        $root = $this->MATRIX[$level][$column]["id"];
                    }

                    if ($root) {

                        $x = ($this->MATRIX[$level][$column]["x"] * $graphwidth) - 8 + $leftmargin;

                        $url_encrypted_id = $this->getEncrypt($root);

                        $loged_user_id = $this->LOG_USER_ID;
                        $user_type = $this->session->userdata['logged_in']['user_type'];
                        if($user_type=='employee'){
                            $this->load->model('validation');
                            $loged_user_id=$this->validation->getAdminId();
                            
                            }
                        if (($this->MATRIX[$level][$column]["active"] != "server") and $this->MATRIX[$level][$column]["id"] != $loged_user_id) {
                            $up_link = $this->get_parent1($this->MATRIX[$level][$column]["id"]);
                            if (($this->MATRIX[$level][$column]["active"] != "server") and $this->MATRIX[$level][$column]["id"] != $loged_user_id) {

                                $display_tree.= "<div title='UP' onclick=\"getSponsorTree('$up_link');\"

					style='position:absolute; top:" . ($y - 9) . "; left:$x;

					border:0px solid #000; cursor:pointer; '><img src='" . $this->TEMPLATE_APP_PATH . "images/up.png' height='16px' width='16px' border='0' /></div>\n";
                            }
                        }
                    }
                }
            }
        }
        return $display_tree;
    }

    function balancematrix() {

        # ASSIGN WEIGHT TO EACH PARENT

        for ($level = $this->MAX_LEVEL; $level >= 1; $level--) {

            for ($column = 1; $column <= $this->MAX_COL; $column++) {

                if ($level == $this->MAX_LEVEL) {

                    $this->MATRIX[$level][$column]["weight"] = 1;
                } else {

                    $weight = 0;

                    for ($col = 1; $col <= $this->MAX_COL; $col++) {

                        if (isset($this->MATRIX[$level + 1][$col]["parent"])&&isset($this->MATRIX[$level][$column]["id"])&&($this->MATRIX[$level + 1][$col]["parent"] == $this->MATRIX[$level][$column]["id"])) {

                            $weight = $weight + $this->MATRIX[$level + 1][$col]["weight"];
                        }
                    }

                    $this->MATRIX[$level][$column]["children"] = $weight;

                    if ($weight == 0) {
                        $weight = 1;
                    }

                    $this->MATRIX[$level][$column]["weight"] = $weight;
                }
            }
        }
        # DEFINE X COORDINATES

        $this->MATRIX[1][1]["x"] = .5;

        $this->MATRIX[1][1]["width"] = 1;

        for ($level = 2; $level <= $this->MAX_LEVEL; $level++) {

            for ($column = 1; $column <= $this->MAX_COL; $column++) {

                if (isset($this->MATRIX[$level][$column]["id"])) {

                    $parentweight = 1;
                    $parentwidth = 1;
                    $parentx = 1;

                    for ($col = 1; $col <= $this->MAX_COL; $col++) {

                        if (isset($this->MATRIX[$level - 1][$col]["id"])&&isset($this->MATRIX[$level][$column]["parent"])&&($this->MATRIX[$level - 1][$col]["id"] == $this->MATRIX[$level][$column]["parent"])) {

                            $parentweight = $this->MATRIX[$level - 1][$col]["weight"];

                            $parentwidth = $this->MATRIX[$level - 1][$col]["width"];

                            $parentx = $this->MATRIX[$level - 1][$col]["x"];
                        }
                    }

                    $mywidth = ($this->MATRIX[$level][$column]["weight"] / $parentweight) * $parentwidth;

                    # IF I AM NOT THE FIRST CHILD, CALCULATE LEFT EDGE

                    if ($this->MATRIX[$level][$column - 1]["parent"] != $this->MATRIX[$level][$column]["parent"]) {

                        $myleftedge = $parentx - ($parentwidth / 2);
                    } else {

                        $myleftedge = $this->MATRIX[$level][$column - 1]["x"] +
                                ($this->MATRIX[$level][$column - 1]["width"] / 2);
                    }

                    $myx = $myleftedge + ($mywidth / 2);

                    $this->MATRIX[$level][$column]["width"] = $mywidth;

                    $this->MATRIX[$level][$column]["x"] = $myx;
                } else {

                    $column = 9999;
                }
            }
        }
    }

    function balancematrixsponser() {

        # ASSIGN WEIGHT TO EACH PARENT

        for ($level = $this->MAX_LEVEL; $level >= 1; $level--) {

            for ($column = 1; $column <= $this->MAX_COL; $column++) {

                if ($level == $this->MAX_LEVEL) {

                    $this->MATRIX[$level][$column]["weight"] = 1;
                } else {

                    $weight = 0;

                    for ($col = 1; $col <= $this->MAX_COL; $col++) {

                        if (isset($this->MATRIX[$level][$column]["id"])&&isset($this->MATRIX[$level+1][$col]["parent"])&&($this->MATRIX[$level + 1][$col]["parent"] == $this->MATRIX[$level][$column]["id"])) {

                            $weight = $weight + $this->MATRIX[$level + 1][$col]["weight"];
                        }
                    }

                    $this->MATRIX[$level][$column]["children"] = $weight;

                    if ($weight == 0) {
                        $weight = 1;
                    }

                    $this->MATRIX[$level][$column]["weight"] = $weight;
                }
            }
        }
        # DEFINE X COORDINATES

        $this->MATRIX[1][1]["x"] = .5;

        $this->MATRIX[1][1]["width"] = 1;
        if ($this->MAX_COL > 8) {
            $this->MATRIX[1][1]["x"] = $this->MAX_COL * 0.055;
            $this->MATRIX[1][1]["width"] = $this->MAX_COL * 0.11; //changes according to max no of users
        }

        for ($level = 2; $level <= $this->MAX_LEVEL; $level++) {

            for ($column = 1; $column <= $this->MAX_COL; $column++) {

                if ($this->MATRIX[$level][$column]["id"]) {

                    $parentweight = 1;
                    $parentwidth = 1;
                    $parentx = 1;

                    for ($col = 1; $col <= $this->MAX_COL; $col++) {

                        if (isset($this->MATRIX[$level][$column]["parent"])&&isset($this->MATRIX[$level-1][$col]["id"])&&($this->MATRIX[$level - 1][$col]["id"] == $this->MATRIX[$level][$column]["parent"])) {

                            $parentweight = $this->MATRIX[$level - 1][$col]["weight"];

                            $parentwidth = $this->MATRIX[$level - 1][$col]["width"];

                            $parentx = $this->MATRIX[$level - 1][$col]["x"];
                        }
                    }

                    $mywidth = ($this->MATRIX[$level][$column]["weight"] / $parentweight) * $parentwidth;

                    # IF I AM NOT THE FIRST CHILD, CALCULATE LEFT EDGE

                    if ($this->MATRIX[$level][$column - 1]["parent"] != $this->MATRIX[$level][$column]["parent"]) {

                        $myleftedge = $parentx - ($parentwidth / 2);
                    } else {

                        $myleftedge = $this->MATRIX[$level][$column - 1]["x"] +
                                ($this->MATRIX[$level][$column - 1]["width"]);
                    }

                    $myx = $myleftedge + ($mywidth / 2);

                    $this->MATRIX[$level][$column]["width"] = $mywidth;

                    $this->MATRIX[$level][$column]["x"] = $myx;
                } else {

                    $column = 9999;
                }
            }
        }
    }

    function displaymatrix($user_id, $id) {
        $this->set_config($id);
        $graphwidth = $this->GRAPH_WIDTH;
        //global $boxwidth;
        $boxwidth = BOX_WIDTH;

        //global $boxheight
        $boxheight = BOX_HIGHT;
        //global $topmargin;
        $topmargin = TOP_MARGIN;
        //global $leftmargin;
        $leftmargin = LEFT_MARGIN;
        $maxweight = $this->MATRIX[1][1]["weight"];
        $display_tree="";
        $unit = $graphwidth / $maxweight;


        for ($level = 1; $level <= $this->MAX_LEVEL; $level++) {

            for ($column = 1; $column <= $this->MAX_COL; $column++) {

                # DRAW BOXES

                if (isset($this->MATRIX[$level][$column]["id"])) {

                    $id_encrypt = $this->getEncrypt($this->MATRIX[$level][$column]["id"]);
                    $id_t = $this->MATRIX[$level][$column]["id"];

                    $x = ($this->MATRIX[$level][$column]["x"] * $graphwidth) - ($boxwidth / 2 ) + $leftmargin;

                    $y = ($level * $boxheight) - $boxheight + $topmargin + 20;


                    $display_tree.= "<div align='center' style='position:absolute; top:$y; left:$x;

				padding:0px;

				height:" . ($boxheight - 20) . "px;width:$boxwidth;'><div id=\"member\">";

                    if ($this->MATRIX[$level][$column]["active"] == "no") {

                        $active = $this->get_active_status($this->MATRIX[$level][$column]["id"]);

                        if ($active == "yes") {

                            $display_tree.= "<a href=\"javascript:void(0);\" onclick=\"getGenologyTree('{$id_t}')\" id='userlink" . $this->MATRIX[$level][$column]['id'] . "'><img src='" . $this->TEMPLATE_APP_PATH . "images/inactive.png' height='48px' width='48px' border='0' title='Account Freezed'/><br>";
                        } else {

                            $display_tree.= "<a href=\"javascript:void(0);\" onclick=\"getGenologyTree('{$id_t}')\" id='userlink" . $this->MATRIX[$level][$column]['id'] . "'><img src='" . $this->TEMPLATE_APP_PATH . "images/inactive.png' height='48px' width='48px' border='0' title='Not Activated'/><br>";
                        }
                    }
                    elseif ($this->MATRIX[$level][$column]["active"] == "terminated")
                        $display_tree.= "<a href=\"javascript:void(0);\" onclick=\"getSponsorTree('{$id_t}')\" id='userlink" . $this->MATRIX[$level][$column]['id'] . "'><img src='" . $this->TEMPLATE_APP_PATH . "images/terminate.gif' height='48px' width='48px' border='0'  /><br>";
                    elseif ($this->MATRIX[$level][$column]["active"] == "server")
                        $display_tree.= "<a href=\"" . base_url() . "register/user_register/{$id_encrypt}/" . $this->MATRIX[$level][$column]["position"] . "/" . $this->MATRIX[$level][$column]["father_id"] . "\" target=_parent><img src='" . $this->TEMPLATE_APP_PATH . "images/add.png' height='48px' width='48px' border='0' title='Add new member here...'/><br>";
                    else
                        $display_tree.= "<a href=\"javascript:void(0);\" onclick=\"getGenologyTree('{$id_t}')\" id='userlink" . $this->MATRIX[$level][$column]['id'] . "'><img src='" . $this->TEMPLATE_APP_PATH . "images/active.gif' height='48px' width='48px' border='0'  /><br>";

                    if ($this->MATRIX[$level][$column]["active"] != "server") {
                        $display_tree.= $this->MATRIX[$level][$column]["name"] . "</a><br>";
                    } else {
                        $display_tree.=$this->lang->line("ADD_HERE") . "</a><br>";
                    }
                    if ($this->MATRIX[$level][$column]["active"] != "server")
                        $display_tree.= "[" . "<font color='#009900'>" ./* $this->MATRIX[$level][$column]["track_id"] . */"</font>]";

                    $display_tree.= "</div>";

                    $display_tree.= "</div>";



                    # DRAW CONNECTING LINES

                    if ($this->MATRIX[$level][$column]["parent"] == $this->MATRIX[$level][$column - 1]["parent"]) {

                        if ($level > 1) {

                            # HORIZONTAL LINE

                            $prevx = ($this->MATRIX[$level][$column - 1]["x"] *
                                    $graphwidth) + $leftmargin;

                            $y2 = $y - 10;

                            $width = $x - $prevx + ($boxwidth / 2);

                            $display_tree.= "<div style='position:absolute; top:$y2; 							left:$prevx; border-top:1px solid #000; width:$width ; 						height:0px'>&nbsp;</div>";
                        }
                    }



                    # VERTICAL LINE (TOP)

                    if ($level > 1) {

                        $x = ($this->MATRIX[$level][$column]["x"] * $graphwidth) + $leftmargin;

                        $y2 = $y - 10;

                        $display_tree.= "<div style='position:absolute; top:$y2; left:$x;

					border-left:1px solid #000; width:0px;height:10px'>&nbsp;</div>";
                    }

                    # VERTICAL LINE (BOTTOM)

                    if ($level < $this->MAX_LEVEL && $this->MATRIX[$level][$column]["children"]) {

                        $x = ($this->MATRIX[$level][$column]["x"] * $graphwidth) + $leftmargin;

                        $y2 = $y + $boxheight - 20 + 1;

                        $display_tree.= "<div style='position:absolute; top:$y2; left:$x;

					border-left:1px solid #000; width:0px;height:10px'>&nbsp;</div>";
                    }



                    # "REDRAW" ICON

                    if ($level == 1) {

                        $this->db->select('father_id');
                        $this->db->from('ft_individual');
                        $this->db->where('id', $this->MATRIX[$level][$column]["id"]);
                        $this->db->limit(1);
                        $query_parent = $this->db->get();
                        $row = $query_parent->row_array();
                        $root = $row["father_id"];

                        if ($user_id > $root)        // BY ASHOK
                            $root = $this->MATRIX[$level][$column]["id"];
                    } else {

                        $root = $this->MATRIX[$level][$column]["id"];
                    }

                    if ($root) {

                        $x = ($this->MATRIX[$level][$column]["x"] * $graphwidth) - 8 + $leftmargin;

                        $url_encrypted_id = $this->getEncrypt($root);

                        $loged_user_id = $this->LOG_USER_ID;
                        $user_type = $this->session->userdata['logged_in']['user_type'];
                        if($user_type=='employee'){
                            $this->load->model('validation');
                            $loged_user_id=$this->validation->getAdminId();
                            
                            }
                        if (($this->MATRIX[$level][$column]["active"] != "server") and $this->MATRIX[$level][$column]["id"] != $loged_user_id) {
                            $up_link = $this->get_parent($this->MATRIX[$level][$column]["id"]);
                            if (($this->MATRIX[$level][$column]["active"] != "server") and $this->MATRIX[$level][$column]["id"] != $loged_user_id) {

                                $display_tree.= "<div title='UP' onclick=\"getGenologyTree('$up_link');\"

					style='position:absolute; top:" . ($y - 9) . "; left:$x;

					border:0px solid #000; cursor:pointer; '><img src='" . $this->TEMPLATE_APP_PATH . "images/up.png' height='16px' width='16px' border='0' /></div>\n";
                            }
                        }
                    }
                }
            }
        }
        return $display_tree;
    }

    function addtomatrix($id, $level, $parent) {

        $display_tree = "";


        # GET POSITION IN MATRIX
        if(!isset($this->MATRIX[$level][0]))
            $this->MATRIX[$level][0]=0;
        $this->MATRIX[$level][0] ++;

        $column = $this->MATRIX[$level][0];

        # SET MAXCOL AND MAXLEVEL

        if ($column > $this->MAX_COL) {
            $this->MAX_COL = $column;
        }

        if ($level > $this->MAX_LEVEL) {
            $this->MAX_LEVEL = $level;
        }



        # RECURSIVITY AIRBAG

        if ($level > LEVEL) {
            return;
        }
        $this->db->select('*');
        $this->db->from('ft_individual');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $member) {

            # ADD TO MATRIX
            $name = $member->user_name;

            $this->MATRIX[$level][$column]["id"] = $id;

            $this->MATRIX[$level][$column]["name"] = $member->user_name;

            $this->MATRIX[$level][$column]["parent"] = $parent;

            $this->MATRIX[$level][$column]["active"] = $member->active;

            $this->MATRIX[$level][$column]["position"] = $member->position;

            $this->MATRIX[$level][$column]["father_id"] = $member->father_id;



            for ($e = 0; $e < $level; $e++) {
                $display_tree.= "&nbsp;&nbsp;&nbsp;";
            }



            # GET CHILDREN

            $this->db->select('id');
            $this->db->from('ft_individual');
            $this->db->where('father_id', $id);
            $this->db->order_by("position", "asc");
            $query_ch = $this->db->get();
            foreach ($query_ch->result() as $member_ch) {
                $this->addtomatrix($member_ch->id, $level + 1, $id);
            }
        }
    }

    function get_parent($child) {

        $this->db->select('father_id');
        $this->db->from('ft_individual');
        $this->db->where('id', $child);
        $this->db->limit(1);
        $query_parent = $this->db->get();
        foreach ($query_parent->result() as $row) {
            $father = $row->father_id;
        }

        return $father;
    }

    function get_parent1($child) {

        $this->db->select('father_id');
        $this->db->from('ft_individual_unilevel');
        $this->db->where('id', $child);
        $this->db->limit(1);
        $query_parent = $this->db->get();
        foreach ($query_parent->result() as $row) {
            $father = $row->father_id;
        }

        return $father;
    }

    function get_active_status($id) {

        $this->db->select('*');
        $this->db->from('ft_individual');
        $this->db->where('id', $id);
        $cnt = $this->db->count_all_results();

        if ($cnt > 0) {
            $status = "yes";
        } else {
            $status = "no";
        }

        return $status;
    }

    function getEncrypt($string) {
        $id_encode = $this->encrypt->encode($string);
        $id_encode = str_replace("/", "_", $id_encode);
        return $encrypt_id = urlencode($id_encode);
    }

    function getDecrypt($string) {
        $id = urldecode($string);
        $id_decode = str_replace("_", "/", $id);
        return $id_decrypt = $this->encrypt->decode($id_decode);
    }

    function set_config($id) {


        $user_arr = $this->obj_tree->getDownlineUsers($id, 3);

        $max_level_count = $this->obj_tree->getMaxLevelCount($user_arr);
        $this->GRAPH_WIDTH = ($max_level_count) * 100;

        if ($this->GRAPH_WIDTH < 850) {
            $this->GRAPH_WIDTH = 900;
        }
    }

    function addtoboardmatrix($id, $level, $parent, $board_no = 1) {

        $display_tree = "";


# GET POSITION IN MATRIX

        $this->MATRIX[$level][0]++;

        $column = $this->MATRIX[$level][0];


# SET MAXCOL AND MAXLEVEL

        if ($column > $this->MAX_COL) {
            $this->MAX_COL = $column;
        }

        if ($level > $this->MAX_LEVEL) {
            $this->MAX_LEVEL = $level;
        }



# RECURSIVITY AIRBAG

        if ($level > LEVEL) {
            return;
        }

        $query = $this->db->select("*")->where("id", $id)->limit(1)->get("auto_board_$board_no");

        foreach ($query->result() as $member) {

# ADD TO MATRIX
            $name = $member->user_name;

            $this->MATRIX[$level][$column]["id"] = $id;

            $this->MATRIX[$level][$column]["name"] = $member->user_name;

            $this->MATRIX[$level][$column]["parent"] = $parent;

            $this->MATRIX[$level][$column]["active"] = $member->active;

            $this->MATRIX[$level][$column]["position"] = $member->position;

            $this->MATRIX[$level][$column]["father_id"] = $member->father_id;



            for ($e = 0; $e < $level; $e++) {
                $display_tree.= "&nbsp;&nbsp;&nbsp;";
            }



# GET CHILDREN
            $this->db->select("id")->where("father_id", $id);
            $this->db->order_by("position", "asc");
            $query_ch = $this->db->get("auto_board_$board_no");
            foreach ($query_ch->result() as $member_ch) {
                $this->addtoboardmatrix($member_ch->id, $level + 1, $id,$board_no);
            }
        }
    }

    function balanceboardmatrix() {

# ASSIGN WEIGHT TO EACH PARENT

        for ($level = $this->MAX_LEVEL; $level >= 1; $level--) {

            for ($column = 1; $column <= $this->MAX_COL; $column++) {

                if ($level == $this->MAX_LEVEL) {

                    $this->MATRIX[$level][$column]["weight"] = 1;
                } else {

                    $weight = 0;

                    for ($col = 1; $col <= $this->MAX_COL; $col++) {

                        if ($this->MATRIX[$level + 1][$col]["parent"] == $this->MATRIX[$level][$column]["id"]) {

                            $weight = $weight + $this->MATRIX[$level + 1][$col]["weight"];
                        }
                    }

                    $this->MATRIX[$level][$column]["children"] = $weight;

                    if ($weight == 0) {
                        $weight = 1;
                    }

                    $this->MATRIX[$level][$column]["weight"] = $weight;
                }
            }
        }
# DEFINE X COORDINATES

        $this->MATRIX[1][1]["x"] = .5;

        $this->MATRIX[1][1]["width"] = 1;

        for ($level = 2; $level <= $this->MAX_LEVEL; $level++) {

            for ($column = 1; $column <= $this->MAX_COL; $column++) {

                if ($this->MATRIX[$level][$column]["id"]) {

                    $parentweight = 1;
                    $parentwidth = 1;
                    $parentx = 1;

                    for ($col = 1; $col <= $this->MAX_COL; $col++) {

                        if ($this->MATRIX[$level - 1][$col]["id"] == $this->MATRIX[$level][$column]["parent"]) {

                            $parentweight = $this->MATRIX[$level - 1][$col]["weight"];

                            $parentwidth = $this->MATRIX[$level - 1][$col]["width"];

                            $parentx = $this->MATRIX[$level - 1][$col]["x"];
                        }
                    }

                    $mywidth = ($this->MATRIX[$level][$column]["weight"] / $parentweight) * $parentwidth;

# IF I AM NOT THE FIRST CHILD, CALCULATE LEFT EDGE

                    if ($this->MATRIX[$level][$column - 1]["parent"] != $this->MATRIX[$level][$column]["parent"]) {

                        $myleftedge = $parentx - ($parentwidth / 2);
                    } else {

                        $myleftedge = $this->MATRIX[$level][$column - 1]["x"] +
                                ($this->MATRIX[$level][$column - 1]["width"] / 2);
                    }

                    $myx = $myleftedge + ($mywidth / 2);

                    $this->MATRIX[$level][$column]["width"] = $mywidth;

                    $this->MATRIX[$level][$column]["x"] = $myx;
                } else {

                    $column = 9999;
                }
            }
        }
    }

    function displayboardmatrix($user_id, $id, $board_no) {

        $this->set_config_board($id);
        $graphwidth = $this->GRAPH_WIDTH;
//global $boxwidth;
        $boxwidth = BOX_WIDTH;

//global $boxheight
        $boxheight = BOX_HIGHT;
//global $topmargin;
        $topmargin = TOP_MARGIN;
//global $leftmargin;
        $leftmargin = LEFT_MARGIN;
        $maxweight = $this->MATRIX[1][1]["weight"];

        $unit = $graphwidth / $maxweight;
        $display_tree = '<div id="summary" class="panel-body tree-container1" style="min-height:500px;"> ';
        $display_tree.='<div style=" margin-top:10px; position:absolute;"> ';

        for ($level = 1; $level <= $this->MAX_LEVEL; $level++) {

            for ($column = 1; $column <= $this->MAX_COL; $column++) {

# DRAW BOXES

                if ($this->MATRIX[$level][$column]["id"]) {

                    $id_encrypt = $this->getEncrypt($this->MATRIX[$level][$column]["id"]);
                    $ft_id = $this->getFtId($this->MATRIX[$level][$column]["id"]);
                    $referral_count = $this->getDirectReferalCount($this->MATRIX[$level][$column]["id"]);
                    $id_t = $this->MATRIX[$level][$column]["id"];

//print_r($referrals);
                    $referral_cnt = 'Referral Count:' . $referral_count;
// $referral_cnt = '';
                    $x = ($this->MATRIX[$level][$column]["x"] * $graphwidth) - ($boxwidth / 2 ) + $leftmargin;

                    $y = ($level * $boxheight) - $boxheight + $topmargin + 20;


                    $display_tree.= "<div align = 'center' style = 'position:absolute; top:$y; left:$x;

                padding:0px;

                height:" . ($boxheight - 20) . "px;width:$boxwidth;'><div id = \"member\">";

                    if ($this->MATRIX[$level][$column]["active"] == "no") {

                        $active = $this->get_active_status($this->MATRIX[$level][$column]["id"]);

                        if ($get_active_status == "yes") {

                            $display_tree.= "<img src='" . $this->TEMPLATE_APP_PATH . "images/freezed.gif' height='48px' width='48px' border='0' title='Account Freezed'/><br>";
                        } else {




                            $display_tree.= "<a href='#'  id='userlink" . $this->MATRIX[$level][$column]['id'] . "'><img src='" . $this->TEMPLATE_APP_PATH . "images/inac tive.png' title='Not Activated' height='48px' width='48px' border='0'  /><br>";
                        }
                    } elseif ($this->MATRIX[$level][$column]["active"] == "server") {
//$display_tree.= "<img src='" . $this->TEMPLATE_APP_PATH . "images/add.png' height='48px' width='48px' border='0' title='Add new member here...'/><br>";
                        $display_tree.= "<a href=\"" . base_url() . "register/user_register/{$id_encrypt}/" . $this->MATRIX[$level][$column]["position"] . "/" . $this->MATRIX[$level][$column]["father_id"] . "\" target=_parent><img src='" . $this->TEMPLATE_APP_PATH . "images/add.png' height='48px' width='48px' border='0' title='Add new member here...'/><br>";
                    } else {

                        $display_tree.= "<a href='#'   id='userlink" . $this->MATRIX[$level][$column]['id'] . "'><img src='" . $this->TEMPLATE_APP_PATH . "images/active.gif' height='48px' width='48px' border='0'  /><br>";
                    }
                    if ($this->MATRIX[$level][$column]["active"] != "server") {
                        $display_tree.= "<span style='height:auto;width:auto;float:left;margin:5px 0 0 15px;position:relative;'><b>";
                        $display_tree.= $this->MATRIX[$level][$column]["name"] . "</a></b></span><br>";

                        $display_tree.= "<div style='height:auto;width:100px;float:left;position:relative;color:#940909;font-weight:bold;margin:-63px 0px 0px 41px'>";
                        $display_tree.= "<div style='height:auto;width:100%;float:left;text-align:center'></div></div>";
                    } else {
//$display_tree.="ADD HERE" . "<br>";
                    }
//if ($this->MATRIX[$level][$column]["active"] != "server")
//$display_tree.= "[" . "<font color='#009900'>" . $this->MATRIX[$level][$column]["track_id"] . "</font>]";

                    $display_tree.= "</a></div>";

                    $display_tree.= "</div>";



# DRAW CONNECTING LINES

                    if ($this->MATRIX[$level][$column]["parent"] == $this->MATRIX[$level][$column - 1]["parent"]) {

                        if ($level > 1) {

# HORIZONTAL LINE

                            $prevx = ($this->MATRIX[$level][$column - 1]["x"] *
                                    $graphwidth) + $leftmargin;

                            $y2 = $y - 10;

                            $width = $x - $prevx + ($boxwidth / 2);

                            $display_tree.= "<div style='position:absolute; top:$y2;                            left:$prevx; border-top:1px solid #000; width:$width ;                      height:0px'>&nbsp;</div>";
                        }
                    }



# VERTICAL LINE (TOP)

                    if ($level > 1) {

                        $x = ($this->MATRIX[$level][$column]["x"] * $graphwidth) + $leftmargin;

                        $y2 = $y - 10;

                        $display_tree.= "<div style='position:absolute; top:$y2; left:$x;

                    border-left:1px solid #000; width:0px;height:10px'>&nbsp;</div>";
                    }

# VERTICAL LINE (BOTTOM)

                    if ($level < $this->MAX_LEVEL && $this->MATRIX[$level][$column]["children"]) {

                        $x = ($this->MATRIX[$level][$column]["x"] * $graphwidth) + $leftmargin;

                        $y2 = $y + $boxheight - 20 + 1;

                        $display_tree.= "<div style='position:absolute; top:$y2; left:$x;

                    border-left:1px solid #000; width:0px;height:10px'>&nbsp;</div>";
                    }



# "REDRAW" ICON

                    if ($level == 1) {
                        $userid = $this->MATRIX[$level][$column]["id"];
//$qry = "SELECT father_id FROM 23_ft_individual WHERE id='$userid' LIMIT 1";
                        $qry = "SELECT father_id FROM auto_board_$board_no WHERE id='$userid' LIMIT 1";
                        $query_parent = $this->db->select("father_id")->where("id", $user_id)->limit(1)->get("auto_board_1");
                        $row = $query_parent->row_array();
                        $root = $row["father_id"];

                        if ($user_id > $root)        // BY ASHOK
                            $root = $this->MATRIX[$level][$column]["id"];
                    } else {

                        $root = $this->MATRIX[$level][$column]["id"];
                    }

                    if ($root) {

                        $x = ($this->MATRIX[$level][$column]["x"] * $graphwidth) - 8 + $leftmargin;

//$url_encrypted_id = $this->getEncrypt($root);


                        if (($this->MATRIX[$level][$column]["active"] != "server") and $this->MATRIX[$level][$column]["id"] != "12345") {

                            $display_tree.= "<div title='UP' style='position:absolute; top:" . ($y - 9) . "; left:$x;

                    border:0px solid #000;  '><img src='" . $this->TEMPLATE_APP_PATH . "images/up.png' height='16px' width='16px' border='0' /></div>\n";
                        }
                    }
                }
            }
        }
        $display_tree.="</div>";
        $display_tree.="</div>";
        return $display_tree;
    }
    

    function set_config_board($id) {
// $user_arr = $this->obj_tree->getDownlineUsers($id, 3);
//$max_level_count = $this->obj_tree->getMaxLevelCount($user_arr);
        $max_level_count = 8;
        $this->GRAPH_WIDTH = ($max_level_count) * 125;

        if ($this->GRAPH_WIDTH < 850) {
            $this->GRAPH_WIDTH = 900;
        }
    }

    public function getFtId($user_id) {

        $qr = "SELECT user_ref_id FROM auto_board_1 WHERE id = '$user_id'";
        $res = $this->db->select("user_ref_id")->where("id", $user_id)->get("auto_board_1");

        foreach ($res->result() AS $row)
            return $row->user_ref_id;
    }

    public function getDirectReferalCount($user_id) {
        $refer_count = 0;
        $qr = "SELECT  referral_count FROM  board_referral_count  WHERE  board_id='$user_id' ";
        $qry = $this->db->select("referral_count")->where("board_id", $user_id)->get("board_referral_count");

        foreach ($qry->result_array() AS $row) {
            $refer_count = $row['referral_count'];
        }
        return $refer_count;
    }

}