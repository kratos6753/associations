<?php

App::uses('AppController', 'Controller');

class CommentsController extends AppController {

	public $uses = array('Review');

	public function add($review_id)
	{
		if(!$this->Review->exists($recipe_id)) {
			throw new NotFoundException(__('Invalid Recipe')); // Not Found Exception
		}
	}
}