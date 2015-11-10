
<div class="container trans-bg">
<div class="col-lg-12"><h2 class="text-head">Activation Status</h2></div>
	<div class="row">
	
		<div class="col-lg-6 col-lg-offset-3 upload">
			<h3><?php if($act_status=="Success") {echo "You are Activated successfully. Thank you.";}
			else if($act_status=="Already Activated") {echo "You are Already Activated. Thank you.";}
else {
echo "Activation Fail. Please contact our support persons to assist you. ";
}
				 ?></h3>
		</div>
		
		<div class="col-lg-6 col-lg-offset-3 upload">

		</div>

		
	</div>
</div>
