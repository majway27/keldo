<div class="families index">
	<h2><?php echo __('Families'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('disposition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($families as $family): ?>
	<tr>
		<td><?php echo h($family['Family']['id']); ?>&nbsp;</td>
		<td><?php echo h($family['Family']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($family['Disposition']['name'], array('controller' => 'dispositions', 'action' => 'view', $family['Disposition']['id'])); ?>
		</td>
		<td><?php echo h($family['Family']['note']); ?>&nbsp;</td>
		<td><?php echo h($family['Family']['created']); ?>&nbsp;</td>
		<td><?php echo h($family['Family']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $family['Family']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $family['Family']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $family['Family']['id']), null, __('Are you sure you want to delete # %s?', $family['Family']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Family'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Dispositions'), array('controller' => 'dispositions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disposition'), array('controller' => 'dispositions', 'action' => 'add')); ?> </li>
	</ul>
</div>
