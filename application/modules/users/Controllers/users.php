<?php
/*
 Author: Pradeep Verma
 Date: 10/16/2015
 Version: 1.0
 */

class Users extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('user_model');
		$this -> load -> library('form_validation');
		$this -> load -> helper('date');
		$this -> load -> library('session');
	}

	function index() {
		if (!$this -> _is_logged_in()) {
			redirect('users/signin');
		}

		$data["users"] = $this -> user_model -> read();
		$data['main_content'] = 'users';
		$this -> _member_area();
		$data['currentuser'] = $this -> userdata();
		$data['loggedinuser'] = $this -> _is_logged_in();
		$data['loggedin_user'] = $this -> session -> userdata('user_name');
		$this -> load -> view('page', $data);
	}

	/* Registration code */

	function signup() {
		if ($this -> _is_logged_in()) {
			$this -> index();
		}

		$data['categories'] = $this -> get_artist_category();
		$data['genre'] = $this -> user_model -> get_genre();
		$data['charity'] = $this -> user_model -> get_charity();
		$data['contires'] = $this -> user_model -> get_contires();

		if ($_POST) {

			$config = array( array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'trim|required|is_unique[users.user_name]'), array('field' => 'user_email_id', 'label' => 'E-mail', 'rules' => 'trim|required|valid_email|is_unique[users.user_email_id]'), array('field' => 'user_password', 'label' => 'Password', 'rules' => 'trim|required'), array('field' => 'user_password_confirm', 'label' => 'Confirm Password', 'rules' => 'trim|required|matches[user_password]'), array('field' => 'user_age', 'label' => 'user_age', 'rules' => 'trim'), array('field' => 'user_gender', 'label' => 'user_gender', 'rules' => 'trim'), array('field' => 'live_performer', 'label' => 'live_performer', 'rules' => 'trim'), array('field' => 'genre1', 'label' => 'genre1', 'rules' => 'trim'), array('field' => 'genre2', 'label' => 'genre2', 'rules' => 'trim'), array('field' => 'genre3', 'label' => 'genre3', 'rules' => 'trim'), array('field' => 'user_payoue_email', 'label' => 'user_payoue_email', 'rules' => 'trim|required'), array('field' => 'charity_type', 'label' => 'charity_type', 'rules' => 'trim'), array('field' => 'country', 'label' => 'country', 'rules' => 'trim|required'), array('field' => 'participate_venyou', 'label' => 'participate', 'rules' => 'trim'), array('field' => 'zipcode', 'label' => 'zipcode', 'rules' => 'trim|required'), array('field' => 'distanceliveperformance', 'label' => 'distanceliveperformance', 'rules' => 'trim'), array('field' => 'distancegoforevent', 'label' => 'distancegoforevent', 'rules' => 'trim'), array('field' => 'socialparticipation', 'label' => 'socialparticipation', 'rules' => 'trim'));

			$this -> form_validation -> set_rules($config);

			if ($this -> form_validation -> run() === false || $this -> getSession("notsaved") == "notsaved") {
				$data['error'] = validation_errors();
				$data['main_content'] = 'signup';
				$this -> load -> view('page', $data);
			} else {
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '100';
				$config['max_width'] = '1024';
				$config['max_height'] = '768';

				$this -> load -> library('upload', $config);

				$data['user']['user_name'] = $this -> input -> post('user_name', true);
				$data['user']['user_email_id'] = $this -> input -> post('user_email_id', true);
				$data['user']['user_password'] = md5($this -> input -> post('user_password', true));
				//$data['user']['user_type'] = $this -> input -> post('user_type', true);
				$data['user']['user_type'] = 'Artist';
				$data['user']['status'] = 0;
				$data['user']['login_count'] = 0;
				$data['user']['last_login'] = '';
				$datestring = "%Y:%m:%d";
				$time = time();
				$data['user']['date_added'] = mdate($datestring, $time);
				$data['user']['sub_type'] = $this -> input -> post('sub_type', true);
				$data['user']['invited_by'] = $this -> input -> post('invited_by', true);

				$data['user_meta']['user_age'] = $this -> input -> post('user_age', true);
				$data['user_meta']['user_gender'] = $this -> input -> post('user_gender', true);
				$data['user_meta']['artist_category'] = $this -> input -> post('artist_category', true);
				$data['user_meta']['live_performer'] = $this -> input -> post('live_performer', true);
				$data['user_meta']['genre1'] = $this -> input -> post('genre1', true);
				$data['user_meta']['genre2'] = $this -> input -> post('genre2', true);
				$data['user_meta']['genre3'] = $this -> input -> post('genre3', true);

				$data['user_meta']['distancegoforevent'] = $this -> input -> post('distancegoforevent', true);
				$data['user_meta']['distanceliveperformance'] = $this -> input -> post('distanceliveperformance', true);
				$data['user_meta']['socialparticipation'] = $this -> input -> post('socialparticipation', true);

				$data['user_meta']['artist_profile'] = $this -> input -> post('artist_profile', true);
				//$data['user_meta']['hidden_profile_img_filename'] = $this -> input -> post('hidden_profile_img_filename', true);

				$data['user_meta']['user_payoue_email'] = $this -> input -> post('user_payoue_email', true);
				$data['user_meta']['charity_type'] = $this -> input -> post('charity_type', true);
				$data['user_meta']['participate_venyou'] = $this -> input -> post('participate_venyou', true);
				$data['user_meta']['latitude'] = $this -> input -> post('latitude', true);
				$data['user_meta']['longitude'] = $this -> input -> post('longitude', true);

				$data['user_meta']['subscription_type'] = $this -> input -> post('subscription_type', true);
				$data['user_meta']['country'] = $this -> input -> post('country', true);
				$data['user_meta']['zipcode'] = $this -> input -> post('zipcode', true);
				$data['user_meta']['user_location'] = $this -> input -> post('fanzip', true);

				$activation_key = md5(mt_rand(0, 1000) . 'uniquefrasehere');
				$create = $this -> user_model -> create($data);

				if ($create) {

					//$data['mailsend'] = $this -> sendMail($data['user_email'], 'Confirmation', "Confirm your subscription <a href='users/activation/" . $data['user']['user_name'] . "'>Confirmar</a>" . $activation_key);

					$mymaildata["To"] = $data['user']['user_email_id']; ;
					$mymaildata["cc"] = "";
					$mymaildata["bcc"] = "";
					$mymaildata["subject"] = 'Signup Confirmation';
					//$mymaildata["message"] = "Confirm your subscription <a href='users/activation/". $data['user']['user_name']. "/".$activation_key  . "'>Confirmar</a>";
					$uname = $data['user']['user_name'];
					$segments = array('users', 'activatenow', $uname, $activation_key);
					$acturl = site_url($segments);
					$mymaildata["message"] = "Confirm your subscription by cliking <a href='" . $acturl . "'>Confirmar</a>";
					$data['mailsend'] = $this -> sendmailme($mymaildata);
					$data['message'] = $mymaildata["message"];
					$data['activate_user_name'] = $data['user']['user_name'];

					$data['main_content'] = 'artist_activation';
					$this -> load -> view('page', $data);

				} else {
					$ses['notsaved'] = TRUE;
					$this -> session -> set_userdata($ses);
					error_log("Un usuario no se pudo registrar");
				}
			}

			return;
		}
		$data['currentuser'] = $this -> userdata();

		$data['main_content'] = 'signup';
		$this -> load -> view('page', $data);
	}

	function fan_signup() {
		if ($this -> _is_logged_in()) {
			$this -> index();
		}

		$data['genre'] = $this -> user_model -> get_genre();
		$data['charity'] = $this -> user_model -> get_charity();
		$data['contires'] = $this -> user_model -> get_contires();

		if ($_POST) {

			$config = array( array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'trim|required|is_unique[users.user_name]'), array('field' => 'user_email_id', 'label' => 'E-mail', 'rules' => 'trim|required|valid_email|is_unique[users.user_email_id]'), array('field' => 'user_password', 'label' => 'Password', 'rules' => 'trim|required'), array('field' => 'user_password_confirm', 'label' => 'Confirm Password', 'rules' => 'trim|required|matches[user_password]'), array('field' => 'user_age', 'label' => 'user_age', 'rules' => 'trim'), array('field' => 'user_gender', 'label' => 'user_gender', 'rules' => 'trim'), array('field' => 'genre1', 'label' => 'genre1', 'rules' => 'trim'), array('field' => 'genre2', 'label' => 'genre2', 'rules' => 'trim'), array('field' => 'genre3', 'label' => 'genre3', 'rules' => 'trim'), array('field' => 'user_payoue_email', 'label' => 'user_payoue_email', 'rules' => 'trim|required'), array('field' => 'charity_type', 'label' => 'charity_type', 'rules' => 'trim'), array('field' => 'country', 'label' => 'country', 'rules' => 'trim|required'), array('field' => 'participate_venyou', 'label' => 'participate', 'rules' => 'trim'), array('field' => 'zipcode', 'label' => 'zipcode', 'rules' => 'trim|required'), array('field' => 'distancegoforevent', 'label' => 'distancegoforevent', 'rules' => 'trim'), array('field' => 'socialparticipation', 'label' => 'socialparticipation', 'rules' => 'trim'));

			$this -> form_validation -> set_rules($config);

			if ($this -> form_validation -> run() === false) {
				$data['error'] = validation_errors();
				$data['main_content'] = 'fan_signup';
				$this -> load -> view('page', $data);
			} else {
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '100';
				$config['max_width'] = '1024';
				$config['max_height'] = '768';

				$this -> load -> library('upload', $config);

				$data['user']['user_name'] = $this -> input -> post('user_name', true);
				$data['user']['user_email_id'] = $this -> input -> post('user_email_id', true);
				$data['user']['user_password'] = md5($this -> input -> post('user_password', true));
				$data['user']['user_type'] = 'Fan';
				$data['user']['status'] = 0;
				$data['user']['login_count'] = 0;
				$data['user']['last_login'] = '';
				$datestring = "%Y:%m:%d";
				$time = time();
				$data['user']['date_added'] = mdate($datestring, $time);
				$data['user']['sub_type'] = $this -> input -> post('sub_type', true);
				$data['user']['invited_by'] = $this -> input -> post('invited_by', true);
				$data['user_meta']['user_age'] = $this -> input -> post('user_age', true);
				$data['user_meta']['user_gender'] = $this -> input -> post('user_gender', true);
				$data['user_meta']['artist_category'] = $this -> input -> post('artist_category', true);
				$data['user_meta']['live_performer'] = $this -> input -> post('live_performer', true);
				$data['user_meta']['genre1'] = $this -> input -> post('genre1', true);
				$data['user_meta']['genre2'] = $this -> input -> post('genre2', true);
				$data['user_meta']['genre3'] = $this -> input -> post('genre3', true);
				$data['user_meta']['distancegoforevent'] = $this -> input -> post('distancegoforevent', true);
				$data['user_meta']['socialparticipation'] = $this -> input -> post('socialparticipation', true);

				$data['user_meta']['artist_profile'] = $this -> input -> post('artist_profile', true);
				//$data['user_meta']['hidden_profile_img_filename'] = $this -> input -> post('hidden_profile_img_filename', true);

				$data['user_meta']['user_payoue_email'] = $this -> input -> post('user_payoue_email', true);
				$data['user_meta']['charity_type'] = $this -> input -> post('charity_type', true);
				$data['user_meta']['participate_venyou'] = $this -> input -> post('participate_venyou', true);
				$data['user_meta']['latitude'] = $this -> input -> post('latitude', true);
				$data['user_meta']['longitude'] = $this -> input -> post('longitude', true);

				$data['user_meta']['subscription_type'] = $this -> input -> post('subscription_type', true);
				$data['user_meta']['country'] = $this -> input -> post('country', true);
				$data['user_meta']['zipcode'] = $this -> input -> post('zipcode', true);
				$data['user_meta']['user_location'] = $this -> input -> post('fanzip', true);

				$activation_key = md5(mt_rand(0, 1000) . 'uniquefrasehere');
				$data['user_meta']['activation_key'] = $activation_key;
				$create = $this -> user_model -> create($data);

				if ($create) {

					//$data['mailsend'] = $this -> sendMail($data['user_email'], 'Confirmation', "Confirm your subscription <a href='users/activation/" . $data['user']['user_name'] . "'>Confirmar</a>" . $activation_key);

					$mymaildata["To"] = $data['user']['user_email_id'];
					$mymaildata["cc"] = "";
					$mymaildata["bcc"] = "";
					$mymaildata["subject"] = 'Signup Confirmation';
					//$mymaildata["message"] = "Confirm your subscription <a href='users/activation/". $data['user']['user_name']. "/".$activation_key  . "'>Confirmar</a>";
					$uname = $data['user']['user_name'];
					$segments = array('users', 'activatenow', $uname, $activation_key);
					$acturl = site_url($segments);
					$mymaildata["message"] = "Confirm your subscription by cliking <a href='" . $acturl . "'>Confirmar</a>";
					$data['mailsend'] = $this -> sendmailme($mymaildata);
					$data['message'] = $mymaildata["message"];
					$data['activate_user_name'] = $data['user']['user_name'];

					$data['main_content'] = 'signup-success';
					$this -> load -> view('page', $data);

				} else {
					$ses['notsaved'] = TRUE;
					$this -> session -> set_userdata($ses);
					error_log("Un usuario no se pudo registrar");
				}
			}

			return;
		}
		$data['currentuser'] = $this -> userdata();

		$data['main_content'] = 'fan_signup';
		$this -> load -> view('page', $data);
	}

	function venue_signup() {
		if ($this -> _is_logged_in()) {
			$this -> index();
		}

		$data['venue_types'] = $this -> user_model -> get_venue_types();

		$data['genre'] = $this -> user_model -> get_genre();
		$data['charity'] = $this -> user_model -> get_charity();
		$data['contires'] = $this -> user_model -> get_contires();

		if ($_POST) {

			$config = array( array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'trim|required|is_unique[users.user_name]'), array('field' => 'user_email_id', 'label' => 'E-mail', 'rules' => 'trim|required|valid_email|is_unique[users.user_email_id]'), array('field' => 'user_password', 'label' => 'Password', 'rules' => 'trim|required'), array('field' => 'user_password_confirm', 'label' => 'Confirm Password', 'rules' => 'trim|required|matches[user_password]'), array('field' => 'user_age', 'label' => 'user_age', 'rules' => 'trim|required'), array('field' => 'user_gender', 'label' => 'user_gender', 'rules' => 'trim'), array('field' => 'venue_type', 'label' => 'venue_type', 'rules' => 'trim'), array('field' => 'venue_name', 'label' => 'venue_name', 'rules' => 'trim|required'), array('field' => 'venue_contact', 'label' => 'venue_contact', 'rules' => 'trim|required'), array('field' => 'venue_address1', 'label' => 'venue_address1', 'rules' => 'trim|required'), array('field' => 'venue_address2', 'label' => 'venue_address2', 'rules' => 'trim'), array('field' => 'venue_city', 'label' => 'venue_city', 'rules' => 'trim|required'), array('field' => 'venue_state', 'label' => 'venue_state', 'rules' => 'trim'), array('field' => 'country', 'label' => 'country', 'rules' => 'trim|required'), array('field' => 'zipcode', 'label' => 'zipcode', 'rules' => 'trim|required'), array('field' => 'user_payoue_email', 'label' => 'user_payoue_email', 'rules' => 'trim|required'), array('field' => 'charity_type', 'label' => 'charity_type', 'rules' => 'trim'), array('field' => 'artistnotificationdistance', 'label' => 'artistnotificationdistance', 'rules' => 'trim'), array('field' => 'subscription_type', 'label' => 'subscription_type', 'rules' => 'trim'));

			$this -> form_validation -> set_rules($config);

			if ($this -> form_validation -> run() === false) {
				$data['error'] = validation_errors();
				$data['main_content'] = 'venue_signup';
				$this -> load -> view('page', $data);
			} else {

				$data['user']['user_name'] = $this -> input -> post('user_name', true);
				$data['user']['user_email_id'] = $this -> input -> post('user_email_id', true);
				$data['user']['user_password'] = md5($this -> input -> post('user_password', true));
				$data['user']['user_type'] = 'Venue';
				$data['user']['status'] = 0;
				$data['user']['login_count'] = 0;
				$data['user']['last_login'] = '';
				$datestring = "%Y:%m:%d";
				$time = time();
				$data['user']['date_added'] = mdate($datestring, $time);
				$data['user']['sub_type'] = "";
				$data['user']['invited_by'] = $this -> input -> post('invited_by', true);

				$data['user_meta']['user_age'] = $this -> input -> post('user_age', true);
				$data['user_meta']['user_gender'] = $this -> input -> post('user_gender', true);
				$data['user_meta']['venue_name'] = $this -> input -> post('venue_name', true);
				$data['user_meta']['venue_contact'] = $this -> input -> post('venue_contact', true);
				$data['user_meta']['venue_address1'] = $this -> input -> post('venue_address1', true);
				$data['user_meta']['venue_address2'] = $this -> input -> post('venue_address2', true);
				$data['user_meta']['venue_city'] = $this -> input -> post('venue_city', true);
				$data['user_meta']['venue_state'] = $this -> input -> post('venue_state', true);
				$data['user_meta']['country'] = $this -> input -> post('country', true);
				$data['user_meta']['zipcode'] = $this -> input -> post('zipcode', true);
				$data['user_meta']['user_location'] = $this -> input -> post('fanzip', true);
				$data['user_meta']['venue_type'] = $this -> input -> post('venue_type', true);
				$data['user_meta']['artistnotificationdistance'] = $this -> input -> post('artistnotificationdistance', true);
				$data['user_meta']['user_payoue_email'] = $this -> input -> post('user_payoue_email', true);
				$data['user_meta']['charity_type'] = $this -> input -> post('charity_type', true);
				$data['user_meta']['subscription_type'] = $this -> input -> post('subscription_type', true);

				$activation_key = md5(mt_rand(0, 1000) . 'uniquefrasehere');
				$data['user_meta']['activation_key'] = $activation_key;
				$create = $this -> user_model -> create($data);

				if ($create) {

					//$data['mailsend'] = $this -> sendMail($data['user_email'], 'Confirmation', "Confirm your subscription <a href='users/activation/" . $data['user']['user_name'] . "'>Confirmar</a>" . $activation_key);

					$mymaildata["To"] = $data['user']['user_email_id']; ;
					$mymaildata["cc"] = "";
					$mymaildata["bcc"] = "";
					$mymaildata["subject"] = 'Signup Confirmation';
					//$mymaildata["message"] = "Confirm your subscription <a href='users/activation/". $data['user']['user_name']. "/".$activation_key  . "'>Confirmar</a>";
					//$acturl = base_url() . "index.php/users/activatenow/" . $data['user']['user_name'] . "/" . $activation_key;
					$uname = $data['user']['user_name'];
					$segments = array('users', 'activatenow', $uname, $activation_key);
					$acturl = site_url($segments);
					$mymaildata["message"] = "Confirm your subscription by cliking <a href='" . $acturl . "'>Confirmar</a>";
					$data['mailsend'] = $this -> sendmailme($mymaildata);
					$data['message'] = $mymaildata["message"];
					$data['activate_user_name'] = $data['user']['user_name'];

					$data['main_content'] = 'signup-success';
					$this -> load -> view('page', $data);

				} else {
					error_log("Un usuario no se pudo registrar");
				}
			}

			return;
		}
		$data['currentuser'] = $this -> userdata();

		$data['main_content'] = 'venue_signup';
		$this -> load -> view('page', $data);
	}

	/* Activation code */

	function activation() {
		if ($_POST) {

			$config = array( array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'trim|required|is_unique[users.user_name]'), array('field' => 'user_email_id', 'label' => 'E-mail', 'rules' => 'trim|required|valid_email|is_unique[users.user_email_id]'), array('field' => 'user_password', 'label' => 'Password', 'rules' => 'trim|required'), array('field' => 'user_password_confirm', 'label' => 'Confirm Password', 'rules' => 'trim|required|matches[user_password]'), array('field' => 'user_age', 'label' => 'user_age', 'rules' => 'trim'), array('field' => 'user_gender', 'label' => 'user_gender', 'rules' => 'trim'), array('field' => 'live_performer', 'label' => 'live_performer', 'rules' => 'trim'), array('field' => 'genre1', 'label' => 'genre1', 'rules' => 'trim'), array('field' => 'genre2', 'label' => 'genre2', 'rules' => 'trim'), array('field' => 'genre3', 'label' => 'genre3', 'rules' => 'trim'), array('field' => 'mpaudio_file', 'label' => 'mpaudio_file', 'rules' => 'trim'), array('field' => 'hidden_audio_filename', 'label' => 'hidden_audio_filename', 'rules' => 'trim'), array('field' => 'videofileup', 'label' => 'videofileup', 'rules' => 'trim'), array('field' => 'hidden_video_filename', 'label' => 'hidden_video_filename', 'rules' => 'trim'), array('field' => 'profile_img', 'label' => 'profile_img', 'rules' => 'trim'), array('field' => 'hidden_profile_img_filename', 'label' => 'hidden_profile_img_filename', 'rules' => 'trim'), array('field' => 'user_payoue_email', 'label' => 'user_payoue_email', 'rules' => 'trim|required'), array('field' => 'charity_type', 'label' => 'charity_type', 'rules' => 'trim'), array('field' => 'country', 'label' => 'country', 'rules' => 'trim|required'), array('field' => 'participate_venyou', 'label' => 'participate', 'rules' => 'trim'), array('field' => 'zipcode', 'label' => 'zipcode', 'rules' => 'trim|required'), array('field' => 'distancegoforevent', 'label' => 'distancegoforevent', 'rules' => 'trim'), array('field' => 'socialparticipation', 'label' => 'socialparticipation', 'rules' => 'trim'), array('field' => 'distanceliveperformance', 'label' => 'distanceliveperformance', 'rules' => 'trim'));
			$this -> form_validation -> set_rules($config);
			if ($this -> form_validation -> run() === false) {
				$data['error'] = validation_errors();
				$data['main_content'] = 'signup';
				$this -> load -> view('page', $data);
			} else {

				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '100';
				$config['max_width'] = '1024';
				$config['max_height'] = '768';

				$this -> load -> library('upload', $config);

				$data['user']['user_name'] = $this -> input -> post('user_name', true);
				$data['user']['user_email_id'] = $this -> input -> post('user_email_id', true);
				$data['user']['user_password'] = md5($this -> input -> post('user_password', true));
				$data['user']['user_type'] = 'Artist';
				$data['user']['status'] = 0;
				$data['user']['login_count'] = 0;
				$data['user']['last_login'] = '';
				$datestring = "%Y:%m:%d";
				$time = time();
				$data['user']['date_added'] = mdate($datestring, $time);
				$data['user']['sub_type'] = "";
				//$this -> input -> post('sub_type', true);
				$data['user']['invited_by'] = $this -> input -> post('invited_by', true);
				$data['user_meta']['user_age'] = $this -> input -> post('user_age', true);
				$data['user_meta']['user_gender'] = $this -> input -> post('user_gender', true);
				$data['user_meta']['artist_category'] = $this -> input -> post('artist_category', true);
				$data['user_meta']['live_performer'] = $this -> input -> post('live_performer', true);
				$data['user_meta']['genre1'] = $this -> input -> post('genre1', true);
				$data['user_meta']['genre2'] = $this -> input -> post('genre2', true);
				$data['user_meta']['genre3'] = $this -> input -> post('genre3', true);

				$data['user_meta']['distancegoforevent'] = $this -> input -> post('distancegoforevent', true);
				$data['user_meta']['distanceliveperformance'] = $this -> input -> post('distanceliveperformance', true);
				$data['user_meta']['socialparticipation'] = $this -> input -> post('socialparticipation', true);

				$data['user_meta']['artist_profile'] = $this -> input -> post('artist_profile', true);
				//$data['user_meta']['hidden_profile_img_filename'] = $this -> input -> post('hidden_profile_img_filename', true);

				$data['user_meta']['user_payoue_email'] = $this -> input -> post('user_payoue_email', true);
				$data['user_meta']['charity_type'] = $this -> input -> post('charity_type', true);
				$data['user_meta']['participate_venyou'] = $this -> input -> post('participate_venyou', true);
				$data['user_meta']['latitude'] = $this -> input -> post('latitude', true);
				$data['user_meta']['longitude'] = $this -> input -> post('longitude', true);

				$data['user_meta']['subscription_type'] = $this -> input -> post('subscription_type', true);
				$data['user_meta']['country'] = $this -> input -> post('country', true);
				$data['user_meta']['zipcode'] = $this -> input -> post('zipcode', true);
				$data['user_meta']['user_location'] = $this -> input -> post('fanzip', true);

				$activation_key = md5(mt_rand(0, 1000) . 'uniquefrasehere');
				$create = $this -> user_model -> create($data);

				if ($create) {

					//$data['mailsend'] = $this -> sendMail($data['user_email'], 'Confirmation', "Confirm your subscription <a href='users/activation/" . $data['user']['user_name'] . "'>Confirmar</a>" . $activation_key);
					$mymaildata["To"] = $data['user']['user_email_id']; ;
					$mymaildata["cc"] = "";
					$mymaildata["bcc"] = "";
					$mymaildata["subject"] = 'Signup Confirmation';
					//$mymaildata["message"] = "Confirm your subscription <a href='users/activation/". $data['user']['user_name']. "/".$activation_key  . "'>Confirmar</a>";
					$uname = $data['user']['user_name'];
					$segments = array('users', 'activatenow', $uname, $activation_key);
					$acturl = site_url($segments);
					$mymaildata["message"] = "Confirm your subscription by cliking <a href='" . $acturl . "'>Confirmar</a>";
					$data['mailsend'] = $this -> sendmailme($mymaildata);
					$data['message'] = $mymaildata["message"];
					$data['activate_user_name'] = $data['user']['user_name'];

					$datass['activate_user_name'] = $data['user']['user_name'];
					$this -> session -> set_userdata($datass);
					$data['main_content'] = 'artist_activation';
					$this -> load -> view('page', $data);

				} else {
					error_log("Un usuario no se pudo registrar");
				}
			}
		} else {

			$data['activate_user_name'] = $this -> session -> userdata('activate_user_name');
			$data['main_content'] = 'artist_activation';
			$this -> load -> view('page', $data);
		}

	}

	function activated() {
		$data['activate_user_name'] = $this -> input -> post('act_user_name', true);
		//$data['activate_user_id'] = $this -> uri -> segment(3, 0);
		$data['main_content'] = 'artist_activation';
		$this -> load -> view('page', $data);
	}

	function activatenow() {
		$actkey = 0;
		$actuname = "";

		if ($this -> uri -> segment(3) === FALSE) {
			$actuname = "";

		} else {
			$actuname = $this -> uri -> segment(3);

			if ($this -> uri -> segment(4) === FALSE) {
				$actkey = 0;
			} else {
				$actkey = $this -> uri -> segment(4);

			}

		}

		if ($actkey != 0) {

			if ($this -> user_model -> is_activated($actuname) == true) {
				$data['act_status'] = "Already Activated";
			} else {
				$data["users_act_val"] = $this -> user_model -> activatenow($actuname, $actkey);

				$data['activate_user_name'] = $actuname;
				if ($data["users_act_val"] == 1) {$data['act_status'] = "Success";
				} else {
					$data['act_status'] = "Success";

				}

			}

		} else {
			$data['act_status'] = "Failed";
		}

		$data['main_content'] = 'activation_success';
		$this -> load -> view('page', $data);
	}

	/* Email Code */

	function sendmailme($mymaildata) {
		$config = Array('mailtype' => 'html', 'charset' => 'utf-8');
		$this -> load -> library('email', $config);
		//	$this -> load -> library('email');

		$MailData['FromEmail'] = "pradeep.invite@gmail.com";
		$MailData['FromName'] = "Pradeep";
		$MailData['To'] = $mymaildata["To"];
		$MailData['Cc'] = $mymaildata["cc"];
		$MailData['Bcc'] = $mymaildata["bcc"];
		$MailData['Subject'] = $mymaildata["subject"];
		$MailData['Message'] = $mymaildata["message"];

		/*
		 $MailData['FromEmail']="pradeep.invite@gmail.com";
		 $MailData['FromName']="Pradeep";
		 $MailData['To'] = "pradeep.invite@gmail.com";
		 $MailData['Cc']="";
		 $MailData['Bcc']="";
		 $MailData['Subject']="test";
		 $MailData['Message']="test";
		 *
		 */
		return $this -> MailFunctionNoAttach($MailData);

		//return $data["mailsend"];

	}

	/*login logout code */
	function signin() {

		if ($this -> _is_logged_in()) {
			redirect('');
		}
		if ($this -> _is_checked_remembered()) {
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
						$data['error'] = "!";
						$data['main_content'] = 'signin';
						$this -> load -> view('page', $data);
					} else {
						$remember = $this -> input -> post('remember_me');
						if ($remember) {
							// Set remember me value in session
							$this -> session -> set_userdata('remember_me', TRUE);
							$data['remember_me'] = 1;
							setcookie('remember_me', $user_email, time() + 60 * 60 * 24 * 100, "/");
							setcookie('remember_me_pass', $password, time() + 60 * 60 * 24 * 100, "/");

						} else {
							setcookie('remember_me', 'gone', time() - 60 * 60 * 24 * 100, "/");
							setcookie('remember_me_pass', 'gone', time() - 60 * 60 * 24 * 100, "/");
						}

						$data['user_id'] = $userdata -> user_id;
						$data['logged_in'] = true;
						$data['user_name'] = $userdata -> user_name;
						$this -> session -> set_userdata($data);
						//die("here die");
						$this -> index();
						//redirect('users');

					}
				} else {
					$data['error'] = "User Email or Password is not correct. Please try again!";
					$data['main_content'] = 'signin';
					$this -> load -> view('page', $data);
				}

			}

		}
	}

	function _is_checked_remembered() {
		if (isset($_COOKIE['remember_me'])) {
			echo $user_email = $_COOKIE['remember_me'];
			$password = $_COOKIE['remember_me_pass'];
			$userdata = $this -> user_model -> validate($user_email, md5($password));
		}

		if ($userdata) {

			$data['user_id'] = $userdata -> user_id;
			$data['logged_in'] = true;
			$data['user_name'] = $userdata -> user_name;
			$this -> session -> set_userdata($data);
			return true;

		} else {
			return false;
		}

	}

	function old_signin() {

		if ($this -> _is_logged_in()) {
			redirect('');
		}

		if ($_POST) {

			$user_email = $this -> input -> post('user_email', true);
			$password = $this -> input -> post('user_password', true);
			$userdata = $this -> user_model -> validate($user_email, md5($password));

			if ($userdata) {
				if ($userdata -> status == 0) {
					$data['error'] = "Your Account is not acctivated. Please check your email and activate your account first.";
					$data['main_content'] = 'signin';
					$this -> load -> view('page', $data);
				} else {
					$data['user_id'] = $userdata -> user_id;
					$data['logged_in'] = true;
					$data['user_name'] = $userdata -> user_name;
					$this -> session -> set_userdata($data);
					$this -> index();
					//redirect('');
				}
			} else {
				$data['error'] = "You shall not pass!";
				$data['main_content'] = 'signin';
				$this -> load -> view('page', $data);
			}

			return;
		}
		$data['main_content'] = 'signin';
		$this -> load -> view('page', $data);
	}

	function logout() {
		$this -> session -> sess_destroy();
		setcookie('remember_me_pass', 'gone', time() - 60 * 60 * 24 * 100, "/");
		redirect('');
	}

	/* Upload Codes */

	function do_upload() {
		if ($_POST) {

			if (empty($_FILES['usersong']['name'])) {
				$this -> form_validation -> set_rules('usersong', 'usersong', 'required');
			}
			if (empty($_FILES['profilepic']['name'])) {
				$this -> form_validation -> set_rules('profilepic', 'profilepic', 'required');
			}
			$this -> form_validation -> set_rules('upload_payment_status', 'upload_payment_status', 'required|is_natural');

			if ($this -> form_validation -> run() === FALSE) {
				$data['error'] = validation_errors();
				$data['activate_user_name'] = $this -> session -> userdata('activate_user_name');

				$data['main_content'] = 'artist_activation';
				$this -> load -> view('page', $data);
			} else {

				$p = $this -> upload_profile_pic();
				$s = $this -> upload_profile_song();
				$v = $this -> upload_profile_video();
				if ($p > 0 && $s > 0 && $v > 0) {
					//redirect('users/signin', refresh);

					$data['activate_user_name'] = $this -> input -> post('act_user_name', true);
					$data['main_content'] = 'signup-success';
					$this -> load -> view('page', $data);

				} else {
					$data['activate_user_name'] = $this -> input -> post('act_user_name', true);
					$data['main_content'] = 'artist_activation';
					$this -> load -> view('page', $data);
				}
			}

		}
	}

	function upload_profile_pic() {

		if (isset($_FILES['profilepic']['name']) && $_FILES['profilepic']['name'] != '') {
			unset($config);
			unset($configPic);
			$current_user_id = $this -> user_model -> get_user_id($this -> input -> post('act_user_name', true));
			if (!is_dir('uploads/artists_uploads/' . $current_user_id)) {
				mkdir('uploads/artists_uploads/' . $current_user_id, 0777, TRUE);
			} else {

			}

			//need to have a create path
			$configPic['upload_path'] = './uploads/artists_uploads/' . $current_user_id;
			$configPic['max_size'] = '10240';
			$configPic['allowed_types'] = 'jpg|png|jpeg';
			$configPic['overwrite'] = FALSE;
			$configPic['remove_spaces'] = TRUE;

			//will add user id instead of date
			$pic_name = $_FILES['profilepic']['name'];
			$configPic['file_name'] = $pic_name;

			$this -> load -> library('upload', $configPic);
			$this -> upload -> initialize($configPic);

			if (!$this -> upload -> do_upload('profilepic')) {
				echo $this -> upload -> display_errors();

			} else {

				$picDetails = $this -> upload -> data();
				$data['user_id'] = $current_user_id;
				$data['uploaded_file_name'] = $pic_name;
				$data['upload_type'] = $picDetails['file_type'];
				$data['song_genre'] = "";
				$data['upload_time'] = now();
				$data['uploaded_file_thumbnail'] = "thumb_" . $pic_name;

				$uploaded = $this -> user_model -> add_user_upload($data);

				if ($uploaded > 0) {
					$updatedata['artist_profile'] = $_FILES['profilepic']['name'];
					$update = $this -> user_model -> update($current_user_id, $updatedata, "users");
					return 1;
				} else {
					return 0;
				}

			}
		}
	}

	function upload_profile_song() {

		if (isset($_FILES['usersong']['name']) && $_FILES['usersong']['name'] != '') {
			unset($configSong);
			unset($config);
			$current_user_id = $this -> user_model -> get_user_id($this -> input -> post('act_user_name', true));
			if (!is_dir('uploads/artists_uploads/' . $current_user_id)) {
				mkdir('uploads/artists_uploads/' . $current_user_id, 0777, TRUE);
			} else {

			}

			//need to have a create path
			$configSong['upload_path'] = './uploads/artists_uploads/' . $current_user_id;
			$configSong['max_size'] = '10240';
			$configSong['allowed_types'] = 'mp3';
			$configSong['overwrite'] = FALSE;
			$configSong['remove_spaces'] = TRUE;

			//will add user id instead of date
			$song_name = $_FILES['usersong']['name'];
			$configSong['file_name'] = $song_name;

			$this -> load -> library('upload', $configSong);
			$this -> upload -> initialize($configSong);
			if (!$this -> upload -> do_upload('usersong')) {
				echo $this -> upload -> display_errors();
				die();
			} else {
				$songDetails = $this -> upload -> data();
				$data['user_id'] = $current_user_id;
				$data['uploaded_file_name'] = $song_name;
				$data['upload_type'] = $songDetails['file_type'];
				$data['song_genre'] = "";
				$data['upload_time'] = now();
				$data['uploaded_file_thumbnail'] = "thumb_";

				$data['upload_payment_status'] = $this -> input -> post('upload_payment_status', true);
				$data['upload_amount'] = $this -> input -> post('upload_amount', true);
				//$data['display_time'] = $this -> input -> post('display_time', true);
				$data['start_time'] = $this -> input -> post('start_time', true);

				//. $song_name;

				$uploaded = $this -> user_model -> add_user_song_upload($data);
				if ($uploaded > 0) {
					return 1;
				} else {
					return 0;
				}

			}

		}
	}

	function upload_profile_video() {

		if (isset($_FILES['uservideo']['name']) && $_FILES['uservideo']['name'] != '') {
			unset($configVideo);
			unset($config);
			$current_user_id = $this -> user_model -> get_user_id($this -> input -> post('act_user_name', true));
			if (!is_dir('uploads/artists_uploads/' . $current_user_id)) {
				mkdir('uploads/artists_uploads/' . $current_user_id, 0777, TRUE);
			} else {

			}

			//need to have a create path
			$configVideo['upload_path'] = './uploads/artists_uploads/' . $current_user_id;
			$configVideo['max_size'] = '10240';
			$configVideo['allowed_types'] = 'mp4';
			$configVideo['overwrite'] = FALSE;
			$configVideo['remove_spaces'] = TRUE;

			//will add user id instead of date
			$video_name = $_FILES['uservideo']['name'];
			$configVideo['file_name'] = $video_name;

			$this -> load -> library('upload', $configVideo);
			$this -> upload -> initialize($configVideo);
			if (!$this -> upload -> do_upload('uservideo')) {
				echo $this -> upload -> display_errors();
			} else {
				$videoDetails = $this -> upload -> data();
				$data['user_id'] = $current_user_id;
				$data['uploaded_file_name'] = $video_name;
				$data['upload_type'] = $videoDetails['file_type'];
				$data['song_genre'] = "";
				$data['upload_time'] = now();
				$data['uploaded_file_thumbnail'] = "thumb_";

				$uploaded = $this -> user_model -> add_user_video_upload($data);
				if ($uploaded > 0) {
					return 1;
				} else {
					return 0;
				}

			}

		}
	}

	/*Search Code*/

	function user($nicename) {

		$data["user"] = $this -> user_model -> user_by_name($nicename);
		if ($data["user"]) {
			$data['main_content'] = 'user';
			$data['currentuser'] = $this -> userdata();

			$this -> load -> view('page', $data);
		} else {
			show_404();
		}
	}

	function artists() {
		if (!$this -> _is_logged_in()) {
			redirect('users/signin');
		}

		$data["users"] = $this -> user_model -> read_by_type('artist');
		$data['main_content'] = 'artists';
		$this -> _member_area();
		$curr_user_id = $this -> GetSession('user_id');
		$data['currentuser'] = $this -> userdata();

		$mailbody = "Confirm your subscription <a href='activation/" . $curr_user_id . "'>Confirm</a>";
		$data['mailsend'] = $this -> sendMail('pradeep.verma@yahoo.com', 'Confirmation', $mailbody);

		$this -> load -> view('page', $data);
	}

	function fans() {
		if (!$this -> _is_logged_in()) {
			redirect('users/signin');
		}

		$data["users"] = $this -> user_model -> read_by_type('fan');
		$data['main_content'] = 'fans';
		$this -> _member_area();
		$data['currentuser'] = $this -> userdata();

		$this -> load -> view('page', $data);
	}

	function venues() {
		if (!$this -> _is_logged_in()) {
			redirect('users/signin');
		}

		$data["users"] = $this -> user_model -> read_by_type('venue');
		$data['main_content'] = 'venues';
		$this -> _member_area();
		$data['currentuser'] = $this -> userdata();
		$this -> load -> view('page', $data);
	}

	function discover() {
		if (!$this -> _is_logged_in()) {
			redirect('users/signin');
		}

		$data["users"] = $this -> user_model -> read();
		$data['main_content'] = 'discover';
		$this -> _member_area();
		$data['currentuser'] = $this -> userdata();
		$this -> load -> view('page', $data);
	}

	function account() {
		//Redirect
		$this -> _member_area();

		if ($_POST) {
			$userdata = new stdClass();
			$userdata -> user_nicename = $this -> input -> post('nickname');
			$userdata -> user_email = $this -> input -> post('email');
			$userdata -> user_pass = md5($this -> input -> post('password'));

			$insert = $this -> user_model -> update($this -> session -> userdata('user_id'), $userdata);

			if ($insert) {
				$data['message'] = "Updated succesfully";
				$data['user'] = $this -> user_model -> user_by_id($this -> session -> userdata('user_id'));
				$data['main_content'] = 'account';
				$this -> load -> view('page', $data);
			}
			return;
		}

		$data['user'] = $this -> user_model -> user_by_id($this -> session -> userdata('user_id'));
		$data['main_content'] = 'account';
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

}
?>