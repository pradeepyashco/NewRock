<style>
	
	#map_canvas {
           height: 150px;
    width: 94%;
    margin-top: 0.6em;
    padding-left: 3%;
    padding-right: 3%;
      }
	   .pac-container{
	  	z-index:999999!important;
	  }
      .ui-menu .ui-menu-item{
        text-align: left;  
        font-weight: normal;
      }
      .ui-menu .ui-menu-item a.ui-state-hover{
        border: 1px solid red; 
        background: #FFBFBF; 
        color: black;
        font-weight:bold;
      }


.success_message{

/*    background: url("../images/error.png") no-repeat scroll left center transparent; */
    clear: both !important;
    color: #00FF00;
	font-weight:bold;
    display: block;
    float: none !important;
    font-size: 11px;
    font-weight: normal;
    line-height: 14px;
    margin-top: 5px;
    padding-left: 18px;
	
	}




   </style>
<div class="row">
	<div class="span6 offset3">
<form class="cssform" runat="server" name="uploads" id="uploads" method="POST" action="<?php echo base_url() . 'index.php/users/do_upload'; ?>"  enctype="multipart/form-data" >
	<table>
		<tr>
			<td colspan="2"><?php echo $error; ?></td>
		</tr>
		<tr>
			<td>Profile Pic</td>
			<td>
			<input type="file" id="profilepic" name="profilepic" accept=".gif, .jpg, .png" >
			
			<img id="profilepicprev" src="#" alt="your image" height="60" width="60" /></td>
		</tr>
		<tr>
			<td>Select Song :</td>
			<td>
			<input type="file" id="usersong" name="usersong" accept=".mp3">
			</td>

		</tr>
		<tr>
			<td>Song Payment Status:</td>
			<td>
				<?php
					$options = array('-1' => 'Select Payment Status', '1' => 'Paid', '2' => 'Free');
					$js = 'id="upload_payment_status" onChange="showtime();"';
					echo form_dropdown('upload_payment_status', $options, set_value('upload_payment_status'), $js);
					?>
					
			</td>

		</tr>
		<tr id="start_times">
			<td>Start Time:</td>
			<td>
				<?php 
				
				echo form_input('start_time', set_value('start_time')); ?>
			</td>

		</tr>
		<tr id="upload_amounts">
			<td >Start Time:</td>
			<td>
				<?php echo form_input('upload_amount', set_value('upload_amount')); ?>
			</td>

		</tr>

		
				
		
		<tr>
			<td>Select Video :</td>
			<td>
			<input type="file" id="uservideo" name="uservideo" accept=".mp4" >
			</td>

		</tr>
		<tr>
			<td>
			<input type="hidden" id="act_user_name" name="act_user_name" value="<?php echo $activate_user_name; ?>">
			<input type="submit" id="button" name="button" value="Submit" />
			</td>
		</tr>
	</table>
</form>


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
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$(function() {
		$("#profilepic").change(function() {
			readURL(this);
		});
		
	}); 
</script>