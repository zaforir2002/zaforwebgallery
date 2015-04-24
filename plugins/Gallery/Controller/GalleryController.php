<?php

class GalleryController extends GalleryAppController
{
    public $uses = array('Gallery.Album');
    public $components = array('Session');

    public function beforeFilter()
    {
        $this->Auth->Allow('index');
        parent::beforeFilter();
    }

    public function index()
    {
        $search_status = "published";
        //$page_title = "Published albums";

        //if (isset($_GET['status']) && $_GET['status'] == 'draft') {
        //    $search_status = $_GET['status'];
        //    $page_title = "Drafts";
        //}
        
        $galleries = $this->Album->findAllByStatus($search_status);
        //$galleries = $this->Album->find('all');
        
        if(AuthComponent::user()){
            if(AuthComponent::user('type') == 'Artist'){
                $galleries = $this->Album->findAllByModelId(AuthComponent::user('id'));
            }            
        }
        
        $this->set(compact('galleries', 'search_status'));
    }

     public function view($id = null, $event_id = null, $event_title = null){
        
        $data = $this->Album->findById($id);
        if ($this->request->is(array('post', 'put'))) {
            $this->Album->id = $id;
            $this->request->data['event_id'] = $event_id;
            if ($this->Album->save($this->request->data)) {
                $this->Session->setFlash(__('Album has been added.'));
                return $this->redirect('/galleryevents/view/' . $event_id);
            } 
        }
        $this->request->data = $data;
        $search_status = "published";
        $page_title = "Published albums";

        //$pending = $this->Article->find('all', array(
        //'conditions' => array('Article.status' => 'pending')
        
        if(AuthComponent::user('type') != 'Admin'){
            $galleries = $this->Album->find('all', array(
                                                    'conditions' => array(
                                                                    'Album.status' => $search_status,
                                                                    'Album.model_id' => AuthComponent::user('id')
                                                                    )
                                                    )
                                            );
        }
        else{
            $galleries = $this->Album->findAllByStatus($search_status);
        }
        
        $this->set(compact('galleries', 'page_title', 'search_status', 'event_id', 'event_title'));
    }

    public function remove($id = null, $event_id = null){
        $this->Album->id = $id;
        $this->request->data['event_id'] = 0;
        if ($this->Album->save($this->request->data)) {
            $this->Session->setFlash(__('Album has been removed.'));
            return $this->redirect('/galleryevents/view/' . $event_id);
        } 
    }
} 