
<div class="actions">
	<div class="galleryEvents action">
		<h4><?php echo h($galleryEvent['GalleryEvent']['title']) . ' Details'; ?></h4>
		<dl>
			<dt><?php echo __('Organised by'); ?></dt>
			<dd>
				<?php echo h($galleryEvent['User']['full_name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Location'); ?></dt>
			<dd>
				<?php echo h($galleryEvent['GalleryEvent']['location']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Start'); ?></dt>
			<dd>
				<?php echo h(CakeTime::format($galleryEvent['GalleryEvent']['event_start_date'], '%e/%m/%y %H:%M')); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('End'); ?></dt>
			<dd>
				<?php echo h(CakeTime::format($galleryEvent['GalleryEvent']['event_end_date'], '%e/%m/%y %H:%M')); ?>
				&nbsp;
			</dd>		
		</dl>
	</div>
	<div class="related">
	<ul>
		<li><?php echo $this->Html->link(__('Add Album'), array(
															'controller' => 'gallery', 
															'action' => 'view', 
															'plugin' => 'gallery',
															'0',
															$galleryEvent['GalleryEvent']['id'],
															$galleryEvent['GalleryEvent']['title']
															)); ?></li>
		<li><?php echo $this->Html->link(__('Events Lists'), array('action' => 'index')); ?></li>
	</ul>
	</div>
</div>

<div class="view">
	<h3><?php echo __('Event\'s Albums'); ?></h3>
	<?php if (!empty($galleryEvent['Album'])): ?>	
        <?php foreach ($galleryAlbum as $gallery) { ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a
                        href="<?php echo $this->Html->url(
                            array(
                                'controller' => 'albums',
                                'action' => 'view',
                                'plugin' => 'gallery',
                                $gallery['GalleryAlbum']['id']
                            )
                        ) ?>">
                        <?php $picture_url = !empty($gallery['Picture'][0]['styles']['medium']) ? $gallery['Picture'][0]['styles']['medium'] : "http://placehold.it/255x170"; ?>
                        <img src="<?php echo str_replace('\\','/',$picture_url); ?>" alt="...">
                    </a>                                
                    <div class="caption">
                        <h4><?php echo $gallery['GalleryAlbum']['title'] ?></h4>
                        <h5><i
                                class="fa fa-calendar"></i> <?php echo $this->Time->format(
                                $gallery['GalleryAlbum']['created'],
                                '%B %e, %Y %H:%M %p'
                            ) ?>
                        </h5>
                        <h5><i class="fa fa-camera-retro"></i> <?php echo count($gallery['Picture']) ?></h5>
                    </div>
                    <?php 
						if(AuthComponent::user('id') == $gallery['User']['id'] || AuthComponent::user('type') == 'Admin'){
							echo $this->Form->postLink(
												'Remove Album', 
												array(
													'plugin' => 'gallery',
													'controller' => 'gallery', 
													'action' => 'remove', 
													$gallery['GalleryAlbum']['id'],
													$gallery['Event']['id'],
												), 
												array(), 
												__(
													'Are you sure you want to remove the album from the event # %s?', 
													$gallery['GalleryAlbum']['id']
												)
							);
						} 
					?>
                </div>                
            </div>
        <?php   } ?>
	<?php endif; ?>
</div>