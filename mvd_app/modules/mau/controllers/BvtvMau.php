<?php if (!defined('BASEPATH'))  exit('Không có quyền truy cập');

/**
 * Controller bvtvmau
 * @created on : Saturday, 18-Aug-2018 09:37:32
 * @author Le Minh Van
 * Copyright 2018
 */

class BvtvMau extends CI_Controller{
  
    public function __construct(){
        parent::__construct();         
        $this->load->model('bvtvmau_model');
        $this->load->library(array('form_validation'));
         $this->load->library('counter_visitor_online');
        $this->load->helper(array('form', 'url','notify_helper'));
        $this->lang->load('bvtvmau');

        if (!$this->ion_auth->logged_in() OR !$this->ion_auth->is_admin()) {
            redirect('login');
        }
        $this->counter_visitor_online->UsersOnline();
    }
    

    /**
    * lấy tất cả row bvtvmau
    *
    */
    public function index(){
        if($this->menu->check_phanquyen("bvtvmau_1")){
            $this->data['bvtvmaus']   = $this->bvtvmau_model->get_all();
            $this->template->js_add('var csrfName = "'.$this->security->get_csrf_token_name().'";
                                    var csrfHash = "'.$this->security->get_csrf_hash().'";
                                    function ajax_action(id, action) {
                                        var data ={"id": id, "action": action}; data[csrfName] = csrfHash;
                                        var agrs = {
                                            url : "'.base_url().'bvtvmau/ajax_action", // gửi ajax đến file result.php
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
    * Tạo mới data cho bvtvmau
    *
    */
    public function add() {
        if($this->menu->check_phanquyen("bvtvmau_2")){
            $this->data['bvtvmau']           = $this->bvtvmau_model->add();
            $this->data['action']            = 'bvtvmau/save';
            

            //them js va css
            // $this->template->js_add('','embed');    
          
            $this->template->load('index', 'form',$this->data);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('bvtvmau');
        }
    }

    /**
    * Sửa data cho bvtvmau
    *
    */
    public function edit($id='') {
        if($this->menu->check_phanquyen("bvtvmau_3")){
            if ($id != ''){
                $this->data['bvtvmau']      = $this->bvtvmau_model->get_one($id);
                $this->data['action']       = 'bvtvmau/save/' . $id;           
               
                    
                $this->template->load('index', 'form',$this->data);
            } else{
                $this->session->set_flashdata('notify', notify('Không thấy data','info'));
                redirect(site_url('bvtvmau'));
            }
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('bvtvmau');
        }
    }
    
    /**
    * Cập nhật database  bvtvmau
    *
    */
    public function save($id =NULL){
        if($this->menu->check_phanquyen("bvtvmau_3")){
            // validation config
            $config = array(
                      
                        array(
                            'field' => 'chitieu',
                            'label' => lang('chitieu'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'code',
                            'label' => lang('code'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'type',
                            'label' => lang('type'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'ngaynhan',
                            'label' => lang('ngaynhan'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'ngaytra',
                            'label' => lang('ngaytra'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'trangthai',
                            'label' => lang('trangthai'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'ketqua',
                            'label' => lang('ketqua'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'donvi',
                            'label' => lang('donvi'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'dang',
                            'label' => lang('dang'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'luutru',
                            'label' => lang('luutru'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'note',
                            'label' => lang('note'),
                            'rules' => 'trim'
                            ),
                                   
                      );
                
            // if id NULL then add new data
            if(!$id) {    
                      $this->form_validation->set_rules($config);
                      if ($this->form_validation->run() == TRUE) {
                          if ($this->input->post()) {
                              $this->bvtvmau_model->save();
                              $this->session->set_flashdata('notify', notify('Thêm thành công','success'));
                              redirect('bvtvmau');
                          }
                      }else{ // If validation incorrect 
                          $this->add();
                      }
             }
             else{ // Update data if Form Edit send Post and ID available
                    $this->form_validation->set_rules($config);
                    if ($this->form_validation->run() == TRUE)  {
                        if ($this->input->post())  {
                            $this->bvtvmau_model->update($id);
                            $this->session->set_flashdata('notify', notify('Update thành công','success'));
                            redirect('bvtvmau');
                        }
                    } else{ // If validation incorrect 
                        $this->edit($id);
                    }
             }
         }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('bvtvmau');
        }
    }
    
    /**
    * Xóa bvtvmau by ID
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
           if($this->menu->check_phanquyen("bvtvmau_4")){
                if ($id>=0 AND $action == "del") {
                    $this->bvtvmau_model->destroy($id);   $output->data = 1;        
                }
            }
            if($this->menu->check_phanquyen("bvtvmau_1")){
                if ($id>=0 AND $action == "detail") {
                    $output->data = $this->bvtvmau_model->get_one($id); $output->action = $action;       
                }
            }

        }
        echo json_encode($output);
    }
}
?>