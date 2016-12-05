<div class="families view">
<h2><?php echo __('Family'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($family['Family']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($family['Family']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disposition'); ?></dt>
		<dd>
			<?php echo h($family['Disposition']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($family['Family']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($family['Family']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($family['Family']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Active Families'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Browse all Families'), array('action' => 'all')); ?></li>
		<li><?php echo $this->Html->link(__('New Family Request'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Ask Olaf (Help)'), array('controller'=>'families', 'action' => 'help')); ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?></li>
	</ul>
</div>
