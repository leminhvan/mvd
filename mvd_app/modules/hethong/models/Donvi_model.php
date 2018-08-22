<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of bvtv_donvi
 * @created on : Monday, 28-May-2018 13:52:39
 * @author Le Minh Van
 * Copyright 2018
 */
 
 
class Donvi_model extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Lấy data pagination bvtv_donvi
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */

    /**
     *  Lấy tất cả data  bvtv_donvi
     *
     */
    public function get_all() {

        $result = $this->db->get('bvtv_donvi');

        if ($result->num_rows() > 0)  {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }

    /**
     *  Lấy data theo nhiều id  bvtv_donvi
     *  id trên url dạng 1_2_3, chuyển sang mảng bằng explode()
     */

    public function get_multi($arr_id){
        $re = array();
        foreach ($arr_id as $key => $value) {
            $this->db->where('donvi_id', $value);
            $result = $this->db->get('bvtv_donvi');

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
     *  Đếm tổng row của  bvtv_donvi
     */
    public function count_total(){
        return $this->db->select()->get('bvtv_donvi')->num_rows();
    }
    
    /**
    *  Get One bvtv_donvi
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('donvi_id', $id);
        $result = $this->db->get('bvtv_donvi');

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
    *  Default form data bvtv_donvi
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'donvi_kyhieu' => '',
            
                'donvi_mota' => '',
            
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
        
            'donvi_kyhieu' => strip_tags($this->input->post('donvi_kyhieu', TRUE)),
        
            'donvi_mota' => strip_tags($this->input->post('donvi_mota', TRUE)),
        
        );
        
        
        $this->db->insert('bvtv_donvi', $data);
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
        
                'donvi_kyhieu' => strip_tags($this->input->post('donvi_kyhieu', TRUE)),
        
                'donvi_mota' => strip_tags($this->input->post('donvi_mota', TRUE)),
        
        );
        
        
        $this->db->where('donvi_id', $id);
        $this->db->update('bvtv_donvi', $data);
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
        $this->db->where('donvi_id', $id);
        $this->db->delete('bvtv_donvi');
        
    }

    



}
