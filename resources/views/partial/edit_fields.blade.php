<div class="form-group">
	<?= Form::label('title', 'Title:'); ?>
	<?= Form::text('title',null, ['class' => 'form-control']); ?>
</div>
<div class="form-group">
	<?= Form::label('created_by', 'Created By:'); ?>
	<?= Form::text('created_by', $user->name, ['class' => 'form-control', 'readonly' => true]); ?>
</div>
<div class="form-group">
	<?= Form::label('body', 'Content'); ?>
	<?= Form::textarea('body', null, ['class' => 'form-control']) ?>
</div>
<?= Form::submit('Update Post',['class' => 'btn btn-primary']); ?>
<?= link_to('home', 'Cancel'); ?>