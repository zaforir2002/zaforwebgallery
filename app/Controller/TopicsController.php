<?php
App::uses('AppController', 'Controller');
/**
 * Topics Controller
 *
 * @property Topic $Topic
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TopicsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

//allowing index page to view registered or non-registered users
	public function beforeFilter(){
        $this->Auth->Allow('index');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('topics', $this->Topic->find('all'));
		//loading Post model inside topic model
		$this->loadModel('Post');
		$this->set('posts', $this->Post->find('all'));
	}


	public function topicsList() {
		$this->Topic->recursive = 0;
		$this->set('topics', $this->Paginator->paginate());
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__('Invalid topic'));
		}
		$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
		$this->set('topic', $this->Topic->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Topic->create();
			if(AuthComponent::user('type') != 'Admin'){
				$this->request->data['Topic']['visible'] = 2;
			}
			$this->request->data['Topic']['user_id'] = AuthComponent::user('id');
			if ($this->Topic->save($this->request->data)) {
				if(AuthComponent::user('type') != 'Admin'){
					$this->Session->setFlash(__('The topic has been saved as not visible. Please wait until your topics has been authorised by Admin'));
				}else{
					$this->Session->setFlash(__('The topic has been saved.'));
				}
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The topic could not be saved. Please, try again.'));
			}
		}
		$users = $this->Topic->User->find('list');
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
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__('Invalid topic'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Topic->save($this->request->data)) {
				$this->Session->setFlash(__('The topic has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The topic could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
			$this->request->data = $this->Topic->find('first', $options);
		}
		$users = $this->Topic->User->find('list');
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
		$this->Topic->id = $id;
		if (!$this->Topic->exists()) {
			throw new NotFoundException(__('Invalid topic'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Topic->delete()) {
			$this->Session->setFlash(__('The topic has been deleted.'));
		} else {
			$this->Session->setFlash(__('The topic could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}