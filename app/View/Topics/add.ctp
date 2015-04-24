<div class="topics form">
<?php echo $this->Form->create('Topic'); ?>
	<fieldset>
		<legend><?php echo __('Add Topic'); ?></legend>
	<?php
		echo $this->Form->input('title');
		if(AuthComponent::user('type') == 'Admin'){ 
			echo $this->Form->input('visible',
                                            array(
                                                'options' => array('1' => 'Published', '2' => 'Hidden'), 
                                                'label' => 'Status',
                                                'title' => 'Topics status',
                                            )
                                    );
		}
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
	<?php if(AuthComponent::user('type') == 'Admin'){ ?>
		<li><?php echo $this->Html->link(__('List Topics'), array('action' => 'list')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	<?php } ?>
	</ul>
</div>
