<?php $__env->startSection('content'); ?>
<div id="login" class="animate form">
    <section class="login_content">
        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
            <?php echo csrf_field(); ?>

            <h1>Login Form</h1>
            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

                <div class="col-md-12">
                    <input type="email" placeholder="Email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                    <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

                <div class="col-md-12">
                    <input type="password" class="form-control" name="password" placeholder="password">

                    <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-default">
                        Log In
                    </button>

                    <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">Lost Your Password?</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

                <p class="change_link">New to site?
                    <a href="<?php echo e(url('/register')); ?>" class="to_register"> Create Account </a>
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