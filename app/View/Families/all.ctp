<div class="families index">
	<h2><?php echo __('All Keldo Families'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('problem_count'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($families as $family): ?>
	<tr>
		<td><?php echo h($family['Family']['name']); ?>&nbsp;</td>
		<td><?php echo h($family['Family']['note']); ?>&nbsp;</td>
		<td><?php echo h($family['Family']['problem_count']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $family['Family']['id'])); ?>
			<?php echo $this->Html->link(__('Problems'), array('action' => 'Famproblems', $family['Family']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Active Families'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('New Family Request'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Messages'), array('controller'=>'messages', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Ask Olaf (Help)'), array('controller'=>'families', 'action' => 'help')); ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?></li>
	</ul>
</div>
