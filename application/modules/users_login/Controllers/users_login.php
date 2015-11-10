<?php
/*
 Author: Pradeep Verma
 Date: 10/16/2015
 Version: 1.0
 */

class Users_login extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('user_model');
		$this -> load -> library('form_validation');
		$this -> load -> helper('date');
		// Load session library
		$this -> load -> library('session');
	}

	function index() {
		$data['main_content'] = 'login';
		$this -> load -> view('page', $data);
	}

	/*login logout code */

	function signin() {

		if ($this -> _is_logged_in()) {
			redirect('');
		}
		// Retrieve session data
		$session_set_value = $this -> session -> all_userdata();
		if (isset($session_set_value['remember_me']) && $session_set_value['remember_me'] == "1") {
			redirect('');
		} else {
			$this -> form_validation -> set_rules('user_email', 'user_email', 'trim|required|xss_clean');
			$this -> form_validation -> set_rules('user_password', 'user_password', 'trim|required|xss_clean');
			if ($this -> form_validation -> run() == FALSE) {
				$data['main_content'] = 'signin';
				$this -> load -> view('page', $data);
			} else {
				$user_email = $this -> input -> post('user_email', true);
				$password = $this -> input -> post('user_password', true);
				$userdata = $this -> user_model -> validate($user_email, md5($password));
				if ($userdata) {
					if ($userdata -> status == 0) {
						$data['error'] = "Not validated!";
						$data['main_content'] = 'signin';
						$this -> load -> view('page', $data);
					} else {
						$remember = $this -> input -> post('remember_me');
						if ($remember) {
							// Set remember me value in session
							$this -> session -> set_userdata('remember_me', TRUE);
						}

						$data['user_id'] = $userdata -> user_id;
						$data['logged_in'] = true;
						$data['user_name'] = $userdata -> user_name;
						$this -> session -> set_userdata($data);
						//$this -> index();
						redirect('users');
						
					}
				} else {
					$data['error'] = "You shall not pass!";
					$data['main_content'] = 'signin';
					$this -> load -> view('page', $data);
				}

			}

		}
	}

	function logout() {
		$this -> session -> sess_destroy();
		redirect('');
	}

}
?>