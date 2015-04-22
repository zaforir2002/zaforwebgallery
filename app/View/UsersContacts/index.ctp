<div class="usersContacts index">
	<h2>
		<?php 
			if(AuthComponent::user('type') != 'Admin'){
				echo __(h($usersContacts[0]['User']['full_name']) . '\'s Contacts');
			}
			else{
				echo __('Users Contacts');
			} 
		?>
	</h2>
	<table>
	<thead>
		<tr>
			<?php if(AuthComponent::user('type') == 'Admin'){ ?>
				<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<?php } ?>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('details'); ?></th>
			<?php if(AuthComponent::user('type') == 'Admin'){ ?>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<?php } ?>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($usersContacts as $usersContact): ?>
	<tr>
		<?php if(AuthComponent::user('type') == 'Admin'){ ?>
			<td>
				<?php echo $this->Html->link($usersContact['User']['full_name'], array('controller' => 'users', 'action' => 'view', $usersContact['User']['id'])); ?>
			</td>
		<?php } ?>
		<td><?php echo h($usersContact['UsersContact']['type']); ?>&nbsp;</td>
		<td><?php echo h($usersContact['UsersContact']['details']); ?>&nbsp;</td>
		<?php if(AuthComponent::user('type') == 'Admin'){ ?>
			<td><?php echo h(CakeTime::format($usersContact['UsersContact']['created'], '%e/%m/%y %H:%M %p')); ?>&nbsp;</td>
			<td><?php echo h(CakeTime::format($usersContact['UsersContact']['modified'], '%e/%m/%y %H:%M %p')); ?>&nbsp;</td>
		<?php } ?>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $usersContact['UsersContact']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usersContact['UsersContact']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usersContact['UsersContact']['id']), array(), __('Are you sure you want to delete # %s?', $usersContact['UsersContact']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Contact'), array('action' => 'add')); ?></li>
		<?php if(AuthComponent::user('type') == 'Admin'){ ?>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<?php } ?>
	</ul>
</div>
