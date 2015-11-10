<?php
/*
 Author: Pradeep Verma
 Date: 10/16/2015
 Version: 1.0
 */

 class Artists extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('users/user_model');
			$this -> load -> model('artist_model');
		$this -> load -> library('form_validation');
		$this -> load -> helper('date');
		$this -> load -> library('session');
	}

	function index() {
		if (!$this -> _is_logged_in()) {
			redirect('users/signin');
		}

		$data["users"] = $this -> user_model -> read();
		$data["users_fan"] = $this -> artist_model -> get_my_fan($this -> session -> userdata('user_id'));
		$data["users_super_fan"] = $this -> artist_model -> get_my_super_fan($this -> session -> userdata('user_id'));
		$data["users_profile_details"] = $this -> artist_model -> get_my_profile($this -> session -> userdata('user_id'));
		$data["users_uploads"] = $this -> artist_model -> get_my_uploads($this -> session -> userdata('user_id'));
		

		
		$data['main_content'] = 'dashboard';
		$this -> _member_area();
		$data['currentuser'] = $this -> userdata();
		$data['loggedinuser'] = $this -> _is_logged_in();	
		$data['loggedin_user'] = $this -> session -> userdata('user_name');
		$this -> load -> view('page', $data);
	}
	
		
function userdata() {
		if ($this -> _is_logged_in()) {
			return $this -> user_model -> user_by_id($this -> session -> userdata('user_id'));
		} else {
			return false;
		}
	}

	function get_artist_category() {
		return $this -> user_model -> get_artist_category();
	}

	function get_venue_types() {
		return $this -> user_model -> get_venue_types();
	}

	function _is_admin() {
		if ($this -> userdata() -> role === 1) {
			return true;
		} else {
			return false;
		}
	}
	
	function artist()
	{
	$data["user"] = $this -> user_model -> user_by_name($nicename);
		if ($data["user"]) {
			$data['main_content'] = 'dashboard';
			$data['currentuser'] = $this -> userdata();
			
			$this -> load -> view('page', $data);
		} else {
			show_404();
		}
	}
 }
