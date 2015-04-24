<div class="users view">
<h2><?php echo 'User'; ?></h2>
	<dl>		
		<dt><?php echo __('Full Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['full_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($user['User']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<?php if(AuthComponent::user('type') == 'Admin' || AuthComponent::user('id') == $user['User']['id']) { ?>
		<ul>
			<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?> </li>
			<?php if(AuthComponent::user('type') == 'Admin') { ?>
				<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
			<?php } ?>
		</ul>
	<?php } ?>
</div>


<div class="related">
	<h3><?php echo __('Related Users Contacts'); ?></h3>
	<?php if (!empty($user['UsersContact'])): ?>
	<table>
	<tr>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['UsersContact'] as $usersContact): ?>
		<tr>
			<td><?php echo $usersContact['type']; ?></td>
			<td><?php echo $usersContact['details']; ?></td>
			<td class="actions">
				<?php 
					if(AuthComponent::user('id') == $user['User']['id'] || AuthComponent::user('type') == 'Admin'){
						echo $this->Html->link(__('View'), array('controller' => 'users_contacts', 'action' => 'view', $usersContact['id']));
						echo $this->Html->link(__('Edit'), array('controller' => 'users_contacts', 'action' => 'edit', $usersContact['id'])); 
						echo $this->Form->postLink(__('Delete'), array('controller' => 'users_contacts', 'action' => 'delete', $usersContact['id']), array(), __('Are you sure you want to delete # %s?', $usersContact['id'])); 
					}
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li>
				<?php 
					if(AuthComponent::user('id') == $user['User']['id'] || AuthComponent::user('type') == 'Admin'){
						echo $this->Html->link(
											'Add Contacts', 
											array(
												'controller' => 'users_contacts', 
												'action' => 'add'
											)
						); 
					}
				?> 
			</li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Albums'); ?></h3>
	<div class="row">
		<?php if (!empty($user['Album'])): ?>
			<?php 
				foreach ($galleryAlbum as $gallery) {
					if($gallery['GalleryAlbum']['model_id'] == AuthComponent::user('id')){ 
			?>
			            <div class="col-md-3">
			                <div class="thumbnail">
			                	<?php 
				                	if ($gallery['GalleryAlbum']['status'] == 'draft'){
				            			$albumType = "Draft Album";
				            		}
				            		else{
				            			$albumType = "Published Album";
				            		}
			            		?>
			                    <a
			                        href="<?php echo $this->Html->url(
			                            array(
			                                'controller' => 'albums',
			                                'action' => 'view',
			                                'plugin' => 'gallery',
			                                $gallery['GalleryAlbum']['id']
			                            )
			                        ) ?>" title="<?php echo $albumType; ?>">
			                        <?php $picture_url = !empty($gallery['Picture'][0]['styles']['medium']) ? $gallery['Picture'][0]['styles']['medium'] : "http://placehold.it/255x170"; ?>
			                        <img src="<?php echo str_replace('\\','/',$picture_url); ?>" alt="...">
			                    </a>                                
			                    <div class="caption">
			                    	<?php 
			                    		if ($gallery['GalleryAlbum']['status'] == 'draft'){
			                    			echo "<h4 title='Draft Album'><i class='fa fa-pagelines'></i> " . 
			                    				  $gallery['GalleryAlbum']['title'] . 
			                    				  "</h4>";
			                    		}
			                    		else{
			                    			echo "<h4 title='Published Album'>" . 
			                    				  $gallery['GalleryAlbum']['title'] .
			                    				  "</h4>";
			                    		}
			                    	?>
			                        <h5 title="Total pictures in the album"><i class="fa fa-camera-retro"></i> <?php echo count($gallery['Picture']) ?></h5>
			                    </div>                    
			                </div>                
			            </div>
	        	<?php   
	        		} 
	        		else {
	        			if($gallery['GalleryAlbum']['status'] == 'published'){
	        	?>
	        				<div class="col-md-3">
			                <div class="thumbnail">
			                    <a
			                        href="<?php echo $this->Html->url(
			                            array(
			                                'controller' => 'albums',
			                                'action' => 'view',
			                                'plugin' => 'gallery',
			                                $gallery['GalleryAlbum']['id']
			                            )
			                        ) ?>" title="Published Album">
			                        <?php $picture_url = !empty($gallery['Picture'][0]['styles']['medium']) ? $gallery['Picture'][0]['styles']['medium'] : "http://placehold.it/255x170"; ?>
			                        <img src="<?php echo str_replace('\\','/',$picture_url); ?>" alt="...">
			                    </a>                                
			                    <div class="caption">
			                    	<h4 title='Published Album'><?php echo $gallery['GalleryAlbum']['title']; ?></h4>
			                        <h5 title="Total pictures in the album"><i class="fa fa-camera-retro"></i> <?php echo count($gallery['Picture']) ?></h5>
			                    </div>                    
			                </div>                
			            </div>
	        <?php   	
	    				}
	        		}
	        	} 
	        ?>
		<?php endif;  ?>
	</div>
	<div class="actions">
		<div class="row">
			<ul>
				<li>
					<?php 
						if(AuthComponent::user('id') == $user['User']['id']){
							echo $this->Gallery->link(
													$user['User']['username'], 
													$user['User']['id']
							);
						} 
					?> 
				</li>
			</ul>
		</div>
	</div>
</div>
