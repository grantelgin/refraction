<h2>Editing <span class='muted'>BlogPost</span></h2>
<br>

<?php echo render('blogpost/_form'); ?>
<p>
	<?php echo Html::anchor('blogpost/view/'.$blogPost->id, 'View'); ?> |
	<?php echo Html::anchor('blogpost', 'Back'); ?></p>
