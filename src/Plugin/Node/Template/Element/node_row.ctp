<tr class="<?php echo $node->status == 0 ? 'warning' : ''; ?> ">
	<td>
		<?php echo str_repeat('&nbsp;&nbsp;', 2 * $deph); ?>
		<?php echo $this->Html->link($node->title, $node->url, ['target' => '_blank']); ?>
		<?php if ($node->promote): ?>
		<span class="glyphicon glyphicon-home" title="<?php echo __('Promote to front page'); ?>"></span>
		<?php endif; ?>
		<?php if ($node->sticky): ?>
		<span class="glyphicon glyphicon-pushpin" title="<?php echo __('Sticky at top of lists'); ?>"></span>
		<?php endif; ?>
	</td>
	<td><?php echo $node->type; ?></td>
	<td><?php echo $node->author_name; ?></td>
	<td>
		<div class="dropdown">
			<button class="btn" type="button" data-toggle="dropdown"><?php echo __('Actions'); ?><span class="caret"></span></button>
				<ul class="dropdown-menu" role="menu">
				<li role="presentation"><?php echo $this->Html->link(__('Edit'), '/admin/node/manage/edit/' . $node->id, ['tabindex' => -1]); ?></li>
				<li role="presentation"><?php echo $this->Html->link(__('Translate'), '/admin/node/manage/translate/' . $node->id, ['tabindex' => -1]); ?></li>
				<li role="presentation"><?php echo $this->Html->link(__('Append New Content'), '/admin/node/manage/add/' . $node->node_type_slug, ['tabindex' => -1]); ?></li>
				<li role="presentation" class="divider"></li>
				<li role="presentation"><?php echo $this->Html->link(__('Delete'), '/admin/node/manage/delete/' . $node->id, ['tabindex' => -1, 'confirm' => __('You are about to delete: "%s". Are you sure ?', $node->title)]); ?></li>
			</ul>
		</div>
	</td>
</tr>

<?php if ($node->children): ?>
	<?php foreach ($node->children as $child): ?>
		<?php echo renderNode($this, $child, $deph + 1); ?>
	<?php endforeach; ?>
<?php endif; ?>