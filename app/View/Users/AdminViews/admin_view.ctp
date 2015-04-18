<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Full Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['full_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($user['User']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($user['User']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Contacts'), array('controller' => 'users_contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Contact'), array('controller' => 'users_contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users Contacts'); ?></h3>
	<?php if (!empty($user['UsersContact'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['UsersContact'] as $usersContact): ?>
		<tr>
			<td><?php echo $usersContact['id']; ?></td>
			<td><?php echo $usersContact['user_id']; ?></td>
			<td><?php echo $usersContact['type']; ?></td>
			<td><?php echo $usersContact['details']; ?></td>
			<td><?php echo $usersContact['created']; ?></td>
			<td><?php echo $usersContact['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users_contacts', 'action' => 'view', $usersContact['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users_contacts', 'action' => 'edit', $usersContact['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users_contacts', 'action' => 'delete', $usersContact['id']), array(), __('Are you sure you want to delete # %s?', $usersContact['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Users Contact'), array('controller' => 'users_contacts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Albums'); ?></h3>
	<?php if (!empty($user['Album'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Default Name'); ?></th>
		<th><?php echo __('Path'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Model'); ?></th>
		<th><?php echo __('Model Id'); ?></th>
		<th><?php echo __('Tags'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Album'] as $album): ?>
		<tr>
			<td><?php echo $album['id']; ?></td>
			<td><?php echo $album['title']; ?></td>
			<td><?php echo $album['default_name']; ?></td>
			<td><?php echo $album['path']; ?></td>
			<td><?php echo $album['user_id']; ?></td>
			<td><?php echo $album['event_id']; ?></td>
			<td><?php echo $album['model']; ?></td>
			<td><?php echo $album['model_id']; ?></td>
			<td><?php echo $album['tags']; ?></td>
			<td><?php echo $album['status']; ?></td>
			<td><?php echo $album['created']; ?></td>
			<td><?php echo $album['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'albums', 'action' => 'view', $album['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'albums', 'action' => 'edit', $album['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'albums', 'action' => 'delete', $album['id']), array(), __('Are you sure you want to delete # %s?', $album['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
