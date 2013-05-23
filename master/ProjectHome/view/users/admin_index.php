<um>
<?php
	
	$announces = $this->request('Announces', 'getAnnounces');

	foreach ($users as $u) {
		echo '<li>'.$u->firstname.' '.$u->lastname;

?>

		<a href="<?php echo Router::url('admin/users/delete/'.$u->id) ?>">Supprimer</a></li>

<?php

	}

?>
</ul>
<ul>
<?php

	foreach ($announces as $a) {
		echo '<li>';
		foreach ($users as $u) {
			if ($u->id == $a->user_id) {
				echo '<b>'.$u->firstname.' '.$u->lastname.' </b>';
			}
		}
		echo $a->title.'<br>';
		echo $a->content;
		?>

		<a href="<?php echo Router::url('admin/announces/delete/'.$a->id) ?>">Supprimer</a>

		<?php
		echo '</li>';
	}

?>
</ul>