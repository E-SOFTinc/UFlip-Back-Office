<?php

require_once 'Inf_Model.php';

class cleanup_model extends Inf_Model {

    public function clean($mlm_plan) {
        require_once 'registersubmit.php';
        $obj_reg = new registersubmit();
        require_once 'validation.php';
        $obj_val = new validation();
        require_once 'board_registersubmit.php';
        $obj_board = new board_registersubmit();

        $session_data = $this->session->userdata('logged_in');
        $admin_pass = $obj_val->getAdminPassword();

        $admin_id = $obj_val->getAdminId();
        $details = $this->getUserDetail($admin_id); //to get details of admin
        //$logged_user_id = $details['user_detail_refid'];
        $logged_user_id = 12345;

        $table_prefix = $session_data['table_prefix'];
        $user_name = $session_data['user_name'];

        $this->begin();
        $res1 = $this->db->truncate('amount_paid');
        $res2 = $this->db->truncate('complaint_query_table');
        $res3 = $this->db->truncate('complaint_ticket_table');
        $res4 = $this->db->truncate('events');
        $res5 = $this->db->truncate('feedback');
        $res6 = $this->db->truncate('ft_individual');
        $res7 = $this->db->truncate('ft_individual_unilevel');
        $res8 = $this->db->truncate('fund_transfer_details');
        $res9 = $this->db->truncate('investment');
        $res10 = $this->db->truncate('leg_amount');
        $res11 = $this->db->truncate('leg_carry_forward');
        $res12 = $this->db->truncate('login_user');
        $res13 = $this->db->truncate('mailtoadmin');
        $res14 = $this->db->truncate('mailtouser');
        $res15 = $this->db->truncate('news');
        $res16 = $this->db->truncate('password_reset_table');
        $res17 = $this->db->truncate('pin_numbers');
        $res18 = $this->db->truncate('pin_request');
        $res19 = $this->db->truncate('payout_release_requests');
        $res20 = $this->db->truncate('sms_history');
        $res21 = $this->db->truncate('tran_password');
        $res22 = $this->db->truncate('user_balance_amount');
        $res23 = $this->db->truncate('user_details');
        $res24 = $this->db->truncate('leg_details');
        $res25 = $this->db->truncate('product_image_table');
        $res26 = $this->db->truncate('rank_history');
        $res27 = $this->db->truncate('sales_order');
        $res28 = $this->db->truncate('activity_history');
        $res29 = $this->db->truncate('live_account_registration_details');
        $res30 = $this->db->truncate('credit_card_purchase_details');
        $res31 = $this->db->truncate('pin_used');
        $res31 = $this->db->truncate('username_change_history');
        $res61 = $this->db->truncate('payment_registration_details');
        $res62 = $this->db->truncate('authorize_payment_details');
        $res63 = $this->db->truncate('employee_details');
        $res64 = $this->db->truncate('login_employee');
        $res65 = $this->db->truncate('cron_history');
        $res66 = $this->db->truncate('exact_payment_history');
        $res66 = $this->db->truncate('cookie_user');

        $login_user = $this->table_prefix . "login_user";
        $set_auto_increment_login_user = "ALTER TABLE $login_user AUTO_INCREMENT=$logged_user_id";
        $res32 = $this->db->query($set_auto_increment_login_user);

        $ft_individual = $this->table_prefix . "ft_individual";
        $set_auto_increment_ft_individual = "ALTER TABLE $ft_individual AUTO_INCREMENT=$logged_user_id";
        $res33 = $this->db->query($set_auto_increment_ft_individual);


        $login_data = array(
            'user_id' => $logged_user_id,
            'user_type' => 'admin',
            'addedby' => 'code',
            'user_name' => $user_name,
            'password' => $admin_pass
        );
        $res37 = $this->db->insert('login_user', $login_data);



        $current_date = date("Y-m-d H:i:s");
        $ft_details = array(
            'id' => $logged_user_id,
            'father_id' => '0',
            'position' => '',
            'user_name' => $user_name,
            'active' => 'yes',
            'date_of_joining' => $current_date,
            'product_id' => '1'
        );
        $res38 = $this->db->insert('ft_individual', $ft_details);

        $ft_details_ul = array(
            'id' => $logged_user_id,
            'father_id' => '0',
            'position' => '0',
            'user_name' => $user_name,
            'active' => 'yes',
            'date_of_joining' => $current_date,
            'product_id' => '1'
        );
        $res39 = $this->db->insert('ft_individual_unilevel', $ft_details_ul);

        $leg_details = array(
            'id' => $logged_user_id
        );
        $res40 = $this->db->insert('leg_details', $leg_details);
///////////////////code added by amrutha
        $date = date("Y-m-d H:i:s");


        $user_details = array(
            'user_detail_refid' => $logged_user_id,
            'user_detail_name' => $details['user_detail_name'],
            'user_detail_address' => $details['user_detail_address'],
            'user_detail_town' => $details['user_detail_town'],
            'user_detail_country' => $details['user_detail_country'],
            'user_detail_state' => $details['user_detail_state'],
            'user_detail_pin' => $details['user_detail_pin'],
            'user_detail_passcode' => $details['user_detail_passcode'],
            'user_detail_mobile' => $details['user_detail_mobile'],
            'user_detail_land' => $details['user_detail_land'],
            'user_detail_email' => $details['user_detail_email'],
            'user_detail_dob' => $details['user_detail_dob'],
            'user_detail_gender' => $details['user_detail_gender'],
            'user_detail_nominee' => $details['user_detail_nominee'],
            'user_detail_relation' => $details['user_detail_relation'],
            'user_detail_acnumber' => $details['user_detail_acnumber'],
            'user_detail_nbank' => $details['user_detail_nbank'],
            'user_photo' => $details['user_photo'],
            'join_date' => $date,
            'user_detail_nbranch' => $details['user_detail_nbranch']
        );

        $res41 = $this->db->insert('user_details', $user_details);
       

        $this->db->select_max('user_id', 'user_id');
        $this->db->from('login_user');
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $get_id = $row->user_id;
        }
        if ($mlm_plan == 'Board'){
            
             $res42 = $obj_board->tmpInsert($get_id, "1");
        }
        else {
            $res42 = $obj_reg->tmpInsert($get_id, "L");
            $res43 = $obj_reg->tmpInsert($get_id, "R");
        }
        $user_balance_details = array(
            'user_id' => $get_id,
            'balance_amount' => '0'
        );
        $res44 = $this->db->insert('user_balance_amount', $user_balance_details);

        $tran_password_details = array(
            'user_id' => $logged_user_id,
            'tran_password' => '12345678'
        );
        $res45 = $this->db->insert('tran_password', $tran_password_details);

        if ($mlm_plan == "Board") {
            /////////////////////////////////////////////////////////////for board  plan
            $res46 = $this->db->truncate("board_split_status");
            $res47 = $this->db->truncate("board_user_detail");
            $res48 = $this->db->truncate("auto_board_1");

            $res49 = $this->db->truncate("board_view");
            $res50 = $this->db->truncate("board_referral_count");

            $auto_board = $this->table_prefix . "auto_board_1";
            $set_auto_increment_auto_board = "ALTER TABLE $auto_board AUTO_INCREMENT=$logged_user_id";
            $res51 = $this->db->query($set_auto_increment_auto_board);


            $board_split_status = $this->table_prefix . "board_split_status";
            $set_auto_increment_board_split_status = "ALTER TABLE $board_split_status AUTO_INCREMENT=1";
            $res52 = $this->db->query($set_auto_increment_board_split_status);

            $board_user_detail = $this->table_prefix . "board_user_detail";
            $set_auto_increment_board_user_detail = "ALTER TABLE $board_user_detail AUTO_INCREMENT=1";
            $res53 = $this->db->query($set_auto_increment_board_user_detail);

            $board_view = $this->table_prefix . "board_view";
            $set_auto_increment_board_view = "ALTER TABLE $board_view AUTO_INCREMENT = 1";
            $res54 = $this->db->query($set_auto_increment_board_view);

            $board_view = $this->table_prefix . "board_referral_count";
            $set_auto_increment_board_referral_count = "ALTER TABLE $board_view AUTO_INCREMENT = 1";
            $res55 = $this->db->query($set_auto_increment_board_referral_count);

            $board_user_details = array(
                "board_table_name" => '1',
                "user_id" => $logged_user_id,
                "board_serial_no" => '1',
                "date_of_join" => $date
            );
            $res56 = $this->db->insert('board_user_detail', $board_user_details);


            $board_split_status_det = array(
                "user_ref_id" => $logged_user_id,
                "board_number" => '1',
                "status" => 'no',
                "date_of_update" => $date
            );
            $res57 = $this->db->insert('board_split_status', $board_split_status_det);

            $auto_board_det = array(
                "user_ref_id" => $logged_user_id,
                "user_name" => $user_name,
                "position" => '',
                "active" => 'yes',
                "father_id" => '0',
                "date_of_joining" => $date,
                "user_level" => '0'
            );
            $res58 = $this->db->insert('auto_board_1', $auto_board_det);


            $board_view_det = array(
                "board_top_id" => $logged_user_id,
                "board_table_name" => '1',
                "board_no" => '1',
                "board_split_status" => 'no',
                "date_of_join" => $date
            );
            $res59 = $this->db->insert('board_view', $board_view_det);


            $board_referral_count_det = array(
                "board_id" => $logged_user_id,
                "user_ref_id" => $logged_user_id,
                "referral_count" => '0'
            );
            $res60 = $this->db->insert('board_referral_count', $board_referral_count_det);

            /* ///////////////////////////////if auto_board_2 exists
              $res61 = $this->db->truncate("auto_board_2");

              $auto_board2 = $this->table_prefix . "auto_board_2";
              $set_auto_increment_auto_board = "ALTER TABLE $auto_board2 AUTO_INCREMENT=$logged_user_id";
              $res62 = $this->db->query($set_auto_increment_auto_board);

              $board_user_details = array(
              "board_table_name" => '2',
              "user_id" => $logged_user_id,
              "board_serial_no" => '1',
              "date_of_join" => $date
              );
              $res63 = $this->db->insert('board_user_detail', $board_user_details);

              $auto_board_det = array(
              "user_ref_id" => $logged_user_id,
              "user_name" => $user_name,
              "position" => '',
              "active" => 'yes',
              "father_id" => '0',
              "date_of_joining" => $date,
              "user_level" => '0'
              );
              $res64 = $this->db->insert('auto_board_2', $auto_board_det);

              $board_view_det = array(
              "board_top_id" => $logged_user_id,
              "board_table_name" => '2',
              "board_no" => '1',
              "board_split_status" => 'no',
              "date_of_join" => $date
              );
              $res65 = $this->db->insert('board_view', $board_view_det); */

            ////////////////////////////////////////////////////
        }
        if ($res45)
            $this->commit();
        else
            $this->rollBack();
        return $res45;
    }

////// code added by amrutha
    function getUserDetail($id) {
        $details = array();
        $user_details = $this->table_prefix . "user_details";
        $this->db->select("*");
        $this->db->from($user_details);
        $this->db->where('user_detail_refid', $id);
        $res = $this->db->get();
        foreach ($res->result() as $row) {
            $details['user_detail_refid'] = $row->user_detail_refid;
            $details['user_detail_name'] = $row->user_detail_name;
            $details['user_detail_address'] = $row->user_detail_address;
            $details['user_detail_town'] = $row->user_detail_town;
            $details['user_detail_country'] = $row->user_detail_country;
            $details['user_detail_state'] = $row->user_detail_state;
            $details['user_detail_district'] = $row->user_detail_district;
            $details['user_detail_pin'] = $row->user_detail_pin;
            $details['user_detail_passcode'] = $row->user_detail_passcode;
            $details['user_detail_mobile'] = $row->user_detail_mobile;
            $details['user_detail_land'] = $row->user_detail_land;
            $details['user_detail_email'] = $row->user_detail_email;
            $details['user_detail_dob'] = $row->user_detail_dob;
            $details['user_detail_gender'] = $row->user_detail_gender;
            $details['user_detail_nominee'] = $row->user_detail_nominee;
            $details['user_detail_relation'] = $row->user_detail_relation;
            $details['user_detail_acnumber'] = $row->user_detail_acnumber;
            $details['user_detail_nbank'] = $row->user_detail_nbank;
            $details['join_date'] = $row->join_date;
            $details['user_photo'] = $row->user_photo;
            $details['user_detail_nbranch'] = $row->user_detail_nbranch;
        }
        return $details;
    }

}
