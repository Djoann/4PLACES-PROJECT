<?php

	class Request{

		public $url;
		public $page;
		public $prefix = false;
		public $data = false;

		function __construct(){
			$this->url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
			$this->page = 1;
			if(isset($_GET['page'])){
				if(is_numeric($_GET['page'])){
					if($_GET['page'] > 0){
						$this->page = round($_GET['page']);
					}
					
				}
				
			}
			if(!empty($_POST)){
				$this->data = new stdClass();
				foreach($_POST as $k=>$v){
					$this->data->$k = $v;
				}
			}
		}

	}

?>