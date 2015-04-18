<div class="galleryPictures index">
	<h2><?php echo __('Gallery Pictures'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('original_name'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('year'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('for_sale'); ?></th>
			<th><?php echo $this->Paginator->sort('path'); ?></th>
			<th><?php echo $this->Paginator->sort('size'); ?></th>
			<th><?php echo $this->Paginator->sort('album_id'); ?></th>
			<th><?php echo $this->Paginator->sort('main_id'); ?></th>
			<th><?php echo $this->Paginator->sort('style'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($galleryPictures as $galleryPicture): ?>
	<tr>
		<td><?php echo h($galleryPicture['GalleryPicture']['id']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['name']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['original_name']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['type']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['year']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['price']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['for_sale']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['path']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['size']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['album_id']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['main_id']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['style']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['order']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['created']); ?>&nbsp;</td>
		<td><?php echo h($galleryPicture['GalleryPicture']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $galleryPicture['GalleryPicture']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $galleryPicture['GalleryPicture']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $galleryPicture['GalleryPicture']['id']), array(), __('Are you sure you want to delete # %s?', $galleryPicture['GalleryPicture']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Gallery Picture'), array('action' => 'add')); ?></li>
	</ul>
</div>
