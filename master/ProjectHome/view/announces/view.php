<?php

	$title_for_layout = 'Annonce #'.$announce->id;
	$users = $this->request('Users','admin_getUsers');
	$comments = $this->request('Comments','getCom');

?>
<?php foreach ($users as $u): ?>
	<?php if ($u->id == $announce->user_id): ?>
		<b><?php echo $u->firstname.' '.$u->lastname ?></b>
	<?php endif ?>
<?php endforeach ?>
	
<p><?php echo $announce->content; ?></p>

<p><?php echo $announce->address; ?></p>


<?php foreach ($comments as $c): ?>

	<?php if ($c->announce_id == $announce->id): ?>
		<blockquote>
			<?php foreach ($users as $u): ?>
				<?php if ($u->id == $c->user_id): ?>
					<b><?php echo $u->firstname.' '.$u->lastname ?></b>
				<?php endif ?>
			<?php endforeach ?>
			<?php echo $c->content; ?>
		</blockquote>
	<?php endif ?>

<?php endforeach ?>

<?php require_once(ROOT.DS.'view'.DS.'comments'.DS.'index.php'); ?>