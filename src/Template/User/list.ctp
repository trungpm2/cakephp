<?php $this->extend('../index') ?>
<?php $this->assign('title', 'User Management | List') ?>
<?php $this->start('user_content') ?>

<style type="text/css" media="screen">
	table tr th, table tr td{
		text-align: center;
	}	
</style>

<?= $this->Flash->render('positive') ?>
<div class="panel-body">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Id</th>
				<th>Avatar</th>
				<th>Name</th>
				<th>Email</th>
				<th>birth day</th>
				<th>Manager</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($users) == 0): ?>
			<tr>
				<td colspan="4" class="text-center">No data</td>
			</tr>
			<?php endif;?>
			<?php $i= 1; foreach($users as $user): ?>
			<tr>
				<td><?= $i++ ?></td>
				<td><?= $user->id?></td>
				<td><?= @$user->image ? $this->Html->image('/img/uploads/users/'.$user->image,['style'=>'max-width:80px;']) : '--' ?></td>
				<td><?= $user->name ?></td>
				<td><?= $user->email ?></td>
				<td><?= @$user->birthday ? $user->birthday->format('d-m-Y') : '' ?></td>
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
<?php unset($users); ?> 
<?php if($showPaginate == '1'){ ?>
<nav aria-label="Page navigation">
  <ul class="pagination">
  	<li><?php echo $this->Paginator->first("First");?></li>
    <li>
    	<?php echo $this->Paginator->prev('<< '.__('previous', true), array('class'=>'Previous'), null, array('class'=>'disabled'));?> 
    </li>
    <li><?php echo $this->Paginator->numbers();?></li>
    <li>
     	<?php echo $this->Paginator->next(__('next', true).' >>', array('class'=>'Next'), null, array('class' => 'disabled'));?> 
    </li>
    <li><?php echo $this->Paginator->last("Last");?></li>
  </ul>
</nav>
<?php }?>
<?php $this->end() ?>