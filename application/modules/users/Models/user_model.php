<?php
/*
 Author: Pradeep Verma
 Date: 10/16/2015
 Version: 1.0
 */

class User_model extends CI_Model {

	var $table = "users";

	function __construct() {
		parent::__construct();
	}

	function add_user_upload($data) {
		$query = $this -> db -> insert("user_uploads", $data);
		$this -> db -> _error_message();
		if ($query) {
			return true;
		} else {
			$this -> db -> _error_message();
			return false;
		}

	}

	function add_user_song_upload($data) {

		$query = $this -> db -> insert("user_uploads", $data);
		$this -> db -> _error_message();

		if ($query) {
			return true;
		} else {
			$this -> db -> _error_message();
			return false;
		}

	}

	function add_user_video_upload($data) {
		$query = $this -> db -> insert("user_uploads", $data);
		if ($query) {
			return true;
		} else {
			$this -> db -> _error_message();
			return false;
		}

	}

	function create($data) {
		$arr = $data['user'];
		$query = $this -> db -> insert("users", $arr);
		if ($query) {
			$uid = $this -> get_user_id($arr['user_name']);
			echo $uid . " --" . $arr["user_name"];
			//die();
			//	$insert_id = $this -> db -> insert_id();
			$mydata = array();
			$x = 0;
			foreach ($data['user_meta'] as $key => $value) {
				$mydata[$x++] = array('user_id' => $uid, 'meta_name' => $key, 'meta_value' => $value);
			}
			
			$betchQ = $this -> db -> insert_batch('user_meta', $mydata);
			//die();
			return true;
		} else {
			$this -> db -> _error_message();
			return false;
		}

	}

	function read() {
		//$query = $this -> db -> query("SELECT * FROM $this->table");
		$query = $this -> db -> get($this -> table);
		return $query -> result();
	}

	function read_by_type($type) {
		//$query = $this -> db -> query("SELECT * FROM $this->table where user_type = '" . $type . "'");

		$this -> db -> where("user_type", $type);
		$query = $this -> db -> get($this -> table);
		return $query -> result();
	}

	function user_by_id($id) {
		//$query = $this -> db -> query("SELECT * FROM $this->table WHERE user_id = $id");

		$this -> db -> where("user_id", $id);
		$query = $this -> db -> get($this -> table);

		if ($query -> num_rows > 0) {
			return $query -> row();
		} else {
			return false;
		}
	}

	function user_by_name($user_nicename) {
		//$query = $this -> db -> query("SELECT user_id FROM $this->table WHERE user_name = ?", $user_nicename);
		$this -> db -> where("user_name", $user_nicename);
		$query = $this -> db -> get($this -> table);

		if ($query -> num_rows > 0) {
			return $this -> user_by_id($query -> row() -> user_id);
		} else {
			return false;
		}
	}

	function get_user_id($user_name) {

		$this -> db -> select("user_id");
		$this -> db -> where("user_name", $user_name);
		$query = $this -> db -> get("users");
		if ($query -> num_rows > 0) {
			return $query -> row() -> user_id;
		} else {
			$this -> db -> _error_message();
			return false;
		}
	}

	function update($userid, $userdata, $table) {
		$data = (array)$userdata;
		$where = "user_id = $userid";
		$str = $this -> db -> update_string($table, $data, $where);
		$query = $this -> db -> query($str);
		return $query;
	}

	function delete() {

	}


	function is_activated($actuname) {
		$this->db->select('status');
		$this->db->where('user_name', $actuname);
		$this->db->where('status', 1);
		$query = $this -> db -> get('users');
		
		if ($query -> num_rows > 0) {
			return true;
		} else {
			return false;
		}
		

		return $val;
	}

	function activatenow($actuname, $actkey) {
		$data = array('status' => 1);

		$query = "update users set status = 1 where user_name ='" . $actuname . "' and user_id = (select user_id from user_meta where meta_name = 'activation_key' and meta_value = '" . $actkey . "')";
		//echo $query;

		$val = $this -> db -> query($query);

		return $val;
	}

	function get_artist_category() {
		$query = $this -> db -> get("artist_category");
		return $query -> result();

	}

	function get_genre() {
		$query = $this -> db -> get("genre");
		return $query -> result();

	}

	function get_charity() {
		$query = $this -> db -> get("tbl_charity");
		return $query -> result();

	}

	function get_contires() {
		$query = $this -> db -> get("tbl_countries");
		return $query -> result();

	}

	function get_venue_types() {
		$query = $this -> db -> get("venue_type");
		return $query -> result();

	}

	function get_role($user_id) {
		$query = $this -> db -> query("SELECT role_id FROM users_roles WHERE user_id = $user_id");
		if ($query -> num_rows > 0) {
			return (int)$query -> row() -> role_id;
		} else {
			return 0;
		}
	}

	function get_role_name($role_id) {
		$query = $this -> db -> query("SELECT name FROM roles WHERE id = $role_id");
		if ($query -> num_rows > 0) {
			return $query -> row() -> name;
		} else {
			return false;
		}
	}

	function validate($user_email, $password) {
		$query = $this -> db -> query("SELECT * FROM $this->table WHERE user_email_id = '$user_email' AND user_password = '$password'");
		if ($query -> num_rows === 1) {
			return $query -> row();
		} else {
			return false;
		}
	}

	public function getRegistrationInfo() {
		(!isset($_SESSION['registration.name'])) ? $name = '' : $name = $_SESSION['registration.name'];
		(!isset($_SESSION['registration.fname'])) ? $fname = '' : $fname = $_SESSION['registration.fname'];
		(!isset($_SESSION['registration.age'])) ? $age = '' : $age = $_SESSION['registration.age'];
		return array('registration_name' => $name, 'registration_fname' => $fname, 'registration_age' => $age);
	}

}
?>