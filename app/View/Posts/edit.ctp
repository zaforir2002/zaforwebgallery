<?php 
	if($this->Form->value('Post.user_id') != AuthComponent::user('id') && AuthComponent::user('type') != 'Admin'){ 
?>

	<div class="post form">
		<h2>Not Authorised</h2>
	</div>

<?php 
	} 
	else { 
?>

	<div class="posts form">
	<?php echo $this->Form->create('Post'); ?>
		<fieldset>
			<legend><?php echo __('Edit Post'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('body');
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

			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Post.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Post.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>

<?php 
	} 
?>
