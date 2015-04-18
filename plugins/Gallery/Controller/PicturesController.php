<?php

class PicturesController extends GalleryAppController
{
    public $components = array('Gallery.Util');
    public $uses = array('Gallery.Album', 'Gallery.Picture');

    public function upload()
    {
        $album_id = $_POST['album_id'];

        # Resize attributes configured in bootstrap.php
        $resize_attrs = $this->Picture->getResizeToSize();

        if ($_FILES) {
            $file = $_FILES['file'];

            try {
                # Check if the file have any errors
                $this->Util->checkFileErrors($file);

                # Get file extention
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

                # Validate if the file extention is allowed
                $this->Util->validateExtensions($ext);

                # Generate a random filename
                $filename = $this->Util->getToken();

                $full_name = $filename . "." . $ext;

                # Image Path
                $path = $this->Picture->generateFilePath($album_id, $full_name);

                $main_id = $this->Picture->uploadFile(
                    $path,
                    $album_id,
                    $file['name'],
                    $file['tmp_name'],
                    $resize_attrs['width'],
                    $resize_attrs['height'],
                    $resize_attrs['action'],
                    true
                );


                # Create extra pictures from the original one
                $this->Picture->createExtraImages(
                    Configure::read('GalleryOptions.Pictures.styles'),
                    $file['name'],
                    $file['tmp_name'],
                    $album_id,
                    $main_id,
                    $filename
                );

            } catch (ForbiddenException $e) {
                $response = $e->getMessage();
                return new CakeResponse(
                    array(
                        'status' => 401,
                        'body' => json_encode($response)
                    )
                );
            }
        }

        if ($this->request->is('post')) {
            if ($this->Picture->save($this->request->data)) {
                echo "Configurations are saved.";
            }
        }

        $this->render(false, false);
    }

    /**
     * Delete an image and all its versions from database
     * @param $id
     */
    public function delete($id)
    {
        # Delete the picture and all its versions
        $this->Picture->delete($id);

        $this->render(false, false);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id) {
        if (!$this->Picture->exists($id)) {
            throw new NotFoundException(__('Picture not found'));
        }
        if ($this->request->is('post')) {
            if ($this->Picture->save($this->request->data)) {
                $this->Session->setFlash(__('Details updated.'));
                //return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Details not be saved. Please, try again.'));
            }
        } 
        /*
        else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }*/
    }

    /**
     * Sort pictures from an album
     */
    public function sort()
    {
        if ($this->request->is('post')) {
            $order = explode(",", $_POST['order']);
            $i = 1;
            foreach ($order as $photo) {
                $this->Picture->read(null, $photo);
                $this->Picture->set('order', $i);
                $this->Picture->save();
                $i++;
            }
        }

        $this->render(false, false);
    }


}

?>
