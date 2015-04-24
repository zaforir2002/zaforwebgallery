<?php
App::uses('Controller', 'Controller');
App::uses('CakeTime', 'Utility');
/**
 * GalleryPictures Controller
 *
 * @property GalleryPicture $GalleryPicture
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GalleryPicturesController extends Controller {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session','Auth');

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $albumID = null) {
		$this->layout= 'PictureEdit';
		if (!$this->GalleryPicture->exists($id)) {
			throw new NotFoundException(__('Invalid gallery picture'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GalleryPicture->save($this->request->data)) {
				$this->Session->setFlash(__('Updated.'));
				//return $this->redirect(array('controller' => 'gallery', 'action' => 'upload', $albumID));
			} else {
				$this->Session->setFlash(__('The gallery picture could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GalleryPicture.' . $this->GalleryPicture->primaryKey => $id));
			$this->request->data = $this->GalleryPicture->find('first', $options);
		}
	}
}