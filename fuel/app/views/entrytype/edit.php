<h2>Editing <span class='muted'>EntryType</span></h2>
<br>

<?php echo render('entrytype/_form'); ?>
<p>
	<?php echo Html::anchor('entrytype/view/'.$entryType->id, 'View'); ?> |
	<?php echo Html::anchor('entrytype', 'Back'); ?></p>
