<h2>Editing <span class='muted'>PostEntry</span></h2>
<br>

<?php echo render('postentry/_form'); ?>
<p>
	<?php echo Html::anchor('postentry/view/'.$postEntry->id, 'View'); ?> |
	<?php echo Html::anchor('postentry', 'Back'); ?></p>
