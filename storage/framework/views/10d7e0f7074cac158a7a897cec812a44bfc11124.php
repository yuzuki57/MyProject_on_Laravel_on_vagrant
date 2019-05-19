

<?php $__env->startSection('page-title'); ?>
    ユーザプロフィール編集
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('user_profile.update', ['id' => $user->id])); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <?php echo csrf_field(); ?>


                <div class="form-group row">
                    <label class="col-xs-2 col-form-label" style="color: #fff"><i class="fab fa-github"></i> 紹介文</label>
                    <div class="col-xs-10">
                        <input name="introduction" type="text" class="form-control" value="<?php echo e(old('introduction', $user->userProfile->introduction)); ?>"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xs-2 col-form-label" style="color: #fff"><i class="fas fa-birthday-cake"></i> 誕生日</label>
                    <div class="col-xs-10">
                        <input name="birthday" type="date" class="form-control" value="<?php echo e(old('birthday', $user->userProfile->birthday)); ?>"/>
                    </div>
                </div>
                <div class="form-group row">
                    <?php if($user->userProfile->avater_filename): ?>
                        <p>
                            <img src="/storage/avatar/<?php echo e($user->userProfile->avater_filename); ?>" class="img-rounded" />
                        </p>
                    <?php endif; ?>
                    <label class="col-xs-2 col-form-label glyphicon glyphicon-picture" style="color: #fff"> 画像のアップロード</label>
                    <div class="col-xs-10">
                        <input name="avater_filename" type="file" class="form-control" value="<?php echo e(old('avater_filename', $user->userProfile->avater_filename)); ?>"/>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary">編集を確定する</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>