<h1>
	Login
	or
	<?php echo $this->HTML->link('Register', array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-success')) ;?>
</h1>
<?php

	echo $this->Form->create('User');
	//echo $this->Form->input('user_id');
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->end('Login');
?>