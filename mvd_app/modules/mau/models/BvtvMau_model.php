<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of bvtv_mau
 * @created on : Saturday, 18-Aug-2018 09:37:33
 * @author Le Minh Van
 * Copyright 2018
 */
 
 
class BvtvMau_model extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Lấy data pagination bvtv_mau
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */

    /**
     *  Lấy tất cả data  bvtv_mau
     *
     */
    public function get_all() {

        $result = $this->db->get('bvtv_mau');

        if ($result->num_rows() > 0)  {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }

    /**
     *  Lấy data theo nhiều id  bvtv_mau
     *  id trên url dạng 1_2_3, chuyển sang mảng bằng explode()
     */

    public function get_multi($arr_id){
        $re = array();
        foreach ($arr_id as $key => $value) {
            $this->db->where('mau_id', $value);
            $result = $this->db->get('bvtv_mau');

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
     *  Đếm tổng row của  bvtv_mau
     */
    public function count_total(){
        return $this->db->select()->get('bvtv_mau')->num_rows();
    }
    
    /**
    *  Get One bvtv_mau
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('mau_id', $id);
        $result = $this->db->get('bvtv_mau');

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
    *  Default form data bvtv_mau
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'chitieu' => '',
            
                'code' => '',
            
                'type' => '',
            
                'ngaynhan' => '',
            
                'ngaytra' => '',
            
                'trangthai' => '',
            
                'ketqua' => '',
            
                'donvi' => '',
            
                'dang' => '',
            
                'luutru' => '',
            
                'note' => '',
            
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
        
            'chitieu' => strip_tags($this->input->post('chitieu', TRUE)),
        
            'code' => strip_tags($this->input->post('code', TRUE)),
        
            'type' => strip_tags($this->input->post('type', TRUE)),
        
            'ngaynhan' => strip_tags($this->input->post('ngaynhan', TRUE)),
        
            'ngaytra' => strip_tags($this->input->post('ngaytra', TRUE)),
        
            'trangthai' => strip_tags($this->input->post('trangthai', TRUE)),
        
            'ketqua' => strip_tags($this->input->post('ketqua', TRUE)),
        
            'donvi' => strip_tags($this->input->post('donvi', TRUE)),
        
            'dang' => strip_tags($this->input->post('dang', TRUE)),
        
            'luutru' => strip_tags($this->input->post('luutru', TRUE)),
        
            'note' => strip_tags($this->input->post('note', TRUE)),
        
        );
        
        
        $this->db->insert('bvtv_mau', $data);
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
        
                'chitieu' => strip_tags($this->input->post('chitieu', TRUE)),
        
                'code' => strip_tags($this->input->post('code', TRUE)),
        
                'type' => strip_tags($this->input->post('type', TRUE)),
        
                'ngaynhan' => strip_tags($this->input->post('ngaynhan', TRUE)),
        
                'ngaytra' => strip_tags($this->input->post('ngaytra', TRUE)),
        
                'trangthai' => strip_tags($this->input->post('trangthai', TRUE)),
        
                'ketqua' => strip_tags($this->input->post('ketqua', TRUE)),
        
                'donvi' => strip_tags($this->input->post('donvi', TRUE)),
        
                'dang' => strip_tags($this->input->post('dang', TRUE)),
        
                'luutru' => strip_tags($this->input->post('luutru', TRUE)),
        
                'note' => strip_tags($this->input->post('note', TRUE)),
        
        );
        
        
        $this->db->where('mau_id', $id);
        $this->db->update('bvtv_mau', $data);
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
        $this->db->where('mau_id', $id);
        $this->db->delete('bvtv_mau');
        
    }

    



}
