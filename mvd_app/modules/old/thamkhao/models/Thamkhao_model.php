<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of bvtv_tailieu_thamkhao
 * @created on : Monday, 28-May-2018 14:14:43
 * @author Le Minh Van
 * Copyright 2018
 */
 
 
class Thamkhao_model extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Lấy data pagination bvtv_tailieu_thamkhao
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */

    /**
     *  Lấy tất cả data  bvtv_tailieu_thamkhao
     *
     */
    public function get_all() {

        $result = $this->db->get('bvtv_tailieu_thamkhao');

        if ($result->num_rows() > 0)  {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }

    /**
     *  Lấy data theo nhiều id  bvtv_tailieu_thamkhao
     *  id trên url dạng 1_2_3, chuyển sang mảng bằng explode()
     */

    public function get_multi($arr_id){
        $re = array();
        foreach ($arr_id as $key => $value) {
            $this->db->where('tk_id', $value);
            $result = $this->db->get('bvtv_tailieu_thamkhao');

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
     *  Đếm tổng row của  bvtv_tailieu_thamkhao
     */
    public function count_total(){
        return $this->db->select()->get('bvtv_tailieu_thamkhao')->num_rows();
    }
    
    /**
    *  Get One bvtv_tailieu_thamkhao
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('tk_id', $id);
        $result = $this->db->get('bvtv_tailieu_thamkhao');

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
    *  Default form data bvtv_tailieu_thamkhao
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'tk_code' => '',
            
                'tk_name' => '',
            
                'tk_sop' => '',
            
                'tk_chidinh' => '',
            
                'tk_phuongphap' => '',
            
                'tk_hoaly' => '',
            
                'tk_hoatchat' => '',
            
                'tk_link' => '',
            
                'tk_create' => '',
            
                'tk_user' => '',
            
                'tk_note' => '',
            
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
        $file = strtolower(strip_tags($this->input->post('tk_link', TRUE)));
        $tk_link = $this->do_upload($file);
        $data = array(
        
            'tk_code' => strip_tags($this->input->post('tk_code', TRUE)),
        
            'tk_name' => strip_tags($this->input->post('tk_name', TRUE)),
        
            'tk_sop' => strip_tags($this->input->post('tk_sop', TRUE)),
        
            'tk_chidinh' => strip_tags($this->input->post('tk_chidinh', TRUE)),
        
            'tk_phuongphap' => strip_tags($this->input->post('tk_phuongphap', TRUE)),
        
            'tk_hoaly' => strip_tags($this->input->post('tk_hoaly', TRUE)),
        
            'tk_hoatchat' => strip_tags($this->input->post('tk_hoatchat', TRUE)),
        
            'tk_link' => $tk_link,
        
            'tk_create' => strip_tags($this->input->post('tk_create', TRUE)),
        
            'tk_user' => strip_tags($this->input->post('tk_user', TRUE)),
        
            'tk_note' => strip_tags($this->input->post('tk_note', TRUE)),
        
        );
        
        
        $this->db->insert('bvtv_tailieu_thamkhao', $data);
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

        $a = $this->get_one($id);
        $file = strtolower(strip_tags($this->input->post('tk_link', TRUE)));
        $tk_link = $this->do_upload($file, $a[0]['tk_link']);
        $data = array(
        
                'tk_code' => strip_tags($this->input->post('tk_code', TRUE)),
        
                'tk_name' => strip_tags($this->input->post('tk_name', TRUE)),
        
                'tk_sop' => strip_tags($this->input->post('tk_sop', TRUE)),
                
                'tk_phuongphap' => strip_tags($this->input->post('tk_phuongphap', TRUE)),
        
                'tk_hoaly' => strip_tags($this->input->post('tk_hoaly', TRUE)),
        
                'tk_hoatchat' => strip_tags($this->input->post('tk_hoatchat', TRUE)),
                
                'tk_create' => strip_tags($this->input->post('tk_create', TRUE)),
        
                'tk_user' => strip_tags($this->input->post('tk_user', TRUE)),
        
                'tk_note' => strip_tags($this->input->post('tk_note', TRUE)),
        
        );
        if($this->input->post('tk_chidinh', TRUE)){$data['tk_chidinh'] = 1;}else{$data['tk_chidinh'] = 0;}
        if($tk_link ) {
            $data['tk_link'] = $tk_link;
        }
        
        $this->db->where('tk_id', $id);
        $this->db->update('bvtv_tailieu_thamkhao', $data);
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
        $this->db->where('tk_id', $id);
        $this->db->delete('bvtv_tailieu_thamkhao');
        
    }

    
public function do_upload($tailieu_name, $old_tk_link = FALSE)
    {
        if (!empty($_FILES['tk_link']['name']) AND $_FILES['tk_link']['size'] > 1 ) {
            $dir = './uploads/files/tltk/'.$tailieu_name;
            if(!is_dir($dir)){
                mkdir($dir, 0777, true);
            }

            if($old_tk_link){
                unlink($dir.$old_tk_link);
            }
            $config['upload_path'] = $dir;
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['file_name'] = $_FILES['tk_link']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (file_exists($dir.$config['file_name'])) {
                unlink($dir.$config['file_name']);
                if ($this->upload->do_upload('tk_link')) {
                  $uploadData = $this->upload->data();
                  return $uploadData['file_name'];
                } 
            }else{
                if ($this->upload->do_upload('tk_link')) {
                  $uploadData = $this->upload->data();
                  return $uploadData['file_name'];
                } 
            }
        }else{
           return FALSE;
        }
    }
    /**
     * Remove the directory and its content (all files and subdirectories).
     * @param string $dir the directory name
     */
    function removeDirectory($path) {
        if(is_dir($path)){
            $files = glob($path . '/*');
            foreach ($files as $file) {
                is_dir($file) ? $this->removeDirectory($file) : unlink($file);
            }
            rmdir($path);
        }
        //return;
    }


}
