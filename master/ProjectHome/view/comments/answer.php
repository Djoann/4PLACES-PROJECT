<div class="page-header">
	<h3>Commenter</h3>
</div>
<form class="form-horizontal" action="<?php echo Router::url('comments/answer/'.$announce->id); ?>" method="post">
	
	<?php echo $this->Form->input('id','hidden'); ?>
	<?php echo $this->Form->input('content','Contenu',array(
		'type'			=> 'textarea',
		'class' 		=> 'input-xxlarge',
		'rows'			=> 10,
		'placeholder'	=> 'Répondez à cette annonce'
	)); ?>

	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Envoyer</button>
	</div>

</form>