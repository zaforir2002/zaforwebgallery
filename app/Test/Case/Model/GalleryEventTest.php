<?php
App::uses('GalleryEvent', 'Model');

/**
 * GalleryEvent Test Case
 *
 */
class GalleryEventTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gallery_event',
		'app.user',
		'app.users_contact',
		'app.album',
		'app.picture'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GalleryEvent = ClassRegistry::init('GalleryEvent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GalleryEvent);

		parent::tearDown();
	}

}
