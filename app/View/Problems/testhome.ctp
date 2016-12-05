<div class="index">
	<h2><?php echo __('Problems'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><Detail</th>
			<th>Note</th>
			<th>Disposition</th>
			<th>User</th>
			<th>Family</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($allMyProblems as $allMyProblem): ?>
	<tr>
		<td><?php echo h($allMyProblem['Problem']['detail']); ?>&nbsp;</td>
		<td><?php echo h($allMyProblem['Problem']['note']); ?>&nbsp;</td>
		<td><?php echo h($allMyProblem['Disposition']['name']); ?>&nbsp;</td>
		<td><?php echo h($allMyProblem['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($allMyProblem['Family']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $allMyProblem['Problem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $allMyProblem['Problem']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $allMyProblem['Problem']['id']), null, __('Are you sure you want to delete # %s?', $allMyProblem['Problem']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<h2><?php echo __('Messages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Message</th>
			<th>From User</th>
			<th>Family</th>
			<th>Created</th>
	</tr>
	<?php foreach ($messages as $message): ?>
	<tr>
		<td><?php echo h($message['Message']['message']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($message['User']['username'], array('controller' => 'users', 'action' => 'view', $message['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($message['Family']['name'], array('controller' => 'families', 'action' => 'view', $message['Family']['id'])); ?>
		</td>
		<td><?php echo h($message['Message']['created']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>Hello,&nbsp;<?php echo h($loggedinuser); ?></li>
	    <li><?php if($role == 'Admin') { echo $this->Html->link(__('Admin'), array('action' => 'add')); } ?></li>
		<li><?php echo $this->Html->link(__('New Problem'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('See Active Families'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Messages'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Ask Olaf (Help)'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?></li>
	</ul>
	<div class="img">
		<?php echo $this->Html->image('link-hs-v1.png');?>
	</div>
</div>


