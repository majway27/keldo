<div class="problems index">
	<h2><?php echo __('Family Problems'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('detail'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('disposition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('family_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($problems as $problem): ?>
	<tr>
		<td><?php echo h($problem['Problem']['detail']); ?>&nbsp;</td>
		<td><?php echo h($problem['Problem']['note']); ?>&nbsp;</td>
		<td><?php echo h($problem['Disposition']['name']); ?>&nbsp;</td>
		<td><?php echo h($problem['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($problem['Family']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('controller'=>'problems', 'action' => 'view', $problem['Problem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Problem'), array('controller'=>'families', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Active Families'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Browse All Families'), array('action' => 'all')); ?></li>
		<li><?php echo $this->Html->link(__('New Family Request'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Ask Olaf (Help)'), array('controller'=>'families', 'action' => 'help')); ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?></li>
	</ul>
</div>
