<?php
	$this->layout = 'user';
?>
<div class="col-md-offset-2 col-md-8">
	<div class="panel panel-default">
	    <div class="panel-heading">
	        User Management
	        <a class="btn btn-primary btn-sm pull-right" href="<?= $this->Url->build('/user/create') ?>">Add user</a>
	        <a class="btn btn-primary btn-sm pull-right" style="margin-right: 5px" href="<?= $this->Url->build('/user') ?>">Back to list</a>
	    </div>
	    <?= $this->fetch('user_content') ?>
	</div>
</div>
