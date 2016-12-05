<?php
App::uses('FamiliesUsersController', 'Controller');

/**
 * FamiliesUsersController Test Case
 *
 */
class FamiliesUsersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.families_user',
		'app.family',
		'app.disposition',
		'app.user',
		'app.role'
	);

}
