<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Author extends AppModel {

	public $hasMany = array(
		'Recipe' => array(
			'className' => 'Recipe',
			'foreignKey' => 'author_id',
			'dependent' => true
			),
		'Review' => array(
			'className' => 'Review',
			'foreignKey' => 'author_id',
			'dependent' => true
			),
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'author_id',
			'dependent' => true
			)
		);

	public $validate = array(
		'name' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Name is required'
				)
			),
		'password' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => 'Password is required'
				)
			)
		);

	public function beforeSave($options = array()) {
		if(isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}
}