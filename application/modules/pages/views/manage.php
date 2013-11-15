<div class="panel panel-default manage">

	<div class="panel-heading"> Manage Pages</div>

	<div class="panel-body manage">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed manage">

				<thead class="active-header">
					<tr>
						<th class="th-align">#id</th>
						<th class="th-align">Page Title</th>
						<th class="th-align">Page URL</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>

				<tbody>
					<!-- Generate the Twitter Bootstrap Table DataGrid -->
					<?php foreach($data_grid as $item): ?>
						<tr>
							<td><?php echo $item->id; ?></td>
							<td><?php echo $item->page_title; ?></td>
							<td><?php echo $item->page_url; ?></td>

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
	</div> <!-- panel body -->

	<div class="panel-footer manage"><?php echo $pager_links; ?></div>

</div> <!-- panel -->

<br />

<div><a href="<?php echo base_url('pages/add'); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Page</a></div>
