

<?php $__env->startSection('page-title'); ?>
    ユーザプロフィール
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12" style="color: #fff">
            <h3>名前</h3>
            <p><?php echo e($user->name); ?></p>
            <h3>紹介文</h3>
            <p><?php echo e($user->userProfile->introduction); ?></p>
            <h3>誕生日</h3>
            <p><?php echo e($user->userProfile->birthday); ?></p>
            <h4>ユーザーアイコン</h4>
            <p><img src="/storage/avatar/<?php echo e($user->userProfile->avater_filename); ?>" class="img-rounded" /></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(route('user_profile.edit', ['id' => $user->id])); ?>" class="btn btn-primary glyphicon glyphicon-edit"> 編集</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>