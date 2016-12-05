<div class="families form">
<?php echo $this->Form->create('Family'); ?>
	<fieldset>
		<legend><?php echo __('Add Family'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('disposition_id');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Families'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Dispositions'), array('controller' => 'dispositions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disposition'), array('controller' => 'dispositions', 'action' => 'add')); ?> </li>
	</ul>
</div>
