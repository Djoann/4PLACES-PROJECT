<?php

	$title_for_layout = 'Connexion';

?>

<div class="page-header">
	<h2>Se Connecter</h2>
</div>

<form class="connection" action="<?php echo Router::url('users/signin/'); ?>" method="post">

	<label for="inputlogin"></label>
	<?php echo $this->Form->input('login', 'Nom d\'utilisateur', array('placeholder' => 'Nom d\'utilisateur')); ?>

	<label for="inputpassword"></label>
	<?php echo $this->Form->input('password', 'Mot de passe', array(
		'type'	=> 'password',
		'placeholder' => 'Mot de passe'
		)); ?>

	<div class="form-actions">
		<button type="submit" class="btn sendconnection">Envoyer</button>
	</div>

</form>