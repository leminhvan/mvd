<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    var $data;
    private $head_title = 'Dashboard';
    private $box_title = 'Trạng thái';
    private $counter = array();

    function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }

        $this->load->helper('number');
        $this->load->model('dashboard_model');
        $this->load->library('counter_visitor');
        $this->load->library('counter_visitor_online');
        $this->counter_visitor_online->UsersOnline();
        //$this->counter_visitor_online->refresh();
    }

	public function index() {
        $this->data['head_title']      = $this->head_title;
        $this->data['box_title']      = $this->box_title;

         /* Data */
        $this->data['count_users']       = $this->dashboard_model->get_count_record('users');
        $this->data['count_groups']      = $this->dashboard_model->get_count_record('groups');
        $this->data['count_tltk']      = $this->dashboard_model->get_count_record('bvtv_tailieu_thamkhao');
        $this->data['counter']          = $this->counter_visitor->count();
        $this->data['online']          = $this->counter_visitor_online->getnumberOfUsers();
        
        $this->data['slide_img_link'] = $this->Get_ImagesToFolder();


        $this->load->library('user_agent');
        if ($this->agent->is_browser()) {
            $agent = $this->agent->platform().' '.$this->agent->browser().' '.$this->agent->version();
        }
        
       
        $this->data['agent'] = $agent;
            //$this->data['slide_img_link'] = $this->slide_show();
        $this->template->js_add("function notify(message, type){
                                    $.growl({
                                        message: message
                                    },{
                                        type: type,
                                        allow_dismiss: false,
                                        label: 'Cancel',
                                        className: 'btn-xs btn-inverse',
                                        placement: {
                                            from: 'top',
                                            align: 'right'
                                        },
                                        delay: 2500,
                                        animate: {
                                                enter: 'animated bounceIn',
                                                exit: 'animated bounceOut'
                                        },
                                        offset: {
                                            x: 20,
                                            y: 85
                                        }
                                    });
                                };", "embed");
        if($this->session->flashdata('notify') != NULL){
            $this->template->js_add("notify('".$this->session->flashdata('notify')['message']."', '".$this->session->flashdata('notify')['type']."');",'embed');
        }
        $this->template->load('index', 'view', $this->data);
    }

    function Get_ImagesToFolder(){
        $img_path = 'uploads/img/';
            # Đường dẫn tuyệt đối tới thư mục ảnh
        $dir = APPPATH.'../'.$img_path;
        $ImagesArray = [];
        $file_display = [ 'jpg', 'jpeg', 'png', 'gif' ];

        if (file_exists($dir) == false) {
            return ["Directory \'', $dir, '\' not found!"];
        } 
        else {
            $dir_contents = scandir($dir);
            foreach ($dir_contents as $file) {
                $file_type = pathinfo($file, PATHINFO_EXTENSION);
                if (in_array($file_type, $file_display) == true) {
                    $ImagesArray[] = base_url().$img_path.$file;
                }
            }
            return $ImagesArray;
        }
    }
}
