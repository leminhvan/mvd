<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Counter_visitor extends CI_Model 
{
  private $count_restart;
    function __construct()
    {
        parent::__construct();
        
     }

    function count(){
        date_default_timezone_set('Asia/Ho_Chi_Minh'); //set mui gio, khong se bi sai
        $count_all = 0;
        $temp_count = array();
        $month_count_all = new DateTime();
        

        if($this->db->get('sys_counter')->num_rows() >0){//neu bang co it nhat 1 row thi lay row dau de lay total va nagy update
          $query = $this->db->query("SELECT * FROM sys_counter WHERE counter_id = 1"); //lay data trong bang
          $temp = $query->result_array();
          foreach ($temp as $key => $value) {
            $count_all = $value['count'];
            $month_count_all = new DateTime($value['timer']);
          }
        }else{//neu bang trong thi insert row dau 
           //them vao database
          $data = array(
                'count' => $count_all,
            ); 
          //insert de tang ngay
          $this->db->insert('sys_counter', $data);
          unset($data);
        }

        //luu vao database neu co dang nhap
       if(!isset($_SESSION['hasVisited'])){
          $_SESSION['hasVisited']="yes";
          $count =0;
          $sql_get_last_row = $this->db->query("SELECT * FROM sys_counter WHERE counter_id !=1 ORDER BY counter_id DESC LIMIT 1");

          if($sql_get_last_row->num_rows() >0){//neu da co dang nhap roi
            $temp = $sql_get_last_row->result_array(); 
            $count = $temp[0]['count'];
          }else{//neu chua co dang nhap nao

          }
          //them vao database
          $data = array(
                'count' => $count+ 1,
            ); 
          $this->db->insert('sys_counter', $data);

          //luon giu total count o id 1 , cap nhat moi khi co dang nhap
          $count_all = $count_all+ 1;
          $data = array(
                'count' => $count_all,
            ); 
          $this->db->where('counter_id', 1);
          $this->db->update('sys_counter', $data);
        }//end check sesion

        $day_now = date('d');
        $month_now = date('m');

        if($month_now != $month_count_all->format('m') AND $this->db->get('sys_counter')->num_rows() != 1){//neu hang thay doi va bang chua xoa data thi xoa data
          $temp_count = $this->counter_restart($count_all);
        }else{
          $temp_count = $this->count_day_month();
        }

        return array($count_all, $temp_count[0], $temp_count[1]);
    }//end function   

    public function count_day_month()
    {
      $count_month = 0; $count_day = 0;
      $query = $this->db->query("SELECT * FROM sys_counter WHERE counter_id != 1"); //lay data trong bang
       //dem so trong ngay
      $temp = $query->result_array();
      $day_now = date('d');
      $month_now = date('m');

      foreach ($temp as $key => $value) {
        $diff = new DateTime($value['timer']);
        if($day_now == $diff->format('d') ) {
          $count_day++;
        }
        $count_month++;
      }

      return array($count_month , $count_day);
    }


    public function counter_restart($count_all)
    {
      date_default_timezone_set('Asia/Ho_Chi_Minh'); //set mui gio, khong se bi sai
      $this->db->empty_table('sys_counter');
      $this->db->query("ALTER TABLE sys_counter AUTO_INCREMENT 1");
      $data = array(
          'count' => $count_all,
      ); 
      //isert de tang ngay
      $this->db->insert('sys_counter', $data);
      //them vao database
      $data = array(
            'count' => 1,
        ); 
      $this->db->insert('sys_counter', $data);

      //sau khi xoa, goi lai ham
      return $this->count_day_month();
    }
}

