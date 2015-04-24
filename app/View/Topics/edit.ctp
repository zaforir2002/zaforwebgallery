<?php 
	if($this->Form->value('Topic.user_id') != AuthComponent::user('id') && AuthComponent::user('type') != 'Admin'){ 
?>

	<p class="error">
        <strong>Not Authorised </strong>
    </p>

<?php 
	} 
	else { 
?>

	<div class="topics form">
	<?php echo $this->Form->create('Topic'); ?>
		<fieldset>
			<legend><?php echo __('Edit Topic'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('title');
			if(AuthComponent::user('type') == 'Admin'){ 
				echo $this->Form->input('visible',
                                            array(
                                                'options' => array('1' => 'Published', '2' => 'Hidden'), 
                                                'value' => $this->Form->value('Topic.visible'),
                                                'label' => 'Status',
                                                'title' => 'Topics status',
                                            )
                                        );
			}
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
	</div>

<?php 
	}

	if(AuthComponent::user('type') == 'Admin'){ 
?>

	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>

			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Topic.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Topic.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Topics'), array('action' => 'topics_list')); ?></li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		</ul>
	</div>

<?php
	}
?>