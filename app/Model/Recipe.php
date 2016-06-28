<?php

App::uses('AppModel', 'Model');

class Recipe extends AppModel {

	public $belongsTo = 'Author';
	public $hasMany = array(
		'Review' => array(
			'className' => 'Review',
			'foreignKey' => 'recipe_id',
			'dependent' => true
			)
		);
}