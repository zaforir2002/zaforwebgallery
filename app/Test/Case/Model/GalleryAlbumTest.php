<?php
App::uses('GalleryAlbum', 'Model');

/**
 * GalleryAlbum Test Case
 *
 */
class GalleryAlbumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gallery_album',
		'app.user',
		'app.users_contact',
		'app.album',
		'app.gallery_event',
		'app.picture',
		'app.event',
		'app.model'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GalleryAlbum = ClassRegistry::init('GalleryAlbum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GalleryAlbum);

		parent::tearDown();
	}

}
