<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of bvtv_mau
 * @created on : Wednesday, 06-Jun-2018 08:33:16
 * @author Le Minh Van
 * Copyright 2018
 */
 
 
class Bvtvmau_model extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function __destruct() {  
        $this->db->close();  
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

    public function get_nenmau() {

        $result = $this->db->get('bvtv_dangnenmau');

        if ($result->num_rows() > 0)  {
            $a = $result->result_array(); $re = array();
            foreach ($a as $key => $value) {
               $re[$value['nenmau_id']] = $value['kyhieu'];
            }
            return $re;
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

    public function get_one_phuongphap_name($pp_name)
    {
         $this->db->where('chitieu', $pp_name);
        $result = $this->db->get('bvtv_phuongphap');

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
                'mau_chitieu' => '',
                'mau_code' => '',
                'mau_ngaynhan' => '',
                'mau_ngaytra' => '',
                'mau_trangthai' => '',
                'mau_ketqua' => '',
                'mau_donvi' => '',
                'mau_dang' => '',
                'mau_luutru' => '',
                'mau_note' => '',
        );

        return $data;
    }

    /**
    *  Default form data bvtv_ketqua
    *  @return array
    *
    */
    public function add_ketqua()
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
            'mau_chitieu' => strip_tags($this->input->post('mau_chitieu', TRUE)),
            'mau_code' => strip_tags($this->input->post('mau_code', TRUE)),
            'mau_ngaynhan' => strip_tags($this->input->post('mau_ngaynhan', TRUE)),
            'mau_ngaytra' => strip_tags($this->input->post('mau_ngaytra', TRUE)),
            'mau_trangthai' => strip_tags($this->input->post('mau_trangthai', TRUE)),
            'mau_donvi' => strip_tags($this->input->post('mau_donvi', TRUE)),
            'mau_dang' => strip_tags($this->input->post('mau_dang', TRUE)),
            'mau_luutru' => strip_tags($this->input->post('mau_luutru', TRUE)),
            'mau_note' => strip_tags($this->input->post('mau_note', TRUE)),
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
       $temp =  $this->get_one($id);
       $mau_ketqua = null;
       $dv = $this->input->post('mau_donvi', TRUE);
       //if(count($temp > 0)){
            if($dv == $temp['mau_donvi']){
                $mau_ketqua = $temp['mau_ketqua'];
            }else{//xoa id ket qua trong bang kq
                $this->destroy_keyqua($temp['mau_ketqua']);
            }
       //}

        $data = array(
            'mau_chitieu' => strip_tags($this->input->post('mau_chitieu', TRUE)),
            'mau_code' => strip_tags($this->input->post('mau_code', TRUE)),
            'mau_ngaynhan' => strip_tags($this->input->post('mau_ngaynhan', TRUE)),
            'mau_ngaytra' => strip_tags($this->input->post('mau_ngaytra', TRUE)),
            'mau_trangthai' => strip_tags($this->input->post('mau_trangthai', TRUE)),
            'mau_ketqua' => $mau_ketqua, //phai tinh lai kq khi thay doi don vi
            'mau_donvi' => strip_tags($this->input->post('mau_donvi', TRUE)),
            'mau_dang' => strip_tags($this->input->post('mau_dang', TRUE)),
            'mau_luutru' => strip_tags($this->input->post('mau_luutru', TRUE)),
            'mau_note' => strip_tags($this->input->post('mau_note', TRUE)),
        );
        
        
        $this->db->where('mau_id', $id);
        $this->db->update('bvtv_mau', $data);
    }

    public function update_column($id, $data){
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


    public function get_one_ketqua($id) 
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

    public function get_one_nenmau($id) 
    {
        $this->db->where('nenmau_id', $id);
        $result = $this->db->get('bvtv_dangnenmau');

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
    *  Save data Post
    *
    *  @return void
    *
    */
    public function save_ketqua() 
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
            'dk_donvi' => strip_tags($this->input->post('dk_donvi', TRUE)),
            'ngay_tao' => strip_tags($this->input->post('ngay_tao', TRUE)),
            'kq_phantram' => strip_tags($this->input->post('kq_phantram', TRUE)) ? strip_tags($this->input->post('kq_phantram', TRUE)) : null,
        );
        $this->db->insert('bvtv_ketqua', $data);
        $data_mau = array('mau_ketqua' =>  $this->db->insert_id());
        $this->update_column($data['mau_id'], $data_mau);
    }
    
    
    

    
    /**
    *  Update modify data
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function update_ketqua($id)
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
                'dk_donvi' => strip_tags($this->input->post('dk_donvi', TRUE)),
                'ngay_tao' => strip_tags($this->input->post('ngay_tao', TRUE)),
                'kq_phantram' => strip_tags($this->input->post('kq_phantram', TRUE)) ? strip_tags($this->input->post('kq_phantram', TRUE)) : null,
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
    public function destroy_keyqua($id)
    {       
        $this->db->where('ketqua_id', $id);
        $this->db->delete('bvtv_ketqua');
        
    }


    



}
