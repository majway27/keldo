<div class="dispositions view">
<h2><?php echo __('Disposition'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($disposition['Disposition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($disposition['Disposition']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($disposition['Disposition']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($disposition['Disposition']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($disposition['Disposition']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Disposition'), array('action' => 'edit', $disposition['Disposition']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Disposition'), array('action' => 'delete', $disposition['Disposition']['id']), null, __('Are you sure you want to delete # %s?', $disposition['Disposition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dispositions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disposition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Families'), array('controller' => 'families', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Family'), array('controller' => 'families', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Messages'), array('controller' => 'messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solutions'), array('controller' => 'solutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solution'), array('controller' => 'solutions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Families'); ?></h3>
	<?php if (!empty($disposition['Family'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Disposition Id'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($disposition['Family'] as $family): ?>
		<tr>
			<td><?php echo $family['id']; ?></td>
			<td><?php echo $family['name']; ?></td>
			<td><?php echo $family['disposition_id']; ?></td>
			<td><?php echo $family['note']; ?></td>
			<td><?php echo $family['created']; ?></td>
			<td><?php echo $family['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'families', 'action' => 'view', $family['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'families', 'action' => 'edit', $family['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'families', 'action' => 'delete', $family['id']), null, __('Are you sure you want to delete # %s?', $family['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Family'), array('controller' => 'families', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Messages'); ?></h3>
	<?php if (!empty($disposition['Message'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Message'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Family Id'); ?></th>
		<th><?php echo __('Disposition Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($disposition['Message'] as $message): ?>
		<tr>
			<td><?php echo $message['id']; ?></td>
			<td><?php echo $message['message']; ?></td>
			<td><?php echo $message['user_id']; ?></td>
			<td><?php echo $message['family_id']; ?></td>
			<td><?php echo $message['disposition_id']; ?></td>
			<td><?php echo $message['created']; ?></td>
			<td><?php echo $message['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'messages', 'action' => 'view', $message['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'messages', 'action' => 'edit', $message['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'messages', 'action' => 'delete', $message['id']), null, __('Are you sure you want to delete # %s?', $message['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Message'), array('controller' => 'messages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Problems'); ?></h3>
	<?php if (!empty($disposition['Problem'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Detail'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Disposition Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Family Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($disposition['Problem'] as $problem): ?>
		<tr>
			<td><?php echo $problem['id']; ?></td>
			<td><?php echo $problem['detail']; ?></td>
			<td><?php echo $problem['note']; ?></td>
			<td><?php echo $problem['disposition_id']; ?></td>
			<td><?php echo $problem['user_id']; ?></td>
			<td><?php echo $problem['family_id']; ?></td>
			<td><?php echo $problem['modified']; ?></td>
			<td><?php echo $problem['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'problems', 'action' => 'view', $problem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'problems', 'action' => 'edit', $problem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'problems', 'action' => 'delete', $problem['id']), null, __('Are you sure you want to delete # %s?', $problem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Solutions'); ?></h3>
	<?php if (!empty($disposition['Solution'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Problem Id'); ?></th>
		<th><?php echo __('Detail'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Disposition Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($disposition['Solution'] as $solution): ?>
		<tr>
			<td><?php echo $solution['id']; ?></td>
			<td><?php echo $solution['problem_id']; ?></td>
			<td><?php echo $solution['detail']; ?></td>
			<td><?php echo $solution['note']; ?></td>
			<td><?php echo $solution['disposition_id']; ?></td>
			<td><?php echo $solution['user_id']; ?></td>
			<td><?php echo $solution['modified']; ?></td>
			<td><?php echo $solution['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'solutions', 'action' => 'view', $solution['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'solutions', 'action' => 'edit', $solution['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'solutions', 'action' => 'delete', $solution['id']), null, __('Are you sure you want to delete # %s?', $solution['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Solution'), array('controller' => 'solutions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
