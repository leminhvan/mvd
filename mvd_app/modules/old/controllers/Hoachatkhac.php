<?php if (!defined('BASEPATH'))  exit('Không có quyền truy cập');

/**
 * Controller chuangoc
 * @created on : Monday, 21-May-2018 06:15:26
 * @author Le Minh Van
 * Copyright 2018
 */

class Hoachatkhac extends CI_Controller{
    public function __construct(){
        parent::__construct();         
        $this->load->model('chuangoc_model');
        $this->load->library(array('form_validation'));
        $this->load->library('counter_visitor_online');
        $this->load->helper(array('form', 'url','notify_helper'));
        $this->lang->load('hoachat');

        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }
        $this->counter_visitor_online->UsersOnline();//var_dump($this->session->flashdata('notify'));
    }
    
    public $get_key_name = 'function get_title(key){
                        var title_name = ["Tên", "VICB Code", "Sản xuất", "Code", "Lô/Lot", "Hàm lượng", "Lượng nhập", "Exp.", "Ngày nhập", "Người nhập", "Bảo quản", "Đã đặt hàng", "Lab sử dụng"];
                        var title_key = ["hcgoc_name", "hcgoc_vicb_code", "hcgoc_nhasx", "hcgoc_code", "hcgoc_lot", "hcgoc_hamluong", "hcgoc_luongnhap", "hcgoc_expday", "hcgoc_ngaynhap", "hcgoc_nguoinhap", "hcgoc_baoquan", "hcgoc_dathang", "hcgoc_lab"];
                        var index = $.inArray(key , title_key);
                        return title_name[index];
                    }';

    /**
    * lấy tất cả row chuangoc
    *
    */
    public function index($key_search = 'So'){
        if($this->menu->check_phanquyen("hoachatkhac_1")){
            
            $source       = $this->chuangoc_model->get_all_khac($key_search);
            foreach($source as $row):
                        $temp[] = $row;
            endforeach;
            unset($source);
            date_default_timezone_set('Asia/Ho_Chi_Minh'); //set mui gio, khong se bi sai

            $now = date('d-m-Y');
            $this->data['chuangocs'] = array();
            $this->data['chuangocs_hethan'] = array();
            $this->data['chuangocs_saphethan'] = array();
            $this->data['notification'] = array();

            $count_saphethan = 0;
            foreach ($temp  as $key => $value) {
                if($value['hcgoc_expday'] !=''){
                    $exp = $value['hcgoc_expday'];//DateTime::createFromFormat('d/m/Y', $value['hcgoc_expday'])->format('Y-m-d');
                    $diff = (strtotime($exp)-strtotime($now ))/86400 ;

                    if($diff >= 0 ) {
                        
                        if ($diff >=0 AND $diff <30){
                            $count_saphethan ++;
                            $value['hcgoc_name'] = $value['hcgoc_name'] . ' <span class = "label label-danger"> '.$diff.' ngày</span>';
                            array_push($this->data['chuangocs_saphethan'], $value);
                        }
                        if ($diff >=30 AND $diff <60){
                            $count_saphethan ++;
                            $value['hcgoc_name'] = $value['hcgoc_name'] . ' <span class = "label label-warning"> '.$diff.' ngày</span>';
                            array_push($this->data['chuangocs_saphethan'], $value);
                        }
                        if ($diff >=60 AND $diff <90){
                            $count_saphethan ++;
                            $value['hcgoc_name'] = $value['hcgoc_name'] . ' <span class = "label label-primary">  '.$diff.' ngày</span>';
                            array_push($this->data['chuangocs_saphethan'], $value);
                        }
                        if ($diff >=90 AND $diff <120){
                            $count_saphethan ++;
                            $value['hcgoc_name'] = $value['hcgoc_name'] . ' <span class = "label label-success">  '.$diff.' ngày</span>';
                            array_push($this->data['chuangocs_saphethan'], $value);
                        }
                        array_push($this->data['chuangocs'], $value);
                    }else{
                        array_push($this->data['chuangocs_hethan'], $value);
                    }
                }
            }
            //hiện trên thanh thông báo
            if($count_saphethan > 0){
                $this->data['notification'][] = array('link' => 'chuangoc', 
                                                        'title' => 'Chuẩn sắp hết hạn', 
                                                        'icon' =>'<i class="md md-warning md-2x"></i>', 
                                                        'message' => 'Có '.$count_saphethan.' hóa chất',
                                                    );
            }
            $this->template->js_add($this->get_key_name, "embed");
            $this->template->js_add('var csrfName = "'.$this->security->get_csrf_token_name().'";
                                    var csrfHash = "'.$this->security->get_csrf_hash().'";
                                    function ajax_action(id, action) {
                                        var data ={"id": id, "action": action}; data[csrfName] = csrfHash;
                                        var agrs = {
                                            url : "'.base_url().'hoachat/chuangoc/ajax_action", // gửi ajax đến file result.php
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
                                                            if(key != "hcgoc_dathang"){
                                                                tempalte += "<tr>";
                                                                tempalte +=      "<td width=\'120\' class=\'font-weight-bold\'>" + get_title(key) + "</td>";
                                                                tempalte +=      "<td > " + val +"</td>";
                                                                tempalte += "</tr>";
                                                            }
                                                            if(key == "hcgoc_dathang" && (val != null || val != "") ){
                                                                var datmua;
                                                                if(val == "1") {
                                                                    datmua = "Đã đặt hàng";
                                                                    tempalte += "<tr>";
                                                                    tempalte +=      "<td width=\'120\' class=\'font-weight-bold\'>" + get_title(key) + "</td>";
                                                                    tempalte +=      "<td > " + datmua +"</td>";
                                                                    tempalte += "</tr>";
                                                                }
                                                            }
                                                            
                                                        }
                                                    });
                                                    $(".result").html(tempalte);
                                                }  

                                                if(result.action == "autoten"){
                                                   console.log(result.data);
                                                } 

                                                if(result.action == "dathang"){
                                                   if(result.data == true){
                                                        $("#data_id_"+id).remove();
                                                        swal({   
                                                            title: "Thành công!",   
                                                            timer: 1000,   
                                                            type: "success", 
                                                        });   
                                                    }
                                                    if(result.data == false){
                                                        swal({   
                                                            title: "Lỗi!",   
                                                            timer: 1000,   
                                                            type: "error", 
                                                        });  
                                                    }
                                                }   
                                            }
                                        };
                                        // Truyền object vào để gọi ajax
                                        $.ajax(agrs);
                                    }', "embed");
            if($this->session->flashdata('notify') != NULL){
                $this->template->js_add("notify('".$this->session->flashdata('notify')['message']."', '".$this->session->flashdata('notify')['type']."');",'embed');
            }
            $this->template->load('index', 'hoachatkhac/view',$this->data);
            unset( $temp); unset($source);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('hoachat/chuangoc');
        }//end check phan quyen
    }

   


    /**
    * Tạo mới data cho chuangoc
    *
    */
    public function add() {
        if($this->menu->check_phanquyen("chuangoc_2") ){
            $this->data['chuangoc']           = $this->chuangoc_model->add();
            $this->data['action']            = 'hoachat/chuangoc/save';
            $this->template->js_add('assets/vendors/typehead/typeahead.bundle.js', "import");
            $this->template->css_add('assets/vendors/typehead/typehead-addin.css', "link" ); 
            $this->template->js_add('var ten = new Bloodhound({
                                                      datumTokenizer: Bloodhound.tokenizers.whitespace,
                                                      queryTokenizer: Bloodhound.tokenizers.whitespace,
                                                      local: []
                                                    });
                                    ten.initialize();
                                    function ajax_action(key, action) {
                                        var data ={"key": key, "action": action}; 
                                        var agrs = {
                                            url : "ajax_action", // gửi ajax đến file result.php
                                            type : "get", // chọn phương thức gửi là post
                                            dataType:"json", // dữ liệu trả về dạng text
                                            data : data,
                                            success : function (result){
                                                if(result.action == "autoten"){
                                                    ten.local = result.data;
                                                    ten.initialize(true);
                                                }  
                                            }
                                        };
                                        // Truyền object vào để gọi ajax
                                        $.ajax(agrs);

                                        

                                    }', "embed"); 

            $this->template->js_add('$(".autoten").on( "click", function(){
                                            //var key = $(this).val();
                                            ajax_action("", "autoten");
                                        });
                                    $("#hcgoc_name").typeahead({
                                      hint: true,
                                      highlight: true,
                                      minLength: 1
                                    },
                                    {
                                      name: "ten",
                                      source: ten
                                    });
                                        ', "embed"); 
          
            $this->template->load('index', 'chuangoc/form',$this->data);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('hoachat/chuangoc');
        }
    }

    /**
    * Sửa data cho chuangoc
    *
    */
    public function edit($id='') {
        if($this->menu->check_phanquyen("chuangoc_3")){
            $this->template->js_add('assets/vendors/typehead/typeahead.bundle.js', "import");
            $this->template->css_add('assets/vendors/typehead/typehead-addin.css', "link" ); 
            $this->template->js_add('var ten = new Bloodhound({
                                                      datumTokenizer: Bloodhound.tokenizers.whitespace,
                                                      queryTokenizer: Bloodhound.tokenizers.whitespace,
                                                      local: []
                                                    });
                                    ten.initialize();
                                    function ajax_action(key, action) {
                                        var data ={"key": key, "action": action}; 
                                        var agrs = {
                                            url : "ajax_action", // gửi ajax đến file result.php
                                            type : "get", // chọn phương thức gửi là post
                                            dataType:"json", // dữ liệu trả về dạng text
                                            data : data,
                                            success : function (result){
                                                if(result.action == "autoten"){
                                                    ten.local = result.data;
                                                    ten.initialize(true);
                                                }  
                                            }
                                        };
                                        // Truyền object vào để gọi ajax
                                        $.ajax(agrs);

                                        

                                    }', "embed"); 

            $this->template->js_add('$(".autoten").on( "click", function(){
                                            //var key = $(this).val();
                                            ajax_action("", "autoten");
                                        });
                                    $("#hcgoc_name").typeahead({
                                      hint: true,
                                      highlight: true,
                                      minLength: 1
                                    },
                                    {
                                      name: "ten",
                                      source: ten
                                    });
                                        ', "embed"); 

            if ($id != ''){
                $this->data['chuangoc']      = $this->chuangoc_model->get_one($id);
                $this->data['chuangoc']['hcgoc_donvi']      = $this->chuangoc_model->get_all_donvi();
                $this->data['action']       = 'hoachat/chuangoc/save/' . $id;           
                $this->template->load('index', 'chuangoc/form',$this->data);
            } else{
                $this->session->set_flashdata('notify', notify('Không thấy data','info'));
                redirect(site_url('hoachat/chuangoc'));
            }
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('hoachat/chuangoc');
        }
    }
    
    /**
    * Cập nhật database  chuangoc
    *
    */
    public function save($id =NULL){
        if($this->menu->check_phanquyen("chuangoc_3") ){
            $config = array(
                      
                        array(
                            'field' => 'hcgoc_name',
                            'label' => lang('hcgoc_name'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'hcgoc_vicb_code',
                            'label' => lang('hcgoc_vicb_code'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'hcgoc_nhasx',
                            'label' => lang('hcgoc_manufac'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'hcgoc_code',
                            'label' => lang('hcgoc_code'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'hcgoc_lot',
                            'label' => lang('hcgoc_lot'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'hcgoc_hamluong',
                            'label' => lang('hcgoc_percent'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'hcgoc_luongnhap',
                            'label' => lang('hcgoc_luongnhap'),
                            'rules' => 'trim|required'
                            ),
                        
                        array(
                            'field' => 'hcgoc_expday',
                            'label' => lang('hcgoc_expday'),
                            'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'hcgoc_ngaynhap',
                            'label' => lang('hcgoc_ngaynhap'),
                            'rules' => 'trim'
                            ),
                        array(
                            'field' => 'hcgoc_nguoinhap',
                            'label' => lang('hcgoc_nguoinhap'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'hcgoc_baoquan',
                            'label' => lang('hcgoc_baoquan'),
                            'rules' => 'trim'
                            ),
                        array(
                            'field' => 'hcgoc_dathang',
                            'label' => lang('hcgoc_dathang'),
                            'rules' => 'trim'
                            ),
                        array(
                            'field' => 'hcgoc_lab',
                            'label' => lang('hcgoc_lab'),
                            'rules' => 'trim|required'
                            ),
                                   
                      );
                
            // if id NULL then add new data
            if(!$id) {    
                      $this->form_validation->set_rules($config);
                      $this->form_validation->set_error_delimiters('<small class="form-text text-muted c-red">', '</small>');
                      if ($this->form_validation->run() == TRUE) {
                          if ($this->input->post()) {
                              $this->chuangoc_model->save();
                              $this->session->set_flashdata('notify', notify('Thêm thành công','success'));
                              redirect('hoachat/chuangoc');
                          }
                      }else{ // If validation incorrect 
                          $this->add();
                      }
             }
             else{ // Update data if Form Edit send Post and ID available
                    $this->form_validation->set_rules($config);
                    $this->form_validation->set_error_delimiters('<small class="form-text text-muted c-red">', '</small>');
                    if ($this->form_validation->run() == TRUE)  {
                        if ($this->input->post())  {
                            $this->chuangoc_model->update($id);
                            $this->session->set_flashdata('notify', notify('Update thành công','success'));
                        }
                    } else{ // If validation incorrect 
                        $this->edit($id,  $hc_hethan);
                    }
             }
         }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('hoachat/chuangoc');
         }
    }
    
    /**
    * Delete chuangoc by ID
    *
    */
    public function ajax_action(){   
        $id = strip_tags($this->input->post('id', TRUE));
        $action = strip_tags($this->input->post('action', TRUE)) ? strip_tags($this->input->post('action', TRUE)) : strip_tags($this->input->get('action', TRUE));

        $output = new stdClass;
        $output->csrfName = $this->security->get_csrf_token_name();
        $output->csrfHash = $this->security->get_csrf_hash();
        $output->data = 0; $output->action =  $action;


        if ($this->ion_auth->logged_in() ) {//co the thay doi quyen
           if($this->menu->check_phanquyen("chuangoc_4")){
                if ($id>=0 AND $action == "del") {
                    $this->chuangoc_model->destroy($id);   $output->data = 1;       
                }
            }
            if($this->menu->check_phanquyen("chuangoc_1")){
                if ($id>=0 AND $action == "detail") {
                    $output->data = $this->chuangoc_model->get_one($id);     
                }
            }

            if($this->menu->check_phanquyen("chuangoc_3")){
                if ($id != "" AND $action == "dathang") {
                    $st = explode('_', $id);
                    $output->data = $this->chuangoc_model->update_dathang($st[0], $st[1]);       
                }
            }

        }

        if ($action == "autoten") {
                $output->data = $this->chuangoc_model->get_ten_hoachat();     
        }
        echo json_encode($output);
    }

    public function excel(){
        $this->load->library('export_excel');
        $this->export_excel->create('bvtv_hc_goc', 'hoachat_lang');
        //var_dump($this->create('sys_menu', 'menu'));
    }

    
}
?>