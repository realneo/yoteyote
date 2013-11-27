<div class="list-group">

	<a href="#" class="list-group-item active">
		<?php echo $widget_heading; ?>
	</a>

	<?php foreach ($list_data as $item): ?>

		<a href="<?php echo $item->list_url; ?>" class="list-group-item">

			<?php echo $$item_content; ?>

		</a>

	<?php endforeach; ?>

</div> <!-- list-group -->
