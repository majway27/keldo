<div class="solutions view">
<h2><?php echo __('Solution'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($solution['Solution']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Problem'); ?></dt>
		<dd>
			<?php echo $this->Html->link($solution['Problem']['id'], array('controller' => 'problems', 'action' => 'view', $solution['Problem']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detail'); ?></dt>
		<dd>
			<?php echo h($solution['Solution']['detail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($solution['Solution']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disposition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($solution['Disposition']['name'], array('controller' => 'dispositions', 'action' => 'view', $solution['Disposition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($solution['User']['id'], array('controller' => 'users', 'action' => 'view', $solution['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($solution['Solution']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($solution['Solution']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Solution'), array('action' => 'edit', $solution['Solution']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Solution'), array('action' => 'delete', $solution['Solution']['id']), null, __('Are you sure you want to delete # %s?', $solution['Solution']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Solutions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solution'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dispositions'), array('controller' => 'dispositions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disposition'), array('controller' => 'dispositions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
