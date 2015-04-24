<?php 
	if(AuthComponent::user('type') != 'Admin'){ 
?>

	<div class="topics form">
		<h2>Not Authorised</h2>
	</div>

<?php 
	} 
	else { 
?>
	<div class="topics index">
		<h2><?php echo __('Topics'); ?></h2>
		<table>
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('user_id'); ?></th>
				<th><?php echo $this->Paginator->sort('title'); ?></th>
				<th><?php echo $this->Paginator->sort('visible'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th><?php echo $this->Paginator->sort('modified'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($topics as $topic): ?>
		<tr>
			<td><?php echo h($topic['Topic']['id']); ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->link($topic['User']['username'], array('controller' => 'users', 'action' => 'view', $topic['User']['id'])); ?>
			</td>
			<td><?php echo h($topic['Topic']['title']); ?>&nbsp;</td>
			<td><?php echo h($topic['Topic']['visible']); ?>&nbsp;</td>
			<td><?php echo h(CakeTime::format($topic['Topic']['created'], '%e/%m/%y %H:%M')); ?>&nbsp;</td>
			<td><?php echo h(CakeTime::format($topic['Topic']['modified'], '%e/%m/%y %H:%M')); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $topic['Topic']['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $topic['Topic']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $topic['Topic']['id']), array(), __('Are you sure you want to delete # %s?', $topic['Topic']['id'])); ?>
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
			<li><?php echo $this->Html->link(__('New Topic'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php } ?>
