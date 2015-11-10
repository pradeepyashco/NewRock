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
#fan-up-area tr td { line-height:10px!important;}
.clicking-bottom-content { line-height:20px!important}	
	  
.info_window{
	color: #000000;
	height: auto;
	line-height: 16px;
	overflow: hidden;
	font-size:15px;
}


#artist_registration-bg-main { height:735px!important;}

#fan-up-area input[type="radio"] { margin-top:-3px!important}


   </style>
<div class="row">
	<div class="span6 offset3">
		<h1>Sign up</h1>

		<?php if(@$error): ?>
		<div class="alert">
			<button type="button" class="close" data-dismiss="alert">
				×
			</button>
			<?php echo $error; ?>
		</div>
		<?php endif; ?>

		<div class="well">
			<?php
			$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
			$hidden = array('hidden_video_filename' => '', 'hidden_audio_filename' => '', 'invited_by' => '');
			echo form_open_multipart('users/activation', $attributes, $hidden);
			?>
	
			<div class="control-group">
				<label class="control-label" for="user_name">User name</label>
				<div class="controls">
					<?php echo form_input('user_name', set_value('user_name')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputEmail">Email</label>
				<div class="controls">
					<?php
					$data = array('name' => 'user_email_id', 'id' => 'user_email_id', 'value' => set_value('user_email_id'));

					echo form_input($data);
				?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="user_password">Password</label>
				<div class="controls">
					<?php
					$data = array('name' => 'user_password', 'id' => 'user_password', 'value' => set_value('user_password'));

					echo form_password($data);
				?>
				</div>
			</div>
<!--
<div class="control-group">
				<label class="control-label" for="user_type">user_type</label>
				<div class="controls">
					<?php
					$options = array('-1' => 'Select User Type', 'Artist' => 'Artist', 'Fan' => 'Fan', 'Venue' => 'Venue' );

					$attr = array('id' => 'user_type', 'onChange' => '');
					echo form_dropdown('user_type', $options, set_value('user_type'), $attr);
					?>
				</div>
			</div>
			

<div class="control-group">
				<label class="control-label" for="sub_type">User Sub Type</label>
				<div class="controls">
					<?php
					$options = array('-1' => 'Select Sub Type', 'Intern' => 'Intern', 'SuperFan' => 'SuperFan', 'SchoolDescoverer' => 'SchoolDescoverer' );

					$attr = array('id' => 'sub_type', 'onChange' => '');
					echo form_dropdown('sub_type', $options, set_value('sub_type'), $attr);
					?>
				</div>
			</div>
			
-->			
			<!-- MEta  -->
			
			<div class="control-group">
				<label class="control-label" for="user_age">user_age</label>
				<div class="controls">
					<?php
					$data = array('name' => 'user_age', 'id' => 'user_age', 'value' => set_value('user_age'));

					echo form_input($data);
				?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="user_gender">user_gender</label>
				<div class="controls">
					<?php
					$options = array('-1' => 'Select Gender', 'male' => 'Male', 'female' => 'Female', );
					$attr = array('id' => 'user_gender', 'onChange' => '');
					echo form_dropdown('user_gender', $options, set_value('user_gender'), $attr);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="artist_category">artist_category</label>
				<div class="controls">
					<?php
					$options = array('-1' => 'Select Artist Category', 'dj' => 'DJ', 'original' => 'Original', );

					$attr = array('id' => 'artist_category', 'onChange' => '');
					echo form_dropdown('artist_category', $options, set_value('artist_category'), $attr);
					?>
				</div>
			</div>
					

			<div class="control-group">
				<label class="control-label" for="live_performer">live_performer</label>
				<div class="controls">
					<?php
					$options = array('-1' => 'Select Live Performer Option', 'yes' => 'Yes', 'no' => 'No', );

					$attr = array('id' => 'live_performer', 'onChange' => '');
					echo form_dropdown('live_performer', $options, set_value('live_performer'), $attr);
					?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="genre1">genre1</label>
				<div class="controls">
					<?php
					$options = array('-1' => 'Select Gener', 'rock' => 'Rock', 'pop' => 'Pop', 'jazz' => 'Jazz', 'country' => 'Country', 'indi' => 'Indi Pop', );

					$attr = array('id' => 'genre1', 'onChange' => '');
					echo form_dropdown('genre1', $options, set_value('genre1'), $attr);
					?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="genre2">genre2</label>
				<div class="controls">
					<?php
					$options = array('-1' => 'Select Gener', 'rock' => 'Rock', 'pop' => 'Pop', 'jazz' => 'Jazz', 'country' => 'Country', 'indi' => 'Indi Pop', );

					$attr = array('id' => 'genre2', 'onChange' => '');
					echo form_dropdown('genre2', $options, set_value('genre2'), $attr);
					?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="genre3">genre3</label>
				<div class="controls">
					<?php
					$options = array('-1' => 'Select Gener', 'rock' => 'Rock', 'pop' => 'Pop', 'jazz' => 'Jazz', 'country' => 'Country', 'indi' => 'Indi Pop', );

					$attr = array('id' => 'genre3', 'onChange' => '');
					echo form_dropdown('genre3', $options, set_value('genre3'), $attr);
					?>
				</div>
			</div>
	
		<div class="control-group">
			<label class="control-label" for="user_payoue_email">user_payoue_email</label>
			<div class="controls">
				<?php
				$data = array('name' => 'user_payoue_email', 'id' => 'user_payoue_email', 'value' => set_value('user_payoue_email'));

				echo form_input($data);
			?>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="charity_type">charity_type</label>
			<div class="controls">
				<?php
				$options = array('-1' => 'Select Charity', 'rock' => 'Rock', 'pop' => 'Pop', 'jazz' => 'Jazz', 'country' => 'Country', 'indi' => 'Indi Pop', );

				$attr = array('id' => 'charity_type', 'onChange' => '');
				echo form_dropdown('charity_type', $options, set_value('charity_type'), $attr);
				?>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="participate_venyou">participate_venyou</label>
			<div class="controls">
				<?php
				$options = array('-1' => 'Select Participation', 'yes' => 'Yes', 'no' => 'No', );

				$attr = array('id' => 'participate_venyou', 'onChange' => '');
				echo form_dropdown('participate_venyou', $options, set_value('participate_venyou'), $attr);
				?>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="country">country</label>
			<div class="controls">
				<?php
				$data = array('name' => 'country', 'id' => 'country', 'value' => set_value('country'));

				echo form_input($data);
			?>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="zipcode">zipcode</label>
			<div class="controls">
				<?php
				$data = array('name' => 'zipcode', 'id' => 'zipcode', 'value' => set_value('zipcode'));

				echo form_input($data);
			?>
			</div>
		</div>
		

<div id="map_canvas"></div>
<span class="empty_location error"></span>
<span style="margin-left:70px;" class="zipcode error"></span>
<input type="hidden" name="map_latitude" id="map_latitude" value="" />
<input type="hidden" name="map_longitude" id="map_longitude" value="" />
<input type="hidden" name="fanzip" id="fanzip" value="" />

	
</div>
		<div class="control-group">
			<label class="control-label" for="subscription_type">subscription_type</label>
			<div class="controls">
				<?php
				$options = array('-1' => 'Select Subscription', 'yes' => 'Yes', 'no' => 'No', );

				$attr = array('id' => 'subscription_type', 'onChange' => '');
				echo form_dropdown('subscription_type', $options, set_value('subscription_type'), $attr);
				?>

			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<input type="submit" value="signup" />
			</div>
		</div>
		</form>
	</div>
</div>
</div>
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
		alert(document.getElementById('map_longitude').value);
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

