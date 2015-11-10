<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>YouRock Boss</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="pradeep verma">

    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>/theme/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 140px;
        padding-bottom: 40px;
      }
    </style>
    <link href="<?php echo base_url(); ?>/theme/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-57-precomposed.png">
    
    <!-- Javascript -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/js/bootstrap.js"></script> 
  </head>

  <body>

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
