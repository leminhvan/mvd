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

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('exportexcel');
    }

    // upload xlsx|xls file
    public function index() {
        $this->template->load('index', 'test/view');
    }

    public function save(){
        $this->exportexcel->create('sys_menu', 'menu');
        //var_dump($this->create('sys_menu', 'menu'));
    }
        
}
