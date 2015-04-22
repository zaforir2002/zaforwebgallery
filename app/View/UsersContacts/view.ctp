<?php if($usersContact['UsersContact']['user_id'] != AuthComponent::user('id') && AuthComponent::user('type') != 'Admin'){ ?>
	<div class="usersContacts view">
		<h2>Not Authorised</h2>
	</div>
<?php } else { ?>
	<div class="usersContacts view">
		<h2>
			<?php 
				echo __(h($usersContact['User']['full_name']) . '\'s ' . h($usersContact['UsersContact']['type']) . ' Contact'); 
			?>
		</h2>
		<dl>
			<dt><?php echo __('Details'); ?></dt>
			<dd>
				<?php echo h($usersContact['UsersContact']['details']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h(CakeTime::format($usersContact['UsersContact']['created'], '%e/%m/%y %H:%M %p')); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h(CakeTime::format($usersContact['UsersContact']['modified'], '%e/%m/%y %H:%M %p')); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Edit Contact'), array('action' => 'edit', $usersContact['UsersContact']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Contact'), array('action' => 'delete', $usersContact['UsersContact']['id']), array(), __('Are you sure you want to delete # %s?', $usersContact['UsersContact']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Contacts'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Contact'), array('action' => 'add')); ?> </li>
			<?php if(AuthComponent::user('type') == 'Admin'){ ?>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>