<?php 
App::uses('AppController', 'Controller');

class ReviewsController extends AppController {
	public $uses = array('Recipe');

	public function add($recipe_id= null)
	{
		if(!$this->Recipe->exists($recipe_id)) {
			throw new NotFoundException(__('Invalid Recipe')); // Not Found Exception
		}
		if($this->request->is('post')) {
			$this->request->data['user_id'] = $this->Auth->user('id');
			$this->request->data['recipe_id'] = $recipe_id;
			if($this->Review->save($this->request->data)) {
				$this->Flash->success(__('Review is added successfully'));
				return $this->redirect(array('controller' => 'recipes', 'action' => 'view', $recipe_id));
			}
			$this->Flash->error(__('Review is not added.'));
		}
	}
}
