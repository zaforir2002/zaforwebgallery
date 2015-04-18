
<div class="galleryEvents view">
<h2><?php echo h($galleryEvent['GalleryEvent']['title']) . ' Details'; ?></h2>
	<dl>
		<dt><?php echo __('Organised by'); ?></dt>
		<dd>
			<?php echo $this->Html->link($galleryEvent['User']['full_name'], array('controller' => 'users', 'action' => 'view', $galleryEvent['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($galleryEvent['GalleryEvent']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h(CakeTime::format($galleryEvent['GalleryEvent']['event_start_date'], '%e/%m/%y %H:%M %p')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End'); ?></dt>
		<dd>
			<?php echo h(CakeTime::format($galleryEvent['GalleryEvent']['event_end_date'], '%e/%m/%y %H:%M %p')); ?>
			&nbsp;
		</dd>		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Events Lists'), array('action' => 'index')); ?></li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Albums'); ?></h3>
	<?php if (!empty($galleryEvent['Album'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Artist'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($galleryEvent['Album'] as $album): ?>
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
			<td><?php echo Inflector::humanize($album['model']); ?></td>
			<td class="actions">
				<?php 
					echo $this->Form->postLink(
											'Remove', 
											array(
												'plugin' => 'gallery',
												'controller' => 'gallery', 
												'action' => 'remove', 
												$album['id'],
												$galleryEvent['GalleryEvent']['id'],

											), 
											array(), 
											__(
												'Are you sure you want to remove the album from the event # %s?', 
												$album['id']
											)
					); 
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Add Album'), array(
																'controller' => 'gallery', 
																'action' => 'view', 
																'plugin' => 'gallery',
																'0',
																$galleryEvent['GalleryEvent']['id'],
																$galleryEvent['GalleryEvent']['title']
																)); ?> </li>
		</ul>
	</div>
</div>
