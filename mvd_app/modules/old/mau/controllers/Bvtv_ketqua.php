<?php if (!defined('BASEPATH'))  exit('Không có quyền truy cập');

/**
 * Controller bvtv_ketqua
 * @created on : Tuesday, 12-Jun-2018 01:48:56
 * @author Le Minh Van
 * Copyright 2018
 */

class Bvtv_ketqua extends CI_Controller{
  
    public function __construct(){
        parent::__construct();         
        $this->load->model('bvtv_ketqua_model');
        $this->load->library(array('form_validation'));
         $this->load->library('counter_visitor_online');
        $this->load->helper(array('form', 'url','notify_helper'));
        $this->lang->load('bvtv_ketqua');

        if (!$this->ion_auth->logged_in() OR !$this->ion_auth->is_admin()) {
            redirect('login');
        }
        $this->counter_visitor_online->UsersOnline();
    }
    

    /**
    * lấy tất cả row bvtv_ketqua
    *
    */
    public function index(){
        if($this->menu->check_phanquyen("bvtv_ketqua_1")){
            $this->data['bvtv_ketquas']   = $this->bvtv_ketqua_model->get_all();
            $this->template->js_add('var csrfName = "'.$this->security->get_csrf_token_name().'";
                                    var csrfHash = "'.$this->security->get_csrf_hash().'";
                                    function ajax_action(id, action) {
                                        var data ={"id": id, "action": action}; data[csrfName] = csrfHash;
                                        var agrs = {
                                            url : "'.base_url().'bvtv_ketqua/ajax_action", // gửi ajax đến file result.php
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
                                                    var re = result.data; 
                                                    var tempalte = "";
                                                    $.each(re ,function(key, val){
                                                        if(key != "hcgoc_id" ){
                                                            tempalte += "<tr>";
                                                            tempalte +=      "<td width=\'120\' class=\'font-weight-bold\'>" + key + "</td>";
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
                                    }', "embed");
            
            if($this->session->flashdata('notify') != NULL){
                $this->template->js_add("notify('".$this->session->flashdata('notify')['message']."', '".$this->session->flashdata('notify')['type']."');",'embed');
            }
            $this->template->load('index', 'view',$this->data);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('dashboard');
        }
    }

    

    /**
    * Tạo mới data cho bvtv_ketqua
    *
    */
    public function add() {
        if($this->menu->check_phanquyen("bvtv_ketqua_2")){
            $this->data['bvtv_ketqua']           = $this->bvtv_ketqua_model->add();
            $this->data['action']            = 'bvtv_ketqua/save';
            

            //them js va css
            // $this->template->js_add('','embed');    
          
            $this->template->load('index', 'form',$this->data);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('bvtv_ketqua');
        }
    }

    /**
    * Sửa data cho bvtv_ketqua
    *
    */
    public function edit($id='') {
        if($this->menu->check_phanquyen("bvtv_ketqua_3")){
            if ($id != ''){
                $this->data['bvtv_ketqua']      = $this->bvtv_ketqua_model->get_one($id);
                $this->data['action']       = 'bvtv_ketqua/save/' . $id;           
               
                    
                $this->template->load('index', 'form',$this->data);
            } else{
                $this->session->set_flashdata('notify', notify('Không thấy data','info'));
                redirect(site_url('bvtv_ketqua'));
            }
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('bvtv_ketqua');
        }
    }
    
    /**
    * Cập nhật database  bvtv_ketqua
    *
    */
    public function save($id =NULL){
        if($this->menu->check_phanquyen("bvtv_ketqua_3")){
            // validation config
            $config = array(
                      
                        array(
                            'field' => 'mau_id',
                            'label' => lang('mau_id'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'chuan_id',
                            'label' => lang('chuan_id'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 's_chuan1',
                            'label' => lang('s_chuan1'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 's_chuan2',
                            'label' => lang('s_chuan2'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'm_mau',
                            'label' => lang('m_mau'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'v_mau',
                            'label' => lang('v_mau'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 's_mau',
                            'label' => lang('s_mau'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'hl_dk',
                            'label' => lang('hl_dk'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'ngay_tao',
                            'label' => lang('ngay_tao'),
                            'rules' => 'trim|required'
                            ),
                                   
                      );
                
            // if id NULL then add new data
            if(!$id) {    
                      $this->form_validation->set_rules($config);
                      if ($this->form_validation->run() == TRUE) {
                          if ($this->input->post()) {
                              $this->bvtv_ketqua_model->save();
                              $this->session->set_flashdata('notify', notify('Thêm thành công','success'));
                              redirect('bvtv_ketqua');
                          }
                      }else{ // If validation incorrect 
                          $this->add();
                      }
             }
             else{ // Update data if Form Edit send Post and ID available
                    $this->form_validation->set_rules($config);
                    if ($this->form_validation->run() == TRUE)  {
                        if ($this->input->post())  {
                            $this->bvtv_ketqua_model->update($id);
                            $this->session->set_flashdata('notify', notify('Update thành công','success'));
                            redirect('bvtv_ketqua');
                        }
                    } else{ // If validation incorrect 
                        $this->edit($id);
                    }
             }
         }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('bvtv_ketqua');
        }
    }
    
    /**
    * Xóa bvtv_ketqua by ID
    *
    */

    public function ajax_action(){   
        $id = strip_tags($this->input->post('id', TRUE));
        $action = strip_tags($this->input->post('action', TRUE));
        $output = new stdClass;
        $output->csrfName = $this->security->get_csrf_token_name();
        $output->csrfHash = $this->security->get_csrf_hash();
        $output->data = 0; $output->action = $action;

        if ($this->ion_auth->logged_in() ) {//co the thay doi quyen
           if($this->menu->check_phanquyen("bvtv_ketqua_4")){
                if ($id>=0 AND $action == "del") {
                    $this->bvtv_ketqua_model->destroy($id);   $output->data = 1;        
                }
            }
            if($this->menu->check_phanquyen("bvtv_ketqua_1")){
                if ($id>=0 AND $action == "detail") {
                    $output->data = $this->bvtv_ketqua_model->get_one($id); $output->action = $action;       
                }
            }

        }
        echo json_encode($output);
    }
}
?>