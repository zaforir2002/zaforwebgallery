<?php
App::uses('GalleryPicture', 'Model');

/**
 * GalleryPicture Test Case
 *
 */
class GalleryPictureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gallery_picture',
		'app.album'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GalleryPicture = ClassRegistry::init('GalleryPicture');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GalleryPicture);

		parent::tearDown();
	}

}
