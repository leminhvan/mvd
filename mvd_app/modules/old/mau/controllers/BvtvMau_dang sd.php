<?php if (!defined('BASEPATH'))  exit('Không có quyền truy cập');

/**
 * Controller bvtvmau
 * @created on : Wednesday, 06-Jun-2018 08:33:16
 * @author Le Minh Van
 * Copyright 2018
 */

class Bvtvmau extends CI_Controller{
  
    public function __construct(){
        parent::__construct();         
        $this->load->model('bvtvmau_model');
        $this->load->library(array('form_validation'));
         $this->load->library('counter_visitor_online');
        $this->load->helper(array('form', 'url','notify_helper', 'bvtvfunctions'));
        $this->lang->load('bvtvmau');
        if (!$this->ion_auth->logged_in() OR !$this->ion_auth->is_admin()) {
            redirect('login');
        }
        $this->counter_visitor_online->UsersOnline();
        $this->donvi = array('%(w/w)' => '%(w/w)', '%(w/v)' => '%(w/v)', 'g/l' => 'g/l', 'g/kg' => 'g/kg');
    }
    

    /**
    * lấy tất cả row bvtvmau
    *
    */
    public function index(){
        if($this->menu->check_phanquyen("bvtvmau_1")){
            $this->data['bvtvmaus']   = array();
            $temp 					  = $this->bvtvmau_model->get_all();

            //lấy mẫu theo nhóm
            $arr_nhommau = array();
            foreach ($temp as $key => $value) {
            	$t = array(); $check = FALSE;
            	if(empty($arr_nhommau)){
            		$t[] = $value;
            	}else{
            		foreach ($arr_nhommau as $k => $v) {
            			foreach ($v as $key => $v1) {
            				if($v1['mau_code'] == $value['mau_code']){$check = TRUE;}
            			}
            		}            		
            	}
            	foreach ($temp as $k => $v) {
            			if(!$check AND $v['mau_code'] == $value['mau_code']){
	            			$t[] = $value;
	            		}
            		}
		        if(!empty($t)){array_push($arr_nhommau, $t);}
            }

            foreach ($temp as $key => $value) {
            	$trangthai = $this->convert_trangthai($value['mau_trangthai'], $value['mau_ngaytra']);
            	if($trangthai['trangthai_code'] != $value['mau_trangthai']){
            		$this->bvtvmau_model->update_column($value['mau_id'], array('mau_trangthai' => $trangthai['trangthai_code']));
            	}
            	$value['mau_dang'] = $this->get_nenmau($value['mau_dang']);
            	$value['mau_trangthai'] = $trangthai['trangthai_name'];
            	if($value['mau_ketqua'] == ''){
            		$value['mau_ketqua'] = '<a href="'.base_url('mau/bvtvmau/add_ketqua/'.$value['mau_id']).'" style="color: #009688; font-size: 18px;"><i class="md md-my-library-add"></i></a>';
            	}else{
            		$ketqua = $this->bvtvmau_model->get_one_ketqua($value['mau_ketqua']); //var_dump($ketqua);
            		$value['mau_ketqua'] = '<a href="'.base_url('mau/bvtvmau/edit_ketqua/'.$value['mau_id'].'/'.$value['mau_ketqua']).'" style="color: #009688; font-size: 18px;">'.$ketqua['kq_phantram'].'
            								</a>';
            	}
                if ($value['mau_luutru'] != NULL) {
                    $value['mau_luutru'] = $value['mau_luutru'].' &#8451;';
                }
                

            	//tinh thoi han luu mau dua vao chi tieu tra sau cung, thoi gan 3 thang


            	array_push($this->data['bvtvmaus'], $value);
            }
            //var_dump($arr_nhommau);
            $this->template->js_add('var csrfName = "'.$this->security->get_csrf_token_name().'";
                                    var csrfHash = "'.$this->security->get_csrf_hash().'";
                                    function ajax_action(id, action) {
                                        var data ={"id": id, "action": action}; data[csrfName] = csrfHash;
                                        var agrs = {
                                            url : "'.base_url().'mau/bvtvmau/ajax_action", // gửi ajax đến file result.php
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
            $this->template->js_add('$("#add-more").on("click", function(){
										var favDrink = prompt("Số lượng cần nhập: ", "3");
										if(favDrink > 0){
											$("#add-more > a").attr("href", "'.base_url('mau/bvtvmau/add_more?soluong=').'" + favDrink);
										}
						    		});', 'embed');   
            
            if($this->session->flashdata('notify') != NULL){
                $this->template->js_add("notify('".$this->session->flashdata('notify')['message']."', '".$this->session->flashdata('notify')['type']."');",'embed');
            }
            $this->template->load('index', 'view',$this->data);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('dashboard');
        }
    }

    function get_nenmau($code='')
    {
    	$a = $this->bvtvmau_model->get_one_nenmau($code);
    	return $a['kyhieu'];
    }

    function convert_trangthai($tragthai, $ngaytra){
    	$re = array();
    	if($tragthai != 1){
	    	$now = date('d-m-Y');
	    	$diff = (strtotime($ngaytra)-strtotime($now ))/86400 ;
	    	if($diff > 0 ){$trangthai = 0;}
	    	if($diff == 0){$trangthai = 2;} 
	    	if($diff < 0){$trangthai = 3;}
    	}else{
    		$trangthai = $tragthai_dau;
    	}

    	$re['trangthai_code'] = $trangthai;
    	switch ($trangthai) {
    		case 0:
    			$re['trangthai_name'] = '<span class="badge badge-pill bgm-cyan" > Còn '.$diff.' ngày </span>'; 
    			break;
    		case 1:
    			$re['trangthai_name'] = '<span class="badge badge-pill bgm-green"> Hoàn thành </span>';
    			break;
    		case 2:
    			$re['trangthai_name'] = '<span class="badge badge-pill bgm-deeporange"> Đến hạn </span>';
    			break;
    		case 3:
    			$re['trangthai_name'] = '<span class="badge badge-pill bgm-red"> Trễ hạn '.abs($diff).' ngày </span>';
    			break;
    	}
    	return $re;
    }

    

    /**
    * Tạo mới data cho bvtvmau
    *
    */
    public function add() {
        if($this->menu->check_phanquyen("bvtvmau_2")){
            $this->data['bvtvmau']           = $this->bvtvmau_model->add();
            $this->data['action']            = 'mau/bvtvmau/save';
            $this->data['donvi'] 			 = $this->donvi;
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
                                            	console.log(result);
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
                                    $("#mau_chitieu").typeahead({
                                      hint: true,
                                      highlight: true,
                                      minLength: 1
                                    },
                                    {
                                      name: "ten",
                                      source: ten
                                    });
                                        ', "embed"); 

             
          
            $this->template->load('index', 'form',$this->data);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('mau/bvtvmau');
        }
    }

    public function add_more($soluong = 3){
    	if($this->menu->check_phanquyen("bvtvmau_2")){
    		$this->data['soluong']			 = strip_tags($this->input->get('soluong', TRUE)) ? strip_tags($this->input->get('soluong', TRUE)) : $soluong;
    		$this->data['bvtvmau']           = $this->bvtvmau_model->add();
    		$this->data['donvi'] 			 = $this->donvi;
    		$this->data['nenmau']			 = $this->bvtvmau_model->get_nenmau();
            $this->data['action']            = 'mau/bvtvmau/save_more';
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
                                            ajax_action("", "autoten");
                                        });
                                    $(".autoten").typeahead({
                                      hint: true,
                                      highlight: true,
                                      minLength: 1
                                    },
                                    {
                                      name: "ten",
                                      source: ten
                                    });
                                        ', "embed"); 
    		$this->template->js_add('$("#chitieu-fill").on("click", function(){
						    			var val = $("input[name=\'mau_chitieu[]\']").val();
						    			$("input[name=\'mau_chitieu[]\']").each(function(index){
						    				$("input[name=\'mau_chitieu[]\']").val(val);
						    			})
						    			
						    		});', 'embed');
    		$this->template->js_add('$("#code-fill").on("click", function(){
						    			var val = $("input[name=\'mau_code[]\']:first-child").val();
						    			$("input[name=\'mau_code[]\']").each(function(index){
						    				$(this).val(val);
						    			})
						    			//console.log(val)
						    		});', 'embed');
    		$this->template->js_add('$("#date-fill").on("click", function(){
						    			var val = $("input[name=\'mau_ngaytra[]\']:first-child").val();
						    			$("input[name=\'mau_ngaytra[]\']").each(function(index){
						    				$(this).val(val);
						    			})
						    			//console.log(val)
						    		});', 'embed');
    		$this->template->js_add('$("#donvi-fill").on("click", function(){
						    			var val = $("select[name=\'mau_donvi[]\']:first-child").val();
						    			$("select[name=\'mau_donvi[]\']").each(function(index){
						    				$(this).val(val);
						    			})
						    			//console.log(val)
						    		});', 'embed');
    		$this->template->load('index', 'addmore_form',$this->data);
    	}else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('mau/bvtvmau');
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
                $this->data['action']       = 'mau/bvtvmau/save/' . $id;           
               $this->data['donvi'] 		= $this->donvi;
                    
                $this->template->load('index', 'form',$this->data);
            } else{
                $this->session->set_flashdata('notify', notify('Không thấy data','info'));
                redirect(site_url('bvtvmau'));
            }
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('mau/bvtvmau');
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
                        array( 'field' => 'mau_chitieu', 'label' => lang('mau_chitieu'), 'rules' => 'trim|required' ),
                        array( 'field' => 'mau_code', 'label' => lang('mau_code'),'rules' => 'trim|required'),
                        array('field' => 'mau_ngaynhan','label' => lang('mau_ngaynhan'),'rules' => 'trim'),
                        array( 'field' => 'mau_ngaytra', 'label' => lang('mau_ngaytra'), 'rules' => 'trim|required'),
                        array( 'field' => 'mau_trangthai','label' => lang('mau_trangthai'), 'rules' => 'trim' ),
                        array('field' => 'mau_ketqua', 'label' => lang('mau_ketqua'),'rules' => 'trim'),
                        array('field' => 'mau_donvi', 'label' => lang('mau_donvi'), 'rules' => 'trim' ),
                        array( 'field' => 'mau_dang', 'label' => lang('mau_dang'), 'rules' => 'trim'),
                        array( 'field' => 'mau_luutru', 'label' => lang('mau_luutru'), 'rules' => 'trim'),
                        array( 'field' => 'mau_note', 'label' => lang('mau_note'), 'rules' => 'trim'),
                      );
                
            // if id NULL then add new data
            if(!$id) {    
                      $this->form_validation->set_rules($config);
                      if ($this->form_validation->run() == TRUE) {
                          if ($this->input->post()) {
                              $this->bvtvmau_model->save();
                              $this->session->set_flashdata('notify', notify('Thêm thành công','success'));
                              redirect('mau/bvtvmau');
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
                            redirect('mau/bvtvmau');
                        }
                    } else{ // If validation incorrect 
                        $this->edit($id);
                    }
             }
         }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('mau/bvtvmau');
        }
    }

     public function save_more($id =NULL){
        if($this->menu->check_phanquyen("bvtvmau_3")){
        	$data = $this->input->post();
        	$soluong = count($data['mau_chitieu']); 
        	for ($i=0; $i < $soluong; $i++) { 
        		$temp = array();
        		foreach ($data as $key => $value) {  
        			if ($data['mau_chitieu'][$i] != '' AND $data['mau_code'][$i] != '' AND $data['mau_ngaytra'][$i] != '' ) {
        				$temp[$key] = $data[$key][$i];
        			}else{
        				$this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
        				$this->add_more($soluong);
        			}
        		}
        		if(count($temp) > 0){$this->db->insert('bvtv_mau', $temp);}
        	}
            $this->session->set_flashdata('notify', notify('Thêm thành công','success'));
            redirect('mau/bvtvmau');

           /* 
                
            // if id NULL then add new data
            if(!$id) {    
                      $this->form_validation->set_rules($config);
                      if ($this->form_validation->run() == TRUE) {
                          if ($this->input->post()) {
                              $this->bvtvmau_model->save();
                              $this->session->set_flashdata('notify', notify('Thêm thành công','success'));
                              redirect('mau/bvtvmau');
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
                            redirect('mau/bvtvmau');
                        }
                    } else{ // If validation incorrect 
                        $this->edit($id);
                    }
             }*/
         }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('mau/bvtvmau');
        }
    }
    
    /**
    * Xóa bvtvmau by ID
    *
    */

     /**
    * Tạo mới data cho bvtv_ketqua
    *
    */
    public function add_ketqua($id = '') {
        if($this->menu->check_phanquyen("bvtvmau_3")){
            $this->data['bvtv_ketqua']           = $this->bvtvmau_model->add_ketqua();
            $this->data['action']            = 'mau/bvtvmau/save_ketqua/'.$id;
            $this->data['action_phachuan']   = 'mau/bvtvmau/save_phachuan/'.$id;
            $this->data['mau_id']			= $id;
            $t                     = $this->bvtvmau_model->get_one($id);
            $this->data['mau_dv_hl'] = $t['mau_donvi'];
            $this->data['donvi']			= $this->donvi;
 			$this->template->js_add('function tinh_kq(){
 										var mau_id = $("input[name=\'mau_id\'").val();
 										var sc1 = parseFloat($("#s_chuan1").val());
            							var sc2 = parseFloat($("#s_chuan2").val());
            							var mm = $("#m_mau").val();
            							var vm = $("#v_mau").val();
            							var sm = $("#s_mau").val();
            							var hl_dk = $("#hl_dk").val();
            							var dk_donvi = $("select[name=\'dk_donvi\'] :selected").attr("value");

            							var data ={"mau_id": mau_id, "sc": (sc1 + sc2)/2, "mm":mm, "vm":vm, "sm":sm, "hl_dk": hl_dk, "dk_donvi": dk_donvi, "action": "ketqua"}; 
                                        var agrs = {
                                            url : "'.base_url('mau/bvtvmau').'/ajax_action",
                                            type : "get",
                                            dataType:"json",
                                            data : data,
                                            success : function (result){
                                                if(result.action == "ketqua"){ ///Doi thanh chon chuan
                                                	console.log(result.data)
                                                	if(result.data[0] != false){
                                                		var re = "<input name=\'kq_phantram\' type=\'hidden\' value=\'" + result.data[0] + "\'/>";
                                                		re += "<p> Kết quả: ";
                                                		re += result.data[0].toFixed(3) + " " + result.data[1];
                                                		re += ", Đánh giá: " + result.data[2];
                                                		re += "</p>";                                                	
                                                    	$("#kq").html(re);
                                                	}
                                                	
                                                }
                                            }
                                        };
                                        $.ajax(agrs);
 									}', 'embed');
            $this->template->js_add('$(".tinh_kq").on("keyup", function(){
            							tinh_kq();
            						});

            						$("select[name=\'dk_donvi\']").on("change", function(){
            							tinh_kq();
            						});', 'embed');
            
            $this->template->load('index', 'ketqua/form',$this->data);
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('mau/bvtvmau');
        }
    }

    /**
    * Sửa data cho bvtv_ketqua
    *
    */
    public function edit_ketqua($id_mau='', $id='') {
        if($this->menu->check_phanquyen("bvtvmau_3")){
            if ($id != ''){
                $this->data['bvtv_ketqua']      = $this->bvtvmau_model->get_one_ketqua($id);
                $this->data['action']       = 'mau/bvtvmau/save_ketqua/' .$id_mau.'/'.$id;           
                $this->data['mau_id']           = $id_mau;
                $this->data['donvi']            = $this->donvi;
                
                $this->template->js_add('function tinh_kq(){
                                        var mau_id = $("input[name=\'mau_id\'").val();
                                        var sc1 = parseFloat($("#s_chuan1").val());
                                        var sc2 = parseFloat($("#s_chuan2").val());
                                        var mm = $("#m_mau").val();
                                        var vm = $("#v_mau").val();
                                        var sm = $("#s_mau").val();
                                        var hl_dk = $("#hl_dk").val();
                                        var dk_donvi = $("select[name=\'dk_donvi\'] :selected").attr("value");

                                        var data ={"mau_id": mau_id, "sc": (sc1 + sc2)/2, "mm":mm, "vm":vm, "sm":sm, "hl_dk": hl_dk, "dk_donvi": dk_donvi, "action": "ketqua"}; 
                                        var agrs = {
                                            url : "'.base_url('mau/bvtvmau').'/ajax_action",
                                            type : "get",
                                            dataType:"json",
                                            data : data,
                                            success : function (result){
                                                if(result.action == "ketqua"){ ///Doi thanh chon chuan
                                                    console.log(result.data)
                                                    if(result.data[0] != false){
                                                        var re = "<input name=\'kq_phantram\' type=\'hidden\' value=\'" + result.data[0] + "\'/>";
                                                        re += "<p> Kết quả: ";
                                                        re += result.data[0].toFixed(3) + " " + result.data[1];
                                                        re += ", Đánh giá: " + result.data[2];
                                                        re += "</p>";                                                   
                                                        $("#kq").html(re);
                                                    }
                                                    
                                                }
                                            }
                                        };
                                        $.ajax(agrs);
                                    }', 'embed');
            $this->template->js_add('tinh_kq();
                                    $(".tinh_kq").on("keyup", function(){
                                        tinh_kq();
                                    });

                                    $("select[name=\'dk_donvi\']").on("change", function(){
                                        tinh_kq();
                                    });', 'embed');

                $this->template->load('index', 'ketqua/form',$this->data);
            } else{
                $this->session->set_flashdata('notify', notify('Không thấy data','info'));
                redirect(site_url('mau/bvtvmau'));
            }
        }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('mau/bvtvmau');
        }
    }
    
    /**
    * Cập nhật database  bvtv_ketqua
    *
    */
    public function save_ketqua($id_mau='', $id =NULL){
        if($this->menu->check_phanquyen("bvtvmau_3")){
            // validation config
            $config = array(
                        array( 'field' => 'mau_id',  'label' => lang('mau_id'), 'rules' => 'trim|required' ),
                        array('field' => 'chuan_id', 'label' => lang('chuan_id'), 'rules' => 'trim|required'),
                        array(  'field' => 's_chuan1',  'label' => lang('s_chuan1'),'rules' => 'trim|required'),
                        array( 'field' => 's_chuan2', 'label' => lang('s_chuan2'),'rules' => 'trim|required' ),
                        array('field' => 'm_mau','label' => lang('m_mau'), 'rules' => 'trim|required'  ),
                        array( 'field' => 'v_mau', 'label' => lang('v_mau'),'rules' => 'trim|required'  ),
                        array( 'field' => 's_mau',   'label' => lang('s_mau'),'rules' => 'trim|required' ),
                        array(   'field' => 'hl_dk', 'label' => lang('hl_dk'),    'rules' => 'trim'),
                        array( 'field' => 'ngay_tao',  'label' => lang('ngay_tao'), 'rules' => 'trim|required'),
                      );
                
            // if id NULL then add new data
            if(!$id) {    
                      $this->form_validation->set_rules($config);
                      if ($this->form_validation->run() == TRUE) {
                          if ($this->input->post()) {
                              $this->bvtvmau_model->save_ketqua();
                              $this->session->set_flashdata('notify', notify('Thêm thành công','success'));
                              redirect('mau/bvtvmau');
                          }
                      }else{ // If validation incorrect 
                          $this->add_ketqua($id_mau);
                      }
             }
             else{ // Update data if Form Edit send Post and ID available
                    $this->form_validation->set_rules($config);
                    if ($this->form_validation->run() == TRUE)  {
                        if ($this->input->post())  {
                            $this->bvtvmau_model->update_ketqua($id);
                            $this->session->set_flashdata('notify', notify('Update thành công','success'));
                            redirect('mau/bvtvmau');
                        }
                    } else{ // If validation incorrect 
                        $this->edit_ketqua($id_mau, $id);
                    }
             }
         }else{
            $this->session->set_flashdata('notify', notify('Không có quyền truy cập','warning'));
            redirect('mau/bvtvmau');
        }
    }

    public function ajax_action(){   
        $id = strip_tags($this->input->post('id', TRUE)) ? strip_tags($this->input->post('id', TRUE)) : 0;
        $action = strip_tags($this->input->post('action', TRUE)) ? strip_tags($this->input->post('action', TRUE)) : strip_tags($this->input->get('action', TRUE));
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
            if ($action == "autoten") {
            	$this->load->model('hoachat/chuangoc_model');
                $output->data = $this->chuangoc_model->get_ten_hoachat();     
        	}

        	if($action == 'ketqua'){
        		//$temp1 =  strip_tags($this->input->get('chuan_id', TRUE));
        		//$chuan = $this->bvtvmau_model->get_chuan_info($temp1);
        		$mau_id = strip_tags($this->input->get('mau_id', TRUE));
        		$m_dv = $this->bvtvmau_model->get_one($mau_id);
        		$titrong = 1.0025;

        		$mc = 10; $vc = 10; $pc = 100;

        		$sc = $this->input->get('sc', TRUE);
        		$mm = $this->input->get('mm', TRUE);
        		$vm = $this->input->get('vm', TRUE);
        		$sm = $this->input->get('sm', TRUE);
        		$dk_donvi = $this->input->get('dk_donvi', TRUE);
        		$hl_dk = $this->input->get('hl_dk', TRUE);

        		$w_w = w_w($mc, $vc, $pc, $sc, $mm, $vm, $sm);
        		$w_v = w_v($w_w, $titrong);
        		$g_l = g_l($w_w, $titrong);
        		$g_kg = g_kg($w_w);

        		$arr_re = array();
        		switch ($m_dv['mau_donvi']) {
					case '%(w/w)':
						if($dk_donvi == 'g/l'){
							$arr_re = array($w_w, $m_dv['mau_donvi'], danh_gia_kq($dk_donvi, $hl_dk, $g_l));
						}
						if($dk_donvi == 'g/kg'){
							$arr_re = array($w_w, $m_dv['mau_donvi'], danh_gia_kq($dk_donvi, $hl_dk, $g_kg));
						}
						if($dk_donvi == '%(w/v)'){
							$arr_re = array($w_w, $m_dv['mau_donvi'], danh_gia_kq($dk_donvi, $hl_dk, $w_v));
						}
						if($dk_donvi == '%(w/w)'){
							$arr_re = array($w_w, $m_dv['mau_donvi'],danh_gia_kq($dk_donvi, $hl_dk, $w_w));
						}
						break;
					case '%(w/v)':
						if($dk_donvi == 'g/l'){
							$arr_re = array($w_w, $m_dv['mau_donvi'], danh_gia_kq($dk_donvi, $hl_dk, $g_l));
						}
						if($dk_donvi == '%(w/v)'){
							$arr_re = array($w_w, $m_dv['mau_donvi'], danh_gia_kq($dk_donvi, $hl_dk, $w_v));
						}
						if($dk_donvi == '%(w/w)'){
							$arr_re = array($w_w, $m_dv['mau_donvi'],danh_gia_kq($dk_donvi, $hl_dk, $w_w));
						}
						break;
					case 'g/l':
						if($dk_donvi == 'g/l'){
							$arr_re = array($w_w, $m_dv['mau_donvi'], danh_gia_kq($dk_donvi, $hl_dk, $g_l));
						}
						if($dk_donvi == '%(w/v)'){
							$arr_re = array($w_w, $m_dv['mau_donvi'], danh_gia_kq($dk_donvi, $hl_dk, $w_v));
						}
						if($dk_donvi == '%(w/w)'){
							$arr_re = array($w_w, $m_dv['mau_donvi'],danh_gia_kq($dk_donvi, $hl_dk, $w_w));
						}
						break;
					case 'g/kg':
						if($dk_donvi == 'g/kg'){
							$arr_re = array($w_w, $m_dv['mau_donvi'], danh_gia_kq($dk_donvi, $hl_dk, $g_kg));
						}
						if($dk_donvi == '%(w/w)'){
							$arr_re = array($w_w, $m_dv['mau_donvi'],danh_gia_kq($dk_donvi, $hl_dk, $w_w));
						}
						break;
				}
        		$output->data = $arr_re;// w_w($mc, $vc, $pc, $sc, $mm, $vm, $sm); danh_gia_kq('%(w/w)', 50, 52.50001)
        	}

        }
        echo json_encode($output);
    }
}
?>