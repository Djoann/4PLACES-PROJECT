<?php

	if($this->request->prefix == 'admin'){
		$this->layout = 'admin/one';
		if(!$this->Session->isLogged() || $this->Session->user('role') != 'admin'){
			$this->redirect('users/login');
		}
	}

?>