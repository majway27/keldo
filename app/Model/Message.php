<?php
App::uses('AppModel', 'Model');
/**
 * Message Model
 *
 * @property User $User
 * @property Family $Family
 * @property Disposition $Disposition
 */
class Message extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'message';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Family' => array(
			'className' => 'Family',
			'foreignKey' => 'family_id',
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
		)
	);
}
