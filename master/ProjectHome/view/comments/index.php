<div class="page-header">
	<h3>Commenter</h3>
</div>
<form class="form-horizontal" action="<?php echo Router::url('announces/post/'); ?>" method="post">
	
	<?php echo $this->Form->input('id','hidden'); ?>
	<?php echo $this->Form->input('announce_id','hidden'); ?>
	<?php echo $this->Form->input('user_id', 'hidden'); ?>
	<label for="inputcontent">Contenu</label>
	<?php echo $this->Form->input('content','Contenu',array(
		'type' => 'textarea',
		'class' => 'input-xxlarge wysiwyg',
		'rows'	=> 10
	)); ?>

	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Envoyer</button>
	</div>

</form>