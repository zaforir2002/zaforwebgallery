<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Singup/ Register'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('full_name');
		echo $this->Form->input('type',array(
										'label' => 'Select user type  ',
										'options' => array('Artist' => 'Artist', 'Buyer' => 'Buyer'), 
										'default' => 'Artist'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<?php if(AuthComponent::user('type') == 'Admin') : ?>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users Contacts'), array('controller' => 'users_contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Contact'), array('controller' => 'users_contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
	<?php endif; ?>
</div>
