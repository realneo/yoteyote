<!-- Block Content -->
<p>
	<div class="table-responsive">

		<table class="table table-bordered table-hover table-condensed">

			<thead class="active-header">
				<tr>
					<th class="th-align">#id</th>
					<th class="th-align">Title</th>
					<th class="th-align">Slug</th>
					<th class="th-align">Type</th>
					<th class="th-align">Status</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>

			<tbody>
				<!-- Generate the Twitter Bootstrap Table DataGrid -->
				<?php foreach($data_grid as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->page_title; ?></td>
						<td><?php echo $item->page_slug; ?></td>
						<td><?php echo $item->page_type; ?></td>
						<td><?php echo $item->page_status; ?></td>

						<!-- Build actions links -->
						<td class="text-center col-lg-2">
							<a href="<?php echo base_url('pages/edit/'.$item->id.'/'); ?>" class="btn btn-primary btn-info btn-xs">
								<span class="glyphicon glyphicon-edit"></span> Edit
							</a>
							<a href="<?php echo base_url('pages/delete/'.$item->id.'/'); ?>" class="btn btn-primary btn-danger btn-xs">
								<span class="glyphicon glyphicon-remove-circle"></span> Delete
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>

		</table>

	</div> <!-- table-responsive -->

	<div>
		<?php echo $pager_links; ?>
	</div>

</p>

<div>
	<a href="<?php echo base_url('pages/add'); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Page</a>
</div>
<!-- END Block Content -->