<div class="navbar nav_title" style="border: 0;">
    <a href="<?php echo e(url('/')); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
</div>
<div class="clearfix"></div>

<!-- menu prile quick info -->
<div class="profile">
    <div class="profile_pic">
        <img src="<?php echo e(URL::asset('images')); ?>/img.jpg" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2><?php echo e(Auth::user()->username); ?></h2>
    </div>
</div>
<!-- /menu prile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="<?php echo e(url('/users-list')); ?>"><i class="fa fa-windows"></i> User List</a></li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->


