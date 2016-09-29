<?php $this->extend('../index') ?>
<?php $this->assign('title', 'User Management | '.ucwords($action).' User') ?>
<?php $this->start('user_content') ?>
<div class="panel-body">
	<form 
		<?php if($action == 'create'): ?>
			action="<?= $this->Url->build('/user/create/post') ?>" 
		<?php else: ?>
			action="<?= $this->Url->build('/user/update/'.@$user->id.'/post') ?>" 
		<?php endif; ?>
	 	method="POST" class="form-horizontal" role="form">
        <div class="form-group">
            <div class="col-sm-2">
                Name
            </div>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="<?= @$user? $user->name : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                Email
            </div>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email" value="<?= @$user? $user->email : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">
                	<?php if($action == 'create'): ?>
                    	<span>Create</span>
                	<?php else: ?>
                    	<span>Update</span>
                	<?php endif; ?>
                </button>
            </div>
        </div>
    </form>
</div>
<?php $this->end() ?>