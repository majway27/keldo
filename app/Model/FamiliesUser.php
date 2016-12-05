<?php
App::uses('AppModel', 'Model');
/**
 * FamiliesUser Model
 *
 * @property Family $Family
 * @property User $User
 */
class FamiliesUser extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'family_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Family' => array(
			'className' => 'Family',
			'foreignKey' => 'family_id',
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
