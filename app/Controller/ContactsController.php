<?php
App::uses('AppController', 'Controller');

class ContactsController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter()
    {
        $this->Auth->Allow('index','add');
    }


    public function index() {
		return $this->redirect(array('action' => 'add'));
	}

	public function add() {
	    if ($this->request->is('post')) {
	        $this->Contact->set($this->request->data);
	        if ($this->Contact->validates()) {
	            $this->Session->setFlash(__('Thank you for contact us.'));
	        	//return $this->redirect($this->Auth->redirectUrl());    
	        }
	        else{
	        	$this->Session->setFlash('Please fill up the form correctly.');
	        }
	    }
	}
}