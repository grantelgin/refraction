<h2>Viewing <span class='muted'>#<?php echo $postEntry->id; ?></span></h2>

<p>
	<strong>Entryid:</strong>
	<?php echo $postEntry->entryid; ?></p>
<p>
	<strong>Postid:</strong>
	<?php echo $postEntry->postid; ?></p>
<p>
	<strong>Seq:</strong>
	<?php echo $postEntry->seq; ?></p>

<?php echo Html::anchor('postentry/edit/'.$postEntry->id, 'Edit'); ?> |
<?php echo Html::anchor('postentry', 'Back'); ?>