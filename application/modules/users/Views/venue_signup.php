<div class="container trans-bg">
	
<div class="col-lg-12">
		<p>All * fileds are required.</p>
		<?php if(@$error): ?>
		<div class="alert">
			<button type="button" class="close" data-dismiss="alert">
				×
			</button>
			
			<?php echo $error; ?>
		</div>
		<?php endif; ?>

	</div>
	
<div class="col-lg-12"><h2 class="text-head">Profile Information</h2></div>
<?php
			$attributes = array('id' => 'myform');
			$hidden = array('hidden_video_filename' => '', 'hidden_audio_filename' => '', 'invited_by' => '');
			echo form_open_multipart('', $attributes, $hidden);
?>
			
<div class="col-lg-6">
<span class="input input--nao">
		
  <input class="input__field input__field--nao" type="text" id="user_name" name="user_name" value="<?php echo set_value('user_name'); ?>" />
  <label class="input__label input__label--nao" for="user_name"> <span class="input__label-content input__label-content--nao">*User Name</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="text" id="user_email_id"  name="user_email_id" value="<?php echo set_value('user_email_id'); ?>" />
  <label class="input__label input__label--nao" for="user_email_id"> <span class="input__label-content input__label-content--nao">*Email</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="password" id="user_password" name="user_password" value="<?php echo set_value('user_password'); ?>" />
  <label class="input__label input__label--nao" for="user_password"> <span class="input__label-content input__label-content--nao">*Password</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="password" id="user_password_confirm" name="user_password_confirm" value="<?php echo set_value('user_password_confirm'); ?>" />
  <label class="input__label input__label--nao" for="user_password_confirm"> <span class="input__label-content input__label-content--nao">*Confirm Password</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="text" id="user_age" name="user_age" value="<?php echo set_value('user_age'); ?>" />
  <label class="input__label input__label--nao" for="user_age"> <span class="input__label-content input__label-content--nao">*User Age</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
 
<span class="performer">Gender</span>
<span class="performer"> <input type="radio" id="user_gendermale" name="user_gender" value="Male" <?php echo set_radio('user_gender', 'Male', TRUE); ?>> &nbsp;Male </span>
<span class="performer"> <input type="radio" id="user_genderfemale" name="user_gender" value="Female" <?php echo set_radio('user_gender', 'Female'); ?>> &nbsp;Female </span>

</div>
<div class="clearfix"></div>
<div class="col-lg-12"><h2 class="text-head">Venues Information</h2></div>
	
<div class="col-lg-6">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="text" id="venue_name" name="venue_name" value="<?php echo set_value('venue_name'); ?>" />
  <label class="input__label input__label--nao" for="venue_name"> <span class="input__label-content input__label-content--nao">Venue Name</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="text" id="venue_contact" name="venue_contact" value="<?php echo set_value('venue_contact'); ?>"  />
  <label class="input__label input__label--nao" for="venue_contact"> <span class="input__label-content input__label-content--nao">Contact Number</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="text" id="venue_address1" name="venue_address1" value="<?php echo set_value('venue_address1'); ?>"  />
  <label class="input__label input__label--nao" for="venue_address1"> <span class="input__label-content input__label-content--nao">Address Line 1</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="text" id="venue_address2" name="venue_address2" value="<?php echo set_value('venue_address2'); ?>" />
  <label class="input__label input__label--nao" for="venue_address2"> <span class="input__label-content input__label-content--nao">Address Line 2</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="text" id="venue_city" name="venue_city" value="<?php echo set_value('venue_city'); ?>"  />
  <label class="input__label input__label--nao" for="venue_city"> <span class="input__label-content input__label-content--nao">City</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
  <input class="zipcls input__field input__field--nao" placeholder="" type="text" id="zipcode" name="zipcode" value="<?php echo set_value('zipcode'); ?>" />
  <label class="zipcls input__label input__label--nao" for="zipcode"> <span class="zipcls input__label-content input__label-content--nao">*Zipcode</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
      <input class="zipcls input__field input__field--nao" placeholder="" type="text" id="venue_state" name="venue_state" value="<?php echo set_value('venue_state'); ?>" />
  <label class="input__label input__label--nao" for="venue_state"> <span class="input__label-content input__label-content--nao">*State</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
   <select class="input__field input__field--nao my-down" type="text" id="country" name="country" />
     <option value="-1">*Country</option>
<?php					
foreach($contires as $con)
{
 echo '<option value="'.$con->country_name .'"'. set_select("country", $con->country_name).'>'.html_escape($con->country_name).'</option>';	 
}
?>
	</select>	
  
  <label class="input__label input__label--nao" for="country"> <span class="input__label-content input__label-content--nao"></span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="clearfix"></div>

<div class="col-lg-12"><h2 class="text-head">Other Information</h2></div>

<div class="col-lg-6">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="text" id="user_payoue_email" name="user_payoue_email" value="<?php echo set_value('user_payoue_email'); ?>" />
  <label class="input__label input__label--nao" for="user_payoue_email"> <span class="input__label-content input__label-content--nao">*Payout Email</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
  <select class="input__field input__field--nao my-down" type="text" id="charity_type" name="charity_type" />
  <option value="-1">Charity</option>
<?php	
foreach($charity as $cha)
{
 echo '<option value="'.$cha->charity_name .'"'. set_select("charity_type", $cha->charity_name).'>'.html_escape($cha->charity_name).'</option>';	 
}
?>						
	</select>		
	
  <label class="input__label input__label--nao" for="charity_type"> <span class="input__label-content input__label-content--nao"></span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
   <select class="input__field input__field--nao my-down" type="text" id="venue_type" name="venue_type" />
     <option value="-1">*Venue Type</option>
<?php 
foreach($venue_types as $vnt)
{
 echo '<option value="'.$vnt->type_name .'"'. set_select("venue_type", $vnt->type_name).'>'.html_escape($vnt->type_name).'</option>';	 
}
?> 
</select>	
  
  <label class="input__label input__label--nao" for="venue_type"> <span class="input__label-content input__label-content--nao"></span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
<select class="input__field input__field--nao my-down" type="text" id="subscription_type"  name="subscription_type" />
<option value="-1">Subscription Type</option>
<option value="Free" <?php echo set_select("subscription_type", 'Free'); ?>>Free</option>
<option value="Silver" <?php echo set_select("subscription_type", 'Silver'); ?>>Silver</option>
<option value="Gold" <?php echo set_select("subscription_type", 'Gold'); ?>>Gold</option>
<option value="Platinum" <?php echo set_select("subscription_type", 'Platinum'); ?>>Platinum</option> 
</select>

				
<label class="input__label input__label--nao" for="subscription_type"> <span class="input__label-content input__label-content--nao"></span> </label>
 <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
 <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
 </svg> </span>
</div>

<div class="col-lg-5">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="text" id="artistnotificationdistance" name="artistnotificationdistance"  />
  <label class="input__label input__label--nao" for="artistnotificationdistance"> <span class="input__label-content input__label-content--nao">Artist Notification Distance</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="clearfix"></div><br>

<div class="col-lg-6 col-lg-offset-6">
	<input type="submit" class="submit-btn pull-right" value="Sign Up" />
</div>	
</div>

</div>
<script>
    // Plugin Test
    $(window).parallaxmouse({
        invert: true,
        range: 400,
        elms: [
            {el: $('#warpbg'), rate: 0.1},
            {el: $('#fans'), rate: 0.2},
            {el: $('#star2'), rate: 0.2},
           
            {el: $('#star4'), rate: 0.2},
            {el: $('#star5'), rate: 0.2},
            {el: $('#planet'), rate: 0.3},
            {el: $('#artist'), rate: 0.4},
            {el: $('#hand'), rate: 0.48},
            {el: $('#venues'), rate: 0.4}
        ]
    });
</script>
<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
		
		



<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

</body>
</html>