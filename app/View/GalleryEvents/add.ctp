<div class="galleryEvents form">
<?php echo $this->Form->create('GalleryEvent'); ?>
	<fieldset>
		<legend><?php echo __('Add Gallery Event'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('event_start_date');
		echo $this->Form->input('event_end_date');
		echo $this->Form->input('user_id');
		echo $this->Form->input('location',array(
										'label' => 'Select location  ',
										'options' => array(
														'External' => 'External', 
														'Local' => 'Local', 
														'Online' => 'Online'), 
										'default' => 'Online'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
</div>
