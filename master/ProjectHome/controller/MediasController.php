<?php

	class MediasController extends Controller{

		function admin_index($id = null){
			$this->loadModel('Media');
			if($this->request->data && !empty($_FILES['file']['name'])){
				if(strpos($_FILES['file']['type'], 'image') !== false){
					$dir = WEBROOT.DS.'img'.DS.date('Y-m');
					$min = WEBROOT.DS.'img'.DS.date('Y-m').DS.'min';
					$file = crypting($_FILES['file']['name']).'-'.$_FILES['file']['name'];
					if(!file_exists($dir)) mkdir($dir,0777);
					if(!file_exists($min)) mkdir($min,0777);
					move_uploaded_file($_FILES['file']['tmp_name'], $dir.DS.$file);
					if(isset($id)){
						$this->Media->save(array(
							'name'		=> $this->request->data->name,
							'file'		=> date('Y-m').'/'.$file,
							'filemin'	=> date('Y-m').'/min/'.$file,
							'post_id'	=> $id,
							'type'		=> 'img'
							));
					}
					else{
						$this->Media->save(array(
							'name'		=> $this->request->data->name,
							'file'		=> date('Y-m').'/'.$file,
							'filemin'	=> date('Y-m').'/min/'.$file,
							'post_id'	=> 0,
							'type'		=> 'img'
							));
					}
					creerMin(IMG.date('Y-m').'/'.$file,IMG.date('Y-m').'/min/',$file,260,180);
					$this->Session->setFlash("L'image a bien été envoyée");
				}
				else{
					$this->Form->errors['file'] = "Le fichier n'est pas une image";
				}
			}
			if(isset($id)){
				$d['images'] = $this->Media->find(array(
					'conditions'	=> array(
						'post_id'	=> $id
						)
					));
			}
			else{
				$post_id;
				$d['images'] = $this->Media->find(array(
					'conditions'	=> array(
						'post_id'	=> 0
						)
					));
			}
			$d['post_id'] = $id;
			$this->set($d);
		}

		function admin_inindex($id = null){
			$this->loadModel('Media');
			if($this->request->data && !empty($_FILES['file']['name'])){
				if(strpos($_FILES['file']['type'], 'image') !== false){
					$dir = WEBROOT.DS.'img'.DS.date('Y-m');
					$min = WEBROOT.DS.'img'.DS.date('Y-m').DS.'min';
					$file = crypting($_FILES['file']['name']).'-'.$_FILES['file']['name'];
					if(!file_exists($dir)) mkdir($dir,0777);
					if(!file_exists($min)) mkdir($min,0777);
					move_uploaded_file($_FILES['file']['tmp_name'], $dir.DS.$file);
					if(isset($id)){
						$this->Media->save(array(
							'name'		=> $this->request->data->name,
							'file'		=> date('Y-m').'/'.$file,
							'filemin'	=> date('Y-m').'/min/'.$file,
							'post_id'	=> $id,
							'type'		=> 'img'
							));
					}
					else{
						$this->Media->save(array(
							'name'		=> $this->request->data->name,
							'file'		=> date('Y-m').'/'.$file,
							'filemin'	=> date('Y-m').'/min/'.$file,
							'post_id'	=> 0,
							'type'		=> 'img'
							));
					}
					creerMin(IMG.date('Y-m').'/'.$file,IMG.date('Y-m').'/min/',$file,260,180);
					$this->Session->setFlash("L'image a bien été envoyée");
				}
				else{
					$this->Form->errors['file'] = "Le fichier n'est pas une image";
				}
			}
			$this->layout = 'modal';
			if(isset($id)){
				$d['images'] = $this->Media->find(array(
					'conditions'	=> array(
						'post_id'	=> $id
					)));
			}
			else{
				$post_id;
				$d['images'] = $this->Media->find(array(
					'conditions'	=> array(
						'post_id'	=> 0
						)
					));
			}
			$d['post_id'] = $id;
			$this->set($d);
		}

		function admin_delete($id){
			$this->loadModel('Media');
			$media = $this->Media->findFirst(array(
				'conditions'	=> array('id' => $id)
				));
			unlink(IMG.DS.$media->file);
			unlink(IMG.DS.$media->filemin);
			$this->Media->delete($id);
			$this->Session->setFlash("L'image a bien été supprimée");
			if($post_id != 0){
				$this->redirect('admin/medias/inindex/'.$media->post_id);
			}
			else{
				$this->redirect('admin/medias/index/');
			}
		}

		function admin_getImg(){
			$this->loadModel('Media');
			return $this->Media->find();
		}

	}

?>