<!DOCTYPE html>
<html>
<head>
	<title>簡易掲示板(β版)</title>
	<meta charset="utf-8">
</head>
<body>
こんにちは！
<?php if(Auth::check()): ?>
	<?php echo e(\Auth::user()->name); ?>さん<br/>
	<a href="<?php echo e(route('auth.getLogout')); ?>">ログアウト</a>
<?php else: ?>
	ゲストさん<br/>
	<a href="<?php echo e(route('auth.getLogin')); ?>">ログイン</a>
	<a href="<?php echo e(route('auth.getRegister')); ?>">会員登録</a>
<?php endif; ?>
</body>
</html>
