<?php
App::uses('Disposition', 'Model');

/**
 * Disposition Test Case
 *
 */
class DispositionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.disposition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Disposition = ClassRegistry::init('Disposition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Disposition);

		parent::tearDown();
	}

}
