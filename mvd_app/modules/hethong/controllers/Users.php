<?php if (!defined('BASEPATH'))  exit('Không có quyền truy cập');

/**
 * Controller users
 * @created on : Thursday, 09-Aug-2018 10:31:36
 * @author Le Minh Van
 * Copyright 2018
 */

class Users extends CI_Controller{
  
    public function __construct(){
        parent::__construct();         
        $this->load->model('users_model');
        $this->load->library(array('form_validation'));
         $this->load->library('counter_visitor_online');
        $this->load->helper(array('form', 'url','notify_helper'));
        $this->lang->load('users');

        if (!$this->ion_auth->logged_in() OR !$this->ion_auth->is_admin()) {
            redirect('login');
        }
        $this->counter_visitor_online->UsersOnline();
    }
    

    /**
    * lấy tất cả row users
    *
    */
    public function index(){
        if($this->menu->check_phanquyen("users_1")){
            $this->data['userss']   = $this->users_model->get_all();
            $this->template->js_add('var csrfName = "'.$this->security->get_csrf_token_name().'";
                                var csrfHash = "'.$this->security->get_csrf_hash().'";
                                function ajax_action(id, action) {
                                    var data ={"id": id, "action": action}; data[csrfName] = csrfHash;
                                    var agrs = {
                                        url : "users/ajax_action", // gửi ajax đến file result.php
                                        type : "post", // chọn phương thức gửi là post
                                        dataType:"json", // dữ liệu trả về dạng text
                                        data : data,
                                        success : function (result){
                                            if(result.csrfName){ csrfName = result.csrfName; csrfHash = result.csrfHash;}
                                            if(result.data == 1 && result.action == "del"){
                                                $("#data_id_"+id).remove();
                                                swal({   
                                                    title: "Đã xóa!",   
                                                    timer: 1000,   
                                                    type: "success", 
                                                });   
                                            }
                                            if(result.data == 0 && result.action == "del"){
                                                swal("Lỗi", result.data, "error"); 
                                            }

                                            if(result.action == "deactive"){ 
                                                var id_new = id.split("_"); id_new[1] = result.user.status; id_new = id_new.join("_");
                                                $("span[data-id="+id+"]").attr("data-id", id_new);
                                                if(result.user.status == 0){
                                                    swal({   
                                                        title: "Đã tạm ngừng " +result.user.account,   
                                                        timer: 1000,   
                                                        type: "success", 
                                                    });

                                                    $("span[data-id="+id_new+"]").text("Ngừng hoạt động").removeClass("label-success").addClass("label-default");
                                                }
                                                if(result.user.status == 1){
                                                    swal({   
                                                        title: "Kích hoạt " +result.user.account + " thành công!",   
                                                        timer: 1000,   
                                                        type: "success", 
                                                    });
                                                    $("span[data-id="+id_new+"]").text("Hoạt động").removeClass("label-default").addClass("label-success");;
                                                }
                                                 
                                            }
                                            
                                            if(result.action == "detail"){
                                                var re = result.data;
                                                var tempalte = "";
                                                $.each(re ,function(key, val){
                                                    if(key == "username"|| key =="email" || key == "created_on" || key == "active"  || key == "first_name" || key =="gioitinh" || key =="sinhnhat" || key=="phone" || key=="avatar"){
                                                        if(key =="avatar"){
                                                            //val = "<img src=\''.base_url().'/uploads/"+re["username"]+"/avatar/"+ val + "\' width=\'50\' height=\'50\' alt=\'Chưa cập nhật\'/>";
                                                        }
                                                        if(key == "active"){
                                                            val = set_status(val);
                                                        }
                                                        if(key == "created_on"){
                                                            val = $.date(new Date(val*1000), "-");
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
                                        var title_name = ["Tên tài khoản", "Email", "Ngày tạo", "Trạng thái", "Tên", "Giới tính", "Sinh nhật", "Điện thoại", "Ảnh đại diện"];
                                        var title_key = ["username", "email", "created_on", "active", "first_name", "gioitinh", "sinhnhat", "phone", "avatar"];
                                        var index = $.inArray(key , title_key);
                                        return title_name[index];
                                    }

                                    function set_status(val){
                                        var st = "Ngừng hoạt động";
                                        if(val == 1){st = "Hoạt động";}
                                        return st;
                                    }

                                }', "embed");
            
            if($this->session->flashdata('notify') != NULL){
                $this->template->js_add("notify('".$this->session->flashdata('notify')['message']."', '".$this->session->flashdata('notify')['type']."');",'embed');
            }
            $this->template->load('index', 'user/view',$this->data);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('dashboard');
        }
    }

    

    /**
    * Tạo mới data cho users
    *
    */
    public function add() {
        if($this->menu->check_phanquyen("users_2")){
            $this->template->js_add("assets/vendors/fileinput/fileinput.min.js","import");
            $this->template->js_add('assets/vendors//pwstrength/pwstrength.min.js','import');

            $this->data['users']           = $this->users_model->add();
            $this->data['action']            = 'hethong/users/save';
            $this->load->model('menu_model');
            $temp =  $this->menu_model->get_all(); $re = array();
            foreach ($temp as $key => $value) {
                if($value['menu_parent_id'] == 0){
                    $re[] = $value;
                }
            }
            $i = 0; $sub = array();
            foreach ($re as $key => $value) {
                foreach ($temp as $k => $v) {
                    if($value['menu_id'] == $v['menu_parent_id']){
                        $re[$i]['sub'] = TRUE;
                        $sub[$value['menu_id']][] = $v;
                    }
                }
                $i++;
            }
            $this->data['get_module'] = $re; $this->data['sub'] = $sub;

            //them js va css
            // $this->template->js_add('','embed');    
          
            $this->template->load('index', 'user/form',$this->data);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('hethong/users');
        }
    }

    /**
    * Sửa data cho users
    *
    */
    public function edit($id='') {
        if($this->menu->check_phanquyen("users_3")){
            if ($id != ''){
                $this->template->js_add("assets/vendors/fileinput/fileinput.min.js","import");
                $this->template->js_add('assets/vendors//pwstrength/pwstrength.min.js','import');

                $this->data['users']      = $this->users_model->get_one($id);
                $this->data['action']       = 'hethong/users/save/' . $id;           
                $this->load->model('menu_model');
                $temp =  $this->menu_model->get_all(); $re = array();
                foreach ($temp as $key => $value) {
                    if($value['menu_parent_id'] == 0){
                        $re[] = $value;
                    }
                }
                $i = 0; $sub = array();
                foreach ($re as $key => $value) {
                    foreach ($temp as $k => $v) {
                        if($value['menu_id'] == $v['menu_parent_id']){
                            $re[$i]['sub'] = TRUE;
                            $sub[$value['menu_id']][] = $v;
                        }
                    }
                    $i++;
                }
                $this->data['get_module'] = $re; $this->data['sub'] = $sub;
                    
                $this->template->load('index', 'user/form',$this->data);
            } else{
                $this->session->set_flashdata('notify', notify('Không thấy data','info'));
                redirect(site_url('hethong/users'));
            }
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('hethong/users');
        }
    }
    
    /**
    * Cập nhật database  users
    *
    */
    public function save($id =NULL){
        if($this->menu->check_phanquyen("users_3")){
            // validation config
            $config = array(
                        array(
                            'field' => 'username',
                            'label' => lang('username'),
                            'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'email',
                            'label' => lang('email'),
                            'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'first_name',
                            'label' => lang('first_name'),
                            'rules' => 'trim'
                            ),
                        array(
                            'field' => 'sinhnhat',
                            'label' => lang('sinhnhat'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'phone',
                            'label' => lang('phone'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'avatar',
                            'label' => lang('avatar'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'gioitinh',
                            'label' => lang('gioitinh'),
                            'rules' => 'trim'
                            ),
                        
                        array(
                            'field' => 'phanquyen',
                            'label' => lang('phanquyen'),
                            'rules' => 'trim'
                            ),
                                   
                      );
                
            // if id NULL then add new data
            if(!$id) {    
                      $this->form_validation->set_rules($config);
                      if ($this->form_validation->run() == TRUE) {
                          if ($this->input->post()) {
                            $pq = $this->input->post('phanquyen');
                            for ($i=0; $i < count($pq) ; $i++) { 
                                if($pq[$i] == ""){
                                    array_splice($pq, $i, 1);
                                }
                            }
                            $pq = implode(',', $pq);
                            $data = array(
                                'username' => strip_tags($this->input->post('username', TRUE)),
                                'email' => strip_tags($this->input->post('email', TRUE)),                                                                                    
                                'first_name' => strip_tags($this->input->post('first_name', TRUE)),
                                'last_name' => strip_tags($this->input->post('last_name', TRUE)),
                                'sinhnhat' => strip_tags($this->input->post('sinhnhat', TRUE)),
                                'phone' => strip_tags($this->input->post('phone', TRUE)),
                                'gioitinh' => strip_tags($this->input->post('gioitinh', TRUE)),
                                'phanquyen' => $pq,
                                'avatar'    => $this->do_upload($this->input->post('username', TRUE)),
                            );
                            $this->users_model->save($data); 
                            $this->session->set_flashdata('notify', notify('Thêm thành công','success'));
                            redirect('hethong/users');
                          }
                      }else{ // If validation incorrect 
                          $this->add();
                      }
             }
             else{ // Update data if Form Edit send Post and ID available
                $config[] = array(
                            'field' => 'password',
                            'label' => lang('password'),
                            'rules' => 'trim|required'
                            );
                    $this->form_validation->set_rules($config);
                    if ($this->form_validation->run() == TRUE)  {
                        if ($this->input->post())  {
                            $pq = $this->input->post('phanquyen');
                            for ($i=0; $i < count($pq) ; $i++) { 
                                if($pq[$i] == ""){
                                    array_splice($pq, $i, 1);
                                }
                            }
                            $pq = implode(',', $pq);
                            $user          = $this->ion_auth->user($id)->row();
                            $check_upload = $this->do_upload($user->username, $user->avatar) ; 
                            $data = array(
                                'username' => strip_tags($this->input->post('username', TRUE)),
                                'email' => strip_tags($this->input->post('email', TRUE)),                                                                                    
                                'first_name' => strip_tags($this->input->post('first_name', TRUE)),
                                'last_name' => strip_tags($this->input->post('last_name', TRUE)),
                                'sinhnhat' => strip_tags($this->input->post('sinhnhat', TRUE)),
                                'phone' => strip_tags($this->input->post('phone', TRUE)),
                                'gioitinh' => strip_tags($this->input->post('gioitinh', TRUE)),
                                'phanquyen' => $pq,
                            );
                            if ($this->input->post('password')) {
                                $data['password'] = $this->input->post('password');
                            }
                            if($check_upload){
                                $data['avatar'] = $check_upload;
                            }
                            if($this->ion_auth->update($user->id, $data)){
                                $this->session->set_flashdata('notify', notify('Cập nhật thành công','success'));
                                redirect('hethong/users', 'refresh');
                            }
                            else{
                                $this->session->set_flashdata('notify', notify('Xảy ra lỗi','warning'));
                                //redirect('users', 'refresh');
                            }
                        }
                    } else{ // If validation incorrect 
                        $this->edit($id);
                    }
             }
         }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('hethong/users');
        }
    }
    
    public function profile($id)
    {
        
        /* Data */
        $id = (int) $id;

        $this->data['user_info'] = $this->ion_auth->user($id)->result();
        foreach ($this->data['user_info'] as $k => $user)
        {
            $this->data['user_info'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }

        $this->template->js_add('var csrfName = "'.$this->security->get_csrf_token_name().'";
                                var csrfHash = "'.$this->security->get_csrf_hash().'";
                                function ajax_action(id, action, update_data) {
                                    var data ={"id": id, "action": action}; data[csrfName] = csrfHash; data["update_data"] = JSON.stringify(update_data);
                                    var agrs = {
                                        url : "'.base_url().'hethong/users/ajax_action", // gửi ajax đến file result.php
                                        type : "post", // chọn phương thức gửi là post
                                        dataType:"json", // dữ liệu trả về dạng text
                                        data : data,
                                        success : function (result){
                                            if(result.csrfName){ csrfName = result.csrfName; csrfHash = result.csrfHash;}
                                            if(result.action == "update" ){
                                                if(result.data == 1){
                                                    swal({   
                                                        title: "Đã cập nhật!",   
                                                        timer: 1000,   
                                                        type: "success", 
                                                    });
                                                    $("#first_name_id").html(update_data[0]["first_name"]);
                                                    $("#sinhnhat_id").html(update_data[0]["sinhnhat"]);
                                                    $("#phone_id").html(update_data[0]["phone"]);
                                                    $("#email_id").html(update_data[0]["email"]);
                                                    $("#phone_id_").html(update_data[0]["phone"]);
                                                    $("#email_id_").html(update_data[0]["email"]);
                                                    $("#gioitinh_id").html(update_data[0]["gioitinh"]);
                                                    $(".pmb-block").removeClass("toggled");//quay lại
                                                }else{
                                                    swal({   
                                                        title: "Có lỗi xảy ra, xin thử lại!",   
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
        $this->template->js_add('$("#profile_edit").on("click", function(){
                                    var email = $("#email").val(); var first_name = $("#first_name").val(); console.log(email);
                                    if(email != "" && first_name != ""){
                                        var data = [{first_name: first_name, gioitinh: $("input:checked").val(), sinhnhat :$("#sinhnhat").val(), phone: $("#phone").val(), email: email}];
                                        ajax_action('.$id.', "update", data);
                                    }
                                    if(email == ""){
                                        $("#email").parent("div").parent("div").addClass("has-error");
                                        $("#email").parent("div").next("small").show();
                                    }else{
                                        $("#email").parent("div").parent("div").removeClass("has-error");
                                        $("#email").parent("div").next("small").hide();
                                    }
                                    if(first_name == ""){
                                        $("#first_name").parent("div").parent("div").addClass("has-error");
                                        $("#first_name").parent("div").next("small").show();
                                    }else{
                                        $("#first_name").parent("div").parent("div").removeClass("has-error");
                                        $("#first_name").parent("div").next("small").hide();
                                    }
                                });', "embed");
        /* Load Template */
        $this->template->load('index', 'user/profile', $this->data);
    }

    public function ajax_action(){   
        $id = strip_tags($this->input->post('id', TRUE));
        $action = strip_tags($this->input->post('action', TRUE));
        $output = new stdClass;
        $output->csrfName = $this->security->get_csrf_token_name();
        $output->csrfHash = $this->security->get_csrf_hash();
        $output->data = 0; $output->action = $action;

        if ($this->ion_auth->logged_in()) {//co the thay doi quyen
           if($this->menu->check_phanquyen("users_4")){
                if ($id>=0 AND $action == "del") {
                    $output->data = 1;  
                    $user   = $this->ion_auth->user($id)->row();
                    $this->ion_auth->delete_user($id);
                    $this->removeDirectory('./uploads/'.$user->username);
                }
            }
            if($this->menu->check_phanquyen("users_1")){
                if ($id>=0 AND $action == "detail") {
                    $output->data = $this->ion_auth->user($id)->row();        
                }
            }
            if($this->menu->check_phanquyen("users_3")){
                if ($id != "" AND $action == "deactive") {
                    $st = explode('_', $id); $re = FALSE; $user = FALSE;
                    if(count($st) >1){
                        $id_ = (int) $st[0]; $status = $st[1];

                        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()){
                            if($status == 1){
                                $re = $this->ion_auth->deactivate($id_);
                            }else{
                                $re = $this->ion_auth->activate($id);
                            }
                            $a = $this->ion_auth->user($id_)->row();
                            $user = array('account' =>$a->username, 'status' => $a->active, 'id' => $a->id);
                        }
                    }
                    $output->user = $user;
                    $output->data = $re; 
                }
            }
            

        }

        if ($this->ion_auth->logged_in()){ //sua thong tin ca nhan thi chi can dang nhap
            if (intval($id)>0 AND $action == "update") {
                $output->action = $action; 
                $str = $this->input->post('update_data', TRUE) ? strip_tags($this->input->post('update_data', TRUE)) : "";
                $data_ = json_decode($str, true);
                if($data_[0]['first_name'] !="" AND $data_[0]['email'] !="" ){
                    if($this->ion_auth->update(intval($id), $data_[0])){
                        $output->data = 1;
                    } 
                }
            }
        }
        echo json_encode($output);

        
    }
     function do_upload($username, $old_avatar = FALSE)
    {
        if (!empty($_FILES['avatar']['name']) AND $_FILES['avatar']['size'] > 1 ) {
            $dir = './uploads/'.$username.'/avatar/';
            if(!is_dir($dir)){
                mkdir($dir, 0777, true);
            }

            if($old_avatar){
                unlink($dir.$old_avatar);
            }
            $config['upload_path'] = $dir;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['avatar']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (file_exists($dir.$config['file_name'])) {
                unlink($dir.$config['file_name']);
                if ($this->upload->do_upload('avatar')) {
                  $uploadData = $this->upload->data();
                  return $uploadData['file_name'];
                } 
            }else{
                if ($this->upload->do_upload('avatar')) {
                  $uploadData = $this->upload->data();
                  return $uploadData['file_name'];
                } 
            }
        }else{
           return FALSE;
        }
    }
    /**
     * Remove the directory and its content (all files and subdirectories).
     * @param string $dir the directory name
     */
    function removeDirectory($path) {
        if(is_dir($path)){
            $files = glob($path . '/*');
            foreach ($files as $file) {
                is_dir($file) ? $this->removeDirectory($file) : unlink($file);
            }
            rmdir($path);
        }
        //return;
    }

}
?>