<?php 
	if(AuthComponent::user('type') == 'Admin'){ 
?>
		<div class="news form">
		<?php echo $this->Form->create('News'); ?>
			<fieldset>
				<legend><?php echo __('Add News'); ?></legend>
			<?php
				echo $this->Form->input('title');
				echo $this->Form->input('details');
			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
		</div>
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul>
				<?php if(AuthComponent::user('type') == 'Admin') { ?>
					<li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
				<?php } ?>
			</ul>
		</div>
<?php 
	}
	else{
?>
		<p class="error">
        <strong>Not Authorised </strong>
    </p>
<?php 
	}
?>
