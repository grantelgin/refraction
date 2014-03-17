<h2>Listing <span class='muted'>PostEntries</span></h2>
<br>
<?php if ($postEntries): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Entryid</th>
			<th>Postid</th>
			<th>Seq</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($postEntries as $item): ?>		<tr>

			<td><?php echo $item->entryid; ?></td>
			<td><?php echo $item->postid; ?></td>
			<td><?php echo $item->seq; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('postentry/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('postentry/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('postentry/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No PostEntries.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('postentry/create', 'Add new PostEntry', array('class' => 'btn btn-success')); ?>

</p>
