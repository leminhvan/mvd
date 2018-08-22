<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller menu
 * @created on : Tuesday, 06-Feb-2018 05:42:16
 * @author Le Minh Van
 * Copyright 2018
 */

class Sys_menu extends CI_Controller
{
  
    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('menu_model');
        $this->load->library('counter_visitor_online');
        $this->load->library(array('form_validation'));
        $this->load->helper(array('notify_helper'));
        $this->lang->load('menu');

        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }
        $this->counter_visitor_online->UsersOnline();
    }
   
    /**
    * List all data menu
    *
    */
    public function index() {
        if($this->menu->check_phanquyen("menu_1")){
            $temp       = $this->menu_model->get_all();
            $this->data['menus'] = array();

            foreach ($temp  as $key => $value) {
                if ($value['menu_parent_id'] == 0) {
                    $value['menu_parent_id'] = 'GỐC';
                }
                //
                foreach ($temp as $key1 => $value1) {
                    if ($value['menu_parent_id'] == $value1['menu_id']) {
                        $value['menu_parent_id'] = $value1['menu_title'];
                    }
                }
                //hien thi trang thai da dat mua
                array_push($this->data['menus'], $value);
            }  
            $groups        = $this->ion_auth->groups()->result_array();
            $this->data['groups']        = $groups;

           
            $this->template->js_add('var csrfName = "'.$this->security->get_csrf_token_name().'";
                                    var csrfHash = "'.$this->security->get_csrf_hash().'";
                                    function ajax_action(id, action) {
                                        var data ={"id": id, "action": action}; data[csrfName] = csrfHash;
                                        var agrs = {
                                            url : "sys_menu/ajax_action", // gửi ajax đến file result.php
                                            type : "post", // chọn phương thức gửi là post
                                            dataType:"json", // dữ liệu trả về dạng text
                                            data : data,
                                            success : function (result){
                                                if(result.csrfName){ csrfName = result.csrfName; csrfHash = result.csrfHash;}
                                                if(result.data == 1 && result.action == "del"){
                                                    $("#data_id_"+id).remove();
                                                    swal({   
                                                        title: "Đã xóa!",   
                                                        timer: 2000,   
                                                        type: "success", 
                                                    });   
                                                }
                                                if(result.data == 0 && result.action == "del"){
                                                    swal("Lỗi", result.data, "error"); 
                                                }
                                                
                                                if(result.action == "detail"){
                                                    var group = '.json_encode($this->data['groups']).'
                                                    var re = result.data;
                                                    var tempalte = "";
                                                    $.each(re ,function(key, val){console.log(key)
                                                        if(key != "menu_id"){
                                                            tempalte += "<tr>";
                                                            tempalte +=      "<td width=\'120\' class=\'font-weight-bold\'>" +  get_title(key) + "</td>";
                                                            tempalte +=      "<td > " + val +"</td>";
                                                            tempalte += "</tr>";
                                                        }
                                                        
                                                    });
                                                    $(".result").html(tempalte);
                                                }  
                                            }
                                        };
                                        // Truyền object vào để gọi ajax
                                        $.ajax(agrs);

                                        function get_title(key){
                                            var title_name = ["Tiêu đề menu", "Menu gốc", "Đường dẫn", "Vị trí", "Icon", "Tên module"];
                                            var title_key = ["menu_title", "menu_parent_id", "menu_url", "menu_index", "menu_icon", "module_name"];
                                            var index = $.inArray(key , title_key);
                                            return title_name[index];
                                        }
                                    }', "embed");
            
            if($this->session->flashdata('notify') != NULL){
                $this->template->js_add("notify('".$this->session->flashdata('notify')['message']."', '".$this->session->flashdata('notify')['type']."');",'embed');
            }
            $this->template->load('index', 'menu/view',$this->data);
            unset( $temp);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('dashboard');
        }
    }

    

    /**
    * Call Form to Add  New menu
    *
    */
    public function add() {

        if($this->menu->check_phanquyen("menu_2")){
            $temp = $this->menu_model->get_all();
            $parent = array(0 => 'MENU GỐC');
            $groups        = $this->ion_auth->groups()->result_array();

            foreach ($temp as $key => $value) {
               if($value['menu_parent_id'] == 0){
                    $parent[$value['menu_id'] ] = $value['menu_title'];
               }
            }

            $this->data['parent_menu']       = $parent;
            $this->data['menu']          = $this->menu_model->add();
            $this->data['action']            = 'hethong/sys_menu/save';
            $this->data['groups']        = $groups;
            
            //them js va css
             $this->template->js_add('$("#menu_parent_id").on("click", function(){
             								var id = $("#menu_parent_id").val();
             								ajax_action(id, "get_vitri");
						             });','embed');  
             $this->template->js_add('var csrfName = "'.$this->security->get_csrf_token_name().'";
                                    var csrfHash = "'.$this->security->get_csrf_hash().'";
                                    function ajax_action(id, action) {
                                        var data ={"id": id, "action": action}; data[csrfName] = csrfHash;
                                        var agrs = {
                                            url : "'.base_url().'hethong/sys_menu/ajax_action", // gửi ajax đến file result.php
                                            type : "get", // chọn phương thức gửi là post
                                            dataType:"json", // dữ liệu trả về dạng text
                                            data : data,
                                            success : function (result){ 
                                                if(result.csrfName){ csrfName = result.csrfName; csrfHash = result.csrfHash;}
                                                if(result.data != 0 && result.action == "get_vitri"){
                                                    $("#menu_index").val(result.data);
                                                }
                                            }
                                        };
                                        // Truyền object vào để gọi ajax
                                        $.ajax(agrs);
                                    }', "embed");  
          
            $this->template->load('index', 'menu/form',$this->data);
            unset($temp);
            unset($parent);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('hethong/sys_menu');
        }
    }

    /**
    * Call Form to Modify menu
    *
    */
    public function edit($id='') 
    {
        if($this->menu->check_phanquyen("menu_3")){
            if ($id != '') 
            {

                $temp = $this->menu_model->get_all();
                $parent = array(0 => 'MENU GỐC');
                $groups        = $this->ion_auth->groups()->result_array();

                foreach ($temp as $key => $value) {
                   if($value['menu_parent_id'] == 0){
                        $parent[$value['menu_id'] ] = $value['menu_title'];
                   }
                }

                $this->data['parent_menu']       = $parent;
                $this->data['menu']      = $this->menu_model->get_one($id);
                $this->data['action']       = 'hethong/sys_menu/save/' . $id;
                $this->data['groups']        = $groups;

                //them js va css
                $this->template->js_add('$("#menu_parent_id").on("click", function(){
             								var id = $("#menu_parent_id").val();
             								ajax_action(id, "get_vitri");
						             });','embed');  
             $this->template->js_add('var csrfName = "'.$this->security->get_csrf_token_name().'";
                                    var csrfHash = "'.$this->security->get_csrf_hash().'";
                                    function ajax_action(id, action) {
                                        var data ={"id": id, "action": action}; data[csrfName] = csrfHash;
                                        var agrs = {
                                            url : "'.base_url().'hethong/sys_menu/ajax_action", // gửi ajax đến file result.php
                                            type : "get", // chọn phương thức gửi là post
                                            dataType:"json", // dữ liệu trả về dạng text
                                            data : data,
                                            success : function (result){
                                                if(result.csrfName){ csrfName = result.csrfName; csrfHash = result.csrfHash;}
                                                if(result.data != 0 && result.action == "get_vitri"){
                                                    $("#menu_index").val(result.data);
                                                }
                                            }
                                        };
                                        // Truyền object vào để gọi ajax
                                        $.ajax(agrs);
                                    }', "embed");  
                     
                
                $this->template->load('index', 'menu/form',$this->data);
                
            }
            else 
            {
                $this->session->set_flashdata('notify', notify('Không thấy data','info'));
                redirect(site_url('hethong/sys_menu'));
            }
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('hethong/sys_menu');
        }
    }

   


    
    /**
    * Save & Update data  menu
    *
    */
    public function save($id =NULL) 
    {
        if($this->menu->check_phanquyen("menu_2") || $this->menu->check_phanquyen("menu_3")){
            $config = array(
                      
                        array(
                            'field' => 'menu_title',
                            'label' => lang('Menu Title'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'menu_parent_id',
                            'label' => lang('Menu Parent'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'menu_url',
                            'label' => lang('Menu Url'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'menu_index',
                            'label' => lang('Menu Index'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'menu_icon',
                            'label' => lang('Menu Icon'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'module_name',
                            'label' => lang('module_name'),
                            'rules' => 'trim|required'
                            ),
                                   
                      );
                
            // if id NULL then add new data
            if(!$id)
            {    
                      $this->form_validation->set_rules($config);

                      if ($this->form_validation->run() == TRUE) 
                      {
                          if ($this->input->post()) 
                          {
                              
                              $this->menu_model->save();
                              $this->session->set_flashdata('notify', notify('Thêm thành công','success'));
                              redirect('hethong/sys_menu');
                          }
                      } 
                      else // If validation incorrect 
                      {
                          $this->add();
                      }
             }
             else // Update data if Form Edit send Post and ID available
             {               
                    $this->form_validation->set_rules($config);

                    if ($this->form_validation->run() == TRUE) 
                    {
                        if ($this->input->post()) 
                        {
                            $this->menu_model->update($id);
                            $this->session->set_flashdata('notify', notify('Update thành công','success'));
                            redirect('hethong/sys_menu');
                        }
                    } 
                    else // If validation incorrect 
                    {
                        $this->edit($id);
                    }
             }
         }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('hethong/sys_menu');
        }
    }
    
    
    /**
    * Delete menu by ID
    *
    */
    public function ajax_action(){   
        $id = $this->input->post('id', TRUE) ? strip_tags($this->input->post('id', TRUE)) : $this->input->get('id', TRUE);
        $action = $this->input->post('action', TRUE) ? strip_tags($this->input->post('action', TRUE)) : $this->input->get('action', TRUE);
        $output = new stdClass;
        $output->csrfName = $this->security->get_csrf_token_name();
        $output->csrfHash = $this->security->get_csrf_hash();
        $output->data = 0;$output->action = $action;

        if ($this->ion_auth->logged_in()) {//co the thay doi quyen
           if($this->menu->check_phanquyen("menu_4")){
                if ($id>=0 AND $action == "del") {
                    $this->menu_model->destroy($id);   $output->data = 1;        
                }
            }
            if($this->menu->check_phanquyen("menu_1")){
                if ($id>=0 AND $action == "detail") {
                    $output->data = $this->menu_model->get_one($id);        
                }
            }

            if($this->menu->check_phanquyen("menu_2") || $this->menu->check_phanquyen("menu_3")){
                if ($action == "get_vitri") {
                	$temp = $this->menu_model->get_all();
                	$parent = '';
                	foreach ($temp as $key => $value) {
			           if($value['menu_parent_id'] == $id){
			                $parent .= $value['menu_index'].' ';
			           }
			        }
			        $parent = explode(' ', trim($parent));
			        sort($parent);
                    $output->data = end($parent)+1;        
                }
            }

        }
        echo json_encode($output);
    }
}
?>