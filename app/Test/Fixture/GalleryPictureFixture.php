<?php
/**
 * GalleryPictureFixture
 *
 */
class GalleryPictureFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'original_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'year' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'price' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'for_sale' => array('type' => 'string', 'null' => false, 'default' => 'Not for sale', 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'path' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'size' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false),
		'album_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'main_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'style' => array('type' => 'string', 'null' => false, 'default' => 'full', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => '9999999', 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'folder_id' => array('column' => 'album_id', 'unique' => 0),
			'main_id' => array('column' => 'main_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'original_name' => 'Lorem ipsum dolor sit amet',
			'type' => 'Lorem ipsum dolor ',
			'year' => '2015-04-16 21:02:07',
			'price' => '',
			'for_sale' => 'Lorem ipsum dolor ',
			'path' => 'Lorem ipsum dolor sit amet',
			'size' => '',
			'album_id' => 1,
			'main_id' => 1,
			'style' => 'Lorem ipsum dolor sit amet',
			'order' => 1,
			'created' => '2015-04-16 21:02:07',
			'modified' => '2015-04-16 21:02:07'
		),
	);

}
