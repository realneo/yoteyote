<div class="panel panel-default manage">

	<div class="panel-heading"> Manage User Profiles</div>

	<div class="panel-body manage">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed manage">

				<thead class="active-header">
					<tr>
						<th class="th-align">#id</th>
						<th class="th-align">User id</th>
						<th class="th-align">First name</th>
						<th class="th-align">Last name</th>
						<th class="th-align">DOB</th>
						<th class="th-align">Gender</th>
						<th class="th-align">BIO</th>
						<th class="th-align">Mobile</th>
						<th class="th-align">Bank</th>
						<th class="th-align">Picture</th>
						<th class="th-align">Country</th>
						<th class="th-align">City</th>
						<th class="th-align">Street</th>
						<th class="th-align">Building name</th>
						<th class="th-align">Building number</th>
						<th class="th-align">Nick name</th>
						<th class="th-align">Created At</th>
						<th class="th-align">Updated At</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>

				<tbody>
					<!-- Generate the Twitter Bootstrap Table DataGrid -->
					<?php foreach($data_grid as $item): ?>
						<tr>
							<td><?php echo $item->id; ?></td>
							<td><?php echo $item->profile_user_id; ?></td>
							<td><?php echo $item->profile_first_name; ?></td>
							<td><?php echo $item->profile_last_name; ?></td>
							<td><?php echo $item->profile_dob; ?></td>
							<td><?php echo $item->profile_gender; ?></td>
							<td><?php echo $item->profile_bio; ?></td>
							<td><?php echo $item->profile_mobile; ?></td>
							<td><?php echo $item->profile_bank; ?></td>
							<td><?php echo $item->profile_pic; ?></td>
							<td><?php echo $item->profile_country; ?></td>
							<td><?php echo $item->profile_city; ?></td>
							<td><?php echo $item->profile_street; ?></td>
							<td><?php echo $item->profile_building_name; ?></td>
							<td><?php echo $item->profile_building_number; ?></td>
							<td><?php echo $item->profile_nickname; ?></td>
							<td><?php echo $item->profile_created_at; ?></td>
							<td><?php echo $item->profile_updated_at; ?></td>

							<!-- Build actions links -->
							<td class="text-center col-lg-2">
								<a href="<?php echo base_url('profiles/edit/'.$item->id.'/'); ?>" class="btn btn-primary btn-info btn-xs">
									<span class="glyphicon glyphicon-edit"></span> Edit
								</a>

								<a href="<?php echo base_url('profiles/delete/'.$item->id.'/'); ?>" class="btn btn-primary btn-danger btn-xs">
									<span class="glyphicon glyphicon-remove-circle"></span> Delete
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>

			</table>
		</div> <!-- table-responsive -->
	</div> <!-- panel body -->

	<div class="panel-footer manage"><?php echo $pager_links; ?></div>

</div> <!-- panel -->

<br />

<!--<div><a href="<?php //echo base_url('profiles/add'); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Profile</a></div>-->
