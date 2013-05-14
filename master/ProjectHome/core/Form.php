<?php

	class Form{

		public $controller;
		public $errors;

		public function __construct($controller){
			$this->controller = $controller;
		}

		public function input($name,$label,$options = array()){
			$error = false;
			$classError = '';
			if(isset($this->errors[$name])){
				$error = $this->errors[$name];
				$classError = ' error';
			}
			if(!isset($this->controller->request->data->$name)){
				$value = '';
			}
			else{
				$value = $this->controller->request->data->$name;
			}
			if($label == 'hidden'){
				return '<input type="hidden" name="'.$name.'" value="'.$value.'">';
			}
			$html = '';
						
			$attr = ' ';
			foreach ($options as $k => $v){ if ($k != 'type') {
				$attr .= "$k=\"$v\"";
			}}
			if(!isset($options['type'])){
				$html .= '<input type="text" id="input'.$name.'" name="'.$name.'" value="'.$value.'" '.$attr.'>';
			}
			elseif($options['type'] == 'textarea'){
				$html .= '<textarea id="input'.$name.'" name="'.$name.'" '.$attr.'>'.$value.'</textarea>';

			}
			elseif($options['type'] == 'checkbox'){
				$html .= '<input type="hidden" name="'.$name.'" value="0"><input type="checkbox" id="input'.$name.'" name="'.$name.'" value="1" '.(empty($value)?'':'checked').'>';
			}
			elseif($options['type'] == 'file'){
				$html .= '<input type="file" class="input-file" id="input'.$name.'" name="'.$name.'" '.$attr.'>';
			}
			elseif($options['type'] == 'password'){
				$html .= '<input type="password" id="input'.$name.'" name="'.$name.'" value="'.$value.'" '.$attr.'>';
			}
			if($error){
				$html .= '<span '.$attr.'>'.$error.'</span>';
			}
			$html .= '';
			return $html;
					
		}

	}

?>