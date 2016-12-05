<?php
App::uses('AppModel', 'Model');
/**
 * Solution Model
 *
 * @property Problem $Problem
 * @property Disposition $Disposition
 * @property User $User
 */
class Solution extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'detail';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Problem' => array(
			'className' => 'Problem',
			'foreignKey' => 'problem_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Disposition' => array(
			'className' => 'Disposition',
			'foreignKey' => 'disposition_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
