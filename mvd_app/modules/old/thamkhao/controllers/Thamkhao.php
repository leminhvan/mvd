<?php if (!defined('BASEPATH'))  exit('Không có quyền truy cập');

/**
 * Controller thamkhao
 * @created on : Monday, 28-May-2018 14:14:43
 * @author Le Minh Van
 * Copyright 2018
 */

class Thamkhao extends CI_Controller{
  
    public function __construct(){
        parent::__construct();         
        $this->load->model('thamkhao_model');
        $this->load->library(array('form_validation'));
         $this->load->library('counter_visitor_online');
        $this->load->helper(array('form', 'url','notify_helper'));
        $this->lang->load('thamkhao');

        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }
        $this->counter_visitor_online->UsersOnline();
    }
    

    /**
    * lấy tất cả row thamkhao
    *
    */
    public function index(){
        if($this->menu->check_phanquyen("thamkhao_1")){
            $this->data['thamkhaos'] = array(); 
            $temp   = $this->thamkhao_model->get_all();
            foreach ($temp  as $key => $value) {
                if($value['tk_chidinh'] ==1 ){
                    $value['tk_chidinh'] = ' <i class="md md-verified-user c-green"></i>';
                }else{
                    $value['tk_chidinh'] = '';
                }
                array_push($this->data['thamkhaos'], $value);
            }

            $this->template->js_add('var csrfName = "'.$this->security->get_csrf_token_name().'";
                                    var csrfHash = "'.$this->security->get_csrf_hash().'";
                                    function ajax_action(id, action) {
                                        var data ={"id": id, "action": action}; data[csrfName] = csrfHash;
                                        var agrs = {
                                            url : "'.base_url().'thamkhao/ajax_action", // gửi ajax đến file result.php
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
                                                        if(key != "tk_id" ){
                                                            if(key == "tk_chidinh" && val != 0){
                                                                val = "<i class=\"md md-verified-user c-green\"></i>";
                                                            }
                                                            if(key == "tk_chidinh" && val == 0){
                                                                val = "";
                                                            }
                                                            tempalte += "<tr>";
                                                            tempalte +=      "<td width=\'120\' class=\'font-weight-bold\'>" + get_title(key) + "</td>";
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
                                            var title_name = ["Mã số", "Tên", "Tên SOP", "Chỉ định", "Phương pháp", "Hóa lý", "Hoạt chất", "Ngày tạo", "Người tạo", "Ghi chú", "File"];
                                            var title_key = ["tk_code", "tk_name", "tk_sop", "tk_chidinh", "tk_phuongphap", "tk_hoaly", "tk_hoatchat", "tk_create", "tk_user", "tk_note", "tk_link"];
                                            var index = $.inArray(key , title_key);
                                            return title_name[index];
                                        }
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
    * Tạo mới data cho thamkhao
    *
    */
    public function add() {
        if($this->menu->check_phanquyen("thamkhao_2")){
            $this->data['thamkhao']           = $this->thamkhao_model->add();
            $this->data['action']            = 'thamkhao/save';
            
            $this->template->js_add("assets/vendors/fileinput/fileinput.min.js","import");
            $this->template->load('index', 'form',$this->data);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('thamkhao');
        }
    }

    /**
    * Sửa data cho thamkhao
    *
    */
    public function edit($id='') {
        if($this->menu->check_phanquyen("thamkhao_3")){
            if ($id != ''){
                $this->data['thamkhao']      = $this->thamkhao_model->get_one($id);
                $this->data['action']       = 'thamkhao/save/' . $id;           
               $this->template->js_add("assets/vendors/fileinput/fileinput.min.js","import");
                $this->template->load('index', 'form',$this->data);
            } else{
                $this->session->set_flashdata('notify', notify('Không thấy data','info'));
                redirect(site_url('thamkhao'));
            }
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('thamkhao');
        }
    }
    
    /**
    * Cập nhật database  thamkhao
    *
    */
    public function save($id =NULL){
        if($this->menu->check_phanquyen("thamkhao_3")){
            // validation config
            $config = array(
                      
                        array(
                            'field' => 'tk_code',
                            'label' => lang('tk_code'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'tk_name',
                            'label' => lang('tk_name'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'tk_sop',
                            'label' => lang('tk_sop'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'tk_chidinh',
                            'label' => lang('tk_chidinh'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'tk_phuongphap',
                            'label' => lang('tk_phuongphap'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'tk_hoaly',
                            'label' => lang('tk_hoaly'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'tk_hoatchat',
                            'label' => lang('tk_hoatchat'),
                            'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'tk_create',
                            'label' => lang('tk_create'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'tk_user',
                            'label' => lang('tk_user'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'tk_note',
                            'label' => lang('tk_note'),
                            'rules' => 'trim'
                            ),
                                   
                      );
               
            // if id NULL then add new data
            if(!$id) {    
                      $this->form_validation->set_rules($config);
                      if (empty($_FILES['tk_link']['name'])){
                        $this->form_validation->set_rules('tk_link', lang('tk_link'), 'required');
                        }
                      if ($this->form_validation->run() == TRUE) {
                          if ($this->input->post()) {
                              $this->thamkhao_model->save();
                              $this->session->set_flashdata('notify', notify('Thêm thành công','success'));
                              redirect('thamkhao');
                          }
                      }else{ // If validation incorrect 
                          $this->add();
                      }
             }
             else{ // Update data if Form Edit send Post and ID available
                    $this->form_validation->set_rules($config);
                    if ($this->form_validation->run() == TRUE)  {
                        if ($this->input->post())  {
                            var_dump($this->input->post());
                            $this->thamkhao_model->update($id);
                            $this->session->set_flashdata('notify', notify('Update thành công','success'));
                            redirect('thamkhao');
                        }
                    } else{ // If validation incorrect 
                        $this->edit($id);
                    }
             }
         }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('thamkhao');
        }
    }
    
    /**
    * Xóa thamkhao by ID
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
           if($this->menu->check_phanquyen("thamkhao_4")){
                if ($id>=0 AND $action == "del") {
                    $this->thamkhao_model->destroy($id);   $output->data = 1;        
                }
            }
            if($this->menu->check_phanquyen("thamkhao_1")){
                if ($id>=0 AND $action == "detail") {
                    $output->data = $this->thamkhao_model->get_one($id); $output->action = $action;       
                }
            }

        }
        echo json_encode($output);
    }

    public function viewFile($your_pdf_file){
        $file = base64_decode($your_pdf_file);
        $this->output->set_content_type('application/pdf')->set_output(file_get_contents($file));
    }

    
}
?>