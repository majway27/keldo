<div class="families form">
<?php echo $this->Form->create('Family'); ?>
	<fieldset>
		<legend><?php echo __('Add Family'); ?></legend>
	<?php
		echo $this->Form->input('name');
		#echo $this->Form->input('disposition_id');
		echo $this->Form->hidden('disposition_id', array('value' => '529f21de-a084-4ddc-adff-3f08c0a87852'));
		echo $this->Form->input('note', array('default'=>'Please set a short description here'));
		#echo $this->Form->input('note');
		echo __('Please note that this request will be pending until Admin approval');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Active Families'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Browse all Families'), array('action' => 'all')); ?></li>
		<li><?php echo $this->Html->link(__('Ask Olaf (Help)'), array('controller'=>'families', 'action' => 'help')); ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?></li>
	</ul>
</div>
