<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of bvtv_hc_goc
 * @created on : Monday, 21-May-2018 06:15:26
 * @author Le Minh Van
 * Copyright 2018
 */
 
 
class Chuangoc_model extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Lấy data pagination bvtv_hc_goc
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */

     public function get_all_pagination($perpage, $offset ) {
        $result = $this->db->select()->limit($perpage, $offset)->get('bvtv_hc_goc');

        if ($result->num_rows() > 0){
           return $result->result_array();
        } 
        else {
           return array();
        }
    }

    /**
     *  Lấy tất cả data  bvtv_hc_goc
     *
     */
    public function get_all_chuan() {
        $result = $this->db->get('bvtv_hc_goc');
        if ($result->num_rows() > 0)  {
            $re = array();
            $temp = $result->result_array();
            foreach ($temp as $key => $value) {
                if(substr_count($value['hcgoc_vicb_code'], 'St') >=1 ){
                    array_push($re, $value);
                }
            }
            return $re;
        } 
        else {
            return array();
        }
    }

     public function get_hoachat($key_search=FALSE) {
        $result = $this->db->get('bvtv_hc_goc');
        if ($result->num_rows() > 0)  {
            $re = array();
            $temp = $result->result_array();
            foreach ($temp as $key => $value) {
                if(substr_count($value['hcgoc_vicb_code'], $key_search) >=1  ){
                    array_push($re, $value);
                }
                
            }
            return $re;
        } 
        else {
            return array();
        }
    }

    public function get_all_donvi() {
            $result = $this->db->get('bvtv_donvi');
            if ($result->num_rows() > 0) {   
                $data = array();
                foreach($result->result_array() as $key => $value):
                   $data[$value['donvi_kyhieu']] =  $value['donvi_kyhieu'];
                endforeach;
                return $data;
            } else {
                return array();
            }
        }
    /**
     *  Lấy data theo nhiều id  bvtv_hc_goc
     *  id trên url dạng 1_2_3, chuyển sang mảng bằng explode()
     */

    public function get_multi($arr_id){
        $re = array();
        foreach ($arr_id as $key => $value) {
            $this->db->where('hcgoc_id', $value);
            $result = $this->db->get('bvtv_hc_goc');

            if ($result->num_rows() == 1){
                $re[$value] = $result->row_array();
            } 
        }

        if (count($re) > 0){
            return $re;
        } 
        else{
            return array();
        }
    }
    
    /**
     *  Đếm tổng row của  bvtv_hc_goc
     */
    public function count_total(){
        return $this->db->select()->get('bvtv_hc_goc')->num_rows();
    }
    
    /**
    *  Get One bvtv_hc_goc
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('hcgoc_id', $id);
        $result = $this->db->get('bvtv_hc_goc');

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }

    public function get_one_pphoachat($id) 
    {
        $this->db->where('id_pp', $id);
        $result = $this->db->get('bvtv_pphoachat');

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }

    
    
    
    /**
    *  Default form data bvtv_hc_goc
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'hcgoc_name' => '',
            
                'hcgoc_vicb_code' => '',
            
                'hcgoc_nhasx' => '',
            
                'hcgoc_code' => '',
            
                'hcgoc_lot' => '',
            
                'hcgoc_hamluong' => '',
            
                'hcgoc_luongnhap' => '',
                'hcgoc_donvi' => $this->get_all_donvi(),
            
                'hcgoc_expday' => '',
                'hcgoc_ngaynhap' => date('d-m-Y'),
            
                'hcgoc_nguoinhap' => '',
            
                'hcgoc_baoquan' => '',
                'hcgoc_lab' => '',
            
        );

        return $data;
    }

    
    
    /**
    *  Save data Post
    *
    *  @return void
    *
    */
    public function save() 
    {
        $data = array(
        
            'hcgoc_name' => strip_tags($this->input->post('hcgoc_name', TRUE)),
        
            'hcgoc_vicb_code' => strip_tags($this->input->post('hcgoc_vicb_code', TRUE)),
        
            'hcgoc_nhasx' => strip_tags($this->input->post('hcgoc_nhasx', TRUE)),
        
            'hcgoc_code' => strip_tags($this->input->post('hcgoc_code', TRUE)),
        
            'hcgoc_lot' => strip_tags($this->input->post('hcgoc_lot', TRUE)),
        
            'hcgoc_hamluong' => strip_tags($this->input->post('hcgoc_hamluong', TRUE)),
        
            'hcgoc_luongnhap' => strip_tags($this->input->post('hcgoc_luongnhap', TRUE)).'_'.strip_tags($this->input->post('hcgoc_donvi', TRUE)),
        
            'hcgoc_expday' => strip_tags($this->input->post('hcgoc_expday', TRUE)),
        
            'hcgoc_ngaynhap' => strip_tags($this->input->post('hcgoc_ngaynhap', TRUE)),
            'hcgoc_nguoinhap' => strip_tags($this->input->post('hcgoc_nguoinhap', TRUE)),
        
            'hcgoc_baoquan' => strip_tags($this->input->post('hcgoc_baoquan', TRUE)),
            'hcgoc_lab' => strip_tags($this->input->post('hcgoc_lab', TRUE)),
        
        );
        
        
        $this->db->insert('bvtv_hc_goc', $data);
    }
    
    
    

    
    /**
    *  Update modify data
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function update($id)
    {
        $data = array(
        
                'hcgoc_name' => strip_tags($this->input->post('hcgoc_name', TRUE)),
        
                'hcgoc_vicb_code' => strip_tags($this->input->post('hcgoc_vicb_code', TRUE)),
        
                'hcgoc_nhasx' => strip_tags($this->input->post('hcgoc_nhasx', TRUE)),
        
                'hcgoc_code' => strip_tags($this->input->post('hcgoc_code', TRUE)),
        
                'hcgoc_lot' => strip_tags($this->input->post('hcgoc_lot', TRUE)),
        
                'hcgoc_hamluong' => strip_tags($this->input->post('hcgoc_hamluong', TRUE)),
        
                'hcgoc_luongnhap' => strip_tags($this->input->post('hcgoc_luongnhap', TRUE)).'_'.strip_tags($this->input->post('hcgoc_donvi', TRUE)),
        
                'hcgoc_expday' => strip_tags($this->input->post('hcgoc_expday', TRUE)),
        
                'hcgoc_ngaynhap' => strip_tags($this->input->post('hcgoc_ngaynhap', TRUE)),
                'hcgoc_nguoinhap' => strip_tags($this->input->post('hcgoc_nguoinhap', TRUE)),
        
                'hcgoc_baoquan' => strip_tags($this->input->post('hcgoc_baoquan', TRUE)),
                'hcgoc_dathang' => strip_tags($this->input->post('hcgoc_dathang', TRUE)),
                'hcgoc_lab' => strip_tags($this->input->post('hcgoc_lab', TRUE)),
        
        );
        
        
        $this->db->where('hcgoc_id', $id);
        $this->db->update('bvtv_hc_goc', $data);
    }

    public function update_dathang($id, $status)
    {
        $data = array(
            'hcgoc_dathang' => $status,        
        );
        
        
        $this->db->where('hcgoc_id', $id);
        if($this->db->update('bvtv_hc_goc', $data)) {return TRUE;}else{return FALSE;}
    }

    
    
    
    /**
    *  Delete data by id
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function destroy($id)
    {       
        $this->db->where('hcgoc_id', $id);
        $this->db->delete('bvtv_hc_goc');
        
    }

    public function get_ten_hoachat()
    {
        $result = $this->db->query("SELECT tk_hoatchat FROM bvtv_tailieu_thamkhao");
        if ($result->num_rows() > 0) 
        {
            $a = array();
            $re = $result->result_array();
            foreach ($re as $key => $value) {
                array_push($a, $value['tk_hoatchat']);
            }
            return $a;
            
        } 
        else 
        {
            return array();
        }
    }

    public function get_pp_hc($pp_hc){
        #Dùng để lấy mảng hc từ pphuowng pháp
        # pp_hc có dạng: g_1,g_2,p_1,p_2,...
        $re = array();
        if($pp_hc != ''){
            $t1 = explode(',', $pp_hc);
            if(count($t1 > 0)){
                foreach ($t1 as $value) {
                    
                    if(substr_count($value, '_') >=1 ){
                        $t2 = explode('_', $value);
                        $t3 = $this->get_one($t2[1]);
                        $re['hcgoc'][] = $t3['hcgoc_name'];
                    }else{
                        $t3 = $this->get_one_pphoachat($value);
                        $re['hcgoc'][] = $t3['ten_pp'];
                    }
                }
            }
        }
        return $re;

    }
    



}
