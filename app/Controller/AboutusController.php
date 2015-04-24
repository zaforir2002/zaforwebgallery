<?php
App::uses('AppController', 'Controller');

class AboutusController extends AppController {

	//public $components = array('Paginator', 'Session');

	public function beforeFilter()
    {
        $this->Auth->Allow('index');
    }


    public function index() {

	}

}