<div class="page-header">
	<h2>S'inscrire</h2>
</div>



<form class="connection" action="<?php echo Router::url('users/register/'); ?>" method="post">

	<?php echo $this->Form->input('id','hidden'); ?>

	<label for="inputlogin"></label>
	<?php echo $this->Form->input('login', 'Nom d\'utilisateur'); ?>

	<label for="inputpassword"></label>
	<?php echo $this->Form->input('password', 'Mot de passe', array(
		'type'	=> 'password',
		'placeholder' => 'Password'
		)); ?>

	<label for="inputfirstname"></label>
	<?php echo $this->Form->input('firstname', 'Prénom', array( 'placeholder' => 'Nom'));?>

	<label for="inputlastname"></label>
	<?php echo $this->Form->input('lastname', 'Nom', 'class', 'name', array( 'placeholder' => 'Prénom')); ?>

	<div class="form-actions">
		<button type="submit" class="btn sendconnection">Envoyer</button>
	</div>

</form>