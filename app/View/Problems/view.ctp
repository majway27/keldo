<div class="problems view">
<h2><?php echo __('Problem'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detail'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['detail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disposition'); ?></dt>
		<dd>
			<?php echo h($problem['Disposition']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($problem['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Family Id'); ?></dt>
		<dd>
			<?php echo h($problem['Family']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<p></p>
	<h2><?php echo __('Solutions'); ?></h2>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('detail'); ?></th>
				<th><?php echo $this->Paginator->sort('note'); ?></th>
				<th><?php echo $this->Paginator->sort('disposition_id'); ?></th>
				<th><?php echo $this->Paginator->sort('user_id'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	<?php foreach ($solutions as $solution): ?>
		<tr>
			<td>
				<?php echo $this->Html->link($solution['Solution']['detail'], array('controller' => 'solutions', 'action' => 'view', $solution['Solution']['id'])); ?>
			</td>
			<td><?php echo h($solution['Solution']['note']); ?>&nbsp;</td>
			<td><?php echo h($solution['Disposition']['name']); ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->link($solution['User']['username'], array('controller' => 'users', 'action' => 'view', $solution['User']['id'])); ?>
			</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'solutions','action' => 'view', $solution['Solution']['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'solutions','action' => 'edit', $solution['Solution']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'solutions','action' => 'delete', $solution['Solution']['id']), null, __('Are you sure you want to delete # %s?', $solution['Solution']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Edit Problem'), array('action' => 'edit', $problem['Problem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Add Solution'), array('controller'=>'solutions','action' => 'add2prob', $problem['Problem']['id'])); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete Problem'), array('action' => 'delete', $problem['Problem']['id']), null, __('Are you sure you want to delete # %s?', $problem['Problem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Problems'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('action' => 'add')); ?> </li>
	</ul>
</div>
