<?php
App::uses('AppController', 'Controller');
/**
 * UsersContacts Controller
 *
 * @property UsersContact $UsersContact
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersContactsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UsersContact->recursive = 0;
		$this->set('usersContacts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UsersContact->exists($id)) {
			throw new NotFoundException(__('Invalid users contact'));
		}
		$options = array('conditions' => array('UsersContact.' . $this->UsersContact->primaryKey => $id));
		$this->set('usersContact', $this->UsersContact->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UsersContact->create();
			if ($this->UsersContact->save($this->request->data)) {
				$this->Session->setFlash(__('The users contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users contact could not be saved. Please, try again.'));
			}
		}
		$users = $this->UsersContact->User->find('list');
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
		if (!$this->UsersContact->exists($id)) {
			throw new NotFoundException(__('Invalid users contact'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UsersContact->save($this->request->data)) {
				$this->Session->setFlash(__('The users contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users contact could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UsersContact.' . $this->UsersContact->primaryKey => $id));
			$this->request->data = $this->UsersContact->find('first', $options);
		}
		$users = $this->UsersContact->User->find('list');
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
		$this->UsersContact->id = $id;
		if (!$this->UsersContact->exists()) {
			throw new NotFoundException(__('Invalid users contact'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UsersContact->delete()) {
			$this->Session->setFlash(__('The users contact has been deleted.'));
		} else {
			$this->Session->setFlash(__('The users contact could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
