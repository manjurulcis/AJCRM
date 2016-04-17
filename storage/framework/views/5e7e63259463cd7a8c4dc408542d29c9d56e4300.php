<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('parts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>