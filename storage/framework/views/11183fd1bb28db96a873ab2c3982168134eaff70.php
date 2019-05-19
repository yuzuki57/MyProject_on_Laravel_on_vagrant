

<?php $__env->startSection('page-title'); ?>
    ツイート一覧
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <div class="col-md-2">
            <?php if( Auth::check() ): ?>
            <p>
                <img src="/storage/avatar/<?php echo e(Auth::user()->userProfile->avater_filename); ?>" class="img-circle" width="165" height="170"/>
            </p>
            <p style="font-size: 20px; color: #fff"><i class="fab fa-github"></i>
                <?php echo e(Auth::user()->name); ?>

            </p>
            <p style="font-size: 20px; color: #fff" class="glyphicon glyphicon-comment">
            </p>
            <p style="font-size: 20px; color: #fff">
                <?php echo e(Auth::user()->userProfile->introduction); ?>

            </p>
            <p>
                <a class="btn btn-info glyphicon glyphicon-info-sign" href="<?php echo e(route('user_profile.show', ['id' => Auth::user()->id])); ?>" style="font-size: 15px">
                    プロフィール詳細
                </a>
            </p>
            <a class="btn btn-primary glyphicon glyphicon-send" href="<?php echo e(route('tweets.create')); ?>"> ツイート新規投稿</a>
            <?php endif; ?>
        </div>
        <div class="col-md-10">
            <?php if(Session::has('flash_message')): ?>
                <div class="alert alert-success">
                    <?php echo e(Session::get('flash_message')); ?>

                </div>
            <?php endif; ?>
            <table class="table">
                <tbody>
                    <?php $__currentLoopData = $tweets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tweet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <ul class="list-unstyled">
                                <li style="color: #fff">
                                    <a class="glyphicon glyphicon-user" href="<?php echo e(route('user_profile.show', ['id' => $tweet->user->id])); ?>"> <?php echo e($tweet->user->name); ?></a>: <?php echo e($tweet->body); ?>

                                 </li>
                                <?php if(count($tweet->hashTags) > 0): ?>
                                <li>
                                    <ul class="list-inline">
                                        <?php $__currentLoopData = $tweet->hashTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hash_tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="<?php echo e(route('hash_tags.tweets', ['id' => $hash_tag->id])); ?>">
                                                    <span class="label label-info">
                                                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> <?php echo e($hash_tag->name); ?>

                                                    </span>
                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </td>
                        <td class="text-right"><a class="btn btn-primary glyphicon glyphicon-info-sign" href="<?php echo e(route('tweets.show', ['id' => $tweet->id])); ?>">:詳細</a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>