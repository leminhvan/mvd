<?php if (!defined('BASEPATH'))  exit('Không có quyền truy cập');

/**
 * Controller tintuc
 * @created on : Friday, 10-Aug-2018 08:47:51
 * @author Le Minh Van
 * Copyright 2018
 */

class Tintuc extends CI_Controller{
  
    public function __construct(){
        parent::__construct();         
        $this->load->model('tintuc_model');
        $this->load->library(array('form_validation'));
         $this->load->library('counter_visitor_online');
        $this->load->helper(array('form', 'url','notify_helper'));
        $this->lang->load('tintuc');

        $this->counter_visitor_online->UsersOnline();
    }
    

    /**
    * lấy tất cả row tintuc
    *
    */
    public function index(){
        if($this->menu->check_phanquyen("tintuc_1")){
            $this->data['tintucs']   = $this->tintuc_model->get_all();
            $this->template->js_add('var csrfName = "'.$this->security->get_csrf_token_name().'";
                                    var csrfHash = "'.$this->security->get_csrf_hash().'";
                                    function ajax_action(id, action) {
                                        var data ={"id": id, "action": action}; data[csrfName] = csrfHash;
                                        var agrs = {
                                            url : "'.base_url().'tintuc/ajax_action", // gửi ajax đến file result.php
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
            $this->template->css_add('assets/tintuc/css/linearicons.css', "link");
            $this->template->css_add('assets/css/tintuc.css', "link");
            //$this->template->css_add('assets/tintuc/css/bootstrap.css', "link");
            //$this->template->css_add('assets/tintuc/css/main.css', "link");
            //$this->template->css_add('https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700', "import");

            $this->template->load('index', 'view_f',$this->data);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('dashboard');
        }
    }

    function front($id){
        $this->template->css_add('assets/tintuc/css/linearicons.css', "link");
        $this->template->css_add('assets/tintuc/css/font-awesome.min.css', "link");
        $this->template->css_add('assets/tintuc/css/bootstrap.css', "link");
        $this->template->css_add('assets/tintuc/css/main.css', "link");
        $this->template->css_add('https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700', "import");

        $this->data['tintuc']   = $this->tintuc_model->get_one($id);
        $this->template->load('index', 'view_detail_front',$this->data);
    }

    /**
    * Tạo mới data cho tintuc
    *
    */
    public function add() {
        if($this->menu->check_phanquyen("tintuc_2")){
            $this->data['tintuc']           = $this->tintuc_model->add();
            $this->data['action']            = 'tintuc/save';
            
            $this->data['tintuc_danhmuc'] = $this->tintuc_model->get_tintuc_danhmuc();
            //$this->template->css_add('assets/vendors/summernote/summernote.css', "url");
            $this->template->js_add('assets/ckeditor/ckeditor.js', "import");
            $this->template->js_add("$(function() {                                     
                                        if(CKEDITOR.instances['noidung']) {                     
                                            CKEDITOR.remove(CKEDITOR.instances['noidung']);
                                        }
                                        //CKEDITOR.config.width = 600;
                                        //CKEDITOR.config.height = 150;
                                        CKEDITOR.replace('noidung',{});
                                    })", 'embed');
          
            $this->template->load('index', 'form',$this->data);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('tintuc');
        }
    }

    /**
    * Sửa data cho tintuc
    *
    */
    public function edit($id='') {
        if($this->menu->check_phanquyen("tintuc_3")){
            if ($id != ''){
                $this->data['tintuc']      = $this->tintuc_model->get_one($id);
                $this->data['action']       = 'tintuc/save/' . $id;           
               
                $this->data['tintuc_danhmuc'] = $this->tintuc_model->get_tintuc_danhmuc();
               $this->template->js_add('assets/ckeditor/ckeditor.js', "import");
                $this->template->js_add("$(function() {                                     
                                            if(CKEDITOR.instances['noidung']) {                     
                                                CKEDITOR.remove(CKEDITOR.instances['noidung']);
                                            }
                                            //CKEDITOR.config.width = 600;
                                            //CKEDITOR.config.height = 150;
                                            CKEDITOR.replace('noidung',{});
                                        })", 'embed');
                    
                $this->template->load('index', 'form',$this->data);
            } else{
                $this->session->set_flashdata('notify', notify('Không thấy data','info'));
                redirect(site_url('tintuc'));
            }
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('tintuc');
        }
    }
    
    /**
    * Cập nhật database  tintuc
    *
    */
    public function save($id =NULL){
        if($this->menu->check_phanquyen("tintuc_3")){
            // validation config
            $config = array(
                      
                        array(
                            'field' => 'id_dm',
                            'label' => lang('id_dm'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'tieude',
                            'label' => lang('tieude'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'mota',
                            'label' => lang('mota'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'thumbnail',
                            'label' => lang('thumbnail'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'noidung',
                            'label' => lang('noidung'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'id_tacgia',
                            'label' => lang('id_tacgia'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'tukhoa',
                            'label' => lang('tukhoa'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'ngaytao',
                            'label' => lang('ngaytao'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'edit',
                            'label' => lang('edit'),
                            'rules' => 'trim'
                            ),
                      );
                
            // if id NULL then add new data
            if(!$id) {    
                      $this->form_validation->set_rules($config);
                      if ($this->form_validation->run() == TRUE) {
                          if ($this->input->post()) {
                              $this->tintuc_model->save();
                              $this->session->set_flashdata('notify', notify('Thêm thành công','success'));
                              redirect('tintuc');
                          }
                      }else{ // If validation incorrect 
                          $this->add();
                      }
             }
             else{ // Update data if Form Edit send Post and ID available
                    $this->form_validation->set_rules($config);
                    if ($this->form_validation->run() == TRUE)  {
                        if ($this->input->post())  {
                            $this->tintuc_model->update($id);
                            $this->session->set_flashdata('notify', notify('Update thành công','success'));
                            redirect('tintuc');
                        }
                    } else{ // If validation incorrect 
                        $this->edit($id);
                    }
             }
         }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('tintuc');
        }
    }
    
    /**
    * Xóa tintuc by ID
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
           if($this->menu->check_phanquyen("tintuc_4")){
                if ($id>=0 AND $action == "del") {
                    $this->tintuc_model->destroy($id);   $output->data = 1;        
                }
            }
            if($this->menu->check_phanquyen("tintuc_1")){
                if ($id>=0 AND $action == "detail") {
                    $output->data = $this->tintuc_model->get_one($id); $output->action = $action;       
                }
            }

        }
        echo json_encode($output);
    }
}
?>