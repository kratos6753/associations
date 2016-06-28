<?php 
App::uses('AppController', 'Controller');

class RecipesController extends AppController {

	public function index() {
		$recipes = $this->Recipe->find('all');
		$this->set(compact('recipes'));
	}

	public function myrecipes() {
		$myrecipes = $this->Recipe->find('all', array('conditions' => array('author_id' => $this->Auth->user('id'))));
		$this->set(compact('myrecipes'));
	}

	public function add() {
		if($this->request->is('post')) {
			$this->request->data['Recipe']['author_id'] = $this->Auth->user('id');
			if($this->Recipe->save($this->request->data)) {
				$this->Flash->success(__('Recipe successfully created.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Recipe not created.'));
		}
	}

	public function view($id = null) {
		if(!$this->Recipe->exists($id)) {
			throw new NotFoundException(__('Invalid Recipe')); // Not Found Exception
		}
		$recipe = $this->Recipe->findById($id);
		$this->set(compact('recipe'));
	}
}
