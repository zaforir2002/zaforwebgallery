<?php 
	if(AuthComponent::user('type') == 'Admin'){ 
?>
		<div class="news form">
		<?php echo $this->Form->create('News'); ?>
			<fieldset>
				<legend><?php echo __('Edit News'); ?></legend>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('title');
				echo $this->Form->input('details');
			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
		</div>
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul>

				<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('News.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('News.id'))); ?></li>
				<li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			</ul>
		</div>
<?php 
	}
	else{
?>
		<div class="news form">
			<h2>Not Authorised</h2>
		</div>
<?php 
	}
?>
