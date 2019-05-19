

<?php $__env->startSection('page-title'); ?>
    ユーザ新規登録
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

    <form method="POST" action="<?php echo e(route('auth.postRegister')); ?>">
        <?php echo csrf_field(); ?>


        <div style="color: #fff">
            名前
            <input type="text" name="name" value="<?php echo e(old('name')); ?>">
        </div>

        <div style="color: #fff">
            メールアドレス
            <input type="email" name="email" value="<?php echo e(old('email')); ?>">
        </div>

        <div style="color: #fff">
            パスワード
            <input type="password" name="password">
        </div>

        <div style="color: #fff">
            パスワード再入力
            <input type="password" name="password_confirmation">
        </div>

        <div>
            <button type="submit">登録</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>