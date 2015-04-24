<?php if($this->Form->value('User.id') != AuthComponent::user('id') && AuthComponent::user('type') != 'Admin'){ ?>
	<p class="error">
        <strong>Not Authorised </strong>
    </p>
<?php } else { ?>
	<div class="users form">
	<?php echo $this->Form->create('User'); ?>
		<fieldset>
			<legend><?php echo __('Edit User'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('full_name');
			echo $this->Form->input('username');
			echo $this->Form->input('password');
			if(AuthComponent::user('type') == 'Admin'){
				echo $this->Form->input('type',array(
												'label' => 'Select user type  ',
												'options' => array('Artist' => 'Artist', 'Buyer' => 'Buyer'), 
												'default' => $this->Form->value('User.type')));
			}
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
	</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
		<?php if(AuthComponent::user('type') == 'Admin'){ ?>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<?php } ?>	
			<li><?php echo $this->Html->link(__('List Contacts'), array('controller' => 'users_contacts', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'users_contacts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php } ?>
