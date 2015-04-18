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
 * index method
 *
 * @return void
 */
	public function index() {
		$this->GalleryPicture->recursive = 0;
		$this->set('galleryPictures', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GalleryPicture->exists($id)) {
			throw new NotFoundException(__('Invalid gallery picture'));
		}
		$options = array('conditions' => array('GalleryPicture.' . $this->GalleryPicture->primaryKey => $id));
		$this->set('galleryPicture', $this->GalleryPicture->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GalleryPicture->create();
			if ($this->GalleryPicture->save($this->request->data)) {
				$this->Session->setFlash(__('The gallery picture has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gallery picture could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout= 'PictureEdit';
		if (!$this->GalleryPicture->exists($id)) {
			throw new NotFoundException(__('Invalid gallery picture'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GalleryPicture->save($this->request->data)) {
				//$this->Session->setFlash(__('The gallery picture has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gallery picture could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GalleryPicture.' . $this->GalleryPicture->primaryKey => $id));
			$this->request->data = $this->GalleryPicture->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->GalleryPicture->id = $id;
		if (!$this->GalleryPicture->exists()) {
			throw new NotFoundException(__('Invalid gallery picture'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->GalleryPicture->delete()) {
			$this->Session->setFlash(__('The gallery picture has been deleted.'));
		} else {
			$this->Session->setFlash(__('The gallery picture could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
