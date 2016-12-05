<div class="families view">
<h2><?php echo __('Family'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($family['Family']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($family['Family']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disposition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($family['Disposition']['name'], array('controller' => 'dispositions', 'action' => 'view', $family['Disposition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($family['Family']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($family['Family']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($family['Family']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Family'), array('action' => 'edit', $family['Family']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Family'), array('action' => 'delete', $family['Family']['id']), null, __('Are you sure you want to delete # %s?', $family['Family']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Families'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Family'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dispositions'), array('controller' => 'dispositions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disposition'), array('controller' => 'dispositions', 'action' => 'add')); ?> </li>
	</ul>
</div>
