<?php 
App::uses('AppController', 'Controller');

class AuthorsController extends AppController {

	public $helpers = array('Js');
	public $components = array('RequestHandler');

	public function beforeFilter() {
		$this->Auth->allow(array('add', 'edit', 'index'));
	}

	public function index() {
		// if(AuthComponent::user('role') == 1) return redirect('/topics');
		$this->set('authors', $this->Author->find('all'));
	}

	public function add() {
		if($this->request->is('post')) {
			// $this->request->data['Author']['password'] = AuthComponent::password($this->request->data['Author']['password']);
			$this->Author->create($this->request->data);
			if($this->Author->save()) {
				if($this->RequestHandler->isAjax()) {
					$this->render('success', 'ajax');
				} else {
					$this->Flash->success('Author successfully created. Login using your credentials');
					return $this->redirect('/authors');
				}
			} else $this->Flash->warning('Some Problem creating New Author.');
		}
	}

	public function login() {
		if($this->request->is('post')) {
			if($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Flash->error('Invalid name or Password');
			}
		}
	}

	public function edit($id = null) {
		if(!$this->Author->exists($id)) {
			throw new NotFoundException(__('Invalid Author')); // Not Found Exception
		}
		if($this->request->is(array('post', 'put'))) {
			$this->request->data['Author']['id'] = $id;
			// $this->request->data['Author']['password'] = AuthComponent::password($this->request->data['Author']['password']);
			if($this->Author->save($this->request->data)) {
				$this->Flash->success('Author has been saved');
				return $this->redirect('/authors');
			} else {
				$this->Flash->warning('Some Problem saving the Author.');
			}
		} else {
			$this->request->data = $this->Author->findById($id);
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function validate_form() {

	}

}
