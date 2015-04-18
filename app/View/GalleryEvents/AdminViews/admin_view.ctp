<div class="galleryEvents view">
<h2><?php echo __('Gallery Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($galleryEvent['GalleryEvent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($galleryEvent['GalleryEvent']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($galleryEvent['GalleryEvent']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Start Date'); ?></dt>
		<dd>
			<?php echo h($galleryEvent['GalleryEvent']['event_start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event End Date'); ?></dt>
		<dd>
			<?php echo h($galleryEvent['GalleryEvent']['event_end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($galleryEvent['User']['full_name'], array('controller' => 'users', 'action' => 'view', $galleryEvent['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($galleryEvent['GalleryEvent']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($galleryEvent['GalleryEvent']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gallery Event'), array('action' => 'edit', $galleryEvent['GalleryEvent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gallery Event'), array('action' => 'delete', $galleryEvent['GalleryEvent']['id']), array(), __('Are you sure you want to delete # %s?', $galleryEvent['GalleryEvent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Gallery Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gallery Event'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albums'), array('controller' => 'albums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('controller' => 'albums', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Albums'); ?></h3>
	<?php if (!empty($galleryEvent['Album'])): ?>
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
	<?php foreach ($galleryEvent['Album'] as $album): ?>
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
