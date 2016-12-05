<div class="solutions index">
	<h2><?php echo __('Solutions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('problem_id'); ?></th>
			<th><?php echo $this->Paginator->sort('detail'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('disposition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($solutions as $solution): ?>
	<tr>
		<td><?php echo h($solution['Solution']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($solution['Problem']['id'], array('controller' => 'problems', 'action' => 'view', $solution['Problem']['id'])); ?>
		</td>
		<td><?php echo h($solution['Solution']['detail']); ?>&nbsp;</td>
		<td><?php echo h($solution['Solution']['note']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($solution['Disposition']['name'], array('controller' => 'dispositions', 'action' => 'view', $solution['Disposition']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($solution['User']['id'], array('controller' => 'users', 'action' => 'view', $solution['User']['id'])); ?>
		</td>
		<td><?php echo h($solution['Solution']['modified']); ?>&nbsp;</td>
		<td><?php echo h($solution['Solution']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $solution['Solution']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $solution['Solution']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $solution['Solution']['id']), null, __('Are you sure you want to delete # %s?', $solution['Solution']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Solution'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dispositions'), array('controller' => 'dispositions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disposition'), array('controller' => 'dispositions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
