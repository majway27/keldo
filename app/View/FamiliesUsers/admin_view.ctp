<div class="familiesUsers view">
<h2><?php echo __('Families User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($familiesUser['FamiliesUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Family'); ?></dt>
		<dd>
			<?php echo $this->Html->link($familiesUser['Family']['name'], array('controller' => 'families', 'action' => 'view', $familiesUser['Family']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($familiesUser['User']['id'], array('controller' => 'users', 'action' => 'view', $familiesUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($familiesUser['FamiliesUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($familiesUser['FamiliesUser']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Families User'), array('action' => 'edit', $familiesUser['FamiliesUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Families User'), array('action' => 'delete', $familiesUser['FamiliesUser']['id']), null, __('Are you sure you want to delete # %s?', $familiesUser['FamiliesUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Families Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Families User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Families'), array('controller' => 'families', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Family'), array('controller' => 'families', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
