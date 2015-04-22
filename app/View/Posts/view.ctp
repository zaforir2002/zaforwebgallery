<?php 
	if(AuthComponent::user('type') != 'Admin'){ 
?>

	<div class="post form">
		<h2>Not Authorised</h2>
	</div>

<?php 
	} 
	else { 
?>
	<div class="posts view">
	<h2><?php echo __('Post'); ?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($post['Post']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Topic'); ?></dt>
			<dd>
				<?php echo $this->Html->link($post['Topic']['title'], array('controller' => 'topics', 'action' => 'view', $post['Topic']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('User'); ?></dt>
			<dd>
				<?php echo $this->Html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Body'); ?></dt>
			<dd>
				<?php echo h($post['Post']['body']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h(CakeTime::format($post['Post']['created'], '%e/%m/%y %H:%M %p')); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h(CakeTime::format($post['Post']['modified'], '%e/%m/%y %H:%M %p')); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Edit Post'), array('action' => 'edit', $post['Post']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Post'), array('action' => 'delete', $post['Post']['id']), array(), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php } ?>