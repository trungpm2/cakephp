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
	 	method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                <input type="email" class="form-control" name="email" value="<?= @$user? $user->email : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                birth day
            </div>
            <div class="col-sm-10">
                <input type="text" id="datepicker" placeholder="dd-mm-yyyy" readonly class="form-control" required name="birthday" value="<?= @$user->birthday? $user->birthday->format("m-d-Y") : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                Avatar
            </div>
            
            <div class="col-sm-10">
            <?php if(isset($user) AND $user->image){?>
                <?= $this->Html->image('/img/uploads/users/'.$user->image,['style'=>'height:100px;','id'=>'previewimg']);?>
            <?php }else{?>
            <?= $this->Html->image('/img/uploads/users/',['style'=>'height:100px; display:none','id'=>'previewimg']);?>
            <?php } ?>
                <input type="file" name="file" id="file" />
                <!-- <img id="previewimg" src="" /> -->
            </div>
        </div>
         <div class="form-group">
            <div class="col-sm-2">
                Note
            </div>
            <div class="col-sm-10">
                <textarea name="note"><?= @$user->note ? $user->note : ''?></textarea>
                
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


<script>
    window.onload = function() {
        CKEDITOR.replace( 'note',{
            language: 'vi',
            // uiColor: '#AADC6E'
        });
    };
    $(function(){
        $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
    });
    $('#file').change(function() {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
        console.log(file);
    });
    function imageIsLoaded(e) {
        $('#preview').css("display", "block");
        $('#previewimg').attr('src', e.target.result);
         $('#previewimg').css("display","block");
    };
    </script>
<?php $this->end() ?>