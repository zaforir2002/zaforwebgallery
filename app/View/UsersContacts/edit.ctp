<?php if($usersContacts['UsersContact']['user_id'] != AuthComponent::user('id') && AuthComponent::user('type') != 'Admin'){ ?>
	<p class="error">
        <strong>Not Authorised </strong>
    </p>
<?php } else { ?>
	<div class="usersContacts form">
	<?php echo $this->Form->create('UsersContact'); ?>
		<fieldset>
			<legend><?php echo __('Edit ' . $usersContacts['User']['full_name'] . '\'s ' . $usersContacts['UsersContact']['type'] . ' Contact'); ?></legend>
		<?php
			echo $this->Form->input('id');
			//echo $this->Form->input('user_id');
			echo $this->Form->input('type');
			echo $this->Form->input('details');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
	</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>

			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UsersContact.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('UsersContact.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Contacts'), array('action' => 'index')); ?></li>
			<?php if(AuthComponent::user('type') == 'Admin'){ ?>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>
