<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Entryid', 'entryid', array('class'=>'control-label')); ?>

				<?php echo Form::input('entryid', Input::post('entryid', isset($postEntry) ? $postEntry->entryid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Entryid')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Postid', 'postid', array('class'=>'control-label')); ?>

				<?php echo Form::input('postid', Input::post('postid', isset($postEntry) ? $postEntry->postid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Postid')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Seq', 'seq', array('class'=>'control-label')); ?>

				<?php echo Form::input('seq', Input::post('seq', isset($postEntry) ? $postEntry->seq : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Seq')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>