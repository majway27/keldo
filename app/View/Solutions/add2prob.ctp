<div class="solutions form">
<?php echo $this->Form->create('Solution'); ?>
	<fieldset>
		<legend><?php echo __('Please enter a solution for this problem'); ?></legend>
	<?php
		echo $this->Form->input('problem_id', array('value' => '$problemid'));
		echo $this->Form->input('detail', array('default'=>'Please provide a short Solution title here'));
		echo $this->Form->input('note', array('default'=>'Please set a short description here'));
		echo $this->Form->input('disposition_id', array('value' => '$dispositionid'));
		echo $this->Form->input('user_id', array('value' => '$userid'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Solutions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
	</ul>
</div>
