<h2>Viewing <span class='muted'>#<?php echo $blogPost->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $blogPost->title; ?></p>

<?php echo Html::anchor('blogpost/edit/'.$blogPost->id, 'Edit'); ?> |
<?php echo Html::anchor('blogpost', 'Back'); ?>