<?php

	class CommentsController extends Controller{
		function answer($id = null){
			$this->loadModel('Comment');
			$condition = array('type' => 'answer');
			$c = $this->Comment->findCount($condition);
			$count = $c + 1;
			if($id === null){
				$comment = $this->Comment->findFirst(array(
					'conditions'	=> array('announce_id' => $id)
				));
			}
			if($this->request->data){
				if($this->Comment->validates($this->request->data)){
					$this->request->data->type = 'answer';
					$this->request->data->announce_id = $id;
					if($this->Session->isLogged()){
						$this->request->data->user_id = $this->Session->user('id');
					}
					$this->Comment->save($this->request->data);
					$this->Session->setFlash('Votre commentaire a bien été envoyé');
					$this->redirect('announces/view/id:'.$id);
				}
				else{
					$this->Session->setFlash('Votre commentaire n\'a pas pu être envoyé','error');
				}
			}
			else{
				$this->request->data = $this->Comment->findFirst(array(
					'conditions'	=> array(
					'id' => $id
					)
				));
			}
			$this->set($d);
		}

		function getCom(){
			$this->loadModel('Comment');
			return $this->Comment->find();
		}

	}

?>