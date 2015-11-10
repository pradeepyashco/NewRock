<?php 
$data['currentuser'] = $currentuser;
		$data['loggedin_user_id'] = $this -> session -> userdata('user_id');
		$data['loggedin_user_name'] = $this -> session -> userdata('user_name');
$this->load->view('includes/header', $data); ?>
<div class="container">

	<?php 
	//echo modules::run('menu'); ?>
	<?php $this->load->view($main_content); ?>
</div>
<?php $this->load->view('includes/footer'); ?>