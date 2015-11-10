
<div class="container trans-bg">
<div class="col-lg-12"><h2 class="text-head">Upload and Activate</h2></div>
<?php echo $error; ?>
 <form class="cssform" runat="server" name="uploads" id="uploads" method="POST" action="<?php echo base_url() . 'index.php/users/do_upload'; ?>"  enctype="multipart/form-data" >

<div class="row">
<div class=" col-lg-3 col-lg-offset-1 upload"> <span>Upload Profile Picture : </span></div>
 
 
<div class="col-lg-3 upload">
<label for="profilepic" class="custom-file-upload"><i class="glyphicon glyphicon-hdd"></i> &nbsp; Browse Picture </label>
   <!-- <input id="file-upload" type="file"/>-->
    <input type="file" id="profilepic" name="profilepic" accept=".gif, .jpg, .png" >
</div>

<div class="col-lg-2">
<img id="profilepicprev" src="" alt="" class="img-responsive" />
<span id="imgname"></span>
</div>

<div class="clearfix"></div>
</div>
  
<hr>
<div class="row">
<div class=" col-lg-3 col-lg-offset-1 upload"> <span>Upload Video : </span></div>
  
<div class="col-lg-3 upload">
<label for="uservideo" class="custom-file-upload"> <i class="glyphicon glyphicon-hdd"></i> &nbsp; Browse Video </label>
   <input type="file" id="uservideo" name="uservideo" accept=".mp4" >
</div>

<div class="col-lg-2">
 <video width="320" height="240" id="vidshow" controls class="img-responsive">
  <source src="movie.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
  Your browser does not support the video tag.
</video> 

<span id="vidname" ></span>
</div>


<div class="clearfix"></div>
</div>

<hr>
<div class="row">

<div class="col-lg-3 col-lg-offset-1 upload"> <span>Upload Song : </span></div>
  
<div class="col-lg-3 upload">
<label for="usersong" class="custom-file-upload"><i class="glyphicon glyphicon-hdd"></i> &nbsp; Browse Songs </label>
   <!-- <input id="file-upload" type="file"/>-->
   <input type="file" id="usersong" name="usersong" accept=".mp3">
</div>


<div class="col-lg-2">
 <audio controls class="img-responsive" id="songshow">
  <source src="horse.ogg" type="audio/ogg">
  <source src="horse.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>


<span id="songname" ></span>
</div>


<div class="col-lg-2">

</div>
</div>

<div class="row">
	
	<div class="col-lg-10 col-lg-offset-1"> 
<div class="col-lg-3 upload" ><label for="upload_payment_status" class="">Paid?</label>
    	
    	<?php
					$options = array('-1' => 'Select Payment Status', '1' => 'Paid', '2' => 'Free');
					$js = 'id="upload_payment_status" onChange="showtime();"';
					echo form_dropdown('upload_payment_status', $options, set_value('upload_payment_status'), $js);
			?>
					
    </div>
   
   <div class="col-lg-3 upload" >
   	<label for="start_time" class="">Start Time</label>
<?php 
				
				echo form_input('start_time', set_value('start_time')); ?>
    </div>
    <div class="col-lg-3 upload">
    	<label for="upload_amount" class="">Amount</label>
    		<?php echo form_input('upload_amount', set_value('upload_amount')); ?>
    </div>
  
    </div>
  

</div>

<hr>
<div class="clearfix"></div><br>
<div class="col-lg-4 col-lg-offset-4 pull-right">
		<input type="hidden" id="act_user_name" name="act_user_name" value="<?php echo $activate_user_name; ?>">
			<input type="submit" id="button" name="button" value="Upload & Activate" class="submit-btn" />
	
	</div>



</form>
</div>

<script>

function showtime()
{
	var e = document.getElementById("upload_payment_status");
var strState = e.options[e.selectedIndex].value;
	if(strState == 'Free')
	{
	$("#start_times").hide();
	$("#upload_amounts").hide();
	}
}
	
	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#profilepicprev').attr('src', e.target.result);
				$("#imgname").text(input.files[0].name);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

function readVideoURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#vidshow').attr('src', e.target.result);
				$("#vidname").text(input.files[0].name);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	
	function readSongURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#songshow').attr('src', e.target.result);
				$("#songname").text(input.files[0].name);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$(function() {
		$("#uservideo").change(function() {
			readVideoURL(this);
		});
		
		$("#profilepic").change(function() {
			readURL(this);
		});
		
		$("#usersong").change(function() {
			readSongURL(this);
		});
		
		
		
	}); 
</script>