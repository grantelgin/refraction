<h2>Listing <span class='muted'>BlogPosts</span></h2>
<br>
<?php if ($blogPosts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($blogPosts as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('blogpost/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('blogpost/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('blogpost/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No BlogPosts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('blogpost/create', 'Add new BlogPost', array('class' => 'btn btn-success')); ?>

</p>
