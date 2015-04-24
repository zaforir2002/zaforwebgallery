<?php 
	if(AuthComponent::user()){ 
		echo "<div class='topics index'>";
	}
	else{
		echo "<div class='related'>";	
	}
?>
	<h2><?php echo __('Topics'); ?></h2>    	
	<div class="panel panel-default panel-container-album">
	    <?php 
	    	foreach ($topics as $topic){
	    		if($topic['Topic']['visible'] == 1){ 
	    ?>
	    <div class="panel-heading">
	        <h2 class="panel-title pull-left">
	            <i class="fa fa-picture-o"></i>
	            <?php echo $topic['Topic']['title'] . '&nbsp;&nbsp;&nbsp;' ?>
	        </h2>
	        <?php 
	        	if(AuthComponent::user()){ 
    				echo $this->Html->link(__('Add post'), array('controller' => 'posts', 'action' => 'add',$topic['Topic']['id'],'topics'), array('class' => 'btn btn-info btn-sm'));
    			}
	        ?>
	        <?php if(AuthComponent::user('type') == 'Admin' || AuthComponent::user('id') == $topic['Topic']['user_id']){?>
	            <?php echo $this->Form->postLink(__('Delete Topic'), array('action' => 'delete', $topic['Topic']['id']), array('class' => 'btn btn-danger pull-right btn-sm'), __('Are you sure you want to delete # %s?', $topic['Topic']['id'])); ?>
				<?php echo $this->Html->link(__('Edit Topic'), array('action' => 'edit', $topic['Topic']['id']), array('class' => 'btn btn-success pull-right btn-sm')); ?>
			<?php } ?>
	        <div class="clearfix"></div>
	    </div>
	    <div class="panel-body">
	        
	    	<div class="panel panel-success">
	    		<?php 
	            	foreach ($posts as $post){
	            		if($topic['Topic']['id'] == $post['Post']['topic_id']){ 
	            ?>
	            <div class="panel-body">
	            	<?php echo $post['Post']['body']; ?>
	            </div>
	            <div class="panel-footer">
	            	<h6>
            		<?php echo ($post['User']['type'] == 'Admin' ? 'Admin' : $post['User']['full_name']) . ', updated on ' . h(CakeTime::format($post['Post']['modified'], '%e/%m/%y %H:%M')); ?>
            		
            		<?php 
            			if(AuthComponent::user('type') == 'Admin' || AuthComponent::user('id') == $post['Post']['user_id']){ 
            				echo $this->Form->postLink(__('Delete Posts'), array('controller' => 'posts', 'action' => 'delete', $post['Post']['id'],'topics'), array('class' => 'btn btn-danger pull-right btn-xs'), __('Are you sure you want to delete # %s?', $post['Post']['id'])); 
            				echo $this->Html->link(__('Edit Posts'), array('controller' => 'posts', 'action' => 'edit', $post['Post']['id'],'topics'), array('class' => 'btn btn-success pull-right btn-xs'));            				 
            			}            			
            		?>
            		</h6>
	            </div>
	            
	            <?php } } ?>
	            
	        </div>
	            
	    </div>
	    <?php } } ?>
	</div>
</div>
<?php if(AuthComponent::user()) {?>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Topic'), array('action' => 'add')); ?></li>
			<?php if(AuthComponent::user('type') == 'Admin'){?>
				<li><?php echo $this->Html->link(__('List Topics'), array('action' => 'topicsList')); ?> </li>
				<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
				
			<?php } ?>
		</ul>
	</div>
<?php } ?>