<div class="problems form">
<?php echo $this->Form->create('Problem'); ?>
	<fieldset>
		<legend><?php echo __('Edit Problem'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('detail');
		echo $this->Form->input('note');
		echo $this->Form->input('disposition_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('family_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Problem.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Problem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Cancel'), array('action' => 'index')); ?></li>
	</ul>
</div>
