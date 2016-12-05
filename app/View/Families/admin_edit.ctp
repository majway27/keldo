<div class="families form">
<?php echo $this->Form->create('Family'); ?>
	<fieldset>
		<legend><?php echo __('Edit Family'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Family.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Family.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Active Families'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Browse all Families'), array('action' => 'all')); ?></li>
	</ul>
</div>
