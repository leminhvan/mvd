<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of groups
 * @created on : Wednesday, 23-May-2018 06:07:25
 * @author Le Minh Van
 * Copyright 2018
 */
 
 
class Groups_model extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Lấy data pagination groups
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */

     public function get_all_pagination($perpage, $offset ) {
        $result = $this->db->select()->limit($perpage, $offset)->get('groups');

        if ($result->num_rows() > 0){
           return $result->result_array();
        } 
        else {
           return array();
        }
    }

    /**
     *  Lấy tất cả data  groups
     *
     */
    public function get_all() {

        $result = $this->db->get('groups');

        if ($result->num_rows() > 0)  {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }

    /**
     *  Lấy data theo nhiều id  groups
     *  id trên url dạng 1_2_3, chuyển sang mảng bằng explode()
     */

    public function get_multi($arr_id){
        $re = array();
        foreach ($arr_id as $key => $value) {
            $this->db->where('id', $value);
            $result = $this->db->get('groups');

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
     *  Đếm tổng row của  groups
     */
    public function count_total(){
        return $this->db->select()->get('groups')->num_rows();
    }
    
    /**
    *  Get One groups
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('groups');

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
    *  Default form data groups
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'name' => '',
            
                'description' => '',
            
                'bgcolor' => '',
            
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
        
            'name' => strip_tags($this->input->post('name', TRUE)),
        
            'description' => strip_tags($this->input->post('description', TRUE)),
        
            'bgcolor' => strip_tags($this->input->post('bgcolor', TRUE)),
        
        );
        
        
        $this->db->insert('groups', $data);
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
        
                'name' => strip_tags($this->input->post('name', TRUE)),
        
                'description' => strip_tags($this->input->post('description', TRUE)),
        
                'bgcolor' => strip_tags($this->input->post('bgcolor', TRUE)),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('groups', $data);
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
        $this->db->delete('groups');
        
    }

    



}
