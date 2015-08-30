<?php

require_once 'Inf_Controller.php';

class Menus extends Inf_Controller {

    function __construct() {
        parent::__construct();
    }

    function add_menu_item() {
        $this->ARR_SCRIPT[0]["name"] = "validate_menu_item.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $menu_arr = array();
        if ($this->input->post('submit')) {

            //======code edited by Aparna=========//
            $this->load->library('upload');
            $user_file_name = "";
            $document3 = $_FILES['userfile']['name'];
            $userfile = 'userfile';
            $post = $this->input->post();
            if ($_FILES['userfile']['error'] != 4) {

                $config['upload_path'] = './public_html/images/menuitems/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';

                $this->upload->initialize($config);
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($userfile)) {

                    $error = array('error' => $this->upload->display_errors());
                    $msg = $this->lang->line('image_not_selected');
                    $this->redirect($msg, "menus/add_menu_item", FALSE);
                    $post['logo_name'] = "";
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $post['logo_name'] = $data['upload_data']['file_name'];
                }
            }
            if (empty($_FILES["userfile"]["name"])) {
                $post["logo_name"] = "";
            }
            //=========code ends============//
            $res = $this->menus_model->addMainMenuItem($post);
            if ($res) {
                $msg = $this->lang->line('add_menu_item_added');

                $this->redirect($msg, "menus/add_menu_item", TRUE);
            } else {
                $msg = $this->lang->line('add_menu_item_cannot_be_added');
                $this->redirect($msg, "menus/add_menu_item", FALSE);
            }
        }
        if ($this->input->post('update')) {
            $post = $this->input->post();
            $total_count = $menu_arr['total_count'] = $this->input->post('total_count');
            for ($i = 0; $i < $total_count; $i++) {
                $key = "userfile$i";
                $key1 = "active$i";
                if (array_key_exists($key, $_FILES) && array_key_exists($key1, $post)) {
                    $flag = 0;

                    if ($_FILES["userfile$i"]["error"] != 4) {
                        $config['upload_path'] = './public_html/images/menuitems/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = '2000000';
                        $config['max_width'] = '1024';
                        $config['max_height'] = '768';
                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload("userfile$i")) {

                            $error = array('error' => $this->upload->display_errors());
                            $msg = $this->lang->line('image_not_selected');
                            $this->redirect($msg, "menus/add_menu_item", FALSE);
                        } else {
                            $data = array('upload_data' => $this->upload->data());
                            $post["logo_name$i"] = $data['upload_data']['file_name'];
                            $flag = 1;
                        }
                    }
                }
            }

            $res = $this->menus_model->updateMainMenuItem($menu_arr, $post, $flag);

            if ($res) {
                $msg = $this->lang->line('add_menu_update');
                $this->redirect($msg, "menus/add_menu_item", TRUE);
            } else {
                $msg = $this->lang->line('add_menu_cannot_update');
                $this->redirect($msg, "menus/add_menu_item", FALSE);
            }
        }
        $this->setScripts();
        $menu_item = $this->menus_model->getMainMenuItems();
        $len = count($menu_item);
        $title = $this->lang->line('Main_Menu');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->set("menu_item", $menu_item);
        $this->set("len", $len);

        //for language translation///
        $this->set("tran_menu_name", $this->lang->line('menu_name'));
        $this->set("tran_link", $this->lang->line('link'));
        $this->set("tran_admin", $this->lang->line('admin'));
        $this->set("tran_user", $this->lang->line('user'));
        $this->set("tran_icon", $this->lang->line('icon'));
        $this->set("tran_add_item", $this->lang->line('add_item'));
        $this->set("tran_add_one_item", $this->lang->line('add_one_item'));
        $this->set("tran_menu_link", $this->lang->line('menu_link'));
        $this->set("tran_menu_text", $this->lang->line('menu_text'));
        $this->set("tran_target", $this->lang->line('target'));
        $this->set("tran_permision_admin", $this->lang->line('permision_admin'));
        $this->set("tran_permision_emp", $this->lang->line('permision_emp'));
        $this->set("tran_permision_user", $this->lang->line('permision_user'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_select_one", $this->lang->line('select_one'));
        $this->set("tran_add_menu_item", $this->lang->line('add_menu_item'));
        $this->set("tran_you_must_select_a_link", $this->lang->line('you_must_select_a_link'));
        $this->set("tran_you_must_enter_the_text", $this->lang->line('you_must_enter_the_text'));
        $this->set("tran_you_must_select_one_option", $this->lang->line('you_must_select_one_option'));
        $this->set("page_top_header", $this->lang->line('add_menu_item'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('add_menu_item'));
        $this->set("page_small_header", "");

        $this->setView();
    }

    function add_sub_menu_item() {
        $this->ARR_SCRIPT[0]["name"] = "validate_menu_item.js";
        $this->ARR_SCRIPT[0]["type"] = "js";
        $menu_arr = array();
        if ($this->input->post('submit')) {
            //======code edited by Aparna=========//
            $this->load->library('upload');
            $user_file_name = "";
            $document3 = $_FILES['userfile']['name'];
            $userfile = 'userfile';
            $post = $this->input->post();
            if ($_FILES['userfile']['error'] != 4) {

                $config['upload_path'] = './public_html/images/submenuitems/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';

                $this->upload->initialize($config);
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload($userfile)) {

                    $error = array('error' => $this->upload->display_errors());
                    $msg = $this->lang->line('image_not_selected');
                    $this->redirect($msg, "menus/add_menu_item", FALSE);
                    $post['logo_name'] = "";
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $post['logo_name'] = $data['upload_data']['file_name'];
                }
            }
            if (empty($_FILES["userfile"]["name"])) {
                $post["logo_name"] = "";
            }
            //=========code ends============//
            $res = $this->menus_model->addSubMenuItem($post);
            if ($res) {
                $msg = $this->lang->line('sub_menu_item_added');
                $this->redirect($msg, "menus/add_sub_menu_item", TRUE);
            } else {
                $msg = $this->lang->line('sub_menu_item_cannot_added');
                $this->redirect($msg, "menus/add_sub_menu_item", FALSE);
            }
        }


        if ($this->input->post('update')) {

            $post = $this->input->post();
            $total_count = $menu_arr['total_count'] = $this->input->post('total_count');
            for ($i = 0; $i < $total_count; $i++) {
                $key = "userfile$i";
                $key1 = "active$i";
                if (array_key_exists($key1, $post)) {
                    if (array_key_exists($key, $_FILES)) {
                        $this->load->library('upload');
                        if ($_FILES["userfile$i"]["error"] != 4) {

                            $config['upload_path'] = './public_html/images/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg';
                            $config['max_size'] = '2000000';
                            $config['max_width'] = '1024';
                            $config['max_height'] = '768';

                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);

                            if (!$this->upload->do_upload("userfile$i")) {

                                $error = array('error' => $this->upload->display_errors());
                                $msg = $this->lang->line('image_not_selected');
                                $this->redirect($msg, "menus/add_menu_item", FALSE);
                                $post["logo_name$i"] = $this->input->post("current_image$i");
                            } else {
                                $data = array('upload_data' => $this->upload->data());
                                $post["logo_name$i"] = $data['upload_data']['file_name'];
                            }
                        }
                    }

                    if (empty($_FILES["userfile$i"]["name"])) {
                        $post["logo_name$i"] = $this->input->post("current_image$i");
                    }
                }
            }


            $res = $this->menus_model->updateSubMenuItem($menu_arr, $post);
            if ($res) {
                $msg = $this->lang->line('add_menu_update');
                $this->redirect($msg, "menus/add_sub_menu_item", TRUE);
            } else {
                $msg = $this->lang->line('add_menu_cannot_update');
                $this->redirect($msg, "menus/add_sub_menu_item", FALSE);
            }
        }
        $menu_item = $this->menus_model->getSubMenuItems();
        $main_menu_item = $this->menus_model->getMainMenuItems();
        $new_menu_item = $this->menus_model->getAvailableMainMenuItems('Dashboard', 'Logout');
        $title = $this->lang->line('Sub_Menu');
        $this->set("title", $this->COMPANY_NAME . " | $title");
        $this->set("menu_item", $menu_item);
        $this->set("new_menu_item", $new_menu_item);
        $this->set("main_menu_item", $main_menu_item);
        $this->setScripts();

        //for language translation///
        $this->set("tran_menu_name", $this->lang->line('menu_name'));
        $this->set("tran_link", $this->lang->line('link'));
        $this->set("tran_admin", $this->lang->line('admin'));
        $this->set("tran_user", $this->lang->line('user'));
        $this->set("tran_icon", $this->lang->line('icon'));
        $this->set("tran_add_item", $this->lang->line('add_item'));
        $this->set("tran_add_one_item", $this->lang->line('add_one_item'));
        $this->set("tran_menu_link", $this->lang->line('menu_link'));
        $this->set("tran_menu_text", $this->lang->line('menu_text'));
        $this->set("tran_target", $this->lang->line('target'));
        $this->set("tran_permision_admin", $this->lang->line('permision_admin'));
        $this->set("tran_permision_emp", $this->lang->line('permision_emp'));
        $this->set("tran_permision_user", $this->lang->line('permision_user'));
        $this->set("tran_icon", $this->lang->line('icon'));
        $this->set("tran_submit", $this->lang->line('submit'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_update", $this->lang->line('update'));
        $this->set("tran_select_one", $this->lang->line('select_one'));
        $this->set("tran_add_sub_menu_item", $this->lang->line('add_sub_menu_item'));
        $this->set("tran_you_must_select_a_link", $this->lang->line('you_must_select_a_link'));
        $this->set("tran_you_must_enter_the_text", $this->lang->line('you_must_enter_the_text'));
        $this->set("tran_you_must_select_one_option", $this->lang->line('you_must_select_one_option'));
        $this->set("page_top_header", $this->lang->line('add_sub_menu_item'));
        $this->set("page_top_small_header", "");
        $this->set("page_header", $this->lang->line('add_sub_menu_item'));
        $this->set("page_small_header", "");

        $this->setView();
    }

}

?>