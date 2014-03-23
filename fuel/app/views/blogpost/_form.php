<div class="btn-group">
  <button type="button" class="btn btn-default">Add paragraph</button>
  <button type="button" class="btn btn-default">Add teach me a better way</button>
  <button type="button" class="btn btn-default">Add oh shit</button>
</div>

<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($blogPost) ? $blogPost->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Paragraph', 'paragraph', array('class'=>'control-label')); ?>

				<?php echo Form::input('paragraph', Input::post('paragraph', isset($blogPost) ? $blogPost->paragraph : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'paragraph')); ?>

		</div>
		
		<div class="form-group">
			<?php echo Form::label('Teach me a better way', 'tmabw', array('class'=>'control-label')); ?>

				<?php echo Form::input('tmabw', Input::post('tmabw', isset($blogPost) ? $blogPost->tmabw : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Teach me a better way')); ?>

		</div>
		
		<div class="form-group">
			<?php echo Form::label('Oh Shit!', 'ohShit', array('class'=>'control-label')); ?>

				<?php echo Form::input('ohShit', Input::post('ohShit', isset($blogPost) ? $blogPost->ohShit : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Oh Shit')); ?>

		</div>
		
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>