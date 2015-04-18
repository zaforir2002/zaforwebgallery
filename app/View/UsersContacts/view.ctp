<div class="usersContacts view">
<h2><?php echo __('Users Contact'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usersContact['UsersContact']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersContact['User']['full_name'], array('controller' => 'users', 'action' => 'view', $usersContact['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($usersContact['UsersContact']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($usersContact['UsersContact']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usersContact['UsersContact']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usersContact['UsersContact']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Users Contact'), array('action' => 'edit', $usersContact['UsersContact']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Users Contact'), array('action' => 'delete', $usersContact['UsersContact']['id']), array(), __('Are you sure you want to delete # %s?', $usersContact['UsersContact']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Contacts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Contact'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
