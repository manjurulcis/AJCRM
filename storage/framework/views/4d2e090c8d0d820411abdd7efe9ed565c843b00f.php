<?php $__env->startSection('content'); ?>
<div id="login" class="animate form">
    <section class="login_content">
        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
            <?php echo csrf_field(); ?>

            <h1>Create Account</h1>

            <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                <div class="col-md-12">
                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo e(old('username')); ?>">

                    <?php if($errors->has('username')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('username')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <div class="col-md-12">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>">

                    <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <div class="col-md-12">
                    <input type="password" class="form-control" placeholder="Password" name="password">

                    <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                <div class="col-md-12">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">

                    <?php if($errors->has('password_confirmation')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-default">
                        Submit
                    </button>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

                <p class="change_link">Already a member ?
                    <a href="<?php echo e(url('/login')); ?>" class="to_register"> Log in </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                    <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                    <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
            </div>
        </form>
        <!-- form -->
    </section>
    <!-- content -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>