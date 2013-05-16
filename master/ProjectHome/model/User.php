<?php

	class User extends Model{

		var $validate = array(
			'login' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=> 'Vous devez préciser un nom d\'utilisateur.'
				),
			'password' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=> 'Vous devez préciser un mot de passe.'
				),
			'address' => array(
				'rule' 		=> 'notEmpty',
				'message' 	=> 'Vous devez préciser une adresse.'
				),
			);

		public function validates($data){
			$errors = array();
			foreach($this->validate as $k=>$v){
				if(!isset($data->$k)){
					$errors[$k] = $v['message'];
				}
				else{
					if($v['rule'] == 'notEmpty'){
						if(empty($data->$k)){
							$errors[$k] = $v['message'];
						}
					}
					elseif(!preg_match('/^'.$v['rule'].'$/',$data->$k)){
						$errors[$k] = $v['message'];
					}
				}
			}
			$this->errors = $errors;
			if(isset($this->Form)){
				$this->Form->errors = $errors;
			}
			if(empty($errors)){
				return true;
			}
			return false;
		}
		
	}

?>