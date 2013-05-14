<?php

	class ConfigsController extends Controller{
		function admin_index(){
			$this->loadModel('Config');
			$configs = $this->Config->find(array(
				'fields'	=> 'id,name,value,alias'
				));
			if($this->request->data){
				foreach($configs as $co){
					$data = null;
					$id = 'id'.$co->name;
					$name = $co->name;
					$value = $co->value;
					$data->id = $this->request->data->$id;
					$data->name = $name;
					$data->value = $this->request->data->$name;
					$this->Config->save($data);
				}
			}
			$d['configs'] = $this->Config->find(array(
				'fields'		=> 'id,name,value,alias'
				));
			$this->set($d);
			
		}

		function getConfig(){
			$this->loadModel('Config');
			return $this->Config->find();
		}
	}

?>