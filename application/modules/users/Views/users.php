
	<div class="row">
		<div class="span12">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Type</th>
						<th>Sub-Type</th>
						<th>Super Fan</th>
					</tr>
				</thead>
				<tbod>
					<?php foreach($users as $user): ?>
					<tr>
						<td><?php echo $user -> user_id; ?></td>
							<td><?php echo anchor('users/' . $user -> user_name, $user -> user_name); ?>
							<?php //echo $user->user_name; ?></td>
							<td><?php echo $user -> user_email_id; ?></td>
						<td><?php echo $user -> user_type; ?></td>
						<td><?php echo $user -> sub_type; ?></td>
						<td><?php echo $user -> invited_by; ?></td>
						
					</tr>
					<?php endforeach; ?>
				</tbod>
			</table>
			
		</div>
	</div>
