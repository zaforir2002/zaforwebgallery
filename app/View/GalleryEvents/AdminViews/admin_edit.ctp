<div class="galleryEvents form">
<?php echo $this->Form->create('GalleryEvent'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Gallery Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('location');
		echo $this->Form->input('event_start_date');
		echo $this->Form->input('event_end_date');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('GalleryEvent.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('GalleryEvent.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Gallery Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</div>
