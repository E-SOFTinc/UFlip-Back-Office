<?php
/*
 * You can modify this class
 */

/**
 * Description of MailBox Class
  Contain the fuctions for implimeting Mailbox
 *
 * @author Abdul Gafoor
  COO Of IOSS
  www.ioss.in
 */
class ProfileClass extends Inf_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUserDeatail($qr) {
        $this->user_detail_arr = $this->obj_tool_tip->getUserDetails($qr);

        return $this->user_detail_arr;
    }

    public function searchMember($keyword, $page, $limit) {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $this->db->select("lu.*,fi.*,ud.*");
        $this->db->from("login_user as lu");
        $this->db->join("ft_individual as fi", "lu.user_id = fi.id", "INNER");
        $this->db->join("user_details as ud", "lu.user_id = ud.user_detail_refid", "INNER");
        $where = "lu.user_name LIKE '$keyword%'  OR  ud.user_detail_name LIKE '$keyword%' OR
          ud.user_detail_address LIKE '$keyword%' OR ud.user_detail_town LIKE '$keyword%' OR
          ud.user_detail_mobile LIKE '$keyword%' OR  ud.user_detail_nominee LIKE '$keyword%'";
        $this->db->where($where);
        $this->db->order_by("lu.user_id");
        $this->db->limit($limit, $page);
        $search_all = $this->db->get();

        //echo $this->db->last_query();
        $cnt = $search_all->num_rows();
        $this->search_user = null;
        if ($cnt > 0) {
            $i = 0;

            foreach ($search_all->result_array() as $row_search) {

                $this->search_user["detail$i"]["user_id"] = $row_search['user_id'];
                //$this->search_user["detail$i"]["user_id_en"] =urlencode($this->encrypt->encode($row_search['user_name'])) ;
                $id_encode = $this->encrypt->encode($row_search['user_name']);
                $id_encode = str_replace("/", "_", $id_encode);
                $encrypt_id = urlencode($id_encode);
                $this->search_user["detail$i"]["user_id_en"] = $encrypt_id;

                $this->search_user["detail$i"]["user_name"] = $row_search['user_name'];
                $this->search_user["detail$i"]["active"] = $row_search['active'];
                $this->search_user["detail$i"]["father_id"] = $row_search['father_id'];
                $this->search_user["detail$i"]["user_detail_name"] = $row_search['user_detail_name'];
                if ($row_search['user_detail_address'] != "")
                    $this->search_user["detail$i"]["user_detail_address"] = $row_search['user_detail_address'];
                else
                    $this->search_user["detail$i"]["user_detail_address"] = "NA";
                if ($row_search['user_detail_mobile'])
                    $this->search_user["detail$i"]["user_detail_mobile"] = $row_search['user_detail_mobile'];
                else
                    $this->search_user["detail$i"]["user_detail_mobile"] = "NA";
                if ($row_search['user_detail_town'] != "")
                    $this->search_user["detail$i"]["user_detail_town"] = $row_search['user_detail_town'];
                else
                    $this->search_user["detail$i"]["user_detail_town"] = "NA";
                if ($row_search['user_detail_nominee'])
                    $this->search_user["detail$i"]["user_detail_nominee"] = $row_search['user_detail_nominee'];
                else
                    $this->search_user["detail$i"]["user_detail_nominee"] = "NA";
                if ($row_search['user_detail_country'])
                    $this->search_user["detail$i"]["user_detail_country"] = $row_search['user_detail_country'];
                else
                    $this->search_user["detail$i"]["user_detail_country"] = "NA";
                $this->search_user["detail$i"]["date_of_joining"] = $row_search['date_of_joining'];
                $i++;
            }
        }
        //print_r($this->search_user);
        return $this->search_user;
    }

    public function getCountMembers($keyword) {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////

        $this->db->select("lu.*,fi.*,ud.*");
        $this->db->from("login_user as lu");
        $this->db->join("ft_individual as fi", "lu.user_id = fi.id", "INNER");
        $this->db->join("user_details as ud", "lu.user_id = ud.user_detail_refid", "INNER");
        $where = "lu.user_name LIKE '$keyword%'  OR  ud.user_detail_name LIKE '$keyword%' OR
          ud.user_detail_address LIKE '$keyword%' OR ud.user_detail_town LIKE '$keyword%' OR
          ud.user_detail_mobile LIKE '$keyword%' OR  ud.user_detail_nominee LIKE '$keyword%'";
        $this->db->where($where);
        $count = $this->db->count_all_results();

        return $count;
    }

    public function blockMember($user_id, $status) {

        /////////////////////  CODE EDITED BY JIJI  //////////////////////////
        $this->begin();
        $this->db->where('id', $user_id);
        $res = $this->db->update('ft_individual', array('active' => $status));
        // echo "<br/>qry" . $this->db->last_query();
        //$qr = "UPDATE $ft_individual SET active='$status' WHERE id ='$user_id'";
        $this->db->where('id', $user_id);
        $res1 = $this->db->update('ft_individual_unilevel', array('active' => $status));

        if ($res && $res1){
            $this->commit();
            return true;
        }else{
            $this->rollBack();
            return false;
        }
    }

    public function searchMemberPage($keyword) {
        if ($this->table_prefix == "") {
            $this->table_prefix = $_SESSION['table_prefix'];
        }
        $login_user = $this->table_prefix . "login_user";
        $ft_individual = $this->table_prefix . "ft_individual";
        $user_details = $this->table_prefix . "user_details";
        $searchpage = "select lu.*,fi.*,ud.* from $login_user as lu inner join $ft_individual as fi on lu.user_id = fi.id inner join $user_details as ud on lu.user_id = ud.user_detail_refid where lu.user_name LIKE '$keyword%'  OR  ud.user_detail_name LIKE '$keyword%' OR ud.user_detail_address LIKE '$keyword%' OR ud.user_detail_town LIKE '$keyword%' OR ud.user_detail_mobile LIKE '$keyword%' OR  ud.user_detail_nominee LIKE '$keyword%'  Order by lu.user_id";

        $search_my_page = $this->selectData($searchpage);
        $cnt = mysql_num_rows($search_my_page);

        return $cnt;
    }

    public function getUserStatus($id) {
        $user_statue = $this->obj_tool_tip->getStatus($id);

        return $user_statue;
    }

    public function dispalyProfileSearchDiv($form_action = '', $div_heading = '', $target = "") {
        ?>
        <div class="box">
            <p class="highlight"><h4><?php $div_heading ?></h4><br />
            <form   name="searchform" action="<?php echo $form_action ?>" method="post" method="post" target="<? echo $target ?>" >
                <table  border="0"  align=''>
                    <tr ><td>Select User Name</td>
                        <td ><input type="text" id="user_name" name="user_name"  onKeyUp="ajax_showOptions(this, 'getCountriesByLetters', 'no', event)" autocomplete="Off" ></td>
                        <td><input type="submit" name="profile_update" value="Submit" class="submit" /></td></tr>
                </table><br />
            </form>
        </div>
        <?php
    }

}
