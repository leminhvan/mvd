<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Import Controller
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export_excel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('excel');
     }
    // upload xlsx|xls file
    public function create($table_name, $lang) {
        $data = array(); $name = array();
        $result = $this->db->select()->get($table_name);
        if ($result->num_rows() > 0) {
            $data =  $result->result_array();
        } 
        $title = $this->db->list_fields($table_name);
        $this->lang->load($lang);
        

        
        $k = 0;
        foreach ($title as $value) {
            if($k != 0){//bo qua id
                $name[] = lang($value);
            }
            $k++;
        }
       //Khởi tạo đối tượng
        $excel = new PHPExcel();
        //Chọn trang cần ghi (là số từ 0->n)
        $excel->setActiveSheetIndex(0);
        //Tạo tiêu đề cho trang. (có thể không cần)
        $excel->getProperties()->setCreator("Lab-BVTV")
                             ->setLastModifiedBy("Lab-BVTV")
                             ->setTitle("$table_name");

        $range = range("A", "Z"); 
        $end_char = ""; $end_i = 0;
        //Set chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight(
        for ($i=0; $i<count($title) -1; $i++) {//bo qua cot id
            $excel->getActiveSheet()->getColumnDimension($range[$i])->setWidth(20);
            $end_char = $range[$i]; $end_i = $i;
        }
        
        //Set in đậm cho khoảng cột
        $excel->getActiveSheet()->getStyle('A1:'.$end_char.'1')->getFont()->setBold(true);
        //Tạo tiêu đề cho từng cột
        //Vị trí có dạng như sau:
        /**
         * |A1|B1|C1|..|n1|
         * |A2|B2|C2|..|n1|
         * |..|..|..|..|..|
         * |An|Bn|Cn|..|nn|
         */
        for ($i=0; $i <= $end_i; $i++) { 
           $excel->getActiveSheet()->setCellValue($range[$i].'1', $name[$i]);
        }
        // thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
        // dòng bắt đầu = 2
        $numRow = 2;
        foreach($data as $key => $val){
            for ($i=0; $i <= $end_i ; $i++) {//bo qua id
                $excel->getActiveSheet()->setCellValue($range[$i].$numRow, $val[$title[($i+1)]]);
            }
            $numRow++;
        }
        // Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
        // lưu file dưới dạng excel2007
        //***** PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('data.xlsx');
        //Đến trang dowload
        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        ob_end_clean(); //nho phai co dong nay, khong se bi loi
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="'.$table_name.'.xlsx"');
        $objWriter->save('php://output');
    }
}
?>