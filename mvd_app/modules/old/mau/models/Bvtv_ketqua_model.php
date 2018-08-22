<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of bvtv_ketqua
 * @created on : Tuesday, 12-Jun-2018 01:48:56
 * @author Le Minh Van
 * Copyright 2018
 */
 
 
class Bvtv_ketqua_model extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Lấy data pagination bvtv_ketqua
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */

    /**
     *  Lấy tất cả data  bvtv_ketqua
     *
     */
    public function get_all() {

        $result = $this->db->get('bvtv_ketqua');

        if ($result->num_rows() > 0)  {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }

    /**
     *  Lấy data theo nhiều id  bvtv_ketqua
     *  id trên url dạng 1_2_3, chuyển sang mảng bằng explode()
     */

    public function get_multi($arr_id){
        $re = array();
        foreach ($arr_id as $key => $value) {
            $this->db->where('ketqua_id', $value);
            $result = $this->db->get('bvtv_ketqua');

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
     *  Đếm tổng row của  bvtv_ketqua
     */
    public function count_total(){
        return $this->db->select()->get('bvtv_ketqua')->num_rows();
    }
    
    /**
    *  Get One bvtv_ketqua
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('ketqua_id', $id);
        $result = $this->db->get('bvtv_ketqua');

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
    *  Default form data bvtv_ketqua
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'mau_id' => '',
            
                'chuan_id' => '',
            
                's_chuan1' => '',
            
                's_chuan2' => '',
            
                'm_mau' => '',
            
                'v_mau' => '',
            
                's_mau' => '',
            
                'hl_dk' => '',
            
                'ngay_tao' => '',
            
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
        
            'mau_id' => strip_tags($this->input->post('mau_id', TRUE)),
        
            'chuan_id' => strip_tags($this->input->post('chuan_id', TRUE)),
        
            's_chuan1' => strip_tags($this->input->post('s_chuan1', TRUE)),
        
            's_chuan2' => strip_tags($this->input->post('s_chuan2', TRUE)),
        
            'm_mau' => strip_tags($this->input->post('m_mau', TRUE)),
        
            'v_mau' => strip_tags($this->input->post('v_mau', TRUE)),
        
            's_mau' => strip_tags($this->input->post('s_mau', TRUE)),
        
            'hl_dk' => strip_tags($this->input->post('hl_dk', TRUE)),
        
            'ngay_tao' => strip_tags($this->input->post('ngay_tao', TRUE)),
        
        );
        
        
        $this->db->insert('bvtv_ketqua', $data);
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
        
                'mau_id' => strip_tags($this->input->post('mau_id', TRUE)),
        
                'chuan_id' => strip_tags($this->input->post('chuan_id', TRUE)),
        
                's_chuan1' => strip_tags($this->input->post('s_chuan1', TRUE)),
        
                's_chuan2' => strip_tags($this->input->post('s_chuan2', TRUE)),
        
                'm_mau' => strip_tags($this->input->post('m_mau', TRUE)),
        
                'v_mau' => strip_tags($this->input->post('v_mau', TRUE)),
        
                's_mau' => strip_tags($this->input->post('s_mau', TRUE)),
        
                'hl_dk' => strip_tags($this->input->post('hl_dk', TRUE)),
        
                'ngay_tao' => strip_tags($this->input->post('ngay_tao', TRUE)),
        
        );
        
        
        $this->db->where('ketqua_id', $id);
        $this->db->update('bvtv_ketqua', $data);
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
        $this->db->where('ketqua_id', $id);
        $this->db->delete('bvtv_ketqua');
        
    }

    



}
