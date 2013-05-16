<?php

	class AnnouncesController extends Controller{

		function index(){
			$configs = $this->request('Configs','getConfig');
			foreach ($configs as $configs) {
				if ($configs->name == 'perpageannounce') {
					$perPage = $configs->value;
				}
			}
			$order = 'created';
			$this->loadModel('Announce');
			$condition = array(
				'type'	=> 'asking'
				);
			$d['announces'] = $this->Announce->find(array(
				'conditions'=> $condition,
				'order'		=> $order
				));
			$d['total'] = $this->Announce->findCount($condition);
			$this->set($d);

		}

		function post($id = null){
			$this->loadModel('Announce');
			$condition = array('type' => 'asking');
			if($id === null){
				$announce = $this->Announce->findFirst(array(
					'conditions'	=> array('solved' => -1)
					));
				if(!empty($announce)){
					$id = $announce->id;
				}
				else{
					$this->Announce->save(array(
						'solved' => -1
						));
					$id = $this->Announce->id;
				}
			}
			$d['id'] = $id;
			if($this->request->data){
				if($this->Announce->validates($this->request->data)){
					if($this->Session->isLogged()){
						$this->request->data->created = date('Y-m-d H:i:s');
						$this->request->data->solved = 0;
						if($this->Session->isLogged()){
							$this->request->data->user_id = $this->Session->user('id');
						}
						$this->request->data->type = 'asking';
						$this->Announce->save($this->request->data);
						$id = $this->Announce->id;
						$this->redirect('');
						$this->Session->setFlash('Le contenu a bien été mis à jour');
					}
					else{
						$this->redirect('users/signin');
					}
					
				}
				else{
					$this->Session->setFlash('Certaines informations ne sont pas valides, merci de les corriger.','error');
				}
			}
			else{
					$this->request->data = $this->Announce->findFirst(array(
						'conditions'	=> array(
						'id' => $id
						)
					));
			}
			$this->set($d);
		}

		function view($id){
			$this->loadModel('Announce');
			$d['announce'] = $this->Announce->findFirst(array(
					'conditions'	=> array(
						'solved'=> 0,
						'id' 	=> $id,
						'type'	=> 'asking'
						)
				));

			if(empty($d['announce'])){
				$this->e404('L\'annonce n\'existe pas ou plus.');
			}
			$this->set($d);
		}

		function delete($id){
			$this->loadModel('Announce');
			$announce = $this->Announce->findFirst(array(
				'conditions'	=> array(
					'id'			=> $id,
					'user_id'		=> $_SESSION['User']->id
					)
				));
			if($_SESSION['User']->id == $announce->user_id){
				$this->Announce->delete($id);
				$this->redirect('users/'.$_SESSION['User']->id);
				$this->Session->setFlash('L\'annonce bien été supprimée.');
			}
			else{
				$this->Session->setFlash('Vous n\'avez pas la permission de supprimer cette annonce.');
				$this->redirect('users/'.$_SESSION['User']->id);
			}
		}

		function getAnnounces(){
			$this->loadModel('Announce');
			return $this->Announce->find();
		}

	}

?>