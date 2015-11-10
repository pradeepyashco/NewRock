<?php
/*
Author: Daniel Gutierrez
Date: 9/18/12
Version: 1.0
*/

class Home extends MY_Controller{

function __construct() {
		parent::__construct();
		$this -> load -> library('session');
	}
	function index(){
		$data['main_content'] = 'index';
		$data['currentuser'] = $this -> session -> userdata('user_id');
		//$data['menu'] = 'menu';
		//$this->load->module('menu/menu');
		//$this->menu->index();
		
		$this->load->view('page', $data);
	}
		
}

?>