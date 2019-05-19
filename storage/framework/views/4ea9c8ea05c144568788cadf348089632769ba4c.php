

<?php $__env->startSection('page-title'); ?>
    ツイート新規投稿
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

            <form action="<?php echo e(route('tweets.store')); ?>" method="post">
                <?php echo csrf_field(); ?>


                <div class="form-group row">
                    <label class="col-xs-2 col-form-label" style="color: #fff">ツイート本文</label>
                    <div class="col-xs-10">
                        <input type="text" name="body" class="form-control" placeholder="ツイート本文を入力してください。" value="<?php echo e(old('body')); ?>"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xs-2 col-form-label" style="color: #fff">ハッシュタグ</label>
                    <div class="col-xs-8">
                        <input type="text" name="hash_tags" class="form-control" placeholder="ハッシュタグを入力してください。" value="<?php echo e(old('hash_tags')); ?>"/>
                        <p class="help-block">複数のハッシュタグをつける場合は、半角スペースで区切ってください。</p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary glyphicon glyphicon-send"> 投稿する</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>