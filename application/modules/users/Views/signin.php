<div class="container trans-bg">
	
	
<div class="col-lg-6 col-lg-offset-3"><h2 class="text-head">User Login</h2></div>	
	
	<div class="col-lg-6 col-lg-offset-3">
		<?php if(@$error): ?>
		<div class="alert">
			<button type="button" class="close" data-dismiss="alert">
				×
			</button>
			<?php echo $error; ?>
		</div>
		<?php endif; ?>
	</div>

			<div class="col-lg-6 col-lg-offset-3">
				<form role="form" method="post" action="">
					<div class="form-group">
						<label for="user_email">Email</label>
							<input type="text" id="user_email" class="form-control" placeholder="Email" name="user_email" value="<?php if(isset($_COOKIE['remember_me'])) echo $_COOKIE['remember_me']; ?>">
						
					</div>
					<div class="form-group">
						<label for="user_password">Password</label>
							<input type="password" id="user_password" class="form-control" placeholder="Password" name="user_password" value="<?php if(isset($_COOKIE['remember_me_pass'])) echo $_COOKIE['remember_me_pass']; ?>">
						
					</div>
					<div class="checkbox">
						
							<label>
							<input type="checkbox" name="remember_me" <?php if(isset($_COOKIE['remember_me'])) { echo 'checked="checked"'; } else { echo ''; } ?>>Remember me
							</label>
						</div>
						
					<button type="submit"  class="btn btn-default">Sign in</button>
						
					</div>
				</form>
			</div>
			
		</div>
