

<?php $__env->startSection('page-title'); ?>
    ログイン
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('auth.postLogin')); ?>">
        <?php echo csrf_field(); ?>


        <div style="color: #00bfff">
            メールアドレス
            <input type="email" name="email" value="<?php echo e(old('email')); ?>">
        </div>

        <div style="color: #00bfff">
            パスワード
            <input type="password" name="password" id="password">
        </div>

        <div class="btn-group" data-toggle="buttons">
        	<label class="btn btn-primary active">
            <input type="checkbox" autocomplete="off" name="remember"> Remember Me
            </label>
        </div>

        <div>
            <button type="submit">ログイン</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>