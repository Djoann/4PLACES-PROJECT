<?php

	if($this->request->prefix == 'admin'){
		$this->layout = 'default';
		if(!$this->Session->isLogged() || $this->Session->user('role') != 'admin'){
			$this->redirect('users/signin');
		}
	}

?>