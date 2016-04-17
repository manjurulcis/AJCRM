<?php $__env->startSection("header"); ?>
    <?php echo $__env->make('parts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("menu"); ?>
    <?php echo $__env->make('parts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <?php echo $__env->make('parts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>