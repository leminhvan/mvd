<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of users
 * @created on : Thursday, 09-Aug-2018 10:31:36
 * @author Le Minh Van
 * Copyright 2018
 */
 
 
class Users_model extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Lấy data pagination users
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */

    /**
     *  Lấy tất cả data  users
     *
     */
    public function get_all() {

        $result = $this->db->get('users');

        if ($result->num_rows() > 0)  {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }

    /**
     *  Lấy data theo nhiều id  users
     *  id trên url dạng 1_2_3, chuyển sang mảng bằng explode()
     */

    public function get_multi($arr_id){
        $re = array();
        foreach ($arr_id as $key => $value) {
            $this->db->where('id', $value);
            $result = $this->db->get('users');

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
     *  Đếm tổng row của  users
     */
    public function count_total(){
        return $this->db->select()->get('users')->num_rows();
    }
    
    /**
    *  Get One users
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('id', $id);
        $result = $this->db->get('users');

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
    *  Default form data users
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
                        
                'username' => '',
                'password' => '',            
                'email' => '',                                                                                    
                'first_name' => '',
                'last_name' => '',
                'sinhnhat' => '',
                'phone' => '',
                'avatar' => '',
                'gioitinh' => '',
                'phanquyen' => '',
        );

        return $data;
    }

    
    
    /**
    *  Save data Post
    *
    *  @return void
    *
    */
    public function save($data) 
    {
        $this->db->insert('users', $data);
    }
    
    
    

    
    /**
    *  Update modify data
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function update($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users', $data);
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
        $this->db->delete('users');
        
    }


    



}
