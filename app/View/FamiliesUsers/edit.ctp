<div class="familiesUsers form">
<?php echo $this->Form->create('FamiliesUser'); ?>
	<fieldset>
		<legend><?php echo __('Edit Families User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('family_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FamiliesUser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FamiliesUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Families Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Families'), array('controller' => 'families', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Family'), array('controller' => 'families', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
