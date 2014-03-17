<h2>Listing <span class='muted'>EntryTypes</span></h2>
<br>
<?php if ($entryTypes): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Text</th>
			<th>Type</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($entryTypes as $item): ?>		<tr>

			<td><?php echo $item->text; ?></td>
			<td><?php echo $item->type; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('entrytype/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('entrytype/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('entrytype/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No EntryTypes.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('entrytype/create', 'Add new EntryType', array('class' => 'btn btn-success')); ?>

</p>
