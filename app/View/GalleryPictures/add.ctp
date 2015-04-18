<div class="galleryPictures form">
<?php echo $this->Form->create('GalleryPicture'); ?>
	<fieldset>
		<legend><?php echo __('Add Gallery Picture'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('original_name');
		echo $this->Form->input('type');
		echo $this->Form->input('year');
		echo $this->Form->input('price');
		echo $this->Form->input('for_sale');
		echo $this->Form->input('path');
		echo $this->Form->input('size');
		echo $this->Form->input('album_id');
		echo $this->Form->input('main_id');
		echo $this->Form->input('style');
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Gallery Pictures'), array('action' => 'index')); ?></li>
	</ul>
</div>
