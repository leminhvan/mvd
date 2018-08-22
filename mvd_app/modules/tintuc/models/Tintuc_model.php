<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of tintuc_baiviet
 * @created on : Friday, 10-Aug-2018 08:47:51
 * @author Le Minh Van
 * Copyright 2018
 */
 
 
class Tintuc_model extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Lấy data pagination tintuc_baiviet
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */

    /**
     *  Lấy tất cả data  tintuc_baiviet
     *
     */
    public function get_all() {

        $this->db->select('tintuc_baiviet.id, tintuc_baiviet.id_dm, tintuc_baiviet.tieude, tintuc_baiviet.mota, tintuc_baiviet.thumbnail, tintuc_baiviet.noidung, tintuc_baiviet.id_tacgia, tintuc_baiviet.tukhoa, tintuc_baiviet.ngaytao, tintuc_baiviet.edit, tintuc_baiviet.trangthai, users.username, tintuc_danhmuc.ten_dm');
        $this->db->from('tintuc_baiviet');
        $this->db->join('users', 'users.id = tintuc_baiviet.id_tacgia', 'left');
        $this->db->join('tintuc_danhmuc', 'tintuc_danhmuc.id = tintuc_baiviet.id_dm', 'left');
        $result = $this->db->get();
        //$result = $this->db->get('tintuc_baiviet');

        if ($result->num_rows() > 0)  {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }

    /**
     *  Lấy data theo nhiều id  tintuc_baiviet
     *  id trên url dạng 1_2_3, chuyển sang mảng bằng explode()
     */

    public function get_multi($arr_id){
        $re = array();
        foreach ($arr_id as $key => $value) {
            $this->db->where('id', $value);
            $result = $this->db->get('tintuc_baiviet');

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
     *  Đếm tổng row của  tintuc_baiviet
     */
    public function count_total(){
        return $this->db->select()->get('tintuc_baiviet')->num_rows();
    }
    
    /**
    *  Get One tintuc_baiviet
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->select('tintuc_baiviet.id, tintuc_baiviet.id_dm, tintuc_baiviet.tieude, tintuc_baiviet.mota, tintuc_baiviet.thumbnail, tintuc_baiviet.noidung, tintuc_baiviet.id_tacgia, tintuc_baiviet.tukhoa, tintuc_baiviet.ngaytao, tintuc_baiviet.edit, tintuc_baiviet.trangthai, users.username, tintuc_danhmuc.ten_dm');
        $this->db->from('tintuc_baiviet');
        $this->db->join('users', 'users.id = tintuc_baiviet.id_tacgia', 'left');
        $this->db->join('tintuc_danhmuc', 'tintuc_danhmuc.id = tintuc_baiviet.id_dm', 'left');
        $this->db->where('tintuc_baiviet.id', $id);
        $result = $this->db->get();

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
    *  Default form data tintuc_baiviet
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'id_dm' => '',
            
                'tieude' => '',
            
                'mota' => '',
            
                'thumbnail' => '',
            
                'noidung' => '',
            
                'id_tacgia' => '',
            
                'tukhoa' => '',
            
                'ngaytao' => '',
            
                'edit' => '',
            
                'trangthai' => '',
            
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
        
            'id_dm' => strip_tags($this->input->post('id_dm', TRUE)),
        
            'tieude' => strip_tags($this->input->post('tieude', TRUE)),
        
            'mota' => strip_tags($this->input->post('mota', TRUE)),
        
            'thumbnail' => strip_tags($this->input->post('thumbnail', TRUE)),
        
            'noidung' => $this->input->post('noidung', TRUE),
        
            'id_tacgia' => strip_tags($this->input->post('id_tacgia', TRUE)),
        
            'tukhoa' => strip_tags($this->input->post('tukhoa', TRUE)),
                
            'edit' => strip_tags($this->input->post('edit', TRUE)),
        
            'trangthai' => strip_tags($this->input->post('trangthai', TRUE)),
        
        );
        
        
        $this->db->insert('tintuc_baiviet', $data);
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
        
                'id_dm' => strip_tags($this->input->post('id_dm', TRUE)),
        
                'tieude' => strip_tags($this->input->post('tieude', TRUE)),
        
                'mota' => strip_tags($this->input->post('mota', TRUE)),
        
                'thumbnail' => strip_tags($this->input->post('thumbnail', TRUE)),
        
                'noidung' => $this->input->post('noidung', TRUE),
        
                'id_tacgia' => strip_tags($this->input->post('id_tacgia', TRUE)),
        
                'tukhoa' => strip_tags($this->input->post('tukhoa', TRUE)),
                
                'edit' => strip_tags($this->input->post('edit', TRUE)),
        
                'trangthai' => strip_tags($this->input->post('trangthai', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('tintuc_baiviet', $data);
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
        $this->db->where('id', $id);
        $this->db->delete('tintuc_baiviet');
        
    }

    
    
    // get tintuc_danhmuc
    public function get_tintuc_danhmuc() 
    {
      
        $result = $this->db->get('tintuc_danhmuc')
                           ->result();

        $ret ['']= 'Chọn danh mục';
        if($result)
        {
            foreach ($result as $key => $row)
            {
                $ret [$row->id] = $row->ten_dm;
            }
        }
        
        return $ret;
    }


    



}
