<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Controller class */
require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> AdminLogin = "admin/";
		$this -> AdminDashboard = "admin/dashboard";
		$this -> Adminlogout = "admin/logout";
		$this -> UserLogin = "user/signin";
		$this -> adminID = $this -> session -> userdata('adminID');
	}

	function MailFunction($MailData, $File) {
		$this -> email -> from($MailData['FromEmail'], $MailData['FromName']);
		$this -> email -> to($MailData['To']);
		$this -> email -> cc($MailData['Cc']);
		$this -> email -> bcc($MailData['Bcc']);
		$this -> email -> subject($MailData['Subject']);
		$this -> email -> message($MailData['Message']);

		if (is_array($File['tmp_name'])) {
			foreach ($File['tmp_name'] as $Value) {
				$this -> email -> attach($Value);
			}
		} else {
			$this -> email -> attach($File['tmp_name']);
		}
		$this -> email -> send();
	}

function MailFunctionNoAttach($MailData) {
	$config = Array(

        'mailtype'  => 'html', 
        'charset' => 'utf-8'
     
    );
    $this->load->library('email', $config);
	//$this->load->library('email');
		$this -> email -> from($MailData['FromEmail'], $MailData['FromName']);
		$this -> email -> to($MailData['To']);
		//$this -> email -> cc($MailData['Cc']);
		//$this -> email -> bcc($MailData['Bcc']);
		$this -> email -> subject($MailData['Subject']);
		$this -> email -> message($MailData['Message']);

		
		return  $this -> email -> send();
			//echo $this->email->print_debugger();
	}
	function CheckAdminLogin() {
		$AdminID = $this -> session -> userdata('adminID');
		if (empty($AdminID)) {
			redirect($this -> AdminLogin);
		}
	}

	function CheckUserLogin() {
		$UserID = $this -> session -> userdata('userID');
		if (empty($UserID)) {
			redirect($this -> UserLogin);
		}
	}

	function Logout() {
		if ($this -> session -> userdata('adminID')) {
			$this -> session -> sess_destroy();
			$this -> CheckAdminLogin();
		} else {
			$this -> session -> sess_destroy();
			$this -> CheckUserLogin();
		}
	}

	function SetSession($SessionDataArray = array(), $Type = '') {
		if ($Type == 'flash')
			$this -> session -> set_flashdata($SessionDataArray);
		else
			$this -> session -> set_userdata($SessionDataArray);
	}

	function GetSession($Name = '', $Type = '') {
		
		
		if ($Type == 'flash')
			return $this -> session -> flashdata($Name);
		if($Name == '')
		return $this -> session -> userdata();
		else
			return $this -> session -> userdata($Name);
	}

	function sendMail($to, $subject, $msg) {
		/*$configs = array(
		 'protocol'  =>  'smtp',
		 'smtp_host' =>  'ssl://smtp.gmail.com',
		 'smtp_port' =>  '465',
		 'smtp_user' =>  'pradeep.invite@gmail.com',
		 'smtp_pass' =>  'Yashco@13',
		 'smtp_timeout' => 7,
		 'charset' => 'utf-8'

		 );

		//Send validation mail
		$this -> load -> library('email', $config);
*/
		/*$this -> email -> from('pradeep.invite@gmail.com', 'Test Mail');
		$this -> email -> to($to);
		$this -> email -> subject($subject);
		$this -> email -> message($msg);
		$resultmsg = $this -> email -> send();
		*/
		//return $resultmsg; 
		//echo $this -> email -> print_debugger();
		//$data['main_content'] = 'signup-success';
		//$this -> load -> view('page', $data);

		/*
		$MailData = array();
$MailData['FromEmail'] = "pradeep.invite@gmail.com";
$MailData['FromName'] ="Pradeep";
$MailData['To'] = $to;
$MailData['Subject'] =  $subject;
$MailData['Message'] = $msg;	
		
		$this->MailFunction($MailData, "");
		  */
	return "Mail Sent";	  
	}
	
/*Hidden Methods not allowed by url request*/

	function _member_area() {

		if (!$this -> _is_logged_in()) {
			redirect('signin');
		} else {
			return true;
		}
	}

	function _is_logged_in() {
		if ($this -> session -> userdata('logged_in')) {
			return true;
		} else {
			
			return false;
		}
	}


}
?>