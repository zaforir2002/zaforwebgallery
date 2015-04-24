<?php
App::uses('AppController', 'Controller');
/**
 * GalleryEvents Controller
 *
 * @property GalleryEvent $GalleryEvent
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GalleryEventsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	//public $uses = array('GalleryEvent', 'GalleryAlbum');
	public $components = array('Paginator', 'Session');


	public function beforeFilter()
    {
        $this->Auth->Allow('index');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->GalleryEvent->recursive = 0;
		$this->set('galleryEvents', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GalleryEvent->exists($id)) {
			throw new NotFoundException(__('Invalid gallery event'));
		}
		$options = array('conditions' => array('GalleryEvent.' . $this->GalleryEvent->primaryKey => $id));
		$this->set('galleryEvent', $this->GalleryEvent->find('first', $options));
		$this->loadModel('GalleryAlbum');
		$this->set('galleryAlbum', $this->GalleryAlbum->findAllByEventId($id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GalleryEvent->create();
			if(empty($this->request->data['GalleryEvent']['user_id'])){
				$this->request->data['GalleryEvent']['user_id'] = AuthComponent::user('id');
			}
			if ($this->GalleryEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The gallery event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gallery event could not be saved. Please, try again.'));
			}
		}
		$users = $this->GalleryEvent->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->GalleryEvent->exists($id)) {
			throw new NotFoundException(__('Invalid gallery event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GalleryEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The gallery event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gallery event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GalleryEvent.' . $this->GalleryEvent->primaryKey => $id));
			$this->request->data = $this->GalleryEvent->find('first', $options);
		}
		$users = $this->GalleryEvent->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->GalleryEvent->id = $id;
		if (!$this->GalleryEvent->exists()) {
			throw new NotFoundException(__('Invalid gallery event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->GalleryEvent->delete()) {
			$this->Session->setFlash(__('The gallery event has been deleted.'));
		} else {
			$this->Session->setFlash(__('The gallery event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
