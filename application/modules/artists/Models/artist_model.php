<?php
/*
 Author: Pradeep Verma
 Date: 10/16/2015
 Version: 1.0
 */

class Artist_model extends CI_Model {

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
		$this -> db -> where("user_type", $type);
		$query = $this -> db -> get($this -> table);
		return $query -> result();
	}

	
	function get_my_fan($my_id) {
		$str = "select fan_id from fan_favourites_info where profile_id=".$my_id;
		//echo $str;
		//die();
		$query = $this -> db -> query('SELECT * FROM users where user_id in ('.$str .')');
		//$query = $this -> db -> query($str);
    	return $query-> result() ;
	}
		
	function get_my_super_fan($my_id) {
		$str = "select invited_by from users where user_id=".$my_id;
		//echo $str;
		//die();
		$query = $this -> db -> query('SELECT * FROM users where user_id in ('.$str .')');
		//$query = $this -> db -> query($str);
    	return $query-> result() ;
	}
		
		
	function update($userid, $userdata, $table) {
		$data = (array)$userdata;
		$where = "user_id = $userid";
		$str = $this -> db -> update_string($table, $data, $where);
		$query = $this -> db -> query($str);
		return $query;
	}

	function get_charity() {
		$query = $this -> db -> get("tbl_charity");
		return $query -> result();

	}

	function get_my_profile($my_id) {
		$this->db->select('meta_name, meta_value');
		$this->db->where("user_id", $my_id);
		$query = $this -> db -> get("user_meta");
		return $query -> result();

	}

	
	function get_my_uploads($my_id) {
		$this->db->select('uploaded_file_name, uploaded_file_thumbnail, upload_type, upload_amount, streaming_option');
		$this->db->where("user_id", $my_id);
		$query = $this -> db -> get("user_uploads");
		return $query -> result();

	}

	



	

}
?>