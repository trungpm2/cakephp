<?php $this->extend('../index') ?>
<?php $this->assign('title', 'User Management | List') ?>
<?php $this->start('user_content') ?>
<div class="panel-body">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>Manager</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($users) == 0): ?>
			<tr>
				<td colspan="4" class="text-center">No data</td>
			</tr>
			<?php endif;?>
			<?php foreach($users as $user): ?>
			<tr>
				<td></td>
				<td><?= $user->name ?></td>
				<td><?= $user->email ?></td>
				<td>
					<div class="btn-group btn-group-sm">
						<a href="<?= $this->Url->build('/user/update/'.$user->id) ?>" class="btn btn-success">edit</a>
						<a href="<?= $this->Url->build('/user/delete/'. $user->id) ?>" class="btn btn-danger">delete</a>
					</div>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php $this->end() ?>