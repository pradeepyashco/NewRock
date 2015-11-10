<style>
	.zipcls
	{
		width:100%!important;
		border: none!important;
	}
</style>
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
			//echo form_open_multipart('', $attributes, $hidden);
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

<div class="col-lg-6"></div>
<div class="col-lg-6">
<div class="col-lg-3 upload"> <span style="margin-left: 0px!important">Profile Picture: </span></div>
<div class="col-lg-6 upload">
<label for="profilepic" class="custom-file-upload"><i class="glyphicon glyphicon-hdd"></i>&nbsp; Browse Picture </label>
<!-- <input id="file-upload" type="file"/>-->
<input type="file" id="profilepic" name="profilepic" accept=".gif, .jpg, .png" >
</div>

<div class="col-lg-3">
<img id="profilepicprev" src="" alt="" height="80" width="80" /><br>
<span id="imgname"></span>
</div>
</div>

<div class="col-lg-12 user-profile-box">
</div>
<div class="clearfix"></div>



<div class="col-lg-12"><h2 class="text-head">Other Information</h2></div>


<div class="col-lg-4">
<span class="input input--nao">
  <select class="input__field input__field--nao my-down" type="text" id="genre1" name="genre1" />
    <option value="-1">Genre 1</option>
<?php					
foreach($genre as $gen)
{
 echo '<option value="'.$gen->genre_name .'"'. set_select("genre1", $gen->genre_name).'>'.html_escape($gen->genre_name).'</option>';	 
}
?>
	</select>				
  <label class="input__label input__label--nao" for="genre1"> <span class="input__label-content input__label-content--nao"></span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-4">
<span class="input input--nao">
  <select class="input__field input__field--nao my-down" type="text" id="genre2" name="genre2" />
<option value="-1">Genre 2</option>
<?php					
foreach($genre as $gen)
{
 echo '<option value="'.$gen->genre_name .'"'. set_select("genre2", $gen->genre_name).'>'.html_escape($gen->genre_name).'</option>';	 
}
?> 
	  
</select>
  <label class="input__label input__label--nao" for="genre2"> <span class="input__label-content input__label-content--nao"></span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-4">
<span class="input input--nao">
  <select class="input__field input__field--nao my-down" type="text" id="genre3" name="genre3" />
  <option value="-1">Genre 3</option>
<?php					
foreach($genre as $gen)
{
 echo '<option value="'.$gen->genre_name .'"'. set_select("genre3", $gen->genre_name).'>'.html_escape($gen->genre_name).'</option>';	 
}
?>
	</select>		
  <label class="input__label input__label--nao" for="genre3"> <span class="input__label-content input__label-content--nao"></span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-4">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="text" id="user_payoue_email" name="user_payoue_email" value="<?php echo set_value('user_payoue_email'); ?>" />
  <label class="input__label input__label--nao" for="user_payoue_email"> <span class="input__label-content input__label-content--nao">*Payout Email</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>
<div class="col-lg-4">
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
	
  <label class="input__label input__label--nao" for="input1"> <span class="input__label-content input__label-content--nao"></span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-4">
<span class="participate">Do you want to participate in VenuLink 
<input type="checkbox" id="participate_venyouyes" name="participate_venyou" value="Yes"  <?php if(set_value('participate_venyou') == 'Yes') echo "checked"; ?>> Yes 
<input id="participate_venyouno" type="checkbox" name="participate_venyou"  value="No"  <?php if(set_value('participate_venyou') == 'No') echo "checked"; ?>> No </span> 
</div>
<div class="clearfix"></div><br>

<div class="col-lg-6">
<span class="input input--nao">
  <input class="input__field input__field--nao" type="text" id="distancegoforevent" name="distancegoforevent" value="<?php echo set_value('distancegoforevent'); ?>" />
  <label class="input__label input__label--nao" for="distancegoforevent"> <span class="input__label-content input__label-content--nao">How far are you willing to travel to attend a show</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>

<div class="col-lg-6">
<span class="input input--nao">
  <select class="input__field input__field--nao my-down" type="text" id="socialparticipation" name="socialparticipation" />
  <option>Would you like to meet new people and particpate in our Matching Social Connection Process</option>
    <option value="Yes">Yes</option>
    <option value="No">No</option>
    </select>
  <label class="input__label input__label--nao" for="socialparticipation"> <span class="input__label-content input__label-content--nao"></span> </label>
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




<div class="col-lg-6">
<span class="input input--nao">
  <input class="zipcls input__field input__field--nao" placeholder="" type="text" id="zipcode" name="zipcode" value="<?php echo set_value('zipcode'); ?>" />
  <label class="zipcls input__label input__label--nao" for="zipcode"> <span class="zipcls input__label-content input__label-content--nao">*Zipcode</span> </label>
  <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
  <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
  </svg> </span>
</div>





<div class="clearfix"></div><br>
<div class="col-lg-12">
	<div id="map_canvas"></div>
<span class="empty_location error"></span>
<span style="margin-left:70px;" class="zipcode error"></span>
<input type="hidden" name="map_latitude" id="map_latitude" value="" />
<input type="hidden" name="map_longitude" id="map_longitude" value="" />
<input type="hidden" name="fanzip" id="fanzip" value="" />
	
</div>
<div class="clearfix"></div><br>

<div class="col-lg-6 col-lg-offset-6"><input type="submit" class="submit-btn pull-right" value="Sign Up" /></div>	
</div>

<script>
  
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


	$(function() {
	
		
		$("#profilepic").change(function() {
			readURL(this);
		});
		
	
		
		
	}); 
	
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
		
		<script>
     function initialize() {
	     var mapOptions = {
          center: new google.maps.LatLng(-33.8688, 151.2195),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map_canvas'),
          mapOptions);

        var input = document.getElementById('zipcode');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          input.className = '';
          var place = autocomplete.getPlace();
          if (!place.geometry) {
               input.className = 'notfound';
            return;
          }
          
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  
          }
 
          var image = new google.maps.MarkerImage(
              place.icon,
              new google.maps.Size(71, 71),
              new google.maps.Point(0, 0),
              new google.maps.Point(17, 34),
              new google.maps.Size(35, 35));
          marker.setIcon(image);
          marker.setPosition(place.geometry.location);

	 	var mygc = new google.maps.Geocoder();
		mygc.geocode({'address' : input.value}, function(results, status){
		document.getElementById('map_latitude').value = results[0].geometry.location.lat();
		document.getElementById('map_longitude').value = results[0].geometry.location.lng();
		document.getElementById('fanzip').value = input.value;
		
		});	
			
          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div class="info_window"><strong>' + place.name + '</strong><br>' + address+'</div>');
          infowindow.open(map, marker);
        });

      
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          google.maps.event.addDomListener(radioButton, 'click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);
      }
$(document).ready(function(){
   initialize();
});

$("form").bind("keypress", function (e) {
    if (e.keyCode == 13) {
        return false;
    }
});


</script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

</body>
</html>