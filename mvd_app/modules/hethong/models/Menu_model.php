<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of sys_menu
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 * Copyright 2018    
 */
 
 
class Menu_model extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data sys_menu
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all_pagination($perpage, $offset ) 
    {

        $result = $this->db->select()->limit($perpage, $offset)->get('sys_menu');

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    public function get_all() 
    {

        $result = $this->db->select()->get('sys_menu');

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    public function get_multi($arr_id) 
    {
        $re = array();
        foreach ($arr_id as $key => $value) {
            $this->db->where('menu_id', $value);
            $result = $this->db->get('sys_menu');

            if ($result->num_rows() == 1) 
            {
                $re[$value] = $result->row_array();
            } 
        }

        if (count($re) > 0) 
        {
            return $re;
        } 
        else 
        {
            return array();
        }
    }

    public function count_total()
    {
        return $this->db->select()->get('sys_menu')->num_rows();
    }
    
    
    /**
    *  Get One sys_menu
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('menu_id', $id);
        $result = $this->db->get('sys_menu');

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
    *  Default form data sys_menu
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'menu_title' => '',
            
                'menu_parent_id' => '',
            
                'menu_url' => '',
            
                'menu_index' => '',
            
                'menu_icon' => '',
            
                'module_name' => '',
            
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
        
            'menu_title' => strip_tags($this->input->post('menu_title', TRUE)),
        
            'menu_parent_id' => strip_tags($this->input->post('menu_parent_id', TRUE)),
        
            'menu_url' => strip_tags($this->input->post('menu_url', TRUE)),
        
            'menu_index' => strip_tags($this->input->post('menu_index', TRUE)),
        
            'menu_icon' => strip_tags($this->input->post('menu_icon', TRUE)),
        
            'module_name' => strip_tags($this->input->post('module_name', TRUE)),
        
        );
        
        
        $this->db->insert('sys_menu', $data);
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
        
                'menu_title' => strip_tags($this->input->post('menu_title', TRUE)),
        
                'menu_parent_id' => strip_tags($this->input->post('menu_parent_id', TRUE)),
        
                'menu_url' => strip_tags($this->input->post('menu_url', TRUE)),
        
                'menu_index' => strip_tags($this->input->post('menu_index', TRUE)),
        
                'menu_icon' => strip_tags($this->input->post('menu_icon', TRUE),'<i>'),
        
                'module_name' => strip_tags($this->input->post('module_name', TRUE)),
        
        );
        
        
        $this->db->where('menu_id', $id);
        $this->db->update('sys_menu', $data);
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
        $this->db->where('menu_id', $id);
        $this->db->delete('sys_menu');
        
    }







    



}
