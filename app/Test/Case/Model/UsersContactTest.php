<?php
App::uses('UsersContact', 'Model');

/**
 * UsersContact Test Case
 *
 */
class UsersContactTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.users_contact',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UsersContact = ClassRegistry::init('UsersContact');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersContact);

		parent::tearDown();
	}

}
