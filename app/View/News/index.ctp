<?php 
	if(AuthComponent::user('type') == 'Admin'){ 
		echo "<div class='news index'>";
	}
	else{
		echo "<div class='related'>";	
	}
?>

	<h2><?php echo __('Latest News'); ?></h2>
	<?php foreach ($news as $news){ ?>
    	<div class="panel panel-success">
            <div class="panel-heading">
            	<?php echo h($news['News']['title']) . ' (' . h(CakeTime::format($news['News']['created'], '%e/%m/%y %H:%M')) . ')'; ?>
            </div>
            <div class="panel-body">
            	<?php echo nl2br($news['News']['details']); ?>
            </div>
            <div class="panel-footer">
            	<h6>
            	<?php 
            		echo 'Last updated on ' . h(CakeTime::format($news['News']['modified'], '%e/%m/%y %H:%M')); 
            		if(AuthComponent::user('type') == 'Admin'){
            			echo $this->Form->postLink(__('Delete News'), array('action' => 'delete', $news['News']['id']), array('class' => 'btn btn-danger pull-right btn-xs'), __('Are you sure you want to delete # %s?', $news['News']['id']));
            			echo $this->Html->link(__('Edit News'), array('action' => 'edit', $news['News']['id']), array('class' => 'btn btn-success pull-right btn-xs')); 
            		}	
            	?>
            	</h6>
            </div>
        </div>
	<?php } ?>

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
<?php if(AuthComponent::user('type') == 'Admin'){ ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add News'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php } ?>
