

<?php $__env->startSection('page-title'); ?>
    ツイート詳細
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12" style="color: #fff">
            <h3 class="header header-info">ツイート本文</h3>
            <p><?php echo e($tweet->body); ?></p>
            <h3>投稿日時</h3>
            <p><?php echo e($tweet->created_at); ?></p>
        </div>
    </div>
    <?php if(Auth::check()): ?>
        <a href="<?php echo e(route('tweets.edit', ['id' => $tweet->id])); ?>" class="btn btn-primary glyphicon glyphicon-repeat"> 更新</a>
        <form action="<?php echo e(route('tweets.destroy', ['id' => $tweet->id])); ?>" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <?php echo csrf_field(); ?>

            <button type="submit" class="btn btn-danger glyphicon glyphicon-trash"> 削除</button>
        </form>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>