<?php
App::uses('AppModel', 'Model');
/**
 * Problem Model
 *
 * @property Disposition $Disposition
 * @property User $User
 * @property Family $Family
 * @property Solution $Solution
 */
class Problem extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'detail';

	public function isOwnedBy($problem, $user) {
		return $this->field('id', array('id' => $problem, 'id' => $user)) === $problem;
	}
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'detail' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'disposition_id' => array(
			'uuid' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
		),
		'Family' => array(
			'className' => 'Family',
			'foreignKey' => 'family_id',
			'counterCache' => true,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Solution' => array(
			'className' => 'Solution',
			'foreignKey' => 'problem_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
