<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>YouRock web Version</title>
<link href='https://fonts.googleapis.com/css?family=Qwigley' rel='stylesheet' type='text/css'>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>theme/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>theme/css/custom.css" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>theme/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>theme/css/effect.css" />
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url(); ?>/theme/js/jquery.parallaxmouse.min.js"></script>
<script src="<?php echo base_url(); ?>/theme/js/classie.js"></script>
<script src="<?php echo base_url(); ?>/theme/js/bootstrap.min.js"></script>
</head>


<!--<div class="row top-head">
  <div class="container">
    <div class="col-lg-4"><a href="index.html"><img src="img/logo.png"></a></div>
    <div class="col-lg-8">
      <div class="col-lg-4">
        <input class="login-fld" type="text" placeholder="Email Address">
        <div class="login-txt">
          <input type="checkbox">
          Keep me Logged in</div>
      </div>
      <div class="col-lg-4">
        <input class="login-fld" type="text" placeholder="Password">
        <div class="login-txt"> <a href="#">Forgot Your Password?</a></div>
      </div>
      <div class="col-lg-4">
        <button class="login-btn">Login</button>
        <div class="login-txt-fb"> <a href="#"><img src="img/fb.png"> Login with Facebook</a> </div>
      </div>
    </div>
  </div>
</div>-->


    <!-- Javascript -->
   
  </head>

  <body>
<div class="col-lg-4 logo-bg"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/theme/img/logo.png" class="center-block"></a></div>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      	<img src="<?php echo base_url(); ?>/theme/img/nav.png"></button>
    </div>
    
   
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
    <?php 
     
       if($loggedin_user_name != "")
	{
		?>
		<div class="col-lg-3" style="float: right; padding-top: 50px; color:#fff;">
	<ul class="list-inline"><li>		
		<?php
		echo "Welcome ". $loggedin_user_name;
	?>
	</li>
		<li></li>		
	<li><a href="<?php echo base_url('/index.php/users/logout'); ?>">Logout</a></li>
	</ul>
	 </div>
	<?php
	}
else
	{
	
			$attributes = array('id' => 'myformlogin');
			echo form_open('users/signin', $attributes);
   ?>
      <div class="col-lg-3">
        <input class="login-fld" type="text" id="user_email" name="user_email" value="<?php if(isset($_COOKIE['remember_me'])) echo $_COOKIE['remember_me']; ?>" placeholder="Email Address" >
        
        <div class="login-txt">
          <input type="checkbox" name="remember_me" id="remember_me" <?php if(isset($_COOKIE['remember_me'])) { echo 'checked="checked"'; } else { echo ''; } ?>>
          Keep me Logged in</div>
      </div>
      <div class="col-lg-3">
        <input class="login-fld" type="password" placeholder="Password" id="user_password" name="user_password" value="<?php if(isset($_COOKIE['remember_me_pass'])) echo $_COOKIE['remember_me_pass']; ?>">
        <div class="login-txt"> <a href="#">Forgot Your Password?</a></div>
      </div>
      <div class="col-lg-2">
        <input type="submit" class="login-btn" value="Login" />
        <div class="login-txt-fb"> <a href="#"><img src="<?php echo base_url(); ?>/theme/img/fb.png"> Login with Facebook</a> </div>
      </div>
   
<?php
		echo form_close();

    }
     ?>
    </div>
    
  </div>
</nav>


<!--
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<div style="float:right; width:300px;margin-right:20px; height:40px">
			<?php
			$attributes = array('class' => 'form-horizontal', 'id' => 'myformlogin');
			$hidden = array('hidden_video_filename' => '', 'hidden_audio_filename' => '');
			echo form_open('users/signin', $attributes, $hidden);
			?>
			<div class="">
				<div>
					<?php echo form_input('user_name', set_value('user_name')); ?>
					<?php echo form_input('user_password', set_value('user_password')); ?>
				<button type="submit" class="btn">
					Sign In
				</button>
			</div>
			</div>
			
			<?php
			echo form_close();
			?>
			</div>
			<div style="height:80px; display:block; width: 100%;">
				<a class="brand" href="<?php echo base_url(); ?>">YouRock</a>
			</div>
				
		
			<ul class="nav">
				
				<li><?php echo anchor('users/artists	','Artists'); ?></li>
						<li><?php echo anchor('users/fans','Fans'); ?></li>
						<li><?php echo anchor('users/venues','Venues'); ?></li>
						<li><?php echo anchor('users/discover','DiscoverEm'); ?></li>
			</ul>
			
			<div class="pull-right">
				<?php if($currentuser): ?>
				<div class="dropdown">
					<ul class="nav">
						<li>
							<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
								Logged as <strong><?php echo $currentuser->user_name; ?></strong><b class="caret"></b>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<li><?php echo anchor('users/'.$currentuser->user_name,'View Profile'); ?></li>
								<li><?php echo anchor('users/accoount','Edit Account'); ?></li>
								<li class="divider"></li>
								<li><?php echo anchor('users/logout','Logout'); ?></li>
							</ul>
						</li>
						
					</ul>
				</div>

				<?php else: ?>
				<ul class="nav">
					<li class="divider-vertical"></li>
					<li><?php echo anchor('users/signup','Sign Up'); ?></li>
					<li class="divider-vertical"></li>
					<li><?php echo anchor('users/signin','Sing In'); ?></li>
				</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
-->