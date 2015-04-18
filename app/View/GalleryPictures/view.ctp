<div class="galleryPictures view">
<h2><?php echo __('Gallery Picture'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Original Name'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['original_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('For Sale'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['for_sale']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Size'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Album Id'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['album_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Main Id'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['main_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Style'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['style']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($galleryPicture['GalleryPicture']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gallery Picture'), array('action' => 'edit', $galleryPicture['GalleryPicture']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gallery Picture'), array('action' => 'delete', $galleryPicture['GalleryPicture']['id']), array(), __('Are you sure you want to delete # %s?', $galleryPicture['GalleryPicture']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Gallery Pictures'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gallery Picture'), array('action' => 'add')); ?> </li>
	</ul>
</div>
