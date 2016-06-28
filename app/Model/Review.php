<?php

App::uses('AppModel', 'Model');

class Review extends AppModel {

	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'review_id',
			'dependent' => true
			)
		);
	public $belongsTo = array('Author', 'Recipe');
}