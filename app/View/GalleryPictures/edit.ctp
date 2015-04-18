
<div class="panel panel-success">
<?php 
	echo $this->Form->create('GalleryPicture');
	echo $this->Form->input('id'); 
	echo $this->Form->input(
                        'for_sale',
                        array(
                            'options' => array('For sale' => 'For sale', 'Not for sale' => 'Not for sale'), 
                            'value' => $this->Form->value('GalleryPicture.for_sale'),
                            'label' => 'For Sale',
                            'placeholder' => 'Ex: xbox-360'
                        )
    );
	echo $this->Form->input(
                        'price',
                        array(                                        
                            'value' => $this->Form->value('GalleryPicture.price'),
                            'label' => 'Price',
                            'placeholder' => 'Ex: xbox-360'
                        )
    );	 
?>
	<button class="btn btn-success pull-right btn-sm">
    	<i class="fa fa-check"></i>
        Save
    </button>
</form>

</div>