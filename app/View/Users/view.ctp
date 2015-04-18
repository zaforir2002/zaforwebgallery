<div class="users view">
<h2><?php echo 'User'; ?></h2>
	<dl>
		<dt><?php echo __('User Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
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
	</dl>
</div>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<?php if(AuthComponent::user('type') == 'Admin') : ?>
		<ul>
			<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		</ul>
	<?php endif; ?>
</div>


<div class="related">
	<h3><?php echo __('Related Users Contacts'); ?></h3>
	<?php if (!empty($user['UsersContact'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['UsersContact'] as $usersContact): ?>
		<tr>
			<td><?php echo $usersContact['type']; ?></td>
			<td><?php echo $usersContact['details']; ?></td>
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
			<li>
				<?php 
					if(AuthComponent::user('id') == $user['User']['id'] || AuthComponent::user('type') == 'Admin'){
						echo $this->Html->link(
											'Add Contacts', 
											array(
												'controller' => 'users_contacts', 
												'action' => 'add'
											)
						); 
					}
				?> 
			</li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Albums'); ?></h3>
	<?php if (!empty($user['Album'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Status'); ?></th>
	</tr>
	<?php foreach ($user['Album'] as $album): ?>
		<tr>
			<td>
				<?php 
					echo $this->Html->link(
										$album['title'], 
										array(
											'plugin' => 'gallery',
											'controller' => 'albums', 
											'action' => 'view', 
											$album['id']
										)
					); 
				?>
			</td>
			<td><?php echo $album['status']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif;  ?>

	<div class="actions">
		<ul>
			<li>
				<?php 
					if(AuthComponent::user('id') == $user['User']['id']){
						echo $this->Gallery->link(
												$user['User']['username'], 
												$user['User']['id']
						);
					} 
				?> 
			</li>
		</ul>
	</div>
</div>
