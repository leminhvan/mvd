<?php if (!defined('BASEPATH'))  exit('Không có quyền truy cập');

/**
 * Controller groups
 * @created on : Wednesday, 23-May-2018 06:07:25
 * @author Le Minh Van
 * Copyright 2018
 */

class Groups extends CI_Controller{
  
    public function __construct(){
        parent::__construct();         
        $this->load->model('groups_model');
        $this->load->library(array('form_validation'));
         $this->load->library('counter_visitor_online');
        $this->load->helper(array('form', 'url','notify_helper'));
        $this->lang->load('groups');

        if (!$this->ion_auth->logged_in() ) {
            redirect('login');
        }
        $this->counter_visitor_online->UsersOnline();
    }
    

    /**
    * lấy tất cả row groups
    *
    */
    public function index(){

        /*
        if (!$this->ion_auth->logged_in() OR !$this->ion_auth->is_admin()) {
            redirect(site_url('hethong/groups'));
        }*/

        $this->data['groupss']   = $this->groups_model->get_all();
        $this->template->js_add("$('#select_all-menu').change(function() {
                                    var checkboxes = $(this).closest('table').find(':checkbox');
                                    checkboxes.prop('checked', $(this).is(':checked'));
                                }); " ,'embed');
        $this->template->js_add("function notify(message, type){
                                    $.growl({
                                        message: message
                                    },{
                                        type: type,
                                        allow_dismiss: false,
                                        label: 'Cancel',
                                        className: 'btn-xs btn-inverse',
                                        placement: {
                                            from: 'top',
                                            align: 'right'
                                        },
                                        delay: 2500,
                                        animate: {
                                                enter: 'animated bounceIn',
                                                exit: 'animated bounceOut'
                                        },
                                        offset: {
                                            x: 20,
                                            y: 85
                                        }
                                    });
                                };", "embed");
        $this->template->js_add('var csrfName = "'.$this->security->get_csrf_token_name().'";
                                var csrfHash = "'.$this->security->get_csrf_hash().'";
                                function ajax_action(id, action) {
                                    var data ={"id": id, "action": action}; data[csrfName] = csrfHash;
                                    var agrs = {
                                        url : "'.base_url().'hethong/groups/ajax_action", // gửi ajax đến file result.php
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
                                                    if(key != "id" ){
                                                            if(key === "bgcolor" ){
                                                            tempalte += "<tr>";
                                                            tempalte +=      "<td width=\'120\' class=\'font-weight-bold\'>" + key + "</td>";
                                                            tempalte +=      "<td > <i class=\'md md-stop md-2x\' style=\'color: " + val + ";\'></i></td>";
                                                            tempalte += "</tr>";
                                                        }else{
                                                            tempalte += "<tr>";
                                                            tempalte +=      "<td width=\'120\' class=\'font-weight-bold\'>" + key + "</td>";
                                                            tempalte +=      "<td > " + val +"</td>";
                                                            tempalte += "</tr>";
                                                        }
                                                    }
                                                    
                                                });
                                                $(".result").html(tempalte);
                                            }  
                                        }
                                    };
                                    // Truyền object vào để gọi ajax
                                    $.ajax(agrs);
                                }', "embed");
        $this->template->js_add('$(".xoa").click(function(){
                                        var id = $(this).attr("data-id");
                                        swal({   
                                            title: "Chắc chưa?",   
                                            text: "Không thể phục hồi đấy!",   
                                            type: "warning",   
                                            showCancelButton: true,   
                                            confirmButtonColor: "#DD6B55",   
                                            confirmButtonText: "Có, xóa nó đi",   
                                            cancelButtonText: "Không, có gì đó sai sai",   
                                            closeOnConfirm: false,   
                                            closeOnCancel: true, 
                                        }, function(isConfirm){
                                            if (isConfirm) { 
                                                ajax_action(id, "del");
                                            } 
                                        });
                                    });', "embed");
        $this->template->js_add('$(".detail").click(function(){
                                        var id = $(this).attr("data-id");
                                        $(".modal").attr("id", id);
                                        $(".result").html("<tr><td class=\'text-center\'><i class=\'md-rotate-right md-3x md-spin\' ></i></td></tr>");
                                        ajax_action(id, "detail");
                                    });', "embed");
        
        if($this->session->flashdata('notify') != NULL){
            $this->template->js_add("notify('".$this->session->flashdata('notify')['message']."', '".$this->session->flashdata('notify')['type']."');",'embed');
        }
        $this->template->load('index', 'group/view',$this->data);
    }

    

    /**
    * Tạo mới data cho groups
    *
    */
    public function add() {
        /*
        if (!$this->ion_auth->logged_in() OR !$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect(site_url('hethong/groups'));
        }*/

        $this->data['groups']           = $this->groups_model->add();
        $this->data['action']            = 'hethong/groups/save';
        
        $this->template->js_add('assets/vendors/tinycolor/tinycolor.min.js','import');
        $this->template->js_add('assets/vendors/colorpickersliders/colorpickersliders.min.js','import');
        $this->template->css_add('assets/vendors/colorpickersliders/colorpickersliders.min.css', 'link');
        $this->template->js_add("if ($('#bgcolor').length) {
                                    var elem = $('#bgcolor');

                                    elem.ColorPickerSliders({
                                        size: 'lg',
                                        placement: 'auto bottom',
                                        previewformat: 'hex',
                                        color: elem.attr('data-src'),
                                        swatches: ['#F44336', '#E91E63', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#009688', '#FF5722', '#795548', '#607D8B', '#000000'],
                                        customswatches: false,
                                        order: {}
                                    });

                                    $('button[type=\"reset\"]').on('click', function(e){
                                        elem.trigger('colorpickersliders.updateColor', elem.attr('data-src'));
                                    });
                                }", "embed");
        //them js va css
        // $this->template->js_add('','embed');    
      
        $this->template->load('index', 'group/form',$this->data);
    }

    /**
    * Sửa data cho groups
    *
    */
    public function edit($id='') {
         /*
        if (!$this->ion_auth->logged_in() OR !$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect(site_url('hethong/groups'));
        }*/
        $this->template->js_add('assets/vendors/tinycolor/tinycolor.min.js','import');
        $this->template->js_add('assets/vendors/colorpickersliders/colorpickersliders.min.js','import');
        $this->template->css_add('assets/vendors/colorpickersliders/colorpickersliders.min.css', 'link');
        $this->template->js_add("if ($('#bgcolor').length) {
                                    var elem = $('#bgcolor');

                                    elem.ColorPickerSliders({
                                        size: 'lg',
                                        placement: 'auto bottom',
                                        previewformat: 'hex',
                                        color: elem.attr('data-src'),
                                        swatches: ['#F44336', '#E91E63', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#009688', '#FF5722', '#795548', '#607D8B', '#000000'],
                                        customswatches: false,
                                        order: {}
                                    });

                                    $('button[type=\"reset\"]').on('click', function(e){
                                        elem.trigger('colorpickersliders.updateColor', elem.attr('data-src'));
                                    });
                                }", "embed");
        if ($id != ''){
            $this->data['groups']      = $this->groups_model->get_one($id);
            $this->data['action']       = 'hethong/groups/save/' . $id;           
               
                
            $this->template->load('index', 'group/form',$this->data);
        } else{
            $this->session->set_flashdata('notify', notify('Không thấy data','info'));
            redirect(site_url('hethong/groups'));
        }
    }
    
    /**
    * Cập nhật database  groups
    *
    */
    public function save($id =NULL){
          /*
        if (!$this->ion_auth->logged_in() OR !$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect(site_url('hethong/groups'));
        }*/

        // validation config
        $config = array(
                  
                    array(
                        'field' => 'name',
                        'label' => lang('name'),
                        'rules' => 'trim|required'
                        ),
                    
                    array(
                        'field' => 'description',
                        'label' => lang('description'),
                        'rules' => 'trim'
                        ),
                    
                    array(
                        'field' => 'bgcolor',
                        'label' => lang('bgcolor'),
                        'rules' => 'trim'
                        ),
                               
                  );
            
        // if id NULL then add new data
        if(!$id) {    
                  $this->form_validation->set_rules($config);
                  $this->form_validation->set_error_delimiters('<small class="form-text text-muted red-text">', '</small>');
                  if ($this->form_validation->run() == TRUE) {
                      if ($this->input->post()) {
                          $this->groups_model->save();
                          $this->session->set_flashdata('notify', notify('Thêm thành công','success'));
                          redirect('hethong/groups');
                      }
                  }else{ // If validation incorrect 
                      $this->add();
                  }
         }
         else{ // Update data if Form Edit send Post and ID available
                $this->form_validation->set_rules($config);
                $this->form_validation->set_error_delimiters('<small class="form-text text-muted red-text">', '</small>');
                if ($this->form_validation->run() == TRUE)  {
                    if ($this->input->post())  {
                        $this->groups_model->update($id);
                        $this->session->set_flashdata('notify', notify('Update thành công','success'));
                        redirect('hethong/groups');
                    }
                } else{ // If validation incorrect 
                    $this->edit($id);
                }
         }
    }
    
    /**
    * Xóa groups by ID
    *
    */

    public function ajax_action(){   
        $id = strip_tags($this->input->post('id', TRUE));
        $action = strip_tags($this->input->post('action', TRUE));
        $output = new stdClass;
        $output->csrfName = $this->security->get_csrf_token_name();
        $output->csrfHash = $this->security->get_csrf_hash();
        $output->data = 0; $output->action = "";

        if ($this->ion_auth->logged_in() AND $this->ion_auth->is_admin()) {//co the thay doi quyen
           // ID phải lớn hơn 0
            if ($id>=0 AND $action == "del") {
                $this->groups_model->destroy($id);   $output->data = 1; $output->action = $action;       
            }
            if ($id>=0 AND $action == "detail") {
                $output->data = $this->groups_model->get_one($id); $output->action = $action;       
            }

        }
        echo json_encode($output);
    }
}
?>