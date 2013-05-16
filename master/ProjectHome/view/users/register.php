<div class="page-header">
	<h2>S'inscrire</h2>
</div>



<form class="connection" action="<?php echo Router::url('users/register/'); ?>" method="post">

	<?php echo $this->Form->input('id','hidden'); ?>

	<label for="inputlogin"></label>
	<?php echo $this->Form->input('login', 'Nom d\'utilisateur', array( 'placeholder' => 'Nom d\'utilisateur')); ?>

	<label for="inputpassword"></label>
	<?php echo $this->Form->input('password', 'Mot de passe', array(
		'type'	=> 'password',
		'placeholder' => 'Password'
		)); ?>

	<label for="inputfirstname"></label>
	<?php echo $this->Form->input('firstname', 'Prénom', array( 'placeholder' => 'Prénom'));?>

	<label for="inputlastname"></label>
	<?php echo $this->Form->input('lastname', 'Nom', array( 'placeholder' => 'Nom')); ?>

	<label for="inputaddress"></label>
	<?php echo $this->Form->input('address', 'Adresse', array( 'placeholder' => 'Adresse')); ?>

	<div class="form-actions">
		<button type="submit" class="btn sendconnection">Envoyer</button>
	</div>

</form>