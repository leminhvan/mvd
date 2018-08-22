<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Model 
{
    function __construct(){
        parent::__construct();
     }

    function build_menu(){
        $menu_out ='';
        $query = $this->db->query("SELECT * FROM sys_menu  ORDER BY menu_index ASC"); //lay data trong bang menu
        if ( $query->num_rows() > 0 )
        {
            $get_menu = $query->result_array(); //lay all record
            $parent = $this->get_menu_array(0, $get_menu); //lay ten nhom menu (parent_id = 0)

            //get sub_1
            $sub_1 = array();
            foreach ($parent as $value) {
                foreach ($get_menu as $value_1) {
                    if($this->check_menu_sub($value['menu_id'], $value_1['menu_parent_id']) AND $this->check_phanquyen($value_1['menu_id'])){
                        array_push($sub_1, $value_1);
                    }
                }
            }

             //get sub_2
            $sub_2 = array();
            if($sub_1 != NULL){
                foreach ($sub_1 as $value) {
                    foreach ($get_menu as $value_1) {
                        if($this->check_menu_sub($value['menu_id'], $value_1['menu_parent_id']) AND $this->check_phanquyen($value_1['menu_id'])){
                            array_push($sub_2, $value_1);
                        }
                    }
                }
            }

            
            //kiem tra sub cua parent
            foreach ($parent as $value) {//duyet qua tung parent
                $xuat_parent_sub_1 = array();
                $xuat_parent_sub_2 = array();
                if($sub_1 != NULL){
                    foreach ($sub_1 as $value_1) {
                         //kiem tra xem trong sub 1 co phan tu nao cua parent khong
                        if($this->check_menu_sub($value['menu_id'], $value_1['menu_parent_id'])){
                            array_push($xuat_parent_sub_1, $value_1);
                        }
                    }
                }
                
                //neu có sub_1, check tiếp trong mỗi pt sub 1 lấy ra được xem có pt con không
                if($xuat_parent_sub_1 != NULL){
                    foreach ($xuat_parent_sub_1 as $value_2) {
                        if($sub_2 != NULL){
                            foreach ($sub_2 as $value_3) {
                                 //kiem tra xem trong sub 2 co phan tu nao cua sub_1 khong
                                if($this->check_menu_sub($value_2['menu_id'], $value_3['menu_parent_id'])){
                                    array_push($xuat_parent_sub_2, $value_3);
                                }
                            }
                        }
                    }
                }
                //xuat ket qua, di tu ngon len
                if($xuat_parent_sub_2 != NULL){//co tat ca cac cap
                    //in parent
                    $menu_out .= '<li class="sub-menu">
                                      <a href="javascript:void(0);">'
                                        .$value['menu_icon'].' '.$value['menu_title'].'</a>
                                        <ul>';
                    //in sub_1
                    foreach ($xuat_parent_sub_1 as $key => $value_sub_1) {
                        $menu_out .= '<li >
                                          <a href="javascript:void(0);">'.$value_sub_1['menu_icon'].' '.$value_sub_1['menu_title'];
                        $check = FALSE;
                        foreach ($xuat_parent_sub_2 as $key => $v) {
                            if($v['menu_parent_id'] == $value_sub_1['menu_id']){
                                $check = TRUE; //keim tra xem sub_1 co sub_2 k
                            }
                        }
                        if($check){
                            $menu_out .= '</a>
                                      <ul >';
                        }else{
                            $menu_out .= '</a>
                                      <ul>';
                        }

                        //in sub_2
                        foreach ($xuat_parent_sub_2 as $key => $value_sub_2) {
                            if($value_sub_2['menu_parent_id'] == $value_sub_1['menu_id']){
                                $menu_out .= '<li><a href="'.site_url($value_sub_2['menu_url']).'">'.$value_sub_2['menu_icon'].' '.$value_sub_2['menu_title'].'</a></li>';
                            }
                        }
                        $menu_out .=' </ul>
                                    </li>';
                    }                    
                    $menu_out .= '</ul>
                                </li>';
                }else{//nếu k có sub_2 thì chỉ cần in parent + sub_1
                    if($xuat_parent_sub_1 != NULL){//neu co parent va sub_1
                        //in parent
                        $menu_out .= '<li class="sub-menu">
                                              <a href="javascript:void(0);">'
                                                .$value['menu_icon'].' '.$value['menu_title'].'</a>
                                            <ul >';
                        //in sub_1
                        foreach ($xuat_parent_sub_1 as $key => $value_sub_1) {
                            $menu_out .= '<li><a href="'.site_url($value_sub_1['menu_url']).'">'.$value_sub_1['menu_icon'].' '.$value_sub_1['menu_title'].'</a></li>';
                        } 
                        $menu_out .= '</ul>
                                    </li>';     
                    }else{//neu chi co parent
                        $menu_out .= '<li>
                                        <a href="'.site_url($value['menu_url']).'">'
                                            .$value['menu_icon'].' '
                                            .$value['menu_title'].'</a>
                                    </li>';
                    }
                }
            }  //end duyet tung parent  
        }//end check query result
        return $menu_out;//json_encode($sub_2);//$menu_out;
    }//end function


    function get_menu_array($parent_id, $array){
        $array_menu = array();
        foreach ($array as $value) {
            if($value['menu_parent_id'] == $parent_id AND $this->check_phanquyen($value['menu_id'])){//AND $this->check_phanquyen($value['phanquyen'])
                array_push($array_menu, $value);
            }
        }
        return $array_menu;
    }

    function check_menu_sub($parent_id, $menu_parent_id){
        if($menu_parent_id == $parent_id){
            return TRUE;
        }
        return FALSE;
    }

    function check_phanquyen($str_check){//voi menu: menuid, co dang tenmodule_action
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->query("SELECT * FROM users WHERE id = '$user_id' ORDER BY id ASC"); //kiem tra nhom cua user
        if ( $query->num_rows() > 0 ){
            $get_user = $query->result_array();
            foreach ($get_user as $key => $value) {//lap qua tung phan tu, kiem tra xem co user_id nao khong
                $arr = explode(',', $value['phanquyen']);
                $check = explode('_', $str_check);
                $module_name = $check[0]; $action = 0; if(count($check) >1 ){$action = $check[1];}

                if($action == 0 ){//truong hop menu _0
                    foreach ($arr as $v) {
                        $c = explode('_', $v);
                        if($module_name == $c[0]){
                            return TRUE;
                        }
                    }
                }else{//truong hop module, co them them (_1), sua (_2), xoa (_3)
                    $module_id = NULL;
                    $query1 = $this->db->query("SELECT * FROM sys_menu WHERE module_name = '$module_name' ORDER BY module_name ASC"); //kiem tra nhom cua user
                    if ( $query->num_rows() > 0 ){
                        $get_module_id = $query1->result_array();
                        $module_id = $get_module_id[0]['menu_id'];
                        foreach ($arr as $v) {
                            $c = explode('_', $v);

                            if($module_id == $c[0] && $action == $c[1]){
                                return TRUE;
                            }
                        }
                    }
                    
                }
                    

                
            }
        }
        return FALSE;
    }
    

}

