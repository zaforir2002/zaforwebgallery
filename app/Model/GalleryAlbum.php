<?php
App::uses('AppModel', 'Model');
/**
 * GalleryAlbum Model
 *
 * @property User $User
 * @property Event $Event
 * @property Model $Model
 * @property Gallery.Picture $Picture
 */
class GalleryAlbum extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'model_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Event' => array(
			'className' => 'GalleryEvent',
			'foreignKey' => 'event_id',
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
		'Picture' => array(
			'className' => 'Gallery.Picture',
			'foreignKey' => 'album_id',
			'conditions' => array('Picture.main_id' => null),
            'order' => array('Picture.order' => 'ASC'),
		)
	);

}
