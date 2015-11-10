	<div class="container trans-bg">
	
	
<div class="col-lg-12"><h2 class="text-head">Dashboard</h2></div>	


		<div class="col-lg-5"><h2>My Fans</h2>
			
			<div>
		<div class="row">
		<div class="span12">
			
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Type</th>
						<th>Type</th>
						
					</tr>
				</thead>
				<tbody>
					<?php foreach($users_fan as $user): ?>
					<tr>
						
						<td><?php echo anchor('users/' . $user -> user_name, $user -> user_name); ?></td>
					
						<td><?php echo $user -> user_email_id; ?></td>
						<td><?php echo $user -> user_type; ?></td>
						<td><?php echo $user -> sub_type; ?></td>
					
						
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
		</div>
	</div>
</div>
			
		</div>
		
		
		 
<div class="col-lg-6 col-lg-offset-1"><h2>My Super Fan</h2>
			
			<div>

	<div class="row">
		<div class="span12">
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Type</th>
						<th>Type</th>
						
					</tr>
				</thead>
				<tbody>
					<?php foreach($users_super_fan as $user): ?>
					<tr>
						
						<td><?php echo anchor('users/' . $user -> user_name, $user -> user_name); ?></td>
					
						<td><?php echo $user -> user_email_id; ?></td>
						<td><?php echo $user -> user_type; ?></td>
						<td><?php echo $user -> sub_type; ?></td>
					
						
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
		</div>
	</div>


</div> 
			
		</div>
		<div class="clearfix"></div>
	
<div class="col-lg-6"><h2>Profile</h2>
	<div class="row">
		<div class="span12">
	<?php foreach($users_profile_details as $profile): ?>
			<div class="col-lg-12" style="padding-bottom: 10px; border-bottom:1px solid #ccc">
						<div class="col-lg-5" style="display:block; float:left;"><?php echo  ucwords(str_replace("_", " ", $profile -> meta_name)); ?>:</div> 
						<div class="col-lg-7"style="display:block; float:left;"><?php echo $profile -> meta_value; ?></div>
				</div>		
					<?php endforeach; ?>
					</div>
					</div>
					
					
</div>

<div class="col-lg-6"><h2>My Photos</h2>
	<div class="row">
		<div class="span12">
	<?php foreach($users_uploads as $uploads){
		$sts = $uploads -> upload_type; 
		if(strpos($sts, "image") !== false)
		{
		?>
			<div class="col-lg-12" style="padding-bottom: 10px; border-bottom:1px solid #ccc">
						<div class="col-lg-2"style="display:block; float:left;"><img src='<?php echo $uploads -> uploaded_file_thumbnail; ?>' height="40" width="40"></div>
						<div class="col-lg-7"style="display:block; float:left;"><?php echo $uploads -> uploaded_file_name; ?></div>
						<div class="col-lg-2"style="display:block; float:left;"><?php echo $uploads -> upload_type; ?></div>
						<div class="col-lg-1"style="display:block; float:left;"><?php echo $uploads -> streaming_option; ?></div>
				</div>		
					<?php 
		}
					} ?>
					</div>
				</div>
					<div class="clearfix"></div>	
					<h2>My Videos</h2>
					<div class="col-lg-12" style="display:block; height:320px!important;">
 <video width="100%" height="320" id="vidshow" controls class="img-responsive">
  <source src="movie.mp4" type="video/mp4" />
  <source src="movie.ogg" type="video/ogg" />
  Your browser does not support the video tag.
</video> 
</div>
	<div class="row">


		<div class="span12">
	<?php foreach($users_uploads as $uploads){
		$sts = $uploads -> upload_type; 
		if(strpos($sts, "video") !== false)
		{
		?>
			<div class="col-lg-12" style="padding-bottom: 10px; border-bottom:1px solid #ccc">
						<div class="col-lg-2"style="display:block; float:left;"><?php echo $uploads -> uploaded_file_thumbnail; ?></div>
						<div class="col-lg-6"style="display:block; float:left;"><a onclick="playme('<?php echo base_url()."/uploads/artists_uploads/".$currentuser->user_id. "/".$uploads -> uploaded_file_name;?>');"><?php echo $uploads -> uploaded_file_name; ?></a></div>
						<div class="col-lg-2"style="display:block; float:left;"><?php echo $uploads -> upload_type; ?></div>
						<div class="col-lg-1"style="display:block; float:left;"><?php echo $uploads -> upload_amount; ?></div>
						<div class="col-lg-1"style="display:block; float:left;"><?php echo $uploads -> streaming_option; ?></div>
				</div>		
					<?php 
		}
					} ?>
					</div>
					</div>
						<div class="clearfix"></div>
	<h2>My Songs</h2>
	<style>
		#songshow
		{
			width:100%!important;
		}
	</style>
<div class="col-lg-12" style="display:block; height:120px!important; padding-top:50px; background: #cccfff; border-radius:10px">
 <audio controls class="img-responsive" id="songshow">
  <source src="horse.ogg" type="audio/ogg">
  <source src="horse.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<span id="songname" style="display:block; height:50px!important; padding-top:20px">Please select a Song</span>
</div>
	<div class="row">
		<div class="span12">
	<?php foreach($users_uploads as $uploads){
		$sts = $uploads -> upload_type; 
		if(strpos($sts, "audio") !== false)
		{
		?>
			<div class="col-lg-12" style="padding-bottom: 10px; border-bottom:1px solid #ccc">
						<div class="col-lg-2"style="display:block; float:left;"><?php echo $uploads -> uploaded_file_thumbnail; ?></div>
						<div class="col-lg-6"style="display:block; float:left;"><a onclick="playmesongs('<?php echo base_url()."/uploads/artists_uploads/".$currentuser->user_id. "/".$uploads -> uploaded_file_name;?>', '<?php echo $uploads -> uploaded_file_name; ?>');"><?php echo $uploads -> uploaded_file_name; ?></a></div>
						<div class="col-lg-2"style="display:block; float:left;"><?php echo $uploads -> upload_type; ?></div>
						<div class="col-lg-1"style="display:block; float:left;"><?php echo $uploads -> upload_amount; ?></div>
						<div class="col-lg-1"style="display:block; float:left;"><?php echo $uploads -> streaming_option; ?></div>
				</div>		
					<?php 
		}
					} ?>
					</div>
					</div>
									
</div>

</div>

<script>
	function playme(filepath)
	{
	$('#vidshow').attr('src', filepath);	
	}
	function playmesongs(filepath, filename)
	{
		$("#songname").text("Playing: ". filename);	
	$('#songshow').attr('src', filepath);	
	
	}
</script>