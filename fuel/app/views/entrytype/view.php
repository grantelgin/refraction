<h2>Viewing <span class='muted'>#<?php echo $entryType->id; ?></span></h2>

<p>
	<strong>Text:</strong>
	<?php echo $entryType->text; ?></p>
<p>
	<strong>Type:</strong>
	<?php echo $entryType->type; ?></p>

<?php echo Html::anchor('entrytype/edit/'.$entryType->id, 'Edit'); ?> |
<?php echo Html::anchor('entrytype', 'Back'); ?>