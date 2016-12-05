<div class="familiesUsers index">
	<h2><?php echo __('Families Membership'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('family_id'); ?></th>
			<th><?php echo $this->Paginator->sort('family_note'); ?></th>
			<th><?php echo $this->Paginator->sort('user'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($familiesUsers as $familiesUser): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($familiesUser['Family']['name'], array('controller' => 'families', 'action' => 'view', $familiesUser['Family']['id'])); ?>
		</td>
				<td>
			<?php echo $this->Html->link($familiesUser['Family']['note'], array('controller' => 'families', 'action' => 'view', $familiesUser['Family']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($familiesUser['User']['username'], array('controller' => 'users', 'action' => 'view', $familiesUser['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $familiesUser['FamiliesUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $familiesUser['FamiliesUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Leave'), array('action' => 'delete', $familiesUser['FamiliesUser']['id']), null, __('Are you sure you want to delete # %s?', $familiesUser['FamiliesUser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Join Another Family'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Messages'), array('controller'=>'messages', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Ask Olaf (Help)'), array('controller'=>'families_users', 'action' => 'help')); ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?></li>
	</ul>
</div>
