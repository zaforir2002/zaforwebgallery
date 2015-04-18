<div class="galleryEvents index">
	<h2><?php echo __('Gallery Events'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
	
			<th><?php echo $this->Paginator->sort('Title'); ?></th>
			<th><?php echo $this->Paginator->sort('Location'); ?></th>
			<th><?php echo $this->Paginator->sort('Start'); ?></th>
			<th><?php echo $this->Paginator->sort('End'); ?></th>
			<th><?php echo $this->Paginator->sort('Organised by'); ?></th>
			<?php if(AuthComponent::user()) : ?>
			<th class="actions"><?php echo __('Actions'); ?></th>
			<?php endif; ?>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($galleryEvents as $galleryEvent): ?>
	<tr>

		<td><?php echo h($galleryEvent['GalleryEvent']['title']); ?>&nbsp;</td>
		<td><?php echo h($galleryEvent['GalleryEvent']['location']); ?>&nbsp;</td>
		<td><?php echo h(CakeTime::format($galleryEvent['GalleryEvent']['event_start_date'], '%e/%m/%y %H:%M %p')); ?>&nbsp;</td>
		<td><?php echo h(CakeTime::format($galleryEvent['GalleryEvent']['event_end_date'], '%e/%m/%y %H:%M %p')); ?>&nbsp;</td>
		<?php if(!AuthComponent::user()) { ?>
		<td>
			<?php echo h($galleryEvent['User']['full_name']); ?>
		</td>
		<?php } else { ?>	
		<td>
			<?php echo $this->Html->link($galleryEvent['User']['full_name'], array('controller' => 'users', 'action' => 'view', $galleryEvent['User']['id'])); ?>
		</td>		
		<td class="actions">
			<?php if(AuthComponent::user('id') == $galleryEvent['GalleryEvent']['user_id'] || AuthComponent::user('type') == 'Admin') { ?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $galleryEvent['GalleryEvent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $galleryEvent['GalleryEvent']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $galleryEvent['GalleryEvent']['id']), array(), __('Are you sure you want to delete # %s?', $galleryEvent['GalleryEvent']['id'])); ?>
			<?php } else { ?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $galleryEvent['GalleryEvent']['id'])); ?>
			<?php }  ?>
		</td>
		<?php } ?>
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
	<?php if(AuthComponent::user()) : ?>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?></li>
	</ul>
	<?php endif; ?>
</div>
