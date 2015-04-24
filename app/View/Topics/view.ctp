<?php 
	if(AuthComponent::user('type') != 'Admin'){ 
?>

	<p class="error">
        <strong>Not Authorised </strong>
    </p>

<?php 
	} 
	else { 
?>
	<div class="topics view">
	<h2><?php echo __('Topic'); ?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($topic['Topic']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('User'); ?></dt>
			<dd>
				<?php echo $this->Html->link($topic['User']['username'], array('controller' => 'users', 'action' => 'view', $topic['User']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Title'); ?></dt>
			<dd>
				<?php echo h($topic['Topic']['title']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Visible'); ?></dt>
			<dd>
				<?php echo h($topic['Topic']['visible']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h(CakeTime::format($topic['Topic']['created'], '%e/%m/%y %H:%M')); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h(CakeTime::format($topic['Topic']['modified'], '%e/%m/%y %H:%M')); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Edit Topic'), array('action' => 'edit', $topic['Topic']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Topic'), array('action' => 'delete', $topic['Topic']['id']), array(), __('Are you sure you want to delete # %s?', $topic['Topic']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Topics'), array('action' => 'list')); ?> </li>
			<li><?php echo $this->Html->link(__('New Topic'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="related">
		<h3><?php echo __('Related Posts'); ?></h3>
		<?php if (!empty($topic['Post'])): ?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Topic Id'); ?></th>
			<th><?php echo __('User Id'); ?></th>
			<th><?php echo __('Body'); ?></th>
			<th><?php echo __('Created'); ?></th>
			<th><?php echo __('Modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($topic['Post'] as $post): ?>
			<tr>
				<td><?php echo $post['id']; ?></td>
				<td><?php echo $post['topic_id']; ?></td>
				<td><?php echo $post['user_id']; ?></td>
				<td><?php echo $post['body']; ?></td>
				<td><?php echo $post['created']; ?></td>
				<td><?php echo $post['modified']; ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), array(), __('Are you sure you want to delete # %s?', $post['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
<?php } ?>
